const express = require("express");
const app = express();
const fs = require("fs");

app.use("/css", express.static("css"));
app.use("/js", express.static("js"));
app.use("/resources", express.static("resources"));
app.use("/sqlconnect", express.static("sqlconnect"));

app.get("/", function(req, res) {
	let doc = fs.readFileSync("index.html", "utf-8");
	res.send(doc.serialize);
});

app.get("/sqlconnect/register.php", function(req, res) {
	let doc = fs.readFileSync("sqlconnect/register.php", "utf-8");
	res.send(doc.serialize);
});

app.get("/sqlconnect/login.php", function(req, res) {
	let doc = fs.readFileSync("sqlconnect/login.php", "utf-8");
	res.send(doc.serialize);
});

let port = 8000;
app.listen(port, function() {
	console.log("Ecocity listening on port " + port);
});
