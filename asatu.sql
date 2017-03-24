-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 24 2017 г., 06:22
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `asatu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `restoran_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `cost_item` int(11) DEFAULT NULL,
  `note` text,
  `photo` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `restoran_id`, `cat_id`, `title`, `cost_item`, `note`, `photo`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 2, 15, 'asdfsdf', 500, '<p>asdfasdf</p>', '/upload/logo/1489985409_66052026.jpg', 1, '2017-03-20 04:50:09', '2017-03-20 04:50:09');

-- --------------------------------------------------------

--
-- Структура таблицы `moderators`
--

CREATE TABLE `moderators` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `s_name` varchar(255) DEFAULT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `total_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `moderators`
--

INSERT INTO `moderators` (`id`, `user_id`, `f_name`, `s_name`, `p_name`, `total_name`, `phone`, `address`, `note`, `created_at`, `updated_at`) VALUES
(3, 5, 'Наименование', 'Snow', 'newport', 'Snow наименование Newport', '123123', '123123', 'sdfsdf', '2017-03-16 11:04:03', '2017-03-16 11:04:03'),
(4, 6, 'Имя', 'Фамилия', 'Отчество', 'фамилия имя отчество', 'Телефон', 'Адресс', 'Заметка', '2017-03-16 11:22:42', '2017-03-16 11:22:42');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `restoran_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `total_sum` float DEFAULT NULL,
  `promo_key` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `note` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `count_item` int(11) DEFAULT NULL,
  `cost_item` int(11) DEFAULT NULL,
  `cost_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_note` text,
  `note` text,
  `title_kz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `short_note_kz` text,
  `short_note_en` text,
  `note_kz` longtext,
  `note_en` longtext,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `type_id`, `alias`, `photo`, `title`, `short_note`, `note`, `title_kz`, `title_en`, `short_note_kz`, `short_note_en`, `note_kz`, `note_en`, `updated_at`, `created_at`) VALUES
(1, 11, 'нazvanie-stati', '/upload/photo/1489751887_Koala.jpg', 'Название статьи', '<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях111</p>', '<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних&nbsp;2222</p>', 'Заголовок на казахском:', 'тексттексттексттексттексттексттекст', '<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях3333</p>', '<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях55555</p>', '<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях4444</p>', '<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях6666</p>', '2017-03-17 11:58:08', '2017-03-17 06:39:03');

-- --------------------------------------------------------

--
-- Структура таблицы `restoran`
--

CREATE TABLE `restoran` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `raiting` float DEFAULT '0',
  `is_open` tinyint(4) DEFAULT '0',
  `is_platinum` tinyint(4) DEFAULT '0',
  `is_gold` tinyint(4) DEFAULT '0',
  `epay` tinyint(4) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `restoran`
--

INSERT INTO `restoran` (`id`, `user_id`, `city_id`, `photo`, `logo`, `name`, `raiting`, `is_open`, `is_platinum`, `is_gold`, `epay`, `updated_at`, `created_at`) VALUES
(2, 8, 13, '/upload/logo/1489922573_66052026.jpg', '/upload/logo/1489922573_66052026.jpg', 'Название 3452345:', 0, 0, 1, 0, 1, '2017-03-20 06:51:32', '2017-03-19 11:22:53');

-- --------------------------------------------------------

--
-- Структура таблицы `restoran_data`
--

CREATE TABLE `restoran_data` (
  `id` int(11) NOT NULL,
  `restoran_id` int(11) DEFAULT NULL,
  `short_note` text,
  `note` text,
  `min_price` int(11) DEFAULT NULL,
  `delivery_price` int(11) DEFAULT NULL,
  `delivery_duration` varchar(255) DEFAULT NULL,
  `contacts` varchar(255) DEFAULT NULL,
  `director_name` varchar(255) DEFAULT NULL,
  `director_contacts` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `restoran_data`
--

INSERT INTO `restoran_data` (`id`, `restoran_id`, `short_note`, `note`, `min_price`, `delivery_price`, `delivery_duration`, `contacts`, `director_name`, `director_contacts`, `address`) VALUES
(1, 2, '<p>Краткое описание</p>', '<p>Полное описание</p>', 200, NULL, NULL, 'Контакты', 'Ф.И.О директора', 'Контакты директора', 'Ул абая 59');

-- --------------------------------------------------------

--
-- Структура таблицы `restoran_distance`
--

CREATE TABLE `restoran_distance` (
  `id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `restoran_id` int(11) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `restoran_kicthen`
