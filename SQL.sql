
CREATE DATABASE gyarari;
use gyarari;

CREATE TABLE usuarios(
    id INT PRIMARY KEY,
    usuario VARCHAR(50),
    pass VARCHAR(200),
    nombre VARCHAR(30),
    avatar VARCHAR(200),
    banner VARCHAR(200),
    presentacion VARCHAR(300)
);

CREATE TABLE imagenes(
	idImg INT AUTO_INCREMENT PRIMARY KEY,
    idUser INT NOT NULL,
    nameUser VARCHAR(100),
    avatarUser VARCHAR(200),
    bannerUser VARCHAR(200),
    img VARCHAR(200),
    nameImg VARCHAR(100),
    txtImg TEXT,
    fechaImg TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE imagenes ADD CONSTRAINT fk_UsuIma FOREIGN KEY (idUser) REFERENCES usuarios (id) ON DELETE CASCADE ON UPDATE CASCADE;








