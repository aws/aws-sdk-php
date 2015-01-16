<?php
/*
 * Adds autoloading of legacy named AWS classes.
 *
 * Set $_ENV['AWS_SHOW_LEGACY_WARNINGS'] to true to trigger E_USER_DEPRECATED
 * warnings. These warnings will show the name of the legacy class being loaded
 * and the name of the new class name. This is useful for migrating
 * applications to v3 so that they do not rely on the legacy autoloader.
 */

$oldToNewMap = [
    'Aws\\AutoScaling\\AutoScalingClient' => 'Aws\\AutoScalingClient',
    'Aws\\CloudFormation\\CloudFormationClient' => 'Aws\\CloudFormationClient',
    'Aws\\CloudFront\\CloudFrontClient' => 'Aws\\CloudFrontClient',
    'Aws\\CloudSearch\\CloudSearchClient' => 'Aws\\CloudSearchClient',
    'Aws\\CloudSearchDomain\\CloudSearchDomainClient' => 'Aws\\CloudSearchDomainClient',
    'Aws\\CloudTrail\\CloudTrailClient' => 'Aws\\CloudTrailClient',
    'Aws\\CloudWatch\\CloudWatchClient' => 'Aws\\CloudWatchClient',
    'Aws\\CloudWatchLogs\\CloudWatchLogsClient' => 'Aws\\CloudWatchLogsClient',
    'Aws\\CognitoIdentity\\CognitoIdentityClient' => 'Aws\\CognitoIdentityClient',
    'Aws\\CognitoSync\\CognitoSyncClient' => 'Aws\\CognitoSyncClient',
    'Aws\\DataPipeline\\DataPipelineClient' => 'Aws\\DataPipelineClient',
    'Aws\\DirectConnect\\DirectConnectClient' => 'Aws\\DirectConnectClient',
    'Aws\\DynamoDb\\DynamoDbClient' => 'Aws\\DynamoDbClient',
    'Aws\\Ec2\\Ec2Client' => 'Aws\\Ec2Client',
    'Aws\\Ecs\\EcsClient' => 'Aws\\EcsClient',
    'Aws\\ElastiCache\\ElastiCacheClient' => 'Aws\\ElastiCacheClient',
    'Aws\\ElasticBeanstalk\\ElasticBeanstalkClient' => 'Aws\\ElasticBeanstalkClient',
    'Aws\\ElasticLoadBalancing\\ElasticLoadBalancingClient' => 'Aws\\ElasticLoadBalancingClient',
    'Aws\\ElasticTranscoder\\ElasticTranscoderClient' => 'Aws\\ElasticTranscoderClient',
    'Aws\\Emr\\EmrClient' => 'Aws\\EmrClient',
    'Aws\\Glacier\\GlacierClient' => 'Aws\\GlacierClient',
    'Aws\\Iam\\IamClient' => 'Aws\\IamClient',
    'Aws\\ImportExport\\ImportExportClient' => 'Aws\\ImportExportClient',
    'Aws\\Kinesis\\KinesisClient' => 'Aws\\KinesisClient',
    'Aws\\OpsWorks\\OpsWorksClient' => 'Aws\\OpsWorksClient',
    'Aws\\Rds\\RdsClient' => 'Aws\\RdsClient',
    'Aws\\Redshift\\RedshiftClient' => 'Aws\\RedshiftClient',
    'Aws\\Route53\\Route53Client' => 'Aws\\Route53Client',
    'Aws\\Route53Domains\\Route53DomainsClient' => 'Aws\\Route53DomainsClient',
    'Aws\\S3\\S3Client' => 'Aws\\S3Client',
    'Aws\\Ses\\SesClient' => 'Aws\\SesClient',
    'Aws\\SimpleDb\\SimpleDbClient' => 'Aws\\SimpleDbClient',
    'Aws\\Sns\\SnsClient' => 'Aws\\SnsClient',
    'Aws\\Sqs\\SqsClient' => 'Aws\\SqsClient',
    'Aws\\StorageGateway\\StorageGatewayClient' => 'Aws\\StorageGatewayClient',
    'Aws\\Sts\\StsClient' => 'Aws\\StsClient',
    'Aws\\Support\\SupportClient' => 'Aws\\SupportClient',
    'Aws\\Swf\\SwfClient' => 'Aws\\SwfClient',

    'Aws\\AutoScaling\\Exception\\AutoScalingException' => 'Aws\\Exception\\AutoScalingException',
    'Aws\\CloudFormation\\Exception\\CloudFormationException' => 'Aws\\Exception\\CloudFormationException',
    'Aws\\CloudFront\\Exception\\CloudFrontException' => 'Aws\\Exception\\CloudFrontException',
    'Aws\\CloudSearch\\Exception\\CloudSearchException' => 'Aws\\Exception\\CloudSearchException',
    'Aws\\CloudSearchDomain\\Exception\\CloudSearchDomainException' => 'Aws\\Exception\\CloudSearchDomainException',
    'Aws\\CloudTrail\\Exception\\CloudTrailException' => 'Aws\\Exception\\CloudTrailException',
    'Aws\\CloudWatch\\Exception\\CloudWatchException' => 'Aws\\Exception\\CloudWatchException',
    'Aws\\CloudWatchLogs\\Exception\\CloudWatchLogsException' => 'Aws\\Exception\\CloudWatchLogsException',
    'Aws\\CognitoIdentity\\Exception\\CognitoIdentityException' => 'Aws\\Exception\\CognitoIdentityException',
    'Aws\\CognitoSync\\Exception\\CognitoSyncException' => 'Aws\\Exception\\CognitoSyncException',
    'Aws\\DataPipeline\\Exception\\DataPipelineException' => 'Aws\\Exception\\DataPipelineException',
    'Aws\\DirectConnect\\Exception\\DirectConnectException' => 'Aws\\Exception\\DirectConnectException',
    'Aws\\DynamoDb\\Exception\\DynamoDbException' => 'Aws\\Exception\\DynamoDbException',
    'Aws\\Ec2\\Exception\\Ec2Exception' => 'Aws\\Exception\\Ec2Exception',
    'Aws\\ElastiCache\\Exception\\ElastiCacheException' => 'Aws\\Exception\\ElastiCacheException',
    'Aws\\ElasticBeanstalk\\Exception\\ElasticBeanstalkException' => 'Aws\\Exception\\ElasticBeanstalkException',
    'Aws\\ElasticLoadBalancing\\Exception\\ElasticLoadBalancingException' => 'Aws\\Exception\\ElasticLoadBalancingException',
    'Aws\\ElasticTranscoder\\Exception\\ElasticTranscoderException' => 'Aws\\Exception\\ElasticTranscoderException',
    'Aws\\Emr\\Exception\\EmrException' => 'Aws\\Exception\\EmrException',
    'Aws\\Glacier\\Exception\\GlacierException' => 'Aws\\Exception\\GlacierException',
    'Aws\\Iam\\Exception\\IamException' => 'Aws\\Exception\\IamException',
    'Aws\\ImportExport\\Exception\\ImportExportException' => 'Aws\\Exception\\ImportExportException',
    'Aws\\Kinesis\\Exception\\KinesisException' => 'Aws\\Exception\\KinesisException',
    'Aws\\OpsWorks\\Exception\\OpsWorksException' => 'Aws\\Exception\\OpsWorksException',
    'Aws\\Rds\\Exception\\RdsException' => 'Aws\\Exception\\RdsException',
    'Aws\\Redshift\\Exception\\RedshiftException' => 'Aws\\Exception\\RedshiftException',
    'Aws\\Route53\\Exception\\Route53Exception' => 'Aws\\Exception\\Route53Exception',
    'Aws\\Route53Domains\\Exception\\Route53DomainsException' => 'Aws\\Exception\\Route53DomainsException',
    'Aws\\S3\\Exception\\S3Exception' => 'Aws\\Exception\\S3Exception',
    'Aws\\Ses\\Exception\\SesException' => 'Aws\\Exception\\SesException',
    'Aws\\SimpleDb\\Exception\\SimpleDbException' => 'Aws\\Exception\\SimpleDbException',
    'Aws\\Sns\\Exception\\SnsException' => 'Aws\\Exception\\SnsException',
    'Aws\\Sqs\\Exception\\SqsException' => 'Aws\\Exception\\SqsException',
    'Aws\\StorageGateway\\Exception\\StorageGatewayException' => 'Aws\\Exception\\StorageGatewayException',
    'Aws\\Sts\\Exception\\StsException' => 'Aws\\Exception\\StsException',
    'Aws\\Support\\Exception\\SupportException' => 'Aws\\Exception\\SupportException',
    'Aws\\Swf\\Exception\\SwfException' => 'Aws\\Exception\\SwfException',

    'Aws\\Common\\Credentials\\Credentials' => 'Aws\\Credentials\\Credentials',
    'Aws\\Common\\RulesEndpointProvider' => 'Aws\\EndpointProvider',

    'Aws\\S3\\Model\\ClearBucket' => 'Aws\\S3\\ClearBucket',
    'Aws\\S3\\Model\\PostObject' => 'Aws\\S3\\PostObject',

    'Aws\\DynamoDb\\Session\\SessionHandler' => 'Aws\\DynamoDb\\SessionHandler'
];

