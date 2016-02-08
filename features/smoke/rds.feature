# language: en
@smoke @rds
Feature: Amazon RDS

  Scenario: Making a request
    When I call the "DescribeDBEngineVersions" API
    Then the value at "DBEngineVersions" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeDBInstances" API with:
    | DBInstanceIdentifier | fake-id |
    Then I expect the response error code to be "DBInstanceNotFound"
