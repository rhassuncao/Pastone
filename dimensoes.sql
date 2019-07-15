/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `pastone` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pastone`;

CREATE TABLE IF NOT EXISTS `bairro` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome_bairro` varchar(50) NOT NULL DEFAULT '0',
  `taxa_entrega` decimal(8,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `bairro` DISABLE KEYS */;
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(1, 'Alemoa', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(2, 'Aparecida', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(3, 'Areia Branca', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(4, 'Belvedere Mar Pequeno', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(5, 'Bom Retiro', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(6, 'Boqueirão', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(7, 'Campo Grande', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(8, 'Caneleira', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(9, 'Castelo', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(10, 'Catiapoa', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(11, 'Centro', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(12, 'Centro', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(13, 'Chico de Paula', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(14, 'Cidade Náutica', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(15, 'Conjunto Residencial Humaitá', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(16, 'Conjunto Residencial Tancredo Neves', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(17, 'Docas', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(18, 'Embaré', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(19, 'Encruzilhada', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(20, 'Esplanada dos Barreiros', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(21, 'Estuário', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(22, 'Gonzaga', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(23, 'Ilha Diana', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(24, 'Ilha Porchat', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(25, 'Itararé', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(26, 'Jabaquara', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(27, 'Japui', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(28, 'Jardim Bechara', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(29, 'Jardim Guassu', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(30, 'Jardim Independência', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(31, 'Jardim Irmã Dolores', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(32, 'Jardim Nosso Lar', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(33, 'Jardim Paraíso', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(34, 'Jardim Recanto São Vicente', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(35, 'Jardim Rio Branco', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(36, 'Jardim Rio Negro', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(37, 'José Menino', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(38, 'Macuco', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(39, 'Marapé', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(40, 'Monte Cabrao', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(41, 'Morro Nova Cintra', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(42, 'Morro Pacheco', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(43, 'Morro Santa Maria', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(44, 'Morro Santa Terezinha', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(45, 'Morro da Penha', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(46, 'Morro de Nova Cintra', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(47, 'Morro de São Bento', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(48, 'Morro do Bufo', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(49, 'Morro do Monte Serrat', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(50, 'Morro do Pacheco', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(51, 'Morro do Saboó', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(52, 'Morro dos Barbosas', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(53, 'Paquetá', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(54, 'Parque Bandeiras', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(55, 'Parque Bitaru', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(56, 'Parque Continental', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(57, 'Parque Prainha', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(58, 'Parque São Vicente', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(59, 'Parque das Bandeiras', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(60, 'Piratininga', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(61, 'Planalto Bela Vista', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(62, 'Pompeia', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(63, 'Ponta da Praia', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(64, 'Rádio Club', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(65, 'Saboó', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(66, 'Samarita', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(67, 'Santa Maria', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(68, 'São Manoel', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(69, 'Vale do Quilombo', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(70, 'Valongo', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(71, 'Vila Belmiro', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(72, 'Vila Cascatinha', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(73, 'Vila Ema', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(74, 'Vila Iolanda', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(75, 'Vila Jockei Clube', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(76, 'Vila Margarida', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(77, 'Vila Mateo Bei', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(78, 'Vila Matias', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(79, 'Vila Matias', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(80, 'Vila Nossa Senhora de Fátima', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(81, 'Vila Nova', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(82, 'Vila Nova São Vicente', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(83, 'Vila Progresso', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(84, 'Vila São Bento', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(85, 'Vila São Jorge', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(86, 'Vila São Jorge', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(87, 'Vila Valença', 2.00);
INSERT INTO `bairro` (`id`, `nome_bairro`, `taxa_entrega`) VALUES
	(88, 'Vila Voturua', 2.00);
/*!40000 ALTER TABLE `bairro` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `categoria_funcionario` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `categoria_funcionario` DISABLE KEYS */;
INSERT INTO `categoria_funcionario` (`id`, `nome_categoria`) VALUES
	(1, 'Admin');
INSERT INTO `categoria_funcionario` (`id`, `nome_categoria`) VALUES
	(2, 'Entregador');
INSERT INTO `categoria_funcionario` (`id`, `nome_categoria`) VALUES
	(3, 'Atendente');
INSERT INTO `categoria_funcionario` (`id`, `nome_categoria`) VALUES
	(4, 'Cozinheiro');
/*!40000 ALTER TABLE `categoria_funcionario` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `categoria_produto` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `categoria_produto` DISABLE KEYS */;
INSERT INTO `categoria_produto` (`id`, `nome`, `descricao`, `ativo`) VALUES
	(1, 'Lanches', 'Lanches abertos e fechados', 1);
INSERT INTO `categoria_produto` (`id`, `nome`, `descricao`, `ativo`) VALUES
	(2, 'Porções', 'Porções grandes e meias', 1);
INSERT INTO `categoria_produto` (`id`, `nome`, `descricao`, `ativo`) VALUES
	(3, 'Refrigerante', 'Refrigerantes em geral ', 1);
INSERT INTO `categoria_produto` (`id`, `nome`, `descricao`, `ativo`) VALUES
	(4, 'Combos', 'Combos', 1);
INSERT INTO `categoria_produto` (`id`, `nome`, `descricao`, `ativo`) VALUES
	(5, 'Batata Recheada', 'Batata Recheada com acompanhamentos e molhos ', 1);
/*!40000 ALTER TABLE `categoria_produto` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '0',
  `telefone1` varchar(12) DEFAULT '0',
  `telefone2` varchar(12) DEFAULT '0',
  `telefone3` varchar(12) DEFAULT '0',
  `cep` varchar(8) DEFAULT '0',
  `endereco` varchar(30) NOT NULL DEFAULT '0',
  `numero` varchar(8) NOT NULL DEFAULT '0',
  `complemento` varchar(40) DEFAULT '0',
  `ponto_referencia` varchar(30) DEFAULT '0',
  `bairro` int(3) NOT NULL DEFAULT '0',
  `cidade` varchar(20) NOT NULL DEFAULT '0',
  `estado` int(2) NOT NULL DEFAULT '1',
  `ativo` tinyint(1) NOT NULL DEFAULT '0',
  `cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observacao` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_cliente_bairro` (`bairro`),
  KEY `FK_cliente_estado` (`estado`),
  CONSTRAINT `FK_cliente_bairro` FOREIGN KEY (`bairro`) REFERENCES `bairro` (`id`),
  CONSTRAINT `FK_cliente_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `nome`, `telefone1`, `telefone2`, `telefone3`, `cep`, `endereco`, `numero`, `complemento`, `ponto_referencia`, `bairro`, `cidade`, `estado`, `ativo`, `cadastro`, `observacao`) VALUES
	(1, 'Marcio', '33334444', '', '', '', 'Rua dos papagaios', '55', '', '', 2, 'Santos', 25, 1, '2018-08-10 21:55:31', '');
INSERT INTO `cliente` (`id`, `nome`, `telefone1`, `telefone2`, `telefone3`, `cep`, `endereco`, `numero`, `complemento`, `ponto_referencia`, `bairro`, `cidade`, `estado`, `ativo`, `cadastro`, `observacao`) VALUES
	(2, 'Vera N', '33335555', '', '', '', 'Av Ana cunha', '200', '', '', 22, 'Santos', 25, 1, '2018-08-10 21:59:12', '');
INSERT INTO `cliente` (`id`, `nome`, `telefone1`, `telefone2`, `telefone3`, `cep`, `endereco`, `numero`, `complemento`, `ponto_referencia`, `bairro`, `cidade`, `estado`, `ativo`, `cadastro`, `observacao`) VALUES
	(3, 'Lucas P', '999998888', '', '', '11111000', 'rua das palmas', '1', '14', 'Escola Gracioso', 85, 'Santos', 25, 1, '2018-09-14 17:30:27', 'Cliente exigente');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(50) NOT NULL DEFAULT 'Nome Cliente',
  `facebook` varchar(100) NOT NULL DEFAULT 'https://www.facebook.com/LinkSantosTecnologia/',
  `site` varchar(100) NOT NULL DEFAULT 'http://linksantos.com/',
  `vias_balcao` tinyint(2) NOT NULL DEFAULT '2',
  `vias_entrega` int(2) NOT NULL DEFAULT '2',
  `vias_mesa` int(2) NOT NULL DEFAULT '2',
  `vias_mesa_single` int(2) NOT NULL DEFAULT '2',
  `nove_linhas_depois` tinyint(1) NOT NULL DEFAULT '0',
  `numero_colunas` tinyint(4) NOT NULL DEFAULT '40',
  `aquisicao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expiracao` timestamp NOT NULL DEFAULT '2030-01-01 00:00:00',
  `endereco` varchar(30) NOT NULL DEFAULT 'Praça Mauá',
  `numero` varchar(8) NOT NULL DEFAULT '10',
  `bairro` varchar(30) NOT NULL DEFAULT 'Centro',
  `cidade` varchar(20) NOT NULL DEFAULT 'Santos',
  `estado` int(2) NOT NULL DEFAULT '17',
  PRIMARY KEY (`id`),
  KEY `FK_configs_estado` (`estado`),
  CONSTRAINT `FK_configs_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
INSERT INTO `configs` (`id`, `nome_cliente`, `facebook`, `site`, `vias_balcao`, `vias_entrega`, `vias_mesa`, `vias_mesa_single`, `nove_linhas_depois`, `numero_colunas`, `aquisicao`, `expiracao`, `endereco`, `numero`, `bairro`, `cidade`, `estado`) VALUES
	(2, 'Pebeu Lanches e Porções', 'https://www.facebook.com/PLebeu/', 'https://www.facebook.com/PLebeu/', 2, 2, 2, 2, 1, 40, '2018-02-03 18:11:38', '2018-09-15 20:30:00', 'Indalgo torres', '244', 'Santa Efigenia', 'Santos', 25);
/*!40000 ALTER TABLE `configs` ENABLE KEYS */;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_tables`()
BEGIN

-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.20-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT ;
 SET NAMES utf8 ;
 SET NAMES utf8mb4 ;
 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 ;
 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' ;

-- Copiando estrutura para tabela admin_pastone.bairro
CREATE TABLE IF NOT EXISTS `bairro` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome_bairro` varchar(50) NOT NULL DEFAULT '0',
  `taxa_entrega` decimal(8,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.categoria_funcionario
CREATE TABLE IF NOT EXISTS `categoria_funcionario` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.categoria_produto
DROP TABLE IF EXISTS `categoria_produto`;
CREATE TABLE IF NOT EXISTS `categoria_produto` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '0',
  `telefone1` varchar(12) DEFAULT '0',
  `telefone2` varchar(12) DEFAULT '0',
  `telefone3` varchar(12) DEFAULT '0',
  `cep` varchar(8) DEFAULT '0',
  `endereco` varchar(30) NOT NULL DEFAULT '0',
  `numero` varchar(8) NOT NULL DEFAULT '0',
  `complemento` varchar(40) DEFAULT '0',
  `ponto_referencia` varchar(30) DEFAULT '0',
  `bairro` int(3) NOT NULL DEFAULT '0',
  `cidade` varchar(20) NOT NULL DEFAULT '0',
  `estado` int(2) NOT NULL DEFAULT '1',
  `ativo` tinyint(1) NOT NULL DEFAULT '0',
  `cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observacao` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_cliente_bairro` (`bairro`),
  CONSTRAINT `FK_cliente_bairro` FOREIGN KEY (`bairro`) REFERENCES `bairro` (`id`),
  KEY `FK_cliente_estado` (`estado`),
  CONSTRAINT `FK_cliente_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.forma_pagamento
CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL DEFAULT '0',
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `categoria_funcionario` int(3) NOT NULL DEFAULT '0',
  `nome` varchar(50) NOT NULL DEFAULT '0',
  `telefone1` varchar(12) NOT NULL DEFAULT '0',
  `telefone2` varchar(12) NOT NULL DEFAULT '0',
  `telefone3` varchar(12) NOT NULL DEFAULT '0',
  `cep` varchar(8) NOT NULL DEFAULT '0',
  `endereco` varchar(30) NOT NULL DEFAULT '0',
  `numero` varchar(8) NOT NULL DEFAULT '0',
  `complemento` varchar(40) DEFAULT NULL,
  `ponto_referencia` varchar(50) DEFAULT NULL,
  `bairro` varchar(20) NOT NULL DEFAULT '0',
  `cidade` varchar(20) NOT NULL DEFAULT '0',
  `estado` int(2) NOT NULL DEFAULT '1',
  `rg` varchar(10) NOT NULL DEFAULT '0',
  `cpf` varchar(12) NOT NULL DEFAULT '0',
  `data_nascimento` date DEFAULT NULL,
  `CTPS` varchar(20) NOT NULL DEFAULT '0',
  `salario` decimal(8,2) NOT NULL DEFAULT '0.00',
  `vale_transporte` decimal(6,2) NOT NULL DEFAULT '0.00',
  `vale_refeicao` decimal(6,2) NOT NULL DEFAULT '0.00',
  `ativo` tinyint(1) NOT NULL DEFAULT '0',
  `cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__categoria_funcionario` (`categoria_funcionario`),
  CONSTRAINT `FK__categoria_funcionario` FOREIGN KEY (`categoria_funcionario`) REFERENCES `categoria_funcionario` (`id`),
  KEY `FK__estado` (`estado`),
  CONSTRAINT `FK__estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.item
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `produto_id` int(5) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__produto` (`produto_id`),
  KEY `FK_item_pedido` (`pedido_id`),
  CONSTRAINT `FK__produto` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`),
  CONSTRAINT `FK_item_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.mesa
CREATE TABLE IF NOT EXISTS `mesa` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) NOT NULL DEFAULT '0',
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recebido_por` int(3) NOT NULL DEFAULT '0',
  `forma_pagamento_id` int(3) DEFAULT NULL,
  `lancado` tinyint(1) NOT NULL DEFAULT '0',
  `tempo_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tempo_fim` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_pedido_funcionario` (`recebido_por`),
  KEY `FK_pedido_forma_pagamento` (`forma_pagamento_id`),
  CONSTRAINT `FK_pedido_forma_pagamento` FOREIGN KEY (`forma_pagamento_id`) REFERENCES `forma_pagamento` (`id`),
  CONSTRAINT `FK_pedido_funcionario` FOREIGN KEY (`recebido_por`) REFERENCES `funcionario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.pedido_balcao
CREATE TABLE IF NOT EXISTS `pedido_balcao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL DEFAULT '0',
  `nome_cliente` varchar(50) NOT NULL DEFAULT '0',
  `status_pedido_id` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK__pedido` (`pedido_id`),
  KEY `FK_pedido_balcao_status_pedido` (`status_pedido_id`),
  CONSTRAINT `FK__pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  CONSTRAINT `FK_pedido_balcao_status_pedido` FOREIGN KEY (`status_pedido_id`) REFERENCES `status_pedido` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.pedido_entrega
CREATE TABLE IF NOT EXISTS `pedido_entrega` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL DEFAULT '0',
  `cliente_id` int(6) NOT NULL DEFAULT '0',
  `entregador_id` int(3) NOT NULL DEFAULT '0',
  `troco` decimal(6,2) DEFAULT '0.00',
  `status_pedido_id` int(2) NOT NULL DEFAULT '1',
  `entregador_pago` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_pedido_entrega_cliente` (`cliente_id`),
  KEY `FK_pedido_entrega_funcionario` (`entregador_id`),
  KEY `FK_pedido_entrega_pedido` (`pedido_id`),
  KEY `FK_pedido_entrega_status_pedido` (`status_pedido_id`),
  CONSTRAINT `FK_pedido_entrega_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `FK_pedido_entrega_funcionario` FOREIGN KEY (`entregador_id`) REFERENCES `funcionario` (`id`),
  CONSTRAINT `FK_pedido_entrega_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  CONSTRAINT `FK_pedido_entrega_status_pedido` FOREIGN KEY (`status_pedido_id`) REFERENCES `status_pedido` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.pedido_mesa
CREATE TABLE IF NOT EXISTS `pedido_mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `mesa_id` int(2) NOT NULL,
  `status_pedido_id` int(2) NOT NULL DEFAULT '1',
  `aberto` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_pedido_mesa_mesa` (`mesa_id`),
  KEY `FK_pedido_mesa_status_pedido` (`status_pedido_id`),
  KEY `FK_pedido_mesa_pedido` (`pedido_id`),
  CONSTRAINT `FK_pedido_mesa_mesa` FOREIGN KEY (`mesa_id`) REFERENCES `mesa` (`id`),
  CONSTRAINT `FK_pedido_mesa_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  CONSTRAINT `FK_pedido_mesa_status_pedido` FOREIGN KEY (`status_pedido_id`) REFERENCES `status_pedido` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `categoria_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__categoria_produto` (`categoria_id`),
  CONSTRAINT `FK__categoria_produto` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela admin_pastone.status_pedido
CREATE TABLE IF NOT EXISTS `status_pedido` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') ;
 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) ;
 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT ;
 
 -- Copiando estrutura para tabela pastone.configs
CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(50) NOT NULL DEFAULT 'Nome Cliente',
  `facebook` varchar(100) NOT NULL DEFAULT 'https://www.facebook.com/LinkSantosTecnologia/',
  `site` varchar(100) NOT NULL DEFAULT 'http://linksantos.com/',
  `vias_balcao` tinyint(2) NOT NULL DEFAULT '2',
  `vias_entrega` int(2) NOT NULL DEFAULT '2',
  `vias_mesa` int(2) NOT NULL DEFAULT '2',
  `vias_mesa_single` int(2) NOT NULL DEFAULT '2',
  `nove_linhas_depois` tinyint(1) NOT NULL DEFAULT '0',
  `numero_colunas` tinyint(4) NOT NULL DEFAULT '40',
  `aquisicao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expiracao` timestamp NOT NULL DEFAULT '2030-01-01 00:00:00',
  `endereco` varchar(30) NOT NULL DEFAULT 'Praça Mauá',
  `numero` varchar(8) NOT NULL DEFAULT '10',
  `bairro` varchar(30) NOT NULL DEFAULT 'Centro',
  `cidade` varchar(20) NOT NULL DEFAULT 'Santos',
  `estado` int(2) NOT NULL DEFAULT '17',
  PRIMARY KEY (`id`),
  KEY `FK_configs_estado` (`estado`),
  CONSTRAINT `FK_configs_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `suporte` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL DEFAULT '0',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `funcionario_id` int(3) NOT NULL,
  `resposta` varchar(255) DEFAULT NULL,
  `status_id` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_suporte_funcionario` (`funcionario_id`),
  KEY `FK_suporte_status_pedido` (`status_id`),
  CONSTRAINT `FK_suporte_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`),
  CONSTRAINT `FK_suporte_status_pedido` FOREIGN KEY (`status_id`) REFERENCES `status_pedido` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `script` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `script01` varchar(255) DEFAULT '',
  `script02` varchar(255) DEFAULT '',
  `script03` varchar(255) DEFAULT '',
  `script04` varchar(255) DEFAULT '',
  `script05` varchar(255) DEFAULT '',
  `script06` varchar(255) DEFAULT '',
  `script07` varchar(255) DEFAULT '',
  `script08` varchar(255) DEFAULT '',
  `script09` varchar(255) DEFAULT '',
  `script10` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_pedidos_balcao`()
BEGIN

	SET foreign_key_checks = 0;
	
	-- deleta os itens de pedidos de entrega
	delete from item where item.pedido_id in (select pedido_id from pedido_balcao);
	
	-- deleta os pedidos que sao pedidos de entrega
	delete from pedido where pedido.id in (select pedido_id from pedido_balcao);
	
	-- reseta a tabela pedido_entrega
	truncate table pedido_balcao;
	
	SET foreign_key_checks = 1;

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_pedidos_entrega`()
BEGIN

	SET foreign_key_checks = 0;
	
	-- deleta os itens de pedidos de entrega
	delete from item where item.pedido_id in (select pedido_id from pedido_entrega);
	
	-- deleta os pedidos que sao pedidos de entrega
	delete from pedido where pedido.id in (select pedido_id from pedido_entrega);
	
	-- reseta a tabela pedido_entrega
	truncate table pedido_entrega;
	
	SET foreign_key_checks = 1;

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `drop_all_tables`()
BEGIN

SET FOREIGN_KEY_CHECKS = 0;
drop table bairro;
drop table categoria_funcionario;
drop table categoria_produto;
drop table cliente;
drop table estado;
drop table forma_pagamento;
drop table funcionario;
drop table item;
drop table mesa;
drop table pedido;
drop table pedido_balcao;
drop table pedido_entrega;
drop table pedido_mesa;
drop table produto;
drop table status_pedido;
drop table suporte;
drop table configs;
drop table script;
SET FOREIGN_KEY_CHECKS = 1;

END//
DELIMITER ;

CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id`, `nome`) VALUES
	(1, 'AC');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(2, 'AL');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(3, 'AP');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(4, 'AM');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(5, 'BA');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(6, 'CE');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(7, 'DF');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(8, 'ES');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(9, 'GO');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(10, 'MA');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(11, 'MT');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(12, 'MS');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(13, 'MG');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(14, 'PA');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(15, 'PB');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(16, 'PB');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(17, 'PE');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(18, 'PI');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(19, 'RJ');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(20, 'RN');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(21, 'RS');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(22, 'RO');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(23, 'RR');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(24, 'SC');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(25, 'SP');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(26, 'SE');
INSERT INTO `estado` (`id`, `nome`) VALUES
	(27, 'TO');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL DEFAULT '0',
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `forma_pagamento` DISABLE KEYS */;
INSERT INTO `forma_pagamento` (`id`, `nome`, `descricao`) VALUES
	(1, 'Dinheiro', 'Dinheiro');
INSERT INTO `forma_pagamento` (`id`, `nome`, `descricao`) VALUES
	(2, 'Cartão Crédito', 'Cartão de crédito');
INSERT INTO `forma_pagamento` (`id`, `nome`, `descricao`) VALUES
	(3, 'Cartão Débito', 'Cartão de débito');
/*!40000 ALTER TABLE `forma_pagamento` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `categoria_funcionario` int(3) NOT NULL DEFAULT '0',
  `nome` varchar(50) NOT NULL DEFAULT '0',
  `telefone1` varchar(12) NOT NULL DEFAULT '0',
  `telefone2` varchar(12) NOT NULL DEFAULT '0',
  `telefone3` varchar(12) NOT NULL DEFAULT '0',
  `cep` varchar(8) NOT NULL DEFAULT '0',
  `endereco` varchar(30) NOT NULL DEFAULT '0',
  `numero` varchar(8) NOT NULL DEFAULT '0',
  `complemento` varchar(40) DEFAULT NULL,
  `ponto_referencia` varchar(50) DEFAULT NULL,
  `bairro` varchar(20) NOT NULL DEFAULT '0',
  `cidade` varchar(20) NOT NULL DEFAULT '0',
  `estado` int(2) NOT NULL DEFAULT '1',
  `rg` varchar(10) NOT NULL DEFAULT '0',
  `cpf` varchar(12) NOT NULL DEFAULT '0',
  `data_nascimento` date DEFAULT NULL,
  `CTPS` varchar(20) NOT NULL DEFAULT '0',
  `salario` decimal(8,2) NOT NULL DEFAULT '0.00',
  `vale_transporte` decimal(6,2) NOT NULL DEFAULT '0.00',
  `vale_refeicao` decimal(6,2) NOT NULL DEFAULT '0.00',
  `ativo` tinyint(1) NOT NULL DEFAULT '0',
  `cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__categoria_funcionario` (`categoria_funcionario`),
  KEY `FK__estado` (`estado`),
  CONSTRAINT `FK__categoria_funcionario` FOREIGN KEY (`categoria_funcionario`) REFERENCES `categoria_funcionario` (`id`),
  CONSTRAINT `FK__estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`id`, `categoria_funcionario`, `nome`, `telefone1`, `telefone2`, `telefone3`, `cep`, `endereco`, `numero`, `complemento`, `ponto_referencia`, `bairro`, `cidade`, `estado`, `rg`, `cpf`, `data_nascimento`, `CTPS`, `salario`, `vale_transporte`, `vale_refeicao`, `ativo`, `cadastro`, `email`, `senha`) VALUES
	(1, 1, 'Admin', '0', '0', '0', '0', '0', '0', NULL, NULL, '0', '0', 1, '0', '0', NULL, '0', 0.00, 0.00, 0.00, 1, '2017-12-28 18:22:54', 'email@email.com', '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `funcionario` (`id`, `categoria_funcionario`, `nome`, `telefone1`, `telefone2`, `telefone3`, `cep`, `endereco`, `numero`, `complemento`, `ponto_referencia`, `bairro`, `cidade`, `estado`, `rg`, `cpf`, `data_nascimento`, `CTPS`, `salario`, `vale_transporte`, `vale_refeicao`, `ativo`, `cadastro`, `email`, `senha`) VALUES
	(2, 2, 'Carolina', '0', '0', '0', '0', '0', '0', '', '', '0', '0', 1, '0', '0', '2000-01-01', '0', 0.00, 0.00, 0.00, 1, '2017-12-28 18:22:54', 'email@email.com', '81dc9bdb52d04dc20036dbd8313ed055');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_bairros_santos_sv`()
BEGIN

	INSERT INTO `bairro` (`nome_bairro`, `taxa_entrega`) VALUES
		('Alemoa', 2.00),
		('Aparecida', 2.00),
		('Areia Branca', 2.00),
		('Belvedere Mar Pequeno', 2.00),
		('Bom Retiro', 2.00),
		('Boqueirão', 2.00),
		('Campo Grande', 2.00),
		('Caneleira', 2.00),
		('Castelo', 2.00),
		('Catiapoa', 2.00),
		('Centro', 2.00),
		('Centro', 2.00),
		('Chico de Paula', 2.00),
		('Cidade Náutica', 2.00),
		('Conjunto Residencial Humaitá', 2.00),
		('Conjunto Residencial Tancredo Neves', 2.00),
		('Docas', 2.00),
		('Embaré', 2.00),
		('Encruzilhada', 2.00),
		('Esplanada dos Barreiros', 2.00),
		('Estuário', 2.00),
		('Gonzaga', 2.00),
		('Ilha Diana', 2.00),
		('Ilha Porchat', 2.00),
		('Itararé', 2.00),
		('Jabaquara', 2.00),
		('Japui', 2.00),
		('Jardim Bechara', 2.00),
		('Jardim Guassu', 2.00),
		('Jardim Independência', 2.00),
		('Jardim Irmã Dolores', 2.00),
		('Jardim Nosso Lar', 2.00),
		('Jardim Paraíso', 2.00),
		('Jardim Recanto São Vicente', 2.00),
		('Jardim Rio Branco', 2.00),
		('Jardim Rio Negro', 2.00),
		('José Menino', 2.00),
		('Macuco', 2.00),
		('Marapé', 2.00),
		('Monte Cabrao', 2.00),
		('Morro Nova Cintra', 2.00),
		('Morro Pacheco', 2.00),
		('Morro Santa Maria', 2.00),
		('Morro Santa Terezinha', 2.00),
		('Morro da Penha', 2.00),
		('Morro de Nova Cintra', 2.00),
		('Morro de São Bento', 2.00),
		('Morro do Bufo', 2.00),
		('Morro do Monte Serrat', 2.00),
		('Morro do Pacheco', 2.00),
		('Morro do Saboó', 2.00),
		('Morro dos Barbosas', 2.00),
		('Paquetá', 2.00),
		('Parque Bandeiras', 2.00),
		('Parque Bitaru', 2.00),
		('Parque Continental', 2.00),
		('Parque Prainha', 2.00),
		('Parque São Vicente', 2.00),
		('Parque das Bandeiras', 2.00),
		('Piratininga', 2.00),
		('Planalto Bela Vista', 2.00),
		('Pompeia', 2.00),
		('Ponta da Praia', 2.00),
		('Rádio Club', 2.00),
		('Saboó', 2.00),
		('Samarita', 2.00),
		('Santa Maria', 2.00),
		('São Manoel', 2.00),
		('Vale do Quilombo', 2.00),
		('Valongo', 2.00),
		('Vila Belmiro', 2.00),
		('Vila Cascatinha', 2.00),
		('Vila Ema', 2.00),
		('Vila Iolanda', 2.00),
		('Vila Jockei Clube', 2.00),
		('Vila Margarida', 2.00),
		('Vila Mateo Bei', 2.00),
		('Vila Matias', 2.00),
		('Vila Matias', 2.00),
		('Vila Nossa Senhora de Fátima', 2.00),
		('Vila Nova', 2.00),
		('Vila Nova São Vicente', 2.00),
		('Vila Progresso', 2.00),
		('Vila São Bento', 2.00),
		('Vila São Jorge', 2.00),
		('Vila São Jorge', 2.00),
		('Vila Valença', 2.00),
		('Vila Voturua', 2.00);

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_categoria_funcionario`()
BEGIN

-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.20-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT ;
 SET NAMES utf8 ;
 SET NAMES utf8mb4 ;
 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 ;
 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' ;

-- Copiando dados para a tabela pastone.categoria_funcionario: ~4 rows (aproximadamente)
 ALTER TABLE `categoria_funcionario` DISABLE KEYS ;
INSERT INTO `categoria_funcionario` (`id`, `nome_categoria`) VALUES
	(1, 'Admin'),
	(2, 'Entregador'),
	(3, 'Atendente'),
	(4, 'Cozinheiro');
 ALTER TABLE `categoria_funcionario` ENABLE KEYS ;

 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') ;
 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) ;
 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT ;

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_categoria_produto_JB`()
BEGIN

	ALTER TABLE `categoria_produto` DISABLE KEYS ;
	INSERT INTO `categoria_produto` (`id`, `nome`, `descricao`, `ativo`) VALUES
		(1, 'Lanches', 'Lanches abertos e fechados', 1),
		(2, 'Porções', 'Porções grandes e meias', 1),
		(3, 'Refrigerante', 'Refrigerantes em geral ', 1),
		(4, 'Combos', 'Combos', 1),
		(5, 'Batata Recheada', 'Batata Recheada com acompanhamentos e molhos ', 1);
	 ALTER TABLE `categoria_produto` ENABLE KEYS ;

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_configs_default`()
BEGIN

	INSERT INTO `configs` (`nome_cliente`, `facebook`, `site`, `vias_balcao`, `vias_entrega`, `vias_mesa`, `vias_mesa_single`, `nove_linhas_depois`, `numero_colunas`, `aquisicao`, `expiracao`, `endereco`, `numero`, `bairro`, `cidade`, `estado`) VALUES
	('Nome Cliente', 'https://www.facebook.com/LinkSantosTecnologia/', 'http://linksantos.com/', 2, 2, 2, 2, 1, 40, '2018-02-03 18:11:38', '2018-08-23 20:30:00', 'Gracilho da Costa', '299', 'Santa Efigenia', 'Santos', 25);

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_configs_JB`()
BEGIN

INSERT INTO `configs` (`nome_cliente`, `facebook`, `site`, `vias_balcao`, `vias_entrega`, `vias_mesa`, `vias_mesa_single`, `nove_linhas_depois`, `numero_colunas`, `aquisicao`, `expiracao`, `endereco`, `numero`, `bairro`, `cidade`, `estado`) VALUES
	('PLebeu Lanches e Porções', 'https://www.facebook.com/PLebeu/', 'https://www.facebook.com/PLebeu/', 2, 2, 2, 2, 1, 40, '2018-02-03 18:11:38', '2018-11-23 20:30:00', 'Gracilho de palma', '244', 'Santa Efigenia', 'Santos', 25);

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_estados`()
BEGIN

-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.20-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT ;
 SET NAMES utf8 ;
 SET NAMES utf8mb4 ;
 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 ;
 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' ;

-- Copiando dados para a tabela pastone.estado: ~27 rows (aproximadamente)
 ALTER TABLE `estado` DISABLE KEYS ;
INSERT INTO `estado` (`id`, `nome`) VALUES
	(1, 'AC'),
	(2, 'AL'),
	(3, 'AP'),
	(4, 'AM'),
	(5, 'BA'),
	(6, 'CE'),
	(7, 'DF'),
	(8, 'ES'),
	(9, 'GO'),
	(10, 'MA'),
	(11, 'MT'),
	(12, 'MS'),
	(13, 'MG'),
	(14, 'PA'),
	(15, 'PB'),
	(16, 'PB'),
	(17, 'PE'),
	(18, 'PI'),
	(19, 'RJ'),
	(20, 'RN'),
	(21, 'RS'),
	(22, 'RO'),
	(23, 'RR'),
	(24, 'SC'),
	(25, 'SP'),
	(26, 'SE'),
	(27, 'TO');
 ALTER TABLE `estado` ENABLE KEYS ;

 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') ;
 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) ;
 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT ;


END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_forma_pagamento`()
BEGIN

-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.20-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT ;
 SET NAMES utf8 ;
 SET NAMES utf8mb4 ;
 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 ;
 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' ;

-- Copiando dados para a tabela pastone.forma_pagamento: ~3 rows (aproximadamente)
 ALTER TABLE `forma_pagamento` DISABLE KEYS ;
INSERT INTO `forma_pagamento` (`id`, `nome`, `descricao`) VALUES
	(1, 'Dinheiro', 'Dinheiro'),
	(2, 'Cartão Crédito', 'Cartão de crédito'),
	(3, 'Cartão Débito', 'Cartão de débito');
 ALTER TABLE `forma_pagamento` ENABLE KEYS ;

 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') ;
 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) ;
 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT ;

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_produtos_jb`()
BEGIN

	ALTER TABLE `produto` DISABLE KEYS ;
	INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
		(1, 'Burguer Duplo', 9.00, 'Pão, queijo, 2 hambúrgueres, milho, ervilha, batata palha e fritas', 1, 1),
		(2, 'Egg', 8.50, 'Pão, queijo,hambúrguer, ovo, molho, ervilha, batata palha e fritas', 1, 1),
		(3, 'Salada', 8.50, 'Pão, queijo, 2 hambúrgueres, alface, milho, ervilha, batata palha e fritas', 1, 1),
		(4, 'Calabresa', 11.00, 'Pão, queijo, hambúrguer, calabresa, milho, ervilha, batata palha e fritas', 1, 1),
		(5, 'Frango', 11.00, 'Pão, queijo, hambúrguer, frango, milho, ervilha, batata palha e fritas', 1, 1),
		(6, 'Cala Frango', 12.00, 'Pão, queijo, hambúrguer, frango, calabresa, milho, ervilha, batata palha e fritas', 1, 1),
		(7, 'Bacon', 11.00, 'Pão, queijo, hambúrguer, bacon, milho, ervilha, batata palha e fritas', 1, 1),
		(8, 'Cala Egg', 11.00, 'Pão, queijo, hambúrguer, calabresa, ovo,  milho, ervilha, batata palha e fritas', 1, 1),
		(9, 'Tudo Monstro', 18.00, 'Pão, queijo ,2 hambúrgueres, 2 salsichas, bacon, frango, calabresa, ovo,  milho, ervilha, batata palha e fritas', 1, 1),
		(10, 'Mensalão', 20.00, 'Pão, queijo ,2 hambúrgueres, 2 salsichas, bacon, frango, calabresa, ovo, cheddar, catupiry , milho, ervilha, batata palha e fritas', 1, 1),
		(11, 'Quero ver se tu aguenta', 25.00, 'Pão, queijo ,3 hambúrgueres, 3 salsichas, bacon, frango, calabresa, 2 ovos,cheddar, caturipy,  milho, ervilha, batata palha, barbecue,  molho de alho e fritas recheada', 1, 1),
		(12, 'Lava Jato', 39.99, 'Pão, queijo ,4 hambúrgueres, 4 salsichas, bacon, frango, calabresa, 3 ovos,  milho, ervilha, batata palha, cheddar, catupiry, barbecue, molho de alho e fritas recheadas.', 1, 1),
		(13, 'Batata Recheada Mega', 25.00, 'Batata frita, 3 acompanhamentos (bacon, calabresa, frango) molho de alho, catychup, mostarda, cheddar.', 1, 5),
		(14, 'Batata Recheada Grande ', 10.00, 'Batata frita, 2 acompanhamentos ( bacon, frango ou calabresa), molho de alho, mostarda, catychup, cheddar.', 1, 5),
		(15, 'Batata Recheada Pequena', 5.00, 'Batata frita, 1 acompanhamento ( bacon, frango ou calabresa), molho de alho, cheddar, mostarda, catychup.', 1, 5),
		(16, 'Burguer Kids', 5.00, 'Não acompanha fritas, sem milho e ervilha.\r\nPão, hambúrguer, queijo e batata palha.', 1, 1),
		(17, 'Isca de frango Inteira', 30, 'Frango frito, fritas e molho\r\nserve 4 pessoas.', 1, 2),
		(18, 'Isca de frango Meia', 15, 'frango frito, fritas e molho\r\nserve 2 pessoas.', 1, 2),
		(19, 'Isca de Peixe Inteira', 40, 'Isca de peixe frito, fritas e molho\r\nserve 4 pessoas.', 1, 2),
		(20, 'Isca de Peixe Meia', 25, 'Isca de peixe frito, fritas e molho\r\nserve 2 pessoas.', 1, 2);
	 ALTER TABLE `produto` ENABLE KEYS ;

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_script_default`()
BEGIN

INSERT INTO `script` (`script01`, `script02`, `script03`, `script04`, `script05`, `script06`, `script07`, `script08`, `script09`, `script10`) VALUES
	('', '', '', '', '', '', '', '', '', '');

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_script_JB`()
BEGIN

INSERT INTO `script` (`script01`, `script02`, `script03`, `script04`, `script05`, `script06`, `script07`, `script08`, `script09`, `script10`) VALUES
	('', '', '', '', '', '', '', '', '', '');

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_status_pedido`()
BEGIN

-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.20-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT ;
 SET NAMES utf8 ;
 SET NAMES utf8mb4 ;
 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 ;
 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' ;

-- Copiando dados para a tabela pastone.status_pedido: ~2 rows (aproximadamente)
 ALTER TABLE `status_pedido` DISABLE KEYS ;
INSERT INTO `status_pedido` (`id`, `nome`) VALUES
	(1, 'pendente'),
	(2, 'entregue'),
	(3, 'cancelado');
 ALTER TABLE `status_pedido` ENABLE KEYS ;

 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') ;
 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) ;
 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT ;

END//
DELIMITER ;

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `produto_id` int(5) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__produto` (`produto_id`),
  KEY `FK_item_pedido` (`pedido_id`),
  CONSTRAINT `FK__produto` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`),
  CONSTRAINT `FK_item_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(1, 17, 1, 'Completo');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(2, 19, 1, 'Completo');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(3, 18, 2, 'Completo');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(4, 20, 3, 'Completo');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(5, 17, 4, 'Completo');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(6, 19, 5, 'Completo');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(7, 17, 6, 'Completo');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(8, 18, 7, 'Completo');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(9, 19, 8, 'Completo');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(10, 17, 9, 'Completo');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(11, 12, 10, 'Completo');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(12, 19, 11, 'sem picles');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(13, 18, 11, 'Completo');
INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `observacao`) VALUES
	(14, 17, 11, 'Completo');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `mesa` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) NOT NULL DEFAULT '0',
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
INSERT INTO `mesa` (`id`, `nome`, `descricao`, `ativo`) VALUES
	(1, 'mesa 01', 'desc mesa 01', 1);
INSERT INTO `mesa` (`id`, `nome`, `descricao`, `ativo`) VALUES
	(2, 'mesa 02', 'desc mesa 02', 1);
INSERT INTO `mesa` (`id`, `nome`, `descricao`, `ativo`) VALUES
	(3, 'mesa 03', 'desc mesa 03', 0);
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recebido_por` int(3) NOT NULL DEFAULT '0',
  `forma_pagamento_id` int(3) DEFAULT NULL,
  `lancado` tinyint(1) NOT NULL DEFAULT '0',
  `tempo_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tempo_fim` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_pedido_funcionario` (`recebido_por`),
  KEY `FK_pedido_forma_pagamento` (`forma_pagamento_id`),
  CONSTRAINT `FK_pedido_forma_pagamento` FOREIGN KEY (`forma_pagamento_id`) REFERENCES `forma_pagamento` (`id`),
  CONSTRAINT `FK_pedido_funcionario` FOREIGN KEY (`recebido_por`) REFERENCES `funcionario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`id`, `recebido_por`, `forma_pagamento_id`, `lancado`, `tempo_inicio`, `tempo_fim`) VALUES
	(1, 1, NULL, 0, '2018-07-08 16:53:16', '2018-07-08 16:53:21');
INSERT INTO `pedido` (`id`, `recebido_por`, `forma_pagamento_id`, `lancado`, `tempo_inicio`, `tempo_fim`) VALUES
	(2, 1, 3, 0, '2018-07-08 16:53:35', '0000-00-00 00:00:00');
INSERT INTO `pedido` (`id`, `recebido_por`, `forma_pagamento_id`, `lancado`, `tempo_inicio`, `tempo_fim`) VALUES
	(3, 1, 3, 0, '2018-07-08 16:53:56', '0000-00-00 00:00:00');
INSERT INTO `pedido` (`id`, `recebido_por`, `forma_pagamento_id`, `lancado`, `tempo_inicio`, `tempo_fim`) VALUES
	(4, 1, 3, 0, '2018-07-08 16:54:15', '0000-00-00 00:00:00');
INSERT INTO `pedido` (`id`, `recebido_por`, `forma_pagamento_id`, `lancado`, `tempo_inicio`, `tempo_fim`) VALUES
	(5, 1, 3, 0, '2018-07-08 16:54:33', '0000-00-00 00:00:00');
INSERT INTO `pedido` (`id`, `recebido_por`, `forma_pagamento_id`, `lancado`, `tempo_inicio`, `tempo_fim`) VALUES
	(6, 1, 1, 0, '2018-07-08 17:12:21', '0000-00-00 00:00:00');
INSERT INTO `pedido` (`id`, `recebido_por`, `forma_pagamento_id`, `lancado`, `tempo_inicio`, `tempo_fim`) VALUES
	(7, 1, NULL, 0, '2018-07-10 21:50:09', '2018-09-14 18:04:59');
INSERT INTO `pedido` (`id`, `recebido_por`, `forma_pagamento_id`, `lancado`, `tempo_inicio`, `tempo_fim`) VALUES
	(8, 1, NULL, 0, '2018-07-10 21:51:20', '0000-00-00 00:00:00');
INSERT INTO `pedido` (`id`, `recebido_por`, `forma_pagamento_id`, `lancado`, `tempo_inicio`, `tempo_fim`) VALUES
	(9, 1, 1, 0, '2018-08-10 21:56:11', '0000-00-00 00:00:00');
INSERT INTO `pedido` (`id`, `recebido_por`, `forma_pagamento_id`, `lancado`, `tempo_inicio`, `tempo_fim`) VALUES
	(10, 1, 1, 0, '2018-08-10 21:59:25', '0000-00-00 00:00:00');
INSERT INTO `pedido` (`id`, `recebido_por`, `forma_pagamento_id`, `lancado`, `tempo_inicio`, `tempo_fim`) VALUES
	(11, 1, 1, 0, '2018-09-14 17:33:27', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pedido_balcao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL DEFAULT '0',
  `nome_cliente` varchar(50) NOT NULL DEFAULT '0',
  `status_pedido_id` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK__pedido` (`pedido_id`),
  KEY `FK_pedido_balcao_status_pedido` (`status_pedido_id`),
  CONSTRAINT `FK__pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  CONSTRAINT `FK_pedido_balcao_status_pedido` FOREIGN KEY (`status_pedido_id`) REFERENCES `status_pedido` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `pedido_balcao` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido_balcao` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pedido_entrega` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL DEFAULT '0',
  `cliente_id` int(6) NOT NULL DEFAULT '0',
  `entregador_id` int(3) NOT NULL DEFAULT '0',
  `troco` decimal(6,2) DEFAULT '0.00',
  `status_pedido_id` int(2) NOT NULL DEFAULT '1',
  `entregador_pago` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_pedido_entrega_cliente` (`cliente_id`),
  KEY `FK_pedido_entrega_funcionario` (`entregador_id`),
  KEY `FK_pedido_entrega_pedido` (`pedido_id`),
  KEY `FK_pedido_entrega_status_pedido` (`status_pedido_id`),
  CONSTRAINT `FK_pedido_entrega_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `FK_pedido_entrega_funcionario` FOREIGN KEY (`entregador_id`) REFERENCES `funcionario` (`id`),
  CONSTRAINT `FK_pedido_entrega_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  CONSTRAINT `FK_pedido_entrega_status_pedido` FOREIGN KEY (`status_pedido_id`) REFERENCES `status_pedido` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `pedido_entrega` DISABLE KEYS */;
INSERT INTO `pedido_entrega` (`id`, `pedido_id`, `cliente_id`, `entregador_id`, `troco`, `status_pedido_id`, `entregador_pago`) VALUES
	(1, 9, 1, 2, 18.00, 1, 0);
INSERT INTO `pedido_entrega` (`id`, `pedido_id`, `cliente_id`, `entregador_id`, `troco`, `status_pedido_id`, `entregador_pago`) VALUES
	(2, 10, 2, 2, 8.01, 1, 0);
INSERT INTO `pedido_entrega` (`id`, `pedido_id`, `cliente_id`, `entregador_id`, `troco`, `status_pedido_id`, `entregador_pago`) VALUES
	(3, 11, 3, 2, 13.00, 1, 0);
/*!40000 ALTER TABLE `pedido_entrega` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pedido_mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `mesa_id` int(2) NOT NULL,
  `status_pedido_id` int(2) NOT NULL DEFAULT '1',
  `aberto` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_pedido_mesa_mesa` (`mesa_id`),
  KEY `FK_pedido_mesa_status_pedido` (`status_pedido_id`),
  KEY `FK_pedido_mesa_pedido` (`pedido_id`),
  CONSTRAINT `FK_pedido_mesa_mesa` FOREIGN KEY (`mesa_id`) REFERENCES `mesa` (`id`),
  CONSTRAINT `FK_pedido_mesa_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  CONSTRAINT `FK_pedido_mesa_status_pedido` FOREIGN KEY (`status_pedido_id`) REFERENCES `status_pedido` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `pedido_mesa` DISABLE KEYS */;
INSERT INTO `pedido_mesa` (`id`, `pedido_id`, `mesa_id`, `status_pedido_id`, `aberto`) VALUES
	(1, 1, 1, 3, 0);
INSERT INTO `pedido_mesa` (`id`, `pedido_id`, `mesa_id`, `status_pedido_id`, `aberto`) VALUES
	(2, 2, 1, 1, 0);
INSERT INTO `pedido_mesa` (`id`, `pedido_id`, `mesa_id`, `status_pedido_id`, `aberto`) VALUES
	(3, 3, 1, 2, 0);
INSERT INTO `pedido_mesa` (`id`, `pedido_id`, `mesa_id`, `status_pedido_id`, `aberto`) VALUES
	(4, 4, 1, 2, 0);
INSERT INTO `pedido_mesa` (`id`, `pedido_id`, `mesa_id`, `status_pedido_id`, `aberto`) VALUES
	(5, 5, 1, 2, 0);
INSERT INTO `pedido_mesa` (`id`, `pedido_id`, `mesa_id`, `status_pedido_id`, `aberto`) VALUES
	(6, 6, 1, 2, 0);
INSERT INTO `pedido_mesa` (`id`, `pedido_id`, `mesa_id`, `status_pedido_id`, `aberto`) VALUES
	(7, 7, 1, 2, 1);
INSERT INTO `pedido_mesa` (`id`, `pedido_id`, `mesa_id`, `status_pedido_id`, `aberto`) VALUES
	(8, 8, 1, 1, 1);
/*!40000 ALTER TABLE `pedido_mesa` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `categoria_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__categoria_produto` (`categoria_id`),
  CONSTRAINT `FK__categoria_produto` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(1, 'Burguer Duplo', 9.00, 'Pão, queijo, 2 hambúrgueres, milho, ervilha, batata palha e fritas', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(2, 'Egg', 8.50, 'Pão, queijo,hambúrguer, ovo, molho, ervilha, batata palha e fritas', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(3, 'Salada', 8.50, 'Pão, queijo, 2 hambúrgueres, alface, milho, ervilha, batata palha e fritas', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(4, 'Calabresa', 11.00, 'Pão, queijo, hambúrguer, calabresa, milho, ervilha, batata palha e fritas', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(5, 'Frango', 11.00, 'Pão, queijo, hambúrguer, frango, milho, ervilha, batata palha e fritas', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(6, 'Cala Frango', 12.00, 'Pão, queijo, hambúrguer, frango, calabresa, milho, ervilha, batata palha e fritas', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(7, 'Bacon', 11.00, 'Pão, queijo, hambúrguer, bacon, milho, ervilha, batata palha e fritas', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(8, 'Cala Egg', 11.00, 'Pão, queijo, hambúrguer, calabresa, ovo,  milho, ervilha, batata palha e fritas', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(9, 'Tudo Monstro', 18.00, 'Pão, queijo ,2 hambúrgueres, 2 salsichas, bacon, frango, calabresa, ovo,  milho, ervilha, batata palha e fritas', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(10, 'Mensalão', 20.00, 'Pão, queijo ,2 hambúrgueres, 2 salsichas, bacon, frango, calabresa, ovo, cheddar, catupiry , milho, ervilha, batata palha e fritas', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(11, 'Quero ver se tu aguenta', 25.00, 'Pão, queijo ,3 hambúrgueres, 3 salsichas, bacon, frango, calabresa, 2 ovos,cheddar, caturipy,  milho, ervilha, batata palha, barbecue,  molho de alho e fritas recheada', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(12, 'Lava Jato', 39.99, 'Pão, queijo ,4 hambúrgueres, 4 salsichas, bacon, frango, calabresa, 3 ovos,  milho, ervilha, batata palha, cheddar, catupiry, barbecue, molho de alho e fritas recheadas.', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(13, 'Batata Recheada Mega', 25.00, 'Batata frita, 3 acompanhamentos (bacon, calabresa, frango) molho de alho, catychup, mostarda, cheddar.', 1, 5);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(14, 'Batata Recheada Grande ', 10.00, 'Batata frita, 2 acompanhamentos ( bacon, frango ou calabresa), molho de alho, mostarda, catychup, cheddar.', 1, 5);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(15, 'Batata Recheada Pequena', 5.00, 'Batata frita, 1 acompanhamento ( bacon, frango ou calabresa), molho de alho, cheddar, mostarda, catychup.', 1, 5);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(16, 'Burguer Kids', 5.00, 'Não acompanha fritas, sem milho e ervilha.\r\nPão, hambúrguer, queijo e batata palha.', 1, 1);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(17, 'Isca de frango Inteira', 30.00, 'Frango frito, fritas e molho\r\nserve 4 pessoas.', 1, 2);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(18, 'Isca de frango Meia', 15.00, 'frango frito, fritas e molho\r\nserve 2 pessoas.', 1, 2);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(19, 'Isca de Peixe Inteira', 40.00, 'Isca de peixe frito, fritas e molho\r\nserve 4 pessoas.', 1, 2);
INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ativo`, `categoria_id`) VALUES
	(20, 'Isca de Peixe Meia', 25.00, 'Isca de peixe frito, fritas e molho\r\nserve 2 pessoas.', 1, 2);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `refresh_database`()
BEGIN

	call `drop_all_tables`();
	call `create_tables`();
	call `insert_categoria_funcionario`();
	call `insert_estados`();
	call `insert_forma_pagamento`();
	call `insert_status_pedido`();
	call `truncate_data_tables`();
	call `insert_configs_default`();
	call `insert_script_default`();
	
	INSERT INTO `funcionario` (`categoria_funcionario`, `nome`, `telefone1`, `telefone2`, `telefone3`, `cep`, `endereco`, `numero`, `complemento`, `ponto_referencia`, `bairro`, `cidade`, `estado`, `rg`, `cpf`, `data_nascimento`, `CTPS`, `salario`, `vale_transporte`, `vale_refeicao`, `ativo`, `cadastro`, `email`, `senha`) VALUES
		(1, 'Admin', '0', '0', '0', '0', '0', '0', NULL, NULL, '0', '0', '1', '0', '0', NULL, '0', 0.00, 0.00, 0.00, 1, '2017-12-28 18:22:54', 'email@email.com', '81dc9bdb52d04dc20036dbd8313ed055');

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `refresh_database_jb`()
BEGIN

	call `drop_all_tables`();
	call `create_tables`();
	call `insert_categoria_funcionario`();
	call `insert_estados`();
	call `insert_forma_pagamento`();
	call `insert_status_pedido`();
	call `truncate_data_tables`();
	call `insert_bairros_santos_sv`();
	call `insert_categoria_produto_JB`();
	call `insert_produtos_JB`();
	call `insert_configs_JB`();
	call `insert_script_JB`();
	
	INSERT INTO `funcionario` (`categoria_funcionario`, `nome`, `telefone1`, `telefone2`, `telefone3`, `cep`, `endereco`, `numero`, `complemento`, `ponto_referencia`, `bairro`, `cidade`, `estado`, `rg`, `cpf`, `data_nascimento`, `CTPS`, `salario`, `vale_transporte`, `vale_refeicao`, `ativo`, `cadastro`, `email`, `senha`) VALUES
		(1, 'Admin', '0', '0', '0', '0', '0', '0', NULL, NULL, '0', '0', '1', '0', '0', NULL, '0', 0.00, 0.00, 0.00, 1, '2017-12-28 18:22:54', 'email@email.com', '81dc9bdb52d04dc20036dbd8313ed055');
		
	INSERT INTO `funcionario` (`categoria_funcionario`, `nome`, `telefone1`, `telefone2`, `telefone3`, `cep`, `endereco`, `numero`, `complemento`, `ponto_referencia`, `bairro`, `cidade`, `estado`, `rg`, `cpf`, `data_nascimento`, `CTPS`, `salario`, `vale_transporte`, `vale_refeicao`, `ativo`, `cadastro`, `email`, `senha`) VALUES
		(1, 'Carla Almeida', '0', '0', '0', '0', '0', '0', NULL, NULL, '0', '0', '1', '0', '0', NULL, '0', 0.00, 0.00, 0.00, 1, '2017-12-28 18:22:54', 'email@email.com', '81dc9bdb52d04dc20036dbd8313ed055');

END//
DELIMITER ;

CREATE TABLE IF NOT EXISTS `script` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `script01` varchar(255) DEFAULT '',
  `script02` varchar(255) DEFAULT '',
  `script03` varchar(255) DEFAULT '',
  `script04` varchar(255) DEFAULT '',
  `script05` varchar(255) DEFAULT '',
  `script06` varchar(255) DEFAULT '',
  `script07` varchar(255) DEFAULT '',
  `script08` varchar(255) DEFAULT '',
  `script09` varchar(255) DEFAULT '',
  `script10` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `script` DISABLE KEYS */;
INSERT INTO `script` (`id`, `script01`, `script02`, `script03`, `script04`, `script05`, `script06`, `script07`, `script08`, `script09`, `script10`) VALUES
	(1, 'Olá, boa noite. Qual o seu nome?', '', '', '', '', '', '', '', '', '');
/*!40000 ALTER TABLE `script` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `status_pedido` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `status_pedido` DISABLE KEYS */;
INSERT INTO `status_pedido` (`id`, `nome`) VALUES
	(1, 'pendente');
INSERT INTO `status_pedido` (`id`, `nome`) VALUES
	(2, 'entregue');
INSERT INTO `status_pedido` (`id`, `nome`) VALUES
	(3, 'cancelado');
/*!40000 ALTER TABLE `status_pedido` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `suporte` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL DEFAULT '0',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `funcionario_id` int(3) NOT NULL,
  `resposta` varchar(255) DEFAULT NULL,
  `status_id` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_suporte_funcionario` (`funcionario_id`),
  KEY `FK_suporte_status_pedido` (`status_id`),
  CONSTRAINT `FK_suporte_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`),
  CONSTRAINT `FK_suporte_status_pedido` FOREIGN KEY (`status_id`) REFERENCES `status_pedido` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `suporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `suporte` ENABLE KEYS */;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `trucate_data_tables`()
BEGIN

	SET foreign_key_checks = 0;
	truncate table bairro;
	-- truncate table categoria_funcionario;
	truncate table categoria_produto;
	truncate table cliente;
	-- truncate table estado;
	-- trunccate table forma_pagamento;
	truncate table funcionario;
	truncate table item;
	truncate table mesa;
	truncate table pedido;
	truncate table pedido_balcao;
	truncate table pedido_entrega;
	truncate table pedido_mesa;
	truncate table produto;
	-- truncate table status_pedido;
	SET foreign_key_checks = 1;

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `truncate_all_pedidos`()
BEGIN

	SET foreign_key_checks = 0;
	truncate table item;
	truncate table pedido;
	truncate table pedido_balcao;
	truncate table pedido_entrega;
	truncate table pedido_mesa;
	SET foreign_key_checks = 1;

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `truncate_all_tables`()
BEGIN

	-- nao usar
	SET foreign_key_checks = 0;
	truncate table bairro;
	truncate table categoria_funcionario;
	truncate table categoria_produto;
	truncate table cliente;
	truncate table estado;
	truncate table forma_pagamento;
	truncate table funcionario;
	truncate table item;
	truncate table mesa;
	truncate table pedido;
	truncate table pedido_balcao;
	truncate table pedido_entrega;
	truncate table pedido_mesa;
	truncate table produto;
	truncate table status_pedido;
	SET foreign_key_checks = 1;

END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `truncate_data_tables`()
BEGIN

	SET foreign_key_checks = 0;
	truncate table bairro;
	-- truncate table categoria_funcionario;
	truncate table categoria_produto;
	truncate table cliente;
	-- truncate table estado;
	-- trunccate table forma_pagamento;
	truncate table funcionario;
	truncate table item;
	truncate table mesa;
	truncate table pedido;
	truncate table pedido_balcao;
	truncate table pedido_entrega;
	truncate table pedido_mesa;
	truncate table produto;
	-- truncate table status_pedido;
	SET foreign_key_checks = 1;

END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
