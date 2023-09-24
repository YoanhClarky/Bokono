-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 24 sep. 2023 à 23:12
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
(14, 'La tech de nos jours', 'Mabiala Jean Paul', 'Makosso Paul', '2023-09-24 10:25:56', '2023-09-24 10:25:56', 'pdfs/1695551156.pdf', 'RESOUSRCE HUMAINES', 1, 17, NULL, 1);

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
(1, 25, '2023-09-24 10:27:33', '2023-09-24 08:27:33');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mantele', 'mantele@gmail.com', NULL, '$2y$10$8rHZCXGJ6ikx4Ki17UtLZOhJvBkaUUI5ha9r.CUWXTbZ72JJpkBUu', NULL, '2023-07-28 20:54:17', '2023-07-28 20:54:17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annees`
--
ALTER TABLE `annees`
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
-- Index pour la table `tels`
--
ALTER TABLE `tels`
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
-- AUTO_INCREMENT pour la table `annees`
--
ALTER TABLE `annees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fichiers`
--
ALTER TABLE `fichiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT pour la table `tels`
--
ALTER TABLE `tels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
