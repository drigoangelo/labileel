CREATE TABLE dataset.tb_modulos(
    modulo   INTEGER,
    quantidade INTEGER,
    
    CONSTRAINT pk_modulo PRIMARY KEY(modulo)
);

INSERT INTO dataset.tb_modulos (modulo, quantidade) VALUES (1,0);
INSERT INTO dataset.tb_modulos (modulo, quantidade) VALUES (2,0);
INSERT INTO dataset.tb_modulos (modulo, quantidade) VALUES (3,0);
INSERT INTO dataset.tb_modulos (modulo, quantidade) VALUES (4,0);
INSERT INTO dataset.tb_modulos (modulo, quantidade) VALUES (5,0);
INSERT INTO dataset.tb_modulos (modulo, quantidade) VALUES (6,0);
INSERT INTO dataset.tb_modulos (modulo, quantidade) VALUES (7,0);
INSERT INTO dataset.tb_modulos (modulo, quantidade) VALUES (8,0);
INSERT INTO dataset.tb_modulos (modulo, quantidade) VALUES (9,0);
INSERT INTO dataset.tb_modulos (modulo, quantidade) VALUES (10,0);
INSERT INTO dataset.tb_modulos (modulo, quantidade) VALUES (11,0);
INSERT INTO dataset.tb_modulos (modulo, quantidade) VALUES (12,0);


  
CREATE TABLE dataset.tb_usuario(
    nome            VARCHAR(45) NOT NULL,
    sobrenome       VARCHAR(45) NOT NULL,
    user_id         SERIAL,
    cpf             VARCHAR(14) NOT NULL,
    senha           VARCHAR(32) NOT NULL,
    email           VARCHAR(45) UNIQUE,
    dt_nascimento   DATE NOT NULL,
    sexo            VARCHAR(11) NOT NULL,
    nacionalidade   VARCHAR(15) NOT NULL,
    cidade          VARCHAR(45) NOT NULL,
    estado          VARCHAR(20) NOT NULL,
    mod1      BOOLEAN	NOT NULL,
    mod2      BOOLEAN	NOT NULL,
    mod3      BOOLEAN	NOT NULL,
    mod4      BOOLEAN	NOT NULL,
    mod5      BOOLEAN	NOT NULL,
    mod6      BOOLEAN	NOT NULL,
    mod7      BOOLEAN	NOT NULL,
    mod8      BOOLEAN	NOT NULL,
    mod9      BOOLEAN	NOT NULL,
    mod10      BOOLEAN	NOT NULL,
    mod11      BOOLEAN	NOT NULL,
    mod12      BOOLEAN	NOT NULL,
    modAtual	INTEGER	NOT NULL,
    videoAtual	INTEGER NOT NULL,

    

    CONSTRAINT pk_cpf PRIMARY KEY(cpf)
);
create table dataset.tb_videos(
 cpf VARCHAR(14),
 caminho VARCHAR(40),
 CONSTRAINT fk_pk_cpf FOREIGN KEY(cpf)
 REFERENCES dataset.tb_usuario(cpf)
);