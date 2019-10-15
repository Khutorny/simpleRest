# Symfony4 Docker Development Stack
This is a lightweight stack based on Alpine Linux for running Symfony 4 into Docker containers using docker-compose. 

[![Build Status](https://travis-ci.org/coloso/symfony-docker.svg?branch=master)](https://travis-ci.org/coloso/symfony-docker)
### Prerequisites
* [Docker](https://www.docker.com/)

### Container
 - [nginx](https://hub.docker.com/_/nginx/) 1.15.+
 - [php-fpm](https://hub.docker.com/_/php/) 7.2.+
    - [composer](https://getcomposer.org/) 
    - [yarn](https://yarnpkg.com/lang/en/) and [node.js](https://nodejs.org/en/) (if you will use [Encore](https://symfony.com/doc/current/frontend/encore/installation.html) for managing JS and CSS)
- [mysql](https://hub.docker.com/_/mysql/) 5.7.+

### Installing

run docker and connect to container:
```
 docker-compose up --build
```
```
 docker-compose exec php sh
```

install dependencies via composer
```
$ composer install
```

configure the database connection information in your root directory `.env` 
```
DATABASE_URL=mysql://root:root@mysql:3306/symfony
```

apply database migrations and load fixtures
```
./bin/console doctrine:migrations:migrate
./bin/console doctrine:fixtures:load
```
or use `symfony/db.sql` file to fill the database 

call endpoints to manage ClassRoom entity
- GET [http://localhost/classrooms/1](http://localhost/classrooms/1)
- GET [http://localhost/classrooms](http://localhost/classrooms)

- DELETE [http://localhost/classrooms/1](http://localhost/classrooms/1)

- POST [http://localhost/classrooms](http://localhost/classroom)
```json
{
  "name": "classname",
  "active": 1
}
``` 


- PATCH [http://localhost/classrooms/1](http://localhost/classroom/1)
```json
{
  "active": 0
}
``` 

