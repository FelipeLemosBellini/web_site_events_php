CREATE TABLE usuarios (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NULL,
    email VARCHAR(100) NULL UNIQUE,
    senha VARCHAR(255) NULL,
    tipo ENUM('organizador', 'participante') NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE eventos (
    id INT(11) NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(255) NULL,
    descricao TEXT NULL,
    data DATE NULL,
    local VARCHAR(255) NULL,
    limite_inscricoes INT(11) NULL,
    organizador_id INT(11) NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_eventos_organizador FOREIGN KEY (organizador_id) REFERENCES usuarios (id)
);

CREATE TABLE inscricoes (
    id INT(11) NOT NULL AUTO_INCREMENT,
    evento_id INT(11) NULL,
    participante_id INT(11) NULL,
    data_inscricao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    CONSTRAINT fk_inscricoes_evento FOREIGN KEY (evento_id) REFERENCES eventos (id),
    CONSTRAINT fk_inscricoes_participante FOREIGN KEY (participante_id) REFERENCES usuarios (id)
);