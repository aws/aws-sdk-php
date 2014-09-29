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

guide:
	cd docs && make html

view-guide:
	open docs/_build/html/index.html

#api-docs:
#	php build/sami.phar update build/docs.php

view-api-docs:
	open build/artifacts/docs/build/index.html

# Packages the phar and zip
package: burgomaster
	time php build/packager.php

# Downloads a copy of Burgomaster
burgomaster:
	mkdir -p build/artifacts
	curl -s https://raw.githubusercontent.com/mtdowling/Burgomaster/0.0.2/src/Burgomaster.php > build/artifacts/Burgomaster.php

.PHONY: docs
