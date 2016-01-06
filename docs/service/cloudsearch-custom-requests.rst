=========================================
Signing Custom CloudSearchDomain Requests
=========================================

CloudSearchDomain requests can be customized beyond what is supported by the AWS
SDK for PHP. In cases where you need to make custom requests to domains
protected by IAM authentication, you can use the SDK's credential providers and
signers to sign any `PSR-7 request
<http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Psr.Http.Message.RequestInterface.html>`_.

For example, if you're following `CloudSearch's Getting Started guide
<http://docs.aws.amazon.com/cloudsearch/latest/developerguide/getting-started.html>`_
and want to use an IAM-protected domain for `Step 3
<http://docs.aws.amazon.com/cloudsearch/latest/developerguide/getting-started-search.html>`_,
you would need to sign and execute your request as follows:

.. code-block:: php

    use Aws\Credentials\CredentialProvider;
    use Aws\Signature\SignatureV4;
    use GuzzleHttp\Client;
    use GuzzleHttp\Psr7\Request;

    // Prepare a CloudSearchDomain request
    $request = new Request(
        'GET',
        'https://<your-domain>.<region-of-domain>.cloudsearch.amazonaws.com/2013-01-01/search?q=star+wars&return=title'
    );

    // Get your credentials from the environment
    $credentials = call_user_func(CredentialProvider::defaultProvider())->wait();

    // Construct a request signer
    $signer = new SignatureV4('cloudsearch', '<region-of-domain>');

    // Sign the request
    $request = $signer->signRequest($request, $credentials);

    // Send the request
    $response = (new Client)->send($request);
    $results = json_decode($response->getBody());
    if ($results->hits->found > 0) {
        echo $results->hits->hit[0]->fields->title . "\n";
    }
