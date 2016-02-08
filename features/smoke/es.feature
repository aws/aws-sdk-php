# language: en
@smoke @es @elasticsearchservice
Feature: Amazon ElasticsearchService

  Scenario: Making a request
    When I call the "ListDomainNames" API
    Then the value at "DomainNames" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeElasticsearchDomain" API with:
      | DomainName      | not-a-domain |
    Then the error code should be "ResourceNotFoundException"
