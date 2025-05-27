# language: en
@smoke @inspector
Feature: Amazon Inspector

  Scenario: Making a request
    When I call the "ListAssessmentTemplates" API
    Then the value at "assessmentTemplateArns" should be a list
