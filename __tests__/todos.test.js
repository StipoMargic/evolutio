const { Todo } = require('../models/models');
const {
  createTodo,
  getAllTodos,
  getTodoById,
} = require('../controllers/todos');

jest.mock('../models/models');

it('should return a 201 status code', async () => {
  const req = {
    body: {
      text: 'test',
    },
  };
  const res = {
    status: jest.fn((x) => x),
    json: jest.fn(),
  };
  await createTodo(req, res);

  expect(Todo.create).toHaveBeenCalledWith(req.body);
  expect(Todo.create).toHaveBeenCalledTimes(1);
  expect(res.status).toHaveBeenCalledWith(201);
});

it('should return a 200 status code', async () => {
  const req = {
    query: {
      order: 'ASC',
    },
  };
  const res = {
    status: jest.fn((x) => x),
    json: jest.fn(),
  };

  await getAllTodos(req, res);

  expect(Todo.findAll).toHaveBeenCalledTimes(1);
  expect(res.status).toHaveBeenCalledWith(200);
});

it('should return a 400 status code', async () => {
  const req = {
    query: {
      order: 'INVALID',
    },
  };
  const res = {
    status: jest.fn((x) => x),
    json: jest.fn(),
  };

  await getAllTodos(req, res);

  expect(res.status).toHaveBeenCalledWith(400);
  expect(res.json).toHaveBeenCalledWith({
    message: 'Order must be ASC or DESC',
  });
});

it('should return a 404 status code', async () => {
  const req = {
    params: {
      id: 1,
    },
  };
  const res = {
    status: jest.fn((x) => x),
    json: jest.fn(),
  };

  await getTodoById(req, res);

  expect(Todo.findByPk).toHaveBeenCalledTimes(1);
  expect(res.status).toHaveBeenCalledWith(404);
  expect(res.json).toHaveBeenCalledWith({ message: 'Todo not found' });
});

it('should return todo', async () => {
  const found = {
    id: 1,
    text: 'test',
    done: false,
    createdAt: new Date(),
    updatedAt: null,
  };
  const req = {
    params: {
      id: 1,
    },
  };
  const res = {
    status: jest.fn((x) => x),
    json: jest.fn(() => found),
  };
  Todo.findByPk.mockResolvedValue(found);

  await getTodoById(req, res);
  expect(Todo.findByPk).toHaveBeenCalledTimes(1);
  expect(res.status).toHaveBeenCalledWith(200);
  expect(res.json).toHaveBeenCalledWith(found);
});
