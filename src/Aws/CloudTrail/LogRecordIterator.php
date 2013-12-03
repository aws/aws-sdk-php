<?php

namespace Aws\CloudTrail;

use Aws\Common\Iterator\AwsResourceIterator;
use Aws\S3\S3Client;
use Guzzle\Iterator\FilterIterator;
use Guzzle\Common\Collection;

/**
 * Class LogRecordIterator
 */
class LogRecordIterator implements \Iterator
{
    const PREFIX_TEMPLATE = 'prefix/AWSLogs/account/CloudTrail/region/date/';
    const PREFIX_WILDCARD = '*';

    const OPT_TRAIL_NAME = 'TrailName';
    const OPT_KEY_PREFIX = 'S3KeyPrefix';
    const OPT_BUCKET_NAME = 'S3BucketName';
    const OPT_START_DATE = 'StartDate';
    const OPT_END_DATE = 'EndDate';
    const OPT_ACCOUNT_ID = 'AccountID';
    const OPT_LOG_REGION = 'LogRegion';
    const OPT_S3_CLIENT = 'S3Client';
    const OPT_CLOUDTRAIL_CLIENT = 'CloudTrailClient';

    /**
     * @var array Default options for the LogRecordIterator
     */
    private static $defaultOptions = array(
        self::OPT_TRAIL_NAME        => 'Default',
        self::OPT_KEY_PREFIX        => null,
        self::OPT_BUCKET_NAME       => null,
        self::OPT_START_DATE        => null,
        self::OPT_END_DATE          => null,
        self::OPT_ACCOUNT_ID        => null,
        self::OPT_LOG_REGION        => null,
        self::OPT_S3_CLIENT         => null,
        self::OPT_CLOUDTRAIL_CLIENT => null,
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

    /**
     * @param array $options
     *
     * @return LogRecordIterator
     * @throws \InvalidArgumentException
     */
    public static function factory(array $options = array())
    {
        // Apply default options
        $options = $options + self::$defaultOptions;

        // Get the CloudTrail client if it's set
        if ($options[self::OPT_CLOUDTRAIL_CLIENT] instanceof CloudTrailClient) {
            $cloudTrailClient = $options[self::OPT_CLOUDTRAIL_CLIENT];
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
            // If there is *still* no bucket name, then throw an exception
            if (!$options[self::OPT_BUCKET_NAME]) {
                throw new \InvalidArgumentException('You must provide either the log files\' bucket name or the '
                    . 'trail\'s name and a CloudTrailClient, so that the bucket name can be determined.');
            }
        }

        // Remove the clients from the options array
        unset($options[self::OPT_CLOUDTRAIL_CLIENT], $options[self::OPT_S3_CLIENT]);

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
     * @see http://docs.aws.amazon.com/awscloudtrail/latest/userguide/eventreference.html
     */
    public function current()
    {
        if (isset($this->logData[$this->recordCursor])) {
            return new Collection($this->logData[$this->recordCursor]);
        } else {
            return false;
        }
    }

    public function next()
    {
        // Advance the cursor
        $this->recordCursor++;

        // If the log records for the current log file have been exhausted, advance to the next log file
        while (!isset($this->logData[$this->recordCursor])) {
            $this->objectsIterator->next();
            if ($this->objectsIterator->valid()) {
                $this->loadRecordsFromObject();
            } else {
                break;
            }
        }
    }

    public function key()
    {
        if ($object = $this->objectsIterator->current()) {
            return "{$object['Key']}[{$this->recordCursor}]";
        } else {
            return null;
        }
    }

    public function valid()
    {
        return isset($this->logData[$this->recordCursor]);
    }

    public function rewind()
    {
        $this->objectsIterator->rewind();
        $this->loadRecordsFromObject();
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
        $keyPrefixParts['date'] = $this->fetchDateValue();

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

        $this->objectsIterator = $objectsIterator;
    }

    /**
     * Applies default options, normalizes date values, and fetches required trail data
     *
     * @throws \InvalidArgumentException
     */
    private function fetchDateValue()
    {
        // Normalize start and end date options
        foreach(array(self::OPT_START_DATE, self::OPT_END_DATE) as $key) {
            if ($this->options[$key] === null) {
                continue;
            } elseif (is_string($this->options[$key])) {
                $this->options[$key] = strtotime($this->options[$key]);
            } elseif ($this->options[$key] instanceof \DateTime) {
                $this->options[$key] = $this->options[$key]->format('U');
            } elseif (!is_int($this->options[$key])) {
                throw new \InvalidArgumentException('Date values must be a string, an int, or a DateTime object.');
            }
        }

        // Prepare the date value (year, month, and day)
        $startDate = $this->options[self::OPT_START_DATE];
        $endDate = $this->options[self::OPT_END_DATE];
        $dateParts = array_fill_keys(array('Y', 'm', 'd'), self::PREFIX_WILDCARD);
        if ($startDate && $endDate) {
            foreach ($dateParts as $key => &$value) {
                $candidateValue = date($key, $startDate);
                if ($candidateValue === date($key, $endDate)) {
                    $value = $candidateValue;
                } else {
                    break;
                }
            }
        }

        return join('/', $dateParts);
    }

    /**
     * Applies a regex iterator filter that limits the ListObjects result set based on the provided options
     *
     * @param \Traversable $objectsIterator
     * @param string       $logKeyPrefix
     * @param string       $candidatePrefix
     *
     * @return \Traversable
     */
    private function applyRegexFilter($objectsIterator, $logKeyPrefix, $candidatePrefix)
    {
        if ($logKeyPrefix !== $candidatePrefix) {
            $regex = rtrim($candidatePrefix, '/' . self::PREFIX_WILDCARD) . '/';
            $regex = strtr($regex, array(self::PREFIX_WILDCARD => '[^/]+'));
            if ($logKeyPrefix !== $regex) {
                $objectsIterator = new FilterIterator($objectsIterator, function ($object) use ($regex) {
                    return preg_match("#{$regex}#", $object['Key']);
                });
            }
        }

        return $objectsIterator;
    }

    /**
     * Applies an iterator filter to restrict the ListObjects result set to the specified date range
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
        $this->recordCursor = 0;
        $this->logData = array();

        // Fetch and decode the log file content
        if ($object = $this->objectsIterator->current()) {
            $command = $this->s3Client->getCommand('GetObject', array(
                'Bucket'                  => $this->options[self::OPT_BUCKET_NAME],
                'Key'                     => $object['Key'],
                'ResponseContentEncoding' => 'x-gzip',
            ));
            $command->prepare()->addHeader('Accept-Encoding', 'gzip');
            $data = $command->getResponse()->json();

            // Pull the data from the "Records" key of the data
            if (isset($data['Records'])) {
                $this->logData = $data['Records'];
            }
        }
    }
}
