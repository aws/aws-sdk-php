# language: en
@smoke @workspaces
Feature: Amazon WorkSpaces

  I want to use Amazon WorkSpaces

  Scenario: Making a request
    When I call the "DescribeWorkspaces" API
    Then the value at "Workspaces" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeWorkspaces" API with:
    | DirectoryId | fake-id |
    Then I expect the response error code to be "ValidationException"
