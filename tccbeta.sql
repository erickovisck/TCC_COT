-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 29-Ago-2023 às 13:57
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

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
  `id_carrinho` varchar(40) NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `id_livro` int DEFAULT NULL,
  PRIMARY KEY (`id_carrinho`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_livro` (`id_livro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_geral`
--

DROP TABLE IF EXISTS `chat_geral`;
CREATE TABLE IF NOT EXISTS `chat_geral` (
  `id_chat_geral` int NOT NULL,
  `id_autor` int DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `mensagens` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_chat_geral`),
  KEY `id_autor` (`id_autor`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id_livro` int NOT NULL,
  `id_autor` int DEFAULT NULL,
  `id_editora` int DEFAULT NULL,
  `nome_livro` varchar(50) NOT NULL,
  `nome_autor` varchar(50) DEFAULT NULL,
  `Preço` int DEFAULT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `id_editora` (`id_editora`),
  KEY `id_autor` (`id_autor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_chat_privado` varchar(50) DEFAULT NULL,
  `id_chat_geral` int DEFAULT NULL,
  `id_carrinho` varchar(40) DEFAULT NULL,
  `assinatura_nivel` int DEFAULT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `Senha` varchar(20) DEFAULT NULL,
  `preferencias` varchar(200) DEFAULT NULL,
  `recuperacao` varchar(20) NOT NULL,
  PRIMARY KEY (`email`),
  KEY `id_chat_privado` (`id_chat_privado`),
  KEY `id_chat_geral` (`id_chat_geral`),
  KEY `id_carrinho` (`id_carrinho`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_chat_privado`, `id_chat_geral`, `id_carrinho`, `assinatura_nivel`, `nome_usuario`, `email`, `Senha`, `preferencias`, `recuperacao`) VALUES
('', NULL, '2', NULL, 'erico', 'erickadm@gmail.com', '123', '', ''),
('', NULL, '2', NULL, 'erick', '1', '2', '', ''),
('', NULL, '2', NULL, 'a', 'b', 'c', 'd', ''),
('', NULL, '2', NULL, '1', '3', '2', '2', ''),
('', NULL, '2', NULL, '1', '23', 'senha', '1', 'maca');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
