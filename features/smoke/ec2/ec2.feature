# language: en
@ec2
Feature: Amazon Elastic Compute Cloud

  Scenario: Making a request
    When I call the "DescribeRegions" API
    Then the value at "Regions" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeInstances" API with:
    | InstanceIds | ["i-12345678"] |
    Then I expect the response error code to be "InvalidInstanceID.NotFound"
    And I expect the response error message to include:
    """
    The instance ID 'i-12345678' does not exist
    """
