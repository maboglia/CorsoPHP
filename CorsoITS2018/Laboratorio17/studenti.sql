CREATE TABLE `studenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL COMMENT '	',
  `cognome` varchar(45) DEFAULT NULL,
  `data` date DEFAULT NULL COMMENT '		',
  `email` varchar(45) DEFAULT NULL,
  `skill` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `hobbies` varchar(45) DEFAULT NULL,
  `matricola` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
