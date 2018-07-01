create table squadre (
id int not null primary key auto_increment,	
nome varchar(255) not null
);

create table studenti (
id int not null primary key auto_increment,	
nome varchar(255) not null,
password varchar(255) not null
);

create table voti (
id int not null primary key auto_increment,	
posizione int not null,
id_squadre int not null,
id_studente int not null,
foreign key (id_squadre) references squadre(id),
foreign key (id_studente) references studenti(id)
);

INSERT INTO `squadre` (`id`, `nome`) VALUES
(1, 'Uruguay'),
(2, 'Spagna '),
(3, 'Portogallo '),
(4, 'Russia'),
(5, 'Francia '),
(6, 'Croazia '),
(7, 'Argentina '),
(8, 'Danimarca '),
(9, 'Brasile ');


INSERT INTO `studenti` (`id`, `nome`, `password`) 
	VALUES (1, 'Andrea', 'Andreapw'), 
	       (2, 'Mirko', 'Mirkopw'), 
               (3, 'Ale', 'Alepw'), 
	       (4, 'Simo', 'Simopw'), 
	       (5, 'Brusco', 'Bruscopw')