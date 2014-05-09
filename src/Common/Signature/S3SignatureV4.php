<?php
namespace Aws\Common\Signature;

use Aws\Common\Credentials\CredentialsInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Stream;

/**
 * Amazon S3 signature version 4 support.
 */
class S3SignatureV4 extends SignatureV4 implements PresignedUrlInterface
{
    public function createPresignedUrl(
        RequestInterface $request,
        CredentialsInterface $credentials,
        $expires
    ) {
        $request = clone $request;
        $region = $this->getRegionName();
        $service = $this->getServiceName();

        // Make sure to handle temporary credentials
        if ($token = $credentials->getSecurityToken()) {
            $request->setHeader('X-Amz-Security-Token', $token);
            $request->getQuery()->set('X-Amz-Security-Token', $token);
        }

        $this->moveHeadersToQuery($request);
        $httpDate = $request->getQuery()->get('X-Amz-Date');
        $scopeDate = substr($httpDate, 0, 8);
        $scope = "{$scopeDate}/{$region}/s3/aws4_request";
        $credential = $credentials->getAccessKeyId() . '/' . $scope;

        $this->addQueryStringValues(
            $request,
            $credential,
            $this->convertExpires($expires)
        );

        $context = $this->createContext($request, 'UNSIGNED-PAYLOAD');

        $signingKey = $this->getSigningKey(
            $scopeDate,
            $region,
            $service,
            $credentials->getSecretKey()
        );

        $stringToSign = "AWS4-HMAC-SHA256\n{$httpDate}\n{$scope}\n"
            . hash('sha256', $context['creq']);

        $request->getQuery()->set(
            'X-Amz-Signature',
            hash_hmac('sha256', $stringToSign, $signingKey)
        );

        return $request->getUrl();
    }

    protected function getPayloadHash(RequestInterface $request)
    {
        $hash = $request->getBody()
            ? Stream\hash($request->getBody(), 'sha256')
            : self::EMPTY_PAYLOAD;
        $request->setHeader('X-Amz-Content-Sha256', $hash);

        return $hash;
    }

    private function convertExpires($expires)
    {
        if ($expires instanceof \DateTime) {
            $expires = $expires->getTimestamp();
        } elseif (!is_numeric($expires)) {
            $expires = strtotime($expires);
        }

        $duration = $expires - time();

        // Ensure that the duration of the signature is not longer than a week
        if ($duration > 604800) {
            throw new \InvalidArgumentException('The expiration date of an '
                . 'Amazon S3 presigned URL using signature version 4 must be '
                . 'less than one week.');
        }

        return $duration;
    }

    private function moveHeadersToQuery(RequestInterface $request)
    {
        $query = ['X-Amz-Date' => gmdate('Ymd\THis\Z', time())];

        foreach ($request->getHeaders() as $name => $header) {
            if (strcasecmp(substr($name, 0, 5), 'x-amz')) {
                $query[$name] = implode(',' , $header);
            }
            if (strcasecmp($name, 'host')) {
                $request->removeHeader($name);
            }
        }

        $request->getQuery()->overwriteWith($query);
    }

    private function addQueryStringValues(
        RequestInterface $request,
        $credential,
        $expires
    ) {
        // Set query params required for pre-signed URLs
        $request->getQuery()
            ->set('X-Amz-Algorithm', 'AWS4-HMAC-SHA256')
            ->set('X-Amz-Credential', $credential)
            ->set('X-Amz-SignedHeaders', 'Host')
            ->set('X-Amz-Expires', $expires);
    }
}
