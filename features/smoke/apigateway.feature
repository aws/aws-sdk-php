# language: en
@smoke @apigateway
Feature: API Gateway

  Scenario: Making a request
    When I call the "GetDomainNames" API
    Then the value at "items" should be a list

  Scenario: Handing errors
    When I attempt to call the "CreateUsagePlanKey" API with:
      | usagePlanId             | foo |
      | keyId                   | bar |
      | keyType                 | fixx |
    Then I expect the response error code to be "BadRequestException"
