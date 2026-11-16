<?php
// This file was auto-generated from sdk-root/src/data/wellarchitected/2020-03-31/waiters-2.json
return [ 'version' => 2, 'waiters' => [ 'AgentOrganizationalReportCompleted' => [ 'delay' => 15, 'maxAttempts' => 40, 'operation' => 'GetAgentOrganizationalReport', 'acceptors' => [ [ 'matcher' => 'path', 'argument' => 'state', 'state' => 'success', 'expected' => 'COMPLETED', ], [ 'matcher' => 'path', 'argument' => 'state', 'state' => 'failure', 'expected' => 'FAILED', ], [ 'matcher' => 'path', 'argument' => 'state', 'state' => 'failure', 'expected' => 'DELETING', ], ], ], ],];
