# NodeJS Express app

This is a simple NodeJS Express app for Evolutio task.

## How to run with Docker

We have MariaDB:10.8 (Mac apple chip compatible) and our NodeJS app in a 
Dockerfile.

1. Clone the repository
2. Run the following command to build the image:

```bash
docker compose up --build -d # -d to run in background 
``` 
You can check the logs with `docker compose logs -f` and stop the container 
with `docker compose down`. Also, you can change env variables in the .env file.

Database table and columns are created automatically when the app starts. 
Alter is set to true, so it will drop the table and create it again.

## Endpoints

```bash
GET /api/todos # Get all todos. You can add query params ?order=ASC or ?order=DESC to sort the todos by creation date. Default is DESC. DESC or ASC must be capitalized.
GET /api/todos/:id # Get a todo by id
POST /api/todos # Create a todo.
PUT /api/todos/:id # Update a todo by id
```

## Request body

For POST request, you need to send a request body with the following format:
```json
{
    "text": "Todo title"
}
```

For PUT request, you need to send a request body with the following format:
```json
{
    "text": "Todo title updated",
    "done": true
}
```

## Run tests

There is few test for app made via Jest. You can run them with the following command:

```bash
npm test
```

## CI/CD
We have a Github Actions workflow that runs the tests and checkout app on 
ubuntu-latest. If that passes, it will build the make ssh connection to the
server and run the docker compose command to run the app.

You can check full workflow in .github/workflows/express.yml. 
HINT: Build could fail because of the server low resources.

You can visit backend portion of the app on http://165.232.121.71:8000/api/todos . It is running on a DigitalOcean droplet.

## Tools used

- NodeJS
- Express
- MariaDB
- Docker
- Sequelize
- Jest
- Github Actions
- Eslint with Airbnb style guide
- Prettier