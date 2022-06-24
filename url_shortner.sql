-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 09:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `url_shortner`
--

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
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_url` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcode` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashvalue` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `protocol` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `originalurl` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `safe` tinyint(1) NOT NULL DEFAULT 0,
  `safe_api_response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`safe_api_response`)),
  `last_check` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `short_url`, `shortcode`, `hashvalue`, `protocol`, `originalurl`, `safe`, `safe_api_response`, `last_check`, `created_at`, `updated_at`) VALUES
(48, 'http://localhost:8000/a0001C', 'a0001C', '$2y$10$rmfoa52zjCOmt/w16vDJ..GttVfMT69uyP.t8HX9WnCQlOFlXgjKO', 'https://', 'isho.com', 1, '[]', '2022-06-24 01:37:59', '2022-06-21 10:52:19', '2022-06-24 01:38:00'),
(49, 'http://localhost:8000/a0001d', 'a0001d', '$2y$10$Ullbapy5n9fPkgymdx1kRupBgt.xvAgob9UUu4mEg/lA64dNC.vgG', 'https://', 'isho.com/palermo', 1, '[]', '2022-06-23 21:23:48', '2022-06-21 10:52:28', '2022-06-23 21:23:48'),
(50, 'http://localhost:8000/a0001E', 'a0001E', '$2y$10$x1ghcBjis5WKBxOsfuKThuYwRWJ.MQoIF0zY8A5g0Lai7/.J30/6.', 'https://', 'vuejs.org/guide/components/props.html#prop-validation', 1, NULL, '2022-06-22 00:14:16', '2022-06-21 18:14:16', '2022-06-21 18:14:16'),
(51, 'http://localhost:8000/a0001F', 'a0001F', '$2y$10$K7qwl3rzlx7waMnQbMjtd.SBI68ro54B4BgxIYHOq28BUX90FGBEW', 'https://www.', 'linkedin.com/feed/', 1, NULL, '2022-06-22 00:14:58', '2022-06-21 18:14:58', '2022-06-21 18:14:58'),
(52, 'http://localhost:8000/a0001g', 'a0001g', '$2y$10$jrgWaidOfoBMkE0WzfMd6uvRO2XmArgCMI00GoRp9F8P.THNUr6Bq', 'https://', 'stackoverflow.com/users/edit/1469778', 1, NULL, '2022-06-22 00:20:44', '2022-06-21 18:20:44', '2022-06-21 18:20:44'),
(53, 'http://localhost:8000/a0001H', 'a0001H', '$2y$10$SAJy1374xe5aSU/RU/DK6uQaGOUBEit.GGoUx3OccyfRK75pirl6W', 'https://', 'rapidtags.io/generator', 1, NULL, '2022-06-22 01:32:58', '2022-06-21 19:32:58', '2022-06-21 19:32:59'),
(54, 'http://localhost:8000/a0001i', 'a0001i', '$2y$10$Bpc.7DJkIqpf92XTLcVHP.IY1Nt7tYhC6RPYbkcGwX1wQCK9dTkq.', 'https://', 'ishodesignstudio.com', 1, NULL, '2022-06-22 05:36:05', '2022-06-21 23:36:05', '2022-06-21 23:36:05'),
(55, 'http://localhost:8000/a0001J', 'a0001J', '$2y$10$UPrDMv1R7iT57ChOfqNMk.AHOyGRO3ZpCmK3cRydsIeV30l38mDwe', 'https://', 'facebook.com', 1, NULL, '2022-06-22 05:37:48', '2022-06-21 23:37:48', '2022-06-21 23:37:48'),
(56, 'http://localhost:8000/a0001k', 'a0001k', '$2y$10$skaJdmC591.wfnLDToSUterEj1wQ7NGLHR1CkmyawUZqJBq4xJ112', 'https://', 'laravel.com', 1, NULL, '2022-06-22 05:38:19', '2022-06-21 23:38:19', '2022-06-21 23:38:19'),
(57, 'http://localhost:8000/a0001L', 'a0001L', '$2y$10$fSDk6rUvQ3n5DLJdBlEQ/.sKATgpuiu9EUQ16ZBQUkRkXMb2TGg16', 'http://', 'yahoo.com', 1, NULL, '2022-06-22 07:25:14', '2022-06-22 01:25:14', '2022-06-22 01:25:14'),
(58, 'http://localhost:8000/a0001m', 'a0001m', '$2y$10$uoICqtqJv/VRVpLUz9/xaeRAEDGpURawtc580cAFFDUSEolPmrh4y', 'https://', 'isho.com/', 1, NULL, '2022-06-22 07:34:26', '2022-06-22 01:34:26', '2022-06-22 01:34:26'),
(59, 'http://localhost:8000/a0001N', 'a0001N', '$2y$10$kCHgiP6V3dVvBnDTlrGYCuJqvNfTO8eSRcF.Ftjj2Ccbe2EO9cUDq', 'https://www.', 'dictionary.cambridge.org/', 1, NULL, '2022-06-22 07:37:19', '2022-06-22 01:37:19', '2022-06-22 01:37:20'),
(60, 'http://localhost:8000/a0001o', 'a0001o', '$2y$10$nTVOYf0d6CUz2AmknpjLI.L4vXnCdWunLQDHCzyzFS./vwTcTbjPG', 'https://', 'dictionary.cambridge.org/dictionary/english/brilliant', 1, NULL, '2022-06-22 07:39:36', '2022-06-22 01:39:36', '2022-06-22 01:39:36'),
(61, 'http://localhost:8000/a0001P', 'a0001P', '$2y$10$J/DK5vB/uhpJZ1FSOwQj9O.QEHUTfosTpfaVQpv3mN93gpDUOIUVS', 'http://', 'bdd-engineers.com/', 1, NULL, '2022-06-22 07:40:13', '2022-06-22 01:40:13', '2022-06-22 01:40:13'),
(62, 'http://localhost:8000/a0001q', 'a0001q', '$2y$10$oEw3.Mk7raRifx1hACHo.eqSeIdKValpWIfZUXTrd4O/LTtkoq7Hq', 'https://', 'stackoverflow.com/questions/64105088/vue-3-composition-api-data-function', 1, NULL, '2022-06-22 09:50:25', '2022-06-22 03:50:25', '2022-06-22 03:50:25'),
(63, 'http://localhost:8000/a0001R', 'a0001R', '$2y$10$saRjuZ4ghwDbFTyjr2O/Se3Yzq8.2RUraLsYeMh8Qgt6wuJU7rlFy', 'https://', 'mail.google.com/mail/u/0/', 1, NULL, '2022-06-22 10:50:49', '2022-06-22 04:50:49', '2022-06-22 04:50:49'),
(64, 'http://localhost:8000/a0001s', 'a0001s', '$2y$10$h2itCH81UIVz7OxxgwT2FutPlC35M7z7Xpxf2Xmw4RcuKw7vSNYGS', 'https://www.', 'amazon.com', 1, NULL, '2022-06-22 11:46:38', '2022-06-22 05:46:38', '2022-06-22 05:46:38'),
(65, 'http://localhost:8000/a0001T', 'a0001T', '$2y$10$uWjqtPYL.RKSySDElK4TC.Qq9LaVPQC88KXaaely8C14eblUazB6m', 'https://www.', 'amazon.com/b?node=16225007011&pf_rd_r=v1cd45mw6dsywqqf5n0f&pf_rd_p=e5b0c85f-569c-4c90-a58f-0c0a260e45a0&pd_rd_r=f80058fd-57f1-4f55-a646-759555fd0d26&pd_rd_w=crao7&pd_rd_wg=f4hdh&ref_=pd_gw_unk', 1, NULL, '2022-06-22 11:56:27', '2022-06-22 05:56:27', '2022-06-22 05:56:27'),
(66, 'http://localhost:8000/a0001u', 'a0001u', '$2y$10$B.vdtSZlQVsFreEN6BbzB.NnEMNq4mSUS.3a5VPllST/jgE7Yag8y', 'https://www.', 'google.com/doodles', 1, NULL, '2022-06-22 11:59:57', '2022-06-22 05:59:57', '2022-06-22 05:59:58'),
(68, 'http://localhost:8000/a0001w', 'a0001w', '$2y$10$GjBVWO45C/o.ac.dvEKyWewnYCdkxYTtT.UBEifoM4nqtZTYvcbXm', 'https://www.', 'rokomari.com/book', 1, NULL, '2022-06-22 14:33:45', '2022-06-22 08:33:45', '2022-06-22 08:33:45'),
(69, 'http://localhost:8000/a0001X', 'a0001X', '$2y$10$5yYLmxwKvt/M4HVdv4TmC.a8tsKQEYpiCAqz9tuhb1TXC.SyNwNRa', 'https://', 'quantummethod.org', 1, NULL, '2022-06-22 14:44:11', '2022-06-22 08:44:11', '2022-06-22 08:44:12'),
(70, 'http://localhost:8000/a0001y', 'a0001y', '$2y$10$eBsdfIQ0TlbTlaSRHrXXWuYVoRPLtwxqAwvZnnsQvmNrnkitX5vKi', 'https://', 'gitlab.com/', 1, NULL, '2022-06-22 14:45:40', '2022-06-22 08:45:40', '2022-06-22 08:45:40'),
(71, 'http://localhost:8000/a0001Z', 'a0001Z', '$2y$10$ir/ec61Po7K8Q/vJhn.kJe4bx8fjGCIaCOk.JaRVGbIJyoqClZHPS', 'https://www.', 'msn.com', 1, NULL, '2022-06-22 15:18:01', '2022-06-22 09:18:01', '2022-06-22 09:18:01'),
(75, 'http://localhost:8000/a00023', 'a00023', '$2y$10$/cjIEOZ0nLHcqf5t8/JbduJN1I33xexuwAFt7IC9h4BqFgSVVNt8e', 'https://', 'en.wikipedia.org/wiki/dhaka', 1, NULL, '2022-06-23 07:36:37', '2022-06-23 01:36:37', '2022-06-23 01:36:37'),
(77, 'http://localhost:8000/a00025', 'a00025', '$2y$10$9/6lGEBaIshxIx/UkjKav.YIGZ6f3eTIeo1SpnovVjWWYJzSvZv3O', 'https://', 'v2.vuejs.org/v2/guide/conditional.html', 1, NULL, '2022-06-23 08:18:13', '2022-06-23 02:18:13', '2022-06-23 02:18:14'),
(83, 'http://localhost:8000/a0002b', 'a0002b', '$2y$10$I8LRSevA5lcn6M4NdzUiC.Nu0Z9DgZ4CEjsm1wMhDeA8fkoca5Do6', 'https://www.', 'w3schools.com/', 1, NULL, '2022-06-23 11:58:31', '2022-06-23 05:58:31', '2022-06-23 05:58:31'),
(86, 'http://localhost:8000/a0002E', 'a0002E', '$2y$10$NSKw/62YBbJAUTFNcVIP4eQlYZvIaBqvttU2sIzG1iqbta6F2wTMm', 'https://www.', 'w3schools.com/tags/default.asp', 1, NULL, '2022-06-23 12:04:15', '2022-06-23 06:04:15', '2022-06-23 06:04:15'),
(87, 'http://localhost:8000/a0002F', 'a0002F', '$2y$10$rFNxtN02oqPUThw4KjTcFO1E.wnhqLib3j2r5x1jSOXCkCHT1Yo5i', 'http://', 'bdd-engineers.com', 1, '[]', '2022-06-23 20:52:56', '2022-06-23 11:04:06', '2022-06-23 20:52:56'),
(93, 'http://localhost:8000/a0002L', 'a0002L', '$2y$10$.F6UKK5BW.SrHv/i./CG9.NhipkDD9S./x1FFyP9kLsj9hiBbbd9K', 'https://', 'testsafebrowsing.appspot.com/s/phishing.html', 0, '{\"matches\":[{\"threatType\":\"SOCIAL_ENGINEERING\",\"platformType\":\"ANY_PLATFORM\",\"threat\":{\"url\":\"http:\\/\\/testsafebrowsing.appspot.com\\/s\\/phishing.html\"},\"cacheDuration\":\"300s\",\"threatEntryType\":\"URL\"},{\"threatType\":\"SOCIAL_ENGINEERING\",\"platformType\":\"WINDOWS\",\"threat\":{\"url\":\"http:\\/\\/testsafebrowsing.appspot.com\\/s\\/phishing.html\"},\"cacheDuration\":\"300s\",\"threatEntryType\":\"URL\"},{\"threatType\":\"SOCIAL_ENGINEERING\",\"platformType\":\"LINUX\",\"threat\":{\"url\":\"http:\\/\\/testsafebrowsing.appspot.com\\/s\\/phishing.html\"},\"cacheDuration\":\"300s\",\"threatEntryType\":\"URL\"},{\"threatType\":\"SOCIAL_ENGINEERING\",\"platformType\":\"OSX\",\"threat\":{\"url\":\"http:\\/\\/testsafebrowsing.appspot.com\\/s\\/phishing.html\"},\"cacheDuration\":\"300s\",\"threatEntryType\":\"URL\"},{\"threatType\":\"SOCIAL_ENGINEERING\",\"platformType\":\"OSX\",\"threat\":{\"url\":\"http:\\/\\/testsafebrowsing.appspot.com\\/s\\/phishing.html\"},\"cacheDuration\":\"300s\",\"threatEntryType\":\"URL\"},{\"threatType\":\"SOCIAL_ENGINEERING\",\"platformType\":\"CHROME\",\"threat\":{\"url\":\"http:\\/\\/testsafebrowsing.appspot.com\\/s\\/phishing.html\"},\"cacheDuration\":\"300s\",\"threatEntryType\":\"URL\"},{\"threatType\":\"SOCIAL_ENGINEERING\",\"platformType\":\"ANDROID\",\"threat\":{\"url\":\"http:\\/\\/testsafebrowsing.appspot.com\\/s\\/phishing.html\"},\"cacheDuration\":\"300s\",\"threatEntryType\":\"URL\"},{\"threatType\":\"SOCIAL_ENGINEERING\",\"platformType\":\"IOS\",\"threat\":{\"url\":\"http:\\/\\/testsafebrowsing.appspot.com\\/s\\/phishing.html\"},\"cacheDuration\":\"300s\",\"threatEntryType\":\"URL\"}]}', '2022-06-23 23:57:07', '2022-06-23 21:18:00', '2022-06-23 23:57:13'),
(94, 'http://localhost:8000/a0002m', 'a0002m', '$2y$10$nNk6LuYrmrOdvxbKpEW0IuVzBed8et4A2CrcqSL/alBSCCYSgEz0C', 'https://', 'blog.logrocket.com/', 1, '{}\n', '2022-06-24 01:02:55', '2022-06-24 01:02:55', '2022-06-24 01:02:56'),
(95, 'http://localhost:8000/a0002N', 'a0002N', '$2y$10$itMjpRhnGAL.mSooR7SU5eFhXMr17h.smAfidqFm75IYetf59lN5q', 'https://', 'blog.logrocket.com', 1, '{}\n', '2022-06-24 01:03:12', '2022-06-24 01:03:12', '2022-06-24 01:03:12'),
(96, 'http://localhost:8000/a0002o', 'a0002o', '$2y$10$dXXUjHrltZkU1pql3YnWDePnS9u9OajZqEVooN0fva1FJ9gf6rqGu', 'https://', 'stackoverflow.com/questions/32375531/preg-match-compilation-failed-character-value-in-x-or-o-is-too-large-a', 1, '{}\n', '2022-06-24 01:04:12', '2022-06-24 01:04:12', '2022-06-24 01:04:12'),
(97, 'http://localhost:8000/a0002P', 'a0002P', '$2y$10$2qg/7UxVD9fMB9CP7fuX0ua6imjxwwly3YRGFyNF6HEg7wzt6k5cy', 'https://www.', 'sadaqah-trust.org/issue.php?issue_id=202205270958334', 1, '{}\n', '2022-06-24 01:13:42', '2022-06-24 01:13:42', '2022-06-24 01:13:42'),
(98, 'http://localhost:8000/a0002q', 'a0002q', '$2y$10$tcfJqWC54RUeZjmw0aCKvOO3/xV89aX92Op9g.C7vMjAvKwPBa5wG', 'https://www.', 'w3schools.com/php/phptryit.asp?filename=tryphp_func_regex_preg_match', 1, '{}\n', '2022-06-24 01:26:41', '2022-06-24 01:26:41', '2022-06-24 01:26:41'),
(99, 'http://localhost:8000/a0002R', 'a0002R', '$2y$10$JVcN/K6PrKUXEKdHElklVug9dO7ppDPuKJ5NCf22LtJzb7X9dir9u', 'https://', 'developer.mozilla.org/en-us/docs/web/javascript/guide/regular_expressions/cheatsheet', 1, '{}\n', '2022-06-24 01:38:24', '2022-06-24 01:38:24', '2022-06-24 01:38:24'),
(100, 'http://localhost:8000/a0002s', 'a0002s', '$2y$10$UeIQEe63xw.84lm07tMmPO4iaulK8sYfuuCQzVZO3B8CWz1oy0sy.', 'http://', 'testsafebrowsing.appspot.com/s/unwanted.html', 0, '{\n  \"matches\": [\n    {\n      \"threatType\": \"UNWANTED_SOFTWARE\",\n      \"platformType\": \"ANY_PLATFORM\",\n      \"threat\": {\n        \"url\": \"http://testsafebrowsing.appspot.com/s/unwanted.html\"\n      },\n      \"cacheDuration\": \"300s\",\n      \"threatEntryType\": \"URL\"\n    },\n    {\n      \"threatType\": \"UNWANTED_SOFTWARE\",\n      \"platformType\": \"WINDOWS\",\n      \"threat\": {\n        \"url\": \"http://testsafebrowsing.appspot.com/s/unwanted.html\"\n      },\n      \"cacheDuration\": \"300s\",\n      \"threatEntryType\": \"URL\"\n    },\n    {\n      \"threatType\": \"UNWANTED_SOFTWARE\",\n      \"platformType\": \"LINUX\",\n      \"threat\": {\n        \"url\": \"http://testsafebrowsing.appspot.com/s/unwanted.html\"\n      },\n      \"cacheDuration\": \"300s\",\n      \"threatEntryType\": \"URL\"\n    },\n    {\n      \"threatType\": \"UNWANTED_SOFTWARE\",\n      \"platformType\": \"OSX\",\n      \"threat\": {\n        \"url\": \"http://testsafebrowsing.appspot.com/s/unwanted.html\"\n      },\n      \"cacheDuration\": \"300s\",\n      \"threatEntryType\": \"URL\"\n    },\n    {\n      \"threatType\": \"UNWANTED_SOFTWARE\",\n      \"platformType\": \"OSX\",\n      \"threat\": {\n        \"url\": \"http://testsafebrowsing.appspot.com/s/unwanted.html\"\n      },\n      \"cacheDuration\": \"300s\",\n      \"threatEntryType\": \"URL\"\n    },\n    {\n      \"threatType\": \"UNWANTED_SOFTWARE\",\n      \"platformType\": \"CHROME\",\n      \"threat\": {\n        \"url\": \"http://testsafebrowsing.appspot.com/s/unwanted.html\"\n      },\n      \"cacheDuration\": \"300s\",\n      \"threatEntryType\": \"URL\"\n    },\n    {\n      \"threatType\": \"UNWANTED_SOFTWARE\",\n      \"platformType\": \"ANDROID\",\n      \"threat\": {\n        \"url\": \"http://testsafebrowsing.appspot.com/s/unwanted.html\"\n      },\n      \"cacheDuration\": \"300s\",\n      \"threatEntryType\": \"URL\"\n    },\n    {\n      \"threatType\": \"UNWANTED_SOFTWARE\",\n      \"platformType\": \"IOS\",\n      \"threat\": {\n        \"url\": \"http://testsafebrowsing.appspot.com/s/unwanted.html\"\n      },\n      \"cacheDuration\": \"300s\",\n      \"threatEntryType\": \"URL\"\n    }\n  ]\n}\n', '2022-06-24 01:39:04', '2022-06-24 01:39:04', '2022-06-24 01:39:04');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_06_11_125422_create_links_table', 2);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `links_originalurl_unique` (`originalurl`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
