# Breezy
This is a Laravel application built to showcase the usage of Laravel Breeze with additional middleware for admin access, verified account status, and verified email addresses.

## How to Install
- Clone the repository.
- Install dependencies using composer install.
  ```
  composer install
  ```
- Copy the .env.example file to .env and update the database credentials.
  ```
  cp .env.example .env
  ```
- Run php artisan key:generate to generate the application key.
  ```
  php artisan key:generate
  ```
- Run php artisan migrate to migrate the database and seed.
  ```
  php artisan migrate:fresh --seed
  ```
- Run npm install to install the frontend dependencies.
  ```
  npm install
  ```
  ```
  npm run dev
  ```
- Run php artisan serve to start the development server.
  ```
  php artisan serve
  ```

## Account Details
- Admin User : verified email, verified account, admin access
  - Email:  admin@admin.com
  - Password:  password

- Normal User : no verified email, no verified account, no admin access
  - Email:  user1@user.com
  - Password:  password
  
- Normal User : verified email, verified account, no admin access
  - Email:  user2@user.com
  - Password:  password
  
For better understanding of the application, you can check DatabaseSeeder.php and UserFactory.php files.
  
## Free to Use
This Laravel application is free to use and modify under the MIT license. Feel free to use it as a starting point for your own Laravel projects.Laravel Application
This is a Laravel application built to showcase the usage of Laravel Breeze with additional middleware for admin access, verified account status, and verified email addresses.
