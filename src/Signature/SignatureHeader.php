<?php
namespace Aws\Signature;

/**
 * Provides access to the parts of an AWSV4 signed Authorization header
 *
 */
class SignatureHeader
{
    /**
    * @var string
    */
    private $value;

    /**
     * @var string
     */
    private $mechanism;

    /**
     * @var array
     */
    private $data = [];

    /**
     * @param string $value The Authorization header value
     */
    public function __construct($value)
    {
        $this->value = $value;

        $parts = explode(' ', $value);
        $this->mechanism = array_shift($parts);

        foreach ($parts as $part){
            $items = explode('=', $part);
            $this->data[$items[0]] = trim($items[1], ',');
        }

        if (isset($this->data['Credential'])){
            $credential = explode('/', $this->data['Credential']);

            $this->data['Credential'] = [
                'AccessId' => $credential[0],
                'Date' => $credential[1],
                'Region' => $credential[2],
                'Service' => $credential[3],
                'Type' => $credential[4]
            ];
        } else {
            $this->data['Credential'] = [];
        }

        if (isset($this->data['SignedHeaders'])){
            $this->data['SignedHeaders'] = explode(';', $this->data['SignedHeaders']);
        } else {
            $this->data['SignedHeaders'] = [];
        }
    }

    /**
     * @return string
     */
    public function getMechanism()
    {
        return $this->mechanism;
    }

    /**
     * @param $name
     * @return string
     */
    public function getCredential()
    {
        if (isset($this->data['Credential'])) {
            return $this->data['Credential'];
        }
    }

    /**
     * @param $name
     * @return string
     */
    public function getService()
    {
        if (isset($this->data['Credential']['Service'])) {
            return $this->data['Credential']['Service'];
        }
    }

    /**
     * @param $name
     * @return string
     */
    public function getRegion()
    {
        if (isset($this->data['Credential']['Region'])) {
            return $this->data['Credential']['Region'];
        }
    }

    /**
     * @param $name
     * @return string
     */
    public function getAccessId()
    {
        if (isset($this->data['Credential']['AccessId'])) {
            return $this->data['Credential']['AccessId'];
        }
    }
    /**
     * @return array
     */
    public function getSignedHeaders()
    {
        return $this->data['SignedHeaders'];
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->data['Signature'];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}