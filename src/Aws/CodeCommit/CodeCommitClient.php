<?php

namespace Aws\CodeCommit;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with AWS CodeCommit
 *
 * @method Model batchGetRepositories(array $args = array()) {@command CodeCommit BatchGetRepositories}
 * @method Model createBranch(array $args = array()) {@command CodeCommit CreateBranch}
 * @method Model createRepository(array $args = array()) {@command CodeCommit CreateRepository}
 * @method Model deleteRepository(array $args = array()) {@command CodeCommit DeleteRepository}
 * @method Model getBranch(array $args = array()) {@command CodeCommit GetBranch}
 * @method Model getRepository(array $args = array()) {@command CodeCommit GetRepository}
 * @method Model listBranches(array $args = array()) {@command CodeCommit ListBranches}
 * @method Model listRepositories(array $args = array()) {@command CodeCommit ListRepositories}
 * @method Model updateDefaultBranch(array $args = array()) {@command CodeCommit UpdateDefaultBranch}
 * @method Model updateRepositoryDescription(array $args = array()) {@command CodeCommit UpdateRepositoryDescription}
 * @method Model updateRepositoryName(array $args = array()) {@command CodeCommit UpdateRepositoryName}
 * @method ResourceIteratorInterface getListBranchesIterator(array $args = array()) The input array uses the parameters of the ListBranches operation
 * @method ResourceIteratorInterface getListRepositoriesIterator(array $args = array()) The input array uses the parameters of the ListRepositories operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-codecommit.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.CodeCommit.CodeCommitClient.html API docs
 */
class CodeCommitClient extends AbstractClient
{
    const LATEST_API_VERSION = '2015-04-13';

    /**
     * Factory method to create a new AWS CodeCommit client using an array of configuration options.
     *
     * See http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/codecommit-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
