serve: install build
	docker-compose up -d

install:
	docker-compose run --rm php bin/install.sh

build:
	docker-compose run --rm php bin/build.sh
