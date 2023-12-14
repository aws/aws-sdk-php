@crt @integ @cloudfront-kvs
Feature: Cloudfront Kvs Sigv4a

  Scenario: Describe a cloudfront kvs
    Given I have a cloudfront client and I have a key-value store
    Then I can describe my key-value store using sigv4a
