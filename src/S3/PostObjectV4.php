<?php
namespace Aws\S3;

use Aws\Credentials\CredentialsInterface;
use GuzzleHttp\Psr7\Uri;
use Aws\Signature\SignatureTrait;
use Aws\Common\Enum\DateFormat;

/**
 * Encapsulates the logic for getting the data for an S3 object POST upload form
 *
 * @link http://docs.aws.amazon.com/AmazonS3/latest/API/RESTObjectPOST.html
 * @link http://docs.aws.amazon.com/AmazonS3/latest/API/sigv4-post-example.html
 */
class PostObjectV4
{
    use SignatureTrait;

    const ISO8601_BASIC = 'Ymd\THis\Z';

    private $client;
    private $bucket;
    private $formAttributes;
    private $formInputs = [];
    private $jsonPolicy;
    private $credentials;

    /**
     * Constructs the PostObject.
     *
     * The options array accepts the following keys:
     * @link http://docs.aws.amazon.com/AmazonS3/latest/API/sigv4-query-string-auth.html
     *
     * @param S3ClientInterface $client     Client used with the POST object
     * @param string            $bucket     Bucket to use
     * @param array             $options    Policy condition options
     * @param string            $expiration Upload expiration date. By
     *                                      default: 1 hour vaild peroid.
     */
    public function __construct(
        S3ClientInterface $client,
        $bucket,
        array $options = [],
        $expiration = NULL
    ) {

        date_default_timezone_set('UTC');
        $this->client = $client;
        $this->bucket = $bucket;

        // prepare form attributes
        $this->formAttributes = [
            'action'  => $this->generateUri(),
            'method'  => 'POST',
            'enctype' => 'multipart/form-data'
        ];
        // setup basic policy documents
        if (is_null($expiration)) {
            $expiration = gmdate('Y-m-d\TH:i:s\Z', strtotime('+1 hours'));
        }
        $policy = [
            'expiration' => $expiration,
            'conditions' => [],
        ];
        // policy condition updates
        $starts_with = []; // handle start-with conditions differently
        $start_with_key = '';
        $pool = ['x-amz-credential', 'x-amz-algorithm', 'x-amz-date'];
        foreach ($options as $option) {
            foreach ($option as $key => $value) {
                if (is_int($key)) {
                    if ($key == 0) {
                        $starts_with = [];
                    } else if (empty($start_with_key)) {
                        $start_with_key = substr($value, 1); //remove $
                    } else {
                        if (strlen(trim($value)) >= 1) { // validate 'key'
                            $this->formInputs[$start_with_key] = $value;
                        }
                        $start_with_key = '';
                    }
                    $starts_with[] = $value;
                } else {
                    if (!empty($starts_with)) {
                        $policy['conditions'][] = $starts_with;
                        $starts_with = [];
                    }
                    $policy['conditions'][] = [$key => $value];
                    if (in_array($key, $pool)) {
                        $this->formInputs[ucwords($key, "-")] = $value;
                    } else {
                        $this->formInputs[$key] = $value;
                    }
                }
            }
        }
        $this->jsonPolicy = json_encode($policy);

        $this->formInputs += ['key' => '${filename}'];
        $this->formInputs += $this->getPolicyAndSignature(
            $this->client->getCredentials()->wait()
        );
    }

    /**
     * Gets the S3 client.
     *
     * @return S3ClientInterface
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
     * Set a form attribute.
     *
     * @param string $attribute Form attribute to set.
     * @param string $value     Value to set.
     */
    public function setFormAttribute($attribute, $value)
    {
        $this->formAttributes[$attribute] = $value;
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
     * Set a form input.
     *
     * @param string $field Field name to set
     * @param string $value Value to set.
     */
    public function setFormInput($field, $value)
    {
        $this->formInputs[$field] = $value;
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

    private function generateUri()
    {
        $uri = new Uri($this->client->getEndpoint());

        if ($uri->getScheme() === 'https'
            && strpos($this->bucket, '.') !== false
        ) {
            // Use path-style URLs
            $uri = $uri->withPath($this->bucket);
        } else {
            // Use virtual-style URLs
            $uri = $uri->withHost($this->bucket . '.' . $uri->getHost());
        }

        return (string) $uri;
    }

    protected function getPolicyAndSignature(CredentialsInterface $creds)
    {
        $ldt = date('Ymd\THis\Z', strtotime(gmdate(self::ISO8601_BASIC)));
        $sdt = substr($ldt, 0, 8);

        $jsonPolicy64 = base64_encode($this->getJsonPolicy());
        $key = $this->getSigningKey(
            $sdt,
            $this->client->getRegion(),
            's3',
            $creds->getSecretKey()
        );

        return [
            'Policy'           => $jsonPolicy64,
            'X-Amz-Signature'  => bin2hex(
                hash_hmac('sha256', $jsonPolicy64, $key, true)
            ),
        ];
    }
}
