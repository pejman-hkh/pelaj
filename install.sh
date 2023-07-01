cp .env.sqlite .env;
pwd=$(pwd)
sed -i 's#\$pwd#'$pwd'#' .env;
touch storage/app/laravel.sqlite
chmod 0775 storage/app/laravel.sqlite
composer install
npm i
npm run build
php artisan key:generate
php artisan migrate:refresh --seed