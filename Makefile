.PONY: build deps composer-install composer-update composer reload test run-tests start stop destroy doco rebuild start-local

current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

build: deps start
rebuild: deps_rebuild start

deps: composer-install
deps_rebuild: composer-update
# 🐘 Composer
composer-install: CMD=install
composer-update: CMD=update
composer composer-install composer-update:
	@docker run --rm --interactive --volume $(current-dir):/app --volume ${COMPOSER_HOME:-$HOME/.composer}:/tmp \
        --user $(id -u):$(id -g) \
		clevyr/prestissimo $(CMD) \
			--ignore-platform-reqs \
			--no-ansi \
			--no-interaction

reload:
	@docker-compose exec php-fpm kill -USR2 1
	@docker-compose exec nginx nginx -s reload

test:
	@docker exec myfinance3-php make run-tests

run-tests:
	make unit-test
	make integration-test
	make acceptance-test

test-unit:
	@docker exec myfinance3-php make run-tests-unit

run-tests-unit:
	make unit-test


unit-test:
	mkdir -p build/test_results/phpunit
	./vendor/bin/phpunit --exclude-group='disabled' --group='unit' --colors=always --log-junit build/test_results/phpunit/junit.xml

test-integration:
	@docker exec myfinance3-php make run-tests-integration

run-tests-integration:
	make integration-test


integration-test:
	mkdir -p build/test_results/phpunit
	./vendor/bin/phpunit --exclude-group='disabled' --group='integration' --colors=always --log-junit build/test_results/phpunit/junit.xml


test-acceptance:
	@docker exec myfinance3-php make run-tests-acceptance

run-tests-acceptance:
	make acceptance-test

acceptance-test:
	./vendor/bin/behat -p portal_backend -v --colors

test-coverage:
	@docker exec myfinance3-php make run-tests-coverage

run-tests-coverage:
	make coverage

coverage:
	mkdir -p build/test_results/phpunit
	./vendor/bin/phpunit  --coverage-html build/test_results/phpunit/coverage




# 🐳 Docker Compose
start: CMD=up -d
stop: CMD=stop
destroy: CMD=down

# Usage: `make doco CMD="ps --services"`
# Usage: `make doco CMD="build --parallel --pull --force-rm --no-cache"`
doco start stop destroy:
	@docker-compose $(CMD)

rebuild:
	docker-compose build --pull --force-rm --no-cache
	make deps_rebuild
	make start

configure-rabbitMQ:
	@docker exec myfinance3-php make configure_rabbitMQ_command
configure_rabbitMQ_command:
	php /app/apps/Portal/backend/bin/console Myfinance:domain-events:rabbitmq:configure


consume-mysql:
	@docker exec myfinance3-php make consume_mysql_command
consume_mysql_command:
	php /app/apps/Portal/backend/bin/console Myfinance:domain-events:mysql:consume 200

reload-supervisor:
	@docker exec myfinance3-supervisor-php supervisorctl reload


