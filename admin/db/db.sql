--
-- Juguetes GarcíaMora
-- Script de creación de Base de Datos
--
-- --------------------------------------------------------

-- Líneas
CREATE TABLE line (
  id varchar(10) NOT NULL primary key,
  name text NOT NULL
) ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Datos iniciales
INSERT INTO line (id, name) VALUES
('figure', 'Figura'),
('glove', 'Títere'),
('finger', 'Títere de dedo'),
('rattle', 'Sonaja'),
('mask', 'Máscara');

-- --------------------------------------------------------

-- Productos
CREATE TABLE product (
  id int NOT NULL auto_increment primary key,
  line_id varchar(10) NOT NULL,
  name text NOT NULL,
  price float NOT NULL DEFAULT '0',
  stock int NOT NULL DEFAULT '1',
  image_url text NOT NULL,
  
  foreign key(line_id) REFERENCES line(id)
    ON DELETE NO ACTION ON UPDATE cascade
) ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Datos iniciales???????
INSERT INTO product (id, line_id, name, price, stock, image_url) VALUES
(1, 'glove', 'Rinoceronte', 390, 3, 'https://www.facebook.com/garciamoramx/photos/pb.210837345711993.-2207520000.1447185570./445370258925366/?type=3&theater'),
(2, 'finger', 'Elefantl', 360, 2, 'https://www.facebook.com/garciamoramx/photos/pb.210837345711993.-2207520000.1447202667./541312102664514/?type=3&theater'),
(3, 5, 'Parasaurolofino', 280, 1, 'https://www.facebook.com/garciamoramx/photos/pb.210837345711993.-2207520000.1447202667./553120531483671/?type=3&theater'),
(6, 3, 'tommy pickles', 500, 1, 'https://upload.wikimedia.org/wikipedia/en/e/e4/Tommy_Pickles.png'),
(7, 3, 'carlitos barbosa', 500, 1, 'quien sabe :o'),
(9, 1, 'Tiburón martillo', 480, 1, 'http://duckduckgo.com'),
(10, 1, 'Hidra', 580, 1, 'hidra.com'),
(11, 4, 'Rinoceronte bebé', 180, 1, '-'),
(12, 0, 'tiburcio', 2, 1, '-'),
(13, 5, 'Triceratops', 350, 1, '-'),
(14, 5, 'conejo', 190, 3, 'conejito'),
(22, 2, 'Jirafina', 920, 1, 'a.co');
