# language: en
@smoke @waf
Feature: AWS WAF

  Scenario: Making a request
    When I call the "ListRules" API with JSON:
    """
    {"Limit":20}
    """
    Then the value at "Rules" should be a list

  Scenario: Handling errors
    When I attempt to call the "CreateSqlInjectionMatchSet" API with:
    | Name        | fake_name   |
    | ChangeToken | fake_token  |
    Then I expect the response error code to be "WAFStaleDataException"
