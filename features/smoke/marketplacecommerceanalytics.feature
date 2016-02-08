# language: en
@smoke @marketplacecommerceanalytics
Feature: AWS Marketplace Commerce Analytics

  Scenario: Handling errors
    When I attempt to call the "GenerateDataSet" API with:
    | dataSetType             | fake-type   |
    | dataSetPublicationDate  | fake-date   |
    | roleNameArn             | fake-arn    |
    | destinationS3BucketName | fake-bucket |
    | snsTopicArn             | fake-arn    |
    Then I expect the response error code to be "SerializationException"
