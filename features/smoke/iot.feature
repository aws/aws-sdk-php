# language: en
@smoke @iot
Feature: AWS IoT

  Scenario: Making a request
    When I call the "ListPolicies" API
    Then the value at "policies" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeThing" API with:
    | thingName | fake-thing |
    Then I expect the response error code to be "ResourceNotFoundException"
