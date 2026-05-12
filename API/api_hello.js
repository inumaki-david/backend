//criando a minha API

const http = require('http');

const hostname = '127.0.0.1';
const port = 3000;

//função para manipular requisições
const resquestHandler = (req, res) => {
    res.statusCode = 200;
    res.setHeader('Content-Type', 'application/json');

    //definir a lógica da rota
    if (req.url === '/hello' && req.method === 'GET') {
        res.end(JSON.stringify({
            message: 'Olá Mundo!'
        }));
    } else {
        res.statusCode = 404;
        res.end(JSON.stringify({
            error: 'Rota não encontrada'
        }));
    }
};

//criando o servidor 
const server = http.createServer(resquestHandler);

//iniciando o servidor
server.listen(port, hostname, () => {
    console.log(`Servidor rodando em http>//${hostname}:${port}/`)
});