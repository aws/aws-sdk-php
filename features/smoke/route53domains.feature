# language: en
@smoke @route53domains
Feature: Amazon Route53 Domains

  Scenario: Making a request
    When I call the "ListDomains" API
    Then the value at "Domains" should be a list

  Scenario: Handling errors
    When I attempt to call the "GetDomainDetail" API with:
    | DomainName | fake-domain-name |
    Then I expect the response error code to be "InvalidInput"
