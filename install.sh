cp .env.sqlite .env;
pwd=$(pwd)
sed -i 's#\$pwd#'$pwd'#' .env;
chmod -R 0777 storage
touch storage/app/laravel.sqlite
composer install
npm i
npm run build
php artisan key:generate
chmod 0777 storage/app/laravel.sqlite
php artisan migrate:refresh --seed