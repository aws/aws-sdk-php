# language: en
@smoke @dms
Feature: AWS Database Migration Service

  Scenario: Making a request
    When I call the "DescribeEndpoints" API
    Then the request should be successful

  Scenario: Handling errors
    When I attempt to call the "DescribeTableStatistics" API with:
        | ReplicationTaskArn  | arn:aws:acm:region:123456789012 |
    Then I expect the response error code to be "InvalidParameterValueException"
