# Pelaj
Pelaj Cms is a tiny cms for laravel with blade and breeze kit starter

# Install
`git clone https://github.com/pejman-hkh/pelaj`
`composer install`
`npm i`
`npm run build`
`php artisan key:generate`

# Sample env file for sqlite
```
DB_CONNECTION=sqlite
DB_DATABASE=/home/pejman/Documents/web/laravel/test/pelaj/storage/app/laravel.sqlite
DB_FOREIGN_KEYS=true
```


`php artisan migrate:refresh --seed`

# Set permission
Set permission of laravel.sqlite to 777
Set permission for storage

# Auto generate admin dashboard for models
Now list and create and edit and delete of every model will generate automatically


# Screenshots
![Alt text](screenshots/dashboard.png?raw=true "Dashboard")
![Alt text](screenshots/post.png?raw=true "Post")
![Alt text](screenshots/newPost.png?raw=true "New Post")
![Alt text](screenshots/site.png?raw=true "Site")