<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\Cipher\Cbc;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\CachingStream;

trait AesEncryptionStreamTestTrait
{
    public function cartesianJoinInputCipherMethodProvider(): array
    {
        $toReturn = [];
        $plainTexts = self::unwrapProvider([__CLASS__, 'plainTextProvider']);
        $ivs = self::unwrapProvider([__CLASS__, 'cipherMethodProvider']);

        for ($i = 0; $i < count($plainTexts); $i++) {
            for ($j = 0; $j < count($ivs); $j++) {
                $toReturn []= [$plainTexts[$i], clone $ivs[$j]];
            }
        }

        return $toReturn;
    }

    public static function cartesianJoinInputKeySizeProvider(): array
    {
        $toReturn = [];
        $plainTexts = self::unwrapProvider([__CLASS__, 'plainTextProvider']);
        $keySizes = self::unwrapProvider([__CLASS__, 'keySizeProvider']);

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

    public static function cipherMethodProvider(): array
    {
        $toReturn = [];
        foreach (self::unwrapProvider([__CLASS__, 'keySizeProvider']) as $keySize) {
            $toReturn []= [new Cbc(
                openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')),
                $keySize
            )];
        }

        return $toReturn;
    }

    public static function seekableCipherMethodProvider(): array
    {
        $data = array_filter(self::cipherMethodProvider(), function (array $args) {
            return !($args[0] instanceof Cbc);
        });

        if (empty($data)) {
            return [
                'empty_data' => [null, true]
            ];
        }

        return array_map(function ($entry) {
            return [$entry[0], false];
        }, $data);
    }

    public static function keySizeProvider(): array
    {
        return [
            [128],
            [192],
            [256],
        ];
    }

    public static function plainTextProvider(): array
    {
        return [
            [Psr7\Utils::streamFor('The rain in Spain falls mainly on the plain.')],
            [Psr7\Utils::streamFor('دست‌نوشته‌ها نمی‌سوزند')],
            [Psr7\Utils::streamFor('Рукописи не горят')],
            [new CachingStream(new RandomByteStream(2 * 1024 * 1024 + 11))]
        ];
    }

    private static function unwrapProvider(callable $provider): array
    {
        return array_map(function (array $wrapped) {
            return $wrapped[0];
        }, call_user_func($provider));
    }
}
