const express = require('express');
const app = express();
const PORT = 3002;

app.get('/', (req, res) => {
    res.send('API de Produtos Ativa');
});

app.listen(PORT, () => {
    console.log(`[Projeto Produtos] Servidor de Produtos rodando na porta ${PORT}`);
});