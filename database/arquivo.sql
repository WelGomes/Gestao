CREATE DATABASE Gestao;

USE GESTAO;

CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(255) NOT NULL,
  `type_user` enum('user', 'admin', 'gestor') DEFAULT 'user',
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci

CREATE TABLE `login_log` (
  `id_login_log` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `data_login` datetime DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `sucess` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_login_log`),
  KEY `fk_id_user` (`id_user`),
  CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci