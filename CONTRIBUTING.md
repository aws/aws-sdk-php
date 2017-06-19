# Contributing to the AWS SDK for PHP

We work hard to provide a high-quality and useful SDK for our AWS services, and
we greatly value feedback and contributions from our community. Please submit
your [issues][] or [pull requests][pull-requests] through GitHub.

## Things to keep in mind

1. The SDK is released under the [Apache license][license]. Any code you submit
   will be released under that license. For substantial contributions, we may
   ask you to sign a [Contributor License Agreement (CLA)][cla].
1. We follow all of the relevant PSR recommendations from the [PHP Framework
   Interop Group][php-fig]. Please submit code that follows these standards.
   The [PHP CS Fixer][cs-fixer] tool can be helpful for formatting your code.
1. We maintain a high percentage of code coverage in our unit tests. If you make
   changes to the code, please add, update, and/or remove tests as appropriate.
1. We may choose not to accept pull requests that change files in the `src/data`
   directory, since we generate these files based on our internal knowledge of
   the AWS services. Please check in with us ahead of time if you find a mistake
   or missing feature that would affect those files.
1. If your code does not conform to the PSR standards, does not include adequate
   tests, or does not contain a changelog document, we may ask you to update
   your pull requests before we accept them. We also reserve the right to deny
   any pull requests that do not align with our standards or goals.
1. If you would like to implement support for a significant feature that is not
   yet available in the SDK, please talk to us beforehand to avoid any
   duplication of effort.
1. We greatly appreciate contributions to our User Guide. The docs are written
   as a [Sphinx][] website formatted with [reStructuredText][] (very similar to
   Markdown). The User Guide is located in the `docs` directory of this
   repository. Please see the [docs README][docs-readme] for more information
   about how to build the User Guide.
1. If you are working on the SDK, make sure to check out the `Makefile` for some
   of the common tasks that we have to do.

## Changelog Documents

A changelog document is a small JSON blob placed in the .changes/nextrelease
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
* `bugfix` - For updates to guides and documentation files only. This will
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
[sphinx]: http://sphinx-doc.org/
[restructuredtext]: http://sphinx-doc.org/rest.html
[docs-readme]: https://github.com/aws/aws-sdk-php/blob/master/docs/README.md
