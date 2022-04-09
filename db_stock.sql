-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 10:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `ID_ARTICLE` int(11) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(300) NOT NULL,
  `NBR_EN_STOCK` int(11) NOT NULL,
  `PRIX` float NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `ID_FOURNISSEUR` int(11) NOT NULL,
  `ID_CAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ID_ARTICLE`, `NOM`, `DESCRIPTION`, `NBR_EN_STOCK`, `PRIX`, `IMAGE`, `ID_FOURNISSEUR`, `ID_CAT`) VALUES
(1, 'Reebok - SHORT', 'Short de sport - medium grey heather \r\n80% coton, 20% polyester \r\nÉlastiquée, réglable', 10, 300, 'images/ARTICLE_61eeb8a5952ba7.82910068.png', 4, 3),
(2, 'Adidas Baskets Continental', 'CHAUSSURE CONTINENTAL 80 STRIPESUNE SNEAKER SPORTY inspirée des 80’s avec ses 3 bandes et son cuir blanc souple.', 35, 700, 'images/ARTICLE_61eeb9c55aff40.88342690.png', 4, 3),
(3, 'XIAOMI Redmi', 'XIAOMI Redmi 9A 6.53\" (2Go, 32Go) 13MP/5MP Android - Gris - (720x1600) - Batterie :5000mAh', 8, 1200, 'images/ARTICLE_61eeba87826a28.29741578.png', 2, 5),
(4, 'Samsung Galaxy A02', 'Samsung Galaxy A02 Black 3GB RAM + 32GB - 6.5\" - 5000mAh', 11, 1900, 'images/ARTICLE_61eebafaf122a5.13079471.png', 5, 5),
(5, 'Smart Tv', 'Samsung 32\" Smart Tv LED HD - Récepteur Intégré - TNT - HDR - Modèle 2020 Wi-Fi Direct\r\nRécepteur et TNT Dolby Digital Plus', 4, 3200, 'images/ARTICLE_61eebb62bc8467.82133681.png', 6, 5),
(6, 'L\'Oréal Paris Botanicals', 'L\'Oréal Paris Botanicals Fresh Care Demelant Infusion Richesse 200ml\r\nPour les cheveux secs\r\nPréparation nutritive infusée d’huile de carthame pour délier & nourrir les longueurs.\r\nParfum frais relaxant.\r\nSans silicone pour un toucher naturel.', 66, 200, 'images/ARTICLE_61eebbd5f3d838.05633592.png', 3, 1),
(7, 'Hp Elitebook 820', 'Hp Elitebook 820 G3 i5 6éme génération 8go Ram 256go SSD (311 x 218 x 18 mm - 1.3Kg) avec chargeur + câble d’alimentation', 5, 3600, 'images/ARTICLE_61eebcb40836d9.15964765.png', 6, 5),
(8, 'MacBook Pro', 'Apple MacBook Pro avec M1 Chip 13 pouces 8 Go RAM 256 Go SSD 2 Thunderbolt 3 Magic Keyboard AZERTY', 2, 13500, 'images/ARTICLE_61eebd13bd21c1.17256452.jpg', 6, 5),
(10, 'Cage Transport Chat et petit chien', 'Panier de transport (voiture, train, bateau, avion) pratique et rigide pour votre chat ou votre petit chien construit en plastique robuste, très facile à assembler et à nettoyer', 31, 200, 'images/ARTICLE_61eebe2a2896f8.30391219.png', 3, 2),
(11, 'Tapis roulant', 'Wellcare Tapis roulant portable avec barre de maintient\r\n\r\nOrdinateur de bord avec écran géant , calories, distance, vitesse ect ectPorte téléphone ou tabletteZone de course: 40x95cm', 5, 4200, 'images/ARTICLE_61eebedeca3752.01032131.png', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `ID_CAT` int(11) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`ID_CAT`, `NOM`, `DESCRIPTION`) VALUES
(1, 'Santé et beauté', 'Le public cible pour cette catégorie de produits couvre les personnes de tous les âges, des adolescents aux retraités, avec une demande élevée en produits de beauté.'),
(2, 'Produits animaux', 'De nombreux animaux de compagnie font partie de la famille et les heureux propriétaires sont prêts à dépenser beaucoup d’argent pour faire plaisir à leurs amis à poils ou à plumes. C\'est un marché valant des milliards de dollars.'),
(3, 'Sport', 'Le sport outdoor dans la nature.\r\n La remise en forme.\r\n Articles technologiques pour le sport.'),
(4, 'Bébés & Enfants', 'Les meubles et les équipements : poussettes multifonctionnelles et les chaises pour bébés ... . Les aliments sains préparés avec des produits naturels / Bio et des produits cosmétiques'),
(5, 'Technologies', 'Les nouvelles technologies nous inondent littéralement et la demande ne cesse de croître. Les produits les plus innovants sont toujours disponibles à un prix élevé, mais comme nous l\'avons vu avec les smartphones, le marché évolue très rapidement et rend les anciens modèles obsolètes et donc plus ab'),
(6, 'Alimentation', 'Les aliments spécialisés. \r\nLes produits de petits producteurs. \r\nLes boissons fraîche.');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `ID_FOURNISSEUR` int(11) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `CIN` varchar(20) NOT NULL,
  `ADRESSE` varchar(200) NOT NULL,
  `TELEPHONE` varchar(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`ID_FOURNISSEUR`, `NOM`, `PRENOM`, `CIN`, `ADRESSE`, `TELEPHONE`, `EMAIL`) VALUES
(1, 'Ayman', 'Erradi', 'RJ48512', '88 rue oued ziz agdal Rabat', '0687542648', 'ayman-erradi@gmail.com'),
(2, 'Fekkaoui', 'Mounia', 'TK62579', '12, bd Bir Anzarane, résid. Fayçal, 2°ét., appt. 4 MOHAMMEDIA', '0523325499', 'Fekkaoui.M@gmail.com'),
(3, 'Mernissi', 'Nezha', 'JL75624', '58 Rue Mourtada, 2eme étage, Palmiers, Casablanca', '0618547362', 'elmernissi_nezha81@gmail.com'),
(4, 'Souissi', 'Amine', 'BF19568', '50 avenue omar ibn el khattab ,RABAT AGDAL', '0625478426', 'Souissi__@outlook.com'),
(5, 'Radouiani', 'Mohamed', 'KD48965', '36, bd Palestine, hay Riad 2, Alia Mohammedia', '0623587541', 'm.radouani@gmail.com'),
(6, 'Lahkim', 'Mustapha', 'BG19658', '638, bd Abdelkrim Khattabi, 1°ét. ElAlia, 28830 Mohammedia', '0652354891', 'Mustapha_lm2014@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_USER` int(11) NOT NULL,
  `LOGIN` varchar(20) NOT NULL,
  `MDP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_USER`, `LOGIN`, `MDP`) VALUES
(1, 'admin', '$2y$10$03oW/xxnlNnCdj8daLyvwOtsPHccDI0mD5H7tLkx6y7DN2cwtPHe2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID_ARTICLE`),
  ADD KEY `FK1` (`ID_FOURNISSEUR`),
  ADD KEY `FK2` (`ID_CAT`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID_CAT`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`ID_FOURNISSEUR`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `ID_ARTICLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID_CAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `ID_FOURNISSEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`ID_FOURNISSEUR`) REFERENCES `fournisseur` (`ID_FOURNISSEUR`),
  ADD CONSTRAINT `FK2` FOREIGN KEY (`ID_CAT`) REFERENCES `categorie` (`ID_CAT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
