
let usuarios = [
    { 
        id: 1, 
        nome: "Davi Martins" 
    }
];

const db = {
    buscarTodos: () => usuarios,
    
    buscarPorId: (id) => usuarios.find(u => u.id === parseInt(id)),
    
    adicionar: (nome) => {
        const novoUsuario = { id: usuarios.length + 1, nome };
        usuarios.push(novoUsuario);
        return novoUsuario;
    },
    
    atualizar: (id, nome) => {
        const usuario = usuarios.find(u => u.id === parseInt(id));
        if (usuario) {
            usuario.nome = nome;
            return usuario;
        }
        return null;
    },
    
    deletar: (id) => {
        const index = usuarios.findIndex(u => u.id === parseInt(id));
        if (index !== -1) {
            return usuarios.splice(index, 1);
        }
        return null;
    }
};

module.exports = db;