const express = require("express");
const app = express();
const fs = require("fs");

app.use("/css", express.static("css");
app.use("/js", express.static("js");
app.use("/resources", express.static("resources");

app.get("/", function(res, req) {
	let doc = fs.readFileSync("index.html", "utf-8");
	res.send(doc.serialize);
});

let port = 8000;
app.listen(port, function() {
	console.log("Ecocity listening on port " + port);
});