-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 nov. 2023 à 20:36
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mono`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `ddate` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `contenu` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`id`, `titre`, `ddate`, `img`, `contenu`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Nouvelle version du smartphone XYZ-12 bientôt disponible', '15 Octobre 2023', '0', 'L\'entreprise ABC Tech a annoncé que la prochaine version de son smartphone phare, le XYZ-12, sera bientôt disponible sur le marché. Cette mise à jour apporte de nouvelles fonctionnalités, une meilleure autonomie de la batterie et un design amélioré.', '2023-10-20 17:24:45', '2023-10-20 17:24:45', 1),
(2, 'Lancement d\'une application de réalité augmentée révolutionnaire', '18 Octobre 2023', '0', 'Une start-up innovante, TechVisAR, a dévoilé sa nouvelle application de réalité augmentée qui promet de révolutionner la manière dont nous interagissons avec le monde numérique. Cette application offre des expériences immersives inégalées, allant de la formation professionnelle à la navigation urbaine.', '2023-10-20 17:24:45', '2023-10-20 17:24:45', 1),
(3, 'Découverte d\'une faille de sécurité majeure dans les systèmes informatiques', '20 Octobre 2023', '0', 'Des chercheurs en sécurité ont identifié une faille de sécurité majeure dans les systèmes informatiques largement utilisés. Les experts travaillent actuellement sur un correctif pour résoudre ce problème potentiellement grave qui pourrait affecter des millions d\'utilisateurs.', '2023-10-20 17:24:45', '2023-10-20 17:24:45', 1),
(4, 'Une vie motivée par l\'éssentiel', '12 Octobre 2023', 'C:\\Users\\mante\\AppData\\Local\\Temp\\php2F51.tmp', 'L\'entreprise ABC Tech a annoncé que la prochaine version de son smartphone phare, le XYZ-12, sera bientôt disponible sur le marché. Cette mise à jour apporte de nouvelles fonctionnalités, une meilleure autonomie de la batterie et un design amélioré.', '2023-10-20 17:15:23', '2023-10-20 17:15:23', 1);

-- --------------------------------------------------------

--
-- Structure de la table `annees`
--

CREATE TABLE `annees` (
  `id` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annees`
--

INSERT INTO `annees` (`id`, `designation`, `etat`) VALUES
(1, 2007, 1),
(2, 2008, 1),
(3, 2009, 1),
(4, 2010, 1),
(5, 2011, 1),
(6, 2012, 1),
(7, 2013, 1),
(8, 2014, 1),
(9, 2015, 1),
(10, 2016, 1),
(11, 2017, 1),
(12, 2018, 1),
(13, 2019, 1),
(14, 2020, 1),
(15, 2021, 1),
(16, 2022, 1),
(17, 2023, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `contenu` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `actif` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `nom`, `contenu`, `created_at`, `updated_at`, `actif`) VALUES
(1, 'Mantele Yoanh', 'Lalalalala', '2023-10-25 21:06:05', '2023-10-25 21:06:05', 1),
(2, 'Mabiala Chris', 'Je mange', '2023-10-25 21:44:48', '2023-10-25 21:44:48', 0),
(3, 'Mantele Yoanh', 'Pour styliser les bordures et ajouter une ombre légère et fantaisiste à chaque élément du carrousel, vous pouvez utiliser des classes CSS Bootstrap pour contrôler ces aspects. Voici comment vous pouvez le faire', '2023-10-25 21:59:24', '2023-10-25 21:59:24', 0),
(4, 'CHRISTIAN MANTELE', 'jdbnjnrovr', '2023-10-28 19:45:29', '2023-10-28 19:45:29', 1);

-- --------------------------------------------------------

--
-- Structure de la table `courcycles`
--

CREATE TABLE `courcycles` (
  `id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `cour_id` int(11) DEFAULT NULL,
  `cycle_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) DEFAULT NULL,
  `url_pdf` varchar(255) DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT 1,
  `yeux` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `courcycles`
--

