# laravel-calendar-system-MVP

### Used Technology ###
* Laravel Framework
* Mysql
* Redis

## Get started ##
* Clone the Project from the Repo
* After Successfull Cloning  :: Open your terminal to project directory and type folowwing commands to setup enviroment
``` sh
./server closeall
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
