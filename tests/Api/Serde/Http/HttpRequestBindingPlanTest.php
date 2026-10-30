<?php
namespace Aws\Test\Api\Serde\Http;

use Aws\Api\Serde\Http\HttpRequestBindingPlan as Plan;
use Aws\Api\Serde\Http\HttpRequestBindingPlanProvider;
use Aws\Api\Serializer\RestJsonSerializer;
use Aws\Api\Serializer\RestXmlSerializer;
use Aws\Api\Service;
use Aws\Command;
use PHPUnit\Framework\TestCase;

/**
 * Request binding plans: compiled layout, reuse, invalidation, and request
 * output. Expected requests were produced by upstream master's
 * RestSerializer before the plan was introduced.
 */
class HttpRequestBindingPlanTest extends TestCase
{
    private const SHAPES = [
        'S' => ['type' => 'string'],
        'I' => ['type' => 'integer'],
        'B' => ['type' => 'boolean'],
        'T' => ['type' => 'timestamp'],
        'TE' => ['type' => 'timestamp', 'timestampFormat' => 'unixTimestamp'],
        'Bl' => ['type' => 'blob'],
        'SL' => ['type' => 'list', 'member' => ['shape' => 'S']],
        'BL' => ['type' => 'list', 'member' => ['shape' => 'B']],
        'TL' => ['type' => 'list', 'member' => ['shape' => 'T']],
        'NamedL' => ['type' => 'list', 'member' => ['shape' => 'S', 'locationName' => 'item']],
        'NestL' => ['type' => 'list', 'member' => ['shape' => 'SL']],
        'SM' => ['type' => 'map', 'key' => ['shape' => 'S'], 'value' => ['shape' => 'S']],
        'J' => ['type' => 'string', 'jsonvalue' => true],
        'Inner' => ['type' => 'structure', 'members' => ['A' => ['shape' => 'S'], 'N' => ['shape' => 'I']]],
        'In' => ['type' => 'structure', 'members' => [
            'Bucket' => ['shape' => 'S', 'location' => 'uri', 'locationName' => 'Bucket'],
            'Key' => ['shape' => 'S', 'location' => 'uri', 'locationName' => 'Key'],
            'H' => ['shape' => 'S', 'location' => 'header', 'locationName' => 'x-h'],
            'HN' => ['shape' => 'S', 'location' => 'header'],
            'HI' => ['shape' => 'I', 'location' => 'header', 'locationName' => 'x-i'],
            'HB' => ['shape' => 'B', 'location' => 'header', 'locationName' => 'x-b'],
            'HT' => ['shape' => 'T', 'location' => 'header', 'locationName' => 'x-t'],
            'HTE' => ['shape' => 'TE', 'location' => 'header', 'locationName' => 'x-te'],
            'HJ' => ['shape' => 'J', 'location' => 'header', 'locationName' => 'x-j'],
            'HL' => ['shape' => 'SL', 'location' => 'header', 'locationName' => 'x-l'],
            'HBL' => ['shape' => 'BL', 'location' => 'header', 'locationName' => 'x-bl'],
            'HTL' => ['shape' => 'TL', 'location' => 'header', 'locationName' => 'x-tl'],
            'HNL' => ['shape' => 'NamedL', 'location' => 'header', 'locationName' => 'x-nl'],
            'HNest' => ['shape' => 'NestL', 'location' => 'header', 'locationName' => 'x-nest'],
            'Meta' => ['shape' => 'SM', 'location' => 'headers', 'locationName' => 'x-meta-'],
            'Q' => ['shape' => 'S', 'location' => 'querystring', 'locationName' => 'q'],
            'QN' => ['shape' => 'S', 'location' => 'querystring'],
            'QI' => ['shape' => 'I', 'location' => 'querystring', 'locationName' => 'qi'],
            'QB' => ['shape' => 'B', 'location' => 'querystring', 'locationName' => 'qb'],
            'QT' => ['shape' => 'T', 'location' => 'querystring', 'locationName' => 'qt'],
            'QL' => ['shape' => 'SL', 'location' => 'querystring', 'locationName' => 'ql'],
            'QBL' => ['shape' => 'BL', 'location' => 'querystring', 'locationName' => 'qbl'],
            'QTL' => ['shape' => 'TL', 'location' => 'querystring', 'locationName' => 'qtl'],
            'QM' => ['shape' => 'SM', 'location' => 'querystring'],
            'Body1' => ['shape' => 'S'],
            'Body2' => ['shape' => 'Inner'],
        ]],
        'PBlob' => ['type' => 'structure', 'payload' => 'P', 'members' => ['P' => ['shape' => 'Bl']]],
        'PStruct' => ['type' => 'structure', 'payload' => 'P', 'members' => [
            'P' => ['shape' => 'Inner'], 'Other' => ['shape' => 'S'],
        ]],
        'PMissing' => ['type' => 'structure', 'payload' => 'Nope', 'members' => [
            'H' => ['shape' => 'S', 'location' => 'header'],
        ]],
        'UriIn' => ['type' => 'structure', 'members' => [
            'A' => ['shape' => 'S', 'location' => 'uri', 'locationName' => 'Dup'],
            'Bv' => ['shape' => 'S', 'location' => 'uri', 'locationName' => 'Dup'],
            'T' => ['shape' => 'T', 'location' => 'uri', 'locationName' => 'T'],
            'Flag' => ['shape' => 'B', 'location' => 'uri', 'locationName' => 'Flag'],
            'G' => ['shape' => 'S', 'location' => 'uri'],
        ]],
    ];

