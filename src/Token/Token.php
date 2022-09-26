<?php
namespace Aws\Token;

use Aws\Token\TokenInterface;

/**
 * Basic implementation of the AWS Token interface that allows callers to
 * pass in an AWS token in the constructor.
 */
class Token implements TokenInterface, \Serializable
{
    protected $token;
    protected $expires;

    /**
     * Constructs a new basic token object, with the specified AWS
     * token
     *
     * @param string $token   Security token to use
     * @param int    $expires UNIX timestamp for when the token expires
     */
    public function __construct($token, $expires = null)
    {
        $this->token = $token;
        $this->expires = $expires;
    }

    public static function __set_state(array $state)
    {
        return new self(
            $state['token'],
            $state['expires']
        );
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return int
     */
    public function getExpiration()
    {
        return $this->expires;
    }

    /**
     * @return bool
     */
    public function isExpired()
    {
        return $this->expires !== null && time() >= $this->expires;
    }

    public function toArray()
    {
        return [
            'token'   => $this->token,
            'expires' => $this->expires
        ];
    }

    public function serialize()
    {
        return json_encode($this->__serialize());
    }

    public function unserialize($serialized)
    {
        $data = json_decode($serialized, true);

        $this->__unserialize($data);
    }

    public function __serialize()
    {
        return $this->toArray();
    }

    public function __unserialize($data)
    {
        $this->token = $data['token'];
        $this->expires = $data['expires'];
    }

}
