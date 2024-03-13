<h1>HOW TO INSTALL & RUN THE APP<h1/>

1.  Clone the repo

```sh
git clone https://github.com/Go-Tutle/gtr-service-conservation.git
cd gtr-service-conservation
```

2.  Install composer package

```sh
composer install
```

3.  Copy or rename `.env.example` to `.env`
4.  Insert your database credentials & server port in `.env`
5.  Run the migration script (Make sure you already made the database!)

```sh
php artisan migrate
```

-   You might want to seed the tables

```sh
php artisan db:seed
```

6.  Run the project

```sh
php artisan serve
```
