all: clean coverage docs

test:
	vendor/bin/phpunit

coverage:
	vendor/bin/phpunit --coverage-html=build/artifacts/coverage

integration:
	vendor/bin/phpunit -c phpunit.functional.xml

view-coverage:
	open build/artifacts/coverage/index.html

clean:
	rm -rf build/artifacts
	cd docs && make clean

docs:
	cd docs && make html

view-docs:
	open docs/_build/html/index.html

package: burgomaster
	time php build/packager.php

burgomaster:
	mkdir -p build/artifacts
	curl -s https://raw.githubusercontent.com/mtdowling/Burgomaster/0.0.1/src/Burgomaster.php > build/artifacts/Burgomaster.php

.PHONY: docs burgomaster
