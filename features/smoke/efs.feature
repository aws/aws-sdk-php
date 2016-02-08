# language: en
@smoke @efs @elasticfilesystem
Feature: Amazon Elastic File System

  I want to use Amazon Elastic File System

  Scenario: Making a request
    When I call the "DescribeFileSystems" API
    Then the value at "FileSystems" should be a list

  Scenario: Handling errors
    When I attempt to call the "DeleteFileSystem" API with:
    | FileSystemId | fs-c5a1446c |
    Then the error code should be "FileSystemNotFound"
