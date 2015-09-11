<?php
namespace Aws\ElasticTranscoder;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic Transcoder** service.
 *
 * @method \Aws\Result cancelJob(array $args = [])
 * @method \Aws\Result createJob(array $args = [])
 * @method \Aws\Result createPipeline(array $args = [])
 * @method \Aws\Result createPreset(array $args = [])
 * @method \Aws\Result deletePipeline(array $args = [])
 * @method \Aws\Result deletePreset(array $args = [])
 * @method \Aws\Result listJobsByPipeline(array $args = [])
 * @method \Aws\Result listJobsByStatus(array $args = [])
 * @method \Aws\Result listPipelines(array $args = [])
 * @method \Aws\Result listPresets(array $args = [])
 * @method \Aws\Result readJob(array $args = [])
 * @method \Aws\Result readPipeline(array $args = [])
 * @method \Aws\Result readPreset(array $args = [])
 * @method \Aws\Result testRole(array $args = [])
 * @method \Aws\Result updatePipeline(array $args = [])
 * @method \Aws\Result updatePipelineNotifications(array $args = [])
 * @method \Aws\Result updatePipelineStatus(array $args = [])
 */
class ElasticTranscoderClient extends AwsClient {}
