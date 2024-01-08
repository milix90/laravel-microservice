run: serve delay db

serve:
	@echo "Starting Docker..."
	docker-compose up -d
	@echo "Docker containers started!"

delay:
	@echo "Waiting for databases to be loaded..."
	@sleep 15

db:
	docker exec -it authenticator_app sh -c "php artisan migrate";
	docker exec -it messenger_app sh -c "php artisan migrate"
	docker exec -it authenticator_app sh -c "php artisan db:seed"
	@echo "Migrations and Authenticator service seeding were done."

down:
	@echo "Stopping docker containers..."
	docker-compose down
	@echo "Stopped!"
