@crt @integ @mrap
Feature: Multi-Region Access Points

  Scenario: Upload an object via PutObject using sigv4a
    Given I have a s3 client and I have a file
    And I upload the file to my multi-region access point
    Then I can confirm the object exists

  Scenario: Use the listObjects api to view accessPoint objects
    Given I have a s3 client and I have multi-region access point
    Then I can confirm my access point has at least one object

  Scenario: Update an object via PutObject using sigv4a
    Given I have a s3 client and I have multi-region access point
    When I use the PutObject operation and update the file to have a body of "test"
    Then I can confirm the object has been updated

  Scenario: Delete an object via DeleteObject using sigv4a
    Given I have a s3 client and I have multi-region access point
    Then I can confirm the object exists
    When I delete the object
    Then I can confirm the object has been deleted

