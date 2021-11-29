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

  Scenario Outline: Copying a file
    Given I have an s3 client and an uploaded file named "<filename>"
    When I call multipartCopy on "<filename>" to a new key in the same bucket
    Then the new file should be in the bucket copied from "<filename>"

    Examples:
      | filename     |
      | the-file     |
      | the-?-file   |

