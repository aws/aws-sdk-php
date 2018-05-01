# language: en
@smoke @ecs
Feature: Amazon ECS

  I want to use Amazon ECS

  Scenario: Making a request
    When I call the "ListClusters" API
    Then the value at "clusterArns" should be a list

  Scenario: Handling errors
    When I attempt to call the "StopTask" API with:
    | task  | xxxxxxxxxxx-xxxxxxxxxxxx-xxxxxxxxxxx  |
    Then the status code should be "400"
