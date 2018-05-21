# language: en
@smoke @secretsmanager
Feature: Amazon SecretsManager

  Scenario: Making a request
    When I call the "ListSecrets" API
    Then the value at "SecretList" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeSecret" API with:
      | SecretId | fake-secret-id |
    Then I expect the response error code to be "ResourceNotFoundException"
