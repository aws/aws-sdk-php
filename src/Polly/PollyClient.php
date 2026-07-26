<?php
namespace Aws\Polly;

use Aws\Api\Serializer\JsonBody;
use Aws\AwsClient;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7;

/**
 * This client is used to interact with the **Amazon Polly** service.
 * @method \Aws\Result deleteLexicon(array $args = [])
 * @phpstan-method \Aws\Result deleteLexicon(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLexiconAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLexiconAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeVoices(array $args = [])
 * @phpstan-method \Aws\Result describeVoices(array{
 *     Engine?: 'generative'|'long-form'|'neural'|'standard',
 *     LanguageCode?: 'ar-AE'|'arb'|'ca-ES'|'cmn-CN'|'cs-CZ'|'cy-GB'|'da-DK'|'de-AT'|'de-CH'|'de-DE'|'en-AU'|'en-GB'|'en-GB-WLS'|'en-IE'|'en-IN'|'en-NZ'|'en-SG'|'en-US'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'fi-FI'|'fr-BE'|'fr-CA'|'fr-FR'|'hi-IN'|'is-IS'|'it-IT'|'ja-JP'|'ko-KR'|'nb-NO'|'nl-BE'|'nl-NL'|'pl-PL'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'sv-SE'|'tr-TR'|'yue-CN',
 *     IncludeAdditionalLanguageCodes?: bool,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVoicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVoicesAsync(array{
 *     Engine?: 'generative'|'long-form'|'neural'|'standard',
 *     LanguageCode?: 'ar-AE'|'arb'|'ca-ES'|'cmn-CN'|'cs-CZ'|'cy-GB'|'da-DK'|'de-AT'|'de-CH'|'de-DE'|'en-AU'|'en-GB'|'en-GB-WLS'|'en-IE'|'en-IN'|'en-NZ'|'en-SG'|'en-US'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'fi-FI'|'fr-BE'|'fr-CA'|'fr-FR'|'hi-IN'|'is-IS'|'it-IT'|'ja-JP'|'ko-KR'|'nb-NO'|'nl-BE'|'nl-NL'|'pl-PL'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'sv-SE'|'tr-TR'|'yue-CN',
 *     IncludeAdditionalLanguageCodes?: bool,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getLexicon(array $args = [])
 * @phpstan-method \Aws\Result getLexicon(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLexiconAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLexiconAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getSpeechSynthesisTask(array $args = [])
 * @phpstan-method \Aws\Result getSpeechSynthesisTask(array{TaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSpeechSynthesisTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSpeechSynthesisTaskAsync(array{TaskId?: string, ...} $args = [])
 * @method \Aws\Result listLexicons(array $args = [])
 * @phpstan-method \Aws\Result listLexicons(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLexiconsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLexiconsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSpeechSynthesisTasks(array $args = [])
 * @phpstan-method \Aws\Result listSpeechSynthesisTasks(array{MaxResults?: int, NextToken?: string, Status?: 'completed'|'failed'|'inProgress'|'scheduled', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSpeechSynthesisTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSpeechSynthesisTasksAsync(array{MaxResults?: int, NextToken?: string, Status?: 'completed'|'failed'|'inProgress'|'scheduled', ...} $args = [])
 * @method \Aws\Result putLexicon(array $args = [])
 * @phpstan-method \Aws\Result putLexicon(array{Name?: string, Content?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putLexiconAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLexiconAsync(array{Name?: string, Content?: string, ...} $args = [])
 * @method \Aws\Result startSpeechSynthesisTask(array $args = [])
 * @phpstan-method \Aws\Result startSpeechSynthesisTask(array{
 *     Engine?: 'generative'|'long-form'|'neural'|'standard',
 *     LanguageCode?: 'ar-AE'|'arb'|'ca-ES'|'cmn-CN'|'cs-CZ'|'cy-GB'|'da-DK'|'de-AT'|'de-CH'|'de-DE'|'en-AU'|'en-GB'|'en-GB-WLS'|'en-IE'|'en-IN'|'en-NZ'|'en-SG'|'en-US'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'fi-FI'|'fr-BE'|'fr-CA'|'fr-FR'|'hi-IN'|'is-IS'|'it-IT'|'ja-JP'|'ko-KR'|'nb-NO'|'nl-BE'|'nl-NL'|'pl-PL'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'sv-SE'|'tr-TR'|'yue-CN',
 *     LexiconNames?: list<string>,
 *     OutputFormat?: 'alaw'|'json'|'mp3'|'mulaw'|'ogg_opus'|'ogg_vorbis'|'pcm',
 *     OutputS3BucketName?: string,
 *     OutputS3KeyPrefix?: string,
 *     SampleRate?: string,
 *     SnsTopicArn?: string,
 *     SpeechMarkTypes?: list<'sentence'|'ssml'|'viseme'|'word'>,
 *     Text?: string,
 *     TextType?: 'ssml'|'text',
 *     VoiceId?: 'Aditi'|'Adriano'|'Ambre'|'Amy'|'Andres'|'Aria'|'Arlet'|'Arthur'|'Astrid'|'Ayanda'|'Beatrice'|'Bianca'|'Brian'|'Burcu'|'Camila'|'Carla'|'Carmen'|'Celine'|'Chantal'|'Conchita'|'Cristiano'|'Daniel'|'Danielle'|'Dora'|'Elin'|'Emma'|'Enrique'|'Ewa'|'Filiz'|'Florian'|'Gabrielle'|'Geraint'|'Giorgio'|'Gregory'|'Gwyneth'|'Hala'|'Hannah'|'Hans'|'Hiujin'|'Ida'|'Ines'|'Isabelle'|'Ivy'|'Jacek'|'Jan'|'Jasmine'|'Jihye'|'Jitka'|'Joanna'|'Joey'|'Justin'|'Kajal'|'Karl'|'Kazuha'|'Kendra'|'Kevin'|'Kimberly'|'Laura'|'Lea'|'Lennart'|'Liam'|'Lisa'|'Liv'|'Lorenzo'|'Lotte'|'Lucia'|'Lupe'|'Mads'|'Maja'|'Marlene'|'Mathieu'|'Matthew'|'Maxim'|'Mia'|'Miguel'|'Mizuki'|'Naja'|'Niamh'|'Nicole'|'Ola'|'Olivia'|'Pedro'|'Penelope'|'Raveena'|'Remi'|'Ricardo'|'Ruben'|'Russell'|'Ruth'|'Sabrina'|'Salli'|'Seoyeon'|'Sergio'|'Sofie'|'Stephen'|'Suvi'|'Takumi'|'Tatyana'|'Thiago'|'Tiffany'|'Tomoko'|'Vicki'|'Vitoria'|'Zayd'|'Zeina'|'Zhiyu',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSpeechSynthesisTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSpeechSynthesisTaskAsync(array{
 *     Engine?: 'generative'|'long-form'|'neural'|'standard',
 *     LanguageCode?: 'ar-AE'|'arb'|'ca-ES'|'cmn-CN'|'cs-CZ'|'cy-GB'|'da-DK'|'de-AT'|'de-CH'|'de-DE'|'en-AU'|'en-GB'|'en-GB-WLS'|'en-IE'|'en-IN'|'en-NZ'|'en-SG'|'en-US'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'fi-FI'|'fr-BE'|'fr-CA'|'fr-FR'|'hi-IN'|'is-IS'|'it-IT'|'ja-JP'|'ko-KR'|'nb-NO'|'nl-BE'|'nl-NL'|'pl-PL'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'sv-SE'|'tr-TR'|'yue-CN',
 *     LexiconNames?: list<string>,
 *     OutputFormat?: 'alaw'|'json'|'mp3'|'mulaw'|'ogg_opus'|'ogg_vorbis'|'pcm',
 *     OutputS3BucketName?: string,
 *     OutputS3KeyPrefix?: string,
 *     SampleRate?: string,
 *     SnsTopicArn?: string,
 *     SpeechMarkTypes?: list<'sentence'|'ssml'|'viseme'|'word'>,
 *     Text?: string,
 *     TextType?: 'ssml'|'text',
 *     VoiceId?: 'Aditi'|'Adriano'|'Ambre'|'Amy'|'Andres'|'Aria'|'Arlet'|'Arthur'|'Astrid'|'Ayanda'|'Beatrice'|'Bianca'|'Brian'|'Burcu'|'Camila'|'Carla'|'Carmen'|'Celine'|'Chantal'|'Conchita'|'Cristiano'|'Daniel'|'Danielle'|'Dora'|'Elin'|'Emma'|'Enrique'|'Ewa'|'Filiz'|'Florian'|'Gabrielle'|'Geraint'|'Giorgio'|'Gregory'|'Gwyneth'|'Hala'|'Hannah'|'Hans'|'Hiujin'|'Ida'|'Ines'|'Isabelle'|'Ivy'|'Jacek'|'Jan'|'Jasmine'|'Jihye'|'Jitka'|'Joanna'|'Joey'|'Justin'|'Kajal'|'Karl'|'Kazuha'|'Kendra'|'Kevin'|'Kimberly'|'Laura'|'Lea'|'Lennart'|'Liam'|'Lisa'|'Liv'|'Lorenzo'|'Lotte'|'Lucia'|'Lupe'|'Mads'|'Maja'|'Marlene'|'Mathieu'|'Matthew'|'Maxim'|'Mia'|'Miguel'|'Mizuki'|'Naja'|'Niamh'|'Nicole'|'Ola'|'Olivia'|'Pedro'|'Penelope'|'Raveena'|'Remi'|'Ricardo'|'Ruben'|'Russell'|'Ruth'|'Sabrina'|'Salli'|'Seoyeon'|'Sergio'|'Sofie'|'Stephen'|'Suvi'|'Takumi'|'Tatyana'|'Thiago'|'Tiffany'|'Tomoko'|'Vicki'|'Vitoria'|'Zayd'|'Zeina'|'Zhiyu',
 *     ...,
 * } $args = [])
 * @method \Aws\Result synthesizeSpeech(array $args = [])
 * @phpstan-method \Aws\Result synthesizeSpeech(array{
 *     Engine?: 'generative'|'long-form'|'neural'|'standard',
 *     LanguageCode?: 'ar-AE'|'arb'|'ca-ES'|'cmn-CN'|'cs-CZ'|'cy-GB'|'da-DK'|'de-AT'|'de-CH'|'de-DE'|'en-AU'|'en-GB'|'en-GB-WLS'|'en-IE'|'en-IN'|'en-NZ'|'en-SG'|'en-US'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'fi-FI'|'fr-BE'|'fr-CA'|'fr-FR'|'hi-IN'|'is-IS'|'it-IT'|'ja-JP'|'ko-KR'|'nb-NO'|'nl-BE'|'nl-NL'|'pl-PL'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'sv-SE'|'tr-TR'|'yue-CN',
 *     LexiconNames?: list<string>,
 *     OutputFormat?: 'alaw'|'json'|'mp3'|'mulaw'|'ogg_opus'|'ogg_vorbis'|'pcm',
 *     SampleRate?: string,
 *     SpeechMarkTypes?: list<'sentence'|'ssml'|'viseme'|'word'>,
 *     Text?: string,
 *     TextType?: 'ssml'|'text',
 *     VoiceId?: 'Aditi'|'Adriano'|'Ambre'|'Amy'|'Andres'|'Aria'|'Arlet'|'Arthur'|'Astrid'|'Ayanda'|'Beatrice'|'Bianca'|'Brian'|'Burcu'|'Camila'|'Carla'|'Carmen'|'Celine'|'Chantal'|'Conchita'|'Cristiano'|'Daniel'|'Danielle'|'Dora'|'Elin'|'Emma'|'Enrique'|'Ewa'|'Filiz'|'Florian'|'Gabrielle'|'Geraint'|'Giorgio'|'Gregory'|'Gwyneth'|'Hala'|'Hannah'|'Hans'|'Hiujin'|'Ida'|'Ines'|'Isabelle'|'Ivy'|'Jacek'|'Jan'|'Jasmine'|'Jihye'|'Jitka'|'Joanna'|'Joey'|'Justin'|'Kajal'|'Karl'|'Kazuha'|'Kendra'|'Kevin'|'Kimberly'|'Laura'|'Lea'|'Lennart'|'Liam'|'Lisa'|'Liv'|'Lorenzo'|'Lotte'|'Lucia'|'Lupe'|'Mads'|'Maja'|'Marlene'|'Mathieu'|'Matthew'|'Maxim'|'Mia'|'Miguel'|'Mizuki'|'Naja'|'Niamh'|'Nicole'|'Ola'|'Olivia'|'Pedro'|'Penelope'|'Raveena'|'Remi'|'Ricardo'|'Ruben'|'Russell'|'Ruth'|'Sabrina'|'Salli'|'Seoyeon'|'Sergio'|'Sofie'|'Stephen'|'Suvi'|'Takumi'|'Tatyana'|'Thiago'|'Tiffany'|'Tomoko'|'Vicki'|'Vitoria'|'Zayd'|'Zeina'|'Zhiyu',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise synthesizeSpeechAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise synthesizeSpeechAsync(array{
 *     Engine?: 'generative'|'long-form'|'neural'|'standard',
 *     LanguageCode?: 'ar-AE'|'arb'|'ca-ES'|'cmn-CN'|'cs-CZ'|'cy-GB'|'da-DK'|'de-AT'|'de-CH'|'de-DE'|'en-AU'|'en-GB'|'en-GB-WLS'|'en-IE'|'en-IN'|'en-NZ'|'en-SG'|'en-US'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'fi-FI'|'fr-BE'|'fr-CA'|'fr-FR'|'hi-IN'|'is-IS'|'it-IT'|'ja-JP'|'ko-KR'|'nb-NO'|'nl-BE'|'nl-NL'|'pl-PL'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'sv-SE'|'tr-TR'|'yue-CN',
 *     LexiconNames?: list<string>,
 *     OutputFormat?: 'alaw'|'json'|'mp3'|'mulaw'|'ogg_opus'|'ogg_vorbis'|'pcm',
 *     SampleRate?: string,
 *     SpeechMarkTypes?: list<'sentence'|'ssml'|'viseme'|'word'>,
 *     Text?: string,
 *     TextType?: 'ssml'|'text',
 *     VoiceId?: 'Aditi'|'Adriano'|'Ambre'|'Amy'|'Andres'|'Aria'|'Arlet'|'Arthur'|'Astrid'|'Ayanda'|'Beatrice'|'Bianca'|'Brian'|'Burcu'|'Camila'|'Carla'|'Carmen'|'Celine'|'Chantal'|'Conchita'|'Cristiano'|'Daniel'|'Danielle'|'Dora'|'Elin'|'Emma'|'Enrique'|'Ewa'|'Filiz'|'Florian'|'Gabrielle'|'Geraint'|'Giorgio'|'Gregory'|'Gwyneth'|'Hala'|'Hannah'|'Hans'|'Hiujin'|'Ida'|'Ines'|'Isabelle'|'Ivy'|'Jacek'|'Jan'|'Jasmine'|'Jihye'|'Jitka'|'Joanna'|'Joey'|'Justin'|'Kajal'|'Karl'|'Kazuha'|'Kendra'|'Kevin'|'Kimberly'|'Laura'|'Lea'|'Lennart'|'Liam'|'Lisa'|'Liv'|'Lorenzo'|'Lotte'|'Lucia'|'Lupe'|'Mads'|'Maja'|'Marlene'|'Mathieu'|'Matthew'|'Maxim'|'Mia'|'Miguel'|'Mizuki'|'Naja'|'Niamh'|'Nicole'|'Ola'|'Olivia'|'Pedro'|'Penelope'|'Raveena'|'Remi'|'Ricardo'|'Ruben'|'Russell'|'Ruth'|'Sabrina'|'Salli'|'Seoyeon'|'Sergio'|'Sofie'|'Stephen'|'Suvi'|'Takumi'|'Tatyana'|'Thiago'|'Tiffany'|'Tomoko'|'Vicki'|'Vitoria'|'Zayd'|'Zeina'|'Zhiyu',
 *     ...,
 * } $args = [])
 */
