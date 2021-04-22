watch: clean install build
	docker-compose up -d

clean:
	rm -rf output_dev/*

install:
	docker-compose run --rm php bin/install.sh

build:
	docker-compose run --rm php bin/build-php.sh
	docker-compose run --rm node-sass bin/build-sass.sh

html-proofer:
	@docker-compose run --rm html-proofer output_dev --url-ignore 'foo-meta.md#errata-1-foo' --disable-external
