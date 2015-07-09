# language: en
@codepipeline
Feature: Amazon CodePipeline

  Scenario: Making a basic request
    When I call the "ListPipelines" API
    Then the value at "pipelines" should be a list

  Scenario: Error handling
    When I attempt to call the "GetPipeline" API with:
      | name | bogus-pipeline |
    Then I expect the response error code to be "PipelineNotFoundException"