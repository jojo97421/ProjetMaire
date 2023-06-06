-- Adminer 4.8.1 MySQL 8.0.31 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `mairie`;
CREATE DATABASE `mairie` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mairie`;

DROP TABLE IF EXISTS `demande`;
CREATE TABLE `demande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `etablissement` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `niveau` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `section` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lien` int DEFAULT NULL,
  `accepter` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Non',
  PRIMARY KEY (`id`),
  KEY `lien` (`lien`),
  CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`lien`) REFERENCES `tuteurs` (`idtuteur`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `demande` (`id`, `nom`, `prenom`, `telephone`, `email`, `etablissement`, `niveau`, `debut`, `fin`, `section`, `lien`, `accepter`) VALUES
(99,	'Maillot',	'Joachim',	'0692154875',	'jo@gmail.com',	'Lycee',	'BTS',	'2023-01-20',	'2023-03-05',	'APH',	2,	'Oui'),
(101,	'Payet',	'lucas',	'78452',	'lucas@gmail.com',	'College',	'3ème',	'2023-03-01',	'2023-03-16',	'APH',	2,	'Non'),
(102,	'timoté',	'payet',	'069248408',	'timoté@gmail.com',	'Lycee',	'BTS',	'2023-03-15',	'2023-03-31',	'Découverte de métier : Informatique',	2,	'Non');

DELIMITER ;;

CREATE TRIGGER `Historisation_demande` BEFORE DELETE ON `demande` FOR EACH ROW
BEGIN 
        INSERT INTO `historisation_demande` (`id`, `nom`, `prenom`, `telephone`, `email`, `etablissement`, `niveau`, `debut`, `fin`, `section`, `lien`, `accepter`, `hist_date`, `hist_time`, `hist_user`, `hist_comm`) VALUES
        (old.id, old.nom, old.prenom, old.telephone, old.email, old.etablissement, old.niveau, old.debut, old.fin, old.section, old.lien, old.accepter, current_date(), current_time(), user(), 'delete');
END;;

DELIMITER ;

DROP TABLE IF EXISTS `historisation_demande`;
CREATE TABLE `historisation_demande` (
  `id` int DEFAULT NULL,
  `nom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `etablissement` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `niveau` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `section` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lien` int DEFAULT NULL,
  `accepter` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Non',
  `hist_date` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hist_time` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hist_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hist_comm` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `historisation_demande` (`id`, `nom`, `prenom`, `telephone`, `email`, `etablissement`, `niveau`, `debut`, `fin`, `section`, `lien`, `accepter`, `hist_date`, `hist_time`, `hist_user`, `hist_comm`) VALUES
(103,	'aifjiazj',	'azijfiazj',	'975448',	'joazfazf@gmail.com',	'Lycée',	'BTS',	'0000-00-00',	'0000-00-00',	'autre',	2,	'Non',	'2023-06-06',	'10:35:32',	'jojo@localhost',	'delete');

DROP TABLE IF EXISTS `tuteurs`;
CREATE TABLE `tuteurs` (
  `idtuteur` int NOT NULL AUTO_INCREMENT,
  `nomtuteur` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenomtuteur` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `emailtuteur` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telephonetuteur` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sectiontuteur` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lientuteur` int DEFAULT NULL,
  `pseudo_utilisateur` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idtuteur`),
  UNIQUE KEY `pseudo_utilisateur` (`pseudo_utilisateur`),
  KEY `lientuteur` (`lientuteur`),
  CONSTRAINT `tuteurs_ibfk_1` FOREIGN KEY (`pseudo_utilisateur`) REFERENCES `utilisateurs` (`pseudo`) ON UPDATE CASCADE,
  CONSTRAINT `tuteurs_ibfk_2` FOREIGN KEY (`lientuteur`) REFERENCES `demande` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tuteurs` (`idtuteur`, `nomtuteur`, `prenomtuteur`, `emailtuteur`, `telephonetuteur`, `sectiontuteur`, `lientuteur`, `pseudo_utilisateur`) VALUES
(2,	'test',	'test',	'lucas@gmail.com',	'06921675',	'ASSP',	NULL,	'Tuteur'),
(27,	'giygiy',	'Damien',	'Damien@s.com',	'0624948',	'Découverte métier',	99,	NULL),
(28,	'Dupont',	'Lucas',	'lucasdupont@gmail.co',	'0692154875',	'ASSP',	99,	NULL);

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(15) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `rang` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `mdp` (`mdp`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `utilisateurs` (`id`, `pseudo`, `mdp`, `rang`) VALUES
(0,	'None',	'None',	'N'),
(1,	'Mairie',	'91370eab647544483b1d7899401ff64d5ce5d4656f65e3011f388caa0156776c',	'A'),
(2,	'Tuteur',	'eb9ae4b942c19678c1e72bfcc65352d9696bfe96d68aba66c2535ed206272658',	'T'),
(3,	'Damien',	'c2637094a5395cb2914dc347b91f506df0a6b5fe7a93f09a487e2fb8eb2f6338',	'T'),
(20,	'martin',	'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9',	''),
(21,	'jojo',	'54af2a2960e582263c45971cdd40da4ae31ede1db5395629d910f056479de12d',	'');

-- 2023-06-06 06:37:02
