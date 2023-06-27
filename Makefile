main:
	chmod -R 0777 storage
	cp .env.sqlite .env
	touch storage/app/laravel.sqlite
	composer install
	npm i
	npm run build
	php artisan key:generate
	chmod 0777 storage/app/laravel.sqlite
	php artisan migrate:refresh --seed
