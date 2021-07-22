/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : pap2021gameon

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 22/07/2021 11:35:25
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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comentarios
-- ----------------------------
INSERT INTO `comentarios` VALUES (1, '2021-07-12 16:03:31', 'Gostei do jogo', 1, 'noticia', 10);
INSERT INTO `comentarios` VALUES (4, '2021-07-20 13:24:46', 'awdawd', 2, 'review', 17);
INSERT INTO `comentarios` VALUES (5, '2021-07-20 13:25:05', 'ajksdhaiawd', 1, 'review', 17);

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
INSERT INTO `jogogeneros` VALUES (7, 29);

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
INSERT INTO `jogoplataformas` VALUES (7, 29);

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
  `jogoPreco` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `jogoEmpresaId` int(11) NOT NULL,
  `jogoDestaque` enum('sim','nao') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'nao',
  PRIMARY KEY (`jogoId`) USING BTREE,
  INDEX `fk_jogos_empresas1_idx`(`jogoEmpresaId`) USING BTREE,
  CONSTRAINT `fk_jogos_empresas1` FOREIGN KEY (`jogoEmpresaId`) REFERENCES `empresas` (`empresaId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jogos
-- ----------------------------
INSERT INTO `jogos` VALUES (25, 'Cyberpunk 2077', '', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/s_LncVnecLA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/cyberpunk.jpg', 69.00, 10, 'sim');
INSERT INTO `jogos` VALUES (28, 'Demon\'s Souls', '', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/2TMs2E6cms4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/demonsouls.png', 65.00, 13, 'sim');
INSERT INTO `jogos` VALUES (29, 'The Witcher 3: Wild Hunt', '', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/XHrskkHf958\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/thewitcher3.jpg', 5.99, 10, 'sim');
INSERT INTO `jogos` VALUES (36, 'Spider-Man: Miles Morales', 'awdawdawdawda', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/NTunTURbyUU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/milesmorales.png', 59.00, 5, 'nao');

-- ----------------------------
-- Table structure for moradas
-- ----------------------------
DROP TABLE IF EXISTS `moradas`;
CREATE TABLE `moradas`  (
  `moradaId` int(11) NOT NULL AUTO_INCREMENT,
  `moradaTexto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `moradaPerfilId` int(11) NOT NULL,
  `moradaTelefone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`moradaId`) USING BTREE,
  INDEX `fk_moradas_perfis1_idx`(`moradaPerfilId`) USING BTREE,
  CONSTRAINT `fk_moradas_perfis1` FOREIGN KEY (`moradaPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of moradas
-- ----------------------------
INSERT INTO `moradas` VALUES (1, 'Rua Principal Ã€ Pedrulheira, nÂº16', 1, '911952803');
INSERT INTO `moradas` VALUES (9, 'Rua das Trutas', 13, '935623133');
INSERT INTO `moradas` VALUES (10, 'Rua Principal Ã  Pedrulheira', 14, '911952804');
INSERT INTO `moradas` VALUES (13, 'Rua do Rego', 9, '12312312');
INSERT INTO `moradas` VALUES (14, 'Rua principal Ã  pedrulheira NÂº16, 1Âº Dto. , Fr. D', 2, '911952803');
INSERT INTO `moradas` VALUES (15, 'Rua da Boavista', 2, '118237198');
INSERT INTO `moradas` VALUES (16, 'Rua da Boavista', 1, '911952804');
INSERT INTO `moradas` VALUES (17, 'Rua da Boavista', 9, '231');

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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of noticias
-- ----------------------------
INSERT INTO `noticias` VALUES (10, 'Demon Soul\'s ', '../img/wallpapers/demonsouls.png', '2021-07-21', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '../img/wallpapers/demonioAlmas.jpg', 'sim');
INSERT INTO `noticias` VALUES (12, 'Assassin\'s Creed Valhalla Ã© espantoso', '../img/wallpapers/valhala.jpg', '2021-03-26', '', '../img/wallpapers/assassinsCreedWall.jpg', 'nao');
INSERT INTO `noticias` VALUES (13, 'Microsoft anuncia compra de Discord por 10 Mil MilhÃµes â‚¬', '../img/wallpapers/miles.png', '2021-05-03', '<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mauris ex, euismod eget hendrerit sed, vehicula fringilla orci. In non metus vel ex ultricies dignissim congue sed leo. Cras eu odio quis arcu aliquam elementum eu id odio. Nam consectetur felis leo, cursus tincidunt sem consectetur sed. Praesent sit amet tincidunt arcu. Aliquam elementum sit amet nunc eget sagittis. Ut at est tempus, placerat lacus eu, luctus eros. Suspendisse dui justo, cursus et urna et, mollis consectetur mauris. Nunc diam neque, aliquam et ultrices ac, placerat vitae leo. Phasellus eu ullamcorper magna, et dignissim dui. Morbi et mattis nunc.</p>\r\n<p>Phasellus tincidunt suscipit accumsan. Aliquam magna mi, cursus sed convallis vitae, rutrum at leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed nec commodo mi. Vestibulum sodales ac urna sit amet molestie. Vivamus ac nisi vel risus egestas ultricies. Aliquam id orci faucibus, hendrerit tellus vitae, aliquet sapien. Sed eu hendrerit nunc, a consectetur dui. Nullam ac est odio. Fusce quis dignissim neque, nec sodales eros. Fusce rutrum eu dolor in placerat. Fusce faucibus erat id placerat feugiat. Phasellus sed enim enim.</p>\r\n</div>\r\n</div>\r\n<hr />\r\n<div id=\"Content\">\r\n<div id=\"bannerL\"></div>\r\n<div id=\"bannerR\"></div>\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\"></div>\r\n</div>\r\n</div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mauris ex, euismod eget hendrerit sed, vehicula fringilla orci. In non metus vel ex ultricies dignissim congue sed leo. Cras eu odio quis arcu aliquam elementum eu id odio. Nam consectetur felis leo, cursus tincidunt sem consectetur sed. Praesent sit amet tincidunt arcu. Aliquam elementum sit amet nunc eget sagittis. Ut at est tempus, placerat lacus eu, luctus eros. Suspendisse dui justo, cursus et urna et, mollis consectetur mauris. Nunc diam neque, aliquam et ultrices ac, placerat vitae leo. Phasellus eu ullamcorper magna, et dignissim dui. Morbi et mattis nunc.</p>\r\n<p>Phasellus tincidunt suscipit accumsan. Aliquam magna mi, cursus sed convallis vitae, rutrum at leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed nec commodo mi. Vestibulum sodales ac urna sit amet molestie. Vivamus ac nisi vel risus egestas ultricies. Aliquam id orci faucibus, hendrerit tellus vitae, aliquet sapien. Sed eu hendrerit nunc, a consectetur dui. Nullam ac est odio. Fusce quis dignissim neque, nec sodales eros. Fusce rutrum eu dolor in placerat. Fusce faucibus erat id placerat feugiat. Phasellus sed enim enim.</p>', '../img/wallpapers/iphone8.jpg', 'sim');

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
INSERT INTO `outlet` VALUES (17, 1);

-- ----------------------------
-- Table structure for perfis
-- ----------------------------
DROP TABLE IF EXISTS `perfis`;
CREATE TABLE `perfis`  (
  `perfilId` int(11) NOT NULL AUTO_INCREMENT,
  `perfilNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfilAvatarURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'user.jpg',
  `perfilEmail` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `perfilUserId` int(11) NOT NULL,
  PRIMARY KEY (`perfilId`) USING BTREE,
  UNIQUE INDEX `perfilUserId_UNIQUE`(`perfilUserId`) USING BTREE,
  INDEX `fk_perfis_users1_idx`(`perfilUserId`) USING BTREE,
  CONSTRAINT `fk_perfis_users1` FOREIGN KEY (`perfilUserId`) REFERENCES `users` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perfis
-- ----------------------------
INSERT INTO `perfis` VALUES (1, 'Guilherme Ribeiro', 'img/pessoas/bacanoEu.JPG', 'guilhas.ribeiro@gmail.com', 1);
INSERT INTO `perfis` VALUES (2, 'Simão Bercial', 'img/pessoas/bacano1.jpg', 'daw', 2);
INSERT INTO `perfis` VALUES (3, 'Leandro Pereira', 'img/pessoas/bacano3.jpg', 'dwaom@gmail.com', 3);
INSERT INTO `perfis` VALUES (8, 'Luis Ferreira', 'img/pessoas/bacano6.jpg', 'giovanna@gmail.com', 11);
INSERT INTO `perfis` VALUES (9, 'Orlando Lopes', 'img/pessoas/bacano7.jpg', 'orlandolopes@gmail.com', 13);
INSERT INTO `perfis` VALUES (13, 'Miguel', 'img/pessoas/deusVult.jpg', 'miguel@gmail.com', 34);
INSERT INTO `perfis` VALUES (14, 'Teste', 'img/pessoas/deusVult.jpg', 'guilhas.filipe@gmail.com', 35);

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
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produtos
-- ----------------------------
INSERT INTO `produtos` VALUES (7, 'Playstation 4 Slim', '<ul>\r\n<li>Inclui um novo sistema PlayStation 4 fino de 1 TB, um Controlador DualShock 4 sem fio correspondente.</li>\r\n<li>Jogue online com seus amigos, salve jogos online e muito mais com a assinatura do PlayStation Plus (vendida separadamente).</li>\r\n<li>Tudo de bom, jogos, TV, m&uacute;sica e muito mais. Conecte-se com seus amigos para transmitir e comemorar seus momentos &eacute;picos ao pressionar o bot&atilde;o Compartilhar no Twitch, YouTube, Facebook e Twitter.</li>\r\n<li>Montagem n&atilde;o inclu&iacute;da</li>\r\n</ul>', '../img/produtos/ps4.png', 299.90, 'consola');
INSERT INTO `produtos` VALUES (8, 'Playstation 4 Pro 1TB', '', '../img/produtos/ps4pro.png', 399.90, 'consola');
INSERT INTO `produtos` VALUES (9, 'Playstation 5 Disc Version', '<p>Conteudo:</p>\r\n<ul>\r\n<li>1x Playstation 5;</li>\r\n<li>1x Dualsense 5;</li>\r\n<li>1x Cabo de alimenta&ccedil;&atilde;o;</li>\r\n<li>1x Mono-earbud;</li>\r\n</ul>', '../img/produtos/playstation5.jpg', 399.90, 'consola');
INSERT INTO `produtos` VALUES (10, 'Dualshock 4', '<p>dawdawdawdawdawd</p>', '../img/produtos/dualshock4.png', 59.90, 'acessorio');
INSERT INTO `produtos` VALUES (11, 'Dualsense 5', '<p>awdawdawdawdawda</p>', '../img/produtos/dualsense5.png', 79.90, 'acessorio');
INSERT INTO `produtos` VALUES (17, 'Portatil Usado', '<p>CPU: I3 2430U</p>\r\n<p>GPU: N&atilde;o Tem</p>\r\n<p>RAM: 8Gb 2x4Gb 2400Mhz</p>\r\n<p>Armazenamento: WD 500Gb HDD</p>\r\n<p>&nbsp;</p>\r\n<p>Vem com carregador, caixa original e mala por mais 10&euro;.</p>', '../img/produtos/pc.jpg', 200.00, 'outlet');

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
  `reviewGlobalRating` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'N/A',
  `reviewUserRating` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'N/A',
  PRIMARY KEY (`reviewId`) USING BTREE,
  INDEX `fk_reviews_jogos1_idx`(`reviewJogoId`) USING BTREE,
  CONSTRAINT `fk_reviews_jogos1` FOREIGN KEY (`reviewJogoId`) REFERENCES `jogos` (`jogoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reviews
-- ----------------------------
INSERT INTO `reviews` VALUES (15, '2021-03-24', 'Amelia ferreira', '<p>Miles Morales &eacute; muita bom</p>', 36, '../img/wallpapers/milesCapa.png', '90', 'N/A');
INSERT INTO `reviews` VALUES (17, '2021-03-25', 'Francisco Melo', '<div id=\"bannerR\"></div>\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at ante ac sapien volutpat iaculis vitae quis ante. Sed arcu felis, pharetra ac dui et, consectetur congue metus. In eget justo vitae risus iaculis egestas. Ut scelerisque arcu ut vestibulum ornare. Etiam ut est vulputate velit euismod dapibus. Nam erat diam, commodo a nisi condimentum, consequat ornare turpis. Nulla eget feugiat elit. In hac habitasse platea dictumst. Cras quis laoreet turpis, at cursus velit. Aliquam rhoncus lacus eu leo gravida, sed mattis velit vestibulum. In arcu nibh, tempor eget diam et, sollicitudin aliquam lacus. Sed eu egestas est. Fusce venenatis in nisl ut cursus. Phasellus id auctor augue, mollis egestas erat.</p>\r\n<p>Sed non malesuada neque, ut condimentum nisl. Integer ac semper ante, non luctus lectus. Vestibulum vitae ipsum ex. In ipsum tortor, dictum vel luctus quis, sagittis nec lectus. Donec sapien est, tincidunt quis neque eget, ultricies mattis neque. Vestibulum quis ultrices nisi. Suspendisse ultricies ullamcorper nisl, nec luctus neque scelerisque vitae. Cras a vulputate lorem.</p>\r\n</div>\r\n</div>\r\n<p>\"&gt;</p>\r\n<div id=\"bannerL\"></div>\r\n<div id=\"bannerR\"></div>\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at ante ac sapien volutpat iaculis vitae quis ante. Sed arcu felis, pharetra ac dui et, consectetur congue metus. In eget justo vitae risus iaculis egestas. Ut scelerisque arcu ut vestibulum ornare. Etiam ut est vulputate velit euismod dapibus. Nam erat diam, commodo a nisi condimentum, consequat ornare turpis. Nulla eget feugiat elit. In hac habitasse platea dictumst. Cras quis laoreet turpis, at cursus velit. Aliquam rhoncus lacus eu leo gravida, sed mattis velit vestibulum. In arcu nibh, tempor eget diam et, sollicitudin aliquam lacus. Sed eu egestas est. Fusce venenatis in nisl ut cursus. Phasellus id auctor augue, mollis egestas erat.</p>\r\n<p>Sed non malesuada neque, ut condimentum nisl. Integer ac semper ante, non luctus lectus. Vestibulum vitae ipsum ex. In ipsum tortor, dictum vel luctus quis, sagittis nec lectus. Donec sapien est, tincidunt quis neque eget, ultricies mattis neque. Vestibulum quis ultrices nisi. Suspendisse ultricies ullamcorper nisl, nec luctus neque scelerisque vitae. Cras a vulputate lorem.</p>\r\n</div>\r\n</div>', 29, '../img/wallpapers/thewitcher3.jpg', '100', 'N/A');
INSERT INTO `reviews` VALUES (19, '2021-04-01', 'Ferro Rodrigues', '<p>awdawdad</p>', 25, '../img/wallpapers/cyberpunk2077.jpg', '90', 'N/A');

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
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '	' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Guilherme', 'ativo', 'admin', 'c4ca4238a0b923820dcc509a6f75849b');
INSERT INTO `users` VALUES (2, 'Simao', 'ativo', 'user', 'c81e728d9d4c2f636f067f89cc14862c');
INSERT INTO `users` VALUES (3, 'Leandro', 'ativo', 'admin', 'eccbc87e4b5ce2fe28308fd9f2a7baf3');
INSERT INTO `users` VALUES (11, 'Luis', 'ativo', 'user', 'a87ff679a2f3e71d9181a67b7542122c');
INSERT INTO `users` VALUES (13, 'Orlando', 'ativo', 'editor', '30f5791fae9507519eb26e97178d23eb');
INSERT INTO `users` VALUES (34, 'Miguel', 'ativo', 'user', '7a42b64dc4301fe02e9289d297766299');
INSERT INTO `users` VALUES (35, 'Teste', 'pendente', 'user', 'c4ca4238a0b923820dcc509a6f75849b');

SET FOREIGN_KEY_CHECKS = 1;
