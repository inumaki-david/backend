import json

#menu principal
def menu():
    print("\n=== MENU DE CONTATOS ===")
    print("1. Adicionar contato.")
    print("2. Listar contatos.")
    print("3. Atualizar contato.")
    print("4. Excluir contato.")
    print("5. Sair.")

#função para escolher grupo
def escolher_grupo():
    #pergunta ao usuário o grupo que deseja retornar
    print("\nTipo de contato: ")
    print("1. Aluno")
    print("2. Professor")

    opcao = input("Escolha: ")

    if opcao == "1":
        return "alunos"
    
    elif opcao == "2":
        return "professores"
    
    else:
        print("Opção Inválida.")
        return None

#função para ler o JSON
def ler_dados():
    with open("contatos.json", "r", encoding="utf-8") as arquivo:
        return json.load(arquivo)
    
#função para salvar dados
def salvar_dados(dados):
    with open("contatos.json", "w", encoding="utf-8") as arquivo:
        json.dump(dados, arquivo, indent=2, ensure_ascii=False)

#função para adicionar dados
def adicionar():
    grupo = escolher_grupo()

    if not grupo:
        return
    
    nome = input("Nome: ")
    telefone = input("Telefone: ")

    dados = ler_dados()

    dados[grupo].append({
        "nome": nome,
        "telefone": telefone
    })

    salvar_dados(dados)
    print("Contato adicionado.")

#função para listar contatos
def listar():
    grupo = escolher_grupo()
    
    if not grupo:
        return
    
    dados = ler_dados()
    print(f"\nLista de {grupo.upper()}: ")

    for index, contato in enumerate(dados[grupo], start=1):
        print(f"{index}. {contato['nome']} - {contato['telefone']}")

#função para atualizar contatos
def atualizar():
    grupo = escolher_grupo()

    if not grupo:
        return
    
    dados = ler_dados()

    index = int(input("Indíce do contato: ")) - 1

    if 0 <= index < len(dados[grupo]):
        nome = input("Novo nome: ")
        telefone = input("Novo telefone: ")

        dados[grupo][index] = {
            "nome": nome,
            "telefone": telefone
        }
    
        salvar_dados(dados)
        print("Contato atualizado.")

    else:
        print("Indíce inválido.")

#função para excluir contato
def excluir():
    grupo = escolher_grupo()

    if not grupo:
        return
    
    dados = ler_dados()

    index = int(input("Indíce do contato: ")) - 1

    #verificar se o index é válido
    if 0 <= index < len(dados[grupo]):
        #remove o elemento da matriz
        dados[grupo].pop(index)

        salvar_dados(dados)
        print("Contato excluído.")
    else:
        print("Indíce inválido.")

#menu principal
def main():
    while True:
        menu()

        opcao = input("\nEscolha uma opção: ")

        if opcao == "1":
            adicionar()

        elif opcao == "2":
            listar()

        elif opcao == "3":
            atualizar()

        elif opcao == "4":
            excluir()

        elif opcao == "5":
            print("Encerrando o programa...")
            break

        else:
            print("Opção inválida.")

#executa o programa
main()