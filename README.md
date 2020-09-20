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
