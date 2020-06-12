# How to create a API? (MicroService)
***
## Running the application
1. First install all the project dependencies
```sh
composer install
```
2. Initialize all project container
```sh
docker-compose up
```
3. Verify if API is health: [Api health check](http://localhost:8100/health/api) and [Api DB health check](http://localhost:8100/health/db)

5. Now the system is running [here](http://localhost:8100).

6. Import **back.postman_collection.json** and **back.postman_environment.json** in [Postman](https://www.postman.com/product/api-client) to use all api routes.

## Quality control
1. Using [PHP Mess Detector](https://phpmd.org/), [PHP Codesniffer](https://github.com/squizlabs/PHP_CodeSniffer), PHP Code Checker, [Unit Test](https://phpunit.readthedocs.io/en/9.0/) and [Feature/Interface Test](https://phpunit.readthedocs.io/en/9.0/)
```sh
composer checkall
```

**You can use the commands separately by consulting the file composer.json

## How to use all authenticate routes?

1. Using POST request in [auth route](http://localhost:8100/auth/generate) with credencials located in **config/tokens.php**.
```json
{
	"token": "a67e37e1ad81f984a5e014dd757fb888f25399aea3f80a6e15f4fc8104b7ff43",
	"secret": "8660bfdfcad4e26d6405d36521798b414c6394d0a4e62a581cdd79fbf6682030"
}
```

## Project structure
1. API using two container for running itself: nginx container for all non-php files and other container for running only PHP files.
2. All domains are separated by folders to facilitate separation in the future if necessary
3. Each route has a controller and a specific business rule

It looks very painful doesn't it? To create new CRUD routes run the command
```sh
php artisan create:domain [domain_name]
```
And automatically, all routes are created according to the project pattern, making some configurations necessary to apply the necessary fields.

**Bonus**: All routes are already created with unit and interface testing.

## That is all?
The whole project is running with **Clear Linux** that guarantees (when Intel processor) **50% less memory** and **50% more faster** in PHP. The concern is not just in the code, but how to run it too.
all project dependencies are **open sources** including personal libraries. you can see more libraries here on this github. Feel free everything here is for the community.
***

