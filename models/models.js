const { DataTypes } = require("sequelize");
const { connection } = require("../config/db");

const Todo = connection.define("Todo", {
  id: {
    type: DataTypes.UUID,
    defaultValue: DataTypes.UUIDV4,
    allowNull: false,
    primaryKey: true,
  },
  text: {
    type: DataTypes.STRING,
    allowNull: false,
  },
  done: {
    type: DataTypes.BOOLEAN,
    allowNull: false,
    defaultValue: false,
  },
  createdAt: {
    type: DataTypes.DATE,
    defaultValue: DataTypes.NOW,
    allowNull: false,
  },
  updatedAt: {
    type: DataTypes.DATE,
    defaultValue: null,
    allowNull: true,
  },
});



module.exports = { Todo };