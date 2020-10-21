const path = require("path");

module.exports = {
  entry: ["./app.js"],
  output: {
    path: path.resolve(__dirname, "./"),
    filename: "bundle.js"
  },
  mode: "development"
};
