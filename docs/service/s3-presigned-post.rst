=========================
Amazon S3 Presigned POSTs
=========================

Much like pre-signed URLs, pre-signed POSTs allow you to give write access to a
user without giving them AWS credentials. Presigned POST forms can be created
with the help of an instance of `Aws\S3\PostObject <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Aws.S3.PostObject.html>`_.

To create an instance of ``PostObject``, you must provide an instance of
``Aws\S3\S3Client``, a bucket, an associative array of form input fields, and
a JSON-encoded `POST policy document
<http://docs.aws.amazon.com/AmazonS3/latest/dev/HTTPPOSTForms.html#HTTPPOSTConstructPolicy>`_:

.. code-block:: php

    $client = new \Aws\S3\S3Client([
        'version' => 'latest',
        'region' => 'us-west-2',
    ]);
    $bucket = 'mybucket';

    // Set some defaults for form input fields
    $formInputs = ['acl' => 'public-read'];

    // Construct a JSON-encoded POST policy
    $policy = json_encode([
        'expiration' => '2016-12-01T12:00:00.000Z',
        'conditions' => [
            ['acl' => 'public-read'],
            ['bucket' => $bucket],
            ['starts-with', '$key', 'user/eric/'],
        ],
    ]);

    $postObject = new \Aws\S3\PostObject(
        $client,
        $bucket,
        $formInputs,
        $policy
    );

    // Get attributes to set on an HTML form, e.g., action, method, enctype
    $formAttributes = $postObject->getFormAttributes();

    // Get form input fields. This will include anything set as a form input in
    // the constructor, the provided JSON policy, your AWS Access Key ID, and an
    // auth signature.
    $formInputs = $postObject->getFormInputs();
