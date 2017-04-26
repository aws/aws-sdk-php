# language: en
@application-autoscaling
Feature: Application Auto Scaling

  Scenario: Making a request
    When I call the "DescribeScalableTargets" API with:
    | ServiceNamespace | ec2 |
    Then the value at "ScalableTargets" should be a list