    private const OPERATIONS = [
        'Op' => ['http' => ['method' => 'PUT', 'requestUri' => '/{Bucket}/{Key+}?x-id=Op'], 'input' => ['shape' => 'In']],
        'Plain' => ['http' => ['method' => 'GET', 'requestUri' => '/plain'], 'input' => ['shape' => 'In']],
        'Blob' => ['http' => ['method' => 'POST', 'requestUri' => '/p'], 'input' => ['shape' => 'PBlob']],
        'Struct' => ['http' => ['method' => 'POST', 'requestUri' => '/p'], 'input' => ['shape' => 'PStruct']],
        'Missing' => ['http' => ['method' => 'POST', 'requestUri' => '/p'], 'input' => ['shape' => 'PMissing']],
        'Uri' => ['http' => ['method' => 'GET', 'requestUri' => '/{Dup}/{Dup}/{T}/{Flag}/{G+}/{Missing}/end'],
            'input' => ['shape' => 'UriIn']],
    ];

    private function service(string $protocol = 'rest-json'): Service
    {
        return new Service([
            'metadata' => ['protocol' => $protocol, 'serviceIdentifier' => 'foo', 'endpointPrefix' => 'foo',
                'apiVersion' => '2020-01-01'],
            'operations' => self::OPERATIONS,
            'shapes' => self::SHAPES,
        ], function () {
            return [];
        });
    }

    private function serialize(Service $api, string $op, array $args): array
    {
        $serializer = $api->getProtocol() === 'rest-xml'
            ? new RestXmlSerializer($api, 'http://foo.com')
            : new RestJsonSerializer($api, 'http://foo.com');
        $request = $serializer(new Command($op, $args));

        return [
            $request->getMethod(),
            (string) $request->getUri(),
            $request->getHeaders(),
            (string) $request->getBody(),
        ];
    }

    /**
     * Fails on any warning or deprecation, so a compile-time read of a
     * missing key cannot slip through.
     */
    private function withoutWarnings(callable $fn)
    {
        set_error_handler(function ($no, $str) {
            $this->fail("Unexpected PHP error: $str");
        });
        try {
            return $fn();
        } finally {
            restore_error_handler();
        }
    }