INSERT INTO `courcycles` (`id`, `type_id`, `cour_id`, `cycle_id`, `created_at`, `updated_at`, `token`, `url_pdf`, `etat`, `yeux`) VALUES
(2, 1, 1, 2, '2023-09-25 15:08:29', '2023-10-17 21:24:27', 'jkdbvkjd', 'pdfs/Methode 5S.pdf', 1, 1),
(3, 1, 1, 3, '2023-09-25 15:08:29', '2023-09-29 07:21:00', 'kjvkhv', 'pdfs/1691486397.pdf', 1, 1),
(4, 1, 2, 1, '2023-09-25 15:08:29', '2023-10-18 13:02:07', 'bdkvbdjvl', 'pdfs/MONOGRAPHIE1.pdf', 1, 1),
(5, 2, 3, 1, '2023-09-25 15:08:29', '2023-10-18 13:02:08', 'jdkvkjdqbv', 'pdfs/MONOGRAPHIE1.pdf', 1, 1),
(6, 1, 2, 2, '2023-09-25 15:08:29', '2023-09-25 15:08:29', 'kjdsbvoidqjbv', 'pdfs/1691486397.pdf', 1, 1),
(7, 1, 4, 2, '2023-09-26 06:14:30', '2023-09-26 06:14:30', 'ihfipehfpie', 'pdfs/MONOGRAPHIE1.pdf', 1, 1),
(8, 1, 5, 3, '2023-09-29 17:44:05', '2023-09-29 17:44:05', NULL, NULL, 1, 1),
(9, 1, 6, 1, '2023-09-29 17:50:32', '2023-09-29 17:50:32', NULL, NULL, 1, 1),
(10, 1, 7, 1, '2023-10-02 19:34:20', '2023-10-02 19:34:20', NULL, NULL, 1, 1),
(11, 1, 8, 1, '2023-10-06 11:45:34', '2023-10-06 11:45:34', 'dlbfozbg', NULL, 1, 1),
(12, 2, 9, 1, '2023-10-06 11:52:39', '2023-10-06 17:03:55', '0df2dbd827e7dae810127ec3864b5f94e7f2e163', NULL, 1, 1),
(13, 2, 10, 1, '2023-10-18 05:17:43', '2023-10-18 05:17:43', 'ba2679cefae7365ae42144ae5075213747849bad', NULL, 1, 1),
(16, 1, 19, 3, '2023-10-18 07:08:02', '2023-10-18 07:08:02', '69a8817f6235b8a95d620cbdf43126b6c43f3563', 'courpdf/1697616482.pdf', 1, 1),
(17, 1, 20, 1, '2023-10-18 07:12:08', '2023-10-18 07:12:08', '1e15d36830c8f440a775220e2bf8d1a3e97bd9e2', 'courpdf/1697616728.pdf', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `courfilieres`
--

CREATE TABLE `courfilieres` (
  `id` int(11) NOT NULL,
  `courcycle_id` int(11) DEFAULT NULL,
  `filiere_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `courfilieres`
--

INSERT INTO `courfilieres` (`id`, `courcycle_id`, `filiere_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2023-09-25 15:25:52', '2023-09-25 15:25:52'),
(2, 2, 1, '2023-09-25 15:25:52', '2023-09-25 15:25:52'),
(3, 3, 2, '2023-09-25 15:25:52', '2023-09-25 15:25:52'),
(6, 6, 2, '2023-09-25 15:50:50', '2023-09-25 15:50:50'),
(7, 5, 3, '2023-09-25 16:04:49', '2023-09-25 16:04:49'),
(8, 4, 1, '2023-09-25 16:05:53', '2023-09-25 16:05:53'),
(9, 2, 2, '2023-09-25 17:28:07', '2023-09-25 17:28:07'),
(10, 6, 1, '2023-09-25 17:29:40', '2023-09-25 17:29:40'),
(11, 7, 1, '2023-09-26 06:15:39', '2023-09-26 06:15:39'),
(12, 7, 2, '2023-09-26 06:15:39', '2023-09-26 06:15:39'),
(13, 7, 4, '2023-09-26 06:17:44', '2023-09-26 06:17:44'),
(14, 7, 5, '2023-09-26 06:17:44', '2023-09-26 06:17:44');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `designation` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT 1,
  `yeux` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `designation`, `description`, `created_at`, `updated_at`, `token`, `etat`, `yeux`) VALUES
(1, 'Mathematiques', NULL, '2023-09-25 13:46:18', '2023-09-25 13:46:18', 'dfohfoznif', 0, 1),
(2, 'Developpement web', 'programmation pascal', '2023-09-25 13:46:18', '2023-09-25 13:46:18', 'jdfokzjrnovlkr', 1, 1),
(3, 'Methodologie de la recherche', NULL, '2023-09-25 13:46:18', '2023-09-25 13:46:18', 'hoiudfjsqol', 1, 1),
(4, 'C++', 'langage de programmation ndifznrignnfemivnariovnairoivnorzinoirvn oiubvnorinv roiu aevviro tbianepfbpa oibpaerb ibebknbif efoibbhofibnmjdf fdfjvbidfbfnljfs  iugbnsb isdub gbu oiuu b ifnbosidfnbsoibndb juonbois u boif ofinbfoi oifnboidnb, qoubvfovqinv obfoq   fubvoqfibnoibfnoinq nfohdofibndfij fdbisufb sfbiuf dfjb qoifibnq boifdb fqofibnqdfb ofiqfd bqoifbjq ofub qjfboqb fdbjfnb ljnsdoif bfdogib sboidb dfb', '2023-09-26 06:12:30', '2023-09-26 06:12:30', 'jdhgfizubvr', 1, 1),
(5, 'CISCO', 'Reseau informatique', '2023-09-29 17:44:05', '2023-09-29 17:44:05', NULL, 1, 1),
(6, 'Visual basic', 'Programmation web', '2023-09-29 17:50:32', '2023-09-29 17:50:32', '8df006698419c342f9e5b0dc9db457241ba906e8', 1, 1),
(7, 'Mathematiques', 'Calculs', '2023-10-02 19:34:20', '2023-10-02 19:34:20', 'c693ca269e4c6ab806cf7e84481dcdb4c10fd394', 1, 1),
(8, 'Anglais', 'Parler anglais', '2023-10-06 11:45:34', '2023-10-06 11:45:34', '411cf23b13f088d890561cddc0c70d91cbf7c7c5', 1, 1),
(9, 'Anglais', 'Parler mieux l\'anglais', '2023-10-06 11:52:39', '2023-10-06 11:52:39', '1fcc1907460e0c0d0aaca1129e5d06fa679ad352', 1, 1),
(10, 'Mathematiques', 'Calcule', '2023-10-18 05:17:43', '2023-10-18 05:17:43', '87b8e72d0006fdedd2d0c0d7e1bf2a1707c575f3', 1, 1),
(19, '.NET', 'Developpement web C#', '2023-10-18 07:08:02', '2023-10-18 07:08:02', '69a8817f6235b8a95d620cbdf43126b6c43f3563', 1, 1),
(20, 'EPS', 'atrrtrttuuyryu', '2023-10-18 07:12:08', '2023-10-18 07:12:08', '1e15d36830c8f440a775220e2bf8d1a3e97bd9e2', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cycles`
--

CREATE TABLE `cycles` (
  `id` int(11) NOT NULL,
  `code` varchar(5) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 1,
  `yeux` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cycles`
--

INSERT INTO `cycles` (`id`, `code`, `designation`, `created_at`, `updated_at`, `etat`, `yeux`) VALUES
(1, 'L1', '1 ère Année', '2023-09-24 23:03:50', '2023-09-27 08:30:54', 1, 1),
(2, 'L2', '2e Année', '2023-09-24 23:03:50', '2023-09-27 08:32:36', 1, 1),
(3, 'L3', '3e Année', '2023-09-24 23:03:50', '2023-09-24 23:03:50', 1, 1),
(4, 'L4', '4eme Année', '2023-09-27 08:52:07', '2023-09-27 08:52:13', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fichiers`
--

CREATE TABLE `fichiers` (
  `id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `dm` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `filiere` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `annee_id` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fichiers`
--

INSERT INTO `fichiers` (`id`, `theme`, `auteur`, `dm`, `created_at`, `updated_at`, `pdf_file`, `filiere`, `user_id`, `annee_id`, `token`, `etat`) VALUES
(1, 'Le monde est beau', 'Mabiala Alain', 'Mr MAKITA JEAN', '2023-07-29 01:26:37', '2023-09-24 09:29:00', 'public\\pdfs', 'Informatique de gestion', 1, 17, NULL, 1),
(2, 'La prise en charge des NAT', 'Louemba Franque', 'Mr ANTOINE MAKAYA', '2023-07-29 01:26:37', '2023-07-29 01:26:37', 'public\\pdfs', 'Reseau Informatique', 1, 17, NULL, 1),
(3, 'Lala', 'jfbkleaf', 'jsbfl', '2023-08-07 22:30:47', '2023-09-24 09:26:46', NULL, 'MAINTENANCE INDUSTRIELLE', 1, 17, NULL, 1),
(4, 'Gestion Pharmacie', 'MANTELE CLARKY/ NGO-PAMBOU', 'ESSOMBA CLEMENT', '2023-08-07 22:32:12', '2023-08-07 22:32:12', NULL, 'MAINTENANCE INDUSTRIELLE', 1, 17, NULL, 1),
(5, 'B', 'B', 'B', '2023-08-08 08:02:30', '2023-08-11 11:17:50', NULL, 'INFORMATIQUE DE GESTION', 1, 17, NULL, 1),
(6, 'LALA', 'LOLO', 'NANA', '2023-08-08 08:06:00', '2023-08-08 08:06:00', NULL, 'INFORMATIQUE DE GESTION', 1, 17, NULL, 1),
(7, 'NONN', 'NONO', 'NONO', '2023-08-08 08:53:59', '2023-08-08 08:53:59', NULL, 'INFORMATIQUE DE GESTION', 1, 17, NULL, 1),
(8, 'LALA', 'NONO', 'NINI', '2023-08-08 09:08:53', '2023-09-24 10:24:02', NULL, 'INFORMATIQUE DE GESTION', 1, 17, NULL, 0),
(9, 'aer', 'aze', 'aze', '2023-08-08 09:14:00', '2023-08-08 09:14:00', NULL, 'INFORMATIQUE DE GESTION', 1, 17, NULL, 1),
(10, 'GESTION HOPITAL', 'KEREN IDONI', 'JOSIANE', '2023-08-08 09:19:57', '2023-08-08 09:19:57', 'pdfs/1691486397.pdf', 'INFORMATIQUE DE GESTION', 1, 17, NULL, 1),
(11, 'eer', 'etzr', 'ette', '2023-08-11 10:10:30', '2023-08-11 10:10:30', 'pdfs/1691748630.pdf', 'fef', 1, 17, NULL, 1),
(12, 'Mnager sans boire', 'lalala', 'alalala', '2023-08-11 10:11:40', '2023-08-11 10:11:40', 'pdfs/1691748700.pdf', 'INFORMATIQUE DE GESTION', 1, 17, NULL, 1),
(13, 'Les bits', 'YOANH', 'MANTELE', '2023-08-11 10:17:10', '2023-08-11 10:17:10', 'pdfs/1691749030.pdf', 'INFORMATIQUE DE GESTION', 1, 17, NULL, 1),
(14, 'La tech de nos jours', 'Mabiala Jean Paul', 'Makosso Paul', '2023-09-24 10:25:56', '2023-09-24 10:25:56', 'pdfs/1695551156.pdf', 'RESOUSRCE HUMAINES', 1, 17, NULL, 1),
(15, 'Manger', 'MANTELE YOANH', 'Mabiala jean', '2023-09-28 00:13:44', '2023-09-28 00:13:44', 'pdfs/1695860023.pdf', 'INGORMATIQUE DE GESTION', 1, 17, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

CREATE TABLE `filieres` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 1,
  `yeux` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filieres`
--

INSERT INTO `filieres` (`id`, `designation`, `code`, `created_at`, `updated_at`, `etat`, `yeux`) VALUES
(1, 'informatique de gestion', 'IG', '2023-09-25 15:24:59', '2023-09-27 07:36:43', 1, 0),
(2, 'reseaux et telecommunication', 'RT', '2023-09-25 15:24:59', '2023-09-27 07:45:03', 1, 0),
(3, 'transport et logistiques', 'TL', '2023-09-25 15:24:59', '2023-09-27 07:44:30', 1, 1),
(4, 'maintenace informatique', 'MI', '2023-09-26 06:17:05', '2023-09-27 07:44:35', 1, 1),
(5, 'licence telecommunication', 'LT', '2023-09-26 06:17:05', '2023-09-27 07:44:42', 1, 1),
(6, 'Resources humaine', 'RH', '2023-09-27 07:55:20', '2023-09-27 07:55:20', 1, 1),
(7, 'Hygienne securité environnement', 'HSE', '2023-09-27 07:57:23', '2023-09-27 07:57:49', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` int(11) NOT NULL,
  `auteur` text DEFAULT NULL,
  `titre` text DEFAULT NULL,
  `soustitre` text DEFAULT NULL,
  `edition` text DEFAULT NULL,
  `lieupub` text DEFAULT NULL,
  `maisoned` text DEFAULT NULL,
  `datepub` date DEFAULT NULL,
  `page` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `url_pdf` varchar(255) DEFAULT NULL,
  `token` text DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT 1,
  `yeux` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `auteur`, `titre`, `soustitre`, `edition`, `lieupub`, `maisoned`, `datepub`, `page`, `created_at`, `updated_at`, `url_pdf`, `token`, `etat`, `yeux`) VALUES
(1, 'Yoanh', 'Manger du pain', 'Avec du lait', 'premiere', 'Boutique', 'Pointe-Noire', '2023-10-18', 100, '2023-09-25 00:09:15', '2023-10-18 20:20:17', 'pdfs/1691486397.pdf', 'IHFG%MQOIRBVOIREBVQ%IV', 1, 1),
(2, 'dhmosh', 'djbvkvmjdbq', 'djqbfkdqjbkq', 'duhfoiuf', 'djbodljv', 'jdbsgldv', '2023-09-02', 149, '2023-09-25 00:09:15', '2023-09-29 06:51:49', 'pdfs/1691486397.pdf', 'OZOHZOUBVZOIBVZOVZBOVOIBVIBVAPIBOAVEPOIBVA', 1, 1),
(3, NULL, 'Une vie motivée par l\'éssentiel', 'OURANIA', 'RICK WARREN', NULL, NULL, NULL, 399, '2023-09-27 11:46:24', '2023-09-27 11:46:24', NULL, NULL, 1, 1),
(4, 'MANTELE YOANH', 'Reflechissez et devenez riche', 'pourquoi devenir riche ?', 'Arcrane', 'Congo', 'Yahoo', '2023-09-05', 288, '2023-09-27 11:50:56', '2023-09-27 11:50:56', NULL, NULL, 1, 1),
(5, 'MANTELE YOANH', 'Une vie motivée par l\'éssentiel', 'Pourquoi suis-je sur terre', 'RICK WARREN', 'Congo', 'Yahoo', NULL, 233, '2023-09-27 11:55:43', '2023-09-29 06:04:10', NULL, NULL, 1, 1),
(6, 'MANTELE YOANH', 'Une vie motivée par l\'éssentiel', 'Pourquoi suis-je sur terre', 'Arcrane', NULL, NULL, NULL, 222, '2023-09-27 11:56:57', '2023-09-27 11:56:57', NULL, NULL, 1, 1),
(7, 'BBBJ', 'Se lever', 'Pourquoi suis-je sur terre', 'Arcrane', NULL, NULL, NULL, 12, '2023-09-27 22:14:00', '2023-09-27 22:14:00', NULL, NULL, 1, 1),
(8, 'MANTELE YOANH', 'Une vie motivée par l\'éssentiel', 'Pourquoi suis-je sur terre ?', 'RICK WARREN', 'Congo', NULL, NULL, 17, '2023-09-27 22:28:40', '2023-09-27 22:28:40', NULL, NULL, 1, 1),
(9, 'MANTELE YOANH', 'Une vie motivée par l\'éssentiel', 'Pourquoi suis-je sur terre ?', 'RICK WARREN', 'Congo', NULL, NULL, 17, '2023-09-27 22:33:33', '2023-09-27 22:33:35', 'photolivre/b2ca533191da2bc7e471539250b4f678ed9df67b.pdf', NULL, 1, 1),
(10, 'MANTELE YOANH', 'Se lever', 'Pourquoi suis-je sur terre', 'Arcane', 'Congo', 'Yahoo', '2023-09-25', 4, '2023-09-27 22:34:07', '2023-09-27 22:34:07', 'photolivre/e68e759443e650cfdec9b2123c98c7fcbcbb2aa9.pdf', NULL, 1, 1),
(11, 'BBBJ', 'Une vie motivée par l\'éssentiel', 'Pourquoi suis-je sur terre ?', 'RICK WARREN', 'Congo', NULL, NULL, 2, '2023-09-27 22:42:18', '2023-09-27 22:42:18', 'photolivre/0cc5ce442d32fe782ae8a44081b999ff4bf33932.pdf', NULL, 1, 1),
(12, 'BBBJ', 'Se lever', 'Pourquoi suis-je sur terre', 'RICK WARREN', NULL, NULL, NULL, 4, '2023-09-27 22:47:06', '2023-09-28 05:17:07', 'photolivre/407742ea3576fae161aabb3ca16c123d9a12e640.pdf', NULL, 1, 1),
(13, 'MANTELE YOANH', 'Se lever', 'pourquoi devenir riche ?', 'RICK WARREN', 'Congo', 'Yahoo', '2023-09-12', 34, '2023-09-27 22:59:20', '2023-09-27 22:59:20', 'photolivre/6c80dcf6d0da927b404b23c9d5f79a469e26a5a2.pdf', NULL, 1, 1),
(14, 'MAKAYA', 'Reflechissez et devenez riche', 'Pourquoi suis-je sur terre ?', 'RICK WARREN', NULL, NULL, NULL, 12, '2023-09-27 23:27:22', '2023-09-27 23:50:03', 'livrephoto/1695860842.pdf', NULL, 1, 1),
(15, 'MANTELE YOANH', 'Dormir debout', 'Pourquoi suis-je sur terre', 'Navda', 'New York', 'Yahoo', '2023-09-05', 244, '2023-09-28 05:20:02', '2023-09-28 05:20:02', 'livrephoto/1695882002.pdf', NULL, 1, 1),
(16, 'MAKAYA', 'Aller au travails', 'pourquoi devenir riche ?', 'Arcane', 'New York', 'Yahoo', '2023-09-04', 300, '2023-09-29 06:25:28', '2023-10-18 20:17:25', 'livrephoto/1695972328.pdf', 'e626bc09c9ae204f1e768bd16dac11f4d0003be6', 1, 1),
(17, 'Mabiala', 'Aller travailler', 'pourquoi devenir riche', 'New edition', 'Chicago', 'Google', '2023-09-01', 200, '2023-09-29 06:34:11', '2023-09-29 06:34:11', 'livrephoto/1695972851.pdf', 'a9e292095bb97435097f034eeada8bf7e0151185', 1, 1),
(18, 'Mabiala', 'Aller travailler encore', 'pourquoi devenir riche', 'New edition', 'Chicago', 'Google', '2023-09-01', 200, '2023-09-29 06:39:54', '2023-09-29 06:51:52', 'livrephoto/1695973194.pdf', '24ad7174d05a0788db2d3d5be60ee6b8fe7eb9d2', 1, 1),
(19, 'Mabiala', 'Aller travailler encore plus', 'pourquoi devenir riche', 'New editions tp', 'Chicago', 'Google', '2023-09-01', 200, '2023-09-29 16:41:04', '2023-10-02 19:28:34', 'livrephoto/1696010730.pdf', 'e5dce6db2d6b29f7c1552fd1c7ad76e9b90e01e9', 1, 1),
(20, 'Isaki ochida', 'Supreme', 'Le challenge', 'Arcane', 'Tokyo', 'Youtube', '2022-12-12', 222, '2023-10-06 11:33:49', '2023-10-06 11:33:49', 'livrephoto/1696595629.pdf', '3c155e43c86ce44d5ed12af5e99dead3ba2f5240', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `resumes`
--

CREATE TABLE `resumes` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `cour_id` int(11) NOT NULL,
  `url_pdf` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT 1,
  `yeux` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `resumes`
--

INSERT INTO `resumes` (`id`, `designation`, `cour_id`, `url_pdf`, `created_at`, `updated_at`, `token`, `etat`, `yeux`) VALUES
(1, 'resume de la methodologie', 3, 'pdfs/1695551156.pdf', '2023-09-25 13:48:00', '2023-10-17 20:52:19', '2udo', 1, 1),
(2, 'resumé du developpement web api', 2, 'pdfs/1695551156.pdf', '2023-09-25 13:48:00', '2023-10-18 19:53:14', '7695GGDOH', 1, 1),
(3, 'resumer des maths', 1, 'pdfs/1695551156.pdf', '2023-09-25 13:48:00', '2023-10-18 13:06:48', 'GUOO2689203', 1, 1),
(4, 'resume de cisco', 5, 'resumepdf/1696618632.pdf', '2023-10-06 17:57:12', '2023-10-18 13:10:46', 'c37a8c84ec797b2add4d0f77acc3c5ad92f9e7b1', 1, 1),
(6, 'Resume eps la redemption', 20, 'resumepdf/1697638087.pdf', '2023-10-18 13:08:07', '2023-10-18 19:55:42', 'effdc67955bf42ce275afc5ce16bbae28520de10', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tels`
--

CREATE TABLE `tels` (
  `id` int(11) NOT NULL,
  `nbr` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tels`
--

INSERT INTO `tels` (`id`, `nbr`, `created_at`, `updated_at`) VALUES
(1, 83, '2023-10-28 20:47:57', '2023-10-28 19:47:57');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 1,
  `yeux` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `designation`, `created_at`, `updated_at`, `etat`, `yeux`) VALUES
(1, 'Options techniques', '2023-09-25 15:58:43', '2023-09-27 08:13:42', 1, 1),
(2, 'Options commerciales', '2023-09-25 15:58:43', '2023-09-27 08:14:07', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Mantele', 'mantele@gmail.com', NULL, '$2y$10$8rHZCXGJ6ikx4Ki17UtLZOhJvBkaUUI5ha9r.CUWXTbZ72JJpkBUu', NULL, '2023-07-28 20:54:17', '2023-07-28 20:54:17', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annees`
--
ALTER TABLE `annees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courcycles`
--
ALTER TABLE `courcycles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courfilieres`
--
ALTER TABLE `courfilieres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cycles`
--
ALTER TABLE `cycles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `fichiers`
--
ALTER TABLE `fichiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tels`
--
ALTER TABLE `tels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `annees`
--
ALTER TABLE `annees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `courcycles`
--
ALTER TABLE `courcycles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `courfilieres`
--
ALTER TABLE `courfilieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `cycles`
--
ALTER TABLE `cycles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fichiers`
--
ALTER TABLE `fichiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tels`
--
ALTER TABLE `tels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
