@s3 @integ
Feature: S3 Multipart Uploads

  Scenario Outline: Uploading a stream
    Given I have a <seekable> read stream
    When I upload the stream to S3 with a concurrency factor of "<concurrency>"
    Then the result should contain a(n) "ObjectURL"

    Examples:
      | seekable     | concurrency |
      | seekable     | 1           |
      | non-seekable | 1           |
      | seekable     | 3           |
      | non-seekable | 3           |
