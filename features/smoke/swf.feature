# language: en
@smoke @swf
Feature: Amazon Simple Workflow Service

  Scenario: Making a request
    When I call the "ListDomains" API with:
    | registrationStatus | REGISTERED |
    Then the value at "domainInfos" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeDomain" API with:
    | name | fake_domain |
    Then I expect the response error code to be "UnknownResourceFault"
