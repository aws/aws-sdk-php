<?php
// This file was auto-generated from sdk-root/src/data/lambda/2015-03-31/waiters-2.json
return [ 'version' => 2, 'waiters' => [ 'FunctionExists' => [ 'delay' => 1, 'operation' => 'GetFunction', 'maxAttempts' => 20, 'acceptors' => [ [ 'state' => 'success', 'matcher' => 'status', 'expected' => 200, ], [ 'state' => 'retry', 'matcher' => 'error', 'expected' => 'ResourceNotFoundException', ], ], ], ],];
