#setup
du:
	docker-compose up -d --build
du-i:
	docker-compose up -d --build
	docker-compose exec php composer install
node-build:
	docker-compose exec -ti node sh -c 'npm run build' < /dev/tty
de:
	docker-compose exec php sh
de-nginx:
	docker-compose exec nginx sh
de-node:
	docker-compose exec node sh
dd:
	docker-compose down --rmi all