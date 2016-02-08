# language: en
@smoke @cognitosync
Feature: Amazon Cognito Sync

  Scenario: Making a request
    When I call the "ListIdentityPoolUsage" API
    Then the value at "IdentityPoolUsages" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeIdentityPoolUsage" API with:
    | IdentityPoolId | us-east-1:aaaaaaaa-bbbb-cccc-dddd-eeeeeeeeeeee |
    Then I expect the response error code to be "ResourceNotFoundException"
