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
        if ($retries < 3 && !in_array($statusCode, [200, 201, 202])) {
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

// Publish the release
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

// Uploads go to uploads.github.com
$uploadUrl = new Uri($url);
$uploadUrl = $uploadUrl->withHost('uploads.github.com');

// Upload aws.zip
$response = $client->post($uploadUrl . '/assets?name=aws.zip', [
    'headers' => ['Content-Type' => 'application/zip'],
    'body'    => Psr7\try_fopen(__DIR__ . '/artifacts/aws.zip', 'r')
]);
echo "aws.zip uploaded to: " . json_decode($response->getBody(), true)['browser_download_url'] . "\n";

// Upload aws.phar
$response = $client->post($uploadUrl . '/assets?name=aws.phar', [
    'headers' => ['Content-Type' => 'application/phar'],
    'body'    => Psr7\try_fopen(__DIR__ . '/artifacts/aws.phar', 'r')
]);
echo "aws.phar uploaded to: " . json_decode($response->getBody(), true)['browser_download_url'] . "\n";
