CREATE SCHEMA OrdemDeServico;

CREATE TABLE OrdemDeServico.clientes (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    endereco TEXT
);

CREATE TABLE OrdemDeServico.produtos (
    id SERIAL PRIMARY KEY,
    codigo INTEGER NOT NULL,
    descricao TEXT NOT NULL,
    statusProduto VARCHAR(20),
    tempo_garantia INTEGER
);

CREATE TABLE OrdemDeServico.ordem_servico (
    id SERIAL PRIMARY KEY,
    numero_ordem VARCHAR(20) NOT NULL,
    data_abertura DATE NOT NULL,
    produto_id INTEGER,
    cliente_id INTEGER,
    FOREIGN KEY (produto_id) REFERENCES OrdemDeServico.produtos(id),
    FOREIGN KEY (cliente_id) REFERENCES OrdemDeServico.clientes(id)
);
