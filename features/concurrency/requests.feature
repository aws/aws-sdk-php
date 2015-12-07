@s3 @integ
Feature: Concurrent Requests

  Scenario: Sending a normal, synchronous request
    Given I have a "s3" client
    When I call the "ListBuckets" API
    Then the value at "Owner.ID" should be a "string"

  Scenario: Sending a promised, synchronous request
    Given I have a "s3" client
    When I call the "ListBuckets" API asynchronously
    And I wait on the promise
    Then the value at "Owner.ID" should be a "string"

  Scenario: Sending requests asynchronously
    Given a promise composed of the following asynchronous operations:
      | service | command     | payload |
      | s3      | ListBuckets |         |
      | s3      | ListBuckets |         |
      | s3      | ListBuckets |         |
    When I wait on the promise
    Then there should be 3 results
    And there should be 1 value at "[*].Owner.ID"

  Scenario: Sending commands concurrently
    Given a pool composed of the following commands:
      | service | command     | payload |
      | s3      | ListBuckets |         |
      | s3      | ListBuckets |         |
      | s3      | ListBuckets |         |
    When I send the commands as a batch to "s3"
    Then there should be 3 results
    And there should be 1 value at "[*].Owner.ID"

  Scenario: Sending requests asynchronously to multiple services
    Given a promise composed of the following asynchronous operations:
      | service  | command     | payload |
      | s3       | ListBuckets |         |
      | dynamodb | ListTables  |         |
      | sqs      | ListQueues  |         |
    When I wait on the promise
    Then there should be 3 results
