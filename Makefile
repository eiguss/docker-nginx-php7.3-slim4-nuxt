#setup
du:
	docker-compose up -d --build
du-i:
	docker-compose up -d --build
	docker-compose exec php composer install
node-build:
	make clean-build
	make create-build-folders
	docker-compose exec node npm run build
	make move-build-files-to-server
de:
	docker-compose exec php sh
de-nginx:
	docker-compose exec nginx sh
de-node:
	docker-compose exec node sh
dd:
	docker-compose down --rmi all

# scripts for nuxt build
clean-build:
	rm -rf ./server/public/assets/*
	rm -rf ./server/nuxt_index/
	rm -rf ./node/dist/
create-build-folders:
	mkdir ./node/dist
	mkdir ./node/dist/assets
	mkdir ./server/nuxt_index/
move-build-files-to-server:
	mv ./node/dist/index.html ./server/nuxt_index/
	mv ./node/dist/assets/* ./server/public/assets
	rm -rf ./node/dist/