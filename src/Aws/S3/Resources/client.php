<?php
return array (
    'name' => 's3',
    'apiVersion' => '2006-03-01',
    'operations' => array(
        'AbortMultipartUpload' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
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
                ),
                'UploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'uploadId',
                ),
            ),
        ),
        'CompleteMultipartUpload' => array(
            'httpMethod' => 'POST',
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CompleteMultipartUploadOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadComplete.html',
            'data' => array(
                'root' => 'MultipartUpload',
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
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
                ),
                'UploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'uploadId',
                ),
                'Parts' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'flatArray' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'Part',
                        'properties' => array(
                            'PartNumber' => array(
                                'description' => 'Part number that identifies the part.',
                                'type' => 'numeric',
                            ),
                            'ETag' => array(
                                'description' => 'Entity tag returned when the part was uploaded.',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CopyObject' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{DestinationBucket}/{DestinationObject}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CopyObjectOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectCOPY.html',
            'data' => array(
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
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
                ),
                'DestinationBucket' => array(
                    'required' => true,
                    'description' => 'Destination bucket',
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'DestinationObject' => array(
                    'required' => true,
                    'description' => 'Destination object key',
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'MetadataDirective' => array(
                    'description' => 'Specifies whether the metadata is copied from the source object or replaced with metadata provided in the request.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-metadata-directive',
                ),
                'WebsiteRedirectLocation' => array(
                    'description' => 'If the bucket is configured as a website, redirects requests for this object to another object in the same bucket or to an external URL.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-website-redirect-location',
                ),
                'ACL' => array(
                    'description' => 'The canned ACL to apply to the bucket.',
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
                'GrantRead' => array(
                    'description' => 'Allows grantee to list the objects in the bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read',
                ),
                'GrantWrite' => array(
                    'description' => 'Allows grantee to create, overwrite, and delete any object in the bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write',
                ),
                'GrantReadACP' => array(
                    'description' => 'Allows grantee to read the bucket ACL.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read-acp',
                ),
                'GrantWriteACP' => array(
                    'description' => 'Allows grantee to write the ACL for the applicable bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write-acp',
                ),
                'GrantFullControl' => array(
                    'description' => 'Allows grantee the read, write, read ACP, and write ACP permissions on the bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-full-control',
                ),
                'ServerSideEncryption' => array(
                    'description' => 'The Server-side encryption algorithm used when storing this object in S3.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                    'enum' => array(
                        'AES256',
                    ),
                ),
                'StorageClass' => array(
                    'description' => 'The class of storage used to store the object.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-storage-class',
                ),
                'CopySource' => array(
                    'required' => true,
                    'description' => 'The name of the source bucket and key name of the source object, separated by a slash (/). Must be URL-encoded.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source',
                ),
                'CopySourceIfMatch' => array(
                    'description' => 'Copies the object if its entity tag (ETag) matches the specified tag.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-match',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'CopySourceIfNoneMatch' => array(
                    'description' => 'Copies the object if its entity tag (ETag) is different than the specified ETag.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-none-match',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'CopySourceIfUnmodifiedSince' => array(
                    'description' => 'Copies the object if it hasn\'\'t been modified since the specified time.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-unmodified-since',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'CopySourceIfModifiedSince' => array(
                    'description' => 'Copies the object if it has been modified since the specified time.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-modified-since',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateBucket' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUT.html',
            'data' => array(
                'root' => 'CreateBucketConfiguration',
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'LocationConstraint' => array(
                    'description' => 'Specifies the region where the bucket will be created.',
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
                'ACL' => array(
                    'description' => 'The canned ACL to apply to the bucket.',
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
                'GrantRead' => array(
                    'description' => 'Allows grantee to list the objects in the bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read',
                ),
                'GrantWrite' => array(
                    'description' => 'Allows grantee to create, overwrite, and delete any object in the bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write',
                ),
                'GrantReadACP' => array(
                    'description' => 'Allows grantee to read the bucket ACL.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read-acp',
                ),
                'GrantWriteACP' => array(
                    'description' => 'Allows grantee to write the ACL for the applicable bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write-acp',
                ),
                'GrantFullControl' => array(
                    'description' => 'Allows grantee the read, write, read ACP, and write ACP permissions on the bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-full-control',
                ),
            ),
        ),
        'CreateMultipartUpload' => array(
            'httpMethod' => 'POST',
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateMultipartUploadOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadInitiate.html',
            'data' => array(
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
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
                ),
                'CacheControl' => array(
                    'description' => 'Can be used to specify caching behavior along the request/reply chain.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Cache-Control',
                ),
                'ContentDisposition' => array(
                    'description' => 'Specifies presentational information for the object.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Disposition',
                ),
                'ContentEncoding' => array(
                    'description' => 'Specifies what content encodings have been applied to the object and thus what decoding mechanisms must be applied to obtain the media-type referenced by the Content-Type header field.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Encoding',
                ),
                'ContentType' => array(
                    'description' => 'A standard MIME type describing the format of the object data.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Type',
                ),
                'Expires' => array(
                    'description' => 'The date and time at which the object is no longer cacheable.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'StorageClass' => array(
                    'description' => 'The type of storage to use for the object.    Defaults to \'STANDARD\'.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-storage-class',
                    'enum' => array(
                        'STANDARD',
                        'REDUCED_REDUNDANCY',
                    ),
                ),
                'WebsiteRedirectLocation' => array(
                    'description' => 'If the bucket is configured as a website, redirects requests for this object to another object in the same bucket or to an external URL. Amazon S3 stores the value of this header in the object metadata.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-website-redirect-location',
                ),
                'ACL' => array(
                    'description' => 'The canned ACL to apply to the object.',
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
                'GrantRead' => array(
                    'description' => 'Allows grantee to read the object data and its metadata.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read',
                ),
                'GrantReadACP' => array(
                    'description' => 'Allows grantee to read the object ACL.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read-acp',
                ),
                'GrantWriteACP' => array(
                    'description' => 'Allows grantee to write the ACL for the applicable object.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write-acp',
                ),
                'GrantFullControl' => array(
                    'description' => 'Gives the grantee READ, READ_ACP, and WRITE_ACP permissions on the object.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-full-control',
                ),
                'ServerSideEncryption' => array(
                    'description' => 'The Server-side encryption algorithm used when storing this object in S3.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                    'enum' => array(
                        'AES256',
                    ),
                ),
                'Metadata' => array(
                    'description' => 'A map of metadata to store with the object in S3.',
                    'type' => 'object',
                    'location' => 'header',
                    'sentAs' => 'x-amz-meta-',
                    'additionalProperties' => array(
                        'description' => 'The metadata value.',
                        'type' => 'string',
                    ),
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'uploads',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'DeleteBucket' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
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
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
                ),
            ),
        ),
        'DeleteObjects' => array(
            'httpMethod' => 'POST',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DeleteObjectsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/multiobjectdeleteapi.html',
            'data' => array(
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Delete' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quiet' => array(
                            'description' => 'Element to enable quiet mode for the request. When you add this element, you must set its value to true.',
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanToString',
                            ),
                        ),
                        'Objects' => array(
                            'required' => true,
                            'type' => 'array',
                            'data' => array(
                                'flatArray' => true,
                            ),
                            'items' => array(
                                'type' => 'object',
                                'sentAs' => 'Object',
                                'properties' => array(
                                    'Key' => array(
                                        'required' => true,
                                        'description' => 'Key name of the object to delete.',
                                        'type' => 'string',
                                    ),
                                    'VersionId' => array(
                                        'description' => 'VersionId for the specific version of the object to delete.',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'MFA' => array(
                    'description' => 'The concatenation of the authentication device\'\'s serial number, a space, and the value that is displayed on your authentication device.',
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
            ),
        ),
        'GetBucketAcl' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
            ),
        ),
        'GetBucketCors' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
            ),
        ),
        'GetBucketLifecycle' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
            ),
        ),
        'GetBucketLocation' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
            ),
        ),
        'GetBucketNotification' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
            ),
        ),
        'GetBucketPolicy' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
            ),
        ),
        'GetBucketTagging' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
            ),
        ),
        'GetBucketVersioning' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
            ),
        ),
        'GetBucketWebsite' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
            ),
        ),
        'GetObject' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetObjectOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectGET.html',
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
                ),
                'ResponseContentType' => array(
                    'description' => 'Sets the Content-Type header of the response.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'response-content-type',
                ),
                'ResponseContentLanguage' => array(
                    'description' => 'Sets the Content-Language header of the response.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'response-content-language',
                ),
                'ResponseExpires' => array(
                    'description' => 'Sets the Expires header of the response.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'response-expires',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'ResponseCacheControl' => array(
                    'description' => 'Sets the Cache-Control header of the response.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'response-cache-control',
                ),
                'ResponseContentDisposition' => array(
                    'description' => 'Sets the Content-Disposition header of the response',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'response-content-disposition',
                ),
                'ResponseContentEncoding' => array(
                    'description' => 'Sets the Content-Encoding header of the response.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'response-content-encoding',
                ),
                'VersionId' => array(
                    'description' => 'VersionId used to reference a specific version of the object.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'versionId',
                ),
                'Range' => array(
                    'description' => 'Downloads the specified range bytes of an object. For more information about the HTTP Range header, go to http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.35.',
                    'type' => 'string',
                    'location' => 'header',
                ),
                'IfModifiedSince' => array(
                    'description' => 'Return the object only if it has been modified since the specified time, otherwise return a 304 (not modified).',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'If-Modified-Since',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'IfUnmodifiedSince' => array(
                    'description' => 'Return the object only if it has not been modified since the specified time, otherwise return a 412 (precondition failed).',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'If-Unmodified-Since',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'IfMatch' => array(
                    'description' => 'Return the object only if its entity tag (ETag) is the same as the one specified, otherwise return a 412 (precondition failed).',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
                'IfNoneMatch' => array(
                    'description' => 'Return the object only if its entity tag (ETag) is different from the one specified, otherwise return a 304 (not modified).',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-None-Match',
                ),
                'Metadata' => array(
                    'description' => 'A map of metadata to store with the object in S3.',
                    'type' => 'object',
                    'location' => 'header',
                    'sentAs' => 'x-amz-meta-',
                    'additionalProperties' => array(
                        'description' => 'The metadata value.',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'GetObjectAcl' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
                ),
                'VersionId' => array(
                    'description' => 'VersionId used to reference a specific version of the object.',
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
            ),
        ),
        'GetObjectTorrent' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketHEAD.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
        ),
        'HeadObject' => array(
            'httpMethod' => 'HEAD',
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'HeadObjectOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectHEAD.html',
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
                ),
                'VersionId' => array(
                    'description' => 'VersionId used to reference a specific version of the object.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'versionId',
                ),
                'Range' => array(
                    'description' => 'Downloads the specified range bytes of an object. For more information about the HTTP Range header, go to http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.35.',
                    'type' => 'string',
                    'location' => 'header',
                ),
                'IfModifiedSince' => array(
                    'description' => 'Return the object only if it has been modified since the specified time, otherwise return a 304 (not modified).',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'If-Modified-Since',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'IfUnmodifiedSince' => array(
                    'description' => 'Return the object only if it has not been modified since the specified time, otherwise return a 412 (precondition failed).',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'If-Unmodified-Since',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'IfMatch' => array(
                    'description' => 'Return the object only if its entity tag (ETag) is the same as the one specified, otherwise return a 412 (precondition failed).',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
                'IfNoneMatch' => array(
                    'description' => 'Return the object only if its entity tag (ETag) is different from the one specified, otherwise return a 304 (not modified).',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-None-Match',
                ),
                'Metadata' => array(
                    'description' => 'A map of metadata to store with the object in S3.',
                    'type' => 'object',
                    'location' => 'header',
                    'sentAs' => 'x-amz-meta-',
                    'additionalProperties' => array(
                        'description' => 'The metadata value.',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'ListBuckets' => array(
            'httpMethod' => 'Get',
            'uri' => '/',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListBucketsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTServiceGET.html',
            'parameters' => array(
            ),
        ),
        'ListMultipartUploads' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListMultipartUploadsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadListMPUpload.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Prefix' => array(
                    'description' => 'Lists in-progress uploads only for those keys that begin with the specified prefix.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'prefix',
                ),
                'Delimiter' => array(
                    'description' => 'Character you use to group keys.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'delimiter',
                ),
                'MaxUploads' => array(
                    'description' => 'Sets the maximum number of multipart uploads, from 1 to 1,000, to return in the response body. 1,000 is the maximum number of uploads that can be returned in a response.',
                    'type' => 'numeric',
                    'location' => 'query',
                    'sentAs' => 'max-uploads',
                ),
                'KeyMarker' => array(
                    'description' => 'Together with upload-id-marker, this parameter specifies the multipart upload after which listing should begin.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'key-marker',
                ),
                'UploadIdMarker' => array(
                    'description' => 'Together with key-marker, specifies the multipart upload after which listing should begin. If key-marker is not specified, the upload-id-marker parameter is ignored.',
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
            ),
        ),
        'ListObjectVersions' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListObjectVersionsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGETVersion.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'KeyMarker' => array(
                    'description' => 'Specifies the key to start with when listing objects in a bucket.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'key-marker',
                ),
                'VersionIdMarker' => array(
                    'description' => 'Specifies the object version you want to start listing from.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxKeys' => array(
                    'description' => 'Sets the maximum number of keys returned in the response. The response might contain fewer keys but will never contain more.',
                    'type' => 'numeric',
                    'location' => 'query',
                    'sentAs' => 'max-keys',
                ),
                'Delimiter' => array(
                    'description' => 'A delimiter is a character you use to group keys.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'delimiter',
                ),
                'Prefix' => array(
                    'description' => 'Limits the response to keys that begin with the specified prefix.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'prefix',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'versions',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'ListObjects' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListObjectsOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketGET.html',
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Marker' => array(
                    'description' => 'Specifies the key to start with when listing objects in a bucket.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'marker',
                ),
                'MaxKeys' => array(
                    'description' => 'Sets the maximum number of keys returned in the response. The response might contain fewer keys but will never contain more.',
                    'type' => 'numeric',
                    'location' => 'query',
                    'sentAs' => 'max-keys',
                ),
                'Delimiter' => array(
                    'description' => 'A delimiter is a character you use to group keys.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'delimiter',
                ),
                'Prefix' => array(
                    'description' => 'Limits the response to keys that begin with the specified prefix.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'prefix',
                ),
            ),
        ),
        'ListParts' => array(
            'httpMethod' => 'GET',
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
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
                ),
                'UploadId' => array(
                    'required' => true,
                    'description' => 'Upload ID identifying the multipart upload whose parts are being listed.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'uploadId',
                ),
                'MaxParts' => array(
                    'description' => 'Sets the maximum number of parts to return.',
                    'type' => 'numeric',
                    'location' => 'query',
                    'sentAs' => 'max-parts',
                ),
                'PartNumberMarker' => array(
                    'description' => 'Specifies the part after which listing should begin. Only parts with higher part numbers will be listed.',
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'part-number-marker',
                ),
            ),
        ),
        'PutBucketAcl' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTacl.html',
            'data' => array(
                'root' => 'AccessControlPolicy',
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
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
                'Grants' => array(
                    'description' => 'A list of grants.',
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
                                    'Type' => array(
                                        'required' => true,
                                        'description' => 'Type of grantee',
                                        'type' => 'string',
                                        'sentAs' => 'type',
                                        'enum' => array(
                                            'CanonicalUser',
                                            'AmazonCustomerByEmail',
                                            'Group',
                                        ),
                                    ),
                                    'ID' => array(
                                        'description' => 'The canonical user ID of the grantee.',
                                        'type' => 'string',
                                    ),
                                    'DisplayName' => array(
                                        'description' => 'Screen name of the grantee.',
                                        'type' => 'string',
                                    ),
                                    'EmailAddress' => array(
                                        'description' => 'Email address of the grantee.',
                                        'type' => 'string',
                                    ),
                                    'URI' => array(
                                        'description' => 'URI of the grantee group.',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Permission' => array(
                                'description' => 'Specifies the permission given to the grantee.',
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
                'ACL' => array(
                    'description' => 'The canned ACL to apply to the bucket.',
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
                'GrantRead' => array(
                    'description' => 'Allows grantee to list the objects in the bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read',
                ),
                'GrantWrite' => array(
                    'description' => 'Allows grantee to create, overwrite, and delete any object in the bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write',
                ),
                'GrantReadACP' => array(
                    'description' => 'Allows grantee to read the bucket ACL.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read-acp',
                ),
                'GrantWriteACP' => array(
                    'description' => 'Allows grantee to write the ACL for the applicable bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write-acp',
                ),
                'GrantFullControl' => array(
                    'description' => 'Allows grantee the read, write, read ACP, and write ACP permissions on the bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-full-control',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'acl',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'PutBucketCors' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTcors.html',
            'data' => array(
                'root' => 'CORSConfiguration',
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
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
                        'flatArray' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'CORSRule',
                        'properties' => array(
                            'AllowedOrigins' => array(
                                'description' => 'One or more origins you want customers to be able to access the bucket from.',
                                'type' => 'array',
                                'data' => array(
                                    'flatArray' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                    'sentAs' => 'AllowedOrigin',
                                ),
                            ),
                            'AllowedMethods' => array(
                                'description' => 'Identifies HTTP methods that the domain/origin specified in the rule is allowed to execute.',
                                'type' => 'array',
                                'data' => array(
                                    'flatArray' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                    'sentAs' => 'AllowedMethod',
                                ),
                            ),
                            'MaxAgeSeconds' => array(
                                'description' => 'The time in seconds that your browser is to cache the preflight response for the specified resource.',
                                'type' => 'numeric',
                            ),
                            'ExposeHeaders' => array(
                                'description' => 'One or more headers in the response that you want customers to be able to access from their applications (for example, from a JavaScript XMLHttpRequest object).',
                                'type' => 'array',
                                'data' => array(
                                    'flatArray' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                    'sentAs' => 'ExposeHeader',
                                ),
                            ),
                        ),
                    ),
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTlifecycle.html',
            'data' => array(
                'root' => 'LifecycleConfiguration',
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Rules' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'flatArray' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'sentAs' => 'Rule',
                        'properties' => array(
                            'ID' => array(
                                'description' => 'Unique identifier for the rule. The value cannot be longer than 255 characters.',
                                'type' => 'string',
                            ),
                            'Prefix' => array(
                                'required' => true,
                                'description' => 'Prefix identifying one or more objects to which the rule applies.',
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'required' => true,
                                'description' => 'If \'Enabled\', the rule is currently being applied. If \'Disabled\', the rule is not currently being applied.',
                                'type' => 'string',
                                'enum' => array(
                                    'Enabled',
                                    'Disabled',
                                ),
                            ),
                            'Expiration' => array(
                                'required' => true,
                                'type' => 'object',
                                'properties' => array(
                                    'Days' => array(
                                        'required' => true,
                                        'description' => 'Indicates the lifetime, in days, of the objects that are subject to the rule. The value must be a non-zero positive integer.',
                                        'type' => 'numeric',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTlogging.html',
            'data' => array(
                'root' => 'BucketLoggingStatus',
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'LogginEnabled' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'TargetBucket' => array(
                            'description' => 'Specifies the bucket where you want Amazon S3 to store server access logs. You can have your logs delivered to any bucket that you own, including the same bucket that is being logged. You can also configure multiple buckets to deliver their logs to the same target bucket. In this case you should choose a different TargetPrefix for each source bucket so that the delivered log files can be distinguished by key.',
                            'type' => 'string',
                        ),
                        'TargetPrefix' => array(
                            'description' => 'This element lets you specify a prefix for the keys that the log files will be stored under.',
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
                                            'Type' => array(
                                                'required' => true,
                                                'description' => 'Type of grantee',
                                                'type' => 'string',
                                                'sentAs' => 'type',
                                                'enum' => array(
                                                    'CanonicalUser',
                                                    'AmazonCustomerByEmail',
                                                    'Group',
                                                ),
                                            ),
                                            'ID' => array(
                                                'description' => 'The canonical user ID of the grantee.',
                                                'type' => 'string',
                                            ),
                                            'DisplayName' => array(
                                                'description' => 'Screen name of the grantee.',
                                                'type' => 'string',
                                            ),
                                            'EmailAddress' => array(
                                                'description' => 'Email address of the grantee.',
                                                'type' => 'string',
                                            ),
                                            'URI' => array(
                                                'description' => 'URI of the grantee group.',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTnotification.html',
            'data' => array(
                'root' => 'NotificationConfiguration',
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'TopicConfiguration' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Topic' => array(
                            'description' => 'Amazon SNS topic to which Amazon S3 will publish a message to report the specified events for the bucket.',
                            'type' => 'string',
                        ),
                        'Event' => array(
                            'description' => 'Bucket event for which to send notifications.',
                            'type' => 'string',
                            'enum' => array(
                                's3:ReducedRedundancyLostObject',
                            ),
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTpolicy.html',
            'data' => array(
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Policy' => array(
                    'required' => true,
                    'description' => 'The bucket policy as a JSON document.',
                    'type' => 'string',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTrequestPaymentPUT.html',
            'data' => array(
                'root' => 'RequestPaymentConfiguration',
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Payer' => array(
                    'required' => true,
                    'description' => 'Specifies who pays for the download and request fees.',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTtagging.html',
            'data' => array(
                'root' => 'Tagging',
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
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
                                'description' => 'Name of the tag.',
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'required' => true,
                                'description' => 'Value of the tag.',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTVersioningStatus.html',
            'data' => array(
                'root' => 'VersioningConfiguration',
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Status' => array(
                    'description' => 'The versioning state of the bucket.',
                    'type' => 'string',
                    'location' => 'xml',
                    'enum' => array(
                        'Enabled',
                        'Disabled',
                    ),
                ),
                'MFADelete' => array(
                    'description' => 'Specifies whether MFA delete is enabled in the bucket versioning configuration. This element is only returned if the bucket has been configured with MFA delete. If the bucket has never been so configured, this element is not returned.',
                    'type' => 'string',
                    'location' => 'xml',
                    'enum' => array(
                        'Enabled',
                        'Disabled',
                    ),
                ),
                'MFA' => array(
                    'description' => 'The value is the concatenation of the authentication device\'\'s serial number, a space, and the value displayed on your authentication device.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-mfa',
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
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTwebsite.html',
            'data' => array(
                'root' => 'WebsiteConfiguration',
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
            ),
            'parameters' => array(
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IndexDocument' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Suffix' => array(
                            'required' => true,
                            'description' => 'A suffix that is appended to a request that is for a directory on the website endpoint (e.g. if the suffix is index.html and you make a request to samplebucket/images/ the data that is returned will be for the object with the key name images/index.html) The suffix must not be empty and must not include a slash character.',
                            'type' => 'string',
                        ),
                    ),
                ),
                'ErrorDocument' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Key' => array(
                            'required' => true,
                            'description' => 'The object key name to use when a 4XX class error occurs.',
                            'type' => 'string',
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
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'PutObjectOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectPUT.html',
            'data' => array(
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
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
                ),
                'CacheControl' => array(
                    'description' => 'Can be used to specify caching behavior along the request/reply chain.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Cache-Control',
                ),
                'ContentDisposition' => array(
                    'description' => 'Specifies presentational information for the object.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Disposition',
                ),
                'ContentEncoding' => array(
                    'description' => 'Specifies what content encodings have been applied to the object and thus what decoding mechanisms must be applied to obtain the media-type referenced by the Content-Type header field.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Encoding',
                ),
                'ContentType' => array(
                    'description' => 'A standard MIME type describing the format of the object data.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Type',
                ),
                'Expires' => array(
                    'description' => 'The date and time at which the object is no longer cacheable.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'StorageClass' => array(
                    'description' => 'The type of storage to use for the object.    Defaults to \'STANDARD\'.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-storage-class',
                    'enum' => array(
                        'STANDARD',
                        'REDUCED_REDUNDANCY',
                    ),
                ),
                'WebsiteRedirectLocation' => array(
                    'description' => 'If the bucket is configured as a website, redirects requests for this object to another object in the same bucket or to an external URL. Amazon S3 stores the value of this header in the object metadata.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-website-redirect-location',
                ),
                'Body' => array(
                    'type' => 'string',
                    'location' => 'body',
                ),
                'ACL' => array(
                    'description' => 'The canned ACL to apply to the object.',
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
                'GrantRead' => array(
                    'description' => 'Allows grantee to read the object data and its metadata.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read',
                ),
                'GrantReadACP' => array(
                    'description' => 'Allows grantee to read the object ACL.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read-acp',
                ),
                'GrantWriteACP' => array(
                    'description' => 'Allows grantee to write the ACL for the applicable object.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write-acp',
                ),
                'GrantFullControl' => array(
                    'description' => 'Gives the grantee READ, READ_ACP, and WRITE_ACP permissions on the object.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-full-control',
                ),
                'ServerSideEncryption' => array(
                    'description' => 'The Server-side encryption algorithm used when storing this object in S3.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                    'enum' => array(
                        'AES256',
                    ),
                ),
                'Metadata' => array(
                    'description' => 'A map of metadata to store with the object in S3.',
                    'type' => 'object',
                    'location' => 'header',
                    'sentAs' => 'x-amz-meta-',
                    'additionalProperties' => array(
                        'description' => 'The metadata value.',
                        'type' => 'string',
                    ),
                ),
                'ContentMD5' => array(
                    'description' => 'Content-MD5 checksum of the body. Set to false to disable',
                    'default' => true,
                ),
            ),
        ),
        'PutObjectAcl' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'The result of this operation will be an empty model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectPUTacl.html',
            'data' => array(
                'root' => 'AccessControlPolicy',
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
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
                'Grants' => array(
                    'description' => 'A list of grants.',
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
                                    'Type' => array(
                                        'required' => true,
                                        'description' => 'Type of grantee',
                                        'type' => 'string',
                                        'sentAs' => 'type',
                                        'enum' => array(
                                            'CanonicalUser',
                                            'AmazonCustomerByEmail',
                                            'Group',
                                        ),
                                    ),
                                    'ID' => array(
                                        'description' => 'The canonical user ID of the grantee.',
                                        'type' => 'string',
                                    ),
                                    'DisplayName' => array(
                                        'description' => 'Screen name of the grantee.',
                                        'type' => 'string',
                                    ),
                                    'EmailAddress' => array(
                                        'description' => 'Email address of the grantee.',
                                        'type' => 'string',
                                    ),
                                    'URI' => array(
                                        'description' => 'URI of the grantee group.',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Permission' => array(
                                'description' => 'Specifies the permission given to the grantee.',
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
                'ACL' => array(
                    'description' => 'The canned ACL to apply to the bucket.',
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
                'GrantRead' => array(
                    'description' => 'Allows grantee to list the objects in the bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read',
                ),
                'GrantWrite' => array(
                    'description' => 'Allows grantee to create, overwrite, and delete any object in the bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write',
                ),
                'GrantReadACP' => array(
                    'description' => 'Allows grantee to read the bucket ACL.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-read-acp',
                ),
                'GrantWriteACP' => array(
                    'description' => 'Allows grantee to write the ACL for the applicable bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-write-acp',
                ),
                'GrantFullControl' => array(
                    'description' => 'Allows grantee the read, write, read ACP, and write ACP permissions on the bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-grant-full-control',
                ),
                'SubResource' => array(
                    'required' => true,
                    'static' => true,
                    'location' => 'query',
                    'sentAs' => 'acl',
                    'default' => '_guzzle_blank_',
                ),
            ),
        ),
        'UploadPart' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UploadPartOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadUploadPart.html',
            'data' => array(
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
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
                ),
                'Body' => array(
                    'type' => 'string',
                    'location' => 'body',
                ),
                'ContentMD5' => array(
                    'description' => 'Content-MD5 checksum of the body. Set to false to disable',
                    'default' => true,
                ),
            ),
        ),
        'UploadPartCopy' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{Bucket}/{Key}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UploadPartCopyOutput',
            'responseType' => 'model',
            'documentationUrl' => 'http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadUploadPartCopy.html',
            'data' => array(
                'ns' => 'http://s3.amazonaws.com/doc/2006-03-01/',
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
                ),
                'CopySourceRange' => array(
                    'description' => 'The range of bytes to copy from the source object. The range value must use the form bytes=first-last, where the first and last are the zero-based byte offsets to copy. For example, bytes=0-9 indicates that you want to copy the first ten bytes of the source. You can copy a range only if the source object is greater than 5 GB.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-range',
                ),
                'CopySource' => array(
                    'required' => true,
                    'description' => 'The name of the source bucket and key name of the source object, separated by a slash (/). Must be URL-encoded.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source',
                ),
                'CopySourceIfMatch' => array(
                    'description' => 'Copies the object if its entity tag (ETag) matches the specified tag.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-match',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'CopySourceIfNoneMatch' => array(
                    'description' => 'Copies the object if its entity tag (ETag) is different than the specified ETag.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-none-match',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'CopySourceIfUnmodifiedSince' => array(
                    'description' => 'Copies the object if it hasn\'\'t been modified since the specified time.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-unmodified-since',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
                'CopySourceIfModifiedSince' => array(
                    'description' => 'Copies the object if it has been modified since the specified time.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-if-modified-since',
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\Filters::getDate',
                            'args' => array(
                                '@value',
                                'D, d M y H:i:s O',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'CompleteMultipartUploadOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Expiration' => array(
                    'description' => 'If the object expiration is configured, this will contain the expiration date (expiry-date) and rule ID (rule-id). The value of rule-id is URL encoded.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'x-amz-expiration',
                ),
                'ServerSideEncryption' => array(
                    'description' => 'The Server-side encryption algorithm used when storing this object in S3.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'ETag' => array(
                    'description' => 'Entity tag for the uploaded object.',
                    'type' => 'string',
                    'location' => 'header',
                ),
                'VersionId' => array(
                    'description' => 'Version of the object.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-version-id',
                ),
            ),
        ),
        'CopyObjectOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CopyObjectResult' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ETag' => array(
                            'type' => 'string',
                        ),
                        'LastModified' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Expiration' => array(
                    'description' => 'If the object expiration is configured, the response includes this header.',
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
                    'description' => 'The Server-side encryption algorithm used when storing this object in S3.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
            ),
        ),
        'CreateMultipartUploadOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Bucket' => array(
                    'description' => 'Name of the bucket to which the multipart upload was initiated.',
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'Bucket',
                ),
                'Key' => array(
                    'description' => 'Object key for which the multipart upload was initiated.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'UploadId' => array(
                    'description' => 'ID for the initiated multipart upload.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ServerSideEncryption' => array(
                    'description' => 'The Server-side encryption algorithm used when storing this object in S3.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
            ),
        ),
        'DeleteObjectOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DeleteMarker' => array(
                    'description' => 'Specifies whether the versioned object that was permanently deleted was (true) or was not (false) a delete marker.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-delete-marker',
                ),
                'VersionId' => array(
                    'description' => 'Returns the version ID of the delete marker created as a result of the DELETE operation.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-version-id',
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
                        'flatArray' => true,
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
                        'flatArray' => true,
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
                            'Code' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
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
                    'description' => 'A list of grants.',
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
                                        'description' => 'Type of grantee',
                                        'type' => 'string',
                                        'sentAs' => 'type',
                                    ),
                                    'ID' => array(
                                        'description' => 'The canonical user ID of the grantee.',
                                        'type' => 'string',
                                    ),
                                    'DisplayName' => array(
                                        'description' => 'Screen name of the grantee.',
                                        'type' => 'string',
                                    ),
                                    'EmailAddress' => array(
                                        'description' => 'Email address of the grantee.',
                                        'type' => 'string',
                                    ),
                                    'URI' => array(
                                        'description' => 'URI of the grantee group.',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Permission' => array(
                                'description' => 'Specifies the permission given to the grantee.',
                                'type' => 'string',
                            ),
                        ),
                    ),
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
                        'flatArray' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'AllowedOrigins' => array(
                                'description' => 'One or more origins you want customers to be able to access the bucket from.',
                                'type' => 'array',
                                'sentAs' => 'AllowedOrigin',
                                'data' => array(
                                    'flatArray' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'AllowedMethods' => array(
                                'description' => 'Identifies HTTP methods that the domain/origin specified in the rule is allowed to execute.',
                                'type' => 'array',
                                'sentAs' => 'AllowedMethod',
                                'data' => array(
                                    'flatArray' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'MaxAgeSeconds' => array(
                                'description' => 'The time in seconds that your browser is to cache the preflight response for the specified resource.',
                                'type' => 'numeric',
                            ),
                            'ExposeHeaders' => array(
                                'description' => 'One or more headers in the response that you want customers to be able to access from their applications (for example, from a JavaScript XMLHttpRequest object).',
                                'type' => 'array',
                                'sentAs' => 'ExposeHeader',
                                'data' => array(
                                    'flatArray' => true,
                                ),
                                'items' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
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
                        'flatArray' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'ID' => array(
                                'description' => 'Unique identifier for the rule. The value cannot be longer than 255 characters.',
                                'type' => 'string',
                            ),
                            'Prefix' => array(
                                'description' => 'Prefix identifying one or more objects to which the rule applies.',
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'description' => 'If \'Enabled\', the rule is currently being applied. If \'Disabled\', the rule is not currently being applied.',
                                'type' => 'string',
                            ),
                            'Expiration' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Days' => array(
                                        'description' => 'Indicates the lifetime, in days, of the objects that are subject to the rule. The value must be a non-zero positive integer.',
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetBucketLoggingOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LogginEnabled' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'TargetBucket' => array(
                            'description' => 'Specifies the bucket where you want Amazon S3 to store server access logs. You can have your logs delivered to any bucket that you own, including the same bucket that is being logged. You can also configure multiple buckets to deliver their logs to the same target bucket. In this case you should choose a different TargetPrefix for each source bucket so that the delivered log files can be distinguished by key.',
                            'type' => 'string',
                        ),
                        'TargetPrefix' => array(
                            'description' => 'This element lets you specify a prefix for the keys that the log files will be stored under.',
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
                                                'description' => 'Type of grantee',
                                                'type' => 'string',
                                                'sentAs' => 'type',
                                            ),
                                            'ID' => array(
                                                'description' => 'The canonical user ID of the grantee.',
                                                'type' => 'string',
                                            ),
                                            'DisplayName' => array(
                                                'description' => 'Screen name of the grantee.',
                                                'type' => 'string',
                                            ),
                                            'EmailAddress' => array(
                                                'description' => 'Email address of the grantee.',
                                                'type' => 'string',
                                            ),
                                            'URI' => array(
                                                'description' => 'URI of the grantee group.',
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
                            'description' => 'Amazon SNS topic to which Amazon S3 will publish a message to report the specified events for the bucket.',
                            'type' => 'string',
                        ),
                        'Event' => array(
                            'description' => 'Bucket event for which to send notifications.',
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetBucketPolicyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Policy' => array(
                    'description' => 'The bucket policy as a JSON document.',
                    'type' => 'string',
                    'location' => 'body',
                ),
            ),
        ),
        'GetBucketRequestPaymentOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Payer' => array(
                    'description' => 'Specifies who pays for the download and request fees.',
                    'type' => 'string',
                    'location' => 'xml',
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
                                'description' => 'Name of the tag.',
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'description' => 'Value of the tag.',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetBucketVersioningOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Status' => array(
                    'description' => 'The versioning state of the bucket.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MFADelete' => array(
                    'description' => 'Specifies whether MFA delete is enabled in the bucket versioning configuration. This element is only returned if the bucket has been configured with MFA delete. If the bucket has never been so configured, this element is not returned.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetBucketWebsiteOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IndexDocument' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Suffix' => array(
                            'description' => 'A suffix that is appended to a request that is for a directory on the website endpoint (e.g. if the suffix is index.html and you make a request to samplebucket/images/ the data that is returned will be for the object with the key name images/index.html) The suffix must not be empty and must not include a slash character.',
                            'type' => 'string',
                        ),
                    ),
                ),
                'ErrorDocument' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Key' => array(
                            'description' => 'The object key name to use when a 4XX class error occurs.',
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetObjectOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ValidateMD5' => array(
                    'description' => 'Whether or not the Content-MD5 header of the response is validated. Default is true.',
                    'default' => true,
                ),
                'Body' => array(
                    'description' => 'Object data.',
                    'type' => 'string',
                    'location' => 'body',
                ),
                'DeleteMarker' => array(
                    'description' => 'Specifies whether the object retrieved was (true) or was not (false) a Delete Marker. If false, this response header does not appear in the response.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-delete-marker',
                ),
                'Expiration' => array(
                    'description' => 'If the object expiration is configured (see PUT Bucket lifecycle), the response includes this header. It includes the expiry-date and rule-id key value pairs providing object expiration information. The value of the rule-id is URL encoded.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-expiration',
                ),
                'WebsiteRedirectLocation' => array(
                    'description' => 'When a bucket is configured as a website, you can set this metadata on the object so the website endpoint will evaluate the request for the object as a 301 redirect to another object in the same bucket or an external URL.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-redirect-location',
                ),
                'LastModified' => array(
                    'description' => 'Last modified date of the object',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'Last-Modified',
                ),
                'ContentType' => array(
                    'description' => 'Content type of the object',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Type',
                ),
                'ContentLength' => array(
                    'description' => 'Size of the body in bytes.',
                    'type' => 'numeric',
                    'location' => 'header',
                    'sentAs' => 'Content-Length',
                ),
                'ETag' => array(
                    'description' => 'An ETag is an opaque identifier assigned by a web server to a specific version of a resource found at a URL',
                    'type' => 'string',
                    'location' => 'header',
                ),
                'MissingMeta' => array(
                    'description' => 'This is set to the number of metadata entries not returned in x-amz-meta headers. This can happen if you create metadata using an API like SOAP that supports more flexible metadata than the REST API. For example, using SOAP, you can create metadata whose values are not legal HTTP headers.',
                    'type' => 'numeric',
                    'location' => 'x-amz-missing-meta',
                ),
                'ServerSideEncryption' => array(
                    'description' => 'The Server-side encryption algorithm used when storing this object in S3.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'VersionId' => array(
                    'description' => 'Version of the object.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-version-id',
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
                    'description' => 'A list of grants.',
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
                                        'description' => 'Type of grantee',
                                        'type' => 'string',
                                        'sentAs' => 'type',
                                    ),
                                    'ID' => array(
                                        'description' => 'The canonical user ID of the grantee.',
                                        'type' => 'string',
                                    ),
                                    'DisplayName' => array(
                                        'description' => 'Screen name of the grantee.',
                                        'type' => 'string',
                                    ),
                                    'EmailAddress' => array(
                                        'description' => 'Email address of the grantee.',
                                        'type' => 'string',
                                    ),
                                    'URI' => array(
                                        'description' => 'URI of the grantee group.',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Permission' => array(
                                'description' => 'Specifies the permission given to the grantee.',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetObjectTorrentOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ValidateMD5' => array(
                    'description' => 'Whether or not the Content-MD5 header of the response is validated. Default is true.',
                    'default' => true,
                ),
                'Body' => array(
                    'type' => 'string',
                    'location' => 'body',
                ),
            ),
        ),
        'HeadObjectOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DeleteMarker' => array(
                    'description' => 'Specifies whether the object retrieved was (true) or was not (false) a Delete Marker. If false, this response header does not appear in the response.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-delete-marker',
                ),
                'Expiration' => array(
                    'description' => 'If the object expiration is configured (see PUT Bucket lifecycle), the response includes this header. It includes the expiry-date and rule-id key value pairs providing object expiration information. The value of the rule-id is URL encoded.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-expiration',
                ),
                'WebsiteRedirectLocation' => array(
                    'description' => 'When a bucket is configured as a website, you can set this metadata on the object so the website endpoint will evaluate the request for the object as a 301 redirect to another object in the same bucket or an external URL.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-redirect-location',
                ),
                'LastModified' => array(
                    'description' => 'Last modified date of the object',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'Last-Modified',
                ),
                'ContentType' => array(
                    'description' => 'Content type of the object',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Type',
                ),
                'ContentLength' => array(
                    'description' => 'Size of the body in bytes.',
                    'type' => 'numeric',
                    'location' => 'header',
                    'sentAs' => 'Content-Length',
                ),
                'ETag' => array(
                    'description' => 'An ETag is an opaque identifier assigned by a web server to a specific version of a resource found at a URL',
                    'type' => 'string',
                    'location' => 'header',
                ),
                'MissingMeta' => array(
                    'description' => 'This is set to the number of metadata entries not returned in x-amz-meta headers. This can happen if you create metadata using an API like SOAP that supports more flexible metadata than the REST API. For example, using SOAP, you can create metadata whose values are not legal HTTP headers.',
                    'type' => 'numeric',
                    'location' => 'x-amz-missing-meta',
                ),
                'ServerSideEncryption' => array(
                    'description' => 'The Server-side encryption algorithm used when storing this object in S3.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'VersionId' => array(
                    'description' => 'Version of the object.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-version-id',
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
                                'description' => 'The name of the bucket.',
                                'type' => 'string',
                            ),
                            'CreationDate' => array(
                                'description' => 'Date the bucket was created.',
                                'type' => array(
                                    'object',
                                    'string',
                                ),
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
            ),
        ),
        'ListMultipartUploadsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Bucket' => array(
                    'description' => 'Name of the bucket to which the multipart upload was initiated.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'KeyMarker' => array(
                    'description' => 'The key at or after which the listing began.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'UploadIdMarker' => array(
                    'description' => 'Upload ID after which listing began.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextKeyMarker' => array(
                    'description' => 'When a list is truncated, this element specifies the value that should be used for the key-marker request parameter in a subsequent request.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextUploadIdMarker' => array(
                    'description' => 'When a list is truncated, this element specifies the value that should be used for the upload-id-marker request parameter in a subsequent request.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxUploads' => array(
                    'description' => 'Maximum number of multipart uploads that could have been included in the response.',
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'description' => 'Indicates whether the returned list of multipart uploads is truncated. A value of true indicates that the list was truncated. The list can be truncated if the number of multipart uploads exceeds the limit allowed or specified by max uploads.',
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Uploads' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'Upload',
                    'data' => array(
                        'flatArray' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'UploadId' => array(
                                'description' => 'Upload ID that identifies the multipart upload.',
                                'type' => 'string',
                            ),
                            'Key' => array(
                                'description' => 'Key of the object for which the multipart upload was initiated.',
                                'type' => 'string',
                            ),
                            'Initiated' => array(
                                'description' => 'Date and time at which the multipart upload was initiated.',
                                'type' => array(
                                    'object',
                                    'string',
                                ),
                            ),
                            'StorageClass' => array(
                                'description' => 'The class of storage used to store the object.',
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
                                'description' => 'Identifies who initiated the multipart upload.',
                                'type' => 'object',
                                'properties' => array(
                                    'ID' => array(
                                        'description' => 'If the principal is an AWS account, it provides the Canonical User ID. If the principal is an IAM User, it provides a user ARN value.',
                                        'type' => 'string',
                                    ),
                                    'DisplayName' => array(
                                        'description' => 'Name of the Principal.',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListObjectVersionsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'KeyMarker' => array(
                    'description' => 'Marks the last Key returned in a truncated response.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'VersionIdMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextKeyMarker' => array(
                    'description' => 'Use this value for the key marker request parameter in a subsequent request.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextVersionIdMarker' => array(
                    'description' => 'Use this value for the next version id marker parameter in a subsequent request.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Versions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'flatArray' => true,
                    ),
                    'items' => array(
                        'name' => 'Version',
                        'type' => 'object',
                        'sentAs' => 'Version',
                        'properties' => array(
                            'ETag' => array(
                                'type' => 'string',
                            ),
                            'Size' => array(
                                'description' => 'Size in bytes of the object.',
                                'type' => 'string',
                            ),
                            'StorageClass' => array(
                                'description' => 'The class of storage used to store the object.',
                                'type' => 'string',
                            ),
                            'Key' => array(
                                'description' => 'The object key.',
                                'type' => 'string',
                            ),
                            'VersionId' => array(
                                'description' => 'Version ID of an object.',
                                'type' => 'string',
                            ),
                            'IsLatest' => array(
                                'description' => 'Specifies whether the object is (true) or is not (false) the latest version of an object.',
                                'type' => 'boolean',
                            ),
                            'LastModified' => array(
                                'description' => 'Date and time the object was last modified.',
                                'type' => array(
                                    'object',
                                    'string',
                                ),
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
                    'data' => array(
                        'flatArray' => true,
                    ),
                    'items' => array(
                        'name' => 'DeleteMarker',
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
                                'description' => 'The object key.',
                                'type' => 'string',
                            ),
                            'VersionId' => array(
                                'description' => 'Version ID of an object.',
                                'type' => 'string',
                            ),
                            'IsLatest' => array(
                                'description' => 'Specifies whether the object is (true) or is not (false) the latest version of an object.',
                                'type' => 'boolean',
                            ),
                            'LastModified' => array(
                                'description' => 'Date and time the object was last modified.',
                                'type' => array(
                                    'object',
                                    'string',
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
                'IsTruncated' => array(
                    'description' => 'A flag that indicates whether (true) or not (false) Amazon S3 returned all of the results that satisfied the search criteria. If your results were truncated, you can make a follow-up paginated request using the NextKeyMarker and NextVersionIdMarker response parameters as a starting place in another request to return the rest of the results.',
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'CommonPrefixes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'flatArray' => true,
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
            ),
        ),
        'ListObjectsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Contents' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'flatArray' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'LastModified' => array(
                                'type' => array(
                                    'object',
                                    'string',
                                ),
                            ),
                            'ETag' => array(
                                'type' => 'string',
                            ),
                            'Size' => array(
                                'type' => 'numeric',
                            ),
                            'StorageClass' => array(
                                'description' => 'The class of storage used to store the object.',
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
                'IsTruncated' => array(
                    'description' => 'A flag that indicates whether (true) or not (false) Amazon S3 returned all of the results that satisfied the search criteria. If your results were truncated, you can make a follow-up paginated request using the NextKeyMarker and NextVersionIdMarker response parameters as a starting place in another request to return the rest of the results.',
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'CommonPrefixes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'data' => array(
                        'flatArray' => true,
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
            ),
        ),
        'ListPartsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Bucket' => array(
                    'description' => 'Name of the bucket to which the multipart upload was initiated.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Key' => array(
                    'description' => 'Object key for which the multipart upload was initiated.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'UploadId' => array(
                    'description' => 'Upload ID identifying the multipart upload whose parts are being listed.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'PartNumberMarker' => array(
                    'description' => 'Part number after which listing begins.',
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'NextPartNumberMarker' => array(
                    'description' => 'When a list is truncated, this element specifies the last part in the list, as well as the value to use for the part-number-marker request parameter in a subsequent request.',
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'MaxParts' => array(
                    'description' => 'Maximum number of parts that were allowed in the response.',
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'description' => 'Indicates whether the returned list of parts is truncated.',
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Parts' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'Part',
                    'data' => array(
                        'flatArray' => true,
                    ),
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'PartNumber' => array(
                                'description' => 'Part number identifying the part.',
                                'type' => 'numeric',
                            ),
                            'LastModified' => array(
                                'description' => 'Date and time at which the part was uploaded.',
                                'type' => array(
                                    'object',
                                    'string',
                                ),
                            ),
                            'ETag' => array(
                                'description' => 'Entity tag returned when the part was uploaded.',
                                'type' => 'string',
                            ),
                            'Size' => array(
                                'description' => 'Size of the uploaded part data.',
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'Initiator' => array(
                    'description' => 'Identifies who initiated the multipart upload.',
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ID' => array(
                            'description' => 'If the principal is an AWS account, it provides the Canonical User ID. If the principal is an IAM User, it provides a user ARN value.',
                            'type' => 'string',
                        ),
                        'DisplayName' => array(
                            'description' => 'Name of the Principal.',
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
                    'description' => 'The class of storage used to store the object.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'PutObjectOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Expiration' => array(
                    'description' => 'If the object expiration is configured, this will contain the expiration date (expiry-date) and rule ID (rule-id). The value of rule-id is URL encoded.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'header',
                    'sentAs' => 'x-amz-expiration',
                ),
                'ServerSideEncryption' => array(
                    'description' => 'The Server-side encryption algorithm used when storing this object in S3.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'ETag' => array(
                    'description' => 'Entity tag for the uploaded object.',
                    'type' => 'string',
                    'location' => 'header',
                ),
                'VersionId' => array(
                    'description' => 'Version of the object.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-version-id',
                ),
            ),
        ),
        'UploadPartOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ServerSideEncryption' => array(
                    'description' => 'The Server-side encryption algorithm used when storing this object in S3.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
                'ETag' => array(
                    'description' => 'Entity tag for the uploaded object.',
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
        'UploadPartCopyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CopySourceVersionId' => array(
                    'description' => 'The version of the source object that was copied, if you have enabled versioning on the source bucket.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-copy-source-version-id',
                ),
                'ETag' => array(
                    'description' => 'Entity tag of the object.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModified' => array(
                    'description' => 'Date and time at which the object was uploaded.',
                    'type' => array(
                        'object',
                        'string',
                    ),
                    'location' => 'xml',
                ),
                'ServerSideEncryption' => array(
                    'description' => 'The Server-side encryption algorithm used when storing this object in S3.',
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-server-side-encryption',
                ),
            ),
        ),
    ),
);
