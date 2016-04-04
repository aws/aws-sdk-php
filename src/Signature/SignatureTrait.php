<?php
namespace Aws\Signature;

/**
 * Provides signature calculation for SignatureV4.
 */
trait SignatureTrait
{
    public function getSignatureV4(
        $stringToSign,
        $shortDate,
        $region,
        $service,
        $secretKey
    ) {
        return hash_hmac(
            'sha256',
            $stringToSign,
            $this->getSigningKeyV4(
                $shortDate,
                $region,
                $service,
                $secretKey
            )
        );
    }

    private function getSigningKeyV4($shortDate, $region, $service, $secretKey)
    {
        $dateKey = hash_hmac('sha256', $shortDate, "AWS4{$secretKey}", true);
        $regionKey = hash_hmac('sha256', $region, $dateKey, true);
        $serviceKey = hash_hmac('sha256', $service, $regionKey, true);

        return hash_hmac('sha256', 'aws4_request', $serviceKey, true);
    }
}