    public function testCompilesBindingLayout(): void
    {
        $api = $this->service();
        $plan = (new HttpRequestBindingPlanProvider($api))->get($api->getOperation('Op'));

        $this->assertSame('PUT', $plan->method);
        $this->assertNull($plan->uriLiteral);
        $this->assertSame(
            ['/', [Plan::P_LABEL => 'Bucket', Plan::P_GREEDY => false],
                '/', [Plan::P_LABEL => 'Key', Plan::P_GREEDY => true], '?x-id=Op'],
            $plan->uriParts
        );
        $this->assertArrayNotHasKey('Bucket', $plan->bindings);
        $this->assertSame(Plan::BODY, $plan->bindings['Body1'][Plan::D_TAG]);

        $header = $plan->bindings['HT'];
        $this->assertSame(Plan::HEADER, $header[Plan::D_TAG]);
        $this->assertSame('x-t', $header[Plan::D_NAME]);
        $this->assertSame(Plan::CONVERT_TIMESTAMP, $header[Plan::D_CONVERT]);
        $this->assertSame('rfc822', $header[Plan::D_TSFORMAT]);
        $this->assertSame('HN', $plan->bindings['HN'][Plan::D_NAME]);
        $this->assertTrue($plan->bindings['HJ'][Plan::D_JSONVALUE]);

        $this->assertSame(Plan::HEADER_LIST, $plan->bindings['HBL'][Plan::D_TAG]);
        $this->assertSame(Plan::CONVERT_BOOLEAN, $plan->bindings['HBL'][Plan::D_ITEM_CONVERT]);
        $this->assertSame(Plan::HEADER_SHAPE, $plan->bindings['HNL'][Plan::D_TAG]);
        $this->assertSame(Plan::HEADER_SHAPE, $plan->bindings['HNest'][Plan::D_TAG]);
        $this->assertSame(Plan::HEADER_MAP, $plan->bindings['Meta'][Plan::D_TAG]);
        $this->assertSame('x-meta-', $plan->bindings['Meta'][Plan::D_NAME]);

        $this->assertSame('iso8601', $plan->bindings['QT'][Plan::D_TSFORMAT]);
        $this->assertSame(Plan::QUERY_LIST, $plan->bindings['QL'][Plan::D_TAG]);
        $this->assertSame(Plan::QUERY_MAP, $plan->bindings['QM'][Plan::D_TAG]);
        $this->assertTrue($plan->hasPayloadParam);
    }

    public function testLiteralUriAndPayloadKinds(): void
    {
        $api = $this->service();
        $provider = new HttpRequestBindingPlanProvider($api);

        // A template with no labels is stored as a plain string, unless the
        // input still has URI members (legacy formats them, and can throw).
        $this->assertSame('/p', $provider->get($api->getOperation('Blob'))->uriLiteral);
        $plain = $provider->get($api->getOperation('Plain'));
        $this->assertNull($plain->uriLiteral);
        $this->assertSame(['/plain'], $plain->uriParts);

        $blob = $provider->get($api->getOperation('Blob'));
        $this->assertSame(Plan::PAYLOAD_RAW, $blob->payloadKind);
        $this->assertSame('application/octet-stream', $blob->payloadContentType);

        $struct = $provider->get($api->getOperation('Struct'));
        $this->assertSame(Plan::PAYLOAD_STRUCTURE, $struct->payloadKind);
        $this->assertSame([], $struct->bindings, 'Unlocated members are not body members when a payload is set');

        $this->assertSame(
            Plan::PAYLOAD_MISSING,
            $provider->get($api->getOperation('Missing'))->payloadKind
        );
    }

    public function testPlanIsReusedAndRebuiltOnMutation(): void
    {
        $api = $this->service();
        $provider = new HttpRequestBindingPlanProvider($api);
        $op = $api->getOperation('Op');

        $plan = $provider->get($op);
        $this->assertSame($plan, $provider->get($op));

        $op['http'] = ['method' => 'POST', 'requestUri' => '/changed/{Bucket}'];
        $rebuilt = $provider->get($op);
        $this->assertNotSame($plan, $rebuilt);
        $this->assertSame('POST', $rebuilt->method);

        $header = $op->getInput()->getMember('H');
        $header['locationName'] = 'x-renamed';
        $this->assertSame('x-renamed', $provider->get($op)->bindings['H'][Plan::D_NAME]);

        unset($header['location']);
        $this->assertSame(Plan::BODY, $provider->get($op)->bindings['H'][Plan::D_TAG]);
    }

    public function testServiceReplacementUsesNewStableOperation(): void
    {
        $api = $this->service();
        $provider = new HttpRequestBindingPlanProvider($api);
        $old = $api->getOperation('Blob');
        $provider->get($old);

        $definition = $api->getDefinition();
        $definition['operations']['Blob']['http']['requestUri'] = '/replaced';
        $api->setDefinition($definition);

        $new = $api->getOperation('Blob');
        $this->assertNotSame($old, $new);
        $this->assertSame($new, $api->getOperation('Blob'));
        $this->assertSame('/replaced', $provider->get($new)->uriLiteral);
    }

