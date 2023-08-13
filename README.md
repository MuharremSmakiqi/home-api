# Laravel Application README

This README provides instructions for setting up and using the Laravel application.

## Table of Contents

- [Installation](#installation)
- [Database Migration](#database-migration)
- [Running the Application](#running-the-application)
- [Registration and Login](#registration-and-login)
- [API Endpoints](#api-endpoints)
- [Commands](#testing-api-endpoints)
- [Testing API Endpoints](#testing-api-endpoints)

## Installation

Follow these steps to install and configure the application:

1. Clone the repository:

   git clone https://github.com/MuharremSmakiqi/home-api.git

2. Run composer install && Update, also run php artisan key:generate
3. Run Migrations with seeds
   php artisan migrate --seed
4. If using valet visit the browser and type home-api.test
5. If using any local server start the app with: 
   php artisan serve
6. Registration and Login

   Open apis using Postman or any other app

   http://home-api.test/api/register

   http://home-api.test/api/login 

   After successfully logging in and obtaining the access token, you need to include this token in the Authorization header of your requests to access other protected APIs.
   
   http://home-api.test/api/packages

   http://home-api.test/api/register-package/1

7. Run the command
   php artisan register:package {customer_id} {package_id}  
