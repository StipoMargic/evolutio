/* eslint-disable no-console */
require('dotenv').config();
const { connection } = require('./config/db');
const { Todo } = require('./models/models');
const createServer = require('./server');

const PORT = 8000;

const init = async () => {
  try {
    await connection.authenticate();
    await Todo.sync({ alter: true });

    const app = createServer();
    app.listen(PORT, () => {
      console.log('Server has started!');
    });
  } catch (error) {
    console.error('Unable to connect to the database:', error);
  }
};

init();
