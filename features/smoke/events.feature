# language: en
@smoke @events
Feature: AWS CloudWatch Events

  Scenario: Making a request
    When I call the "ListRules" API
    Then the value at "Rules" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeRule" API with:
    | Name | fake-rule |
    Then I expect the response error code to be "ResourceNotFoundException"
