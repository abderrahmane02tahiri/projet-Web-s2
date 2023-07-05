-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 13 juin 2023 à 12:30
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `organisation`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `ID_COURS` int NOT NULL AUTO_INCREMENT,
  `NOM_MODULE` varchar(40) NOT NULL,
  `DESCRIPTION` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FILE_NAME` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FILE_CHEMIN` varchar(40) NOT NULL,
  PRIMARY KEY (`ID_COURS`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`ID_COURS`, `NOM_MODULE`, `DESCRIPTION`, `FILE_NAME`, `FILE_CHEMIN`) VALUES
(1, 'Theorie des graphes', 'Le module de théorie des graphes étudie les graphes, structures de sommets reliés par des arêtes. Il explore concepts fondamentaux : graphes orientés/non orientés, cycles, chemins, arbres et connexions. Il résout problèmes spécifiques tels que parcou', '../New_folder/COURCES/Cours-TG-CI.pdf', 'Cours-TG-CI.pdf'),
(2, 'Programmation linieare', 'Le module de programmation linéaire est un outil utilisé en mathématiques et en informatique pour ré', '../New_folder/COURCES/Cours-RO-CI (1).pdf', 'Cours-RO-CI (1).pdf'),
(3, 'Programmation Web', 'Le module de programmation web se concentre sur le développement de sites et d\'applications web. Il explore les langages de programmation tels que HTML, CSS et JavaScript', '../New_folder/COURCES/S2 GI.zip', 'S2 GI.zip');

-- --------------------------------------------------------

--
-- Structure de la table `engagement`
--

DROP TABLE IF EXISTS `engagement`;
CREATE TABLE IF NOT EXISTS `engagement` (
  `ID_ENGAGEMENT` int NOT NULL AUTO_INCREMENT,
  `LA_DATE` datetime NOT NULL,
  `Description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ID_ETUDIANT` int NOT NULL,
  `Tache` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PRIVACY` varchar(40) NOT NULL,
  PRIMARY KEY (`ID_ENGAGEMENT`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `NOM_PRENOM` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `login` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pass` varchar(40) NOT NULL,
  `image_FILE` varchar(255) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `ID_ETUDIANT` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_ETUDIANT`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`NOM_PRENOM`, `login`, `pass`, `image_FILE`, `image_name`, `ID_ETUDIANT`) VALUES
('Oussama Hdidou', 'oussamahdidou15@gmail.com', '122f5d2411a5a44087c554c53938b0bc', '../New_folder/uploads/WhatsApp Image 2023-03-29 at 03.51.01.jpeg', 'WhatsApp Image 2023-03-29 at 03.51.01.jpeg', 9),
('OussamaHdidou', 'ou.prof2002@gmail.com', '122f5d2411a5a44087c554c53938b0bc', '../New_folder/uploads/DSC_1902[65].JPG', 'DSC_1902[65].JPG', 11),
('Abderrahmane TAHIRI', 'abderrahmane.tahiri.02@gmail.com', '781e5e245d69b566979b86e28d23f2c7', '../New_folder/uploads/abderrahmane tahiri.jpg', 'abderrahmane tahiri.jpg', 14);

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `ID_FOLLOWERS` int NOT NULL,
  `ID_FOLLOWING` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `follow`
--

INSERT INTO `follow` (`ID_FOLLOWERS`, `ID_FOLLOWING`) VALUES
(11, 9),
(9, 11),
(14, 9),
(14, 11),
(9, 14),
(11, 14);

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `ID_PROJECT` int NOT NULL AUTO_INCREMENT,
  `NOM_MODULE` varchar(40) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `ID_ETUDIANT` int NOT NULL,
  `FILE_CHEMIN` varchar(255) NOT NULL,
  `FILE_NAME` int NOT NULL,
  PRIMARY KEY (`ID_PROJECT`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`ID_PROJECT`, `NOM_MODULE`, `DESCRIPTION`, `ID_ETUDIANT`, `FILE_CHEMIN`, `FILE_NAME`) VALUES
(1, 'Reseaux informatiques', 'le projet est une application de messagerie privee et public  ou l`utilisateur peut faire des conversation avec tous personne connectee l`application donne aussi l`acces au ancien message', 14, '../New_folder/projects/INSTANT MESSAGING.pdf', 0),
(2, 'Algorithmique et Complexite', 'le projet se base sur la creation d`un algorithme de gestion sur une entreprise de livraison ', 14, '../New_folder/projects/Mini projet - algorithmique - S2.pdf', 0),
(3, 'Analyse de donnee', 'L`expose est de but de clarifier les notion de classification comme l`hiearchique,le k-means,l`arbre de decision,la regression linieare etc  ', 14, '../New_folder/projects/expo classification.pdf', 0),
(4, 'Reseaux informatiques', 'l`expose est de but de clarifier les notions de supervision reseaux telque les outils les approches les logiciels les protocoles', 9, '../New_folder/projects/supervision (27).pdf', 0),
(5, 'Analyse de donnee', 'Application de l`Analyse des composantes factorielle  sur une sequence de donnee', 9, '../New_folder/projects/_AFC__corrigé.pdf', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
