PHONY: install run runWithDocker fixtures

install:
	@echo "Installing package with composer $@"
	docker-compose up --build -d
	composer install --no-interaction --no-progress --no-suggest --no-scripts --optimize-autoloader
	docker-compose down

run:
	@echo "Running Symfony - API $@"
    symfony server:start

fixtures:
	@echo "Running Fixtures load ... $@"
	symfony console doctrine:fixtures:load --no-interaction

stop_run:
	@echo "Running Symfony - API $@"
    symfony server:start

runWithDocker:
	@echo "Running  Symfony With Docker-compose $@"
	docker-compose up --build -d && symfony server:start -d

stop_runWithDocker:
	@echo "Stopping Docker-compose ans Symfony Server $@"
	docker-compose down && symfony server:stop

stopDocker:
	@echo "Stopping Symfony With Docker-compose $@"
	docker-compose down

cleanAll:
	@echo "Cleaning Symfony With Docker-compose $@"
	docker-compose down -v
	rm -rf ./var/cache/*
	rm -rf node_modules
	rm -rf vendor
	rm -rf composer.lock

clean:
	@echo "Cleaning Symfony With Docker-compose $@"
	docker-compose down
	docker rmi -f $(docker images -q)
	rm -rf ./var/cache/*