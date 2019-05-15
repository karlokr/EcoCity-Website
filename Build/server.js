const express = require('express');
const app = express();
const fs = require("fs");

app.use("/build", express.static("build"));
app.use("/TemplateData", express.static("TemplateData"));


app.get('/', function (req, res) {
    let doc = fs.readFileSync('index.html', "utf8");
    res.send(doc);
})



let port = 8000;
app.listen(port, function () {
    console.log('Example app listening on port ' + port + '!');
})