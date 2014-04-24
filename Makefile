all: clean coverage docs

test:
	vendor/bin/phpunit

coverage:
	vendor/bin/phpunit --coverage-html=build/artifacts/coverage

view-coverage:
	open build/artifacts/coverage/index.html

clean:
	rm -rf build/artifacts/*
	cd docs && make clean

docs:
	cd docs && make html

view-docs:
	open docs/_build/html/index.html

.PHONY: docs
