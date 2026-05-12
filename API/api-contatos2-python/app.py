from flask import Flask, request, jsonify
import json

app = Flask(__name__)

#chama o arquivo contatos.json
ARQUIVO = "contatos.json"

#função para ler os dados
def ler_dados():
    try:
        with open(ARQUIVO, "r", encoding="utf-8") as arquivo:
            return json.load(arquivo) # Retorna os dados lidos
    except FileNotFoundError:
        return {"alunos": [], "professores": []}

#função para gravar os dados
def salvar_dados(dados):
    with open(ARQUIVO, "w", encoding="utf-8") as arquivo:
        json.dump(dados, arquivo, ensure_ascii=False, indent=2)

#rota para listar os contatos de um grupo específico (GET)
@app.route("/contatos/<grupo>", methods=["GET"])
def listar_contatos(grupo):
    dados = ler_dados()
    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado."}), 404
    return jsonify(dados[grupo])

#rota para listar os contatos de todos os grupos (GET)
@app.route("/contatos", methods=["GET"])
def listar_contatos2(grupo):
    dados = ler_dados()
    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado."}), 404
    return jsonify(dados)

#rota para adicionar um contato (POST)
@app.route("/contatos/<grupo>", methods=["POST"])
def adicionar_contato(grupo):
    dados = ler_dados()
    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado."}), 404
    
    corpo = request.json
    if not corpo or "nome" not in corpo or "telefone" not in corpo:
        return jsonify({"erro": "Campos 'nome' e 'telefone' são obrigatórios."}), 400
    
    novo_contato = {"nome": corpo["nome"], "telefone": corpo["telefone"]}
    dados[grupo].append(novo_contato)
    salvar_dados(dados)

    return jsonify({"mensagem": "Contato adicionado.", "contato": novo_contato}), 201

#rota para atualizar contato (PUT)
@app.route("/contatos/<grupo>/<int:index>", methods=["PUT"])
def atualizar_contato(grupo, index):
    dados = ler_dados()
    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado."}), 404
    
    #verifica se o índice existe
    if index < 0 or index >= len(dados[grupo]):
        return jsonify({"erro": "Contato não encontrado."}), 404
    
    corpo = request.json

    if not corpo or "nome" not in corpo or "telefone" not in corpo:
        return jsonify({"erro": "Campos 'Nome' e 'Telefone' são obrigatórios."}), 400

    #atualiza o contato
    dados[grupo][index] = {
        "nome": corpo["nome"],
        "telefone": corpo["telefone"]
    }

    salvar_dados(dados)

    return jsonify({
        "mensagem": "Contato atualizado.",
        "contato": dados[grupo][index]
    }), 200

#rota para deletar um contato (DELETE)
@app.route("/contatos/<grupo>/<int:index>", methods=["DELETE"])
def deletar_contato(grupo, index):
    dados = ler_dados()
    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado."}), 404
    
    if index < 0 or index >= len(dados[grupo]):
        return jsonify({"erro": "Contato não encontrado."}), 404
    
    contato_removido = dados[grupo].pop(index)
    salvar_dados(dados)

    return jsonify({"mensagem": "Contato excluído.", "contato": contato_removido}), 200

#inicia o servidor
if __name__ == "__main__":
    app.run(host="0.0.0.0", port=3000, debug=True)