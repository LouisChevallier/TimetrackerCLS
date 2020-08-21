-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 21 août 2020 à 16:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `timetracker`
--

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `nameGroup` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groups`
--

INSERT INTO `groups` (`id`, `nameGroup`, `description`) VALUES
(1, 'L\'Elite', 'Groupe L\'Elite composé de deux développeur du tonnerre !');

-- --------------------------------------------------------

--
-- Structure de la table `groups_member`
--

CREATE TABLE `groups_member` (
  `id` int(11) NOT NULL,
  `id_groups` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groups_member`
--

INSERT INTO `groups_member` (`id`, `id_groups`, `id_users`) VALUES
(1, 1, 2),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `dateCreation` date NOT NULL,
  `statutProject` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `dateCreation`, `statutProject`, `id_users`) VALUES
(1, 'Blog Voyage', 'Le blog voyage de @iamcloetravel', '2020-08-21', 'En cours', 2);

-- --------------------------------------------------------

--
-- Structure de la table `project_groupmember`
--

CREATE TABLE `project_groupmember` (
  `id` int(11) NOT NULL,
  `id_groups` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `project_groupmember`
--

INSERT INTO `project_groupmember` (`id`, `id_groups`, `id_project`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `textTask` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `stopTime` time NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `prenom`, `nom`, `password`, `role`, `statut`) VALUES
(1, 'max', 'Maxou', 'Lecroquant', '$2y$10$pV09uKARu6cNckMOUUgAS.eAZSOXCvxGXdbFsHMl9lMzTkkmrZekK', 'membre', 'offline'),
(2, 'lou', 'Louis', 'Labroc', '$2y$10$cr6z1sho1RZaUZbJxpKaZ.kU4H/EQN3LORWdqblyBSTErj7WkDOoC', 'membre', 'offline');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groups_member`
--
ALTER TABLE `groups_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_member_groups_FK` (`id_groups`),
  ADD KEY `groups_member_users0_FK` (`id_users`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_users_FK` (`id_users`);

--
-- Index pour la table `project_groupmember`
--
ALTER TABLE `project_groupmember`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_groupmember_groups_FK` (`id_groups`),
  ADD KEY `project_groupmember_project0_FK` (`id_project`);

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_users_FK` (`id_users`),
  ADD KEY `task_project0_FK` (`id_project`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `groups_member`
--
ALTER TABLE `groups_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `project_groupmember`
--
ALTER TABLE `project_groupmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `groups_member`
--
ALTER TABLE `groups_member`
  ADD CONSTRAINT `groups_member_groups_FK` FOREIGN KEY (`id_groups`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `groups_member_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `project_groupmember`
--
ALTER TABLE `project_groupmember`
  ADD CONSTRAINT `project_groupmember_groups_FK` FOREIGN KEY (`id_groups`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `project_groupmember_project0_FK` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_project0_FK` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `task_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
