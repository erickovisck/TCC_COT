-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Out-2023 às 15:32
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
  `id_livro` int NOT NULL,
  `quantidade` int NOT NULL,
  PRIMARY KEY (`id_carrinho`),
  KEY `id_livro` (`id_livro`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=199 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `id_usuario`, `id_livro`, `quantidade`) VALUES
(198, 4, 19, 1),
(197, 4, 5, 1),
(196, 4, 3, 1),
(195, 4, 2, 1),
(194, 4, 1, 1),
(193, 4, 19, 1),
(192, 4, 5, 1),
(191, 4, 19, 1),
(190, 4, 5, 1),
(189, 4, 19, 1),
(188, 4, 5, 1);

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
  PRIMARY KEY (`id_mensagem`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `chat_geral`
--

INSERT INTO `chat_geral` (`id_mensagem`, `id_autor`, `id_usuario`, `mensagens`, `nome_usuario`, `cont_like`) VALUES
(94, 0, 4, 'cachorro de chapeu', 'a', 0),
(93, 0, 4, 'A', 'a', 0),
(92, 0, 4, 'A', 'a', 0),
(91, 0, 4, 'livros sao mt fodas', 'a', 0),
(90, 0, 4, 'k', 'a', 0),
(89, 0, 4, 'k', 'a', 0),
(88, 0, 4, 'k', 'a', 0),
(87, 0, 4, 'k', 'a', 0),
(86, 0, 4, 'k', 'a', 0),
(85, 0, 4, 'a', 'a', 0),
(83, 0, 4, 'a', 'a', 0),
(84, 0, 4, 'a', 'a', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `id_autor`, `id_editora`, `nome_livro`, `nome_autor`, `preco`) VALUES
(34, 9, 9, 'A Menina que Roubava Livros', 'Markus Zusak', 31.99),
(33, 8, 8, 'Divergente', 'Veronica Roth', 26.99),
(32, 7, 7, 'Percy Jackson e o Ladrão de Raios', 'Rick Riordan', 28.99),
(31, 6, 6, 'A Guerra dos Tronos', 'George R.R. Martin', 34.99),
(30, 5, 5, 'Dom Quixote', 'Miguel de Cervantes', 32.99),
(29, 4, 4, '1984', 'George Orwell', 27.99),
(28, 3, 3, 'Cem Anos de Solidão', 'Gabriel García Márquez', 35.99),
(27, 2, 2, 'Harry Potter e a Pedra Filosofal', 'J.K. Rowling', 29.99),
(26, 1, 1, 'O Senhor dos Anéis: A Sociedade do Anel', 'J.R.R. Tolkien', 39.99),
(35, 10, 10, 'A Culpa é das Estrelas', 'John Green', 29.99),
(36, 11, 11, 'Os Jogos da Fome', 'Suzanne Collins', 27.99),
(37, 12, 12, 'A Hospedeira', 'Stephenie Meyer', 33.99),
(38, 13, 13, 'O Código Da Vinci', 'Dan Brown', 30.99),
(39, 14, 14, 'O Hobbit', 'J.R.R. Tolkien', 29.99),
(40, 15, 15, 'A Torre Negra: O Pistoleiro', 'Stephen King', 32.99),
(41, 16, 16, 'A Sombra do Vento', 'Carlos Ruiz Zafón', 35.99),
(42, 17, 17, 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 24.99),
(43, 18, 18, 'O Silmarillion', 'J.R.R. Tolkien', 31.99),
(44, 19, 19, 'A Revolução dos Bichos', 'George Orwell', 26.99),
(45, 20, 20, 'A Hora da Estrela', 'Clarice Lispector', 29.99),
(46, 21, 21, 'O Nome do Vento', 'Patrick Rothfuss', 34.99),
(47, 22, 22, 'A Máquina do Tempo', 'H.G. Wells', 26.99),
(48, 23, 23, 'O Alquimista', 'Paulo Coelho', 28.99),
(49, 24, 24, 'A Estrada', 'Cormac McCarthy', 30.99),
(50, 25, 25, 'O Lobo do Mar', 'Jack London', 27.99),
(51, 26, 26, 'Os Três Mosqueteiros', 'Alexandre Dumas', 33.99),
(52, 27, 27, 'Moby Dick', 'Herman Melville', 31.99),
(53, 28, 28, 'Crime e Castigo', 'Fyodor Dostoevsky', 35.99),
(54, 29, 29, 'Anna Karenina', 'Leo Tolstoy', 29.99),
(55, 30, 30, 'O Conde de Monte Cristo', 'Alexandre Dumas', 38.99),
(56, 31, 31, 'A Iliada', 'Homer', 27.99),
(57, 6, 6, 'A Guerra dos Tronos', 'George R.R. Martin', 34.99),
(58, 7, 7, 'Percy Jackson e o Ladrão de Raios', 'Rick Riordan', 28.99),
(59, 8, 8, 'Divergente', 'Veronica Roth', 26.99),
(60, 9, 9, 'A Menina que Roubava Livros', 'Markus Zusak', 31.99),
(61, 10, 10, 'A Culpa é das Estrelas', 'John Green', 29.99),
(62, 11, 11, 'Os Jogos da Fome', 'Suzanne Collins', 27.99),
(63, 12, 12, 'A Hospedeira', 'Stephenie Meyer', 33.99),
(64, 13, 13, 'O Código Da Vinci', 'Dan Brown', 30.99),
(65, 14, 14, 'O Hobbit', 'J.R.R. Tolkien', 29.99),
(66, 15, 15, 'A Torre Negra: O Pistoleiro', 'Stephen King', 32.99),
(67, 16, 16, 'A Sombra do Vento', 'Carlos Ruiz Zafón', 35.99),
(68, 17, 17, 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 24.99),
(69, 18, 18, 'O Silmarillion', 'J.R.R. Tolkien', 31.99),
(70, 19, 19, 'A Revolução dos Bichos', 'George Orwell', 26.99),
(71, 20, 20, 'A Hora da Estrela', 'Clarice Lispector', 29.99),
(72, 21, 21, 'O Nome do Vento', 'Patrick Rothfuss', 34.99),
(73, 22, 22, 'A Máquina do Tempo', 'H.G. Wells', 26.99),
(74, 23, 23, 'O Alquimista', 'Paulo Coelho', 28.99),
(75, 24, 24, 'A Estrada', 'Cormac McCarthy', 30.99),
(76, 25, 25, 'O Lobo do Mar', 'Jack London', 27.99),
(77, 26, 26, 'Os Três Mosqueteiros', 'Alexandre Dumas', 33.99),
(78, 27, 27, 'Moby Dick', 'Herman Melville', 31.99),
(79, 28, 28, 'Crime e Castigo', 'Fyodor Dostoevsky', 35.99),
(80, 29, 29, 'Anna Karenina', 'Leo Tolstoy', 29.99),
(81, 30, 30, 'O Conde de Monte Cristo', 'Alexandre Dumas', 38.99),
(82, 31, 31, 'A Iliada', 'Homer', 27.99),
(83, 32, 32, 'A Odisseia', 'Homer', 27.99),
(84, 33, 33, 'A Metamorfose', 'Franz Kafka', 26.99),
(85, 34, 34, 'Dom Quixote', 'Miguel de Cervantes', 31.99),
(86, 35, 35, 'A Revolta de Atlas', 'Ayn Rand', 34.99),
(87, 36, 36, 'O Morro dos Ventos Uivantes', 'Emily Brontë', 29.99),
(88, 37, 37, 'Cem Anos de Solidão', 'Gabriel García Márquez', 30.99),
(89, 38, 38, 'O Apanhador no Campo de Centeio', 'J.D. Salinger', 26.99),
(90, 39, 39, '1984', 'George Orwell', 28.99),
(91, 40, 40, 'O Sol é para Todos', 'Harper Lee', 29.99),
(92, 41, 41, 'Orgulho e Preconceito', 'Jane Austen', 25.99),
(93, 42, 42, 'O Retrato de Dorian Gray', 'Oscar Wilde', 27.99),
(94, 43, 43, 'O Grande Gatsby', 'F. Scott Fitzgerald', 28.99),
(95, 44, 44, 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 24.99),
(96, 45, 45, 'A Insustentável Leveza do Ser', 'Milan Kundera', 29.99),
(97, 46, 46, 'As Crônicas de Nárnia', 'C.S. Lewis', 31.99),
(98, 47, 47, 'O Senhor dos Anéis: A Sociedade do Anel', 'J.R.R. Tolkien', 32.99),
(99, 48, 48, 'O Apanhador no Campo de Centeio', 'J.D. Salinger', 26.99),
(100, 49, 49, 'O Silêncio dos Inocentes', 'Thomas Harris', 30.99),
(101, 50, 50, 'O Cão dos Baskervilles', 'Arthur Conan Doyle', 28.99);

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
  `numero_cartao` varchar(16) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `numero_cartao` (`numero_cartao`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_chat_privado`, `id_chat_geral`, `id_carrinho`, `assinatura_nivel`, `nome_usuario`, `email`, `senha`, `preferencias`, `recuperacao`, `autor`, `mensagens`, `numero_cartao`) VALUES
(4, '', 0, '2', 0, 'a', '1', '1', '', '1', 0, '', '1234567891234567'),
(5, '', 0, '2', 0, 'erick2', '23', '23', '', '23', 0, '', ''),
(6, '', 0, '2', 0, 'b', 'b', '3', '', 'b', 0, '', ''),
(7, '', 0, '2', 0, 'a', 'a', 'a', '', 'a', 0, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
