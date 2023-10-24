-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Out-2023 às 15:14
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
) ENGINE=MyISAM AUTO_INCREMENT=205 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `preco` double NOT NULL,
  `isbn` varchar(40) NOT NULL,
  PRIMARY KEY (`id_livro`)
) ENGINE=MyISAM AUTO_INCREMENT=869 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `preco`, `isbn`) VALUES
(746, 54.99, '0141002980'),
(745, 56.99, '0586037446'),
(744, 66.99, '0553252704'),
(743, 64.99, '9788446023708'),
(742, 70.99, '9783985101986'),
(741, 33.99, '9783736408968'),
(740, 57.99, '9780679720218'),
(739, 69.99, 'EAN:8596547367178'),
(738, 47.99, '9780553897777'),
(737, 37.99, '9780553902549'),
(736, 47.99, '9781524761356'),
(735, 63.99, '9780525522881'),
(734, 69.99, '9786555523683'),
(733, 37.99, '1551662914'),
(732, 63.99, '0451526279'),
(731, 44.99, '1908533056'),
(730, 54.99, '1952457238'),
(729, 65.99, '9780743442237'),
(728, 66.99, '0739446460'),
(727, 63.99, '9781476763545'),
(726, 38.99, 'STANFORD:36105035747885'),
(725, 41.99, '0192815032'),
(724, 63.99, '9780989311298'),
(723, 66.99, '152661829X'),
(722, 36.99, '1338030019'),
(721, 56.99, '0062385658'),
(720, 70.99, '0786222743'),
(719, 38.99, '1683837517'),
(718, 40.99, '9780313320675'),
(717, 40.99, '140886911X'),
(716, 35.99, '1526618249'),
(715, 42.99, '133831291X'),
(714, 53.99, '0062374230'),
(713, 64.99, '9780142003558'),
(712, 65.99, '3833235810'),
(711, 32.99, '9781479800650'),
(710, 48.99, '9781526609205'),
(709, 46.99, '1408866196'),
(708, 62.99, '1526666324'),
(707, 49.99, '1408871874'),
(706, 61.99, '1408897318'),
(705, 40.99, '1408883767'),
(704, 70.99, '0062101897'),
(703, 51.99, '1783705485'),
(702, 62.99, '1683835956'),
(701, 54.99, '9781647222604'),
(700, 33.99, '073908772X'),
(699, 69.99, '1785657399'),
(698, 32.99, '1338218395'),
(697, 64.99, '1408883805'),
(696, 53.99, '0545596270'),
(695, 55.99, '1338878921'),
(694, 35.99, '1338299182'),
(693, 39.99, '1338029991'),
(692, 67.99, '1338285262'),
(691, 46.99, '158234826X'),
(690, 42.99, '9781647220266'),
(689, 43.99, '1410496201'),
(688, 39.99, '9781781100547'),
(687, 34.99, '1608870081'),
(686, 64.99, '0826215491'),
(685, 40.99, 'UCSC:32106019703807'),
(684, 70.99, '1785301543'),
(683, 55.99, '1338596705'),
(682, 54.99, '9781684128877'),
(681, 47.99, '0545791421'),
(680, 42.99, '1551922444'),
(679, 39.99, '841817319X'),
(678, 32.99, '8532512526'),
(677, 66.99, '9781781105467'),
(676, 30.99, '8532512941'),
(675, 56.99, '9780812694550'),
(674, 57.99, '9780470398258'),
(673, 39.99, '853251166X'),
(672, 43.99, '8532530842'),
(671, 51.99, '9781781106570'),
(670, 46.99, '8532512062'),
(669, 47.99, '9781781103685'),
(668, 43.99, '8532530826'),
(667, 31.99, 'PKEY:3009060'),
(666, 65.99, 'PKEY:3009061'),
(665, 60.99, '9781506722245'),
(664, 53.99, '8578278429'),
(663, 65.99, 'PKEY:29904'),
(662, 64.99, 'PKEY:27091'),
(661, 30.99, '8546902895'),
(660, 60.99, 'PKEY:3009059'),
(659, 53.99, 'PKEY:3009817'),
(658, 43.99, 'PKEY:3007834'),
(657, 62.99, '9781646044122'),
(656, 51.99, '9781506726953'),
(655, 61.99, 'PKEY:3009064'),
(654, 59.99, '9781506705828'),
(653, 63.99, '9781506711133'),
(652, 52.99, '9781476683850'),
(651, 61.99, '9781506726922'),
(650, 60.99, 'PKEY:3006177'),
(649, 65.99, '9781506733517'),
(648, 68.99, '9781506727271'),
(647, 33.99, '9781621159339'),
(646, 52.99, '9781506722238'),
(645, 62.99, '9781506727172'),
(644, 33.99, '9781473232426'),
(643, 39.99, '8546902909'),
(642, 32.99, '1399611410'),
(641, 61.99, '9781616554828'),
(640, 36.99, '0316565164'),
(639, 36.99, '857827959X'),
(638, 30.99, '9781506716572'),
(637, 52.99, '9781506726915'),
(636, 34.99, '9780744016260'),
(635, 50.99, '9781630417543'),
(634, 62.99, '9781616554743'),
(633, 60.99, '8546902992'),
(632, 49.99, '9781473211582'),
(631, 65.99, '9781506713946'),
(630, 37.99, '9781506706825'),
(629, 51.99, ''),
(628, 51.99, '031649884X'),
(627, 44.99, '8891246816'),
(626, 43.99, '8546901864'),
(625, 46.99, '2372550799'),
(624, 47.99, '605299018X'),
(623, 69.99, '074401722X'),
(622, 57.99, '9781473232488'),
(621, 46.99, '0316438979'),
(620, 55.99, '8828742690'),
(619, 61.99, '9781506702452'),
(618, 36.99, '0316333522'),
(617, 38.99, '8578279859'),
(616, 59.99, '8546900884'),
(615, 62.99, '8578279557'),
(614, 63.99, '9780575099913'),
(613, 59.99, '8578279824'),
(747, 31.99, '9781101916988'),
(748, 52.99, '0752858548'),
(749, 51.99, '0586040676'),
(750, 68.99, '1844281116'),
(751, 31.99, '0446541559'),
(752, 40.99, '9781524735838'),
(753, 60.99, '1409120554'),
(754, 66.99, '9780691090153'),
(755, 42.99, '8370821790'),
(756, 37.99, '0451169522'),
(757, 58.99, '1856497674'),
(758, 37.99, '8371502532'),
(759, 66.99, 'WISC:89061839098'),
(760, 60.99, 'STANFORD:36105121898261'),
(761, 45.99, '0670846503'),
(762, 47.99, '0451160916'),
(763, 51.99, '0300077726'),
(764, 69.99, '9781481443258'),
(765, 54.99, 'UCSD:31822023797939'),
(766, 47.99, '9780595201815'),
(767, 51.99, '1561563099'),
(768, 34.99, '9781506701615'),
(769, 51.99, '9781481410496'),
(770, 34.99, 'UOM:49015002947092'),
(771, 39.99, '0345302338'),
(772, 47.99, 'STANFORD:36105040581212'),
(773, 68.99, '0451173317'),
(774, 32.99, '074401722X'),
(775, 35.99, '605299018X'),
(776, 44.99, '031649884X'),
(777, 58.99, ''),
(778, 69.99, '857827959X'),
(779, 38.99, 'PKEY:3006177'),
(780, 31.99, 'PKEY:3009064'),
(781, 60.99, 'PKEY:3007834'),
(782, 33.99, 'PKEY:3009817'),
(783, 67.99, 'PKEY:3009059'),
(784, 43.99, 'PKEY:27091'),
(785, 54.99, 'PKEY:29904'),
(786, 47.99, 'PKEY:3009061'),
(787, 41.99, 'PKEY:3009060'),
(788, 41.99, '8572839046'),
(789, 41.99, '9781526019073'),
(790, 43.99, '9788501101952'),
(791, 40.99, '8502102591'),
(792, 48.99, '6555980109'),
(793, 41.99, '8520938388'),
(794, 68.99, '8575314211'),
(795, 60.99, '655640120X'),
(796, 46.99, '8565845230'),
(797, 64.99, '8535915400'),
(798, 56.99, ''),
(799, 40.99, '8577540987'),
(800, 48.99, '9788552100560'),
(801, 70.99, '8506061989'),
(802, 36.99, '8577156044'),
(803, 67.99, '9788534934497'),
(804, 45.99, '9788581051277'),
(805, 39.99, 'UTEXAS:059173015246654'),
(806, 67.99, '858041606X'),
(807, 67.99, '9788726621013'),
(808, 39.99, 'BL:A0023350225'),
(809, 68.99, '9788581830759'),
(810, 55.99, '9788554906061'),
(811, 52.99, 'UTEXAS:059173022541610'),
(812, 63.99, 'BL:A0023350216'),
(813, 59.99, 'BL:A0023350218'),
(814, 62.99, '9786589795384'),
(815, 59.99, 'BL:A0023350226'),
(816, 66.99, 'BL:A0023350214'),
(817, 53.99, 'BL:A0023350211'),
(818, 55.99, '9789895579983'),
(819, 66.99, 'BL:A0023350232'),
(820, 42.99, 'BL:A0023350214'),
(821, 43.99, 'BL:A0023350211'),
(822, 43.99, 'BL:A0023350221'),
(823, 42.99, '9463603948'),
(824, 48.99, '8577990540'),
(825, 34.99, '9788580866827'),
(826, 53.99, '8506073782'),
(827, 37.99, 'BSB:BSB10926079'),
(828, 37.99, '9722037943'),
(829, 31.99, '9896572194'),
(830, 36.99, '9788832573374'),
(831, 70.99, '8572081194'),
(832, 40.99, '8533612915'),
(833, 59.99, '9788527506397'),
(834, 65.99, '9788501111982'),
(835, 31.99, '8536803592'),
(836, 47.99, 'BSB:BSB10636151'),
(837, 66.99, 'BL:A0023350233'),
(838, 53.99, 'BSB:BSB10636159'),
(839, 66.99, '9789895645480'),
(840, 41.99, 'BSB:BSB10636189'),
(841, 50.99, 'BSB:BSB10636144'),
(842, 64.99, 'BSB:BSB10636161'),
(843, 45.99, '8582175817'),
(844, 34.99, 'UCM:5325291116'),
(845, 68.99, 'UCM:5325290504'),
(846, 67.99, 'BSB:BSB10636157'),
(847, 36.99, 'BSB:BSB10980813'),
(848, 47.99, 'BSB:BSB10636230'),
(849, 32.99, 'PKEY:CLDEAU74670'),
(850, 49.99, 'STANFORD:36105035747885'),
(851, 47.99, 'EAN:8596547367178'),
(852, 40.99, 'WISC:89061839098'),
(853, 48.99, 'STANFORD:36105121898261'),
(854, 60.99, 'UCSD:31822023797939'),
(855, 33.99, 'UOM:49015002947092'),
(856, 48.99, 'STANFORD:36105040581212'),
(857, 55.99, 'STANFORD:36105035747885'),
(858, 49.99, 'EAN:8596547367178'),
(859, 32.99, 'STANFORD:36105035747885'),
(860, 30.99, 'EAN:8596547367178'),
(861, 67.99, '853251166X'),
(862, 54.99, '841817319X'),
(863, 40.99, 'UCSC:32106019703807'),
(864, 51.99, '158234826X'),
(865, 41.99, '073908772X'),
(866, 52.99, '133831291X'),
(867, 44.99, '140886911X'),
(868, 39.99, '152661829X');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `assinatura_nivel`, `nome_usuario`, `email`, `senha`, `recuperacao`, `autor`, `img_perfil`, `biografia`) VALUES
(4, 0, 'erick', '1', '', '1', 0, 'https://www.petz.com.br/blog/wp-content/uploads/2019/05/cachorro-independente-1-1280x720.jpg', 'jads'),
(5, 0, 'erick2', '23', '', '23', 0, '', 'ola'),
(6, 0, 'b', 'b', '3', 'b', 0, '', ''),
(7, 0, 'a', 'a', 'a', 'a', 0, '', ''),
(10, 0, 'camila', '2', '2', '2', 0, 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', 'sasd'),
(11, 0, '5', '5', '5', '5', 0, '', ''),
(12, 0, '2134', '2222', '1', '1', 0, 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', ''),
(13, 0, 'o', 'o', '', 'o', 0, 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', 'oii');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
