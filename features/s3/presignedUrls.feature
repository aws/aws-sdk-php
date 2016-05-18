@s3 @integ
Feature: Pre-signed URLs

  Scenario: Get an object with a pre-signed request
    Given I have uploaded an object to S3 with a key of "file.ext" and a body of "abc123"
    When I create a pre-signed request for a "GetObject" command with:
      | key | value    |
      | Key | file.ext |
    Then the contents of the response to the presigned request should be "abc123"

  Scenario: Put an object with a pre-signed request
    Given I create a pre-signed request for a "PutObject" command with:
      | key           | value            |
      | Key           | foo.bar          |
      | Body          | xxx_yyy_zzz      |
    And I send the pre-signed request
    When I create a pre-signed request for a "GetObject" command with:
      | key | value   |
      | Key | foo.bar |
    Then the contents of the response to the presigned request should be "xxx_yyy_zzz"

  Scenario: Put an unsigned object with a pre-signed request
    Given I create a pre-signed request for a "PutObject" command with:
      | key           | value            |
      | Key           | foo.bar          |
      | Body          | xxx_yyy_zzz      |
      | ContentSHA256 | UNSIGNED-PAYLOAD |
    And I change the body of the pre-signed request to be "zzz_yyy_xxx"
    And I send the pre-signed request
    When I create a pre-signed request for a "GetObject" command with:
      | key | value   |
      | Key | foo.bar |
    Then the contents of the response to the presigned request should be "zzz_yyy_xxx"
