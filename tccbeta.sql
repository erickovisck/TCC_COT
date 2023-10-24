-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Out-2023 às 13:34
-- Versão do servidor: 8.0.27
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tccbeta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id_carrinho` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_livro` varchar(40) NOT NULL,
  `quantidade` int NOT NULL,
  PRIMARY KEY (`id_carrinho`),
  KEY `id_livro` (`id_livro`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `id_usuario`, `id_livro`, `quantidade`) VALUES
(198, 4, '19', 1),
(197, 4, '5', 1),
(196, 4, '3', 1),
(195, 4, '2', 1),
(194, 4, '1', 1),
(193, 4, '19', 1),
(192, 4, '5', 1),
(191, 4, '19', 1),
(190, 4, '5', 1),
(189, 4, '19', 1),
(188, 4, '5', 1),
(199, 12, '2147483647', 1),
(200, 4, '9781506701615', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao_credito`
--

DROP TABLE IF EXISTS `cartao_credito`;
CREATE TABLE IF NOT EXISTS `cartao_credito` (
  `numero_cartao` varchar(16) NOT NULL,
  `ccv` varchar(3) NOT NULL,
  `nome_usuario` varchar(40) NOT NULL,
  `data_validade` varchar(5) NOT NULL,
  `limite` decimal(10,2) NOT NULL,
  PRIMARY KEY (`numero_cartao`),
  KEY `nome_usuario` (`nome_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cartao_credito`
--

INSERT INTO `cartao_credito` (`numero_cartao`, `ccv`, `nome_usuario`, `data_validade`, `limite`) VALUES
('1234567891234567', '123', '1', '30/09', '999999.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_geral`
--

DROP TABLE IF EXISTS `chat_geral`;
CREATE TABLE IF NOT EXISTS `chat_geral` (
  `id_mensagem` int NOT NULL AUTO_INCREMENT,
  `id_autor` int NOT NULL DEFAULT '0',
  `id_usuario` int NOT NULL,
  `mensagens` varchar(140) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nome_usuario` varchar(40) NOT NULL,
  `cont_like` int NOT NULL,
  `data_mensagem` datetime NOT NULL,
  PRIMARY KEY (`id_mensagem`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `chat_geral`
--

INSERT INTO `chat_geral` (`id_mensagem`, `id_autor`, `id_usuario`, `mensagens`, `nome_usuario`, `cont_like`, `data_mensagem`) VALUES
(113, 0, 10, 'aaa', 'camila', 0, '2023-10-24 08:54:30'),
(112, 0, 10, 'laa', 'camila', 0, '2023-10-24 08:54:28'),
(111, 0, 10, 'la', 'camila', 0, '2023-10-24 08:54:09'),
(110, 0, 10, 'oi', 'camila', 0, '2023-10-24 08:54:02'),
(109, 0, 10, 'nao', 'camila', 0, '2023-10-24 08:53:50'),
(108, 0, 10, 'ola', 'camila', 0, '2023-10-24 08:53:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_privado`
--

DROP TABLE IF EXISTS `chat_privado`;
CREATE TABLE IF NOT EXISTS `chat_privado` (
  `id_chat_privado` int NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(200) NOT NULL,
  `id_enviou` int NOT NULL,
  `id_recebeu` int NOT NULL,
  `id_usuario` int NOT NULL,
  `data_mensagem` datetime NOT NULL,
  PRIMARY KEY (`id_chat_privado`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `chat_privado`
--

INSERT INTO `chat_privado` (`id_chat_privado`, `mensagem`, `id_enviou`, `id_recebeu`, `id_usuario`, `data_mensagem`) VALUES
(32, 'se fode maluco', 4, 10, 4, '2023-10-19 00:00:00'),
(31, '?', 10, 4, 10, '2023-10-19 00:00:00'),
(30, 'Ue porra', 10, 4, 10, '2023-10-19 00:00:00'),
(29, 'cala boca', 10, 4, 10, '2023-10-19 00:00:00'),
(28, 'pimenta no cu dos outro e refresco', 4, 10, 4, '2023-10-19 00:00:00'),
(33, 'oi', 4, 10, 4, '2023-10-19 21:08:42'),
(34, 'teste', 4, 10, 4, '2023-10-19 21:08:57'),
(35, 'oi', 4, 10, 4, '2023-10-21 08:21:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

DROP TABLE IF EXISTS `editora`;
CREATE TABLE IF NOT EXISTS `editora` (
  `id_editora` int DEFAULT NULL,
  `id_autor` int DEFAULT NULL,
  `nome_editora` varchar(50) NOT NULL,
  PRIMARY KEY (`nome_editora`),
  KEY `id_autor` (`id_autor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

DROP TABLE IF EXISTS `livros`;
CREATE TABLE IF NOT EXISTS `livros` (
  `id_livro` int NOT NULL AUTO_INCREMENT,
  `id_autor` int NOT NULL,
  `id_editora` int NOT NULL,
  `nome_livro` varchar(50) NOT NULL,
  `nome_autor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `preco` int NOT NULL,
  `isbn` varchar(40) NOT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `id_editora` (`id_editora`),
  KEY `id_autor` (`id_autor`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguir`
--

DROP TABLE IF EXISTS `seguir`;
CREATE TABLE IF NOT EXISTS `seguir` (
  `id_seguidor` int NOT NULL,
  `id_seguido` int NOT NULL,
  `tabseguir` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tabseguir`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `seguir`
--

INSERT INTO `seguir` (`id_seguidor`, `id_seguido`, `tabseguir`) VALUES
(4, 4, 16),
(4, 11, 47),
(11, 4, 25),
(11, 11, 29),
(11, 10, 34),
(10, 4, 67);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `assinatura_nivel` int NOT NULL DEFAULT '0',
  `nome_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `recuperacao` varchar(50) NOT NULL,
  `autor` tinyint(1) NOT NULL DEFAULT '0',
  `img_perfil` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_',
  `biografia` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `assinatura_nivel`, `nome_usuario`, `email`, `senha`, `recuperacao`, `autor`, `img_perfil`, `biografia`) VALUES
(4, 0, 'erick', '1', '1', '1', 0, 'https://www.petz.com.br/blog/wp-content/uploads/2019/05/cachorro-independente-1-1280x720.jpg', ''),
(5, 0, 'erick2', '23', '23', '23', 0, '', ''),
(6, 0, 'b', 'b', '3', 'b', 0, '', ''),
(7, 0, 'a', 'a', 'a', 'a', 0, '', ''),
(10, 0, 'camila', '2', '2', '2', 0, 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', 'sasd'),
(11, 0, '5', '5', '5', '5', 0, '', ''),
(12, 0, '2134', '2222', '1', '1', 0, 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
