# language: en
@smoke @lambda
Feature: Amazon Lambda

  Scenario: Making a request
    When I call the "ListFunctions" API
    Then the value at "Functions" should be a list

  Scenario: Handling errors
    When I attempt to call the "Invoke" API with:
    | FunctionName | bogus-function |
    Then I expect the response error code to be "ResourceNotFoundException"
