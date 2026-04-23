const express = require('express');
const app = express();
const PORT = 3003;

app.get('/', (req, res) => {
    res.send('API de Pedidos Ativa');
});

app.listen(PORT, () => {
    console.log(`[Projeto Pedidos] Servidor de Pedidos rodando na porta ${PORT}`);
});