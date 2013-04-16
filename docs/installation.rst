Installation
============

Installing via Composer
-----------------------

Using `Composer <http://getcomposer.org>`_ is the recommended way to install the AWS SDK for PHP 2. Composer is a
dependency management tool for PHP that allows you to declare the dependencies your project needs and installs them into
your project. In order to use the AWS SDK for PHP 2 through Composer, you must do the following:

#. Add ``"aws/aws-sdk-php"`` as a dependency in your project's ``composer.json`` file.

   .. code-block:: js

       {
           "require": {
               "aws/aws-sdk-php": "2.*"
           }
       }

   Consider tightening your dependencies to a known version (e.g., ``2.3.*``).

#. Download and install Composer.

   .. code-block:: sh

       curl -s "http://getcomposer.org/installer" | php

#. Install your dependencies.

   .. code-block:: sh

       php composer.phar install

#. Require Composer's autoloader.

   Composer prepares an autoload file that's capable of autoloading all of the classes in any of the libraries that
   it downloads. To use it, just add the following line to your code's bootstrap process.

   .. code-block:: php

       require '/path/to/sdk/vendor/autoload.php';

You can find out more on how to install Composer, configure autoloading, and other best-practices for defining
dependencies at `getcomposer.org <http://getcomposer.org>`_.

During your development, you can keep up with the latest changes on the master branch by setting the version
requirement for the SDK to ``dev-master``.

.. code-block:: js

   {
      "require": {
         "aws/aws-sdk-php": "dev-master"
      }
   }

Installing via Phar
-------------------

Each release of the AWS SDK for PHP ships with a pre-packaged `phar <http://php.net/manual/en/book.phar.php>`_ file
containing all of the classes and dependencies you need to run the SDK. Additionally, the phar file automatically
registers a class autoloader for the AWS SDK for PHP and all of its dependencies when included. Bundled with the phar
file are the following required and suggested libraries:

-  `Guzzle <https://github.com/guzzle/guzzle>`_ for HTTP requests
-  `Symfony2 EventDispatcher <http://symfony.com/doc/master/components/event_dispatcher/introduction.html>`_ for events
-  `Monolog <https://github.com/seldaek/monolog>`_ for logging
-  `Doctrine <https://github.com/doctrine/common>`_ for caching

You can `download the packaged Phar <http://pear.amazonwebservices.com/get/aws.phar>`_ and simply include it in your
scripts to get started::

    require 'aws.phar';

If you have `phing <http://www.phing.info/>`_ installed, you can clone the SDK and build a phar file yourself using the
*"phar"* task.

.. note::

    If you are using PHP with the Suhosin patch (especially common on Ubuntu and Debian distributions), you will need
    to enable the use of phars in the ``suhosin.ini``. Without this, including a phar file in your code will cause it to
    silently fail. You should modify the ``suhosin.ini`` file by adding the line:

    ``suhosin.executor.include.whitelist = phar``

Installing via PEAR
~~~~~~~~~~~~~~~~~~~

`PEAR <http://pear.php.net/>`_ packages are easy to install, and are available in your PHP environment path so that they
are accessible to any PHP project. PEAR packages are not specific to your project, but rather to the machine they're
installed on.

From the command-line, you can install the SDK with PEAR as follows (this might need to be run as ``sudo``):

.. code-block:: sh

    pear channel-discover pear.amazonwebservices.com
    pear install aws/sdk

Once the SDK has been installed via PEAR, you can load the phar into your project with:

.. code-block:: php

    require 'AWSSDKforPHP/aws.phar';
