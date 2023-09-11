-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Set-2023 às 21:41
-- Versão do servidor: 8.0.31
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
  `id_livro` int NOT NULL,
  `quantidade` int NOT NULL,
  PRIMARY KEY (`id_carrinho`),
  KEY `id_livro` (`id_livro`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `id_usuario`, `id_livro`, `quantidade`) VALUES
(1, 4, 5, 5),
(2, 4, 5, 5),
(3, 4, 5, 5),
(4, 4, 5, 5),
(5, 4, 5, 5),
(6, 4, 5, 5),
(7, 4, 5, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_geral`
--

DROP TABLE IF EXISTS `chat_geral`;
CREATE TABLE IF NOT EXISTS `chat_geral` (
  `id_mensagem` int NOT NULL AUTO_INCREMENT,
  `id_autor` int NOT NULL,
  `id_usuario` int NOT NULL,
  `mensagens` varchar(140) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nome_usuario` varchar(40) NOT NULL,
  PRIMARY KEY (`id_mensagem`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `chat_geral`
--

INSERT INTO `chat_geral` (`id_mensagem`, `id_autor`, `id_usuario`, `mensagens`, `nome_usuario`) VALUES
(79, 0, 4, 'a', 'erick'),
(78, 0, 4, 'a', 'erick'),
(77, 0, 5, 'oi ', 'erick2'),
(76, 0, 5, 'oi ', 'erick2'),
(74, 0, 4, 'a', 'erick'),
(75, 0, 4, 'jgjgaggka', 'erick'),
(72, 0, 4, 'a', 'erick'),
(73, 0, 4, 'a', 'erick'),
(70, 0, 4, 'a', 'erick'),
(71, 0, 4, 'a', 'erick'),
(68, 0, 4, '', 'erick'),
(69, 0, 4, 'a', 'erick'),
(66, 0, 4, 'd', 'erick'),
(67, 0, 4, '', 'erick'),
(64, 0, 4, '', 'erick'),
(65, 0, 4, 'd', 'erick'),
(62, 0, 4, '', 'erick'),
(63, 0, 4, '', 'erick'),
(60, 0, 4, '', 'erick'),
(61, 0, 4, 'a', 'erick'),
(59, 0, 4, 'hhHAAHAHHAHAHHAHHSHSHSHSHSHHSSHSHSHSHHSHSHSHHS', 'erick');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_privado`
--

DROP TABLE IF EXISTS `chat_privado`;
CREATE TABLE IF NOT EXISTS `chat_privado` (
  `id_chat_privado` varchar(30) DEFAULT NULL,
  `id_autor` int DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  KEY `id_autor` (`id_autor`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `preco` double NOT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `id_editora` (`id_editora`),
  KEY `id_autor` (`id_autor`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `id_autor`, `id_editora`, `nome_livro`, `nome_autor`, `preco`) VALUES
(1, 0, 0, 'a', 'a', 2),
(2, 0, 0, 'a', 'a', 3),
(3, 0, 0, 'a', 'a', 3),
(4, 0, 0, 'a', 'a', 0),
(5, 0, 0, 'harrypotter ', 'jk rowling', 50.5),
(6, 0, 0, 'b', 'b', 4),
(7, 0, 0, 'a', 'a', 5.6),
(8, 0, 0, 'a', 'a', 5.6),
(9, 0, 0, 'jk', 'a', 5.6),
(10, 0, 0, 'A.', 'fd', 4),
(11, 0, 0, 'A A', 'fd', 4),
(12, 0, 0, 'A a', '', 0),
(13, 0, 0, 't', 't', 1),
(14, 0, 0, 'T', 't', 2),
(15, 0, 0, 'T t', 'T t', 3),
(16, 0, 0, 'T T', 'T T', 4),
(17, 0, 0, 'TT', 'TT', 5),
(18, 0, 0, 'tt', 'tt', 6),
(19, 0, 0, 'harry potter', 'J K Rowling', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `id_chat_privado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_chat_geral` int NOT NULL,
  `id_carrinho` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `assinatura_nivel` int NOT NULL,
  `nome_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `preferencias` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `recuperacao` varchar(50) NOT NULL,
  `autor` tinyint(1) NOT NULL,
  `mensagens` varchar(140) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_chat_privado`, `id_chat_geral`, `id_carrinho`, `assinatura_nivel`, `nome_usuario`, `email`, `senha`, `preferencias`, `recuperacao`, `autor`, `mensagens`) VALUES
(4, '', 0, '2', 0, 'erick', '1', '1', '', '1', 0, ''),
(5, '', 0, '2', 0, 'erick2', '23', '23', '', '23', 0, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
