# language: en
@smoke @apigateway
Feature: API Gateway

  Scenario: Making a request
    When I call the "GetDomainNames" API
    Then the value at "items" should be a list

  Scenario: Handing errors
    When I attempt to call the "CreateDomainName" API with:
      | domainName            | example |
      | certificateName       | foo     |
      | certificateBody       | bar     |
      | certificatePrivateKey | fizz    |
      | certificateChain      | buzz    |
    Then I expect the response error code to be "BadRequestException"
