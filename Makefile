main:
	composer install
	npm i
	npm run build
	php artisan key:generate
	mv .env.sqlite .env
	chmod -R 0775 storage
	chmod 0777 storage/app/laravel.sqlite
	php artisan migrate:refresh --seed
