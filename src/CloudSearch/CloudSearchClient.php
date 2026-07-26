<?php
namespace Aws\CloudSearch;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudSearch** service.
 *
 * @method \Aws\Result buildSuggesters(array $args = [])
 * @phpstan-method \Aws\Result buildSuggesters(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise buildSuggestersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise buildSuggestersAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result createDomain(array $args = [])
 * @phpstan-method \Aws\Result createDomain(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result defineAnalysisScheme(array $args = [])
 * @phpstan-method \Aws\Result defineAnalysisScheme(array{
 *     DomainName?: string,
 *     AnalysisScheme?: array{
 *         AnalysisSchemeName?: string,
 *         AnalysisSchemeLanguage?: 'ar'|'bg'|'ca'|'cs'|'da'|'de'|'el'|'en'|'es'|'eu'|'fa'|'fi'|'fr'|'ga'|'gl'|'he'|'hi'|'hu'|'hy'|'id'|'it'|'ja'|'ko'|'lv'|'mul'|'nl'|'no'|'pt'|'ro'|'ru'|'sv'|'th'|'tr'|'zh-Hans'|'zh-Hant',
 *         AnalysisOptions?: array{
 *             Synonyms?: string,
 *             Stopwords?: string,
 *             StemmingDictionary?: string,
 *             JapaneseTokenizationDictionary?: string,
 *             AlgorithmicStemming?: 'full'|'light'|'minimal'|'none',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise defineAnalysisSchemeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise defineAnalysisSchemeAsync(array{
 *     DomainName?: string,
 *     AnalysisScheme?: array{
 *         AnalysisSchemeName?: string,
 *         AnalysisSchemeLanguage?: 'ar'|'bg'|'ca'|'cs'|'da'|'de'|'el'|'en'|'es'|'eu'|'fa'|'fi'|'fr'|'ga'|'gl'|'he'|'hi'|'hu'|'hy'|'id'|'it'|'ja'|'ko'|'lv'|'mul'|'nl'|'no'|'pt'|'ro'|'ru'|'sv'|'th'|'tr'|'zh-Hans'|'zh-Hant',
 *         AnalysisOptions?: array{
 *             Synonyms?: string,
 *             Stopwords?: string,
 *             StemmingDictionary?: string,
 *             JapaneseTokenizationDictionary?: string,
 *             AlgorithmicStemming?: 'full'|'light'|'minimal'|'none',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result defineExpression(array $args = [])
 * @phpstan-method \Aws\Result defineExpression(array{DomainName?: string, Expression?: array{ExpressionName?: string, ExpressionValue?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise defineExpressionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise defineExpressionAsync(array{DomainName?: string, Expression?: array{ExpressionName?: string, ExpressionValue?: string, ...}, ...} $args = [])
 * @method \Aws\Result defineIndexField(array $args = [])
 * @phpstan-method \Aws\Result defineIndexField(array{
 *     DomainName?: string,
 *     IndexField?: array{
 *         IndexFieldName?: string,
 *         IndexFieldType?: 'date'|'date-array'|'double'|'double-array'|'int'|'int-array'|'latlon'|'literal'|'literal-array'|'text'|'text-array',
 *         IntOptions?: array{
 *             DefaultValue?: int,
 *             SourceField?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             SortEnabled?: bool,
 *             ...,
 *         },
 *         DoubleOptions?: array{
 *             DefaultValue?: float,
 *             SourceField?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             SortEnabled?: bool,
 *             ...,
 *         },
 *         LiteralOptions?: array{
 *             DefaultValue?: string,
 *             SourceField?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             SortEnabled?: bool,
 *             ...,
 *         },
 *         TextOptions?: array{
 *             DefaultValue?: string,
 *             SourceField?: string,
 *             ReturnEnabled?: bool,
 *             SortEnabled?: bool,
 *             HighlightEnabled?: bool,
 *             AnalysisScheme?: string,
 *             ...,
 *         },
 *         DateOptions?: array{
 *             DefaultValue?: string,
 *             SourceField?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             SortEnabled?: bool,
 *             ...,
 *         },
 *         LatLonOptions?: array{
 *             DefaultValue?: string,
 *             SourceField?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             SortEnabled?: bool,
 *             ...,
 *         },
 *         IntArrayOptions?: array{
 *             DefaultValue?: int,
 *             SourceFields?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             ...,
 *         },
 *         DoubleArrayOptions?: array{
 *             DefaultValue?: float,
 *             SourceFields?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             ...,
 *         },
 *         LiteralArrayOptions?: array{
 *             DefaultValue?: string,
 *             SourceFields?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             ...,
 *         },
 *         TextArrayOptions?: array{
 *             DefaultValue?: string,
 *             SourceFields?: string,
 *             ReturnEnabled?: bool,
 *             HighlightEnabled?: bool,
 *             AnalysisScheme?: string,
 *             ...,
 *         },
 *         DateArrayOptions?: array{
 *             DefaultValue?: string,
 *             SourceFields?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise defineIndexFieldAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise defineIndexFieldAsync(array{
 *     DomainName?: string,
 *     IndexField?: array{
 *         IndexFieldName?: string,
 *         IndexFieldType?: 'date'|'date-array'|'double'|'double-array'|'int'|'int-array'|'latlon'|'literal'|'literal-array'|'text'|'text-array',
 *         IntOptions?: array{
 *             DefaultValue?: int,
 *             SourceField?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             SortEnabled?: bool,
 *             ...,
 *         },
 *         DoubleOptions?: array{
 *             DefaultValue?: float,
 *             SourceField?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             SortEnabled?: bool,
 *             ...,
 *         },
 *         LiteralOptions?: array{
 *             DefaultValue?: string,
 *             SourceField?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             SortEnabled?: bool,
 *             ...,
 *         },
 *         TextOptions?: array{
 *             DefaultValue?: string,
 *             SourceField?: string,
 *             ReturnEnabled?: bool,
 *             SortEnabled?: bool,
 *             HighlightEnabled?: bool,
 *             AnalysisScheme?: string,
 *             ...,
 *         },
 *         DateOptions?: array{
 *             DefaultValue?: string,
 *             SourceField?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             SortEnabled?: bool,
 *             ...,
 *         },
 *         LatLonOptions?: array{
 *             DefaultValue?: string,
 *             SourceField?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             SortEnabled?: bool,
 *             ...,
 *         },
 *         IntArrayOptions?: array{
 *             DefaultValue?: int,
 *             SourceFields?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             ...,
 *         },
 *         DoubleArrayOptions?: array{
 *             DefaultValue?: float,
 *             SourceFields?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             ...,
 *         },
 *         LiteralArrayOptions?: array{
 *             DefaultValue?: string,
 *             SourceFields?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             ...,
 *         },
 *         TextArrayOptions?: array{
 *             DefaultValue?: string,
 *             SourceFields?: string,
 *             ReturnEnabled?: bool,
 *             HighlightEnabled?: bool,
 *             AnalysisScheme?: string,
 *             ...,
 *         },
 *         DateArrayOptions?: array{
 *             DefaultValue?: string,
 *             SourceFields?: string,
 *             FacetEnabled?: bool,
 *             SearchEnabled?: bool,
 *             ReturnEnabled?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result defineSuggester(array $args = [])
 * @phpstan-method \Aws\Result defineSuggester(array{
 *     DomainName?: string,
 *     Suggester?: array{
 *         SuggesterName?: string,
 *         DocumentSuggesterOptions?: array{SourceField?: string, FuzzyMatching?: 'high'|'low'|'none', SortExpression?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise defineSuggesterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise defineSuggesterAsync(array{
 *     DomainName?: string,
 *     Suggester?: array{
 *         SuggesterName?: string,
 *         DocumentSuggesterOptions?: array{SourceField?: string, FuzzyMatching?: 'high'|'low'|'none', SortExpression?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAnalysisScheme(array $args = [])
 * @phpstan-method \Aws\Result deleteAnalysisScheme(array{DomainName?: string, AnalysisSchemeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAnalysisSchemeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAnalysisSchemeAsync(array{DomainName?: string, AnalysisSchemeName?: string, ...} $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteDomain(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteExpression(array $args = [])
 * @phpstan-method \Aws\Result deleteExpression(array{DomainName?: string, ExpressionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExpressionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExpressionAsync(array{DomainName?: string, ExpressionName?: string, ...} $args = [])
 * @method \Aws\Result deleteIndexField(array $args = [])
 * @phpstan-method \Aws\Result deleteIndexField(array{DomainName?: string, IndexFieldName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIndexFieldAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIndexFieldAsync(array{DomainName?: string, IndexFieldName?: string, ...} $args = [])
 * @method \Aws\Result deleteSuggester(array $args = [])
 * @phpstan-method \Aws\Result deleteSuggester(array{DomainName?: string, SuggesterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSuggesterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSuggesterAsync(array{DomainName?: string, SuggesterName?: string, ...} $args = [])
 * @method \Aws\Result describeAnalysisSchemes(array $args = [])
 * @phpstan-method \Aws\Result describeAnalysisSchemes(array{DomainName?: string, AnalysisSchemeNames?: list<string>, Deployed?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAnalysisSchemesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAnalysisSchemesAsync(array{DomainName?: string, AnalysisSchemeNames?: list<string>, Deployed?: bool, ...} $args = [])
 * @method \Aws\Result describeAvailabilityOptions(array $args = [])
 * @phpstan-method \Aws\Result describeAvailabilityOptions(array{DomainName?: string, Deployed?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAvailabilityOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAvailabilityOptionsAsync(array{DomainName?: string, Deployed?: bool, ...} $args = [])
 * @method \Aws\Result describeDomainEndpointOptions(array $args = [])
 * @phpstan-method \Aws\Result describeDomainEndpointOptions(array{DomainName?: string, Deployed?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainEndpointOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainEndpointOptionsAsync(array{DomainName?: string, Deployed?: bool, ...} $args = [])
 * @method \Aws\Result describeDomains(array $args = [])
 * @phpstan-method \Aws\Result describeDomains(array{DomainNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainsAsync(array{DomainNames?: list<string>, ...} $args = [])
 * @method \Aws\Result describeExpressions(array $args = [])
 * @phpstan-method \Aws\Result describeExpressions(array{DomainName?: string, ExpressionNames?: list<string>, Deployed?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExpressionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExpressionsAsync(array{DomainName?: string, ExpressionNames?: list<string>, Deployed?: bool, ...} $args = [])
 * @method \Aws\Result describeIndexFields(array $args = [])
 * @phpstan-method \Aws\Result describeIndexFields(array{DomainName?: string, FieldNames?: list<string>, Deployed?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIndexFieldsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIndexFieldsAsync(array{DomainName?: string, FieldNames?: list<string>, Deployed?: bool, ...} $args = [])
 * @method \Aws\Result describeScalingParameters(array $args = [])
 * @phpstan-method \Aws\Result describeScalingParameters(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScalingParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScalingParametersAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result describeServiceAccessPolicies(array $args = [])
 * @phpstan-method \Aws\Result describeServiceAccessPolicies(array{DomainName?: string, Deployed?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServiceAccessPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServiceAccessPoliciesAsync(array{DomainName?: string, Deployed?: bool, ...} $args = [])
 * @method \Aws\Result describeSuggesters(array $args = [])
 * @phpstan-method \Aws\Result describeSuggesters(array{DomainName?: string, SuggesterNames?: list<string>, Deployed?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSuggestersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSuggestersAsync(array{DomainName?: string, SuggesterNames?: list<string>, Deployed?: bool, ...} $args = [])
 * @method \Aws\Result indexDocuments(array $args = [])
 * @phpstan-method \Aws\Result indexDocuments(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise indexDocumentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise indexDocumentsAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result listDomainNames(array $args = [])
 * @phpstan-method \Aws\Result listDomainNames(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainNamesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainNamesAsync(array{...} $args = [])
 * @method \Aws\Result updateAvailabilityOptions(array $args = [])
 * @phpstan-method \Aws\Result updateAvailabilityOptions(array{DomainName?: string, MultiAZ?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAvailabilityOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAvailabilityOptionsAsync(array{DomainName?: string, MultiAZ?: bool, ...} $args = [])
 * @method \Aws\Result updateDomainEndpointOptions(array $args = [])
 * @phpstan-method \Aws\Result updateDomainEndpointOptions(array{
 *     DomainName?: string,
 *     DomainEndpointOptions?: array{EnforceHTTPS?: bool, TLSSecurityPolicy?: 'Policy-Min-TLS-1-0-2019-07'|'Policy-Min-TLS-1-2-2019-07', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainEndpointOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainEndpointOptionsAsync(array{
 *     DomainName?: string,
 *     DomainEndpointOptions?: array{EnforceHTTPS?: bool, TLSSecurityPolicy?: 'Policy-Min-TLS-1-0-2019-07'|'Policy-Min-TLS-1-2-2019-07', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateScalingParameters(array $args = [])
 * @phpstan-method \Aws\Result updateScalingParameters(array{
 *     DomainName?: string,
 *     ScalingParameters?: array{
 *         DesiredInstanceType?: 'search.2xlarge'|'search.large'|'search.m1.large'|'search.m1.small'|'search.m2.2xlarge'|'search.m2.xlarge'|'search.m3.2xlarge'|'search.m3.large'|'search.m3.medium'|'search.m3.xlarge'|'search.medium'|'search.previousgeneration.2xlarge'|'search.previousgeneration.large'|'search.previousgeneration.small'|'search.previousgeneration.xlarge'|'search.small'|'search.xlarge',
 *         DesiredReplicationCount?: int,
 *         DesiredPartitionCount?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScalingParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScalingParametersAsync(array{
 *     DomainName?: string,
 *     ScalingParameters?: array{
 *         DesiredInstanceType?: 'search.2xlarge'|'search.large'|'search.m1.large'|'search.m1.small'|'search.m2.2xlarge'|'search.m2.xlarge'|'search.m3.2xlarge'|'search.m3.large'|'search.m3.medium'|'search.m3.xlarge'|'search.medium'|'search.previousgeneration.2xlarge'|'search.previousgeneration.large'|'search.previousgeneration.small'|'search.previousgeneration.xlarge'|'search.small'|'search.xlarge',
 *         DesiredReplicationCount?: int,
 *         DesiredPartitionCount?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServiceAccessPolicies(array $args = [])
 * @phpstan-method \Aws\Result updateServiceAccessPolicies(array{DomainName?: string, AccessPolicies?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceAccessPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceAccessPoliciesAsync(array{DomainName?: string, AccessPolicies?: string, ...} $args = [])
 */
class CloudSearchClient extends AwsClient {}
