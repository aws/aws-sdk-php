<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\S3\Model;

use Aws\S3\Enum\Permission;
use Aws\Common\Exception\InvalidArgumentException;

/**
 * Amazon S3 Grant model
 */
class Grant
{
    /**
     * @var array A map of permissions to grant header keys
     */
    protected static $headerMap = array(
        Permission::READ         => 'x-amz-grant-read',
        Permission::WRITE        => 'x-amz-grant-write',
        Permission::READ_ACP     => 'x-amz-grant-read-acp',
        Permission::WRITE_ACP    => 'x-amz-grant-write-acp',
        Permission::FULL_CONTROL => 'x-amz-grant-full-control'
    );

    /**
     * @var Grantee The grantee affected by the grant
     */
    protected $grantee;

    /**
     * @var string The permission set by the grant
     */
    protected $permission;

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
     * Return an array representation of the grant to be used as a header
     *
     * @return array
     */
    public function getHeaderArray()
    {
        return array(
            self::$headerMap[$this->permission] => $this->grantee->getHeaderValue()
        );
    }

    /**
     * Returns the string form (XML) of the grant
     *
     * @return string
     */
    public function __toString()
    {
        $xml = '<Grant>' . $this->grantee;
        $xml .= '<Permission>' . $this->permission . '</Permission></Grant>';

        return $xml;
    }
}
