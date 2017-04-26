# language: en
@smoke @appstream
Feature: Amazon AppStream

  Scenario: Making a request
    When I call the "DescribeStacks" API
    Then the value at "Stacks" should be a list
