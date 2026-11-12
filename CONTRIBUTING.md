# Contributing to the AWS SDK for PHP V4

The AWS SDK for PHP welcomes corrections, additional use cases, and design
feedback from the PHP community. Read this document before submitting an
issue, discussion, or pull request.

## Development status

V4 is in development. The `v4` branch publishes design documentation and
illustrative examples. V3 remains the installable, supported SDK. Proposed V4
APIs may change before release.

Pull requests targeting `v4` must remain limited to documentation and the
governance or automation needed to maintain that documentation. Implementation
code, package metadata, generated service code, and executable examples are
outside this branch's scope.

## Choose the correct branch and channel

### V3 bugs and feature requests

V3 remains the supported SDK. Report V3 bugs and feature requests through
[GitHub Issues](https://github.com/aws/aws-sdk-php/issues), and target V3 pull
requests to the `master` branch.

Before reporting a V3 bug, search existing issues and try the latest V3
release when possible. Include expected and actual behavior, relevant
environment details, logs or stack traces, and a minimal reproduction.

Do not use the documentation-only `v4` branch to report or fix V3
implementation bugs.

### V4 design feedback

Use [GitHub Discussions](https://github.com/aws/aws-sdk-php/discussions) for
V4 API design feedback and real-world use cases. Include:

- The application or library use case.
- How the proposal would be used in PHP code.
- What is clearer or harder than the equivalent V3 workflow.
- Framework, testing, deployment, concurrency, or static-analysis constraints.
- A suggested alternative when possible.

See [docs/feedback.md](docs/feedback.md) for the active design questions. Open
an issue when the problem is an error or omission in the preview documentation.

## Documentation contributions

Small corrections are welcome. Before starting a substantial contribution:

1. Search existing issues, discussions, and pull requests.
2. Start a discussion describing the problem and proposed change.
3. Wait for maintainer feedback before investing significant time.
4. Keep the pull request focused on one design topic.
5. Clearly distinguish proposed V4 behavior from released V3 behavior.
6. Target the pull request to the `v4` branch.

Maintainers review contributions for alignment with the goals and scope of the
preview.

## Contributor License Agreement

Substantial external contributions require a Contributor License Agreement
(CLA) when requested by AWS. Maintainers will provide the applicable
instructions during review. A contribution that requires a CLA cannot be
accepted until the agreement has been completed.

## AI-assisted submissions

AI-assisted development is permitted, subject to these requirements:

- A human must review every AI-assisted issue, discussion, and pull request
  before it is submitted.
- The submission must disclose the assistance with a statement such as
  `AI-assisted and reviewed by <person>`.
- The submitter remains responsible for accuracy, relevance, licensing,
  security, and compliance with this repository's contribution guidelines.
- Submissions must provide a genuine improvement. Nuisance submissions or
  attempts to inflate contribution counts may be closed, and repeated abuse
  may result in interaction limits.

## Security issue notifications

Report potential security issues privately by following
[SECURITY.md](SECURITY.md). Do not open a public issue, discussion, or pull
request for a suspected vulnerability.

## Licensing

This project is licensed under the [Apache License 2.0](LICENSE). By submitting
a contribution, you agree that it may be distributed under the same license
and that you have the right to provide it under those terms.

## Code of Conduct

This project has adopted the
[Amazon Open Source Code of Conduct](https://aws.github.io/code-of-conduct).
See the
[Code of Conduct FAQ](https://aws.github.io/code-of-conduct-faq), or contact
[opensource-codeofconduct@amazon.com](mailto:opensource-codeofconduct@amazon.com)
with questions.
