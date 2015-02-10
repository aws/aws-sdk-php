============
Installation
============

This guide assumes that your system meets the minimum system requirements
outlined in the :doc:`installing guide <installation>`.

Installing via Composer
-----------------------

Using `Composer <http://getcomposer.org>`_ is the recommended way to install
the AWS SDK for PHP. Composer is a dependency management tool for PHP that
allows you to declare the dependencies your project needs and installs them
into your project. In order to use the SDK with Composer, you must do the
following:

#. Add ``"aws/aws-sdk-php"`` as a dependency in your project's
``composer.json`` file.

   .. code-block:: js

       {
           "require": {
               "aws/aws-sdk-php": "~3.0"
           }
       }

#. Download and install Composer.

   .. code-block:: sh

       curl -sS https://getcomposer.org/installer | php

#. Install your dependencies.

   .. code-block:: sh

       php composer.phar install -o

#. Require Composer's autoloader.

   Composer prepares an autoload file that's capable of autoloading all of the
   classes in any of the libraries that it downloads. To use it, just add the
   following line to your code's bootstrap process.

   .. code-block:: php

       require __DIR__ . '/vendor/autoload.php';

You can find out more on how to install Composer, configure autoloading, and
other best-practices for defining dependencies at
`getcomposer.org <http://getcomposer.org>`_.

During your development, you can keep up with the latest changes on the master
branch by setting the version requirement for the SDK to ``dev-master``.

.. code-block:: js

   {
      "require": {
         "aws/aws-sdk-php": "dev-master"
      }
   }

If you are deploying your application to `AWS Elastic Beanstalk
<http://docs.aws.amazon.com/elasticbeanstalk/latest/dg/create_deploy_PHP_eb.html>`_,
and you have a ``composer.json`` file in the root of your package, then Elastic
Beanstalk will automatically perform a Composer ``install`` when you deploy
your application.

Installing via Phar
-------------------

Each release of the AWS SDK for PHP ships with a pre-packaged
`phar <http://php.net/manual/en/book.phar.php>`_ (PHP archive) file containing
all of the classes and dependencies you need to run the SDK. Additionally, the
phar file automatically registers a class autoloader for the AWS SDK for PHP
and all of its dependencies when included. Bundled with the phar file are the
following required and suggested libraries:

-  `Guzzle <https://github.com/guzzle/guzzle>`_ for HTTP requests
-  `RingPHP <https://github.com/guzzle/guzzle>`_ for HTTP handlers
-  `jmespath.php <https://github.com/jmespath/jmespath.php>`_ for JMESPath
    support.
-  `transducers.php <https://github.com/mtdowling/transducers.php>`_ use
   internally by the SDK.
-  `React/Promise <https://github.com/reactphp/promise>`_ for promise support

You can `download the packaged Phar <https://github.com/aws/aws-sdk-php/releases>`_
and simply include it in your scripts to get started::

    require '/path/to/aws.phar';

.. note::

    If you are using PHP with the Suhosin patch (especially common on Ubuntu
    and Debian distributions), you may need to enable the use of phars in the
    ``suhosin.ini``. Without this, including a phar file in your code will
    cause it to silently fail. You should modify the ``suhosin.ini`` file by
    adding the line:

    ``suhosin.executor.include.whitelist = phar``

Installing via Zip
------------------

Each release of the AWS SDK for PHP (since 2.3.2) ships with a zip file
containing all of the classes and dependencies you need to run the SDK.
Additionally, the zip file includes a class autoloader for the AWS SDK for PHP
and all of its dependencies.

To get started, you must `download the zip file <https://github.com/aws/aws-sdk-php/releases>`_,
unzip it into your project to a location of your choosing, and include the
autoloader::

    require '/path/to/aws-autoloader.php';
