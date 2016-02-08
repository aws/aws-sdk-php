# language: en
@smoke @codedeploy
Feature: Amazon CodeDeploy

  Scenario: Making a request
    When I call the "ListApplications" API
    Then the value at "applications" should be a list

  Scenario: Handling errors
    When I attempt to call the "GetDeployment" API with:
      | deploymentId | d-USUAELQEX |
    Then I expect the response error code to be "DeploymentDoesNotExistException"
