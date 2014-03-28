<?php

namespace Aws\Api\Serializer;

use Aws\Api\Service;
use Aws\Api\Operation;
use Aws\Api\Shape;
use Aws\Api\StructureShape;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Url;
use GuzzleHttp\Stream;

/**
 * Serializes HTTP locations like header, uri, payload, etc...
 * @internal
 */
abstract class RestSerializer implements SubscriberInterface
{
    /** @var Service */
    private $api;

    /** @var Url */
    private $endpoint;

    /**
     * @param string $endpoint Endpoint to connect to
     * @param Service  $api      Service API description
     */
    public function __construct($endpoint, Service $api)
    {
        $this->api = $api;
        $this->endpoint = Url::fromString($endpoint);
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
        $args = $command->toArray();

        $request = $event->getClient()->getHttpClient()->createRequest(
            $operation['http']['method'],
            $this->buildEndpoint($operation, $args),
            ['config' => ['command' => $command]]
        );

        $this->serialize($request, $operation, $args);
        $event->setRequest($request);
    }

    /**
     * Creates payload body for a request.
     *
     * @param Operation      $operation  Operation
     * @param string         $memberName Member name
     * @param StructureShape $member     Member
     * @param array          $args       Command arguments
     *
     * @return \GuzzleHttp\Stream\StreamInterface
     */
    abstract protected function payload(
        Operation $operation,
        $memberName,
        StructureShape $member,
        array $args
    );

    /**
     * Creates a body for the request using an associative array of members.
     *
     * @param Operation $operation
     * @param array     $bodyMembers
     *
     * @return \GuzzleHttp\Stream\StreamInterface
     */
    abstract protected function structBody(
        Operation $operation,
        array $bodyMembers
    );

    private function serialize(
        RequestInterface $request,
        Operation $operation,
        array $args
    ) {
        $body = [];
        foreach ($operation->getInput()->getMembers() as $name => $member) {
            $location = $member['location'];
            if (!$location) {
                if (!$member['payload']) {
                    $body[$name] = $member;
                } elseif ($member['streaming'] ||
                    ($member['type'] == 'string' || $member['type'] == 'blob')
                ) {
                    // Streaming bodies or payloads that are strings are
                    // always just a stream of data.
                    if (isset($args[$name])) {
                        $request->setBody(Stream\create($args[$name]));
                    }
                } else {
                    $request->setBody(Stream\create(
                        $this->payload($operation, $name, $member, $args)
                    ));
                }
            } elseif ($location == 'header') {
                $this->applyHeader($request, $name, $member, $args);
            } elseif ($location == 'query') {
                $this->applyQuery($request, $name, $member, $args);
            }
        }

        $body && $request->setBody(Stream\create(
            $this->structBody($request, $operation, $body)
        ));
    }

    private function applyHeader(
        RequestInterface $request,
        $memberName,
        Shape $member,
        array $args
    ) {
        if (isset($args[$memberName])) {
            $request->setHeader(
                $member['locationName'] ?: $memberName,
                $args[$memberName]
            );
        }
    }

    private function applyQuery(
        RequestInterface $request,
        $memberName,
        Shape $member,
        array $args
    ) {
        if (isset($args[$memberName])) {
            $request->getQuery()->set(
                $member['locationName'] ?: $memberName,
                $args[$memberName]
            );
        }
    }

    /**
     * Builds the URI template for a REST based request.
     *
     * @param Operation $operation
     * @param array     $args
     *
     * @return array
     */
    private function buildEndpoint(Operation $operation, array $args)
    {
        $uri = $this->endpoint->combine($operation['http']['requestUri']);
        $varspecs = [];

        foreach ($operation->getInput()->getMembers() as $name => $member) {
            if ($member['location'] == 'uri') {
                $varspecs[$member['locationName'] ?: $name] =
                    isset($args[$name]) ? $args[$name] : null;
            }
        }

        return [$uri, $varspecs];
    }
}
