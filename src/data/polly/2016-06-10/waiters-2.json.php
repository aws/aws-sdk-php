<?php
// This file was auto-generated from sdk-root/src/data/polly/2016-06-10/waiters-2.json
return [ 'version' => 2, 'waiters' => [ 'VoiceActive' => [ 'description' => 'Wait until a custom voice is active and can be used for speech synthesis.', 'operation' => 'GetVoice', 'delay' => 15, 'maxAttempts' => 480, 'acceptors' => [ [ 'state' => 'success', 'matcher' => 'path', 'argument' => 'Voice.Status', 'expected' => 'active', ], [ 'state' => 'failure', 'matcher' => 'path', 'argument' => 'Voice.Status', 'expected' => 'failed', ], ], ], ],];
