-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 27 jan. 2024 à 15:24
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
  `name_Categorie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_Categorie`, `name_Categorie`, `date`) VALUES
(25, 'programming', '2024-01-14 06:34:05'),
(42, 'GraphicDesign', '2024-01-14 06:31:37'),
(54, 'siences', '2024-01-14 06:38:51'),
(73, 'Fitness', '2024-01-14 06:50:56'),
(75, 'music', '2024-01-14 06:32:51'),
(89, 'travel', '2024-01-14 06:47:58'),
(95, 'food', '2024-01-14 07:49:31');

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
(7, 'JavaScript'),
(15, 'php'),
(28, 'CSS'),
(30, 'HTML'),
(37, 'Programming'),
(42, 'Tailwind'),
(45, 'CookingTips'),
(47, 'TechNews');

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
(15, 56),
(37, 56),
(37, 58),
(37, 62),
(37, 72),
(45, 55),
(45, 77),
(47, 58),
(47, 59),
(47, 62),
(47, 66),
(47, 67),
(47, 68),
(47, 69),
(47, 77);

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
(14, 'mostapha', 'AZSDF@qdsf.oq', '$2y$10$2ON53NfzSxlvMg4jpFDhXOWAC.dTglSBiMHOBvV6G3EumnqfD..M6', 'auteur'),
(15, 'hash', 'hashpassword@gmail.com', '$2y$10$0noO4nkO1X0DSOAd4a8DH.NYXzc/zjxwutDjL25hoRbRYobgPCO0m', 'auteur'),
(17, 'Sanae', 'sanae@gmail.com', '$2y$10$saZEg8dCIOowATACtOs99ey1.wdbj0u6XoqnWAhbv/lU392B8NuRK', 'auteur'),
(18, 'Douaa', 'test@gmail.com', '$2y$10$MQkNOhworkSJ85.jfLp.TORPBTiCvZnZetzSOPjpQ8GjZB/Kng.cm', 'auteur'),
(19, 'Achraf', 'admin@gmail.com', '$2y$10$.M6VD3DpVUyf0mATXEcvGeJ1Nxz5vVYP9m.G0xZiJ09QsseyWF5r.', 'admin'),
(20, 'Douaa', 'hey@gmail.com', '$2y$10$arcfQzd1fmcgjSSVdYT97.a4IjjLqrp4Ezm4uTX.o5ff.Qc51HCtm', 'auteur'),
(21, 'oumaima', 'oumaima@gmail.com', '$2y$10$IoTv/aj1tegkhvttAWvHQOl8.7N6.NaQM.JVtCU7Ws176se4D95tm', 'auteur'),
(22, 'youssef Hihi', 'youssefhihi@gmail.com', '$2y$10$OOrMFEit7zUvkrjCYuObKuiZn41Cwf3goTK4vspU161/IBK.7UhD.', 'admin'),
(23, 'amina', 'amina@gmail.com', '$2y$10$bBzYtEdtJTS3vzh/OwzWl.35hM2Yl1K/YSyiLfhrl9wZYtZwjjUx6', 'auteur');

-- --------------------------------------------------------

--
-- Structure de la table `wikis`
--

