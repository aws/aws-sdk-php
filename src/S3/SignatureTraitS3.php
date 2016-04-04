<?php
namespace Aws\S3;

use Aws\Signature\SignatureTrait;

/**
 * Provides signature calculation for SignatureV4.
 */
trait SignatureTraitS3
{
    use  SignatureTrait;
}
