# laravel-calendar-system-MVP

### Used Technology ###
* Laravel Framework
* Mysql
* Redis

## Get started ##
* Clone the Project from the Repo
* Update .env.example file with your ports for PHP,Phpmyadmin,Redis containers
* After Successfull Cloning  :: Open your terminal to project directory and type folowwing commands to setup enviroment
``` sh
./server closeall // run it only if you want to down old containers
./server
./server bash
```
** Please Make sure you update your env file with Mysql Docker Container Details **

* in my case this is used configuration
``` sh
DB_CONNECTION=mysql
DB_HOST=calendar_mysql
DB_PORT=3306
DB_DATABASE=main_db
DB_USERNAME=root
DB_PASSWORD="root"
```

* Now you are inside PHP Container run following command
``` sh
composer update
```
``` sh
php artisan migrate //for DB migration make sure you have a db created
```

*Auth API's 
``` sh
{domain}/api/register
Method : POST 
Paraneters :
email =>required
password => required
name =>optional
```
``` sh
{domain}/api/login
Method : POST 
Paraneters :
email =>required
password => required
```
- Those 2 Api's Provide you with Bearer Tocken You must Use in All Events APis

* Events APIS
``` sh

/** Store Event Details **/
{domain}/api/events
Method : POST 
Paraneters :
location_name =>required
latitude => required
longitude => required
date_time =>optional
invitees =>optional but must be array if found
you can send any Key => value parameters and it will be stored like you can send
test=> any value
```
