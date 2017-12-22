<?php
namespace Aws\Build\Docs;

use Aws\Api\ApiProvider;

/**
 * Builds redirect map file across services
 *
 * @internal
 */
class RedirectMapBuilder
{
    /** @var string */
    private $outputDir;

    /** @var ApiProvider */
    private $apiProvider;

    public function __construct(ApiProvider $provider, $outputDir)
    {
        $this->apiProvider = $provider;
        $this->outputDir = $outputDir;
    }

    public function build()
    {
        $redirectEntry = [];
        $reWriteRulePrefix = "RewriteRule ^/goto/SdkForPHPV3/";
        $docPathPrefix = " /aws-sdk-php/v3/api/";
        $flags = " [L,R,NE]\n";
        $skipCount = 0;
        // Using latest version per service
        foreach ($this->gatherServiceVersions() as $name => $data) {
            $ns = $data['namespace'];
            $version = $data['versions']['latest'];
            list($api, $docModel) = call_user_func(
                "Aws\\{$ns}\\{$ns}Client::applyDocFilters",
                ApiProvider::resolve($this->apiProvider, 'api', $name, $version),
                ApiProvider::resolve($this->apiProvider, 'docs', $name, $version)
            );
            $service = new Service($api, $docModel);
            // Add rewrite rule per operation per service
            foreach ($service->api->getOperations() as $key => $definition) {
                // Skip rewrite rule if service doesn't has a uid in metadata
                if ($service->uid) {
                    $entry = $reWriteRulePrefix . $service->uid . '/' . $key . '$';
                    $entry .= $docPathPrefix . 'api-' . $service->slug . ".html#" . strtolower($key);

                    $redirectEntry []= $entry . $flags;
                    $skipCount++;
                }
            }
            // Fall back to service client main page if version not found
            $redirectEntry []= $reWriteRulePrefix . $service->name . '(.*)'
                . $docPathPrefix . 'class-Aws.'. $service->namespace . '.'
                . $service->namespace . 'Client.html' . $flags;
            $skipCount++;
        }
        // Apply skip check at beginning if not PHP SDK related
        array_unshift($redirectEntry,
            "RewriteCond %{REQUEST_URI} !^\\/goto\\/SdkForPHPV3\\/.*$\n",
            "RewriteRule \".*\" \"-\" [S={$skipCount}]\n"
        );

        // Fall back to api main page if service not found
        $redirectEntry []= $reWriteRulePrefix . '(.*)' . $docPathPrefix . 'index.html' . $flags;

        // Redirect old /AWSSDKforPHP/ paths
        $reWriteRulePrefix = 'RewriteRule ^/AWSSDKforPHP/';
        array_unshift($redirectEntry,
            "RewriteCond %{REQUEST_URI} !^\\/AWSSDKforPHP\\/.*$\n",
            "RewriteRule \".*\" \"-\" [S={4}]\n",
            $reWriteRulePrefix . 'latest(.*) /aws-sdk-php/latest/index.html' . $flags,
            $reWriteRulePrefix . 'v3(.*) /aws-sdk-php/v3/api/index.html' . $flags,
            $reWriteRulePrefix . 'v2(.*) /aws-sdk-php/v2/api/index.html' . $flags,
            $reWriteRulePrefix . 'v1(.*) /aws-sdk-php/v1/index.html' . $flags
        );

        file_put_contents($this->outputDir, $redirectEntry);
    }

    private function gatherServiceVersions()
    {
        $manifest = __DIR__ . '/../../../src/data/manifest.json';

        return json_decode(file_get_contents($manifest), true);
    }
}
