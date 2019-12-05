install:
	composer install

setup: install
	composer run-script --working-dir=vendor/felixfbecker/language-server parse-stubs
lint: 
	composer run-script phpcs -- --standard=PSR12 src bin
