<?php
namespace Aws\TranscribeService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Transcribe Service** service.
 * @method \Aws\Result createCallAnalyticsCategory(array $args = [])
 * @phpstan-method \Aws\Result createCallAnalyticsCategory(array{
 *     CategoryName?: string,
 *     Rules?: list<array{
 *         NonTalkTimeFilter?: array,
 *         InterruptionFilter?: array,
 *         TranscriptFilter?: array,
 *         SentimentFilter?: array,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     InputType?: 'POST_CALL'|'REAL_TIME',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCallAnalyticsCategoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCallAnalyticsCategoryAsync(array{
 *     CategoryName?: string,
 *     Rules?: list<array{
 *         NonTalkTimeFilter?: array,
 *         InterruptionFilter?: array,
 *         TranscriptFilter?: array,
 *         SentimentFilter?: array,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     InputType?: 'POST_CALL'|'REAL_TIME',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLanguageModel(array $args = [])
 * @phpstan-method \Aws\Result createLanguageModel(array{
 *     LanguageCode?: 'de-DE'|'en-AU'|'en-GB'|'en-US'|'es-US'|'hi-IN'|'ja-JP',
 *     BaseModelName?: 'NarrowBand'|'WideBand',
 *     ModelName?: string,
 *     InputDataConfig?: array{S3Uri?: string, TuningDataS3Uri?: string, DataAccessRoleArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLanguageModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLanguageModelAsync(array{
 *     LanguageCode?: 'de-DE'|'en-AU'|'en-GB'|'en-US'|'es-US'|'hi-IN'|'ja-JP',
 *     BaseModelName?: 'NarrowBand'|'WideBand',
 *     ModelName?: string,
 *     InputDataConfig?: array{S3Uri?: string, TuningDataS3Uri?: string, DataAccessRoleArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMedicalVocabulary(array $args = [])
 * @phpstan-method \Aws\Result createMedicalVocabulary(array{
 *     VocabularyName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     VocabularyFileUri?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMedicalVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMedicalVocabularyAsync(array{
 *     VocabularyName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     VocabularyFileUri?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVocabulary(array $args = [])
 * @phpstan-method \Aws\Result createVocabulary(array{
 *     VocabularyName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     Phrases?: list<string>,
 *     VocabularyFileUri?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DataAccessRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVocabularyAsync(array{
 *     VocabularyName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     Phrases?: list<string>,
 *     VocabularyFileUri?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DataAccessRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVocabularyFilter(array $args = [])
 * @phpstan-method \Aws\Result createVocabularyFilter(array{
 *     VocabularyFilterName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     Words?: list<string>,
 *     VocabularyFilterFileUri?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DataAccessRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVocabularyFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVocabularyFilterAsync(array{
 *     VocabularyFilterName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     Words?: list<string>,
 *     VocabularyFilterFileUri?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DataAccessRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCallAnalyticsCategory(array $args = [])
 * @phpstan-method \Aws\Result deleteCallAnalyticsCategory(array{CategoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCallAnalyticsCategoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCallAnalyticsCategoryAsync(array{CategoryName?: string, ...} $args = [])
 * @method \Aws\Result deleteCallAnalyticsJob(array $args = [])
 * @phpstan-method \Aws\Result deleteCallAnalyticsJob(array{CallAnalyticsJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCallAnalyticsJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCallAnalyticsJobAsync(array{CallAnalyticsJobName?: string, ...} $args = [])
 * @method \Aws\Result deleteLanguageModel(array $args = [])
 * @phpstan-method \Aws\Result deleteLanguageModel(array{ModelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLanguageModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLanguageModelAsync(array{ModelName?: string, ...} $args = [])
 * @method \Aws\Result deleteMedicalScribeJob(array $args = [])
 * @phpstan-method \Aws\Result deleteMedicalScribeJob(array{MedicalScribeJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMedicalScribeJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMedicalScribeJobAsync(array{MedicalScribeJobName?: string, ...} $args = [])
 * @method \Aws\Result deleteMedicalTranscriptionJob(array $args = [])
 * @phpstan-method \Aws\Result deleteMedicalTranscriptionJob(array{MedicalTranscriptionJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMedicalTranscriptionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMedicalTranscriptionJobAsync(array{MedicalTranscriptionJobName?: string, ...} $args = [])
 * @method \Aws\Result deleteMedicalVocabulary(array $args = [])
 * @phpstan-method \Aws\Result deleteMedicalVocabulary(array{VocabularyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMedicalVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMedicalVocabularyAsync(array{VocabularyName?: string, ...} $args = [])
 * @method \Aws\Result deleteTranscriptionJob(array $args = [])
 * @phpstan-method \Aws\Result deleteTranscriptionJob(array{TranscriptionJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTranscriptionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTranscriptionJobAsync(array{TranscriptionJobName?: string, ...} $args = [])
 * @method \Aws\Result deleteVocabulary(array $args = [])
 * @phpstan-method \Aws\Result deleteVocabulary(array{VocabularyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVocabularyAsync(array{VocabularyName?: string, ...} $args = [])
 * @method \Aws\Result deleteVocabularyFilter(array $args = [])
 * @phpstan-method \Aws\Result deleteVocabularyFilter(array{VocabularyFilterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVocabularyFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVocabularyFilterAsync(array{VocabularyFilterName?: string, ...} $args = [])
 * @method \Aws\Result describeLanguageModel(array $args = [])
 * @phpstan-method \Aws\Result describeLanguageModel(array{ModelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLanguageModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLanguageModelAsync(array{ModelName?: string, ...} $args = [])
 * @method \Aws\Result getCallAnalyticsCategory(array $args = [])
 * @phpstan-method \Aws\Result getCallAnalyticsCategory(array{CategoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCallAnalyticsCategoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCallAnalyticsCategoryAsync(array{CategoryName?: string, ...} $args = [])
 * @method \Aws\Result getCallAnalyticsJob(array $args = [])
 * @phpstan-method \Aws\Result getCallAnalyticsJob(array{CallAnalyticsJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCallAnalyticsJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCallAnalyticsJobAsync(array{CallAnalyticsJobName?: string, ...} $args = [])
 * @method \Aws\Result getMedicalScribeJob(array $args = [])
 * @phpstan-method \Aws\Result getMedicalScribeJob(array{MedicalScribeJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMedicalScribeJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMedicalScribeJobAsync(array{MedicalScribeJobName?: string, ...} $args = [])
 * @method \Aws\Result getMedicalTranscriptionJob(array $args = [])
 * @phpstan-method \Aws\Result getMedicalTranscriptionJob(array{MedicalTranscriptionJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMedicalTranscriptionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMedicalTranscriptionJobAsync(array{MedicalTranscriptionJobName?: string, ...} $args = [])
 * @method \Aws\Result getMedicalVocabulary(array $args = [])
 * @phpstan-method \Aws\Result getMedicalVocabulary(array{VocabularyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMedicalVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMedicalVocabularyAsync(array{VocabularyName?: string, ...} $args = [])
 * @method \Aws\Result getTranscriptionJob(array $args = [])
 * @phpstan-method \Aws\Result getTranscriptionJob(array{TranscriptionJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTranscriptionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTranscriptionJobAsync(array{TranscriptionJobName?: string, ...} $args = [])
 * @method \Aws\Result getVocabulary(array $args = [])
 * @phpstan-method \Aws\Result getVocabulary(array{VocabularyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVocabularyAsync(array{VocabularyName?: string, ...} $args = [])
 * @method \Aws\Result getVocabularyFilter(array $args = [])
 * @phpstan-method \Aws\Result getVocabularyFilter(array{VocabularyFilterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVocabularyFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVocabularyFilterAsync(array{VocabularyFilterName?: string, ...} $args = [])
 * @method \Aws\Result listCallAnalyticsCategories(array $args = [])
 * @phpstan-method \Aws\Result listCallAnalyticsCategories(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCallAnalyticsCategoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCallAnalyticsCategoriesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listCallAnalyticsJobs(array $args = [])
 * @phpstan-method \Aws\Result listCallAnalyticsJobs(array{
 *     Status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'QUEUED',
 *     JobNameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCallAnalyticsJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCallAnalyticsJobsAsync(array{
 *     Status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'QUEUED',
 *     JobNameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLanguageModels(array $args = [])
 * @phpstan-method \Aws\Result listLanguageModels(array{
 *     StatusEquals?: 'COMPLETED'|'FAILED'|'IN_PROGRESS',
 *     NameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLanguageModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLanguageModelsAsync(array{
 *     StatusEquals?: 'COMPLETED'|'FAILED'|'IN_PROGRESS',
 *     NameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMedicalScribeJobs(array $args = [])
 * @phpstan-method \Aws\Result listMedicalScribeJobs(array{
 *     Status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'QUEUED',
 *     JobNameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMedicalScribeJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMedicalScribeJobsAsync(array{
 *     Status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'QUEUED',
 *     JobNameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMedicalTranscriptionJobs(array $args = [])
 * @phpstan-method \Aws\Result listMedicalTranscriptionJobs(array{
 *     Status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'QUEUED',
 *     JobNameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMedicalTranscriptionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMedicalTranscriptionJobsAsync(array{
 *     Status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'QUEUED',
 *     JobNameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMedicalVocabularies(array $args = [])
 * @phpstan-method \Aws\Result listMedicalVocabularies(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StateEquals?: 'FAILED'|'PENDING'|'READY',
 *     NameContains?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMedicalVocabulariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMedicalVocabulariesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StateEquals?: 'FAILED'|'PENDING'|'READY',
 *     NameContains?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTranscriptionJobs(array $args = [])
 * @phpstan-method \Aws\Result listTranscriptionJobs(array{
 *     Status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'QUEUED',
 *     JobNameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTranscriptionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTranscriptionJobsAsync(array{
 *     Status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'QUEUED',
 *     JobNameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listVocabularies(array $args = [])
 * @phpstan-method \Aws\Result listVocabularies(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StateEquals?: 'FAILED'|'PENDING'|'READY',
 *     NameContains?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listVocabulariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVocabulariesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StateEquals?: 'FAILED'|'PENDING'|'READY',
 *     NameContains?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listVocabularyFilters(array $args = [])
 * @phpstan-method \Aws\Result listVocabularyFilters(array{NextToken?: string, MaxResults?: int, NameContains?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVocabularyFiltersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVocabularyFiltersAsync(array{NextToken?: string, MaxResults?: int, NameContains?: string, ...} $args = [])
 * @method \Aws\Result startCallAnalyticsJob(array $args = [])
 * @phpstan-method \Aws\Result startCallAnalyticsJob(array{
 *     CallAnalyticsJobName?: string,
 *     Media?: array{MediaFileUri?: string, RedactedMediaFileUri?: string, ...},
 *     OutputLocation?: string,
 *     OutputEncryptionKMSKeyId?: string,
 *     DataAccessRoleArn?: string,
 *     Settings?: array{
 *         VocabularyName?: string,
 *         VocabularyFilterName?: string,
 *         VocabularyFilterMethod?: 'mask'|'remove'|'tag',
 *         LanguageModelName?: string,
 *         ContentRedaction?: array{
 *             RedactionType?: 'PII',
 *             RedactionOutput?: 'redacted'|'redacted_and_unredacted',
 *             PiiEntityTypes?: list<'ADDRESS'|'ALL'|'BANK_ACCOUNT_NUMBER'|'BANK_ROUTING'|'CREDIT_DEBIT_CVV'|'CREDIT_DEBIT_EXPIRY'|'CREDIT_DEBIT_NUMBER'|'EMAIL'|'NAME'|'PHONE'|'PIN'|'SSN'>,
 *             ...,
 *         },
 *         LanguageOptions?: list<'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA'>,
 *         LanguageIdSettings?: array<string, array>,
 *         Summarization?: array{GenerateAbstractiveSummary?: bool, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ChannelDefinitions?: list<array{ChannelId?: int, ParticipantRole?: 'AGENT'|'CUSTOMER', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCallAnalyticsJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCallAnalyticsJobAsync(array{
 *     CallAnalyticsJobName?: string,
 *     Media?: array{MediaFileUri?: string, RedactedMediaFileUri?: string, ...},
 *     OutputLocation?: string,
 *     OutputEncryptionKMSKeyId?: string,
 *     DataAccessRoleArn?: string,
 *     Settings?: array{
 *         VocabularyName?: string,
 *         VocabularyFilterName?: string,
 *         VocabularyFilterMethod?: 'mask'|'remove'|'tag',
 *         LanguageModelName?: string,
 *         ContentRedaction?: array{
 *             RedactionType?: 'PII',
 *             RedactionOutput?: 'redacted'|'redacted_and_unredacted',
 *             PiiEntityTypes?: list<'ADDRESS'|'ALL'|'BANK_ACCOUNT_NUMBER'|'BANK_ROUTING'|'CREDIT_DEBIT_CVV'|'CREDIT_DEBIT_EXPIRY'|'CREDIT_DEBIT_NUMBER'|'EMAIL'|'NAME'|'PHONE'|'PIN'|'SSN'>,
 *             ...,
 *         },
 *         LanguageOptions?: list<'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA'>,
 *         LanguageIdSettings?: array<string, array>,
 *         Summarization?: array{GenerateAbstractiveSummary?: bool, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ChannelDefinitions?: list<array{ChannelId?: int, ParticipantRole?: 'AGENT'|'CUSTOMER', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMedicalScribeJob(array $args = [])
 * @phpstan-method \Aws\Result startMedicalScribeJob(array{
 *     MedicalScribeJobName?: string,
 *     Media?: array{MediaFileUri?: string, RedactedMediaFileUri?: string, ...},
 *     OutputBucketName?: string,
 *     OutputEncryptionKMSKeyId?: string,
 *     KMSEncryptionContext?: array<string, string>,
 *     DataAccessRoleArn?: string,
 *     Settings?: array{
 *         ShowSpeakerLabels?: bool,
 *         MaxSpeakerLabels?: int,
 *         ChannelIdentification?: bool,
 *         VocabularyName?: string,
 *         VocabularyFilterName?: string,
 *         VocabularyFilterMethod?: 'mask'|'remove'|'tag',
 *         ClinicalNoteGenerationSettings?: array{
 *             NoteTemplate?: 'BEHAVIORAL_SOAP'|'BIRP'|'DAP'|'GIRPP'|'HISTORY_AND_PHYSICAL'|'PHYSICAL_SOAP'|'SIRP',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ChannelDefinitions?: list<array{ChannelId?: int, ParticipantRole?: 'CLINICIAN'|'PATIENT', ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MedicalScribeContext?: array{PatientContext?: array{Pronouns?: 'HE_HIM'|'SHE_HER'|'THEY_THEM', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMedicalScribeJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMedicalScribeJobAsync(array{
 *     MedicalScribeJobName?: string,
 *     Media?: array{MediaFileUri?: string, RedactedMediaFileUri?: string, ...},
 *     OutputBucketName?: string,
 *     OutputEncryptionKMSKeyId?: string,
 *     KMSEncryptionContext?: array<string, string>,
 *     DataAccessRoleArn?: string,
 *     Settings?: array{
 *         ShowSpeakerLabels?: bool,
 *         MaxSpeakerLabels?: int,
 *         ChannelIdentification?: bool,
 *         VocabularyName?: string,
 *         VocabularyFilterName?: string,
 *         VocabularyFilterMethod?: 'mask'|'remove'|'tag',
 *         ClinicalNoteGenerationSettings?: array{
 *             NoteTemplate?: 'BEHAVIORAL_SOAP'|'BIRP'|'DAP'|'GIRPP'|'HISTORY_AND_PHYSICAL'|'PHYSICAL_SOAP'|'SIRP',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ChannelDefinitions?: list<array{ChannelId?: int, ParticipantRole?: 'CLINICIAN'|'PATIENT', ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MedicalScribeContext?: array{PatientContext?: array{Pronouns?: 'HE_HIM'|'SHE_HER'|'THEY_THEM', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMedicalTranscriptionJob(array $args = [])
 * @phpstan-method \Aws\Result startMedicalTranscriptionJob(array{
 *     MedicalTranscriptionJobName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     MediaSampleRateHertz?: int,
 *     MediaFormat?: 'amr'|'flac'|'m4a'|'mp3'|'mp4'|'ogg'|'wav'|'webm',
 *     Media?: array{MediaFileUri?: string, RedactedMediaFileUri?: string, ...},
 *     OutputBucketName?: string,
 *     OutputKey?: string,
 *     OutputEncryptionKMSKeyId?: string,
 *     KMSEncryptionContext?: array<string, string>,
 *     Settings?: array{
 *         ShowSpeakerLabels?: bool,
 *         MaxSpeakerLabels?: int,
 *         ChannelIdentification?: bool,
 *         ShowAlternatives?: bool,
 *         MaxAlternatives?: int,
 *         VocabularyName?: string,
 *         ...,
 *     },
 *     ContentIdentificationType?: 'PHI',
 *     Specialty?: 'PRIMARYCARE',
 *     Type?: 'CONVERSATION'|'DICTATION',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMedicalTranscriptionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMedicalTranscriptionJobAsync(array{
 *     MedicalTranscriptionJobName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     MediaSampleRateHertz?: int,
 *     MediaFormat?: 'amr'|'flac'|'m4a'|'mp3'|'mp4'|'ogg'|'wav'|'webm',
 *     Media?: array{MediaFileUri?: string, RedactedMediaFileUri?: string, ...},
 *     OutputBucketName?: string,
 *     OutputKey?: string,
 *     OutputEncryptionKMSKeyId?: string,
 *     KMSEncryptionContext?: array<string, string>,
 *     Settings?: array{
 *         ShowSpeakerLabels?: bool,
 *         MaxSpeakerLabels?: int,
 *         ChannelIdentification?: bool,
 *         ShowAlternatives?: bool,
 *         MaxAlternatives?: int,
 *         VocabularyName?: string,
 *         ...,
 *     },
 *     ContentIdentificationType?: 'PHI',
 *     Specialty?: 'PRIMARYCARE',
 *     Type?: 'CONVERSATION'|'DICTATION',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTranscriptionJob(array $args = [])
 * @phpstan-method \Aws\Result startTranscriptionJob(array{
 *     TranscriptionJobName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     MediaSampleRateHertz?: int,
 *     MediaFormat?: 'amr'|'flac'|'m4a'|'mp3'|'mp4'|'ogg'|'wav'|'webm',
 *     Media?: array{MediaFileUri?: string, RedactedMediaFileUri?: string, ...},
 *     OutputBucketName?: string,
 *     OutputKey?: string,
 *     OutputEncryptionKMSKeyId?: string,
 *     KMSEncryptionContext?: array<string, string>,
 *     Settings?: array{
 *         VocabularyName?: string,
 *         ShowSpeakerLabels?: bool,
 *         MaxSpeakerLabels?: int,
 *         ChannelIdentification?: bool,
 *         ShowAlternatives?: bool,
 *         MaxAlternatives?: int,
 *         VocabularyFilterName?: string,
 *         VocabularyFilterMethod?: 'mask'|'remove'|'tag',
 *         ...,
 *     },
 *     ModelSettings?: array{LanguageModelName?: string, ...},
 *     JobExecutionSettings?: array{AllowDeferredExecution?: bool, DataAccessRoleArn?: string, ...},
 *     ContentRedaction?: array{
 *         RedactionType?: 'PII',
 *         RedactionOutput?: 'redacted'|'redacted_and_unredacted',
 *         PiiEntityTypes?: list<'ADDRESS'|'ALL'|'BANK_ACCOUNT_NUMBER'|'BANK_ROUTING'|'CREDIT_DEBIT_CVV'|'CREDIT_DEBIT_EXPIRY'|'CREDIT_DEBIT_NUMBER'|'EMAIL'|'NAME'|'PHONE'|'PIN'|'SSN'>,
 *         ...,
 *     },
 *     IdentifyLanguage?: bool,
 *     IdentifyMultipleLanguages?: bool,
 *     LanguageOptions?: list<'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA'>,
 *     Subtitles?: array{Formats?: list<'srt'|'vtt'>, OutputStartIndex?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     LanguageIdSettings?: array<string, array{VocabularyName?: string, VocabularyFilterName?: string, LanguageModelName?: string, ...}>,
 *     ToxicityDetection?: list<array{ToxicityCategories?: list<'ALL'>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTranscriptionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTranscriptionJobAsync(array{
 *     TranscriptionJobName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     MediaSampleRateHertz?: int,
 *     MediaFormat?: 'amr'|'flac'|'m4a'|'mp3'|'mp4'|'ogg'|'wav'|'webm',
 *     Media?: array{MediaFileUri?: string, RedactedMediaFileUri?: string, ...},
 *     OutputBucketName?: string,
 *     OutputKey?: string,
 *     OutputEncryptionKMSKeyId?: string,
 *     KMSEncryptionContext?: array<string, string>,
 *     Settings?: array{
 *         VocabularyName?: string,
 *         ShowSpeakerLabels?: bool,
 *         MaxSpeakerLabels?: int,
 *         ChannelIdentification?: bool,
 *         ShowAlternatives?: bool,
 *         MaxAlternatives?: int,
 *         VocabularyFilterName?: string,
 *         VocabularyFilterMethod?: 'mask'|'remove'|'tag',
 *         ...,
 *     },
 *     ModelSettings?: array{LanguageModelName?: string, ...},
 *     JobExecutionSettings?: array{AllowDeferredExecution?: bool, DataAccessRoleArn?: string, ...},
 *     ContentRedaction?: array{
 *         RedactionType?: 'PII',
 *         RedactionOutput?: 'redacted'|'redacted_and_unredacted',
 *         PiiEntityTypes?: list<'ADDRESS'|'ALL'|'BANK_ACCOUNT_NUMBER'|'BANK_ROUTING'|'CREDIT_DEBIT_CVV'|'CREDIT_DEBIT_EXPIRY'|'CREDIT_DEBIT_NUMBER'|'EMAIL'|'NAME'|'PHONE'|'PIN'|'SSN'>,
 *         ...,
 *     },
 *     IdentifyLanguage?: bool,
 *     IdentifyMultipleLanguages?: bool,
 *     LanguageOptions?: list<'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA'>,
 *     Subtitles?: array{Formats?: list<'srt'|'vtt'>, OutputStartIndex?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     LanguageIdSettings?: array<string, array{VocabularyName?: string, VocabularyFilterName?: string, LanguageModelName?: string, ...}>,
 *     ToxicityDetection?: list<array{ToxicityCategories?: list<'ALL'>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCallAnalyticsCategory(array $args = [])
 * @phpstan-method \Aws\Result updateCallAnalyticsCategory(array{
 *     CategoryName?: string,
 *     Rules?: list<array{
 *         NonTalkTimeFilter?: array,
 *         InterruptionFilter?: array,
 *         TranscriptFilter?: array,
 *         SentimentFilter?: array,
 *         ...,
 *     }>,
 *     InputType?: 'POST_CALL'|'REAL_TIME',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCallAnalyticsCategoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCallAnalyticsCategoryAsync(array{
 *     CategoryName?: string,
 *     Rules?: list<array{
 *         NonTalkTimeFilter?: array,
 *         InterruptionFilter?: array,
 *         TranscriptFilter?: array,
 *         SentimentFilter?: array,
 *         ...,
 *     }>,
 *     InputType?: 'POST_CALL'|'REAL_TIME',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMedicalVocabulary(array $args = [])
 * @phpstan-method \Aws\Result updateMedicalVocabulary(array{
 *     VocabularyName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     VocabularyFileUri?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMedicalVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMedicalVocabularyAsync(array{
 *     VocabularyName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     VocabularyFileUri?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVocabulary(array $args = [])
 * @phpstan-method \Aws\Result updateVocabulary(array{
 *     VocabularyName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     Phrases?: list<string>,
 *     VocabularyFileUri?: string,
 *     DataAccessRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVocabularyAsync(array{
 *     VocabularyName?: string,
 *     LanguageCode?: 'ab-GE'|'af-ZA'|'am-ET'|'ar-AE'|'ar-SA'|'ast-ES'|'az-AZ'|'ba-RU'|'be-BY'|'bg-BG'|'bn-IN'|'bs-BA'|'ca-ES'|'ckb-IQ'|'ckb-IR'|'cs-CZ'|'cy-GB'|'cy-WL'|'da-DK'|'de-CH'|'de-DE'|'el-GR'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-MX'|'es-US'|'et-EE'|'et-ET'|'eu-ES'|'fa-AF'|'fa-IR'|'fi-FI'|'fr-CA'|'fr-FR'|'ga-IE'|'gd-GB'|'gl-ES'|'gu-IN'|'ha-NG'|'he-IL'|'hi-IN'|'hr-HR'|'ht-HT'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-IT'|'ja-JP'|'jv-ID'|'ka-GE'|'kab-DZ'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'ky-KG'|'lg-IN'|'lt-LT'|'lv-LV'|'mhr-RU'|'mi-NZ'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'mt-MT'|'my-MM'|'ne-NP'|'nl-NL'|'no-NO'|'or-IN'|'pa-IN'|'pl-PL'|'ps-AF'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'so-SO'|'sq-AL'|'sr-RS'|'su-ID'|'sv-SE'|'sw-BI'|'sw-KE'|'sw-RW'|'sw-TZ'|'sw-UG'|'ta-IN'|'te-IN'|'th-TH'|'tl-PH'|'tr-TR'|'tt-RU'|'ug-CN'|'uk-UA'|'uz-UZ'|'vi-VN'|'wo-SN'|'zh-CN'|'zh-HK'|'zh-TW'|'zu-ZA',
 *     Phrases?: list<string>,
 *     VocabularyFileUri?: string,
 *     DataAccessRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVocabularyFilter(array $args = [])
 * @phpstan-method \Aws\Result updateVocabularyFilter(array{
 *     VocabularyFilterName?: string,
 *     Words?: list<string>,
 *     VocabularyFilterFileUri?: string,
 *     DataAccessRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVocabularyFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVocabularyFilterAsync(array{
 *     VocabularyFilterName?: string,
 *     Words?: list<string>,
 *     VocabularyFilterFileUri?: string,
 *     DataAccessRoleArn?: string,
 *     ...,
 * } $args = [])
 */
class TranscribeServiceClient extends AwsClient {}
