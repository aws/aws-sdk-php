# language: en
@smoke @ecr
Feature: Amazon ECR

  I want to use Amazon ECR

  Scenario: Making a request
    When I call the "DescribeRepositories" API
    Then the request should be successful

  Scenario: Handling errors
    When I attempt to call the "ListImages" API with:
    | repositoryName  | not-a-real-repository  |
    Then the error code should be "RepositoryNotFoundException"
