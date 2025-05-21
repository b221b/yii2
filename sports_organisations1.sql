-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2025 г., 16:55
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sports_organisations`
--

-- --------------------------------------------------------

--
-- Структура таблицы `competitions`
--

CREATE TABLE `competitions` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_structure` int NOT NULL,
  `id_kind_of_sport` int NOT NULL,
  `event_date` date NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `competitions`
--

INSERT INTO `competitions` (`id`, `name`, `id_structure`, `id_kind_of_sport`, `event_date`, `description`) VALUES
(1, 'Зимний кубок123', 1, 1, '2021-09-20', 'В этом захватывающем соревновании участники продемонстрируют свои навыки и мастерство в различных дисциплинах, соревнуясь за почетное звание победителя. Каждый из них прошел долгий путь подготовки и тренировок, чтобы достичь этого момента.'),
(2, 'Весенний кубок', 5, 3, '2021-09-21', 'Событие, собравшее лучших представителей своего вида спорта, обещает стать настоящим праздником для всех любителей активного образа жизни.'),
(3, 'Летний кубок', 3, 2, '2020-05-20', 'На этом соревновании спортсмены столкнутся с непростыми испытаниями, которые потребуют от них не только физической силы, но и стратегического мышления. Каждый участник стремится показать свои лучшие результаты, преодолевая трудности и соперников на пути к'),
(4, 'Баскетбольный турнир 1', 9, 1, '2020-03-01', 'Атмосфера напряженности и ожидания витает в воздухе, создавая уникальное ощущение единства и соперничества среди спортсменов и зрителей.'),
(5, 'Футбольный чемпионат 1', 2, 2, '2020-07-01', 'Участники будут бороться не только за награды, но и за возможность продемонстрировать свои достижения и преодолеть собственные границы. Каждый момент будет полон эмоций, а зрители смогут насладиться зрелищными выступлениями и захватывающими моментами.'),
(6, 'Волейбольный кубок 1', 4, 3, '2020-08-15', 'На этом соревновании спортсмены столкнутся с непростыми испытаниями, которые потребуют от них не только физической силы, но и стратегического мышления.'),
(13, 'Декабрьское соревнование N1', 9, 1, '2025-12-15', 'Каждый участник стремится показать свои лучшие результаты, преодолевая трудности и соперников на пути к успеху. Погружаясь в атмосферу соперничества, зрители смогут стать свидетелями настоящих спортивных драм и триумфов.');

-- --------------------------------------------------------

--
-- Структура таблицы `competition_registration`
--

CREATE TABLE `competition_registration` (
  `id` int NOT NULL,
  `competition_id` int NOT NULL,
  `user_id` int NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `competition_registration`
--

INSERT INTO `competition_registration` (`id`, `competition_id`, `user_id`, `registration_date`) VALUES
(4, 13, 1, '2025-05-17 09:55:57');

-- --------------------------------------------------------

--
-- Структура таблицы `kind_of_sport`
--

CREATE TABLE `kind_of_sport` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `kind_of_sport`
--

INSERT INTO `kind_of_sport` (`id`, `name`) VALUES
(1, 'Баскетбол'),
(2, 'Футбол'),
(3, 'Волейбол'),
(6, 'Квидич');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1742917686),
('m250325_153802_trainers_table', 1742918700),
('m250325_155333_prizewinner_table', 1742918700),
('m250325_160911_sportsman_trainers', 1742919319),
('m250325_162103_sportsman_prizewinner', 1742922761),
('m250325_162930_organizations_competitions', 1742922762),
('m250325_171600_relations', 1742926004),
('m250326_082020_insert_data', 1742978862),
('m250402_090138_user_info', 1743585129),
('m250514_181235_create_competition_registration_table', 1747246394);

-- --------------------------------------------------------

--
-- Структура таблицы `organisations`
--

