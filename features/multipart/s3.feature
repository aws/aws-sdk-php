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

  Scenario Outline: Uploading a stream with checksum algorithm
    # The result key uses S3's PascalCase form (ChecksumCRC32, ChecksumSHA256,
    # ChecksumSHA1). The example column matches that capitalization so the
    # interpolated step phrase ("Checksum<checksumalgorithm>") matches the
    # real response key exactly. The step regex still accepts crc32|sha256|sha1
    # case-insensitively via the regex character class.
    Given I have a <seekable> read stream
    When I upload the stream to S3 with a checksum algorithm of "<checksumalgorithm>"
    Then the result should contain a(n) "Checksum<checksumalgorithm>"

    Examples:
      | seekable     | checksumalgorithm |
      | seekable     | CRC32             |
      | non-seekable | CRC32             |
      | seekable     | SHA256            |
      | non-seekable | SHA256            |
      | seekable     | SHA1              |
      | non-seekable | SHA1              |

  Scenario Outline: Copying a file
    Given I have an s3 client and an uploaded file named "<filename>"
    When I call multipartCopy on "<filename>" to a new key in the same bucket
    Then the new file should be in the bucket copied from "<filename>"

    Examples:
      | filename     |
      | the-file     |
      | the-?-file   |

  Scenario: Copying a file preserves source metadata by default
    Given I have an s3 client and an uploaded file named "meta-default" with metadata
    When I call multipartCopy on "meta-default" to a new key in the same bucket
    Then the copied file "meta-default-copy" should have the same metadata as "meta-default"

  Scenario: Copying a file with REPLACE directive uses provided metadata
    Given I have an s3 client and an uploaded file named "meta-replace" with metadata
    When I call multipartCopy on "meta-replace" with metadata_directive "REPLACE" and custom metadata
    Then the copied file "meta-replace-copy" should have the custom metadata

  Scenario: Copying a file with REPLACE directive and no metadata strips metadata
    Given I have an s3 client and an uploaded file named "meta-strip" with metadata
    When I call multipartCopy on "meta-strip" with metadata_directive "REPLACE" and no metadata
    Then the copied file "meta-strip-copy" should have no user-defined metadata

  Scenario: Caller-supplied Metadata does not trigger REPLACE
    Given I have an s3 client and an uploaded file named "no-auto-replace" with metadata
    When I call multipartCopy on "no-auto-replace" with caller-supplied Metadata only
    Then the copied file "no-auto-replace-copy" should have the same metadata as "no-auto-replace"
    And the copied file "no-auto-replace-copy" should have the source's CacheControl

  Scenario: Caller-supplied Tagging does not trigger REPLACE
    Given I have an s3 client and an uploaded file named "tags-no-auto" with tags
    When I call multipartCopy on "tags-no-auto" with caller-supplied Tagging "k=v&Project=X" only
    Then the copied file "tags-no-auto-copy" should have tags "k=v&Project=X"

  @s3annotations
  Scenario: tags_directive=COPY copies tags to the destination
    Given I have an s3 client and an uploaded file named "tags-default" with tags
    When I call multipartCopy on "tags-default" with tags_directive "COPY"
    Then the copied file "tags-default-copy" should have the same tags as "tags-default"

  Scenario: Default directives skip tag copying
    Given I have an s3 client and an uploaded file named "tags-skip" with tags
    When I call multipartCopy on "tags-skip" to a new key in the same bucket
    Then the copied file "tags-skip-copy" should have no tags

  Scenario: REPLACE+UNSPECIFIED+EXCLUDE strips metadata and tags
    Given I have an s3 client and an uploaded file named "none-strip" with metadata and tags
    When I call multipartCopy on "none-strip" with metadata_directive "REPLACE" and tags_directive "UNSPECIFIED" and annotations_directive "EXCLUDE"
    Then the copied file "none-strip-copy" should have no user-defined metadata
    And the copied file "none-strip-copy" should have no tags

  Scenario: tags_directive=REPLACE writes caller-supplied tags
    Given I have an s3 client and an uploaded file named "tags-replace" with tags
    When I call multipartCopy on "tags-replace" with tags_directive "REPLACE" and tagging "Project=Override&Env=prod"
    Then the copied file "tags-replace-copy" should have tags "Project=Override&Env=prod"


  # TODO: re-enable once concurrent PutObjectAnnotation behavior enabled.
  # Tracking: <ticket-id>. ETA: <date>.
  # @s3annotations
  # Scenario: annotations_directive=COPY copies annotations to the destination
  #   Given I have an s3 client and an uploaded file named "annot-default" with annotations
  #   When I call multipartCopy on "annot-default" with annotations_directive "COPY"
  #   Then the copied file "annot-default-copy" should have the same annotations as "annot-default"


  @s3annotations
  Scenario: annotations_directive=EXCLUDE skips annotation copying
    Given I have an s3 client and an uploaded file named "annot-exclude" with annotations
    When I call multipartCopy on "annot-exclude" with annotations_directive "EXCLUDE"
    Then the copied file "annot-exclude-copy" should have no annotations

  @versioned
  Scenario: Copying a versioned source pins the source version
    Given I have a versioning-enabled bucket
    And I have an uploaded file named "versioned" in the versioned bucket with body "v1"
    And I overwrite "versioned" in the versioned bucket with body "v2"
    When I call multipartCopy on the original version of "versioned" in the versioned bucket
    Then the copied file "versioned-copy" should contain "v1"
