@dynamodb @integ
Feature: Waiters

  Scenario: Synchronous Waiters
    Given I have a "dynamodb" client
    And the table named "waiter-test" does not exist
    When I create a table named "waiter-test"
    And wait for the table named "waiter-test" to exist
    Then the table named "waiter-test" exists
    Then I can delete the table named "waiter-test"
    And wait for the table named "waiter-test" to be deleted
    And the table named "waiter-test" does not exist

  Scenario: Asynchronous Waiters
    Given I have a "dynamodb" client
    And the table named "waiter-test" does not exist
    When I create a promise to create and await a table named "waiter-test"
    And the table named "waiter-test" does not exist
    Then I can wait on all promises
    And the table named "waiter-test" exists
    When I create a promise to delete and await the purging of the table named "waiter-test"
    And the table named "waiter-test" exists
    Then I can wait on all promises
    And the table named "waiter-test" does not exist
