# `@phpstan-method` validation fixture

Smoke test for the `@phpstan-method` annotations on generated client
classes. Verifies that PHPStan and Psalm accept the emitted array shapes
and enforce them at the call site.

PHPStan and Psalm are not in this repo's `composer.json`. Install them
before running.

## Requirements

- PHPStan 2.2 or newer. Earlier versions reject bare `...` in unsealed
  array shapes.
- Psalm 5 or newer. Reads `@phpstan-method` via cross-tag support.

```
composer global require phpstan/phpstan:^2.2 vimeo/psalm:^5
```

## Running

From the SDK root:

```bash
phpstan analyze --configuration=tests/Build/PhpStan/phpstan.neon
psalm --config=tests/Build/PhpStan/psalm.xml --no-cache
```

Both should exit clean against `fixture.php`. An `InvalidDocblock`
error indicates a bug in the generated annotations.

## What the fixture exercises

`fixture.php` calls operations on S3, DynamoDB, and SQS:

| Case | Expected behavior |
|---|---|
| Inline literal with valid keys | accepted |
| Required key omitted | accepted (every key renders as optional) |
| Extra key not in the shape | accepted (shapes are unsealed via trailing `...`) |
| Dynamically-built `array` variable | accepted |
| Wrong value type on a known key | flagged with `expects X, Y given` |
| Empty-input operation (`describeLimits([])`) | accepted (renders as `array{...}`) |

Case 5 is commented out by default so `phpstan analyze` exits clean.
Uncomment it to confirm the annotation is enforced.
