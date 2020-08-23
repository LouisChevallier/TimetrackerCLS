-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 23 août 2020 à 14:58
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
(1, 'L\'Elite', 'La crème de la crème des développeurs'),
(3, 'eeee', 'eeeee'),
(4, 'les carottes sont cuites', 'carottes'),
(5, 'bru', 'bru');

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
(5, 3, 4),
(6, 4, 3),
(7, 4, 5),
(10, 5, 1),
(11, 4, 4),
(12, 1, 1);

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
(1, 'CLS Options Site web', 'Premier site web de l\'entreprise CLS Option Corp réalisé par L\'Elite', '2020-08-22', 'In progress', 2),
(2, 'Blog pour iamchloe', 'Blog travel/influencer pour le compte de @iamchloe sur instagram', '2020-08-20', 'In progress', 1);

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
(1, 1, 1),
(2, 1, 2),
(4, 5, 1),
(5, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `textTask` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `statutTask` varchar(255) DEFAULT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `title`, `textTask`, `date`, `statutTask`, `id_project`) VALUES
(1, 'fsdf', 'dfdf', '2020-08-22', 'takable', 1),
(2, 'ttttt', 'tttttt', '2020-08-22', 'takable', 1);

-- --------------------------------------------------------

--
-- Structure de la table `task_timerecorded`
--

CREATE TABLE `task_timerecorded` (
  `id` int(11) NOT NULL,
  `startTime` time NOT NULL,
  `stopTime` time DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `id_task` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `task_timerecorded`
--

INSERT INTO `task_timerecorded` (`id`, `startTime`, `stopTime`, `id_users`, `id_task`) VALUES
(4, '00:17:15', '00:37:21', 2, 1),
(5, '00:39:30', '01:37:34', 2, 1),
(9, '00:45:12', '00:55:00', 2, 2),
(11, '00:47:33', '00:47:48', 2, 1),
(13, '01:09:20', '01:10:27', 2, 1),
(16, '01:12:35', '01:12:49', 2, 2),
(17, '01:14:10', NULL, 2, 2),
(18, '01:14:10', '01:15:24', 2, 2),
(19, '01:15:31', NULL, 2, 1),
(20, '01:15:31', '01:18:31', 2, 1);

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
(1, 'max', 'Maxime', 'Julius', '$2y$10$PsjdR3cKPLNplD0TFTuZIOlzlSUvEeAAduBwM/gTvEfbJ1ICf07lu', 'membre', 'offline'),
(2, 'lou', 'Louis', 'Dos Santos', '$2y$10$h4MkHtWgR0qdab0pmNQsa.YvpaNoUTfcQaj1hmQBlk.DTExG/R./m', 'membre', 'offline'),
(3, 'delphi', 'Delphine', 'Lepront', '$2y$10$JBoQbdVJ6FHTGJcvorpbeOZJhuypR8shuXWi368XMpcmt4/wBxnNq', 'membre', 'offline'),
(4, 'bast', 'Bastien', 'Cordier', '$2y$10$MsTkqecvnzXBJ62x3Lu/i.NzF8upKsyCX/h/mPw0jAfxuc7.JoVfe', 'membre', 'offline'),
(5, 'jack', 'Jacky', 'Chan', '$2y$10$ORK749xPrNTt0dSEl2k0qOlLfBd8DBfKZhHKlQKlXLt3MeBQusb6q', 'membre', 'online');

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
  ADD KEY `task_project_FK` (`id_project`);

--
-- Index pour la table `task_timerecorded`
--
ALTER TABLE `task_timerecorded`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_timerecorded_users_FK` (`id_users`),
  ADD KEY `task_timerecorded_task0_FK` (`id_task`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `groups_member`
--
ALTER TABLE `groups_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `project_groupmember`
--
ALTER TABLE `project_groupmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `task_timerecorded`
--
ALTER TABLE `task_timerecorded`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `task_project_FK` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `task_timerecorded`
--
ALTER TABLE `task_timerecorded`
  ADD CONSTRAINT `task_timerecorded_task0_FK` FOREIGN KEY (`id_task`) REFERENCES `task` (`id`),
  ADD CONSTRAINT `task_timerecorded_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
