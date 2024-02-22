<?php

namespace Aws\IMDS;

use Aws\Sdk;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;


trait Ec2MetadataTrait
{
    /**
     * @param string $url
     * @param string $path
     * @param array $headers
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function doPutRequest($url, $path, $headers) {
        return $this->doRequest('PUT', $url, $path, $headers);
    }

    /**
     * @param string $url
     * @param string $path
     * @param array $headers
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function doGetRequest($url, $path, $headers) {
        return $this->doRequest('GET', $url, $path, $headers);
    }

    /**
     * @param string $method
     * @param string $url
     * @param string $path
     * @param array $headers
     * @return ResponseInterface
     * @throws GuzzleException
     */
    private function doRequest($method, $url, $path, $headers) {
        try {
            $request = new Request($method, $this->buildRequestURI($url, $path));
            $headers = array_merge($headers ?? [], $this->defaultHeaders());
            foreach ($headers as $key => $value) {
                $request->withHeader($key, $value);
            }

            $client = new Client();
            $reqOptions = [
                'timeout' => $this->config->httpConfigAttr(Ec2MetadataConfig::HTTP_READ_TIMEOUT_KEY),
                'connect_timeout' => $this->config->httpConfigAttr(Ec2MetadataConfig::HTTP_OPEN_TIMEOUT_KEY),
            ];

            return $client->send($request, $reqOptions);
        } catch (RequestException $e) {
            return $e->getResponse();
        }
    }

    /**
     * @return string[]
     */
    private function defaultHeaders() {
        return [
            'User-Agent' => 'aws-sdk-php/' . Sdk::VERSION
        ];
    }

    /**
     * @param string $url
     * @param string $path
     * @return string
     */
    private function buildRequestURI($url, $path) {
        return $url . $path;
    }
}
