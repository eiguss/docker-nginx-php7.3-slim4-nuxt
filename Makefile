#setup
du:
	docker-compose up -d --build
de:
	docker-compose exec php sh
de-nginx:
	docker-compose exec nginx sh
dd:
	docker-compose down --rmi all