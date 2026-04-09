//importar o prompt sync
const prompt = require('prompt-sync')();

//função para menu
function menu() {
    console.log("\n=== API de Star Wars - Menu ===\n");
    console.log("1. Personagens de Star Wars.");
    console.log("2. Planetas da Galáxia.");
    console.log("3. Filmes da Franquia.");
    console.log("4. Consultar Espécies.");
    console.log("5. Consultar Veículos.")
    console.log("6. Consultar Naves Estelares.")
    console.log("7. Sair da API.")
}

//função principal para consultar os personagens de Star Wars

//função principal main
function main () {
    let escolha;
    do {
        menu();
        escolha = prompt("\nEscolha uma opção: ");
        switch (escolha) {
            case "1":
                //aqui vai ficar a função para os personagens
                break;
            case "2":
                //aqui vai ficar a função para os planetas
                break;
            case "3":
                //aqui vai ficar a função para os filmes
                break;
            case "4":
                //aqui vai ficar a função para as especies
                break;
            case "5":
                //aqui vai ficar a função para os veículos
                break;
            case "6":
                //aqui vai ficar a função para as naves 
                break;
            case "7":
                console.log("Saindo da API  de Star Wars...")
                break;
            default: 
                console.log("\nEscolha Inválida.")
        }
    } while (escolha != 7);
}

main();