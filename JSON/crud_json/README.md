# Sistema CRUD TCG - Treinadores e Pokémons

Este projeto é uma aplicação de backend simples desenvolvida para a Unidade de Projeto de Software / Backend 2. O objetivo é gerenciar registros de Treinadores e Pokémons utilizando um arquivo JSON como base de dados persistente.

## Funcionalidades

O sistema implementa o ciclo completo de um CRUD:
- **Create (Adicionar):** Permite inserir novos nomes e tipos em categorias específicas (Treinadores ou Pokémons).
- **Read (Listar):** Exibe de forma organizada os registros salvos no arquivo.
- **Update (Atualizar):** Permite a edição de dados existentes através de um índice identificador.
- **Delete (Excluir):** Remove registros da base de dados.

## Tecnologias Utilizadas

- **Linguagem:** Python 
- **Módulo Nativo:** `json` (para manipulação e persistência de dados)
- **Persistência:** Arquivo `.json` local.

## Estrutura do Arquivo JSON

O projeto utiliza uma estrutura granulada para separar as entidades:

```json
{
  "treinadores": [],
  "pokemons": []
}