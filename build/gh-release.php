<?php
/*
 * Creates a Github API release using the changelog contents. Attaches aws.zip
 * and aws.phar to the release.
 *
 * The OAUTH_TOKEN environment variable is required.
 *
 *     Usage: php gh-release.php X.Y.Z
 */

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7;

const MAX_ATTEMPTS = 3;

$owner = 'aws';
$repo = 'aws-sdk-php';
$token = getenv('OAUTH_TOKEN') or die('An OAUTH_TOKEN environment variable is required');
isset($argv[1]) or die('Usage php gh-release.php X.Y.Z');
$tag = $argv[1];

// Grab and validate the tag annotation
chdir(dirname(__DIR__));
$message = `chag contents -t "$tag"` or die('Chag could not find or parse the tag');

// Add retry middleware
$stack = \GuzzleHttp\HandlerStack::create();
$stack->push(\GuzzleHttp\Middleware::retry(
    function ($retries, $request, $response) {
        $statusCode = $response->getStatusCode();
        if ($retries < MAX_ATTEMPTS && !in_array($statusCode, [200, 201, 202])) {
            echo "Attempt failed with status code {$statusCode}: "
                . $response->getBody();
            return true;
        }
        return false;
    },
    function ($retries) {
        return 1000 * (1 + $retries);
    }
));

// Create a GitHub client.
$client = new GuzzleHttp\Client([
    'base_uri' => 'https://api.github.com/',
    'headers' => ['Authorization' => "token $token"],
    'handler' => $stack,
]);

// Create a Github client with no retry middleware, to allow for custom retry handling
$uploadClient = new GuzzleHttp\Client([
    'base_uri' => 'https://api.github.com/',
    'headers' => ['Authorization' => "token $token"]
]);

// Publish the release
$response = $client->post("repos/${owner}/${repo}/releases", [
    'json' => [
        'tag_name'   => $tag,
        'name'       => "Version {$tag}",
        'body'       => $message,
    ]
]);
$releaseBody = json_decode($response->getBody(), true);

// Grab the location of the new release
$url = $response->getHeaderLine('Location');
echo "Release successfully published to: $url\n";

// Uploads go to uploads.github.com
$uploadUrl = new Uri($url);
$uploadUrl = $uploadUrl->withHost('uploads.github.com');

// Upload aws.zip
$zipAttempts = retryUpload($client, $uploadClient, $owner, $repo, $releaseBody, $uploadUrl, 'aws.zip');
if ($zipAttempts === false) {
    echo "aws.zip upload failed after " . MAX_ATTEMPTS . " attempts.\n";
} else {
    echo "aws.zip upload succeeded after {$zipAttempts} attempt(s).\n";
}

// Upload aws.phar
$pharAttempts = retryUpload($client, $uploadClient, $owner, $repo, $releaseBody, $uploadUrl, 'aws.phar');
if ($pharAttempts === false) {
    echo "aws.phar upload failed after " . MAX_ATTEMPTS . " attempts.\n";
} else {
    echo "aws.phar upload succeeded after {$pharAttempts} attempt(s).\n";
}

/**
 * Attempts an artifact upload and retries up to MAX_ATTEMPTS times
 *
 * @param $client
 * @param $uploadClient
 * @param $owner
 * @param $repo
 * @param $releaseBody
 * @param $uploadUrl
 * @param $filename
 * @return bool|int
 */
function retryUpload($client, $uploadClient, $owner, $repo, $releaseBody, $uploadUrl, $filename)
{
    $isSuccessful = false;
    $attempts = 0;
    $filetype = substr($filename, strpos($filename, '.') + 1);

    while (!$isSuccessful && $attempts < MAX_ATTEMPTS) {
        try {
            $attempts++;
            $response = $uploadClient->post("{$uploadUrl}/assets?name={$filename}", [
                'headers' => ['Content-Type' => "application/{$filetype}"],
                'body'    => Psr7\try_fopen(__DIR__ . "/artifacts/{$filename}", 'r')
            ]);
            echo "{$filename} uploaded to: " . json_decode($response->getBody(), true)['browser_download_url'] . "\n";
            $isSuccessful = true;
        } catch (\GuzzleHttp\Exception\ServerException $e) {
            echo "{$filename} failed to upload:\n";
            var_dump($e->getMessage());

            // Fetch and inspect assets for failed downloads
            $response = $client->get("/repos/{$owner}/{$repo}/releases/{$releaseBody['id']}/assets", []);
            $assets = json_decode($response->getBody(), true);

            foreach ($assets as $asset) {

                // Only successful uploads have a state of 'uploaded'
                if ($asset['state'] !== 'uploaded') {
                    try {

                        // Failed uploads leave behind a corrupted artifact that must be deleted
                        $response = $uploadClient->delete("/repos/{$owner}/{$repo}/releases/assets/{$asset['id']}", []);

                        // Currently the successful 204 will trigger an exception due to response formatting,
                        // but keeping this in case Github changes their API response
                        if ($response->getStatusCode() == 204) {
                            echo "Failed upload of {$asset['name']} at {$asset['browser_download_url']} has successfully been deleted.\n";
                        } else {
                            echo "Failed upload of {$asset['name']} at {$asset['browser_download_url']} was unable to be deleted.\n";
                        }
                    } catch (\GuzzleHttp\Exception\ClientException $e) {

                        // Currently expected to generate an exception every time, even for success
                        $response = $e->getResponse();
                        if ($response->getStatusCode() == 204) {
                            echo "Failed upload of {$asset['name']} at {$asset['browser_download_url']} has successfully been deleted.\n";
                        } else {
                            echo "Failed upload of {$asset['name']} at {$asset['browser_download_url']} was unable to be deleted.\n";
                            var_dump($e);
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
