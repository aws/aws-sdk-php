# language: en
@smoke @elasticloadbalancingv2
Feature: Elastic Load Balancing V2

  Scenario: Making a request
    When I call the "DescribeLoadBalancers" API
    Then the value at "LoadBalancers" should be a list

  Scenario: Handling errors
    When I attempt to call the "DescribeLoadBalancers" API with JSON:
    """
    {"LoadBalancerArns": ["fake_load_balancer"]}
    """
    Then I expect the response error code to be "ValidationError"
