CREATE DATABASE login;
USE login;

CREATE TABLE  `login`.`usuario` (
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `cpf` VARCHAR(20) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  `numero` INT(5) NOT NULL,
  `complemento` VARCHAR(15) DEFAULT NULL,
  `rua` VARCHAR(100) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `usuario` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `data_cadastro` DATETIME NOT NULL,
  PRIMARY KEY (`usuario_id`)
);

INSERT INTO `usuario` (`usuario_id`, `nome`, `email`, `cpf`, `cep`, `numero`, `complemento`, `rua`, `telefone`, `usuario`, `senha`, `data_cadastro`) 
VALUES (1, 'Canal TI', 'canalti@example.com', '123.456.789-01', '12345678', 12345, 'Complemento', 'Rua Principal', '12345678901', 'canalti', '10f722b5984a49bce67d434464fae37e', '2019-01-11 19:42:12');

