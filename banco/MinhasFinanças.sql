CREATE DATABASE transacoes_financeiras;

CREATE TABLE tipos_transacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE transacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_id INT,
    tipo ENUM('receita', 'despesa') NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    descricao TEXT,
    FOREIGN KEY (tipo_id) REFERENCES tipos_transacoes(id)
);
