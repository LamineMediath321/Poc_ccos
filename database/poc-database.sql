-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 23 déc. 2020 à 01:53
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetccos1`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `idOpportunite` int(11) NOT NULL,
  `description` varchar(254) DEFAULT NULL,
  `lieu` varchar(254) DEFAULT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL,
  `nombrePlace` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `idArticle` int(11) NOT NULL,
  `titre` varchar(254) DEFAULT NULL,
  `contenu` varchar(254) DEFAULT NULL,
  `datePublication` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article_thematique`
--

CREATE TABLE `article_thematique` (
  `idArticle` int(11) NOT NULL,
  `idThematique` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `intitule` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_article`
--

CREATE TABLE `categorie_article` (
  `idCategorie` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idCommentaire` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `contenu` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `idCompetence` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

CREATE TABLE `cv` (
  `idCV` int(11) NOT NULL,
  `isValid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `idDomaine` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `domaine_competence`
--

CREATE TABLE `domaine_competence` (
  `idDomaine` int(11) NOT NULL,
  `idCompetence` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `domaine_formation`
--

CREATE TABLE `domaine_formation` (
  `idDomaine` int(11) NOT NULL,
  `idFormation` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `idEntreprise` int(11) NOT NULL,
  `idPointFocal` int(11) DEFAULT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `presentation` varchar(254) DEFAULT NULL,
  `logo` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `siteWeb` varchar(254) DEFAULT NULL,
  'idVille' int(11) DEFAULT NULL,
  `statut` varchar(254) DEFAULT NULL,
  `archive` boolean DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `idEtablissement` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `telephone` varchar(254) DEFAULT NULL,
  `nomContact` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idEtudiant` int(11) NOT NULL,
  `idCV` int(11) DEFAULT NULL,
  `idUfr` int(11) DEFAULT NULL,
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
  `isAlumni` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `idExperience` int(11) NOT NULL,
  `idVille` int(11) DEFAULT NULL,
  `idCV` int(11) NOT NULL,
  `intitulePoste` varchar(254) DEFAULT NULL,
  `employeur` varchar(254) DEFAULT NULL,
  `dateDebut` varchar(254) DEFAULT NULL,
  `dateFin` varchar(254) DEFAULT NULL,
  `currrent` tinyint(1) DEFAULT NULL,
  `missionsPrincipales` varchar(254) DEFAULT NULL,
  `realisation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `idFormation` int(11) NOT NULL,
  `idVille` int(11) DEFAULT NULL,
  `idEtablissement` int(11) NOT NULL,
  `typeFormation` varchar(254) DEFAULT NULL,
  `diplomeEquivalent` varchar(254) DEFAULT NULL,
  `intituleDiplome` varchar(254) DEFAULT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formationactivite`
--

CREATE TABLE `formationactivite` (
  `idOpportunite` int(11) NOT NULL,
  `nomAnimateur` varchar(254) DEFAULT NULL,
  `prenomAnimateur` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formation_cv`
--

CREATE TABLE `formation_cv` (
  `idFormation` int(11) NOT NULL,
  `idCV` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE `langue` (
  `idLangue` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `langue_cv`
--

CREATE TABLE `langue_cv` (
  `idLangue` int(11) NOT NULL,
  `idCV` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `idMedia` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `chemin` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `niveauetude`
--

CREATE TABLE `niveauetude` (
  `idNiveauEtude` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `niveauetude_formation`
--

CREATE TABLE `niveauetude_formation` (
  `idNiveauEtude` int(11) NOT NULL,
  `idFormation` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `idOpportunite` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL,
  `idTypeContrat` int(11) NOT NULL,
  `idNiveauEtude` int(11) NOT NULL,
  `idVille` int(11) DEFAULT NULL,
  `idProfession` int(11) NOT NULL,
  `mission` varchar(254) DEFAULT NULL,
  `prerequis` varchar(254) DEFAULT NULL,
  `details` varchar(254) DEFAULT NULL,
  `dateCloture` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `opportunite`
--

CREATE TABLE `opportunite` (
  `idOpportunite` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL,
  `datePublication` datetime DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `opportunite_etudiant`
--

CREATE TABLE `opportunite_etudiant` (
  `idOpportunite` int(11) NOT NULL,
  `idEtudiant` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `idPays` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pointfocal`
--

CREATE TABLE `pointfocal` (
  `idPointFocal` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `telephone` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

CREATE TABLE `profession` (
  `idProfession` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `idProfil` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil_cv`
--

CREATE TABLE `profil_cv` (
  `idProfil` int(11) NOT NULL,
  `idCV` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

CREATE TABLE `ressource` (
  `idRessource` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE `secteur` (
  `idSecteur` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `secteur_entreprise`
--

CREATE TABLE `secteur_entreprise` (
  `idSecteur` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `idSection` int(11) NOT NULL,
  `idUfr` int(11) NOT NULL,
  `idPointFocal` int(11) DEFAULT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `seminaire`
--

CREATE TABLE `seminaire` (
  `idOpportunite` int(11) NOT NULL,
  `nomAnimateur` varchar(254) DEFAULT NULL,
  `prenomAnimateur` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `idTag` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag_article`
--

CREATE TABLE `tag_article` (
  `idTag` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `thematique`
--

CREATE TABLE `thematique` (
  `idThematique` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `thematique_activite`
--

CREATE TABLE `thematique_activite` (
  `idThematique` int(11) NOT NULL,
  `idOpportunite` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typecontrat`
--

CREATE TABLE `typecontrat` (
  `idTypeContrat` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ufr`
--

CREATE TABLE `ufr` (
  `idUfr` int(11) NOT NULL,
  `intitule` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT 1,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_ressource`
--

CREATE TABLE `utilisateur_ressource` (
  `idUtilisateur` int(11) NOT NULL,
  `idRessource` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_role`
--

CREATE TABLE `utilisateur_role` (
  `idUtilisateur` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `idVille` int(11) NOT NULL,
  `idPays` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

CREATE TABLE `visite` (
  `idOpportunite` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `heure` varchar(254) DEFAULT NULL,
  `lieuDepart` varchar(254) DEFAULT NULL,
  `contact` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`idOpportunite`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`);

--
-- Index pour la table `article_thematique`
--
ALTER TABLE `article_thematique`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idArticle_2` (`idArticle`,`idThematique`),
  ADD KEY `FK_articleThematique1` (`idThematique`),
  ADD KEY `idArticle` (`idArticle`,`idThematique`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `categorie_article`
--
ALTER TABLE `categorie_article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idCategorie_2` (`idCategorie`,`idArticle`),
  ADD KEY `FK_categorieArticle` (`idArticle`),
  ADD KEY `idCategorie` (`idCategorie`,`idArticle`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD KEY `FK_commentaireArticle` (`idArticle`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`idCompetence`);

--
-- Index pour la table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`idCV`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`idDomaine`);

--
-- Index pour la table `domaine_competence`
--
ALTER TABLE `domaine_competence`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idDomaine_2` (`idDomaine`,`idCompetence`),
  ADD KEY `idDomaine` (`idDomaine`,`idCompetence`),
  ADD KEY `FK_domaineCompetence1` (`idCompetence`);

--
-- Index pour la table `domaine_formation`
--
ALTER TABLE `domaine_formation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idDomaine` (`idDomaine`,`idFormation`),
  ADD KEY `idDomaine_2` (`idDomaine`,`idFormation`),
  ADD KEY `FK_domaineFormation1` (`idFormation`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`idEntreprise`),
  ADD KEY `FK_pointFocalEntreprise` (`idPointFocal`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`idEtablissement`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idEtudiant`),
  ADD KEY `FK_etudiantCv` (`idCV`),
  ADD KEY `FK_ufrEtudiant` (`idUfr`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`idExperience`),
  ADD KEY `FK_experienceCv` (`idCV`),
  ADD KEY `FK_villeExperience` (`idVille`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`idFormation`),
  ADD KEY `FK_etablisementFormation` (`idEtablissement`),
  ADD KEY `FK_villeFormation` (`idVille`);

--
-- Index pour la table `formationactivite`
--
ALTER TABLE `formationactivite`
  ADD PRIMARY KEY (`idOpportunite`);

--
-- Index pour la table `formation_cv`
--
ALTER TABLE `formation_cv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idFormation` (`idFormation`,`idCV`),
  ADD KEY `idFormation_2` (`idFormation`,`idCV`),
  ADD KEY `FK_FormationCV1` (`idCV`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`idLangue`);

--
-- Index pour la table `langue_cv`
--
ALTER TABLE `langue_cv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idLangue` (`idLangue`,`idCV`),
  ADD KEY `idLangue_2` (`idLangue`,`idCV`),
  ADD KEY `FK_langueCV1` (`idCV`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`idMedia`),
  ADD KEY `FK_mediaArticle` (`idArticle`);

--
-- Index pour la table `niveauetude`
--
ALTER TABLE `niveauetude`
  ADD PRIMARY KEY (`idNiveauEtude`);

--
-- Index pour la table `niveauetude_formation`
--
ALTER TABLE `niveauetude_formation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idNiveauEtude` (`idNiveauEtude`,`idFormation`),
  ADD KEY `idNiveauEtude_2` (`idNiveauEtude`,`idFormation`),
  ADD KEY `FK_niveauEtudeFormation1` (`idFormation`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`idOpportunite`),
  ADD KEY `FK_entrepriseOffre` (`idEntreprise`),
  ADD KEY `FK_niveauEtudeOfrre` (`idNiveauEtude`),
  ADD KEY `FK_offreTypeContrat` (`idTypeContrat`),
  ADD KEY `FK_professionOfrre` (`idProfession`),
  ADD KEY `FK_villeOffre` (`idVille`);

--
-- Index pour la table `opportunite`
--
ALTER TABLE `opportunite`
  ADD PRIMARY KEY (`idOpportunite`);

--
-- Index pour la table `opportunite_etudiant`
--
ALTER TABLE `opportunite_etudiant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idOpportunite` (`idOpportunite`,`idEtudiant`),
  ADD KEY `idOpportunite_2` (`idOpportunite`,`idEtudiant`),
  ADD KEY `FK_opportuniteEtudiant1` (`idEtudiant`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`idPays`);

--
-- Index pour la table `pointfocal`
--
ALTER TABLE `pointfocal`
  ADD PRIMARY KEY (`idPointFocal`);

--
-- Index pour la table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`idProfession`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`idProfil`);

--
-- Index pour la table `profil_cv`
--
ALTER TABLE `profil_cv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idProfil` (`idProfil`,`idCV`),
  ADD KEY `idProfil_2` (`idProfil`,`idCV`),
  ADD KEY `FK_profilCV1` (`idCV`);

--
-- Index pour la table `ressource`
--
ALTER TABLE `ressource`
  ADD PRIMARY KEY (`idRessource`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `secteur`
--
ALTER TABLE `secteur`
  ADD PRIMARY KEY (`idSecteur`);

--
-- Index pour la table `secteur_entreprise`
--
ALTER TABLE `secteur_entreprise`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idSecteur` (`idSecteur`,`idEntreprise`),
  ADD KEY `idSecteur_2` (`idSecteur`,`idEntreprise`),
  ADD KEY `FK_secteurEntreprise1` (`idEntreprise`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`idSection`),
  ADD KEY `FK_pointFocalSection` (`idPointFocal`),
  ADD KEY `FK_sectionUfr` (`idUfr`);

--
-- Index pour la table `seminaire`
--
ALTER TABLE `seminaire`
  ADD PRIMARY KEY (`idOpportunite`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`idTag`);

--
-- Index pour la table `tag_article`
--
ALTER TABLE `tag_article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idTag` (`idTag`,`idArticle`),
  ADD KEY `idTag_2` (`idTag`,`idArticle`),
  ADD KEY `FK_tagArticle1` (`idArticle`);

--
-- Index pour la table `thematique`
--
ALTER TABLE `thematique`
  ADD PRIMARY KEY (`idThematique`);

--
-- Index pour la table `thematique_activite`
--
ALTER TABLE `thematique_activite`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idThematique` (`idThematique`,`idOpportunite`),
  ADD KEY `idThematique_2` (`idThematique`,`idOpportunite`),
  ADD KEY `FK_thematiqueActivite1` (`idOpportunite`);

--
-- Index pour la table `typecontrat`
--
ALTER TABLE `typecontrat`
  ADD PRIMARY KEY (`idTypeContrat`);

--
-- Index pour la table `ufr`
--
ALTER TABLE `ufr`
  ADD PRIMARY KEY (`idUfr`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- Index pour la table `utilisateur_ressource`
--
ALTER TABLE `utilisateur_ressource`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idUtilisateur` (`idUtilisateur`,`idRessource`),
  ADD KEY `idUtilisateur_2` (`idUtilisateur`,`idRessource`),
  ADD KEY `FK_utilisateur_ressource1` (`idRessource`);

--
-- Index pour la table `utilisateur_role`
--
ALTER TABLE `utilisateur_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idUtilisateur` (`idUtilisateur`,`idRole`),
  ADD KEY `idUtilisateur_2` (`idUtilisateur`,`idRole`),
  ADD KEY `FK_utilisateurRole1` (`idRole`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`idVille`),
  ADD KEY `FK_villePays` (`idPays`);

--
-- Index pour la table `visite`
--
ALTER TABLE `visite`
  ADD PRIMARY KEY (`idOpportunite`),
  ADD KEY `FK_visiteEntreprise` (`idEntreprise`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `article_thematique`
--
ALTER TABLE `article_thematique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie_article`
--
ALTER TABLE `categorie_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `idCompetence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cv`
--
ALTER TABLE `cv`
  MODIFY `idCV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `idDomaine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `domaine_competence`
--
ALTER TABLE `domaine_competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `domaine_formation`
--
ALTER TABLE `domaine_formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `idEtablissement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idEtudiant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `idExperience` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `idFormation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation_cv`
--
ALTER TABLE `formation_cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `idLangue` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `langue_cv`
--
ALTER TABLE `langue_cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `idMedia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niveauetude`
--
ALTER TABLE `niveauetude`
  MODIFY `idNiveauEtude` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niveauetude_formation`
--
ALTER TABLE `niveauetude_formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `opportunite`
--
ALTER TABLE `opportunite`
  MODIFY `idOpportunite` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `opportunite_etudiant`
--
ALTER TABLE `opportunite_etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `idPays` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pointfocal`
--
ALTER TABLE `pointfocal`
  MODIFY `idPointFocal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profession`
--
ALTER TABLE `profession`
  MODIFY `idProfession` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `idProfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil_cv`
--
ALTER TABLE `profil_cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ressource`
--
ALTER TABLE `ressource`
  MODIFY `idRessource` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `secteur`
--
ALTER TABLE `secteur`
  MODIFY `idSecteur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `secteur_entreprise`
--
ALTER TABLE `secteur_entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `idSection` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `idTag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tag_article`
--
ALTER TABLE `tag_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `thematique`
--
ALTER TABLE `thematique`
  MODIFY `idThematique` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `thematique_activite`
--
ALTER TABLE `thematique_activite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typecontrat`
--
ALTER TABLE `typecontrat`
  MODIFY `idTypeContrat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ufr`
--
ALTER TABLE `ufr`
  MODIFY `idUfr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur_ressource`
--
ALTER TABLE `utilisateur_ressource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur_role`
--
ALTER TABLE `utilisateur_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `idVille` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `FK_Generalisation_8` FOREIGN KEY (`idOpportunite`) REFERENCES `opportunite` (`idOpportunite`);

--
-- Contraintes pour la table `article_thematique`
--
ALTER TABLE `article_thematique`
  ADD CONSTRAINT `FK_articleThematique` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `FK_articleThematique1` FOREIGN KEY (`idThematique`) REFERENCES `thematique` (`idThematique`);

--
-- Contraintes pour la table `categorie_article`
--
ALTER TABLE `categorie_article`
  ADD CONSTRAINT `FK_categorieArticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `FK_categorieArticle1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_commentaireArticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`);

--
-- Contraintes pour la table `domaine_competence`
--
ALTER TABLE `domaine_competence`
  ADD CONSTRAINT `FK_domaineCompetence` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`),
  ADD CONSTRAINT `FK_domaineCompetence1` FOREIGN KEY (`idCompetence`) REFERENCES `competence` (`idCompetence`);

--
-- Contraintes pour la table `domaine_formation`
--
ALTER TABLE `domaine_formation`
  ADD CONSTRAINT `FK_domaineFormation` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`),
  ADD CONSTRAINT `FK_domaineFormation1` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `FK_pointFocalEntreprise` FOREIGN KEY (`idPointFocal`) REFERENCES `pointfocal` (`idPointFocal`),
  add constraint 'FK_entreprise_ville' foreign key ('idVille') references ville ('idVille');
--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_etudiantCv` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`),
  ADD CONSTRAINT `FK_ufrEtudiant` FOREIGN KEY (`idUfr`) REFERENCES `ufr` (`idUfr`);

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `FK_experienceCv` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`),
  ADD CONSTRAINT `FK_villeExperience` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_etablisementFormation` FOREIGN KEY (`idEtablissement`) REFERENCES `etablissement` (`idEtablissement`),
  ADD CONSTRAINT `FK_villeFormation` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`);

--
-- Contraintes pour la table `formationactivite`
--
ALTER TABLE `formationactivite`
  ADD CONSTRAINT `FK_Generalisation_11` FOREIGN KEY (`idOpportunite`) REFERENCES `activite` (`idOpportunite`);

--
-- Contraintes pour la table `formation_cv`
--
ALTER TABLE `formation_cv`
  ADD CONSTRAINT `FK_FormationCV` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`),
  ADD CONSTRAINT `FK_FormationCV1` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`);

--
-- Contraintes pour la table `langue_cv`
--
ALTER TABLE `langue_cv`
  ADD CONSTRAINT `FK_langueCV` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`idLangue`),
  ADD CONSTRAINT `FK_langueCV1` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`);

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `FK_mediaArticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`);

--
-- Contraintes pour la table `niveauetude_formation`
--
ALTER TABLE `niveauetude_formation`
  ADD CONSTRAINT `FK_niveauEtudeFormation` FOREIGN KEY (`idNiveauEtude`) REFERENCES `niveauetude` (`idNiveauEtude`),
  ADD CONSTRAINT `FK_niveauEtudeFormation1` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `FK_Generalisation_7` FOREIGN KEY (`idOpportunite`) REFERENCES `opportunite` (`idOpportunite`),
  ADD CONSTRAINT `FK_entrepriseOffre` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`),
  ADD CONSTRAINT `FK_niveauEtudeOfrre` FOREIGN KEY (`idNiveauEtude`) REFERENCES `niveauetude` (`idNiveauEtude`),
  ADD CONSTRAINT `FK_offreTypeContrat` FOREIGN KEY (`idTypeContrat`) REFERENCES `typecontrat` (`idTypeContrat`),
  ADD CONSTRAINT `FK_professionOfrre` FOREIGN KEY (`idProfession`) REFERENCES `profession` (`idProfession`),
  ADD CONSTRAINT `FK_villeOffre` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`);

--
-- Contraintes pour la table `opportunite_etudiant`
--
ALTER TABLE `opportunite_etudiant`
  ADD CONSTRAINT `FK_opportuniteEtudiant` FOREIGN KEY (`idOpportunite`) REFERENCES `opportunite` (`idOpportunite`),
  ADD CONSTRAINT `FK_opportuniteEtudiant1` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`idEtudiant`);

--
-- Contraintes pour la table `profil_cv`
--
ALTER TABLE `profil_cv`
  ADD CONSTRAINT `FK_profilCV` FOREIGN KEY (`idProfil`) REFERENCES `profil` (`idProfil`),
  ADD CONSTRAINT `FK_profilCV1` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`);

--
-- Contraintes pour la table `secteur_entreprise`
--
ALTER TABLE `secteur_entreprise`
  ADD CONSTRAINT `FK_secteurEntreprise` FOREIGN KEY (`idSecteur`) REFERENCES `secteur` (`idSecteur`),
  ADD CONSTRAINT `FK_secteurEntreprise1` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`);

--
-- Contraintes pour la table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `FK_pointFocalSection` FOREIGN KEY (`idPointFocal`) REFERENCES `pointfocal` (`idPointFocal`),
  ADD CONSTRAINT `FK_sectionUfr` FOREIGN KEY (`idUfr`) REFERENCES `ufr` (`idUfr`);

--
-- Contraintes pour la table `seminaire`
--
ALTER TABLE `seminaire`
  ADD CONSTRAINT `FK_Generalisation_10` FOREIGN KEY (`idOpportunite`) REFERENCES `activite` (`idOpportunite`);

--
-- Contraintes pour la table `tag_article`
--
ALTER TABLE `tag_article`
  ADD CONSTRAINT `FK_tagArticle` FOREIGN KEY (`idTag`) REFERENCES `tag` (`idTag`),
  ADD CONSTRAINT `FK_tagArticle1` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`);

--
-- Contraintes pour la table `thematique_activite`
--
ALTER TABLE `thematique_activite`
  ADD CONSTRAINT `FK_thematiqueActivite` FOREIGN KEY (`idThematique`) REFERENCES `thematique` (`idThematique`),
  ADD CONSTRAINT `FK_thematiqueActivite1` FOREIGN KEY (`idOpportunite`) REFERENCES `opportunite` (`idOpportunite`);

--
-- Contraintes pour la table `utilisateur_ressource`
--
ALTER TABLE `utilisateur_ressource`
  ADD CONSTRAINT `FK_utilisateur_ressource` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `FK_utilisateur_ressource1` FOREIGN KEY (`idRessource`) REFERENCES `ressource` (`idRessource`);

--
-- Contraintes pour la table `utilisateur_role`
--
ALTER TABLE `utilisateur_role`
  ADD CONSTRAINT `FK_utilisateurRole` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `FK_utilisateurRole1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `FK_villePays` FOREIGN KEY (`idPays`) REFERENCES `pays` (`idPays`);

--
-- Contraintes pour la table `visite`
--
ALTER TABLE `visite`
  ADD CONSTRAINT `FK_Visite_Activite` FOREIGN KEY (`idOpportunite`) REFERENCES `activite` (`idOpportunite`),
  ADD CONSTRAINT `FK_visiteEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`);
COMMIT;

---------------------------------
---- Dernieres modifications ----
---------------------------------
ALTER TABLE 'etudiant'
  ADD COLUMN 'idUtilisateur' int(11),
  ADD CONSTRAINT 'FK_utilisateur_etudiant' FOREIGN KEY ('idUtilisateur') REFERENCES 'utilisateur' ('idUtilisateur');

ALTER TABLE 'formation'
  DROP CONSTRAINT 'FK_etablisementFormation',
  CHANGE 'idEtablissement' 'idEtablissement' varchar(250);

DROP TABLE competence_formation;
DROP TABLE competence_experience;

CREATE TABLE `competence_cv` (
  `idCompetence` int(11) NOT NULL,
  `idCV` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `competence_cv`
--
ALTER TABLE `competence_cv`
  ADD CONSTRAINT `FK_competencecv` FOREIGN KEY (`idCompetence`) REFERENCES `competence` (`idCompetence`),
  ADD CONSTRAINT `FK_competencecv1` FOREIGN KEY (`idCV`) REFERENCES `cv` (`idCV`);

--
-- Index pour la table `competence_cv`
--
ALTER TABLE `competence_cv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idCompetence` (`idCompetence`,`idCV`),
  ADD KEY `idCompetence_2` (`idCompetence`,`idCV`),
  ADD KEY `FK_competenceCV1` (`idCV`);

--
-- AUTO_INCREMENT pour la table `competence_cv`
--
ALTER TABLE `competence_cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

---
--- Niveau d'un user pour une langue
---
alter table 'langue_cv' add column 'niveau' varchar(250);

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


---------------------------------
----- Fin des modifications -----
---------------------------------

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

--Création VUE vw_offre_avec_critere
--
-------------
CREATE VIEW vw_offre_avec_critere AS 
select `o`.`idOpportunite` AS `idOpportunite`,`o`.`idEntreprise` AS `idEntreprise`,`o`.`idTypeContrat` AS `idTypeContrat`,`o`.`idNiveauEtude` AS `idNiveauEtude`,`o`.`idVille` AS `idVille`,`o`.`idProfession` AS `idProfession`,`o`.`idProfil` AS `idProfil`,`o`.`mission` AS `mission`,`o`.`prerequis` AS `prerequis`,`o`.`details` AS `details`,`o`.`dateCloture` AS `dateCloture`,`op`.`intitule` AS `title`,`op`.`datePublication` AS `datePublication`,`op`.`statut` AS `statut`,`e`.`nomEntreprise` AS `nomEntreprise`,`e`.`adresse` AS `adresse`,`e`.`logo` AS `logo`,`tc`.`intitule` AS `contractType`,`v`.`nom` AS `nom`,`niv`.`intitule` AS `studyLevel`,`p`.`intitule` AS `profil` 
from ((((((`pocdb`.`opportunite` `op` join `pocdb`.`offre` `o`) join `pocdb`.`profil` `p`) join `pocdb`.`ville` `v`) join `pocdb`.`typecontrat` `tc`) join `pocdb`.`entreprise` `e`) join `pocdb`.`niveauetude` `niv`) where ((`o`.`idOpportunite` = `op`.`idOpportunite`) and (`o`.`idEntreprise` = `e`.`idEntreprise`) and (`o`.`idTypeContrat` = `tc`.`idTypeContrat`) and (`o`.`idVille` = `v`.`idVille`) and (`o`.`idNiveauEtude` = `niv`.`idNiveauEtude`) and (`o`.`idProfil` = `p`.`idProfil`));
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
