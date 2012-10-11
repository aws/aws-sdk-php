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

use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Exception\OverflowException;
use Guzzle\Common\ToArrayInterface;

/**
 * Amazon S3 ACL model
 */
class Acl implements ToArrayInterface, \IteratorAggregate, \Countable
{
    /**
     * @var \SplObjectStorage List of grants on the ACL
     */
    protected $grants = array();

    /**
     * @var Grantee The owner of the ACL policy
     */
    protected $owner;

    /**
     * Constructs an ACL
     *
     * @param Grantee            $owner  ACL policy owner
     * @param array|\Traversable $grants List of grants for the ACL
     */
    public function __construct(Grantee $owner, $grants = null)
    {
        $this->setOwner($owner);
        $this->setGrants($grants);
    }

    /**
     * Create an Acl object from a SimpleXMLElement command result. This can
     * be used to easily interact with the result of a getObjectAcl or
     * getBucketAcl command.
     *
     * @param \SimpleXMLElement $xml XML data
     *
     * @return self
     */
    public static function fromXml(\SimpleXMLElement $xml)
    {
        $builder = new AclBuilder();
        $builder->setOwner((string) $xml->Owner->ID, (string) $xml->Owner->DisplayName);

        // Add each Grantee to the Acl
        foreach ($xml->AccessControlList->Grant as $grant) {
            $permission = (string) $grant->Permission;
            switch ((string) $grant->Grantee->attributes('xsi', true)->type) {
                case 'Group':
                    $builder->addGrantForGroup($permission, (string) $grant->Grantee->URI);
                    break;
                case 'AmazonCustomerByEmail':
                    $builder->addGrantForEmail($permission, (string) $grant->Grantee->EmailAddress);
                    break;
                case 'CanonicalUser':
                    $builder->addGrantForUser(
                        $permission,
                        (string) $grant->Grantee->ID,
                        (string) $grant->Grantee->DisplayName
                    );
            }
        }

        return $builder->build();
    }

    /**
     * Set the owner of the ACL policy
     *
     * @param Grantee $owner ACL policy owner
     *
     * @return self
     *
     * @throws InvalidArgumentException if the grantee does not have an ID set
     */
    public function setOwner(Grantee $owner)
    {
        if (!$owner->isCanonicalUser()) {
            throw new InvalidArgumentException('The owner must have an ID set.');
        }

        $this->owner = $owner;

        return $this;
    }

    /**
     * Get the owner of the ACL policy
     *
     * @return Grantee
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set the grants for the ACL
     *
     * @param  array|\Traversable $grants List of grants for the ACL
     *
     * @return self
     *
     * @throws InvalidArgumentException
     */
    public function setGrants($grants = array())
    {
        $this->grants = new \SplObjectStorage();

        if ($grants) {
            if (is_array($grants) || $grants instanceof \Traversable) {
                /** @var $grant Grant */
                foreach ($grants as $grant) {
                    $this->addGrant($grant);
                }
            } else {
                throw new InvalidArgumentException('Grants must be passed in as an array or Traversable object.');
            }
        }

        return $this;
    }

    /**
     * Get all of the grants
     *
     * @return \SplObjectStorage
     */
    public function getGrants()
    {
        return $this->grants;
    }

    /**
     * Add a Grant
     *
     * @param Grant $grant Grant to add
     *
     * @return self
     */
    public function addGrant(Grant $grant)
    {
        if (count($this->grants) < 100) {
            $this->grants->attach($grant);
        } else {
            throw new OverflowException('An ACL may contain up to 100 grants.');
        }

        return $this;
    }

    /**
     * Get the total number of attributes
     *
     * @return int
     */
    public function count()
    {
        return count($this->grants);
    }

    /**
     * Returns the grants for iteration
     *
     * @return \SplObjectStorage
     */
    public function getIterator()
    {
        return $this->grants;
    }

    /**
     * Returns an array of headers representing the grants in the ACL.
     *
     * @return array
     */
    public function getGrantHeaders()
    {
        /** @var $grant Grant */
        $headers = array();
        foreach ($this->grants as $grant) {
            $headers = array_merge_recursive($headers, $grant->getHeaderArray());
        }

        foreach ($headers as &$values) {
            $values = implode(', ', (array) $values);
        }

        return $headers;
    }

    /**
     * {@inheritdoc}
     * @todo
     */
    public function toArray()
    {
        return array();
    }

    /**
     * Returns the string form (XML) of the ACL
     *
     * @return string
     */
    public function __toString()
    {
        $grants = '';
        foreach ($this->grants as $grant) {
            $grants .= (string) $grant;
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<AccessControlPolicy xmlns="http://s3.amazonaws.com/doc/latest/">';
        $xml .= '<Owner><ID>' . $this->owner->getId() . '</ID><DisplayName>';
        $xml .= $this->owner->getDisplayName() . '</DisplayName></Owner>';
        $xml .= '<AccessControlList>' . $grants . '</AccessControlList>';
        $xml .= '</AccessControlPolicy>';

        return $xml;
    }
}
