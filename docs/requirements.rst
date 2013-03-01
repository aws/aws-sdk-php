============
Requirements
============

Aside from a baseline understanding of object-oriented programming in PHP (including PHP 5.3 namespaces), there are a
few minimum system requirements to start using the AWS SDK for PHP 2. The extensions listed are common and are
installed with PHP 5.3 by default in most environments.

Minimum requirements
--------------------

* PHP 5.3.3+ compiled with the cURL extension
* A recent version of cURL 7.16.2+ compiled with OpenSSL and zlib

.. note::

    To work with Amazon CloudFront private distributions, you must have the OpenSSL PHP extension to sign private
    CloudFront URLs.

.. _optimal-settings:

Optimal settings
----------------

Please consult the :doc:`performance` for a list of recommendations and optimal settings that can be made to
ensure that you are using the SDK as efficiently as possible.
