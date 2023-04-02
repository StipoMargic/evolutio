# Symfony/bare branch

This is a bare Symfony project. It is made to show docker knowledge and how to use it with Symfony.

## How to use it with docker

1. Clone the project
2. Run few commands

```bash
cd app # Go to the app folder
composer install # Install the dependencies
docker-compose up --build -d # Build the docker image and run it in background
docker-compose exec -it php-evolutio-todo /bin/bash # Connect to the container
# Inside the container
php bin/console doctrine:database:create # Create the database (if not already created)
php bin/console doctrine:migrations:migrate # Run the migrations
exit # Exit the container
```

3. Go to http://localhost:8080 and enjoy

## What is inside docker-compose.yml

Nginx is used as a reverse proxy. It is configured to listen on port 8000 and to forward the requests to the php container on port 9000.
PHP-FPM 8.0 is used as a PHP process manager.
MySQL 8.0 is used as a database.

## Endpoints

```bash
GET /api/todos # Get all todos, you can add a query parameter ?order=asc or ?order=desc to order the results by creation date (default is desc)
GET /api/todos/{id} # Get a todo by id
POST /api/todos # Create a todo
PUT /api/todos/{id} # Update a todo
```

## Request body

POST requests must have a body with the following format:
```json
{
    "text": "Todo title"
}
```

PUT requests must have a body with the following format:
```json
{
    "text": "Todo title",
    "done": true
}
```

## CI/CD

A Github action is used for CI but there is no CD cause I didn't want to mix 
both backends on deploy server.
