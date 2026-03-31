const fs = require("fs");
const prompt = require("prompt-sync")();

// Função para criar o menu de opções:
function menu() {
    console.log("\nMenu de Contatos: ");
    console.log("1. Adicionar Contato.")
    console.log("2. Listar Contatos.");
    console.log("3. Atualizar Contato.");
    console.log("4. Excluir Contato.")
    console.log("5. Sair.")
}

//Função principal para executar o programa
function main() {
    let opcao;
    do {
        menu();
        opcao = prompt("Escolha uma opção: ");
        switch (opcao) {
            case "1":
                adicionar(); //Chama a função para adicionar um novo contato
                break;
            case "2":
                listar(); //Chama a função para listar os contatos
                break;
            case "3":
                atualizar(); //Chama a que atualiza a lista de contatos
                break;
            case "4":
                excluir(); //Chama a função que apaga um contato da lista
                break;
            case "5":
                console.log("Saindo do programa...");
                break;
            default:
                console.log("Opção inválida. Tente novamente.");
        }
    } while (opcao !== "5");
}

// Função para ler os dados do arquivo JSON
function lerDados() {
    const dados = fs.readFileSync("contatos.json", "utf-8");
    return JSON.parse(dados || "[]"); // Retorna um array vazio se não houver dados no JSON
}

//Função para adicionar um novo contato
function adicionar() {
    const nome = prompt("Digite o nome do contato: ");
    const telefone = prompt("Digite o telefone do contato: ");

    const contatos = lerDados();
    contatos.push({nome, telefone});
    salvarDados(contatos);
    console.log("\nContato adicionado.");
}

//Função para listar os contatos
function listar() {
    const contatos = lerDados();
    console.log("Lista de Contatos: ");
    contatos.forEach((contato, index) => {
        console.log(`${index+1}. ${contato.nome} = ${contato.telefone}`);
    })
}

//Função para atualizar um contato
function atualizar() {
    const indexAtualizar = parseInt(prompt("Digite o ID do contato a ser atualizado: ")) -1;
    const contatos = lerDados();
    if (indexAtualizar >= 0 && indexAtualizar < contatos.length) {
        const novoNome = prompt("Digite o novo nome do contato: ");
        const novoTelefone = prompt("Digite o novo número de telefone: ");

        contatos[indexAtualizar] = {nome: novoNome, telefone: novoTelefone};
        salvarDados(contatos);
        console.log("\nContato atualizado.");
    } else {
        console.log("\nID do contato inválido.");
    }
}

//Função para excluir um contato
function excluir() {
    const indexExcluir = parseInt(prompt("Digite o ID do contato a ser excluido: ")) -1;
    const contatos = lerDados();
    if (indexExcluir >= 0 && indexExcluir < contatos.length) {
        contatos.splice(indexExcluir, 1);
        salvarDados(contatos);
        console.log("\nContato excluído.");
    } else {
        console.log("ID do contato inválido.");
    }
}

// Função para salvar/gravar os dados no arquivo JSON
function salvarDados(contatos) {
    fs.writeFileSync("contatos.json", JSON.stringify(contatos, null, 2));
}

//Inicia o programa 
listar()
main();