-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 juin 2024 à 13:47
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
  `valide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `genre`, `url_poster`, `valide`) VALUES
(0, 'The Roundup: No Way Out', 'Action, Crime, Comedy, Thriller', 'https://image.tmdb.org/t/p/w500/lW6IHrtaATxDKYVYoQGU5sh0OVm.jpg', 0),
(1, 'Nouveau film', 'Action', 'url_du_poster.jpg', 1),
(123, 'Nouveau film', 'Action', 'url_du_poster.jpg', 1),
(671, 'Harry Potter and the Philosopher\'s Stone', 'Adventure, Fantasy', 'https://image.tmdb.org/t/p/w500/wuMc08IPKEatf9rnMNXvIDxqP4W.jpg', 0),
(150540, 'Inside Out', 'Animation, Family, Adventure, Drama, Comedy', 'https://image.tmdb.org/t/p/w500/2H1TmgdfNtsKlU9jKdeNyYL5y8T.jpg', 0),
(466397, 'Katie Fforde: Dance on Broadway', 'Romance', 'https://image.tmdb.org/t/p/w500/104SBDoxwWZmt74ELNtJ5zAvIxv.jpg', 0),
(573435, 'Bad Boys: Ride or Die', 'Action, Crime, Thriller, Comedy', 'https://image.tmdb.org/t/p/w500/nP6RliHjxsz4irTKsxe8FRhKZYl.jpg', 0),
(614933, 'Atlas', 'Science Fiction, Action', 'https://image.tmdb.org/t/p/w500/bcM2Tl5HlsvPBnL8DKP9Ie6vU4r.jpg', 0),
(719221, 'Tarot', 'Horror', 'https://image.tmdb.org/t/p/w500/gAEUXC37vl1SnM7PXsHTF23I2vq.jpg', 0),
(843074, 'GG Bond: Diary of Dinosaurs', 'Animation, Adventure', 'https://image.tmdb.org/t/p/w500/fpABz8HCpBSrAvJpRLAlTx3V21A.jpg', 0),
(955555, 'The Roundup: No Way Out', 'Action, Crime, Comedy, Thriller', 'https://image.tmdb.org/t/p/w500/lW6IHrtaATxDKYVYoQGU5sh0OVm.jpg', 0),
(974635, 'Hit Man', 'Romance, Comedy, Crime', 'https://image.tmdb.org/t/p/w500/1126gjlBf4hTm9Sgf0ox3LGVEBt.jpg', 0),
(1011985, 'Kung Fu Panda 4', 'Animation, Action, Family, Comedy, Fantasy', 'https://image.tmdb.org/t/p/w500/kDp1vUBnMpe8ak4rjgl3cLELqjU.jpg', 0),
(1115623, 'The Last Kumite', 'Action', 'https://image.tmdb.org/t/p/w500/zDkaJgsPoSqa2cMe2hW2HAfyWwO.jpg', 0),
(1219685, 'Un père idéal', 'Drama, TV Movie', 'https://image.tmdb.org/t/p/w500/4xJd3uwtL1vCuZgEfEc8JXI9Uyx.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT;

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