    public function testHeadersMatchLegacy(): void
    {
        $result = $this->withoutWarnings(fn () => $this->serialize($this->service(), 'Plain', [
            'H' => 'v', 'HN' => 'n', 'HI' => 7, 'HB' => false, 'HT' => 1600000000,
            'HTE' => '2020-01-01T00:00:00Z', 'HJ' => ['a' => 1], 'HL' => ['a', 'b,c'],
            'HBL' => [true, false], 'HTL' => [1600000000, 1600000001],
        ]));

        $this->assertSame(['GET', 'http://foo.com/plain', [
            'Host' => ['foo.com'],
            'x-h' => ['v'],
            'HN' => ['n'],
            'x-i' => ['7'],
            'x-b' => ['false'],
            'x-t' => ['Sun, 13 Sep 2020 12:26:40 GMT'],
            'x-te' => ['1577836800'],
            'x-j' => ['eyJhIjoxfQ=='],
            'x-l' => ['a', 'b,c'],
            'x-bl' => ['true', 'false'],
            'x-tl' => ['Sun, 13 Sep 2020 12:26:40 GMT', 'Sun, 13 Sep 2020 12:26:41 GMT'],
            'Content-Type' => ['application/json'],
            'Content-Length' => ['2'],
        ], '{}'], $result);
    }

    public function testQueryStringMatchesLegacy(): void
    {
        $result = $this->withoutWarnings(fn () => $this->serialize($this->service(), 'Plain', [
            'Q' => 'a b', 'QN' => 'n', 'QI' => 3, 'QB' => true, 'QT' => 1600000000,
            'QL' => ['x', 'y'], 'QBL' => [true, false], 'QTL' => [1600000000],
            'QM' => ['m1' => 'v', 'q' => 'dup'],
        ]));

        $this->assertSame(
            'http://foo.com/plain?q=a%20b&QN=n&qi=3&qb=true&qt=2020-09-13T12%3A26%3A40Z'
            . '&ql=x&ql=y&qbl=true&qbl=false&qtl=2020-09-13T12%3A26%3A40Z&m1=v',
            $result[1]
        );
    }

    public function testArgumentOrderDrivesHeaderAndQueryOrder(): void
    {
        $result = $this->serialize($this->service(), 'Plain', [
            'QB' => false, 'Q' => 'first', 'HB' => true, 'H' => 'h', 'Body1' => 'b',
        ]);

        $this->assertSame('http://foo.com/plain?qb=false&q=first', $result[1]);
        $this->assertSame(['Host', 'x-b', 'x-h', 'Content-Type', 'Content-Length'], array_keys($result[2]));
        $this->assertSame('{"Body1":"b"}', $result[3]);
    }

    public function testHeaderMapSkipsNullValues(): void
    {
        $result = $this->serialize($this->service(), 'Plain', ['Meta' => ['a' => '1', 'b' => null, 'c' => 3]]);

        $this->assertSame(['1'], $result[2]['x-meta-a']);
        $this->assertSame(['3'], $result[2]['x-meta-c']);
        $this->assertArrayNotHasKey('x-meta-b', $result[2]);
    }

    public function testUriLabelsMatchLegacy(): void
    {
        $result = $this->withoutWarnings(fn () => $this->serialize($this->service(), 'Uri', [
            'A' => 'a', 'Bv' => 'b', 'T' => 1600000000, 'Flag' => true, 'G' => 'x/y z',
        ]));

        // The later member wins a shared label, greedy labels keep "/", and
        // an unknown label expands to nothing.
        $this->assertSame(
            'http://foo.com/b/b/2020-09-13T12%3A26%3A40Z/true/x/y%20z//end',
            $result[1]
        );
    }

    public function testXmlBodyMatchesLegacy(): void
    {
        $result = $this->serialize($this->service('rest-xml'), 'Plain', [
            'Body1' => 'x', 'Body2' => ['A' => 'a', 'N' => 2],
        ]);

        $this->assertSame(
            "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"
            . "<In><Body1>x</Body1><Body2><A>a</A><N>2</N></Body2></In>\n",
            $result[3]
        );
        $this->assertSame(['96'], $result[2]['Content-Length']);
    }

