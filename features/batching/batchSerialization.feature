@sqs @integ
Feature: SQS Batch Serialization

  Scenario: Deleting Message Batches
    Given I have a "sqs" client
    And I have put 10 messages in a queue
    When I delete a batch of 10 messages
    Then 10 messages should have been deleted from the queue
