const { Sequelize } = require("sequelize");

const db = process.env.DATABASE_URL;
module.exports.connection = new Sequelize(db);