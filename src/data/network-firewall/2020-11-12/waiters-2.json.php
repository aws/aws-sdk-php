<?php
// This file was auto-generated from sdk-root/src/data/network-firewall/2020-11-12/waiters-2.json
return [ 'version' => 2, 'waiters' => [ 'FirewallPolicyActive' => [ 'operation' => 'DescribeFirewallPolicy', 'delay' => 15, 'maxAttempts' => 40, 'acceptors' => [ [ 'expected' => 'ACTIVE', 'matcher' => 'path', 'state' => 'success', 'argument' => 'FirewallPolicyResponse.FirewallPolicyStatus', ], [ 'expected' => 'ERROR', 'matcher' => 'path', 'state' => 'failure', 'argument' => 'FirewallPolicyResponse.FirewallPolicyStatus', ], ], ], ],];
