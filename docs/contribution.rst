=======================
Contributing to the SDK
=======================

We work hard to provide a high-quality and useful SDK, and we greatly value feedback and contributions from our
community. Whether it's a new feature, correction, or additional documentation, we welcome your pull requests. With
version 2 of the SDK, we've tried to make our development even more open than before. Please submit any `issues
<https://github.com/aws/aws-sdk-php/issues>`_ or `pull requests <https://github.com/aws/aws-sdk-php/pulls>`_ through
GitHub.

Here are a few things to keep in mind for your contributions:

#. The SDK is released under the `Apache license <http://aws.amazon.com/apache2.0/>`_. Any code you submit will be
   released under that license. For substantial contributions, we may ask you to sign a `Contributor License Agreement
   (CLA) <http://en.wikipedia.org/wiki/Contributor_License_Agreement>`_.
#. We follow the `PSR-0 <https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md>`_,
   `PSR-1 <https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md>`_, and
   `PSR-2 <https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md>`_ recommendations
   from the `PHP Framework Interop Group <http://php-fig.org>`_. Please submit code that follows these standards. The
   `PHP CS Fixer <http://cs.sensiolabs.org/>`_ tool can be helpful for formatting your code.
#. We maintain a high percentage of code coverage in our unit tests. If you make changes to the code, please add,
   update, and/or remove unit (and integration) tests as appropriate.
#. We do not accept pull requests that change service descriptions (e.g., files like
   ``src/Aws/Ec2/Resources/ec2-2012-12-01.php``). We generate these files based on our internal knowledge of the AWS
   services. If there is something incorrect with or missing from a service description, please `submit an issue
   <https://github.com/aws/aws-sdk-php/issues>`_.
#. If your code does not conform to the PSR standards or does not include adequate tests, we may ask you to update your
   pull request before we accept it. We also reserve the right to deny any pull requests that do not align with our
   standards or goals.
#. If you would like to implement support for an AWS service that is not yet available in the SDK, please talk to us
   beforehand to avoid any duplication of effort.
