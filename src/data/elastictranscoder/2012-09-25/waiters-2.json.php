<?php
// This file was auto-generated from sdk-root/src/data/elastictranscoder/2012-09-25/waiters-2.json
return [ 'version' => 2, 'waiters' => [ 'JobComplete' => [ 'acceptors' => [ [ 'argument' => 'Job.Status', 'expected' => 'Complete', 'matcher' => 'path', 'state' => 'success', ], [ 'argument' => 'Job.Status', 'expected' => 'Canceled', 'matcher' => 'path', 'state' => 'failure', ], [ 'argument' => 'Job.Status', 'expected' => 'Error', 'matcher' => 'path', 'state' => 'failure', ], ], 'delay' => 30, 'maxAttempts' => 120, 'operation' => 'ReadJob', ], ],];
