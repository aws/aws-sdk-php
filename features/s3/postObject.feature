@s3 @integ
Feature: POST object uploads

    Scenario: Upload and object via POST
        Given I have an "s3" client
        When I do a POST upload
        Then an object is uploaded
