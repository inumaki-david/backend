# 🌌 Projeto: Consumo da API Star Wars (SWAPI)

Este projeto foi desenvolvido como parte de uma Situação de Aprendizagem (MSEP), focada em demonstrar a capacidade de integrar aplicações com serviços externos através de APIs REST. O sistema permite ao usuário explorar o universo de Star Wars diretamente pelo terminal.

## 🚀 Desafio
O objetivo principal foi criar um programa em **Node.js** que:
1. Recebesse entradas do usuário via terminal.
2. Realizasse requisições HTTP (GET) para uma API pública.
3. Tratasse os dados recebidos em formato JSON.
4. Exibisse as informações de forma organizada e amigável no console.

## 🛠️ Tecnologias Utilizadas
- **Linguagem:** JavaScript (Node.js)
- **Biblioteca de Requisições:** Axios
- **Entrada de Dados:** Prompt-sync
- **API Externa:** [SWAPI - The Star Wars API](https://swapi.dev/)

## 📂 Funcionalidades
O programa conta com um menu interativo que permite consultar:
- 👤 **Personagens:** Nome, altura, massa, cor de cabelo, pele, olhos, nascimento e gênero.
- 🪐 **Planetas:** Clima, gravidade, terreno e informações orbitais.
- 🎬 **Filmes:** Título, diretor, produtor, data de lançamento e o clássico letreiro de abertura.
- 🧬 **Espécies:** Classificação, designação, expectativa de vida e língua.
- 🚜 **Veículos e Naves:** Informações técnicas sobre a frota da galáxia.

## 🔧 Como Executar
1. Certifique-se de ter o **Node.js** instalado.
2. Instale as dependências necessárias:
   ```bash
   npm install axios prompt-sync