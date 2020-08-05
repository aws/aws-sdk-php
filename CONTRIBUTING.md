# Contributing to the AWS SDK for PHP

Thank you for your interest in contributing to the AWS SDK for PHP! We work hard to 
provide a high-quality and useful SDK for our AWS services, and we greatly value 
feedback and contributions from our community. Whether it's a new feature, 
correction, or additional documentation, we welcome your pull requests. Please submit 
your [issues][] or [pull requests][pull-requests] through GitHub.

Jump To:

* [Bug Reports](_#Bug-Reports_)
* [Feature Requests](_#Feature-Requests_)
* [Code Contributions](_#Code-Contributions_)

## How to contribute

*Before you send us a pull request, please be sure that:*

1. You're working from the latest source on the master branch.
2. You check existing open, and recently closed, pull requests to be sure that 
   someone else hasn't already addressed the problem.
3. You create an issue before working on a contribution that will take a significant 
   amount of your time.

*Creating a Pull Request*

1. Fork the repository.
2. In your fork, make your change in a branch that's based on this repo's master branch.
3. Commit the change to your fork, using a clear and descriptive commit message.
4. Create a pull request, answering any questions in the pull request form.

For contributions that will take a significant amount of time, open a new issue to pitch 
your idea before you get started. Explain the problem and describe the content you want to 
see added to the documentation. Let us know if you'll write it yourself or if you'd like us 
to help. We'll discuss your proposal with you and let you know whether we're likely to 
accept it.   

## Bug Reports

Bug reports are accepted through the [Issues][] page.

Before Submitting:

* Do a search through the existing issues to make sure it has not already been reported. 
   If it has, comment your experience or +1 so we prioritize it.
* If possible, upgrade to the latest release of the SDK. It's possible the bug has 
   already been fixed in the latest version.

Writing the Bug Report:

Please ensure that your bug report has the following:

* A short, descriptive title. Ideally, other community members should be able to get a 
   good idea of the issue just from reading the title.
* A detailed description of the problem you're experiencing. This should include:
    * Expected behavior of the SDK and the actual behavior exhibited.
    * Any details of your application environment that may be relevant.
    * Debug information, stack trace or logs.
*  If you are able to create one, include a Minimal Working Example that reproduces the issue.
* Use Markdown to make the report easier to read; i.e. use code blocks when pasting a 
   code snippet.

## Feature Requests

Open an [issue][] with the following:

* A short, descriptive title. Ideally, other community members should be able to get a 
   good idea of the feature just from reading the title.
* A detailed description of the the proposed feature. 
    * Why it should be added to the SDK.
    *  If possible, example code to illustrate how it should work.
* Use Markdown to make the request easier to read;
* If you intend to implement this feature, indicate that you'd like to the issue to be
   assigned to you.


## Code Contributions

Code contributions to the SDK are done through [Pull Requests][pull-requests]. The list below are guidelines to use when submitting pull requests. These are the 
same set of guidelines that the core contributors use when submitting changes, and 
we ask the same of all community contributions as well:

1. The SDK is released under the [Apache license][license]. Any code you submit
   will be released under that license. For substantial contributions, we may
   ask you to sign a [Contributor License Agreement (CLA)][cla].
2. We follow all of the relevant PSR recommendations from the [PHP Framework
   Interop Group][php-fig]. Please submit code that follows these standards.
   The [PHP CS Fixer][cs-fixer] tool can be helpful for formatting your code.
3. We maintain a high percentage of code coverage in our unit tests. If you make
   changes to the code, please add, update, and/or remove tests as appropriate.
4. Static code analysis with [PHPStan][phpstan] is automatically run on the `src` 
   directory for submitted pull requests. If there is a case that needs to be
   ignored by static analysis, please update the `ignoreErrors` section in the
   `phpstan.neon` config file in your PR, and point out why this case warrants
   ignoring.
5. We may choose not to accept pull requests that change files in the `src/data`
   directory, since we generate these files based on our internal knowledge of
   the AWS services. Please check in with us ahead of time if you find a mistake
   or missing feature that would affect those files.
6. If your code does not conform to the PSR standards, does not include adequate
   tests, or does not contain a changelog document, we may ask you to update
   your pull requests before we accept them. We also reserve the right to deny
   any pull requests that do not align with our standards or goals.
7. If you would like to implement support for a significant feature that is not
   yet available in the SDK, please talk to us beforehand to avoid any
   duplication of effort.
8. We greatly appreciate contributions to our User Guide. The docs are written
   as a [Sphinx][] website formatted with [reStructuredText][] (very similar to
   Markdown). The User Guide is located in another repository. Please go to the 
   [awsdocs/aws-php-developers-guide](https://github.com/awsdocs/aws-php-developers-guide/).  
   repository to suggest edits for the User Guide.
9. If you are working on the SDK, make sure to check out the `Makefile` for some
   of the common tasks that we have to do.

### Changelog Documents

A changelog document is a small JSON blob placed in the `.changes/nextrelease`
folder. It should be named a clearly and uniquely, akin to a branch name. It
consists of a type, category, and description as follows:

```json
[
    {
        "type": "feature|enhancement|bugfix",
        "category": "Target of Update",
        "description": "English language simple description of your update."
    }
]
```

#### Changelog Types

* `feature` - For major additive features, internal changes that have
outward impact, or updates to the SDK foundations. This will result in a minor
version change.
* `enhancement` - For minor additive features or incremental sized changes.
This will result in a patch version change.
* `bugfix` - For minor changes that resolve an issue. This will result in a
patch version change.
* `documentation` - For updates to guides and documentation files only. This will
result in a patch version change.

#### Changelog Categories

A changelog document's `category` field should correspond to a Service subfolder
of the `src` directory. If your update is for core components of the SDK, the
category field should exist with the value set to an empty string `""`.

[issues]: https://github.com/aws/aws-sdk-php/issues
[pull-requests]: https://github.com/aws/aws-sdk-php/pulls
[license]: http://aws.amazon.com/apache2.0/
[cla]: https://github.com/aws/aws-cla/blob/master/amazon-single-contribution-license.txt
[php-fig]: http://php-fig.org
[cs-fixer]: http://cs.sensiolabs.org/
[phpstan]: https://github.com/phpstan/phpstan
[sphinx]: http://sphinx-doc.org/
[restructuredtext]: http://sphinx-doc.org/rest.html
[docs-readme]: https://github.com/aws/aws-sdk-php/blob/master/docs/README.md
