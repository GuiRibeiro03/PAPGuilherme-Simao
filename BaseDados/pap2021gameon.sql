/*
 Navicat Premium Data Transfer

 Source Server         : Servidor Local
 Source Server Type    : MySQL
 Source Server Version : 50728
 Source Host           : localhost:3306
 Source Schema         : pap2021gameon

 Target Server Type    : MySQL
 Target Server Version : 50728
 File Encoding         : 65001

 Date: 20/04/2021 22:24:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comentarios
-- ----------------------------
DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios`  (
  `comentarioId` int(11) NOT NULL AUTO_INCREMENT,
  `comentarioData` datetime NOT NULL,
  `comentarioTexto` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `comentarioPerfilId` int(11) NOT NULL,
  `comentarioEntidade` enum('noticia','review') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `comentarioEntidadeId` int(11) NOT NULL,
  PRIMARY KEY (`comentarioId`) USING BTREE,
  INDEX `fk_comentarios_perfis1_idx`(`comentarioPerfilId`) USING BTREE,
  CONSTRAINT `fk_comentarios_perfis1` FOREIGN KEY (`comentarioPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comentarios
-- ----------------------------
INSERT INTO `comentarios` VALUES (1, '2021-04-14 14:09:45', 'Muito fixe', 2, 'review', 15);
INSERT INTO `comentarios` VALUES (2, '2021-04-13 15:53:00', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, 'review', 15);
INSERT INTO `comentarios` VALUES (3, '2021-04-14 17:34:20', 'awdawdad', 2, 'noticia', 9);
INSERT INTO `comentarios` VALUES (4, '2021-04-15 18:51:00', 'awdad', 1, 'review', 15);
INSERT INTO `comentarios` VALUES (5, '2021-04-15 18:53:00', 'Boas ESTA CENA JA FUNCA', 1, 'review', 15);
INSERT INTO `comentarios` VALUES (8, '2021-04-15 21:01:00', 'awdada', 1, 'noticia', 9);
INSERT INTO `comentarios` VALUES (9, '2021-04-15 21:02:00', 'awdadad', 1, 'noticia', 10);
INSERT INTO `comentarios` VALUES (10, '2021-04-15 21:02:00', 'ueheuh little comment', 1, 'noticia', 10);
INSERT INTO `comentarios` VALUES (11, '2021-04-16 09:57:00', 'dawdawd', 2, 'review', 15);
INSERT INTO `comentarios` VALUES (12, '2021-04-16 10:06:00', 'Ã¨ fixe', 1, 'noticia', 10);
INSERT INTO `comentarios` VALUES (13, '2021-04-16 10:09:00', 'adkwujhbAIWUDhboIAUWHOda', 1, 'review', 15);
INSERT INTO `comentarios` VALUES (14, '2021-04-17 11:48:00', 'Boas', 1, 'review', 30);
INSERT INTO `comentarios` VALUES (15, '2021-04-17 11:48:00', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, 'review', 30);

-- ----------------------------
-- Table structure for empresas
-- ----------------------------
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas`  (
  `empresaId` int(11) NOT NULL AUTO_INCREMENT,
  `empresaNome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`empresaId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of empresas
-- ----------------------------
INSERT INTO `empresas` VALUES (4, 'Sony');
INSERT INTO `empresas` VALUES (5, 'Insomniac Games');
INSERT INTO `empresas` VALUES (6, 'Sucker Punch');
INSERT INTO `empresas` VALUES (7, 'Naughty Dog');
INSERT INTO `empresas` VALUES (8, 'Capcom');
INSERT INTO `empresas` VALUES (9, 'Ubisoft');
INSERT INTO `empresas` VALUES (10, 'CD Projekt RED');
INSERT INTO `empresas` VALUES (11, 'Square Enix');
INSERT INTO `empresas` VALUES (12, 'Konami');
INSERT INTO `empresas` VALUES (13, 'Bluepoint');
INSERT INTO `empresas` VALUES (14, 'Riot Games');
INSERT INTO `empresas` VALUES (15, 'Quantic Dream');

-- ----------------------------
-- Table structure for generos
-- ----------------------------
DROP TABLE IF EXISTS `generos`;
CREATE TABLE `generos`  (
  `generoId` int(11) NOT NULL AUTO_INCREMENT,
  `generoNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`generoId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of generos
-- ----------------------------
INSERT INTO `generos` VALUES (3, 'FPS');
INSERT INTO `generos` VALUES (4, 'RPG');
INSERT INTO `generos` VALUES (5, 'MOBA');
INSERT INTO `generos` VALUES (6, 'MMO-RPG');
INSERT INTO `generos` VALUES (7, 'HACK AND SLASH');

-- ----------------------------
-- Table structure for jogogeneros
-- ----------------------------
DROP TABLE IF EXISTS `jogogeneros`;
CREATE TABLE `jogogeneros`  (
  `jogoGeneroGeneroId` int(11) NOT NULL,
  `jogoGeneroJogoId` int(11) NOT NULL,
  PRIMARY KEY (`jogoGeneroGeneroId`, `jogoGeneroJogoId`) USING BTREE,
  INDEX `fk_generos_has_jogos_jogos1_idx`(`jogoGeneroJogoId`) USING BTREE,
  INDEX `fk_generos_has_jogos_generos1_idx`(`jogoGeneroGeneroId`) USING BTREE,
  CONSTRAINT `fk_generos_has_jogos_generos1` FOREIGN KEY (`jogoGeneroGeneroId`) REFERENCES `generos` (`generoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_generos_has_jogos_jogos1` FOREIGN KEY (`jogoGeneroJogoId`) REFERENCES `jogos` (`jogoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jogogeneros
-- ----------------------------
INSERT INTO `jogogeneros` VALUES (4, 24);
INSERT INTO `jogogeneros` VALUES (4, 25);
INSERT INTO `jogogeneros` VALUES (7, 29);
INSERT INTO `jogogeneros` VALUES (5, 38);
INSERT INTO `jogogeneros` VALUES (6, 39);

-- ----------------------------
-- Table structure for jogoplataformas
-- ----------------------------
DROP TABLE IF EXISTS `jogoplataformas`;
CREATE TABLE `jogoplataformas`  (
  `jogoPlataformaPlataformaId` int(11) NOT NULL,
  `jogoPlataformaJogoId` int(11) NOT NULL,
  PRIMARY KEY (`jogoPlataformaPlataformaId`, `jogoPlataformaJogoId`) USING BTREE,
  INDEX `fk_plataformas_has_jogos_jogos1_idx`(`jogoPlataformaJogoId`) USING BTREE,
  INDEX `fk_plataformas_has_jogos_plataformas_idx`(`jogoPlataformaPlataformaId`) USING BTREE,
  CONSTRAINT `fk_plataformas_has_jogos_jogos1` FOREIGN KEY (`jogoPlataformaJogoId`) REFERENCES `jogos` (`jogoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_plataformas_has_jogos_plataformas` FOREIGN KEY (`jogoPlataformaPlataformaId`) REFERENCES `plataformas` (`plataformaId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jogoplataformas
-- ----------------------------
INSERT INTO `jogoplataformas` VALUES (3, 24);
INSERT INTO `jogoplataformas` VALUES (7, 25);
INSERT INTO `jogoplataformas` VALUES (7, 29);
INSERT INTO `jogoplataformas` VALUES (7, 38);
INSERT INTO `jogoplataformas` VALUES (9, 39);

-- ----------------------------
-- Table structure for jogos
-- ----------------------------
DROP TABLE IF EXISTS `jogos`;
CREATE TABLE `jogos`  (
  `jogoId` int(11) NOT NULL AUTO_INCREMENT,
  `jogoNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jogoSinopse` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jogoTrailer` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `jogoImagemURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jogoGlobalRating` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'N/A',
  `jogoUserRating` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'N/A',
  `jogoPreco` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `jogoEmpresaId` int(11) NOT NULL,
  `jogoDestaque` enum('sim','nao') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'nao',
  PRIMARY KEY (`jogoId`) USING BTREE,
  INDEX `fk_jogos_empresas1_idx`(`jogoEmpresaId`) USING BTREE,
  CONSTRAINT `fk_jogos_empresas1` FOREIGN KEY (`jogoEmpresaId`) REFERENCES `empresas` (`empresaId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jogos
-- ----------------------------
INSERT INTO `jogos` VALUES (24, 'Ghost of Tsushima', 'dawdawadw', '<iframe width=\"1280\" height=\"533\" src=\"https://www.youtube.com/embed/NeQM1c-XCDc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/GhostofTsushima.jpg', '90', 'N/A', 59.00, 6, 'sim');
INSERT INTO `jogos` VALUES (25, 'Cyberpunk 2077', '<p>adwdawdawda</p>', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/s_LncVnecLA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/cyberpunk2077.jpg', '73', 'N/A', 69.00, 10, 'sim');
INSERT INTO `jogos` VALUES (28, 'Demon\'s Soul', 'awdawdawdawd', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/2TMs2E6cms4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/demonsouls.png', '100', 'N/A', 65.00, 13, 'nao');
INSERT INTO `jogos` VALUES (29, 'The Witcher 3: Wild Hunt', 'dwaadadadad', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/XHrskkHf958\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/thewitcher3.jpg', '100', 'N/A', 10.00, 10, 'sim');
INSERT INTO `jogos` VALUES (30, 'The Last of Us Part II', 'wdawdawdad', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/zrunNL3xsUY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/TloU2.jpg', '100', 'N/A', 59.00, 7, 'sim');
INSERT INTO `jogos` VALUES (31, 'Kingdom Hearts 3', '<p>dawdadawdada</p>', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/zrunNL3xsUY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/kingdomHearts3.jpg', '83', 'N/A', 59.00, 11, 'nao');
INSERT INTO `jogos` VALUES (32, 'Devil May Cry 5', 'wadawdawdadawdd', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/zrunNL3xsUY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/devilmaycry5.jpg', '91', 'N/A', 23.00, 8, 'nao');
INSERT INTO `jogos` VALUES (33, 'Beyond Two Souls', 'dawdawdaw', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/zrunNL3xsUY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/beyondtwosouls.jpg', '76', 'N/A', 19.90, 15, 'nao');
INSERT INTO `jogos` VALUES (34, 'Assassin\'s Creed:Valhala', 'dawdadada', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/zrunNL3xsUY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/assassinsValhalla.jpg', '86', 'N/A', 69.00, 9, 'nao');
INSERT INTO `jogos` VALUES (35, 'Heavy Rain', 'awdawda', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/YVYiJ3VSp60\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/heavyrain.jpg', '87', 'N/A', 19.00, 15, 'nao');
INSERT INTO `jogos` VALUES (36, 'Spider-Man: Miles Morales', 'awdawdawdawda', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/NTunTURbyUU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/milesmorales.png', '93', '91', 59.00, 5, 'nao');
INSERT INTO `jogos` VALUES (38, 'League of Legends', '<p>&egrave; freee</p>', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/IzMnCv_lPxI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/lol.jpg', '84', 'N/A', 0.00, 14, 'nao');
INSERT INTO `jogos` VALUES (39, 'Guilherme', '<p>asodijfh&lt;poiasd</p>', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/IPDaHPp-sMs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/telma.jpg', '76', '78', 90.00, 8, 'nao');

-- ----------------------------
-- Table structure for noticias
-- ----------------------------
DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias`  (
  `noticiaId` int(11) NOT NULL AUTO_INCREMENT,
  `noticiaTitulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `noticiaImagemFundoURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `noticiaData` date NOT NULL,
  `noticiaDesenvolvimento` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `noticiaImagemURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `noticiaEscolha` enum('sim','nao') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'nao',
  PRIMARY KEY (`noticiaId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of noticias
-- ----------------------------
INSERT INTO `noticias` VALUES (10, 'Demon Soul\'s Ã© top xuxa', '../img/wallpapers/demonsouls.png', '2021-03-24', '<p>Assassins Creed e fixe... oops afinal &eacute; Demon Souls</p>', '../img/wallpapers/demonioAlmas.jpg', 'sim');
INSERT INTO `noticias` VALUES (12, 'Assassin\'s Creed Valhalla Ã© espantoso', '../img/wallpapers/assassinscreed.jpg', '2021-03-26', '<p>&egrave; bacano</p>', '../img/wallpapers/assassinsCreedWall.jpg', 'nao');
INSERT INTO `noticias` VALUES (13, 'Microsoft anuncia compra de Discord por 10 Mil MilhÃµes â‚¬', 'batmanwWall.jpg', '2021-04-06', '<p>awddad</p>', 'post03.png', 'sim');
INSERT INTO `noticias` VALUES (14, 'Titulo Noticia', '../img/wallpapers/post03.png', '2021-04-16', '<p>&egrave; fixe</p>', 'img/wallpapers/transferir.jpg', 'nao');
INSERT INTO `noticias` VALUES (15, 'AWpdoinAPOWd', 'batmanwWall.jpg', '2021-04-16', '<p>awdadadawd</p>', '', 'nao');

-- ----------------------------
-- Table structure for outlet
-- ----------------------------
DROP TABLE IF EXISTS `outlet`;
CREATE TABLE `outlet`  (
  `outletProdutoId` int(11) NOT NULL,
  `outletPerfilId` int(11) NOT NULL,
  PRIMARY KEY (`outletProdutoId`, `outletPerfilId`) USING BTREE,
  INDEX `fk_produtos_has_perfis_perfis1_idx`(`outletPerfilId`) USING BTREE,
  INDEX `fk_produtos_has_perfis_produtos1_idx`(`outletProdutoId`) USING BTREE,
  CONSTRAINT `fk_produtos_has_perfis_perfis1` FOREIGN KEY (`outletPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_has_perfis_produtos1` FOREIGN KEY (`outletProdutoId`) REFERENCES `produtos` (`produtoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of outlet
-- ----------------------------

-- ----------------------------
-- Table structure for perfis
-- ----------------------------
DROP TABLE IF EXISTS `perfis`;
CREATE TABLE `perfis`  (
  `perfilId` int(11) NOT NULL AUTO_INCREMENT,
  `perfilNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfilAvatarURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfilMorada` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfilTelefone` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfilEmail` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfilUserId` int(11) NOT NULL,
  PRIMARY KEY (`perfilId`) USING BTREE,
  UNIQUE INDEX `perfilUserId_UNIQUE`(`perfilUserId`) USING BTREE,
  INDEX `fk_perfis_users1_idx`(`perfilUserId`) USING BTREE,
  CONSTRAINT `fk_perfis_users1` FOREIGN KEY (`perfilUserId`) REFERENCES `users` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perfis
-- ----------------------------
INSERT INTO `perfis` VALUES (1, 'Guilherme Ribeiro', 'img/pessoas/bacanoEu.jpg', 'rua da tua mae', '9191', 'awd@gmail.com', 1);
INSERT INTO `perfis` VALUES (2, 'Simão Bercial', 'img/pessoas/bacano1.jpg', 'daiwd', '13', 'daw', 2);
INSERT INTO `perfis` VALUES (3, 'Leandro Pereira', 'img/pessoas/bacano3.jpg', 'dwad', '12', 'dwaom@gmail.com', 3);

-- ----------------------------
-- Table structure for plataformas
-- ----------------------------
DROP TABLE IF EXISTS `plataformas`;
CREATE TABLE `plataformas`  (
  `plataformaId` int(11) NOT NULL AUTO_INCREMENT,
  `plataformaNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`plataformaId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of plataformas
-- ----------------------------
INSERT INTO `plataformas` VALUES (3, 'Playstation');
INSERT INTO `plataformas` VALUES (6, 'Xbox');
INSERT INTO `plataformas` VALUES (7, 'Computador');
INSERT INTO `plataformas` VALUES (8, 'Stadia');
INSERT INTO `plataformas` VALUES (9, 'Nintendo Switch');

-- ----------------------------
-- Table structure for produtos
-- ----------------------------
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos`  (
  `produtoId` int(11) NOT NULL AUTO_INCREMENT,
  `produtoNome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `produtoDescricao` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `produtoImagemURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `produtoPreco` decimal(10, 2) NOT NULL,
  `produtoTipo` enum('consola','acessorio','outlet') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'consola',
  PRIMARY KEY (`produtoId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produtos
-- ----------------------------
INSERT INTO `produtos` VALUES (1, 'Ps4 Slim 500Gb', '<p>dawdjblAWdlkAWJ</p>', '../img/produtos/ps4.png', 300.00, 'consola');
INSERT INTO `produtos` VALUES (2, 'Iphone 8', '<p><strong><em>caro</em></strong></p>', '../img/produtos/iphone8.jpg', 230.00, 'outlet');
INSERT INTO `produtos` VALUES (3, 'Dualshock 4', '<p>&egrave; bacano</p>', '../img/produtos/dualshock4.png', 59.90, 'acessorio');
INSERT INTO `produtos` VALUES (4, 'Playstation 5', '<p>&eacute; cara mas boa como o milho</p>', '../img/produtos/playstation5.jpg', 499.90, 'consola');
INSERT INTO `produtos` VALUES (5, 'Xbox 180 180 360', '<p>awd</p>', '../img/produtos/deusVult.jpg', 23.90, 'consola');

-- ----------------------------
-- Table structure for reviews
-- ----------------------------
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews`  (
  `reviewId` int(11) NOT NULL AUTO_INCREMENT,
  `reviewData` date NOT NULL,
  `reviewAutor` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `reviewTexto` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `reviewJogoId` int(11) NOT NULL,
  `reviewImagemURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`reviewId`) USING BTREE,
  INDEX `fk_reviews_jogos1_idx`(`reviewJogoId`) USING BTREE,
  CONSTRAINT `fk_reviews_jogos1` FOREIGN KEY (`reviewJogoId`) REFERENCES `jogos` (`jogoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reviews
-- ----------------------------
INSERT INTO `reviews` VALUES (15, '2021-03-24', 'Amelia ferreira', '<p>Miles Morales &eacute; muita bom</p>', 36, 'img/wallpapers/milesmorales.jpg');
INSERT INTO `reviews` VALUES (17, '2021-03-25', 'Francisco Melo', '<p>wdadadaw</p>', 29, 'img/wallpapers/thewitcher3.jpg');
INSERT INTO `reviews` VALUES (19, '2021-04-01', 'Ferro Rodrigues', '<p>awdawdad</p>', 25, 'img/wallpapers/cyberpunk2077.png');
INSERT INTO `reviews` VALUES (20, '2021-04-07', 'Assassin\'s Creed', '<p>awdada</p>', 34, 'img/wallpapers/assassinscreed.jpg');
INSERT INTO `reviews` VALUES (29, '2021-04-07', 'adwada', '', 28, 'img/wallpapers/demonsouls.png');
INSERT INTO `reviews` VALUES (30, '2021-04-17', 'Bruce Wayne', '', 39, '../img/wallpapers/pt.png');
INSERT INTO `reviews` VALUES (31, '2021-04-17', 'Afonso Henriques', '<p>Patria</p>', 38, 'img/wallpapers/pt.png');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `userState` enum('pendente','ativo','inativo') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'pendente',
  `userType` enum('user','editor','admin') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'user',
  `userPassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`userId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '	' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Guilherme', 'ativo', 'admin', '1');
INSERT INTO `users` VALUES (2, 'Simão', 'ativo', 'user', '2');
INSERT INTO `users` VALUES (3, 'Leandro', 'ativo', 'admin', '3');

SET FOREIGN_KEY_CHECKS = 1;
