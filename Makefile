watch: clean install build
	docker-compose up -d

clean:
	rm -rf output_dev/*

composer-update:
	docker-compose run --rm php composer update

install:
	docker-compose run --rm php bin/install.sh

build:
	docker-compose run --rm php bin/build-php.sh
	docker-compose run --rm node-sass bin/build-sass.sh

html-proofer:
	@docker-compose run --rm html-proofer bin/html-proofer.sh

shell:
	@docker-compose run --rm php bash
