const express = require('express');
const path = require('path');
const db = require('./db');

const app = express();
const port = 3000;

app.use(express.json());

// --- Exercício 1: Criar um Servidor Básico
app.get('/hello', (req, res) => {
    res.send('Hello World');
});

// --- EXERCÍCIO 3: Middleware de Registro (Logger) ---
app.use((req, res, next) => {
    console.log(`[${new Date().toISOString()}] ${req.method} em ${req.url}`);
    next();
});

// --- EXERCÍCIO 5: Servir Arquivos Estáticos ---
app.use(express.static('public'));

// Dados em memória para Tarefas (Exercício 2)
let tarefas = [];

// --- ROTAS DE TAREFAS (Exercício 2 e 4) ---
app.get('/tarefas', (req, res) => res.json(tarefas));

app.post('/tarefas', (req, res) => {
    const { nome } = req.body;
    const novaTarefa = { id: tarefas.length + 1, nome };
    tarefas.push(novaTarefa);
    res.status(201).json(novaTarefa);
});

app.delete('/tarefas/:id', (req, res, next) => {
    const id = parseInt(req.params.id);
    const index = tarefas.findIndex(t => t.id === id);
    
    if (index === -1) {
        const erro = new Error("ID de tarefa inválido ou não encontrado");
        erro.status = 404;
        return next(erro); // Envia para o middleware de erro (Exercício 4)
    }
    
    tarefas.splice(index, 1);
    res.status(204).send();
});

// --- ROTAS DE USUÁRIOS (Exercício 7 - API RESTful) ---
app.get('/usuarios', (req, res) => res.json(db.buscarTodos()));

app.get('/usuarios/:id', (req, res) => {
    const usuario = db.buscarPorId(req.params.id);
    if (!usuario) return res.status(404).json({ mensagem: "Usuário não encontrado" });
    res.json(usuario);
});

app.post('/usuarios', (req, res) => {
    if (!req.body.nome) return res.status(400).json({ mensagem: "Nome é obrigatório" });
    const novo = db.adicionar(req.body.nome);
    res.status(201).json(novo);
});

app.put('/usuarios/:id', (req, res) => {
    const atualizado = db.atualizar(req.params.id, req.body.nome);
    if (!atualizado) return res.status(404).json({ mensagem: "Usuário não encontrado" });
    res.json(atualizado);
});

app.delete('/usuarios/:id', (req, res) => {
    const removido = db.deletar(req.params.id);
    if (!removido) return res.status(404).json({ mensagem: "Usuário não encontrado" });
    res.status(204).send();
});

// --- EXERCÍCIO 4: Middleware de Tratamento de Erros ---
app.use((err, req, res, next) => {
    const status = err.status || 500;
    res.status(status).json({
        erro: true,
        mensagem: err.message || "Erro interno no servidor"
    });
});



app.listen(port, () => {
    console.log(`Servidor iniciado na porta ${port}`);
});