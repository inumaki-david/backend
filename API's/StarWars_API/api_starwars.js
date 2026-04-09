//importar o prompt sync
const prompt = require('prompt-sync')();
const axios = require('axios');

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
    console.log("----------------------------------")
}

//função para consultar os personagens de Star Wars
async function consultarPersonagem () {
    const id = prompt("Digite o ID do Personagem (ex: 1 para Luke): ");
    const url = `https://swapi.dev/api/people/${id}`;

    try {
        console.log("\nExplorando a Galáxia...");

        const resposta = await axios.get(url);
        const dados = resposta.data;
        
        console.log("\n=== Resultado Encontrado ===");
        console.log(`Nome: ${dados.name}`);
        console.log(`Altura: ${dados.height}cm`);
        console.log(`Massa Corporal: ${dados.mass}`);
        console.log(`Cor do Cabelo: ${dados.hair_color}`);
        console.log(`Cor da Pele: ${dados.skin_color}`);
        console.log(`Cor dos Olhos: ${dados.eye_color}`);
        console.log(`Ano de Nascimento: ${dados.birth_year}`);
        console.log(`Gênero: ${dados.gender}`);
        console.log("----------------------------");
    } catch (erro) {
        console.log("[Erro]: ID do Personagem não encontrado. Tente novamente.")
    }
}

//função para consultar os planetas 
async function consultarPlaneta() {
    const id = prompt("Digite o ID do Planeta (ex: 1 para Tatooine): ");
    const url = `https://swapi.dev/api/planets/${id}`;

    try {
        console.log("\nVerificando os Planetas...");

        const resposta = await axios.get(url);
        const dados = resposta.data;

        console.log("\n=== Resultado Encontrado ===");
        console.log(`Planeta: ${dados.name}`);
        console.log(`Período de Rotação: ${dados.rotation_period}`);
        console.log(`Período Orbital: ${dados.orbital_period}`);
        console.log(`Diâmetro: ${dados.diameter}`);
        console.log(`Clima: ${dados.climate}`);
        console.log(`Gravidade: ${dados.gravity}`);
        console.log(`Terreno: ${dados.terrain}`);
        console.log(`Porcentagem de Água na Superfície: ${dados.surface_water}`);
        console.log("--------------------------------------");
        
    } catch (erro) {
        console.log("[Erro]: ID do Planeta não encontrado. Tente novamente.");
    }
}

//função para consultar os filmes
async function consultarFilmes() {
    const id = prompt("Digite o ID do Filme (ex: 2 para The Empire Strikes Back): ");
    const url = `https://swapi.dev/api/films/${id}`;

    try {
        console.log("\nConsultando Arquivos Cinematográficos...");

        const resposta = await axios.get(url);
        const dados = resposta.data;
        
        console.log("\n=== Resultado Encontrado ===");
        console.log(`Filme: ${dados.title}`);
        console.log(`Diretor: ${dados.director}`);
        console.log(`Produtor: ${dados.producer}`);
        console.log(`Data de Lançamento: ${dados.release_date}`);
        console.log(`Descrição do Filme:\n${dados.opening_crawl}`)
        console.log("-----------------------------------");

    } catch (erro) {
        console.log("[Erro]: ID do Filme não encontrado. Tente novamente.");
    }
}

//função para consultar as espécies
async function consultarEspecies() {
    const id = prompt("Digite o ID da Espécie (ex: 1 para Humano): ");
    const url = `https://swapi.dev/api/species/${id}`;

    try {
        console.log("\nVerificando informações sobre as Espécies...");

        const resposta = await axios.get(url);
        const dados = resposta.data;

        console.log("\n=== Resultado Encontrado ===");
        console.log(`Espécie: ${dados.name}`);
        console.log(`Classificação: ${dados.classification}`);
        console.log(`Designação: ${dados.designation}`);
        console.log(`Altura Média da Espécie: ${dados.average_heigth}`);
        console.log(`Expectativa de Vida da Espécie: ${dados.average_lifespan}`);
        console.log(`Língua falada pela Espécie: ${dados.language}`);
        console.log(`Cor da Pele da Espécia: ${dados.skin_colors}`);
        console.log(`Cor do Cabelo da Espécie: ${dados.hair_colors}`);
        console.log(`Cor dos Olhos da Espécie: ${dados.eye_colors}`);
        console.log("----------------------------");
    } catch (erro) {
        console.log("[Erro]: ID da Espécie não encontrada. Tente novamente.");
    }
}

//função para consultar veículos
async function consultarVeiculos() {
    const id = prompt("Digite o ID do Veículo (ex: 1 para Sand Crawler): ");
    const url = `https://swapi.dev/api/vehicles/${id}`;

    try {
        console.log("\nAnalisando Veículos disponíveis...");

        const resposta = await axios.get(url);
        const dados = resposta.data;

        console.log(`Veículo: ${dados.name}`);

    } catch (erro) {
        console.log("[Erro]: ID da Espécie não encontrada. Tente novamente.");
    }
}

//função principal main
async function main () {
    let escolha;
    do {menu();
        escolha = prompt("Escolha uma opção: ");
        switch (escolha) {
            case "1":
                await consultarPersonagem();
                break;
            case "2":
                await consultarPlaneta();
                break;
            case "3":
                await consultarFilmes();
                break;
            case "4":
                await consultarEspecies();
                break;
            case "5":
                await consultarVeiculos();
                break;
            case "6":
                //aqui vai ficar a função para as naves 
                break;
            case "7":
                console.log("\nSaindo da API de Star Wars... Que a força esteja com você!\n")
                break;
            default: 
                console.log("\n[Erro]: Escolha Inválida.")
        }
    } while (escolha != 7);
}

main();