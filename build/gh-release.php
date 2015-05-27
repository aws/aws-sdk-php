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

use GuzzleHttp\Url;
use GuzzleHttp\Stream\Utils;

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
    'base_url' => 'https://api.github.com/',
    'defaults' => [
        'headers' => ['Authorization' => "token $token"]
    ]
]);

// Create the release
$response = $client->post("repos/${owner}/${repo}/releases", [
    'json' => [
        'tag_name'   => $tag,
        'name'       => "Version {$tag}",
        'body'       => $message,
        'prerelease' => true
    ]
]);

// Grab the location of the new release
$url = $response->getHeader('Location');
echo "Release successfully published to: $url\n";

// Uploads go to uploads.github.com
$uploadUrl = Url::fromString($url);
$uploadUrl->setHost('uploads.github.com');

// Upload aws.zip
$response = $client->post($uploadUrl . '/assets?name=aws.zip', [
    'headers' => ['Content-Type' => 'application/zip'],
    'body'    => Utils::open(__DIR__ . '/artifacts/aws.zip', 'r')
]);
echo "aws.zip uploaded to: " . $response->json()['browser_download_url'] . "\n";

// Upload aws.phar
$response = $client->post($uploadUrl . '/assets?name=aws.phar', [
    'headers' => ['Content-Type' => 'application/phar'],
    'body'    => Utils::open(__DIR__ . '/artifacts/aws.phar', 'r')
]);
echo "aws.phar uploaded to: " . $response->json()['browser_download_url'] . "\n";
