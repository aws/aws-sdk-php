<?php
namespace Aws\Api;

/**
 * Provides service descriptions.
 */
interface ApiProviderInterface
{
    /**
     * Get the service definition for a service name and version.
     *
     * @param string $service Service name (e.g., "ec2", "s3", "sns"). You can
     *                        specify "latest" to retrieve the latest version.
     * @param string $version Version identifier (e.g., "2010-05-08")
     *
     * @return array
     */
    public function getService($service, $version);

    /**
     * Get a list of service names.
     *
     * @return array
     */
    public function getServiceNames();

    /**
     * Get a list of version numbers for the given service.
     *
     * @param string $service Service to retrieve versions
     *
     * @return array
     */
    public function getServiceVersions($service);

    /**
     * Get paginator configs for a service name and version.
     *
     * @param string $service Service name (e.g., "ec2", "s3", "sns")
     * @param string $version Version identifier (e.g., "2010-05-08")
     *
     * @return array
     */
    public function getServicePaginatorConfig($service, $version);

    /**
     * Get waiter configs for a service name and version.
     *
     * @param string $service Service name (e.g., "ec2", "s3", "sns")
     * @param string $version Version identifier (e.g., "2010-05-08")
     *
     * @return array
     */
    public function getServiceWaiterConfig($service, $version);
}
