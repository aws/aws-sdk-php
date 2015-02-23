<?php
namespace Aws;

use Aws\Api\Service;
use Aws\Credentials\CredentialsInterface;
use Aws\Signature\SignatureInterface;
use GuzzleHttp\Psr7\LazyOpenStream;
use Psr\Http\Message\RequestInterface;

final class Middleware
{
    /**
     * Middleware used to allow a command parameter (e.g., "SourceFile") to
     * be used to specify the source of data for an upload operation.
     *
     * @param Service $api
     * @param string  $bodyParameter
     * @param string  $sourceParameter
     *
     * @return callable
     */
    public static function sourceFile(
        Service $api,
        $bodyParameter = 'Body',
        $sourceParameter = 'SourceFile'
    ) {
        return function (callable $handler) use (
            $api,
            $bodyParameter,
            $sourceParameter
        ) {
            return function (CommandInterface $command) use (
                $handler,
                $api,
                $bodyParameter,
                $sourceParameter
            ) {
                $operation = $api->getOperation($command->getName());
                $source = $command[$sourceParameter];

                if ($source !== null
                    && $operation->getInput()->hasMember($bodyParameter)
                ) {
                    $command[$bodyParameter] = new LazyOpenStream($source, 'r');
                    unset($command[$sourceParameter]);
                }

                return $handler($command);
            };
        };
    }

    /**
     * The provided validator function is a callable that accepts the
     * following positional arguments:
     *
     * - string, name of the operation
     * - Aws\Api\Shape, shape being validated against
     * - array, input data being validated
     *
     * The callable is expected to throw an \InvalidArgumentException when the
     * provided input data does not match the shape.
     *
     * @param Service  $api       API being hit.
     * @param callable $validator Function used to validate input.
     *
     * @return callable
     */
    public static function validation(Service $api, callable $validator)
    {
        return function (callable $handler) use ($api, $validator) {
            return function (CommandInterface $command) use ($api, $validator, $handler) {
                $operation = $api->getOperation($command->getName());
                $validator(
                    $command->getName(),
                    $operation->getInput(),
                    $command->toArray()
                );
                return $handler($command);
            };
        };
    }

    /**
     * Creates a middleware that signs requests for a command.
     *
     * @param CredentialsInterface $creds             Credentials to sign with.
     * @param callable             $signatureFunction Function that accepts a
     *                                                Command object and returns
     *                                                a SignatureInterface.
     *
     * @return callable
     */
    public static function signer(CredentialsInterface $creds, callable $signatureFunction)
    {
        return function (callable $handler) use ($signatureFunction, $creds) {
            return function (CommandInterface $command) use ($handler, $signatureFunction, $creds) {
                $signature = $signatureFunction($command);
                $command->getRequestHandlerStack()->push(
                    self::createSignRequestMiddleware($signature, $creds)
                );
                return $handler($command);
            };
        };
    }

    private static function createSignRequestMiddleware(
        SignatureInterface $signer,
        CredentialsInterface $creds
    ) {
        return function (callable $handler) use ($signer, $creds) {
            return function (RequestInterface $request, array $options) use ($handler, $signer, $creds) {
                $request = $signer->signRequest($request, $creds);
                return $handler($request, $options);
            };
        };
    }
}
