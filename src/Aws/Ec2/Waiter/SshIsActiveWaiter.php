<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\Ec2\Waiter;

use Aws\Common\Waiter\AbstractResourceWaiter;
use Aws\Common\Exception\BadMethodCallException;
use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Exception\RequiredExtensionNotLoadedException;

/**
 * Waiter for determining whether or not the SSH service is active on an EC2 instance.
 */
class SshIsActiveWaiter extends AbstractResourceWaiter
{
    /**
     * The hostname to connect to.
     * @var string
     */
    private static $hostname = null;

    /**
     * The path to the public key.
     * @var string
     */
    private static $public_key = null;

    /**
     * The path to the private key.
     * @var string
     */
    private static $private_key = null;

    /**
     * {@inheritdoc}
     */
    public function doWait(array $input)
    {
        if (!extension_loaded('openssl')) {
            //@codeCoverageIgnoreStart
            throw new RequiredExtensionNotLoadedException('The openssl extension is required to handle public/private/pem keys.');
            //@codeCoverageIgnoreEnd
        }

        if (!extension_loaded('ssh2')) {
            //@codeCoverageIgnoreStart
            throw new RequiredExtensionNotLoadedException('The ssh2 extension is required to make SSH connections to EC2 instances.');
            //@codeCoverageIgnoreEnd
        }

        /* InstanceId, Hostname, IpAddress */
        if (!isset($input['InstanceId']) && !isset($input['Hostname']) && !isset($input['IpAddress']))
        {
            throw new InvalidArgumentException('Either the "InstanceId", "Hostname" or "IpAddress" parameters are required.');
        }
        elseif (!self::$hostname && isset($input['InstanceId']))
        {
            $response = $this->client->describeInstances(array(
                'InstanceIds' => array($input['InstanceId'])
            ));

            $reservations = $response->get('Reservations');
            $instance = $reservations[0]['Instances'][0];

            if (isset($instance['PublicDnsName']))
            {
                self::$hostname = (string) $instance['PublicDnsName'];
            }
            elseif (isset($instance['PublicIpAddress']))
            {
                self::$hostname = (string) $instance['PublicIpAddress'];
            }
            else
            {
                self::$hostname = null;
                throw new BadMethodCallException('Neither a public DNS hostname nor a public IP address are available for this instance.');
            }
        }
        elseif (!self::$hostname && isset($input['Hostname']))
        {
            self::$hostname = $input['Hostname'];
        }
        elseif (!self::$hostname && isset($input['IpAddress']))
        {
            self::$hostname = $input['IpAddress'];
        }

        /* PublicKey, PrivateKey, PemKey */
        if (!isset($input['PublicKey']) && !isset($input['PrivateKey']) && !isset($input['PemKey']))
        {
            throw new InvalidArgumentException('Either the "PublicKey" and "PrivateKey", or "PemKey" parameters are required.');
        }
        elseif (
            (!self::$public_key  && isset($input['PublicKey'])) ||
            (!self::$private_key && isset($input['PrivateKey']))
        ) {
            if (isset($input['PublicKey']) && !file_exists($input['PublicKey']))
            {
                throw new InvalidArgumentException('Public key does not exist at the path specified.');
            }

            if (isset($input['PrivateKey']) && !file_exists($input['PrivateKey']))
            {
                throw new InvalidArgumentException('Private key does not exist at the path specified.');
            }

            self::$public_key = $input['PublicKey'];
            self::$private_key = $input['PrivateKey'];
        }
        elseif (!(self::$public_key && self::$private_key) && isset($input['PemKey']))
        {
            if (!file_exists($input['PemKey']))
            {
                throw new InvalidArgumentException('PEM key does not exist at the path specified.');
            }

            // Store temporary copies
            $dir = sys_get_temp_dir();
            self::$public_key = tempnam($dir, 'Public');
            self::$private_key = tempnam($dir, 'Private');

            // Cache the private key
            $pem = file_get_contents($input['PemKey']);
            $private_data = openssl_pkey_get_private($pem);
            openssl_pkey_export_to_file($private_data, self::$private_key);

            // Cache the public key
            $private_details = openssl_pkey_get_details($private_data);
            $buffer = pack('N', 7) . 'ssh-rsa' .
                self::encoder($private_details['rsa']['e']) .
                self::encoder($private_details['rsa']['n']);
            file_put_contents(self::$public_key, 'ssh-rsa ' . base64_encode($buffer));

            // Attempt to connect over SSH.
            $connection = ssh2_connect(self::$hostname, 22, array(
                'hostkey' => 'ssh-rsa'
            ));

            // Authentication
            return (bool) ssh2_auth_pubkey_file($connection, 'ec2-user', self::$public_key, self::$private_key);
        }
    }

    /**
     * Encodes an RSA-style key as an OpenSSH-style key.
     *
     * @param  string $buffer The portion of the buffer to encode.
     * @return string         An encoded form of the string.
     */
    public static function encoder($buffer)
    {
        $buffer_length = strlen($buffer);

        if (ord($buffer[0]) & 0x80)
        {
            $buffer_length++;
            $buffer = "\x00" . $buffer;
        }

        return pack('Na*', $buffer_length, $buffer);
    }
}
