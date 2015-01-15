<?php return [
  'operations' => [
    'CreateTrail' => '<p>From the command line, use <code>create-subscription</code>. </p> <p>Creates a trail that specifies the settings for delivery of log data to an Amazon S3 bucket. </p>',
    'DeleteTrail' => '<p>Deletes a trail.</p>',
    'DescribeTrails' => '<p>Retrieves settings for the trail associated with the current region for your account.</p>',
    'GetTrailStatus' => '<p>Returns a JSON-formatted list of information about the specified trail. Fields include information on delivery errors, Amazon SNS and Amazon S3 errors, and start and stop logging times for each trail. </p>',
    'StartLogging' => '<p>Starts the recording of AWS API calls and log file delivery for a trail.</p>',
    'StopLogging' => '<p>Suspends the recording of AWS API calls and log file delivery for the specified trail. Under most circumstances, there is no need to use this action. You can update a trail without stopping it first. This action is the only way to stop recording.</p>',
    'UpdateTrail' => '<p>From the command line, use <code>update-subscription</code>.</p> <p>Updates the settings that specify delivery of log files. Changes to a trail do not require stopping the CloudTrail service. Use this action to designate an existing bucket for log delivery. If the existing bucket has previously been a target for CloudTrail log files, an IAM policy exists for the bucket. </p>',
  ],
  'service' => '<fullname>AWS CloudTrail</fullname> <p>This is the CloudTrail API Reference. It provides descriptions of actions, data types, common parameters, and common errors for CloudTrail.</p> <p>CloudTrail is a web service that records AWS API calls for your AWS account and delivers log files to an Amazon S3 bucket. The recorded information includes the identity of the user, the start time of the AWS API call, the source IP address, the request parameters, and the response elements returned by the service.</p> <note> As an alternative to using the API, you can use one of the AWS SDKs, which consist of libraries and sample code for various programming languages and platforms (Java, Ruby, .NET, iOS, Android, etc.]. The SDKs provide a convenient way to create programmatic access to AWSCloudTrail. For example, the SDKs take care of cryptographically signing requests, managing errors, and retrying requests automatically. For information about the AWS SDKs, including how to download and install them, see the <a href="http://aws.amazon.com/tools/">Tools for Amazon Web Services page</a>. </note> <p>See the CloudTrail User Guide for information about the data that is included with each AWS API call listed in the log files.</p>',
  'shapes' => [
    'Boolean' => [
      'base' => NULL,
      'refs' => [
        'CreateTrailRequest$IncludeGlobalServiceEvents' => '<p>Specifies whether the trail is publishing events from global services such as IAM to the log files. </p>',
        'CreateTrailResponse$IncludeGlobalServiceEvents' => '<p>Specifies whether the trail is publishing events from global services such as IAM to the log files. </p>',
        'GetTrailStatusResponse$IsLogging' => '<p>Whether the CloudTrail is currently logging AWS API calls.</p>',
        'Trail$IncludeGlobalServiceEvents' => '<p>Set to <b>True</b> to include AWS API calls from AWS global services such as IAM. Otherwise, <b>False</b>.</p>',
        'UpdateTrailRequest$IncludeGlobalServiceEvents' => '<p>Specifies whether the trail is publishing events from global services such as IAM to the log files. </p>',
        'UpdateTrailResponse$IncludeGlobalServiceEvents' => '<p>Specifies whether the trail is publishing events from global services such as IAM to the log files. </p>',
      ],
    ],
    'CloudWatchLogsDeliveryUnavailableException' => [
      'base' => 'Cannot set a CloudWatch Logs delivery for this region.',
      'refs' => [],
    ],
    'CreateTrailRequest' => [
      'base' => '<p>Specifies the settings for each trail.</p>',
      'refs' => [],
    ],
    'CreateTrailResponse' => [
      'base' => 'Returns the objects or data listed below if successful. Otherwise, returns an error.',
      'refs' => [],
    ],
    'Date' => [
      'base' => NULL,
      'refs' => [
        'GetTrailStatusResponse$LatestDeliveryTime' => '<p>Specifies the date and time that CloudTrail last delivered log files to an account\'s Amazon S3 bucket.</p>',
        'GetTrailStatusResponse$LatestNotificationTime' => '<p>Specifies the date and time of the most recent Amazon SNS notification that CloudTrail has written a new log file to an account\'s Amazon S3 bucket. </p>',
        'GetTrailStatusResponse$StartLoggingTime' => '<p>Specifies the most recent date and time when CloudTrail started recording API calls for an AWS account. </p>',
        'GetTrailStatusResponse$StopLoggingTime' => '<p>Specifies the most recent date and time when CloudTrail stopped recording API calls for an AWS account. </p>',
        'GetTrailStatusResponse$LatestCloudWatchLogsDeliveryTime' => '<p>Displays the most recent date and time when CloudTrail delivered logs to CloudWatch Logs.</p>',
      ],
    ],
    'DeleteTrailRequest' => [
      'base' => '<a>The request that specifies the name of a trail to delete.</a>',
      'refs' => [],
    ],
    'DeleteTrailResponse' => [
      'base' => '<p>Returns the objects or data listed below if successful. Otherwise, returns an error.</p>',
      'refs' => [],
    ],
    'DescribeTrailsRequest' => [
      'base' => '<p>Returns information about the trail.</p>',
      'refs' => [],
    ],
    'DescribeTrailsResponse' => [
      'base' => '<p>Returns the objects or data listed below if successful. Otherwise, returns an error.</p>',
      'refs' => [],
    ],
    'GetTrailStatusRequest' => [
      'base' => '<p>The name of a trail about which you want the current status.</p>',
      'refs' => [],
    ],
    'GetTrailStatusResponse' => [
      'base' => '<p>Returns the objects or data listed below if successful. Otherwise, returns an error.</p>',
      'refs' => [],
    ],
    'InsufficientS3BucketPolicyException' => [
      'base' => 'This exception is thrown when the policy on the S3 bucket is not sufficient.',
      'refs' => [],
    ],
    'InsufficientSnsTopicPolicyException' => [
      'base' => 'This exception is thrown when the policy on the SNS topic is not sufficient.',
      'refs' => [],
    ],
    'InvalidCloudWatchLogsLogGroupArnException' => [
      'base' => 'This exception is thrown when the provided CloudWatch log group is not valid.',
      'refs' => [],
    ],
    'InvalidCloudWatchLogsRoleArnException' => [
      'base' => 'This exception is thrown when the provided role is not valid.',
      'refs' => [],
    ],
    'InvalidS3BucketNameException' => [
      'base' => 'This exception is thrown when the provided S3 bucket name is not valid.',
      'refs' => [],
    ],
    'InvalidS3PrefixException' => [
      'base' => 'This exception is thrown when the provided S3 prefix is not valid.',
      'refs' => [],
    ],
    'InvalidSnsTopicNameException' => [
      'base' => 'This exception is thrown when the provided SNS topic name is not valid.',
      'refs' => [],
    ],
    'InvalidTrailNameException' => [
      'base' => 'This exception is thrown when the provided trail name is not valid.',
      'refs' => [],
    ],
    'MaximumNumberOfTrailsExceededException' => [
      'base' => 'This exception is thrown when the maximum number of trails is reached.',
      'refs' => [],
    ],
    'S3BucketDoesNotExistException' => [
      'base' => 'This exception is thrown when the specified S3 bucket does not exist.',
      'refs' => [],
    ],
    'StartLoggingRequest' => [
      'base' => '<p>The request to CloudTrail to start logging AWS API calls for an account.</p>',
      'refs' => [],
    ],
    'StartLoggingResponse' => [
      'base' => '<p>Returns the objects or data listed below if successful. Otherwise, returns an error.</p>',
      'refs' => [],
    ],
    'StopLoggingRequest' => [
      'base' => '<p>Passes the request to CloudTrail to stop logging AWS API calls for the specified account.</p>',
      'refs' => [],
    ],
    'StopLoggingResponse' => [
      'base' => '<p>Returns the objects or data listed below if successful. Otherwise, returns an error.</p>',
      'refs' => [],
    ],
    'String' => [
      'base' => NULL,
      'refs' => [
        'CreateTrailRequest$Name' => '<p>Specifies the name of the trail.</p>',
        'CreateTrailRequest$S3BucketName' => '<p>Specifies the name of the Amazon S3 bucket designated for publishing log files.</p>',
        'CreateTrailRequest$S3KeyPrefix' => '<p>Specifies the Amazon S3 key prefix that precedes the name of the bucket you have designated for log file delivery.</p>',
        'CreateTrailRequest$SnsTopicName' => '<p>Specifies the name of the Amazon SNS topic defined for notification of log file delivery.</p>',
        'CreateTrailRequest$CloudWatchLogsLogGroupArn' => '<p>Specifies a log group name using an Amazon Resource Name (ARN], a unique identifier that represents the log group to which CloudTrail logs will be delivered. Not required unless you specify CloudWatchLogsRoleArn.</p>',
        'CreateTrailRequest$CloudWatchLogsRoleArn' => '<p>Specifies the role for the CloudWatch Logs endpoint to assume to write to a user’s log group.</p>',
        'CreateTrailResponse$Name' => '<p>Specifies the name of the trail.</p>',
        'CreateTrailResponse$S3BucketName' => '<p>Specifies the name of the Amazon S3 bucket designated for publishing log files.</p>',
        'CreateTrailResponse$S3KeyPrefix' => '<p>Specifies the Amazon S3 key prefix that precedes the name of the bucket you have designated for log file delivery.</p>',
        'CreateTrailResponse$SnsTopicName' => '<p>Specifies the name of the Amazon SNS topic defined for notification of log file delivery.</p>',
        'CreateTrailResponse$CloudWatchLogsLogGroupArn' => '<p>Specifies the Amazon Resource Name (ARN] of the log group to which CloudTrail logs will be delivered.</p>',
        'CreateTrailResponse$CloudWatchLogsRoleArn' => '<p>Specifies the role for the CloudWatch Logs endpoint to assume to write to a user’s log group.</p>',
        'DeleteTrailRequest$Name' => '<p>The name of a trail to be deleted.</p>',
        'GetTrailStatusRequest$Name' => '<p>The name of the trail for which you are requesting the current status.</p>',
        'GetTrailStatusResponse$LatestDeliveryError' => '<p>Displays any Amazon S3 error that CloudTrail encountered when attempting to deliver log files to the designated bucket. For more information see the topic <a href="http://docs.aws.amazon.com/AmazonS3/latest/API/ErrorResponses.html">Error Responses</a> in the Amazon S3 API Reference. </p>',
        'GetTrailStatusResponse$LatestNotificationError' => '<p>Displays any Amazon SNS error that CloudTrail encountered when attempting to send a notification. For more information about Amazon SNS errors, see the <a href="http://docs.aws.amazon.com/sns/latest/dg/welcome.html">Amazon SNS Developer Guide</a>. </p>',
        'GetTrailStatusResponse$LatestCloudWatchLogsDeliveryError' => '<p>Displays any CloudWatch Logs error that CloudTrail encountered when attempting to deliver logs to CloudWatch Logs.</p>',
        'StartLoggingRequest$Name' => '<p>The name of the trail for which CloudTrail logs AWS API calls.</p>',
        'StopLoggingRequest$Name' => '<p>Communicates to CloudTrail the name of the trail for which to stop logging AWS API calls.</p>',
        'Trail$Name' => '<p>Name of the trail set by calling <a>CreateTrail</a>.</p>',
        'Trail$S3BucketName' => '<p>Name of the Amazon S3 bucket into which CloudTrail delivers your trail files. </p>',
        'Trail$S3KeyPrefix' => '<p>Value of the Amazon S3 prefix.</p>',
        'Trail$SnsTopicName' => '<p>Name of the existing Amazon SNS topic that CloudTrail uses to notify the account owner when new CloudTrail log files have been delivered. </p>',
        'Trail$CloudWatchLogsLogGroupArn' => '<p>Specifies an Amazon Resource Name (ARN], a unique identifier that represents the log group to which CloudTrail logs will be delivered.</p>',
        'Trail$CloudWatchLogsRoleArn' => '<p>Specifies the role for the CloudWatch Logs endpoint to assume to write to a user’s log group.</p>',
        'TrailNameList$member' => NULL,
        'UpdateTrailRequest$Name' => '<p>Specifies the name of the trail.</p>',
        'UpdateTrailRequest$S3BucketName' => '<p>Specifies the name of the Amazon S3 bucket designated for publishing log files.</p>',
        'UpdateTrailRequest$S3KeyPrefix' => '<p>Specifies the Amazon S3 key prefix that precedes the name of the bucket you have designated for log file delivery.</p>',
        'UpdateTrailRequest$SnsTopicName' => '<p>Specifies the name of the Amazon SNS topic defined for notification of log file delivery.</p>',
        'UpdateTrailRequest$CloudWatchLogsLogGroupArn' => '<p>Specifies a log group name using an Amazon Resource Name (ARN], a unique identifier that represents the log group to which CloudTrail logs will be delivered. Not required unless you specify CloudWatchLogsRoleArn.</p>',
        'UpdateTrailRequest$CloudWatchLogsRoleArn' => '<p>Specifies the role for the CloudWatch Logs endpoint to assume to write to a user’s log group.</p>',
        'UpdateTrailResponse$Name' => '<p>Specifies the name of the trail.</p>',
        'UpdateTrailResponse$S3BucketName' => '<p>Specifies the name of the Amazon S3 bucket designated for publishing log files.</p>',
        'UpdateTrailResponse$S3KeyPrefix' => '<p>Specifies the Amazon S3 key prefix that precedes the name of the bucket you have designated for log file delivery.</p>',
        'UpdateTrailResponse$SnsTopicName' => '<p>Specifies the name of the Amazon SNS topic defined for notification of log file delivery.</p>',
        'UpdateTrailResponse$CloudWatchLogsLogGroupArn' => '<p>Specifies the Amazon Resource Name (ARN] of the log group to which CloudTrail logs will be delivered.</p>',
        'UpdateTrailResponse$CloudWatchLogsRoleArn' => '<p>Specifies the role for the CloudWatch Logs endpoint to assume to write to a user’s log group.</p>',
      ],
    ],
    'Trail' => [
      'base' => '<p>The settings for a trail.</p>',
      'refs' => [
        'TrailList$member' => NULL,
      ],
    ],
    'TrailAlreadyExistsException' => [
      'base' => 'This exception is thrown when the specified trail already exists.',
      'refs' => [],
    ],
    'TrailList' => [
      'base' => NULL,
      'refs' => [
        'DescribeTrailsResponse$trailList' => '<p>The list of trails.</p>',
      ],
    ],
    'TrailNameList' => [
      'base' => NULL,
      'refs' => [
        'DescribeTrailsRequest$trailNameList' => '<p>The trail returned.</p>',
      ],
    ],
    'TrailNotFoundException' => [
      'base' => 'This exception is thrown when the trail with the given name is not found.',
      'refs' => [],
    ],
    'UpdateTrailRequest' => [
      'base' => '<p>Specifies settings to update for the trail.</p>',
      'refs' => [],
    ],
    'UpdateTrailResponse' => [
      'base' => 'Returns the objects or data listed below if successful. Otherwise, returns an error.',
      'refs' => [],
    ],
  ],
];
