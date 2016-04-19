@dynamodb @integ
Feature: DynamoDB Write Request Batch
  Scenario: Batching
    Given I have a "dynamodb" client
    When I create a WriteRequestBatch with a batch size of 3 and a pool size of 2
    And I put 20 items in the batch
    And I flush the batch
    Then 20 items should have been written
    And the batch should have been flushed at least 7 times
