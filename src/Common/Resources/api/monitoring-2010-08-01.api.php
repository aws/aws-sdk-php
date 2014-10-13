<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2010-08-01',
    'endpointPrefix' => 'monitoring',
    'serviceAbbreviation' => 'CloudWatch',
    'serviceFullName' => 'Amazon CloudWatch',
    'signatureVersion' => 'v4',
    'xmlNamespace' => 'http://monitoring.amazonaws.com/doc/2010-08-01/',
    'protocol' => 'query',
  ],
  'operations' =>
  [
    'DeleteAlarms' =>
    [
      'name' => 'DeleteAlarms',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteAlarmsInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFound',
          'error' =>
          [
            'code' => 'ResourceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeAlarmHistory' =>
    [
      'name' => 'DescribeAlarmHistory',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeAlarmHistoryInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeAlarmHistoryOutput',
        'resultWrapper' => 'DescribeAlarmHistoryResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidNextToken',
          'error' =>
          [
            'code' => 'InvalidNextToken',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeAlarms' =>
    [
      'name' => 'DescribeAlarms',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeAlarmsInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeAlarmsOutput',
        'resultWrapper' => 'DescribeAlarmsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidNextToken',
          'error' =>
          [
            'code' => 'InvalidNextToken',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DescribeAlarmsForMetric' =>
    [
      'name' => 'DescribeAlarmsForMetric',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeAlarmsForMetricInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeAlarmsForMetricOutput',
        'resultWrapper' => 'DescribeAlarmsForMetricResult',
      ],
    ],
    'DisableAlarmActions' =>
    [
      'name' => 'DisableAlarmActions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DisableAlarmActionsInput',
      ],
    ],
    'EnableAlarmActions' =>
    [
      'name' => 'EnableAlarmActions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'EnableAlarmActionsInput',
      ],
    ],
    'GetMetricStatistics' =>
    [
      'name' => 'GetMetricStatistics',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetMetricStatisticsInput',
      ],
      'output' =>
      [
        'shape' => 'GetMetricStatisticsOutput',
        'resultWrapper' => 'GetMetricStatisticsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'code' => 'InvalidParameterValue',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'MissingRequiredParameterException',
          'error' =>
          [
            'code' => 'MissingParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidParameterCombinationException',
          'error' =>
          [
            'code' => 'InvalidParameterCombination',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InternalServiceFault',
          'error' =>
          [
            'code' => 'InternalServiceError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'xmlOrder' =>
          [
            0 => 'Message',
          ],
        ],
      ],
    ],
    'ListMetrics' =>
    [
      'name' => 'ListMetrics',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListMetricsInput',
      ],
      'output' =>
      [
        'shape' => 'ListMetricsOutput',
        'xmlOrder' =>
        [
          0 => 'Metrics',
          1 => 'NextToken',
        ],
        'resultWrapper' => 'ListMetricsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServiceFault',
          'error' =>
          [
            'code' => 'InternalServiceError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'xmlOrder' =>
          [
            0 => 'Message',
          ],
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'code' => 'InvalidParameterValue',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'PutMetricAlarm' =>
    [
      'name' => 'PutMetricAlarm',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PutMetricAlarmInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededFault',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'PutMetricData' =>
    [
      'name' => 'PutMetricData',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PutMetricDataInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'code' => 'InvalidParameterValue',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'MissingRequiredParameterException',
          'error' =>
          [
            'code' => 'MissingParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidParameterCombinationException',
          'error' =>
          [
            'code' => 'InvalidParameterCombination',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InternalServiceFault',
          'error' =>
          [
            'code' => 'InternalServiceError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'xmlOrder' =>
          [
            0 => 'Message',
          ],
        ],
      ],
    ],
    'SetAlarmState' =>
    [
      'name' => 'SetAlarmState',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetAlarmStateInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFound',
          'error' =>
          [
            'code' => 'ResourceNotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidFormatFault',
          'error' =>
          [
            'code' => 'InvalidFormat',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'ActionPrefix' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 1024,
    ],
    'ActionsEnabled' =>
    [
      'type' => 'boolean',
    ],
    'AlarmArn' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 1600,
    ],
    'AlarmDescription' =>
    [
      'type' => 'string',
      'min' => 0,
      'max' => 255,
    ],
    'AlarmHistoryItem' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AlarmName' =>
        [
          'shape' => 'AlarmName',
        ],
        'Timestamp' =>
        [
          'shape' => 'Timestamp',
        ],
        'HistoryItemType' =>
        [
          'shape' => 'HistoryItemType',
        ],
        'HistorySummary' =>
        [
          'shape' => 'HistorySummary',
        ],
        'HistoryData' =>
        [
          'shape' => 'HistoryData',
        ],
      ],
    ],
    'AlarmHistoryItems' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AlarmHistoryItem',
      ],
    ],
    'AlarmName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
    ],
    'AlarmNamePrefix' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
    ],
    'AlarmNames' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AlarmName',
      ],
      'max' => 100,
    ],
    'AwsQueryErrorMessage' =>
    [
      'type' => 'string',
    ],
    'ComparisonOperator' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'GreaterThanOrEqualToThreshold',
        1 => 'GreaterThanThreshold',
        2 => 'LessThanThreshold',
        3 => 'LessThanOrEqualToThreshold',
      ],
    ],
    'Datapoint' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Timestamp' =>
        [
          'shape' => 'Timestamp',
        ],
        'SampleCount' =>
        [
          'shape' => 'DatapointValue',
        ],
        'Average' =>
        [
          'shape' => 'DatapointValue',
        ],
        'Sum' =>
        [
          'shape' => 'DatapointValue',
        ],
        'Minimum' =>
        [
          'shape' => 'DatapointValue',
        ],
        'Maximum' =>
        [
          'shape' => 'DatapointValue',
        ],
        'Unit' =>
        [
          'shape' => 'StandardUnit',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Timestamp',
        1 => 'SampleCount',
        2 => 'Average',
        3 => 'Sum',
        4 => 'Minimum',
        5 => 'Maximum',
        6 => 'Unit',
      ],
    ],
    'DatapointValue' =>
    [
      'type' => 'double',
    ],
    'Datapoints' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Datapoint',
      ],
    ],
    'DeleteAlarmsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AlarmNames',
      ],
      'members' =>
      [
        'AlarmNames' =>
        [
          'shape' => 'AlarmNames',
        ],
      ],
    ],
    'DescribeAlarmHistoryInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AlarmName' =>
        [
          'shape' => 'AlarmName',
        ],
        'HistoryItemType' =>
        [
          'shape' => 'HistoryItemType',
        ],
        'StartDate' =>
        [
          'shape' => 'Timestamp',
        ],
        'EndDate' =>
        [
          'shape' => 'Timestamp',
        ],
        'MaxRecords' =>
        [
          'shape' => 'MaxRecords',
        ],
        'NextToken' =>
        [
          'shape' => 'NextToken',
        ],
      ],
    ],
    'DescribeAlarmHistoryOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AlarmHistoryItems' =>
        [
          'shape' => 'AlarmHistoryItems',
        ],
        'NextToken' =>
        [
          'shape' => 'NextToken',
        ],
      ],
    ],
    'DescribeAlarmsForMetricInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'MetricName',
        1 => 'Namespace',
      ],
      'members' =>
      [
        'MetricName' =>
        [
          'shape' => 'MetricName',
        ],
        'Namespace' =>
        [
          'shape' => 'Namespace',
        ],
        'Statistic' =>
        [
          'shape' => 'Statistic',
        ],
        'Dimensions' =>
        [
          'shape' => 'Dimensions',
        ],
        'Period' =>
        [
          'shape' => 'Period',
        ],
        'Unit' =>
        [
          'shape' => 'StandardUnit',
        ],
      ],
    ],
    'DescribeAlarmsForMetricOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'MetricAlarms' =>
        [
          'shape' => 'MetricAlarms',
        ],
      ],
    ],
    'DescribeAlarmsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AlarmNames' =>
        [
          'shape' => 'AlarmNames',
        ],
        'AlarmNamePrefix' =>
        [
          'shape' => 'AlarmNamePrefix',
        ],
        'StateValue' =>
        [
          'shape' => 'StateValue',
        ],
        'ActionPrefix' =>
        [
          'shape' => 'ActionPrefix',
        ],
        'MaxRecords' =>
        [
          'shape' => 'MaxRecords',
        ],
        'NextToken' =>
        [
          'shape' => 'NextToken',
        ],
      ],
    ],
    'DescribeAlarmsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'MetricAlarms' =>
        [
          'shape' => 'MetricAlarms',
        ],
        'NextToken' =>
        [
          'shape' => 'NextToken',
        ],
      ],
    ],
    'Dimension' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
        1 => 'Value',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'DimensionName',
        ],
        'Value' =>
        [
          'shape' => 'DimensionValue',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Name',
        1 => 'Value',
      ],
    ],
    'DimensionFilter' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'DimensionName',
        ],
        'Value' =>
        [
          'shape' => 'DimensionValue',
        ],
      ],
    ],
    'DimensionFilters' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DimensionFilter',
      ],
      'max' => 10,
    ],
    'DimensionName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
    ],
    'DimensionValue' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
    ],
    'Dimensions' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Dimension',
      ],
      'max' => 10,
    ],
    'DisableAlarmActionsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AlarmNames',
      ],
      'members' =>
      [
        'AlarmNames' =>
        [
          'shape' => 'AlarmNames',
        ],
      ],
    ],
    'EnableAlarmActionsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AlarmNames',
      ],
      'members' =>
      [
        'AlarmNames' =>
        [
          'shape' => 'AlarmNames',
        ],
      ],
    ],
    'ErrorMessage' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
    ],
    'EvaluationPeriods' =>
    [
      'type' => 'integer',
      'min' => 1,
    ],
    'FaultDescription' =>
    [
      'type' => 'string',
    ],
    'GetMetricStatisticsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Namespace',
        1 => 'MetricName',
        2 => 'StartTime',
        3 => 'EndTime',
        4 => 'Period',
        5 => 'Statistics',
      ],
      'members' =>
      [
        'Namespace' =>
        [
          'shape' => 'Namespace',
        ],
        'MetricName' =>
        [
          'shape' => 'MetricName',
        ],
        'Dimensions' =>
        [
          'shape' => 'Dimensions',
        ],
        'StartTime' =>
        [
          'shape' => 'Timestamp',
        ],
        'EndTime' =>
        [
          'shape' => 'Timestamp',
        ],
        'Period' =>
        [
          'shape' => 'Period',
        ],
        'Statistics' =>
        [
          'shape' => 'Statistics',
        ],
        'Unit' =>
        [
          'shape' => 'StandardUnit',
        ],
      ],
    ],
    'GetMetricStatisticsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Label' =>
        [
          'shape' => 'MetricLabel',
        ],
        'Datapoints' =>
        [
          'shape' => 'Datapoints',
        ],
      ],
    ],
    'HistoryData' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 4095,
    ],
    'HistoryItemType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'ConfigurationUpdate',
        1 => 'StateUpdate',
        2 => 'Action',
      ],
    ],
    'HistorySummary' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
    ],
    'InternalServiceFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'FaultDescription',
        ],
      ],
      'error' =>
      [
        'code' => 'InternalServiceError',
        'httpStatusCode' => 500,
      ],
      'exception' => true,
      'xmlOrder' =>
      [
        0 => 'Message',
      ],
    ],
    'InvalidFormatFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'InvalidFormat',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidNextToken' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'InvalidNextToken',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidParameterCombinationException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'AwsQueryErrorMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'InvalidParameterCombination',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidParameterValueException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'AwsQueryErrorMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'InvalidParameterValue',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'LimitExceededFault' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'LimitExceeded',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ListMetricsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Namespace' =>
        [
          'shape' => 'Namespace',
        ],
        'MetricName' =>
        [
          'shape' => 'MetricName',
        ],
        'Dimensions' =>
        [
          'shape' => 'DimensionFilters',
        ],
        'NextToken' =>
        [
          'shape' => 'NextToken',
        ],
      ],
    ],
    'ListMetricsOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Metrics' =>
        [
          'shape' => 'Metrics',
        ],
        'NextToken' =>
        [
          'shape' => 'NextToken',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Metrics',
        1 => 'NextToken',
      ],
    ],
    'MaxRecords' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 100,
    ],
    'Metric' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Namespace' =>
        [
          'shape' => 'Namespace',
        ],
        'MetricName' =>
        [
          'shape' => 'MetricName',
        ],
        'Dimensions' =>
        [
          'shape' => 'Dimensions',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Namespace',
        1 => 'MetricName',
        2 => 'Dimensions',
      ],
    ],
    'MetricAlarm' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AlarmName' =>
        [
          'shape' => 'AlarmName',
        ],
        'AlarmArn' =>
        [
          'shape' => 'AlarmArn',
        ],
        'AlarmDescription' =>
        [
          'shape' => 'AlarmDescription',
        ],
        'AlarmConfigurationUpdatedTimestamp' =>
        [
          'shape' => 'Timestamp',
        ],
        'ActionsEnabled' =>
        [
          'shape' => 'ActionsEnabled',
        ],
        'OKActions' =>
        [
          'shape' => 'ResourceList',
        ],
        'AlarmActions' =>
        [
          'shape' => 'ResourceList',
        ],
        'InsufficientDataActions' =>
        [
          'shape' => 'ResourceList',
        ],
        'StateValue' =>
        [
          'shape' => 'StateValue',
        ],
        'StateReason' =>
        [
          'shape' => 'StateReason',
        ],
        'StateReasonData' =>
        [
          'shape' => 'StateReasonData',
        ],
        'StateUpdatedTimestamp' =>
        [
          'shape' => 'Timestamp',
        ],
        'MetricName' =>
        [
          'shape' => 'MetricName',
        ],
        'Namespace' =>
        [
          'shape' => 'Namespace',
        ],
        'Statistic' =>
        [
          'shape' => 'Statistic',
        ],
        'Dimensions' =>
        [
          'shape' => 'Dimensions',
        ],
        'Period' =>
        [
          'shape' => 'Period',
        ],
        'Unit' =>
        [
          'shape' => 'StandardUnit',
        ],
        'EvaluationPeriods' =>
        [
          'shape' => 'EvaluationPeriods',
        ],
        'Threshold' =>
        [
          'shape' => 'Threshold',
        ],
        'ComparisonOperator' =>
        [
          'shape' => 'ComparisonOperator',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'AlarmName',
        1 => 'AlarmArn',
        2 => 'AlarmDescription',
        3 => 'AlarmConfigurationUpdatedTimestamp',
        4 => 'ActionsEnabled',
        5 => 'OKActions',
        6 => 'AlarmActions',
        7 => 'InsufficientDataActions',
        8 => 'StateValue',
        9 => 'StateReason',
        10 => 'StateReasonData',
        11 => 'StateUpdatedTimestamp',
        12 => 'MetricName',
        13 => 'Namespace',
        14 => 'Statistic',
        15 => 'Dimensions',
        16 => 'Period',
        17 => 'Unit',
        18 => 'EvaluationPeriods',
        19 => 'Threshold',
        20 => 'ComparisonOperator',
      ],
    ],
    'MetricAlarms' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'MetricAlarm',
      ],
    ],
    'MetricData' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'MetricDatum',
      ],
    ],
    'MetricDatum' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'MetricName',
      ],
      'members' =>
      [
        'MetricName' =>
        [
          'shape' => 'MetricName',
        ],
        'Dimensions' =>
        [
          'shape' => 'Dimensions',
        ],
        'Timestamp' =>
        [
          'shape' => 'Timestamp',
        ],
        'Value' =>
        [
          'shape' => 'DatapointValue',
        ],
        'StatisticValues' =>
        [
          'shape' => 'StatisticSet',
        ],
        'Unit' =>
        [
          'shape' => 'StandardUnit',
        ],
      ],
    ],
    'MetricLabel' =>
    [
      'type' => 'string',
    ],
    'MetricName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
    ],
    'Metrics' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Metric',
      ],
    ],
    'MissingRequiredParameterException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'AwsQueryErrorMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'MissingParameter',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'Namespace' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
      'pattern' => '[^:].*',
    ],
    'NextToken' =>
    [
      'type' => 'string',
    ],
    'Period' =>
    [
      'type' => 'integer',
      'min' => 60,
    ],
    'PutMetricAlarmInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AlarmName',
        1 => 'MetricName',
        2 => 'Namespace',
        3 => 'Statistic',
        4 => 'Period',
        5 => 'EvaluationPeriods',
        6 => 'Threshold',
        7 => 'ComparisonOperator',
      ],
      'members' =>
      [
        'AlarmName' =>
        [
          'shape' => 'AlarmName',
        ],
        'AlarmDescription' =>
        [
          'shape' => 'AlarmDescription',
        ],
        'ActionsEnabled' =>
        [
          'shape' => 'ActionsEnabled',
        ],
        'OKActions' =>
        [
          'shape' => 'ResourceList',
        ],
        'AlarmActions' =>
        [
          'shape' => 'ResourceList',
        ],
        'InsufficientDataActions' =>
        [
          'shape' => 'ResourceList',
        ],
        'MetricName' =>
        [
          'shape' => 'MetricName',
        ],
        'Namespace' =>
        [
          'shape' => 'Namespace',
        ],
        'Statistic' =>
        [
          'shape' => 'Statistic',
        ],
        'Dimensions' =>
        [
          'shape' => 'Dimensions',
        ],
        'Period' =>
        [
          'shape' => 'Period',
        ],
        'Unit' =>
        [
          'shape' => 'StandardUnit',
        ],
        'EvaluationPeriods' =>
        [
          'shape' => 'EvaluationPeriods',
        ],
        'Threshold' =>
        [
          'shape' => 'Threshold',
        ],
        'ComparisonOperator' =>
        [
          'shape' => 'ComparisonOperator',
        ],
      ],
    ],
    'PutMetricDataInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Namespace',
        1 => 'MetricData',
      ],
      'members' =>
      [
        'Namespace' =>
        [
          'shape' => 'Namespace',
        ],
        'MetricData' =>
        [
          'shape' => 'MetricData',
        ],
      ],
    ],
    'ResourceList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ResourceName',
      ],
      'max' => 5,
    ],
    'ResourceName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 1024,
    ],
    'ResourceNotFound' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'ResourceNotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SetAlarmStateInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AlarmName',
        1 => 'StateValue',
        2 => 'StateReason',
      ],
      'members' =>
      [
        'AlarmName' =>
        [
          'shape' => 'AlarmName',
        ],
        'StateValue' =>
        [
          'shape' => 'StateValue',
        ],
        'StateReason' =>
        [
          'shape' => 'StateReason',
        ],
        'StateReasonData' =>
        [
          'shape' => 'StateReasonData',
        ],
      ],
    ],
    'StandardUnit' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'Seconds',
        1 => 'Microseconds',
        2 => 'Milliseconds',
        3 => 'Bytes',
        4 => 'Kilobytes',
        5 => 'Megabytes',
        6 => 'Gigabytes',
        7 => 'Terabytes',
        8 => 'Bits',
        9 => 'Kilobits',
        10 => 'Megabits',
        11 => 'Gigabits',
        12 => 'Terabits',
        13 => 'Percent',
        14 => 'Count',
        15 => 'Bytes/Second',
        16 => 'Kilobytes/Second',
        17 => 'Megabytes/Second',
        18 => 'Gigabytes/Second',
        19 => 'Terabytes/Second',
        20 => 'Bits/Second',
        21 => 'Kilobits/Second',
        22 => 'Megabits/Second',
        23 => 'Gigabits/Second',
        24 => 'Terabits/Second',
        25 => 'Count/Second',
        26 => 'None',
      ],
    ],
    'StateReason' =>
    [
      'type' => 'string',
      'min' => 0,
      'max' => 1023,
    ],
    'StateReasonData' =>
    [
      'type' => 'string',
      'min' => 0,
      'max' => 4000,
    ],
    'StateValue' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'OK',
        1 => 'ALARM',
        2 => 'INSUFFICIENT_DATA',
      ],
    ],
    'Statistic' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'SampleCount',
        1 => 'Average',
        2 => 'Sum',
        3 => 'Minimum',
        4 => 'Maximum',
      ],
    ],
    'StatisticSet' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SampleCount',
        1 => 'Sum',
        2 => 'Minimum',
        3 => 'Maximum',
      ],
      'members' =>
      [
        'SampleCount' =>
        [
          'shape' => 'DatapointValue',
        ],
        'Sum' =>
        [
          'shape' => 'DatapointValue',
        ],
        'Minimum' =>
        [
          'shape' => 'DatapointValue',
        ],
        'Maximum' =>
        [
          'shape' => 'DatapointValue',
        ],
      ],
    ],
    'Statistics' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Statistic',
      ],
      'min' => 1,
      'max' => 5,
    ],
    'Threshold' =>
    [
      'type' => 'double',
    ],
    'Timestamp' =>
    [
      'type' => 'timestamp',
    ],
  ],
];