## Laravel + Vue Mix project for Demo Purpose

## PHP - 7.2
## MySql 
In this project, I used modularized MVC architecture to implement back-end on demonstration purpose. For the front-end Vuejs start to 
render on Blade file and then move Vue.

Follow the below instruction to set up the project. 

Use the below artisan command to start the back-end

1. First create DB and .env file using the .env.example and update DB credentials
2. Run following artisan commands
## Artisan Commands
```bash
composer install

php artisan config:cache
php artisan view:clear
php artisan module:optimize
php artisan optimize
php artisan cache:clear
php artisan config:clear
php artisan route:clear
composer dump-autoload

php artisan migrate
php artisan db:seed

php artisan jwt:secret
```

##To start back-end
```bash
php artisan serve
```


## Run the Front-end 

Follow the below npm commands

1. npm i (npm install)
2. npm run watch or npm run dev



