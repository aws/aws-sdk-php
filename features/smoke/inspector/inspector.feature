# language: en
@inspector
Feature: Amazon Inspector

  Scenario: Making a request
    When I call the "ListApplications" API
    Then the value at "applicationArnList" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeApplication" API with:
    | applicationArn | fake-arn |
    Then I expect the response error code to be "InvalidInputException"
