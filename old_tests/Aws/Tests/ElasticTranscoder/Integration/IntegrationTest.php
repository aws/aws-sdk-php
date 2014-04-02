<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\ElasticTranscoder\Integration;

use Aws\ElasticTranscoder\ElasticTranscoderClient;
use Aws\Iam\IamClient;
use Aws\S3\S3Client;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    const DUMMY_IAM_POLICY_ASSUME_ROLE = '{"Statement":[{"Effect":"Allow","Principal":{"Service":["ec2.amazonaws.com"]},"Action":["sts:AssumeRole"]}]}';
    const DUMMY_IAM_POLICY_ALLOW_S3 = '{"Statement":[{"Effect":"Allow","Action":"s3:*","Resource":"*"}]}';

    /**
     * @var ElasticTranscoderClient
     */
    protected $transcoder;

    /**
     * @var IamClient
     */
    protected $iam;

    /**
     * @var S3Client
     */
    protected $s3;

    public function setUp()
    {
        $this->transcoder = $this->getServiceBuilder()->get('ElasticTranscoder');
        $this->iam = $this->getServiceBuilder()->get('Iam');
        $this->s3 = $this->getServiceBuilder()->get('S3');
    }

    public function testBasicOperations()
    {
        $inputBucket   = 'php-integ-transcoder-test-bucket-input';
        $outputBucket  = 'php-integ-transcoder-test-bucket-output';
        $roleName      = 'php-integ-transcoder-test-role';
        $policyName    = 'php-integ-transcoder-test-policy';
        $pipelineName  = 'php-integ-transcoder-test-pipeline';

        self::log('Create input and output buckets for the Elastic Transcoder pipeline.');
        $commands = array();
        $commands[] = $this->s3->getCommand('CreateBucket', array(
            'Bucket' => $inputBucket,
        ));
        $commands[] = $this->s3->getCommand('CreateBucket', array(
            'Bucket' => $outputBucket,
        ));
        $this->s3->execute($commands);

        self::log('Create an IAM Role for the Elastic Transcoder pipeline.');
        $result = $this->iam->getCommand('CreateRole', array(
            'RoleName'                 => $roleName,
            'AssumeRolePolicyDocument' => self::DUMMY_IAM_POLICY_ASSUME_ROLE,
        ))->getResult();
        $roleArn = $result->getPath('Role/Arn');

        self::log('Put a policy on the IAM Role for the Elastic Transcoder pipeline.');
        $result = $this->iam->getCommand('PutRolePolicy', array(
            'PolicyName'     => $policyName,
            'RoleName'       => $roleName,
            'PolicyDocument' => self::DUMMY_IAM_POLICY_ALLOW_S3,
        ))->getResult();

        self::log('Use TestRole to validate our pipeline inputs. NOTE: Ours are not valid on purpose.');
        $result = $this->transcoder->getCommand('TestRole', array(
            'InputBucket'   => $inputBucket,
            'OutputBucket'  => $outputBucket,
            'Role'          => $roleArn,
            'Topics' => array(),
        ))->getResult();
        $this->assertEquals('false', $result['Success']);

        self::log('Create an Elastic Transcoder pipeline.');
        $result = $this->transcoder->getCommand('CreatePipeline', array(
            'Name'          => $pipelineName,
            'InputBucket'   => $inputBucket,
            'OutputBucket'  => $outputBucket,
            'Role'          => $roleArn,
            'Notifications' => array_fill_keys(array('Progressing', 'Completed', 'Warning', 'Error'), ''),
        ))->getResult();
        $pipelineId = $result->getPath('Pipeline/Id');

        self::log('Make sure created Elastic Transcoder pipeline is in the list of pipelines.');
        $result = $this->transcoder->getCommand('ListPipelines')->getResult();
        $pipelineNames = $result->getPath('Pipelines/*/Name');
        $this->assertContains($pipelineName, $pipelineNames);

        self::log('Make sure ListPipelines iterator works.');
        $found = false;
        foreach ($this->transcoder->getIterator('ListPipelines') as $pipeline) {
            if ($pipeline['Name'] == $pipelineName) {
                $found = true;
                break;
            }
        }
        if (!$found) {
            $this->fail('Did not find the pipeline in the iterator results.');
        }

        self::log('Make sure created Elastic Transcoder pipeline can be read.');
        $result = $this->transcoder->getCommand('ReadPipeline', array(
            'Id' => $pipelineId,
        ))->getResult();;
        $this->assertEquals($pipelineName, $result->getPath('Pipeline/Name'));

        self::log('Delete the Elastic Transcoder pipeline.');
        $response = $this->transcoder->getCommand('DeletePipeline', array(
            'Id' => $pipelineId,
        ))->getResponse();
        $this->assertEquals(202, $response->getStatusCode());

        self::log('Delete the policy from the IAM Role for the Elastic Transcoder pipeline.');
        $result = $this->iam->getCommand('DeleteRolePolicy', array(
            'PolicyName' => $policyName,
            'RoleName'   => $roleName,
        ))->getResult();

        self::log('Delete the IAM Role for the Elastic Transcoder pipeline.');
        $result = $this->iam->getCommand('DeleteRole', array(
            'RoleName' => $roleName,
        ))->getResult();

        self::log('Delete the input and output buckets for the Elastic Transcoder pipeline.');
        $commands = array();
        $commands[] = $this->s3->getCommand('DeleteBucket', array(
            'Bucket' => $inputBucket
        ));
        $commands[] = $this->s3->getCommand('DeleteBucket', array(
            'Bucket' => $outputBucket
        ));
        $this->s3->execute($commands);
    }

    /**
     * @expectedException \Aws\ElasticTranscoder\Exception\ResourceNotFoundException
     */
    public function testErrorParsing()
    {
        $this->transcoder->cancelJob(array('Id' => '1111111111111-abcdef'));
    }
}
