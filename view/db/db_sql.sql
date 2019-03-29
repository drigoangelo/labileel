

CREATE TABLE IF NOT EXISTS dataset.tb_modulo  (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome   varchar(30),
    descricao varchar(250)
);

  
CREATE TABLE IF NOT EXISTS dataset.tb_usuario(
    id              INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome            VARCHAR(120) NOT NULL,
    -- sobrenome       VARCHAR(45) NOT NULL,
    -- user_id         SERIAL,
    cpf             VARCHAR(14) NOT NULL,
    senha           VARCHAR(60) NOT NULL,
    email           VARCHAR(45) UNIQUE,
    dt_nascimento   DATE NOT NULL,
    sexo            VARCHAR(11) NOT NULL,
    nacionalidade   VARCHAR(15) NOT NULL,
    cidade          VARCHAR(45) NOT NULL,
    estado          VARCHAR(20) NOT NULL   
);
create table IF NOT EXISTS dataset.tb_video(
    id              INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_modulo       INT,
    nome            VARCHAR(30),
    descricao       VARCHAR(250),
    caminho_video   VARCHAR(250),
    caminho_legenda VARCHAR(250),
    
    CONSTRAINT fk_video_modulo FOREIGN KEY(id_modulo)
        REFERENCES dataset.tb_modulo(id)
);

create table IF NOT EXISTS dataset.tb_envio(
    id              INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_usuario      INT,
    id_video        INT,
    caminho_envio   VARCHAR(250),
    
    CONSTRAINT fk_envio_video FOREIGN KEY(id_video)
        REFERENCES dataset.tb_modulo(id),
    
    CONSTRAINT fk_envio_usuario FOREIGN KEY(id_usuario)
        REFERENCES dataset.tb_usuario(id)
);

DELIMITER $$
DROP procedure IF EXISTS `insert_modulos`$$
CREATE PROCEDURE `insert_modulos` ()
BEGIN
    DECLARE a INT;
    set a= 1;
    simple_loop: LOOP         
        INSERT INTO dataset.tb_modulo (nome) VALUES (concat('módulo ', a));
        SET a=a+1;
        IF a > 12 THEN
            LEAVE simple_loop;
        END IF;
    end loop;
END;$$
call insert_modulos()$$
drop procedure insert_modulos$$

DROP procedure IF EXISTS `insert_videos`$$
CREATE PROCEDURE `insert_videos` ()
BEGIN
    DECLARE m INT;
    DECLARE v INT;
    set m = 0;
    
    loop_modulos: LOOP
        SET m = m + 1;
        IF m > 12 THEN
            LEAVE loop_modulos;
        END IF;
        
        set v = 0;
        loop_videos: LOOP
        SET v = v + 1;
            IF v > 118 THEN
                LEAVE loop_videos;
            END IF;
            INSERT INTO dataset.tb_video (
                id_modulo, 
                nome, 
                caminho_video, 
                caminho_legenda) 
            VALUES (m, 
                    concat('vídeo ', v, 'do módulo', m), 
                    concat('../../grupos/grupo', m, '/', v, '.mp4'), 
                    concat('../legendas/grupo', m, '/', v, '.vtt'));
        END LOOP;
    end loop;
END;$$
call insert_videos()$$
drop procedure insert_videos$$
DELIMITER ;


