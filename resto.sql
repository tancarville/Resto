-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 18 Avril 2014 à 12:16
-- Version du serveur: 5.5.35-0ubuntu0.13.10.2
-- Version de PHP: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `resto`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` date NOT NULL,
  `time` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(2) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE IF NOT EXISTS `carte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `price_in` int(3) NOT NULL,
  `price_delivery` int(3) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `photo` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `carte`
--

INSERT INTO `carte` (`id`, `name`, `type`, `price_in`, `price_delivery`, `availability`, `photo`) VALUES
(1, 'Carrot, Orange and Mango Spheres with Rose Crystals', 'starter', 15, 13, 1, 'orange_sphere.jpg'),
(2, 'Liquid Parmesan Gnocchi and Mushroom Infusion', 'main', 30, 27, 1, 'parmesan_gnocchi.jpg'),
(3, 'Strawberry Spheres with Ground Pepper', 'dessert', 14, 13, 1, 'strawberry_spheres.jpg'),
(4, 'Apple Caviar with Banana Foam', 'dessert', 12, 10, 1, 'apple_caviar.jpg'),
(5, 'Yuzu Cilantro Spheres', 'starter', 13, 12, 1, 'yuzu_sphere.jpg'),
(6, 'Honey Caviar, Fourme Ambert, Black Tea', 'starter', 15, 14, 1, 'honey_caviar.jpg'),
(7, 'Carbonated Mojito Spheres', 'drink', 12, 10, 1, 'carbonated_mojito.jpg'),
(8, 'Spherical Yogurt', 'dessert', 12, 10, 1, 'spherical_yogurt.jpg'),
(9, 'Potato Foam Gnocchi with Roasted Potato Skin Consomme', 'main', 28, 25, 1, 'potato_foam.jpg'),
(10, 'Reverse Spherical Mozzarella', 'starter', 14, 12, 1, 'spherical_mozzarella.jpg'),
(11, 'Liquid Pea Ravioli', 'main', 26, 24, 1, 'liquid_pea.jpg'),
(12, 'VOSS Water', 'drink', 10, 9, 1, 'voss.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `delivery_id` (`delivery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `address_number` int(4) NOT NULL,
  `address_street` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `address_zipcode` int(5) NOT NULL,
  `address_city` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `birthdate` date NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `visitorsbook`
--

CREATE TABLE IF NOT EXISTS `visitorsbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),   
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `carte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `visitorsbook`
--
ALTER TABLE `visitorsbook`
  ADD CONSTRAINT `visitorsbook_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