class PollyClient extends AwsClient
{
    /** @var JsonBody */
    private $formatter;

    /**
     * Create a pre-signed URL for Polly operation `SynthesizeSpeech`
     *
     * @param array $args parameters array for `SynthesizeSpeech`
     *                    More information @see Aws\Polly\PollyClient::SynthesizeSpeech
     *
     * @return string
     */
    public function createSynthesizeSpeechPreSignedUrl(array $args)
    {
        $uri = new Uri($this->getEndpoint());
        $uri = $uri->withPath('/v1/speech');

        // Formatting parameters follows rest-json protocol
        $this->formatter = $this->formatter ?: new JsonBody($this->getApi());
        $queryArray = json_decode(
            $this->formatter->build(
                $this->getApi()->getOperation('SynthesizeSpeech')->getInput(),
                $args
            ),
            true
        );

        // Mocking a 'GET' request in pre-signing the Url
        $query = Psr7\Query::build($queryArray);
        $uri = $uri->withQuery($query);

        $request = new Request('GET', $uri);
        $request = $request->withBody(Psr7\Utils::streamFor(''));
        $signer = new SignatureV4('polly', $this->getRegion());
        return (string) $signer->presign(
            $request,
            $this->getCredentials()->wait(),
            '+15 minutes'
        )->getUri();
    }
}
