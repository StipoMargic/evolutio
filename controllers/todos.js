const { Todo } = require('../models/models');

const getAllTodos = async (req, res) => {
  if (req.query.order !== undefined) {
    if (req.query.order !== 'ASC' && req.query.order !== 'DESC') {
      res.status(400).json({ message: 'Order must be ASC or DESC' });
      return;
    }
  }
  const todos = await Todo.findAll({
    order: [['createdAt', req.query.order || 'DESC']],
  });
  res.json(todos);
}

const getTodoById = async (req, res) => {
  const todo = await Todo.findByPk(req.params.id);
  if (!todo) {
    res.status(404).json({ message: 'Todo not found' });
    return;
  }

  res.json(todo);
}

const createTodo = async (req, res) => {
  const {text} = req.body;
  if (!text) {
    res.status(400).json({ message: 'Text is required' });
    return;
  }

  const todo = await Todo.create({ text });
  
  res.status(201).json(todo);
}


const updateTodo = async (req, res) => {
  const todo = await Todo.findByPk(req.params.id);
  if (!todo) {
    res.status(404).json({ message: 'Todo not found' });
    return;
  }

  const { text, done } = req.body;
  if (text.trim() === '' || done === undefined) {
    res.status(400).json({ message: 'Text and done are required' });
    return;
  }

  todo.update({ text, done, updatedAt: new Date() });
  
  res.json(todo);
};

module.exports = { getAllTodos, getTodoById, createTodo, updateTodo };