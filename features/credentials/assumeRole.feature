@credentials @integ

Feature: Assume Role Credentials

  Scenario: Assume role from credentials
    Given I have a credentials file with session name "foo"
    And I have credentials
    And I have an sts client
    When I call GetCallerIdentity
    Then the value at "Arn" should contain "foo"