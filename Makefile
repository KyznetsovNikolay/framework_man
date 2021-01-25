.PHONY: up
up: docker-up

.PHONY: down
down: docker-down

.PHONY: init
init: docker-down docker-pull docker-build docker-up composer-install

.PHONY: docker-up
docker-up:
	docker-compose up -d

.PHONY: docker-down
docker-down:
	docker-compose down --remove-orphans

.PHONY: docker-pull
docker-pull:
	docker-compose pull

.PHONY: docker-build
docker-build:
	docker-compose build

.PHONY: composer-install
composer-install:
	docker-compose run --rm app composer install

.PHONY: test
test:
	docker-compose run --rm app vendor/bin/phpunit
