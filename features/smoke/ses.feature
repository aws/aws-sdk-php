# language: en
@smoke @ses @email
Feature: Amazon Simple Email Service

  Scenario: Making a request
    When I call the "ListIdentities" API
    Then the value at "Identities" should be a list

  Scenario: Handling errors
    When I attempt to call the "VerifyEmailIdentity" API with:
    | EmailAddress | fake_email |
    Then I expect the response error code to be "InvalidParameterValue"
