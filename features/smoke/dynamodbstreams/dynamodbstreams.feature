# language: en
@dynamodbstreams
Feature: Amazon DynamoDB

  Scenario: Making a request
    When I call the "ListStreams" API
    Then the value at "Streams" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeStream" API with:
    | StreamArn | fake-stream |
    Then I expect the response error code to be "ValidationException"
    And I expect the response error message to include:
    """
    Invalid StreamArn
    """
