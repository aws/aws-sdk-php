<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

/**
 * For information about using the Amazon S3 API—including error handling—see the Amazon S3 Developer Guide.
 * Container for all error elements.
 */
final class Error implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Error';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_KEY;
    private static Schema $SCHEMA_VERSION_ID;
    private static Schema $SCHEMA_CODE;
    private static Schema $SCHEMA_MESSAGE;

    /**
     * @param ?string $key The error key.
     * @param ?string $versionId The version ID of the error. This functionality is not supported for directory buckets.
     * @param ?string $code The error code is a string that uniquely identifies an error condition. It is meant to be read
     *        and understood by programs that detect and handle errors by type. The following is a list of Amazon S3 error
     * codes.
     *        For more information, see Error responses. Code: AccessDenied Description: Access Denied HTTP Status Code: 403
     *        Forbidden Code: AccountProblem Description: There is a problem with your Amazon Web Services account that
     * prevents
     *        the action from completing successfully. Contact Amazon Web Services Support for further assistance. HTTP
     * Status
     *        Code: 403 Forbidden Code: AllAccessDisabled Description: All access to this Amazon S3 resource has been
     * disabled.
     *        Contact Amazon Web Services Support for further assistance. HTTP Status Code: 403 Forbidden Code:
     *        AmbiguousGrantByEmailAddress Description: The email address you provided is associated with more than one
     * account.
     *        HTTP Status Code: 400 Bad Request Code: AuthorizationHeaderMalformed Description: The authorization header you
     *        provided is invalid. HTTP Status Code: 400 Bad Request HTTP Status Code: N/A Code: BadDigest Description: The
     *        Content-MD5 you specified did not match what we received. HTTP Status Code: 400 Bad Request Code:
     * BucketAlreadyExists
     *        Description: The requested bucket name is not available. The bucket namespace is shared by all users of the
     * system.
     *        Please select a different name and try again. HTTP Status Code: 409 Conflict Code: BucketAlreadyOwnedByYou
     *        Description: The bucket you tried to create already exists, and you own it. Amazon S3 returns this error in
     * all
     *        Amazon Web Services Regions except in the North Virginia Region. For legacy compatibility, if you re-create an
     *        existing bucket that you already own in the North Virginia Region, Amazon S3 returns 200 OK and resets the
     * bucket
     *        access control lists (ACLs). Code: 409 Conflict (in all Regions except the North Virginia Region) Code:
     *        BucketNotEmpty Description: The bucket you tried to delete is not empty. HTTP Status Code: 409 Conflict Code:
     *        CredentialsNotSupported Description: This request does not support credentials. HTTP Status Code: 400 Bad
     * Request
     *        Code: CrossLocationLoggingProhibited Description: Cross-location logging not allowed. Buckets in one
     * geographic
     *        location cannot log information to a bucket in another location. HTTP Status Code: 403 Forbidden Code:
     * EntityTooSmall
     *        Description: Your proposed upload is smaller than the minimum allowed object size. HTTP Status Code: 400 Bad
     * Request
     *        Code: EntityTooLarge Description: Your proposed upload exceeds the maximum allowed object size. HTTP Status
     * Code: 400
     *        Bad Request Code: ExpiredToken Description: The provided token has expired. HTTP Status Code: 400 Bad Request
     * Code:
     *        IllegalVersioningConfigurationException Description: Indicates that the versioning configuration specified in
     * the
     *        request is invalid. HTTP Status Code: 400 Bad Request Code: IncompleteBody Description: You did not provide
     * the
     *        number of bytes specified by the Content-Length HTTP header HTTP Status Code: 400 Bad Request Code:
     *        IncorrectNumberOfFilesInPostRequest Description: POST requires exactly one file upload per request. HTTP
     * Status Code:
     *        400 Bad Request Code: InlineDataTooLarge Description: Inline data exceeds the maximum allowed size. HTTP
     * Status Code:
     *        400 Bad Request Code: InternalError Description: We encountered an internal error. Please try again. HTTP
     * Status
     *        Code: 500 Internal Server Error Code: InvalidAccessKeyId Description: The Amazon Web Services access key ID
     * you
     *        provided does not exist in our records. HTTP Status Code: 403 Forbidden Code: InvalidAddressingHeader
     * Description:
     *        You must specify the Anonymous role. HTTP Status Code: N/A Code: InvalidArgument Description: Invalid Argument
     * HTTP
     *        Status Code: 400 Bad Request Code: InvalidBucketName Description: The specified bucket is not valid. HTTP
     * Status
     *        Code: 400 Bad Request Code: InvalidBucketState Description: The request is not valid with the current state of
     * the
     *        bucket. HTTP Status Code: 409 Conflict Code: InvalidDigest Description: The Content-MD5 you specified is not
     * valid.
     *        HTTP Status Code: 400 Bad Request Code: InvalidEncryptionAlgorithmError Description: The encryption request
     * you
     *        specified is not valid. The valid value is AES256. HTTP Status Code: 400 Bad Request Code:
     * InvalidLocationConstraint
     *        Description: The specified location constraint is not valid. For more information about Regions, see How to
     * Select a
     *        Region for Your Buckets. HTTP Status Code: 400 Bad Request Code: InvalidObjectState Description: The action is
     * not
     *        valid for the current state of the object. HTTP Status Code: 403 Forbidden Code: InvalidPart Description: One
     * or more
     *        of the specified parts could not be found. The part might not have been uploaded, or the specified entity tag
     * might
     *        not have matched the part's entity tag. HTTP Status Code: 400 Bad Request Code: InvalidPartOrder Description:
     * The
     *        list of parts was not in ascending order. Parts list must be specified in order by part number. HTTP Status
     * Code: 400
     *        Bad Request Code: InvalidPayer Description: All access to this object has been disabled. Please contact Amazon
     * Web
     *        Services Support for further assistance. HTTP Status Code: 403 Forbidden Code: InvalidPolicyDocument
     * Description: The
     *        content of the form does not meet the conditions specified in the policy document. HTTP Status Code: 400 Bad
     * Request
     *        Code: InvalidRange Description: The requested range cannot be satisfied. HTTP Status Code: 416 Requested Range
     * Not
     *        Satisfiable Code: InvalidRequest Description: Please use AWS4-HMAC-SHA256. HTTP Status Code: 400 Bad Request
     * Code:
     *        N/A Code: InvalidRequest Description: Amazon S3 Transfer Acceleration is not supported for buckets with
     * non-DNS
     *        compliant names. HTTP Status Code: 400 Bad Request Code: N/A Code: InvalidRequest Description: Amazon S3
     * Transfer
     *        Acceleration is not supported for buckets with periods (.) in their names. HTTP Status Code: 400 Bad Request
     * Code:
     *        N/A Code: InvalidRequest Description: Amazon S3 Transfer Accelerate endpoint only supports virtual style
     * requests.
     *        HTTP Status Code: 400 Bad Request Code: N/A Code: InvalidRequest Description: Amazon S3 Transfer Accelerate is
     * not
     *        configured on this bucket. HTTP Status Code: 400 Bad Request Code: N/A Code: InvalidRequest Description:
     * Amazon S3
     *        Transfer Accelerate is disabled on this bucket. HTTP Status Code: 400 Bad Request Code: N/A Code:
     * InvalidRequest
     *        Description: Amazon S3 Transfer Acceleration is not supported on this bucket. Contact Amazon Web Services
     * Support for
     *        more information. HTTP Status Code: 400 Bad Request Code: N/A Code: InvalidRequest Description: Amazon S3
     * Transfer
     *        Acceleration cannot be enabled on this bucket. Contact Amazon Web Services Support for more information. HTTP
     * Status
     *        Code: 400 Bad Request Code: N/A Code: InvalidSecurity Description: The provided security credentials are not
     * valid.
     *        HTTP Status Code: 403 Forbidden Code: InvalidStorageClass Description: The storage class you specified is not
     * valid.
     *        HTTP Status Code: 400 Bad Request Code: InvalidTargetBucketForLogging Description: The target bucket for
     * logging does
     *        not exist, is not owned by you, or does not have the appropriate grants for the log-delivery group. HTTP
     * Status Code:
     *        400 Bad Request Code: InvalidToken Description: The provided token is malformed or otherwise invalid. HTTP
     * Status
     *        Code: 400 Bad Request Code: InvalidURI Description: Couldn't parse the specified URI. HTTP Status Code: 400
     * Bad
     *        Request Code: KeyTooLongError Description: Your key is too long. HTTP Status Code: 400 Bad Request Code:
     *        MalformedACLError Description: The XML you provided was not well-formed or did not validate against our
     * published
     *        schema. HTTP Status Code: 400 Bad Request Code: MalformedPOSTRequest Description: The body of your POST
     * request is
     *        not well-formed multipart/form-data. HTTP Status Code: 400 Bad Request Code: MalformedXML Description: This
     * happens
     *        when the user sends malformed XML (XML that doesn't conform to the published XSD) for the configuration. The
     * error
     *        message is, "The XML you provided was not well-formed or did not validate against our published schema." HTTP
     * Status
     *        Code: 400 Bad Request Code: MaxMessageLengthExceeded Description: Your request was too big. HTTP Status Code:
     * 400 Bad
     *        Request Code: MaxPostPreDataLengthExceededError Description: Your POST request fields preceding the upload
     * file were
     *        too large. HTTP Status Code: 400 Bad Request Code: MetadataTooLarge Description: Your metadata headers exceed
     * the
     *        maximum allowed metadata size. HTTP Status Code: 400 Bad Request Code: MethodNotAllowed Description: The
     * specified
     *        method is not allowed against this resource. HTTP Status Code: 405 Method Not Allowed Code:
     * MissingContentLength
     *        Description: You must provide the Content-Length HTTP header. HTTP Status Code: 411 Length Required Code:
     *        MissingRequestBodyError Description: This happens when the user sends an empty XML document as a request. The
     * error
     *        message is, "Request body is empty." HTTP Status Code: 400 Bad Request Code: MissingSecurityHeader
     * Description: Your
     *        request is missing a required header. HTTP Status Code: 400 Bad Request Code: NoLoggingStatusForKey
     * Description:
     *        There is no such thing as a logging status subresource for a key. HTTP Status Code: 400 Bad Request Code:
     *        NoSuchBucket Description: The specified bucket does not exist. HTTP Status Code: 404 Not Found Code:
     *        NoSuchBucketPolicy Description: The specified bucket does not have a bucket policy. HTTP Status Code: 404 Not
     * Found
     *        Code: NoSuchKey Description: The specified key does not exist. HTTP Status Code: 404 Not Found Code:
     *        NoSuchLifecycleConfiguration Description: The lifecycle configuration does not exist. HTTP Status Code: 404
     * Not Found
     *        Code: NoSuchUpload Description: The specified multipart upload does not exist. The upload ID might be invalid,
     * or the
     *        multipart upload might have been aborted or completed. HTTP Status Code: 404 Not Found Code: NoSuchVersion
     *        Description: Indicates that the version ID specified in the request does not match an existing version. HTTP
     * Status
     *        Code: 404 Not Found Code: NotImplemented Description: A header you provided implies functionality that is not
     *        implemented. HTTP Status Code: 501 Not Implemented Code: NotSignedUp Description: Your account is not signed
     * up for
     *        the Amazon S3 service. You must sign up before you can use Amazon S3. You can sign up at the following URL:
     * Amazon S3
     *        HTTP Status Code: 403 Forbidden Code: OperationAborted Description: A conflicting conditional action is
     * currently in
     *        progress against this resource. Try again. HTTP Status Code: 409 Conflict Code: PermanentRedirect Description:
     * The
     *        bucket you are attempting to access must be addressed using the specified endpoint. Send all future requests
     * to this
     *        endpoint. HTTP Status Code: 301 Moved Permanently Code: PreconditionFailed Description: At least one of the
     *        preconditions you specified did not hold. HTTP Status Code: 412 Precondition Failed Code: Redirect
     * Description:
     *        Temporary redirect. HTTP Status Code: 307 Moved Temporarily Code: RestoreAlreadyInProgress Description: Object
     *        restore is already in progress. HTTP Status Code: 409 Conflict Code: RequestIsNotMultiPartContent Description:
     * Bucket
     *        POST must be of the enclosure-type multipart/form-data. HTTP Status Code: 400 Bad Request Code: RequestTimeout
     *        Description: Your socket connection to the server was not read from or written to within the timeout period.
     * HTTP
     *        Status Code: 400 Bad Request Code: RequestTimeTooSkewed Description: The difference between the request time
     * and the
     *        server's time is too large. HTTP Status Code: 403 Forbidden Code: RequestTorrentOfBucketError Description:
     * Requesting
     *        the torrent file of a bucket is not permitted. HTTP Status Code: 400 Bad Request Code: SignatureDoesNotMatch
     *        Description: The request signature we calculated does not match the signature you provided. Check your Amazon
     * Web
     *        Services secret access key and signing method. For more information, see REST Authentication for details. HTTP
     * Status
     *        Code: 403 Forbidden Code: ServiceUnavailable Description: Service is unable to handle request. HTTP Status
     * Code: 503
     *        Service Unavailable Code: SlowDown Description: Reduce your request rate. HTTP Status Code: 503 Slow Down
     * Code:
     *        TemporaryRedirect Description: You are being redirected to the bucket while DNS updates. HTTP Status Code: 307
     * Moved
     *        Temporarily Code: TokenRefreshRequired Description: The provided token must be refreshed. HTTP Status Code:
     * 400 Bad
     *        Request Code: TooManyBuckets Description: You have attempted to create more buckets than allowed. HTTP Status
     * Code:
     *        400 Bad Request Code: UnexpectedContent Description: This request does not support content. HTTP Status Code:
     * 400 Bad
     *        Request Code: UnresolvableGrantByEmailAddress Description: The email address you provided does not match any
     * account
     *        on record. HTTP Status Code: 400 Bad Request Code: UserKeyMustBeSpecified Description: The bucket POST must
     * contain
     *        the specified field name. If it is specified, check the order of the fields. HTTP Status Code: 400 Bad Request
     * @param ?string $message The error message contains a generic description of the error condition in English. It is
     *        intended for a human audience. Simple programs display the message directly to the end user if they encounter
     * an
     *        error condition they don't know how or don't care to handle. Sophisticated programs with more exhaustive error
     *        handling and proper internationalization are more likely to ignore the error message.
     */
    public function __construct(
        public readonly ?string $key = null,
        public readonly ?string $versionId = null,
        public readonly ?string $code = null,
        public readonly ?string $message = null
    ) {}

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::error();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_KEY = $m[0];
        self::$SCHEMA_VERSION_ID = $m[1];
        self::$SCHEMA_CODE = $m[2];
        self::$SCHEMA_MESSAGE = $m[3];
        return self::$SCHEMA = $s;
    }

    /**
     * Get the shape schema for this instance.
     */
    public function getSchema(): Schema
    {
        return self::schema();
    }

    /**
     * Serialize the shape to the desired wire format.
     *
     * @return void
     */
    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeStruct(self::schema(), $this, $idx);
    }

    /**
     * Serialize the shape members to the desired wire format.
     *
     * @return void
     */
    public function serializeMembers(ShapeSerializerInterface $serializer): void
    {
        if (isset($this->key)) {
            $serializer->serializeString(self::$SCHEMA_KEY, $this->key, 0);
        }
        if (isset($this->versionId)) {
            $serializer->serializeString(self::$SCHEMA_VERSION_ID, $this->versionId, 1);
        }
        if (isset($this->code)) {
            $serializer->serializeString(self::$SCHEMA_CODE, $this->code, 2);
        }
        if (isset($this->message)) {
            $serializer->serializeString(self::$SCHEMA_MESSAGE, $this->message, 3);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->key,
            1 => $this->versionId,
            2 => $this->code,
            3 => $this->message,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->key,
            $this->versionId,
            $this->code,
            $this->message
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
