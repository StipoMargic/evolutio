# Symfony with API Platform

This is a skeleton project to create web APIs with Symfony and API Platform. 

## Installation

```bash
$ composer install
# Edit .env file and set your database credentials
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:create OR php bin/console doctrine:migrations:migrate
```

## Run the server

```bash
$ symfony server:start # Requires Symfony CLI 
```

Endpoints:

```bash
GET /api/todos # Get all todos you can pass ?order[createdAt]=asc to order by createdAt ascending or ?order[createdAt]=desc to order by createdAt descending default order is descending
GET /api/todos/{id} # Get a todo
POST /api/todos # Create a todo
PUT /api/todos/{id} # Update a todo
```

All endpoints response with json+ld format.
POST and PUT endpoints accept json format.

## Post request body example

```json
{
    "text": "Todo title"
}
```

## PUT request body example

```json
{
    "text": "Todo title updated",
    "done": true
}
```

Additional infos:
- No delete endpoint
- Field updatedAt is updated on every update default value is null
- Field createdAt is set on create and never changed after
- Field done is set to false on create and can be updated