const express = require('express');
const app = express();
const PORT = 3001;

app.get('/', (req, res) => {
    res.send('API de Usuários Ativa');
});

app.listen(PORT, () => {
    console.log(`[Projeto Usuários] Servidor de Usuários rodando na porta ${PORT}`);
});