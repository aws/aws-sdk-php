=================
Performance Guide
=================

The AWS SDK for PHP is able to send HTTP requests to various web services with
minimal overhead. This document serves as a guide that will help you to achieve
optimal performance with the SDK.

.. contents::
   :depth: 1
   :local:
   :class: inline-toc

Upgrade PHP
-----------

Using an up-to-date version of PHP will generally improve the performance of
your PHP applications. While the SDK requires PHP 5.4 or greater, we recommend
installing PHP >= 5.5 so that you can used the improved
`OPcache <http://php.net/manual/en/book.opcache.php>`_.

You can install PHP 5.5 on an Amazon Linux AMI using the following command.

.. code-block:: bash

    yum install php55

Use an opcode cache
-------------------

To improve the overall performance of your PHP environment, it is critical that
you use an opcode cache. PHP 5.5 has a built-in opcode cache, and when using
PHP 5.4, we recommend using APC. By default, PHP must load a file from disk,
parse the PHP code into opcodes, and finally execute the opcodes. Installing an
opcode cache allows the parsed opcodes to be cached in memory so that you do
not need to parse the script on every web server request, and in ideal
circumstances, these opcodes can be served directly from memory.

We have taken great care to ensure that the SDK will perform well in an
environment that utilizes an opcode cache.

.. note::

    PHP 5.5 comes with an opcode cache that is installed and enabled by default:
    http://php.net/manual/en/book.opcache.php. However, you will need to
    install the ``php55-opcache`` yum package when running on Amazon Linux.

    If you are using PHP 5.5, then you may skip the remainder of this section.

APC
~~~

If you are not able to run PHP 5.5, then we recommend using APC as an opcode
cache.

Installing on Amazon Linux
^^^^^^^^^^^^^^^^^^^^^^^^^^

When using Amazon Linux, you can install APC using one of the following
commands depending on if you are using PHP 5.4.

.. code-block:: bash

    # For PHP 5.4
    yum install php54-pecl-apc

Modifying APC settings
^^^^^^^^^^^^^^^^^^^^^^

APC configuration settings can be set and configured in the ``apc.ini`` file of
most systems. You can find more information about configuring APC in the
PHP.net `APC documentation <http://www.php.net/manual/en/apc.configuration.php>`_.

The APC configuration file is located at ``/etc/php.d/apc.ini`` on Amazon Linux.

.. code-block:: bash

    # You can only modify the file as sudo
    sudo vim /etc/php.d/apc.ini

apc.shm_size=128M
^^^^^^^^^^^^^^^^^

It is recommended that you set the `apc.shm_size <http://www.php.net/manual/en/apc.configuration.php#ini.apc.shm-size>`_
setting to be 128M or higher. You should investigate what the right value will
be for your application. The ideal value will depend on how many files your
application includes, what other frameworks are used by your application, and
if you are caching data in the APC user cache.

You can run the following command on Amazon Linux to set apc.shm_size to 128M::

    sed -i "s/apc.shm_size=.*/apc.shm_size=128M/g" /etc/php.d/apc.ini

apc.stat=0
^^^^^^^^^^

The SDK adheres to PSR-0 and relies heavily on class autoloading. When
``apc.stat=1``, APC will perform a stat on each cached entry to ensure that the
file has not been updated since it was cache in APC. This incurs a system call
for every autoloaded class required by a PHP script (you can see this for
yourself by running ``strace`` on your application).

You can tell APC to not stat each cached file by setting ``apc.stat=0`` in you
apc.ini file. This change will generally improve the overall performance of
APC, but it will require you to explicitly clear the APC cache when a cached
file should be updated. This can be accomplished with Apache by issuing a hard
or graceful restart. This restart step could be added as part of the deployment
process of your application.

You can run the following command on Amazon Linux to set apc.stat to 0::

    sed -i "s/apc.stat=1/apc.stat=0/g" /etc/php.d/apc.ini

