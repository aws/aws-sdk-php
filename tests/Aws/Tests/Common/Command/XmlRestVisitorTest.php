<?php

namespace Aws\Tests\Common\Command;

use Aws\Common\Command\XmlRestVisitor;
use Aws\Common\Command\XmlRestCommand;
use Guzzle\Service\Client;
use Guzzle\Service\Description\Parameter;
use Guzzle\Service\Description\Operation;
use Guzzle\Http\Message\EntityEnclosingRequest;

/**
 * @covers Aws\Common\Command\XmlRestVisitor
 * @covers Aws\Common\Command\XmlRestCommand
 */
class XmlRestVisitorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testNormalizesQuery()
    {
        $request = new EntityEnclosingRequest('POST', 'http://foo.com');
        $visitor = new XmlRestVisitor();
        $command = $this->getMockBuilder('Guzzle\Service\Command\AbstractCommand')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $param = new Parameter(array(
            'required' => true,
            'type' => 'object',
            'location' => 'xml',
            'name' => 'ChangeBatch',
            'properties' => array(
                'Comment' => array(
                    'type' => 'string',
                    'max' => 256,
                ),
                'Changes' => array(
                    'required' => true,
                    'type' => 'array',
                    'min' => 1,
                    'items' => array(
                        'type' => 'object',
                        'rename' => 'Change',
                        'properties' => array(
                            'Action' => array(
                                'required' => true,
                                'type' => 'string',
                                'enum' => array(
                                    'CREATE',
                                    'DELETE',
                                ),
                            ),
                            'ResourceRecordSet' => array(
                                'required' => true,
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'max' => 1024,
                                    ),
                                    'Type' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'enum' => array(
                                            'SOA',
                                            'A',
                                            'TXT',
                                            'NS',
                                            'CNAME',
                                            'MX',
                                            'PTR',
                                            'SRV',
                                            'SPF',
                                            'AAAA',
                                        ),
                                    ),
                                    'SetIdentifier' => array(
                                        'type' => 'string',
                                        'min' => 1,
                                        'max' => 128,
                                    ),
                                    'Weight' => array(
                                        'max' => 255,
                                    ),
                                    'Region' => array(
                                        'type' => 'string',
                                        'min' => 1,
                                        'max' => 64,
                                        'enum' => array(
                                            'us-east-1',
                                            'us-west-1',
                                            'us-west-2',
                                            'eu-west-1',
                                            'ap-southeast-1',
                                            'ap-northeast-1',
                                            'sa-east-1',
                                        ),
                                    ),
                                    'TTL' => array(
                                        'max' => 2147483647,
                                    ),
                                    'ResourceRecords' => array(
                                        'type' => 'array',
                                        'min' => 1,
                                        'items' => array(
                                            'type' => 'object',
                                            'rename' => 'ResourceRecord',
                                            'properties' => array(
                                                'Value' => array(
                                                    'required' => true,
                                                    'type' => 'string',
                                                    'max' => 8192,
                                                ),
                                            ),
                                        ),
                                    ),
                                    'AliasTarget' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'HostedZoneId' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'max' => 32,
                                            ),
                                            'DNSName' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'max' => 1024,
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            )
        ));

        $param->setParent(new Operation(array(
            'data' => array(
                'ns'   => 'https://route53.amazonaws.com/doc/2012-02-29/',
                'root' => 'ChangeResourceRecordSetsRequest'
            )
        )));

        $value = array(
            'Comment' => 'testing',
            'Changes' => array(
                array(
                    'Action' => 'CREATE',
                    'ResourceRecordSet' => array(
                        'Name' => 'Foo',
                        'Type' => 'SOA',
                        'ResourceRecords' => array(
                            array('Value' => 'FooBazBar')
                        )
                    )
                )
            )
        );

        $this->assertTrue($param->process($value));
        $visitor->visit($param, $request, $value);
        $visitor->after($command, $request);

        $this->assertEquals(
            "<?xml version=\"1.0\"?>\n"
            . "<ChangeResourceRecordSetsRequest xmlns=\"https://route53.amazonaws.com/doc/2012-02-29/\"><ChangeBatch>"
            . "<Comment>testing</Comment><Changes><Change><Action>CREATE</Action><ResourceRecordSet><Name>Foo</Name>"
            . "<Type>SOA</Type><ResourceRecords><ResourceRecord><Value>FooBazBar</Value></ResourceRecord>"
            . "</ResourceRecords></ResourceRecordSet></Change></Changes></ChangeBatch>"
            . "</ChangeResourceRecordSetsRequest>\n",
            (string) $request->getBody()
        );
    }

    public function testAddsContentTypeAndTopLevelValues()
    {
        $operation = new Operation(array(
            'data' => array(
                'ns'   => 'http://foo.com',
                'root' => 'test'
            ),
            'parameters' => array(
                'Foo' => array('location' => 'xml', 'type' => 'string'),
                'Baz' => array('location' => 'xml', 'type' => 'string')
            )
        ));
        $command = new XmlRestCommand(array('Foo' => 'test', 'Baz' => 'bar'), $operation);

        $command->setClient(new Client());
        $request = $command->prepare();
        $this->assertEquals('application/xml', (string) $request->getHeader('Content-Type'));
        $this->assertEquals(
            '<?xml version="1.0"?>' . "\n"
            . '<test xmlns="http://foo.com"><Foo>test</Foo><Baz>bar</Baz></test>' . "\n",
            (string) $request->getBody()
        );
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     */
    public function testEnsuresParameterHasParent()
    {
        $param = new Parameter(array('Foo' => array('location' => 'xml', 'type' => 'string')));
        $value = array();
        $request = new EntityEnclosingRequest('POST', 'http://foo.com');
        $this->assertTrue($param->process($value));
        $visitor = new XmlRestVisitor();
        $visitor->visit($param, $request, $value);
    }

    public function testCanChangeContentType()
    {
        $visitor = new XmlRestVisitor();
        $visitor->setContentTypeHeader('application/foo');
        $this->assertEquals('application/foo', $this->readAttribute($visitor, 'contentType'));
    }

    public function testCanAddArrayOfSimpleTypes()
    {
        $request = new EntityEnclosingRequest('POST', 'http://foo.com');
        $visitor = new XmlRestVisitor();
        $command = $this->getMockBuilder('Guzzle\Service\Command\AbstractCommand')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $param = new Parameter(array(
            'type'     => 'object',
            'location' => 'xml',
            'name'     => 'Out',
            'properties' => array(
                'Nodes' => array(
                    'required' => true,
                    'type'     => 'array',
                    'min'      => 1,
                    'items' => array(
                        'type'   => 'string',
                        'rename' => 'Node'
                    )
                )
            )
        ));

        $param->setParent(new Operation(array('data' => array('ns' => 'https://foo/', 'root' => 'Test'))));

        $value = array(
            'Nodes' => array('foo', 'baz')
        );

        $this->assertTrue($param->process($value));
        $visitor->visit($param, $request, $value);
        $visitor->after($command, $request);

        $this->assertEquals(
            "<?xml version=\"1.0\"?>\n"
            . "<Test xmlns=\"https://foo/\"><Out><Nodes><Node>foo</Node><Node>baz</Node></Nodes></Out></Test>\n",
            (string) $request->getBody()
        );
    }
}
