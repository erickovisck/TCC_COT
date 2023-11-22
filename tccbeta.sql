-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Nov-2023 às 22:33
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
  `id_livro` varchar(40) NOT NULL,
  `quantidade` int NOT NULL,
  PRIMARY KEY (`id_carrinho`),
  KEY `id_livro` (`id_livro`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=207 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=1600 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(868, 39.99, '152661829X'),
(869, 58.99, 'STANFORD:36105035747885'),
(870, 32.99, 'EAN:8596547367178'),
(871, 30.99, 'WISC:89061839098'),
(872, 46.99, 'STANFORD:36105121898261'),
(873, 51.99, 'UCSD:31822023797939'),
(874, 33.99, 'UOM:49015002947092'),
(875, 34.99, 'STANFORD:36105040581212'),
(876, 53.99, 'WISC:89061839098'),
(877, 50.99, 'STANFORD:36105121898261'),
(878, 51.99, '8532519474'),
(879, 46.99, '9781781104040'),
(880, 43.99, '9781781103708'),
(881, 62.99, '9781781103074'),
(882, 49.99, '9781781103104'),
(883, 59.99, '9781781105337'),
(884, 45.99, '9781781106587'),
(885, 30.99, '6555321202'),
(886, 36.99, '9781781103081'),
(887, 51.99, '8532530427'),
(888, 33.99, '9722331000'),
(889, 48.99, '1408825848'),
(890, 54.99, '0195798767'),
(891, 67.99, 'IND:30000100662216'),
(892, 33.99, '9780345807168'),
(893, 68.99, '9781932100884'),
(894, 32.99, 'IND:30000100662232'),
(895, 37.99, '0545582938'),
(896, 34.99, '9781408865279'),
(897, 55.99, '9781408855928'),
(898, 52.99, '1408810581'),
(899, 49.99, '9781644732083'),
(900, 38.99, '1408825945'),
(901, 64.99, '1338572342'),
(902, 39.99, '9780307958778'),
(903, 33.99, 'PSU:000058699409'),
(904, 50.99, '0606323511'),
(905, 36.99, '9780062194039'),
(906, 62.99, '152661832X'),
(907, 58.99, '1526610302'),
(908, 65.99, '1526618265'),
(909, 55.99, '054506967X'),
(910, 67.99, '1526606224'),
(911, 55.99, '152660616X'),
(912, 59.99, '1526618311'),
(913, 58.99, '1582348286'),
(914, 61.99, '140886911X'),
(915, 64.99, '1408883791'),
(916, 57.99, '1526618222'),
(917, 61.99, '8000021226'),
(918, 41.99, '0545791340'),
(919, 44.99, '1408898144'),
(920, 66.99, '0439294827'),
(921, 33.99, '1526606208'),
(922, 47.99, '9781644732113'),
(923, 52.99, '1526618192'),
(924, 52.99, '1338878956'),
(925, 57.99, '8888002286'),
(926, 54.99, '9781510748170'),
(927, 57.99, '9781408855683'),
(928, 61.99, '8888002308'),
(929, 52.99, '3939308048'),
(930, 70.99, 'OCLC:1313954425'),
(931, 69.99, '9781476632537'),
(932, 35.99, '9781310224485'),
(933, 44.99, '9781476670034'),
(934, 30.99, '9780230119918'),
(935, 32.99, '9780241653159'),
(936, 31.99, '9781459601055'),
(937, 44.99, '0826452329'),
(938, 37.99, '9781498981651'),
(939, 56.99, '8498389968'),
(940, 63.99, '8498383447'),
(941, 58.99, '9783956873263'),
(942, 43.99, '9783668893221'),
(943, 55.99, '9783668060142'),
(944, 70.99, '9783551551931'),
(945, 56.99, '9783551559043'),
(946, 57.99, '1575580675'),
(947, 41.99, '9781793620286'),
(948, 30.99, '0439434866'),
(949, 34.99, '844141629X'),
(950, 67.99, '9780313361982'),
(951, 54.99, '9783640910298'),
(952, 61.99, '9783656180814'),
(953, 54.99, ''),
(954, 30.99, ''),
(955, 64.99, '9788823877894'),
(956, 56.99, '3825872424'),
(957, 51.99, '9783668061446'),
(958, 35.99, '9783638672597'),
(959, 45.99, '9783656399872'),
(960, 44.99, '9783656976448'),
(961, 49.99, '9781781101063'),
(962, 61.99, '9781781102145'),
(963, 45.99, 'STANFORD:36105132592622'),
(964, 37.99, '9780230279711'),
(965, 39.99, '9781403918390'),
(966, 60.99, '9781781100486'),
(967, 45.99, 'UCSC:32106019703807'),
(968, 59.99, '9781781105672'),
(969, 51.99, '9781781100516'),
(970, 65.99, '0747532699'),
(971, 43.99, '9781338756289'),
(972, 64.99, '9781781103715'),
(973, 60.99, 'PKEY:90159886'),
(974, 30.99, '0470627352'),
(975, 65.99, '9781440637599'),
(976, 49.99, '9781781103692'),
(977, 53.99, '9781935251378'),
(978, 34.99, '9781781104064'),
(979, 68.99, '9781408855935'),
(980, 54.99, '655532323X'),
(981, 59.99, 'IND:30000100662224'),
(982, 53.99, '9781847144188'),
(983, 59.99, '9781407182025'),
(984, 43.99, '1448832888'),
(985, 68.99, '9781645173762'),
(986, 35.99, '1859846661'),
(987, 42.99, '9781137016546'),
(988, 45.99, '9781421410340'),
(989, 32.99, '9781846946493'),
(990, 59.99, '9781101133132'),
(991, 42.99, '1591021332'),
(992, 57.99, '9781932100594'),
(993, 65.99, '9780307813565'),
(994, 41.99, '9780786499304'),
(995, 42.99, '9780977231003'),
(996, 69.99, '9781647223151'),
(997, 65.99, '0664226698'),
(998, 54.99, ''),
(999, 54.99, '9781351978729'),
(1000, 61.99, '655532323X'),
(1001, 42.99, '9781457499777'),
(1002, 45.99, '9781438454474'),
(1003, 60.99, '8466610340'),
(1004, 45.99, '9780976540601'),
(1005, 56.99, '9781440508523'),
(1006, 56.99, '074253779X'),
(1007, 41.99, '9781476673547'),
(1008, 66.99, '6580921595'),
(1009, 54.99, '857351244X'),
(1010, 54.99, '8573514353'),
(1011, 45.99, '6559605833'),
(1012, 54.99, '8565484262'),
(1013, 70.99, '8573517948'),
(1014, 66.99, '8583682526'),
(1015, 36.99, '8583681147'),
(1016, 52.99, '8583681538'),
(1017, 34.99, '9783736785847'),
(1018, 59.99, '9783736759701'),
(1019, 65.99, '9783736773196'),
(1020, 54.99, '9783736709997'),
(1021, 39.99, '9783736789920'),
(1022, 47.99, '9783736776227'),
(1023, 50.99, '9781401235871'),
(1024, 42.99, '9781401255770'),
(1025, 38.99, '9783736782259'),
(1026, 33.99, '9781476606323'),
(1027, 66.99, '9781779515926'),
(1028, 69.99, '9781779522214'),
(1029, 51.99, '9781401271701'),
(1030, 57.99, '9781401235864'),
(1031, 36.99, '9781401235833'),
(1032, 60.99, '9781401250171'),
(1033, 63.99, '9781401252489'),
(1034, 67.99, '9783736775459'),
(1035, 35.99, '9783736771338'),
(1036, 60.99, '0930289560'),
(1037, 43.99, '9781623567521'),
(1038, 59.99, '9781401294069'),
(1039, 45.99, '9781779515933'),
(1040, 42.99, '9781779514899'),
(1041, 49.99, '9781401259884'),
(1042, 44.99, '9781401289898'),
(1043, 64.99, '9781401282837'),
(1044, 47.99, '9781401255152'),
(1045, 49.99, '9780744064674'),
(1046, 56.99, '9781401242282'),
(1047, 48.99, '9783736725256'),
(1048, 42.99, '9791026833086'),
(1049, 68.99, '9783736790018'),
(1050, 62.99, '9781401260439'),
(1051, 47.99, '9781779510914'),
(1052, 52.99, '9781779519405'),
(1053, 40.99, '9781401280154'),
(1054, 63.99, '9780470532805'),
(1055, 53.99, '9781779515780'),
(1056, 64.99, '9781779506405'),
(1057, 39.99, '9781401244439'),
(1058, 69.99, '9781779509024'),
(1059, 65.99, '9781401252649'),
(1060, 35.99, '9781401235826'),
(1061, 53.99, '9781401235857'),
(1062, 46.99, '9781401276577'),
(1063, 56.99, '9781401242046'),
(1064, 54.99, '9781401296506'),
(1065, 49.99, '9780671774554'),
(1066, 65.99, '9788581051529'),
(1067, 62.99, '9786556303734'),
(1068, 61.99, ''),
(1069, 37.99, '9788835446866'),
(1070, 47.99, '9788581744704'),
(1071, 42.99, '9781643150055'),
(1072, 62.99, '9781524692025'),
(1073, 43.99, ''),
(1074, 68.99, '9789895284597'),
(1075, 37.99, '9780486316840'),
(1076, 66.99, '852131034X'),
(1077, 59.99, '8574194506'),
(1078, 45.99, 'HARVARD:HWR8XA'),
(1079, 68.99, '1879333007'),
(1080, 42.99, 'PKEY:CLDEAU43097'),
(1081, 42.99, ''),
(1082, 36.99, 'PKEY:CLDEAU48034'),
(1083, 66.99, ''),
(1084, 60.99, ''),
(1085, 40.99, 'UOM:39015025964969'),
(1086, 50.99, ''),
(1087, 45.99, '9786555441321'),
(1088, 63.99, '8578311124'),
(1089, 44.99, '9789898659224'),
(1090, 58.99, '9788563993052'),
(1091, 45.99, '9788581301389'),
(1092, 35.99, '9781526066169'),
(1093, 68.99, '9781526040596'),
(1094, 30.99, 'EAN:3410002541093'),
(1095, 47.99, '9788560018000'),
(1096, 36.99, '9788542806014'),
(1097, 50.99, '8593156630'),
(1098, 45.99, '9786556600505'),
(1099, 69.99, '9788525409515'),
(1100, 65.99, '9788599187852'),
(1101, 51.99, '9788560018079'),
(1102, 54.99, ''),
(1103, 51.99, ''),
(1104, 59.99, '6587817564'),
(1105, 47.99, '9786559573806'),
(1106, 63.99, ''),
(1107, 34.99, '8589885216'),
(1108, 30.99, '9788532645739'),
(1109, 51.99, ''),
(1110, 34.99, '6580921048'),
(1111, 42.99, 'PKEY:CLDEAU57852'),
(1112, 37.99, '9781973531333'),
(1113, 39.99, '8501063150'),
(1114, 43.99, '6556405787'),
(1115, 46.99, '9788584611263'),
(1116, 53.99, 'BCUL:1092214653'),
(1117, 53.99, 'MINN:31951002292866T'),
(1118, 46.99, 'UTEXAS:059173016256008'),
(1119, 62.99, '9783030792602'),
(1120, 51.99, 'NYPL:33433075849152'),
(1121, 30.99, 'PRNC:32101063831927'),
(1122, 41.99, 'BL:A0019259713'),
(1123, 41.99, 'BL:A0024320555'),
(1124, 32.99, 'IBNN:BNA01001464151'),
(1125, 63.99, 'OXFORD:555067345'),
(1126, 58.99, 'BL:A0020044228'),
(1127, 51.99, '9789004322332'),
(1128, 58.99, 'IBNF:CF002210217'),
(1129, 53.99, 'IBNN:BN001705225'),
(1130, 56.99, 'GENT:900000227554'),
(1131, 39.99, 'ONB:+Z19823910X'),
(1132, 68.99, 'UOM:39015082976690'),
(1133, 47.99, '9789004337725'),
(1134, 39.99, 'STANFORD:36105111009937'),
(1135, 46.99, 'BL:A0018994086'),
(1136, 34.99, 'OXFORD:590770414'),
(1137, 37.99, 'BL:A0017675530'),
(1138, 70.99, 'OXFORD:N11727083'),
(1139, 70.99, 'UOM:39015067076128'),
(1140, 70.99, 'BL:A0022407179'),
(1141, 43.99, 'OXFORD:600085589'),
(1142, 61.99, 'NYPL:33433000288815'),
(1143, 37.99, 'HARVARD:32044080263353'),
(1144, 58.99, 'UCAL:B3146155'),
(1145, 32.99, 'BL:A0021119678'),
(1146, 45.99, 'BL:A0026223478'),
(1147, 68.99, 'BL:A0018224474'),
(1148, 32.99, '9788550303635'),
(1149, 32.99, '9788550303970'),
(1150, 42.99, '8550303968'),
(1151, 35.99, '9788520924112'),
(1152, 69.99, '854260573X'),
(1153, 66.99, '9788583861799'),
(1154, 67.99, '9786589678472'),
(1155, 68.99, '9786587435961'),
(1156, 53.99, '9788504018974'),
(1157, 49.99, '9789896613662'),
(1158, 63.99, '9788595085336'),
(1159, 43.99, '9788532287885'),
(1160, 33.99, '9786560050594'),
(1161, 56.99, '9788537811054'),
(1162, 50.99, '9786586723762'),
(1163, 70.99, '9788525426093'),
(1164, 56.99, '9788540505391'),
(1165, 44.99, 'IND:30000088077056'),
(1166, 46.99, '9786588437858'),
(1167, 62.99, '9786556740966'),
(1168, 49.99, '9788522014743'),
(1169, 49.99, '9788534944168'),
(1170, 65.99, '9781526076984'),
(1171, 51.99, '9786586490619'),
(1172, 31.99, '9786558178873'),
(1173, 53.99, '6587817939'),
(1174, 43.99, '9788506085844'),
(1175, 45.99, ''),
(1176, 62.99, 'PKEY:CLDEAU24721'),
(1177, 62.99, 'PKEY:CLDEAU61804'),
(1178, 46.99, '655870255X'),
(1179, 45.99, '9786586742138'),
(1180, 54.99, '655870255X'),
(1181, 61.99, '9781526068439'),
(1182, 48.99, '9798525847606'),
(1183, 32.99, '9786558200390'),
(1184, 36.99, 'EAN:3410005865240'),
(1185, 66.99, '6559572846'),
(1186, 66.99, '8538901974'),
(1187, 53.99, '9786555790405'),
(1188, 33.99, 'EAN:3410001324888'),
(1189, 41.99, '9788563382504'),
(1190, 46.99, '9788537814741'),
(1191, 42.99, '6559572854'),
(1192, 64.99, '6555246111'),
(1193, 31.99, '9786586881318'),
(1194, 63.99, '8563042769'),
(1195, 36.99, '9789893733141'),
(1196, 37.99, 'PKEY:CLDEAU13127'),
(1197, 67.99, '6556170003'),
(1198, 55.99, '9786556401393'),
(1199, 63.99, '9786553840300'),
(1200, 54.99, '9788561403508'),
(1201, 47.99, '8520437036'),
(1202, 51.99, '8532651186'),
(1203, 56.99, '8522005230'),
(1204, 65.99, '856709710X'),
(1205, 43.99, '8542815998'),
(1206, 53.99, '9788538098652'),
(1207, 52.99, '8520440754'),
(1208, 69.99, '8520440711'),
(1209, 39.99, 'PKEY:CLDEAU47257'),
(1210, 65.99, '6588444621'),
(1211, 49.99, '9798664505672'),
(1212, 45.99, 'EAN:3410006106502'),
(1213, 31.99, '1519047037'),
(1214, 39.99, '8520440738'),
(1215, 34.99, ''),
(1216, 69.99, '8579308674'),
(1217, 51.99, '9788576848820'),
(1218, 31.99, '8520440746'),
(1219, 43.99, '8574066591'),
(1220, 42.99, '6559800466'),
(1221, 53.99, '8520436897'),
(1222, 44.99, '8582177917'),
(1223, 47.99, ''),
(1224, 38.99, '8520435203'),
(1225, 67.99, ''),
(1226, 63.99, 'PKEY:CLDEAU24721'),
(1227, 50.99, 'PKEY:CLDEAU61804'),
(1228, 42.99, '655870255X'),
(1229, 35.99, '655870255X'),
(1230, 70.99, 'EAN:3410005865240'),
(1231, 55.99, 'EAN:3410001324888'),
(1232, 59.99, 'PKEY:CLDEAU13127'),
(1233, 54.99, '856709710X'),
(1234, 41.99, 'PKEY:CLDEAU47257'),
(1235, 49.99, 'EAN:3410006106502'),
(1236, 58.99, ''),
(1237, 63.99, ''),
(1238, 40.99, '9788530400224'),
(1239, 44.99, 'PKEY:CLDEAU47257'),
(1240, 44.99, ''),
(1241, 61.99, 'PKEY:CLDEAU24721'),
(1242, 59.99, 'PKEY:CLDEAU61804'),
(1243, 35.99, '9781526050540'),
(1244, 47.99, 'EAN:3410005865240'),
(1245, 61.99, '9788520945063'),
(1246, 64.99, '8520924158'),
(1247, 49.99, '9788576847601'),
(1248, 51.99, 'UCAL:B2855989'),
(1249, 62.99, 'PKEY:CLDEAU13127'),
(1250, 69.99, '655870255X'),
(1251, 60.99, ''),
(1252, 49.99, '9798551261667'),
(1253, 48.99, '9788527616140'),
(1254, 30.99, ''),
(1255, 30.99, '9786500816808'),
(1256, 36.99, '9783754600108'),
(1257, 51.99, 'UCAL:B2855989'),
(1258, 65.99, '8527901757'),
(1259, 39.99, '8522003157'),
(1260, 59.99, '9798699252510'),
(1261, 43.99, '1980674094'),
(1262, 39.99, '1519046669'),
(1263, 55.99, '8576860562'),
(1264, 48.99, '9786500701319'),
(1265, 53.99, 'OCLC:817714789'),
(1266, 60.99, '655843010X'),
(1267, 52.99, '8567265169'),
(1268, 47.99, '9786555354911'),
(1269, 70.99, '9789878151922'),
(1270, 40.99, 'PKEY:CLDEAU24721'),
(1271, 48.99, '655870255X'),
(1272, 58.99, ''),
(1273, 52.99, '9781526050786'),
(1274, 38.99, 'EAN:3410002485724'),
(1275, 38.99, 'OCLC:817714789'),
(1276, 34.99, '2384651331'),
(1277, 53.99, '1519046626'),
(1278, 34.99, '1519046553'),
(1279, 45.99, '655640120X'),
(1280, 49.99, '852200837X'),
(1281, 38.99, '8503013223'),
(1282, 46.99, 'PKEY:CLDEAU61804'),
(1283, 54.99, '9788581300245'),
(1284, 49.99, '9788506002711'),
(1285, 57.99, ''),
(1286, 52.99, '9786559800476'),
(1287, 40.99, '9786555301472'),
(1288, 54.99, ''),
(1289, 58.99, '8574733210'),
(1290, 60.99, '8573262540'),
(1291, 65.99, '9788524922893'),
(1292, 44.99, '9789892324159'),
(1293, 67.99, 'OCLC:79855867'),
(1294, 51.99, '9788515034024'),
(1295, 50.99, '8515030497'),
(1296, 40.99, '9786557067215'),
(1297, 62.99, '9798674191896'),
(1298, 69.99, '0666831769'),
(1299, 55.99, '9786550472535'),
(1300, 49.99, '9788593991943'),
(1301, 62.99, '1098340582'),
(1302, 33.99, '9786556407302'),
(1303, 60.99, 'BL:A0023820464'),
(1304, 47.99, 'NYPL:33433082371760'),
(1305, 70.99, 'SRLF:AA0007250210'),
(1306, 43.99, '9786559823284'),
(1307, 62.99, 'BSB:BSB10780106'),
(1308, 61.99, 'UCM:5315927707'),
(1309, 63.99, '9791220117685'),
(1310, 52.99, 'IBNF:CF005791066'),
(1311, 41.99, 'OXFORD:555059771'),
(1312, 59.99, 'ONB:+Z207705100'),
(1313, 33.99, 'WISC:89069727634'),
(1314, 40.99, 'EAN:3410002485724'),
(1315, 37.99, 'OCLC:977059913'),
(1316, 70.99, '854281598X'),
(1317, 59.99, 'OCLC:817714789'),
(1318, 53.99, '655640120X'),
(1319, 54.99, '852200837X'),
(1320, 40.99, 'PKEY:CLDEAU61804'),
(1321, 54.99, '152012466X'),
(1322, 59.99, ''),
(1323, 46.99, '8551304100'),
(1324, 61.99, 'EAN:3410006106502'),
(1325, 56.99, ''),
(1326, 30.99, '9788593660061'),
(1327, 44.99, 'OCLC:977059913'),
(1328, 52.99, '8581303080'),
(1329, 53.99, '8535642080'),
(1330, 52.99, '9788593660078'),
(1331, 68.99, 'OCLC:817714789'),
(1332, 58.99, '8595080224'),
(1333, 53.99, '854281598X'),
(1334, 50.99, '8542816064'),
(1335, 53.99, '6555002778'),
(1336, 38.99, '6555478632'),
(1337, 55.99, '854322781X'),
(1338, 66.99, 'UCAL:B2855989'),
(1339, 56.99, 'EAN:3410002485724'),
(1340, 44.99, 'OCLC:977059913'),
(1341, 35.99, '854281598X'),
(1342, 67.99, 'OCLC:817714789'),
(1343, 49.99, '655640120X'),
(1344, 41.99, '852200837X'),
(1345, 51.99, 'PKEY:CLDEAU61804'),
(1346, 66.99, ''),
(1347, 46.99, ''),
(1348, 63.99, 'OCLC:79855867'),
(1349, 35.99, 'BL:A0023820464'),
(1350, 46.99, 'NYPL:33433082371760'),
(1351, 34.99, 'SRLF:AA0007250210'),
(1352, 33.99, 'BSB:BSB10780106'),
(1353, 69.99, 'UCM:5315927707'),
(1354, 30.99, 'IBNF:CF005791066'),
(1355, 59.99, 'OXFORD:555059771'),
(1356, 46.99, 'ONB:+Z207705100'),
(1357, 42.99, 'WISC:89069727634'),
(1358, 66.99, 'PKEY:CLDEAU24721'),
(1359, 47.99, '655870255X'),
(1360, 70.99, ''),
(1361, 62.99, 'EAN:3410002485724'),
(1362, 57.99, 'OCLC:817714789'),
(1363, 45.99, '655640120X'),
(1364, 41.99, '852200837X'),
(1365, 39.99, 'PKEY:CLDEAU61804'),
(1366, 41.99, ''),
(1367, 57.99, ''),
(1368, 61.99, 'OCLC:79855867'),
(1369, 39.99, 'BL:A0023820464'),
(1370, 32.99, 'NYPL:33433082371760'),
(1371, 45.99, 'SRLF:AA0007250210'),
(1372, 61.99, 'BSB:BSB10780106'),
(1373, 68.99, 'UCM:5315927707'),
(1374, 70.99, 'IBNF:CF005791066'),
(1375, 52.99, 'OXFORD:555059771'),
(1376, 63.99, 'ONB:+Z207705100'),
(1377, 46.99, 'WISC:89069727634'),
(1378, 57.99, '9788576835196'),
(1379, 42.99, '9789896237356'),
(1380, 68.99, '9786586070149'),
(1381, 39.99, '9786550080198'),
(1382, 43.99, '9788550704746'),
(1383, 34.99, '8576833603'),
(1384, 59.99, '9789897875694'),
(1385, 57.99, '9789896237332'),
(1386, 62.99, '9789896237738'),
(1387, 68.99, '9789896237479'),
(1388, 32.99, '9789896237455'),
(1389, 61.99, '9789896237578'),
(1390, 35.99, '9789896237493'),
(1391, 44.99, '9789896237431'),
(1392, 69.99, '9789896237370'),
(1393, 59.99, '9789896237639'),
(1394, 52.99, '9789896237530'),
(1395, 37.99, '9789896237592'),
(1396, 42.99, '9789896237394'),
(1397, 39.99, '9789896237516'),
(1398, 51.99, '9789896237554'),
(1399, 59.99, '9789896237615'),
(1400, 62.99, '9789896237417'),
(1401, 37.99, '9788550703657'),
(1402, 34.99, '9788550701455'),
(1403, 70.99, '9788576835189'),
(1404, 58.99, '9788576837008'),
(1405, 33.99, '9788550702483'),
(1406, 37.99, '9786586070644'),
(1407, 59.99, '9788550700618'),
(1408, 34.99, '9788576838265'),
(1409, 46.99, '9788576839446'),
(1410, 48.99, '9788576835219'),
(1411, 34.99, '9788576835233'),
(1412, 39.99, '9788576836162'),
(1413, 69.99, '9788576835226'),
(1414, 33.99, '9788576835202'),
(1415, 68.99, 'STANFORD:36105117538228'),
(1416, 68.99, 'UTEXAS:059173023435255'),
(1417, 66.99, 'IND:30000090205513'),
(1418, 63.99, 'UTEXAS:059173023486245'),
(1419, 49.99, 'STANFORD:36105043103964'),
(1420, 68.99, 'UTEXAS:059173015245731'),
(1421, 56.99, 'UVA:X001558347'),
(1422, 35.99, 'STANFORD:36105115163052'),
(1423, 70.99, 'UCAL:C2710634'),
(1424, 35.99, 'UTEXAS:059173015369858'),
(1425, 57.99, 'UTEXAS:059173013744388'),
(1426, 30.99, 'UTEXAS:059173002354858'),
(1427, 40.99, 'UTEXAS:059173018587152'),
(1428, 59.99, 'UTEXAS:059173022592702'),
(1429, 32.99, 'UTEXAS:059173023898049'),
(1430, 66.99, '9788562500794'),
(1431, 31.99, '9722330101'),
(1432, 67.99, '9786555600155'),
(1433, 59.99, '9722364839'),
(1434, 43.99, '9785041916916'),
(1435, 47.99, '9780747597308'),
(1436, 56.99, '1417628472'),
(1437, 64.99, '9782226432032'),
(1438, 62.99, '9780380807345'),
(1439, 35.99, '9780062202796'),
(1440, 57.99, '8492429747'),
(1441, 39.99, '847888579X'),
(1442, 68.99, '9780060825430'),
(1443, 39.99, '8804591935'),
(1444, 48.99, '0062379828'),
(1445, 52.99, '857980048X'),
(1446, 37.99, '1408873028'),
(1447, 56.99, '2226193448'),
(1448, 44.99, '9781625178732'),
(1449, 59.99, '8551006754'),
(1450, 69.99, 'UOM:39015096563179'),
(1451, 58.99, '0060825448'),
(1452, 30.99, '1085811018'),
(1453, 46.99, '1706612516'),
(1454, 59.99, '1703923200'),
(1455, 50.99, '1070254592'),
(1456, 33.99, '9780557531745'),
(1457, 68.99, '1092929118'),
(1458, 54.99, '1677471735'),
(1459, 32.99, '1712381806'),
(1460, 67.99, '1080122605'),
(1461, 65.99, '1071250612'),
(1462, 36.99, '1092135138'),
(1463, 38.99, '9788418637032'),
(1464, 69.99, '1090394861'),
(1465, 54.99, '9780062372765'),
(1466, 35.99, '1099396328'),
(1467, 35.99, '108664087X'),
(1468, 48.99, '1695233018'),
(1469, 58.99, '1676523308'),
(1470, 64.99, '170190196X'),
(1471, 52.99, '1696708478'),
(1472, 57.99, '167164770X'),
(1473, 61.99, '1095703390'),
(1474, 61.99, '1090803591'),
(1475, 69.99, '1688320091'),
(1476, 39.99, '9788763831352'),
(1477, 69.99, '1097991369'),
(1478, 53.99, '1686004907'),
(1479, 39.99, '1076139590'),
(1480, 40.99, '1096469812'),
(1481, 39.99, '1408803453'),
(1482, 35.99, '109884680X'),
(1483, 68.99, '1795555025'),
(1484, 45.99, '1073749959'),
(1485, 49.99, '1073695204'),
(1486, 68.99, '8416240248'),
(1487, 67.99, '1704900883'),
(1488, 34.99, '1095061232'),
(1489, 43.99, '6555127333'),
(1490, 58.99, ''),
(1491, 58.99, '9781974723096'),
(1492, 38.99, '6525908671'),
(1493, 48.99, '1974709930'),
(1494, 62.99, '9798673387986'),
(1495, 39.99, '9798686542211'),
(1496, 66.99, '9798545316922'),
(1497, 35.99, '9798686544598'),
(1498, 41.99, '9798576002177'),
(1499, 55.99, '9798467608372'),
(1500, 66.99, '9782820339072'),
(1501, 57.99, '8467941154'),
(1502, 39.99, '1974722783'),
(1503, 54.99, '1974741427'),
(1504, 61.99, ''),
(1505, 49.99, '8467947993'),
(1506, 40.99, '8467946474'),
(1507, 49.99, '8467946458'),
(1508, 53.99, '8467948000'),
(1509, 56.99, '846794417X'),
(1510, 52.99, '8467946466'),
(1511, 48.99, '8467943513'),
(1512, 46.99, '8467945095'),
(1513, 43.99, '9781414057194'),
(1514, 53.99, '8467961562'),
(1515, 59.99, '8467959746'),
(1516, 70.99, '8467947985'),
(1517, 49.99, '8467942622'),
(1518, 69.99, '9783864587733'),
(1519, 32.99, ''),
(1520, 35.99, '9798775188122'),
(1521, 34.99, '9781982137649'),
(1522, 52.99, '9788828771814'),
(1523, 32.99, ''),
(1524, 49.99, ''),
(1525, 51.99, '9781476613352'),
(1526, 62.99, ''),
(1527, 63.99, '6258237193'),
(1528, 60.99, ''),
(1529, 40.99, ''),
(1530, 58.99, ''),
(1531, 34.99, ''),
(1532, 52.99, ''),
(1533, 46.99, '9782820339744'),
(1534, 59.99, '9785042747120'),
(1535, 61.99, '2820337821'),
(1536, 65.99, '3770443187'),
(1537, 48.99, '9783732234585'),
(1538, 49.99, 'IND:30000043463821'),
(1539, 68.99, '9786555603033'),
(1540, 35.99, '9789895641437'),
(1541, 67.99, '9786559813292'),
(1542, 41.99, '9788555343131'),
(1543, 68.99, '9788522513505'),
(1544, 32.99, '9786559813216'),
(1545, 38.99, 'UTEXAS:059173022916291'),
(1546, 41.99, '9781409205364'),
(1547, 33.99, '9789899991927'),
(1548, 57.99, '8575940414'),
(1549, 39.99, ''),
(1550, 44.99, '1497321581'),
(1551, 34.99, 'OXFORD:555059327'),
(1552, 43.99, 'PKEY:CLDEAU29385'),
(1553, 65.99, 'STANFORD:36105122021913'),
(1554, 57.99, '9788563473103'),
(1555, 62.99, '9780000181831'),
(1556, 49.99, '9798442518108'),
(1557, 51.99, '9798509708749'),
(1558, 69.99, '9788581226750'),
(1559, 42.99, '9786525424736'),
(1560, 63.99, '9788578581961'),
(1561, 70.99, '9789892073187'),
(1562, 70.99, 'PKEY:CLDEAU41814'),
(1563, 44.99, '9786525019611'),
(1564, 56.99, 'PRNC:32101074012814'),
(1565, 61.99, '9781094304366'),
(1566, 33.99, '9789722127417'),
(1567, 66.99, '9786525042640'),
(1568, 41.99, 'BL:A0020837507'),
(1569, 45.99, 'BL:A0023236034'),
(1570, 61.99, '9786589448488'),
(1571, 67.99, 'UTEXAS:059173010078734'),
(1572, 61.99, '8574063282'),
(1573, 65.99, 'NYPL:33433006610012'),
(1574, 44.99, 'UOM:39015080706990'),
(1575, 33.99, '9788565317498'),
(1576, 34.99, '9786586079951'),
(1577, 46.99, '9788595130180'),
(1578, 50.99, 'CORNELL:31924002847287'),
(1579, 59.99, 'UTEXAS:059172140542997'),
(1580, 45.99, ''),
(1581, 52.99, '9788542812220'),
(1582, 36.99, '9786586214932'),
(1583, 35.99, ''),
(1584, 40.99, 'UIUC:30112003515522'),
(1585, 53.99, 'STANFORD:36105131866043'),
(1586, 67.99, '9788535217551'),
(1587, 65.99, '9786500320589'),
(1588, 68.99, '9788537814826'),
(1589, 56.99, '9781667400303'),
(1590, 32.99, '9788572167703'),
(1591, 43.99, '9786588132371'),
(1592, 56.99, '9788525429254'),
(1593, 56.99, '9788537810996'),
(1594, 56.99, 'UTEXAS:059173022850397'),
(1595, 41.99, '9789892623542'),
(1596, 45.99, '9786556252544'),
(1597, 47.99, 'HARVARD:32044061559852'),
(1598, 69.99, '9789896617172'),
(1599, 49.99, 'UCD:31175035220568');

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
  `autor` varchar(10) NOT NULL,
  `img_perfil` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_',
  `biografia` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `assinatura_nivel`, `nome_usuario`, `email`, `senha`, `recuperacao`, `autor`, `img_perfil`, `biografia`) VALUES
