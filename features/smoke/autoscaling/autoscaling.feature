# language: en
@autoscaling
Feature: Auto Scaling

  Scenario: Making a request
    When I call the "DescribeScalingProcessTypes" API
    Then the value at "Processes" should be a list

  Scenario: Handing errors
    When I attempt to call the "CreateLaunchConfiguration" API with:
    | LaunchConfigurationName | hello, world |
    | ImageId                 | ami-12345678 |
    | InstanceType            | m1.small     |
    Then I expect the response error code to be "ValidationError"
    And I expect the response error message to include:
    """
    AMI ami-12345678 is invalid: The image id '[ami-12345678]' does not exist
    """
