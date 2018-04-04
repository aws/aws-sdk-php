<?php
namespace Aws\TranscribeService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Transcribe Service** service.
 * @method \Aws\Result createVocabulary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVocabularyAsync(array $args = [])
 * @method \Aws\Result deleteVocabulary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVocabularyAsync(array $args = [])
 * @method \Aws\Result getTranscriptionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTranscriptionJobAsync(array $args = [])
 * @method \Aws\Result getVocabulary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVocabularyAsync(array $args = [])
 * @method \Aws\Result listTranscriptionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTranscriptionJobsAsync(array $args = [])
 * @method \Aws\Result listVocabularies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listVocabulariesAsync(array $args = [])
 * @method \Aws\Result startTranscriptionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startTranscriptionJobAsync(array $args = [])
 * @method \Aws\Result updateVocabulary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVocabularyAsync(array $args = [])
 */
class TranscribeServiceClient extends AwsClient {}
