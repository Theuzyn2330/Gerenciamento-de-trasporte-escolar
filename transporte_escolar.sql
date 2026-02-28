CREATE DATABASE transporte_escolar;
USE transporte_escolar;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE escolas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    responsavel VARCHAR(150),
    telefone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    foto VARCHAR(255) DEFAULT 'default.png',
    escola_id INT NOT NULL,
    turno ENUM('manha','tarde') NOT NULL,
    telefone_responsavel VARCHAR(20),
    ativo TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT fk_escola
        FOREIGN KEY (escola_id) 
        REFERENCES escolas(id)
        ON DELETE CASCADE
);

CREATE TABLE registros_diarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aluno_id INT NOT NULL,
    data DATE NOT NULL,
    foi_escola TINYINT(1) DEFAULT 0,
    voltou_casa TINYINT(1) DEFAULT 0,
    parcial TINYINT(1) DEFAULT 0,
    
    CONSTRAINT fk_aluno
        FOREIGN KEY (aluno_id)
        REFERENCES alunos(id)
        ON DELETE CASCADE,
        
    UNIQUE (aluno_id, data)
);

-- Inserindo dados de exemplo
INSERT INTO escolas (nome, responsavel, telefone) VALUES
('Escola A', 'Diretora A', '99999-1111'),
('Escola B', 'Diretora B', '99999-2222'),
('Escola C', 'Diretora C', '99999-3333');

INSERT INTO criancas (nome, escola_id, turno, telefone_responsavel) VALUES
('Aluno 1', 1, 'manha', '98888-1111'),
('Aluno 2', 1, 'tarde', '98888-2222'),
('Aluno 3', 2, 'manha', '98888-3333'),
('Aluno 4', 3, 'tarde', '98888-4444');