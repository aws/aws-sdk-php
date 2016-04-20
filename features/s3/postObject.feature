@s3 @integ
Feature: POST object uploads

    Scenario: Upload and object via POST
        Given I have an "s3" client
        And I have a file
        When I create a POST object
        And I make a HTTP POST request
        Then a file is uploaded
