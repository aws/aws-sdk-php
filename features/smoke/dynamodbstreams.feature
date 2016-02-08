# language: en
@smoke @dynamodbstreams
Feature: Amazon DynamoDB Streams

  Scenario: Making a request
    When I call the "ListStreams" API
    Then the value at "Streams" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeStream" API with:
    | StreamArn | arn:aws:dynamodb:us-west-2:111122223333:table/Forum/stream/2015-05-20T20:51:10.252 |
    Then I expect the response error code to be "ResourceNotFoundException"
