# language: en
@smoke @elasticloadbalancing
Feature: Elastic Load Balancing

  Scenario: Making a request
    When I call the "DescribeLoadBalancers" API
    Then the value at "LoadBalancerDescriptions" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeLoadBalancers" API with JSON:
    """
    {"LoadBalancerNames": ["fake_load_balancer"]}
    """
    Then I expect the response error code to be "ValidationError"
