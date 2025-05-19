@s3-transfer-manager @integ
Feature: S3 Transfer Manager
  S3 Transfer Manager should successfully do:
  - object uploads
  - object multipart uploads
  - object downloads
  - object multipart downloads
  - directory object uploads
  - directory object downloads

  Scenario Outline: Successfully does a single file upload
    Given I have a file <filename> with content <content>
    When I upload the file <filename> to a test bucket using the s3 transfer manager
    Then The file <filename> should exist in the test bucket and its content should be <content>

    Examples:
      | filename     | content         |
      | myfile.txt   | Test content #1 |
      | myfile-2.txt | Test content #2 |
      | myfile-3.txt | Test content #3 |


  Scenario Outline: Successfully does a single upload from a stream
    Given I have a stream with content <content>
    When I do the upload to a test bucket with key <key>
    Then The object <key>, once downloaded from the test bucket, should match the content <content>
    Examples:
      | content | key |
      | "This is a test text - 1" | file-1 |
      | "This is a test text - 2" | file-2 |
      | "This is a test text - 3" | file-3 |

  Scenario Outline: Successfully do multipart object upload from file
    Given I have a file with name <filename> where its content's size is <filesize>
    When I do upload this file with name <filename> with the specified part size of <partsize>
    Then The object with name <filename> should have a total of <partnum> parts and its size must be <filesize>
    Examples:
    | filename | filesize | partsize | partnum |
    | file-1   | 10485760 | 5242880  | 2       |
    | file-2   | 24117248 | 5242880  | 5       |
    | file-3   | 24117248 | 8388608  | 3       |

  Scenario Outline: Successfully do multipart object upload from streams
    Given I have want to upload a stream of size <filesize>
    When I do upload this stream with name <filename> and the specified part size of <partsize>
    Then The object with name <filename> should have a total of <partnum> parts and its size must be <filesize>
    Examples:
      | filename | filesize | partsize | partnum |
      | file-1   | 10485760 | 5242880  | 2       |
      | file-2   | 24117248 | 5242880  | 5       |
      | file-3   | 24117248 | 8388608  | 3       |

  Scenario Outline: Does single object upload with custom checksum
    Given I have a file with name <filename> and its content is <content>
    When I upload this file with name <filename> by providing a custom checksum algorithm <checksum_algorithm>
    Then The checksum from the object with name <filename> should be equals to the calculation of the object content with the checksum algorithm <checksum_algorithm>
    Examples:
    | filename | content | checksum_algorithm |
    | file-1   | This is a test file content #1 | crc32 |
    | file-2   | This is a test file content #2 | crc32c |
    | file-3   | This is a test file content #3 | sha256 |
    | file-4   | This is a test file content #4 | sha1 |

  Scenario Outline: Does single object download
    Given I have an object in S3 with name <filename> and its content is <content>
    When I do a download of the object with name <filename>
    Then The object with name <filename> should have been downloaded and its content should be <content>
    Examples:
      | filename | content |
      | file-1   | This is a test file content #1 |
      | file-2   | This is a test file content #2 |
      | file-3   | This is a test file content #3 |

  Scenario Outline: Successfully does multipart object download
    Given I have an object in S3 with name <filename> and its size is <filesize>
    When I download the object with name <filename> by using the <download_type> multipart download type
    Then The content size for the object with name <filename> should be <filesize>
    Examples:
      | filename | filesize  | download_type |
      | file-1   |  20971520 | partRange         |
      | file-2   | 28311552  | partRange         |
      | file-3   |  12582912 | partRange         |
      | file-1   |  20971520 | partGet           |
      | file-2   | 28311552  | partGet           |
      | file-3   |  12582912 | partGet           |