--

CREATE TABLE `restoran_kicthen` (
  `id` int(11) NOT NULL,
  `restoran_id` int(11) DEFAULT NULL,
  `kitchen_id` int(11) DEFAULT NULL,
  `kitchen_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `restoran_kicthen`
--

INSERT INTO `restoran_kicthen` (`id`, `restoran_id`, `kitchen_id`, `kitchen_name`) VALUES
(15, 2, 15, 'Китайская'),
(16, 2, 17, 'Бергер');

-- --------------------------------------------------------

--
-- Структура таблицы `restoran_location`
--

CREATE TABLE `restoran_location` (
  `id` int(11) NOT NULL,
  `restoran_id` int(11) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `restoran_location`
--

INSERT INTO `restoran_location` (`id`, `restoran_id`, `lng`, `lat`, `name`, `address`) VALUES
(1, 2, '15', '15', 'Наименование точки:', 'Адресс'),
(8, 2, '51.15748719', '71.40255246', 'asdasd', 'Dubai, 12312');

-- --------------------------------------------------------

--
-- Структура таблицы `restoran_raiting`
--

CREATE TABLE `restoran_raiting` (
  `id` int(11) NOT NULL,
  `restoran_id` int(11) DEFAULT NULL,
  `vote_count` int(11) DEFAULT '0',
  `vote_sum` int(11) DEFAULT '0',
  `vote_avg` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `restoran_raiting`
--

INSERT INTO `restoran_raiting` (`id`, `restoran_id`, `vote_count`, `vote_sum`, `vote_avg`) VALUES
(1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `restoran_id` int(11) DEFAULT NULL,
  `raiting` tinyint(4) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `name`) VALUES
(2, 'facebook', '22'),
(3, 'twitter', '222222222222'),
(4, 'email', 'admin@mail.ru'),
(5, 'title', 'asdasdasdasd'),
(6, 'max_image', '2'),
(7, 'instagramm', '33'),
(8, 'main_phone', '346488'),
(9, 'vk', '11');

-- --------------------------------------------------------

--
-- Структура таблицы `static_pages`
--

CREATE TABLE `static_pages` (
  `id` int(11) NOT NULL,
  `sys_key` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` longtext,
  `short_note` longtext,
  `title_kz` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `short_note_kz` text,
  `short_note_en` text,
  `note_kz` longtext,
  `note_en` longtext,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `static_pages`
--

INSERT INTO `static_pages` (`id`, `sys_key`, `title`, `note`, `short_note`, `title_kz`, `title_en`, `short_note_kz`, `short_note_en`, `note_kz`, `note_en`, `updated_at`, `created_at`) VALUES
(4, 'about', 'ЕДИНЫЙ СЕРВИС ДОСТАВКИ \"ASAKELU\"', '', '<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия по своей сути рыбатекст является альтернативой традиционному...</p>', 'ЕДИНЫЙ СЕРВИС ДОСТАВКИ \"ASAKELU\"', 'ЕДИНЫЙ СЕРВИС ДОСТАВКИ \"ASAKELU\"', '', '', '', '', '2017-03-17 11:33:33', '2017-03-17 11:30:20');

-- --------------------------------------------------------

--
-- Структура таблицы `sys_directory`
--

CREATE TABLE `sys_directory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `note` text,
  `can_del` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_directory`
--

INSERT INTO `sys_directory` (`id`, `name`, `note`, `can_del`, `created_at`, `updated_at`) VALUES
(1, 'типы пользователей', 'справочник типов пользователей', 0, '2017-03-07 11:22:55', '2017-03-07 11:22:52'),
(2, 'языки', 'справочник языков', 0, '2017-03-07 11:23:30', '2017-03-07 11:23:32'),
(3, 'города', 'спрвочник городов', 0, '2017-03-07 18:05:32', '2017-03-07 18:05:37'),
(4, 'категории блюд', 'спрвочник категорий блюд', 0, '2017-03-07 18:05:47', '2017-03-07 18:05:49'),
(5, 'кухни', 'справочник кухонь', 0, '2017-03-09 15:03:25', '2017-03-09 15:03:27'),
(6, 'типы страниц', 'типы страниц', 0, '2017-03-17 12:02:32', '2017-03-17 12:02:34');

-- --------------------------------------------------------

--
-- Структура таблицы `sys_directory_names`
--

CREATE TABLE `sys_directory_names` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text,
  `sys_key` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_directory_names`
--

INSERT INTO `sys_directory_names` (`id`, `parent_id`, `name`, `note`, `sys_key`, `created_at`, `updated_at`) VALUES
(1, 1, 'администратор', NULL, 'admin', '2017-03-07 11:25:20', '2017-03-07 11:25:22'),
(2, 1, 'модераторы', NULL, 'moderator', '2017-03-07 11:25:45', '2017-03-07 11:25:46'),
(3, 1, 'рестораны', NULL, 'restoran', '2017-03-07 11:26:10', '2017-03-07 11:26:12'),
(4, 1, 'пользователи', NULL, 'customer', '2017-02-07 11:26:40', '2017-03-07 11:26:42'),
(5, 2, 'русский', NULL, 'ru', '2017-03-07 11:27:21', '2017-03-07 11:27:27'),
(6, 2, 'казахский', NULL, 'kz', '2017-03-07 11:27:22', '2017-03-07 11:27:29'),
(7, 2, 'английский', NULL, 'en', '2017-03-07 11:27:24', '2017-03-07 11:27:30'),
(8, 2, 'китайский', NULL, 'ch', '2017-02-07 11:27:25', '2017-03-07 11:27:32'),
(9, 3, 'астана', NULL, 'astana', '2017-03-07 11:28:58', '2017-03-07 11:28:59'),
(10, 4, 'лапша', NULL, NULL, '2017-03-07 18:06:29', '2017-03-07 18:06:31'),
(11, 6, 'Полезные статьи', NULL, 'article', '2017-03-17 12:07:32', '2017-03-17 12:07:38'),
(12, 6, 'Новости', NULL, 'news', '2017-03-17 12:08:41', '2017-03-17 12:07:35'),
(13, 3, 'Алмата', 'фывфыв', 'almaty', '2017-03-17 09:10:23', '2017-03-17 09:12:14'),
(15, 5, 'Китайская', '', 'chiese_kitchen', '2017-03-17 09:17:54', '2017-03-17 09:17:54'),
(16, 5, 'Русская', '', 'russian_kitchen', '2017-03-17 09:18:14', '2017-03-17 09:18:14'),
(17, 5, 'Бергер', 'фывфыв', '2312312', '2017-03-17 09:30:52', '2017-03-17 09:30:52');

-- --------------------------------------------------------

--
-- Структура таблицы `trans_lib`
--

CREATE TABLE `trans_lib` (
  `id` int(11) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `trans_ru` varchar(255) DEFAULT NULL,
  `trans_kz` varchar(255) DEFAULT NULL,
  `trans_en` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trans_lib`
--

INSERT INTO `trans_lib` (`id`, `key`, `trans_ru`, `trans_kz`, `trans_en`) VALUES
(1, 'sys_directory_name_1', 'администратор', NULL, NULL),
(2, 'sys_directory_name_2', 'модераторы', NULL, NULL),
(3, 'sys_directory_name_3', 'рестораны', NULL, NULL),
(4, 'sys_directory_name_4', 'пользователи', NULL, NULL),
(5, 'sys_directory_name_5', 'русский', NULL, NULL),
(6, 'sys_directory_name_6', 'казахский', NULL, NULL),
(7, 'sys_directory_name_7', 'английский', NULL, NULL),
(8, 'sys_directory_name_8', 'китайский', NULL, NULL),
(9, 'sys_directory_name_9', 'Астана', '', ''),
(10, 'sys_directory_name_10', 'лапша', NULL, NULL),
(11, 'sys_directory_name_11', 'Полезные статьи', NULL, NULL),
(12, 'sys_directory_name_12', 'Новости', NULL, NULL),
(13, 'sys_directory_name_13', 'Алмата', NULL, NULL),
(14, 'sys_directory_name_15', 'Китайская', NULL, NULL),
(15, 'sys_directory_name_16', 'Русская', NULL, NULL),
(16, 'sys_directory_name_17', 'Бергер', NULL, NULL),
(17, 'select_restoran', 'Выберите ресторан', '', ''),
(18, 'reserve_meal', 'Закажите еду', '', ''),
(19, 'food_will_come', 'Ваша еда уже в пути!', '', ''),
(20, 'enter_registr', 'Войти / Зарегистрироваться', '', ''),
(21, 'logout', 'Выйти', '', ''),
(22, 'gave_with_love', 'доставим с любовью', '', ''),
(23, 'city', 'ГОРОД', '', ''),
(24, 'want_eat', 'покорми меня', '', ''),
(25, 'street', 'УЛИЦА', '', ''),
(26, 'about', 'О компании', '', ''),
(27, 'how_we_work', 'Как мы работаем', '', ''),
(28, 'registr_restoran', 'Регистрация заведений', '', ''),
(29, 'copyright', 'Все права защищены © 2017 год', '', ''),
(30, 'private_policy', 'Политика конфидециальности', '', ''),
(31, 'user_agreement', 'Пользовательское соглашение', '', ''),
(32, 'helpfull_info', 'полезная информация', '', ''),
(33, 'news', 'Новости', '', ''),
(34, 'about_title', 'Единый сервис доставки \"Asakelu\"', '', ''),
(35, 'main_title', 'Главная', '', ''),
(36, 'second_main_title', 'единый сервис доставки еды!', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `remember_token`, `type_id`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$u.YnUsdCLxKtZ1fysdUnDOFX0CRI8sZnOZ6p.v9vCAHAz1wU5P/KW', 'admin@mail.ru', 'DtgHSR7oNx7N3ajczutrDklOMraOgJytp9S4HQa2TTLMF7bMS1hic2Wz45L5', 1, '2017-03-15 10:05:22', '2017-03-17 12:23:47'),
(5, '$2y$10$Se9zsMYsWbC65/ROh/JZA.XexhMgu8.xwrngk7QH1AtFsj.QdmuAm', 'hmurich@mail.ru', 'zFomCGKrpcPEnLScrZt5sK7tDz3Z6W7MihJulfFUgC4huefK7pLQPZysm8aV', 2, '2017-03-16 11:04:03', '2017-03-24 04:52:52'),
(6, '$2y$10$Qs9Ew6fvS/br7elrff5YUumGmMVxIoHHKm1WiRJKeQicqI6ZsUjY.', 'moderator@mail.ru', NULL, 2, '2017-03-16 11:22:42', '2017-03-16 11:22:42'),
(8, '$2y$10$FpWCaVyLubt25Rb2fdukI.QpJkMGDQhxL1ePEk2CLbcDhBQFt1OJ.', 'kiopbaxt@yomail.info', NULL, 3, '2017-03-19 11:22:53', '2017-03-19 11:22:53');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_customers_user_id` (`user_id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_restoran_menu_restoran_id` (`restoran_id`),
  ADD KEY `FK_restoran_menu_cat_id` (`cat_id`);

--
-- Индексы таблицы `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_modertors_user_id` (`user_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_orders_customer_id` (`customer_id`),
  ADD KEY `FK_orders_restoran_id` (`restoran_id`),
  ADD KEY `FK_orders_status_id` (`status_id`);

--
-- Индексы таблицы `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_order_history_order_id` (`order_id`),
  ADD KEY `FK_order_history_status_id` (`status_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_order_items_order_id` (`order_id`),
  ADD KEY `FK_order_items_menu_id` (`menu_id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_pages_type_id` (`type_id`);

--
-- Индексы таблицы `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_restoran_user_id` (`user_id`),
  ADD KEY `FK_restoran_city_id` (`city_id`);

--
-- Индексы таблицы `restoran_data`
--
ALTER TABLE `restoran_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_restoran_data_restoran_id` (`restoran_id`);

--
-- Индексы таблицы `restoran_distance`
--
ALTER TABLE `restoran_distance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_restoran_distance_location_` (`location_id`),
  ADD KEY `FK_restoran_distance_restoran_` (`restoran_id`);

--
-- Индексы таблицы `restoran_kicthen`
--
ALTER TABLE `restoran_kicthen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_restoran_kicthen_restoran_i` (`restoran_id`),
  ADD KEY `FK_restoran_kicthen_kitchen_id` (`kitchen_id`);

--
-- Индексы таблицы `restoran_location`
--
ALTER TABLE `restoran_location`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_restoran_location_restoran_` (`restoran_id`);

--
-- Индексы таблицы `restoran_raiting`
--
ALTER TABLE `restoran_raiting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_raitings_restoran_id` (`restoran_id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_review_restoran_id` (`restoran_id`);

--
-- Индексы таблицы `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_site_settings_setting_id` (`key`);

--
-- Индексы таблицы `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `sys_directory`
--
ALTER TABLE `sys_directory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `sys_directory_names`
--
ALTER TABLE `sys_directory_names`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_sys_directory_names_parent_` (`parent_id`);

--
-- Индексы таблицы `trans_lib`
--
ALTER TABLE `trans_lib`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_users_type_id` (`type_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `moderators`
--
ALTER TABLE `moderators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `restoran`
--
ALTER TABLE `restoran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `restoran_data`
--
ALTER TABLE `restoran_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `restoran_distance`
--
ALTER TABLE `restoran_distance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `restoran_kicthen`
--
ALTER TABLE `restoran_kicthen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `restoran_location`
--
ALTER TABLE `restoran_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `restoran_raiting`
--
ALTER TABLE `restoran_raiting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `sys_directory`
--
ALTER TABLE `sys_directory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `sys_directory_names`
--
ALTER TABLE `sys_directory_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `trans_lib`
--
ALTER TABLE `trans_lib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `FK_customers_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_restoran_menu_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_restoran_menu_restoran_id` FOREIGN KEY (`restoran_id`) REFERENCES `restoran` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `moderators`
--
ALTER TABLE `moderators`
  ADD CONSTRAINT `FK_modertors_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_orders_restoran_id` FOREIGN KEY (`restoran_id`) REFERENCES `restoran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_orders_status_id` FOREIGN KEY (`status_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `FK_order_history_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_order_history_status_id` FOREIGN KEY (`status_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `FK_order_items_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_order_items_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `FK_pages_type_id` FOREIGN KEY (`type_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `restoran`
--
ALTER TABLE `restoran`
  ADD CONSTRAINT `FK_restoran_city_id` FOREIGN KEY (`city_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_restoran_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `restoran_data`
--
ALTER TABLE `restoran_data`
  ADD CONSTRAINT `FK_restoran_data_restoran_id` FOREIGN KEY (`restoran_id`) REFERENCES `restoran` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `restoran_distance`
--
ALTER TABLE `restoran_distance`
  ADD CONSTRAINT `FK_restoran_distance_location_` FOREIGN KEY (`location_id`) REFERENCES `restoran_location` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_restoran_distance_restoran_` FOREIGN KEY (`restoran_id`) REFERENCES `restoran` (`id`) ON DELETE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `restoran_kicthen`
--
ALTER TABLE `restoran_kicthen`
  ADD CONSTRAINT `FK_restoran_kicthen_kitchen_id` FOREIGN KEY (`kitchen_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_restoran_kicthen_restoran_i` FOREIGN KEY (`restoran_id`) REFERENCES `restoran` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `restoran_location`
--
ALTER TABLE `restoran_location`
  ADD CONSTRAINT `FK_restoran_location_restoran_` FOREIGN KEY (`restoran_id`) REFERENCES `restoran` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `restoran_raiting`
--
ALTER TABLE `restoran_raiting`
  ADD CONSTRAINT `FK_raitings_restoran_id` FOREIGN KEY (`restoran_id`) REFERENCES `restoran` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_review_restoran_id` FOREIGN KEY (`restoran_id`) REFERENCES `restoran` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sys_directory_names`
--
ALTER TABLE `sys_directory_names`
  ADD CONSTRAINT `FK_sys_directory_names_parent_` FOREIGN KEY (`parent_id`) REFERENCES `sys_directory` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_type_id` FOREIGN KEY (`type_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
