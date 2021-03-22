-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 mars 2021 à 10:00
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ProjetWeb`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `ID_Administrateur` bigint(20) NOT NULL,
  `ID_Identifiant` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `attribue`
--

CREATE TABLE `attribue` (
  `ID_Identifiant` bigint(20) NOT NULL,
  `ID_droits` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `a_postule`
--

CREATE TABLE `a_postule` (
  `ID_Etudiant` bigint(20) NOT NULL,
  `ID_Offre` bigint(20) NOT NULL,
  `Etat` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `a_wishlist`
--

CREATE TABLE `a_wishlist` (
  `ID_Offre` bigint(20) NOT NULL,
  `ID_Etudiant` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `ID_Competence` bigint(20) NOT NULL,
  `nom_Competence` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `delegue`
--

CREATE TABLE `delegue` (
  `ID_Delegue` bigint(20) NOT NULL,
  `nom_Delegue` varchar(50) DEFAULT NULL,
  `prenom_Delegue` varchar(50) DEFAULT NULL,
  `ID_Localisation` bigint(20) DEFAULT NULL,
  `ID_Identifiant` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `ID_droits` bigint(20) NOT NULL,
  `nom_Droits` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `enseigne_a`
--

CREATE TABLE `enseigne_a` (
  `ID_Pilote` bigint(20) NOT NULL,
  `ID_NiveauEtudes` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `ID_Entreprise` bigint(20) NOT NULL,
  `nom_Entreprise` varchar(50) DEFAULT NULL,
  `secteurActivité` varchar(50) DEFAULT NULL,
  `nbStagiaireCesi` bigint(20) DEFAULT NULL,
  `ID_Localisation` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `ID_Etudiant` bigint(20) NOT NULL,
  `nom_Etudiant` varchar(50) DEFAULT NULL,
  `prenom_Etudiant` varchar(50) DEFAULT NULL,
  `ID_Localisation` bigint(20) DEFAULT NULL,
  `ID_NiveauEtudes` bigint(20) DEFAULT NULL,
  `ID_Pilote` bigint(20) DEFAULT NULL,
  `ID_Identifiant` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `identifiants`
--

CREATE TABLE `identifiants` (
  `ID_Identifiant` bigint(20) NOT NULL,
  `nom_Identifiant` varchar(50) DEFAULT NULL,
  `mdp_Identifiant` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

CREATE TABLE `localisation` (
  `ID_Localisation` bigint(20) NOT NULL,
  `nom_Localisation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `niveauetudes`
--

