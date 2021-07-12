--CREACION DE LA BASE DE DATOS
CREATE DATABASE books_emer;
--CREACION DE LA TABLA USUARIOS
CREATE TABLE usuarios(
id INTEGER(255) PRIMARY KEY AUTO_INCREMENT,
nombre CHAR(100) NOT NULL,
apellidos CHAR(100) NOT NULL,
correo CHAR(255) NOT NULL UNIQUE,
password CHAR(255) NOT NULL,
fecha DATE NOT NULL,
rol CHAR(50) NOT NULL    
)ENGINE=INNODB;
--CREACION DE LA TABLA CATEGORIA
CREATE TABLE categoria(
id INTEGER(255) PRIMARY KEY AUTO_INCREMENT,
nombre CHAR(255) NOT NULL,
descripcion CHAR(255) NOT NULL   
)ENGINE=INNODB;
--CREACION DE LA TABLA LIBROS
CREATE TABLE libros(
id INTEGER(255) PRIMARY KEY AUTO_INCREMENT,
usuario_id INTEGER(255) REFERENCES usuarios(id),
categoria_id INTEGER(255) REFERENCES categoria(id),
nombre CHAR(255) NOT NULL,
autor CHAR(255) NOT NULL,
editorial CHAR(255) NOT NULL,
year_edicion CHAR(30) NOT NULL,
paginas NUMERIC(12) NOT NULL,
imagen CHAR(255) NOT NULL
)ENGINE=INNODB;
--INSERTAMOS EL USUARIO ADMINISTRADOR
INSERT INTO usuarios VALUES(NULL,'Juan','Perez','admin@admin.com','admin',CURDATE(),'admin');
--INSERTAMOS REGISTROS EN CATEGORIAS
INSERT INTO categoria VALUES(NULL,'Aventuras','La novela de aventuras es un género narrativo literario que narra los viajes, el misterio y el riesgo. Una característica recurrente es la acción presente hasta dominar los escenarios, básica para el desarrollo de la trama. En los argumentos de este tipo de novelas resaltan características como el riesgo, la sorpresa y el misterio.');
INSERT INTO categoria VALUES(NULL,'Paranormal','El paranormal es un subgénero reciente de la ficción especulativa, esto es, obras en las que priman la fantasía, la ciencia-ficción y el terror. Como su nombre indica, las historias de este tipo combinan el romance con elementos y personajes paranormales en una realidad alternativa o en un mundo fantástico.');
INSERT INTO categoria VALUES(NULL,'Accion','Los libros de acción son aquellos en los que el argumento resalta por el riesgo, la sorpresa y el misterio. Los escenarios están llenos de acción, elemento básico para desarrollar la trama. La aventura es, por tanto un evento inesperado, extraño, algo que entraña cierto riesgo.');
INSERT INTO categoria VALUES(NULL,'Drama','El drama es un género clásico por excelencia, capaz de mantenernos aferrados a las páginas de un libro como si se nos fuera la vida en ello. Una historia dramática bien narrada nos conecta con sentimientos primarios como el amor, el odio, la tristeza y la empatía por las experiencias ajenas, y nos lleva por un viaje emociones que vale la pena transitar.');
INSERT INTO categoria VALUES(NULL,'Suspenso','Los libros de suspenso están estrechamente relacionados con un misterio, lo que puede dificultar su clasificación. A menudo, los tres géneros son agrupados por los editores y clasificados como Misterio / Suspenso / Thriller, pero otras veces se mantienen separados.');
--INSERTAMOS REGISTROS EN LIBROS
INSERT INTO libros VALUES(NULL,1,1,'La isla del tesoro','Robert Louis','Wikis','2010',250,'book-image.jpg');
INSERT INTO libros VALUES(NULL,1,2,'Pasaje al miesterio','Frank Remedo','Venecia','2015',520,'book-image.jpg');
INSERT INTO libros VALUES(NULL,2,3,'Linea de fuego','Arturo Perez','Wikis','2019',715,'book-image.jpg');
INSERT INTO libros VALUES(NULL,3,4,'El silencio','Andrea longarela','Sensitive','2008',250,'book-image.jpg');
INSERT INTO libros VALUES(NULL,3,4,'El psicoanalista','John Katzenbach','Primavera','2003',450,'book-image.jpg');
INSERT INTO libros VALUES(NULL,1,5,'El instinto','Stephen king','Estela','2020',680,'book-image.jpg');
1 Aventuras | 2 Paranormal | 3 Accion | 4 Drama | 5 Suspenso

SELECT * FROM libros l JOIN categoria c
ON(l.categoria_id=c.id) JOIN usuarios u
ON(l.usuario_id=u.id)