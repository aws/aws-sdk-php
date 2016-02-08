# language: en
@smoke @elastictranscoder
Feature: Amazon Elastic Transcoder

  Scenario: Making a request
    When I call the "ListPresets" API
    Then the value at "Presets" should be a list

  Scenario: Handling errors
    When I attempt to call the "ReadJob" API with:
    | Id | fake_job |
    Then I expect the response error code to be "ValidationException"
