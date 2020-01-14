# Geesteren Vitaal Laravel Environment

## Prerequisites

- [node.js](https://nodejs.org/)
- [yarn](https://yarnpkg.com/lang/en/)
- [composer](https://getcomposer.org/)
- [laravel](http://laravel.com/)

## Development
To continue development on this app follow the following steps to create a development environment.

1. Clone [this repository](git@github.com:RubenSmit/geesterenvitaal.git) to a location on your file system.
1. `cd` into the directoy, run `yarn install`.
1. Copy `.env.example` to `.env` and edit variables to match your database settings.
1. Run `php artisan migrate` to run all outstanding migrations.
    - Use `php artisan db:seed` to seed the database with random data.
1. Run `php artisan key:generate` to generate a key for data encryption.
1. Run `yarn watch` to build frontend scrips and styling.
1. Run `php artisan serve` to start the server.
1. Navigate to [localhost:8000](localhost:8000) in your browser.

## Deployment

### Using Docker
Use the following steps to start the application in a docker environment.

1. Run `docker-compose up -d`
1. Create a mysql user in the database container.
    - `docker-compose exec db bash` to enter bash inside the container.
    - Inside the container use `mysql -u root -p` to switch to root user.
    - Run `GRANT ALL ON laravel.* TO 'laraveluser'@'%' IDENTIFIED BY 'your_laravel_db_password';` to set privileges.
    - Run `FLUSH PRIVILEGES;` to notify the server of the changes.
    - Use `EXIT;` and `exit` to exit the container.
1. Run the migrations using `docker-compose exec app php artisan migrate`
    - Use `docker-compose exec app php artisan db:seed` to seed the database

### Using SSH
Use the following steps to deploy the application via ssh.

1. Make sure the following is installed or available on the server:
    - PHP 7.2 or higher
    - git
    - composer
    - MySQL database
1. Clone [this repository](git@github.com:RubenSmit/geesterenvitaal.git) into `/var/www/` and move into this folder.
1. Copy `.env.example` to `.env` and edit variables to match your database settings.
1. Install using `composer install`
1. Run `php artisan key:generate` to generate a key for data encryption.
1. Run the migrations using `php artisan migrate`
1. Make sure all permissions for your www user are set for your storage folder using:
    - `sudo chown -R www: storage`
    - `sudo chmod -R 755 storage`
1. Set your apache config to point to the laravel project public folder.
    ```xml
    DocumentRoot /var/www/geesterenvitaal/public
    <Directory /var/www/geesterenvitaal/public>
        RewriteEngine On
        RewriteBase /var/www/geesterenvitaal/public
    </Directory>
    ```
1. Restart Apache `sudo service apache2 restart`.
