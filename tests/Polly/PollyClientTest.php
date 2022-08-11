<?php
namespace Aws\Test\Polly;

use Aws\Credentials\Credentials;
use Aws\Polly\PollyClient;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Polly\PollyClient
 */
class PollyClientTest extends TestCase
{
    public function testCanGeneratePreSignedUrlForSynthesizeSpeech()
    {
        $polly = new PollyClient([
            'region' => 'us-west-2',
            'version' => 'latest',
            'credentials' => new Credentials('akid', 'secret')
        ]);
        $args = [
            'LexiconNames' => ['mno', 'abc'],
            'OutputFormat' => 'mp3',
            'SampleRate' => '128',
            'Text' => 'Hello World',
            'TextType' => 'text',
            'VoiceId' => 'Ewa'
        ];
        $url = $polly->createSynthesizeSpeechPreSignedUrl($args);
        $this->assertStringContainsString('https://polly.us-west-2.amazonaws.com/v1/speech', $url);
        $this->assertStringContainsString('LexiconNames=mno&LexiconNames=abc', $url);
        $this->assertStringContainsString('OutputFormat=mp3', $url);
        $this->assertStringContainsString('SampleRate=128', $url);
        $this->assertStringContainsString('Text=Hello%20World', $url);
        $this->assertStringContainsString('TextType=text', $url);
        $this->assertStringContainsString('VoiceId=Ewa', $url);
        $this->assertStringContainsString('X-Amz-Algorithm=AWS4-HMAC-SHA256', $url);
        $this->assertStringContainsString('X-Amz-Credential=akid', $url);
        $this->assertStringContainsString('X-Amz-Date=', $url);
        $this->assertStringContainsString('X-Amz-Expires=900', $url);
        $this->assertStringContainsString('X-Amz-SignedHeaders=host', $url);
        $this->assertStringContainsString('X-Amz-Signature=', $url);
        $this->assertStringContainsString('X-Amz-Date=', $url);
    }
}
