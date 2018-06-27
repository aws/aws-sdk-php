@clientSideMonitoring @integ
Feature: Send client-side monitoring events
    Service clients should produce and send client-side monitoring events
    Via UDP datagrams according to the specification when enabled

    Scenario: Verify generated and sent monitoring events
        Given I have loaded a test manifest file called "manifest.json"
        And I have loaded a test case file called "cases.json"
        Then I successfully run the test cases against a test server

    Scenario: Verify generated and sent monitoring events
        Given I have loaded a test manifest file called "manifest.json"
        And I have loaded a test case file called "cases_php_sdk.json"
        Then I successfully run the test cases against a test server