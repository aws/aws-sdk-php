<?php
namespace Aws\BedrockAgentCoreControl;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Bedrock Agent Core Control Plane Fronting Layer** service.
 * @method \Aws\Result addDatasetExamples(array $args = [])
 * @phpstan-method \Aws\Result addDatasetExamples(array{
 *     datasetId?: string,
 *     clientToken?: string,
 *     source?: array{inlineExamples?: array{examples?: list<array>, ...}, s3Source?: array{s3Uri?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addDatasetExamplesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addDatasetExamplesAsync(array{
 *     datasetId?: string,
 *     clientToken?: string,
 *     source?: array{inlineExamples?: array{examples?: list<array>, ...}, s3Source?: array{s3Uri?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgentRuntime(array $args = [])
 * @phpstan-method \Aws\Result createAgentRuntime(array{
 *     agentRuntimeName?: string,
 *     agentRuntimeArtifact?: array{
 *         containerConfiguration?: array{containerUri?: string, ...},
 *         codeConfiguration?: array{
 *             code?: array,
 *             runtime?: 'NODE_22'|'PYTHON_3_10'|'PYTHON_3_11'|'PYTHON_3_12'|'PYTHON_3_13'|'PYTHON_3_14',
 *             entryPoint?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     roleArn?: string,
 *     networkConfiguration?: array{
 *         networkMode?: 'PUBLIC'|'VPC',
 *         networkModeConfig?: array{securityGroups?: list<string>, subnets?: list<string>, requireServiceS3Endpoint?: bool, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     description?: string,
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     requestHeaderConfiguration?: array{requestHeaderAllowlist?: list<string>, ...},
 *     protocolConfiguration?: array{serverProtocol?: 'A2A'|'AGUI'|'HTTP'|'MCP', ...},
 *     lifecycleConfiguration?: array{idleRuntimeSessionTimeout?: int, maxLifetime?: int, ...},
 *     environmentVariables?: array<string, string>,
 *     filesystemConfigurations?: list<array{sessionStorage?: array, s3FilesAccessPoint?: array, efsAccessPoint?: array, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentRuntimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentRuntimeAsync(array{
 *     agentRuntimeName?: string,
 *     agentRuntimeArtifact?: array{
 *         containerConfiguration?: array{containerUri?: string, ...},
 *         codeConfiguration?: array{
 *             code?: array,
 *             runtime?: 'NODE_22'|'PYTHON_3_10'|'PYTHON_3_11'|'PYTHON_3_12'|'PYTHON_3_13'|'PYTHON_3_14',
 *             entryPoint?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     roleArn?: string,
 *     networkConfiguration?: array{
 *         networkMode?: 'PUBLIC'|'VPC',
 *         networkModeConfig?: array{securityGroups?: list<string>, subnets?: list<string>, requireServiceS3Endpoint?: bool, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     description?: string,
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     requestHeaderConfiguration?: array{requestHeaderAllowlist?: list<string>, ...},
 *     protocolConfiguration?: array{serverProtocol?: 'A2A'|'AGUI'|'HTTP'|'MCP', ...},
 *     lifecycleConfiguration?: array{idleRuntimeSessionTimeout?: int, maxLifetime?: int, ...},
 *     environmentVariables?: array<string, string>,
 *     filesystemConfigurations?: list<array{sessionStorage?: array, s3FilesAccessPoint?: array, efsAccessPoint?: array, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgentRuntimeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createAgentRuntimeEndpoint(array{
 *     agentRuntimeId?: string,
 *     name?: string,
 *     agentRuntimeVersion?: string,
 *     description?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentRuntimeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentRuntimeEndpointAsync(array{
 *     agentRuntimeId?: string,
 *     name?: string,
 *     agentRuntimeVersion?: string,
 *     description?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApiKeyCredentialProvider(array $args = [])
 * @phpstan-method \Aws\Result createApiKeyCredentialProvider(array{
 *     name?: string,
 *     apiKey?: string,
 *     apiKeySecretConfig?: array{secretId?: string, jsonKey?: string, ...},
 *     apiKeySecretSource?: 'EXTERNAL'|'MANAGED',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApiKeyCredentialProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApiKeyCredentialProviderAsync(array{
 *     name?: string,
 *     apiKey?: string,
 *     apiKeySecretConfig?: array{secretId?: string, jsonKey?: string, ...},
 *     apiKeySecretSource?: 'EXTERNAL'|'MANAGED',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBrowser(array $args = [])
 * @phpstan-method \Aws\Result createBrowser(array{
 *     name?: string,
 *     description?: string,
 *     executionRoleArn?: string,
 *     networkConfiguration?: array{
 *         networkMode?: 'PUBLIC'|'VPC',
 *         vpcConfig?: array{securityGroups?: list<string>, subnets?: list<string>, requireServiceS3Endpoint?: bool, ...},
 *         ...,
 *     },
 *     recording?: array{enabled?: bool, s3Location?: array{bucket?: string, prefix?: string, versionId?: string, ...}, ...},
 *     browserSigning?: array{enabled?: bool, ...},
 *     enterprisePolicies?: list<array{location?: array, type?: 'MANAGED'|'RECOMMENDED', ...}>,
 *     certificates?: list<array{location?: array, ...}>,
 *     filesystemConfigurations?: list<array{s3FilesConfiguration?: array, efsConfiguration?: array, ...}>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBrowserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBrowserAsync(array{
 *     name?: string,
 *     description?: string,
 *     executionRoleArn?: string,
 *     networkConfiguration?: array{
 *         networkMode?: 'PUBLIC'|'VPC',
 *         vpcConfig?: array{securityGroups?: list<string>, subnets?: list<string>, requireServiceS3Endpoint?: bool, ...},
 *         ...,
 *     },
 *     recording?: array{enabled?: bool, s3Location?: array{bucket?: string, prefix?: string, versionId?: string, ...}, ...},
 *     browserSigning?: array{enabled?: bool, ...},
 *     enterprisePolicies?: list<array{location?: array, type?: 'MANAGED'|'RECOMMENDED', ...}>,
 *     certificates?: list<array{location?: array, ...}>,
 *     filesystemConfigurations?: list<array{s3FilesConfiguration?: array, efsConfiguration?: array, ...}>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBrowserProfile(array $args = [])
 * @phpstan-method \Aws\Result createBrowserProfile(array{name?: string, description?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBrowserProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBrowserProfileAsync(array{name?: string, description?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createCodeInterpreter(array $args = [])
 * @phpstan-method \Aws\Result createCodeInterpreter(array{
 *     name?: string,
 *     description?: string,
 *     executionRoleArn?: string,
 *     networkConfiguration?: array{
 *         networkMode?: 'PUBLIC'|'SANDBOX'|'VPC',
 *         vpcConfig?: array{securityGroups?: list<string>, subnets?: list<string>, requireServiceS3Endpoint?: bool, ...},
 *         ...,
 *     },
 *     certificates?: list<array{location?: array, ...}>,
 *     filesystemConfigurations?: list<array{s3FilesConfiguration?: array, efsConfiguration?: array, ...}>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCodeInterpreterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCodeInterpreterAsync(array{
 *     name?: string,
 *     description?: string,
 *     executionRoleArn?: string,
 *     networkConfiguration?: array{
 *         networkMode?: 'PUBLIC'|'SANDBOX'|'VPC',
 *         vpcConfig?: array{securityGroups?: list<string>, subnets?: list<string>, requireServiceS3Endpoint?: bool, ...},
 *         ...,
 *     },
 *     certificates?: list<array{location?: array, ...}>,
 *     filesystemConfigurations?: list<array{s3FilesConfiguration?: array, efsConfiguration?: array, ...}>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfigurationBundle(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationBundle(array{
 *     clientToken?: string,
 *     bundleName?: string,
 *     description?: string,
 *     components?: array<string, array{configuration?: array, ...}>,
 *     branchName?: string,
 *     commitMessage?: string,
 *     createdBy?: array{name?: string, arn?: string, ...},
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationBundleAsync(array{
 *     clientToken?: string,
 *     bundleName?: string,
 *     description?: string,
 *     components?: array<string, array{configuration?: array, ...}>,
 *     branchName?: string,
 *     commitMessage?: string,
 *     createdBy?: array{name?: string, arn?: string, ...},
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataset(array $args = [])
 * @phpstan-method \Aws\Result createDataset(array{
 *     clientToken?: string,
 *     datasetName?: string,
 *     description?: string,
 *     source?: array{inlineExamples?: array{examples?: list<array>, ...}, s3Source?: array{s3Uri?: string, ...}, ...},
 *     schemaType?: 'AGENTCORE_EVALUATION_PREDEFINED_V1'|'AGENTCORE_EVALUATION_SIMULATED_V1',
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetAsync(array{
 *     clientToken?: string,
 *     datasetName?: string,
 *     description?: string,
 *     source?: array{inlineExamples?: array{examples?: list<array>, ...}, s3Source?: array{s3Uri?: string, ...}, ...},
 *     schemaType?: 'AGENTCORE_EVALUATION_PREDEFINED_V1'|'AGENTCORE_EVALUATION_SIMULATED_V1',
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDatasetVersion(array $args = [])
 * @phpstan-method \Aws\Result createDatasetVersion(array{datasetId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetVersionAsync(array{datasetId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createEvaluator(array $args = [])
 * @phpstan-method \Aws\Result createEvaluator(array{
 *     clientToken?: string,
 *     evaluatorName?: string,
 *     description?: string,
 *     evaluatorConfig?: array{
 *         llmAsAJudge?: array{instructions?: string, ratingScale?: array, modelConfig?: array, ...},
 *         codeBased?: array{lambdaConfig?: array, ...},
 *         ...,
 *     },
 *     level?: 'SESSION'|'TOOL_CALL'|'TRACE',
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEvaluatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEvaluatorAsync(array{
 *     clientToken?: string,
 *     evaluatorName?: string,
 *     description?: string,
 *     evaluatorConfig?: array{
 *         llmAsAJudge?: array{instructions?: string, ratingScale?: array, modelConfig?: array, ...},
 *         codeBased?: array{lambdaConfig?: array, ...},
 *         ...,
 *     },
 *     level?: 'SESSION'|'TOOL_CALL'|'TRACE',
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGateway(array $args = [])
 * @phpstan-method \Aws\Result createGateway(array{
 *     name?: string,
 *     description?: string,
 *     clientToken?: string,
 *     roleArn?: string,
 *     protocolType?: 'MCP',
 *     protocolConfiguration?: array{
 *         mcp?: array{
 *             supportedVersions?: list<string>,
 *             instructions?: string,
 *             searchType?: 'SEMANTIC',
 *             sessionConfiguration?: array,
 *             streamingConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     authorizerType?: 'AUTHENTICATE_ONLY'|'AWS_IAM'|'CUSTOM_JWT'|'NONE',
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     kmsKeyArn?: string,
 *     interceptorConfigurations?: list<array{interceptor?: array, interceptionPoints?: list<'REQUEST'|'RESPONSE'>, inputConfiguration?: array, ...}>,
 *     policyEngineConfiguration?: array{arn?: string, mode?: 'ENFORCE'|'LOG_ONLY', ...},
 *     exceptionLevel?: 'DEBUG',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGatewayAsync(array{
 *     name?: string,
 *     description?: string,
 *     clientToken?: string,
 *     roleArn?: string,
 *     protocolType?: 'MCP',
 *     protocolConfiguration?: array{
 *         mcp?: array{
 *             supportedVersions?: list<string>,
 *             instructions?: string,
 *             searchType?: 'SEMANTIC',
 *             sessionConfiguration?: array,
 *             streamingConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     authorizerType?: 'AUTHENTICATE_ONLY'|'AWS_IAM'|'CUSTOM_JWT'|'NONE',
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     kmsKeyArn?: string,
 *     interceptorConfigurations?: list<array{interceptor?: array, interceptionPoints?: list<'REQUEST'|'RESPONSE'>, inputConfiguration?: array, ...}>,
 *     policyEngineConfiguration?: array{arn?: string, mode?: 'ENFORCE'|'LOG_ONLY', ...},
 *     exceptionLevel?: 'DEBUG',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGatewayRule(array $args = [])
 * @phpstan-method \Aws\Result createGatewayRule(array{
 *     gatewayIdentifier?: string,
 *     clientToken?: string,
 *     priority?: int,
 *     conditions?: list<array{matchPrincipals?: array, matchPaths?: array, ...}>,
 *     actions?: list<array{configurationBundle?: array, routeToTarget?: array, ...}>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGatewayRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGatewayRuleAsync(array{
 *     gatewayIdentifier?: string,
 *     clientToken?: string,
 *     priority?: int,
 *     conditions?: list<array{matchPrincipals?: array, matchPaths?: array, ...}>,
 *     actions?: list<array{configurationBundle?: array, routeToTarget?: array, ...}>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGatewayTarget(array $args = [])
 * @phpstan-method \Aws\Result createGatewayTarget(array{
 *     gatewayIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     clientToken?: string,
 *     targetConfiguration?: array{
 *         mcp?: array{
 *             openApiSchema?: array,
 *             smithyModel?: array,
 *             lambda?: array,
 *             mcpServer?: array,
 *             apiGateway?: array,
 *             connector?: array,
 *             ...,
 *         },
 *         http?: array{agentcoreRuntime?: array, passthrough?: array, ...},
 *         inference?: array{connector?: array, provider?: array, ...},
 *         ...,
 *     },
 *     credentialProviderConfigurations?: list<array{
 *         credentialProviderType?: 'API_KEY'|'CALLER_IAM_CREDENTIALS'|'GATEWAY_IAM_ROLE'|'JWT_PASSTHROUGH'|'OAUTH',
 *         credentialProvider?: array,
 *         ...,
 *     }>,
 *     metadataConfiguration?: array{
 *         allowedRequestHeaders?: list<string>,
 *         allowedQueryParameters?: list<string>,
 *         allowedResponseHeaders?: list<string>,
 *         ...,
 *     },
 *     privateEndpoint?: array{
 *         selfManagedLatticeResource?: array{resourceConfigurationIdentifier?: string, ...},
 *         managedVpcResource?: array{
 *             vpcIdentifier?: string,
 *             subnetIds?: list<string>,
 *             endpointIpAddressType?: 'IPV4'|'IPV6',
 *             securityGroupIds?: list<string>,
 *             tags?: array<string, string>,
 *             routingDomain?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGatewayTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGatewayTargetAsync(array{
 *     gatewayIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     clientToken?: string,
 *     targetConfiguration?: array{
 *         mcp?: array{
 *             openApiSchema?: array,
 *             smithyModel?: array,
 *             lambda?: array,
 *             mcpServer?: array,
 *             apiGateway?: array,
 *             connector?: array,
 *             ...,
 *         },
 *         http?: array{agentcoreRuntime?: array, passthrough?: array, ...},
 *         inference?: array{connector?: array, provider?: array, ...},
 *         ...,
 *     },
 *     credentialProviderConfigurations?: list<array{
 *         credentialProviderType?: 'API_KEY'|'CALLER_IAM_CREDENTIALS'|'GATEWAY_IAM_ROLE'|'JWT_PASSTHROUGH'|'OAUTH',
 *         credentialProvider?: array,
 *         ...,
 *     }>,
 *     metadataConfiguration?: array{
 *         allowedRequestHeaders?: list<string>,
 *         allowedQueryParameters?: list<string>,
 *         allowedResponseHeaders?: list<string>,
 *         ...,
 *     },
 *     privateEndpoint?: array{
 *         selfManagedLatticeResource?: array{resourceConfigurationIdentifier?: string, ...},
 *         managedVpcResource?: array{
 *             vpcIdentifier?: string,
 *             subnetIds?: list<string>,
 *             endpointIpAddressType?: 'IPV4'|'IPV6',
 *             securityGroupIds?: list<string>,
 *             tags?: array<string, string>,
 *             routingDomain?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHarness(array $args = [])
 * @phpstan-method \Aws\Result createHarness(array{
 *     harnessName?: string,
 *     clientToken?: string,
 *     executionRoleArn?: string,
 *     environment?: array{
 *         agentCoreRuntimeEnvironment?: array{
 *             lifecycleConfiguration?: array,
 *             networkConfiguration?: array,
 *             filesystemConfigurations?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     environmentArtifact?: array{containerConfiguration?: array{containerUri?: string, ...}, ...},
 *     environmentVariables?: array<string, string>,
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     model?: array{
 *         bedrockModelConfig?: array{
 *             modelId?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             apiFormat?: 'chat_completions'|'converse_stream'|'responses',
 *             additionalParams?: array,
 *             ...,
 *         },
 *         openAiModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             apiFormat?: 'chat_completions'|'responses',
 *             additionalParams?: array,
 *             ...,
 *         },
 *         geminiModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             topK?: int,
 *             additionalParams?: array,
 *             ...,
 *         },
 *         liteLlmModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             apiBase?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             additionalParams?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     systemPrompt?: list<array{text?: string, ...}>,
 *     tools?: list<array{
 *         type?: 'agentcore_browser'|'agentcore_code_interpreter'|'agentcore_gateway'|'inline_function'|'remote_mcp',
 *         name?: string,
 *         config?: array,
 *         ...,
 *     }>,
 *     skills?: list<array{path?: string, s3?: array, git?: array, awsSkills?: array, ...}>,
 *     allowedTools?: list<string>,
 *     memory?: array{
 *         agentCoreMemoryConfiguration?: array{arn?: string, actorId?: string, messagesCount?: int, retrievalConfig?: array<string, array>, ...},
 *         managedMemoryConfiguration?: array{
 *             arn?: string,
 *             strategies?: list<'EPISODIC'|'SEMANTIC'|'SUMMARIZATION'|'USER_PREFERENCE'>,
 *             eventExpiryDuration?: int,
 *             encryptionKeyArn?: string,
 *             ...,
 *         },
 *         disabled?: array,
 *         ...,
 *     },
 *     truncation?: array{
 *         strategy?: 'none'|'sliding_window'|'summarization',
 *         config?: array{slidingWindow?: array, summarization?: array, ...},
 *         ...,
 *     },
 *     maxIterations?: int,
 *     maxTokens?: int,
 *     timeoutSeconds?: int,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHarnessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHarnessAsync(array{
 *     harnessName?: string,
 *     clientToken?: string,
 *     executionRoleArn?: string,
 *     environment?: array{
 *         agentCoreRuntimeEnvironment?: array{
 *             lifecycleConfiguration?: array,
 *             networkConfiguration?: array,
 *             filesystemConfigurations?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     environmentArtifact?: array{containerConfiguration?: array{containerUri?: string, ...}, ...},
 *     environmentVariables?: array<string, string>,
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     model?: array{
 *         bedrockModelConfig?: array{
 *             modelId?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             apiFormat?: 'chat_completions'|'converse_stream'|'responses',
 *             additionalParams?: array,
 *             ...,
 *         },
 *         openAiModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             apiFormat?: 'chat_completions'|'responses',
 *             additionalParams?: array,
 *             ...,
 *         },
 *         geminiModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             topK?: int,
 *             additionalParams?: array,
 *             ...,
 *         },
 *         liteLlmModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             apiBase?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             additionalParams?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     systemPrompt?: list<array{text?: string, ...}>,
 *     tools?: list<array{
 *         type?: 'agentcore_browser'|'agentcore_code_interpreter'|'agentcore_gateway'|'inline_function'|'remote_mcp',
 *         name?: string,
 *         config?: array,
 *         ...,
 *     }>,
 *     skills?: list<array{path?: string, s3?: array, git?: array, awsSkills?: array, ...}>,
 *     allowedTools?: list<string>,
 *     memory?: array{
 *         agentCoreMemoryConfiguration?: array{arn?: string, actorId?: string, messagesCount?: int, retrievalConfig?: array<string, array>, ...},
 *         managedMemoryConfiguration?: array{
 *             arn?: string,
 *             strategies?: list<'EPISODIC'|'SEMANTIC'|'SUMMARIZATION'|'USER_PREFERENCE'>,
 *             eventExpiryDuration?: int,
 *             encryptionKeyArn?: string,
 *             ...,
 *         },
 *         disabled?: array,
 *         ...,
 *     },
 *     truncation?: array{
 *         strategy?: 'none'|'sliding_window'|'summarization',
 *         config?: array{slidingWindow?: array, summarization?: array, ...},
 *         ...,
 *     },
 *     maxIterations?: int,
 *     maxTokens?: int,
 *     timeoutSeconds?: int,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHarnessEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createHarnessEndpoint(array{
 *     harnessId?: string,
 *     endpointName?: string,
 *     targetVersion?: string,
 *     description?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHarnessEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHarnessEndpointAsync(array{
 *     harnessId?: string,
 *     endpointName?: string,
 *     targetVersion?: string,
 *     description?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMemory(array $args = [])
 * @phpstan-method \Aws\Result createMemory(array{
 *     clientToken?: string,
 *     name?: string,
 *     description?: string,
 *     encryptionKeyArn?: string,
 *     memoryExecutionRoleArn?: string,
 *     eventExpiryDuration?: int,
 *     memoryStrategies?: list<array{
 *         semanticMemoryStrategy?: array,
 *         summaryMemoryStrategy?: array,
 *         userPreferenceMemoryStrategy?: array,
 *         customMemoryStrategy?: array,
 *         episodicMemoryStrategy?: array,
 *         ...,
 *     }>,
 *     indexedKeys?: list<array{key?: string, type?: 'NUMBER'|'STRING'|'STRINGLIST', ...}>,
 *     streamDeliveryResources?: array{resources?: list<array>, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMemoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMemoryAsync(array{
 *     clientToken?: string,
 *     name?: string,
 *     description?: string,
 *     encryptionKeyArn?: string,
 *     memoryExecutionRoleArn?: string,
 *     eventExpiryDuration?: int,
 *     memoryStrategies?: list<array{
 *         semanticMemoryStrategy?: array,
 *         summaryMemoryStrategy?: array,
 *         userPreferenceMemoryStrategy?: array,
 *         customMemoryStrategy?: array,
 *         episodicMemoryStrategy?: array,
 *         ...,
 *     }>,
 *     indexedKeys?: list<array{key?: string, type?: 'NUMBER'|'STRING'|'STRINGLIST', ...}>,
 *     streamDeliveryResources?: array{resources?: list<array>, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOauth2CredentialProvider(array $args = [])
 * @phpstan-method \Aws\Result createOauth2CredentialProvider(array{
 *     name?: string,
 *     credentialProviderVendor?: 'AtlassianOauth2'|'Auth0Oauth2'|'CognitoOauth2'|'CustomOauth2'|'CyberArkOauth2'|'DropboxOauth2'|'FacebookOauth2'|'FusionAuthOauth2'|'GithubOauth2'|'GoogleOauth2'|'HubspotOauth2'|'LinkedinOauth2'|'MicrosoftOauth2'|'NotionOauth2'|'OktaOauth2'|'OneLoginOauth2'|'PingOneOauth2'|'RedditOauth2'|'SalesforceOauth2'|'SlackOauth2'|'SpotifyOauth2'|'TwitchOauth2'|'XOauth2'|'YandexOauth2'|'ZoomOauth2',
 *     oauth2ProviderConfigInput?: array{
 *         customOauth2ProviderConfig?: array{
 *             oauthDiscovery?: array,
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             onBehalfOfTokenExchangeConfig?: array,
 *             clientAuthenticationMethod?: 'AWS_IAM_ID_TOKEN_JWT'|'CLIENT_SECRET_BASIC'|'CLIENT_SECRET_POST',
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             ...,
 *         },
 *         googleOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         githubOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         slackOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         salesforceOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         microsoftOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             tenantId?: string,
 *             ...,
 *         },
 *         atlassianOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         linkedinOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         includedOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             issuer?: string,
 *             authorizationEndpoint?: string,
 *             tokenEndpoint?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOauth2CredentialProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOauth2CredentialProviderAsync(array{
 *     name?: string,
 *     credentialProviderVendor?: 'AtlassianOauth2'|'Auth0Oauth2'|'CognitoOauth2'|'CustomOauth2'|'CyberArkOauth2'|'DropboxOauth2'|'FacebookOauth2'|'FusionAuthOauth2'|'GithubOauth2'|'GoogleOauth2'|'HubspotOauth2'|'LinkedinOauth2'|'MicrosoftOauth2'|'NotionOauth2'|'OktaOauth2'|'OneLoginOauth2'|'PingOneOauth2'|'RedditOauth2'|'SalesforceOauth2'|'SlackOauth2'|'SpotifyOauth2'|'TwitchOauth2'|'XOauth2'|'YandexOauth2'|'ZoomOauth2',
 *     oauth2ProviderConfigInput?: array{
 *         customOauth2ProviderConfig?: array{
 *             oauthDiscovery?: array,
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             onBehalfOfTokenExchangeConfig?: array,
 *             clientAuthenticationMethod?: 'AWS_IAM_ID_TOKEN_JWT'|'CLIENT_SECRET_BASIC'|'CLIENT_SECRET_POST',
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             ...,
 *         },
 *         googleOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         githubOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         slackOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         salesforceOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         microsoftOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             tenantId?: string,
 *             ...,
 *         },
 *         atlassianOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         linkedinOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         includedOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             issuer?: string,
 *             authorizationEndpoint?: string,
 *             tokenEndpoint?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOnlineEvaluationConfig(array $args = [])
 * @phpstan-method \Aws\Result createOnlineEvaluationConfig(array{
 *     clientToken?: string,
 *     onlineEvaluationConfigName?: string,
 *     description?: string,
 *     rule?: array{
 *         samplingConfig?: array{samplingPercentage?: float, ...},
 *         filters?: list<array>,
 *         sessionConfig?: array{sessionTimeoutMinutes?: int, ...},
 *         ...,
 *     },
 *     dataSourceConfig?: array{cloudWatchLogs?: array{logGroupNames?: list<string>, serviceNames?: list<string>, ...}, ...},
 *     evaluators?: list<array{evaluatorId?: string, ...}>,
 *     insights?: list<array{insightId?: string, ...}>,
 *     clusteringConfig?: array{frequencies?: list<'DAILY'|'MONTHLY'|'WEEKLY'>, ...},
 *     evaluationExecutionRoleArn?: string,
 *     enableOnCreate?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOnlineEvaluationConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOnlineEvaluationConfigAsync(array{
 *     clientToken?: string,
 *     onlineEvaluationConfigName?: string,
 *     description?: string,
 *     rule?: array{
 *         samplingConfig?: array{samplingPercentage?: float, ...},
 *         filters?: list<array>,
 *         sessionConfig?: array{sessionTimeoutMinutes?: int, ...},
 *         ...,
 *     },
 *     dataSourceConfig?: array{cloudWatchLogs?: array{logGroupNames?: list<string>, serviceNames?: list<string>, ...}, ...},
 *     evaluators?: list<array{evaluatorId?: string, ...}>,
 *     insights?: list<array{insightId?: string, ...}>,
 *     clusteringConfig?: array{frequencies?: list<'DAILY'|'MONTHLY'|'WEEKLY'>, ...},
 *     evaluationExecutionRoleArn?: string,
 *     enableOnCreate?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPaymentConnector(array $args = [])
 * @phpstan-method \Aws\Result createPaymentConnector(array{
 *     paymentManagerId?: string,
 *     name?: string,
 *     description?: string,
 *     type?: 'CoinbaseCDP'|'StripePrivy',
 *     credentialProviderConfigurations?: list<array{coinbaseCDP?: array, stripePrivy?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPaymentConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPaymentConnectorAsync(array{
 *     paymentManagerId?: string,
 *     name?: string,
 *     description?: string,
 *     type?: 'CoinbaseCDP'|'StripePrivy',
 *     credentialProviderConfigurations?: list<array{coinbaseCDP?: array, stripePrivy?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPaymentCredentialProvider(array $args = [])
 * @phpstan-method \Aws\Result createPaymentCredentialProvider(array{
 *     name?: string,
 *     credentialProviderVendor?: 'CoinbaseCDP'|'StripePrivy',
 *     providerConfigurationInput?: array{
 *         coinbaseCdpConfiguration?: array{
 *             apiKeyId?: string,
 *             apiKeySecret?: string,
 *             apiKeySecretSource?: 'EXTERNAL'|'MANAGED',
 *             apiKeySecretConfig?: array,
 *             walletSecret?: string,
 *             walletSecretSource?: 'EXTERNAL'|'MANAGED',
 *             walletSecretConfig?: array,
 *             ...,
 *         },
 *         stripePrivyConfiguration?: array{
 *             appId?: string,
 *             appSecret?: string,
 *             appSecretSource?: 'EXTERNAL'|'MANAGED',
 *             appSecretConfig?: array,
 *             authorizationPrivateKey?: string,
 *             authorizationPrivateKeySource?: 'EXTERNAL'|'MANAGED',
 *             authorizationPrivateKeyConfig?: array,
 *             authorizationId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPaymentCredentialProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPaymentCredentialProviderAsync(array{
 *     name?: string,
 *     credentialProviderVendor?: 'CoinbaseCDP'|'StripePrivy',
 *     providerConfigurationInput?: array{
 *         coinbaseCdpConfiguration?: array{
 *             apiKeyId?: string,
 *             apiKeySecret?: string,
 *             apiKeySecretSource?: 'EXTERNAL'|'MANAGED',
 *             apiKeySecretConfig?: array,
 *             walletSecret?: string,
 *             walletSecretSource?: 'EXTERNAL'|'MANAGED',
 *             walletSecretConfig?: array,
 *             ...,
 *         },
 *         stripePrivyConfiguration?: array{
 *             appId?: string,
 *             appSecret?: string,
 *             appSecretSource?: 'EXTERNAL'|'MANAGED',
 *             appSecretConfig?: array,
 *             authorizationPrivateKey?: string,
 *             authorizationPrivateKeySource?: 'EXTERNAL'|'MANAGED',
 *             authorizationPrivateKeyConfig?: array,
 *             authorizationId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPaymentManager(array $args = [])
 * @phpstan-method \Aws\Result createPaymentManager(array{
 *     name?: string,
 *     description?: string,
 *     authorizerType?: 'AWS_IAM'|'CUSTOM_JWT',
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     roleArn?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPaymentManagerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPaymentManagerAsync(array{
 *     name?: string,
 *     description?: string,
 *     authorizerType?: 'AWS_IAM'|'CUSTOM_JWT',
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     roleArn?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPolicy(array $args = [])
 * @phpstan-method \Aws\Result createPolicy(array{
 *     name?: string,
 *     definition?: array{
 *         cedar?: array{statement?: string, ...},
 *         policyGeneration?: array{policyGenerationId?: string, policyGenerationAssetId?: string, ...},
 *         policy?: array{statement?: string, ...},
 *         ...,
 *     },
 *     description?: string,
 *     validationMode?: 'FAIL_ON_ANY_FINDINGS'|'IGNORE_ALL_FINDINGS',
 *     enforcementMode?: 'ACTIVE'|'LOG_ONLY',
 *     policyEngineId?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyAsync(array{
 *     name?: string,
 *     definition?: array{
 *         cedar?: array{statement?: string, ...},
 *         policyGeneration?: array{policyGenerationId?: string, policyGenerationAssetId?: string, ...},
 *         policy?: array{statement?: string, ...},
 *         ...,
 *     },
 *     description?: string,
 *     validationMode?: 'FAIL_ON_ANY_FINDINGS'|'IGNORE_ALL_FINDINGS',
 *     enforcementMode?: 'ACTIVE'|'LOG_ONLY',
 *     policyEngineId?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPolicyEngine(array $args = [])
 * @phpstan-method \Aws\Result createPolicyEngine(array{
 *     name?: string,
 *     description?: string,
 *     clientToken?: string,
 *     encryptionKeyArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyEngineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyEngineAsync(array{
 *     name?: string,
 *     description?: string,
 *     clientToken?: string,
 *     encryptionKeyArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRegistry(array $args = [])
 * @phpstan-method \Aws\Result createRegistry(array{
 *     name?: string,
 *     description?: string,
 *     authorizerType?: 'AWS_IAM'|'CUSTOM_JWT',
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     approvalConfiguration?: array{autoApproval?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegistryAsync(array{
 *     name?: string,
 *     description?: string,
 *     authorizerType?: 'AWS_IAM'|'CUSTOM_JWT',
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     approvalConfiguration?: array{autoApproval?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRegistryRecord(array $args = [])
 * @phpstan-method \Aws\Result createRegistryRecord(array{
 *     registryId?: string,
 *     name?: string,
 *     description?: string,
 *     descriptorType?: 'A2A'|'AGENT_SKILLS'|'CUSTOM'|'MCP',
 *     descriptors?: array{
 *         mcp?: array{server?: array, tools?: array, ...},
 *         a2a?: array{agentCard?: array, ...},
 *         custom?: array{inlineContent?: string, ...},
 *         agentSkills?: array{skillMd?: array, skillDefinition?: array, ...},
 *         ...,
 *     },
 *     recordVersion?: string,
 *     synchronizationType?: 'URL',
 *     synchronizationConfiguration?: array{fromUrl?: array{url?: string, credentialProviderConfigurations?: list<array>, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegistryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegistryRecordAsync(array{
 *     registryId?: string,
 *     name?: string,
 *     description?: string,
 *     descriptorType?: 'A2A'|'AGENT_SKILLS'|'CUSTOM'|'MCP',
 *     descriptors?: array{
 *         mcp?: array{server?: array, tools?: array, ...},
 *         a2a?: array{agentCard?: array, ...},
 *         custom?: array{inlineContent?: string, ...},
 *         agentSkills?: array{skillMd?: array, skillDefinition?: array, ...},
 *         ...,
 *     },
 *     recordVersion?: string,
 *     synchronizationType?: 'URL',
 *     synchronizationConfiguration?: array{fromUrl?: array{url?: string, credentialProviderConfigurations?: list<array>, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkloadIdentity(array $args = [])
 * @phpstan-method \Aws\Result createWorkloadIdentity(array{name?: string, allowedResourceOauth2ReturnUrls?: list<string>, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkloadIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkloadIdentityAsync(array{name?: string, allowedResourceOauth2ReturnUrls?: list<string>, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteAgentRuntime(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentRuntime(array{agentRuntimeId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentRuntimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentRuntimeAsync(array{agentRuntimeId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteAgentRuntimeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentRuntimeEndpoint(array{agentRuntimeId?: string, endpointName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentRuntimeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentRuntimeEndpointAsync(array{agentRuntimeId?: string, endpointName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteApiKeyCredentialProvider(array $args = [])
 * @phpstan-method \Aws\Result deleteApiKeyCredentialProvider(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApiKeyCredentialProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApiKeyCredentialProviderAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteBrowser(array $args = [])
 * @phpstan-method \Aws\Result deleteBrowser(array{browserId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBrowserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBrowserAsync(array{browserId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteBrowserProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteBrowserProfile(array{profileId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBrowserProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBrowserProfileAsync(array{profileId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteCodeInterpreter(array $args = [])
 * @phpstan-method \Aws\Result deleteCodeInterpreter(array{codeInterpreterId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCodeInterpreterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCodeInterpreterAsync(array{codeInterpreterId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteConfigurationBundle(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationBundle(array{bundleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationBundleAsync(array{bundleId?: string, ...} $args = [])
 * @method \Aws\Result deleteDataset(array $args = [])
 * @phpstan-method \Aws\Result deleteDataset(array{datasetId?: string, datasetVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array{datasetId?: string, datasetVersion?: string, ...} $args = [])
 * @method \Aws\Result deleteDatasetExamples(array $args = [])
 * @phpstan-method \Aws\Result deleteDatasetExamples(array{datasetId?: string, clientToken?: string, exampleIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatasetExamplesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetExamplesAsync(array{datasetId?: string, clientToken?: string, exampleIds?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteEvaluator(array $args = [])
 * @phpstan-method \Aws\Result deleteEvaluator(array{evaluatorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEvaluatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEvaluatorAsync(array{evaluatorId?: string, ...} $args = [])
 * @method \Aws\Result deleteGateway(array $args = [])
 * @phpstan-method \Aws\Result deleteGateway(array{gatewayIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGatewayAsync(array{gatewayIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteGatewayRule(array $args = [])
 * @phpstan-method \Aws\Result deleteGatewayRule(array{gatewayIdentifier?: string, ruleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGatewayRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGatewayRuleAsync(array{gatewayIdentifier?: string, ruleId?: string, ...} $args = [])
 * @method \Aws\Result deleteGatewayTarget(array $args = [])
 * @phpstan-method \Aws\Result deleteGatewayTarget(array{gatewayIdentifier?: string, targetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGatewayTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGatewayTargetAsync(array{gatewayIdentifier?: string, targetId?: string, ...} $args = [])
 * @method \Aws\Result deleteHarness(array $args = [])
 * @phpstan-method \Aws\Result deleteHarness(array{harnessId?: string, clientToken?: string, deleteManagedMemory?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHarnessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHarnessAsync(array{harnessId?: string, clientToken?: string, deleteManagedMemory?: bool, ...} $args = [])
 * @method \Aws\Result deleteHarnessEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteHarnessEndpoint(array{harnessId?: string, endpointName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHarnessEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHarnessEndpointAsync(array{harnessId?: string, endpointName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteMemory(array $args = [])
 * @phpstan-method \Aws\Result deleteMemory(array{clientToken?: string, memoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMemoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMemoryAsync(array{clientToken?: string, memoryId?: string, ...} $args = [])
 * @method \Aws\Result deleteOauth2CredentialProvider(array $args = [])
 * @phpstan-method \Aws\Result deleteOauth2CredentialProvider(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOauth2CredentialProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOauth2CredentialProviderAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteOnlineEvaluationConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteOnlineEvaluationConfig(array{onlineEvaluationConfigId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOnlineEvaluationConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOnlineEvaluationConfigAsync(array{onlineEvaluationConfigId?: string, ...} $args = [])
 * @method \Aws\Result deletePaymentConnector(array $args = [])
 * @phpstan-method \Aws\Result deletePaymentConnector(array{paymentManagerId?: string, paymentConnectorId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePaymentConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePaymentConnectorAsync(array{paymentManagerId?: string, paymentConnectorId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deletePaymentCredentialProvider(array $args = [])
 * @phpstan-method \Aws\Result deletePaymentCredentialProvider(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePaymentCredentialProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePaymentCredentialProviderAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deletePaymentManager(array $args = [])
 * @phpstan-method \Aws\Result deletePaymentManager(array{paymentManagerId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePaymentManagerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePaymentManagerAsync(array{paymentManagerId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePolicy(array{policyEngineId?: string, policyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyAsync(array{policyEngineId?: string, policyId?: string, ...} $args = [])
 * @method \Aws\Result deletePolicyEngine(array $args = [])
 * @phpstan-method \Aws\Result deletePolicyEngine(array{policyEngineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyEngineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyEngineAsync(array{policyEngineId?: string, ...} $args = [])
 * @method \Aws\Result deleteRegistry(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistry(array{registryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistryAsync(array{registryId?: string, ...} $args = [])
 * @method \Aws\Result deleteRegistryRecord(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistryRecord(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistryRecordAsync(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkloadIdentity(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkloadIdentity(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkloadIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkloadIdentityAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getAgentRuntime(array $args = [])
 * @phpstan-method \Aws\Result getAgentRuntime(array{agentRuntimeId?: string, agentRuntimeVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentRuntimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentRuntimeAsync(array{agentRuntimeId?: string, agentRuntimeVersion?: string, ...} $args = [])
 * @method \Aws\Result getAgentRuntimeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getAgentRuntimeEndpoint(array{agentRuntimeId?: string, endpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentRuntimeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentRuntimeEndpointAsync(array{agentRuntimeId?: string, endpointName?: string, ...} $args = [])
 * @method \Aws\Result getApiKeyCredentialProvider(array $args = [])
 * @phpstan-method \Aws\Result getApiKeyCredentialProvider(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApiKeyCredentialProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApiKeyCredentialProviderAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getBrowser(array $args = [])
 * @phpstan-method \Aws\Result getBrowser(array{browserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBrowserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBrowserAsync(array{browserId?: string, ...} $args = [])
 * @method \Aws\Result getBrowserProfile(array $args = [])
 * @phpstan-method \Aws\Result getBrowserProfile(array{profileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBrowserProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBrowserProfileAsync(array{profileId?: string, ...} $args = [])
 * @method \Aws\Result getCodeInterpreter(array $args = [])
 * @phpstan-method \Aws\Result getCodeInterpreter(array{codeInterpreterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCodeInterpreterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCodeInterpreterAsync(array{codeInterpreterId?: string, ...} $args = [])
 * @method \Aws\Result getConfigurationBundle(array $args = [])
 * @phpstan-method \Aws\Result getConfigurationBundle(array{bundleId?: string, branchName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationBundleAsync(array{bundleId?: string, branchName?: string, ...} $args = [])
 * @method \Aws\Result getConfigurationBundleVersion(array $args = [])
 * @phpstan-method \Aws\Result getConfigurationBundleVersion(array{bundleId?: string, versionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationBundleVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationBundleVersionAsync(array{bundleId?: string, versionId?: string, ...} $args = [])
 * @method \Aws\Result getDataset(array $args = [])
 * @phpstan-method \Aws\Result getDataset(array{datasetId?: string, datasetVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDatasetAsync(array{datasetId?: string, datasetVersion?: string, ...} $args = [])
 * @method \Aws\Result getEvaluator(array $args = [])
 * @phpstan-method \Aws\Result getEvaluator(array{evaluatorId?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEvaluatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEvaluatorAsync(array{evaluatorId?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \Aws\Result getGateway(array $args = [])
 * @phpstan-method \Aws\Result getGateway(array{gatewayIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGatewayAsync(array{gatewayIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getGatewayRule(array $args = [])
 * @phpstan-method \Aws\Result getGatewayRule(array{gatewayIdentifier?: string, ruleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGatewayRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGatewayRuleAsync(array{gatewayIdentifier?: string, ruleId?: string, ...} $args = [])
 * @method \Aws\Result getGatewayTarget(array $args = [])
 * @phpstan-method \Aws\Result getGatewayTarget(array{gatewayIdentifier?: string, targetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGatewayTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGatewayTargetAsync(array{gatewayIdentifier?: string, targetId?: string, ...} $args = [])
 * @method \Aws\Result getHarness(array $args = [])
 * @phpstan-method \Aws\Result getHarness(array{harnessId?: string, harnessVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHarnessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHarnessAsync(array{harnessId?: string, harnessVersion?: string, ...} $args = [])
 * @method \Aws\Result getHarnessEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getHarnessEndpoint(array{harnessId?: string, endpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHarnessEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHarnessEndpointAsync(array{harnessId?: string, endpointName?: string, ...} $args = [])
 * @method \Aws\Result getMemory(array $args = [])
 * @phpstan-method \Aws\Result getMemory(array{memoryId?: string, view?: 'full'|'without_decryption', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMemoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMemoryAsync(array{memoryId?: string, view?: 'full'|'without_decryption', ...} $args = [])
 * @method \Aws\Result getOauth2CredentialProvider(array $args = [])
 * @phpstan-method \Aws\Result getOauth2CredentialProvider(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOauth2CredentialProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOauth2CredentialProviderAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getOnlineEvaluationConfig(array $args = [])
 * @phpstan-method \Aws\Result getOnlineEvaluationConfig(array{onlineEvaluationConfigId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOnlineEvaluationConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOnlineEvaluationConfigAsync(array{onlineEvaluationConfigId?: string, ...} $args = [])
 * @method \Aws\Result getPaymentConnector(array $args = [])
 * @phpstan-method \Aws\Result getPaymentConnector(array{paymentManagerId?: string, paymentConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPaymentConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPaymentConnectorAsync(array{paymentManagerId?: string, paymentConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getPaymentCredentialProvider(array $args = [])
 * @phpstan-method \Aws\Result getPaymentCredentialProvider(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPaymentCredentialProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPaymentCredentialProviderAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getPaymentManager(array $args = [])
 * @phpstan-method \Aws\Result getPaymentManager(array{paymentManagerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPaymentManagerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPaymentManagerAsync(array{paymentManagerId?: string, ...} $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{policyEngineId?: string, policyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{policyEngineId?: string, policyId?: string, ...} $args = [])
 * @method \Aws\Result getPolicyEngine(array $args = [])
 * @phpstan-method \Aws\Result getPolicyEngine(array{policyEngineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyEngineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyEngineAsync(array{policyEngineId?: string, ...} $args = [])
 * @method \Aws\Result getPolicyEngineSummary(array $args = [])
 * @phpstan-method \Aws\Result getPolicyEngineSummary(array{policyEngineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyEngineSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyEngineSummaryAsync(array{policyEngineId?: string, ...} $args = [])
 * @method \Aws\Result getPolicyGeneration(array $args = [])
 * @phpstan-method \Aws\Result getPolicyGeneration(array{policyGenerationId?: string, policyEngineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyGenerationAsync(array{policyGenerationId?: string, policyEngineId?: string, ...} $args = [])
 * @method \Aws\Result getPolicyGenerationSummary(array $args = [])
 * @phpstan-method \Aws\Result getPolicyGenerationSummary(array{policyGenerationId?: string, policyEngineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyGenerationSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyGenerationSummaryAsync(array{policyGenerationId?: string, policyEngineId?: string, ...} $args = [])
 * @method \Aws\Result getPolicySummary(array $args = [])
 * @phpstan-method \Aws\Result getPolicySummary(array{policyEngineId?: string, policyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicySummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicySummaryAsync(array{policyEngineId?: string, policyId?: string, ...} $args = [])
 * @method \Aws\Result getRegistry(array $args = [])
 * @phpstan-method \Aws\Result getRegistry(array{registryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegistryAsync(array{registryId?: string, ...} $args = [])
 * @method \Aws\Result getRegistryRecord(array $args = [])
 * @phpstan-method \Aws\Result getRegistryRecord(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegistryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegistryRecordAsync(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result getTokenVault(array $args = [])
 * @phpstan-method \Aws\Result getTokenVault(array{tokenVaultId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTokenVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTokenVaultAsync(array{tokenVaultId?: string, ...} $args = [])
 * @method \Aws\Result getWorkloadIdentity(array $args = [])
 * @phpstan-method \Aws\Result getWorkloadIdentity(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkloadIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkloadIdentityAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result listAgentRuntimeEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listAgentRuntimeEndpoints(array{agentRuntimeId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentRuntimeEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentRuntimeEndpointsAsync(array{agentRuntimeId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAgentRuntimeVersions(array $args = [])
 * @phpstan-method \Aws\Result listAgentRuntimeVersions(array{agentRuntimeId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentRuntimeVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentRuntimeVersionsAsync(array{agentRuntimeId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAgentRuntimes(array $args = [])
 * @phpstan-method \Aws\Result listAgentRuntimes(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentRuntimesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentRuntimesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listApiKeyCredentialProviders(array $args = [])
 * @phpstan-method \Aws\Result listApiKeyCredentialProviders(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApiKeyCredentialProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApiKeyCredentialProvidersAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listBrowserProfiles(array $args = [])
 * @phpstan-method \Aws\Result listBrowserProfiles(array{maxResults?: int, nextToken?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBrowserProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBrowserProfilesAsync(array{maxResults?: int, nextToken?: string, name?: string, ...} $args = [])
 * @method \Aws\Result listBrowsers(array $args = [])
 * @phpstan-method \Aws\Result listBrowsers(array{maxResults?: int, nextToken?: string, type?: 'CUSTOM'|'SYSTEM', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBrowsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBrowsersAsync(array{maxResults?: int, nextToken?: string, type?: 'CUSTOM'|'SYSTEM', ...} $args = [])
 * @method \Aws\Result listCodeInterpreters(array $args = [])
 * @phpstan-method \Aws\Result listCodeInterpreters(array{maxResults?: int, nextToken?: string, type?: 'CUSTOM'|'SYSTEM', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeInterpretersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeInterpretersAsync(array{maxResults?: int, nextToken?: string, type?: 'CUSTOM'|'SYSTEM', ...} $args = [])
 * @method \Aws\Result listConfigurationBundleVersions(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationBundleVersions(array{
 *     bundleId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{branchName?: string, createdByName?: string, latestPerBranch?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationBundleVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationBundleVersionsAsync(array{
 *     bundleId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{branchName?: string, createdByName?: string, latestPerBranch?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listConfigurationBundles(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationBundles(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationBundlesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationBundlesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDatasetExamples(array $args = [])
 * @phpstan-method \Aws\Result listDatasetExamples(array{datasetId?: string, datasetVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetExamplesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetExamplesAsync(array{datasetId?: string, datasetVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDatasetVersions(array $args = [])
 * @phpstan-method \Aws\Result listDatasetVersions(array{datasetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetVersionsAsync(array{datasetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @phpstan-method \Aws\Result listDatasets(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listEvaluators(array $args = [])
 * @phpstan-method \Aws\Result listEvaluators(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEvaluatorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEvaluatorsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listGatewayRules(array $args = [])
 * @phpstan-method \Aws\Result listGatewayRules(array{gatewayIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGatewayRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGatewayRulesAsync(array{gatewayIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listGatewayTargets(array $args = [])
 * @phpstan-method \Aws\Result listGatewayTargets(array{gatewayIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGatewayTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGatewayTargetsAsync(array{gatewayIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listGateways(array $args = [])
 * @phpstan-method \Aws\Result listGateways(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGatewaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGatewaysAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listHarnessEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listHarnessEndpoints(array{harnessId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHarnessEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHarnessEndpointsAsync(array{harnessId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listHarnessVersions(array $args = [])
 * @phpstan-method \Aws\Result listHarnessVersions(array{harnessId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHarnessVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHarnessVersionsAsync(array{harnessId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listHarnesses(array $args = [])
 * @phpstan-method \Aws\Result listHarnesses(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHarnessesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHarnessesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listMemories(array $args = [])
 * @phpstan-method \Aws\Result listMemories(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMemoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMemoriesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listOauth2CredentialProviders(array $args = [])
 * @phpstan-method \Aws\Result listOauth2CredentialProviders(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOauth2CredentialProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOauth2CredentialProvidersAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listOnlineEvaluationConfigs(array $args = [])
 * @phpstan-method \Aws\Result listOnlineEvaluationConfigs(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOnlineEvaluationConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOnlineEvaluationConfigsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPaymentConnectors(array $args = [])
 * @phpstan-method \Aws\Result listPaymentConnectors(array{paymentManagerId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPaymentConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPaymentConnectorsAsync(array{paymentManagerId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listPaymentCredentialProviders(array $args = [])
 * @phpstan-method \Aws\Result listPaymentCredentialProviders(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPaymentCredentialProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPaymentCredentialProvidersAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPaymentManagers(array $args = [])
 * @phpstan-method \Aws\Result listPaymentManagers(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPaymentManagersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPaymentManagersAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listPolicies(array $args = [])
 * @phpstan-method \Aws\Result listPolicies(array{nextToken?: string, maxResults?: int, policyEngineId?: string, targetResourceScope?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPoliciesAsync(array{nextToken?: string, maxResults?: int, policyEngineId?: string, targetResourceScope?: string, ...} $args = [])
 * @method \Aws\Result listPolicyEngineSummaries(array $args = [])
 * @phpstan-method \Aws\Result listPolicyEngineSummaries(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyEngineSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyEngineSummariesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPolicyEngines(array $args = [])
 * @phpstan-method \Aws\Result listPolicyEngines(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyEnginesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyEnginesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPolicyGenerationAssets(array $args = [])
 * @phpstan-method \Aws\Result listPolicyGenerationAssets(array{policyGenerationId?: string, policyEngineId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyGenerationAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyGenerationAssetsAsync(array{policyGenerationId?: string, policyEngineId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPolicyGenerationSummaries(array $args = [])
 * @phpstan-method \Aws\Result listPolicyGenerationSummaries(array{nextToken?: string, maxResults?: int, policyEngineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyGenerationSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyGenerationSummariesAsync(array{nextToken?: string, maxResults?: int, policyEngineId?: string, ...} $args = [])
 * @method \Aws\Result listPolicyGenerations(array $args = [])
 * @phpstan-method \Aws\Result listPolicyGenerations(array{nextToken?: string, maxResults?: int, policyEngineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyGenerationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyGenerationsAsync(array{nextToken?: string, maxResults?: int, policyEngineId?: string, ...} $args = [])
 * @method \Aws\Result listPolicySummaries(array $args = [])
 * @phpstan-method \Aws\Result listPolicySummaries(array{nextToken?: string, maxResults?: int, policyEngineId?: string, targetResourceScope?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicySummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicySummariesAsync(array{nextToken?: string, maxResults?: int, policyEngineId?: string, targetResourceScope?: string, ...} $args = [])
 * @method \Aws\Result listRegistries(array $args = [])
 * @phpstan-method \Aws\Result listRegistries(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     status?: 'CREATE_FAILED'|'CREATING'|'DELETE_FAILED'|'DELETING'|'READY'|'UPDATE_FAILED'|'UPDATING',
 *     authorizerType?: 'AWS_IAM'|'CUSTOM_JWT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegistriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegistriesAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     status?: 'CREATE_FAILED'|'CREATING'|'DELETE_FAILED'|'DELETING'|'READY'|'UPDATE_FAILED'|'UPDATING',
 *     authorizerType?: 'AWS_IAM'|'CUSTOM_JWT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRegistryRecords(array $args = [])
 * @phpstan-method \Aws\Result listRegistryRecords(array{
 *     registryId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     name?: string,
 *     status?: 'APPROVED'|'CREATE_FAILED'|'CREATING'|'DEPRECATED'|'DRAFT'|'PENDING_APPROVAL'|'REJECTED'|'UPDATE_FAILED'|'UPDATING',
 *     descriptorType?: 'A2A'|'AGENT_SKILLS'|'CUSTOM'|'MCP',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegistryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegistryRecordsAsync(array{
 *     registryId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     name?: string,
 *     status?: 'APPROVED'|'CREATE_FAILED'|'CREATING'|'DEPRECATED'|'DRAFT'|'PENDING_APPROVAL'|'REJECTED'|'UPDATE_FAILED'|'UPDATING',
 *     descriptorType?: 'A2A'|'AGENT_SKILLS'|'CUSTOM'|'MCP',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listWorkloadIdentities(array $args = [])
 * @phpstan-method \Aws\Result listWorkloadIdentities(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkloadIdentitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkloadIdentitiesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{resourceArn?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{resourceArn?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result setTokenVaultCMK(array $args = [])
 * @phpstan-method \Aws\Result setTokenVaultCMK(array{
 *     tokenVaultId?: string,
 *     kmsConfiguration?: array{keyType?: 'CustomerManagedKey'|'ServiceManagedKey', kmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setTokenVaultCMKAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setTokenVaultCMKAsync(array{
 *     tokenVaultId?: string,
 *     kmsConfiguration?: array{keyType?: 'CustomerManagedKey'|'ServiceManagedKey', kmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startPolicyGeneration(array $args = [])
 * @phpstan-method \Aws\Result startPolicyGeneration(array{
 *     policyEngineId?: string,
 *     resource?: array{arn?: string, ...},
 *     content?: array{rawText?: string, ...},
 *     name?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startPolicyGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPolicyGenerationAsync(array{
 *     policyEngineId?: string,
 *     resource?: array{arn?: string, ...},
 *     content?: array{rawText?: string, ...},
 *     name?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result submitRegistryRecordForApproval(array $args = [])
 * @phpstan-method \Aws\Result submitRegistryRecordForApproval(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise submitRegistryRecordForApprovalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitRegistryRecordForApprovalAsync(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \Aws\Result synchronizeGatewayTargets(array $args = [])
 * @phpstan-method \Aws\Result synchronizeGatewayTargets(array{gatewayIdentifier?: string, targetIdList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise synchronizeGatewayTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise synchronizeGatewayTargetsAsync(array{gatewayIdentifier?: string, targetIdList?: list<string>, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAgentRuntime(array $args = [])
 * @phpstan-method \Aws\Result updateAgentRuntime(array{
 *     agentRuntimeId?: string,
 *     agentRuntimeArtifact?: array{
 *         containerConfiguration?: array{containerUri?: string, ...},
 *         codeConfiguration?: array{
 *             code?: array,
 *             runtime?: 'NODE_22'|'PYTHON_3_10'|'PYTHON_3_11'|'PYTHON_3_12'|'PYTHON_3_13'|'PYTHON_3_14',
 *             entryPoint?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     roleArn?: string,
 *     networkConfiguration?: array{
 *         networkMode?: 'PUBLIC'|'VPC',
 *         networkModeConfig?: array{securityGroups?: list<string>, subnets?: list<string>, requireServiceS3Endpoint?: bool, ...},
 *         ...,
 *     },
 *     description?: string,
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     requestHeaderConfiguration?: array{requestHeaderAllowlist?: list<string>, ...},
 *     protocolConfiguration?: array{serverProtocol?: 'A2A'|'AGUI'|'HTTP'|'MCP', ...},
 *     lifecycleConfiguration?: array{idleRuntimeSessionTimeout?: int, maxLifetime?: int, ...},
 *     metadataConfiguration?: array{requireMMDSV2?: bool, ...},
 *     environmentVariables?: array<string, string>,
 *     filesystemConfigurations?: list<array{sessionStorage?: array, s3FilesAccessPoint?: array, efsAccessPoint?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentRuntimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentRuntimeAsync(array{
 *     agentRuntimeId?: string,
 *     agentRuntimeArtifact?: array{
 *         containerConfiguration?: array{containerUri?: string, ...},
 *         codeConfiguration?: array{
 *             code?: array,
 *             runtime?: 'NODE_22'|'PYTHON_3_10'|'PYTHON_3_11'|'PYTHON_3_12'|'PYTHON_3_13'|'PYTHON_3_14',
 *             entryPoint?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     roleArn?: string,
 *     networkConfiguration?: array{
 *         networkMode?: 'PUBLIC'|'VPC',
 *         networkModeConfig?: array{securityGroups?: list<string>, subnets?: list<string>, requireServiceS3Endpoint?: bool, ...},
 *         ...,
 *     },
 *     description?: string,
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     requestHeaderConfiguration?: array{requestHeaderAllowlist?: list<string>, ...},
 *     protocolConfiguration?: array{serverProtocol?: 'A2A'|'AGUI'|'HTTP'|'MCP', ...},
 *     lifecycleConfiguration?: array{idleRuntimeSessionTimeout?: int, maxLifetime?: int, ...},
 *     metadataConfiguration?: array{requireMMDSV2?: bool, ...},
 *     environmentVariables?: array<string, string>,
 *     filesystemConfigurations?: list<array{sessionStorage?: array, s3FilesAccessPoint?: array, efsAccessPoint?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAgentRuntimeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateAgentRuntimeEndpoint(array{
 *     agentRuntimeId?: string,
 *     endpointName?: string,
 *     agentRuntimeVersion?: string,
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentRuntimeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentRuntimeEndpointAsync(array{
 *     agentRuntimeId?: string,
 *     endpointName?: string,
 *     agentRuntimeVersion?: string,
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApiKeyCredentialProvider(array $args = [])
 * @phpstan-method \Aws\Result updateApiKeyCredentialProvider(array{
 *     name?: string,
 *     apiKey?: string,
 *     apiKeySecretConfig?: array{secretId?: string, jsonKey?: string, ...},
 *     apiKeySecretSource?: 'EXTERNAL'|'MANAGED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApiKeyCredentialProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApiKeyCredentialProviderAsync(array{
 *     name?: string,
 *     apiKey?: string,
 *     apiKeySecretConfig?: array{secretId?: string, jsonKey?: string, ...},
 *     apiKeySecretSource?: 'EXTERNAL'|'MANAGED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfigurationBundle(array $args = [])
 * @phpstan-method \Aws\Result updateConfigurationBundle(array{
 *     clientToken?: string,
 *     bundleId?: string,
 *     bundleName?: string,
 *     description?: string,
 *     components?: array<string, array{configuration?: array, ...}>,
 *     parentVersionIds?: list<string>,
 *     branchName?: string,
 *     commitMessage?: string,
 *     createdBy?: array{name?: string, arn?: string, ...},
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationBundleAsync(array{
 *     clientToken?: string,
 *     bundleId?: string,
 *     bundleName?: string,
 *     description?: string,
 *     components?: array<string, array{configuration?: array, ...}>,
 *     parentVersionIds?: list<string>,
 *     branchName?: string,
 *     commitMessage?: string,
 *     createdBy?: array{name?: string, arn?: string, ...},
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataset(array $args = [])
 * @phpstan-method \Aws\Result updateDataset(array{datasetId?: string, clientToken?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDatasetAsync(array{datasetId?: string, clientToken?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateDatasetExamples(array $args = [])
 * @phpstan-method \Aws\Result updateDatasetExamples(array{datasetId?: string, clientToken?: string, examples?: list<array>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDatasetExamplesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDatasetExamplesAsync(array{datasetId?: string, clientToken?: string, examples?: list<array>, ...} $args = [])
 * @method \Aws\Result updateEvaluator(array $args = [])
 * @phpstan-method \Aws\Result updateEvaluator(array{
 *     clientToken?: string,
 *     evaluatorId?: string,
 *     description?: string,
 *     evaluatorConfig?: array{
 *         llmAsAJudge?: array{instructions?: string, ratingScale?: array, modelConfig?: array, ...},
 *         codeBased?: array{lambdaConfig?: array, ...},
 *         ...,
 *     },
 *     level?: 'SESSION'|'TOOL_CALL'|'TRACE',
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEvaluatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEvaluatorAsync(array{
 *     clientToken?: string,
 *     evaluatorId?: string,
 *     description?: string,
 *     evaluatorConfig?: array{
 *         llmAsAJudge?: array{instructions?: string, ratingScale?: array, modelConfig?: array, ...},
 *         codeBased?: array{lambdaConfig?: array, ...},
 *         ...,
 *     },
 *     level?: 'SESSION'|'TOOL_CALL'|'TRACE',
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGateway(array $args = [])
 * @phpstan-method \Aws\Result updateGateway(array{
 *     gatewayIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     roleArn?: string,
 *     protocolType?: 'MCP',
 *     protocolConfiguration?: array{
 *         mcp?: array{
 *             supportedVersions?: list<string>,
 *             instructions?: string,
 *             searchType?: 'SEMANTIC',
 *             sessionConfiguration?: array,
 *             streamingConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     authorizerType?: 'AUTHENTICATE_ONLY'|'AWS_IAM'|'CUSTOM_JWT'|'NONE',
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     kmsKeyArn?: string,
 *     customTransformConfiguration?: array{lambda?: array{arn?: string, ...}, ...},
 *     interceptorConfigurations?: list<array{interceptor?: array, interceptionPoints?: list<'REQUEST'|'RESPONSE'>, inputConfiguration?: array, ...}>,
 *     policyEngineConfiguration?: array{arn?: string, mode?: 'ENFORCE'|'LOG_ONLY', ...},
 *     exceptionLevel?: 'DEBUG',
 *     wafConfiguration?: array{failureMode?: 'FAIL_CLOSE'|'FAIL_OPEN', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGatewayAsync(array{
 *     gatewayIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     roleArn?: string,
 *     protocolType?: 'MCP',
 *     protocolConfiguration?: array{
 *         mcp?: array{
 *             supportedVersions?: list<string>,
 *             instructions?: string,
 *             searchType?: 'SEMANTIC',
 *             sessionConfiguration?: array,
 *             streamingConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     authorizerType?: 'AUTHENTICATE_ONLY'|'AWS_IAM'|'CUSTOM_JWT'|'NONE',
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     kmsKeyArn?: string,
 *     customTransformConfiguration?: array{lambda?: array{arn?: string, ...}, ...},
 *     interceptorConfigurations?: list<array{interceptor?: array, interceptionPoints?: list<'REQUEST'|'RESPONSE'>, inputConfiguration?: array, ...}>,
 *     policyEngineConfiguration?: array{arn?: string, mode?: 'ENFORCE'|'LOG_ONLY', ...},
 *     exceptionLevel?: 'DEBUG',
 *     wafConfiguration?: array{failureMode?: 'FAIL_CLOSE'|'FAIL_OPEN', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGatewayRule(array $args = [])
 * @phpstan-method \Aws\Result updateGatewayRule(array{
 *     gatewayIdentifier?: string,
 *     ruleId?: string,
 *     priority?: int,
 *     conditions?: list<array{matchPrincipals?: array, matchPaths?: array, ...}>,
 *     actions?: list<array{configurationBundle?: array, routeToTarget?: array, ...}>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewayRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGatewayRuleAsync(array{
 *     gatewayIdentifier?: string,
 *     ruleId?: string,
 *     priority?: int,
 *     conditions?: list<array{matchPrincipals?: array, matchPaths?: array, ...}>,
 *     actions?: list<array{configurationBundle?: array, routeToTarget?: array, ...}>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGatewayTarget(array $args = [])
 * @phpstan-method \Aws\Result updateGatewayTarget(array{
 *     gatewayIdentifier?: string,
 *     targetId?: string,
 *     name?: string,
 *     description?: string,
 *     targetConfiguration?: array{
 *         mcp?: array{
 *             openApiSchema?: array,
 *             smithyModel?: array,
 *             lambda?: array,
 *             mcpServer?: array,
 *             apiGateway?: array,
 *             connector?: array,
 *             ...,
 *         },
 *         http?: array{agentcoreRuntime?: array, passthrough?: array, ...},
 *         inference?: array{connector?: array, provider?: array, ...},
 *         ...,
 *     },
 *     credentialProviderConfigurations?: list<array{
 *         credentialProviderType?: 'API_KEY'|'CALLER_IAM_CREDENTIALS'|'GATEWAY_IAM_ROLE'|'JWT_PASSTHROUGH'|'OAUTH',
 *         credentialProvider?: array,
 *         ...,
 *     }>,
 *     metadataConfiguration?: array{
 *         allowedRequestHeaders?: list<string>,
 *         allowedQueryParameters?: list<string>,
 *         allowedResponseHeaders?: list<string>,
 *         ...,
 *     },
 *     privateEndpoint?: array{
 *         selfManagedLatticeResource?: array{resourceConfigurationIdentifier?: string, ...},
 *         managedVpcResource?: array{
 *             vpcIdentifier?: string,
 *             subnetIds?: list<string>,
 *             endpointIpAddressType?: 'IPV4'|'IPV6',
 *             securityGroupIds?: list<string>,
 *             tags?: array<string, string>,
 *             routingDomain?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewayTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGatewayTargetAsync(array{
 *     gatewayIdentifier?: string,
 *     targetId?: string,
 *     name?: string,
 *     description?: string,
 *     targetConfiguration?: array{
 *         mcp?: array{
 *             openApiSchema?: array,
 *             smithyModel?: array,
 *             lambda?: array,
 *             mcpServer?: array,
 *             apiGateway?: array,
 *             connector?: array,
 *             ...,
 *         },
 *         http?: array{agentcoreRuntime?: array, passthrough?: array, ...},
 *         inference?: array{connector?: array, provider?: array, ...},
 *         ...,
 *     },
 *     credentialProviderConfigurations?: list<array{
 *         credentialProviderType?: 'API_KEY'|'CALLER_IAM_CREDENTIALS'|'GATEWAY_IAM_ROLE'|'JWT_PASSTHROUGH'|'OAUTH',
 *         credentialProvider?: array,
 *         ...,
 *     }>,
 *     metadataConfiguration?: array{
 *         allowedRequestHeaders?: list<string>,
 *         allowedQueryParameters?: list<string>,
 *         allowedResponseHeaders?: list<string>,
 *         ...,
 *     },
 *     privateEndpoint?: array{
 *         selfManagedLatticeResource?: array{resourceConfigurationIdentifier?: string, ...},
 *         managedVpcResource?: array{
 *             vpcIdentifier?: string,
 *             subnetIds?: list<string>,
 *             endpointIpAddressType?: 'IPV4'|'IPV6',
 *             securityGroupIds?: list<string>,
 *             tags?: array<string, string>,
 *             routingDomain?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateHarness(array $args = [])
 * @phpstan-method \Aws\Result updateHarness(array{
 *     harnessId?: string,
 *     clientToken?: string,
 *     executionRoleArn?: string,
 *     environment?: array{
 *         agentCoreRuntimeEnvironment?: array{
 *             lifecycleConfiguration?: array,
 *             networkConfiguration?: array,
 *             filesystemConfigurations?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     environmentArtifact?: array{optionalValue?: array{containerConfiguration?: array, ...}, ...},
 *     environmentVariables?: array<string, string>,
 *     authorizerConfiguration?: array{optionalValue?: array{customJWTAuthorizer?: array, ...}, ...},
 *     model?: array{
 *         bedrockModelConfig?: array{
 *             modelId?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             apiFormat?: 'chat_completions'|'converse_stream'|'responses',
 *             additionalParams?: array,
 *             ...,
 *         },
 *         openAiModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             apiFormat?: 'chat_completions'|'responses',
 *             additionalParams?: array,
 *             ...,
 *         },
 *         geminiModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             topK?: int,
 *             additionalParams?: array,
 *             ...,
 *         },
 *         liteLlmModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             apiBase?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             additionalParams?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     systemPrompt?: list<array{text?: string, ...}>,
 *     tools?: list<array{
 *         type?: 'agentcore_browser'|'agentcore_code_interpreter'|'agentcore_gateway'|'inline_function'|'remote_mcp',
 *         name?: string,
 *         config?: array,
 *         ...,
 *     }>,
 *     skills?: list<array{path?: string, s3?: array, git?: array, awsSkills?: array, ...}>,
 *     allowedTools?: list<string>,
 *     memory?: array{
 *         optionalValue?: array{agentCoreMemoryConfiguration?: array, managedMemoryConfiguration?: array, disabled?: array, ...},
 *         ...,
 *     },
 *     truncation?: array{
 *         strategy?: 'none'|'sliding_window'|'summarization',
 *         config?: array{slidingWindow?: array, summarization?: array, ...},
 *         ...,
 *     },
 *     maxIterations?: int,
 *     maxTokens?: int,
 *     timeoutSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHarnessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHarnessAsync(array{
 *     harnessId?: string,
 *     clientToken?: string,
 *     executionRoleArn?: string,
 *     environment?: array{
 *         agentCoreRuntimeEnvironment?: array{
 *             lifecycleConfiguration?: array,
 *             networkConfiguration?: array,
 *             filesystemConfigurations?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     environmentArtifact?: array{optionalValue?: array{containerConfiguration?: array, ...}, ...},
 *     environmentVariables?: array<string, string>,
 *     authorizerConfiguration?: array{optionalValue?: array{customJWTAuthorizer?: array, ...}, ...},
 *     model?: array{
 *         bedrockModelConfig?: array{
 *             modelId?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             apiFormat?: 'chat_completions'|'converse_stream'|'responses',
 *             additionalParams?: array,
 *             ...,
 *         },
 *         openAiModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             apiFormat?: 'chat_completions'|'responses',
 *             additionalParams?: array,
 *             ...,
 *         },
 *         geminiModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             topK?: int,
 *             additionalParams?: array,
 *             ...,
 *         },
 *         liteLlmModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             apiBase?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             additionalParams?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     systemPrompt?: list<array{text?: string, ...}>,
 *     tools?: list<array{
 *         type?: 'agentcore_browser'|'agentcore_code_interpreter'|'agentcore_gateway'|'inline_function'|'remote_mcp',
 *         name?: string,
 *         config?: array,
 *         ...,
 *     }>,
 *     skills?: list<array{path?: string, s3?: array, git?: array, awsSkills?: array, ...}>,
 *     allowedTools?: list<string>,
 *     memory?: array{
 *         optionalValue?: array{agentCoreMemoryConfiguration?: array, managedMemoryConfiguration?: array, disabled?: array, ...},
 *         ...,
 *     },
 *     truncation?: array{
 *         strategy?: 'none'|'sliding_window'|'summarization',
 *         config?: array{slidingWindow?: array, summarization?: array, ...},
 *         ...,
 *     },
 *     maxIterations?: int,
 *     maxTokens?: int,
 *     timeoutSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateHarnessEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateHarnessEndpoint(array{
 *     harnessId?: string,
 *     endpointName?: string,
 *     targetVersion?: string,
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHarnessEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHarnessEndpointAsync(array{
 *     harnessId?: string,
 *     endpointName?: string,
 *     targetVersion?: string,
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMemory(array $args = [])
 * @phpstan-method \Aws\Result updateMemory(array{
 *     clientToken?: string,
 *     memoryId?: string,
 *     description?: string,
 *     eventExpiryDuration?: int,
 *     memoryExecutionRoleArn?: string,
 *     memoryStrategies?: array{
 *         addMemoryStrategies?: list<array>,
 *         modifyMemoryStrategies?: list<array>,
 *         deleteMemoryStrategies?: list<array>,
 *         ...,
 *     },
 *     addIndexedKeys?: list<array{key?: string, type?: 'NUMBER'|'STRING'|'STRINGLIST', ...}>,
 *     streamDeliveryResources?: array{resources?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMemoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMemoryAsync(array{
 *     clientToken?: string,
 *     memoryId?: string,
 *     description?: string,
 *     eventExpiryDuration?: int,
 *     memoryExecutionRoleArn?: string,
 *     memoryStrategies?: array{
 *         addMemoryStrategies?: list<array>,
 *         modifyMemoryStrategies?: list<array>,
 *         deleteMemoryStrategies?: list<array>,
 *         ...,
 *     },
 *     addIndexedKeys?: list<array{key?: string, type?: 'NUMBER'|'STRING'|'STRINGLIST', ...}>,
 *     streamDeliveryResources?: array{resources?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOauth2CredentialProvider(array $args = [])
 * @phpstan-method \Aws\Result updateOauth2CredentialProvider(array{
 *     name?: string,
 *     credentialProviderVendor?: 'AtlassianOauth2'|'Auth0Oauth2'|'CognitoOauth2'|'CustomOauth2'|'CyberArkOauth2'|'DropboxOauth2'|'FacebookOauth2'|'FusionAuthOauth2'|'GithubOauth2'|'GoogleOauth2'|'HubspotOauth2'|'LinkedinOauth2'|'MicrosoftOauth2'|'NotionOauth2'|'OktaOauth2'|'OneLoginOauth2'|'PingOneOauth2'|'RedditOauth2'|'SalesforceOauth2'|'SlackOauth2'|'SpotifyOauth2'|'TwitchOauth2'|'XOauth2'|'YandexOauth2'|'ZoomOauth2',
 *     oauth2ProviderConfigInput?: array{
 *         customOauth2ProviderConfig?: array{
 *             oauthDiscovery?: array,
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             onBehalfOfTokenExchangeConfig?: array,
 *             clientAuthenticationMethod?: 'AWS_IAM_ID_TOKEN_JWT'|'CLIENT_SECRET_BASIC'|'CLIENT_SECRET_POST',
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             ...,
 *         },
 *         googleOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         githubOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         slackOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         salesforceOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         microsoftOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             tenantId?: string,
 *             ...,
 *         },
 *         atlassianOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         linkedinOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         includedOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             issuer?: string,
 *             authorizationEndpoint?: string,
 *             tokenEndpoint?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOauth2CredentialProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOauth2CredentialProviderAsync(array{
 *     name?: string,
 *     credentialProviderVendor?: 'AtlassianOauth2'|'Auth0Oauth2'|'CognitoOauth2'|'CustomOauth2'|'CyberArkOauth2'|'DropboxOauth2'|'FacebookOauth2'|'FusionAuthOauth2'|'GithubOauth2'|'GoogleOauth2'|'HubspotOauth2'|'LinkedinOauth2'|'MicrosoftOauth2'|'NotionOauth2'|'OktaOauth2'|'OneLoginOauth2'|'PingOneOauth2'|'RedditOauth2'|'SalesforceOauth2'|'SlackOauth2'|'SpotifyOauth2'|'TwitchOauth2'|'XOauth2'|'YandexOauth2'|'ZoomOauth2',
 *     oauth2ProviderConfigInput?: array{
 *         customOauth2ProviderConfig?: array{
 *             oauthDiscovery?: array,
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             onBehalfOfTokenExchangeConfig?: array,
 *             clientAuthenticationMethod?: 'AWS_IAM_ID_TOKEN_JWT'|'CLIENT_SECRET_BASIC'|'CLIENT_SECRET_POST',
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             ...,
 *         },
 *         googleOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         githubOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         slackOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         salesforceOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         microsoftOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             tenantId?: string,
 *             ...,
 *         },
 *         atlassianOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         linkedinOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             ...,
 *         },
 *         includedOauth2ProviderConfig?: array{
 *             clientId?: string,
 *             clientSecret?: string,
 *             clientSecretConfig?: array,
 *             clientSecretSource?: 'EXTERNAL'|'MANAGED',
 *             issuer?: string,
 *             authorizationEndpoint?: string,
 *             tokenEndpoint?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOnlineEvaluationConfig(array $args = [])
 * @phpstan-method \Aws\Result updateOnlineEvaluationConfig(array{
 *     clientToken?: string,
 *     onlineEvaluationConfigId?: string,
 *     description?: string,
 *     rule?: array{
 *         samplingConfig?: array{samplingPercentage?: float, ...},
 *         filters?: list<array>,
 *         sessionConfig?: array{sessionTimeoutMinutes?: int, ...},
 *         ...,
 *     },
 *     dataSourceConfig?: array{cloudWatchLogs?: array{logGroupNames?: list<string>, serviceNames?: list<string>, ...}, ...},
 *     evaluators?: list<array{evaluatorId?: string, ...}>,
 *     insights?: list<array{insightId?: string, ...}>,
 *     clusteringConfig?: array{frequencies?: list<'DAILY'|'MONTHLY'|'WEEKLY'>, ...},
 *     evaluationExecutionRoleArn?: string,
 *     executionStatus?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOnlineEvaluationConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOnlineEvaluationConfigAsync(array{
 *     clientToken?: string,
 *     onlineEvaluationConfigId?: string,
 *     description?: string,
 *     rule?: array{
 *         samplingConfig?: array{samplingPercentage?: float, ...},
 *         filters?: list<array>,
 *         sessionConfig?: array{sessionTimeoutMinutes?: int, ...},
 *         ...,
 *     },
 *     dataSourceConfig?: array{cloudWatchLogs?: array{logGroupNames?: list<string>, serviceNames?: list<string>, ...}, ...},
 *     evaluators?: list<array{evaluatorId?: string, ...}>,
 *     insights?: list<array{insightId?: string, ...}>,
 *     clusteringConfig?: array{frequencies?: list<'DAILY'|'MONTHLY'|'WEEKLY'>, ...},
 *     evaluationExecutionRoleArn?: string,
 *     executionStatus?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePaymentConnector(array $args = [])
 * @phpstan-method \Aws\Result updatePaymentConnector(array{
 *     paymentManagerId?: string,
 *     paymentConnectorId?: string,
 *     description?: string,
 *     type?: 'CoinbaseCDP'|'StripePrivy',
 *     credentialProviderConfigurations?: list<array{coinbaseCDP?: array, stripePrivy?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePaymentConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePaymentConnectorAsync(array{
 *     paymentManagerId?: string,
 *     paymentConnectorId?: string,
 *     description?: string,
 *     type?: 'CoinbaseCDP'|'StripePrivy',
 *     credentialProviderConfigurations?: list<array{coinbaseCDP?: array, stripePrivy?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePaymentCredentialProvider(array $args = [])
 * @phpstan-method \Aws\Result updatePaymentCredentialProvider(array{
 *     name?: string,
 *     credentialProviderVendor?: 'CoinbaseCDP'|'StripePrivy',
 *     providerConfigurationInput?: array{
 *         coinbaseCdpConfiguration?: array{
 *             apiKeyId?: string,
 *             apiKeySecret?: string,
 *             apiKeySecretSource?: 'EXTERNAL'|'MANAGED',
 *             apiKeySecretConfig?: array,
 *             walletSecret?: string,
 *             walletSecretSource?: 'EXTERNAL'|'MANAGED',
 *             walletSecretConfig?: array,
 *             ...,
 *         },
 *         stripePrivyConfiguration?: array{
 *             appId?: string,
 *             appSecret?: string,
 *             appSecretSource?: 'EXTERNAL'|'MANAGED',
 *             appSecretConfig?: array,
 *             authorizationPrivateKey?: string,
 *             authorizationPrivateKeySource?: 'EXTERNAL'|'MANAGED',
 *             authorizationPrivateKeyConfig?: array,
 *             authorizationId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePaymentCredentialProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePaymentCredentialProviderAsync(array{
 *     name?: string,
 *     credentialProviderVendor?: 'CoinbaseCDP'|'StripePrivy',
 *     providerConfigurationInput?: array{
 *         coinbaseCdpConfiguration?: array{
 *             apiKeyId?: string,
 *             apiKeySecret?: string,
 *             apiKeySecretSource?: 'EXTERNAL'|'MANAGED',
 *             apiKeySecretConfig?: array,
 *             walletSecret?: string,
 *             walletSecretSource?: 'EXTERNAL'|'MANAGED',
 *             walletSecretConfig?: array,
 *             ...,
 *         },
 *         stripePrivyConfiguration?: array{
 *             appId?: string,
 *             appSecret?: string,
 *             appSecretSource?: 'EXTERNAL'|'MANAGED',
 *             appSecretConfig?: array,
 *             authorizationPrivateKey?: string,
 *             authorizationPrivateKeySource?: 'EXTERNAL'|'MANAGED',
 *             authorizationPrivateKeyConfig?: array,
 *             authorizationId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePaymentManager(array $args = [])
 * @phpstan-method \Aws\Result updatePaymentManager(array{
 *     paymentManagerId?: string,
 *     description?: string,
 *     authorizerType?: 'AWS_IAM'|'CUSTOM_JWT',
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     roleArn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePaymentManagerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePaymentManagerAsync(array{
 *     paymentManagerId?: string,
 *     description?: string,
 *     authorizerType?: 'AWS_IAM'|'CUSTOM_JWT',
 *     authorizerConfiguration?: array{
 *         customJWTAuthorizer?: array{
 *             discoveryUrl?: string,
 *             allowedAudience?: list<string>,
 *             allowedClients?: list<string>,
 *             allowedScopes?: list<string>,
 *             advertisedScopeMapping?: array<string, string>,
 *             customClaims?: list<array>,
 *             privateEndpoint?: array,
 *             privateEndpointOverrides?: list<array>,
 *             allowedWorkloadConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     roleArn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePolicy(array $args = [])
 * @phpstan-method \Aws\Result updatePolicy(array{
 *     policyEngineId?: string,
 *     policyId?: string,
 *     description?: array{optionalValue?: string, ...},
 *     definition?: array{
 *         cedar?: array{statement?: string, ...},
 *         policyGeneration?: array{policyGenerationId?: string, policyGenerationAssetId?: string, ...},
 *         policy?: array{statement?: string, ...},
 *         ...,
 *     },
 *     validationMode?: 'FAIL_ON_ANY_FINDINGS'|'IGNORE_ALL_FINDINGS',
 *     enforcementMode?: 'ACTIVE'|'LOG_ONLY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePolicyAsync(array{
 *     policyEngineId?: string,
 *     policyId?: string,
 *     description?: array{optionalValue?: string, ...},
 *     definition?: array{
 *         cedar?: array{statement?: string, ...},
 *         policyGeneration?: array{policyGenerationId?: string, policyGenerationAssetId?: string, ...},
 *         policy?: array{statement?: string, ...},
 *         ...,
 *     },
 *     validationMode?: 'FAIL_ON_ANY_FINDINGS'|'IGNORE_ALL_FINDINGS',
 *     enforcementMode?: 'ACTIVE'|'LOG_ONLY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePolicyEngine(array $args = [])
 * @phpstan-method \Aws\Result updatePolicyEngine(array{policyEngineId?: string, description?: array{optionalValue?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePolicyEngineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePolicyEngineAsync(array{policyEngineId?: string, description?: array{optionalValue?: string, ...}, ...} $args = [])
 * @method \Aws\Result updateRegistry(array $args = [])
 * @phpstan-method \Aws\Result updateRegistry(array{
 *     registryId?: string,
 *     name?: string,
 *     description?: array{optionalValue?: string, ...},
 *     authorizerConfiguration?: array{optionalValue?: array{customJWTAuthorizer?: array, ...}, ...},
 *     approvalConfiguration?: array{optionalValue?: array{autoApproval?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegistryAsync(array{
 *     registryId?: string,
 *     name?: string,
 *     description?: array{optionalValue?: string, ...},
 *     authorizerConfiguration?: array{optionalValue?: array{customJWTAuthorizer?: array, ...}, ...},
 *     approvalConfiguration?: array{optionalValue?: array{autoApproval?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRegistryRecord(array $args = [])
 * @phpstan-method \Aws\Result updateRegistryRecord(array{
 *     registryId?: string,
 *     recordId?: string,
 *     name?: string,
 *     description?: array{optionalValue?: string, ...},
 *     descriptorType?: 'A2A'|'AGENT_SKILLS'|'CUSTOM'|'MCP',
 *     descriptors?: array{optionalValue?: array{mcp?: array, a2a?: array, custom?: array, agentSkills?: array, ...}, ...},
 *     recordVersion?: string,
 *     synchronizationType?: array{optionalValue?: 'URL', ...},
 *     synchronizationConfiguration?: array{optionalValue?: array{fromUrl?: array, ...}, ...},
 *     triggerSynchronization?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegistryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegistryRecordAsync(array{
 *     registryId?: string,
 *     recordId?: string,
 *     name?: string,
 *     description?: array{optionalValue?: string, ...},
 *     descriptorType?: 'A2A'|'AGENT_SKILLS'|'CUSTOM'|'MCP',
 *     descriptors?: array{optionalValue?: array{mcp?: array, a2a?: array, custom?: array, agentSkills?: array, ...}, ...},
 *     recordVersion?: string,
 *     synchronizationType?: array{optionalValue?: 'URL', ...},
 *     synchronizationConfiguration?: array{optionalValue?: array{fromUrl?: array, ...}, ...},
 *     triggerSynchronization?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRegistryRecordStatus(array $args = [])
 * @phpstan-method \Aws\Result updateRegistryRecordStatus(array{
 *     registryId?: string,
 *     recordId?: string,
 *     status?: 'APPROVED'|'CREATE_FAILED'|'CREATING'|'DEPRECATED'|'DRAFT'|'PENDING_APPROVAL'|'REJECTED'|'UPDATE_FAILED'|'UPDATING',
 *     statusReason?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegistryRecordStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegistryRecordStatusAsync(array{
 *     registryId?: string,
 *     recordId?: string,
 *     status?: 'APPROVED'|'CREATE_FAILED'|'CREATING'|'DEPRECATED'|'DRAFT'|'PENDING_APPROVAL'|'REJECTED'|'UPDATE_FAILED'|'UPDATING',
 *     statusReason?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkloadIdentity(array $args = [])
 * @phpstan-method \Aws\Result updateWorkloadIdentity(array{name?: string, allowedResourceOauth2ReturnUrls?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkloadIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkloadIdentityAsync(array{name?: string, allowedResourceOauth2ReturnUrls?: list<string>, ...} $args = [])
 */
class BedrockAgentCoreControlClient extends AwsClient {}
