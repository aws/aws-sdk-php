<?php
namespace Aws\DynamoDb;

trait SessionConnectionConfigTrait
{
    /** @var string Name of table to store the sessions */
    protected $table_name = 'sessions';
    
    /** @var string Name of hash key in table. Default: "id" */
    protected $hash_key = 'id';
    
    /** @var string Name of the data attribute in table. Default: "data" */
    protected $data_attribute = 'data';
    
    /** @var integer Lifetime of inactive sessions expiration */
    protected $session_lifetime;
    
    /** @var string Name of the session life time attribute in table. Default: "expires" */
    protected $session_lifetime_attribute = 'expires';
    
    /** @var string Whether or not to use consistent reads */
    protected $consistent_read = true;
    
    /** @var string Batch options used for garbage collection */
    protected $batch_config = [];
    
    /** @var boolean Whether or not to use session locking */
    protected $locking = false;
    
    /** @var integer Max time (s) to wait for lock acquisition */
    protected $max_lock_wait_time = 10;
    
    /** @var integer Min time (µs) to wait between lock attempts */
    protected $min_lock_retry_microtime = 10000;
    
    /** @var integer Max time (µs) to wait between lock attempts */
    protected $max_lock_retry_microtime = 50000;
    
    
    /**
     * It initialize the Config class and
     * it sets values in case of valid configurations.
     * 
     * It transforms parameters underscore separated in camelcase "this_is_a_test" => ThisIsATest
     * and it uses it in order to set the values.
     * 
     * @param array $config
     */
    public function initConfig( array $config = [] )
    {
        if (!empty($config))
        {
            foreach ($config as $key => $value)
            {
                $method = 'set' . str_replace('_', '', ucwords($key, '_'));
                if(method_exists($this,$method))
                {
                    call_user_func_array(array($this, $method), array($value));
                }
            }
        }
        
        // It applies the default PHP session lifetime, if no session lifetime config is provided
        if(!isset($config['session_lifetime']))
        {
            $this->setSessionLifetime((int) ini_get('session.gc_maxlifetime'));
        }
    }
    
    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->table_name;
    }

    /**
     * @param string $table_name
     */
    public function setTableName($table_name)
    {
        $this->table_name = $table_name;
    }

    /**
     * @return string
     */
    public function getHashKey()
    {
        return $this->hash_key;
    }

    /**
     * @param string $hash_key
     */
    public function setHashKey($hash_key)
    {
        $this->hash_key = $hash_key;
    }

    /**
     * @return string
     */
    public function getDataAttribute()
    {
        return $this->data_attribute;
    }

    /**
     * @param string $data_attribute
     */
    public function setDataAttribute($data_attribute)
    {
        $this->data_attribute = $data_attribute;
    }

    /**
     * @return number
     */
    public function getSessionLifetime()
    {
        return $this->session_lifetime;
    }

    /**
     * @param number $session_lifetime
     */
    public function setSessionLifetime($session_lifetime)
    {
        $this->session_lifetime = $session_lifetime;
    }

    /**
     * @return string
     */
    public function getSessionLifetimeAttribute()
    {
        return $this->session_lifetime_attribute;
    }

    /**
     * @param string $session_lifetime_attribute
     */
    public function setSessionLifetimeAttribute($session_lifetime_attribute)
    {
        $this->session_lifetime_attribute = $session_lifetime_attribute;
    }

    /**
     * @return boolean
     */
    public function isConsistentRead()
    {
        return $this->consistent_read;
    }

    /**
     * @param boolean $consistent_read
     */
    public function setConsistentRead($consistent_read)
    {
        $this->consistent_read = $consistent_read;
    }

    /**
     * @return multitype:
     */
    public function getBatchConfig()
    {
        return $this->batch_config;
    }

    /**
     * @param multitype: $batch_config
     */
    public function setBatchConfig($batch_config)
    {
        $this->batch_config = $batch_config;
    }
    /**
     * @return boolean
     */
    public function isLocking()
    {
        return $this->locking;
    }

    /**
     * @param boolean $locking
     */
    public function setLocking($locking)
    {
        $this->locking = $locking;
    }

    /**
     * @return number
     */
    public function getMaxLockWaitTime()
    {
        return $this->max_lock_wait_time;
    }

    /**
     * @param number $max_lock_wait_time
     */
    public function setMaxLockWaitTime($max_lock_wait_time)
    {
        $this->max_lock_wait_time = $max_lock_wait_time;
    }

    /**
     * @return number
     */
    public function getMinLockRetryMicrotime()
    {
        return $this->min_lock_retry_microtime;
    }

    /**
     * @param number $min_lock_retry_microtime
     */
    public function setMinLockRetryMicrotime($min_lock_retry_microtime)
    {
        $this->min_lock_retry_microtime = $min_lock_retry_microtime;
    }

    /**
     * @return number
     */
    public function getMaxLockRetryMicrotime()
    {
        return $this->max_lock_retry_microtime;
    }

    /**
     * @param number $max_lock_retry_microtime
     */
    public function setMaxLockRetryMicrotime($max_lock_retry_microtime)
    {
        $this->max_lock_retry_microtime = $max_lock_retry_microtime;
    }
}
