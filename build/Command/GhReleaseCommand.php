<?php

namespace AwsBuild\Command;

use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7;

final class GhReleaseCommand extends AbstractCommand
{
    private const MAX_ATTEMPTS = 3;

    public function getName(): string
    {
        return 'gh-release';
    }

    public function getDescription(): string
    {
        return 'Creates a GitHub release and uploads aws.phar / aws.zip.';
    }

    public function getUsage(): string
    {
        return 'OAUTH_TOKEN=<token> php build/WorkflowCommandRunner.php gh-release --tag=<X.Y.Z>';
    }

    protected function doExecute(array $args): int
    {
        $options = $this->parseOptions($args);

        $token = getenv('OAUTH_TOKEN');
        if (!$token) {
            $this->error('An OAUTH_TOKEN environment variable is required');
            return 1;
        }

        if (empty($options['tag'])) {
            $this->error('A --tag option is required. Usage: gh-release --tag=X.Y.Z');
            return 1;
        }

        $tag = $options['tag'];
        $owner = 'aws';
        $repo = 'aws-sdk-php';

        // Grab and validate the tag annotation
        chdir($this->getProjectRoot());
        $message = `chag contents -t "$tag"`;
        if (!$message) {
            $this->error('Chag could not find or parse the tag');
            return 1;
        }

        // Add retry middleware
        $stack = \GuzzleHttp\HandlerStack::create();
        $stack->push(\GuzzleHttp\Middleware::retry(
            function ($retries, $request, $response) {
                $statusCode = $response->getStatusCode();
                if ($retries < self::MAX_ATTEMPTS && !in_array($statusCode, [200, 201, 202])) {
                    $this->output("Attempt failed with status code {$statusCode}: "
                        . $response->getBody());
                    return true;
                }
                return false;
            },
            function ($retries) {
                return 1000 * (1 + $retries);
            }
        ));

        // Create a GitHub client.
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.github.com/',
            'headers' => ['Authorization' => "token $token"],
            'handler' => $stack,
        ]);

        // Create a Github client with no retry middleware
        $uploadClient = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.github.com/',
            'headers' => ['Authorization' => "token $token"]
        ]);

        // Publish the release
        $response = $client->post("repos/{$owner}/{$repo}/releases", [
            'json' => [
                'tag_name'   => $tag,
                'name'       => "Version {$tag}",
                'body'       => $message,
            ]
        ]);
        $releaseBody = json_decode($response->getBody(), true);

        // Grab the location of the new release
        $url = $response->getHeaderLine('Location');
        $this->output("Release successfully published to: $url");

        // Uploads go to uploads.github.com
        $uploadUrl = new Uri($url);
        $uploadUrl = $uploadUrl->withHost('uploads.github.com');

        // Upload aws.zip
        $zipAttempts = $this->retryUpload($client, $uploadClient, $owner, $repo, $releaseBody, $uploadUrl, 'aws.zip');
        if ($zipAttempts === false) {
            $this->output("aws.zip upload failed after " . self::MAX_ATTEMPTS . " attempts.");
        } else {
            $this->output("aws.zip upload succeeded after {$zipAttempts} attempt(s).");
        }

        // Upload aws.phar
        $pharAttempts = $this->retryUpload($client, $uploadClient, $owner, $repo, $releaseBody, $uploadUrl, 'aws.phar');
        if ($pharAttempts === false) {
            $this->output("aws.phar upload failed after " . self::MAX_ATTEMPTS . " attempts.");
        } else {
            $this->output("aws.phar upload succeeded after {$pharAttempts} attempt(s).");
        }

        return 0;
    }

    /**
     * Attempts an artifact upload and retries up to MAX_ATTEMPTS times
     *
     * @return bool|int
     */
    private function retryUpload($client, $uploadClient, $owner, $repo, $releaseBody, $uploadUrl, $filename)
    {
        $isSuccessful = false;
        $attempts = 0;
        $filetype = substr($filename, strpos($filename, '.') + 1);
        $buildDir = self::getBuildDir();

        while (!$isSuccessful && $attempts < self::MAX_ATTEMPTS) {
            try {
                $attempts++;
                $response = $uploadClient->post("{$uploadUrl}/assets?name={$filename}", [
                    'headers' => ['Content-Type' => "application/{$filetype}"],
                    'body'    => Psr7\Utils::tryFopen($buildDir . "/artifacts/{$filename}", 'r')
                ]);
                $this->output("{$filename} uploaded to: " . json_decode($response->getBody(), true)['browser_download_url']);
                $isSuccessful = true;
            } catch (\GuzzleHttp\Exception\ServerException $e) {
                $this->output("{$filename} failed to upload:");
                $this->error($e->getMessage());

                // Fetch and inspect assets for failed downloads
                $response = $client->get("/repos/{$owner}/{$repo}/releases/{$releaseBody['id']}/assets", []);
                $assets = json_decode($response->getBody(), true);

                foreach ($assets as $asset) {
                    if ($asset['state'] !== 'uploaded') {
                        try {
                            $response = $uploadClient->delete("/repos/{$owner}/{$repo}/releases/assets/{$asset['id']}", []);

                            if ($response->getStatusCode() == 204) {
                                $this->output("Failed upload of {$asset['name']} at {$asset['browser_download_url']} has successfully been deleted.");
                            } else {
                                $this->output("Failed upload of {$asset['name']} at {$asset['browser_download_url']} was unable to be deleted.");
                            }
                        } catch (\GuzzleHttp\Exception\ClientException $e) {
                            $response = $e->getResponse();
                            if ($response->getStatusCode() == 204) {
                                $this->output("Failed upload of {$asset['name']} at {$asset['browser_download_url']} has successfully been deleted.");
                            } else {
                                $this->output("Failed upload of {$asset['name']} at {$asset['browser_download_url']} was unable to be deleted.");
                                $this->error($e->getMessage());
                            }
                        }
                    }
                }
            }
        }

        if ($isSuccessful) {
            return $attempts;
        }

        return false;
    }
}
