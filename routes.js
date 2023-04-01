const express = require('express');

const api = express.Router();

const {
  getAllTodos,
  getTodoById,
  updateTodo,
  createTodo,
} = require('./controllers/todos');

api.get('/todos', getAllTodos);

api.get('/todos/:id', getTodoById);

api.post('/todos', createTodo);

api.put('/todos/:id', updateTodo);

module.exports = api;
