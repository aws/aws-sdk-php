<?php
namespace Aws\Test\EncryptionStreams;

use Aws\Crypto\Cipher\Cbc;
use PHPUnit\Framework\TestCase;

class CbcTest extends TestCase
{
    public function testShouldReportCipherMethodOfCBC()
    {
        $ivString = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $this->assertSame('aes-256-cbc', (new Cbc($ivString))->getOpenSslName());
    }

    public function testShouldReturnInitialIvStringForCurrentIvBeforeUpdate()
    {
        $ivString = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $iv = new Cbc($ivString);

        $this->assertSame($ivString, $iv->getCurrentIv());
    }

    public function testUpdateShouldSetCurrentIvToEndOfCipherBlock()
    {
        $ivLength = openssl_cipher_iv_length('aes-256-cbc');
        $ivString = openssl_random_pseudo_bytes($ivLength);
        $iv = new Cbc($ivString);
        $cipherTextBlock = openssl_random_pseudo_bytes(1024);

        $iv->update($cipherTextBlock);
        $this->assertNotSame($ivString, $iv->getCurrentIv());
        $this->assertSame(
            substr($cipherTextBlock, $ivLength * -1),
            $iv->getCurrentIv()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testShouldThrowWhenIvOfInvalidLengthProvided()
    {
        new Cbc(openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc') + 1));
    }

    public function testShouldSupportSeekingToBeginning()
    {
        $ivString = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $iv = new Cbc($ivString);
        $cipherTextBlock = openssl_random_pseudo_bytes(1024);

        $iv->update($cipherTextBlock);
        $iv->seek(0);
        $this->assertSame($ivString, $iv->getCurrentIv());
    }

    /**
     * @expectedException \LogicException
     */
    public function testShouldThrowWhenNonZeroOffsetProvidedToSeek()
    {
        $ivString = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $iv = new Cbc($ivString);
        $cipherTextBlock = openssl_random_pseudo_bytes(1024);

        $iv->update($cipherTextBlock);
        $iv->seek(1);
    }

    /**
     * @expectedException \LogicException
     */
    public function testShouldThrowWhenSeekCurProvidedToSeek()
    {
        $ivString = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $iv = new Cbc($ivString);
        $cipherTextBlock = openssl_random_pseudo_bytes(1024);

        $iv->update($cipherTextBlock);
        $iv->seek(0, SEEK_CUR);
    }

    /**
     * @expectedException \LogicException
     */
    public function testShouldThrowWhenSeekEndProvidedToSeek()
    {
        $ivString = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $iv = new Cbc($ivString);
        $cipherTextBlock = openssl_random_pseudo_bytes(1024);

        $iv->update($cipherTextBlock);
        $iv->seek(0, SEEK_END);
    }
}
