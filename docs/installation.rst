============
Installation
============

Installing using Composer
-------------------------

Using `Composer <http://getcomposer.org>`_ is the recommended way to install the AWS SDK for PHP.
*Composer* is a dependency management tool for PHP that allows you to declare the dependencies your
project needs, and then automatically installs them into your project.

.. tip:: You can find out more on how to install Composer, configure autoloading, and other
         best-practices for defining dependencies at `getcomposer.org <http://getcomposer.org>`_.

**To use Composer with the AWS SDK for PHP:**

#. Open a terminal window and navigate to the directory where your project is stored. Composer is
   installed on a per-project basis.

#. Download and install Composer in your project directory. If you have ``curl`` installed, you can
   use the following command:

   .. code-block:: js

       curl -sS https://getcomposer.org/installer | php

   Otherwise, follow the `installation instructions`__ provided in the Composer documentation.

   .. __: https://getcomposer.org/download/

   When the installation script finishes, a ``composer.phar`` file will be created in the directory
   where you ran the installer.

#. Create a file at the root level of your project called ``composer.json`` and add the following
   dependency for the AWS PHP SDK:

   .. code-block:: js

       {
           "require": {
               "aws/aws-sdk-php": "2.*"
           }
       }

#. Install the dependencies by running Composer's ``install`` command:

   .. code-block:: sh

       php composer.phar install

   This will create a ``vendor`` directory in your project with the required libraries and an
   autoloader script used to load them for your project.

#. Require Composer's autoloader by adding the following line to your code's bootstrap process
   (typically in ``index.php``):

   .. code-block:: php

       require '/path/to/sdk/vendor/autoload.php';

   Your code is now ready to use the AWS SDK for PHP!


.. _using-composer-aeb:

Using Composer with AWS Elastic Beanstalk
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

If you deploy your application using `AWS Elastic Beanstalk`__ and you have a ``composer.json`` file
in the root of your package, then Elastic Beanstalk will automatically install Composer for you when
you deploy your application.

.. __: http://docs.aws.amazon.com/elasticbeanstalk/latest/dg/create_deploy_PHP_eb.html


.. _using-dev-master:

Keeping up to date with SDK changes
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

During development of your application, you can keep up with the latest changes on the master branch
by setting the version requirement for the SDK to ``dev-master``.

.. code-block:: js

   {
      "require": {
         "aws/aws-sdk-php": "dev-master"
      }
   }

Before releasing your code, consider restricting your dependencies to a specific SDK version or a
known-good set of versions to reduce any issues with SDK feature compatibility.

For more information about how to specify dependency versions, see `The require Key`__ in the
Composer documentation.

.. __: https://getcomposer.org/doc/01-basic-usage.md#the-require-key


Installing using the PHP archive (.phar)
----------------------------------------

Each release of the AWS SDK for PHP ships with a pre-packaged `phar <http://php.net/manual/en/book.phar.php>`_ (PHP
archive) file containing all of the classes and dependencies you need to run the SDK. Additionally, the phar file
automatically registers a class autoloader for the AWS SDK for PHP and all of its dependencies when included. Bundled
with the phar file are the following required and suggested libraries:

-  `Guzzle <https://github.com/guzzle/guzzle>`_ for HTTP requests
-  `Symfony2 EventDispatcher <http://symfony.com/doc/master/components/event_dispatcher/introduction.html>`_ for events
-  `Monolog <https://github.com/seldaek/monolog>`_ and `Psr\\Log <https://github.com/php-fig/log>`_ for logging
-  `Doctrine <https://github.com/doctrine/common>`_ for caching

You can download specific versions of a packaged Phar from https://github.com/aws/aws-sdk-php/releases
and simply include it in your scripts to get started::

    require '/path/to/aws.phar';

.. note::

    If you are using PHP with the Suhosin patch (especially common on Ubuntu and Debian distributions), you may need
    to enable the use of phars in the ``suhosin.ini``. Without this, including a phar file in your code will cause it to
    silently fail. You should modify the ``suhosin.ini`` file by adding the line:

    ``suhosin.executor.include.whitelist = phar``


Installing using the .zip archive
---------------------------------

Each release of the AWS SDK for PHP since version 2.3.2 ships with a zip file containing all of the
classes and dependencies that you need to run the SDK in a
`PSR-0 <https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md>`_ compatible
directory structure. Additionally, the zip file includes a class autoloader for the AWS SDK for PHP
and the following required and suggested libraries:

-  `Guzzle <https://github.com/guzzle/guzzle>`_ for HTTP requests
-  `Symfony2 EventDispatcher <http://symfony.com/doc/master/components/event_dispatcher/introduction.html>`_ for events
-  `Monolog <https://github.com/seldaek/monolog>`_ and `Psr\\Log <https://github.com/php-fig/log>`_ for logging
-  `Doctrine <https://github.com/doctrine/common>`_ for caching

Using the zip file is great if you:

1. Prefer not to or cannot use Composer.
2. Cannot use phar files due to environment limitations.
3. Want to use only specific files from the SDK.

To get started, you must download a specific version of the zip file from
https://github.com/aws/aws-sdk-php/releases, unzip it into your
project to a location of your choosing, and include the autoloader::

    require '/path/to/aws-autoloader.php';

Alternatively, you can write your own autoloader or use an existing one from your project.

If you have `phing <http://www.phing.info/>`_ installed, you can clone the SDK and build a zip file yourself using the
*"zip"* task.

