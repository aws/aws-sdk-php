<?php

return array (
    'apiVersion' => '2015-04-13',
    'endpointPrefix' => 'codecommit',
    'serviceFullName' => 'AWS CodeCommit',
    'serviceAbbreviation' => 'CodeCommit',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'CodeCommit_20150413.',
    'signatureVersion' => 'v4',
    'namespace' => 'CodeCommit',
    'operations' => array(
        'BatchGetRepositories' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'BatchGetRepositoriesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeCommit_20150413.BatchGetRepositories',
                ),
                'repositoryNames' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'RepositoryName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 100,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A repository names object is required but was not specified.',
                    'class' => 'RepositoryNamesRequiredException',
                ),
                array(
                    'reason' => 'The maximum number of allowed repository names was exceeded. Currently, this number is 25.',
                    'class' => 'MaximumRepositoryNamesExceededException',
                ),
                array(
                    'reason' => 'At least one specified repository name is not valid. This exception only occurs when a specified repository name is not valid. Other exceptions occur when a required repository parameter is missing, or when a specified repository does not exist.',
                    'class' => 'InvalidRepositoryNameException',
                ),
                array(
                    'reason' => 'An encryption integrity check failed.',
                    'class' => 'EncryptionIntegrityChecksFailedException',
                ),
                array(
                    'reason' => 'An encryption key could not be accessed.',
                    'class' => 'EncryptionKeyAccessDeniedException',
                ),
                array(
                    'reason' => 'The encryption key is disabled.',
                    'class' => 'EncryptionKeyDisabledException',
                ),
                array(
                    'reason' => 'No encryption key was found.',
                    'class' => 'EncryptionKeyNotFoundException',
                ),
                array(
                    'reason' => 'The encryption key is not available.',
                    'class' => 'EncryptionKeyUnavailableException',
                ),
            ),
        ),
        'CreateBranch' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeCommit_20150413.CreateBranch',
                ),
                'repositoryName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'branchName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'commitId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A repository name is required but was not specified.',
                    'class' => 'RepositoryNameRequiredException',
                ),
                array(
                    'reason' => 'At least one specified repository name is not valid. This exception only occurs when a specified repository name is not valid. Other exceptions occur when a required repository parameter is missing, or when a specified repository does not exist.',
                    'class' => 'InvalidRepositoryNameException',
                ),
                array(
                    'reason' => 'The specified repository does not exist.',
                    'class' => 'RepositoryDoesNotExistException',
                ),
                array(
                    'reason' => 'A branch name is required but was not specified.',
                    'class' => 'BranchNameRequiredException',
                ),
                array(
                    'reason' => 'The specified branch name already exists.',
                    'class' => 'BranchNameExistsException',
                ),
                array(
                    'reason' => 'The specified branch name is not valid.',
                    'class' => 'InvalidBranchNameException',
                ),
                array(
                    'reason' => 'A commit ID was not specified.',
                    'class' => 'CommitIdRequiredException',
                ),
                array(
                    'reason' => 'The specified commit does not exist or no commit was specified, and the specified repository has no default branch.',
                    'class' => 'CommitDoesNotExistException',
                ),
                array(
                    'reason' => 'The specified commit ID is not valid.',
                    'class' => 'InvalidCommitIdException',
                ),
                array(
                    'reason' => 'An encryption integrity check failed.',
                    'class' => 'EncryptionIntegrityChecksFailedException',
                ),
                array(
                    'reason' => 'An encryption key could not be accessed.',
                    'class' => 'EncryptionKeyAccessDeniedException',
                ),
                array(
                    'reason' => 'The encryption key is disabled.',
                    'class' => 'EncryptionKeyDisabledException',
                ),
                array(
                    'reason' => 'No encryption key was found.',
                    'class' => 'EncryptionKeyNotFoundException',
                ),
                array(
                    'reason' => 'The encryption key is not available.',
                    'class' => 'EncryptionKeyUnavailableException',
                ),
            ),
        ),
        'CreateRepository' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateRepositoryOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeCommit_20150413.CreateRepository',
                ),
                'repositoryName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'repositoryDescription' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified repository name already exists.',
                    'class' => 'RepositoryNameExistsException',
                ),
                array(
                    'reason' => 'A repository name is required but was not specified.',
                    'class' => 'RepositoryNameRequiredException',
                ),
                array(
                    'reason' => 'At least one specified repository name is not valid. This exception only occurs when a specified repository name is not valid. Other exceptions occur when a required repository parameter is missing, or when a specified repository does not exist.',
                    'class' => 'InvalidRepositoryNameException',
                ),
                array(
                    'reason' => 'The specified repository description is not valid.',
                    'class' => 'InvalidRepositoryDescriptionException',
                ),
                array(
                    'reason' => 'A repository resource limit was exceeded.',
                    'class' => 'RepositoryLimitExceededException',
                ),
                array(
                    'reason' => 'An encryption integrity check failed.',
                    'class' => 'EncryptionIntegrityChecksFailedException',
                ),
                array(
                    'reason' => 'An encryption key could not be accessed.',
                    'class' => 'EncryptionKeyAccessDeniedException',
                ),
                array(
                    'reason' => 'The encryption key is disabled.',
                    'class' => 'EncryptionKeyDisabledException',
                ),
                array(
                    'reason' => 'No encryption key was found.',
                    'class' => 'EncryptionKeyNotFoundException',
                ),
                array(
                    'reason' => 'The encryption key is not available.',
                    'class' => 'EncryptionKeyUnavailableException',
                ),
            ),
        ),
        'DeleteRepository' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteRepositoryOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeCommit_20150413.DeleteRepository',
                ),
                'repositoryName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A repository name is required but was not specified.',
                    'class' => 'RepositoryNameRequiredException',
                ),
                array(
                    'reason' => 'At least one specified repository name is not valid. This exception only occurs when a specified repository name is not valid. Other exceptions occur when a required repository parameter is missing, or when a specified repository does not exist.',
                    'class' => 'InvalidRepositoryNameException',
                ),
                array(
                    'reason' => 'An encryption integrity check failed.',
                    'class' => 'EncryptionIntegrityChecksFailedException',
                ),
                array(
                    'reason' => 'An encryption key could not be accessed.',
                    'class' => 'EncryptionKeyAccessDeniedException',
                ),
                array(
                    'reason' => 'The encryption key is disabled.',
                    'class' => 'EncryptionKeyDisabledException',
                ),
                array(
                    'reason' => 'No encryption key was found.',
                    'class' => 'EncryptionKeyNotFoundException',
                ),
                array(
                    'reason' => 'The encryption key is not available.',
                    'class' => 'EncryptionKeyUnavailableException',
                ),
            ),
        ),
        'GetBranch' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetBranchOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeCommit_20150413.GetBranch',
                ),
                'repositoryName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'branchName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A repository name is required but was not specified.',
                    'class' => 'RepositoryNameRequiredException',
                ),
                array(
                    'reason' => 'The specified repository does not exist.',
                    'class' => 'RepositoryDoesNotExistException',
                ),
                array(
                    'reason' => 'At least one specified repository name is not valid. This exception only occurs when a specified repository name is not valid. Other exceptions occur when a required repository parameter is missing, or when a specified repository does not exist.',
                    'class' => 'InvalidRepositoryNameException',
                ),
                array(
                    'reason' => 'A branch name is required but was not specified.',
                    'class' => 'BranchNameRequiredException',
                ),
                array(
                    'reason' => 'The specified branch name is not valid.',
                    'class' => 'InvalidBranchNameException',
                ),
                array(
                    'reason' => 'The specified branch does not exist.',
                    'class' => 'BranchDoesNotExistException',
                ),
                array(
                    'reason' => 'An encryption integrity check failed.',
                    'class' => 'EncryptionIntegrityChecksFailedException',
                ),
                array(
                    'reason' => 'An encryption key could not be accessed.',
                    'class' => 'EncryptionKeyAccessDeniedException',
                ),
                array(
                    'reason' => 'The encryption key is disabled.',
                    'class' => 'EncryptionKeyDisabledException',
                ),
                array(
                    'reason' => 'No encryption key was found.',
                    'class' => 'EncryptionKeyNotFoundException',
                ),
                array(
                    'reason' => 'The encryption key is not available.',
                    'class' => 'EncryptionKeyUnavailableException',
                ),
            ),
        ),
        'GetRepository' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetRepositoryOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeCommit_20150413.GetRepository',
                ),
                'repositoryName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A repository name is required but was not specified.',
                    'class' => 'RepositoryNameRequiredException',
                ),
                array(
                    'reason' => 'The specified repository does not exist.',
                    'class' => 'RepositoryDoesNotExistException',
                ),
                array(
                    'reason' => 'At least one specified repository name is not valid. This exception only occurs when a specified repository name is not valid. Other exceptions occur when a required repository parameter is missing, or when a specified repository does not exist.',
                    'class' => 'InvalidRepositoryNameException',
                ),
                array(
                    'reason' => 'An encryption integrity check failed.',
                    'class' => 'EncryptionIntegrityChecksFailedException',
                ),
                array(
                    'reason' => 'An encryption key could not be accessed.',
                    'class' => 'EncryptionKeyAccessDeniedException',
                ),
                array(
                    'reason' => 'The encryption key is disabled.',
                    'class' => 'EncryptionKeyDisabledException',
                ),
                array(
                    'reason' => 'No encryption key was found.',
                    'class' => 'EncryptionKeyNotFoundException',
                ),
                array(
                    'reason' => 'The encryption key is not available.',
                    'class' => 'EncryptionKeyUnavailableException',
                ),
            ),
        ),
        'ListBranches' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListBranchesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeCommit_20150413.ListBranches',
                ),
                'repositoryName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A repository name is required but was not specified.',
                    'class' => 'RepositoryNameRequiredException',
                ),
                array(
                    'reason' => 'The specified repository does not exist.',
                    'class' => 'RepositoryDoesNotExistException',
                ),
                array(
                    'reason' => 'At least one specified repository name is not valid. This exception only occurs when a specified repository name is not valid. Other exceptions occur when a required repository parameter is missing, or when a specified repository does not exist.',
                    'class' => 'InvalidRepositoryNameException',
                ),
                array(
                    'reason' => 'An encryption integrity check failed.',
                    'class' => 'EncryptionIntegrityChecksFailedException',
                ),
                array(
                    'reason' => 'An encryption key could not be accessed.',
                    'class' => 'EncryptionKeyAccessDeniedException',
                ),
                array(
                    'reason' => 'The encryption key is disabled.',
                    'class' => 'EncryptionKeyDisabledException',
                ),
                array(
                    'reason' => 'No encryption key was found.',
                    'class' => 'EncryptionKeyNotFoundException',
                ),
                array(
                    'reason' => 'The encryption key is not available.',
                    'class' => 'EncryptionKeyUnavailableException',
                ),
                array(
                    'reason' => 'The specified continuation token is not valid.',
                    'class' => 'InvalidContinuationTokenException',
                ),
            ),
        ),
        'ListRepositories' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListRepositoriesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeCommit_20150413.ListRepositories',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'sortBy' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'order' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified sort by value is not valid.',
                    'class' => 'InvalidSortByException',
                ),
                array(
                    'reason' => 'The specified sort order is not valid.',
                    'class' => 'InvalidOrderException',
                ),
                array(
                    'reason' => 'The specified continuation token is not valid.',
                    'class' => 'InvalidContinuationTokenException',
                ),
            ),
        ),
        'UpdateDefaultBranch' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeCommit_20150413.UpdateDefaultBranch',
                ),
                'repositoryName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'defaultBranchName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A repository name is required but was not specified.',
                    'class' => 'RepositoryNameRequiredException',
                ),
                array(
                    'reason' => 'The specified repository does not exist.',
                    'class' => 'RepositoryDoesNotExistException',
                ),
                array(
                    'reason' => 'At least one specified repository name is not valid. This exception only occurs when a specified repository name is not valid. Other exceptions occur when a required repository parameter is missing, or when a specified repository does not exist.',
                    'class' => 'InvalidRepositoryNameException',
                ),
                array(
                    'reason' => 'A branch name is required but was not specified.',
                    'class' => 'BranchNameRequiredException',
                ),
                array(
                    'reason' => 'The specified branch name is not valid.',
                    'class' => 'InvalidBranchNameException',
                ),
                array(
                    'reason' => 'The specified branch does not exist.',
                    'class' => 'BranchDoesNotExistException',
                ),
                array(
                    'reason' => 'An encryption integrity check failed.',
                    'class' => 'EncryptionIntegrityChecksFailedException',
                ),
                array(
                    'reason' => 'An encryption key could not be accessed.',
                    'class' => 'EncryptionKeyAccessDeniedException',
                ),
                array(
                    'reason' => 'The encryption key is disabled.',
                    'class' => 'EncryptionKeyDisabledException',
                ),
                array(
                    'reason' => 'No encryption key was found.',
                    'class' => 'EncryptionKeyNotFoundException',
                ),
                array(
                    'reason' => 'The encryption key is not available.',
                    'class' => 'EncryptionKeyUnavailableException',
                ),
            ),
        ),
        'UpdateRepositoryDescription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeCommit_20150413.UpdateRepositoryDescription',
                ),
                'repositoryName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'repositoryDescription' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A repository name is required but was not specified.',
                    'class' => 'RepositoryNameRequiredException',
                ),
                array(
                    'reason' => 'The specified repository does not exist.',
                    'class' => 'RepositoryDoesNotExistException',
                ),
                array(
                    'reason' => 'At least one specified repository name is not valid. This exception only occurs when a specified repository name is not valid. Other exceptions occur when a required repository parameter is missing, or when a specified repository does not exist.',
                    'class' => 'InvalidRepositoryNameException',
                ),
                array(
                    'reason' => 'The specified repository description is not valid.',
                    'class' => 'InvalidRepositoryDescriptionException',
                ),
                array(
                    'reason' => 'An encryption integrity check failed.',
                    'class' => 'EncryptionIntegrityChecksFailedException',
                ),
                array(
                    'reason' => 'An encryption key could not be accessed.',
                    'class' => 'EncryptionKeyAccessDeniedException',
                ),
                array(
                    'reason' => 'The encryption key is disabled.',
                    'class' => 'EncryptionKeyDisabledException',
                ),
                array(
                    'reason' => 'No encryption key was found.',
                    'class' => 'EncryptionKeyNotFoundException',
                ),
                array(
                    'reason' => 'The encryption key is not available.',
                    'class' => 'EncryptionKeyUnavailableException',
                ),
            ),
        ),
        'UpdateRepositoryName' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CodeCommit_20150413.UpdateRepositoryName',
                ),
                'oldName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'newName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified repository does not exist.',
                    'class' => 'RepositoryDoesNotExistException',
                ),
                array(
                    'reason' => 'The specified repository name already exists.',
                    'class' => 'RepositoryNameExistsException',
                ),
                array(
                    'reason' => 'A repository name is required but was not specified.',
                    'class' => 'RepositoryNameRequiredException',
                ),
                array(
                    'reason' => 'At least one specified repository name is not valid. This exception only occurs when a specified repository name is not valid. Other exceptions occur when a required repository parameter is missing, or when a specified repository does not exist.',
                    'class' => 'InvalidRepositoryNameException',
                ),
            ),
        ),
    ),
    'models' => array(
        'BatchGetRepositoriesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'repositories' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'RepositoryMetadata',
                        'type' => 'object',
                        'properties' => array(
                            'accountId' => array(
                                'type' => 'string',
                            ),
                            'repositoryId' => array(
                                'type' => 'string',
                            ),
                            'repositoryName' => array(
                                'type' => 'string',
                            ),
                            'repositoryDescription' => array(
                                'type' => 'string',
                            ),
                            'defaultBranch' => array(
                                'type' => 'string',
                            ),
                            'lastModifiedDate' => array(
                                'type' => 'string',
                            ),
                            'creationDate' => array(
                                'type' => 'string',
                            ),
                            'cloneUrlHttp' => array(
                                'type' => 'string',
                            ),
                            'cloneUrlSsh' => array(
                                'type' => 'string',
                            ),
                            'Arn' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'repositoriesNotFound' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'RepositoryName',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'CreateRepositoryOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'repositoryMetadata' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'accountId' => array(
                            'type' => 'string',
                        ),
                        'repositoryId' => array(
                            'type' => 'string',
                        ),
                        'repositoryName' => array(
                            'type' => 'string',
                        ),
                        'repositoryDescription' => array(
                            'type' => 'string',
                        ),
                        'defaultBranch' => array(
                            'type' => 'string',
                        ),
                        'lastModifiedDate' => array(
                            'type' => 'string',
                        ),
                        'creationDate' => array(
                            'type' => 'string',
                        ),
                        'cloneUrlHttp' => array(
                            'type' => 'string',
                        ),
                        'cloneUrlSsh' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DeleteRepositoryOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'repositoryId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetBranchOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'branch' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'branchName' => array(
                            'type' => 'string',
                        ),
                        'commitId' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetRepositoryOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'repositoryMetadata' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'accountId' => array(
                            'type' => 'string',
                        ),
                        'repositoryId' => array(
                            'type' => 'string',
                        ),
                        'repositoryName' => array(
                            'type' => 'string',
                        ),
                        'repositoryDescription' => array(
                            'type' => 'string',
                        ),
                        'defaultBranch' => array(
                            'type' => 'string',
                        ),
                        'lastModifiedDate' => array(
                            'type' => 'string',
                        ),
                        'creationDate' => array(
                            'type' => 'string',
                        ),
                        'cloneUrlHttp' => array(
                            'type' => 'string',
                        ),
                        'cloneUrlSsh' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'ListBranchesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'branches' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'BranchName',
                        'type' => 'string',
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListRepositoriesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'repositories' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'RepositoryNameIdPair',
                        'type' => 'object',
                        'properties' => array(
                            'repositoryName' => array(
                                'type' => 'string',
                            ),
                            'repositoryId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListBranches' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'branches',
        ),
        'ListRepositories' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'repositories',
        ),
    ),
);
