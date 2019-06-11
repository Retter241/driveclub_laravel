-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 22 2019 г., 22:04
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dimamlab`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blockers`
--

CREATE TABLE `blockers` (
  `id` int(10) UNSIGNED NOT NULL,
  `blockable_id` int(11) NOT NULL,
  `blockable_type` varchar(255) NOT NULL,
  `blocker_id` int(11) DEFAULT NULL,
  `blocker_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `alias`) VALUES
(1, 'Новости', '2019-03-29 05:09:14', '2019-04-19 03:58:04', 'novosti'),
(2, 'Автоспорт', '2019-03-29 05:21:57', '2019-04-19 03:58:31', 'avtosport'),
(4, 'Тест-драйв', '2019-03-29 08:25:20', '2019-04-19 03:58:49', 'test-drajv'),
(7, 'Происшествия', '2019-03-31 18:00:31', '2019-04-19 04:00:07', 'proisshestvija');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `parent_id` int(10) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `parent_id`, `body`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(11, 1, 0, 'front k 333', 25, 'App\\Post', '2019-04-01 01:50:20', '2019-04-01 01:50:20'),
(19, 1, 0, 'wc-12', 22, 'App\\Post', '2019-04-15 10:56:48', '2019-04-15 10:56:48'),
(20, 1, 0, 'wc-12', 22, 'App\\Post', '2019-04-15 10:56:49', '2019-04-15 10:56:49'),
(21, 1, 0, 'ой красота', 22, 'App\\Post', '2019-04-19 06:18:56', '2019-04-19 06:18:56'),
(22, 1, 0, 'хорошая тачка', 4, 'App\\Project', '2019-04-19 07:55:01', '2019-04-19 07:55:01'),
(23, 1, 0, 'gjgkj', 4, 'App\\Project', '2019-04-20 06:16:29', '2019-04-20 06:16:29'),
(24, 10, 0, 'ew', 4, 'App\\Project', '2019-04-21 07:30:47', '2019-04-21 07:30:47'),
(25, 1, 0, 'test-comment-news-1', 35, 'App\\Post', '2019-04-21 12:45:07', '2019-04-21 12:45:07');

-- --------------------------------------------------------

--
-- Структура таблицы `dashboards`
--

CREATE TABLE `dashboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `followable_id` int(11) NOT NULL,
  `followable_type` varchar(255) NOT NULL,
  `follower_id` int(11) DEFAULT NULL,
  `follower_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `followers`
--

INSERT INTO `followers` (`id`, `followable_id`, `followable_type`, `follower_id`, `follower_type`, `created_at`, `updated_at`) VALUES
(18, 10, 'App\\User', 1, 'App\\User', '2019-04-21 21:55:30', '2019-04-21 21:55:30'),
(20, 2, 'App\\User', 1, 'App\\User', '2019-04-22 15:41:52', '2019-04-22 15:41:52'),
(21, 1, 'App\\User', 7, 'App\\User', '2019-04-22 16:03:24', '2019-04-22 16:03:24');

-- --------------------------------------------------------

--
-- Структура таблицы `likeables`
--

CREATE TABLE `likeables` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `likeable_id` int(11) NOT NULL,
  `likeable_type` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likeables`
--

INSERT INTO `likeables` (`id`, `user_id`, `likeable_id`, `likeable_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'App\\Project', NULL, '2019-04-21 15:03:59', '2019-04-22 15:41:32'),
(2, 7, 5, 'App\\Project', NULL, '2019-04-21 15:04:52', '2019-04-21 22:00:24'),
(3, 7, 3, 'App\\Project', NULL, '2019-04-21 15:47:32', '2019-04-22 16:03:34'),
(4, 1, 3, 'App\\Project', '2019-04-22 16:02:09', '2019-04-22 16:01:20', '2019-04-22 16:02:09');

-- --------------------------------------------------------

--
-- Структура таблицы `likers`
--

CREATE TABLE `likers` (
  `id` int(10) UNSIGNED NOT NULL,
  `likeable_id` int(11) NOT NULL,
  `likeable_type` varchar(255) NOT NULL,
  `liker_id` int(11) DEFAULT NULL,
  `liker_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_24_181447_create_permission_tables', 1),
(4, '2019_03_24_183849_create_dashboards_table', 2),
(5, '2019_03_24_185052_add_sudo_users', 2),
(6, '2019_03_24_185945_addlevel_users', 3),
(7, '2019_03_24_190425_add_level_users', 4),
(8, '2019_03_24_191207_add_uniq_email_users', 5),
(9, '2019_03_24_205007_create_posts_table', 6),
(10, '2019_03_26_211353_change_uniq_alias_posta', 7),
(11, '2019_03_26_211421_change_uniq_alias_posts', 8),
(12, '2019_03_26_211657_add_normal_alias_posts', 9),
(13, '2019_03_27_221822_create_comments_table', 10),
(14, '2019_03_27_231157_delete_comment_stroke', 11),
(15, '2019_03_27_231221_delete_comment_strokes', 12),
(16, '2019_03_27_231358_create_normal_comment_table', 13),
(17, '2019_03_27_231719_create_normal_comment_tablev2', 14),
(18, '2019_03_28_202448_add_counter_posts', 15),
(19, '2019_03_28_202522_add_counter_posts_clean', 15),
(20, '2019_03_29_102956_create_categories_table', 16),
(21, '2019_03_29_105547_delete_keys_category', 17),
(22, '2019_03_29_105734_normal_categories_table', 17),
(23, '2019_03_29_110047_add_category_post', 18),
(24, '2019_03_29_112826_add_column_category_for_posts', 19),
(25, '2019_03_29_113002_dropd_column_category_for_posts', 19),
(26, '2019_03_29_113037_add_category_post_normal', 20),
(27, '2019_04_01_052446_add_columns_user_table', 21),
(28, '2019_04_09_144220_add_uniq_alias_post_table', 22),
(29, '2019_04_09_145450_add_uniq_alias_category_table', 23),
(30, '2019_04_09_145731_delete_uniq_alias_post_table', 23),
(31, '2019_04_09_145855_delete_final_uniq_alias_category_table', 24),
(32, '2019_04_09_150110_add_alias_category_table', 25),
(33, '2019_04_09_150934_uniq_alias_categories', 26),
(34, '2019_04_09_150232_uniq_alias_categories', 27),
(35, '2019_04_09_151530_add_id_increment_categories', 28),
(36, '2019_04_12_112743_add_slider_field_post_table', 28),
(37, '2019_04_14_225007_create_create_projects_tables_table', 29),
(38, '2019_04_15_120010_add_alias_cat_table', 30),
(39, '2019_04_15_211418_create_test_table', 31),
(40, '2019_04_15_215705_create_media_table', 32),
(41, '2019_04_21_174700_create_likeables_table', 33),
(42, '2018_07_14_183253_followers', 34),
(43, '2018_07_14_183254_blockers', 34),
(44, '2018_07_14_183255_likers', 34),
(45, '2019_04_21_212547_create_media_table', 35);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(3, 'App\\User', 1),
(4, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(3, 'App\\User', 3),
(2, 'App\\User', 4),
(4, 'App\\User', 4),
(2, 'App\\User', 7),
(3, 'App\\User', 7),
(2, 'App\\User', 10),
(3, 'App\\User', 10),
(4, 'App\\User', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('patrioff@gmail.com', '$2y$10$PAQn3CizVJTXiEcPZBuzzOyBwYVFNLOTaInMsc/m3XGNWyd2gQqSG', '2019-04-19 12:33:17'),
('faggs241w@mail.ru', '$2y$10$9uYurJs4DqAkcxr.m6/VZOY8Kfom3s7XQgoGT/.HUaHB0v//GT8sK', '2019-04-21 14:16:25');

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2019-03-26 19:37:02', '2019-03-26 19:37:02'),
(2, 'role-create', 'web', '2019-03-26 19:37:02', '2019-03-26 19:37:02'),
(3, 'role-edit', 'web', '2019-03-26 19:37:02', '2019-03-26 19:37:02'),
(4, 'role-delete', 'web', '2019-03-26 19:37:02', '2019-03-26 19:37:02'),
(5, 'post-list', 'web', '2019-03-26 19:37:02', '2019-03-26 19:37:02'),
(6, 'post-create', 'web', '2019-03-26 19:37:02', '2019-03-26 19:37:02'),
(7, 'post-edit', 'web', '2019-03-26 19:37:02', '2019-03-26 19:37:02'),
(8, 'post-delete', 'web', '2019-03-26 19:37:02', '2019-03-26 19:37:02'),
(10000002, 'full-access', 'web', '2019-03-27 19:39:02', '2019-03-27 19:39:02'),
(10000003, 'user-list', 'web', '2019-03-31 21:20:21', '2019-03-31 21:28:00'),
(10000004, 'user-create', 'web', '2019-03-31 21:21:07', '2019-03-31 21:21:07'),
(10000005, 'user-delete', 'web', '2019-03-31 21:21:22', '2019-03-31 21:21:22'),
(10000006, 'user-edit', 'web', '2019-03-31 21:28:21', '2019-03-31 21:28:21'),
(10000007, 'comment-list', 'web', '2019-03-31 23:14:04', '2019-03-31 23:14:04'),
(10000008, 'comment-create', 'web', '2019-04-14 19:39:33', '2019-04-14 19:39:33'),
(10000009, 'comment-delete', 'web', '2019-04-14 19:45:47', '2019-04-14 19:45:47'),
(10000010, 'project-list', 'web', '2019-04-14 19:46:03', '2019-04-14 19:46:03'),
(10000011, 'project-create', 'web', '2019-04-14 19:46:20', '2019-04-14 19:46:20'),
(10000012, 'project-edit', 'web', '2019-04-14 19:46:32', '2019-04-14 19:46:32'),
(10000013, 'project-delete', 'web', '2019-04-14 19:46:44', '2019-04-14 19:46:44');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `meta_title` text,
  `meta_desc` text,
  `title` varchar(255) NOT NULL,
  `content` text,
  `desc` text,
  `alias` varchar(150) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `userlikeids` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `category_id` int(255) DEFAULT '0',
  `slider_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `meta_title`, `meta_desc`, `title`, `content`, `desc`, `alias`, `img`, `author`, `userlikeids`, `created_at`, `updated_at`, `view_count`, `category_id`, `slider_photo`) VALUES
(15, 'МАЗ «рвет» всех на Morocco Desert Challenge', 'm desc116', 'title116', '<p>Белорусские экипажи заняли первые места на шестом этапе ралли-рейда Morocco Desert Challenge. Алексей Вишневский стал победителем заезда, а Сергей Вязович увеличил отрыв от конкурентов в общем зачете, рассказали на Минском автозаводе.</p>\r\n\r\n<p>Шестой ралли-заезд включал 324 &laquo;боевых&raquo; километра. Гонщики преодолели пески, дюны и каньоны. Еще до начала этапа белорусы приняли решение форсировать темп в песках, и тактика сработала: экипажи преодолели спецучасток без поломок и оставили далеко позади соперников.</p>\r\n\r\n<p>Самым быстрым на этапе оказался Алексей Вишневский, который преодолел маршрут за 4 часа 50 минут. На две минуты больше провел на трассе капотный МАЗ, которым управляет Сергей Вязович. На третьем месте финишировал Петер Верслейс с 15-минутным отставанием.</p>\r\n\r\n<p>В генеральной классификации лидирует Сергей Вязович. Капотный МАЗ идет с 30-минутным отрывом от ближайшего преследователя &mdash; голландца Роланда Фоермана на грузовике MAN. В первую пятерку вошел и Алексей Вишневский, которого от лучшего времени отделяет 45 минут.</p>\r\n\r\n<p><em>&mdash; Ехали изо всех сил в максимально возможном темпе. Местами ошибались в навигации, так как были впереди всех. В какой-то момент нас догнал экипаж Алексея Вишневского, и мы практически друг за другом добрались до финиша. Проблем с дюнами не возникло &mdash; напротив, именно на этих участках мы увеличили гандикап, &mdash;</em>&nbsp;рассказал глава команды Сергей Вязович.&nbsp;<em>&mdash; Во время гонки прекрасно себя показал капотный МАЗ. Были приятно удивлены, как машина выдерживает сильнейшие нагрузки. Чтобы было нагляднее, приведу пример: от вибраций у нас оторвало сиденье от пола, а грузовик и бампером не повел.</em></p>\r\n\r\n<p>Седьмой день обещает быть одним из самых напряженных. Протяженность спецучастка превысит 400 км, причем большая его часть пройдет по местам с огромными дюнами. Затем гонщиков встретят скоростные трассы, но и на них будет множество препятствий. Ралли-рейд Morocco Desert Challenge проходит в Марокко с 12 по 20 апреля. Большая часть трассы пролегает по пустыне и песчаной местности, а среди препятствий &mdash; дюны, &laquo;феш-феш&raquo; и высохшие русла рек. Маршрут гонки составляет 2741 км и разделен на 8 этапов. Марафон отличает отсутствие лиазонов: &laquo;боевые&raquo; отрезки начинаются сразу с бивуаков.</p>', NULL, 'maz-«rvet»-vseh-na-morocco-desert-challenge', 'dashboards/image/142429a363d77251450df6c86d154a0036002.jpeg', '1', NULL, '2019-03-26 15:20:01', '2019-04-21 10:10:12', 54, 2, '[\"dashboards\\/image\\/15\\/140989a363d77251450df6c86d154a0036002.jpeg\"]'),
(22, 'Subaru Outback нового поколения порадовал салоном', NULL, 'With cat -1', '<p>Какая главная проблема всех Subaru? Правильно &mdash; ужасный салон. Еще можно придраться к скучноватому внешнему виду, но в остальном &mdash; почти идеальный автомобиль. В Нью-Йорке дебютировало новое поколение универсала Subaru Outback. И в этом автомобиле, кажется, стильный и современный интерьер!&nbsp;</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/d872a6198928eeb0e39f8c323aad2b2e.jpeg\" /></p>\r\n\r\n<p>Но начнем с внешности. При сохранении общего силуэта кузова &laquo;пятидверка&raquo; сменила буквально все дизайнообразующие элементы. Головная оптика стала более сложной формы, корму сделали спортивнее, да и пластиковый обвес по периметру кузова радует глаз. Передние &laquo;противотуманки&raquo; стали светодиодными.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/3921b82112c4b60dc0aeff4271ece03b.jpeg\" /></p>\r\n\r\n<p>На фотографиях, кстати, эксклюзивная версия Subaru Outback Onyx Edition XT. Она отличается черной решеткой радиатора, колесами и широким списком оборудования.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/0b3b56628249d9d7e5552c2a82b2300c.jpeg\" /></p>\r\n\r\n<p>В салоне мы видим новейшую развлекательную система Starlink с дисплеем диагональю 11,6 дюйма. Раскладка экрана вертикальная, как у Volvo или Tesla Model S. Приборная панель цифровая, а кресла обшиты водоотталкивающим материалом.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/7becfdc9064f2449da6c3fe6609f4822.jpeg\" /></p>\r\n\r\n<p>В основе новинки лежит модульная база SGP (Impreza, XV, Forester, Ascent и Legacy последних поколений). Габаритная длина автомобиля достигает 4860 мм (+37 мм). Самые простые модификации универсала оснащаются атмосферным 4-цилиндровым двигателем объемом 2,5 литра. Мощность &mdash; 185 л. с. Вместо старого 3,6-литрового агрегата модель получила 2,4-литровый турбомотор с отдачей 264 л. с. В любом случае коробка передач &mdash; Lineartronic, а привод &mdash; полный.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/425c26fb65f03c618de75430a83dd2da.jpeg\" /></p>', NULL, 'subaru-outback-novogo-pokolenija-poradoval-salonom', 'dashboards/image/116537f9b20ac5b90e1a23412cffc1c7ffe4e.jpeg', '1', NULL, '2019-03-30 15:43:17', '2019-04-21 13:19:06', 76, 1, '[\"dashboards\\/image\\/22\\/121907f9b20ac5b90e1a23412cffc1c7ffe4e.jpeg\"]'),
(24, 'Тест-драйв нового Kia Ceed: чему научились корейцы в Европе', 'Kia Ceed', '$image', '<p>На скучном белорусском рынке бюджетных седанов и разномастных кроссоверов скоро случится пополнение видового разнообразия &mdash; начинаются продажи нового Kia Ceed, созданного во Франкфуртском дизайн-центре Kia под руководством Питера Шраера. Onliner протестировал новые хетчбэк и универсал и сравнил их с двумя предыдущими поколениями. Мы проанализировали метаморфозы европеизации и преображения когда-то унылой в езде и дизайне азиатской повозки в современный европейский автомобиль.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/e19319ce0a093ba7e28c8cca4f18cb67.jpeg\" /></p>\r\n\r\n<h2>Экстерьер</h2>\r\n\r\n<p>Теперь это что-то купеобразное. Исчезли треугольники стекол возле передних зеркал. На кроссовер уже не похоже. Со светодиодными фарами спереди и фонарями сзади. В темноте и сумерках&nbsp;&mdash; загляденье. Сзади не спутайте случайно с BMW 3-Series, а спереди &mdash; с Opel Astra J (но это субъективно). Универсал на крыше имеет продольные рейлинги для багажника, а хетчбэк&nbsp;&mdash; панорамный люк для красот.</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/bc02a03493a7296eb68b50c96a38c3ee.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/ce4a59ea9fb91e17d4a363d9bf821338.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/a10eb2f67561df8a458c6a601ea9167c.jpeg\" /></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/bc02a03493a7296eb68b50c96a38c3ee.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/ce4a59ea9fb91e17d4a363d9bf821338.jpeg\" /></p>\r\n\r\n<p>Теперь салон и эргономика. Наконец все достойно: вкус, стиль, посадка, материалы. Спроектировано европейцами для европейцев. Удобный пухлый руль с кнопками управления мультимедиа, круиз-контролем и бортовым компьютером. Новые материалы кокпита и дверных карт.</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/f6825a9ca99722b8c4fdb74c042f5409.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/3a8088776cd72e5ac6d4921968216541.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/eea2229180c711884c91b161401f8a76.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/f6825a9ca99722b8c4fdb74c042f5409.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/3a8088776cd72e5ac6d4921968216541.jpeg\" /></p>\r\n\r\n<p>Восьмидюймовый экран головного устройства с навигацией, а также возможностью подключения мобильных телефонов по Apple CarPlay и Android Auto. Неплохая аудиосистема JBL&nbsp;&mdash; для джаза и классики &laquo;не торт&raquo;, но для поп-музыки прекрасна.</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/78ed44319dbc1dcdc4b1792917b03f2f.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/421bcbcebd7636aec2cda0789ace1969.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/8df81135f252b5dcd6df0da12d39d44a.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/78ed44319dbc1dcdc4b1792917b03f2f.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/421bcbcebd7636aec2cda0789ace1969.jpeg\" /></p>\r\n\r\n<p>Из неудачного: немного простоватое сиденье без регулировки наклона нижней подушки да мелковатые ручки климат-контроля. Но если вспомнить первое поколение, бывшее слишком &laquo;примитивным&raquo; на фоне тогдашних европейских &laquo;одноклассников&raquo;, то сейчас все на уровне.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/eda627e1b3da344ab58c9f38eb1bcfd3.jpeg\" /></p>\r\n\r\n<h2>Поехали</h2>\r\n\r\n<p>Стартуем от порога подмосковного технопарка &laquo;Сколково&raquo; в гущу хаотичного подмосковного трафика на новом универсале Kia Ceed SW третьего поколения с гидротрансформаторной коробкой, 1,6-литровым мотором Gamma (128 л.&nbsp;с.) и подросшим с 528 до 625 литров багажником (в сравнении со вторым поколением), в котором при сложенных задних сиденьях доступны уже 1694 литра. Бокс-органайзер в полу входит в базовую комплектацию вместе с самосворачивающейся полкой, которую в сложенном состоянии можно убрать в специальную нишу. Также доступна система фиксации багажа в виде телескопических распорок и сетки.</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/b100bcdcf33cc02701b4bd9318c7d8a8.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/a42b738ff2b637a87a7494bcaeaf188c.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/21cef16fb0548de074006100c2b63918.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/b100bcdcf33cc02701b4bd9318c7d8a8.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/a42b738ff2b637a87a7494bcaeaf188c.jpeg\" /></p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/067a32ac9de12b45063d43f41b7b5f60.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/0ca0ecd1f2c263ed5802f585c9cc0bd8.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/96383c3c3239700659d0bd608d210a10.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/067a32ac9de12b45063d43f41b7b5f60.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/0ca0ecd1f2c263ed5802f585c9cc0bd8.jpeg\" /></p>\r\n\r\n<p>Старый добрый гидроавтомат, как известно, создан для толкания в пробках. Без пинков, завываний и метаний: проехал&nbsp;&mdash; остановился, прокатился, разогнался &mdash; стоянка.</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/09025f39369715a7d9a620d60ace6653.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/8d8f817b875b7637ed348bfd181ff0bc.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/3d0dbac2098957f114454ffe94063060.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/09025f39369715a7d9a620d60ace6653.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/8d8f817b875b7637ed348bfd181ff0bc.jpeg\" /></p>\r\n\r\n<p>Вырываемся на относительно свободное Подушкинское шоссе в сторону Барвихи. Можно наконец немного разогнаться. В салоне модели прошлого поколения было заметно более шумно. Инженерно-конструкторские работы произведены в профильном центре компании Kia в Руссельхайме. Изменили конструкцию опор двигателя. Уменьшили звук выхлопа. Усилили звукоизоляцию под сиденьями, арками, дверными проемами. Установили демпферы крутильных колебаний в приводных валах передних колес.</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/f68449ccf175abbfc5cb0f3306bc9c49.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/bac768295bf2a804b801c785bade5613.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/e991a5e0c30475f4c5a4e6a09068784d.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/f68449ccf175abbfc5cb0f3306bc9c49.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/bac768295bf2a804b801c785bade5613.jpeg\" /></p>\r\n\r\n<p>Универсал без загрузки немного раскачивается на волнах асфальта, в поворотах кренится, на затяжной дуге требует подруливания. Дедам, отцам и мамам семейств такие мелочи, думаем, безразличны&nbsp;&mdash; помещались бы в багажник коляска, велосипед и пресловутая картошка, желательно вместе и сразу. И чтобы недорого было.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/77ee5b4689c03f735a528e52eb4104d2.jpeg\" /></p>\r\n\r\n<h2>Через сотню километров пробега меняем авто</h2>\r\n\r\n<p>Пересаживаемся на хетчбэк с турбодвигателем Kappa 1,4 T-GDI (140 л.&nbsp;с.) в связке с роботизированной 7-ступенчатой коробкой передач. Маршрут начинается со скоростного шоссе. Наконец-то можно получить удовольствие от острого рулевого управления и более плотной подвески.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/9810247bbfb36ed38a141033a7411f2e.jpeg\" /></p>\r\n\r\n<p>Еще сотня километров, и мы в пробке на въезде в Москву. Такое чувство, что автоматика бережет сцепления: они буксуют, машина пинается, удовольствие испаряется. Отдельные случаи поломок и прочих неприятностей на российских форумах владельцев Kia Sportage с подобной коробкой можно найти.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/1147cb6c7161b08e0f4a0229fabb4963.jpeg\" /></p>\r\n\r\n<p>Решаем, что в третьем поколении у корейцев наконец получился отличный во всех отношениях автомобиль по разумной цене. Жаль, конкурентов на нашем рынке мало.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/9fa1eb1aa9f0f4af4862ac48be90c26d.jpeg\" /></p>', NULL, 'test-drajv-novogo-kia-ceed', 'dashboards/image/117863b64117d07014c6826776d396205e97d.jpeg', '1', NULL, '2019-03-30 15:56:33', '2019-04-21 13:21:52', 15, 4, '[\"dashboards\\/image\\/24\\/113153b64117d07014c6826776d396205e97d.jpeg\"]'),
(25, 'Тест-драйв нового BMW X5: наблюдаем, как оцифровывается классика', 'BMW X5', '33', '<p>Каждый раз, садясь за руль BMW X5, Mercedes GLE или какого-нибудь мощного SUV Audi, я начинаю понимать комментаторов, которые пишут, что Geely Atlas не хватает хорошей подвески, Vesta Cross плохо едет, а у Renault Duster такой себе салон. Только находясь в действительно дорогих премиум-автомобилях, я способен синхронизовать свое мнение с мыслями топовых ораторов под статьями про бюджетные авто. Во время очередной командировки в Германию я провел несколько дней за рулем&nbsp;G05 и понял, почему первая партия в 60 новеньких BMW X5 разошлась в Минске быстрее, чем знаменитые молодечненские бургеры. И знаете, дело не только в хорошей подвеске или дорогих материалах в салоне. Этим сейчас никого не удивишь. В высших ценовых сегментах важно общее ощущение от машины. И с этим у BMW нет проблем.</p>\r\n\r\n<p>Тест-драйв стартовал в самом сердце Баварии &mdash; в Мюнхене, где BMW на дорогах встречаются чаще, чем Citroen. В этом плане баварская столица схожа с Минском. Правда, если в Германии чаще попадаются свежие 1-Series, компактвэны 2-Series AT и кроссоверы Х1 и Х3, то наши соотечественники предпочитают 5- и 7-Series и, конечно же, Х5 и Х6. Год выпуска при этом не особо важен.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/41fe85ab6b3a0283817050a4a57cd57a.jpeg\" /></p>\r\n\r\n<h2>Монорешетка</h2>\r\n\r\n<p>Впервые с новым Х5 я познакомился в Минске во время презентации у официального дилера. Тогда мне запомнились огромная решетка радиатора, полностью цифровая приборная панель и странный дизайн кормы. В одной из наших &laquo;Автовикторин&raquo; читатели Onliner&nbsp;<a href=\"https://auto.onliner.by/2018/09/28/test-8\">не смогли узнать</a>&nbsp;заднюю оптику BMW X5 G05, приняв ее за американскую. И это неудивительно.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/5fab5ff1c8c804df2d57128bb91a8bbc.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/220edadac8e5aefaf06df270e8b92446.jpeg\" /></p>\r\n\r\n<p>Если взглянуть на три предыдущих поколения &laquo;икса&raquo;, мы заметим, что силуэт фонарей хоть и подвергался заметным изменениям, но всегда оставался схожим со стилистикой E53. Теперь же у Х5 сзади больше сходств с Kia Sorento или каким-нибудь Jeep, нежели с Х-классикой.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/0408c64a391c6d2f8a6670ed68f59986.jpeg\" /></p>\r\n\r\n<p>Спереди тоже есть непривычные решения. Как ни странно, реформам подверглась, казалось бы, самая традиционная часть экстерьера BMW &mdash; решетка радиатора. Мало того, что она стала огромной, так еще впервые &laquo;ноздри&raquo; Х5 срослись и теперь представляют собой одну хромированную конструкцию. По центру решетки вмонтирована ничем не защищенная камера кругового обзора. Под номерным знаком &mdash; радар адаптивного круиз-контроля. У других производителей его часто прячут за логотипом либо уродуют им решетку радиатора. На этом фоне решение BMW смотрится куда более гармонично.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/4b0da2a57188ecd14a9b569d378678b7.jpeg\" /></p>\r\n\r\n<p>В базовом исполнении новый BMW X5 оснащается светодиодной оптикой. На фотографиях &mdash; машины с лазерными фарами, которые легко отличить по синей подсветке. Получается, теперь, если увидишь синие диоды в оптике&nbsp;старых Х5 &mdash; заколхозили. Если синяя &laquo;подводка&raquo; будет у G05 &mdash; значит, топовая комплектация! Главное &mdash; не перепутать.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/941d0143784610a0de7fecd3a76690d9.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/007ef418015e5655242aa22365584eba.jpeg\" /></p>\r\n\r\n<h2>Красивая Бавария</h2>\r\n\r\n<p>Из Мюнхена мы направились в коммуну&nbsp;Роттах-Эгерн &mdash; красивейшее место с видом на ледяные хребты Альп. Здесь много дач немецких бизнесменов и политиков.&nbsp;Когда-то в Роттах-Эгерне была вилла и у Михаила Горбачева. Живописное место относится к Баварии, но находится в непосредственной близости к Австрии (буквально в 10 километрах). До Швейцарии отсюда километров 200, а до севера Италии &mdash; 100.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/8c71c4b3275b95da862bb0acfa1181c4.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/8f412f3cae570f8ff11dc9ceb10f865c.jpeg\" /></p>\r\n\r\n<p>Роттах-Эгерн. Вилла, принадлежавшая семье Горбачева (фото с сайта dw.com)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Жители европейских деревень не любят &laquo;понтоваться&raquo; дорогими машинами. Германия не исключение. Даже в элитном Роттах-Эгерне полно немолодых малолитражек, которые контрастировали с десятком новых BMW X5, прибывших из Мюнхена.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/8fe57ea27bf89183b042a4177fdf12b5.jpeg\" /></p>\r\n\r\n<p>В нашем распоряжении оказался BMW X5 с мотором 30d. Полное название модификации&mdash; xDrive 30d. Рядный дизельный агрегат развивает 265 л. с. (620 Н&middot;м) и разгоняет кроссовер до сотни за 6,5 с. Если брать &laquo;для себя&raquo; (а не рассматривать как тестовую/прокатную машину на пару дней), то 3-литровый дизельный Х5 в таком исполнении &mdash; идеальный вариант. Не зря 30d была самой популярной версией Х5 предыдущего поколения не только на европейском рынке, но и в регионе ТС. Такая машина и едет отлично, и расходует 7&mdash;8 литров на сотню.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/16024387c0d71d1944bb94331840275e.jpeg\" /></p>\r\n\r\n<p>Вслед за другими моделями BMW, построенными на архитектуре CLAR, X5 в кузове G05 получил вот такой ключ. Жалко, что на него нельзя поставить Twitter или Instagram. Но это не просто красивый аксессуар, которым можно завлекать девочек на Зыбицкой. На экран ключа выводятся основные показания бортового компьютера: запас хода машины, работа оптики и прочие. В европейских Х5 ключ постоянно заряжается, находясь на поверхности беспроводной зарядки у основания центральной консоли. В Беларуси технология&nbsp;wireless, вероятно, будет отключена (как на новых Х3), поэтому придется заряжать с помощью шнура. К слову, полностью высадить ключ не удастся: он продолжит закрывать/открывать машину, даже если энергии аккумулятора не будет хватать для активации дисплея.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/2ad56c66540f6c264109e6d34377ecc1.jpeg\" /></p>\r\n\r\n<p>Радует, что у BMW X5 в заднем бампере реальные патрубки выхлопной системы. Многие премиум-производители сегодня делают красивую бутафорию, а выхлоп валит из-под бампера. Несмотря на большое количество новых дизайнерских решений, общий силуэт кузова у Х5 остался узнаваемым. Среди конкурентов (Mercedes GLE и Audi Q8) G05 выглядит наиболее &laquo;немецким&raquo;.</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/90927a633c68bc4107fb619a28ccc795.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/cadfabc5209972c83b86bfe60cc3a6f8.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/966304073710a89d41ea32988dec55b9.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/90927a633c68bc4107fb619a28ccc795.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/cadfabc5209972c83b86bfe60cc3a6f8.jpeg\" /></p>\r\n\r\n<h2>Что общего с Е53?</h2>\r\n\r\n<p>За что люди любят BMW X5 первого поколения? Ну кроме того, что он снимался во второй части &laquo;Бумера&raquo;. Е53 любят за укоренившийся образ мощного брутального автомобиля, за рулем которого любой дрыщ в грязных ботинках превращался (когда-то) в солидного мужика. В 2000-м первый вседорожник BMW наделал много шума, став впоследствии едва ли не символом премиальных SUV. Тяжеловесный, просторный, имиджевый &mdash; три кита, на которых построена вся философия BMW X5. Первый &laquo;икс&raquo; ледоколом прорубил путь в коммерчески успешные сегменты остальным мюнхенским кроссоверам: Х1, Х2, Х3, Х4, Х6, Х7. Именно Х5 стал основой ДНК всей линейки SUV BMW. Но новое поколение Х5 очень далеко от аналогового, можно сказать, лампового Е53.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/778a644f891dd71f6f37d9b044b13f49.jpeg\" /></p>\r\n\r\n<p>Правда, есть у G05 кое-что общее с первым Х5 &mdash; это пневмоподвеска всех четырех колес. Работая над новым поколением модели, баварцы стремились сделать автомобиль как можно комфортабельнее по сравнению с F15, и это потребовало установки двух пар баллонов. У Е70 и F15, напомним, пневмоэлементы были только на задней оси. Вряд ли такое решение обрадует третьих и последующих владельцев авто, но первый покупатель Х5 с продвинутой подвеской будет получать от нее только преимущества. Уже в базе кроссовер оснащается адаптивными амортизаторами. В списке опций имеются настраиваемые стабилизаторы поперечной устойчивости. Задние колеса умеют подруливать.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/ea4659bc233ce2808d5aaa254ff5c0e0.jpeg\" /></p>\r\n\r\n<h2>284 мм над землей</h2>\r\n\r\n<p>Помимо действительно высокого уровня комфорта, меняющий дорожный просвет позволит кроссоверу проехать там, куда F15 даже не сунется. Конкурентом Land Rover Discovery баварский вседорожник, безусловно, не стал, но для Х5 впервые предложен расширенный пакет Off-Road, который позволит владельцам быть более уверенными по пути на природу или дачу. Внедорожный набор, кроме пневмоподвески, включает электронноуправляемый задний дифференциал, offroad-режимы (их пять) и дополнительную защиту днища.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/6fe77459ce7ea1961bf399a03f3c1164.jpeg\" /></p>\r\n\r\n<p>В самом верхнем положении клиренс у Х5 с пневмой составляет 254 мм. При этом в Off-Road-пакете есть режим, который позволяет увеличить просвет на дополнительные 30 мм (работает режим только на низкой скорости). Без сомнений, G05 стал самым проходимым Х5 в истории. Но способности на бездорожье никогда не были козырем BMW. Главная среда обитания &laquo;баварца&raquo; &mdash; идеальный асфальт.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/514a298f413b3e202b823573864b16eb.jpeg\" /></p>\r\n\r\n<h2>Интересная компьютерная игра</h2>\r\n\r\n<p>Первые два поколения Х5 были дерзкими и словно&nbsp;подзадоривали водителя активнее нажать на газ и крутануть баранку в повороте. F15 стал спокойнее, но все еще воспринимался необузданным жеребцом, которым хочется управлять, активировав спортивный режим и перенеся ладони в район подрулевых лепестков. Новое поколение Х5, кажется, получило на одно пассажиркое кресло больше. Теперь не совсем понятно: это ты управляешь машиной или она тобой?</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/484eabed3f0e2d48f8a99011c2c33f7e.jpeg\" /></p>\r\n\r\n<p>У Х5 очень чуткая система слежения за полосой и весьма активный виртуальный помощник, использующий электроусилитель руля вместо водителя. Любителей держать все под контролем назойливые подруливания могут раздражать. Те, кто воспринимает автомобиль как способ добраться из точки А в точку Б, с теплотой принимают новые технологии. Между педалями, рулем и колесами больше нет механической связи. От азарта и брутальности первого Х5 не осталось и следа. Управление новым кроссовером все больше походит на компьютерную игру.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/b31fff8f20e6144cc2723405bfaa9cb7.jpeg\" /></p>\r\n\r\n<p>Но это интересная компьютерная игра! Пару раз кликнул по клавишам на центральном тоннеле &mdash; и вот уже, кажется, растворилась пустота в околонулевой зоне руля. В спортивном режиме подвеска лишается излишней упругости, а педаль газа заставляет 8-ступенчатую коробку передач реагировать быстрее и сбрасывать две-три ступени перед ускорением.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/227d3d386a6ac6d5cb1d5310d7905577.jpeg\" /></p>\r\n\r\n<p>А еще эта игра с элементами дополненной реальности. Компания BMW первой начала массово устанавливать head-up-дисплеи на свои машины. Новое поколение проекционной системы отличается увеличенной картинкой и очень высокой информативностью. На лобовое стекло выводится максимально допустимая скорость, а по мере приближения к новому знаку машина подскажет о нем на подъезде. Очень удобно! Едешь положенные 100 км/ч, а за пару сотен метров до населенного пункта автомобиль говорит, что скоро будет новое ограничение. Жаль, в Беларуси это все работать не будет. Как и система автоматической оплаты парковок (когда к машине привязывается банковская карта).</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/9eb8310db607b11089558c9f58a193b2.jpeg\" /></p>\r\n\r\n<p>Зато покупатели версий 30d без всяких М-приставок смогут оценить неожиданно классный звук двигателя. Породистый голос рядной &laquo;шестерки&raquo; доносится не только из коллекторов правильной акустической формы, но и&hellip; из колонок. Да-да, бархатный рык при интенсивном разгоне в спортивном режиме льется в уши водителя и пассажиров прямиком из штатной акустики.&nbsp;Пластмассовый мир победил.</p>\r\n\r\n<h2>Экран здесь, экран там</h2>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/1c5d65a20d99a6b03c118b61317b227a.jpeg\" /></p>\r\n\r\n<p>Лично я буду скучать по аналоговым приборным панелям BMW. Они были для меня идеальными. А как здорово баварцы сделали цифровую&nbsp;<a href=\"https://content.onliner.by/news/1100x5616/1821940c48d1a92f711ed7cf032cc468.jpeg\" target=\"_blank\">приборку</a>&nbsp;с полукруглыми алюминиевыми ободами! Картинка не мешала кокпиту выглядеть элегантно, даже когда автомобиль был заглушен. Теперь же нам оставили бездушный экран.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/2cacfd406fe74d8dde800e444af965c2.jpeg\" /></p>\r\n\r\n<p>Да, картинка приборки сочная и не бликует. Да, теперь можно настраивать все под себя, дизайнеры постарались на славу. Да, цифровая приборная панель позволит баварцам начать внедрять &laquo;опции будущего&raquo; в свои новинки, ведь для BMW X5 будут периодически приходить обновления ПО. Но поклонники BMW конца 2000-х, середины 2010-х вряд ли обрадуются всей этой оцифровке.</p>\r\n\r\n<h2>Хрустальный рычаг АКП</h2>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/36171563ba2aa98908388c26ff34ab7b.jpeg\" /></p>\r\n\r\n<p>Ладно, оставим приборную панель. Но это что такое на селекторе АКП? Одному мне этот &laquo;бриллиант&raquo; напоминает розочку, которая украшала рычаги старых советских машин? В таком гранено-стеклянном виде выполнены и некоторые клавиши в салоне, а также шайба мультимедийной системы. Может быть, баварцы собрались привлечь в качестве покупателей Х5 сорок? Одно радует: весь этот хрусталь является дополнительной опцией (от Swarovski, между прочим!), от которой можно отказаться. Наверняка многим потенциальным покупателям Х5 такой гламур не придется по вкусу.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/a30629a0de2534fe49992e583e796f15.jpeg\" /></p>\r\n\r\n<p>Мультимедийная система и посадка за рулем BMW X5 снова оставляют позади всех конкурентов. Кстати, теперь развлекательную систему называют не iDrive, а&nbsp;BMW OS 7.0. Это полноценная операционная система с обновлениями, широким диапазоном настроек и красивейшей картинкой. Такой же мультимедийный комплекс стоит на 8-Series. Системой можно управлять с помощью шайбы, тыкая в сенсорный дисплей, либо жестами. Для нового Х5 доступен 5-зонный климат-контроль. Передние зоны настраиваются с помощью клавиш &mdash; для &laquo;климата&raquo; предусмотрен отдельный маленький экранчик.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/a320f02205594fccdb54720a096c7dfd.jpeg\" /></p>\r\n\r\n<h2>Самый цифровой Х5</h2>\r\n\r\n<p>Кратко описать новинку можно так: это самый цифровой BMW X5. Оно и понятно: современный мир живет по обе стороны дисплея, и новые автомобили должны соответствовать изменениям вокруг. Раньше BMW X5 радовал &laquo;живой&raquo; обратной связью с водителем, сегодня он сам решает, как лучше ехать. Е53 был спортивным бронепоездом, который утюжил асфальт с пафосным взглядом водителя за рулем, G05 &mdash; высокотехнологичное комфортное транспортное средство, которое в зависимости от вашего настроения меняет отклик на руль, жесткость подвески или звук двигателя в колонках. А если что, он подстрахует в экстренной ситуации. Новый BMW X5, цены на который в Минске начинаются от &euro;59 тыс. по курсу, без сомнений, станет очень востребованным и приведет к дилерам баварского производителя новых клиентов. Кроссовер, быть может, и утратил тот дух BMW, к которому привыкли владельцы Е53 и E70, зато привнес в философию бренда новые нотки. Нотки завтрашнего дня.</p>', NULL, 'test-drajv-novogo-bmw-x5', 'dashboards/image/177935cf0f84c777cedc7fa0c10d6c0bc9673.jpeg', '1', NULL, '2019-03-31 18:53:36', '2019-04-12 10:17:02', 63, 4, '[\"dashboards\\/image\\/25\\/119425cf0f84c777cedc7fa0c10d6c0bc9673.jpeg\"]'),
(28, 'В отношении водителя Nissan, сбившего ребенка, возбудили уголовное дело', 'авария', 'test-poller usera', '<p>Управлением СК по городу Минску устанавливаются обстоятельства дорожно-транспортного происшествия, которое случилось вчера, 15 апреля, около 18 часов. Как уже&nbsp;<a href=\"https://auto.onliner.by/2019/04/15/dtp-10270\">сообщалось</a>, 59-летний водитель легкового автомобиля Nissan Terrano, двигаясь по проспекту Машерова в Минске, совершил наезд на 12-летнего мальчика. Выяснилось, что подросток пересекал проезжую часть по регулируемому пешеходному переходу, по предварительным данным, на запрещающий сигнал светофора,&nbsp;<a href=\"https://sk.gov.by/ru/news-usk-gminsk-ru/view/dtp-s-uchastiem-peshexoda-v-minske-vozbuzhdeno-ugolovnoe-delo-7886/\" target=\"_blank\">пишет</a>&nbsp;сайт Следственного комитета.&nbsp;</p>\r\n\r\n<p>Ребенок госпитализирован в учреждение здравоохранения Минска с тяжкими телесными повреждениями, причиненными в результате ДТП. Следователем с участием эксперта и сотрудников ГАИ проведен осмотр места происшествия, назначены автотехнические и судебно-медицинская экспертизы.</p>\r\n\r\n<p>В отношении водителя возбуждено уголовное дело по ч. 2 ст. 317 (нарушение правил дорожного движения лицом, управляющим транспортным средством, повлекшее по неосторожности причинение тяжких телесных повреждений) Уголовного кодекса Республики Беларусь. К нему применена мера процессуального принуждения &mdash; обязательство о явке.</p>\r\n\r\n<p>Граждан, которые располагают какими-либо сведениями о вышеуказанном происшествии, следователи просят обратиться в УСК по г. Минску по адресу: ул. Первомайская, 7, или по телефонам: 8 (017) 389-55-55 и 8 (033) 333-67-19.</p>', NULL, 'v-otnoshenii-voditelja-nissan-sbivshego-rebenka-vozbudili-ugolovnoe-delo', 'dashboards/image/18221d48cef0cbc6e895940eed6e75a107bec.jpeg', '7', NULL, '2019-03-31 23:20:51', '2019-04-21 13:25:27', 18, 7, '[\"dashboards\\/image\\/28\\/13166d48cef0cbc6e895940eed6e75a107bec.jpeg\"]');
INSERT INTO `posts` (`id`, `meta_title`, `meta_desc`, `title`, `content`, `desc`, `alias`, `img`, `author`, `userlikeids`, `created_at`, `updated_at`, `view_count`, `category_id`, `slider_photo`) VALUES
(30, 'Тест-драйв Audi e-tron: заглядываем в новую главу немецкого премиума', 'Audi e-tron', '$last_id', '<p>В&nbsp;самолете Москва&nbsp;&mdash; Малага еще в&nbsp;аэропорту Шереметьево заприметил знаменитого урбаниста Илью Варламова, который тоже летел на&nbsp;ходовую презентацию Audi e-tron в&nbsp;Испанию. Недалеко от&nbsp;него расположилась популярная блогер Саша Митрошина. Прогулявшись между рядов, узнал еще несколько лиц. В&nbsp;основном&nbsp;&mdash; ведущие YouTube-каналов, посвященных обзорам электроники. Из&nbsp;автомобильного сообщества был только Олег Максимов (канал &laquo;Бородатая Езда&raquo;). Мир машин изменился до&nbsp;неузнаваемости. На&nbsp;тест-драйвы автомобилей все чаще зовут digital- или beauty-блогеров. Да&nbsp;и&nbsp;транспортные средства все больше походят на&nbsp;гламурные планшеты. Во&nbsp;время обеда один из&nbsp;&laquo;ютуберов&raquo; спросил меня:&nbsp;<em>&laquo;В&nbsp;пресс-релизе написано, что у&nbsp;этой Audi два мотора. Как они поместились под капотом?&raquo;</em>&nbsp;Настали времена, когда разрешение дисплея приборной панели&nbsp;&mdash; более важная информация, нежели компоновка двигателей, тип подвесок или устройство коробки передач.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/TvKEZ4z0kD8\" width=\"560\"></iframe></p>\r\n\r\n<p>Юг&nbsp;Испании встретил солнцем, свежими фруктами и&nbsp;десятками немецких электромобилей, припаркованными возле отеля &laquo;Пуэнте Романо&raquo;. После завтрака успешно выполнил миссию под названием &laquo;Первым занять машину с&nbsp;камерами вместо зеркал&raquo;. Таких вариантов было немного&nbsp;&mdash; примерно&nbsp;20% от&nbsp;общего количества. Еще, кстати, неясно, как они получили разрешение кататься по&nbsp;дорогам ЕС. Я&nbsp;уже&nbsp;<a href=\"https://auto.onliner.by/2017/01/24/cadillac-xt5-2\" target=\"_blank\">ездил</a>&nbsp;на автомобилях с&nbsp;экраном вместо салонного зеркала, поэтому было интересно, насколько&nbsp;же неудобны боковые наружные камеры. Оказывается, еще более неудобные! Об&nbsp;этом чуть ниже, а&nbsp;сейчас давайте познакомимся с устройством самой смелой новинки Audi за&nbsp;последние много лет.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/e21da0870a60d62b4f4ebf2a02f7f0e8.jpeg\" /></p>\r\n\r\n<h2>Доработанная платформа MLB Evo</h2>\r\n\r\n<p>Разрабатывать e-tron немцы начали в&nbsp;разгар дизельгейта. Эконастроенная общественность ЕС и&nbsp;власть имущие ополчились против концерна VAG с&nbsp;его &laquo;читерством&raquo; в&nbsp;устройстве дизельных автомобилей, поэтому немцы в&nbsp;срочном порядке приступили к&nbsp;плану &laquo;Б&raquo;&nbsp;&mdash; разработке линейки электрокаров Audi, о&nbsp;которой осторожно&nbsp;<a href=\"https://www.audi-mediacenter.com/en/audi-e-tron-155\" target=\"_blank\">поговаривали</a>&nbsp;еще с&nbsp;2009&nbsp;года. Инженерам пришлось серьезно дорабатывать большую платформу MLB Evo под размещение электрической силовой установки. Ведь архитектура создавалась исключительно для ДВС-машин с&nbsp;продольным расположением агрегата. Здесь мало того что мотора два (и стоят они поперечно), так еще и&nbsp;место для огромной батареи нужно найти. В&nbsp;общем, попотели баварцы.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/ce395c5996eb1f74f0e26c1c2670dd90.jpeg\" /></p>\r\n\r\n<p>Получился &laquo;скейт&raquo;, мало чем отличающийся от&nbsp;других EV-паркетников. Блок литий-ионных батарей расположился в&nbsp;базе. Емкость&nbsp;&mdash; 95&nbsp;кВт&middot;ч. Аккумуляторы здесь практически такие&nbsp;же, как у&nbsp;Jaguar I-Pace: пакетного типа, фирмы LG. Они разбросаны по&nbsp;36&nbsp;ячейкам, которые можно менять по&nbsp;отдельности. Электромоторы ожидаемо нашли свое место на&nbsp;обеих осях. В&nbsp;отличие от&nbsp;британского электрокара, e-tron оснащен двигателями с&nbsp;разной отдачей&nbsp;&mdash; спереди менее мощный (180&nbsp;л.&nbsp;с. против 220&nbsp;л.&nbsp;с.&nbsp;на&nbsp;задней оси). Такое&nbsp;же решение мы&nbsp;видели на&nbsp;Tesla Model&nbsp;X.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/8f2cad58e3c1de6224d91cedc1100a52.jpeg\" /></p>\r\n\r\n<p>С&nbsp;американским электрокаром ингольштадскую новинку роднят еще и асинхронные электродвигатели. Такие моторы чуточку дешевле синхронных (как на&nbsp;Jaguar I-Pace и&nbsp;<a href=\"https://auto.onliner.by/2018/03/19/tesla-130\" target=\"_blank\">Tesla Model&nbsp;3</a>), но&nbsp;имеют один серьезный недостаток&nbsp;&mdash; больше склонны к&nbsp;нагреву. Это стало причиной ограничения максимальной мощности на&nbsp;электрической Audi&nbsp;&mdash; она доступна только 8&nbsp;секунд и&nbsp;только в&nbsp;режиме Sport. Под блоком тяговой батареи расположилась продвинутая система охлаждения.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/580b7da3e2e779da7d9a451c77e60bec.jpeg\" /></p>\r\n\r\n<h2>Зарядки с&nbsp;обеих сторон</h2>\r\n\r\n<p>Если не&nbsp;учитывать странные отростки вместо зеркал заднего вида, то по экстерьеру e-tron мало чем отличается от&nbsp;других серийных кроссоверов с&nbsp;кольцами на&nbsp;решетке радиатора. Никакого смещенного вперед салона, как у&nbsp;<a href=\"https://auto.onliner.by/2019/01/22/jaguar-132\" target=\"_blank\">Jaguar I-Pace</a>, никаких экспериментов с&nbsp;дверями, как у&nbsp;<a href=\"https://auto.onliner.by/2016/06/06/tesla-67\" target=\"_blank\">Tesla Model&nbsp;X</a>, никаких фантазий с&nbsp;формами, как у&nbsp;<a href=\"https://auto.onliner.by/2018/10/22/bmw-i3-11\" target=\"_blank\">BMW i3</a>. Это автомобиль здесь и&nbsp;сейчас. Такая Audi, какой ее&nbsp;привыкли видеть. Не&nbsp;следящий за&nbsp;новостями человек подумает, что это новое поколение Q5&nbsp;или Q7. Даже &laquo;традиционный&raquo; с&nbsp;точки зрения силовой установки&nbsp;<a href=\"https://auto.onliner.by/2019/02/07/audi-392\" target=\"_blank\">Q8</a>&nbsp;больше выделяется в&nbsp;линейке кроссоверов Audi.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/135cfb59083dd90af9fcf7b396bd6bb8.jpeg\" /></p>\r\n\r\n<p>Кроме опциональных камер на&nbsp;месте лопухов-зеркал, можно отметить следующие внешние отличия &laquo;электрички&raquo;: серебристую накладку под задним бампером без намека на&nbsp;наличие выпускной системы, практически &laquo;глухую&raquo; решетку радиатора (там только пять отверстий) и&nbsp;отсутствие лючка бензобака.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/eef2b4015e90a4f7ea17193157381a7c.jpeg\" /></p>\r\n\r\n<p>Зато у&nbsp;машины аж&nbsp;два зарядных порта стандарта CСS&nbsp;&mdash; по&nbsp;одному в&nbsp;каждом крыле. Слот для подключения кабеля постоянного тока есть только слева. Зарядка с&nbsp;нуля до&nbsp;80% занимает минимум полчаса (через 150-киловаттную зарядку постоянным током). С&nbsp;помощью бытовой розетки (заземленной!) пополнить энергию батареи можно за&nbsp;часов 20&mdash;25.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/6dd438c14aef44335aecdc41d9bc6aa3.jpeg\" /></p>\r\n\r\n<p>Для выпуска e-tron немцам пришлось разгрузить мощности бельгийского завода VAG&nbsp;&mdash; раньше там выпускался хетчбэк&nbsp;A1, который недавно переехал в&nbsp;испанский &laquo;роддом&raquo;, где появляются на&nbsp;свет и&nbsp;Volkswagen Polo. В&nbsp;Брюсселе будут выпускать еще несколько электрокаров Audi, включая эффектную &laquo;четырехдверку&raquo; e-tron Sportback. Пока еще кроссовер e-tron не&nbsp;поступил в&nbsp;открытую продажу&nbsp;&mdash; первые европейские клиенты получат свои электрокары в&nbsp;марте.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/889c6e7a0518a2b434423a31f2da8d5f.jpeg\" /></p>\r\n\r\n<h2>Это А6&nbsp;или Q8?</h2>\r\n\r\n<p>Человеку, знакомому с&nbsp;другими новинками Audi, привыкать к&nbsp;салону не&nbsp;придется. За&nbsp;исключением пары-тройки &laquo;электрических&raquo; особенностей, здесь все как в&nbsp;последних A6, A7, A8&nbsp;и&nbsp;Q8. После запуска двигателя (назовем это так) водителя торжественно приветствует мажорный аккорд из&nbsp;колонок. Тональность та&nbsp;же, что и на&nbsp;Q8. На&nbsp;первый взгляд здесь все как в&nbsp;Audi с&nbsp;ДВС. MMI последнего поколения радует быстрым меню, а&nbsp;&laquo;цифровой&raquo; климат-контроль слегка расстраивает. Вместо стрелок приборки&nbsp;&mdash; экран. Пацаны во&nbsp;дворе больше не&nbsp;узнают, &laquo;сколько на&nbsp;спидометре&raquo;. Кресла попроще, чем в&nbsp;Q8&nbsp;с S-пакетом. Вентиляции и&nbsp;массажа здесь нет.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/c197aea910aeea2ae0c70f43efd6865c.jpeg\" /></p>\r\n\r\n<p>Углубившись в&nbsp;изучение салона, находишь нетипичную для Audi подставку под руку на&nbsp;центральном тоннеле. Некогда здесь торчал рычаг коробки передач, теперь же установлен джойстик переключения режимов. Он&nbsp;тоже не&nbsp;имеет фиксируемых положений, но символы нанесены знакомые: R, N, D&nbsp;и&nbsp;P.&nbsp;Один раз качнул на&nbsp;себя&nbsp;&mdash; перешел в&nbsp;Drive. Качнул дважды&nbsp;&mdash; активировал спортивный режим, который и&nbsp;открывает 8-секундный доступ к&nbsp;пику тяги и&nbsp;мощности.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/a16d5e9a394d60b045f983bea6f6fd2c.jpeg\" /></p>\r\n\r\n<p>Эргономика, как и&nbsp;в&nbsp;любой другой Audi, идеальная. Не&nbsp;хватает разве что чуть более низкой посадки. За&nbsp;рулем виднеются лепестки. Понятное дело, они переключают не&nbsp;передачи: как и&nbsp;в&nbsp;случае с&nbsp;<a href=\"https://auto.onliner.by/2018/04/17/mitsubishi-74\" target=\"_blank\">Mitsubishi Outlander PHEV</a>, лепестки регулируют степень рекуперации. По&nbsp;умолчанию стоит режим, который напоминает машину с&nbsp;обычной АКП. Отпустил правую педаль&nbsp;&mdash; автомобиль слегка стал замедляться. В&nbsp;самом &laquo;жестком&raquo; режиме рекуперации замедления не&nbsp;такие интенсивные, как у&nbsp;Jaguar I-Pace, но&nbsp;все равно при желании можно ехать &laquo;в&nbsp;одну педаль&raquo;.</p>\r\n\r\n<h2>Slightly unusual</h2>\r\n\r\n<p>Поверхности дисплеев нещадно собирают отпечатки пальцев (кажется, даже тогда, когда эти самые дисплеи не&nbsp;трогаешь). Их вокруг водителя e-tron аж&nbsp;пять! Приборка, мультимедиа, &laquo;климат&raquo; плюс два экрана заднего вида. Об&nbsp;этом подробнее. Привыкать к&nbsp;цифровым &laquo;зеркалам&raquo; придется долго. Еще до&nbsp;тест-драйва сотрудники Audi предупредили, что будет &laquo;slightly unusual&raquo;.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/dc5385fb32d684c7e0fb5e557bc6a617.jpeg\" /></p>\r\n\r\n<p>Slightly?! Тут нужно все свои водительские привычки поменять. В&nbsp;крохотных испанских деревушках с&nbsp;обилием кольцевых развязок приходится постоянно мониторить ситуацию вокруг автомобиля и&nbsp;машинально посматривать в&nbsp;&laquo;отростки&raquo;, на&nbsp;которых расположены камеры. Спустя километров сто глаза запоминают, что картинка этажом ниже, но&nbsp;здесь возникает другая проблема&nbsp;&mdash; ты&nbsp;не&nbsp;можешь наклоном головы менять угол изображения (как в&nbsp;зеркалах). В&nbsp;общем, за&nbsp;два дня к&nbsp;экранам заднего вида я&nbsp;так и&nbsp;не&nbsp;привык.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/7b75702f9806ff32f76980133bea641d.jpeg\" /></p>\r\n\r\n<p>На&nbsp;втором ряду намного теснее, чем в&nbsp;Q8. Места, возможно, даже меньше, чем в&nbsp;Q5. А&nbsp;вот багажник, напротив, порадовал&nbsp;&mdash; 660 литров и&nbsp;высоко поднимающаяся пятая электродверь. Еще&nbsp;бы направляющие шторке добавить...</p>\r\n\r\n<h2>А&nbsp;должен&nbsp;ли электрокар быть суперкаром?</h2>\r\n\r\n<p>Суммарная отдача двух электромоторов &mdash; 400&nbsp;л.&nbsp;с. Пиковая тяга переднего &mdash; 309&nbsp;Н&middot;м, задний обрушивает на&nbsp;ось 365&nbsp;Н&middot;м. Если забыть про существование других премиум-электромобилей, то динамику разгона e-tron можно назвать выдающейся: 5,7 секунды до&nbsp;сотни для неспортивного кроссовера массой две с&nbsp;половиной тонны&nbsp;&mdash; неплохо. Причем это честные секунды, без пауз, провалов тяги или других ДВС-проблем. Нажал&nbsp;&mdash; ускорился. Одно удовольствие.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/8700a4bea196a0597fc98bbd7113d8eb.jpeg\" /></p>\r\n\r\n<p>Но&nbsp;мы&nbsp;живем в&nbsp;мире, где есть другие электрокары и&nbsp;все норовят сравнить новые EV-модели с&nbsp;&laquo;Теслой&raquo; именно по&nbsp;показателям разгона. Здесь e-tron заметно проигрывает не&nbsp;только калифорнийскому &laquo;выскочке&raquo;, но&nbsp;и&nbsp;недавно дебютировавшему Jaguar I-Pace. С&nbsp;другой стороны, а&nbsp;зачем электромобилю разгоняться до&nbsp;сотни за три секунды? Разве что показать один раз друзьям. Интенсивные разгоны стремительно опустошают батарею, а&nbsp;запас хода&nbsp;&mdash; куда более важная цифра для потребителя, нежели количество &laquo;сек. до&nbsp;сотки&raquo;.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/5be75c175949b9913bc40ca7276effbd.jpeg\" /></p>\r\n\r\n<p>Из&nbsp;95&nbsp;кВт&middot;ч пользователю доступны только 85. Десятку батарея &laquo;держит&raquo; в&nbsp;себе для сохранения жизнедеятельности. Полностью разряженный литий-ионный аккумулятор (этого можно добиться только оставив машину на&nbsp;много недель) может получить химические повреждения, поэтому производитель побеспокоился, чтобы владельцы не&nbsp;&laquo;выкатали&raquo; всю емкость. По&nbsp;заводским данным, запас хода электрокара составляет 400&nbsp;км. При оптимальных условиях, которыми нас порадовала Испания, преодолеть &laquo;между розетками&raquo; четыре сотни километров действительно можно. По&nbsp;крайней мере, на&nbsp;моей машине показания одометра и&nbsp;цифра запаса хода менялись в&nbsp;унисон.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/cf6b926241d2a2b6f49100057cc18d91.jpeg\" /></p>\r\n\r\n<p>Может быть, кто-то и&nbsp;любит электромобили за&nbsp;то, что они якобы экологически чистые и&nbsp;не&nbsp;портят городской воздух, но&nbsp;для меня электрокар&nbsp;&mdash; это в&nbsp;первую очередь классная управляемость. Какое&nbsp;же удовольствие выписывать на&nbsp;e-tron сложные серпантины Андалусии! Передняя подвеска здесь представляет собой сдвоенные поперечные рычаги, а&nbsp;сзади используется многорычажная схема. Это мы&nbsp;уже видели на&nbsp;других MLB-кроссоверах Audi, но&nbsp;ни&nbsp;один не&nbsp;сравнится с&nbsp;e-tron по&nbsp;управляемости.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/dab8ecdd49956bee10c8a42fce22d3a0.jpeg\" /></p>\r\n\r\n<p>Треть массы этого автомобиля расположена на&nbsp;высоте оси. По&nbsp;ощущениям&nbsp;&mdash; словно едешь на&nbsp;сверхкомфортабельном электрическом карте. У вас скорее закружится голова, нежели машина начнет скользить или изрядно крениться. Все e-tron на&nbsp;тесте были с&nbsp;пневматической подвеской. По&nbsp;словам организаторов теста, других пока в&nbsp;природе нет. Есть у&nbsp;электромобиля два вседорожных режима: allroad и&nbsp;offroad. Последний доступен только на&nbsp;маленьких скоростях и&nbsp;активирует дополнительные помощники, такие как система спуска с&nbsp;горы, особый режим противобуксовочной системы и&nbsp;пр.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/72a75736cdaa895afaa891243e8d9580.jpeg\" /></p>\r\n\r\n<p>Порадовало, что спортивный характер, присущий, по&nbsp;сути, любому электрокару, не&nbsp;угробил комфортабельность автомобиля. Модель e-tron имеет плотную подвеску, напоминающую &laquo;пневматические&raquo; Q7&nbsp;и&nbsp;Q8. Машина получилась автобанной, но&nbsp;и&nbsp;на&nbsp;весенних минских дорогах, где яма яму погоняет, не&nbsp;спасует. &laquo;Полуавтономные&raquo; системы работают так&nbsp;же, как у Q8. Поспать за&nbsp;рулем не&nbsp;позволят, но&nbsp;можно не&nbsp;бояться, что прозеваешь внезапно остановившийся впереди автомобиль.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/dc06b69761666f7be6b613d34dd97617.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/7ed6d3421fc985eaeef46b511b6b9931.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/0add468adc9fc37dca2ba4a28a77ec14.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/2d4f9e733d623fbf8d4db1975b28c8d9.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/9cb4e75b6a35d221fc36b4c999eb55c4.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/9ceb409cb0bcc75970561091a2450700.jpeg\" /></p>\r\n\r\n<h2>Вывод</h2>\r\n\r\n<p>Новая глава открыта. Audi e-tron&nbsp;&mdash; это первый полностью серийный электрокар компании, который не&nbsp;имеет версий с&nbsp;ДВС. Как и&nbsp;в&nbsp;случае с&nbsp;Jaguar, новый кроссовер из&nbsp;Ингольштадта радует тем, что это современный автомобиль, а&nbsp;не&nbsp;полет фантазии на тему &laquo;какими будут машины через ...дцать лет&raquo;. Монополии Tesla в&nbsp;сегменте премиум-электрокаров настал конец. Jaguar I-Pace уже продается в&nbsp;Минске. Audi e-tron приедет к&nbsp;нам до&nbsp;конца этого года. Не&nbsp;за&nbsp;горами выход электрических BMW iX3 и&nbsp;Mercedes EQC. А&nbsp;там подоспеют и&nbsp;более доступные премиум-модели на&nbsp;электротяге.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/0048872059a58ef54c8968f141b8b0da.jpeg\" /></p>\r\n\r\n<p>Первое поколение e-tron вряд&nbsp;ли обойдет по&nbsp;продажам любой другой SUV Audi, но&nbsp;в&nbsp;истории бренда это одна из&nbsp;самых важных новинок за&nbsp;последние много лет. Это новая веха в&nbsp;летописи компании, и&nbsp;своим внукам мы&nbsp;будем рассказывать, что стали свидетелями появления первых электрических Audi. Эксперты считают, что в&nbsp;следующем десятилетии количество EV-моделей у&nbsp;большинства производителей сравняется с&nbsp;количеством ДВС-семейств. Наконец-то в&nbsp;автомобильном мире началась интересная &laquo;движуха&raquo;!</p>', NULL, 'test-drajv-audi-e-tron:-zagljadivaem-v-novuju-glavu-nemeckogo-premiuma', 'dashboards/image/120244db96a6d30ebb98fc834e0565006b90d.jpeg', '1', NULL, '2019-04-12 08:57:30', '2019-04-14 21:56:50', 3, 4, '[\"dashboards\\/image\\/30\\/142284db96a6d30ebb98fc834e0565006b90d.jpeg\"]'),
(33, 'Пограничники протестировали систему сканирования днища автомобилей', '1', 'Пограничники протестировали систему сканирования днища автомобилей', '<p>В ОАО &laquo;АГАТ-системы управления&raquo; разработали продукт, позволяющий удаленно визуально исследовать днище авто без его остановки.&nbsp;<em>&laquo;Возможности системы также позволяют записывать на видео и делать снимки исследуемых объектов, считывать номера и работать в комплексе с техническими средствами пограничного контроля&raquo;,</em>&nbsp;&mdash; сообщили в ГПК.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/820x5616/f85551fe8820daac5eaf919dc473eef1.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/820x5616/59d5251c9bb720da985bd1adaff9dfc4.jpeg\" /></p>\r\n\r\n<p>Как сообщается, основные задачи системы &mdash; борьба с контрабандой, противодействие терроризму, незаконному обороту наркотиков и оружия. На днях были подведены итоги полугодового эксперимента по применению системы сканирования. Решение об эксплуатации системы будет принято после ее доработки.</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'pogranichniki-protestirovali-sistemu-skanirovanija', 'dashboards/image/16129f216b560ac0ee57e557cadabdaf01c17.jpeg', '1', NULL, '2019-04-19 04:57:14', '2019-04-21 21:59:07', 3, 1, '[\"dashboards\\/image\\/33\\/12260f216b560ac0ee57e557cadabdaf01c17.jpeg\"]'),
(34, 'Новый Porsche 911 дебютировал в Минске. База стоит дороже 130 тысяч евро', 'Porsche 911 дебютировал в Минске', 'Новый Porsche 911 дебютировал в Минске. База стоит дороже 130 тысяч евро', '<p>До Минска наконец доехал Porsche 911 нового поколения. Машина дебютировала в прошлом году, и сегодня ее можно приобрести в Беларуси. Несмотря на внешние сходства со всеми предшественниками, Porsche 911 с индексом 992 &mdash; это абсолютно новая модель. Пока на нашем рынке (как и во всем мире) продаются только две версии 911: Carrera S и Carrera 4S. Цены &mdash; от 132,3 тысячи евро по курсу (на сегодня это 312 889 рублей и 50 копеек).&nbsp;</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/a1c5eb762cff8c1774939448668b26da.jpeg\" /></p>\r\n\r\n<p>Спорткар сменил все детали кузова. 911 стал немного длиннее предшественника, и теперь заднеприводные и полноприводные модификации не отличаются по ширине (раньше AWD-версии были шире). Теперь у Porsche 911 практически весь кузов выполнен из алюминия. Дверные ручки выдвигаются, как у Range Rover Velar.</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/b31d8aee4e90535ae742be644012245f.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/53fbae9bf7f6cb49bafa93c9666d6b27.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/dd0f63d55880d24f260941b021c374bc.jpeg\" /></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/b31d8aee4e90535ae742be644012245f.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/53fbae9bf7f6cb49bafa93c9666d6b27.jpeg\" /></p>\r\n\r\n<p>Если обратите внимание на крышку багажника (он спереди), то заметим, что впервые за 20 лет сюда вернулись продольные &laquo;ребра&raquo;. Сзади элементы оптики объединены LED-полоской, а дополнительный стоп-сигнал выполнен в виде вертикальных элементов (под задним стеклом).</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1400x5616/97fad8f5975ae8863774bac401ac3081.jpeg\" /></p>\r\n\r\n<p>Внутри машина порадует увеличенным дисплеем мультимедийной системы. Раньше диагональ экрана составляла 7 дюймов, теперь &mdash; почти 11 дюймов. Разочаровать здесь может разве что маркий пластик на центральном тоннеле. Вслед за Panamera и Cayenne 911 получил новую приборку. Аналоговым остался только тахометр. Содержание дисплеев на щитке приборов можно настраивать. Клиенты по достоинству оценят новые кресла и систему ночного видения. Имеется и набор камер для формирования картинки 360.</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/87ed26f2dc0e1a65efaf9fc4d624eb84.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/4fcbeb4ca9619b0ec602a67732f261f6.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/ce412d46b3cc41123fc59680bb964955.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/87ed26f2dc0e1a65efaf9fc4d624eb84.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/4fcbeb4ca9619b0ec602a67732f261f6.jpeg\" /></p>\r\n\r\n<p>Самые доступные модификации спорткара получили 20-дюймовые колесные диски спереди и 21-дюймовые сзади. Появился режим Porsche Wet Mode, который активируется автоматически на мокром асфальте.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/54c716ff6ec27871902b81969f64795d.jpeg\" /></p>\r\n\r\n<p>И задне- и полноприводный вариант оснащаются 3-литровым битурбодвигателем, который дебютировал на 911 несколько лет назад. Мотор оснащается новым алюминиевым выпускным коллектором и другой системой впрыска. Мощность выросла с 420 до 450 л. с.</p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/1058f867bde410be6977b004b7d9082a.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/3db46f21d9d37067dc9d55e9df0e3550.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/84b9d2cc64fdb5574b19cbc72233841c.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/650a76822c29b1eac1e4f2bff677d294.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" class=\"img-responsive\" src=\"https://content.onliner.by/news/1100x5616/7d946788a3f61b1dc5e944d23c1c834d.jpeg\" /></p>\r\n\r\n<p>Роль коробки передач выполняет новый &laquo;робот&raquo; PDK, получивший восемь передач. В разработке трансмиссии принимали участие инженеры ZF, и коробка стала даже компактнее предыдущей 7-ступенчатой PDK. Porsche 911 Carrera S набирает сотню за 3,7 секунды. Carrera 4S на 0,1 секунды быстрее. Это без пакета Sport Chrono.</p>', NULL, 'novij-porsche-911-debjutiroval-v-minske', 'dashboards/image/12321pre.jpg', '1', NULL, '2019-04-19 04:58:58', '2019-04-19 12:28:18', 1, 1, '[\"dashboards\\/image\\/34\\/1496524807efb1cd5349fb00e1b9607bf8190.jpeg\"]'),
(35, 'Таможня: за первые дни действия возмещения пошлин ввезли семь машин', 'Возмещение пошлин', 'Таможня: за первые дни действия возмещения пошлин ввезли семь машин', '<p>Нововведение в правилах возмещения таможенных пошлин при ввозе авто вызвало немало обсуждений. Документом предусматривается возмещение из республиканского бюджета 50% таможенных пошлин, налогов, подлежащих уплате при ввозе на территорию РБ одной легковушки в течение года, лицам, имеющим инвалидность I либо II группы, а также многодетным семьям. Сразу возникли разговоры, что к указанным лицам потянутся перекупы, чтобы с их помощью ввозить авто с льготами. Onliner уточнил у ГТК, вызвал ли документ ажиотаж на границе?</p>\r\n\r\n<p>Указ №140 вступил в силу 13 апреля, то есть пять дней назад. За это время, как нам рассказали в таможенном комитете, воспользовалось льготой семь человек (как многодетные родители, так и инвалиды I и II группы). Самый популярный сегмент &mdash; &laquo;бюджетки&raquo; 2015 года выпуска. Все люди, уже воспользовавшиеся возможностью, &mdash; из регионов, не из столицы.</p>\r\n\r\n<p>Толки об обвале рынка за счет таких машин и манипуляций с льготными слоями населения со стороны перекупов можно считать преувеличенными. Хоть указом и не предусмотрены ограничения по пользованию и распоряжению транспортными средствами (то есть авто можно перепродавать), воспользоваться возмещением можно не чаще чем раз в год.</p>', NULL, 'tamozhnja:-za-pervie-dni-dejstvija-vozmeshhenija-poshlin-vvezli-sem-mashin', 'dashboards/image/1561746f3d00f0697e8d2b68900a98d588c3a.jpeg', '1', NULL, '2019-04-19 05:01:09', '2019-04-21 17:58:40', 17, 1, '[\"dashboards\\/image\\/35\\/1700146f3d00f0697e8d2b68900a98d588c3a.jpeg\"]'),
(36, 'Ferrari не рассчитывает на доминирование в Баку', 'Формула 1', 'Ferrari не рассчитывает на доминирование в Баку', '<p>Руководитель Ferrari Маттиа Бинотто преуменьшил ожидания по поводу того, что в Баку у Скудерии будет значительное преимущество над Mercedes.</p>\r\n\r\n<p>Предполагается, что за счёт высокой максимальной скорости Скудерия в Сахире и Шанхае отыгрывала больше полусекунды у всех конкурентов, хотя и теряла время в поворотах. И на трассе в Баку с длинной главной прямой, где максимальная скорость достигает 370 км/ч, такое преимущество может сыграть важную роль.</p>\r\n\r\n<p>&laquo;В Китае Mercedes была очень сильна в плане скорости на прямых. Так что я не считаю, что у нас есть большое преимущество над всеми остальными, &ndash; цитирует Бинотто&nbsp;<em>RaceFans</em>. &ndash; К тому же, на трассе в Баку не только длинные прямые, но и большое количество поворотов. Поэтому мощность двигателя там далеко не главное, аэродинамика тоже имеет значение.</p>\r\n\r\n<p>Это достаточно требовательная к машине трасса. Так что посмотрим&raquo;.</p>', NULL, 'ferrari-ne-rasschitivaet-na-dominirovanie-v-baku', 'dashboards/image/14314pre2.jpg', '1', NULL, '2019-04-19 05:14:40', '2019-04-20 09:51:47', 4, 2, '[\"dashboards\\/image\\/36\\/1619794447-580beeea-3dff-4349-a657-56cbd35e0c9a.jpg\"]');

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `meta_title` text,
  `meta_desc` text,
  `title` varchar(255) NOT NULL,
  `content` text,
  `desc` text,
  `alias` varchar(150) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `userlikeids` varchar(255) DEFAULT NULL,
  `view_count` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `slider_photo` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `meta_title`, `meta_desc`, `title`, `content`, `desc`, `alias`, `img`, `author`, `userlikeids`, `view_count`, `category_id`, `slider_photo`, `created_at`, `updated_at`) VALUES
(3, 'MINI Clubman S #Lowcarsmeet', NULL, 'MINI Clubman S #Lowcarsmeet', '<p>Наш канал LOW CARS MEET на youtube:&nbsp;<a href=\"http://www.youtube.com/c/lowcarsmeet\" rel=\"nofollow noopener\" target=\"_blank\">www.youtube.com/c/lowcarsmeet</a></p>\r\n\r\n<p>Всем привет!<br />\r\nГотов представить вам последствия самого неожиданного и странного поступка за последнее время) Как многие уже догадались, речь пойдет о покупке автомобиля.<br />\r\nДа, это миник. Да, он женский) Да, он с 6 дверьми. Нет, он не будет высоким слишком долго)<br />\r\nПока машина у меня всего 4 дня, и рассказать о ней толком ничего не могу. Да и из-за обилия эмоций я врядли смогу сформулировать что-то членораздельное)))</p>\r\n\r\n<h3>Паспортные данные</h3>\r\n\r\n<ul>\r\n	<li>Двигатель 2.0 бензиновый (196 л.с.)</li>\r\n	<li>Автоматическая коробка передач</li>\r\n	<li>Передний привод</li>\r\n	<li>Машина 2016 года выпуска, покупалась в 2017 году</li>\r\n	<li><a href=\"https://www.drive2.ru/cars/mini/clubman_s/g5098/\">MINI Clubman S (2nd generation)</a>&nbsp;выпускается с 2015 года</li>\r\n</ul>', NULL, 'mini-clubman-s', 'dashboards/image/project/124923e2c41ds-960.jpg', '1', NULL, '39', '1', '[\"dashboards\\/image\\/project\\/3\\/188493e2c41ds-960.jpg\",\"dashboards\\/image\\/project\\/3\\/178854d2c41ds-960.jpg\",\"dashboards\\/image\\/project\\/3\\/116615453ac5s-960.jpg\",\"dashboards\\/image\\/project\\/3\\/16823kxGV37jFiDw.jpg\"]', '2019-04-19 04:22:00', '2019-04-22 16:03:36'),
(4, 'Mitsubishi Galant VR-4 Красный Октябрь', NULL, 'Mitsubishi Galant VR-4 Красный Октябрь', '<p>Mitsubishi galant vr-4 EC5A<br />\r\nПостоянный 4wd // 6a13tt 280hp</p>\r\n\r\n<p>--- Обожаю эту модель Митсу, думаю, что все последние модели завода выросли именно из этого кузова. Самый удачный дизайн седана бизнес класса от Япошек.</p>\r\n\r\n<p>--- История у машины очень большая т.к. я на нем езжу очень давно и продавать не хочу. Тот самый случай, когда машина не может надоесть.</p>\r\n\r\n<p>--- Я считаю, что после 2000-ых годов, автомобили стали терять свою душу. Если это отнести к данной модели, то Галант после 2000 года деградировал на столько, что даже слов не подобрать.</p>\r\n\r\n<p>Немного сетапа:</p>\r\n\r\n<p>-Тормоза Brembo<br />\r\n-Колодки поющие Endless<br />\r\n-Поющие тормозные диски Powerslot<br />\r\n-Блоуджоб HKS SSQV<br />\r\n-Выпуск Fujitsubo<br />\r\n-Колеса Work XT718 x 9.5 -22<br />\r\n-По кругу накладки Super vr-4<br />\r\n-Какая то редкая Японская губа.<br />\r\n-Крыло 326power<br />\r\n-Пневмо подвеска Accuair x Airride<br />\r\n-Стойки под подушками Cusco zero 2<br />\r\n-Зеркала Ganador<br />\r\n-Передние сиденья Recaro (evo10)<br />\r\n-Доп багажник на крыше INNO</p>\r\n\r\n<h3>Паспортные данные</h3>\r\n\r\n<ul>\r\n	<li>Двигатель 2.5 бензиновый (280 л.с.)</li>\r\n	<li>Автоматическая коробка передач</li>\r\n	<li>Полный привод</li>\r\n	<li>Машина 1999 года выпуска, была куплена в 2004 году</li>\r\n	<li><a href=\"https://www.drive2.ru/cars/mitsubishi/galant_vr_4/g1499/\">Mitsubishi Galant VR-4</a>&nbsp;выпускается с 1988 года</li>\r\n</ul>', NULL, 'mitsubishi-galant-vr-4-krasnij-oktjabr', 'dashboards/image/project/171691.PNG', '1', NULL, '65', '1', '[\"dashboards\\/image\\/project\\/4\\/157451.PNG\",\"dashboards\\/image\\/project\\/4\\/192692.PNG\",\"dashboards\\/image\\/project\\/4\\/151983.PNG\",\"dashboards\\/image\\/project\\/4\\/119364.PNG\"]', '2019-04-19 04:39:30', '2019-04-22 16:03:44'),
(5, 'Land Rover Range Rover Sport SVR BigBoss', NULL, 'Land Rover Range Rover Sport SVR BigBoss', '<p>Это новый отмороженный зверь.</p>\r\n\r\n<p>Под карбоновой крышкой двигателя скрывается могучий 5.0 компрессорный движок,<br />\r\nмощность 550 л.с. 680 н/м.</p>\r\n\r\n<p>Эта мощность может разогнать вседорожник, массой 2300 кг., за 4,5 секунды до ста. Что позволяет быть этому автомобилю в топе быстрейших джипов планеты. А максимальная скорость ограничена электроникой на отметке 260 км/ч.</p>\r\n\r\n<p>А выхлоп! Просто нет слов! с открытой заслонкой даже некоторые владельцы АМГ Мерседесов считают его лучшим. А он действительно невероятно звучит!</p>\r\n\r\n<p><em><strong>Экстерьер</strong></em></p>\r\n\r\n<p>Range Rover Sport SVR съехад с конвеера завода в шикарном эксклюзивном синем премиум-металлике Estoril Blue, доступном только для комплектации SVR.</p>\r\n\r\n<p>На кованных 21-дюймовых дисках &laquo;Style 517&raquo;.</p>\r\n\r\n<p>Сверху сдвижная полноразмерная панорамная крыша черного цвета.</p>\r\n\r\n<p>Автомобиль отличается иными бамперами, порогами, и жабрами на крыльях.</p>\r\n\r\n<p><em><strong>Интерьер</strong></em></p>\r\n\r\n<p>Салон автомобиля исполнен в черном цвете из перфорированной кожи Oxford. Ковши c cимволикой SVR. Потолок из черной ткани Ebony Morzine.</p>\r\n\r\n<p>В отделке интерьера используются карбоновые вставки на рулевом колесе, дверях и центральной консоли</p>\r\n\r\n<p>По периметру салона используется регулируемая светодиодная подсветку салона.</p>\r\n\r\n<p>А аудиосистема установлена Meridian&trade; Signature Reference.<br />\r\nЭто 22-канальная аудиосистема премиум-класса мощностью 1700 Вт с 22 динамиками, 4 динамиками, расположенными вдоль линии крыши, и двухканальным сабвуфером обеспечивает невероятно реалистичное звучание. Хотя все системы обладают высоким качеством звука, версия мощностью 1700 Вт оснащается технологией Meridian&trade; Trifield* 3D, которая обеспечивает улучшенный контроль звучания объемных и боковых каналов, а также подает дополнительный сигнал на верхние динамики.</p>\r\n\r\n<p><em><strong>На дороге</strong></em></p>\r\n\r\n<p>На дороге ведет себя очень уверенно. А открытая заслонка выхлопной системы провоцирует на активную езду, которой круто помогает режим Динамик. По факту авто превращается в трековый джип с минимальными кренами в поворотах.</p>\r\n\r\n<p><em><strong>На Бездорожье</strong></em></p>\r\n\r\n<p>Пока не ездил, но считается он одним из лучших в классе.</p>\r\n\r\n<p><em><strong>Расход топлива</strong></em><br />\r\nПроизводитель говорить о следующем расходе:</p>\r\n\r\n<p>Расход топлива в городском цикле, л/100 км: 18,3<br />\r\nРасход топлива в загородном цикле, л/100 км: 9,8<br />\r\nКомбинированный расход топлива, л/100 км: 12,8</p>\r\n\r\n<p>И он близок к реальности, за исключением одной вещи. Что бы он был такой, ездить надо по правилам, т.е. не превышая разрешенную скорость, а обороты не должны переваливать за 2.000 -2.500.<br />\r\nТогда в городском цикле можно добиться результатов и в 14,5-15 литров на сто км. Но в таком случае надо было покупать другой автомобиль.<br />\r\nНа деле у меня в городском режиме средний расход около 25л. на сто км. Если же постоянно на нем вжаривать, то он будет примерно 40-50 л. на сто км.</p>\r\n\r\n<p>А бак у автомобиля 105 литров.</p>\r\n\r\n<p><em><strong>Планы на будущее</strong></em></p>\r\n\r\n<p>1. Цвет кузова &mdash; синий матовый хром.<br />\r\n2. Диски &mdash; Американская ковка.<br />\r\n3. Рестайлинг 2018<br />\r\n4. Увеличение мощности до 620 л.с.<br />\r\n5. Мультимедиа 2017</p>\r\n\r\n<h3>Паспортные данные</h3>\r\n\r\n<ul>\r\n	<li>Двигатель 5.0 бензиновый (550 л.с.)</li>\r\n	<li>Автоматическая коробка передач</li>\r\n	<li>Полный привод</li>\r\n	<li>Машина 2015 года выпуска, была куплена в 2017 году</li>\r\n</ul>', NULL, 'land-rover-range-rover-sport-svr-bigboss', 'dashboards/image/project/1903711.PNG', '2', NULL, '208', '1', '[\"dashboards\\/image\\/project\\/1\\/1338033.PNG\",\"dashboards\\/image\\/project\\/1\\/1301944.PNG\",\"dashboards\\/image\\/project\\/1\\/1943911.PNG\",\"dashboards\\/image\\/project\\/1\\/1357122.PNG\"]', '2019-04-19 11:55:14', '2019-04-22 15:41:52');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2019-03-26 20:18:00', '2019-03-26 20:18:00'),
(2, 'user', 'web', '2019-03-26 20:18:00', '2019-03-26 20:18:00'),
(3, 'commenter', 'web', '2019-03-26 20:18:00', '2019-03-26 20:18:00'),
(4, 'moderator', 'web', '2019-03-26 20:18:00', '2019-03-26 20:18:00');

-- --------------------------------------------------------

--
-- Структура таблицы `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(10000002, 1),
(10000003, 1),
(10000004, 1),
(10000005, 1),
(10000006, 1),
(10000007, 1),
(10000008, 1),
(10000009, 1),
(10000010, 1),
(10000011, 1),
(10000012, 1),
(10000013, 1),
(10000003, 2),
(10000006, 2),
(10000003, 3),
(10000006, 3),
(10000007, 3),
(10000008, 3),
(10000009, 3),
(10000003, 4),
(10000006, 4),
(10000007, 4),
(10000008, 4),
(10000009, 4),
(10000010, 4),
(10000011, 4),
(10000012, 4),
(10000013, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text,
  `alias` text NOT NULL,
  `author_id` text,
  `view_count` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sudo` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1',
  `img` varchar(255) NOT NULL DEFAULT 'public/dashboards/user.png',
  `about` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `sudo`, `level`, `img`, `about`) VALUES
(1, 'Admin', 'faggs241w@mail.ru', NULL, '$2y$10$0OusjQsiG0lVp/tYLhxMlO3U1hJzcN557MkQB6Qs.hW3PJCB2CQIy', NULL, '2019-03-24 15:36:18', '2019-03-24 15:36:18', 1, 1, 'public/dashboards/user.png', NULL),
(2, 'User', 'faggs241@mail.ru', NULL, '$2y$10$wmk2dh/G.LEZj49rGcgD3uhug8IIcHO/eIbPzczvtZ53UahX182DO', 'Pfgbp8ajJzmYrCDZsKipvOQyvsQRoJHbZdHAVkWsc3MbgUEoNEy6ENIRuiiL', '2019-03-24 16:15:13', '2019-04-21 14:24:03', 0, 1, 'public/dashboards/user.png', NULL),
(3, 'test user 2-1', 'user2@mail.ru', NULL, '$2y$10$rorvfyz/vLwIB6/4h0mk6etoa4ERADsyCY1FNJqhG04PuBWfKUMmS', NULL, '2019-03-27 19:34:28', '2019-03-27 19:34:54', 0, 1, 'public/dashboards/user.png', NULL),
(4, 'test user -2', 'user3@mail.ru', NULL, '$2y$10$QIqgG8ptql8b//Cm5z7VkuAJTT3KrUH19xIlV4JeKBCBVXxQe3/AG', NULL, '2019-03-27 19:35:27', '2019-03-27 19:35:27', 0, 1, 'public/dashboards/user.png', NULL),
(7, 'test-poller1-1', 'user@mail.ru', NULL, '$2y$10$oTn2iqexqD4eYqf6tVReNuRijXlSDLO2NSmCCh8M3GoeZbUWQjNXm', NULL, '2019-03-31 23:09:25', '2019-04-01 02:28:59', 0, 1, 'public/dashboards/user.png', NULL),
(10, 'Дима', 'patrioff@gmail.com', NULL, '$2y$10$FbhmjyUZafPrGLn8WLpdFukyjpXHXfyJ.8bcLQLCcAZ7guuOSkXBC', NULL, '2019-04-19 12:32:41', '2019-04-19 12:32:41', 0, 1, 'public/dashboards/user.png', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blockers`
--
ALTER TABLE `blockers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dashboards`
--
ALTER TABLE `dashboards`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likeables`
--
ALTER TABLE `likeables`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likers`
--
ALTER TABLE `likers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `posts_alias_unique` (`alias`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_id_unique` (`id`),
  ADD UNIQUE KEY `projects_alias_unique` (`alias`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blockers`
--
ALTER TABLE `blockers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `likeables`
--
ALTER TABLE `likeables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `likers`
--
ALTER TABLE `likers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000014;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
