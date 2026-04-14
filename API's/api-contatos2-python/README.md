## Comparação: Express (JavaScript) × Flask (Python)

| Conceito           | Express            | Flask               |
|--------------------|--------------------|---------------------|
| Criar servidor     | express()          | Flask(__name__)     |
| JSON no body       | req.body           | request.json        |
| GET                | app.get()          | methods=["GET"]     |
| POST               | app.post()         | methods=["POST"]    |
| PUT                | app.put()          | methods=["PUT"]     |
| DELETE             | app.delete()       | methods=["DELETE"]  |
| Resposta           | res.json()         | jsonify()           |

## Rotas da API – CRUD de Contatos

| Método | URL                      | Descrição |
|--------|--------------------------|-----------|
| GET    | /contatos/alunos         | Listar contatos |
| POST   | /contatos/alunos         | Criar contato |
| PUT    | /contatos/alunos/0       | Atualizar contato |
| DELETE | /contatos/alunos/0       | Excluir contato |

# 🌌 API de Contatos 

Bem-vindo(a) à **API de Contatos**, uma interface simples e didática para o gerenciamento de registros de alunos e professores, inspirada na estrutura de documentação da SWAPI (Star Wars API).

---

## 📖 Introdução

Esta documentação foi criada para orientar desenvolvedores sobre como interagir com o serviço de contatos. A API permite realizar operações completas de **CRUD** (Create, Read, Update, Delete) em grupos específicos de usuários.

---

## 🔗 URL Base

A URL raiz de toda a API é:

```
http://localhost:3000/
```

---

## 🔐 Autenticação

A API de Contatos é completamente aberta. Não é necessária nenhuma chave de API ou token para consultar ou modificar os dados.

---

## 📂 Recursos e Endpoints

### 📌 Contatos

Um recurso de contato representa uma pessoa individual (aluno ou professor) dentro do sistema.

| Endpoint                    | Método | Descrição                                                       |
| --------------------------- | ------ | --------------------------------------------------------------- |
| `/contatos/<grupo>`         | GET    | Lista todos os contatos de um grupo (alunos ou professores).    |
| `/contatos/<grupo>`         | POST   | Adiciona um novo contato ao grupo informado.                    |
| `/contatos/<grupo>/<index>` | PUT    | Atualiza os dados de um contato baseado no seu índice na lista. |
| `/contatos/<grupo>/<index>` | DELETE | Remove um contato permanentemente através do seu índice.        |

---

## 📊 Atributos do Objeto

| Atributo | Tipo   | Descrição                                         |
| -------- | ------ | ------------------------------------------------- |
| nome     | string | O nome completo da pessoa.                        |
| telefone | string | O número de telefone com DDD (ex: "19993349723"). |

---

## 🛠️ Instruções de Instalação

### 📦 Dependências

Certifique-se de ter o Python e o Flask instalados:

```bash
pip install flask
```

---

### 📁 Arquivo de Dados

Crie um arquivo chamado `contatos.json` na raiz do projeto com a estrutura inicial:

```json
{
  "alunos": [],
  "professores": []
}
```

---

### ▶️ Execução

No terminal, inicie o servidor com o comando:

```bash
python app.py
```

A API estará disponível para testes no navegador e no Postman pela url:

```
http://127.0.0.0:3000
```

---

## ⚠️ Observações

* A API utiliza persistência em arquivo local (`contatos.json`).
* Caso tente acessar um grupo que não seja `alunos` ou `professores`, a API retornará um erro **404 Not Found**.
