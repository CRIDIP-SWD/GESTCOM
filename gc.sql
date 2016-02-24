-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 25 Février 2016 à 00:40
-- Version du serveur :  5.5.46-0+deb7u1
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gc`
--

-- --------------------------------------------------------

--
-- Structure de la table `collab_inbox`
--

CREATE TABLE `collab_inbox` (
  `idinbox` int(13) NOT NULL,
  `destinataire` int(13) NOT NULL,
  `expediteur` int(13) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `date_message` varchar(255) NOT NULL,
  `importance` int(1) NOT NULL,
  `lu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `collab_inbox`
--

INSERT INTO `collab_inbox` (`idinbox`, `destinataire`, `expediteur`, `sujet`, `message`, `date_message`, `importance`, `lu`) VALUES
(1, 1, 3, 'Test', 'Test', '', 0, 0),
(2, 1, 3, 'jhdqsjkh', 'dqsdqsdqsd', '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `collab_pj`
--

CREATE TABLE `collab_pj` (
  `idpj` int(13) NOT NULL,
  `idinbox` int(13) NOT NULL,
  `nom_pj` varchar(255) NOT NULL,
  `type_pj` varchar(255) NOT NULL,
  `taille_pj` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `collab_sentbox`
--

CREATE TABLE `collab_sentbox` (
  `idsentbox` int(13) NOT NULL,
  `destinataire` int(13) NOT NULL,
  `expediteur` int(13) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `date_message` varchar(255) NOT NULL,
  `importance` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `conf_annuaire_cat_client`
--

CREATE TABLE `conf_annuaire_cat_client` (
  `idcatclient` int(13) NOT NULL,
  `libelle_cat_client` varchar(255) NOT NULL,
  `encours` varchar(255) NOT NULL,
  `delai_rglt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `conf_annuaire_cat_client`
--

INSERT INTO `conf_annuaire_cat_client` (`idcatclient`, `libelle_cat_client`, `encours`, `delai_rglt`) VALUES
(1, 'Client R&eacute;gulier', '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `conf_annuaire_groupe`
--

CREATE TABLE `conf_annuaire_groupe` (
  `idgroupe` int(13) NOT NULL,
  `nom_groupe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `conf_annuaire_groupe`
--

INSERT INTO `conf_annuaire_groupe` (`idgroupe`, `nom_groupe`) VALUES
(1, 'Administrateur'),
(2, 'Collaborateur'),
(3, 'Comptable'),
(4, 'Client');

-- --------------------------------------------------------

--
-- Structure de la table `conf_catalogue`
--

CREATE TABLE `conf_catalogue` (
  `idconf` int(13) NOT NULL,
  `gestion_stock` int(1) NOT NULL,
  `gestion_trackeur` int(1) NOT NULL,
  `gestion_construct` int(1) NOT NULL,
  `duree_garantie` varchar(255) NOT NULL COMMENT 'En mois'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `conf_catalogue`
--

INSERT INTO `conf_catalogue` (`idconf`, `gestion_stock`, `gestion_trackeur`, `gestion_construct`, `duree_garantie`) VALUES
(1, 0, 0, 0, '12');

-- --------------------------------------------------------

--
-- Structure de la table `conf_entreprise_activite`
--

CREATE TABLE `conf_entreprise_activite` (
  `idconf` int(13) NOT NULL,
  `debut_activite` varchar(255) NOT NULL COMMENT 'strtotime',
  `pays` varchar(255) NOT NULL DEFAULT 'France'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `conf_entreprise_activite`
--

INSERT INTO `conf_entreprise_activite` (`idconf`, `debut_activite`, `pays`) VALUES
(1, '1451606400', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `conf_entreprise_doc_general`
--

CREATE TABLE `conf_entreprise_doc_general` (
  `idconf` int(13) NOT NULL,
  `delai_devis_client_recent` varchar(255) NOT NULL,
  `delai_devis_client_perime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `conf_entreprise_doc_general`
--

INSERT INTO `conf_entreprise_doc_general` (`idconf`, `delai_devis_client_recent`, `delai_devis_client_perime`) VALUES
(1, '604800', '1296000');

-- --------------------------------------------------------

--
-- Structure de la table `conf_entreprise_general`
--

CREATE TABLE `conf_entreprise_general` (
  `idconf` int(13) NOT NULL,
  `societe` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `siret` varchar(255) NOT NULL,
  `num_tva` varchar(255) NOT NULL,
  `capital` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `conf_entreprise_general`
--

INSERT INTO `conf_entreprise_general` (`idconf`, `societe`, `adresse`, `code_postal`, `ville`, `telephone`, `fax`, `email`, `siret`, `num_tva`, `capital`) VALUES
(1, 'SAS CRIDIP', '8 Rue Octave Voyer', '85100', 'Les Sables d''Olonne', '', '', 'contact@cridip.com', '', '', '100');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `iduser` int(13) NOT NULL,
  `groupe` int(13) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `connect` int(1) NOT NULL COMMENT '0: offline | 1: away | 2: online',
  `last_connect` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`iduser`, `groupe`, `username`, `password`, `nom_user`, `prenom_user`, `connect`, `last_connect`) VALUES
(1, 1, 'mmockelyn', 'd89f452fab72151dffe279e499ddf2c6e3f91ba8', 'MOCKELYN', 'Maxime', 2, '1456354800'),
(3, 4, 'client', '5454fb054cd9e872725b14a4c1a47edb3fb90511', 'Doe', 'John', 0, '1456182000');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `collab_inbox`
--
ALTER TABLE `collab_inbox`
  ADD PRIMARY KEY (`idinbox`);

--
-- Index pour la table `collab_pj`
--
ALTER TABLE `collab_pj`
  ADD PRIMARY KEY (`idpj`);

--
-- Index pour la table `collab_sentbox`
--
ALTER TABLE `collab_sentbox`
  ADD PRIMARY KEY (`idsentbox`);

--
-- Index pour la table `conf_annuaire_cat_client`
--
ALTER TABLE `conf_annuaire_cat_client`
  ADD PRIMARY KEY (`idcatclient`);

--
-- Index pour la table `conf_annuaire_groupe`
--
ALTER TABLE `conf_annuaire_groupe`
  ADD PRIMARY KEY (`idgroupe`);

--
-- Index pour la table `conf_catalogue`
--
ALTER TABLE `conf_catalogue`
  ADD PRIMARY KEY (`idconf`);

--
-- Index pour la table `conf_entreprise_activite`
--
ALTER TABLE `conf_entreprise_activite`
  ADD PRIMARY KEY (`idconf`);

--
-- Index pour la table `conf_entreprise_doc_general`
--
ALTER TABLE `conf_entreprise_doc_general`
  ADD PRIMARY KEY (`idconf`);

--
-- Index pour la table `conf_entreprise_general`
--
ALTER TABLE `conf_entreprise_general`
  ADD PRIMARY KEY (`idconf`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `collab_inbox`
--
ALTER TABLE `collab_inbox`
  MODIFY `idinbox` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `collab_pj`
--
ALTER TABLE `collab_pj`
  MODIFY `idpj` int(13) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `collab_sentbox`
--
ALTER TABLE `collab_sentbox`
  MODIFY `idsentbox` int(13) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `conf_annuaire_cat_client`
--
ALTER TABLE `conf_annuaire_cat_client`
  MODIFY `idcatclient` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `conf_annuaire_groupe`
--
ALTER TABLE `conf_annuaire_groupe`
  MODIFY `idgroupe` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `conf_catalogue`
--
ALTER TABLE `conf_catalogue`
  MODIFY `idconf` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `conf_entreprise_activite`
--
ALTER TABLE `conf_entreprise_activite`
  MODIFY `idconf` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `conf_entreprise_doc_general`
--
ALTER TABLE `conf_entreprise_doc_general`
  MODIFY `idconf` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `conf_entreprise_general`
--
ALTER TABLE `conf_entreprise_general`
  MODIFY `idconf` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
