============
Requirements
============

Aside from a baseline understanding of object-oriented programming in PHP (including PHP 5.3 namespaces), there are a
few minimum system requirements to start using the AWS SDK for PHP 2. The extensions listed are common and are
installed with PHP 5.3 by default in most environments.

Minimum requirements
--------------------

* PHP 5.3.2+ compiled with the cURL extension
* A recent version of cURL 7.16.2+ compiled with OpenSSL and zlib

.. note::

    To work with Amazon CloudFront private distributions, you must have the OpenSSL PHP extension to sign private
    CloudFront URLs.

Optimal settings
----------------

* PHP 5.3.18+ or PHP 5.4+
* Install an opcode cache
* Disable Xdebug

Opcode cache
~~~~~~~~~~~~

To improve the overall performance of your PHP environment, as well as to enable in-memory caching, it is highly
recommended that you install an opcode cache such as APC, XCache, or WinCache. When using APC, it is recommended that
you set the ``apc.shm_size`` INI setting to be 64MB *or higher* (this value may be based on the other frameworks used
by your application).

Turn off Xdebug
~~~~~~~~~~~~~~~

If performance is critical to your application, do not install the Xdebug extension in your production environment.
Simply loading the extension will greatly slow down the SDK.

PECL extensions
~~~~~~~~~~~~~~~

For even more performance, consider installing the PECL URI_Template extension::

    pecl install uri_template-alpha
