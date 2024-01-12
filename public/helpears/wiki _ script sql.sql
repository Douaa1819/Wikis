-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 12 jan. 2024 à 14:18
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wiki`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_Categorie` int NOT NULL,
  `name_Categorie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_Categorie`, `name_Categorie`) VALUES
(2, 'games'),
(16, 'test'),
(25, 'development'),
(35, 'les fruits'),
(42, 'world'),
(43, 'ecoles'),
(54, 'sience');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `idTag` int NOT NULL,
  `nameTag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`idTag`, `nameTag`) VALUES
(2, 'social'),
(7, 'youcode'),
(15, 'php'),
(17, 'HTML'),
(18, 'CSS');

-- --------------------------------------------------------

--
-- Structure de la table `tags_wikis`
--

CREATE TABLE `tags_wikis` (
  `idTag` int NOT NULL,
  `idWiki` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tags_wikis`
--

INSERT INTO `tags_wikis` (`idTag`, `idWiki`) VALUES
(2, 10),
(2, 12),
(7, 1),
(7, 11),
(7, 13),
(15, 4),
(15, 11);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Douaa', 'douaa@gmail.com', 'douaa@gmail.com', 'auteur'),
(2, 'admin', 'admin@gmail.com', 'douaa123', 'admin'),
(7, 'youcode', 'safi@gmail.com', '12345678', 'auteur'),
(12, 'youssef', 'youssef@gmail.com', '12345678', 'auteur'),
(13, 'youcode', 'yocode@gmail.com', '12345678', 'auteur'),
(14, 'mostapha', 'AZSDF@qdsf.oq', '$2y$10$2ON53NfzSxlvMg4jpFDhXOWAC.dTglSBiMHOBvV6G3EumnqfD..M6', 'auteur'),
(15, 'hash', 'hashpassword@gmail.com', '$2y$10$0noO4nkO1X0DSOAd4a8DH.NYXzc/zjxwutDjL25hoRbRYobgPCO0m', 'auteur'),
(17, 'Sanae', 'sanae@gmail.com', '$2y$10$saZEg8dCIOowATACtOs99ey1.wdbj0u6XoqnWAhbv/lU392B8NuRK', 'auteur');

-- --------------------------------------------------------

--
-- Structure de la table `wikis`
--

CREATE TABLE `wikis` (
  `idWiki` int NOT NULL,
  `name_Wiki` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contenu` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `id` int DEFAULT NULL,
  `idCategorie` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `wikis`
--

INSERT INTO `wikis` (`idWiki`, `name_Wiki`, `contenu`, `date`, `statut`, `id`, `idCategorie`) VALUES
(1, 'Informatique', 'L\'informatique est un domaine d\'activité scientifique, technique, et industriel concernant le traitement automatique de l\'information numérique par l\'exécution de programmes informatiques hébergés par des dispositifs électriques-électroniques : des systèmes embarqués, des ordinateurs, des robots, des automates, etc.\n\nCes champs d\'application peuvent être séparés en deux branches :\n\n\n', '2024-01-10 20:16:43', 0, 1, 25),
(2, 'jeux', 'Le jeu est une activité, humaine ou animale, pratiquée pour se divertir1.\n\nPropre aux mammifères, cette activité d\'ordre psychique ou bien physique crée une dépense d\'énergie décorrélée des intérêts essentiels immédiats autres que le plaisir. De ce fait, Johan Huizinga remarque que de très nombreuses activités humaines peuvent s\'assimiler à des jeux. Mais la définition du jeu reste difficile à circonscrire, ce qui présente un intérêt pour la philosophie.\n\nIl est plus facile de répertorier les jeux. Ceux-ci se caractérisent généralement par un nom et des règles qu\'on peut classer par types.', '2024-01-10 20:18:30', 0, 13, 2),
(3, 'TEST', 'Le jeu est une activité, humaine ou animale, pratiquée pour se divertir1.\r\n', '2024-01-11 12:14:08', 1, 7, 16),
(4, 'Soleil', 'Le Soleil est l’étoile du Système solaire. Dans la classification astronomique, c’est une étoile de type naine jaune d\'une masse d\'environ 1,989 1 × 1030 kg, composée d’hydrogène (74 % de la masse ou 92 % du volume) et d’hélium (25 % de la masse ou 8 % du volume). Le Soleil fait partie de la galaxie appelée la Voie lactée et se situe à environ 8 kpc (∼26 100 al) du centre galactique, dans le bras d\'Orion. Le Soleil orbite autour du centre galactique en une année galactique de 225 à 250 millions d\'années. Autour de lui gravitent la Terre (à la vitesse de 30 km/s), sept autres planètes, au moins cinq planètes naines, de très nombreux astéroïdes et comètes et une bande de poussière. Le Soleil représente à lui seul environ 99,854 % de la masse du système planétaire ainsi constitué, Jupiter représentant plus des deux tiers du reste.', '2024-01-11 22:03:29', 1, 1, 35),
(6, 'python', 'Python (prononcé /pi.tɔ̃/) est un langage de programmation interprété, multiparadigme et multiplateformes. Il favorise la programmation impérative structurée, fonctionnelle et orientée objet. Il est doté d\'un typage dynamique fort, d\'une gestion automatique de la mémoire par ramasse-miettes et d\'un système de gestion d\'exceptions ; il est ainsi similaire à Perl, Ruby, Scheme, Smalltalk et Tcl.', '2024-01-11 22:52:18', 0, 13, 42),
(8, '', '', NULL, NULL, NULL, NULL),
(9, NULL, NULL, '2024-01-12 13:57:59', NULL, NULL, NULL),
(10, 'mostapah', 'hello world', '2024-01-12 14:03:35', NULL, NULL, 16),
(11, 'hey', 'doouaa', '2024-01-12 14:06:32', 0, NULL, 25),
(12, 'hello world', 'hey', '2024-01-12 14:07:35', 0, NULL, 25),
(13, 'mostafa', 'heeeeeeeeeeeeeeey', '2024-01-12 14:08:48', 1, 13, 35);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_Categorie`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`idTag`);

--
-- Index pour la table `tags_wikis`
--
ALTER TABLE `tags_wikis`
  ADD PRIMARY KEY (`idWiki`,`idTag`),
  ADD KEY `idTag` (`idTag`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wikis`
--
ALTER TABLE `wikis`
  ADD PRIMARY KEY (`idWiki`),
  ADD KEY `idUser` (`id`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_Categorie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `idTag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `wikis`
--
ALTER TABLE `wikis`
  MODIFY `idWiki` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tags_wikis`
--
ALTER TABLE `tags_wikis`
  ADD CONSTRAINT `tags_wikis_ibfk_1` FOREIGN KEY (`idWiki`) REFERENCES `wikis` (`idWiki`),
  ADD CONSTRAINT `tags_wikis_ibfk_2` FOREIGN KEY (`idTag`) REFERENCES `tags` (`idTag`);

--
-- Contraintes pour la table `wikis`
--
ALTER TABLE `wikis`
  ADD CONSTRAINT `wikis_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `wikis_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`id_Categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
