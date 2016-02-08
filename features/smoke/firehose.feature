# language: en
@smoke @firehose
Feature: AWS Kinesis Firehose

  Scenario: Making a request
    When I call the "ListDeliveryStreams" API
    Then the value at "DeliveryStreamNames" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeDeliveryStream" API with:
    | DeliveryStreamName | bogus-stream-name |
    Then I expect the response error code to be "ResourceNotFoundException"
