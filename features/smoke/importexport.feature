# language: en
@smoke @importexport @noassumerole
Feature: AWS Import Export

  Scenario: Making a request
    When I call the "ListJobs" API
    Then the value at "Jobs" should be a list

  Scenario: Handling errors
    When I attempt to call the "CreateJob" API with JSON:
    """
    {
      "JobType": "Import",
      "ValidateOnly": false,
      "Manifest": "invalid-manifest"
    }
    """
    Then I expect the response error code to be "MalformedManifestException"
