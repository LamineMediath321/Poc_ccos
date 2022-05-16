CREATE DATABASE  IF NOT EXISTS `pocdb` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pocdb`;
-- MySQL dump 10.13  Distrib 8.0.22, for macos10.15 (x86_64)
--
-- Host: localhost    Database: pocdb
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activite`
--

DROP TABLE IF EXISTS `activite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `activite` (
  `idOpportunite` int NOT NULL,
  `description` varchar(254) DEFAULT NULL,
  `lieu` varchar(254) DEFAULT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL,
  `nombrePlace` int DEFAULT NULL,
  PRIMARY KEY (`idOpportunite`),
  CONSTRAINT `FK_Generalisation_8` FOREIGN KEY (`idOpportunite`) REFERENCES `opportunite` (`idOpportunite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `idArticle` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(254) DEFAULT NULL,
  `contenu` varchar(254) DEFAULT NULL,
  `datePublication` datetime DEFAULT NULL,
  PRIMARY KEY (`idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `article_thematique`
--

DROP TABLE IF EXISTS `article_thematique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `article_thematique` (
  `idArticle` int NOT NULL,
  `idThematique` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idArticle_2` (`idArticle`,`idThematique`),
  KEY `FK_articleThematique1` (`idThematique`),
  KEY `idArticle` (`idArticle`,`idThematique`),
  CONSTRAINT `FK_articleThematique` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  CONSTRAINT `FK_articleThematique1` FOREIGN KEY (`idThematique`) REFERENCES `thematique` (`idThematique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `intitule` int DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `categorie_article`
--

DROP TABLE IF EXISTS `categorie_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `categorie_article` (
  `idCategorie` int NOT NULL,
  `idArticle` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idCategorie_2` (`idCategorie`,`idArticle`),
  KEY `FK_categorieArticle` (`idArticle`),
  KEY `idCategorie` (`idCategorie`,`idArticle`),
  CONSTRAINT `FK_categorieArticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  CONSTRAINT `FK_categorieArticle1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `commentaire` (
  `idCommentaire` int NOT NULL AUTO_INCREMENT,
  `idArticle` int NOT NULL,
  `contenu` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `FK_commentaireArticle` (`idArticle`),
  CONSTRAINT `FK_commentaireArticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competence`
--

DROP TABLE IF EXISTS `competence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `competence` (
  `idCompetence` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idCompetence`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competence_cv`
--

DROP TABLE IF EXISTS `competence_cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `competence_cv` (
  `idcompetence_cv` int NOT NULL AUTO_INCREMENT,
  `idCompetence` int DEFAULT NULL,
  `idCV` int DEFAULT NULL,
  PRIMARY KEY (`idcompetence_cv`),
  KEY `idCompetence_idx` (`idCompetence`),
  KEY `idCV_idx` (`idCV`),
  CONSTRAINT `idCompetence` FOREIGN KEY (`idCompetence`) REFERENCES `competence` (`idCompetence`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idCV` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competence_profil`
--

DROP TABLE IF EXISTS `competence_profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `competence_profil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idProfil` int DEFAULT NULL,
  `idCompetence` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_competence1_idx` (`idCompetence`),
  KEY `fk_profil_idx` (`idProfil`),
  CONSTRAINT `fk_competence1` FOREIGN KEY (`idCompetence`) REFERENCES `competence` (`idCompetence`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_profil` FOREIGN KEY (`idProfil`) REFERENCES `profil` (`idProfil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cv`
--

DROP TABLE IF EXISTS `cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `cv` (
  `idCV` int NOT NULL AUTO_INCREMENT,
  `isValid` tinyint(1) DEFAULT NULL,
  `description` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idCV`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `debouches`
--

DROP TABLE IF EXISTS `debouches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `debouches` (
  `idDebouches` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDebouches`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `domaine` (
  `idDomaine` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idDomaine`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `domaine_competence`
--

DROP TABLE IF EXISTS `domaine_competence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `domaine_competence` (
  `idDomaine` int NOT NULL,
  `idCompetence` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idDomaine_2` (`idDomaine`,`idCompetence`),
  KEY `idDomaine` (`idDomaine`,`idCompetence`),
  KEY `FK_domaineCompetence1` (`idCompetence`),
  CONSTRAINT `FK_domaineCompetence` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`),
  CONSTRAINT `FK_domaineCompetence1` FOREIGN KEY (`idCompetence`) REFERENCES `competence` (`idCompetence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `domaine_formation`
--

DROP TABLE IF EXISTS `domaine_formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `domaine_formation` (
  `idDomaine` int NOT NULL,
  `idFormation` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idDomaine` (`idDomaine`,`idFormation`),
  KEY `idDomaine_2` (`idDomaine`,`idFormation`),
  KEY `FK_domaineFormation1` (`idFormation`),
  CONSTRAINT `FK_domaineFormation` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`),
  CONSTRAINT `FK_domaineFormation1` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `entreprise` (
  `idEntreprise` int NOT NULL AUTO_INCREMENT,
  `idPointFocal` int DEFAULT NULL,
  `nomEntreprise` varchar(254) DEFAULT NULL,
  `presentation` varchar(254) DEFAULT NULL,
  `logo` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `siteWeb` varchar(254) DEFAULT NULL,
  `idVille` int DEFAULT NULL,
  `statut` varchar(254) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `archive` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idEntreprise`),
  KEY `FK_pointFocalEntreprise` (`idPointFocal`),
  KEY `FK_entreprise_ville` (`idVille`),
  CONSTRAINT `FK_entreprise_ville` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`),
  CONSTRAINT `FK_pointFocalEntreprise` FOREIGN KEY (`idPointFocal`) REFERENCES `pointfocal` (`idPointFocal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `etablissement` (
  `idEtablissement` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `telephone` varchar(254) DEFAULT NULL,
  `nomContact` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idEtablissement`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `etudiant` (
  `idEtudiant` int NOT NULL AUTO_INCREMENT,
  `idCV` int DEFAULT NULL,
  `idUfr` int DEFAULT NULL,
  `idUtilisateur` int DEFAULT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `genre` varchar(254) DEFAULT NULL,
  `dateNaissance` varchar(254) DEFAULT NULL,
  `telephone` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `civilite` varchar(254) DEFAULT NULL,
  `nationalite` varchar(254) DEFAULT NULL,
  `lieuNaissance` varchar(254) DEFAULT NULL,
  `photo` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `numCarte` varchar(254) DEFAULT NULL,
  `isAlumni` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idEtudiant`),
  KEY `FK_etudiantCv` (`idCV`),
  KEY `FK_ufrEtudiant` (`idUfr`),
  KEY `idUtilisateur_idx` (`idUtilisateur`),
  CONSTRAINT `idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `experience` (
  `idExperience` int NOT NULL AUTO_INCREMENT,
  `idVille` int DEFAULT NULL,
  `idCV` int NOT NULL,
  `intitulePoste` varchar(254) DEFAULT NULL,
  `employeur` varchar(254) DEFAULT NULL,
  `dateDebut` varchar(254) DEFAULT NULL,
  `dateFin` varchar(254) DEFAULT NULL,
  `currrent` tinyint(1) DEFAULT NULL,
  `missionsPrincipales` varchar(254) DEFAULT NULL,
  `realisation` text,
  PRIMARY KEY (`idExperience`),
  KEY `FK_experienceCv` (`idCV`),
  KEY `FK_villeExperience` (`idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `formation`
--

DROP TABLE IF EXISTS `formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `formation` (
  `idFormation` int NOT NULL AUTO_INCREMENT,
  `idVille` int DEFAULT NULL,
  `idEtablissement` int NOT NULL,
  `typeFormation` varchar(254) DEFAULT NULL,
  `diplomeEquivalent` varchar(254) DEFAULT NULL,
  `intituleDiplome` varchar(254) DEFAULT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL,
  `description` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idFormation`),
  KEY `FK_etablisementFormation` (`idEtablissement`),
  KEY `FK_villeFormation` (`idVille`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `formation_cv`
--

DROP TABLE IF EXISTS `formation_cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `formation_cv` (
  `idFormation` int NOT NULL,
  `idCV` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idFormation` (`idFormation`,`idCV`),
  KEY `idFormation_2` (`idFormation`,`idCV`),
  KEY `FK_FormationCV1` (`idCV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table formation_debouches
--
CREATE TABLE `formation_debouches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idFormation` int DEFAULT NULL,
  `idDebouches` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fd_formation_idx` (`idFormation`),
  KEY `fk_fd_debouche_idx` (`idDebouches`),
  CONSTRAINT `fk_fd_debouche` FOREIGN KEY (`idDebouches`) REFERENCES `debouches` (`idDebouches`) ON DELETE CASCADE,
  CONSTRAINT `fk_fd_formation` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Table structure for table `formationactivite`
--

DROP TABLE IF EXISTS `formationactivite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `formationactivite` (
  `idOpportunite` int NOT NULL,
  `nomAnimateur` varchar(254) DEFAULT NULL,
  `prenomAnimateur` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idOpportunite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `langue`
--

DROP TABLE IF EXISTS `langue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `langue` (
  `idLangue` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idLangue`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `langue_cv`
--

DROP TABLE IF EXISTS `langue_cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `langue_cv` (
  `idLangue` int NOT NULL,
  `idCV` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `niveau` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idLangue` (`idLangue`,`idCV`),
  KEY `idLangue_2` (`idLangue`,`idCV`),
  KEY `FK_langueCV1` (`idCV`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `idMedia` int NOT NULL AUTO_INCREMENT,
  `idArticle` int NOT NULL,
  `chemin` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idMedia`),
  KEY `FK_mediaArticle` (`idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `niveauetude`
--

DROP TABLE IF EXISTS `niveauetude`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `niveauetude` (
  `idNiveauEtude` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idNiveauEtude`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `niveauetude_formation`
--

DROP TABLE IF EXISTS `niveauetude_formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `niveauetude_formation` (
  `idNiveauEtude` int NOT NULL,
  `idFormation` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idNiveauEtude` (`idNiveauEtude`,`idFormation`),
  KEY `idNiveauEtude_2` (`idNiveauEtude`,`idFormation`),
  KEY `FK_niveauEtudeFormation1` (`idFormation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `offre`
--

DROP TABLE IF EXISTS `offre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `offre` (
  `idOpportunite` int NOT NULL,
  `idEntreprise` int NOT NULL,
  `idTypeContrat` int NOT NULL,
  `idNiveauEtude` int NOT NULL,
  `idVille` int DEFAULT NULL,
  `idProfession` int NOT NULL,
  `mission` varchar(254) DEFAULT NULL,
  `prerequis` varchar(254) DEFAULT NULL,
  `details` varchar(254) DEFAULT NULL,
  `dateCloture` datetime DEFAULT NULL,
  `idProfil` int DEFAULT NULL,
  PRIMARY KEY (`idOpportunite`),
  KEY `FK_entrepriseOffre` (`idEntreprise`),
  KEY `FK_niveauEtudeOfrre` (`idNiveauEtude`),
  KEY `FK_offreTypeContrat` (`idTypeContrat`),
  KEY `FK_professionOfrre` (`idProfession`),
  KEY `FK_villeOffre` (`idVille`),
  KEY `idProfil_idx` (`idProfil`),
  CONSTRAINT `idProfil` FOREIGN KEY (`idProfil`) REFERENCES `profil` (`idProfil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `opportunite`
--

DROP TABLE IF EXISTS `opportunite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `opportunite` (
  `idOpportunite` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  `datePublication` datetime DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idOpportunite`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `opportunite_etudiant`
--

DROP TABLE IF EXISTS `opportunite_etudiant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `opportunite_etudiant` (
  `idOpportunite` int NOT NULL,
  `idEtudiant` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idOpportunite` (`idOpportunite`,`idEtudiant`),
  KEY `idOpportunite_2` (`idOpportunite`,`idEtudiant`),
  KEY `FK_opportuniteEtudiant1` (`idEtudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `pays` (
  `idPays` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idPays`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pointfocal`
--

DROP TABLE IF EXISTS `pointfocal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `pointfocal` (
  `idPointFocal` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `telephone` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idPointFocal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profession`
--

DROP TABLE IF EXISTS `profession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `profession` (
  `idProfession` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idProfession`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `profil` (
  `idProfil` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idProfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profil_cv`
--

DROP TABLE IF EXISTS `profil_cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `profil_cv` (
  `idProfil` int NOT NULL,
  `idCV` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idProfil` (`idProfil`,`idCV`),
  KEY `idProfil_2` (`idProfil`,`idCV`),
  KEY `FK_profilCV1` (`idCV`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ressource`
--

DROP TABLE IF EXISTS `ressource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `ressource` (
  `idRessource` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idRessource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `idRole` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `secteur` (
  `idSecteur` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idSecteur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `secteur_entreprise`
--

DROP TABLE IF EXISTS `secteur_entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `secteur_entreprise` (
  `idSecteur` int NOT NULL,
  `idEntreprise` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `archive` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idSecteur` (`idSecteur`,`idEntreprise`),
  KEY `idSecteur_2` (`idSecteur`,`idEntreprise`),
  KEY `FK_secteurEntreprise1` (`idEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `idSection` int NOT NULL AUTO_INCREMENT,
  `idUfr` int NOT NULL,
  `idPointFocal` int DEFAULT NULL,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idSection`),
  KEY `FK_pointFocalSection` (`idPointFocal`),
  KEY `FK_sectionUfr` (`idUfr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `seminaire`
--

DROP TABLE IF EXISTS `seminaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `seminaire` (
  `idOpportunite` int NOT NULL,
  `nomAnimateur` varchar(254) DEFAULT NULL,
  `prenomAnimateur` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idOpportunite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `idTag` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tag_article`
--

DROP TABLE IF EXISTS `tag_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `tag_article` (
  `idTag` int NOT NULL,
  `idArticle` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idTag` (`idTag`,`idArticle`),
  KEY `idTag_2` (`idTag`,`idArticle`),
  KEY `FK_tagArticle1` (`idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `thematique`
--

DROP TABLE IF EXISTS `thematique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `thematique` (
  `idThematique` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idThematique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `thematique_activite`
--

DROP TABLE IF EXISTS `thematique_activite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `thematique_activite` (
  `idThematique` int NOT NULL,
  `idOpportunite` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idThematique` (`idThematique`,`idOpportunite`),
  KEY `idThematique_2` (`idThematique`,`idOpportunite`),
  KEY `FK_thematiqueActivite1` (`idOpportunite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `typecontrat`
--

DROP TABLE IF EXISTS `typecontrat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `typecontrat` (
  `idTypeContrat` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  `archive` tinyint DEFAULT '1',
  PRIMARY KEY (`idTypeContrat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ufr`
--

DROP TABLE IF EXISTS `ufr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `ufr` (
  `idUfr` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idUfr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `idUtilisateur` int NOT NULL AUTO_INCREMENT,
  `email` varchar(254) DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT '1',
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `code_etudiant` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `utilisateur_ressource`
--

DROP TABLE IF EXISTS `utilisateur_ressource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur_ressource` (
  `idUtilisateur` int NOT NULL,
  `idRessource` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUtilisateur` (`idUtilisateur`,`idRessource`),
  KEY `idUtilisateur_2` (`idUtilisateur`,`idRessource`),
  KEY `FK_utilisateur_ressource1` (`idRessource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `utilisateur_role`
--

DROP TABLE IF EXISTS `utilisateur_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur_role` (
  `idUtilisateur` int NOT NULL,
  `idRole` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUtilisateur` (`idUtilisateur`,`idRole`),
  KEY `idUtilisateur_2` (`idUtilisateur`,`idRole`),
  KEY `FK_utilisateurRole1` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ville`
--

DROP TABLE IF EXISTS `ville`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `ville` (
  `idVille` int NOT NULL AUTO_INCREMENT,
  `idPays` int NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idVille`),
  KEY `FK_villePays` (`idPays`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `visite`
--

DROP TABLE IF EXISTS `visite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `visite` (
  `idOpportunite` int NOT NULL,
  `idEntreprise` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `heure` varchar(254) DEFAULT NULL,
  `lieuDepart` varchar(254) DEFAULT NULL,
  `contact` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idOpportunite`),
  KEY `FK_visiteEntreprise` (`idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
--Trigger archive entreprise - secteur_entreprise
--
CREATE TRIGGER trg_ent_flagdel
AFTER UPDATE ON entreprise
FOR EACH ROW

BEGIN
  IF (new.archive = 1) THEN
      UPDATE secteur_entreprise set archive = 1 WHERE idEntreprise = new.idEntreprise;
  END IF;
END

--
--Ajout de la colonne archive à la table typeContrat
--
ALTER TABLE typeContrat ADD COLUMN archive boolean DEFAULT 0 AFTER intitule;



---------------------------------
---- Dernieres modifications ----
---------------------------------

---
--- 
---
ALTER TABLE entreprise DROP CONSTRAINT FK_pointFocalEntreprise;
ALTER TABLE `entreprise`
  ADD CONSTRAINT `FK_pointFocalEntreprise` FOREIGN KEY (`idPointFocal`) REFERENCES `utilisateur` (`idUtilisateur`);


ALTER TABLE etudiant DROP COLUMN idUfr;

ALTER TABLE `utilisateur`
  ADD COLUMN idUfr int(11),
  ADD CONSTRAINT `FK_ufrUtilisateur` FOREIGN KEY (`idUfr`) REFERENCES `ufr` (`idUfr`);

ALTER TABLE entreprise CHANGE COLUMN statut partenaire int(11) DEFAULT 1;

ALTER TABLE 'profil'
  ADD COLUMN idDomaine int(11),
  ADD CONSTRAINT 'FK_domaine_profil' FOREIGN KEY ('idDomaine') REFERENCES 'domaine' ('idDomaine');

ALTER TABLE typecontrat MODIFY archive int(11) DEFAULT 0;

ALTER TABLE 'domaine'
  ADD COLUMN icon varchar(250);
---------------------------------
----- Fin des modifications -----
---------------------------------

--
-- Temporary view structure for view `vw_offre_avec_critere`
--

DROP TABLE IF EXISTS `vw_offre_avec_critere`;
/*!50001 DROP VIEW IF EXISTS `vw_offre_avec_critere`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8 */;
/*!50001 CREATE VIEW `vw_offre_avec_critere` AS SELECT 
 1 AS `idOpportunite`,
 1 AS `idEntreprise`,
 1 AS `idTypeContrat`,
 1 AS `idNiveauEtude`,
 1 AS `idVille`,
 1 AS `idProfession`,
 1 AS `idProfil`,
 1 AS `mission`,
 1 AS `prerequis`,
 1 AS `details`,
 1 AS `dateCloture`,
 1 AS `title`,
 1 AS `datePublication`,
 1 AS `statut`,
 1 AS `nomEntreprise`,
 1 AS `adresse`,
 1 AS `logo`,
 1 AS `contractType`,
 1 AS `nom`,
 1 AS `studyLevel`,
 1 AS `profil`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'pocdb'
--

--
-- Dumping routines for database 'pocdb'
--

--
-- Final view structure for view `vw_offre_avec_critere`
--

/*!50001 DROP VIEW IF EXISTS `vw_offre_avec_critere`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_mysql500_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_offre_avec_critere` AS select `o`.`idOpportunite` AS `idOpportunite`,`o`.`idEntreprise` AS `idEntreprise`,`o`.`idTypeContrat` AS `idTypeContrat`,`o`.`idNiveauEtude` AS `idNiveauEtude`,`o`.`idVille` AS `idVille`,`o`.`idProfession` AS `idProfession`,`o`.`idProfil` AS `idProfil`,`o`.`mission` AS `mission`,`o`.`prerequis` AS `prerequis`,`o`.`details` AS `details`,`o`.`dateCloture` AS `dateCloture`,`op`.`intitule` AS `title`,`op`.`datePublication` AS `datePublication`,`op`.`statut` AS `statut`,`e`.`nomEntreprise` AS `nomEntreprise`,`e`.`adresse` AS `adresse`,`e`.`logo` AS `logo`,`tc`.`intitule` AS `contractType`,`v`.`nom` AS `nom`,`niv`.`intitule` AS `studyLevel`,`p`.`intitule` AS `profil` from ((((((`opportunite` `op` join `offre` `o`) join `profil` `p`) join `ville` `v`) join `typecontrat` `tc`) join `entreprise` `e`) join `niveauetude` `niv`) where ((`o`.`idOpportunite` = `op`.`idOpportunite`) and (`o`.`idEntreprise` = `e`.`idEntreprise`) and (`o`.`idTypeContrat` = `tc`.`idTypeContrat`) and (`o`.`idVille` = `v`.`idVille`) and (`o`.`idNiveauEtude` = `niv`.`idNiveauEtude`) and (`o`.`idProfil` = `p`.`idProfil`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-07 22:28:06
