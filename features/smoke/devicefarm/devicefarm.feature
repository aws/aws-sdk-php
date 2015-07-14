# language: en
@devicefarm
Feature: AWS Device Farm

  Scenario: Making a request
    When I call the "ListProjects" API
    Then the value at "projects" should be a list

  Scenario: Error handling
    When I attempt to call the "GetDevicePool" API with:
      | arn | bogus-arn |
    Then I expect the response error code to be "ValidationException"