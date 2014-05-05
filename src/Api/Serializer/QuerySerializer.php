<?php
namespace Aws\Api\Serializer;

use Aws\Api\Service;
use Aws\Api\StructureShape;
use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Shape;
use Aws\Api\TimestampShape;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Serializes a query protocol request.
 * @internal
 */
class QuerySerializer implements SubscriberInterface
{
    private $endpoint;
    private $api;

    public function __construct(Service $api, $endpoint)
    {
        $this->api = $api;
        $this->endpoint = $endpoint;
    }

    public function getEvents()
    {
        return ['prepare' => ['onPrepare']];
    }

    public function onPrepare(PrepareEvent $event)
    {
        /** @var \Aws\AwsCommandInterface $command */
        $command = $event->getCommand();
        $api = $command->getApi();
        $operation = $api->getOperation($command->getName());

        $body = [
            'Action'  => $command->getName(),
            'Version' => $api->getMetadata('apiVersion')
        ];

        if ($params = $command->toArray()) {
            $this->format($operation->getInput(), $params, '', $body);
        }

        $request = $event->getClient()->getHttpClient()->createRequest(
            'POST',
            $this->endpoint,
            [
                'body'   => $body,
                'config' => ['command' => $command]
            ]
        );

        $event->setRequest($request);
    }

    private function format(Shape $shape, $value, $prefix, array &$query)
    {
        static $methods = [
            'format_structure' => true,
            'format_list'      => true,
            'format_map'       => true,
            'format_blob'      => true,
            'format_timestamp' => true
        ];

        $type = 'format_' . $shape['type'];
        if (isset($methods[$type])) {
            $this->{$type}($shape, $value, $prefix, $query);
        } else {
            $query[$prefix] = $value;
        }
    }

    private function format_structure(
        StructureShape $shape,
        array $value,
        $prefix,
        &$query
    ) {
        foreach ($value as $k => $v) {
            $member = $shape->getMember($k);
            $memberPrefix = $member['queryName'] ?: $k;
            if ($prefix) {
                $memberPrefix = $prefix . '.' . $memberPrefix;
            }
            $this->format($member, $v, $memberPrefix, $query);
        }
    }

    private function format_list(
        ListShape $shape,
        array $value,
        $prefix,
        &$query
    ) {
        $items = $shape->getMember();

        if (!$shape['flattened']) {
            $prefix .= '.member';
        } elseif ($queryName = $items['queryName']) {
            $parts = explode('.', $prefix);
            array_pop($parts);
            $parts[] = $queryName;
            $prefix = implode('.', $parts);
        }

        foreach ($value as $k => $v) {
            $this->format($items, $v, $prefix . '.' . ($k + 1), $query);
        }
    }

    private function format_map(
        MapShape $shape,
        array $value,
        $prefix,
        array &$query
    ) {
        $vals = $shape->getValue();
        $keys = $shape->getKey();

        if (!$shape['flattened']) {
            $prefix .= '.entry';
        }

        $kp = isset($keys['queryName']) ? $keys['queryName'] : 'key';
        $vp = isset($vals['queryName']) ? $vals['queryName'] : 'value';
        $i = 0;

        foreach ($value as $k => $v) {
            $lead = $prefix . '.' . (++$i) . '.';
            $this->format($keys, $k, $lead . $kp, $query);
            $this->format($vals, $v, $lead . $vp, $query);
        }
    }

    private function format_blob(Shape $shape, $value, $prefix, array &$query)
    {
        $query[$prefix] = base64_encode($value);
    }

    private function format_timestamp(
        TimestampShape $shape,
        $value,
        $prefix,
        array &$query
    ) {
        $query[$prefix] = $shape->format(
            $value,
            $this->api->getMetadata('timestampFormat')
        );
    }
}
