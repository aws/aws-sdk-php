@crt @integ @eventbridge
Feature: Eventbridge Global Endpoints

  Scenario: Send events to eventbus using eventbridge global endpoint using sigv4a
    Given I have an eventbridge client and I have an event configuration
    Then I can upload an event using my global endpoint