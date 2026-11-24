# AWS PHP code generator

`codegen/bin/aws-php-codegen <model.json> --namespace=... --output=...` generates one service client from a Smithy JSON model. Run it with `make codegen ARGS="..."`.

## Regenerate the preview services

```sh
make generate-services MODELS_DIR=/path/to/aws-models
```

This regenerates S3, STS, Lambda, EC2, SSO and SSO OIDC under `src/Services/` and `tests/Services/`, with `--array-access=output --array-serialization=all`.

- `MODELS_DIR` holds `<service>/smithy/model.json` for each service. It defaults to `../aws-models`.
- A normal run keeps the member order of the existing generated files.
- `make generate-services FRESH=1` deletes each service's generated output first, so member order follows the model.
- `PREVIEW_SERVICES` lists `<model directory>:<PHP name>` pairs and can be overridden to generate fewer services.
