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
  if (req.query.order !== undefined) {
    if (req.query.order !== "ASC" && req.query.order !== "DESC") {
      res.status(400).json({ message: "Order must be ASC or DESC" });
      return;
    }
  }
  const todos = await Todo.findAll({
    order: [["createdAt", req.query.order || "DESC"]],
  });
  return res.json(todos);
});

api.get("/todos/:id", async (req, res) => {
  const todo = await Todo.findByPk(req.params.id);
  if (!todo) {
    res.status(404).json({ message: "Todo not found" });
    return;
  }

  return res.json(todo);
});

api.post("/todos", async (req, res) => {
  const text = req.body.text;
  if (!text) {
    res.status(400).json({ message: "Text is required" });
    return;
  }

  const todo = await Todo.create({ text });
  return res.json(todo);
});

api.put("/todos/:id", async (req, res) => {
  const todo = await Todo.findByPk(req.params.id);
  if (!todo) {
    res.status(404).json({ message: "Todo not found" });
    return;
  }

  const { text, done } = req.body;
  if (text.trim() === "" || done === undefined) {
    res.status(400).json({ message: "Text and done are required" });
    return;
  }

  todo.update({ text, done, updatedAt: new Date() });
  return res.json(todo);
});

app.listen(port, () => {
  console.log(`Todo app listening at http://localhost:${port}`);
});