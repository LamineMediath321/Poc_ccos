-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: pocdb
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activite` (
  `idOpportunite` int NOT NULL,
  `description` varchar(254) DEFAULT NULL,
  `lieu` varchar(254) DEFAULT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL,
  `nombrePlace` int DEFAULT NULL,
  PRIMARY KEY (`idOpportunite`),
  CONSTRAINT `FK_Generalisation_8` FOREIGN KEY (`idOpportunite`) REFERENCES `opportunite` (`idOpportunite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activite`
--

LOCK TABLES `activite` WRITE;
/*!40000 ALTER TABLE `activite` DISABLE KEYS */;
/*!40000 ALTER TABLE `activite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `article` (
  `idArticle` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(254) DEFAULT NULL,
  `contenu` varchar(254) DEFAULT NULL,
  `datePublication` datetime DEFAULT NULL,
  PRIMARY KEY (`idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_thematique`
--

DROP TABLE IF EXISTS `article_thematique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_thematique`
--

LOCK TABLES `article_thematique` WRITE;
/*!40000 ALTER TABLE `article_thematique` DISABLE KEYS */;
/*!40000 ALTER TABLE `article_thematique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `intitule` int DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_article`
--

DROP TABLE IF EXISTS `categorie_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_article`
--

LOCK TABLES `categorie_article` WRITE;
/*!40000 ALTER TABLE `categorie_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commentaire` (
  `idCommentaire` int NOT NULL AUTO_INCREMENT,
  `idArticle` int NOT NULL,
  `contenu` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `FK_commentaireArticle` (`idArticle`),
  CONSTRAINT `FK_commentaireArticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentaire`
--

LOCK TABLES `commentaire` WRITE;
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `commentaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competence`
--

DROP TABLE IF EXISTS `competence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competence` (
  `idCompetence` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  `archive` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idCompetence`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competence`
--

LOCK TABLES `competence` WRITE;
/*!40000 ALTER TABLE `competence` DISABLE KEYS */;
INSERT INTO `competence` VALUES (6,'PHP',0),(7,'UML',0);
/*!40000 ALTER TABLE `competence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competence_cv`
--

DROP TABLE IF EXISTS `competence_cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competence_cv` (
  `idcompetence_cv` int NOT NULL AUTO_INCREMENT,
  `idCompetence` int DEFAULT NULL,
  `idCV` int DEFAULT NULL,
  PRIMARY KEY (`idcompetence_cv`),
  KEY `idCompetence_idx` (`idCompetence`),
  KEY `idCV_idx` (`idCV`),
  CONSTRAINT `idCompetence` FOREIGN KEY (`idCompetence`) REFERENCES `competence` (`idCompetence`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idCV` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competence_cv`
--

LOCK TABLES `competence_cv` WRITE;
/*!40000 ALTER TABLE `competence_cv` DISABLE KEYS */;
INSERT INTO `competence_cv` VALUES (5,6,2),(6,7,2);
/*!40000 ALTER TABLE `competence_cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competence_profil`
--

DROP TABLE IF EXISTS `competence_profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competence_profil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idProfil` int DEFAULT NULL,
  `idCompetence` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_competence1_idx` (`idCompetence`),
  KEY `fk_profil_idx` (`idProfil`),
  CONSTRAINT `fk_competence1` FOREIGN KEY (`idCompetence`) REFERENCES `competence` (`idCompetence`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_profil` FOREIGN KEY (`idProfil`) REFERENCES `profil` (`idProfil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competence_profil`
--

LOCK TABLES `competence_profil` WRITE;
/*!40000 ALTER TABLE `competence_profil` DISABLE KEYS */;
/*!40000 ALTER TABLE `competence_profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cv`
--

DROP TABLE IF EXISTS `cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cv` (
  `idCV` int NOT NULL AUTO_INCREMENT,
  `isValid` tinyint(1) DEFAULT NULL,
  `description` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idCV`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv`
--

LOCK TABLES `cv` WRITE;
/*!40000 ALTER TABLE `cv` DISABLE KEYS */;
INSERT INTO `cv` VALUES (2,NULL,"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has s'),(3,NULL,'jddlsjd djjkdskjks sjkjdslkdjsn skjdkjskdjsk, djsdjsjhndjb nsjdnsjdj sdsjds<br>");
/*!40000 ALTER TABLE `cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `debouches`
--

DROP TABLE IF EXISTS `debouches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `debouches` (
  `idDebouches` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`idDebouches`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `debouches`
--

LOCK TABLES `debouches` WRITE;
/*!40000 ALTER TABLE `debouches` DISABLE KEYS */;
/*!40000 ALTER TABLE `debouches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domaine` (
  `idDomaine` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  `icon` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idDomaine`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;
 ALTER TABLE domaine MODIFY intitule varchar(250) NOT NULL;
--
-- Dumping data for table `domaine`
--

LOCK TABLES `domaine` WRITE;
/*!40000 ALTER TABLE `domaine` DISABLE KEYS */;
INSERT INTO `domaine` VALUES (4,'Informatique','icon-laptop'),(5,'Economie','icon-usd'),(6,'Jurique','icon-suitcase'),(7,'Santé','icon-user-md'),(8,'Ingénierie','icon-home'),(9,'Agronomie','icon-leaf'),(10,'Télécommunication','icon-signal'),(11,'Géographie','icon-globe');
/*!40000 ALTER TABLE `domaine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domaine_competence`
--

DROP TABLE IF EXISTS `domaine_competence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domaine_competence`
--

LOCK TABLES `domaine_competence` WRITE;
/*!40000 ALTER TABLE `domaine_competence` DISABLE KEYS */;
/*!40000 ALTER TABLE `domaine_competence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domaine_formation`
--

DROP TABLE IF EXISTS `domaine_formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domaine_formation`
--

LOCK TABLES `domaine_formation` WRITE;
/*!40000 ALTER TABLE `domaine_formation` DISABLE KEYS */;
INSERT INTO `domaine_formation` VALUES (4,3,2),(4,4,3),(5,2,1);
/*!40000 ALTER TABLE `domaine_formation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entreprise` (
  `idEntreprise` int NOT NULL AUTO_INCREMENT,
  `idPointFocal` int DEFAULT NULL,
  `nomEntreprise` varchar(254) DEFAULT NULL,
  `presentation` text,
  `logo` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `siteWeb` varchar(254) DEFAULT NULL,
  `idVille` int DEFAULT NULL,
  `partenaire` int DEFAULT '1',
  `email` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `archive` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idEntreprise`),
  KEY `FK_pointFocalEntreprise` (`idPointFocal`),
  KEY `FK_entreprise_ville` (`idVille`),
  CONSTRAINT `entreprise_ibfk_1` FOREIGN KEY (`idPointFocal`) REFERENCES `utilisateur` (`idUtilisateur`),
  CONSTRAINT `FK_entreprise_ville` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entreprise`
--

LOCK TABLES `entreprise` WRITE;
/*!40000 ALTER TABLE `entreprise` DISABLE KEYS */;
INSERT INTO `entreprise` VALUES (23,NULL,'CCOS',' lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit ','1635544612_5d665099172f8e8bbe30.png','Sanar','ccos.sn',5,1,'ccos@ugb.edu.sn','77 000 00 00',0),(32,18,'Google','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio, aliquid inventore. Facere distinctio, explicabo expedita aliquid, blanditiis consectetur labore cumque vel nesciunt numquam accusantium minima inventore aspernatur! Libero, quod deserunt1 Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio, aliquid inventore. Facere distinctio, explicabo expedita aliquid, blanditiis consectetur labore cumque vel nesciunt numquam accusantium minima inventore aspernatur! Libero, quod deserunt!','1635740383_30bef6a69d33eb5e39e1.jpg','Sanar','google.com',NULL,1,'google@gmail.com','77 000 00 00',0);
/*!40000 ALTER TABLE `entreprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etablissement` (
  `idEtablissement` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `telephone` varchar(254) DEFAULT NULL,
  `nomContact` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idEtablissement`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etablissement`
--

LOCK TABLES `etablissement` WRITE;
/*!40000 ALTER TABLE `etablissement` DISABLE KEYS */;
INSERT INTO `etablissement` VALUES (4,'Universite Gaston Berger',NULL,NULL,NULL);
/*!40000 ALTER TABLE `etablissement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etudiant` (
  `idEtudiant` int NOT NULL AUTO_INCREMENT,
  `idCV` int DEFAULT NULL,
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
  KEY `idUtilisateur_idx` (`idUtilisateur`),
  CONSTRAINT `idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etudiant`
--

LOCK TABLES `etudiant` WRITE;
/*!40000 ALTER TABLE `etudiant` DISABLE KEYS */;
INSERT INTO `etudiant` VALUES (2,2,3,'ndiaye','fatou','F','1998-12-31','77 000 00 00','fatou@gmail.com',NULL,'Senegalaise','Mbour','1635294216_f068dd6d4ef553c08480.png','Ngallele',NULL,NULL),(3,3,8,'FAYE','Ndeye Sohna','F','2021-10-31','77 000 00 00','sohna@gmail.com',NULL,'Senegalaise','PIkine','1635644364_488d379005661bf00b8e.png','Pikine',NULL,NULL);
/*!40000 ALTER TABLE `etudiant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` VALUES (1,NULL,2,'FullStack developpeur','CCOS','2020-11-23','2021-04-23',NULL,NULL,'lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh'),(2,NULL,2,'FullStack developpeur','CCOS','2021-11-21','2020-09-21',NULL,NULL,' '),(3,NULL,2,'FullStack developpeur','CCOS','2020-09-21','2021-09-21',NULL,NULL,'<h2>Test</h2><p><strong>dkdjjd </strong><i><strong>llfd </strong></i>dkdlk</p><ul><li>cdld</li><li>dd;ld</li></ul>');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formation`
--

DROP TABLE IF EXISTS `formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formation`
--

LOCK TABLES `formation` WRITE;
/*!40000 ALTER TABLE `formation` DISABLE KEYS */;
INSERT INTO `formation` VALUES (2,NULL,4,NULL,NULL,NULL,'2017-12-11 00:00:00','2021-04-12 00:00:00','lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh'),(3,NULL,4,NULL,NULL,NULL,'2017-12-11 00:00:00','2021-04-12 00:00:00','lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh\r\n '),(4,NULL,4,NULL,NULL,NULL,'2021-04-22 00:00:00','2023-12-22 00:00:00','lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh ');
/*!40000 ALTER TABLE `formation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formation_cv`
--

DROP TABLE IF EXISTS `formation_cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formation_cv` (
  `idFormation` int NOT NULL,
  `idCV` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idFormation` (`idFormation`,`idCV`),
  KEY `idFormation_2` (`idFormation`,`idCV`),
  KEY `FK_FormationCV1` (`idCV`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formation_cv`
--

LOCK TABLES `formation_cv` WRITE;
/*!40000 ALTER TABLE `formation_cv` DISABLE KEYS */;
INSERT INTO `formation_cv` VALUES (2,2,1),(3,2,2),(4,2,3);
/*!40000 ALTER TABLE `formation_cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formation_debouches`
--

DROP TABLE IF EXISTS `formation_debouches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formation_debouches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idFormation` int DEFAULT NULL,
  `idDebouches` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fd_formation_idx` (`idFormation`),
  KEY `fk_fd_debouche_idx` (`idDebouches`),
  CONSTRAINT `fk_fd_debouche` FOREIGN KEY (`idDebouches`) REFERENCES `debouches` (`idDebouches`) ON DELETE CASCADE,
  CONSTRAINT `fk_fd_formation` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formation_debouches`
--

LOCK TABLES `formation_debouches` WRITE;
/*!40000 ALTER TABLE `formation_debouches` DISABLE KEYS */;
/*!40000 ALTER TABLE `formation_debouches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formationactivite`
--

DROP TABLE IF EXISTS `formationactivite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formationactivite` (
  `idOpportunite` int NOT NULL,
  `nomAnimateur` varchar(254) DEFAULT NULL,
  `prenomAnimateur` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idOpportunite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formationactivite`
--

LOCK TABLES `formationactivite` WRITE;
/*!40000 ALTER TABLE `formationactivite` DISABLE KEYS */;
/*!40000 ALTER TABLE `formationactivite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `langue`
--

DROP TABLE IF EXISTS `langue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `langue` (
  `idLangue` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idLangue`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `langue`
--

LOCK TABLES `langue` WRITE;
/*!40000 ALTER TABLE `langue` DISABLE KEYS */;
INSERT INTO `langue` VALUES (6,'Francais'),(7,'Pulaar'),(8,'Anglais'),(9,'Wolof');
/*!40000 ALTER TABLE `langue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `langue_cv`
--

DROP TABLE IF EXISTS `langue_cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `langue_cv` (
  `idLangue` int NOT NULL,
  `idCV` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `niveau` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idLangue` (`idLangue`,`idCV`),
  KEY `idLangue_2` (`idLangue`,`idCV`),
  KEY `FK_langueCV1` (`idCV`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `langue_cv`
--

LOCK TABLES `langue_cv` WRITE;
/*!40000 ALTER TABLE `langue_cv` DISABLE KEYS */;
INSERT INTO `langue_cv` VALUES (7,2,3,'Maternelle'),(6,2,4,'Tres bien'),(8,2,5,'Moyen');
/*!40000 ALTER TABLE `langue_cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `idMedia` int NOT NULL AUTO_INCREMENT,
  `idArticle` int NOT NULL,
  `chemin` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idMedia`),
  KEY `FK_mediaArticle` (`idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveauetude`
--

DROP TABLE IF EXISTS `niveauetude`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `niveauetude` (
  `idNiveauEtude` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idNiveauEtude`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveauetude`
--

LOCK TABLES `niveauetude` WRITE;
/*!40000 ALTER TABLE `niveauetude` DISABLE KEYS */;
INSERT INTO `niveauetude` VALUES (2,'Bac +3'),(3,'Bac +5');
/*!40000 ALTER TABLE `niveauetude` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveauetude_formation`
--

DROP TABLE IF EXISTS `niveauetude_formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `niveauetude_formation` (
  `idNiveauEtude` int NOT NULL,
  `idFormation` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idNiveauEtude` (`idNiveauEtude`,`idFormation`),
  KEY `idNiveauEtude_2` (`idNiveauEtude`,`idFormation`),
  KEY `FK_niveauEtudeFormation1` (`idFormation`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveauetude_formation`
--

LOCK TABLES `niveauetude_formation` WRITE;
/*!40000 ALTER TABLE `niveauetude_formation` DISABLE KEYS */;
INSERT INTO `niveauetude_formation` VALUES (2,3,2),(3,2,1),(3,4,3);
/*!40000 ALTER TABLE `niveauetude_formation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offre`
--

DROP TABLE IF EXISTS `offre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  `archive` int DEFAULT '0',
  PRIMARY KEY (`idOpportunite`),
  KEY `FK_entrepriseOffre` (`idEntreprise`),
  KEY `FK_niveauEtudeOfrre` (`idNiveauEtude`),
  KEY `FK_offreTypeContrat` (`idTypeContrat`),
  KEY `FK_professionOfrre` (`idProfession`),
  KEY `FK_villeOffre` (`idVille`),
  KEY `idProfil_idx` (`idProfil`),
  CONSTRAINT `idProfil` FOREIGN KEY (`idProfil`) REFERENCES `profil` (`idProfil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offre`
--

LOCK TABLES `offre` WRITE;
/*!40000 ALTER TABLE `offre` DISABLE KEYS */;
INSERT INTO `offre` VALUES (9,23,3,2,7,0,' lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit ',' lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit ',' lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit ','2021-11-19 00:00:00',4,0),(10,23,5,3,7,0,' lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit ',' lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit ',' lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit ','2021-11-07 00:00:00',4,0),(11,32,4,3,5,0,'<h4>Test</h4><br><div><div><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa iusto similique laudantium atque commodi neque temporibus voluptates perferendis, magni eos dolore? Voluptatibus temporibus repudiandae soluta ipsum voluptas, ','<div><div><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa iusto similique laudantium atque commodi neque temporibus voluptates perferendis, magni eos dolore? Voluptatibus temporibus repudiandae soluta ipsum voluptas, quod expedita exe','<div><b>kjdkjd </b><i>dlolsk</i></div><div><ul><li><i>dd</i></li><li><i>fgh</i></li><li><i>dghd</i></li><li><i>cx<br></i></li></ul></div>','2021-12-05 00:00:00',5,0);
/*!40000 ALTER TABLE `offre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opportunite`
--

DROP TABLE IF EXISTS `opportunite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opportunite` (
  `idOpportunite` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  `datePublication` datetime DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idOpportunite`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opportunite`
--

LOCK TABLES `opportunite` WRITE;
/*!40000 ALTER TABLE `opportunite` DISABLE KEYS */;
INSERT INTO `opportunite` VALUES (9,'Junior developpeur','2021-10-29 00:00:00',0),(10,'Web developpeur','2021-10-29 00:00:00',0),(11,'Administrateur de bdd','2021-11-01 00:00:00',0);
/*!40000 ALTER TABLE `opportunite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opportunite_etudiant`
--

DROP TABLE IF EXISTS `opportunite_etudiant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opportunite_etudiant` (
  `idOpportunite` int NOT NULL,
  `idEtudiant` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idOpportunite` (`idOpportunite`,`idEtudiant`),
  KEY `idOpportunite_2` (`idOpportunite`,`idEtudiant`),
  KEY `FK_opportuniteEtudiant1` (`idEtudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Add a new column in the table opportunite_etudiant

ALTER TABLE opportunite_etudiant ADD COLUMN date_postulee datetime;
ALTER TABLE opportunite_etudiant ADD COLUMN statut varchar(254) DEFAULT 'En attente';

--
-- Dumping data for table `opportunite_etudiant`
--

LOCK TABLES `opportunite_etudiant` WRITE;
/*!40000 ALTER TABLE `opportunite_etudiant` DISABLE KEYS */;
/*!40000 ALTER TABLE `opportunite_etudiant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pays` (
  `idPays` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idPays`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pays`
--

LOCK TABLES `pays` WRITE;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` VALUES (2,'Senegal'),(3,'Mali'),(4,'Mauritanie');
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pointfocal`
--

DROP TABLE IF EXISTS `pointfocal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pointfocal` (
  `idPointFocal` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `telephone` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idPointFocal`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pointfocal`
--

LOCK TABLES `pointfocal` WRITE;
/*!40000 ALTER TABLE `pointfocal` DISABLE KEYS */;
INSERT INTO `pointfocal` VALUES (3,'test',NULL,NULL,NULL);
/*!40000 ALTER TABLE `pointfocal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profession`
--

DROP TABLE IF EXISTS `profession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profession` (
  `idProfession` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idProfession`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profession`
--

LOCK TABLES `profession` WRITE;
/*!40000 ALTER TABLE `profession` DISABLE KEYS */;
/*!40000 ALTER TABLE `profession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil` (
  `idProfil` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  `idDomaine` int DEFAULT NULL,
  PRIMARY KEY (`idProfil`),
  KEY `FK_domaine_profil` (`idDomaine`),
  CONSTRAINT `FK_domaine_profil` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` VALUES (4,'developpeur web',4),(5,'Administrateur de base de donnees',4),(6,'Comptable',5),(7,'Auditeur',5);
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_cv`
--

DROP TABLE IF EXISTS `profil_cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_cv` (
  `idProfil` int NOT NULL,
  `idCV` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idProfil` (`idProfil`,`idCV`),
  KEY `idProfil_2` (`idProfil`,`idCV`),
  KEY `FK_profilCV1` (`idCV`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_cv`
--

LOCK TABLES `profil_cv` WRITE;
/*!40000 ALTER TABLE `profil_cv` DISABLE KEYS */;
INSERT INTO `profil_cv` VALUES (4,2,15),(4,3,17),(5,2,16);
/*!40000 ALTER TABLE `profil_cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ressource`
--

DROP TABLE IF EXISTS `ressource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ressource` (
  `idRessource` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idRessource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ressource`
--

LOCK TABLES `ressource` WRITE;
/*!40000 ALTER TABLE `ressource` DISABLE KEYS */;
/*!40000 ALTER TABLE `ressource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `idRole` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (4,'etudiant'),(5,'enseignant'),(6,'alumni'),(7,'entreprise'),(8,'admin');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secteur` (
  `idSecteur` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idSecteur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secteur`
--

LOCK TABLES `secteur` WRITE;
/*!40000 ALTER TABLE `secteur` DISABLE KEYS */;
INSERT INTO `secteur` VALUES (6,'Informatique / Télécoms');
/*!40000 ALTER TABLE `secteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secteur_entreprise`
--

DROP TABLE IF EXISTS `secteur_entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secteur_entreprise` (
  `idSecteur` int NOT NULL,
  `idEntreprise` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `archive` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idSecteur` (`idSecteur`,`idEntreprise`),
  KEY `idSecteur_2` (`idSecteur`,`idEntreprise`),
  KEY `FK_secteurEntreprise1` (`idEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secteur_entreprise`
--

LOCK TABLES `secteur_entreprise` WRITE;
/*!40000 ALTER TABLE `secteur_entreprise` DISABLE KEYS */;
INSERT INTO `secteur_entreprise` VALUES (6,23,14,0),(6,24,15,0),(6,25,16,0),(6,26,17,0),(6,27,18,0),(6,28,19,0),(6,29,20,0),(6,30,21,0),(6,31,22,0),(6,32,23,0);
/*!40000 ALTER TABLE `secteur_entreprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section` (
  `idSection` int NOT NULL AUTO_INCREMENT,
  `idUfr` int NOT NULL,
  `idPointFocal` int DEFAULT NULL,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idSection`),
  KEY `FK_pointFocalSection` (`idPointFocal`),
  KEY `FK_sectionUfr` (`idUfr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminaire`
--

DROP TABLE IF EXISTS `seminaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seminaire` (
  `idOpportunite` int NOT NULL,
  `nomAnimateur` varchar(254) DEFAULT NULL,
  `prenomAnimateur` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idOpportunite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminaire`
--

LOCK TABLES `seminaire` WRITE;
/*!40000 ALTER TABLE `seminaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `seminaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tag` (
  `idTag` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag_article`
--

DROP TABLE IF EXISTS `tag_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tag_article` (
  `idTag` int NOT NULL,
  `idArticle` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idTag` (`idTag`,`idArticle`),
  KEY `idTag_2` (`idTag`,`idArticle`),
  KEY `FK_tagArticle1` (`idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag_article`
--

LOCK TABLES `tag_article` WRITE;
/*!40000 ALTER TABLE `tag_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thematique`
--

DROP TABLE IF EXISTS `thematique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thematique` (
  `idThematique` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idThematique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thematique`
--

LOCK TABLES `thematique` WRITE;
/*!40000 ALTER TABLE `thematique` DISABLE KEYS */;
/*!40000 ALTER TABLE `thematique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thematique_activite`
--

DROP TABLE IF EXISTS `thematique_activite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thematique_activite` (
  `idThematique` int NOT NULL,
  `idOpportunite` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idThematique` (`idThematique`,`idOpportunite`),
  KEY `idThematique_2` (`idThematique`,`idOpportunite`),
  KEY `FK_thematiqueActivite1` (`idOpportunite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thematique_activite`
--

LOCK TABLES `thematique_activite` WRITE;
/*!40000 ALTER TABLE `thematique_activite` DISABLE KEYS */;
/*!40000 ALTER TABLE `thematique_activite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typecontrat`
--

DROP TABLE IF EXISTS `typecontrat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `typecontrat` (
  `idTypeContrat` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  `archive` int DEFAULT '0',
  PRIMARY KEY (`idTypeContrat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typecontrat`
--

LOCK TABLES `typecontrat` WRITE;
/*!40000 ALTER TABLE `typecontrat` DISABLE KEYS */;
INSERT INTO `typecontrat` VALUES (3,'Stage',0),(4,'CDD',0),(5,'CDI',0),(6,'Test',1);
/*!40000 ALTER TABLE `typecontrat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ufr`
--

DROP TABLE IF EXISTS `ufr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ufr` (
  `idUfr` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idUfr`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ufr`
--

LOCK TABLES `ufr` WRITE;
/*!40000 ALTER TABLE `ufr` DISABLE KEYS */;
INSERT INTO `ufr` VALUES (1,'SAT'),(2,'SEG'),(3,'SJP'),(4,'CRAC'),(5,'SEFS');
/*!40000 ALTER TABLE `ufr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `idUtilisateur` int NOT NULL AUTO_INCREMENT,
  `email` varchar(254) DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT '1',
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `code_etudiant` varchar(45) DEFAULT NULL,
  `idUfr` int DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `FK_ufrUtilisateur` (`idUfr`),
  CONSTRAINT `FK_ufrUtilisateur` FOREIGN KEY (`idUfr`) REFERENCES `ufr` (`idUfr`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (3,'fatou@gmail.com','$2y$10$YIlU842l7sglhWWmi/yAFefSWKD3F4AGggtJlcRDRVZpmu2DTwxkC',1,'ndiaye','fatou','00 0000',1),(4,'diafra@test.mr','$2y$10$h18u0vsRHg9.q.HTa9ytKex7Hc58q/4dqhYpp.l4VLd/L34CBJBCe',1,'Soumare','Diafra','',NULL),(5,'emma@gmail.com','$2y$10$jAvm5k/0b94WP3a/Q2U3g.TNfo//GiHyUuxeoGJtJdWJX4MXVEpOG',1,'NGOM','Emmanuel','',NULL),(8,'sohna@gmail.com','$2y$10$kAqmuLvlZpgVJiKznZdPSu.Ycgbs8PD6Ur7Ltx5R7GKwZcS5XPqvi',1,'FAYE','Ndeye Sohna','',1),(18,'pape@gmail.com','$2y$10$buhvG5/BYVDMkNXqAlK3CesxyYrb5/002ahZHNuq3PwO6ozvY2P5y',1,'FALL','Pape','',NULL);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur_ressource`
--

DROP TABLE IF EXISTS `utilisateur_ressource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur_ressource` (
  `idUtilisateur` int NOT NULL,
  `idRessource` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUtilisateur` (`idUtilisateur`,`idRessource`),
  KEY `idUtilisateur_2` (`idUtilisateur`,`idRessource`),
  KEY `FK_utilisateur_ressource1` (`idRessource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur_ressource`
--

LOCK TABLES `utilisateur_ressource` WRITE;
/*!40000 ALTER TABLE `utilisateur_ressource` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilisateur_ressource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur_role`
--

DROP TABLE IF EXISTS `utilisateur_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur_role` (
  `idUtilisateur` int NOT NULL,
  `idRole` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUtilisateur` (`idUtilisateur`,`idRole`),
  KEY `idUtilisateur_2` (`idUtilisateur`,`idRole`),
  KEY `FK_utilisateurRole1` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur_role`
--

LOCK TABLES `utilisateur_role` WRITE;
/*!40000 ALTER TABLE `utilisateur_role` DISABLE KEYS */;
INSERT INTO `utilisateur_role` VALUES (3,4,3),(4,8,4),(5,4,5),(6,4,6),(8,4,7),(18,7,8);
/*!40000 ALTER TABLE `utilisateur_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ville`
--

DROP TABLE IF EXISTS `ville`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ville` (
  `idVille` int NOT NULL AUTO_INCREMENT,
  `idPays` int NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idVille`),
  KEY `FK_villePays` (`idPays`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ville`
--

LOCK TABLES `ville` WRITE;
/*!40000 ALTER TABLE `ville` DISABLE KEYS */;
INSERT INTO `ville` VALUES (4,2,'Dakar'),(5,2,'Saint-Louis'),(6,2,'Thies'),(7,0,'Nouakchott');
/*!40000 ALTER TABLE `ville` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visite`
--

DROP TABLE IF EXISTS `visite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visite` (
  `idOpportunite` int NOT NULL,
  `idEntreprise` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `heure` varchar(254) DEFAULT NULL,
  `lieuDepart` varchar(254) DEFAULT NULL,
  `contact` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idOpportunite`),
  KEY `FK_visiteEntreprise` (`idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visite`
--

LOCK TABLES `visite` WRITE;
/*!40000 ALTER TABLE `visite` DISABLE KEYS */;
/*!40000 ALTER TABLE `visite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_offre_avec_critere`
--

DROP TABLE IF EXISTS `vw_offre_avec_critere`;
/*!50001 DROP VIEW IF EXISTS `vw_offre_avec_critere`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
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

-- Dump completed on 2021-11-01  5:23:16