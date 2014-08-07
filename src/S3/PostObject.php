<?php
namespace Aws\S3;

use GuzzleHttp\Collection;
use GuzzleHttp\Url;

/**
 * Encapsulates the logic for getting the data for an S3 object POST upload form
 */
class PostObject extends Collection
{
    /** @var S3Client The S3 client being used to sign the policy */
    private $client;

    /** @var string The bucket name where the object will be posted */
    private $bucket;

    /** @var array The <form> tag attributes as an array */
    private $formAttributes;

    /** @var array The form's <input> elements as an array */
    private $formInputs;

    /** @var string The raw json policy */
    private $jsonPolicy;

    /**
     * Constructs the PostObject
     *
     * The options array accepts the following keys:
     *
     * - acl: The access control setting to apply to the uploaded file. Accepts
     *   any of the CannedAcl constants.
     * - Cache-Control: The Cache-Control HTTP header value to apply to the
     *   uploaded file
     * - Content-Disposition: The Content-Disposition HTTP header value to
     *   apply to the uploaded file
     * - Content-Encoding: The Content-Encoding HTTP header value to apply to
     *   the uploaded file.
     * - Content-Type: The Content-Type HTTP header value to apply to the
     *   uploaded file. The default value is `application/octet-stream`.
     * - Expires: The Expires HTTP header value to apply to the uploaded file
     * - key: The location where the file should be uploaded to. The default
     *   value is `^${filename}` which will use the name of the uploaded file.
     * - policy: A raw policy in JSON format. By default, the PostObject
     *   creates one for you.
     * - policy_callback: A callback used to modify the policy before encoding
     *   and signing it. The method signature for the callback should accept an
     *   array of the policy data as the 1st argument, (optionally) the
     *   PostObject as the 2nd argument, and return the policy data with the
     *   desired modifications.
     * - success_action_redirect: The URI for Amazon S3 to redirect to upon
     *   successful upload.
     * - success_action_status: The status code for Amazon S3 to return upon
     *   successful upload.
     * - ttd: The expiration time for the generated upload form data
     * - x-amz-meta-*: Any custom meta tag that should be set to the object
     * - x-amz-server-side-encryption: The server-side encryption mechanism to
     *   use
     * - x-amz-storage-class: The storage setting to apply to the object
     * - x-amz-storage-class: The storage setting to apply to the object
     * - x-amz-server-side-cryption-customer-algorithm: The SSE-C algorithm
     * - x-amz-server-side-encryption-customer-key: The SSE-C secret key
     * - x-amz-server-side-encryption-customer-key-MD5: MD5 hash of the
     *   SSE-C customer secret key
     *
     * For the Cache-Control, Content-Disposition, Content-Encoding,
     * Content-Type, Expires, and key options, to use a "starts-with" comparison
     * instead of an equals comparison, prefix the value with a ^ (carat)
     * character.
     *
     * @param S3Client $client  Client used with the POST object
     * @param string   $bucket  Bucket to use
     * @param array    $options Associative array of options
     */
    public function __construct(S3Client $client, $bucket, array $options = [])
    {
        $this->client = $client;
        $this->bucket = $bucket;
        parent::__construct($options);
    }

    /**
     * Prepares the POST object to be utilzed to build a POST form.
     *
     * @return PostObject
     */
    public function prepareData()
    {
        // Validate required options
        $options = Collection::fromConfig($this->data, [
            'ttd' => '+1 hour',
            'key' => '^${filename}',
        ]);

        $ttd = $this->pluckTtd($options);

        // If a policy or policy callback were provided, extract those from
        // the options.
        $rawJsonPolicy = $options['policy'];
        $policyCallback = $options['policy_callback'];
        unset($options['policy'], $options['policy_callback']);

        // Setup policy document
        $policy = [
            'expiration' => gmdate('Y-m-d\TH:i:s\Z', $ttd),
            'conditions' => [['bucket' => $this->bucket]]
        ];

        // Setup basic form
        $this->formAttributes = [
            'action'  => $this->generateUrl($options),
            'method'  => 'POST',
            'enctype' => 'multipart/form-data'
        ];

        $this->formInputs = [
            'AWSAccessKeyId' => $this->client->getCredentials()->getAccessKeyId()
        ];

        // Add success action status
        $status = (int) $options->get('success_action_status');

        if ($status && in_array($status, [200, 201, 204])) {
            $this->formInputs['success_action_status'] = (string) $status;
            $policy['conditions'][] = [
                'success_action_status' => (string) $status
            ];
            unset($options['success_action_status']);
        }

        // Add other options
        foreach ($options as $key => $value) {
            $value = (string) $value;
            if ($value[0] === '^') {
                $value = substr($value, 1);
                $this->formInputs[$key] = $value;
                $value = preg_replace('/\$\{(\w*)\}/', '', $value);
                $policy['conditions'][] = ['starts-with', '$' . $key, $value];
            } else {
                $this->formInputs[$key] = $value;
                $policy['conditions'][] = [$key => $value];
            }
        }

        // Handle the policy
        $policy = is_callable($policyCallback)
            ? $policyCallback($policy, $this)
            : $policy;
        $this->jsonPolicy = $rawJsonPolicy ?: json_encode($policy);
        $this->applyPolicy();

        return $this;
    }

    /**
     * Gets the S3 client.
     *
     * @return S3Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Gets the bucket name.
     *
     * @return string
     */
    public function getBucket()
    {
        return $this->bucket;
    }

    /**
     * Gets the form attributes as an array.
     *
     * @return array
     */
    public function getFormAttributes()
    {
        return $this->formAttributes;
    }

    /**
     * Gets the form inputs as an array.
     *
     * @return array
     */
    public function getFormInputs()
    {
        return $this->formInputs;
    }

    /**
     * Gets the raw JSON policy.
     *
     * @return string
     */
    public function getJsonPolicy()
    {
        return $this->jsonPolicy;
    }

    private function pluckTtd(Collection $options)
    {
        $ttd = $options['ttd'];
        $ttd = is_numeric($ttd) ? (int) $ttd : strtotime($ttd);
        unset($options['ttd']);

        return $ttd;
    }

    private function generateUrl()
    {
        $url = Url::fromString($this->client->getEndpoint());

        if ($url->getScheme() === 'https' &&
            strpos($this->bucket, '.') !== false
        ) {
            // Use path-style URLs
            $url->setPath($this->bucket);
        } else {
            // Use virtual-style URLs
            $url->setHost($this->bucket . '.' . $url->getHost());
        }

        return $url;
    }

    /**
     * Handles the encoding, signing, and injecting of the policy
     */
    protected function applyPolicy()
    {
        $jsonPolicy64 = base64_encode($this->jsonPolicy);
        $this->formInputs['policy'] = $jsonPolicy64;

        $this->formInputs['signature'] = base64_encode(hash_hmac(
            'sha1',
            $jsonPolicy64,
            $this->client->getCredentials()->getSecretKey(),
            true
        ));
    }
}
