<?php

namespace Aws\CloudTrail;

use Aws\Common\Iterator\AwsResourceIterator;
use Aws\S3\S3Client;
use Guzzle\Iterator\FilterIterator;
use Guzzle\Common\Collection;

class LogRecordsIterator implements \Iterator
{
    const PREFIX_TEMPLATE = 'prefix/AWSLogs/account/CloudTrail/region/year/month/day/';
    const PREFIX_WILDCARD = '*';
    const DEFAULT_TRAIL_NAME = 'Default';

    const OPT_TRAIL_NAME = 'TrailName';
    const OPT_KEY_PREFIX = 'S3KeyPrefix';
    const OPT_BUCKET_NAME = 'S3BucketName';
    const OPT_START_DATE = 'StartDate';
    const OPT_END_DATE = 'EndDate';
    const OPT_ACCOUNT_ID = 'AccountID';
    const OPT_LOG_REGION = 'LogRegion';
    const OPT_S3_CLIENT = 'S3Client';
    const OPT_CT_CLIENT = 'CloudTrailClient';

    /**
     * @var array Default options for the LogRecordsIterator
     */
    private static $defaultOptions = array(
        self::OPT_TRAIL_NAME  => 'Default',
        self::OPT_KEY_PREFIX  => null,
        self::OPT_BUCKET_NAME => null,
        self::OPT_START_DATE  => null,
        self::OPT_END_DATE    => null,
        self::OPT_ACCOUNT_ID  => null,
        self::OPT_LOG_REGION  => null,
        self::OPT_S3_CLIENT   => null,
        self::OPT_CT_CLIENT   => null,
    );

    /**
     * @var S3Client
     */
    private $s3Client;

    /**
     * @var Collection
     */
    private $options;

    /**
     * @var AwsResourceIterator
     */
    private $objectsIterator;

    /**
     * @var int
     */
    private $recordCursor;

    /**
     * @var \ArrayIterator
     */
    private $logData;

    public static function factory(array $options = array())
    {
        // Apply default options
        $options = $options + self::$defaultOptions;

        // Get the CloudTrail client if it's set
        if ($options[self::OPT_CT_CLIENT] instanceof CloudTrailClient) {
            $cloudTrailClient = $options[self::OPT_CT_CLIENT];
        }

        // Get the S3 client if it's set or try to create one using the CloudTrail client's credentials
        if ($options[self::OPT_S3_CLIENT] instanceof S3Client) {
            $s3Client = $options[self::OPT_S3_CLIENT];
        } elseif (isset($cloudTrailClient)) {
            $s3Client = S3Client::factory(array('credentials' => $cloudTrailClient->getCredentials()));
        } else {
            throw new \InvalidArgumentException('You must provide either an S3Client and/or a CloudTrailClient.');
        }

        // Ensure that the bucket name option is set. This identifies which bucket the log files are stored in
        if (!$options[self::OPT_BUCKET_NAME]) {
            if (isset($cloudTrailClient) && $options[self::OPT_TRAIL_NAME]) {
                try {
                    $result = $cloudTrailClient->describeTrails(array(
                        'trailNameList' => array($options[self::OPT_TRAIL_NAME]),
                    ));
                    $options[self::OPT_BUCKET_NAME] = $result->getPath('trailList/0/S3BucketName');
                    $options[self::OPT_KEY_PREFIX] = $result->getPath('trailList/0/S3KeyPrefix');
                } catch (CloudTrailException $e) {
                    // Continue on and let the exception in the next if statement be thrown
                }
            }
            // If there is _still_ no bucket name, then throw an exception
            if (!$options[self::OPT_BUCKET_NAME]) {
                throw new \InvalidArgumentException('You must provide either the log files\' bucket name or the '
                    . 'trail\'s name and a CloudTrailClient, so that the bucket name can be determined.');
            }
        }

        // Remove the clients from the options array
        unset($options[self::OPT_CT_CLIENT], $options[self::OPT_S3_CLIENT]);

        return new self($s3Client, $options);
    }

    /**
     * @param S3Client $s3Client
     * @param array    $options
     */
    public function __construct(S3Client $s3Client, array $options = array())
    {
        $this->s3Client = $s3Client;
        $this->options = Collection::fromConfig($options, array(), array(self::OPT_BUCKET_NAME));
        $this->prepareIterator();
    }

    /**
     * @return Collection
     */
    public function current()
    {
        return new Collection($this->logData[$this->recordCursor]);
    }

    public function next()
    {
        // Advance the cursor
        $this->recordCursor++;

        // If the log records for the current log file have been exhauseted, advance to the next log file
        if (!isset($this->logData[$this->recordCursor])) {
            $this->objectsIterator->next();
            if ($this->objectsIterator->valid()) {
                $this->loadRecordsFromObject();
                $this->recordCursor = 0;
            }
        }
    }

    public function key()
    {
        $object = $this->objectsIterator->current();

        return "{$object['Key']}[{$this->recordCursor}]";
    }

    public function valid()
    {
        return isset($this->logData[$this->recordCursor]);
    }

    public function rewind()
    {
        $this->objectsIterator->rewind();
        $this->loadRecordsFromObject();
        $this->recordCursor = 0;
    }

