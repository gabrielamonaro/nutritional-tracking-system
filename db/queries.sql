CREATE database nutricao
default character set utf8
default collate utf8_general_ci;

use nutricao;

CREATE TABLE cadastro_diario (
    id INT NOT NULL AUTO_INCREMENT,
    horario TIME,
    dia DATE,
    tp_refeicao ENUM('cafe da manha', 'almoco', 'cafe da tarde', 'jantar') NOT NULL,
    unidade_medida ENUM('grama', 'mililitro') NOT NULL,
    quantidade DECIMAL(10,2) NOT NULL,
    lugar ENUM('casa', 'fora') NOT NULL,
    nivel_fome TINYINT NOT NULL CHECK (nivel_fome >= 1 AND nivel_fome <= 3),
    id_alimento INT NOT NULL,
    registro TEXT(1000),
    PRIMARY KEY (id),
    FOREIGN KEY (id_alimento) REFERENCES cadastro_alimento(id_alimento)
) DEFAULT CHARSET = utf8;



create table cadastro_alimento (

id_alimento int not null auto_increment,
nome varchar (20) not null,
qualidade TINYINT NOT NULL CHECK (nivel_fome >= 1 AND nivel_fome <= 3),
primary key (id_alimento)
)default charset = utf8;