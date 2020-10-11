# Development environment and project setup for our bustlebus laravel project

**The following method allows for the use of php, nginx, mysql, artisan, npm and composer on the developers native environment using only docker and docker-compose**
 

***This method uses [Andrew's laravel development environment github repository](https://github.com/aschmelyun/docker-compose-laravel) and it is required to have git, docker and docker-compose installed*** 

***The following steps were performed on an ubuntu distro, but the steps outlined should be similar for a windows machine with docker installed***

## Step 1 - Clone Andrew's laravel Development environment 

Create the project directory

`mkdir bustlebus`

Change directories to the newly created bustlebus directory

`cd bustlebus`

Download and unzip the contents of the [laravel development environment repo](https://github.com/aschmelyun/docker-compose-laravel/archive/master.zip) into your bustlebus directory

## Step 2 - Build the development environment docker images with docker-compose

Download and build the php, nginx, site (the docker network of php, nginx and mysql), composer and artisan containers. mysql and npm use an image and do not need to be built. 
This downloads the images and can take some time. It only has to be done once.

`docker-compose build`

## Step 3 - Clone the bustlebus laravel project src files

Change directories to the /src directory. This is where our bustlebus laravel project source files will remain.

`cd src`

Delete the README.md file in the /src directory

`rm README.rm`

Clone the contents of the laravel project files from our own repository

`git clone https://github.com/TheISCrowd/BustleBus .`

## Step 6 - Install the laravel project dependencies

Use Composer to install the laravel project dependencies -- this can take some time

`docker-compose run --rm composer install`

## Step 5 - Create the environment file .env and generate a key

Copy the .env.example and rename it to .env

`cp .env.example .env`

Use artisan to generate a key for the .env file

`docker-compose run --rm artisan key:generate`

## Step 6 - Start the containers necesarry for the site (php, nginx and mysql)

First bring down the containers to refresh the containers

`docker-compose down`

Use docker-compose to bring up the built containers in the detached stated

`docker-compose up -d`

## Step 7 - View the laravel project

Open a web browser and enter the following url: [localhost:8080](localhost:8080)
You should be directed to the bustlebus laravel web application

## Step 8 - Bring down the site containers (php, nginx and mysql)

Use docker-compose to bring down and destroy the running containers

`docker-compose down`

***Important note about mysql persistant storage (i.e. mysql losing data stored in the tables after the containers are destroyed)***

***The following method does not allow for persistant storage, although it is possible to enable persistant storage by doing the [following](https://github.com/aschmelyun/docker-compose-laravel#persistent-mysql-storage)***

# Useful commands for the development environment

### Start the site (php, nginx and mysql) -- generally used
`docker-compose up -d site`

### Start all the containers (php, nginx, mysql, artisan, composer and npm)
`docker-composer up -d`

### Stop and destroy the running site containers (php, nginx and mysql) -- generally used
`docker-compose down site`

### Stop the site running containers
`docker-composer stop`

### Run Composer commands
`docker-compose run --rm composer <command>`

### Run npm commands
`docker-compose run --rm npm <command>`

### Run artisan commands
`docker-compose run --rm artisan <command>`

# How to connect mysql db to the laravel project and run database migrations

**This section explains what credentials you need to change in your .env file to allow for a successful connection to the mysql database when using various laravel commands**

**Also explained is how to run migrations so that the tables as specific in our ERD are created and added to the mysql databse**

***IMPORTANT --- I thoroughly suggest you use persistant storage for your mysql database. This enables your mysql database to keep the database schema even if you destroy your containers with `docker-compose down`. It will make your life far easier and you will only have to run the `docker-compose run --rm artisan migrate` command once (unless an adjustment to the schema is made). The process to create persistant storage can be found in step 8 above.***

## Step 1 - Adjusting your .env file 
bring down the running docker containers

`docker-compose down`

In the /src drirectory open the .env with your editor of choice.

Edit the APP_URL field to the following: 

`APP_URL=http://localhost:8080`

Edit the DB fields to the following:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

bring up the docker containers

`docker-compose up -d`

**You will be able to verify the following worked by following the next step**

## Step 2 -Migrating the migrations

The following command will create the database tables in the mysql database according to the schema in the ERD and specification schedule:

`docker-compose run --rm artisan migrate`

If step 1 was followed correctly you should not have any errors.

If you'd like to undo the creation of the tables in the mysql database run the following command:

`docker-compose run --rm artisan migrate:rollback`

**You can view the mysql database using a client such as [mysqlworkbench](https://dev.mysql.com/downloads/workbench/)**
**The credentials are found above in step on (username=homestead password=secrect)** 

Your mysql database now has the database tables added as per our ERD. If you do not use persistant mysql storage you will have to repeat step 2 each time you bring your containers up

# Authentication login system explained

**This part will explain the authentication system that has been implemented and the steps required to implement its functionality on your system**

admin routes: /register/admin and /login/admin eg. localhost:8080/register/admin

hr routes: /register/hr and /login/hr eg. localhost:8080/register/hr

Client routes: /register and /login eg. localhost:8080/register

## Blade views

***Please note the comments in the resource/views/auth views. Specific blade elements cannot be changed. Changing these blade elements will stop the authentication system from routing correctly.***

Multiple views in resources/views/auth that contain the views for the login and registration pages

welcome.blade.php (This is the view that loads with no user login and on localhost domain)

admin/admin.blade.php (This is the view that loads after the admin login)

hr/hr.blade.php (This is the view that loads after the hr login)

client/home.blade.php (This is the view that loads after the client login)

## layouts

an auth.blade.php has been created.

# Step 1

Install the authentication package with composer

`docker-compose run --rm composer require laravel/ui`

# Step 2

Integrate the new migrations

`docker-compose run --rm artisan migrate:rollback`

`docker-compose run --rm artisan migrate`

# Step 3

Edit the nginx default.conf file (bustlebus/nginx/default.conf) to change the port on which it is listening (port 443). This is for issues with ssl certificates

`docker-compose down`

`listen 443;`

`docker-compose up -d`