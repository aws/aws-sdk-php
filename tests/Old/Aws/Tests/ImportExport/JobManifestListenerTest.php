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

namespace Aws\Tests\ImportExport;

use Aws\ImportExport\JobManifestListener;
use Guzzle\Common\Event;

/**
 * @covers Aws\ImportExport\JobManifestListener
 */
class JobManifestListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected $sampleManifest;

    public function setUp()
    {
        $this->sampleManifest = <<<YAML
foo: bar
bar:
    - foo
    - bar
    - baz
baz: foo

YAML;
    }

    public function testManifestIsConvertedToYaml()
    {
        $client = $this->getServiceBuilder()->get('importexport');
        $command = $client->getCommand('CreateJob', array(
            'JobType'      => 'IMPORT',
            'ValidateOnly' => true,
            'Manifest'     => array(
                'foo' => 'bar',
                'bar' => array('foo', 'bar', 'baz'),
                'baz' => 'foo',
            ),
        ));

        $listener = new JobManifestListener();
        $this->assertArrayHasKey('command.before_prepare', $listener->getSubscribedEvents());

        $event = new Event(array('command' => $command));
        $listener->onCommandBeforePrepare($event);
        $this->assertEquals($this->sampleManifest, $command->get('Manifest'));
    }
}
