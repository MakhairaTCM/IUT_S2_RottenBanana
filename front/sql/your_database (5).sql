-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 juin 2024 à 15:51
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `your_database`
--
CREATE DATABASE IF NOT EXISTS `your_database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `your_database`;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `url_poster` varchar(255) DEFAULT NULL,
  `resumer` text DEFAULT NULL,
  `valide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `genre`, `url_poster`, `resumer`, `valide`) VALUES
(10138, 'Iron Man 2', 'Action', 'https://image.tmdb.org/t/p/w500/6WBeq4fCfn7AN0o21W9qNcRF2l9.jpg', 'With the world now aware of his dual life as the armored superhero Iron Man, billionaire inventor Tony Stark faces pressure from the government, the press and the public to share his technology with the military. Unwilling to let go of his invention, Stark, with Pepper Potts and James \'Rhodey\' Rhodes at his side, must forge new alliances – and confront powerful furries.', 1),
(38700, 'Bad Boys for Life', 'Thriller', 'https://image.tmdb.org/t/p/w500/y95lQLnuNKdPAzw9F9Ab8kJ80c3.jpg', NULL, 1),
(51191, 'Guardian Angels', 'Comedy', 'https://image.tmdb.org/t/p/w500/rrOC47OcekS7yJeunU308iY0tdH.jpg', NULL, 1),
(68721, 'Iron Man 3', 'Action', 'https://image.tmdb.org/t/p/w500/qhPtAc1TKbMPqNvcdXSOn9Bn7hZ.jpg', 'When Tony Stark\'s world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.', 1),
(299537, 'Captain Marvel', 'Action', 'https://image.tmdb.org/t/p/w500/AtsgWhDnHTq68L0lLsUrCnM7TjG.jpg', NULL, 1),
(315635, 'Spider-Man: Homecoming', 'Action', 'https://image.tmdb.org/t/p/w500/c24sv2weTHPsmDa7jEMN0m2P3RT.jpg', NULL, 0),
(447365, 'Guardians of the Galaxy Vol. 3', 'Science Fiction', 'https://image.tmdb.org/t/p/w500/r2J02Z2OpNTctfOSN1Ydgii51I3.jpg', NULL, 1),
(573435, 'Bad Boys: Ride or Die', 'Action', 'https://image.tmdb.org/t/p/w500/nP6RliHjxsz4irTKsxe8FRhKZYl.jpg', NULL, 1),
(576743, 'Marvel Rising: Chasing Ghosts', 'Family', 'https://image.tmdb.org/t/p/w500/pufQvXrrxng95dT4kYlQtXn98kK.jpg', NULL, 1),
(614933, 'Atlas', 'Science Fiction', 'https://image.tmdb.org/t/p/w500/bcM2Tl5HlsvPBnL8DKP9Ie6vU4r.jpg', NULL, 1),
(634649, 'Spider-Man: No Way Home', 'Action', 'https://image.tmdb.org/t/p/w500/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg', NULL, 1),
(639720, 'IFff', 'Comedy', 'https://image.tmdb.org/t/p/w500/xbKFv4KF3sVYuWKllLlwWDmuZP7.jpg', NULL, 1),
(653346, 'Kingdom of the Planet of the Apes', 'Science Fiction', 'https://image.tmdb.org/t/p/w500/gKkl37BQuKTanygYQG1pyYgLVgf.jpg', NULL, 1),
(693134, 'Dune: Part Two', 'Science Fiction', 'https://image.tmdb.org/t/p/w500/1pdfLvkbY9ohJlCjQH2CZjjYVvJ.jpg', NULL, 1),
(719221, 'Tarot', 'Horror', 'https://image.tmdb.org/t/p/w500/gAEUXC37vl1SnM7PXsHTF23I2vq.jpg', NULL, 1),
(786892, 'Furiosa: A Mad Max Saga', 'Action', 'https://image.tmdb.org/t/p/w500/iADOJ8Zymht2JPMoy3R7xceZprc.jpg', NULL, 1),
(823464, 'Godzilla x Kong: The New Empire', 'Science Fiction', 'https://image.tmdb.org/t/p/w500/z1p34vh7dEOnLDmyCrlUVLuoDzd.jpg', NULL, 1),
(866398, 'The Beekeeper', 'Action', 'https://image.tmdb.org/t/p/w500/A7EByudX0eOzlkQ2FIbogzyazm2.jpg', NULL, 1),
(929590, 'Civil War', 'War', 'https://image.tmdb.org/t/p/w500/sh7Rg8Er3tFcN9BpKIPOMvALgZd.jpg', NULL, 1),
(955555, 'The Roundup: No Way Out', 'Action', 'https://image.tmdb.org/t/p/w500/lW6IHrtaATxDKYVYoQGU5sh0OVm.jpg', NULL, 1),
(1001311, 'Under Paris', 'Thriller', 'https://image.tmdb.org/t/p/w500/qZPLK5ktRKa3CL4sKRZtj8UlPYc.jpg', NULL, 1),
(1011985, 'Kung Fu Panda 4', 'Animation', 'https://image.tmdb.org/t/p/w500/kDp1vUBnMpe8ak4rjgl3cLELqjU.jpg', NULL, 1),
(1022789, 'Inside Out 2', 'Animation', 'https://image.tmdb.org/t/p/w500/vpnVM9B6NMmQpWeZvzLvDESb2QY.jpg', NULL, 1),
(1035982, 'Hell House LLC Origins: The Carmichael Manor', 'Horror', 'https://image.tmdb.org/t/p/w500/9YlsIwWATGwT6LL5UZVF5xoBTcC.jpg', NULL, 0),
(1086747, 'The Watchers', 'Horror', 'https://image.tmdb.org/t/p/w500/vZVEUPychdvZLrTNwWErr9xZFmu.jpg', NULL, 1),
(1115623, 'The Last Kumite', 'Action', 'https://image.tmdb.org/t/p/w500/zDkaJgsPoSqa2cMe2hW2HAfyWwO.jpg', NULL, 1),
(1136318, 'Battle Over Britain', 'War', 'https://image.tmdb.org/t/p/w500/8htJ7keZTwa08aC9OKyiqaq1cNJ.jpg', NULL, 1),
(1154598, 'LEGO Marvel Avengers: Code Red', 'Animation', 'https://image.tmdb.org/t/p/w500/rDzig50dj7VpLwJ7SThbamETK1G.jpg', NULL, 1),
(979915593, 'Quantumania', 'Action', 'https://i.ebayimg.com/images/g/qbsAAOSwZOpkjEzl/s-l1200.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`mail`, `password`, `admin`) VALUES
('user1@example.com', '$2y$10$Md4uFmTeTshU5Hdw3/fZlOVMQF4RGMug2Pt2Y/mi77wagkpc7QrKm', 0),
('user2@example.com', '$2y$10$xOad6ZD8MjMxSPD0LlzB2.OAYE06xykRZCs4NDdvmF5AmcAmtF6e.', 0),
('user3@example.com', 'user3@example.com', 0),
('user@example.com', 'user@example.com', 0),
('userEmail', 'userEmail', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `id_vote` int(11) NOT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `id_film` int(11) DEFAULT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`id_vote`, `mail`, `id_film`, `vote`) VALUES
(71, 'user3@example.com', 693134, 1),
(72, 'user3@example.com', 653346, 1),
(73, 'user3@example.com', 614933, 1),
(74, 'user3@example.com', 639720, 1),
(75, 'user3@example.com', 1115623, -1),
(76, 'user3@example.com', 719221, -1),
(77, 'user3@example.com', 786892, -1),
(78, 'user2@example.com', 693134, 1),
(79, 'user2@example.com', 653346, 1),
(80, 'user2@example.com', 823464, 1),
(81, 'user2@example.com', 929590, 1),
(82, 'user2@example.com', 1086747, 1),
(83, 'user2@example.com', 1001311, 1),
(84, 'user2@example.com', 639720, 1),
(85, 'user2@example.com', 1022789, 1),
(86, 'user2@example.com', 573435, 1),
(87, 'user2@example.com', 38700, 1),
(88, 'user2@example.com', 1136318, -1),
(89, 'user2@example.com', 955555, 1),
(90, 'user2@example.com', 1011985, -1),
(91, 'user2@example.com', 447365, 1),
(92, 'user2@example.com', 866398, 1),
(93, 'user2@example.com', 51191, 1),
(94, 'user2@example.com', 299537, 1),
(95, 'user2@example.com', 1154598, 1),
(96, 'user2@example.com', 576743, 1),
(97, 'user1@example.com', 1136318, 1),
(98, 'user1@example.com', 299537, -1),
(99, 'user1@example.com', 573435, 1),
(100, 'user1@example.com', 1035982, 1),
(101, 'user1@example.com', 315635, 1),
(102, 'user1@example.com', 634649, 1),
(103, 'user1@example.com', 10138, 1),
(104, 'user1@example.com', 68721, -1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`mail`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id_vote`),
  ADD KEY `mail` (`mail`),
  ADD KEY `id_film` (`id_film`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `user` (`mail`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
