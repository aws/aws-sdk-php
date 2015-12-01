<?php
// This file was auto-generated from sdk-root/src/data/email/2010-12-01/waiters-2.json
return [ 'version' => 2, 'waiters' => [ 'IdentityExists' => [ 'acceptors' => [ [ 'argument' => 'VerificationAttributes.*.VerificationStatus', 'expected' => 'Success', 'matcher' => 'pathAll', 'state' => 'success', ], ], 'delay' => 3, 'maxAttempts' => 20, 'operation' => 'GetIdentityVerificationAttributes', ], ],];
