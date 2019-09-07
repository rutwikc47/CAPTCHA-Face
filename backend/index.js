const express = require('express')
var app = express()

app.listen(3000,() =>  console.log('server running on port 3000'))

app.post('/', callName);

function callName(req, res) {
	console.log('start...')
    var spawn = require("child_process").spawn;

    var process = spawn('python3.6',["./beproj.py"] );
    process.stdout.on('data', function(data) {
		console.log(data.toString());
		res.status(200).send(data);
    } )
}

