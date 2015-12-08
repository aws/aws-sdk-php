#language: en
@s3 @integ
Feature: S3 Stream Wrapper

  Background:
    Given I have a "s3" client
    And have registered an s3 stream wrapper

  Scenario: Making directories
    Given I create a subdirectory "subdir" with mkdir
    When I call is_dir on the subdir path
    Then the call should return true

  Scenario Outline: Checking existence of directories
    When I call is_dir on the <subdirectory> path
    Then the call should return <boolean>

    Examples:
      | subdirectory | boolean |
      | /            | true    |
      | /foo         | false   |
      | /bar         | false   |

  Scenario: Uploading Files
    Given I have a file at "key" with the content "testing!"
    When I call file_exists on the key path
    Then the call should return true
    And the file at "key" should contain "testing!"

  Scenario: Deleting Files
    Given I have a file at "key" with the content "testing!"
    When I call unlink on the key path
    And I call file_exists on the key path
    Then the call should return false

  Scenario Outline: Opening streams
    Given I have a file at "<path>" with the content "<contents>"
    And I have a read handle on the file at "<path>"
    Then reading 2 bytes should return <first2>
    And reading 1000 bytes should return <next1000>
    And calling fstat should report a size of <size>

    Examples:
      | path | contents      | size | first2 | next1000    |
      | key1 | testing!      | 8    | te     | sting!      |
      | key2 | foo, bar, baz | 13   | fo     | o, bar, baz |

  Scenario: No errors raised for missing files
    Given I have cleared the last error
    When I call file_exists on the jkfdsalhjkgdfhsurew path
    Then the call should return false
    And no errors should have been raised

  Scenario: Traversing empty directories
    Given I have a file at "/empty/" with no content
    When I have a file at "/empty/bar" with the content "hello"
    Then scanning the directory at "/empty/" should return a list with one member named "bar"
