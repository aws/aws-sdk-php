<?php
namespace Aws\AmplifyUIBuilder;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Amplify UI Builder** service.
 * @method \Aws\Result createComponent(array $args = [])
 * @phpstan-method \Aws\Result createComponent(array{
 *     appId?: string,
 *     environmentName?: string,
 *     clientToken?: string,
 *     componentToCreate?: array{
 *         name?: string,
 *         sourceId?: string,
 *         componentType?: string,
 *         properties?: array<string, array>,
 *         children?: list<array>,
 *         variants?: list<array>,
 *         overrides?: array<string, array<string, string>>,
 *         bindingProperties?: array<string, array>,
 *         collectionProperties?: array<string, array>,
 *         tags?: array<string, string>,
 *         events?: array<string, array>,
 *         schemaVersion?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createComponentAsync(array{
 *     appId?: string,
 *     environmentName?: string,
 *     clientToken?: string,
 *     componentToCreate?: array{
 *         name?: string,
 *         sourceId?: string,
 *         componentType?: string,
 *         properties?: array<string, array>,
 *         children?: list<array>,
 *         variants?: list<array>,
 *         overrides?: array<string, array<string, string>>,
 *         bindingProperties?: array<string, array>,
 *         collectionProperties?: array<string, array>,
 *         tags?: array<string, string>,
 *         events?: array<string, array>,
 *         schemaVersion?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createForm(array $args = [])
 * @phpstan-method \Aws\Result createForm(array{
 *     appId?: string,
 *     environmentName?: string,
 *     clientToken?: string,
 *     formToCreate?: array{
 *         name?: string,
 *         dataType?: array{dataSourceType?: 'Custom'|'DataStore', dataTypeName?: string, ...},
 *         formActionType?: 'create'|'update',
 *         fields?: array<string, array>,
 *         style?: array{horizontalGap?: array, verticalGap?: array, outerPadding?: array, ...},
 *         sectionalElements?: array<string, array>,
 *         schemaVersion?: string,
 *         cta?: array{position?: 'bottom'|'top'|'top_and_bottom', clear?: array, cancel?: array, submit?: array, ...},
 *         tags?: array<string, string>,
 *         labelDecorator?: 'none'|'optional'|'required',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFormAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFormAsync(array{
 *     appId?: string,
 *     environmentName?: string,
 *     clientToken?: string,
 *     formToCreate?: array{
 *         name?: string,
 *         dataType?: array{dataSourceType?: 'Custom'|'DataStore', dataTypeName?: string, ...},
 *         formActionType?: 'create'|'update',
 *         fields?: array<string, array>,
 *         style?: array{horizontalGap?: array, verticalGap?: array, outerPadding?: array, ...},
 *         sectionalElements?: array<string, array>,
 *         schemaVersion?: string,
 *         cta?: array{position?: 'bottom'|'top'|'top_and_bottom', clear?: array, cancel?: array, submit?: array, ...},
 *         tags?: array<string, string>,
 *         labelDecorator?: 'none'|'optional'|'required',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTheme(array $args = [])
 * @phpstan-method \Aws\Result createTheme(array{
 *     appId?: string,
 *     environmentName?: string,
 *     clientToken?: string,
 *     themeToCreate?: array{name?: string, values?: list<array>, overrides?: list<array>, tags?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createThemeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createThemeAsync(array{
 *     appId?: string,
 *     environmentName?: string,
 *     clientToken?: string,
 *     themeToCreate?: array{name?: string, values?: list<array>, overrides?: list<array>, tags?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteComponent(array $args = [])
 * @phpstan-method \Aws\Result deleteComponent(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteComponentAsync(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result deleteForm(array $args = [])
 * @phpstan-method \Aws\Result deleteForm(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFormAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFormAsync(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result deleteTheme(array $args = [])
 * @phpstan-method \Aws\Result deleteTheme(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteThemeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteThemeAsync(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result exchangeCodeForToken(array $args = [])
 * @phpstan-method \Aws\Result exchangeCodeForToken(array{provider?: 'figma', request?: array{code?: string, redirectUri?: string, clientId?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exchangeCodeForTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exchangeCodeForTokenAsync(array{provider?: 'figma', request?: array{code?: string, redirectUri?: string, clientId?: string, ...}, ...} $args = [])
 * @method \Aws\Result exportComponents(array $args = [])
 * @phpstan-method \Aws\Result exportComponents(array{appId?: string, environmentName?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportComponentsAsync(array{appId?: string, environmentName?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result exportForms(array $args = [])
 * @phpstan-method \Aws\Result exportForms(array{appId?: string, environmentName?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportFormsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportFormsAsync(array{appId?: string, environmentName?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result exportThemes(array $args = [])
 * @phpstan-method \Aws\Result exportThemes(array{appId?: string, environmentName?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportThemesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportThemesAsync(array{appId?: string, environmentName?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getCodegenJob(array $args = [])
 * @phpstan-method \Aws\Result getCodegenJob(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCodegenJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCodegenJobAsync(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result getComponent(array $args = [])
 * @phpstan-method \Aws\Result getComponent(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComponentAsync(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result getForm(array $args = [])
 * @phpstan-method \Aws\Result getForm(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFormAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFormAsync(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result getMetadata(array $args = [])
 * @phpstan-method \Aws\Result getMetadata(array{appId?: string, environmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetadataAsync(array{appId?: string, environmentName?: string, ...} $args = [])
 * @method \Aws\Result getTheme(array $args = [])
 * @phpstan-method \Aws\Result getTheme(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getThemeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getThemeAsync(array{appId?: string, environmentName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result listCodegenJobs(array $args = [])
 * @phpstan-method \Aws\Result listCodegenJobs(array{appId?: string, environmentName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodegenJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodegenJobsAsync(array{appId?: string, environmentName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listComponents(array $args = [])
 * @phpstan-method \Aws\Result listComponents(array{appId?: string, environmentName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComponentsAsync(array{appId?: string, environmentName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listForms(array $args = [])
 * @phpstan-method \Aws\Result listForms(array{appId?: string, environmentName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFormsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFormsAsync(array{appId?: string, environmentName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listThemes(array $args = [])
 * @phpstan-method \Aws\Result listThemes(array{appId?: string, environmentName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThemesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThemesAsync(array{appId?: string, environmentName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result putMetadataFlag(array $args = [])
 * @phpstan-method \Aws\Result putMetadataFlag(array{
 *     appId?: string,
 *     environmentName?: string,
 *     featureName?: string,
 *     body?: array{newValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putMetadataFlagAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMetadataFlagAsync(array{
 *     appId?: string,
 *     environmentName?: string,
 *     featureName?: string,
 *     body?: array{newValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result refreshToken(array $args = [])
 * @phpstan-method \Aws\Result refreshToken(array{provider?: 'figma', refreshTokenBody?: array{token?: string, clientId?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise refreshTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise refreshTokenAsync(array{provider?: 'figma', refreshTokenBody?: array{token?: string, clientId?: string, ...}, ...} $args = [])
 * @method \Aws\Result startCodegenJob(array $args = [])
 * @phpstan-method \Aws\Result startCodegenJob(array{
 *     appId?: string,
 *     environmentName?: string,
 *     clientToken?: string,
 *     codegenJobToCreate?: array{
 *         renderConfig?: array{react?: array, ...},
 *         genericDataSchema?: array{
 *             dataSourceType?: 'DataStore',
 *             models?: array<string, array>,
 *             enums?: array<string, array>,
 *             nonModels?: array<string, array>,
 *             ...,
 *         },
 *         autoGenerateForms?: bool,
 *         features?: array{isRelationshipSupported?: bool, isNonModelSupported?: bool, ...},
 *         tags?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCodegenJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCodegenJobAsync(array{
 *     appId?: string,
 *     environmentName?: string,
 *     clientToken?: string,
 *     codegenJobToCreate?: array{
 *         renderConfig?: array{react?: array, ...},
 *         genericDataSchema?: array{
 *             dataSourceType?: 'DataStore',
 *             models?: array<string, array>,
 *             enums?: array<string, array>,
 *             nonModels?: array<string, array>,
 *             ...,
 *         },
 *         autoGenerateForms?: bool,
 *         features?: array{isRelationshipSupported?: bool, isNonModelSupported?: bool, ...},
 *         tags?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateComponent(array $args = [])
 * @phpstan-method \Aws\Result updateComponent(array{
 *     appId?: string,
 *     environmentName?: string,
 *     id?: string,
 *     clientToken?: string,
 *     updatedComponent?: array{
 *         id?: string,
 *         name?: string,
 *         sourceId?: string,
 *         componentType?: string,
 *         properties?: array<string, array>,
 *         children?: list<array>,
 *         variants?: list<array>,
 *         overrides?: array<string, array<string, string>>,
 *         bindingProperties?: array<string, array>,
 *         collectionProperties?: array<string, array>,
 *         events?: array<string, array>,
 *         schemaVersion?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateComponentAsync(array{
 *     appId?: string,
 *     environmentName?: string,
 *     id?: string,
 *     clientToken?: string,
 *     updatedComponent?: array{
 *         id?: string,
 *         name?: string,
 *         sourceId?: string,
 *         componentType?: string,
 *         properties?: array<string, array>,
 *         children?: list<array>,
 *         variants?: list<array>,
 *         overrides?: array<string, array<string, string>>,
 *         bindingProperties?: array<string, array>,
 *         collectionProperties?: array<string, array>,
 *         events?: array<string, array>,
 *         schemaVersion?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateForm(array $args = [])
 * @phpstan-method \Aws\Result updateForm(array{
 *     appId?: string,
 *     environmentName?: string,
 *     id?: string,
 *     clientToken?: string,
 *     updatedForm?: array{
 *         name?: string,
 *         dataType?: array{dataSourceType?: 'Custom'|'DataStore', dataTypeName?: string, ...},
 *         formActionType?: 'create'|'update',
 *         fields?: array<string, array>,
 *         style?: array{horizontalGap?: array, verticalGap?: array, outerPadding?: array, ...},
 *         sectionalElements?: array<string, array>,
 *         schemaVersion?: string,
 *         cta?: array{position?: 'bottom'|'top'|'top_and_bottom', clear?: array, cancel?: array, submit?: array, ...},
 *         labelDecorator?: 'none'|'optional'|'required',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFormAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFormAsync(array{
 *     appId?: string,
 *     environmentName?: string,
 *     id?: string,
 *     clientToken?: string,
 *     updatedForm?: array{
 *         name?: string,
 *         dataType?: array{dataSourceType?: 'Custom'|'DataStore', dataTypeName?: string, ...},
 *         formActionType?: 'create'|'update',
 *         fields?: array<string, array>,
 *         style?: array{horizontalGap?: array, verticalGap?: array, outerPadding?: array, ...},
 *         sectionalElements?: array<string, array>,
 *         schemaVersion?: string,
 *         cta?: array{position?: 'bottom'|'top'|'top_and_bottom', clear?: array, cancel?: array, submit?: array, ...},
 *         labelDecorator?: 'none'|'optional'|'required',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTheme(array $args = [])
 * @phpstan-method \Aws\Result updateTheme(array{
 *     appId?: string,
 *     environmentName?: string,
 *     id?: string,
 *     clientToken?: string,
 *     updatedTheme?: array{id?: string, name?: string, values?: list<array>, overrides?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThemeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThemeAsync(array{
 *     appId?: string,
 *     environmentName?: string,
 *     id?: string,
 *     clientToken?: string,
 *     updatedTheme?: array{id?: string, name?: string, values?: list<array>, overrides?: list<array>, ...},
 *     ...,
 * } $args = [])
 */
class AmplifyUIBuilderClient extends AwsClient {}
