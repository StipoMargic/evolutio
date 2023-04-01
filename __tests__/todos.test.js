const { Todo } = require('../models/models');
const {
  createTodo,
} = require('../controllers/todos');

jest.mock('../models/models');

it('should return a 201 status code', async () => {
	const req = {
		body: {
			text: 'test',
		},
	};
	const res = {
		status: jest.fn(x => x),
		json: jest.fn(),
	};
	await createTodo(req, res);
	
	expect(Todo.create).toHaveBeenCalledWith(req.body);
	expect(Todo.create).toHaveBeenCalledTimes(1);
	expect(res.status).toHaveBeenCalledWith(201);
});
