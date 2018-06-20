@clientSideMonitoring @integ
Feature: Send client-side monitoring events
    Service clients should produce and send client-side monitoring events
    Via UDP datagrams according to the specification when enabled

    Scenario: Verify generated and sent monitoring events
        Given I have loaded a test file called "client_side_monitoring.json"
        When I run the test cases with mocked responses against a test socket server
        Then the generated events should match the expected events
        And the received datagrams should match the expected events