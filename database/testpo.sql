-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.26 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour testpo
DROP DATABASE IF EXISTS `testpo`;
CREATE DATABASE IF NOT EXISTS `testpo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `testpo`;

-- Listage de la structure de la table testpo. users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table testpo.users : 2 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Shona', 'Faye', 'test@test.com', '$2y$10$/Fg/ckPwFM2oV1HUV6vuUOqHHqnZtA1EH1Zvvq6uVm0Pf1g0X1CgG', '2020-12-12 11:04:53', '0000-00-00 00:00:00'),
	(2, 'Shonita', 'fafa', 'admin@admin.com', '$2y$10$Um8jl7lq8ibpGGB.VUb.CeTUhNJukLVhNmY54Bdnmk5WfguCS6UHu', '2020-12-12 12:37:09', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
