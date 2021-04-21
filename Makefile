serve: install build
	docker-compose up -d

install:
	docker-compose run --rm php bin/install.sh

build:
	docker-compose run --rm php bin/build.sh

html-proofer:
	docker-compose run --rm html-proofer output_dev --url-ignore 'foo-meta.md#errata-1-foo' --disable-external
