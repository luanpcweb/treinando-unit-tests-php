docker build . -t app_test
docker run app_test vendor/bin/phpunit --whitelist ./src/Service --coverage-text --colors ./tests
