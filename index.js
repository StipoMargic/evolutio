/* eslint-disable no-console */
require('dotenv').config();
const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');
const { connection } = require('./config/db');
const { Todo } = require('./models/models');
const { getAllTodos, getTodoById, updateTodo, createTodo } = require('./controllers/todos');

const init = async () => {
  try {
    await connection.authenticate();
    await Todo.sync({ alter: true });
    console.log('Connection has been established successfully.');
  } catch (error) {
    console.error('Unable to connect to the database:', error);
  }
};
init();
const app = express();
const api = express.Router();
app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
const port = 8000;

app.use('/api', api);

api.get('/todos', getAllTodos);

api.get('/todos/:id', getTodoById);

api.post('/todos', createTodo);

api.put('/todos/:id', updateTodo);

app.listen(port, () => {
  console.log(`Todo app listening at http://localhost:${port}`);
});
