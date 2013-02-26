# Contributing to the AWS SDK for PHP

We work hard to provide a high-quality and useful SDK, and we greatly value feedback and contributions from our
community. Whether it's a new feature, correction, or additional documentation, we welcome your pull requests. With
version 2 of the SDK, we've tried to make our development even more open than before. Please submit any
[issues](https://github.com/aws/aws-sdk-php/issues) or [pull requests](https://github.com/aws/aws-sdk-php/pulls) through
GitHub.

## What you should keep in mind

1. The SDK is released under the [Apache license](http://aws.amazon.com/apache2.0/). Any code you submit will be
   released under that license. For substantial contributions, we may ask you to sign a [Contributor License Agreement
   (CLA)](http://en.wikipedia.org/wiki/Contributor_License_Agreement).
2. We follow the [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md),
   [PSR-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md), and
   [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) recommendations
   from the [PHP Framework Interop Group](http://php-fig.org). Please submit code that follows these standards. The
   [PHP CS Fixer](http://cs.sensiolabs.org/) tool can be helpful for formatting your code.
3. We maintain a high percentage of code coverage in our unit tests. If you make changes to the code, please add,
   update, and/or remove unit (and integration) tests as appropriate.
4. We may choose not to accept pull requests that change service descriptions (e.g., files like
   `src/Aws/OpsWorks/Resources/opsworks-2013-02-18.php`). We generate these files based on our internal knowledge of
   the AWS services. If there is something incorrect with or missing from a service description, it may be more
   appropriate to [submit an issue](https://github.com/aws/aws-sdk-php/issues>). We *will*, however, consider pull
   requests affecting service descriptions, if the changes are related to **Iterator** or **Waiter** configurations.
5. If your code does not conform to the PSR standards or does not include adequate tests, we may ask you to update your
   pull requests before we accept them. We also reserve the right to deny any pull requests that do not align with our
   standards or goals.
6. If you would like to implement support for a significant feature that is not yet available in the SDK, please talk to
   us beforehand to avoid any duplication of effort.

## What we are looking for

We are open to anything that improves the SDK and doesn't unnecessarily cause backwards-incompatible changes. If you are
unsure if your idea is something we would be open to, please ask us (open a ticket, send us an email, post on the
forums, etc.) Specifically, here are a few things that we would appreciate help on:

1. Waiters – Waiter configurations are located in the service descriptions. You can also create concrete waiters within
   the `Aws\*\Waiter` namespace of a service if the logic of the waiter absolutely cannot be defined using waiter
   configuration. There are many waiters that we currently provide, but many that we do not. Please let us know if you
   have any questions about creating waiter configurations.
2. Docs – We are working on a user guide and will be publishing it soon. We would appreciate contributions. The docs
   are written as a [Sphinx](http://sphinx-doc.org/) website using reStructuredText (very similar to Markdown). The user
   guide is located in the `docs` directory of this repository.
3. Tests – We maintain high code coverage, but if there are any tests you feel are missing, please add them.
4. Convenience features – Are there any features you feel would add value to the SDK (e.g., batching for SES, SNS
   message verification, S3 stream wrapper, etc.)? Contributions in this area would be greatly appreciated.
5. Third-party modules – We have modules published for [Silex](https://github.com/aws/aws-sdk-php-silex) and [Laravel
   4](https://github.com/aws/aws-sdk-php-laravel). Please let us know if you are interested in creating integrations
   with other frameworks. We would be be happy to help.
6. If you have some other ideas, please let us know!
