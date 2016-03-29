# language: en
@smoke @inspector
Feature: Amazon Inspector

  Scenario: Making a request
    When I call the "ListAssessmentTemplates" API
    Then the value at "assessmentTemplateArns" should be a list

  Scenario: Handling errors
    When I attempt to call the "ListTagsForResource" API with:
    | resourceArn | fake-arn |
    Then I expect the response error code to be "InvalidInputException"
