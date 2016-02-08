# language: en
@smoke @kinesis
Feature: AWS Kinesis

  Scenario: Making a request
    When I call the "ListStreams" API
    Then the value at "StreamNames" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeStream" API with:
    | StreamName | bogus-stream-name |
    Then I expect the response error code to be "ResourceNotFoundException"
