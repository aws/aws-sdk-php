<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\Cipher\Cbc;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\CachingStream;

trait AesEncryptionStreamTestTrait
{
    public function cartesianJoinInputCipherMethodProvider()
    {
        $toReturn = [];
        $plainTexts = $this->unwrapProvider([$this, 'plainTextProvider']);
        $ivs = $this->unwrapProvider([$this, 'cipherMethodProvider']);

        for ($i = 0; $i < count($plainTexts); $i++) {
            for ($j = 0; $j < count($ivs); $j++) {
                $toReturn []= [$plainTexts[$i], clone $ivs[$j]];
            }
        }

        return $toReturn;
    }

    public function cartesianJoinInputKeySizeProvider()
    {
        $toReturn = [];
        $plainTexts = $this->unwrapProvider([$this, 'plainTextProvider']);
        $keySizes = $this->unwrapProvider([$this, 'keySizeProvider']);

        for ($i = 0; $i < count($plainTexts); $i++) {
            for ($j = 0; $j < count($keySizes); $j++) {
                $toReturn []= [
                    $plainTexts[$i],
                    $keySizes[$j],
                ];
            }
        }

        return $toReturn;
    }

    public function cipherMethodProvider()
    {
        $toReturn = [];
        foreach ($this->unwrapProvider([$this, 'keySizeProvider']) as $keySize) {
            $toReturn []= [new Cbc(
                openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')),
                $keySize
            )];
        }

        return $toReturn;
    }

    public function seekableCipherMethodProvider()
    {
        return array_filter($this->cipherMethodProvider(), function (array $args) {
            return !($args[0] instanceof Cbc);
        });
    }

    public function keySizeProvider()
    {
        return [
            [128],
            [192],
            [256],
        ];
    }

    public function plainTextProvider()
    {
        return [
            [Psr7\stream_for('The rain in Spain falls mainly on the plain.')],
            [Psr7\stream_for('دست‌نوشته‌ها نمی‌سوزند')],
            [Psr7\stream_for('Рукописи не горят')],
            [new CachingStream(new RandomByteStream(2 * 1024 * 1024 + 11))]
        ];
    }

    private function unwrapProvider(callable $provider)
    {
        return array_map(function (array $wrapped) {
            return $wrapped[0];
        }, call_user_func($provider));
    }
}
