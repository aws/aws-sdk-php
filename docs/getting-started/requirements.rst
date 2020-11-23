============
Requirements
============

Aside from a baseline understanding of object-oriented programming in PHP
(including PHP namespaces and autoloading), there are a few minimum system
requirements to start using the AWS SDK for PHP.

Minimum requirements
--------------------

* PHP >= 5.5.0

Optional requirements
---------------------

* `OpenSSL PHP extension <http://php.net/manual/en/book.openssl.php>`_

  You must have the OpenSSL PHP extension to sign private Amazon CloudFront
  URLs.

.. _optimal-settings:

Optimal settings
----------------

* `cURL <http://php.net/manual/en/book.curl.php>`_ >= 7.16.2

  While not required, we recommend installing a recent version of cURL compiled
  with OpenSSL/NSS and zlib. If cURL is not installed on your system and you do
  not configure a custom ``http_handler`` for your client, then the SDK will
  use the PHP stream wrapper (a very underpowered HTTP client).

* `OPCache <http://php.net/manual/en/book.opcache.php>`_

  Using the OPcache extension improves PHP performance by storing precompiled
  script bytecode in shared memory, thereby removing the need for PHP to load
  and parse scripts on each request. This extension is typically enabled by
  default.

  When running on Amazon Linux, you need to install the ``php56-opcache`` or
  ``php55-opcache`` yum package to utilize the OPCache extension.

* Uninstall `Xdebug <http://xdebug.org/>`_

  Xdebug is an amazing tool that can be used to identify performance
  bottlenecks. However, if performance is critical to your application, do not
  install the Xdebug extension on your production environment. Simply loading
  the extension will greatly slow down the SDK.

* Use a `Composer <http://getcomposer.org>`_ classmap autoloader

  Autoloaders are used to lazily load classes as they are required by a PHP
  script. Composer will generate an autoloader that is able to autoload the PHP
  scripts of your application and all of the PHP scripts of the vendors
  required by your application (i.e. the AWS SDK for PHP). When running in
  production, it is highly recommended that you use a classmap autoloader to
  improve the autoloader's speed. You can generate a classmap autoloader by
  passing the ``-o`` or ``--optimize-autoloader`` option to Composer's
  `install command <http://getcomposer.org/doc/03-cli.md#install>`_.

Compatibility test
------------------

Run the `compatibility-test.php` file in the SDK to quickly check if your
system is capable of running the SDK. In addition to meeting the minimum system
requirements of the SDK, the compatibility test checks for optional settings
and makes recommendations that can help you to improve the performance of the
SDK. The compatibility test can output text for the command line or a web
browser. When running in a browser, successful checks appear in green, warnings
in purple, and failures in red. When running from the CLI, the result of a
check will appear on each line.

When reporting an issue with the SDK, it is often helpful to share information
about your system. Supplying the output of the compatibility test in forum
posts or GitHub issues can help to streamline the process of identifying the
root cause of an issue.
