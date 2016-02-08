# language: en
@smoke @redshift
Feature: Amazon Redshift

  Scenario: Making a request
    When I call the "DescribeClusterVersions" API
    Then the value at "ClusterVersions" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeClusters" API with:
    | ClusterIdentifier | fake-cluster |
    Then I expect the response error code to be "ClusterNotFound"
