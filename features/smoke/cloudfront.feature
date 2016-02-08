# language: en
@smoke @cloudfront
Feature: Amazon CloudFront

  Scenario: Making a basic request
    When I call the "ListCloudFrontOriginAccessIdentities" API with:
    | MaxItems | 1 |
    Then the value at "CloudFrontOriginAccessIdentityList.Items" should be a list

  Scenario: Error handling
    When I attempt to call the "GetDistribution" API with:
    | Id | fake-id |
    Then I expect the response error code to be "NoSuchDistribution"
