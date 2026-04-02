import json 

# --- FUNÇÕES DE INTERFACE ---

# Exibe o menu principal de opções para o usuário
def menu():
    print("\n=== TCG - Treinadores e Pokémons ===")
    print("1. Adicionar.")
    print("2. Listar.")
    print("3. Atualizar.")
    print("4. Excluir.")
    print("5. Sair.")

# Gerencia a escolha de categoria (granularidade) para as operações
def escolher_grupo():
    #pergunta ao usuário o grupo que deseja retornar
    print("\nTreinador ou Pokémon: ")
    print("1. Treinador")
    print("2. Pokémon")

    opcao = input("Escolha: ")

    # Retorna a chave correspondente ao dicionário no JSON
    if opcao == "1":
        return "treinadores"
    
    elif opcao == "2":
        return "pokemons"
    
    else:
        print("Opção Inválida.")
        return None
    
# --- FUNÇÕES DE PERSISTÊNCIA DE DADOS (JSON) ---

# Carrega os dados do arquivo físico para a memória do programa
def ler_dados():
    # Abre o arquivo em modo de leitura ('r') com suporte a acentos (utf-8)
    with open("pokemon.json", "r", encoding="utf-8") as arquivo:
        return json.load(arquivo)
    
# Grava os dados da memória de volta para o arquivo físico
def salvar_dados(dados):
    # Abre o arquivo em modo de escrita ('w') formatando o JSON para leitura fácil
    with open("pokemon.json", "w", encoding="utf-8") as arquivo:
        json.dump(dados, arquivo, indent=2, ensure_ascii=False)

# --- OPERAÇÕES DO CRUD ---

# CREATE: Adiciona um novo registro ao grupo selecionado
def adicionar():
    grupo = escolher_grupo()

    if not grupo:
        return
    
    nome = input("Nome: ")
    tipo = input("Tipo: ")

    dados = ler_dados() # Lê os dados atuais antes de modificar

    # Adiciona o novo dicionário à lista do grupo escolhido
    dados[grupo].append({
        "nome": nome,
        "tipo": tipo
    })

    # Persiste a alteração no arquivo
    salvar_dados(dados)
    print("Personagem adicionado.")

# READ: Exibe os registros de um grupo específico
def listar():
    grupo = escolher_grupo()
    
    if not grupo:
        return
    
    dados = ler_dados()
    print(f"\nLista de {grupo.upper()}: ")

    # Percorre a lista do grupo usando enumerate para gerar IDs visuais (index)
    for index, pokemon in enumerate(dados[grupo], start=1):
        print(f"{index}. {pokemon['nome']} - {pokemon['tipo']}")

# UPDATE: Altera os dados de um registro existente via índice
def atualizar():
    grupo = escolher_grupo()

    if not grupo:
        return
    
    dados = ler_dados()

    # Pede o índice ao usuário e ajusta para o padrão de lista (começando em 0)
    index = int(input("Indíce do personagem: ")) - 1

    # Validação de segurança para garantir que o índice existe na lista
    if 0 <= index < len(dados[grupo]):
        nome = input("Novo nome: ")
        tipo = input("Novo tipo: ")

        # Substitui os dados antigos pelos novos
        dados[grupo][index] = {
            "nome": nome,
            "tipo": tipo
        }
    
        salvar_dados(dados)
        print("Personagem atualizado.")

    else:
        print("Indíce inválido.")

# DELETE: Remove um registro do arquivo JSON
def excluir():
    grupo = escolher_grupo()

    if not grupo:
        return
    
    dados = ler_dados()

    index = int(input("Indíce do personagem: ")) - 1

    # Verificar se o index é válido antes de tentar remover
    if 0 <= index < len(dados[grupo]):
        # Remove o elemento da lista pelo índice usando pop()
        dados[grupo].pop(index)

        salvar_dados(dados)
        print("Personagem excluído.")
    else:
        print("Indíce inválido.")

# --- FLUXO PRINCIPAL ---

# Função que mantém o programa em execução e gerencia as chamadas do menu
def main():
    while True:
        menu()

        opcao = input("\nEscolha uma opção: ")

        # Estrutura de decisão para chamar as funções do CRUD
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

# Executa o programa
main()