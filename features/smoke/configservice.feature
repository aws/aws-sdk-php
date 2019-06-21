# language: en
@smoke @configservice @config
Feature: AWS Config

  Scenario: Making a request
    When I call the "DescribeConfigurationRecorders" API
    Then the value at "ConfigurationRecorders" should be a list
