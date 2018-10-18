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

$maxRetries = 3;
$owner = 'aws';
$repo = 'aws-sdk-php';
$token = getenv('OAUTH_TOKEN') or die('An OAUTH_TOKEN environment variable is required');
isset($argv[1]) or die('Usage php gh-release.php X.Y.Z');
$tag = $argv[1];

// Grab and validate the tag annotation
chdir(dirname(__DIR__));
$message = `chag contents -t "$tag"` or die('Chag could not find or parse the tag');

// Create a GitHub client.
$client = new GuzzleHttp\Client([
    'base_uri' => 'https://api.github.com/',
    'headers' => ['Authorization' => "token $token"],
]);

// Publish the release
$url = retryWrapper(
    'Publish the release',
    function() use ($client, $tag, $message, $owner, $repo) {
        $response = $client->post("repos/${owner}/${repo}/releases", [
            'json' => [
                'tag_name'   => $tag,
                'name'       => "Version {$tag}",
                'body'       => $message,
            ]
        ]);

        // Grab the location of the new release
        $url = $response->getHeaderLine('Location');
        echo "Release successfully published to: $url\n";
        return $url;
    },
    $maxRetries
);

// Uploads go to uploads.github.com
$uploadUrl = new Uri($url);
$uploadUrl = $uploadUrl->withHost('uploads.github.com');

// Upload aws.zip
retryWrapper(
    'Upload aws.zip',
    function() use ($client, $uploadUrl) {
        $response = $client->post($uploadUrl . '/assets?name=aws.zip', [
            'headers' => ['Content-Type' => 'application/zip'],
            'body'    => Psr7\try_fopen(__DIR__ . '/artifacts/aws.zip', 'r')
        ]);
        echo "aws.zip uploaded to: " . json_decode($response->getBody(), true)['browser_download_url'] . "\n";
        return $response;
    },
    $maxRetries
);

// Upload aws.phar
retryWrapper(
    'Upload aws.phar',
    function() use ($client, $uploadUrl) {
        $response = $client->post($uploadUrl . '/assets?name=aws.phar', [
            'headers' => ['Content-Type' => 'application/phar'],
            'body'    => Psr7\try_fopen(__DIR__ . '/artifacts/aws.phar', 'r')
        ]);
        echo "aws.phar uploaded to: " . json_decode($response->getBody(), true)['browser_download_url'] . "\n";
        return $response;
    },
    $maxRetries
);

function retryWrapper($label, callable $method, $maxRetries)
{
    $attempts = 0;
    echo "{$label}...\n";
    while ($attempts <= $maxRetries) {
        $attempts++;
        try {
            return $method();
        } catch (\Exception $e) {
            if ($attempts > $maxRetries) {
                throw $e;
            }
            echo "{$label} - Attempt #{$attempts} failed: " . $e->getMessage() . "\n";
            usleep(1000000 * $attempts);
        }
    }
}