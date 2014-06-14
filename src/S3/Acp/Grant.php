<?php
namespace Aws\S3\Acp;

use Aws\S3\Enum\Permission;
use Aws\Common\Exception\InvalidArgumentException;
use Guzzle\Common\ToArrayInterface;

/**
 * Amazon S3 Grant model
 */
class Grant implements ToArrayInterface
{
    /** @var array A map of permissions to operation parameters */
    private static $parameterMap = [
        Permission::READ         => 'GrantRead',
        Permission::WRITE        => 'GrantWrite',
        Permission::READ_ACP     => 'GrantReadACP',
        Permission::WRITE_ACP    => 'GrantWriteACP',
        Permission::FULL_CONTROL => 'GrantFullControl'
    ];

    /** @var Grantee The grantee affected by the grant */
    private $grantee;

    /** @var string The permission set by the grant */
    private $permission;

    /**
     * Constructs an ACL
     *
     * @param Grantee $grantee    Affected grantee
     * @param string  $permission Permission applied
     */
    public function __construct(Grantee $grantee, $permission)
    {
        $this->setGrantee($grantee);
        $this->setPermission($permission);
    }

    /**
     * Set the grantee affected by the grant
     *
     * @param Grantee $grantee Affected grantee
     *
     * @return self
     */
    public function setGrantee(Grantee $grantee)
    {
        $this->grantee = $grantee;

        return $this;
    }

    /**
     * Get the grantee affected by the grant
     *
     * @return Grantee
     */
    public function getGrantee()
    {
        return $this->grantee;
    }

    /**
     * Set the permission set by the grant
     *
     * @param string $permission Permission applied
     *
     * @return self
     *
     * @throws InvalidArgumentException
     */
    public function setPermission($permission)
    {
        $valid = Permission::values();
        if (!in_array($permission, $valid)) {
            throw new InvalidArgumentException('The permission must be one of '
                . 'the following: ' . implode(', ', $valid) . '.');
        }

        $this->permission = $permission;

        return $this;
    }

    /**
     * Get the permission set by the grant
     *
     * @return string
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * Returns an array of the operation parameter and value to set on the
     * operation
     *
     * @return array
     */
    public function getParameterArray()
    {
        $value = $this->grantee->getHeaderValue();

        return [self::$parameterMap[$this->permission] => $value];
    }

    public function toArray()
    {
        return [
            'Grantee'    => $this->grantee->toArray(),
            'Permission' => $this->permission
        ];
    }
}