$removedClasses = [
    'Aws\\Common\\Aws' => 'Please update your code to use the simpler Aws\\Sdk class and its new conventions. Please note that the SDK no longer supports the JSON or PHP configuration files.',

    'Aws\\S3\\ResumableDownload' => '',
    'Aws\\S3\\Sync\\UploadSyncBuilder' => 'Please update your code to use the simpler Aws\\S3\\Transfer class',
    'Aws\\S3\\Sync\\DownloadSyncBuilder' => 'Please update your code to use the simpler Aws\\S3\\Transfer class',
    'Aws\\S3\\Model\\Acp' => 'Building access control policies is no longer supported by the SDK. Please build ACPs using strings that contain XML data as defined in http://docs.aws.amazon.com/AmazonS3/latest/dev/acl-overview.html',
    'Aws\\S3\\Model\\AcpBuilder' => 'Building access control policies is no longer supported by the SDK. Please build ACPs using strings that contain XML data as defined in http://docs.aws.amazon.com/AmazonS3/latest/dev/acl-overview.html',
    'Aws\\S3\\Model\\MultipartUpload\\UploadBuilder' => 'Please use Aws\\S3\\UploadBuilder',

    'Aws\\DynamoDb\\Model\\Item' => 'Please use the Aws\\DynamoDb\\Marshaler class instead',
    'Aws\\DynamoDb\\Model\\Attribute' => 'Please use the Aws\\DynamoDb\\Marshaler class instead',
    'Aws\\DynamoDb\\Model\\BatchRequest\\WriteRequestBatch' => 'Please use Aws\\DynamoDb\\WriteRequestBatch',
];

spl_autoload_register(function ($class) use ($oldToNewMap, $removedClasses) {
    if (isset($oldToNewMap[$class])) {
        if (!empty($_ENV['AWS_SHOW_LEGACY_WARNINGS'])) {
            trigger_error("{$class} is deprecated. Use {$oldToNewMap[$class]}", E_USER_DEPRECATED);
        }
        class_alias($oldToNewMap[$class], $class);
    } elseif (isset($removedClasses[$class])) {
        throw new \RuntimeException(
            sprintf(
                '%s has been removed from the AWS SDK for PHP v3. %s',
                $class,
                $removedClasses[$class]
            )
        );
    }
}, true, false);
