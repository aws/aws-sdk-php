<?php
namespace Aws\TranscribeService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Transcribe Service** service.
 * @method \Aws\Result getTranscriptionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTranscriptionJobAsync(array $args = [])
 * @method \Aws\Result listTranscriptionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTranscriptionJobsAsync(array $args = [])
 * @method \Aws\Result startTranscriptionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startTranscriptionJobAsync(array $args = [])
 */
class TranscribeServiceClient extends AwsClient {}
