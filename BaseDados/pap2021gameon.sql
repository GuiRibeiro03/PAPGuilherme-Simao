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

 Date: 21/07/2021 23:28:11
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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of comentarios
-- ----------------------------
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
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jogogeneros
-- ----------------------------
INSERT INTO `jogogeneros` VALUES (4, 24);
INSERT INTO `jogogeneros` VALUES (4, 25);
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
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jogoplataformas
-- ----------------------------
INSERT INTO `jogoplataformas` VALUES (3, 24);
INSERT INTO `jogoplataformas` VALUES (3, 25);
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
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jogos
-- ----------------------------
INSERT INTO `jogos` VALUES (24, 'Ghost of Tsushima', '<p>Em 1274, uma frota de invas&atilde;o mongol liderada por Khotun Khan pousa na ilha japonesa de Tsushima. O samurai residente Jin Sakai e seu tio Lord Shimura juntam-se ao resto do ex&eacute;rcito da ilha, na tentativa de repelir a invas&atilde;o. No entanto, a batalha termina em desastre, com o ex&eacute;rcito de samurai morto, Shimura capturado e Jin gravemente ferido e deixado como morto. Jin &eacute; encontrado e revivido por Yuna, um ladr&atilde;o local, que o informa que todas as aldeias foram derrotadas pelos mong&oacute;is. Jin invade a fortaleza de Khotun no Castelo Kaneda em uma tentativa de resgatar Shimura, mas &eacute; derrotado por Khotun em combate e &eacute; jogado para fora da ponte.</p>\r\n<p>Percebendo que n&atilde;o pode derrotar os mong&oacute;is sozinho ou com t&aacute;ticas de luta tradicionais de samurai, Jin viaja pela ilha para recrutar aliados e aprender t&eacute;cnicas de luta n&atilde;o convencionais. Ele consegue recrutar Yuna, seu irm&atilde;o ferreiro Taka, o desonesto comerciante Kenji, o mestre arqueiro Ishikawa, a samurai Masako Adachi e seu velho amigo e mercen&aacute;rio Ryuzo e seu Chap&eacute;u de Palha rÅnin. Enquanto Jin interrompe as atividades mong&oacute;is e liberta vilas em toda a ilha, os moradores come&ccedil;am a reverenci&aacute;-lo como \"O Fantasma\". Taka prepara um gancho para Jin escalar as paredes do castelo, e ele convoca seus aliados. Destitu&iacute;dos e famintos, Ryuzo e os chap&eacute;us de palha traem Jin para coletar a recompensa emitida por Jin pelos mong&oacute;is, mas Jin consegue afast&aacute;-los, libertar Shimura e retomar o castelo Kaneda. Apesar da vit&oacute;ria, Khotun j&aacute; havia partido para conquistar o Castelo Shimura ao lado dos homens de Ryuzo.</p>\r\n<p>Para retomar o castelo, Jin recruta Norio, seus monges guerreiros e o cl&atilde; Yarikawa. Shimura recruta o pirata local Goro para contrabandear uma mensagem solicitando refor&ccedil;os para o Shogun, bem como um an&uacute;ncio de que deseja adotar Jin como seu herdeiro. Com um novo ex&eacute;rcito sob o comando de Shimura e refor&ccedil;os do Shogun no caminho, Jin recupera a armadura ancestral de sua fam&iacute;lia do zelador Yuriko, que o ensina a criar veneno. Jin e Taka chegam &agrave; fortaleza, onde s&atilde;o capturados por Khotun. Quando Jin se recusa a se render, Khotun mata Taka. Yuna e Jin escapam da fortaleza e enterram o corpo de Taka perto da fortaleza de Yarikawa, antes que os refor&ccedil;os de samurai do Shogun cheguem. Shimura lidera seu ex&eacute;rcito para um ataque total ao Castelo Shimura, conduzindo os mong&oacute;is para a fortaleza interna. No entanto, Khotun recorre a t&aacute;ticas n&atilde;o convencionais e inflige mortes massivas ao samurai. Sabendo que mais vidas ser&atilde;o perdidas em outro ataque frontal, Jin desafia Shimura e decide envenenar os mong&oacute;is.</p>', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/4XWuS_Tx1Fo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/GhostofTsushima.jpg', 59.00, 6, 'sim');
INSERT INTO `jogos` VALUES (25, 'Cyberpunk 2077', '<p>O jogo come&ccedil;a com a sele&ccedil;&atilde;o de um dos tr&ecirc;s percursos de vida do personagem V (Gavin Drea ou Cherami Leigh): Nomad, Streetkid ou Corpo. Todos os tr&ecirc;s caminhos de vida envolvem V come&ccedil;ando uma nova vida em Night City com o bandido local Jackie Welles (Jason Hightower) e tendo v&aacute;rias aventuras com um netrunner, T-Bug.</p>\r\n<p>Em 2077, o fixador local Dexter DeShawn (Michael-Leon Wooley) contrata V e Welles para roubar um biochip conhecido como \"a Rel&iacute;quia\" da Arasaka Corporation. Eles adquirem a Rel&iacute;quia, mas o plano d&aacute; errado quando testemunham o assassinato do l&iacute;der da megacorp, Saburo Arasaka (Masane Tsukayama), pelas m&atilde;os de seu filho trai&ccedil;oeiro Yorinobu (Hideo Kimura). Yorinobu encobre o assassinato como um envenenamento e aciona uma varredura de seguran&ccedil;a na qual T-Bug &eacute; morto pelos netrunners de Arasaka. V e Welles escapam, mas Welles &eacute; mortalmente ferido no processo, e a caixa protetora da Rel&iacute;quia &eacute; danificada, for&ccedil;ando V a inserir o biochip no cyberware em sua cabe&ccedil;a.</p>\r\n<p>DeShawn, furioso com a aten&ccedil;&atilde;o indesejada da pol&iacute;cia, atira na cabe&ccedil;a de V e deixa V como morto em um aterro sanit&aacute;rio. Ao acordar, V &eacute; assombrado pelo fantasma digital do veterano de guerra que se tornou uma estrela do rock ic&ocirc;nica Johnny Silverhand (Keanu Reeves), que acredita-se ter morrido em 2023 durante uma tentativa de ataque termonuclear na Torre de Arasaka. V aprende com seu ripperdoc Viktor Vector (Michael Gregory) que a bala de DeShawn ativou a nanotecnologia de ressurrei&ccedil;&atilde;o no biochip. Em algumas semanas, as mem&oacute;rias de Silverhand ir&atilde;o sobrescrever irreversivelmente as de V. O biochip n&atilde;o pode ser removido, ent&atilde;o V deve procurar uma maneira de remover Silverhand e sobreviver.</p>', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/LembwKDo1Dk\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/cyberpunk2077.jpg', 69.00, 10, 'sim');
INSERT INTO `jogos` VALUES (28, 'Demon\'s Souls', '<p>Demon\'s Souls se passa no reino de Boletaria. Antigamente, devido ao uso indevido da magia conhecida como Soul Arts, Boletaria foi atacado por um ser chamado o Antigo. O mundo foi quase consumido pelo m&aacute;gico \"Nevoeiro Profundo\" e os dem&ocirc;nios comedores de almas que ele criou. O Antigo foi finalmente adormecido, salvando o que restou de Boletaria, enquanto alguns sobreviventes se tornaram Monumentais de longa vida para alertar as gera&ccedil;&otilde;es futuras. No presente do jogo, o governante de Boletaria, Rei Allant, restaurou as Soul Arts, despertando o Antigo e seu ex&eacute;rcito de dem&ocirc;nios. Boletaria agora est&aacute; sendo consumida por dem&ocirc;nios, com aqueles humanos sem alma se transformando em monstros insanos. Os jogadores assumem o papel de um aventureiro entrando na n&eacute;voa que envolve Boletaria. Depois de ser morto, o jogador acorda no Nexus e encontra um dem&ocirc;nio benevolente chamado Maiden in Black, assim como v&aacute;rios outros personagens.</p>\r\n<p>Agora vinculado ao Nexus at&eacute; que o Antigo retorne ao sono, o jogador viaja para cinco regi&otilde;es de Boletaria, matando os poderosos dem&ocirc;nios que controlam essas &aacute;reas e absorvendo suas almas para aumentar seu poder para que possam enfrentar o Rei Allant. No entanto, o Rei Allant que o jogador enfrenta &eacute; revelado como um impostor demon&iacute;aco. Depois de derrotar o falso Rei Allant, a Donzela de Preto leva o jogador - agora apelidado de \"Matador de Dem&ocirc;nios\" - ao Antigo. O Slayer of Demons enfrenta o verdadeiro Rei Allant, que foi transformado em um dem&ocirc;nio indefeso como uma bolha, dentro do corpo do Antigo. A Donzela de Preto ent&atilde;o chega para colocar o Antigo para dormir novamente. Se o Slayer of Demons deixar o Antigo, eles s&atilde;o saudados como o her&oacute;i do restaurado, embora danificado, Boletaria, tornando-se um novo Monumental para apoiar o mundo enquanto o conhecimento das Soul Arts &eacute; perdido. Se o Slayer of Demons matar a Donzela de Preto, eles servir&atilde;o ao Antigo e saciar&atilde;o sua fome por almas enquanto a n&eacute;voa continua a se espalhar.</p>', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/2TMs2E6cms4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/demonsouls.png', 65.00, 13, 'sim');
INSERT INTO `jogos` VALUES (29, 'The Witcher 3: Wild Hunt', '<p>O jogo come&ccedil;a com Geralt e seu mentor Vesemir cavalgando para a cidade de White Orchard ap&oacute;s receber uma carta do amante h&aacute; muito perdido de Geralt, Yennefer. Depois de derrotar um grifo para o comandante da guarni&ccedil;&atilde;o nilfgaardiana local, Geralt acompanha Yennefer &agrave; cidade de Vizima, onde eles se encontram com o imperador Emhyr. Emhyr ordena que Geralt encontre Ciri, que &eacute; filha biol&oacute;gica de Emhyr e filha adotiva de Geralt. Como Ciri &eacute; uma Crian&ccedil;a do Sangue Anci&atilde;o, a &uacute;ltima herdeira de uma antiga linhagem &eacute;lfica que lhe concede o poder de manipular o tempo e o espa&ccedil;o, ela est&aacute; sendo perseguida implacavelmente pela enigm&aacute;tica Ca&ccedil;ada Selvagem. Geralt fica sabendo de tr&ecirc;s lugares onde Ciri foi vista recentemente: a prov&iacute;ncia de Velen, um p&acirc;ntano devastado pela guerra, a cidade-estado livre de Novigrad e as Ilhas Skellige.</p>\r\n<p>Em Velen, Geralt rastreia Ciri at&eacute; a fortaleza do Bar&atilde;o Sangrento, um senhor da guerra que recentemente assumiu o controle da prov&iacute;ncia. O Bar&atilde;o exige que Geralt encontre sua esposa e filha desaparecidas em troca de informa&ccedil;&otilde;es sobre Ciri. Geralt descobre que o Bar&atilde;o expulsou sua pr&oacute;pria fam&iacute;lia com sua f&uacute;ria de embriaguez; enquanto sua filha fugia para Oxenfurt, sua esposa Anna se tornou uma serva das Matriarcas, tr&ecirc;s esp&iacute;ritos maliciosos que cuidam de Velen. Ele tamb&eacute;m descobre que Ciri foi brevemente capturada pelas Matriarcas, mas escapou para a fortaleza do Bar&atilde;o antes de continuar para Novigrad.</p>\r\n<p>Em Novigrad, Geralt se re&uacute;ne com seu antigo amor, Triss Merigold, que foi para a clandestinidade para escapar da persegui&ccedil;&atilde;o da Igreja do Fogo Eterno. Ele descobre que Ciri e seu velho amigo Dandelion entraram em conflito com os poderosos chef&otilde;es do crime de Novigrad enquanto tentavam quebrar uma maldi&ccedil;&atilde;o relacionada a um misterioso filact&eacute;rio. Com a ajuda de Triss e v&aacute;rios velhos conhecidos, Geralt resgata Dandelion, que conta a ele que Ciri se teletransportou para Skellige para escapar da persegui&ccedil;&atilde;o por guardas.</p>\r\n<p>Geralt navega para Skellige e se re&uacute;ne com Yennefer, que est&aacute; investigando uma explos&atilde;o m&aacute;gica perto de onde Ciri foi vista pela &uacute;ltima vez. Eles descobrem que Ciri visitou a ilha de Lofoten, mas quando a Wild Hunt atacou novamente, fugiu em um barco com um elfo n&atilde;o identificado. Quando o barco voltou para a costa, seu &uacute;nico ocupante era Uma, uma criatura deformada que Geralt havia visto anteriormente vivendo com o Bar&atilde;o Sangrento. Deduzindo que Uma foi v&iacute;tima da maldi&ccedil;&atilde;o que Ciri tentou levantar em Novigrad, Geralt pega Uma em Velen e o leva para a quase abandonada escola de bruxos em Kaer Morhen. Trabalhando com Yennefer e seus companheiros bruxos, Geralt quebra a maldi&ccedil;&atilde;o e restaura a verdadeira identidade de Uma: Avallac\'h, a professora de Ciri e o estranho elfo frequentemente visto com ela em suas viagens. Avallac\'h diz a Geralt que colocou Ciri em um sono encantado na Ilha das Brumas para mant&ecirc;-la temporariamente protegida da Ca&ccedil;ada Selvagem.</p>', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/XHrskkHf958\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/thewitcher3.jpg', 5.99, 10, 'sim');
INSERT INTO `jogos` VALUES (36, 'Spider-Man: Miles Morales', '<p>Depois de mais de um ano treinando com Peter Parker, Miles Morales dominou suas habilidades de aranha e se estabeleceu como o parceiro original do Homem-Aranha na luta contra o crime, embora ainda se esforce para se adaptar a seu novo papel. Enquanto escoltava um comboio policial que transportava prisioneiros para a jangada reconstru&iacute;da, Miles acidentalmente liberta Rhino, que causa estragos no Harlem. Enquanto Miles para os outros fugitivos, Peter luta contra Rhino, que eventualmente o domina. Miles interv&eacute;m e derrota Rhino com sua nova habilidade bioel&eacute;trica, mais tarde apelidada de \"Venom Blast\". Deixando Rhino sob a cust&oacute;dia de Roxxon, Peter informa Miles que estar&aacute; ajudando sua namorada, a rep&oacute;rter Mary Jane Watson, com sua miss&atilde;o em Symkaria por algumas semanas como seu fot&oacute;grafo, e confia a ele para cuidar da cidade em sua aus&ecirc;ncia.</p>\r\n<p>Enquanto investiga uma invas&atilde;o no Roxxon Plaza, Miles entra em conflito com um grupo chamado Underground, que tem uma vingan&ccedil;a contra a empresa. Voltando para casa para comemorar o Natal com Rio e Ganke, Miles se surpreende ao saber que o Rio tamb&eacute;m convidou Phin, com quem n&atilde;o fala h&aacute; mais de um ano. No dia seguinte, Ganke cria um aplicativo do Homem-Aranha para que os cidad&atilde;os possam ligar para Miles diretamente para obter ajuda. O tio de Miles, Aaron Davis, &eacute; o primeiro a us&aacute;-lo e revela seu conhecimento da identidade de seu sobrinho para Miles. Mais tarde, Miles participa de um dos com&iacute;cios de campanha do Rio, mas testemunha o metr&ocirc; atacando os guardas Roxxon presentes e tenta parar o conflito antes que ele se intensifique. Ele logo descobre que o Underground est&aacute; procurando a fonte de energia experimental de Roxxon, Nuform, e que Phin &eacute; seu l&iacute;der, o \"Tinkerer\". Ap&oacute;s uma investiga&ccedil;&atilde;o mais aprofundada, Miles descobre que Phin quer vingar a morte de seu irm&atilde;o Rick, que foi envenenado enquanto trabalhava no Nuform e morto por Simon Krieger ap&oacute;s tentar sabotar o projeto. Com a ajuda de Aaron, que ele descobre ser o Prowler, Miles descobre o plano de Phin para arruinar Roxxon destruindo sua pra&ccedil;a com Nuform para destacar seus perigosos efeitos colaterais, que Krieger estava encobrindo.</p>\r\n<p>Depois de trair a confian&ccedil;a de Phin para reunir informa&ccedil;&otilde;es no metr&ocirc;, Miles acaba sendo for&ccedil;ado a revelar sua identidade a ela, estragando sua amizade. Miles tenta se reconciliar com Phin, mas Roxxon os sequestra com a ajuda de um Rhino aprimorado. Miles e Phin escapam, mas Miles descobre que Aaron tamb&eacute;m o est&aacute; espionando para Roxxon e que Krieger modificou o reator Nuform da pra&ccedil;a para destruir o Harlem se o plano de Phin der certo. Phin e Miles lutam contra Rhino aprimorado, que provoca Phin sobre a morte de Rick. Ela quase o mata, mas Miles interv&eacute;m e os dois lutam antes que Phin nocauteie Miles e escape. Ganke traz um ferido Miles para casa, onde Rio descobre a identidade de seu filho e continua a apoi&aacute;-lo. Assim que ele se recupera, Miles tenta impedir Phin. No entanto, ele &eacute; capturado por Aaron, que o leva para o subsolo para evitar que ele seja morto como seu pai Jefferson Davis. Miles foge e derrota seu tio, explicando que ele n&atilde;o pode virar as costas para as pessoas quando elas precisam dele.</p>', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/NTunTURbyUU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '../img/jogos/milesmorales.png', 59.00, 5, 'nao');

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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of noticias
-- ----------------------------
INSERT INTO `noticias` VALUES (10, 'Demon Soul\'s ', '../img/wallpapers/demonsouls.png', '2021-03-24', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '../img/wallpapers/demonioAlmas.jpg', 'sim');
INSERT INTO `noticias` VALUES (12, 'Assassin\'s Creed Valhalla Ã© espantoso', '../img/wallpapers/valhala.jpg', '2021-07-21', '<p>Eos iure facere placeat. Asperiores iure et consequuntur cupiditate eos repellendus ad itaque. Sapiente ratione accusantium maiores odit cum culpa. Impedit ad dolore velit consectetur recusandae quisquam. Et ex fugiat vero dolorum quas eligendi.</p>\r\n<p>Molestias voluptatibus ab sint quos quo aut autem. Ducimus eius unde quis. Esse sed et est hic ex sunt blanditiis. Harum doloremque magnam aut recusandae recusandae qui quis et. Qui voluptates fugiat est beatae nobis blanditiis et beatae.</p>\r\n<p>Tempora ut necessitatibus neque est ut hic optio recusandae. Est totam quibusdam labore aut nam possimus et eius. Consequatur ut voluptatem ipsa doloremque itaque corrupti error soluta. Non nisi qui veritatis quia labore. Molestias repellendus in eaque repellat. Ad</p>', '../img/wallpapers/assassinsCreedWall.jpg', 'nao');
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
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of produtos
-- ----------------------------
INSERT INTO `produtos` VALUES (7, 'Playstation 4 Slim', '<ul>\r\n<li>Inclui um novo sistema PlayStation 4 fino de 1 TB, um Controlador DualShock 4 sem fio correspondente.</li>\r\n<li>Jogue online com seus amigos, salve jogos online e muito mais com a assinatura do PlayStation Plus (vendida separadamente).</li>\r\n<li>Tudo de bom, jogos, TV, m&uacute;sica e muito mais. Conecte-se com seus amigos para transmitir e comemorar seus momentos &eacute;picos ao pressionar o bot&atilde;o Compartilhar no Twitch, YouTube, Facebook e Twitter.</li>\r\n<li>Montagem n&atilde;o inclu&iacute;da</li>\r\n</ul>', '../img/produtos/ps4.png', 299.90, 'consola');
INSERT INTO `produtos` VALUES (8, 'Playstation 4 Pro 1TB', '<p>A PlayStation 4 Slim, estilizada e compacta mas com a mesma pot&ecirc;ncia de jogo, oferece uma experi&ecirc;ncia de jogo in&eacute;dita, grafismos din&acirc;micos e realistas, personaliza&ccedil;&atilde;o inteligente e m&uacute;ltiplas funcionalidades ligadas &agrave;s redes sociais. Tecnicamente, o sistema possui um chip Octa Core x86-64 e um processador gr&aacute;fico 1,84 TFLOPS com 8 GB de mem&oacute;ria unificada GDDR5, a que se soma um disco r&iacute;gido de 500 GB. Este equipamento de topo facilita a programa&ccedil;&atilde;o dos jogos e melhora tamb&eacute;m a qualidade do conte&uacute;do. Inclui comando DualShock4, que oferece novas perspetivas de intera&ccedil;&atilde;o, gra&ccedil;as aos sensores de seis eixos de alta sensibilidade e ao touch pad &uacute;nico. Outras caracter&iacute;sticas: cabo de alimenta&ccedil;&atilde;o AC; cabos HDMI e USB; Ethernet; Bluetooth 4.0; Wi-Fi. Garantia de dois anos.</p>', '../img/produtos/ps4pro.png', 399.90, 'consola');
INSERT INTO `produtos` VALUES (9, 'Playstation 5 Disc Version', '<p>Conteudo:</p>\r\n<ul>\r\n<li>1x Playstation 5;</li>\r\n<li>1x Dualsense 5;</li>\r\n<li>1x Cabo de alimenta&ccedil;&atilde;o;</li>\r\n<li>1x Mono-earbud;</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong>Jogar N&atilde;o Tem Limites</strong><br />A consola PS5&trade; abre-te novas possibilidades de jogo que nunca imaginaste.<br />Desfruta de um carregamento de jogos quase instant&acirc;neo com um SSD ultrarr&aacute;pido, envolvimento mais profundo com suporte para feedback h&aacute;ptico, gatilhos adaptativos e &aacute;udio em 3D, bem como uma nova gera&ccedil;&atilde;o de jogos PlayStation&reg; incr&iacute;veis.<br /><br /><strong>Velocidade rel&acirc;mpago</strong><br />Aproveita o poder de uma CPU, GPU e SSD personalizados com um sistema de E/S integrado que reescrevem as regras do que uma consola PlayStation&reg; &eacute; capaz fazer.<br /><br /><strong>Jogos deslumbrantes</strong><br />Deixa-te maravilhar por gr&aacute;ficos incr&iacute;veis e desfruta das novas funcionalidades da PS5&trade;.<br /><br /><strong>Imers&atilde;o arrebatadora</strong><br />Descobre uma experi&ecirc;ncia de jogo mais imersiva com suporte para feedback h&aacute;ptico, gatilhos adaptativos e tecnologia de &aacute;udio em 3D.</p>', '../img/produtos/playstation5.jpg', 399.90, 'consola');
INSERT INTO `produtos` VALUES (10, 'Dualshock 4', '<p>dawdawdawdawdawd</p>', '../img/produtos/dualshock4.png', 59.90, 'acessorio');
INSERT INTO `produtos` VALUES (11, 'Dualsense 5', '<p><br /><strong>Um &iacute;cone dos jogos nas tuas m&atilde;os</strong><br /><br /><strong>Conforto inigual&aacute;vel</strong><br />Assume o controlo com um design evolu&iacute;do de duas tonalidades que combina uma disposi&ccedil;&atilde;o ic&oacute;nica e intuitiva com man&iacute;pulos melhorados e uma barra de luz reinventada.<br /><br /><strong>Funcionalidades familiares</strong><br />O comando sem fios DualSense&trade; mant&eacute;m muitas funcionalidades do DUALSHOCK&reg;4, regressadas para uma nova gera&ccedil;&atilde;o de jogo.<br /><br /><strong>Bateria incorporada</strong><br />Carrega e joga, agora atrav&eacute;s de USB Type-C&reg;4.<br /><br /><strong>Altifalante integrado</strong><br />Alguns jogos assumem uma dimens&atilde;o adicional com efeitos sonoros de mais alta fidelidade1 produzidos pela coluna no comando.<br /><br /><strong>Sensor de movimento</strong><br />Desfruta do controlo de movimentos intuitivo em jogos suportados com o aceler&oacute;metro e girosc&oacute;pio incorporados.\"&gt;</p>\r\n<p>awdawdawdawdawdaD&aacute; vida aos mundos dos jogos<br /><br /><strong>Feedback h&aacute;ptico2</strong><br />Sente um feedback fisicamente reativo &agrave;s tuas a&ccedil;&otilde;es no jogo com atuadores duplos que substituem os motores de vibra&ccedil;&atilde;o convencionais. Nas tuas m&atilde;os, estas vibra&ccedil;&otilde;es din&acirc;micas podem simular a sensa&ccedil;&atilde;o de tudo, desde ambientes at&eacute; ao coice de diferentes armas.<br /><br /><strong>Gatilhos adaptativos2</strong><br />Experimenta diferentes n&iacute;veis de for&ccedil;a e tens&atilde;o &agrave; medida que interages com o teu equipamento e ambientes no jogo. Desde puxar uma corda cada vez mais tensa at&eacute; travar um carro a alta velocidade, poder&aacute;s sentir-te fisicamente ligado &agrave;s tuas a&ccedil;&otilde;es no ecr&atilde;.<br /><br /><strong>Encontra a tua voz, partilha a tua paix&atilde;o</strong><br /><br /><strong>Entrada de auscultadores com microfone e de microfone incorporada</strong><br />Conversa com amigos online3 atrav&eacute;s do microfone incorporado ou ligando uns auscultadores com microfone &agrave; entrada de 3,5 mm. Liga e desliga a captura de voz com facilidade atrav&eacute;s do bot&atilde;o de silenciamento dedicado.<br /><br /><strong>Bot&atilde;o de cria&ccedil;&atilde;o</strong><br />Grava e transmite3 os teus momentos &eacute;picos de jogo com o bot&atilde;o de cria&ccedil;&atilde;o. Com base no sucesso do bot&atilde;o SHARE pioneiro, o bot&atilde;o de \"cria&ccedil;&atilde;o\" oferece aos jogadores mais formas de produzir conte&uacute;do de jogo e transmitir as respetivas aventuras ao vivo para o mundo.<br /><br /><strong>Um &iacute;cone dos jogos nas tuas m&atilde;os</strong><br /><br /><strong>Conforto inigual&aacute;vel</strong><br />Assume o controlo com um design evolu&iacute;do de duas tonalidades que combina uma disposi&ccedil;&atilde;o ic&oacute;nica e intuitiva com man&iacute;pulos melhorados e uma barra de luz reinventada.<br /><br /><strong>Funcionalidades familiares</strong><br />O comando sem fios DualSense&trade; mant&eacute;m muitas funcionalidades do DUALSHOCK&reg;4, regressadas para uma nova gera&ccedil;&atilde;o de jogo.<br /><br /><strong>Bateria incorporada</strong><br />Carrega e joga, agora atrav&eacute;s de USB Type-C&reg;4.<br /><br /><strong>Altifalante integrado</strong><br />Alguns jogos assumem uma dimens&atilde;o adicional com efeitos sonoros de mais alta fidelidade1 produzidos pela coluna no comando.<br /><br /><strong>Sensor de movimento</strong><br />Desfruta do controlo de movimentos intuitivo em jogos suportados com o aceler&oacute;metro e girosc&oacute;pio incorporados.</p>', '../img/produtos/dualsense5.png', 79.90, 'acessorio');
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
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of reviews
-- ----------------------------
INSERT INTO `reviews` VALUES (15, '2021-03-24', 'Amelia ferreira', '<p id=\"id_keyword__52127__text\">Estou convencido que Marvel\'s Spider-Man: Miles Morales vai acompanhar grande parte das PlayStation 5 no dia de lan&ccedil;amento da consola, um atestado do poder da personagem da Marvel. N&atilde;o vai desiludir os f&atilde;s, especialmente os que est&atilde;o desde 2018 com grande antecipa&ccedil;&atilde;o para novos conte&uacute;dos da f&oacute;rmula Spider-Man da Insomniac Games, quanto muito vai deix&aacute;-los insaciados e desejosos por mais. E por falar nisso, se por algum motivo estavam receosos com o futuro dos jogos do cabe&ccedil;a de teia a cargo da Insomniac Games, descansem, Spider-Man: Miles Morales prova inequivocamente que o horizonte &eacute; risonho.</p>', 36, '../img/wallpapers/milesCapa.png', '90', 'N/A');
INSERT INTO `reviews` VALUES (17, '2021-03-25', 'Francisco Melo', '<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at ante ac sapien volutpat iaculis vitae quis ante. Sed arcu felis, pharetra ac dui et, consectetur congue metus. In eget justo vitae risus iaculis egestas. Ut scelerisque arcu ut vestibulum ornare. Etiam ut est vulputate velit euismod dapibus. Nam erat diam, commodo a nisi condimentum, consequat ornare turpis. Nulla eget feugiat elit. In hac habitasse platea dictumst. Cras quis laoreet turpis, at cursus velit. Aliquam rhoncus lacus eu leo gravida, sed mattis velit vestibulum. In arcu nibh, tempor eget diam et, sollicitudin aliquam lacus. Sed eu egestas est. Fusce venenatis in nisl ut cursus. Phasellus id auctor augue, mollis egestas erat.</p>\r\n<p>Sed non malesuada neque, ut condimentum nisl. Integer ac semper ante, non luctus lectus. Vestibulum vitae ipsum ex. In ipsum tortor, dictum vel luctus quis, sagittis nec lectus. Donec sapien est, tincidunt quis neque eget, ultricies mattis neque. Vestibulum quis ultrices nisi. Suspendisse ultricies ullamcorper nisl, nec luctus neque scelerisque vitae. Cras a vulputate lorem.</p>\r\n</div>', 29, '../img/wallpapers/thewitcher3.jpg', '100', 'N/A');
INSERT INTO `reviews` VALUES (19, '2021-04-01', 'Ferro Rodrigues', '<p>O jogo mais esperado de 2020 entrega uma experi&ecirc;ncia que jamais vai deixar a mem&oacute;ria dos jogadores. Night City &eacute;, como j&aacute; foi falado muitas vezes ao longo da an&aacute;lise, uma cidade futurista decadente deslumbrante; uma dimens&atilde;o que nos acolhe e transforma. Honestamente, estamos falando do mundo aberto mais imersivo de todos os tempos. Melhor ainda &eacute; se sentir um aut&ecirc;ntico cidad&atilde;o ao longo da jogatina, j&aacute; que nossas escolhas interferem diretamente no mundo ao redor e na vida dos coadjuvantes aos quais podemos ou n&atilde;o nos apegar. Com muitas atividades opcionais ao dispor de quem joga, Cyberpunk 2077 &eacute; um jogo imenso na ambi&ccedil;&atilde;o, na variedade e na liberdade. O excesso de bugs pode limitar um pouco o divertimento e o combate pode n&atilde;o ser dos mais inovadores ou engajantes. Ainda assim, estamos falando de um jogo que refor&ccedil;a a compet&ecirc;ncia da CD Projekt Red na constru&ccedil;&atilde;o de universos dos quais n&atilde;o queremos nos despedir nunca.</p>', 25, '../img/wallpapers/cyberpunk2077.jpg', '98', 'N/A');

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
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '	' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Guilherme', 'ativo', 'admin', 'c4ca4238a0b923820dcc509a6f75849b');
INSERT INTO `users` VALUES (2, 'Simao', 'ativo', 'admin', 'c81e728d9d4c2f636f067f89cc14862c');
INSERT INTO `users` VALUES (3, 'Leandro', 'ativo', 'admin', 'eccbc87e4b5ce2fe28308fd9f2a7baf3');
INSERT INTO `users` VALUES (11, 'Luis', 'ativo', 'user', 'a87ff679a2f3e71d9181a67b7542122c');
INSERT INTO `users` VALUES (13, 'Orlando', 'ativo', 'editor', '30f5791fae9507519eb26e97178d23eb');
INSERT INTO `users` VALUES (34, 'Miguel', 'ativo', 'user', '7a42b64dc4301fe02e9289d297766299');
INSERT INTO `users` VALUES (35, 'Teste', 'pendente', 'user', 'c4ca4238a0b923820dcc509a6f75849b');

SET FOREIGN_KEY_CHECKS = 1;
