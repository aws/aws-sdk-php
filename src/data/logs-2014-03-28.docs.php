<?php return [
  'operations' => [
    'CreateLogGroup' => '<p> Creates a new log group with the specified name. The name of the log group must be unique within a region for an AWS account. You can create up to 500 log groups per account. </p> <p> You must use the following guidelines when naming a log group: <ul> <li>Log group names can be between 1 and 512 characters long.</li> <li>Allowed characters are a-z, A-Z, 0-9, \'_\' (underscore], \'-\' (hyphen], \'/\' (forward slash], and \'.\' (period].</li> </ul> </p>',
    'CreateLogStream' => '<p> Creates a new log stream in the specified log group. The name of the log stream must be unique within the log group. There is no limit on the number of log streams that can exist in a log group. </p> <p> You must use the following guidelines when naming a log stream: <ul> <li>Log stream names can be between 1 and 512 characters long.</li> <li>The \':\' colon character is not allowed.</li> </ul> </p>',
    'DeleteLogGroup' => '<p> Deletes the log group with the specified name and permanently deletes all the archived log events associated with it. </p>',
    'DeleteLogStream' => '<p> Deletes a log stream and permanently deletes all the archived log events associated with it. </p>',
    'DeleteMetricFilter' => '<p> Deletes a metric filter associated with the specified log group. </p>',
    'DeleteRetentionPolicy' => '<p> Deletes the retention policy of the specified log group. Log events would not expire if they belong to log groups without a retention policy. </p>',
    'DescribeLogGroups' => '<p> Returns all the log groups that are associated with the AWS account making the request. The list returned in the response is ASCII-sorted by log group name. </p> <p> By default, this operation returns up to 50 log groups. If there are more log groups to list, the response would contain a <code class="code">nextToken</code> value in the response body. You can also limit the number of log groups returned in the response by specifying the <code class="code">limit</code> parameter in the request. </p>',
    'DescribeLogStreams' => '<p> Returns all the log streams that are associated with the specified log group. The list returned in the response is ASCII-sorted by log stream name. </p> <p> By default, this operation returns up to 50 log streams. If there are more log streams to list, the response would contain a <code class="code">nextToken</code> value in the response body. You can also limit the number of log streams returned in the response by specifying the <code class="code">limit</code> parameter in the request. </p>',
    'DescribeMetricFilters' => '<p> Returns all the metrics filters associated with the specified log group. The list returned in the response is ASCII-sorted by filter name. </p> <p> By default, this operation returns up to 50 metric filters. If there are more metric filters to list, the response would contain a <code class="code">nextToken</code> value in the response body. You can also limit the number of metric filters returned in the response by specifying the <code class="code">limit</code> parameter in the request. </p>',
    'GetLogEvents' => '<p> Retrieves log events from the specified log stream. You can provide an optional time range to filter the results on the event <code class="code">timestamp</code>. </p> <p> By default, this operation returns as much log events as can fit in a response size of 1MB, up to 10,000 log events. The response will always include a <code class="code">nextForwardToken</code> and a <code class="code">nextBackwardToken</code> in the response body. You can use any of these tokens in subsequent <code class="code">GetLogEvents</code> requests to paginate through events in either forward or backward direction. You can also limit the number of log events returned in the response by specifying the <code class="code">limit</code> parameter in the request. </p>',
    'PutLogEvents' => '<p> Uploads a batch of log events to the specified log stream. </p> <p> Every PutLogEvents request must include the <code class="code">sequenceToken</code> obtained from the response of the previous request. An upload in a newly created log stream does not require a <code class="code">sequenceToken</code>. </p> <p> The batch of events must satisfy the following constraints: <ul> <li>The maximum batch size is 32,768 bytes, and this size is calculated as the sum of all event messages in UTF-8, plus 26 bytes for each log event.</li> <li>None of the log events in the batch can be more than 2 hours in the future.</li> <li>None of the log events in the batch can be older than 14 days or the retention period of the log group.</li> <li>The log events in the batch must be in chronological ordered by their <code class="code">timestamp</code>.</li> <li>The maximum number of log events in a batch is 1,000.</li> </ul> </p>',
    'PutMetricFilter' => '<p> Creates or updates a metric filter and associates it with the specified log group. Metric filters allow you to configure rules to extract metric data from log events ingested through <code class="code">PutLogEvents</code> requests. </p>',
    'PutRetentionPolicy' => '<p> Sets the retention of the specified log group. A retention policy allows you to configure the number of days you want to retain log events in the specified log group. </p>',
    'TestMetricFilter' => '<p> Tests the filter pattern of a metric filter against a sample of log event messages. You can use this operation to validate the correctness of a metric filter pattern. </p>',
  ],
  'service' => '<fullname>Amazon CloudWatch Logs API Reference</fullname> <p>This is the <i>Amazon CloudWatch Logs API Reference</i>. Amazon CloudWatch Logs enables you to monitor, store, and access your system, application, and custom log files. This guide provides detailed information about Amazon CloudWatch Logs actions, data types, parameters, and errors. For detailed information about Amazon CloudWatch Logs features and their associated API calls, go to the <a href="http://docs.aws.amazon.com/AmazonCloudWatch/latest/DeveloperGuide">Amazon CloudWatch Developer Guide</a>. </p> <p>Use the following links to get started using the <i>Amazon CloudWatch Logs API Reference</i>:</p> <ul> <li> <a href="http://docs.aws.amazon.com/AmazonCloudWatchLogs/latest/APIReference/API_Operations.html">Actions</a>: An alphabetical list of all Amazon CloudWatch Logs actions.</li> <li> <a href="http://docs.aws.amazon.com/AmazonCloudWatchLogs/latest/APIReference/API_Types.html">Data Types</a>: An alphabetical list of all Amazon CloudWatch Logs data types.</li> <li> <a href="http://docs.aws.amazon.com/AmazonCloudWatchLogs/latest/APIReference/CommonParameters.html">Common Parameters</a>: Parameters that all Query actions can use.</li> <li> <a href="http://docs.aws.amazon.com/AmazonCloudWatchLogs/latest/APIReference/CommonErrors.html">Common Errors</a>: Client and server errors that all actions can return.</li> <li> <a href="http://docs.aws.amazon.com/general/latest/gr/index.html?rande.html">Regions and Endpoints</a>: Itemized regions and endpoints for all AWS products.</li> </ul> <p>In addition to using the Amazon CloudWatch Logs API, you can also use the following SDKs and third-party libraries to access Amazon CloudWatch Logs programmatically.</p> <ul> <li><a href="http://aws.amazon.com/documentation/sdkforjava/">AWS SDK for Java Documentation</a></li> <li><a href="http://aws.amazon.com/documentation/sdkfornet/">AWS SDK for .NET Documentation</a></li> <li><a href="http://aws.amazon.com/documentation/sdkforphp/">AWS SDK for PHP Documentation</a></li> <li><a href="http://aws.amazon.com/documentation/sdkforruby/">AWS SDK for Ruby Documentation</a></li> </ul> <p>Developers in the AWS developer community also provide their own libraries, which you can find at the following AWS developer centers:</p> <ul> <li><a href="http://aws.amazon.com/java/">AWS Java Developer Center</a></li> <li><a href="http://aws.amazon.com/php/">AWS PHP Developer Center</a></li> <li><a href="http://aws.amazon.com/python/">AWS Python Developer Center</a></li> <li><a href="http://aws.amazon.com/ruby/">AWS Ruby Developer Center</a></li> <li><a href="http://aws.amazon.com/net/">AWS Windows and .NET Developer Center</a></li> </ul>',
  'shapes' => [
    'Arn' => [
      'base' => NULL,
      'refs' => [
        'LogGroup$arn' => NULL,
        'LogStream$arn' => NULL,
      ],
    ],
    'CreateLogGroupRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateLogStreamRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DataAlreadyAcceptedException' => [
      'base' => NULL,
      'refs' => [],
    ],
    'Days' => [
      'base' => 'Specifies the number of days you want to retain log events in the specified log group. Possible values are: 1, 3, 5, 7, 14, 30, 60, 90, 120, 150, 180, 365, 400, 545, 731, 1827, 3653.',
      'refs' => [
        'LogGroup$retentionInDays' => NULL,
        'PutRetentionPolicyRequest$retentionInDays' => NULL,
      ],
    ],
    'DeleteLogGroupRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteLogStreamRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteMetricFilterRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteRetentionPolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeLimit' => [
      'base' => 'The maximum number of results to return.',
      'refs' => [
        'DescribeLogGroupsRequest$limit' => '<p> The maximum number of items returned in the response. If you don\'t specify a value, the request would return up to 50 items. </p>',
        'DescribeLogStreamsRequest$limit' => '<p> The maximum number of items returned in the response. If you don\'t specify a value, the request would return up to 50 items. </p>',
        'DescribeMetricFiltersRequest$limit' => '<p> The maximum number of items returned in the response. If you don\'t specify a value, the request would return up to 50 items. </p>',
      ],
    ],
    'DescribeLogGroupsRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeLogGroupsResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeLogStreamsRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeLogStreamsResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeMetricFiltersRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeMetricFiltersResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'EventMessage' => [
      'base' => NULL,
      'refs' => [
        'InputLogEvent$message' => NULL,
        'MetricFilterMatchRecord$eventMessage' => NULL,
        'OutputLogEvent$message' => NULL,
        'TestEventMessages$member' => NULL,
      ],
    ],
    'EventNumber' => [
      'base' => NULL,
      'refs' => [
        'MetricFilterMatchRecord$eventNumber' => NULL,
      ],
    ],
    'EventsLimit' => [
      'base' => 'The maximum number of events to return.',
      'refs' => [
        'GetLogEventsRequest$limit' => '<p> The maximum number of log events returned in the response. If you don\'t specify a value, the request would return as much log events as can fit in a response size of 1MB, up to 10,000 log events. </p>',
      ],
    ],
    'ExtractedValues' => [
      'base' => NULL,
      'refs' => [
        'MetricFilterMatchRecord$extractedValues' => NULL,
      ],
    ],
    'FilterCount' => [
      'base' => 'The number of metric filters associated with the log group.',
      'refs' => [
        'LogGroup$metricFilterCount' => NULL,
      ],
    ],
    'FilterName' => [
      'base' => 'The name of the metric filter.',
      'refs' => [
        'DeleteMetricFilterRequest$filterName' => NULL,
        'DescribeMetricFiltersRequest$filterNamePrefix' => NULL,
        'MetricFilter$filterName' => NULL,
        'PutMetricFilterRequest$filterName' => NULL,
      ],
    ],
    'FilterPattern' => [
      'base' => 'A symbolic description of how Amazon CloudWatch Logs should interpret the data in each log entry. For example, a log entry may contain timestamps, IP addresses, strings, and so on. You use the pattern to specify what to look for in the log stream.',
      'refs' => [
        'MetricFilter$filterPattern' => NULL,
        'PutMetricFilterRequest$filterPattern' => NULL,
        'TestMetricFilterRequest$filterPattern' => NULL,
      ],
    ],
    'GetLogEventsRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetLogEventsResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'InputLogEvent' => [
      'base' => 'A log event is a record of some activity that was recorded by the application or resource being monitored. The log event record that Amazon CloudWatch Logs understands contains two properties: the timestamp of when the event occurred, and the raw event message.',
      'refs' => [
        'InputLogEvents$member' => NULL,
      ],
    ],
    'InputLogEvents' => [
      'base' => 'A list of events belonging to a log stream.',
      'refs' => [
        'PutLogEventsRequest$logEvents' => NULL,
      ],
    ],
    'InvalidParameterException' => [
      'base' => '<p>Returned if a parameter of the request is incorrectly specified.</p>',
      'refs' => [],
    ],
    'InvalidSequenceTokenException' => [
      'base' => NULL,
      'refs' => [],
    ],
    'LimitExceededException' => [
      'base' => '<p>Returned if you have reached the maximum number of resources that can be created.</p>',
      'refs' => [],
    ],
    'LogGroup' => [
      'base' => NULL,
      'refs' => [
        'LogGroups$member' => NULL,
      ],
    ],
    'LogGroupName' => [
      'base' => NULL,
      'refs' => [
        'CreateLogGroupRequest$logGroupName' => NULL,
        'CreateLogStreamRequest$logGroupName' => NULL,
        'DeleteLogGroupRequest$logGroupName' => NULL,
        'DeleteLogStreamRequest$logGroupName' => NULL,
        'DeleteMetricFilterRequest$logGroupName' => NULL,
        'DeleteRetentionPolicyRequest$logGroupName' => NULL,
        'DescribeLogGroupsRequest$logGroupNamePrefix' => NULL,
        'DescribeLogStreamsRequest$logGroupName' => NULL,
        'DescribeMetricFiltersRequest$logGroupName' => NULL,
        'GetLogEventsRequest$logGroupName' => NULL,
        'LogGroup$logGroupName' => NULL,
        'PutLogEventsRequest$logGroupName' => NULL,
        'PutMetricFilterRequest$logGroupName' => NULL,
        'PutRetentionPolicyRequest$logGroupName' => NULL,
      ],
    ],
    'LogGroups' => [
      'base' => 'A list of log groups.',
      'refs' => [
        'DescribeLogGroupsResponse$logGroups' => NULL,
      ],
    ],
    'LogStream' => [
      'base' => 'A log stream is sequence of log events that share the same emitter.',
      'refs' => [
        'LogStreams$member' => NULL,
      ],
    ],
    'LogStreamName' => [
      'base' => NULL,
      'refs' => [
        'CreateLogStreamRequest$logStreamName' => NULL,
        'DeleteLogStreamRequest$logStreamName' => NULL,
        'DescribeLogStreamsRequest$logStreamNamePrefix' => NULL,
        'GetLogEventsRequest$logStreamName' => NULL,
        'LogStream$logStreamName' => NULL,
        'PutLogEventsRequest$logStreamName' => NULL,
      ],
    ],
    'LogStreams' => [
      'base' => 'A list of log streams.',
      'refs' => [
        'DescribeLogStreamsResponse$logStreams' => NULL,
      ],
    ],
    'MetricFilter' => [
      'base' => 'Metric filters can be used to express how Amazon CloudWatch Logs would extract metric observations from ingested log events and transform them to metric data in a CloudWatch metric.',
      'refs' => [
        'MetricFilters$member' => NULL,
      ],
    ],
    'MetricFilterMatchRecord' => [
      'base' => NULL,
      'refs' => [
        'MetricFilterMatches$member' => NULL,
      ],
    ],
    'MetricFilterMatches' => [
      'base' => NULL,
      'refs' => [
        'TestMetricFilterResponse$matches' => NULL,
      ],
    ],
    'MetricFilters' => [
      'base' => NULL,
      'refs' => [
        'DescribeMetricFiltersResponse$metricFilters' => NULL,
      ],
    ],
    'MetricName' => [
      'base' => 'The name of the CloudWatch metric to which the monitored log information should be published. For example, you may publish to a metric called ErrorCount.',
      'refs' => [
        'MetricTransformation$metricName' => NULL,
      ],
    ],
    'MetricNamespace' => [
      'base' => 'The destination namespace of the new CloudWatch metric.',
      'refs' => [
        'MetricTransformation$metricNamespace' => NULL,
      ],
    ],
    'MetricTransformation' => [
      'base' => NULL,
      'refs' => [
        'MetricTransformations$member' => NULL,
      ],
    ],
    'MetricTransformations' => [
      'base' => NULL,
      'refs' => [
        'MetricFilter$metricTransformations' => NULL,
        'PutMetricFilterRequest$metricTransformations' => NULL,
      ],
    ],
    'MetricValue' => [
      'base' => 'What to publish to the metric. For example, if you\'re counting the occurrences of a particular term like "Error", the value will be "1" for each occurrence. If you\'re counting the bytes transferred the published value will be the value in the log event.',
      'refs' => [
        'MetricTransformation$metricValue' => NULL,
      ],
    ],
    'NextToken' => [
      'base' => 'A string token used for pagination that points to the next page of results. It must be a value obtained from the response of the previous request. The token expires after 24 hours.',
      'refs' => [
        'DescribeLogGroupsRequest$nextToken' => '<p> A string token used for pagination that points to the next page of results. It must be a value obtained from the response of the previous <code class="code">DescribeLogGroups</code> request. </p>',
        'DescribeLogGroupsResponse$nextToken' => NULL,
        'DescribeLogStreamsRequest$nextToken' => '<p> A string token used for pagination that points to the next page of results. It must be a value obtained from the response of the previous <code class="code">DescribeLogStreams</code> request. </p>',
        'DescribeLogStreamsResponse$nextToken' => NULL,
        'DescribeMetricFiltersRequest$nextToken' => '<p> A string token used for pagination that points to the next page of results. It must be a value obtained from the response of the previous <code class="code">DescribeMetricFilters</code> request. </p>',
        'DescribeMetricFiltersResponse$nextToken' => NULL,
        'GetLogEventsRequest$nextToken' => '<p> A string token used for pagination that points to the next page of results. It must be a value obtained from the <code class="code">nextForwardToken</code> or <code class="code">nextBackwardToken</code> fields in the response of the previous <code class="code">GetLogEvents</code> request. </p>',
        'GetLogEventsResponse$nextForwardToken' => NULL,
        'GetLogEventsResponse$nextBackwardToken' => NULL,
      ],
    ],
    'OperationAbortedException' => [
      'base' => '<p>Returned if multiple requests to update the same resource were in conflict.</p>',
      'refs' => [],
    ],
    'OutputLogEvent' => [
      'base' => NULL,
      'refs' => [
        'OutputLogEvents$member' => NULL,
      ],
    ],
    'OutputLogEvents' => [
      'base' => NULL,
      'refs' => [
        'GetLogEventsResponse$events' => NULL,
      ],
    ],
    'PutLogEventsRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'PutLogEventsResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'PutMetricFilterRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'PutRetentionPolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ResourceAlreadyExistsException' => [
      'base' => '<p>Returned if the specified resource already exists.</p>',
      'refs' => [],
    ],
    'ResourceNotFoundException' => [
      'base' => '<p>Returned if the specified resource does not exist.</p>',
      'refs' => [],
    ],
    'SequenceToken' => [
      'base' => 'A string token used for making PutLogEvents requests. A <code class="code">sequenceToken</code> can only be used once, and PutLogEvents requests must include the <code class="code">sequenceToken</code> obtained from the response of the previous request.',
      'refs' => [
        'DataAlreadyAcceptedException$expectedSequenceToken' => NULL,
        'InvalidSequenceTokenException$expectedSequenceToken' => NULL,
        'LogStream$uploadSequenceToken' => NULL,
        'PutLogEventsRequest$sequenceToken' => '<p> A string token that must be obtained from the response of the previous <code class="code">PutLogEvents</code> request. </p>',
        'PutLogEventsResponse$nextSequenceToken' => NULL,
      ],
    ],
    'ServiceUnavailableException' => [
      'base' => '<p>Returned if the service cannot complete the request.</p>',
      'refs' => [],
    ],
    'StartFromHead' => [
      'base' => NULL,
      'refs' => [
        'GetLogEventsRequest$startFromHead' => 'If set to true, the earliest log events would be returned first. The default is false (the latest log events are returned first].',
      ],
    ],
    'StoredBytes' => [
      'base' => NULL,
      'refs' => [
        'LogGroup$storedBytes' => NULL,
        'LogStream$storedBytes' => NULL,
      ],
    ],
    'TestEventMessages' => [
      'base' => NULL,
      'refs' => [
        'TestMetricFilterRequest$logEventMessages' => NULL,
      ],
    ],
    'TestMetricFilterRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'TestMetricFilterResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'Timestamp' => [
      'base' => 'A point in time expressed as the number milliseconds since Jan 1, 1970 00:00:00 UTC.',
      'refs' => [
        'GetLogEventsRequest$startTime' => NULL,
        'GetLogEventsRequest$endTime' => NULL,
        'InputLogEvent$timestamp' => NULL,
        'LogGroup$creationTime' => NULL,
        'LogStream$creationTime' => NULL,
        'LogStream$firstEventTimestamp' => NULL,
        'LogStream$lastEventTimestamp' => NULL,
        'LogStream$lastIngestionTime' => NULL,
        'MetricFilter$creationTime' => NULL,
        'OutputLogEvent$timestamp' => NULL,
        'OutputLogEvent$ingestionTime' => NULL,
      ],
    ],
    'Token' => [
      'base' => NULL,
      'refs' => [
        'ExtractedValues$key' => NULL,
      ],
    ],
    'Value' => [
      'base' => NULL,
      'refs' => [
        'ExtractedValues$value' => NULL,
      ],
    ],
  ],
];
