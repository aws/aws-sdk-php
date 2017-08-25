# language: en
@smoke @cloudhsmv2
Feature: Amazon CloudHSMV2

  Scenario: Making a request
    When I call the "DescribeClusters" API
    Then the value at "Clusters" should be a list

  Scenario: Handling errors
    When I attempt to call the "ListTags" API with:
    | ResourceId | bogus-arn |
    Then I expect the response error code to be "CloudHsmInvalidRequestException"
