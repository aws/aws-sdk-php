# language: en
@smoke @devicefarm
Feature: AWS Device Farm

  Scenario: Making a request
    When I call the "ListDevices" API
    Then the value at "devices" should be a list
