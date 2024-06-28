-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 28 juin 2024 à 07:35
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
-- Base de données : `databasegroupe5`
--
CREATE DATABASE IF NOT EXISTS `databasegroupe5` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `databasegroupe5`;

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
(20981, 'The Call of Cthulhu', 'Horror', 'https://image.tmdb.org/t/p/w500/dCrOkzrWs8ux31oVCc1R8tt6zTC.jpg', 'A dying professor leaves his great-nephew a collection of documents pertaining to the Cthulhu Cult. The nephew begins to learn why the study of the cult so fascinated his grandfather. Bit-by-bit he begins piecing together the dread implications of his grandfather\'s inquiries, and soon he takes on investigating the Cthulhu cult as a crusade of his own.', 1),
(68721, 'Iron Man 3', 'Action', 'https://image.tmdb.org/t/p/w500/qhPtAc1TKbMPqNvcdXSOn9Bn7hZ.jpg', 'When Tony Stark\'s world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.', 1),
(150540, 'Inside Out', 'Animation', 'https://image.tmdb.org/t/p/w500/2H1TmgdfNtsKlU9jKdeNyYL5y8T.jpg', 'When 11-year-old Riley moves to a new city, her Emotions team up to help her through the transition. Joy, Fear, Anger, Disgust and Sadness work together, but when Joy and Sadness get lost, they must journey through unfamiliar places to get back home.', 1),
(324857, 'Spider-Man: Into the Spider-Verse', 'Animation', 'https://image.tmdb.org/t/p/w500/iiZZdoQBEYBv6id8su7ImL0oCbD.jpg', 'Struggling to find his place in the world while juggling school and family, Brooklyn teenager Miles Morales is unexpectedly bitten by a radioactive spider and develops unfathomable powers just like the one and only Spider-Man. While wrestling with the implications of his new abilities, Miles discovers a super collider created by the madman Wilson \"Kingpin\" Fisk, causing others from across the Spider-Verse to be inadvertently transported to his dimension.', 1),
(519182, 'Despicable Me 4', 'Animation', 'https://image.tmdb.org/t/p/w500/wWba3TaojhK7NdycRhoQpsG0FaH.jpg', 'Gru and Lucy and their girls — Margo, Edith and Agnes — welcome a new member to the Gru family, Gru Jr., who is intent on tormenting his dad. Gru faces a new nemesis in Maxime Le Mal and his femme fatale girlfriend Valentina, and the family is forced to go on the run.', 1),
(569094, 'Spider-Man: Across the Spider-Verse', 'Animation', 'https://image.tmdb.org/t/p/w500/8Vt6mWEReuy4Of61Lnj5Xj704m8.jpg', 'After reuniting with Gwen Stacy, Brooklyn’s full-time, friendly neighborhood Spider-Man is catapulted across the Multiverse, where he encounters the Spider Society, a team of Spider-People charged with protecting the Multiverse’s very existence. But when the heroes clash on how to handle a new threat, Miles finds himself pitted against the other Spiders and must set out on his own to save those he loves most.', 1),
(573435, 'Bad Boys: Ride or Die', 'Action', 'https://image.tmdb.org/t/p/w500/nP6RliHjxsz4irTKsxe8FRhKZYl.jpg', 'After their late former Captain is framed, Lowrey and Burnett try to clear his name, only to end up on the run themselves.', 1),
(626412, 'Alienoid: Return to the Future', 'Action', 'https://image.tmdb.org/t/p/w500/4RClncz0GTKPZzSAcAalHCw0h3g.jpg', 'Ean has a critical mission to return to the future to save everyone. However, she becomes trapped in the distant past while trying to prevent the escape of alien prisoners who are locked up in the bodies of humans. Meanwhile, Muruk, who helps Ean escape various predicaments, is unnerved when he begins sensing the presence of a strange being in his body. Traveling through the centuries, they are trying to prevent the explosion of the haava.', 1),
(639720, 'IF', 'Comedy', 'https://image.tmdb.org/t/p/w500/xbKFv4KF3sVYuWKllLlwWDmuZP7.jpg', 'A young girl who goes through a difficult experience begins to see everyone\'s imaginary friends who have been left behind as their real-life friends have grown up.', 1),
(653346, 'Kingdom of the Planet of the Apes', 'Science Fiction', 'https://image.tmdb.org/t/p/w500/gKkl37BQuKTanygYQG1pyYgLVgf.jpg', 'Several generations in the future following Caesar\'s reign, apes are now the dominant species and live harmoniously while humans have been reduced to living in the shadows. As a new tyrannical ape leader builds his empire, one young ape undertakes a harrowing journey that will cause him to question all that he has known about the past and to make choices that will define a future for apes and humans alike.', 1),
(746036, 'The Fall Guy', 'Action', 'https://image.tmdb.org/t/p/w500/aBkqu7EddWK7qmY4grL4I6edx2h.jpg', 'Fresh off an almost career-ending accident, stuntman Colt Seavers has to track down a missing movie star, solve a conspiracy and try to win back the love of his life while still doing his day job.', 1),
(786892, 'Furiosa: A Mad Max Saga', 'Action', 'https://image.tmdb.org/t/p/w500/iADOJ8Zymht2JPMoy3R7xceZprc.jpg', 'As the world fell, young Furiosa is snatched from the Green Place of Many Mothers and falls into the hands of a great Biker Horde led by the Warlord Dementus. Sweeping through the Wasteland they come across the Citadel presided over by The Immortan Joe. While the two Tyrants war for dominance, Furiosa must survive many trials as she puts together the means to find her way home.', 1),
(799583, 'The Ministry of Ungentlemanly Warfare', 'Action', 'https://image.tmdb.org/t/p/w500/8aF0iAKH9MJMYAZdi0Slg77RYa2.jpg', 'During World War II, the British Army assigns a group of competent soldiers to carry out a mission against the Nazi forces behind enemy lines... A true story about a secret British WWII organization – the Special Operations Executive. Founded by Winston Churchill, their irregular warfare against the Germans helped to change the course of the war, and gave birth to modern black operations.', 1),
(823464, 'Godzilla x Kong: The New Empire', 'Science Fiction', 'https://image.tmdb.org/t/p/w500/z1p34vh7dEOnLDmyCrlUVLuoDzd.jpg', 'Following their explosive showdown, Godzilla and Kong must reunite against a colossal undiscovered threat hidden within our world, challenging their very existence – and our own.', 1),
(829402, 'Ultraman: Rising', 'Animation', 'https://image.tmdb.org/t/p/w500/j886YEkIUsiImY53px5VHKD4lRa.jpg', 'With Tokyo under attack from kaiju, Ultraman discovers his greatest challenge isn’t fighting giant monsters - it’s raising one.', 1),
(929590, 'Civil War', 'War', 'https://image.tmdb.org/t/p/w500/sh7Rg8Er3tFcN9BpKIPOMvALgZd.jpg', 'In the near future, a group of war journalists attempt to survive while reporting the truth as the United States stands on the brink of civil war.', 1),
(955555, 'The Roundup: No Way Out', 'Action', 'https://image.tmdb.org/t/p/w500/lW6IHrtaATxDKYVYoQGU5sh0OVm.jpg', 'Detective Ma Seok-do changes his affiliation from the Geumcheon Police Station to the Metropolitan Investigation Team, in order to eradicate Japanese gangsters who enter Korea to commit heinous crimes.', 1),
(1001311, 'Under Paris', 'Thriller', 'https://image.tmdb.org/t/p/w500/3GuTGq5IhoGqfZIFY7opswRI6Fe.jpg', 'In the Summer of 2024, Paris is hosting the World Triathlon Championships on the Seine for the first time. Sophia, a brilliant scientist, learns from Mika, a young environmental activist, that a large shark is swimming deep in the river. To avoid a bloodbath at the heart of the city, they have no choice but to join forces with Adil, the Seine river police commander.', 1),
(1011985, 'Kung Fu Panda 4', 'Animation', 'https://image.tmdb.org/t/p/w500/kDp1vUBnMpe8ak4rjgl3cLELqjU.jpg', 'Po is gearing up to become the spiritual leader of his Valley of Peace, but also needs someone to take his place as Dragon Warrior. As such, he will train a new kung fu practitioner for the spot and will encounter a villain called the Chameleon who conjures villains from the past.', 1),
(1012201, 'HAIKYU!! The Dumpster Battle', 'Animation', 'https://image.tmdb.org/t/p/w500/ntRU0OA4etGGiMMmH1Yw0bnaMdW.jpg', 'Shoyo Hinata joins Karasuno High\'s volleyball club to be like his idol, a former Karasuno player known as the \'Little Giant\'. But Hinata soon learns that he must team up with his middle school nemesis, Tobio Kageyama. Their clashing styles form a surprising weapon, but can their newfound teamwork defeat their rival Nekoma High in the highly anticipated \'Dumpster Battle\', the long awaited ultimate showdown between two opposing underdog teams?', 1),
(1016346, 'MR-9: Do or Die', 'Action', 'https://image.tmdb.org/t/p/w500/geAWZUshBg4hS8TIeLOEhJbglpo.jpg', 'Masud Rana is a Secret Agent with code name MR-9 of the Bangladesh Counter Intelligence Agency', 1),
(1022789, 'Inside Out 2', 'Animation', 'https://image.tmdb.org/t/p/w500/vpnVM9B6NMmQpWeZvzLvDESb2QY.jpg', 'Teenager Riley\'s mind headquarters is undergoing a sudden demolition to make room for something entirely unexpected: new Emotions! Joy, Sadness, Anger, Fear and Disgust, who’ve long been running a successful operation by all accounts, aren’t sure how to feel when Anxiety shows up. And it looks like she’s not alone.', 1),
(1086747, 'The Watchers', 'Horror', 'https://image.tmdb.org/t/p/w500/vZVEUPychdvZLrTNwWErr9xZFmu.jpg', 'A young artist gets stranded in an extensive, immaculate forest in western Ireland, where, after finding shelter, she becomes trapped alongside three strangers, stalked by mysterious creatures each night.', 1),
(1115623, 'The Last Kumite', 'Action', 'https://image.tmdb.org/t/p/w500/zDkaJgsPoSqa2cMe2hW2HAfyWwO.jpg', 'When Karate champion Michael Rivers wins the last tournament of his career, shady businessman Ron Hall offers him the opportunity to fight in an illegal Kumite in Bulgaria against the world’s best martial artists.  When Michael declines, Hall has his daughter kidnapped and, in order to rescue her, Rivers is left with no choice but to compete in the deadly tournament. Arriving in Bulgaria, he finds out that he is not the only fighter whose loved one was taken. Rivers enlists the help of trainers Master Loren, and Julie Jackson but will it be enough for him to win the tournament and save his daughter’s life?', 1);

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
('admin@rotten.com', '$2y$10$l4DrMLrLV9bktbu.fFoxb.RRI2eheky78/TRQkTqCdsh8Qwf.bgA6', 1),
('makhaira@makhaira.com', '$2y$10$JJ24EG6Y5Gag/5ayo352pevftZkWWQKMBrgM5CAYdM5ilUP0C5CFq', 0),
('user1@example.com', '$2y$10$Md4uFmTeTshU5Hdw3/fZlOVMQF4RGMug2Pt2Y/mi77wagkpc7QrKm', 0),
('user2@example.com', '$2y$10$xOad6ZD8MjMxSPD0LlzB2.OAYE06xykRZCs4NDdvmF5AmcAmtF6e.', 0);

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
(103, 'user1@example.com', 10138, 1),
(104, 'user1@example.com', 68721, -1),
(105, 'admin@rotten.com', 829402, 1),
(106, 'admin@rotten.com', 1001311, -1),
(107, 'admin@rotten.com', 955555, 1),
(108, 'admin@rotten.com', 1016346, 1),
(109, 'admin@rotten.com', 653346, 1),
(110, 'admin@rotten.com', 639720, 1),
(111, 'admin@rotten.com', 519182, -1),
(112, 'admin@rotten.com', 823464, 1),
(113, 'admin@rotten.com', 786892, -1),
(114, 'admin@rotten.com', 1022789, 1),
(115, 'admin@rotten.com', 150540, 1),
(116, 'admin@rotten.com', 1011985, 1),
(117, 'admin@rotten.com', 1012201, 1),
(118, 'admin@rotten.com', 1115623, 1),
(119, 'admin@rotten.com', 746036, 1),
(120, 'admin@rotten.com', 929590, 1),
(121, 'admin@rotten.com', 1086747, 1),
(122, 'admin@rotten.com', 573435, 1),
(123, 'admin@rotten.com', 626412, 1),
(124, 'admin@rotten.com', 20981, 1),
(125, 'makhaira@makhaira.com', 799583, 1),
(126, 'makhaira@makhaira.com', 569094, 1),
(127, 'makhaira@makhaira.com', 324857, 1),
(128, 'makhaira@makhaira.com', 1011985, 1),
(129, 'makhaira@makhaira.com', 929590, 1),
(130, 'makhaira@makhaira.com', 829402, -1),
(131, 'makhaira@makhaira.com', 653346, -1),
(132, 'makhaira@makhaira.com', 626412, -1),
(133, 'makhaira@makhaira.com', 150540, 1),
(134, 'makhaira@makhaira.com', 1001311, -1);

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
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

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