CREATE TABLE `wikis` (
  `idWiki` int NOT NULL,
  `name_Wiki` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contenu` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `id` int DEFAULT NULL,
  `idCategorie` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `wikis`
--

INSERT INTO `wikis` (`idWiki`, `name_Wiki`, `contenu`, `date`, `statut`, `id`, `idCategorie`) VALUES
(55, 'Ma meilleure recette de pancakes, facile et rapide', 'Des pancakes comme aux Etats-Unis, très moelleux avec mon astuce de préparation : on laisse reposer 30 minutes la pâte avant d’y ajouter les blancs d’oeufs montés en neige, résultat garanti !  Vous n’arrêterez plus d’en faire quand vous aurez testé et compris que c’est ultra facile et surtout bon… Brunch, petit-déjeuner ou goûter, tout le monde va les aimer… Utilisez également cette recette pour réaliser des blinis (sans le sucre) ou utilisez cette autre recette de blinis à base de farine de sarrasin. En général, ceux qui aiment les pancakes aiment aussi la recette des gaufres légères , les crêpes moelleuses ou encore les crêpes roulées au chocolat ! Et enfin, testez mes nouvelle recette de pancakes à la patate douce, La recette des pancakes aux poireaux ! ', '2024-01-14 17:41:03', 1, 19, 95),
(56, 'Introduction au langage PHP', 'Le langage PHP a été inventé par Rasmus LERDORF en 1995 pour son usage personnel (mise en ligne de son CV en l\'occurence). Autrefois abbréviation de Personal HomePage devenue aujourd\'hui Hypertext Preprocessor, PHP s\'impose comme un standard dans le monde de la programmation web par ses performances, sa fiabilité, sa souplesse et sa rapidité.', '2024-01-14 17:44:33', 1, 19, 25),
(58, 'Informatique', 'L\'informatique est un domaine d\'activité scientifique, technique, et industriel concernant le traitement automatique de l\'information numérique par l\'exécution de programmes informatiques hébergés par des dispositifs électriques-électroniques : des systèmes embarqués, des ordinateurs, des robots, des automates, etc.\r\n\r\nCes champs d\'application peuvent être séparés en deux branches :\r\n\r\nthéorique : concerne la définition de concepts et modèles ;\r\npratique : s\'intéresse aux techniques concrètes de mise en œuvre.\r\nCertains domaines de l\'informatique peuvent être très abstraits, comme la complexité algorithmique, et d\'autres peuvent être plus proches d\'un public profane. Ainsi, la théorie des langages demeure un domaine davantage accessible aux professionnels formés (description des ordinateurs et méthodes de programmation), tandis que les métiers liés aux interfaces homme-machine (IHM) sont accessibles à un plus large public.', '2024-01-14 19:57:31', 0, 18, 25),
(59, 'Algorithmique', 'L\'algorithmique est l\'étude comparative des différents algorithmes. Tous les algorithmes ne se valent pas : le nombre d\'opérations nécessaires pour arriver à un même résultat diffère d\'un algorithme à l\'autre. Ce nombre d\'opérations, appelé la complexité algorithmique est le sujet de la théorie de la complexité des algorithmes, qui constitue une préoccupation essentielle en algorithmique.\r\n\r\nLa complexité algorithmique sert en particulier à déterminer comment le nombre d\'opérations nécessaires évolue en fonction du nombre d\'éléments à traiter (la taille des données) :\r\n\r\nsoit l\'évolution peut être indépendante de la taille des données, on parle alors de complexité constante ;\r\nsoit le nombre d\'opérations peut augmenter selon un rapport logarithmique, linéaire, polynomial ou exponentiel (dans l\'ordre décroissant d\'efficacité et pour ne citer que les plus répandues) ;\r\nune augmentation exponentielle de la complexité aboutit très rapidement à des durées de calcul déraisonnables pour une utilisation en pratique ;\r\ntandis que pour une complexité polynomiale (ou meilleure), le résultat sera obtenu après une durée de calcul réduite, même avec de grandes quantités de données.', '2024-01-14 19:58:10', 0, 18, 25),
(62, 'Le design graphique ', 'Le design graphique est une discipline qui consiste à utiliser une composition visuelle pour résoudre un problème et exprimer une idée à l’aide de la typographie, des images, des couleurs et des formes. Il n’existe pas qu’une seule façon de faire cela et c’est pourquoi on compte plusieurs types de design, chacun avec ses attributs propres.\r\n\r\nBien qu’ils se recoupent, chacun des types de design graphique fait appel à des compétences et des techniques bien précises. Nombreux sont les graphistes qui se spécialisent dans un seul type de design. D’autres préfèrent développer des compétences dans plusieurs domaines liés les uns aux autres. Mais parce que ce secteur d’activité est en constante évolution, les graphistes doivent être capables de s’adapter et d’apprendre de nouvelles techniques tous les jours, de sorte à changer ou à ajouter des domaines de spécialité à leur offre', '2024-01-15 08:03:12', 0, 17, 42),
(66, 'Python ', 'Python (prononcé /pi.tɔ̃/) est un langage de programmation interprété, multiparadigme et multiplateformes. Il favorise la programmation impérative structurée, fonctionnelle et orientée objet. Il est doté d\'un typage dynamique fort, d\'une gestion automatique de la mémoire par ramasse-miettes et d\'un système de gestion d\'exceptions ; il est ainsi similaire à Perl, Ruby, Scheme, Smalltalk et Tcl.\r\n\r\nLe langage Python est placé sous une licence libre proche de la licence BSD et fonctionne sur la plupart des plateformes informatiques, des smartphones aux ordinateurs centraux, de Windows à Unix avec notamment GNU/Linux en passant par macOS, ou encore Android, iOS, et peut aussi être traduit en Java ou .NET. Il est conçu pour optimiser la productivité des programmeurs en offrant des outils de haut niveau et une syntaxe simple à utiliser.\r\n\r\nIl est également apprécié par certains pédagogues qui y trouvent un langage où la syntaxe, clairement séparée des mécanismes de bas niveau, permet une initiation aisée aux concepts de base de la programmation5. Selon l\'Index TIOBE, notamment en raison de son efficacité pour l\'apprentissage automatique, sa popularité va croissante ; et en 2022 n\'a toujours pas montré de signe de ralentissement', '2024-01-15 17:31:19', 0, 22, 25),
(67, 'Qu\'est-ce que le C++ ?', 'Le C++ est un langage de programmation : il permet d\'écrire des programmes informatiques, pour créer des applications mobiles ou des jeux vidéo, par exemple. C++ est créé à partir du langage C, dont il étend les fonctionnalités : C++ permet notamment de faire de la programmation orientée objet (POO).\r\n\r\nC++ présente deux caractéristiques principales :\r\n\r\nC++ est un langage compilé, par opposition au langage interprété. Le développeur écrit du code source en langage C++, relativement compréhensible par l\'humain ; puis le code source est transformé par un compilateur en un langage compréhensible par la machine qui doit exécuter le programme. C\'est pourquoi le développeur qui programme en C++ utilise un IDE : un outil qui intègre non seulement un éditeur de texte mais aussi un compilateur.\r\nC++ est « multi-paradigmes », c\'est-à-dire que c\'est un langage qui permet de programmer selon différentes approches. C++ permet de faire de la programmation procédurale, de la programmation générique ainsi que de la POO.', '2024-01-15 17:33:15', 1, 22, 25),
(68, 'Technologie', 'La technologie est l\'étude des outils et des techniques. Le terme désigne les observations sur l\'état de l\'art aux diverses périodes historiques, en matière d\'outils et de savoir-faire. Il comprend l\'art, l\'artisanat, les métiers, les sciences appliquées et éventuellement les connaissances.\r\n\r\nPar extension et abusivement, le mot désigne les systèmes ou méthodes d\'organisation qui permettent les diverses technologies, ainsi que tous les domaines d\'étude et les produits qui en résultent.\r\n\r\nSelon Jacques Ellul, « Le mot technologie veut dire discours sur la technique »1.', '2024-01-16 10:29:47', 0, 23, 25),
(69, 'Hiking', 'An early example of an interest in hiking in the United States is Abel Crawford and his son Ethan\'s clearing of a trail to the summit of Mount Washington, New Hampshire in 1819.[34] This 8.5-mile path is the oldest continually used hiking trail in the United States. The influence of British and European Romanticism reached North America through the transcendentalist movement, and both Ralph Waldo Emerson (1803–82) and Henry David Thoreau (1817-62) were important influences on the outdoors movement in North America. Thoreau\'s writing on nature and on walking include the posthumously published \"Walking\" (1862)\".[35] His earlier essay \"A Walk to Wachusett\" (1842) describes a four-day walking tour Thoreau took with a companion from Concord, Massachusetts to the summit of Mount Wachusett, Princeton, Massachusetts and back. Established in 1876, the Appalachian Mountain Club has the distinction of being the oldest hiking club in America. It was founded to protect the trails and mountains in the northeastern United States. Prior to its founding, four other hiking clubs had already been established in America. This included the very short-lived (first) Rocky Mountain Club in 1875, the White Mountain Club of Portland in 1873, the Alpine Club of Williamstown in 1863, and the Exploring Circle, which was established by four men from Lynn, Massachusetts in 1850. Although not a hiking club in the same sense as the clubs that would emerge later, the National Park Service recognizes the Exploring Circle as being \"the first hiking club in New England.\"[36] All four of these clubs would disband within a few years of their founding.[20]', '2024-01-16 10:32:39', 0, 23, 89),
(72, 'C', 'C est un langage de programmation impératif, généraliste et de bas niveau. Inventé au début des années 1970 pour réécrire Unix, C est devenu un des langages les plus utilisés, encore de nos jours. De nombreux langages plus modernes comme C++, C#, Java et PHP ou JavaScript ont repris une syntaxe similaire au C et reprennent en partie sa logique. C offre au développeur une marge de contrôle importante sur la machine (notamment sur la gestion de la mémoire) et est de ce fait utilisé pour réaliser les « fondations » (compilateurs, interpréteurs…) de ces langages plus modernes.\r\n\r\nHistoire[modifier | modifier le code]\r\n\r\nKen Thompson (à gauche) et Dennis Ritchie (à droite).\r\nLe langage C a été inventé au cours de l\'année 1972 dans les Laboratoires Bell. Il était développé en même temps qu\'Unix par Dennis Ritchie et Ken Thompson. Kenneth Thompson avait développé le prédécesseur direct de C, le langage B, qui est lui-même largement inspiré de BCPL. Dennis Ritchie a fait évoluer le langage B dans une nouvelle version suffisamment différente, en ajoutant notamment les types, pour qu\'elle soit appelée C1.', '2024-01-16 14:16:31', 1, 18, 25),
(77, 'Japon', 'Le Japon (en japonais : 日本, Nihon, /ɲihoꜜɴ/ Écouter ou Nippon, /ɲippoꜜɴ/ Écouter) est un pays insulaire de l\'Asie de l\'Est, situé entre l\'océan Pacifique et la mer du Japon, à l\'est de la Chine, de la Corée du Sud, de la Corée du Nord et de la Russie, et au nord de Taïwan.\r\n\r\nÉtymologiquement, les kanjis (caractères chinois) qui composent le nom du Japon signifient « pays (国, kuni) d\'origine (本, hon) du Soleil (日, ni) » ; c\'est ainsi que le Japon est désigné comme le « pays du soleil levant ».\r\n\r\nLe Japon forme, depuis 1945, un archipel dont le nombre d\'îles varie, suivant les estimations, de 6 852 à 14 125 îles (de plus de 100 m2), dont les quatre plus grandes sont Hokkaidō, Honshū, Shikoku et Kyūshū, représentant à elles seules 95 % de la superficie terrestre du pays. L\'archipel s\'étend sur plus de trois mille kilomètres. La plupart des îles sont montagneuses, parfois volcaniques. Ainsi, le plus haut sommet du Japon, le mont Fuji (3 776 m), est un volcan dont la dernière éruption a eu lieu en 1707.\r\n\r\nLe Japon est le onzième pays le plus peuplé du monde, avec un peu moins de 125 millions d\'habitants pour 377 975 km2 (330 hab./km2), dont l\'essentiel est concentré sur les étroites plaines littorales du sud de Honshū et du nord de Shikoku et Kyūshū, formant un ensemble pratiquement urbanisé en continu appelé « Mégalopole japonaise » ou « Taiheiyō Belt » (太平洋ベルト, Taiheiyō beruto?, littéralement « ceinture Pacifique »). Le Grand Tokyo, qui comprend la capitale Tokyo et plusieurs préfectures environnantes, est la plus grande région métropolitaine du monde, avec plus de 35 millions d\'habitants. La ville a été première place financière mondiale en 1990.', '2024-01-16 14:25:45', 0, 18, 89);

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
  MODIFY `id_Categorie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `idTag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `wikis`
--
ALTER TABLE `wikis`
  MODIFY `idWiki` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tags_wikis`
--
ALTER TABLE `tags_wikis`
  ADD CONSTRAINT `tags_wikis_ibfk_1` FOREIGN KEY (`idWiki`) REFERENCES `wikis` (`idWiki`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tags_wikis_ibfk_2` FOREIGN KEY (`idTag`) REFERENCES `tags` (`idTag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wikis`
--
ALTER TABLE `wikis`
  ADD CONSTRAINT `wikis_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wikis_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`id_Categorie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
