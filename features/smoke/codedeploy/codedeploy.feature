# language: en
@codedeploy
Feature: Amazon CodeDeploy

  Scenario: Making a request
    When I call the "ListApplications" API
    Then the value at "applications" should be a list

  Scenario: Handling errors
    When I attempt to call the "GetDeployment" API with:
    | deploymentId | bogus-deployment |
    Then I expect the response error code to be "InvalidDeploymentIdException"
    And I expect the response error message to include:
    """
    Specified DeploymentId is not in the valid format: bogus-deployment
    """
