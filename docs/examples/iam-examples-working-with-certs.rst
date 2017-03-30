====================================
Working with IAM Server Certificates
====================================

To enable HTTPS connections to your website or application on AWS, you need an SSL/TLS server certificate. To use a certificate that you obtained from an external provider with your website or application on AWS, you must upload the certificate to IAM or import it into AWS Certificate Manager.

The examples below show how to:

* List the certificates stored in IAM using `ListServerCertificates <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#listservercertificates>`_.
* Retrieve information about a certificate using `GetServerCertificate <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#getservercertificate>`_.
* Update a certificate using `UpdateServerCertificate <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#updateservercertificate>`_.
* Delete a certificate using `DeleteServerCertificate <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#deleteservercertificate>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

List Server Certificates
------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Iam\IamClient;
    use Aws\Exception\AwsException;

    $client = new IamClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2010-05-08'
    ]);
    try {
        $result = $client->listServerCertificates();
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Retrieve a Server Certificate
-----------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Iam\IamClient;
    use Aws\Exception\AwsException;

    $client = new IamClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2010-05-08'
    ]);
    try {
        $result = $client->getServerCertificate(array(
            // ServerCertificateName is required
            'ServerCertificateName' => 'string',
        ));
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Update a Server Certificate
---------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Iam\IamClient;
    use Aws\Exception\AwsException;

    $client = new IamClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2010-05-08'
    ]);
    try {
        $result = $client->updateServerCertificate(array(
            // ServerCertificateName is required
            'ServerCertificateName' => 'string',
            'NewServerCertificateName' => 'string',
        ));
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Delete a Server Certificate
---------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Iam\IamClient;
    use Aws\Exception\AwsException;

    $client = new IamClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2010-05-08'
    ]);
    try {
        $result = $client->deleteServerCertificate(array(
            // ServerCertificateName is required
            'ServerCertificateName' => 'string',
        ));
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }
