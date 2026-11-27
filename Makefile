PHP ?= php
COMPOSER ?= composer
LINT_JOBS ?= 8
MODELS_DIR ?= ../aws-models
FRESH ?=
PREVIEW_SERVICES ?= s3:S3 sts:Sts lambda:Lambda ec2:Ec2 sso:Sso sso-oidc:SsoOidc

.DEFAULT_GOAL := help

.PHONY: help install autoload test integ lint static-analysis codegen generate-services license-check check clean
.NOTPARALLEL: check

help: ## List available targets
	@awk 'BEGIN {FS = ":.*## "}; /^[a-zA-Z0-9_-]+:.*## / {printf "  %-24s %s\n", $$1, $$2}' $(MAKEFILE_LIST)

install: ## Install Composer dependencies
	$(COMPOSER) install $(ARGS)

autoload: ## Regenerate Composer autoload files
	$(COMPOSER) dump-autoload $(ARGS)

test: ## Run the test suite
	$(PHP) vendor/bin/phpunit $(ARGS)

integ: ## Run integration tests against real AWS (needs credentials; not run in CI)
	$(PHP) vendor/bin/phpunit --testsuite integ $(ARGS)

lint: ## Check PHP syntax
	@set -e; \
	dirs=""; \
	for d in src tests tools codegen examples; do \
		[ -d "$$d" ] && dirs="$$dirs $$d"; \
	done; \
	if [ -z "$$dirs" ]; then printf 'No PHP source directories yet.\n'; exit 0; fi; \
	count=$$(find $$dirs -type f -name '*.php' | wc -l | tr -d ' '); \
	find $$dirs -type f -name '*.php' -print0 \
		| xargs -0 -n 32 -P $(LINT_JOBS) sh -c \
			'for file do $(PHP) -l "$$file" >/dev/null || exit; done' sh; \
	printf 'Checked %d PHP files.\n' "$$count"

static-analysis: ## Run PHPStan
	$(COMPOSER) static-analysis $(if $(ARGS),-- $(ARGS))

codegen: ## Run the code generator; pass options with ARGS
	$(PHP) codegen/bin/aws-php-codegen $(ARGS)

generate-services: ## Regenerate the preview services; MODELS_DIR=<dir>, FRESH=1 deletes old output first
	@set -e; \
	for entry in $(PREVIEW_SERVICES); do \
		model="$(MODELS_DIR)/$${entry%%:*}/smithy/model.json"; \
		name="$${entry##*:}"; \
		[ -f "$$model" ] || { printf 'Model not found: %s\n' "$$model" >&2; exit 1; }; \
		if [ -n "$(FRESH)" ]; then rm -rf "src/Services/$$name" "tests/Services/$$name/Endpoint"; fi; \
		printf 'Generating %s\n' "$$name"; \
		$(PHP) codegen/bin/aws-php-codegen "$$model" \
			"--namespace=Aws\\Services\\$$name" \
			"--output=src/Services/$$name" \
			"--tests-output=tests/Services/$$name/Endpoint" \
			--array-access=output --array-serialization=all; \
	done

license-check: ## Check source license headers
	$(PHP) tools/check-license-headers.php

check: ## Run checks used by CI
	$(MAKE) lint
	$(MAKE) static-analysis ARGS=
	$(MAKE) test ARGS=
	$(MAKE) license-check

clean: ## Remove generated build and test artifacts
	rm -rf build .phpunit.cache
