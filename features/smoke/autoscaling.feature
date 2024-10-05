# language: en
@smoke @autoscaling
Feature: Auto Scaling

  Scenario: Making a request
    When I call the "DescribeScalingProcessTypes" API
    Then the value at "Processes" should be a list
