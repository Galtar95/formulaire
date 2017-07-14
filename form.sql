CREATE DATABASE form ;
USE form ;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `date_inscription` timestamp DEFAULT CURRENT_TIMESTAMP,
  KEY `ID` (`ID`)
);

INSERT INTO user VALUES (1, 'Administrateur', 'Administrateur', 'Administrateur', 'administrateur@administrateur.fr', '1f2894b9c64af1e9646ce8ae49fe67c74e4267054d1182e2a96ff36a02ba8b08', CURRENT_TIMESTAMP);