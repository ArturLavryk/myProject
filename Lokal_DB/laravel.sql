-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Lip 2019, 19:09
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `laravel`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `canteens`
--

CREATE TABLE `canteens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `canteens`
--

INSERT INTO `canteens` (`id`, `name`, `adress`, `city`, `post_code`, `created_at`, `updated_at`) VALUES
(1, 'WSPA', 'zwiazkowa', 'Lublin', '50321', '2019-03-28', '2019-03-28 14:43:55'),
(3, 'Szkola 10', 'publiczna', 'Lublin', '65412', '2019-03-28', '2019-03-28 15:47:18'),
(4, 'Gimnazium', 'fryzerów', 'Lublin', '45894', '2019-03-28', '2019-03-28 15:47:46');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `canteen_meals`
--

CREATE TABLE `canteen_meals` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_canteen` int(11) NOT NULL,
  `id_meals` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `canteen_meals`
--

INSERT INTO `canteen_meals` (`id`, `id_canteen`, `id_meals`, `created_at`, `updated_at`) VALUES
(2, 3, 2, '2019-03-28 14:48:26', '2019-03-28 14:48:26'),
(3, 1, 1, '2019-03-29 09:11:35', '2019-03-29 09:11:35'),
(5, 1, 3, '2019-03-29 09:11:35', '2019-03-29 09:11:35'),
(6, 1, 4, '2019-03-29 09:11:35', '2019-03-29 09:11:35'),
(10, 1, 2, '2019-04-04 09:54:30', '2019-04-04 09:54:30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meal_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `meal_id`, `created_at`, `updated_at`) VALUES
(1, 'kaka', 1, '2019-03-28 13:45:47', '2019-03-28 13:45:47'),
(2, 'Artur', 1, '2019-03-28 13:45:51', '2019-03-28 13:45:51'),
(3, 'asdasdas', 1, '2019-03-28 13:45:54', '2019-03-28 13:45:54');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `meals`
--

CREATE TABLE `meals` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `meals`
--

INSERT INTO `meals` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Gimnazium', 'dasdassadas', 15.00, '2019-03-28 13:51:34', '2019-03-28 13:51:34'),
(2, 'AAAAAAAAA', 'dfgdfgdfgd', 20.00, '2019-03-28 13:53:03', '2019-03-28 13:53:03'),
(3, 'WSPA', 'Kakula', 12.00, '2019-03-28 13:53:39', '2019-03-28 13:53:39'),
(4, 'meal', 'meal', 42.00, '2019-03-29 09:09:40', '2019-03-29 09:09:40'),
(7, 'myMeal', 'meal', 15.00, '2019-04-11 11:05:38', '2019-04-11 11:05:38');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `meal_ingredients`
--

CREATE TABLE `meal_ingredients` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_meal` int(11) NOT NULL,
  `id_ingredients` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `meal_ingredients`
--

INSERT INTO `meal_ingredients` (`id`, `id_meal`, `id_ingredients`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-03-28 13:51:34', '2019-03-28 13:51:34'),
(2, 2, 2, '2019-03-28 13:53:03', '2019-03-28 13:53:03'),
(3, 3, 3, '2019-03-28 13:53:39', '2019-03-28 13:53:39'),
(4, 4, 1, '2019-03-29 09:09:40', '2019-03-29 09:09:40'),
(5, 4, 2, '2019-03-29 09:09:40', '2019-03-29 09:09:40'),
(6, 4, 3, '2019-03-29 09:09:41', '2019-03-29 09:09:41'),
(7, 5, 2, '2019-04-11 10:52:28', '2019-04-11 10:52:28'),
(8, 7, 1, '2019-04-11 11:05:38', '2019-04-11 11:05:38'),
(9, 7, 3, '2019-04-11 11:05:38', '2019-04-11 11:05:38');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `meal_orders`
--

CREATE TABLE `meal_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_meal` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_meal_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `meal_orders`
--

INSERT INTO `meal_orders` (`id`, `id_meal`, `id_order`, `id_meal_order`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, '2019-03-30 20:36:50', '2019-03-30 20:36:50'),
(2, 2, 2, NULL, '2019-03-30 20:36:50', '2019-03-30 20:36:50'),
(3, 1, 3, NULL, '2019-04-04 09:57:02', '2019-04-04 09:57:02'),
(4, 3, 3, NULL, '2019-04-04 09:57:02', '2019-04-04 09:57:02'),
(5, 2, 3, NULL, '2019-04-04 09:57:02', '2019-04-04 09:57:02'),
(6, 4, 4, NULL, '2019-04-06 11:10:03', '2019-04-06 11:10:03'),
(7, 2, 4, NULL, '2019-04-06 11:10:03', '2019-04-06 11:10:03'),
(8, 4, 7, NULL, '2019-05-09 08:35:10', '2019-05-09 08:35:10'),
(9, 2, 7, NULL, '2019-05-09 08:35:10', '2019-05-09 08:35:10'),
(10, 4, 8, NULL, '2019-05-09 08:35:45', '2019-05-09 08:35:45'),
(11, 2, 8, NULL, '2019-05-09 08:35:45', '2019-05-09 08:35:45'),
(12, 4, 9, NULL, '2019-05-09 08:39:37', '2019-05-09 08:39:37'),
(13, 2, 9, NULL, '2019-05-09 08:39:37', '2019-05-09 08:39:37'),
(22, 1, 14, NULL, '2019-05-09 09:00:24', '2019-05-09 09:00:24'),
(23, 3, 14, NULL, '2019-05-09 09:00:24', '2019-05-09 09:00:24'),
(24, 4, 14, NULL, '2019-05-09 09:00:24', '2019-05-09 09:00:24'),
(25, 2, 14, NULL, '2019-05-09 09:00:24', '2019-05-09 09:00:24');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_25_131502_create_canteens_table', 1),
(4, '2019_03_01_114243_create_meals_table', 1),
(5, '2019_03_03_132201_canteen_updated_at', 1),
(6, '2019_03_17_105032_create_meal_orders_table', 1),
(7, '2019_03_17_112117_create_orders_table', 1),
(8, '2019_03_17_112433_create_ingredients_table', 1),
(9, '2019_03_17_112635_create_meal_ingredients_table', 1),
(10, '2019_03_17_112802_create_options_table', 1),
(11, '2019_03_23_123403_create_canteen_meals_table', 1),
(12, '2019_03_28_122712_create_order_options_table', 1),
(13, '2019_03_30_204209_order_updated_at', 2),
(14, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(15, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(16, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(17, '2016_06_01_000004_create_oauth_clients_table', 3),
(18, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
(19, '2019_04_11_124542_meals_drop_column_table', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `price` double(3,2) NOT NULL,
  `id_meal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `options`
--

INSERT INTO `options` (`id`, `name`, `weight`, `price`, `id_meal`, `created_at`, `updated_at`) VALUES
(1, 'sok', 50, 3.00, 1, '2019-03-28 13:57:52', '2019-03-28 13:57:52'),
(2, 'sok jabkowy', 100, 5.00, 1, '2019-03-28 13:59:25', '2019-03-28 13:59:25'),
(3, 'sos', 30, 3.00, 1, '2019-03-28 13:59:49', '2019-03-28 13:59:49');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_canteen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id`, `id_canteen`, `id_user`, `time`, `created_at`, `updated_at`, `status`) VALUES
(2, 1, 1, '02:50:00', '2019-03-30 20:36:50', '2019-06-29 17:48:19', 1),
(3, 1, 1, '20:15:00', '2019-04-04 09:57:02', '2019-04-04 09:57:02', 2),
(4, 1, 1, '23:01:00', '2019-04-06 11:10:03', '2019-05-22 08:07:47', 2),
(9, 1, 1, '05:55:00', '2019-05-09 08:39:37', '2019-05-22 08:07:42', 2),
(14, 1, 1, '12:15:00', '2019-05-09 09:00:24', '2019-05-22 08:07:28', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_options`
--

CREATE TABLE `order_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_options` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `order_options`
--

INSERT INTO `order_options` (`id`, `id_order`, `id_options`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2019-03-30 20:36:50', '2019-03-30 20:36:50'),
(2, 2, 2, '2019-03-30 20:36:50', '2019-03-30 20:36:50'),
(3, 2, 3, '2019-03-30 20:36:50', '2019-03-30 20:36:50'),
(4, 3, 1, '2019-04-04 09:57:03', '2019-04-04 09:57:03'),
(5, 3, 2, '2019-04-04 09:57:03', '2019-04-04 09:57:03'),
(6, 4, 1, '2019-04-06 11:10:03', '2019-04-06 11:10:03'),
(7, 4, 3, '2019-04-06 11:10:03', '2019-04-06 11:10:03'),
(8, 8, 2, '2019-05-09 08:35:45', '2019-05-09 08:35:45'),
(9, 9, 2, '2019-05-09 08:39:37', '2019-05-09 08:39:37'),
(17, 14, 1, '2019-05-09 09:00:24', '2019-05-09 09:00:24'),
(18, 14, 2, '2019-05-09 09:00:24', '2019-05-09 09:00:24'),
(19, 14, 3, '2019-05-09 09:00:24', '2019-05-09 09:00:24');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$HYHnoGlZlBixcOdrx6jLsu9dxzgV5dxwVKGNKKlc/.VkrmzlJJ0KK', 'iD55NlZ0IQlUAqzxeMU9RAQBsZgKOTQr9gBOGMrk3ksIu4rFqWguooaNS6da', '2019-03-28 13:43:42', '2019-03-28 13:43:42');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `canteens`
--
ALTER TABLE `canteens`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `canteen_meals`
--
ALTER TABLE `canteen_meals`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `meal_ingredients`
--
ALTER TABLE `meal_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `meal_orders`
--
ALTER TABLE `meal_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeksy dla tabeli `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeksy dla tabeli `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indeksy dla tabeli `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeksy dla tabeli `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `order_options`
--
ALTER TABLE `order_options`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `canteens`
--
ALTER TABLE `canteens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `canteen_meals`
--
ALTER TABLE `canteen_meals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `meal_ingredients`
--
ALTER TABLE `meal_ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `meal_orders`
--
ALTER TABLE `meal_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `order_options`
--
ALTER TABLE `order_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
