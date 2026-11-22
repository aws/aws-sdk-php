PHP ?= php
COMPOSER ?= composer
LINT_JOBS ?= 8

.DEFAULT_GOAL := help

.PHONY: help install autoload test lint static-analysis codegen license-check check clean
.NOTPARALLEL: check

help: ## List available targets
	@awk 'BEGIN {FS = ":.*## "}; /^[a-zA-Z0-9_-]+:.*## / {printf "  %-24s %s\n", $$1, $$2}' $(MAKEFILE_LIST)

install: ## Install Composer dependencies
	$(COMPOSER) install $(ARGS)

autoload: ## Regenerate Composer autoload files
	$(COMPOSER) dump-autoload $(ARGS)

test: ## Run the test suite
	$(PHP) vendor/bin/phpunit $(ARGS)

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

license-check: ## Check source license headers
	$(PHP) tools/check-license-headers.php

check: ## Run checks used by CI
	$(MAKE) lint
	$(MAKE) static-analysis ARGS=
	$(MAKE) test ARGS=
	$(MAKE) license-check

clean: ## Remove generated build and test artifacts
	rm -rf build .phpunit.cache