.. admonition:: From the `PHP documentation <http://www.php.net/manual/en/apc.configuration.php#ini.apc.stat>`_

    This defaults to on, forcing APC to stat (check) the script on each request
    to determine if it has been modified. If it has been modified it will
    recompile and cache the new version. If this setting is off, APC will not
    check, which usually means that to force APC to recheck files, the web
    server will have to be restarted or the cache will have to be manually
    cleared. Note that FastCGI web server configurations may not clear the
    cache on restart. On a production server where the script files rarely
    change, a significant performance boost can be achieved by disabled stats.

    For included/required files this option applies as well, but note that for
    relative path includes (any path that doesn't start with / on Unix) APC has
    to check in order to uniquely identify the file. If you use absolute path
    includes APC can skip the stat and use that absolute path as the unique
    identifier for the file.

Use Composer with a classmap autoloader
---------------------------------------

Using `Composer <http://getcomposer.org>`_ is the recommended way to install
the AWS SDK for PHP. Composer is a dependency manager for PHP that can be used
to pull in all of the dependencies of the SDK and generate an autoloader.

Autoloaders are used to lazily load classes as they are required by a PHP
script. Composer will generate an autoloader that is able to autoload the PHP
scripts of your application and all of the PHP scripts of the vendors required
by your application (i.e. the AWS SDK for PHP). When running in production, it
is highly recommended that you use a classmap autoloader to improve the
autoloader's speed. You can generate a classmap autoloader by passing the
``-o`` or ``--optimize-autoloader`` option to Composer's
`install command <http://getcomposer.org/doc/03-cli.md#install>`_::

    php composer.phar install -o

Please consult the :doc:`installation` guide for more information on how to
install the SDK using Composer.

Uninstall Xdebug
----------------

`Xdebug <http://xdebug.org/>`_ is an amazing tool that can be used to identify
performance bottlenecks. However, if performance is critical to your
application, do not install the Xdebug extension on your production environment.
Simply loading the extension will greatly slow down the SDK.

When running on Amazon Linux, Xdebug can be removed with the following command:

.. code-block:: bash

    # PHP 5.4
    yum remove php54-pecl-xdebug

Install PECL uri_template
-------------------------

The SDK utilizes URI templates to power each operation. In order to be
compatible out of the box with the majority of PHP environments, the default
URI template expansion implementation is written in PHP.
`PECL URI_Template <https://github.com/ioseb/uri-template>`_ is a URI template
extension for PHP written in C. This C implementation is about 3 times faster
than the default PHP implementation for expanding URI templates. Your
application will automatically begin utilizing the PECL uri_template extension
after it is installed.

.. code-block:: bash

    pecl install uri_template-alpha

Check if you are being throttled
--------------------------------

You can check to see if you are being throttled by enabling the exponential
backoff logger option. You can set the ``retry_logger`` option of a client
constructor to ``debug`` when in development, but we recommend that you provide
an instance of ``Psr\Log\LoggerInterface`` object when running in production so
that you can log retries to a specific location.

.. code-block:: php

    $client = Aws\DynamoDb\DynamoDbClient::factory([
        'region'       => 'us-west-2',
        'retry_logger' => 'debug'
    ]);

When using Amazon DynamoDB, you can monitor your tables for throttling using
`Amazon CloudWatch <http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/MonitoringDynamoDB.html#CloudwatchConsole_DynamoDB>`_.

Profile your code to find performance bottlenecks
-------------------------------------------------

You will need to profile your application to determine the bottlenecks. This
can be done using `Xdebug <http://xdebug.org/>`_, `XHProf <https://github.com/facebook/xhprof>`_,
`strace <http://en.wikipedia.org/wiki/Strace>`_, and various other tools. There
are many resources available on the internet to help you track down performance
problems with your application. Here are a few that we have found useful:

* http://talks.php.net/show/devconf/0
* http://talks.php.net/show/perf_tunning/16
