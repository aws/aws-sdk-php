@s3 @integ
Feature: BucketKey param

  Scenario: Upload file with BucketKey enabled
    Given I have uploaded an object to S3 with BucketKey enabled
    Then I can verify Bucket Key is enabled at the object level
