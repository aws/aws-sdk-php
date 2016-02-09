# language: en
@smoke @gamelift
Feature: Amazon GameLift

  Scenario: Making a request
    When I call the "ListBuilds" API
    Then the response should contain a "Builds"

  Scenario: Handling errors
    When I attempt to call the "DescribePlayerSessions" API with:
      | PlayerSessionId | psess-fakeSessionId |
    Then I expect the response error code to be "NotFoundException"
