@s3 @integ
Feature: POST object uploads

    Scenario: Upload an object via POST object with Signature V2
        Given I have an s3 client and I have a file
        And I have an array of form inputs as following:
        |key              |value              |
        |acl              |public-read        |
        And I provide a json string policy as following:
        """
        {"expiration":"2026-04-25T22:53:16Z",
        "conditions":[{"acl":"public-read"}]}
        """
        When I create a POST object SigV2 with inputs and policy
        And I make a HTTP POST request
        Then the file called "file.ext" is uploaded

    Scenario: Upload an object via POST object with Signature V4
        Given I have an s3 client and I have a file
        And I have an array of form inputs as following:
        |key              |value              |
        |acl              |public-read        |
        And I provide an array of policy conditions as following:
        |key              |value              |
        |acl              |public-read        |
        And I want the policy expires after "+ 2 hours"
        When I create a POST object SigV4 with inputs and policy
        And I make a HTTP POST request
        Then the file called "file.ext" is uploaded