    public function testPayloadKindsMatchLegacy(): void
    {
        $this->assertSame(['POST', 'http://foo.com/p', [
            'Host' => ['foo.com'],
            'Content-Type' => ['application/octet-stream'],
            'Content-Length' => ['5'],
        ], 'bytes'], $this->serialize($this->service(), 'Blob', ['P' => 'bytes']));

        // rest-json serializes an empty object for an absent structure
        // payload, rest-xml sends no body.
        $this->assertSame('{}', $this->serialize($this->service(), 'Struct', [])[3]);
        $this->assertSame('', $this->serialize($this->service('rest-xml'), 'Struct', [])[3]);
    }

    public function testMissingPayloadMemberStillThrows(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unknown member Nope');
        $this->serialize($this->service(), 'Missing', []);
    }

    public function testNamedHeaderListItemKeepsLegacyException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Header values must be scalar or an array of scalars.');
        $this->serialize($this->service(), 'Plain', ['HNL' => ['a']]);
    }

    /**
     * A list whose member references an unavailable shape must not be
     * resolved while compiling. Legacy resolved the item inside
     * applyHeader()/applyQuery(), so an unused or null header binding
     * produced a request and only a sent value threw.
     */
    public function testUnresolvableListItemDefersToRequestTime(): void
    {
        $api = $this->unresolvableItemService();

        $this->assertSame(
            '{"Good":"g"}',
            $this->serialize($api, 'Op', ['Good' => 'g'])[3],
            'an unused header or query list must not throw'
        );
        $this->assertSame(
            '{"Good":"g"}',
            $this->serialize($api, 'Op', ['Good' => 'g', 'HL' => null])[3],
            'a null header list must not throw'
        );

        // applyQuery() resolves the item before it looks at the value, so a
        // null query list threw on legacy too.
        foreach ([['HL' => ['a']], ['QL' => ['a']], ['QL' => null]] as $args) {
            try {
                $this->serialize($api, 'Op', $args + ['Good' => 'g']);
                $this->fail('expected Shape not found for ' . key($args));
            } catch (\InvalidArgumentException $e) {
                $this->assertSame('Shape not found: Missing', $e->getMessage());
            }
        }
    }

    private function unresolvableItemService(): Service
    {
        return new Service([
            'metadata' => ['protocol' => 'rest-json', 'serviceIdentifier' => 'foo', 'apiVersion' => '2020-01-01'],
            'operations' => ['Op' => [
                'http' => ['method' => 'POST', 'requestUri' => '/x'],
                'input' => ['shape' => 'In'],
            ]],
            'shapes' => [
                'S' => ['type' => 'string'],
                'BadL' => ['type' => 'list', 'member' => ['shape' => 'Missing']],
                'In' => ['type' => 'structure', 'members' => [
                    'Good' => ['shape' => 'S'],
                    'HL' => ['shape' => 'BadL', 'location' => 'header', 'locationName' => 'x-hl'],
                    'QL' => ['shape' => 'BadL', 'location' => 'querystring', 'locationName' => 'ql'],
                ]],
            ],
        ], function () {
            return [];
        });
    }

    public function testInlineShapesCompileWithoutWarnings(): void
    {
        $api = new Service([
            'metadata' => ['protocol' => 'rest-json', 'serviceIdentifier' => 'foo', 'apiVersion' => '2020-01-01'],
            'operations' => ['Inline' => [
                'http' => ['method' => 'POST', 'requestUri' => '/{Id}'],
                'input' => ['shape' => 'In'],
            ]],
            'shapes' => ['In' => ['type' => 'structure', 'members' => [
                'Id' => ['type' => 'string', 'location' => 'uri'],
                'H' => ['type' => 'timestamp', 'location' => 'header'],
                'L' => ['type' => 'list', 'location' => 'header', 'member' => ['type' => 'boolean']],
                'NoMember' => ['type' => 'list', 'location' => 'querystring'],
            ]]],
        ], function () {
            return [];
        });

        $result = $this->withoutWarnings(
            fn () => $this->serialize($api, 'Inline', ['Id' => 'i', 'H' => 0, 'L' => [true]])
        );

        $this->assertSame('http://foo.com/i', $result[1]);
        $this->assertSame(['Thu, 01 Jan 1970 00:00:00 GMT'], $result[2]['H']);
        $this->assertSame(['true'], $result[2]['L']);
    }
}
