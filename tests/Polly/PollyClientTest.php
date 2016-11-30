<?php
namespace Aws\Test\Polly;

use Aws\Credentials\Credentials;
use Aws\Polly\PollyClient;

/**
 * @covers Aws\Polly\PollyClient
 */
class PollyClientTest extends \PHPUnit_Framework_TestCase
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
        $this->assertContains('https://polly.us-west-2.amazonaws.com/v1/speech', $url);
        $this->assertContains('LexiconNames=mno&LexiconNames=abc', $url);
        $this->assertContains('OutputFormat=mp3', $url);
        $this->assertContains('SampleRate=128', $url);
        $this->assertContains('Text=Hello%20World', $url);
        $this->assertContains('TextType=text', $url);
        $this->assertContains('VoiceId=Ewa', $url);
        $this->assertContains('X-Amz-Algorithm=AWS4-HMAC-SHA256', $url);
        $this->assertContains('X-Amz-Credential=akid', $url);
        $this->assertContains('X-Amz-Date=', $url);
        $this->assertContains('X-Amz-Expires=900', $url);
        $this->assertContains('X-Amz-SignedHeaders=host', $url);
        $this->assertContains('X-Amz-Signature=', $url);
        $this->assertContains('X-Amz-Date=', $url);
    }
}
