# language: en
@smoke @opsworks
Feature: AWS OpsWorks

  Scenario: Making a request
    When I call the "DescribeStacks" API
    Then the value at "Stacks" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeLayers" API with:
    | StackId | fake_stack |
    Then I expect the response error code to be "ResourceNotFoundException"
