=================================
Working with Amazon EC2 Key Pairs
=================================

Amazon EC2 uses public–key cryptography to encrypt and decrypt login information. Public–key cryptography uses a public key to encrypt data; then the recipient uses the private key to decrypt the data. The public and private keys are known as a key pair.

The examples below show how to:

* Create a 2048-bit RSA key pair using `CreateKeyPair <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#createkeypair>`_.
* Delete a specified key pair using `DeleteKeyPair <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#deletekeypair>`_.
* Describe one or more of your key pairs using `DescribeKeyPairs <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#describekeypairs>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Create a Key Pair
-----------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    $keyPairName = 'my-keypair';
    $result = $ec2Client->createKeyPair(array(
        'KeyName' => $keyPairName
    ));
    // Save the private key
    $saveKeyLocation = getenv('HOME') . "/.ssh/{$keyPairName}.pem";
    file_put_contents($saveKeyLocation, $result['keyMaterial']);
    // Update the key's permissions so it can be used with SSH
    chmod($saveKeyLocation, 0600);

Delete a Key Pair
-----------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    $keyPairName = 'my-keypair';
    $result = $ec2Client->deleteKeyPair(array(
        'KeyName' => $keyPairName
    ));
    var_dump($result);

Describe Key Pairs
------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    $result = $ec2Client->describeKeyPairs();
    var_dump($result);
