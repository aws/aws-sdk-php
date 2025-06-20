# language: en
@smoke @geoplaces
Feature: Amazon Location Service Places V2

  Scenario: Handling errors
    When I attempt to call the "GetPlace" API with:
      | PlaceId | foo |
    Then I expect the response error code to be "ValidationException"