CREATE TABLE `organisations` (
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `organisations`
--

INSERT INTO `organisations` (`id`, `full_name`) VALUES
(1, 'Организатор 1'),
(2, 'Организатор 2'),
(3, 'Организатор 3'),
(4, 'Организатор 4'),
(5, 'Организатор 5'),
(6, 'Организатор 6'),
(8, 'Организатор 7'),
(9, 'Организатор 8');

-- --------------------------------------------------------

--
-- Структура таблицы `organisations_competitions`
--

CREATE TABLE `organisations_competitions` (
  `id` int NOT NULL,
  `id_organisations` int NOT NULL,
  `id_competitions` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `organisations_competitions`
--

INSERT INTO `organisations_competitions` (`id`, `id_organisations`, `id_competitions`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(13, 8, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `prizewinner`
--

CREATE TABLE `prizewinner` (
  `id` int NOT NULL,
  `prize_place` int NOT NULL,
  `reward` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `prizewinner`
--

INSERT INTO `prizewinner` (`id`, `prize_place`, `reward`) VALUES
(1, 1, 'Золотая медаль'),
(2, 2, 'Серебряная медаль'),
(3, 3, 'Бронзовая медаль'),
(5, 4, 'Золотая медаль13');

-- --------------------------------------------------------

--
-- Структура таблицы `sportsman`
--

CREATE TABLE `sportsman` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `discharge` int NOT NULL,
  `id_sports_club` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sportsman`
--

INSERT INTO `sportsman` (`id`, `name`, `discharge`, `id_sports_club`) VALUES
(1, 'Кисе', 3, 1),
(2, 'Аомине', 3, 2),
(3, 'Акаши', 3, 3),
(4, 'Небуя', 2, 3),
(5, 'Касаматсу', 2, 1),
(6, 'Мидорима', 3, 4),
(7, 'Куроко', 3, 5),
(8, 'Кагами', 3, 5),
(9, 'Мурасакибара', 3, 6),
(10, 'Татсуя', 2, 6),
(11, 'Такао', 2, 4),
(12, 'Имаеши', 2, 2),
(13, 'Miroslaw', 1, 5),
(15, 'test', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `sportsman_competitions`
--

CREATE TABLE `sportsman_competitions` (
  `id` int NOT NULL,
  `id_sportsman` int NOT NULL,
  `id_competitions` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sportsman_competitions`
--

INSERT INTO `sportsman_competitions` (`id`, `id_sportsman`, `id_competitions`) VALUES
(1, 1, 1),
(2, 4, 1),
(3, 5, 1),
(4, 9, 2),
(5, 3, 2),
(6, 8, 2),
(7, 13, 3),
(8, 11, 3),
(9, 12, 3),
(10, 6, 4),
(11, 3, 4),
(12, 4, 4),
(13, 4, 4),
(14, 5, 5),
(15, 1, 5),
(16, 2, 5),
(17, 8, 6),
(18, 3, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `sportsman_kind_of_sport`
--

CREATE TABLE `sportsman_kind_of_sport` (
  `id` int NOT NULL,
  `id_sportsman` int NOT NULL,
  `id_kind_of_sport` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sportsman_kind_of_sport`
--

INSERT INTO `sportsman_kind_of_sport` (`id`, `id_sportsman`, `id_kind_of_sport`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(9, 4, 1),
(10, 4, 3),
(11, 5, 1),
(12, 6, 1),
(13, 7, 1),
(14, 8, 1),
(16, 9, 1),
(17, 10, 1),
(18, 11, 1),
(19, 12, 1),
(20, 13, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `sportsman_prizewinner`
--

CREATE TABLE `sportsman_prizewinner` (
  `id` int NOT NULL,
  `id_competitions` int NOT NULL,
  `id_sportsman` int NOT NULL,
  `id_prizewinner` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sportsman_prizewinner`
--

INSERT INTO `sportsman_prizewinner` (`id`, `id_competitions`, `id_sportsman`, `id_prizewinner`) VALUES
(59, 3, 1, 1),
(60, 3, 2, 2),
(61, 3, 3, 3),
(62, 4, 1, 1),
(63, 4, 2, 2),
(64, 4, 3, 3),
(68, 5, 1, 1),
(69, 5, 2, 2),
(70, 5, 3, 3),
(71, 6, 1, 1),
(72, 6, 2, 2),
(73, 6, 3, 3),
(74, 2, 12, 1),
(75, 2, 5, 2),
(76, 2, 13, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `sportsman_trainers`
--

CREATE TABLE `sportsman_trainers` (
  `id` int NOT NULL,
  `id_sportsman` int NOT NULL,
  `id_trainers` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sportsman_trainers`
--

INSERT INTO `sportsman_trainers` (`id`, `id_sportsman`, `id_trainers`) VALUES
(2, 9, 1),
(3, 10, 1),
(4, 8, 2),
(5, 11, 3),
(6, 11, 6),
(7, 13, 5),
(8, 1, 4),
(9, 2, 5),
(10, 3, 1),
(11, 4, 6),
(12, 5, 2),
(13, 6, 6),
(14, 7, 5),
(15, 8, 5),
(16, 9, 4),
(17, 11, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `sports_club`
--

CREATE TABLE `sports_club` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sports_club`
--

INSERT INTO `sports_club` (`id`, `name`) VALUES
(1, 'Кайдзё'),
(2, 'Тоо'),
(3, 'Ракузан'),
(4, 'Щютоку'),
(5, 'Сейрин'),
(6, 'Йосен'),
(7, '123qwe');

-- --------------------------------------------------------

--
-- Структура таблицы `structure`
--

CREATE TABLE `structure` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `structure`
--

INSERT INTO `structure` (`id`, `name`, `type`) VALUES
(1, 'Спартак', 'Стадион'),
(2, 'Динамо', 'Стадион'),
(3, 'Сельмаш', 'Стадион'),
(4, 'Номер 1', 'Корт'),
(5, 'Номер 2', 'Корт'),
(6, 'Фитрон', 'Спортивный зал'),
(7, 'WGym', 'Спортивный зал'),
(8, 'Подвальная качалка', 'Спортивный зал'),
(9, 'Манеж ДГТУ', 'Манеж'),
(11, 'test', 'Стадион'),
(12, 'ййй', 'Стадион');

-- --------------------------------------------------------

--
-- Структура таблицы `trainers`
--

CREATE TABLE `trainers` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_kind_of_sport` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `id_kind_of_sport`) VALUES
(1, 'Коби Брайант', 1),
(2, 'Леонель Месси', 2),
(3, 'Лоренцо Бернарди', 3),
(4, 'Леброн Джеймс', 1),
(5, 'Кайри Ирвинг', 1),
(6, 'Виктор Вембаньяма', 1),
(7, 'Криштиану Роналду', 2),
(8, 'Неймар Да Силва Сантос Жуниор', 2),
(11, '123', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `authKey`, `isAdmin`) VALUES
(1, 'aomine', '$2y$13$QWESqI.Rh8UoBYBaHKH8/eNHZ5GHej50K1gY4O.rblEHDKVkZakMm', '0VgqWDe8qejpNEd-ObmkJJ8IAIbbO1KY', 1),
(2, 'test', '$2y$13$gyJiuSiHwRKSCcq9LEf0N.CXarOTrHhqHNW3/awowd0hNHFi4uONe', 'oYknHdlAp84_GcKxNw_XbyeC3QyKxVuS', 0),
(3, 'script123', '$2y$13$k0Sq1QpspfbU9W9jdEDHfOZOw0WeWCP3EA.K7bpOF22mTwfg62KyG', 'QMhSH50fn_vtC9gMQq1WaAoKBDfnPj50', 0),
(4, 'admin\' OR \'1\'=\'1', '$2y$13$lXPqoloEvux99hrPQVVLlu4U1AMxVuRf0ilSLlcaH2fizG4X.fne6', 'wN5UkTX8XuXZGgrZop0KGC6PqB2RFl53', 0),
(5, 'miroslaw', '$2y$13$ok7HJMd88TRI/BWZHZFdI.8Jek18vVQBLJELzEsCiw.BtRMjCF08S', 'SeW6BdlDn5QB9_8g2UkCgVYefkLhAl_I', 0),
(6, 'vera', '$2y$13$Qq0fR5Gyrur9UK5qjR8You1eJMB7HS/5eBatqD.KwGP.a9c3MEY0K', 'u5IxAEo0rioNhE5-b1T_QulkyZMRHdrZ', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_info`
--

CREATE TABLE `user_info` (
  `id` int NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `id_sports_club` int DEFAULT NULL,
  `id_trainers` int DEFAULT NULL,
  `id_kind_of_sport` int DEFAULT NULL,
  `id_user` int NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_info`
--

INSERT INTO `user_info` (`id`, `phone_number`, `email`, `birthday`, `gender`, `id_sports_club`, `id_trainers`, `id_kind_of_sport`, `id_user`, `status`) VALUES
(10, '', 'titarenkomiroslav@gmail.com', NULL, NULL, NULL, NULL, NULL, 2, 0),
(24, '+7 123 123 12 31', '23123@mail.ru', '2003-04-06', 1, 2, 7, NULL, 1, 0),
(34, '', '123123@mail.ru', '2003-02-03', 1, 1, 1, 1, 5, 0),
(38, '', '1231123@mail.ru', NULL, NULL, NULL, NULL, NULL, 6, 0),
(39, '', '', NULL, NULL, NULL, NULL, NULL, 3, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_competitions_structure` (`id_structure`),
  ADD KEY `fk_competitions_kind_of_sport` (`id_kind_of_sport`);

--
-- Индексы таблицы `competition_registration`
--
ALTER TABLE `competition_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-registration-competition` (`competition_id`),
  ADD KEY `fk-registration-user` (`user_id`);

--
-- Индексы таблицы `kind_of_sport`
--
ALTER TABLE `kind_of_sport`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `organisations_competitions`
--
ALTER TABLE `organisations_competitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_organisations_competitions_organisations` (`id_organisations`),
  ADD KEY `fk_organisations_competitions_competitions` (`id_competitions`);

--
-- Индексы таблицы `prizewinner`
--
ALTER TABLE `prizewinner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sportsman`
--
ALTER TABLE `sportsman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sportsman_sports_club` (`id_sports_club`);

--
-- Индексы таблицы `sportsman_competitions`
--
ALTER TABLE `sportsman_competitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sportsman_competitions_sportsman` (`id_sportsman`),
  ADD KEY `fk_sportsman_competitions_competitions` (`id_competitions`);

--
-- Индексы таблицы `sportsman_kind_of_sport`
--
ALTER TABLE `sportsman_kind_of_sport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sportsman_kind_of_sport_sportsman` (`id_sportsman`),
  ADD KEY `fk_sportsman_kind_of_sport_kind_of_sport` (`id_kind_of_sport`);

--
-- Индексы таблицы `sportsman_prizewinner`
--
ALTER TABLE `sportsman_prizewinner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sportsman_prizeweinner_sportsman` (`id_sportsman`),
  ADD KEY `fk_sportsman_prizeweinner_prizeweinner` (`id_prizewinner`),
  ADD KEY `fk_sportsman_prizeweinner_competitions` (`id_competitions`);

--
-- Индексы таблицы `sportsman_trainers`
--
ALTER TABLE `sportsman_trainers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sportsman_trainers_sportsman` (`id_sportsman`),
  ADD KEY `fk_sportsmen_trainers_trainers` (`id_trainers`);

--
-- Индексы таблицы `sports_club`
--
ALTER TABLE `sports_club`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_info_user` (`id_user`),
  ADD KEY `fk_user_sports_club` (`id_sports_club`),
  ADD KEY `fk_sportsman_trainers` (`id_trainers`),
  ADD KEY `fk_user_kind_of_sport` (`id_kind_of_sport`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `competition_registration`
--
ALTER TABLE `competition_registration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `kind_of_sport`
--
ALTER TABLE `kind_of_sport`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `organisations_competitions`
--
ALTER TABLE `organisations_competitions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `prizewinner`
--
ALTER TABLE `prizewinner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `sportsman`
--
ALTER TABLE `sportsman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `sportsman_competitions`
--
ALTER TABLE `sportsman_competitions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `sportsman_kind_of_sport`
--
ALTER TABLE `sportsman_kind_of_sport`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `sportsman_prizewinner`
--
ALTER TABLE `sportsman_prizewinner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `sportsman_trainers`
--
ALTER TABLE `sportsman_trainers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `sports_club`
--
ALTER TABLE `sports_club`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `competitions`
--
ALTER TABLE `competitions`
  ADD CONSTRAINT `fk_competitions_kind_of_sport` FOREIGN KEY (`id_kind_of_sport`) REFERENCES `kind_of_sport` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_competitions_structure` FOREIGN KEY (`id_structure`) REFERENCES `structure` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `competition_registration`
--
ALTER TABLE `competition_registration`
  ADD CONSTRAINT `fk-registration-competition` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-registration-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `organisations_competitions`
--
ALTER TABLE `organisations_competitions`
  ADD CONSTRAINT `fk_organisations_competitions_competitions` FOREIGN KEY (`id_competitions`) REFERENCES `competitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_organisations_competitions_organisations` FOREIGN KEY (`id_organisations`) REFERENCES `organisations` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sportsman`
--
ALTER TABLE `sportsman`
  ADD CONSTRAINT `fk_sportsman_sports_club` FOREIGN KEY (`id_sports_club`) REFERENCES `sports_club` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sportsman_competitions`
--
ALTER TABLE `sportsman_competitions`
  ADD CONSTRAINT `fk_sportsman_competitions_competitions` FOREIGN KEY (`id_competitions`) REFERENCES `competitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sportsman_competitions_sportsman` FOREIGN KEY (`id_sportsman`) REFERENCES `sportsman` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sportsman_kind_of_sport`
--
ALTER TABLE `sportsman_kind_of_sport`
  ADD CONSTRAINT `fk_sportsman_kind_of_sport_kind_of_sport` FOREIGN KEY (`id_kind_of_sport`) REFERENCES `kind_of_sport` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sportsman_kind_of_sport_sportsman` FOREIGN KEY (`id_sportsman`) REFERENCES `sportsman` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sportsman_prizewinner`
--
ALTER TABLE `sportsman_prizewinner`
  ADD CONSTRAINT `fk_sportsman_prizeweinner_competitions` FOREIGN KEY (`id_competitions`) REFERENCES `competitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sportsman_prizeweinner_prizeweinner` FOREIGN KEY (`id_prizewinner`) REFERENCES `prizewinner` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sportsman_prizeweinner_sportsman` FOREIGN KEY (`id_sportsman`) REFERENCES `sportsman` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sportsman_trainers`
--
ALTER TABLE `sportsman_trainers`
  ADD CONSTRAINT `fk_sportsman_trainers_sportsman` FOREIGN KEY (`id_sportsman`) REFERENCES `sportsman` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sportsmen_trainers_trainers` FOREIGN KEY (`id_trainers`) REFERENCES `trainers` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `fk_sportsman_trainers` FOREIGN KEY (`id_trainers`) REFERENCES `trainers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_info_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`id_sports_club`) REFERENCES `sports_club` (`id`),
  ADD CONSTRAINT `user_info_ibfk_2` FOREIGN KEY (`id_kind_of_sport`) REFERENCES `kind_of_sport` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
