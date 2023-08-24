-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 02:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcodeblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$6G7JKdZfSOuviBWFIvQ1RuDHKIvH1jic785HkeCQvR3qefKUkRsaS', '2023-08-23 20:19:40'),
(3, 'admin0', 'admin0@gmail.com', '$2y$10$Eda4aRZmY7uOfgbDdYDwqexqAcCSERxlAksvHugTxhEkJ7B.mc01m', '2023-08-24 09:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'food', '2023-08-22 12:59:17'),
(2, 'business', '2023-08-22 13:00:26'),
(3, 'travel', '2023-08-22 12:59:17'),
(4, 'tech', '2023-08-22 12:59:17'),
(5, 'politics', '2023-08-22 12:59:17'),
(6, 'culture', '2023-08-22 12:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `user_name`, `post_id`, `created_at`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur, adipiscing elit integer fringilla ligula hac, tristique accumsan porta penatibus. Ridiculus lectus ac morbi torquent massa litora condimentum conubia libero at convallis interdum tristique ornare curae, sociosqu rut', 1, 'Maher Ben Rhouma', 1, '2023-08-22 12:59:17'),
(2, 'nynepeorem ipsum dolor sit amet consectetur, adipiscing elit integer fringilla ligula hac, tristique accumsan porta penatibus. Ridiculus lectus ac morbi torquent massa litora condimentum conubia libero at convallis interdum tristique ornare curae, sociosq', 2, 'Ahmed', 1, '2023-08-22 12:59:17'),
(3, 'is semper, velit hac aliquet nam malesuada proin fames habitasse ornare. Sollicitudin mattis quis ultricies magna condimentum eleifend primis placerat suscipit, integer id proin rhoncus sem mi nam hac, etiam cum odio tristique urna in enim tortor. Porttit', 1, 'Salah swileh', 2, '2023-08-22 12:59:17'),
(4, 'Urna magnis non integer ac per tellus porttitor, neque nam duis hendrerit justo mattis commodo vulputate, velit libero convallis risus malesuada nisi', 1, 'maher', 6, '2023-08-22 19:10:29'),
(5, 'this is wonderful really wow', 1, 'maher', 6, '2023-08-22 19:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_22_081101_crate_posts_table', 2),
(7, '2023_08_22_082329_sfsdf', 3),
(8, '2023_08_22_082942_add_image_column', 4),
(9, '2023_08_22_133631_add_columns_to_user_table', 5),
(10, '2023_08_22_134132_modify_column_posts_table', 6),
(11, '2023_08_22_134955_add_foreign', 7),
(12, '2023_08_22_145112_create_categories_table', 8),
(13, '2023_08_22_154435_crate_comments_table', 9),
(14, '2023_08_22_162025_create_somthing', 10),
(15, '2023_08_22_162332_add_forein_key', 11),
(16, '2023_08_23_192145_create_admins_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `description`, `category`, `user_id`, `user_name`, `created_at`) VALUES
(1, 'Why is my internet so slow?', 'hero_2.jpg', 'Temporibus quo dolore veritatis doloribus delectus dolores perspiciatis recusandae ducimus, nisi quod, incidunt ut quaerat, magnam cupiditate. Aut, laboriosam magnam, nobis dolore fugiat impedit necessitatibus nisi cupiditate, quas repellat itaque molestias sit libero voluptas eveniet omnis illo ullam dolorem minima.\n\nPorro amet accusantium libero fugit totam, deserunt ipsa, dolorem, vero expedita illo similique saepe nisi deleniti. Cumque, laboriosam, porro! Facilis voluptatem sequi nulla quidem, provident eius quos pariatur maxime sapiente illo nostrum quibusdam aliquid fugiat! Earum quod fuga id officia. Temporibus quo dolore veritatis doloribus delectus dolores perspiciatis recusandae ducimus, nisi quod, incidunt ut quaerat, magnam cupiditate. Aut, laboriosam magnam, nobis dolore fugiat impedit necessitatibus nisi cupiditate, quas repellat itaque molestias sit libero voluptas eveniet omnis illo ullam dolorem minima.\n\nPorro amet accusantium libero fugit totam, deserunt ipsa, dolorem, vero expedita illo similique saepe nisi deleniti. Cumque, laboriosam, porro! Facilis voluptatem sequi nulla quidem, provident eius quos pariatur maxime sapiente illo nostrum quibusdam aliquid fugiat! Earum quod fuga id officia.Temporibus quo dolore veritatis doloribus delectus dolores perspiciatis recusandae ducimus, nisi quod, incidunt ut quaerat, magnam cupiditate. Aut, laboriosam magnam, nobis dolore fugiat impedit necessitatibus nisi cupiditate, quas repellat itaque molestias sit libero voluptas eveniet omnis illo ullam dolorem minima.\n\nPorro amet accusantium libero fugit totam, deserunt ipsa, dolorem, vero expedita illo similique saepe nisi deleniti. Cumque, laboriosam, porro! Facilis voluptatem sequi nulla quidem, provident eius quos pariatur maxime sapiente illo nostrum quibusdam aliquid fugiat! Earum quod fuga id officia.Temporibus quo dolore veritatis doloribus delectus dolores perspiciatis recusandae ducimus, nisi quod, incidunt ut quaerat, magnam cupiditate. Aut, laboriosam magnam, nobis dolore fugiat impedit necessitatibus nisi cupiditate, quas repellat itaque molestias sit libero voluptas eveniet omnis illo ullam dolorem minima.\n\nPorro amet accusantium libero fugit totam, deserunt ipsa, dolorem, vero expedita illo similique saepe nisi deleniti. Cumque, laboriosam, porro! Facilis voluptatem sequi nulla quidem, provident eius quos pariatur maxime sapiente illo nostrum quibusdam aliquid fugiat! Earum quod fuga id officia.', 'travel', 1, 'Maher', '2023-08-22 08:39:05'),
(2, 'Don’t assume your user data in the cloud is safe', 'hero_1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium nam quas inventore, ut iure iste modi eos adipisci ad ea itaque labore earum autem nobis et numquam, minima eius. Nam eius, non unde ut aut sunt eveniet rerum repellendus porro.\r\n\r\nSint ab voluptates itaque, ipsum porro qui obcaecati cumque quas sit vel. Voluptatum provident id quis quo. Eveniet maiores perferendis officia veniam est laborum, expedita fuga doloribus natus repellendus dolorem ab similique sint eius cupiditate necessitatibus, magni nesciunt ex eos.\r\n\r\nQuis eius aspernatur, eaque culpa cumque reiciendis, nobis at earum assumenda similique ut? Aperiam vel aut, ex exercitationem eos consequuntur eaque culpa totam, deserunt, aspernatur quae eveniet hic provident ullam tempora error repudiandae sapiente illum rerum itaque voluptatem. Commodi, sequi.\r\n\r\nQuibusdam autem, quas molestias recusandae aperiam molestiae modi qui ipsam vel. Placeat tenetur veritatis tempore quos impedit dicta, error autem, quae sint inventore ipsa quidem. Quo voluptate quisquam reiciendis, minus, animi minima eum officia doloremque repellat eos, odio doloribus cum.', 'Tech', 1, 'Maher Ben Rhouma', '2023-08-22 08:22:27'),
(4, 'Startup vs corporate: What job suits you best?', 'hero_3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit nam, habitant quisque per maecenas inceptos cubilia dui tincidunt, dictum augue suscipit nisl cum taciti tempus. Eu potenti cum nibh a velit erat nam iaculis, suspendisse maecenas mi mollis mauris habitasse tempus morbi, netus nisl aliquam tristique at vehicula aliquet. Nec eu commodo sollicitudin tempor cum at id ridiculus, natoque elementum cras metus rutrum pellentesque molestie aliquet, leo senectus diam sed nibh non penatibus.\r\n\r\nSemper orci eros vel turpis velit pellentesque vehicula, nisi blandit congue hendrerit nostra tempor. Condimentum accumsan nibh in mauris mollis posuere etiam et, lobortis elementum risus integer nisi porttitor molestie, luctus at tellus ullamcorper vivamus praesent dictum. Eros suscipit condimentum vitae quisque risus, sapien pharetra dignissim.', 'culture', 1, 'Maher Ben Rhouma', '2023-08-22 08:58:44'),
(6, 'Lorem ipsum dolor sit amet consectetur adipiscing elit vehicula, arcu lectus euismod egestas', 'hero_5.jpg', 'usce magnis tempor cum libero volutpat nam, aliquam id eu natoque a vulputate ad nullam rutrum, ligula fringilla quam mi metus varius vivamus.', 'travel', 1, 'Maher Ben Rhouma', '2023-08-22 08:58:44'),
(7, 'Startup vs corporate: What job suits you best', 'hero_6-1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit nam, habitant quisque. \r\neetiam, cras varius diam', 'business', 1, 'Maher Ben Rhouma', '2023-08-22 08:58:44'),
(8, 'Pellentesque primis mi facilisi ultricies eros', 'hero_4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit egestas, potenti convallis consequat velit nullam morbi quis feugiat magnis, molestie habitasse mus ullamcorper ', 'culture', 2, 'Maher Ben Rhouma', '2023-08-22 10:43:02'),
(9, 'as, vitae mus dapibus tristique duis nisl ', 'hero_5.jpg', 'Libero inceptos dictumst hac convallis aptent rhoncus nam sociis ridiculus tortor nibh magna dui, est per nisl primis gravida', 'culture', 1, 'Maher Ben Rhouma', '2023-08-22 10:43:02'),
(10, 'The future of AI', 'hero_1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit facilisis, feugiat augue tempor sed ante phasellus cursus, justo suscipit nostra proin fermentum netus inceptos. Class ac fusce nec sodales aenean commodo metus venenatis praesent ligula', 'politics', 1, 'Maher Ben Rhouma', '2023-08-22 10:57:10'),
(12, 'amet consectetur adipiscing elit, aliquet imperdiet eleifend', 'hero_5.jpg', 'torquent nisi suspendisse phasellus donec odio lobortis imperdiet maecenas lacus scelerisque conubia. Malesuada luctus vehicula purus aliquet dignissim placerat posuere eros, a odio praesent accumsan', 'travel', 2, 'Maher Ben Rhouma', '2023-08-22 11:39:43'),
(13, 'odio arcu, consequat nostra tellus fames interdum magna litora', 'hero_4.jpg', 'vehicula mauris sociosqu dictum interdum dis. Eget leo magna consequat per feugiat semper risus, torquent habitant nascetur vitae fringilla fames ut, penatibus venenatis dignissim a nisi scelerisque', 'travel', 1, 'Maher Ben Rhouma', '2023-08-22 11:39:43'),
(14, 'e sagittis vestibulum elementum', 'hero_7.jpg', 'tus urna aliquet tristique primis pretium aptent, mattis cubilia libero rhoncus senectus praesent curabitur, imperdiet vulputate cras volutpat feugiat est. Tellus luctus aenean porta sociis proin ad posuere ornare, sociosqu', 'travel', 1, 'maher', '2023-08-22 22:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pic.jpg',
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no bio yet',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `bio`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'maher', 'pic.jpg', 'hey there i\'m maher', 'maherbenrhoumaa@gmail.com', NULL, '$2y$10$6G7JKdZfSOuviBWFIvQ1RuDHKIvH1jic785HkeCQvR3qefKUkRsaS', NULL, '2023-08-21 13:20:09', '2023-08-23 10:15:00'),
(2, 'ahmed', 'pic.jpg', 'no bio yet', 'maherbenrhoumaaa@gmail.com', NULL, '$2y$10$34.FUxsDsrAP7TKS0DyHn.1OvnydU/tMxhtOkiuwJrwzcX..GjpV2', NULL, '2023-08-21 14:24:25', '2023-08-21 14:24:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
