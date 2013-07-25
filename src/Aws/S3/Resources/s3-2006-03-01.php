<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

return array (
    'apiVersion' => '2006-03-01',
    'endpointPrefix' => 's3',
    'serviceFullName' => 'Amazon Simple Storage Service',
    'serviceAbbreviation' => 'Amazon S3',
    'serviceType' => 'rest-xml',
    'timestampFormat' => 'rfc822',
    'globalEndpoint' => 's3.amazonaws.com',
    'signatureVersion' => 's3',
    'namespace' => 'S3',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 's3.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 's3-us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 's3-us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 's3-eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 's3-ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 's3-ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 's3-ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 's3-sa-east-1.amazonaws.com',
        ),
        'us-gov-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 's3-us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AbortMultipartUpload' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'AbortMultipartUploadOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadAbort.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'UploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'uploadId',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified multipart upload does not exist.',
                    'class' => 'NoSuchUploadException',
                ),
            ),
        ),
        'CompleteMultipartUpload' => array(
            'httpMethod' => 'POST',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'CompleteMultipartUploadOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadComplete.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'MultipartUpload',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'Parts' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'Part',
                        'properties' => array(
                            'ETag' => array(
                                'type' => 'string',
                            ),
                            'PartNumber' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'UploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'uploadId',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'CopyObject' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'CopyObjectOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectCOPY.html',
            'parameters' => array(
                'ACL' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-acl',
                    'enum' => array(
                        'private',
                        'public-read',
                        'public-read-write',
                        'authenticated-read',
                        'bucket-owner-read',
                        'bucket-owner-full-control',
                    ),
                ),
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'CacheControl' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Cache-Control',
                ),
                'ContentDisposition' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Disposition',
                ),
                'ContentEncoding' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Encoding',
                ),
                'ContentLanguage' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Language',
                ),
                'ContentType' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Type',
                ),
                'CopySource' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source',
                ),
                'CopySourceIfMatch' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-match',
                ),
                'CopySourceIfModifiedSince' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-modified-since',
                ),
                'CopySourceIfNoneMatch' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-none-match',
                ),
                'CopySourceIfUnmodifiedSince' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-unmodified-since',
                ),
                'Expires' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                ),
                'GrantFullControl' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-full-control',
                ),
                'GrantRead' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read',
                ),
                'GrantReadACP' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read-acp',
                ),
                'GrantWriteACP' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write-acp',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'Metadata' => array(
                    'type' => 'object',
                    'location' => 'header',
                    'sentAs' => 'x-amz-meta-',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'MetadataDirective' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-metadata-directive',
                    'enum' => array(
                        'COPY',
                        'REPLACE',
                    ),
                ),
                'ServerSideEncryption' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                    'enum' => array(
                        'AES256',
                    ),
                ),
                'StorageClass' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-storage-class',
                    'enum' => array(
                        'STANDARD',
                        'REDUCED_REDUNDANCY',
                    ),
                ),
                'WebsiteRedirectLocation' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-website-redirect-location',
                ),
                'ACP' => array(
                    'type' => 'object',
                    'additionalProperties' => true,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The source object of the COPY operation is not in the active tier and is only stored in Amazon Glacier.',
                    'class' => 'ObjectNotInActiveTierErrorException',
                ),
            ),
        ),
        'CreateBucket' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'CreateBucketOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUT.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'CreateBucketConfiguration',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'ACL' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-acl',
                    'enum' => array(
                        'private',
                        'public-read',
                        'public-read-write',
                        'authenticated-read',
                        'bucket-owner-read',
                        'bucket-owner-full-control',
                    ),
                ),
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'LocationConstraint' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'enum' => array(
                        'EU',
                        'eu-west-1',
                        'us-west-1',
                        'us-west-2',
                        'ap-southeast-1',
                        'ap-northeast-1',
                        'sa-east-1',
                    ),
                ),
                'GrantFullControl' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-full-control',
                ),
                'GrantRead' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read',
                ),
                'GrantReadACP' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read-acp',
                ),
                'GrantWrite' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write',
                ),
                'GrantWriteACP' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write-acp',
                ),
                'ACP' => array(
                    'type' => 'object',
                    'additionalProperties' => true,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested bucket name is not available. The bucket namespace is shared by all users of the system. Please select a different name and try again.',
                    'class' => 'BucketAlreadyExistsException',
                ),
            ),
        ),
        'CreateMultipartUpload' => array(
            'httpMethod' => 'POST',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'CreateMultipartUploadOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadInitiate.html',
            'parameters' => array(
                'ACL' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-acl',
                    'enum' => array(
                        'private',
                        'public-read',
                        'public-read-write',
                        'authenticated-read',
                        'bucket-owner-read',
                        'bucket-owner-full-control',
                    ),
                ),
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'CacheControl' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Cache-Control',
                ),
                'ContentDisposition' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Disposition',
                ),
                'ContentEncoding' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Encoding',
                ),
                'ContentLanguage' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Language',
                ),
                'ContentType' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Type',
                ),
                'Expires' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                ),
                'GrantFullControl' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-full-control',
                ),
                'GrantRead' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read',
                ),
                'GrantReadACP' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read-acp',
                ),
                'GrantWriteACP' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write-acp',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'Metadata' => array(
                    'type' => 'object',
                    'location' => 'header',
                    'sentAs' => 'x-amz-meta-',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'ServerSideEncryption' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                    'enum' => array(
                        'AES256',
                    ),
                ),
                'StorageClass' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-storage-class',
                    'enum' => array(
                        'STANDARD',
                        'REDUCED_REDUNDANCY',
                    ),
                ),
                'WebsiteRedirectLocation' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-website-redirect-location',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'uploads',
                    'default' => '_guzzle_blank_',
                ),
                'ACP' => array(
                    'type' => 'object',
                    'additionalProperties' => true,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'DeleteBucket' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'DeleteBucketOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketDELETE.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
        ),
        'DeleteBucketCors' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'DeleteBucketCorsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketDELETEcors.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'cors',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'DeleteBucketLifecycle' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'DeleteBucketLifecycleOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketDELETElifecycle.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'lifecycle',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'DeleteBucketPolicy' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'DeleteBucketPolicyOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketDELETEpolicy.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'policy',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'DeleteBucketTagging' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'DeleteBucketTaggingOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketDELETEtagging.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'tagging',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'DeleteBucketWebsite' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'DeleteBucketWebsiteOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketDELETEwebsite.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'website',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'DeleteObject' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'DeleteObjectOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectDELETE.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'MFA' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-mfa',
                ),
                'VersionId' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'versionId',
                ),
            ),
        ),
        'DeleteObjects' => array(
            'httpMethod' => 'POST',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'DeleteObjectsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/multiobjectdeleteapi.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'Delete',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Objects' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'Object',
                        'properties' => array(
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'VersionId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Quiet' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'xml',
                ),
                'MFA' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-mfa',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'delete',
                    'default' => '_guzzle_blank_',
                ),
                'ContentMD5' => array(
                    'required' => true,
                    'default' => true,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'GetBucketAcl' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetBucketAclOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGETacl.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'acl',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'GetBucketCors' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetBucketCorsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGETcors.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'cors',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'GetBucketLifecycle' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetBucketLifecycleOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGETlifecycle.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'lifecycle',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'GetBucketLocation' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetBucketLocationOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGETlocation.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'location',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'GetBucketLogging' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetBucketLoggingOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGETlogging.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'logging',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'GetBucketNotification' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetBucketNotificationOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGETnotification.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'notification',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'GetBucketPolicy' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetBucketPolicyOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGETpolicy.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'policy',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'GetBucketRequestPayment' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetBucketRequestPaymentOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTrequestPaymentGET.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'requestPayment',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'GetBucketTagging' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetBucketTaggingOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGETtagging.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'tagging',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'GetBucketVersioning' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetBucketVersioningOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGETversioningStatus.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'versioning',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'GetBucketWebsite' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetBucketWebsiteOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGETwebsite.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'website',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'GetObject' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetObjectOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectGET.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
                'IfModifiedSince' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                    'sentAs' => 'If-Modified-Since',
                ),
                'IfNoneMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-None-Match',
                ),
                'IfUnmodifiedSince' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                    'sentAs' => 'If-Unmodified-Since',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'Range' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'ResponseCacheControl' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'response-cache-control',
                ),
                'ResponseContentDisposition' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'response-content-disposition',
                ),
                'ResponseContentEncoding' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'response-content-encoding',
                ),
                'ResponseContentLanguage' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'response-content-language',
                ),
                'ResponseContentType' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'response-content-type',
                ),
                'ResponseExpires' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'query',
                    'sentAs' => 'response-expires',
                ),
                'VersionId' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'versionId',
                ),
                'SaveAs' => array(
                    'location' => 'response_body',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified key does not exist.',
                    'class' => 'NoSuchKeyException',
                ),
            ),
        ),
        'GetObjectAcl' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetObjectAclOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectGETacl.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'VersionId' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'versionId',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'acl',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified key does not exist.',
                    'class' => 'NoSuchKeyException',
                ),
            ),
        ),
        'GetObjectTorrent' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'GetObjectTorrentOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectGETtorrent.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'torrent',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'HeadBucket' => array(
            'httpMethod' => 'HEAD',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'HeadBucketOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketHEAD.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified bucket does not exist.',
                    'class' => 'NoSuchBucketException',
                ),
            ),
        ),
        'HeadObject' => array(
            'httpMethod' => 'HEAD',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'HeadObjectOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectHEAD.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
                'IfModifiedSince' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                    'sentAs' => 'If-Modified-Since',
                ),
                'IfNoneMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-None-Match',
                ),
                'IfUnmodifiedSince' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                    'sentAs' => 'If-Unmodified-Since',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'Range' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'VersionId' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'versionId',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified key does not exist.',
                    'class' => 'NoSuchKeyException',
                ),
            ),
        ),
        'ListBuckets' => array(
            'httpMethod' => 'GET',
            'uri' => '/',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'ListBucketsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTServiceGET.html',
            'parameters' => array(
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'ListMultipartUploads' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'ListMultipartUploadsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadListMPUpload.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Delimiter' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'delimiter',
                ),
                'KeyMarker' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'key-marker',
                ),
                'MaxUploads' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'sentAs' => 'max-uploads',
                ),
                'Prefix' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'prefix',
                ),
                'UploadIdMarker' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'upload-id-marker',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'uploads',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'ListObjectVersions' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'ListObjectVersionsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGETVersion.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Delimiter' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'delimiter',
                ),
                'KeyMarker' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'key-marker',
                ),
                'MaxKeys' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'sentAs' => 'max-keys',
                ),
                'Prefix' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'prefix',
                ),
                'VersionIdMarker' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'version-id-marker',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'versions',
                    'default' => '_guzzle_blank_',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'ListObjects' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'ListObjectsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGET.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Delimiter' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'delimiter',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'marker',
                ),
                'MaxKeys' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'sentAs' => 'max-keys',
                ),
                'Prefix' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'prefix',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified bucket does not exist.',
                    'class' => 'NoSuchBucketException',
                ),
            ),
        ),
        'ListParts' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'ListPartsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadListParts.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'MaxParts' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'sentAs' => 'max-parts',
                ),
                'PartNumberMarker' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'part-number-marker',
                ),
                'UploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'uploadId',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
        'PutBucketAcl' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'PutBucketAclOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTacl.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'AccessControlPolicy',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'ACL' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-acl',
                    'enum' => array(
                        'private',
                        'public-read',
                        'public-read-write',
                        'authenticated-read',
                        'bucket-owner-read',
                        'bucket-owner-full-control',
                    ),
                ),
                'Grants' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'AccessControlList',
                    'items' => array(
                        'name' => 'Grant',
                        'type' => 'object',
                        'properties' => array(
                            'Grantee' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'DisplayName' => array(
                                        'type' => 'string',
                                    ),
                                    'EmailAddress' => array(
                                        'type' => 'string',
                                    ),
                                    'ID' => array(
                                        'type' => 'string',
                                    ),
                                    'Type' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'sentAs' => 'xsi:type',
                                        'data' => array(
                                            'xmlAttribute' => true,
                                            'xmlNamespace' => 'http://www.w3.org/2001/XMLSchema-instance',
                                        ),
                                        'enum' => array(
                                            'CanonicalUser',
                                            'AmazonCustomerByEmail',
                                            'Group',
                                        ),
                                    ),
                                    'URI' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Permission' => array(
                                'type' => 'string',
                                'enum' => array(
                                    'FULL_CONTROL',
                                    'WRITE',
                                    'WRITE_ACP',
                                    'READ',
                                    'READ_ACP',
                                ),
                            ),
                        ),
                    ),
                ),
                'Owner' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'DisplayName' => array(
                            'type' => 'string',
                        ),
                        'ID' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'GrantFullControl' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-full-control',
                ),
                'GrantRead' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read',
                ),
                'GrantReadACP' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read-acp',
                ),
                'GrantWrite' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write',
                ),
                'GrantWriteACP' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write-acp',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'acl',
                    'default' => '_guzzle_blank_',
                ),
                'ACP' => array(
                    'type' => 'object',
                    'additionalProperties' => true,
                ),
            ),
        ),
        'PutBucketCors' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'PutBucketCorsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTcors.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'CORSConfiguration',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'CORSRules' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'CORSRule',
                        'properties' => array(
                            'AllowedHeaders' => array(
                                'type' => 'array',
                                'data' => array(
                                    'xmlFlattened' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                    'sentAs' => 'AllowedHeader',
                                ),
                            ),
                            'AllowedMethods' => array(
                                'type' => 'array',
                                'data' => array(
                                    'xmlFlattened' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                    'sentAs' => 'AllowedMethod',
                                ),
                            ),
                            'AllowedOrigins' => array(
                                'type' => 'array',
                                'data' => array(
                                    'xmlFlattened' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                    'sentAs' => 'AllowedOrigin',
                                ),
                            ),
                            'ExposeHeaders' => array(
                                'type' => 'array',
                                'data' => array(
                                    'xmlFlattened' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                    'sentAs' => 'ExposeHeader',
                                ),
                            ),
                            'MaxAgeSeconds' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'cors',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'PutBucketLifecycle' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'PutBucketLifecycleOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTlifecycle.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'LifecycleConfiguration',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'Rules' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'Rule',
                        'properties' => array(
                            'Expiration' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Date' => array(
                                        'type' => array(
                                            'object',
                                            'string',
                                            'integer',
                                        ),
                                        'format' => 'date-time',
                                    ),
                                    'Days' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'ID' => array(
                                'type' => 'string',
                            ),
                            'Prefix' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'required' => true,
                                'type' => 'string',
                                'enum' => array(
                                    'Enabled',
                                    'Disabled',
                                ),
                            ),
                            'Transition' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Date' => array(
                                        'type' => array(
                                            'object',
                                            'string',
                                            'integer',
                                        ),
                                        'format' => 'date-time',
                                    ),
                                    'Days' => array(
                                        'type' => 'numeric',
                                    ),
                                    'StorageClass' => array(
                                        'type' => 'string',
                                        'enum' => array(
                                            'STANDARD',
                                            'REDUCED_REDUNDANCY',
                                            'GLACIER',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'lifecycle',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'PutBucketLogging' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'PutBucketLoggingOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTlogging.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'BucketLoggingStatus',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'LoggingEnabled' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'TargetBucket' => array(
                            'type' => 'string',
                        ),
                        'TargetGrants' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Grant',
                                'type' => 'object',
                                'properties' => array(
                                    'Grantee' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DisplayName' => array(
                                                'type' => 'string',
                                            ),
                                            'EmailAddress' => array(
                                                'type' => 'string',
                                            ),
                                            'ID' => array(
                                                'type' => 'string',
                                            ),
                                            'Type' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'sentAs' => 'xsi:type',
                                                'data' => array(
                                                    'xmlAttribute' => true,
                                                    'xmlNamespace' => 'http://www.w3.org/2001/XMLSchema-instance',
                                                ),
                                                'enum' => array(
                                                    'CanonicalUser',
                                                    'AmazonCustomerByEmail',
                                                    'Group',
                                                ),
                                            ),
                                            'URI' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'Permission' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'TargetPrefix' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'logging',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'PutBucketNotification' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'PutBucketNotificationOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTnotification.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'NotificationConfiguration',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'TopicConfiguration' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Event' => array(
                            'type' => 'string',
                            'enum' => array(
                                's3:ReducedRedundancyLostObject',
                            ),
                        ),
                        'Topic' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'notification',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'PutBucketPolicy' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'PutBucketPolicyOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTpolicy.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'Policy' => array(
                    'required' => true,
                    'type' => array(
                        'string',
                        'object',
                    ),
                    'location' => 'body',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'policy',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'PutBucketRequestPayment' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'PutBucketRequestPaymentOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTrequestPaymentPUT.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'RequestPaymentConfiguration',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'Payer' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                    'enum' => array(
                        'Requester',
                        'BucketOwner',
                    ),
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'requestPayment',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'PutBucketTagging' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'PutBucketTaggingOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTtagging.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'Tagging',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'TagSet' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Tag',
                        'required' => true,
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'tagging',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'PutBucketVersioning' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'PutBucketVersioningOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTVersioningStatus.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'VersioningConfiguration',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'MFA' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-mfa',
                ),
                'MFADelete' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'enum' => array(
                        'Enabled',
                        'Disabled',
                    ),
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'enum' => array(
                        'Enabled',
                        'Suspended',
                    ),
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'versioning',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'PutBucketWebsite' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'PutBucketWebsiteOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTwebsite.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'WebsiteConfiguration',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
                'xmlAllowEmpty' => true,
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'ErrorDocument' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Key' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'IndexDocument' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Suffix' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'RedirectAllRequestsTo' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'HostName' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Protocol' => array(
                            'type' => 'string',
                            'enum' => array(
                                'http',
                                'https',
                            ),
                        ),
                    ),
                ),
                'RoutingRules' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'RoutingRule',
                        'type' => 'object',
                        'properties' => array(
                            'Condition' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'HttpErrorCodeReturnedEquals' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPrefixEquals' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Redirect' => array(
                                'required' => true,
                                'type' => 'object',
                                'properties' => array(
                                    'HostName' => array(
                                        'type' => 'string',
                                    ),
                                    'HttpRedirectCode' => array(
                                        'type' => 'string',
                                    ),
                                    'Protocol' => array(
                                        'type' => 'string',
                                        'enum' => array(
                                            'http',
                                            'https',
                                        ),
                                    ),
                                    'ReplaceKeyPrefixWith' => array(
                                        'type' => 'string',
                                    ),
                                    'ReplaceKeyWith' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'website',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'PutObject' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'PutObjectOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectPUT.html',
            'parameters' => array(
                'ACL' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-acl',
                    'enum' => array(
                        'private',
                        'public-read',
                        'public-read-write',
                        'authenticated-read',
                        'bucket-owner-read',
                        'bucket-owner-full-control',
                    ),
                ),
                'Body' => array(
                    'type' => array(
                        'string',
                        'object',
                    ),
                    'location' => 'body',
                ),
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'CacheControl' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Cache-Control',
                ),
                'ContentDisposition' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Disposition',
                ),
                'ContentEncoding' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Encoding',
                ),
                'ContentLanguage' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Language',
                ),
                'ContentLength' => array(
                    'type' => 'numeric',
                    'location' => 'header',
                    'sentAs' => 'Content-Length',
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'ContentType' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Type',
                ),
                'Expires' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                ),
                'GrantFullControl' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-full-control',
                ),
                'GrantRead' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read',
                ),
                'GrantReadACP' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read-acp',
                ),
                'GrantWriteACP' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write-acp',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'Metadata' => array(
                    'type' => 'object',
                    'location' => 'header',
                    'sentAs' => 'x-amz-meta-',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'ServerSideEncryption' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                    'enum' => array(
                        'AES256',
                    ),
                ),
                'StorageClass' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-storage-class',
                    'enum' => array(
                        'STANDARD',
                        'REDUCED_REDUNDANCY',
                    ),
                ),
                'WebsiteRedirectLocation' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-website-redirect-location',
                ),
                'ValidateMD5' => array(
                    'default' => true,
                ),
                'ACP' => array(
                    'type' => 'object',
                    'additionalProperties' => true,
                ),
            ),
        ),
        'PutObjectAcl' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'PutObjectAclOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectPUTacl.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'AccessControlPolicy',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'ACL' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-acl',
                    'enum' => array(
                        'private',
                        'public-read',
                        'public-read-write',
                        'authenticated-read',
                        'bucket-owner-read',
                        'bucket-owner-full-control',
                    ),
                ),
                'Grants' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'AccessControlList',
                    'items' => array(
                        'name' => 'Grant',
                        'type' => 'object',
                        'properties' => array(
                            'Grantee' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'DisplayName' => array(
                                        'type' => 'string',
                                    ),
                                    'EmailAddress' => array(
                                        'type' => 'string',
                                    ),
                                    'ID' => array(
                                        'type' => 'string',
                                    ),
                                    'Type' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'sentAs' => 'xsi:type',
                                        'data' => array(
                                            'xmlAttribute' => true,
                                            'xmlNamespace' => 'http://www.w3.org/2001/XMLSchema-instance',
                                        ),
                                        'enum' => array(
                                            'CanonicalUser',
                                            'AmazonCustomerByEmail',
                                            'Group',
                                        ),
                                    ),
                                    'URI' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Permission' => array(
                                'type' => 'string',
                                'enum' => array(
                                    'FULL_CONTROL',
                                    'WRITE',
                                    'WRITE_ACP',
                                    'READ',
                                    'READ_ACP',
                                ),
                            ),
                        ),
                    ),
                ),
                'Owner' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'DisplayName' => array(
                            'type' => 'string',
                        ),
                        'ID' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'GrantFullControl' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-full-control',
                ),
                'GrantRead' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read',
                ),
                'GrantReadACP' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read-acp',
                ),
                'GrantWrite' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write',
                ),
                'GrantWriteACP' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write-acp',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'acl',
                    'default' => '_guzzle_blank_',
                ),
                'ACP' => array(
                    'type' => 'object',
                    'additionalProperties' => true,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified key does not exist.',
                    'class' => 'NoSuchKeyException',
                ),
            ),
        ),
        'RestoreObject' => array(
            'httpMethod' => 'POST',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'RestoreObjectOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectRestore.html',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'RestoreRequest',
                    'namespaces' => array(
                        'http://s3.amazonaws.com/doc/2006-03-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'Days' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'restore',
                    'default' => '_guzzle_blank_',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This operation is not allowed against this storage tier',
                    'class' => 'ObjectAlreadyInActiveTierErrorException',
                ),
            ),
        ),
        'UploadPart' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'UploadPartOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadUploadPart.html',
            'parameters' => array(
                'Body' => array(
                    'type' => array(
                        'string',
                        'object',
                    ),
                    'location' => 'body',
                ),
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'ContentLength' => array(
                    'type' => 'numeric',
                    'location' => 'header',
                    'sentAs' => 'Content-Length',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'PartNumber' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'partNumber',
                ),
                'UploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'uploadId',
                ),
                'ContentMD5' => array(
                    'default' => true,
                ),
                'ValidateMD5' => array(
                    'default' => true,
                ),
            ),
        ),
        'UploadPartCopy' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}{/Key*}',
            'class' => 'Aws\\S3\\Command\\S3Command',
            'responseClass' => 'UploadPartCopyOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadUploadPartCopy.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'CopySource' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source',
                ),
                'CopySourceIfMatch' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-match',
                ),
                'CopySourceIfModifiedSince' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-modified-since',
                ),
                'CopySourceIfNoneMatch' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-none-match',
                ),
                'CopySourceIfUnmodifiedSince' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time-http',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-unmodified-since',
                ),
                'CopySourceRange' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-range',
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'filters' => array(
                        'Aws\\S3\\S3Client::explodeKey',
                    ),
                ),
                'PartNumber' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'partNumber',
                ),
                'UploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'uploadId',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
        ),
    ),
    'models' => array(
        'AbortMultipartUploadOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'CompleteMultipartUploadOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Location' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Bucket' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Key' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Expiration' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-expiration',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ServerSideEncryption' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'VersionId' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-version-id',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'CopyObjectOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModified' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Expiration' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-expiration',
                ),
                'CopySourceVersionId' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-version-id',
                ),
                'ServerSideEncryption' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'CreateBucketOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'CreateMultipartUploadOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Bucket' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'Bucket',
                ),
                'Key' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'UploadId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ServerSideEncryption' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteBucketOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteBucketCorsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteBucketLifecycleOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteBucketPolicyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteBucketTaggingOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteBucketWebsiteOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteObjectOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DeleteMarker' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-delete-marker',
                ),
                'VersionId' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-version-id',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteObjectsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Deleted' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'VersionId' => array(
                                'type' => 'string',
                            ),
                            'DeleteMarker' => array(
                                'type' => 'boolean',
                            ),
                            'DeleteMarkerVersionId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Errors' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'Error',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'Error',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'VersionId' => array(
                                'type' => 'string',
                            ),
                            'Code' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetBucketAclOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Owner' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ID' => array(
                            'type' => 'string',
                        ),
                        'DisplayName' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Grants' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'AccessControlList',
                    'items' => array(
                        'name' => 'Grant',
                        'type' => 'object',
                        'sentAs' => 'Grant',
                        'properties' => array(
                            'Grantee' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Type' => array(
                                        'type' => 'string',
                                        'sentAs' => 'xsi:type',
                                        'data' => array(
                                            'xmlAttribute' => true,
                                            'xmlNamespace' => 'http://www.w3.org/2001/XMLSchema-instance',
                                        ),
                                    ),
                                    'ID' => array(
                                        'type' => 'string',
                                    ),
                                    'DisplayName' => array(
                                        'type' => 'string',
                                    ),
                                    'EmailAddress' => array(
                                        'type' => 'string',
                                    ),
                                    'URI' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Permission' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetBucketCorsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CORSRules' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'CORSRule',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'CORSRule',
                        'properties' => array(
                            'AllowedHeaders' => array(
                                'type' => 'array',
                                'sentAs' => 'AllowedHeader',
                                'data' => array(
                                    'xmlFlattened' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                    'sentAs' => 'AllowedHeader',
                                ),
                            ),
                            'AllowedOrigins' => array(
                                'type' => 'array',
                                'sentAs' => 'AllowedOrigin',
                                'data' => array(
                                    'xmlFlattened' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                    'sentAs' => 'AllowedOrigin',
                                ),
                            ),
                            'AllowedMethods' => array(
                                'type' => 'array',
                                'sentAs' => 'AllowedMethod',
                                'data' => array(
                                    'xmlFlattened' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                    'sentAs' => 'AllowedMethod',
                                ),
                            ),
                            'MaxAgeSeconds' => array(
                                'type' => 'numeric',
                            ),
                            'ExposeHeaders' => array(
                                'type' => 'array',
                                'sentAs' => 'ExposeHeader',
                                'data' => array(
                                    'xmlFlattened' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                    'sentAs' => 'ExposeHeader',
                                ),
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetBucketLifecycleOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Rules' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'Rule',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'Rule',
                        'properties' => array(
                            'ID' => array(
                                'type' => 'string',
                            ),
                            'Prefix' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'Transition' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Days' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Date' => array(
                                        'type' => 'string',
                                    ),
                                    'StorageClass' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Expiration' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Days' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Date' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetBucketLocationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Location' => array(
                    'type' => 'string',
                    'location' => 'body',
                    'filters' => array(
                        'strval',
                        'strip_tags',
                        'trim',
                    ),
                ),
            ),
        ),
        'GetBucketLoggingOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LoggingEnabled' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'TargetBucket' => array(
                            'type' => 'string',
                        ),
                        'TargetPrefix' => array(
                            'type' => 'string',
                        ),
                        'TargetGrants' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Grant',
                                'type' => 'object',
                                'sentAs' => 'Grant',
                                'properties' => array(
                                    'Grantee' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Type' => array(
                                                'type' => 'string',
                                                'sentAs' => 'xsi:type',
                                                'data' => array(
                                                    'xmlAttribute' => true,
                                                    'xmlNamespace' => 'http://www.w3.org/2001/XMLSchema-instance',
                                                ),
                                            ),
                                            'ID' => array(
                                                'type' => 'string',
                                            ),
                                            'DisplayName' => array(
                                                'type' => 'string',
                                            ),
                                            'EmailAddress' => array(
                                                'type' => 'string',
                                            ),
                                            'URI' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'Permission' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetBucketNotificationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TopicConfiguration' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Topic' => array(
                            'type' => 'string',
                        ),
                        'Event' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetBucketPolicyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Policy' => array(
                    'type' => 'string',
                    'instanceOf' => 'Guzzle\\Http\\EntityBody',
                    'location' => 'body',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetBucketRequestPaymentOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Payer' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetBucketTaggingOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TagSet' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'sentAs' => 'Tag',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetBucketVersioningOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MFADelete' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetBucketWebsiteOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RedirectAllRequestsTo' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'HostName' => array(
                            'type' => 'string',
                        ),
                        'Protocol' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'IndexDocument' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Suffix' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ErrorDocument' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Key' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RoutingRules' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'RoutingRule',
                        'type' => 'object',
                        'sentAs' => 'RoutingRule',
                        'properties' => array(
                            'Condition' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'KeyPrefixEquals' => array(
                                        'type' => 'string',
                                    ),
                                    'HttpErrorCodeReturnedEquals' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Redirect' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'HostName' => array(
                                        'type' => 'string',
                                    ),
                                    'ReplaceKeyPrefixWith' => array(
                                        'type' => 'string',
                                    ),
                                    'ReplaceKeyWith' => array(
                                        'type' => 'string',
                                    ),
                                    'HttpRedirectCode' => array(
                                        'type' => 'string',
                                    ),
                                    'Protocol' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetObjectOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Body' => array(
                    'type' => 'string',
                    'instanceOf' => 'Guzzle\\Http\\EntityBody',
                    'location' => 'body',
                ),
                'DeleteMarker' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-delete-marker',
                ),
                'AcceptRanges' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'accept-ranges',
                ),
                'Expiration' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-expiration',
                ),
                'Restore' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-restore',
                ),
                'LastModified' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Last-Modified',
                ),
                'ContentLength' => array(
                    'type' => 'numeric',
                    'location' => 'header',
                    'sentAs' => 'Content-Length',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'MissingMeta' => array(
                    'type' => 'numeric',
                    'location' => 'header',
                    'sentAs' => 'x-amz-missing-meta',
                ),
                'VersionId' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-version-id',
                ),
                'CacheControl' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Cache-Control',
                ),
                'ContentDisposition' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Disposition',
                ),
                'ContentEncoding' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Encoding',
                ),
                'ContentLanguage' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Language',
                ),
                'ContentType' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Type',
                ),
                'Expires' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'WebsiteRedirectLocation' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-website-redirect-location',
                ),
                'ServerSideEncryption' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'Metadata' => array(
                    'type' => 'object',
                    'location' => 'header',
                    'sentAs' => 'x-amz-meta-',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetObjectAclOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Owner' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ID' => array(
                            'type' => 'string',
                        ),
                        'DisplayName' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Grants' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'AccessControlList',
                    'items' => array(
                        'name' => 'Grant',
                        'type' => 'object',
                        'sentAs' => 'Grant',
                        'properties' => array(
                            'Grantee' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Type' => array(
                                        'type' => 'string',
                                        'sentAs' => 'xsi:type',
                                        'data' => array(
                                            'xmlAttribute' => true,
                                            'xmlNamespace' => 'http://www.w3.org/2001/XMLSchema-instance',
                                        ),
                                    ),
                                    'ID' => array(
                                        'type' => 'string',
                                    ),
                                    'DisplayName' => array(
                                        'type' => 'string',
                                    ),
                                    'EmailAddress' => array(
                                        'type' => 'string',
                                    ),
                                    'URI' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Permission' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetObjectTorrentOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Body' => array(
                    'type' => 'string',
                    'instanceOf' => 'Guzzle\\Http\\EntityBody',
                    'location' => 'body',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'HeadBucketOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'HeadObjectOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DeleteMarker' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-delete-marker',
                ),
                'AcceptRanges' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'accept-ranges',
                ),
                'Expiration' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-expiration',
                ),
                'Restore' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-restore',
                ),
                'LastModified' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Last-Modified',
                ),
                'ContentLength' => array(
                    'type' => 'numeric',
                    'location' => 'header',
                    'sentAs' => 'Content-Length',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'MissingMeta' => array(
                    'type' => 'numeric',
                    'location' => 'header',
                    'sentAs' => 'x-amz-missing-meta',
                ),
                'VersionId' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-version-id',
                ),
                'CacheControl' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Cache-Control',
                ),
                'ContentDisposition' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Disposition',
                ),
                'ContentEncoding' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Encoding',
                ),
                'ContentLanguage' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Language',
                ),
                'ContentType' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Type',
                ),
                'Expires' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'WebsiteRedirectLocation' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-website-redirect-location',
                ),
                'ServerSideEncryption' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'Metadata' => array(
                    'type' => 'object',
                    'location' => 'header',
                    'sentAs' => 'x-amz-meta-',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListBucketsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Buckets' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Bucket',
                        'type' => 'object',
                        'sentAs' => 'Bucket',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'CreationDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Owner' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ID' => array(
                            'type' => 'string',
                        ),
                        'DisplayName' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListMultipartUploadsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Bucket' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'KeyMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'UploadIdMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextKeyMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextUploadIdMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxUploads' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Uploads' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'Upload',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'Upload',
                        'properties' => array(
                            'UploadId' => array(
                                'type' => 'string',
                            ),
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Initiated' => array(
                                'type' => 'string',
                            ),
                            'StorageClass' => array(
                                'type' => 'string',
                            ),
                            'Owner' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'ID' => array(
                                        'type' => 'string',
                                    ),
                                    'DisplayName' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Initiator' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'ID' => array(
                                        'type' => 'string',
                                    ),
                                    'DisplayName' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Prefix' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CommonPrefixes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'Prefix' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListObjectVersionsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'KeyMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'VersionIdMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextKeyMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextVersionIdMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Versions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'Version',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'Version',
                        'properties' => array(
                            'ETag' => array(
                                'type' => 'string',
                            ),
                            'Size' => array(
                                'type' => 'string',
                            ),
                            'StorageClass' => array(
                                'type' => 'string',
                            ),
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'VersionId' => array(
                                'type' => 'string',
                            ),
                            'IsLatest' => array(
                                'type' => 'boolean',
                            ),
                            'LastModified' => array(
                                'type' => 'string',
                            ),
                            'Owner' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'ID' => array(
                                        'type' => 'string',
                                    ),
                                    'DisplayName' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DeleteMarkers' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'DeleteMarker',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'DeleteMarker',
                        'properties' => array(
                            'Owner' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'ID' => array(
                                        'type' => 'string',
                                    ),
                                    'DisplayName' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'VersionId' => array(
                                'type' => 'string',
                            ),
                            'IsLatest' => array(
                                'type' => 'boolean',
                            ),
                            'LastModified' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Prefix' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxKeys' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'CommonPrefixes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'Prefix' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListObjectsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Contents' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'LastModified' => array(
                                'type' => 'string',
                            ),
                            'ETag' => array(
                                'type' => 'string',
                            ),
                            'Size' => array(
                                'type' => 'numeric',
                            ),
                            'StorageClass' => array(
                                'type' => 'string',
                            ),
                            'Owner' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'ID' => array(
                                        'type' => 'string',
                                    ),
                                    'DisplayName' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Prefix' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxKeys' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'CommonPrefixes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'Prefix' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListPartsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Bucket' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Key' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'UploadId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'PartNumberMarker' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'NextPartNumberMarker' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'MaxParts' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Parts' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'Part',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'Part',
                        'properties' => array(
                            'PartNumber' => array(
                                'type' => 'numeric',
                            ),
                            'LastModified' => array(
                                'type' => 'string',
                            ),
                            'ETag' => array(
                                'type' => 'string',
                            ),
                            'Size' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'Initiator' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ID' => array(
                            'type' => 'string',
                        ),
                        'DisplayName' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Owner' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ID' => array(
                            'type' => 'string',
                        ),
                        'DisplayName' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'StorageClass' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'PutBucketAclOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'PutBucketCorsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'PutBucketLifecycleOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'PutBucketLoggingOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'PutBucketNotificationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'PutBucketPolicyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'PutBucketRequestPaymentOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'PutBucketTaggingOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'PutBucketVersioningOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'PutBucketWebsiteOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'PutObjectOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Expiration' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-expiration',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'ServerSideEncryption' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'VersionId' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-version-id',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
                'ObjectURL' => array(
                ),
            ),
        ),
        'PutObjectAclOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'RestoreObjectOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'UploadPartOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ServerSideEncryption' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'UploadPartCopyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CopySourceVersionId' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-version-id',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModified' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ServerSideEncryption' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
    ),
    'waiters' => array(
        '__default__' => array(
            'interval' => 5,
            'max_attempts' => 20,
        ),
        'BucketExists' => array(
            'operation' => 'HeadBucket',
            'success.type' => 'output',
            'ignore_errors' => array(
                'NoSuchBucket',
            ),
        ),
        'BucketNotExists' => array(
            'operation' => 'HeadBucket',
            'success.type' => 'error',
            'success.value' => 'NoSuchBucket',
        ),
        'ObjectExists' => array(
            'operation' => 'HeadObject',
            'success.type' => 'output',
            'ignore_errors' => array(
                'NoSuchKey',
            ),
        ),
    ),
);
