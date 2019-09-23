<?php
namespace Aws\Arn;

use Aws\Arn\Exception\InvalidArnException;

/**
 * Amazon Resource Names (ARNs) uniquely identify AWS resources. The Arn class
 * parses and stores a generic ARN object representation that can apply to any
 * service resource.
 */
class Arn implements ArnInterface
{
    protected $data;
    protected $string;

    public static function parse($string)
    {
        $data = [
            'arn' => null,
            'partition' => null,
            'service' => null,
            'region' => null,
            'account_id' => null,
            'resource_type' => null,
            'resource_id' => null,
        ];

        $length = strlen($string);
        $lastDelim = 0;
        $numComponents = 0;
        for ($i = 0; $i < $length; $i++) {

            // Some ARNs may use '/' as delimiter between resource type and ID
            if (($numComponents < 6 && $string[$i] === ':')
                || ($numComponents === 5 && $string[$i] === '/')
            ) {
                // Split components between delimiters
                $data[key($data)] = substr($string, $lastDelim, $i - $lastDelim);

                // Do not include delimiter character itself
                $lastDelim = $i + 1;
                next($data);
                $numComponents++;
            }

            if ($i === $length - 1) {
                // Put the remainder in the last component. Some ARNs may only
                // have 6 components. If so, resource_type is null and last
                // component is resource_id
                if (in_array($numComponents, [5,6])) {
                    $data['resource_id'] = substr($string, $lastDelim);
                } else {
                    // If there are < 5 components, put remainder in current
                    // component, to help provide more informative validation
                    // message
                    $data[key($data)] = substr($string, $lastDelim);
                }
            }
        }

        return $data;
    }

    public function __construct($data)
    {
        if (is_array($data)) {
            $this->data = $data;
        } elseif (is_string($data)) {
            $this->data = self::parse($data);
        } else {
            throw new InvalidArnException('Constructor accepts a string or an'
                . ' array as an argument.');
        }

        self::validate($this->data);
    }

    public function __toString()
    {
        if (!isset($this->string)) {
            $components = [
                $this->getPrefix(),
                $this->getPartition(),
                $this->getService(),
                $this->getRegion(),
                $this->getAccountId(),
            ];

            // One valid ARN format can omit resource type without a placeholder
            if (!empty($this->getResourceType())) {
                $components[] = $this->getResourceType();
            }
            $components[] = $this->getResourceId();

            $this->string = implode(':', $components);
        }
        return $this->string;
    }

    public function getPrefix()
    {
        return $this->data['arn'];
    }

    public function getPartition()
    {
        return $this->data['partition'];
    }

    public function getService()
    {
        return $this->data['service'];
    }

    public function getRegion()
    {
        return $this->data['region'];
    }

    public function getAccountId()
    {
        return $this->data['account_id'];
    }

    public function getResourceType()
    {
        return $this->data['resource_type'];
    }

    public function getResourceId()
    {
        return $this->data['resource_id'];
    }

    public function toArray()
    {
        return $this->data;
    }

    /**
     * Minimally restrictive generic ARN validation
     *
     * @param array $data
     */
    protected static function validate(array $data)
    {
        if ($data['arn'] !== 'arn') {
            throw new InvalidArnException("The 1st component of an ARN must be"
                . " 'arn'.");
        }

        if (empty($data['partition'])) {
            throw new InvalidArnException("The 2nd component of an ARN"
                . " represents the partition and must not be empty.");
        }

        if (empty($data['service'])) {
            throw new InvalidArnException("The 3rd component of an ARN"
                . " represents the service and must not be empty.");
        }

        if (empty($data['resource_id'])) {
            throw new InvalidArnException("The final (6th or 7th) component of"
                . " an ARN represents the resource ID and must not be empty.");
        }
    }
}