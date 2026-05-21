CREATE database escola;

create table alunos (
    id SERIAL PRIMARY KEY,
    nome TEXT NOT NULL,
    sobrenome TEXT NOT NULL,
    data_nascimento DATE,
    turma TEXT NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT true
)

INSERT INTO alunos (
    nome,
    sobrenome,
    data_nascimento,
    turma,
    ativo
) VALUES (
    'Davi',
    'Martins',
    '2008-07-30',
    'I2D35',
    true
)

SELECT * FROM alunos;

create table professores (
    id SERIAL PRIMARY KEY,
    nome TEXT NOT NULL,
    sobrenome TEXT NOT NULL,
    data_nascimento DATE,
    materia TEXT NOT NULL,
    turma TEXT NOT NULL
)

INSERT INTO professores (
    nome,
    sobrenome,
    data_nascimento,
    materia,
    turma
) VALUES (
    'Jorge',
    'Carneiro',
    '1989-08-31',
    'Backend e Projeto-Soft',
    'I2D35'
)

INSERT INTO professores (
    nome,
    sobrenome,
    data_nascimento,
    materia,
    turma
) VALUES (
    'Diogo',
    'Barbosa',
    '1978-03-27',
    'Frontend e Mobile',
    'I2D35'
)

SELECT * FROM professores;

UPDATE professores SET sobrenome = 'Takamori' WHERE id = 2;