    /**
     * Determines what S3 key prefix and iterator filters to use based on options
     */
    private function prepareIterator()
    {
        // Set the prefix, account, and region prefix parts
        $keyPrefixParts = array();
        $keyPrefixParts['prefix'] = $this->options[self::OPT_KEY_PREFIX] ?: null;
        $keyPrefixParts['account'] = $this->options[self::OPT_ACCOUNT_ID] ?: self::PREFIX_WILDCARD;
        $keyPrefixParts['region'] = $this->options[self::OPT_LOG_REGION] ?: self::PREFIX_WILDCARD;
        $keyPrefixParts += $this->fetchDateValues();

        // Determine the longest key prefix that can be used to retrieve all of the relevant log files
        $candidatePrefix = ltrim(strtr(self::PREFIX_TEMPLATE, $keyPrefixParts), '/');
        $logKeyPrefix = $candidatePrefix;
        if (($index = strpos($candidatePrefix, self::PREFIX_WILDCARD)) !== false) {
            $logKeyPrefix = substr($candidatePrefix, 0, $index);
        }

        // Create an iterator that will emit all of the objects matching the key prefix
        $objectsIterator = $this->s3Client->getListObjectsIterator(array(
            'Bucket' => $this->options[self::OPT_BUCKET_NAME],
            'Prefix' => $logKeyPrefix,
        ));

        // Apply regex and/or date filters if needed and prepare the iterator for use
        $objectsIterator = $this->applyRegexFilter($objectsIterator, $logKeyPrefix, $candidatePrefix);
        $objectsIterator = $this->applyDateFilter($objectsIterator);
        $objectsIterator->rewind();

        $this->objectsIterator = $objectsIterator;
    }

    /**
     * Applies default options, normalizes date values, and fetches required trail data
     *
     * @throws \InvalidArgumentException
     */
    private function fetchDateValues()
    {
        // Normalize start and end date options
        foreach(array(self::OPT_START_DATE, self::OPT_END_DATE) as $key) {
            if ($this->options[$key] === null) {
                continue;
            } elseif (is_string($this->options[$key])) {
                $this->options[$key] = strtotime($this->options[$key]);
            } elseif ($options[$key] instanceof \DateTime) {
                $this->options[$key] = $this->options[$key]->format('U');
            } elseif (!is_int($this->options[$key])) {
                throw new \InvalidArgumentException('Date values must be a string, an int, or a DateTime object.');
            }
        }

        // Get the year, month, and day prefix parts
        $dateParts = array_fill(0, 3, self::PREFIX_WILDCARD);
        if ($this->options[self::OPT_START_DATE] && $this->options[self::OPT_END_DATE]) {
            $dateParts = array_intersect_assoc(
                explode('-', date('Y-m-d', $this->options[self::OPT_START_DATE])),
                explode('-', date('Y-m-d', $this->options[self::OPT_END_DATE]))
            ) + $dateParts;
            ksort($dateParts);
        }

        return array_combine(array('year', 'month', 'day'), $dateParts);
    }

    /**
     * @param \Traversable $objectsIterator
     * @param string       $logKeyPrefix
     * @param string       $candidatePrefix
     *
     * @return \Traversable
     */
    private function applyRegexFilter($objectsIterator, $logKeyPrefix, $candidatePrefix)
    {
        if ($logKeyPrefix !== $candidatePrefix) {
            $regex = strtr($candidatePrefix, array(self::PREFIX_WILDCARD => '[^/]+'));
            $objectsIterator = new FilterIterator($objectsIterator, function ($object) use ($regex) {
                return preg_match("#{$regex}#", $object['Key']);
            });
        }

        return $objectsIterator;
    }

    /**
     * Adds an iterator filter to handle date ranges if specified
     *
     * @param \Traversable $objectsIterator
     *
     * @return \Traversable
     */
    private function applyDateFilter($objectsIterator)
    {
        $startDate = $this->options[self::OPT_START_DATE];
        $endDate = $this->options[self::OPT_END_DATE];
        if ($startDate || $endDate) {
            $objectsIterator = new FilterIterator($objectsIterator, function ($object) use ($startDate, $endDate) {
                if (preg_match('/[0-9]{8}T[0-9]{4}Z/', $object['Key'], $matches)) {
                    $date = strtotime($matches[0]);
                    if ((!$startDate || $date >= $startDate) && (!$endDate || $date <= $endDate)) {
                        return true;
                    }
                }
                return false;
            });
        }

        return $objectsIterator;
    }

    /**
     * Fetches log data from the current log object
     */
    private function loadRecordsFromObject()
    {
        $object = $this->objectsIterator->current();
        $command = $this->s3Client->getCommand('GetObject', array(
            'Bucket'                  => $this->options[self::OPT_BUCKET_NAME],
            'Key'                     => $object['Key'],
            'ResponseContentEncoding' => 'x-gzip',
        ));
        $command->prepare()->addHeader('Accept-Encoding', 'gzip');
        $data = $command->getResponse()->json();

        if (isset($data['Records'])) {
            $this->logData = $data['Records'];
        } else {
            $this->logData = array();
        }
    }
}
