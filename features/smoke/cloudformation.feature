# language: en
@smoke @cloudformation
Feature: AWS CloudFormation

  Scenario: Making a request
    When I call the "ListStacks" API
    Then the value at "StackSummaries" should be a list

  Scenario: Handling errors
    When I attempt to call the "CreateStack" API with:
    | StackName   | fakestack                       |
    | TemplateURL | http://s3.amazonaws.com/foo/bar |
    Then I expect the response error code to be "ValidationError"
