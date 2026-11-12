# AWS Lambda client and output

Status: **Illustrative proposal**

```php
use Aws\Lambda\LambdaClient;
use Aws\Lambda\LambdaClientConfig;

$lambda = new LambdaClient(new LambdaClientConfig(
    region: 'us-east-1',
));

$response = $lambda->getAccountSettings();

printf(
    "Functions: %d\n",
    $response->accountUsage?->functionCount ?? 0,
);
```

Example output:

```text
Functions: 12
```

The same typed output can be inspected directly using modeled member names:

```php
if (isset($response['AccountUsage'])) {
    $usage = $response['AccountUsage'];

    printf(
        "Functions: %d\n",
        $usage->functionCount,
    );
}
```

Example output:

```text
Functions: 12
```

This uses read-only array access on the output object and does not convert it.
When an integration requires an actual recursive array, use:

```php
$responseArray = $response->toArray();
```

The client uses the standard AWS credential provider chain when credentials
are not provided explicitly.

## What this illustrates

- Empty operation inputs may be omitted.
- Nested output shapes remain typed.
- Optional modeled members use nullable properties.
- Top-level outputs additionally support direct V3-style read-only array
  access.
- `toArray()` recursively converts nested output shapes.
