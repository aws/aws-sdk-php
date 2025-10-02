# language: en
@smoke @cloudwatch @monitoring
Feature: Amazon CloudWatch

  Scenario: ListMetricsSuccess
    When I call the "ListMetrics" API with:
    | Namespace | AWS/EC2 |
    Then the value at "Metrics" should be a list

  Scenario: Handling errors
    When I attempt to call the "SetAlarmState" API with:
    | AlarmName   | abc |
    | StateValue  | mno |
    | StateReason | xyz |
    Then I expect the response error code to be "ValidationError"

  @queryCompat
  Scenario: AmbiguousErrorResolution
    When I attempt to call the "GetDashboard" API, using query compatible approach, with:
    |DashboardName| foo |
    Then I expect the response error code to be "ResourceNotFound"