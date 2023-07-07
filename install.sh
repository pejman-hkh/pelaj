cp .env.sqlite .env;
pwd=$(pwd)
sed -i 's#\$pwd#'$pwd'#' .env;
chmod -R 0777 storage
touch database/laravel.sqlite
composer install
npm i
npm run build
php artisan key:generate
chmod 0777 database
chmod 0777 database/laravel.sqlite
php artisan migrate:refresh --seed