CREATE TABLE `niveauetudes` (
  `ID_NiveauEtudes` bigint(20) NOT NULL,
  `promotion` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `ID_Offre` bigint(20) NOT NULL,
  `nom_Offre` varchar(50) DEFAULT NULL,
  `duree` bigint(20) DEFAULT NULL,
  `salaire` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `nombrePlace` bigint(20) DEFAULT NULL,
  `ID_Localisation` bigint(20) DEFAULT NULL,
  `ID_Entreprise` bigint(20) DEFAULT NULL,
  `ID_NiveauEtudes` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

CREATE TABLE `pilote` (
  `ID_Pilote` bigint(20) NOT NULL,
  `nom_Pilote` varchar(50) DEFAULT NULL,
  `prenom_Pilote` varchar(50) DEFAULT NULL,
  `ID_Localisation` bigint(20) DEFAULT NULL,
  `ID_Identifiant` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

CREATE TABLE `possede` (
  `ID_Competence` bigint(20) NOT NULL,
  `ID_Etudiant` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `possedenoteetudiant`
--

CREATE TABLE `possedenoteetudiant` (
  `ID_Entreprise` bigint(20) NOT NULL,
  `ID_Etudiant` bigint(20) NOT NULL,
  `valeur_NoteEtudiant` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `possedenotepilote`
--

CREATE TABLE `possedenotepilote` (
  `ID_Entreprise` bigint(20) NOT NULL,
  `ID_Pilote` bigint(20) NOT NULL,
  `valeur_NotePilote` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `requiert`
--

CREATE TABLE `requiert` (
  `ID_Offre` bigint(20) NOT NULL,
  `ID_Competence` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`ID_Administrateur`),
  ADD KEY `FK_Administrateur_ID_Identifiant` (`ID_Identifiant`);

--
-- Index pour la table `attribue`
--
ALTER TABLE `attribue`
  ADD PRIMARY KEY (`ID_Identifiant`,`ID_droits`),
  ADD KEY `FK_Attribue_ID_droits` (`ID_droits`);

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
  ADD PRIMARY KEY (`ID_Competence`);

--
-- Index pour la table `delegue`
--
ALTER TABLE `delegue`
  ADD PRIMARY KEY (`ID_Delegue`),
  ADD KEY `FK_Delegue_ID_Localisation` (`ID_Localisation`),
  ADD KEY `FK_Delegue_ID_Identifiant` (`ID_Identifiant`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`ID_droits`);

--
-- Index pour la table `enseigne_a`
--
ALTER TABLE `enseigne_a`
  ADD PRIMARY KEY (`ID_Pilote`,`ID_NiveauEtudes`),
  ADD KEY `FK_enseigne_A_ID_NiveauEtudes` (`ID_NiveauEtudes`);

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
  ADD KEY `FK_Etudiant_ID_NiveauEtudes` (`ID_NiveauEtudes`),
  ADD KEY `FK_Etudiant_ID_Pilote` (`ID_Pilote`),
  ADD KEY `FK_Etudiant_ID_Identifiant` (`ID_Identifiant`);

--
-- Index pour la table `identifiants`
--
ALTER TABLE `identifiants`
  ADD PRIMARY KEY (`ID_Identifiant`);

--
-- Index pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD PRIMARY KEY (`ID_Localisation`);

--
-- Index pour la table `niveauetudes`
--
ALTER TABLE `niveauetudes`
  ADD PRIMARY KEY (`ID_NiveauEtudes`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`ID_Offre`),
  ADD KEY `FK_Offre_ID_Localisation` (`ID_Localisation`),
  ADD KEY `FK_Offre_ID_Entreprise` (`ID_Entreprise`),
  ADD KEY `FK_Offre_ID_NiveauEtudes` (`ID_NiveauEtudes`);

--
-- Index pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD PRIMARY KEY (`ID_Pilote`),
  ADD KEY `FK_Pilote_ID_Localisation` (`ID_Localisation`),
  ADD KEY `FK_Pilote_ID_Identifiant` (`ID_Identifiant`);

--
-- Index pour la table `possede`
--
ALTER TABLE `possede`
  ADD PRIMARY KEY (`ID_Competence`,`ID_Etudiant`),
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
  ADD PRIMARY KEY (`ID_Entreprise`,`ID_Pilote`),
  ADD KEY `FK_possedeNotePilote_ID_Pilote` (`ID_Pilote`);

--
-- Index pour la table `requiert`
--
ALTER TABLE `requiert`
  ADD PRIMARY KEY (`ID_Offre`,`ID_Competence`),
  ADD KEY `FK_requiert_ID_Competence` (`ID_Competence`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `ID_Administrateur` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `attribue`
--
ALTER TABLE `attribue`
  MODIFY `ID_Identifiant` bigint(20) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID_Competence` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `delegue`
--
ALTER TABLE `delegue`
  MODIFY `ID_Delegue` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `ID_droits` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enseigne_a`
--
ALTER TABLE `enseigne_a`
  MODIFY `ID_Pilote` bigint(20) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT pour la table `identifiants`
--
ALTER TABLE `identifiants`
  MODIFY `ID_Identifiant` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `localisation`
--
ALTER TABLE `localisation`
  MODIFY `ID_Localisation` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niveauetudes`
--
ALTER TABLE `niveauetudes`
  MODIFY `ID_NiveauEtudes` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `ID_Offre` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pilote`
--
ALTER TABLE `pilote`
  MODIFY `ID_Pilote` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `possede`
--
ALTER TABLE `possede`
  MODIFY `ID_Competence` bigint(20) NOT NULL AUTO_INCREMENT;

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
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `FK_Administrateur_ID_Identifiant` FOREIGN KEY (`ID_Identifiant`) REFERENCES `identifiants` (`ID_Identifiant`);

--
-- Contraintes pour la table `attribue`
--
ALTER TABLE `attribue`
  ADD CONSTRAINT `FK_Attribue_ID_Identifiant` FOREIGN KEY (`ID_Identifiant`) REFERENCES `identifiants` (`ID_Identifiant`),
  ADD CONSTRAINT `FK_Attribue_ID_droits` FOREIGN KEY (`ID_droits`) REFERENCES `droits` (`ID_droits`);

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
-- Contraintes pour la table `delegue`
--
ALTER TABLE `delegue`
  ADD CONSTRAINT `FK_Delegue_ID_Identifiant` FOREIGN KEY (`ID_Identifiant`) REFERENCES `identifiants` (`ID_Identifiant`),
  ADD CONSTRAINT `FK_Delegue_ID_Localisation` FOREIGN KEY (`ID_Localisation`) REFERENCES `localisation` (`ID_Localisation`);

--
-- Contraintes pour la table `enseigne_a`
--
ALTER TABLE `enseigne_a`
  ADD CONSTRAINT `FK_enseigne_A_ID_NiveauEtudes` FOREIGN KEY (`ID_NiveauEtudes`) REFERENCES `niveauetudes` (`ID_NiveauEtudes`),
  ADD CONSTRAINT `FK_enseigne_A_ID_Pilote` FOREIGN KEY (`ID_Pilote`) REFERENCES `pilote` (`ID_Pilote`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `FK_Entreprise_ID_Localisation` FOREIGN KEY (`ID_Localisation`) REFERENCES `localisation` (`ID_Localisation`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_Etudiant_ID_Identifiant` FOREIGN KEY (`ID_Identifiant`) REFERENCES `identifiants` (`ID_Identifiant`),
  ADD CONSTRAINT `FK_Etudiant_ID_Localisation` FOREIGN KEY (`ID_Localisation`) REFERENCES `localisation` (`ID_Localisation`),
  ADD CONSTRAINT `FK_Etudiant_ID_NiveauEtudes` FOREIGN KEY (`ID_NiveauEtudes`) REFERENCES `niveauetudes` (`ID_NiveauEtudes`),
  ADD CONSTRAINT `FK_Etudiant_ID_Pilote` FOREIGN KEY (`ID_Pilote`) REFERENCES `pilote` (`ID_Pilote`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `FK_Offre_ID_Entreprise` FOREIGN KEY (`ID_Entreprise`) REFERENCES `entreprise` (`ID_Entreprise`),
  ADD CONSTRAINT `FK_Offre_ID_Localisation` FOREIGN KEY (`ID_Localisation`) REFERENCES `localisation` (`ID_Localisation`),
  ADD CONSTRAINT `FK_Offre_ID_NiveauEtudes` FOREIGN KEY (`ID_NiveauEtudes`) REFERENCES `niveauetudes` (`ID_NiveauEtudes`);

--
-- Contraintes pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD CONSTRAINT `FK_Pilote_ID_Identifiant` FOREIGN KEY (`ID_Identifiant`) REFERENCES `identifiants` (`ID_Identifiant`),
  ADD CONSTRAINT `FK_Pilote_ID_Localisation` FOREIGN KEY (`ID_Localisation`) REFERENCES `localisation` (`ID_Localisation`);

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `FK_possede_ID_Competence` FOREIGN KEY (`ID_Competence`) REFERENCES `competence` (`ID_Competence`),
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
  ADD CONSTRAINT `FK_possedeNotePilote_ID_Pilote` FOREIGN KEY (`ID_Pilote`) REFERENCES `pilote` (`ID_Pilote`);

--
-- Contraintes pour la table `requiert`
--
ALTER TABLE `requiert`
  ADD CONSTRAINT `FK_requiert_ID_Competence` FOREIGN KEY (`ID_Competence`) REFERENCES `competence` (`ID_Competence`),
  ADD CONSTRAINT `FK_requiert_ID_Offre` FOREIGN KEY (`ID_Offre`) REFERENCES `offre` (`ID_Offre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
