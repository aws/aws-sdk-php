<?php
// This file was auto-generated from sdk-root/src/data/kinesis/2013-12-02/waiters-2.json
return [ 'version' => 2, 'waiters' => [ 'StreamExists' => [ 'acceptors' => [ [ 'argument' => 'StreamDescription.StreamStatus', 'expected' => 'ACTIVE', 'matcher' => 'path', 'state' => 'success', ], ], 'delay' => 10, 'maxAttempts' => 18, 'operation' => 'DescribeStream', ], ],];
