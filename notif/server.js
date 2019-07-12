var server     = require('http').createServer(),
    io         = require('socket.io')(server),
    logger     = require('winston'),
    port       = 1337;

// Logger config
logger.remove(logger.transports.Console);
logger.add(logger.transports.Console, { colorize: true, timestamp: true });
logger.info('SocketIO > listening on port ' + port);

io.on('connection', function (socket){
    var nb = 0;

    logger.info('SocketIO > Connected socket ' + socket.id);

    socket.on('daftar', function (message) {
        ++nb;
        io.emit('daftar', message);
        logger.info('ElephantIO daftar > ' + JSON.stringify(message));
    });

    socket.on('login', function (message) {
        ++nb;
        io.emit('login', message);
        logger.info('ElephantIO login > ' + JSON.stringify(message));
    });

    socket.on('logout', function (message) {
        ++nb;
        io.emit('logout', message);
        logger.info('ElephantIO logout > ' + JSON.stringify(message));
    });

    socket.on('chat message', function(msg){
        ++nb;
    logger.info('message: ' + JSON.stringify(msg));
  });

    socket.on('disconnect', function () {
        logger.info('SocketIO : Received ' + nb + ' messages');
        logger.info('SocketIO > Disconnected socket ' + socket.id);
    });
});

server.listen(port);