<?php
/*
 * This script creates a new Github release via the releases API using
 * the staging directory, artifacts built via the package.php script,
 * an OAUTH_TOKEN provided as an environment variable.
 *
 * The contents of the release notes are parsed from the CHANGELOG.md file
 * using the latest version found in the CHANGELOG.
 */
require __DIR__ . '/../vendor/autoload.php';

/**
 * Github release helper class.
 */
class Release
{
    private $token;
    private $owner;
    private $repo;
    private $client;

    public function __construct($token, $owner, $repo)
    {
        $this->token = $token;
        $this->owner = $owner;
        $this->repo = $repo;
        $this->client = new \Guzzle\Http\Client();
        $this->client->setUserAgent('aws-sdk-php');
        $this->client->setDefaultOption(
            'headers/Authorization',
            'token ' . $token
        );
    }

    /**
     * Executes a command and returns the output as a string. If it fails it throws.
     */
    public static function exec($command)
    {
        exec($command, $output, $returnValue);
        $output = implode("\n", $output);

        if ($returnValue != 0) {
            die("Error executing command: {$command}\n$output");
        }

        return $output;
    }

    public function createRelease(
        $tag,
        $contents,
        $branch = 'master',
        $draft = false
    ) {
        $request = $this->client->createRequest(
            'POST',
            "https://api.github.com/repos/$this->owner/$this->repo/releases",
            array('Content-Type'  => 'application/json'),
            json_encode(array(
                'tag_name'         => $tag,
                'target_commitish' => $branch,
                'name'             => $tag . ' release',
                'body'             => $contents,
                'draft'            => $draft
            ))
        );

        return $this->client->send($request)->json();
    }

    public function uploadAsset($id, $name, $contents, $contentType)
    {
        $request = $this->client->createRequest(
            'POST',
            sprintf(
                "https://api.github.com/repos/%s/%s/releases/%s/assets?name=%s",
                $this->owner, $this->repo, $id, $name
            ),
            array('Content-Type'  => $contentType),
            $contents
        );

        return $this->client->send($request)->json();
    }
}

$owner = 'aws';
$repo = 'aws-sdk-php';
$returnVal = shell_exec('which chag') or die('chag not found in path');
$token = getenv('OAUTH_TOKEN') or die('OAUTH_TOKEN environment var not found!');
$artifacts = realpath(__DIR__ . '/artifacts') or die('artifacts dir not found');
$stageDir = realpath($artifacts . '/staging') or die('stage dir not found');
$zip = realpath($artifacts . '/aws.zip') or die('zip not found');
$phar = realpath($artifacts . '/aws.phar') or die('phar not found');

// Get the latest changelog entry
chdir($stageDir);
$tag = Release::exec('chag get');
$contents = Release::exec('chag contents');
echo "Found tag: {$tag}\n\n{$contents}\n\n";

$release = new Release($token, $owner, $repo);
$res = $release->createRelease($tag, $contents, 'master', true);
echo "Created release: {$res['id']}\n";

// Upload the phar
$upload = $release->uploadAsset(
    $res['id'],
    'aws.phar',
    file_get_contents($phar),
    'application/octet-stream'
);

echo "Uploaded asset: {$upload['browser_download_url']}\n";

// Upload the zip
$upload = $release->uploadAsset(
    $res['id'],
    'aws.zip',
    file_get_contents($zip),
    'application/zip'
);

echo "Uploaded asset: {$upload['browser_download_url']}\n\n";
echo "Successfully create GitHub release\n";
