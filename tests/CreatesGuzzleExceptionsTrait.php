<?php
namespace Aws\Test;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ResponseException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

trait CreatesGuzzleExceptionsTrait
{
    private static function createRequestException(
        string $message,
        RequestInterface $request,
        ?ResponseInterface $response = null
    ): RequestException {
        if ($response !== null && class_exists(ResponseException::class)) {
            return new ResponseException($message, $request, $response);
        }

        if ($response === null) {
            return new RequestException($message, $request);
        }

        return new RequestException($message, $request, $response);
    }
}
