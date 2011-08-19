-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2011 at 11:51 AM
-- Server version: 5.1.54
-- PHP Version: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogBundle`
--

-- --------------------------------------------------------

--
-- Table structure for table `Article`
--

CREATE TABLE IF NOT EXISTS `Article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CD8737FA12469DE2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `Article`
--

INSERT INTO `Article` (`id`, `category_id`, `title`, `content`) VALUES
(10, 2, '300 hello', 'et 1000 aurevoir'),
(12, 2, 'mickeal', 'jackson est gentil\r\n\r\na modifier !'),
(17, 1, 'Pulp fiction', 'Eh oui nous vennons d''apprendre que le fameux film Pulp Fiction etait une pure fiction !'),
(18, 3, 'Un ours', 'Et un autre !');

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`id`, `name`) VALUES
(1, 'Cinema'),
(2, 'Environement'),
(3, 'Animaux');

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `username_canonical` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_canonical` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `algorithm` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `algorithm`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'sNax64', 'snax64', 'prout@prout.fr', 'prout@prout.fr', 1, 'sha512', 'oahr1wemvb40gkcwokc8o8co0o00kco', 'c74e529b2a35d39d362cccc765dd1188c99c146e7234f1315c28b288cd82a20706e7f98fe3e191f6c856a4d39343ea4cceff093fec6fad99d518966b0213386b', NULL, 0, 0, NULL, '29dn1in2ehxcwgwwocsk008gss80w4k44s44kgogsgw8oc4swk', NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Article`
--
ALTER TABLE `Article`
  ADD CONSTRAINT `Article_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`);
