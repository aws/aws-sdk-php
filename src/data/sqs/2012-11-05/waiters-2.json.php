<?php
// This file was auto-generated from sdk-root/src/data/sqs/2012-11-05/waiters-2.json
return [ 'version' => 2, 'waiters' => [ 'QueueExists' => [ 'delay' => 5, 'maxAttempts' => 40, 'operation' => 'GetQueueUrl', 'acceptors' => [ [ 'matcher' => 'status', 'expected' => 200, 'state' => 'success', ], [ 'matcher' => 'error', 'expected' => 'QueueDoesNotExist', 'state' => 'retry', ], ], ], ],];
