<?php
namespace Aws\CloudSearch;

use Aws\Common\AwsClient;
use Aws\CloudSearchDomain\CloudSearchDomainClient;

/**
 * This client is used to interact with the **Amazon CloudSearch** service.
 */
class CloudSearchClient extends AwsClient
{
    /**
     * Create a CloudSearchDomainClient for a particular domain to do searching
     * and document uploads.
     *
     * @param string $domainName Name of the CloudSearch domain.
     * @param array  $config     Config options for the CloudSearchDomainClient
     *
     * @return CloudSearchDomainClient
     */
    public function getDomainClient($domainName, array $config = [])
    {
        $config['endpoint'] = $this->describeDomains([
            'DomainNames' => [$domainName]
        ])->getPath('DomainStatusList/0/SearchService/Endpoint');

        if (!isset($config['scheme'])) {
            $config['scheme'] = 'https';
        }

        // Create an absolute URI for the endpoint.
        $config['endpoint'] = $config['scheme'] . '://' . $config['endpoint'];

        return CloudSearchDomainClient::factory($config);
    }
}
