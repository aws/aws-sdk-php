# language: en
@smoke @route53
Feature: Amazon Route 53

  Scenario: Making a request
    When I call the "ListHostedZones" API
    Then the value at "HostedZones" should be a list

  Scenario: Handling errors
    When I attempt to call the "GetHostedZone" API with:
    | Id | fake-zone |
    Then I expect the response error code to be "NoSuchHostedZone"
