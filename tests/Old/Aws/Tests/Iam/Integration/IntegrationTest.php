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

namespace Aws\Tests\Iam\Integration;

use Aws\Iam\IamClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    const IAM_POLICY_ASSUME_ROLE = '{"Statement":[{"Effect":"Allow","Principal":{"Service":["ec2.amazonaws.com"]},"Action":["sts:AssumeRole"]}]}';
    const IAM_POLICY_ALLOW_S3 = '{"Statement":[{"Effect":"Allow","Action":"s3:*","Resource":"*"}]}';

    protected static $roleName = 'php-integ-iam-test-role';
    protected static $policies = array('php-integ-iam-test-policy-1', 'php-integ-iam-test-policy-2');

    /**
     * @var IamClient
     */
    protected $iam;

    public function setUp()
    {
        $this->iam = $this->getServiceBuilder()->get('iam');
    }

    public static function cleanUp()
    {
        $iam = self::getServiceBuilder()->get('iam');
        foreach (self::$policies as $policy) {
            try {
                $iam->deleteRolePolicy(array(
                    'PolicyName' => $policy,
                    'RoleName'   => self::$roleName,
                ));
            } catch (\Exception $e) {}
        }

        try {
            $iam->deleteRole(array('RoleName' => self::$roleName));
        } catch (\Exception $e) {}
    }

    public static function setUpBeforeClass()
    {
        self::cleanUp();
    }

    public static function tearDownAfterClass()
    {
        self::cleanUp();
    }

    public function testGetsAccountSummary()
    {
        $result = $this->iam->getAccountSummary();
        // Ensure that the XML map was converted correctly
        $this->assertArrayHasKey('SummaryMap', $result->toArray());
    }

    public function testWorkingWithRoles()
    {
        $roleName = 'php-integ-iam-test-role';

        self::log('Create an IAM Role.');
        $result = $this->iam->getCommand('CreateRole', array(
            'RoleName'                 => $roleName,
            'AssumeRolePolicyDocument' => self::IAM_POLICY_ASSUME_ROLE,
        ))->getResult();
        $roleArn = $result->getPath('Role/Arn');

        self::log('Put a policy on the IAM Role.');
        $result = $this->iam->getCommand('PutRolePolicy', array(
            'PolicyName'     => self::$policies[0],
            'RoleName'       => $roleName,
            'PolicyDocument' => self::IAM_POLICY_ALLOW_S3,
        ))->getResult();

        self::log('Put another policy on the IAM Role.');
        $result = $this->iam->getCommand('PutRolePolicy', array(
            'PolicyName'     => self::$policies[1],
            'RoleName'       => $roleName,
            'PolicyDocument' => self::IAM_POLICY_ALLOW_S3,
        ))->getResult();

        self::log('make sure the IAM Role exists.');
        // @TODO do a ListRoles-related assertion

        self::log('Make sure the policies are there.');
        //print_r($this->iam->listRolePolicies(array('RoleName' => $roleName))->toArray());
        $policies = $this->iam->getIterator('ListRolePolicies', array('RoleName' => $roleName));
        $this->assertEquals(self::$policies, iterator_to_array($policies));

        self::log('Delete the policies from the IAM Role.');
        $commands = array();
        foreach (self::$policies as $policy) {
            $commands[] = $this->iam->getCommand('DeleteRolePolicy', array(
                'PolicyName' => $policy,
                'RoleName'   => $roleName,
            ));
        }
        $this->iam->execute($commands);

        self::log('Delete the IAM Role.');
        $result = $this->iam->getCommand('DeleteRole', array(
            'RoleName' => $roleName,
        ))->getResult();
    }
}
