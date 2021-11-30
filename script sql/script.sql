CREATE TABLE produto (
    id int NOT NULL AUTO_INCREMENT,
    titulo varchar(255) NOT NULL,
    descricao varchar(255) NOT NULL,
    preco decimal(6, 2) NOT NULL,
    imagem varchar(200),
    categoria int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (categoria) REFERENCES categoria (id) ON
    DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO produto (id, titulo, descricao, preco, categoria) values (6, 'Calça moletom feminino várias cores', 'Calça moletom ótima para os dias mais frios, possui modelagem mais justa e bolsos na parte da frente, com acabamento e costura no tom.', '79.99', '3');
UPDATE produto set imagem = 'sem_foto.png' WHERE id=6;

CREATE TABLE categoria (
    id int NOT NULL AUTO_INCREMENT,
    categoria varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO categoria (categoria) values ('blusas');
INSERT INTO categoria (categoria) values ('vestidos');
INSERT INTO categoria (categoria) values ('calças/shorts');

CREATE TABLE administrador (
    id int NOT NULL AUTO_INCREMENT,
    usuario varchar(255) NOT NULL,
    senha int(10) NOT NULL,
    PRIMARY KEY (id)
);

create table usuario (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    cpf int(11) NOT NULL,
    data_nascimento date NOT NULL,
    sexo varchar(9) NOT NULL,
    telefone int(13) NOT NULL,
    senha varchar(20) NOT NULL,
    endereco varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO usuario (nome, email, cpf, data_nascimento, sexo, telefone, senha, endereco) values ('teste', 'teste@teste.com', '00000000000', '00/00/0000', 'fem', '000000000000', 'teste123', 'teste teste teste 123');

create table estoque (
    id int NOT NULL AUTO_INCREMENT,
    id_produto int NOT NULL,
    tam_P int(4),
    tam_M int(4),
    tam_G int(4),
    tam_GG int(4),
    tam_36 int(4),
    tam_38 int(4),
    tam_40 int(4),
    tam_42 int(4),
    tam_44 int(4),
    tam_46 int(4),
    PRIMARY KEY (id),
    FOREIGN KEY (id_produto) REFERENCES produto (id) ON
    DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO estoque (id_produto, tam_P, tam_M, tam_G, tam_GG, tam_36, tam_38, tam_40, tam_42, tam_44, tam_46) values ('6', '4', '4', '4', '4', NULL, NULL, NULL, NULL, NULL, NULL);
UPDATE estoque SET tam_P = 3, tam_M = 5, tam_G = 2, tam_GG = 7, tam_36 = NULL, tam_38 = NULL, tam_40 = NULL, tam_42 = NULL, tam_44 = NULL, tam_46 = NULL WHERE id=5;

create table avaliacao (
    id int NOT NULL AUTO_INCREMENT,
    id_usuario int NOT NULL,
    id_produto int NOT NULL,
    avaliacao text NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON
    DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_produto) REFERENCES produto(id) ON
    DELETE CASCADE ON UPDATE CASCADE
);