(4, 0, 'erick', '1', '', '1', '0', 'https://www.petz.com.br/blog/wp-content/uploads/2019/05/cachorro-independente-1-1280x720.jpg', 'jads'),
(5, 0, 'erick2', '23', '', '23', '0', '', 'ola'),
(6, 0, 'b', 'b', '3', 'b', '0', '', ''),
(7, 0, 'a', 'a', 'a', 'a', '0', '', ''),
(10, 0, 'camila', '2', '2', '2', '0', 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', 'sasd'),
(11, 0, '5', '5', '5', '5', '0', '', ''),
(12, 0, '2134', '2222', '1', '1', '0', 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', ''),
(13, 0, 'o', 'o', '', 'o', '0', 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', 'oii'),
(14, 0, 'l', 'l', 'l', 'l', '0', 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', ''),
(15, 0, '65', '56', '56', '56', '0', 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', ''),
(16, 0, 'o', 'agd', 'adfg', 'asdf', '0', 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', ''),
(28, 0, '', '', '', '', 'autor', 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', ''),
(29, 0, '', 'sdf', '', '', 'leitor', 'https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRoT6NNDUONDQmlthWrqIi_frTjsjQT4UZtsJsuxqxLiaFGNl5s3_pBIVxS6-VsFUP_', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
