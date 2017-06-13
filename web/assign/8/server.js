var http = require('http');


function onRequest(req, res){
    if (req.url == "/home") {
        res.writeHead(200, {"Content-Type": "text/html"});
        res.write('<html>');
        res.write('<body>');
        res.write('<h1>Welcome to the Home Page</h1>');
        res.write('</body>');
        res.write('</html>');
        res.end();
    } else if (req.url == "/getData") {
        res.writeHead(200, {"Content-Type": "application/json"});
        var thing = {"name":"Br. Burton","class":"cs313"}
        res.write(JSON.stringify(thing));
        res.end();
    } else {
        res.writeHead(404, {"Content-Type": "text/html"});
        res.write("404 Not Found\n")
        res.end();
    }
}

http.createServer(onRequest).listen(8888);
