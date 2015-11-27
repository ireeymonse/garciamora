-- Juguetes GarcíaMora

create table line (
  id varchar(10) not null primary key,
  name text not null
) engine=InnoDB charset=utf8 collate=utf8_spanish_ci;

insert into line (id, name) values
('figure', 'Figura'),
('glove', 'Títere'),
('finger', 'Títere de dedo'),
('rattle', 'Sonaja'),
('mask', 'Máscara');

create table product (
  id int not null auto_increment primary key,
  line_id varchar(10) not null,
  name text not null,
  price float not null default '0',
  stock int not null default '1',
  image_url text not null,
  
  foreign key(line_id) references line(id)
    on delete no action on update cascade
) engine=InnoDB charset=utf8 collate=utf8_spanish_ci;

insert into product (id, line_id, name, price, stock, image_url) values
(1, 'glove', 'Rinoceronte', 480, 1, 'http://localhost/garciamora/media/products/rino.jpg'),
(2, 'glove', 'Dragón verde', 520, 1, 'https://scontent-dfw1-1.xx.fbcdn.net/hphotos-xta1/v/t1.0-9/10393837_498254730303585_424652622974897535_n.jpg?oh=78b0ecc397f05e02bb9c69472e741fca&oe=56B3B7C6'),
(3, 'rattle', 'Caballito de mar', 300, 1, 'http://localhost/garciamora/media/products/hipocampo.jpg'),
(4, 'glove', 'Hidra', 680, 1, 'http://localhost/garciamora/media/products/hidra.jpg'),
(5, 'glove', 'Dragón rosa', 520, 1, 'http://localhost/garciamora/media/products/dragonRosa.jpg'),
(6, 'glove', 'Braquiosaurio', 380, 1, 'http://localhost/garciamora/media/products/braquio.jpg');
