-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 mars 2021 à 16:34
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_web_stages`
--

-- --------------------------------------------------------

--
-- Structure de la table `a_postule`
--

CREATE TABLE `a_postule` (
  `ID_Etudiant` bigint(20) NOT NULL,
  `ID_Offre` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `a_wishlist`
--

CREATE TABLE `a_wishlist` (
  `ID_Offre` bigint(20) NOT NULL,
  `ID_Etudiant` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `ID_Competence_Competence` bigint(20) NOT NULL,
  `nom_Competence_Competence` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enseigne_a`
--

CREATE TABLE `enseigne_a` (
  `ID_Pilote_Pilote` bigint(20) NOT NULL,
  `ID_NiveauEtudes_niveauEtudes` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `ID_Entreprise` bigint(20) NOT NULL,
  `nom_Entreprise` varchar(50) DEFAULT NULL,
  `secteurActivité_Entreprise` varchar(50) DEFAULT NULL,
  `nbStagiaireCesi_Entreprise` bigint(20) DEFAULT NULL,
  `ID_Localisation` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `ID_Etudiant` bigint(20) NOT NULL,
  `nom_Etudiant` varchar(50) DEFAULT NULL,
  `prenom_Etudiant` varchar(50) DEFAULT NULL,
  `delegue` tinyint(1) DEFAULT NULL,
  `ID_Localisation` bigint(20) DEFAULT NULL,
  `ID_NiveauEtudes_niveauEtudes` bigint(20) DEFAULT NULL,
  `ID_Pilote_Pilote` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

CREATE TABLE `localisation` (
  `ID_Localisation` bigint(20) NOT NULL,
  `nom_Localisation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `niveauetudes`
--

CREATE TABLE `niveauetudes` (
  `ID_NiveauEtudes_niveauEtudes` bigint(20) NOT NULL,
  `promotion_NiveauEtudes_niveauEtudes` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `ID_Offre` bigint(20) NOT NULL,
  `nom_Offre` varchar(50) DEFAULT NULL,
  `duree_Offre` bigint(20) DEFAULT NULL,
  `salaire_Offre` bigint(20) DEFAULT NULL,
  `date_Offre` date DEFAULT NULL,
  `nombrePlace_Offre` bigint(20) DEFAULT NULL,
  `ID_Localisation` bigint(20) DEFAULT NULL,
  `ID_Entreprise` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

CREATE TABLE `pilote` (
  `ID_Pilote_Pilote` bigint(20) NOT NULL,
  `nom_Pilote_Pilote` varchar(50) DEFAULT NULL,
  `prenom_Pilote_Pilote` varchar(50) DEFAULT NULL,
  `ID_Localisation` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

CREATE TABLE `possede` (
  `ID_Competence_Competence` bigint(20) NOT NULL,
  `ID_Etudiant` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `possedenoteetudiant`
--

CREATE TABLE `possedenoteetudiant` (
  `ID_Entreprise` bigint(20) NOT NULL,
  `ID_Etudiant` bigint(20) NOT NULL,
  `valeur_NoteEtudiant_note_Etudiant` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `possedenotepilote`
--

CREATE TABLE `possedenotepilote` (
  `ID_Entreprise` bigint(20) NOT NULL,
  `ID_Pilote_Pilote` bigint(20) NOT NULL,
  `valeur_NotePilote_note_Pilote` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `requiert`
--

CREATE TABLE `requiert` (
  `ID_Offre` bigint(20) NOT NULL,
  `ID_Competence_Competence` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `a_postule`
--
ALTER TABLE `a_postule`
  ADD PRIMARY KEY (`ID_Etudiant`,`ID_Offre`),
  ADD KEY `FK_a_postule_ID_Offre` (`ID_Offre`);

--
-- Index pour la table `a_wishlist`
--
ALTER TABLE `a_wishlist`
  ADD PRIMARY KEY (`ID_Offre`,`ID_Etudiant`),
  ADD KEY `FK_a_wishList_ID_Etudiant` (`ID_Etudiant`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`ID_Competence_Competence`);

--
-- Index pour la table `enseigne_a`
--
ALTER TABLE `enseigne_a`
  ADD PRIMARY KEY (`ID_Pilote_Pilote`,`ID_NiveauEtudes_niveauEtudes`),
  ADD KEY `FK_enseigne_A_ID_NiveauEtudes_niveauEtudes` (`ID_NiveauEtudes_niveauEtudes`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`ID_Entreprise`),
  ADD KEY `FK_Entreprise_ID_Localisation` (`ID_Localisation`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`ID_Etudiant`),
  ADD KEY `FK_Etudiant_ID_Localisation` (`ID_Localisation`),
  ADD KEY `FK_Etudiant_ID_NiveauEtudes_niveauEtudes` (`ID_NiveauEtudes_niveauEtudes`),
  ADD KEY `FK_Etudiant_ID_Pilote_Pilote` (`ID_Pilote_Pilote`);

--
-- Index pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD PRIMARY KEY (`ID_Localisation`);

--
-- Index pour la table `niveauetudes`
--
ALTER TABLE `niveauetudes`
  ADD PRIMARY KEY (`ID_NiveauEtudes_niveauEtudes`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`ID_Offre`),
  ADD KEY `FK_Offre_ID_Localisation` (`ID_Localisation`),
  ADD KEY `FK_Offre_ID_Entreprise` (`ID_Entreprise`);

--
-- Index pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD PRIMARY KEY (`ID_Pilote_Pilote`),
  ADD KEY `FK_Pilote_ID_Localisation` (`ID_Localisation`);

--
-- Index pour la table `possede`
--
ALTER TABLE `possede`
  ADD PRIMARY KEY (`ID_Competence_Competence`,`ID_Etudiant`),
  ADD KEY `FK_possede_ID_Etudiant` (`ID_Etudiant`);

--
-- Index pour la table `possedenoteetudiant`
--
ALTER TABLE `possedenoteetudiant`
  ADD PRIMARY KEY (`ID_Entreprise`,`ID_Etudiant`),
  ADD KEY `FK_possedeNoteEtudiant_ID_Etudiant` (`ID_Etudiant`);

--
-- Index pour la table `possedenotepilote`
--
ALTER TABLE `possedenotepilote`
  ADD PRIMARY KEY (`ID_Entreprise`,`ID_Pilote_Pilote`),
  ADD KEY `FK_possedeNotePilote_ID_Pilote_Pilote` (`ID_Pilote_Pilote`);

--
-- Index pour la table `requiert`
--
ALTER TABLE `requiert`
  ADD PRIMARY KEY (`ID_Offre`,`ID_Competence_Competence`),
  ADD KEY `FK_requiert_ID_Competence_Competence` (`ID_Competence_Competence`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `a_postule`
--
ALTER TABLE `a_postule`
  MODIFY `ID_Etudiant` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `a_wishlist`
--
ALTER TABLE `a_wishlist`
  MODIFY `ID_Offre` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `ID_Competence_Competence` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enseigne_a`
--
ALTER TABLE `enseigne_a`
  MODIFY `ID_Pilote_Pilote` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `ID_Entreprise` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `ID_Etudiant` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `localisation`
--
ALTER TABLE `localisation`
  MODIFY `ID_Localisation` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niveauetudes`
--
ALTER TABLE `niveauetudes`
  MODIFY `ID_NiveauEtudes_niveauEtudes` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `ID_Offre` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pilote`
--
ALTER TABLE `pilote`
  MODIFY `ID_Pilote_Pilote` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `possede`
--
ALTER TABLE `possede`
  MODIFY `ID_Competence_Competence` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `possedenoteetudiant`
--
ALTER TABLE `possedenoteetudiant`
  MODIFY `ID_Entreprise` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `possedenotepilote`
--
ALTER TABLE `possedenotepilote`
  MODIFY `ID_Entreprise` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `requiert`
--
ALTER TABLE `requiert`
  MODIFY `ID_Offre` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `a_postule`
--
ALTER TABLE `a_postule`
  ADD CONSTRAINT `FK_a_postule_ID_Etudiant` FOREIGN KEY (`ID_Etudiant`) REFERENCES `etudiant` (`ID_Etudiant`),
  ADD CONSTRAINT `FK_a_postule_ID_Offre` FOREIGN KEY (`ID_Offre`) REFERENCES `offre` (`ID_Offre`);

--
-- Contraintes pour la table `a_wishlist`
--
ALTER TABLE `a_wishlist`
  ADD CONSTRAINT `FK_a_wishList_ID_Etudiant` FOREIGN KEY (`ID_Etudiant`) REFERENCES `etudiant` (`ID_Etudiant`),
  ADD CONSTRAINT `FK_a_wishList_ID_Offre` FOREIGN KEY (`ID_Offre`) REFERENCES `offre` (`ID_Offre`);

--
-- Contraintes pour la table `enseigne_a`
--
ALTER TABLE `enseigne_a`
  ADD CONSTRAINT `FK_enseigne_A_ID_NiveauEtudes_niveauEtudes` FOREIGN KEY (`ID_NiveauEtudes_niveauEtudes`) REFERENCES `niveauetudes` (`ID_NiveauEtudes_niveauEtudes`),
  ADD CONSTRAINT `FK_enseigne_A_ID_Pilote_Pilote` FOREIGN KEY (`ID_Pilote_Pilote`) REFERENCES `pilote` (`ID_Pilote_Pilote`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `FK_Entreprise_ID_Localisation` FOREIGN KEY (`ID_Localisation`) REFERENCES `localisation` (`ID_Localisation`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_Etudiant_ID_Localisation` FOREIGN KEY (`ID_Localisation`) REFERENCES `localisation` (`ID_Localisation`),
  ADD CONSTRAINT `FK_Etudiant_ID_NiveauEtudes_niveauEtudes` FOREIGN KEY (`ID_NiveauEtudes_niveauEtudes`) REFERENCES `niveauetudes` (`ID_NiveauEtudes_niveauEtudes`),
  ADD CONSTRAINT `FK_Etudiant_ID_Pilote_Pilote` FOREIGN KEY (`ID_Pilote_Pilote`) REFERENCES `pilote` (`ID_Pilote_Pilote`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `FK_Offre_ID_Entreprise` FOREIGN KEY (`ID_Entreprise`) REFERENCES `entreprise` (`ID_Entreprise`),
  ADD CONSTRAINT `FK_Offre_ID_Localisation` FOREIGN KEY (`ID_Localisation`) REFERENCES `localisation` (`ID_Localisation`);

--
-- Contraintes pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD CONSTRAINT `FK_Pilote_ID_Localisation` FOREIGN KEY (`ID_Localisation`) REFERENCES `localisation` (`ID_Localisation`);

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `FK_possede_ID_Competence_Competence` FOREIGN KEY (`ID_Competence_Competence`) REFERENCES `competence` (`ID_Competence_Competence`),
  ADD CONSTRAINT `FK_possede_ID_Etudiant` FOREIGN KEY (`ID_Etudiant`) REFERENCES `etudiant` (`ID_Etudiant`);

--
-- Contraintes pour la table `possedenoteetudiant`
--
ALTER TABLE `possedenoteetudiant`
  ADD CONSTRAINT `FK_possedeNoteEtudiant_ID_Entreprise` FOREIGN KEY (`ID_Entreprise`) REFERENCES `entreprise` (`ID_Entreprise`),
  ADD CONSTRAINT `FK_possedeNoteEtudiant_ID_Etudiant` FOREIGN KEY (`ID_Etudiant`) REFERENCES `etudiant` (`ID_Etudiant`);

--
-- Contraintes pour la table `possedenotepilote`
--
ALTER TABLE `possedenotepilote`
  ADD CONSTRAINT `FK_possedeNotePilote_ID_Entreprise` FOREIGN KEY (`ID_Entreprise`) REFERENCES `entreprise` (`ID_Entreprise`),
  ADD CONSTRAINT `FK_possedeNotePilote_ID_Pilote_Pilote` FOREIGN KEY (`ID_Pilote_Pilote`) REFERENCES `pilote` (`ID_Pilote_Pilote`);

--
-- Contraintes pour la table `requiert`
--
ALTER TABLE `requiert`
  ADD CONSTRAINT `FK_requiert_ID_Competence_Competence` FOREIGN KEY (`ID_Competence_Competence`) REFERENCES `competence` (`ID_Competence_Competence`),
  ADD CONSTRAINT `FK_requiert_ID_Offre` FOREIGN KEY (`ID_Offre`) REFERENCES `offre` (`ID_Offre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
