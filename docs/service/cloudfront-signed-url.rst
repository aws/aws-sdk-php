============================
Amazon CloudFront Signed URL
============================

Signing CloudFront URLs for Private Distributions
-------------------------------------------------

Signed URLs allow you to provide users access to your private content. A signed
URL includes additional information (e.g., expiration time) that gives you more
control over access to your content. This additional information appears in a
policy statement, which is based on either a canned policy or a custom policy.
For information about how to set up private distributions and why you need to
sign URLs, please read the `Serving Private Content through CloudFront section
<http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/PrivateContent.html>`_
of the CloudFront Developer Guide.

.. note:

    You must have the OpenSSL extension installed in you PHP environment in
    order to sign CloudFront URLs.

You can sign a URL using the CloudFront client in the SDK. First you must
create a ``CloudFrontClient`` object.

.. code-block:: php

    <?php

    $cloudFront = new Aws\CloudFront\CloudFrontClient([
        'region'  => 'us-west-2',
        'version' => '2014-11-06'
    ]);

You can sign a CloudFront URL for a video resource using either a canned or
custom policy.

.. code-block:: php

    // Setup parameter values for the resource
    $resourceKey = 'rtmp://example-distribution.cloudfront.net/videos/example.mp4';
    $expires = time() + 300;

    // Create a signed URL for the resource using the canned policy
    $signedUrlCannedPolicy = $cloudFront->getSignedUrl([
        'url'         => $resourceKey,
        'expires'     => $expires,
        'private_key' => '/path/to/your/cloudfront-private-key.pem',
        'key_pair_id' => '<cloudfront key pair id>'
    ]);

To use a custom policy, provide the ``policy`` key instead of ``expires``.

.. code-block:: php

    $customPolicy = <<<POLICY
    {
        "Statement": [
            {
                "Resource": "{$resourceKey}",
                "Condition": {
                    "IpAddress": {"AWS:SourceIp": "{$_SERVER['REMOTE_ADDR']}/32"},
                    "DateLessThan": {"AWS:EpochTime": {$expires}}
                }
            }
        ]
    }
    POLICY;

    // Create a signed URL for the resource using a custom policy
    $signedUrlCustomPolicy = $cloudFront->getSignedUrl([
        'url'    => $resourceKey,
        'policy' => $customPolicy,
        'private_key' => '/path/to/your/cloudfront-private-key.pem',
        'key_pair_id' => '<cloudfront key pair id>'
    ]);

The form of the signed URL is actually different depending on if the URL you
are signing is using the "http" or "rtmp" scheme. In the case of "http", the
full, absolute URL is returned. For "rtmp", only the relative URL is returned
for your convenience, because some players require the host and path to be
provided as separate parameters.

The following is an example of how you could use the signed URL to construct a
web page displaying a video using `JWPlayer <http://www.longtailvideo.com/jw-player/>`_.
The same type of technique would apply to other players like `FlowPlayer <http://flowplayer.org/>`_,
but will require different client-side code.

.. code-block:: html

    <html>
    <head>
        <title>Amazon CloudFront Streaming Example</title>
        <script type="text/javascript" src="https://example.com/jwplayer.js"></script>
    </head>
    <body>
        <div id="video">The canned policy video will be here.</div>
        <script type="text/javascript">
            jwplayer('video').setup({
                file: "<?= $streamHostUrl ?>/cfx/st/<?= $signedUrlCannedPolicy ?>",
                width: "720",
                height: "480"
            });
        </script>
    </body>
    </html>

Signing CloudFront Cookies for Private Distributions
----------------------------------------------------

As an alternative to signed URLs, you can also grant clients access to a private
distribution via signed cookies. Signed cookies allow you to provide access to
multiple restricted files, such all of the files for a video in HLS format or
all of the files in the subscribers' area of a website. For more information on
why you might want to use signed cookies instead of signed URLs (or vice versa),
please read the `Choosing Between Signed URLs and Signed Cookies section <http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/private-content-choosing-signed-urls-cookies.html>`_
of the CloudFront Developer Guide.

.. note:

    Signed cookies are not supported for RTMP distributions. Use signed URLs
    instead.

Creating a signed cookie is similar to creating a signed url, with the only
difference being the method called (``getSignedCookie`` instead of ``getSignedUrl``).

.. code-block:: php

    <?php

    $cloudFront = new Aws\CloudFront\CloudFrontClient([
        'region'  => 'us-west-2',
        'version' => '2014-11-06'
    ]);

    // Setup parameter values for the resource
    $resourceKey = 'https://example-distribution.cloudfront.net/videos/example.mp4';
    $expires = time() + 300;

    // Create a signed cookie for the resource using the canned policy
    $signedCookieCannedPolicy = $cloudFront->getSignedCookie([
        'url'         => $resourceKey,
        'expires'     => $expires,
        'private_key' => '/path/to/your/cloudfront-private-key.pem',
        'key_pair_id' => '<cloudfront key pair id>'
    ]);

As with ``getSignedUrl``, you can provide a ``'policy'`` parameter instead of an
``expires`` parameter and a ``url`` parameter to sign a cookie with a custom
policy. A custom policy may contain wildcards in the resource key, allowing you
to create a single signed cookie for multiple files.

.. code-block:: php

    $customPolicy = <<<POLICY
    {
        "Statement": [
            {
                "Resource": "{$resourceKey}",
                "Condition": {
                    "IpAddress": {"AWS:SourceIp": "{$_SERVER['REMOTE_ADDR']}/32"},
                    "DateLessThan": {"AWS:EpochTime": {$expires}}
                }
            }
        ]
    }
    POLICY;

    // Create a signed cookie for the resource using a custom policy
    $signedCookieCustomPolicy = $cloudFront->getSignedCookie([
        'policy' => $customPolicy,
        'private_key' => '/path/to/your/cloudfront-private-key.pem',
        'key_pair_id' => '<cloudfront key pair id>'
    ]);

``getSignedCookie`` will return an array of key-value pairs, all of which must
be set as cookies to grant access to a private distribution.

.. code-block:: php

    foreach ($signedCookieCustomPolicy as $name => $value) {
        setcookie($name, $value, 0, "", "example-distribution.cloudfront.net", true, true);
    }

You can also pass these cookies to a ``GuzzleHttp\Cookie\CookieJar`` for use
with a Guzzle client.

.. code-block:: php

    use GuzzleHttp\Client;
    use GuzzleHttp\Cookie\CookieJar;

    $distribution = "example-distribution.cloudfront.net";
    $client = new \GuzzleHttp\Client([
        'base_uri' => "https://$distribution",
        'cookies' => CookieJar::fromArray($signedCookieCustomPolicy, $distribution),
    ]);

    $client->get('video.mp4');

For more information on using signed cookies, please read the `Using Signed
Cookies section <http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/private-content-signed-cookies.html>`_
of the CloudFront Developer Guide.
