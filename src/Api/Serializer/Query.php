<?php

namespace Aws\Api\Serializer;

use Aws\Api\Model;
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
class Query implements SubscriberInterface
{
    private $endpoint;
    private $api;

    public function __construct(
        $endpoint,
        Model $api
    ) {
        $this->endpoint = $endpoint;
        $this->api = $api;
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

        $params = $command->toArray();
        if ($params && ($input = $operation['input'])) {
            $this->format($input, $params, '', $body);
        }

        $request = $event->getClient()->getHttpClient()->createRequest(
            'POST',
            $this->endpoint,
            ['body' => $body]
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
            $memberPrefix = $member->getMetadata('xmlName') ?: $k;
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

        if (!$shape->getMetadata('flattened')) {
            $prefix .= '.member';
        } elseif ($locationName = $items->getMetadata('xmlName')) {
            $parts = explode('.', $prefix);
            array_pop($parts);
            $parts[] = $locationName;
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

        if (!$shape->getMetadata('flattened')) {
            $prefix .= '.entry';
        }

        $kp = isset($keys['xmlName']) ? $keys['xmlName'] : 'key';
        $vp = isset($vals['xmlName']) ? $vals['xmlName'] : 'value';

        foreach ($value as $k => $v) {
            $lead = $prefix . '.' . ($k + 1) . '.';
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
