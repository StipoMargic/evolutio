require("dotenv").config();
const { connection } = require("./config/db");
const express = require("express");
const cors = require("cors");
const bodyParser = require("body-parser");
const { Todo } = require("./models/models");

const init = async () => {
  try {
    await connection.authenticate();
    await Todo.sync({ alter: true });
    console.log("Connection has been established successfully.");
  } catch (error) {
    console.error("Unable to connect to the database:", error);
  }
};
init();
const app = express();
const api = express.Router();
app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
const port = 4000;

app.use("/api", api);

api.get("/todos", async (req, res) => {
  const todos = await Todo.findAll();
  res.json(todos);
});

api.get("/todos/:id", async (req, res) => {
  const todo = await Todo.findByPk(req.params.id);
  if (!todo) {
    res.status(404).json({ message: "Todo not found" });
    return;
  }
  
  res.json(todo);
});

app.listen(port, () => {
  console.log(`Todo app listening at http://localhost:${port}`);
});