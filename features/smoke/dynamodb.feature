# language: en
@smoke @dynamodb
Feature: Amazon DynamoDB

  Scenario: Making a request
    When I call the "ListTables" API with JSON:
    """
    {"Limit": 1}
    """
    Then the value at "TableNames" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeTable" API with:
    | TableName | fake-table |
    Then I expect the response error code to be "ResourceNotFoundException"
