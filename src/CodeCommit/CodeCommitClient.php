<?php
namespace Aws\CodeCommit;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CodeCommit** service.
 *
 * @method \Aws\Result batchGetRepositories(array $args = [])
 * @method \Aws\Result createBranch(array $args = [])
 * @method \Aws\Result createRepository(array $args = [])
 * @method \Aws\Result deleteRepository(array $args = [])
 * @method \Aws\Result getBranch(array $args = [])
 * @method \Aws\Result getRepository(array $args = [])
 * @method \Aws\Result listBranches(array $args = [])
 * @method \Aws\Result listRepositories(array $args = [])
 * @method \Aws\Result updateDefaultBranch(array $args = [])
 * @method \Aws\Result updateRepositoryDescription(array $args = [])
 * @method \Aws\Result updateRepositoryName(array $args = [])
 */
class CodeCommitClient extends AwsClient {}
