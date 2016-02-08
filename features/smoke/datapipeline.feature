# language: en
@smoke @datapipeline
Feature: AWS Data Pipeline

  Scenario: Making a request
    When I call the "ListPipelines" API
    Then the response should contain a "pipelineIdList"

  Scenario: Handling errors
    When I attempt to call the "GetPipelineDefinition" API with:
    | pipelineId | fake-id |
    Then I expect the response error code to be "PipelineNotFoundException"
