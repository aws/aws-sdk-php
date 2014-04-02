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

namespace Aws\Tests\Swf\Integration;

use Aws\Swf\Enum\RegistrationStatus;
use Aws\Swf\Exception\DomainAlreadyExistsException;
use Aws\Swf\Exception\DomainDeprecatedException;
use Aws\Swf\SwfClient;
use Guzzle\Iterator\AppendIterator;
use Guzzle\Iterator\FilterIterator;
use Guzzle\Iterator\MapIterator;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var SwfClient
     */
    protected $swf;

    public function setUp()
    {
        $this->swf = $this->getServiceBuilder()->get('swf');
    }

    public function testBasicOperations()
    {
        $registeredDomain = 'php-integ-swf-domain';
        $deprecatedDomain = 'php-integ-swf-domain-deprecated';

        self::log('Create a SWF domain to use for testing.');
        try {
            $this->swf->getCommand('RegisterDomain', array(
                'name'                                   => $registeredDomain,
                'description'                            => 'For integration testing in the AWS SDK for PHP',
                'workflowExecutionRetentionPeriodInDays' => '10'
            ))->execute();
        } catch (DomainAlreadyExistsException $e) {
            self::log('The domain is already created.');
        }

        self::log('Make sure the domain is there with the correct status.');
        $result = $this->swf->getCommand('DescribeDomain', array(
            'name' => $registeredDomain,
        ))->getResult();
        $this->assertEquals(RegistrationStatus::REGISTERED, $result->getPath('domainInfo/status'));

        self::log('Create a second SWF domain to use for testing.');
        try {
            $this->swf->getCommand('RegisterDomain', array(
                'name'                                   => $deprecatedDomain,
                'description'                            => 'For integration testing in the AWS SDK for PHP',
                'workflowExecutionRetentionPeriodInDays' => '10'
            ))->execute();
        } catch (DomainAlreadyExistsException $e) {
            self::log('The second domain is already created.');
        }

        self::log('Deprecate the second SWF domain for testing.');
        try {
            $this->swf->getCommand('DeprecateDomain', array(
                'name' => $deprecatedDomain,
            ))->execute();
        } catch (DomainDeprecatedException $e) {
            self::log('The second domain is already deprecated.');
        }

        self::log('Make sure the second domain is there with the correct deprecated status.');
        $result = $this->swf->getCommand('DescribeDomain', array(
            'name' => $deprecatedDomain,
        ))->getResult();
        $this->assertEquals(RegistrationStatus::DEPRECATED, $result->getPath('domainInfo/status'));

        self::log('List the domains using iterators and make sure the two domains are there.');
        $domains = new AppendIterator();
        $domains->append($this->swf->getIterator('ListDomains', array(
            'reverseOrder'       => true,
            'registrationStatus' => RegistrationStatus::REGISTERED,
        )));
        $domains->append($this->swf->getIterator('ListDomains', array(
            'registrationStatus' => RegistrationStatus::DEPRECATED,
        )));
        $domains = new FilterIterator($domains, function (array $domain) {
            return (strpos($domain['name'], 'php-integ-swf') === 0);
        });
        $domains = new MapIterator($domains, function (array $domain) {
            return $domain['name'];
        });
        $this->assertEquals(2, iterator_count($domains));
        $domainNames = array();
        foreach ($domains as $domain) {
            $domainNames[] = $domain;
        }
        $this->assertEquals(array($registeredDomain, $deprecatedDomain), $domainNames);
    }
}
