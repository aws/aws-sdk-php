# language: en
@smoke @cognito-idp
Feature: Amazon Cognito Identity Provider

  Scenario: Making a request
    When I call the "ListUserPools" API with JSON:
    """
    {"MaxResults": 10}
    """
    Then the value at "UserPools" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeUserPool" API with:
      | UserPoolId | us-east-1:aaaaaaaa-bbbb-cccc-dddd-eeeeeeeeeeee |
    Then I expect the response error code to be "InvalidParameterException"
