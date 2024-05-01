-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 19 2022 г., 14:21
-- Версия сервера: 10.3.28-MariaDB
-- Версия PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `otchetnost`
--

-- --------------------------------------------------------

--
-- Структура таблицы `administatrors_user`
--

CREATE TABLE `administatrors_user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `name_fam` text NOT NULL,
  `biblios` longtext NOT NULL,
  `pass` longtext NOT NULL,
  `PravaDostups` longtext NOT NULL DEFAULT 'work-cod:0;key-indicators:0;cultural-events:0;',
  `hashauth` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `administatrors_user`
--

INSERT INTO `administatrors_user` (`id`, `login`, `name_fam`, `biblios`, `pass`, `PravaDostups`, `hashauth`) VALUES
(1, 'admin', 'Александр Пирожников', 'Центральная библиотека', 'a6fd9318ab290859cabc7bc762e710dc', 'work-cod:1;key-indicators:1;cultural-events:1;', '8a0c6374be2b97954d96b85fccc02a0c7222819b084c915abbe0ed17ab889235'),
(2, 'test', 'Тестовый пользователь', 'Центральная тестовая библиотека', 'a6fd9318ab290859cabc7bc762e710dc', 'work-cod:0;key-indicators:0;cultural-events:0;', '7a8f3549ac5a9f95679b41b5359a53b244a43a5e1df19b4e2ccefd8eda7df625'),
(3, 'kna', 'Наталья Коршунова', 'Центральная районная библиотека', '7f2e37b70c36aed7b0f4c43d6f63804d', 'work-cod:1;key-indicators:0;cultural-events:0;', '4c22f2d864a2e6e5ef86a10f19d66220f47024741976dd63c18610b96798ef88'),
(4, 'goa', 'Ольга Горбунова', 'Советская центральная детская библиотека', 'dd0c1c29982a1cc1292e019211ee277d', 'work-cod:0;key-indicators:0;cultural-events:0;', ' '),
(5, 'kev', 'Елена Кораблева', 'Библиотека семейного чтения \"Солнечная\"', 'dd0c1c29982a1cc1292e019211ee277d', 'work-cod:0;key-indicators:0;cultural-events:0;', 'b3318c3c7131f3a9690937f753474dbf56bf5e82478f94a95304763fcb3912de'),
(6, 'seu', 'Елена Стесова', 'Агиришская библиотека', 'dd0c1c29982a1cc1292e019211ee277d', 'work-cod:0;key-indicators:0;cultural-events:0;', '8459df26d1dd997b768f991ed17340d66b4c235193622ee9b36660dd9569b64c'),
(7, 'ikf', 'Ксения Ибраимова', 'Алябьевская модельная сельская библиотека', 'dd0c1c29982a1cc1292e019211ee277d', 'work-cod:0;key-indicators:0;cultural-events:0;', 'eecf303abdd8c4f5f656d673068ac0ed2567a8114452bdc877095fe0ab7f9556'),
(8, 'via', 'Ирина Волкова', 'Зеленоборская библиотека', 'dd0c1c29982a1cc1292e019211ee277d', 'work-cod:0;key-indicators:0;cultural-events:0;', 'ef8814fb8be490897fdc5df18e5bd56c8a7b0ab3bbffc3861531e4fe5afda287'),
(9, 'rmb', 'Марина Рыжанкова', 'Коммунистическая библиотека', 'dd0c1c29982a1cc1292e019211ee277d', 'work-cod:0;key-indicators:0;cultural-events:0;', 'ccfadd08e1a71e93a239a3dc5b5bcb7a5d7484b8915cc75b87fc3b1980a03868'),
(10, 'mgg', 'Галина Манцевич', 'Малиновская библиотека', 'dd0c1c29982a1cc1292e019211ee277d', 'work-cod:0;key-indicators:0;cultural-events:0;', '009690c9e8fc0c063490834032dca99e8413cc3d8e77d3c8d55d60cbab0ec37c'),
(11, 'dus', 'Юлия Дудкина', 'Пионерская библиотека им. А. М. Казанцева', 'dd0c1c29982a1cc1292e019211ee277d', 'work-cod:0;key-indicators:0;cultural-events:0;', '770cea2e018f30fd23687a2ccb1c8da90b8146c07f455832edb5b0adc02ae680'),
(12, 'kos', 'Елена Макарова', 'Пионерская детская библиотека', 'dd0c1c29982a1cc1292e019211ee277d', 'work-cod:0;key-indicators:0;cultural-events:0;', 'e0738df108a4bfe641c23c3ae1dfc17ef1294de20c547ded387459be3a349ff7'),
(13, 'pts', 'Татьяна Подолюк', 'Таёжная библиотека', 'dd0c1c29982a1cc1292e019211ee277d', 'work-cod:0;key-indicators:0;cultural-events:0;', ' '),
(14, 'dns', 'Наталья Дударева ', 'Юбилейная модельная сельская библиотека', 'dd0c1c29982a1cc1292e019211ee277d', 'work-cod:0;key-indicators:0;cultural-events:0;', '9160993aa65fdc2859c7298b54cf69a559c67c7980a7031a6535b65d10dc4f2e'),
(15, 'uni', 'Нина Усенко', 'Центральная районная библиотека', '7f2e37b70c36aed7b0f4c43d6f63804d', 'work-cod:0;key-indicators:1;cultural-events:1;cultural-events:0;', '8de05ac8e88ea3496fd6373f3443c83452c739af6c55ea86aafc7d187751d35c'),
(16, 'xnv', 'Надежда Харитонова', 'Центральная районная библиотека', '7f2e37b70c36aed7b0f4c43d6f63804d', 'work-cod:0;key-indicators:0;cultural-events:0;', 'ac3fbcb85752cf8e5169e1b1583cb67a309ffee5ec1d5402571c6a003c7b26f6'),
(17, 'shev', 'Елена Шестаева', 'Центральная Библоитека', '7f2e37b70c36aed7b0f4c43d6f63804d', 'work-cod:0;key-indicators:1;cultural-events:0;', 'ea6a79c9bd4145b017665e6b88f250ef29541306c468627592e48ae483c56d3f');

-- --------------------------------------------------------

--
-- Структура таблицы `cultural_events`
--

CREATE TABLE `cultural_events` (
  `id_otchets` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_otcht` text NOT NULL,
  `number_visits` int(11) NOT NULL DEFAULT 0,
  `number_preferential_visits` int(11) NOT NULL DEFAULT 0,
  `number_preferential_visits_free_charge` int(11) NOT NULL DEFAULT 0,
  `number_preferential_visits_reimbursable_basis` int(11) NOT NULL DEFAULT 0,
  `g9_r4_6nk` int(11) NOT NULL DEFAULT 0,
  `g9_r4_6nk_free_charge` int(11) NOT NULL DEFAULT 0,
  `g9_r4_6nk_reimbursable_basis` int(11) NOT NULL DEFAULT 0,
  `g16_r4_6nk` int(11) NOT NULL DEFAULT 0,
  `g16_r4_6nk_free_charge` int(11) NOT NULL DEFAULT 0,
  `g16_r4_6nk_reimbursable_basis` int(11) NOT NULL DEFAULT 0,
  `g12_r4_6nk` int(11) NOT NULL DEFAULT 0,
  `g12_r4_6nk_free_charge` int(11) NOT NULL DEFAULT 0,
  `g12_r4_6nk_reimbursable_basis` int(11) NOT NULL DEFAULT 0,
  `number_employees` int(11) NOT NULL DEFAULT 0,
  `having_state_awards` int(11) NOT NULL DEFAULT 0,
  `number_vacant_positions` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cultural_events`
--

INSERT INTO `cultural_events` (`id_otchets`, `id_user`, `date_otcht`, `number_visits`, `number_preferential_visits`, `number_preferential_visits_free_charge`, `number_preferential_visits_reimbursable_basis`, `g9_r4_6nk`, `g9_r4_6nk_free_charge`, `g9_r4_6nk_reimbursable_basis`, `g16_r4_6nk`, `g16_r4_6nk_free_charge`, `g16_r4_6nk_reimbursable_basis`, `g12_r4_6nk`, `g12_r4_6nk_free_charge`, `g12_r4_6nk_reimbursable_basis`, `number_employees`, `having_state_awards`, `number_vacant_positions`) VALUES
(1, 16, '2022_8', 11835, 0, 11777, 58, 2070, 2012, 58, 9672, 9672, 0, 93, 93, 0, 0, 0, 0),
(2, 12, '2022_8', 1455, 0, 1455, 0, 1414, 1414, 0, 0, 0, 0, 41, 41, 0, 2, 0, 0),
(3, 5, '2022_9', 1180, 0, 0, 0, 799, 799, 0, 0, 0, 0, 381, 381, 0, 2, 0, 0),
(4, 16, '2022_9', 11514, 8, 11498, 36, 2774, 2738, 36, 7687, 7687, 0, 1053, 1053, 0, 0, 0, 0),
(5, 12, '2022_9', 1369, 0, 1369, 0, 1369, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `cultural_events_arkhive`
--

CREATE TABLE `cultural_events_arkhive` (
  `id_arhive` int(11) NOT NULL,
  `date_arhive` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `cultural_events_log_edit`
--

CREATE TABLE `cultural_events_log_edit` (
  `id_edit` int(20) NOT NULL,
  `id_otchet` int(11) NOT NULL,
  `id_author_edit` int(11) NOT NULL,
  `date_edit` text NOT NULL,
  `method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cultural_events_log_edit`
--

INSERT INTO `cultural_events_log_edit` (`id_edit`, `id_otchet`, `id_author_edit`, `date_edit`, `method`) VALUES
(1, 1, 16, '02-09-2022 11:00', 'Send'),
(2, 2, 12, '04-09-2022 16:43', 'Send'),
(3, 3, 5, '02-10-2022 14:42', 'Send'),
(4, 4, 16, '03-10-2022 9:19', 'Send'),
(5, 5, 12, '03-10-2022 12:24', 'Send');

-- --------------------------------------------------------

--
-- Структура таблицы `key_indicators`
--

CREATE TABLE `key_indicators` (
  `id_otchet` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `date` text NOT NULL,
  `readers` int(10) NOT NULL DEFAULT 0,
  `readers_15_30` int(10) NOT NULL DEFAULT 0,
  `state_service` int(10) NOT NULL DEFAULT 0,
  `edd` int(10) NOT NULL DEFAULT 0,
  `litres` int(10) NOT NULL DEFAULT 0,
  `visits` int(11) NOT NULL DEFAULT 0,
  `visits_stationary` int(11) NOT NULL DEFAULT 0,
  `visits_out_station` int(11) NOT NULL DEFAULT 0,
  `visits_site` int(11) NOT NULL DEFAULT 0,
  `book_publishing` int(11) NOT NULL DEFAULT 0,
  `book_publishing_15_30` int(11) NOT NULL DEFAULT 0,
  `book_publishing_stationary` int(11) NOT NULL DEFAULT 0,
  `book_publishing_outof_station` int(11) NOT NULL DEFAULT 0,
  `book_publishing_periodically` int(11) NOT NULL DEFAULT 0,
  `book_publishing_books` int(11) NOT NULL DEFAULT 0,
  `book_publishing_av` int(11) NOT NULL DEFAULT 0,
  `book_publishing_electronic_media` int(11) NOT NULL DEFAULT 0,
  `book_publishing_vtch_edd` int(11) NOT NULL DEFAULT 0,
  `book_publishing_litres` int(11) NOT NULL DEFAULT 0,
  `book_publishing_opl` int(11) NOT NULL DEFAULT 0,
  `book_publishing_enl` int(11) NOT NULL DEFAULT 0,
  `book_publishing_tex` int(11) NOT NULL DEFAULT 0,
  `book_publishing_sx` int(11) NOT NULL DEFAULT 0,
  `book_publishing_isky` int(11) NOT NULL DEFAULT 0,
  `book_publishing_xyd` int(11) NOT NULL DEFAULT 0,
  `book_publishing_det` int(11) NOT NULL DEFAULT 0,
  `book_publishing_proch` int(11) NOT NULL DEFAULT 0,
  `events` int(11) NOT NULL DEFAULT 0,
  `events_stationary` int(11) NOT NULL DEFAULT 0,
  `events_out_station` int(11) NOT NULL DEFAULT 0,
  `events_sits` int(11) NOT NULL DEFAULT 0,
  `visits2` int(11) NOT NULL DEFAULT 0,
  `visits2_stationary` int(11) NOT NULL DEFAULT 0,
  `visits2_out_station` int(11) NOT NULL DEFAULT 0,
  `indiv_info` int(11) NOT NULL DEFAULT 0,
  `group_info` int(11) NOT NULL DEFAULT 0,
  `d14_readers` int(11) NOT NULL DEFAULT 0,
  `d14_vch_15_30` int(11) NOT NULL DEFAULT 0,
  `d14_state_uslugi` int(11) NOT NULL DEFAULT 0,
  `d14_edd` int(11) NOT NULL DEFAULT 0,
  `d14_litres` int(11) NOT NULL DEFAULT 0,
  `d14_visits` int(11) NOT NULL DEFAULT 0,
  `d14_visits_stationary` int(11) NOT NULL DEFAULT 0,
  `d14_visits_out_station` int(11) NOT NULL DEFAULT 0,
  `d14_visits_sits` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_15_30` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_stationary` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_out_station` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_periodically` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_books` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_books_av` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_electronic_media` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_edd` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_litres` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_opl` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_enl` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_tex` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_sx` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_iskys` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_hudozh` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_det` int(11) NOT NULL DEFAULT 0,
  `d14_book_pub_proch` int(11) NOT NULL DEFAULT 0,
  `d14_events` int(11) NOT NULL DEFAULT 0,
  `d14_events_stationary` int(11) NOT NULL DEFAULT 0,
  `d14_events_out_station` int(11) NOT NULL DEFAULT 0,
  `d14_events_sits` int(11) NOT NULL DEFAULT 0,
  `d14_vesites` int(11) NOT NULL DEFAULT 0,
  `d14_vesites_stationary` int(11) NOT NULL DEFAULT 0,
  `d14_vesites_out_station` int(11) NOT NULL DEFAULT 0,
  `d14_indiv_info` int(11) NOT NULL DEFAULT 0,
  `d14_group_info` int(11) NOT NULL DEFAULT 0,
  `s15_readers` int(11) NOT NULL DEFAULT 0,
  `s15_vch_15_30` int(11) NOT NULL DEFAULT 0,
  `s15_state_uslugi` int(11) NOT NULL DEFAULT 0,
  `s15_edd` int(11) NOT NULL DEFAULT 0,
  `s15_litres` int(11) NOT NULL DEFAULT 0,
  `s15_visits` int(11) NOT NULL DEFAULT 0,
  `s15_visits_stationary` int(11) NOT NULL DEFAULT 0,
  `s15_visits_out_station` int(11) NOT NULL DEFAULT 0,
  `s15_visits_sits` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_15_30` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_stationary` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_out_station` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_periodically` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_books` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_books_av` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_electronic_media` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_edd` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_litres` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_opl` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_enl` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_tex` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_sx` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_iskys` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_hudozh` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_det` int(11) NOT NULL DEFAULT 0,
  `s15_book_pub_proch` int(11) NOT NULL DEFAULT 0,
  `s15_events` int(11) NOT NULL DEFAULT 0,
  `s15_events_stationary` int(11) NOT NULL DEFAULT 0,
  `s15_events_out_station` int(11) NOT NULL DEFAULT 0,
  `s15_events_sits` int(11) NOT NULL DEFAULT 0,
  `s15_vesites` int(11) NOT NULL DEFAULT 0,
  `s15_vesites_stationary` int(11) NOT NULL DEFAULT 0,
  `s15_vesites_out_station` int(11) NOT NULL DEFAULT 0,
  `s15_indiv_info` int(11) NOT NULL DEFAULT 0,
  `s15_group_info` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `key_indicators`
--

INSERT INTO `key_indicators` (`id_otchet`, `id_author`, `date`, `readers`, `readers_15_30`, `state_service`, `edd`, `litres`, `visits`, `visits_stationary`, `visits_out_station`, `visits_site`, `book_publishing`, `book_publishing_15_30`, `book_publishing_stationary`, `book_publishing_outof_station`, `book_publishing_periodically`, `book_publishing_books`, `book_publishing_av`, `book_publishing_electronic_media`, `book_publishing_vtch_edd`, `book_publishing_litres`, `book_publishing_opl`, `book_publishing_enl`, `book_publishing_tex`, `book_publishing_sx`, `book_publishing_isky`, `book_publishing_xyd`, `book_publishing_det`, `book_publishing_proch`, `events`, `events_stationary`, `events_out_station`, `events_sits`, `visits2`, `visits2_stationary`, `visits2_out_station`, `indiv_info`, `group_info`, `d14_readers`, `d14_vch_15_30`, `d14_state_uslugi`, `d14_edd`, `d14_litres`, `d14_visits`, `d14_visits_stationary`, `d14_visits_out_station`, `d14_visits_sits`, `d14_book_pub`, `d14_book_pub_15_30`, `d14_book_pub_stationary`, `d14_book_pub_out_station`, `d14_book_pub_periodically`, `d14_book_pub_books`, `d14_book_pub_books_av`, `d14_book_pub_electronic_media`, `d14_book_pub_edd`, `d14_book_pub_litres`, `d14_book_pub_opl`, `d14_book_pub_enl`, `d14_book_pub_tex`, `d14_book_pub_sx`, `d14_book_pub_iskys`, `d14_book_pub_hudozh`, `d14_book_pub_det`, `d14_book_pub_proch`, `d14_events`, `d14_events_stationary`, `d14_events_out_station`, `d14_events_sits`, `d14_vesites`, `d14_vesites_stationary`, `d14_vesites_out_station`, `d14_indiv_info`, `d14_group_info`, `s15_readers`, `s15_vch_15_30`, `s15_state_uslugi`, `s15_edd`, `s15_litres`, `s15_visits`, `s15_visits_stationary`, `s15_visits_out_station`, `s15_visits_sits`, `s15_book_pub`, `s15_book_pub_15_30`, `s15_book_pub_stationary`, `s15_book_pub_out_station`, `s15_book_pub_periodically`, `s15_book_pub_books`, `s15_book_pub_books_av`, `s15_book_pub_electronic_media`, `s15_book_pub_edd`, `s15_book_pub_litres`, `s15_book_pub_opl`, `s15_book_pub_enl`, `s15_book_pub_tex`, `s15_book_pub_sx`, `s15_book_pub_iskys`, `s15_book_pub_hudozh`, `s15_book_pub_det`, `s15_book_pub_proch`, `s15_events`, `s15_events_stationary`, `s15_events_out_station`, `s15_events_sits`, `s15_vesites`, `s15_vesites_stationary`, `s15_vesites_out_station`, `s15_indiv_info`, `s15_group_info`) VALUES
(1, 8, '2022_8', 1051, 116, 0, 7, 75, 11319, 8518, 2801, 0, 20683, 1053, 16542, 4141, 15909, 3621, 676, 477, 24, 370, 8164, 467, 1794, 283, 1725, 3113, 5135, 2, 203, 123, 80, 0, 3745, 2158, 1587, 0, 0, 611, 0, 0, 0, 2, 6506, 4302, 2204, 0, 11697, 0, 8117, 3580, 8628, 2447, 612, 10, 0, 2, 2580, 343, 1018, 101, 1312, 1782, 4559, 2, 187, 120, 67, 0, 2828, 1772, 1056, 0, 0, 440, 116, 0, 7, 73, 4813, 4216, 597, 0, 8986, 1053, 8425, 561, 7281, 1174, 64, 467, 24, 368, 5584, 124, 776, 182, 413, 1331, 576, 0, 16, 3, 13, 0, 917, 386, 531, 4, 0),
(2, 4, '2022_8', 3159, 34, 0, 0, 0, 34643, 20944, 13699, 0, 65648, 237, 42642, 23006, 30601, 33622, 608, 817, 0, 0, 6561, 3016, 3437, 2688, 1248, 12342, 35338, 1018, 587, 367, 220, 0, 23064, 10538, 12526, 0, 0, 3015, 0, 0, 0, 0, 32816, 19221, 13595, 0, 64381, 0, 41375, 23006, 30322, 32644, 608, 807, 0, 0, 6215, 2970, 3380, 2683, 1226, 11667, 35261, 979, 584, 365, 219, 0, 22511, 10089, 12422, 0, 0, 144, 34, 0, 0, 0, 1827, 1723, 104, 0, 1267, 237, 1267, 0, 279, 978, 0, 10, 0, 0, 346, 46, 57, 5, 22, 675, 77, 39, 3, 2, 1, 0, 553, 449, 104, 6, 0),
(3, 14, '2022_8', 538, 38, 0, 0, 15, 3622, 3573, 49, 0, 14713, 651, 14713, 0, 10494, 4207, 12, 0, 0, 65, 2888, 1047, 1760, 1573, 1270, 3901, 1995, 279, 109, 102, 7, 0, 369, 320, 49, 0, 0, 242, 0, 0, 0, 1, 1729, 1707, 22, 0, 7125, 0, 7125, 0, 5072, 2041, 12, 0, 0, 1, 1026, 357, 722, 708, 436, 1870, 1987, 19, 90, 88, 2, 0, 275, 253, 22, 0, 0, 296, 38, 0, 0, 14, 1893, 1866, 27, 0, 7588, 651, 7588, 0, 5422, 2166, 0, 0, 0, 64, 1862, 690, 1038, 865, 834, 2031, 8, 260, 19, 14, 5, 0, 94, 67, 27, 2, 1),
(4, 7, '2022_8', 1307, 188, 29, 24, 30, 11737, 10658, 1079, 0, 27732, 2147, 25678, 2054, 23703, 3504, 525, 0, 30, 100, 4698, 2897, 5495, 4007, 2121, 3192, 4955, 367, 147, 128, 19, 0, 2797, 2269, 528, 0, 0, 701, 0, 0, 0, 0, 5293, 4339, 954, 0, 15718, 0, 13664, 2054, 13789, 1421, 508, 0, 0, 0, 2368, 1703, 2149, 2054, 846, 1284, 4955, 359, 114, 102, 12, 0, 2161, 1758, 403, 0, 0, 606, 188, 29, 24, 30, 6444, 6319, 125, 0, 12014, 2147, 12014, 0, 9914, 2083, 17, 0, 30, 100, 2330, 1194, 3346, 1953, 1275, 1908, 0, 8, 33, 26, 7, 0, 636, 511, 125, 8, 3),
(5, 9, '2022_8', 1041, 130, 0, 11, 8, 16773, 12881, 3892, 0, 26962, 2226, 26681, 281, 17061, 5909, 3186, 806, 259, 547, 11253, 1230, 3516, 1929, 394, 3784, 4771, 85, 431, 141, 290, 0, 5560, 1711, 3849, 0, 0, 383, 0, 0, 0, 0, 8295, 4446, 3849, 0, 10112, 0, 10112, 0, 4416, 2620, 3076, 0, 0, 0, 3977, 63, 218, 164, 48, 1297, 4303, 42, 378, 111, 267, 0, 4537, 1195, 3342, 0, 0, 658, 130, 0, 11, 8, 8478, 8435, 43, 0, 16850, 2226, 16569, 281, 12645, 3289, 110, 806, 259, 547, 7276, 1167, 3298, 1765, 346, 2487, 468, 43, 53, 30, 23, 0, 1023, 516, 507, 1, 8),
(6, 16, '2022_8', 3822, 859, 0, 6, 62, 88471, 19992, 4636, 63843, 83255, 6545, 65702, 17553, 41951, 34307, 161, 6836, 3998, 1954, 19737, 5844, 18816, 4128, 3230, 29529, 500, 1471, 299, 183, 116, 0, 7391, 4117, 3274, 0, 0, 757, 0, 0, 0, 0, 2631, 1431, 1200, 0, 17240, 0, 3000, 14240, 9913, 7261, 66, 0, 0, 0, 617, 703, 7285, 163, 218, 7742, 406, 106, 68, 30, 38, 0, 1533, 837, 696, 0, 0, 3065, 859, 0, 6, 62, 85840, 18561, 3436, 63843, 66015, 6545, 62702, 3313, 32038, 27046, 95, 6836, 3998, 1954, 19120, 5141, 11531, 3965, 3012, 21787, 94, 1365, 231, 153, 78, 0, 5858, 3280, 2578, 22, 2),
(7, 10, '2022_8', 1132, 54, 7, 0, 8, 11590, 8892, 2698, 0, 27861, 365, 22995, 4866, 21849, 5418, 531, 63, 0, 66, 8277, 3009, 2769, 2189, 250, 4040, 7277, 50, 166, 127, 39, 0, 2524, 1784, 740, 0, 0, 616, 0, 0, 0, 0, 5448, 2959, 2489, 0, 13576, 0, 9476, 4100, 11336, 1709, 531, 0, 0, 0, 1408, 1723, 1875, 557, 63, 1138, 6773, 39, 149, 111, 38, 0, 2057, 1333, 724, 0, 0, 516, 54, 7, 0, 8, 6142, 5933, 209, 0, 14285, 365, 13519, 766, 10513, 3709, 0, 63, 0, 66, 6869, 1286, 894, 1632, 187, 2902, 504, 11, 17, 16, 1, 0, 467, 451, 16, 5, 5),
(8, 13, '2022_8', 1188, 360, 0, 0, 1, 11078, 10592, 486, 0, 23892, 1493, 23892, 0, 13408, 10436, 33, 15, 0, 5, 8872, 967, 864, 1008, 301, 9686, 2086, 108, 129, 113, 16, 0, 3296, 2810, 486, 0, 0, 410, 0, 0, 0, 0, 5217, 4874, 343, 0, 6420, 0, 6420, 0, 4100, 2290, 30, 0, 0, 0, 1313, 209, 249, 388, 98, 2072, 2060, 31, 117, 102, 15, 0, 3038, 2594, 444, 0, 0, 778, 360, 0, 0, 1, 5861, 5718, 143, 0, 17472, 1493, 17472, 0, 9308, 8146, 3, 15, 0, 5, 7559, 758, 615, 620, 203, 7614, 26, 77, 12, 11, 1, 0, 258, 216, 42, 0, 0),
(9, 11, '2022_8', 1031, 377, 56, 0, 1, 11865, 10137, 1728, 0, 36472, 9060, 36472, 0, 26691, 9776, 5, 0, 0, 1, 10957, 3411, 3624, 2888, 5998, 9556, 0, 38, 209, 170, 39, 0, 4158, 2430, 1728, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1031, 377, 56, 0, 1, 11865, 10137, 1728, 0, 36472, 9060, 36472, 0, 26691, 9776, 5, 0, 0, 1, 10957, 3411, 3624, 2888, 5998, 9556, 0, 38, 209, 170, 39, 0, 4158, 2430, 1728, 0, 0),
(10, 6, '2022_8', 584, 66, 0, 0, 13, 7680, 7162, 518, 0, 15851, 500, 15851, 0, 10654, 5197, 0, 0, 0, 62, 5147, 285, 932, 1231, 133, 4499, 3586, 38, 143, 118, 25, 0, 2705, 2187, 518, 0, 0, 286, 0, 0, 0, 0, 4032, 3554, 478, 0, 7113, 0, 7113, 0, 4400, 2713, 0, 0, 0, 0, 498, 131, 475, 15, 64, 2343, 3586, 1, 141, 117, 24, 0, 2499, 2021, 478, 0, 0, 298, 66, 0, 0, 13, 3648, 3608, 40, 0, 8738, 500, 8738, 0, 6254, 2484, 0, 0, 0, 62, 4649, 154, 457, 1216, 69, 2156, 0, 37, 2, 1, 1, 0, 206, 166, 40, 0, 0),
(11, 5, '2022_8', 942, 17, 0, 0, 5, 9558, 7190, 2368, 0, 25224, 692, 19971, 5253, 10722, 10396, 3634, 472, 0, 19, 7092, 1552, 1673, 794, 1047, 6300, 5854, 912, 189, 140, 49, 0, 2691, 1553, 1138, 0, 0, 732, 0, 0, 0, 0, 5950, 4090, 1860, 0, 16071, 0, 11458, 4613, 4986, 7245, 3569, 271, 0, 0, 3315, 874, 1278, 119, 984, 3664, 5737, 100, 145, 111, 34, 0, 2185, 1255, 930, 0, 0, 210, 17, 0, 0, 5, 3608, 3100, 508, 0, 9153, 692, 8513, 640, 5736, 3151, 65, 201, 0, 0, 3777, 674, 399, 675, 63, 2636, 117, 812, 44, 29, 15, 0, 506, 298, 208, 9, 0),
(12, 12, '2022_8', 1129, 159, 16, 0, 0, 12332, 11558, 774, 0, 37317, 962, 37317, 0, 25853, 11464, 0, 0, 0, 0, 6188, 2422, 4187, 3472, 277, 7765, 12429, 577, 140, 106, 34, 0, 2321, 1552, 769, 0, 0, 826, 0, 0, 0, 0, 11291, 10744, 547, 0, 35689, 0, 35689, 0, 24890, 10799, 0, 0, 0, 0, 5716, 2279, 4038, 3368, 252, 7183, 12323, 530, 126, 101, 25, 0, 1852, 1305, 547, 0, 0, 303, 159, 0, 0, 0, 1041, 814, 227, 0, 1628, 962, 1628, 0, 963, 665, 0, 0, 0, 0, 472, 143, 149, 104, 25, 582, 106, 47, 14, 5, 9, 0, 469, 247, 222, 0, 0),
(13, 5, '2022_9', 1060, 0, 0, 0, 5, 10630, 7881, 2749, 0, 28431, 754, 22226, 6205, 11655, 12022, 4107, 647, 0, 19, 7862, 1621, 1765, 832, 1158, 7850, 6319, 1024, 225, 161, 64, 0, 3301, 1850, 1451, 0, 0, 804, 0, 0, 0, 0, 6583, 4485, 2098, 0, 17993, 0, 12798, 5195, 5322, 8367, 4027, 277, 0, 0, 3639, 885, 1311, 119, 1090, 4636, 6206, 107, 170, 126, 44, 0, 2668, 1484, 1184, 0, 0, 256, 0, 0, 0, 5, 4047, 3396, 651, 0, 10438, 754, 9428, 1010, 6333, 3655, 80, 370, 0, 19, 4223, 736, 454, 713, 68, 3214, 113, 917, 55, 35, 20, 0, 633, 366, 267, 9, 0),
(14, 13, '2022_9', 1361, 489, 0, 0, 0, 12477, 11970, 507, 0, 28063, 1781, 28063, 0, 16047, 11920, 42, 54, 0, 15, 10390, 1094, 988, 1107, 337, 11346, 2682, 119, 135, 117, 18, 0, 3400, 2893, 507, 0, 0, 476, 0, 0, 0, 0, 5908, 5544, 364, 0, 7997, 0, 7997, 0, 5156, 2763, 39, 39, 0, 0, 1543, 225, 259, 425, 122, 2729, 2654, 40, 120, 103, 17, 0, 3090, 2629, 461, 0, 0, 885, 489, 0, 0, 0, 6569, 6426, 143, 0, 20066, 1781, 20066, 0, 10891, 9157, 3, 15, 0, 15, 8847, 869, 729, 682, 215, 8617, 28, 79, 15, 14, 1, 0, 310, 264, 46, 0, 0),
(15, 11, '2022_9', 1090, 271, 62, 0, 1, 13462, 11614, 1848, 0, 41013, 10252, 41013, 0, 30039, 10969, 5, 0, 0, 1, 12548, 3833, 4060, 3185, 6631, 10714, 0, 42, 236, 194, 42, 0, 4848, 3000, 1848, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1090, 271, 62, 0, 1, 13462, 11614, 1848, 0, 41013, 10252, 41013, 0, 30039, 10969, 5, 0, 0, 1, 12548, 3833, 4060, 3185, 6631, 10714, 0, 42, 236, 194, 42, 0, 4848, 3000, 1848, 0, 0),
(16, 14, '2022_9', 540, 40, 0, 0, 15, 4124, 4067, 57, 0, 16890, 831, 16890, 0, 12033, 4845, 12, 0, 0, 65, 3344, 1154, 1981, 1786, 1455, 4497, 2327, 346, 119, 111, 8, 0, 413, 356, 57, 0, 0, 242, 0, 0, 0, 1, 1965, 1943, 22, 0, 8133, 0, 8133, 0, 5783, 2338, 12, 0, 0, 1, 1167, 382, 824, 785, 502, 2133, 2319, 21, 98, 96, 2, 0, 305, 283, 22, 0, 0, 298, 40, 0, 0, 14, 2159, 2124, 35, 0, 8757, 831, 8757, 0, 6250, 2507, 0, 0, 0, 64, 2177, 772, 1157, 1001, 953, 2364, 8, 325, 21, 15, 6, 0, 108, 73, 35, 2, 1),
(17, 12, '2022_9', 1195, 178, 18, 0, 0, 13701, 12927, 774, 0, 41814, 1013, 41814, 0, 28833, 12981, 0, 0, 0, 0, 6824, 2695, 4750, 4020, 351, 8671, 13830, 673, 146, 112, 34, 0, 2428, 1654, 774, 0, 0, 871, 0, 0, 0, 0, 12599, 12052, 547, 0, 40094, 0, 40094, 0, 27816, 12278, 0, 0, 0, 0, 6326, 2544, 4579, 3911, 325, 8067, 13722, 620, 131, 106, 25, 0, 1926, 1379, 547, 0, 0, 324, 178, 18, 0, 0, 1102, 875, 227, 0, 1720, 1013, 1720, 0, 1017, 703, 0, 0, 0, 0, 498, 151, 171, 109, 26, 604, 108, 53, 15, 6, 9, 0, 502, 275, 227, 0, 0),
(18, 8, '2022_9', 1120, 122, 0, 10, 75, 12997, 9536, 3461, 0, 24068, 1512, 18755, 5313, 18593, 4142, 723, 610, 44, 482, 9141, 1080, 1853, 463, 1899, 3812, 5814, 6, 217, 131, 86, 0, 3994, 2309, 1685, 0, 0, 661, 0, 0, 0, 3, 7595, 4765, 2830, 0, 13632, 0, 8947, 4685, 10313, 2655, 649, 15, 0, 7, 2773, 901, 1029, 266, 1390, 2056, 5211, 6, 201, 128, 73, 0, 3054, 1908, 1146, 0, 0, 459, 122, 0, 10, 72, 5402, 4771, 631, 0, 10436, 1512, 9808, 628, 8280, 1487, 74, 595, 44, 475, 6368, 179, 824, 197, 509, 1756, 603, 0, 16, 3, 13, 0, 940, 401, 539, 4, 0),
(19, 6, '2022_9', 786, 103, 0, 0, 13, 8646, 8071, 575, 0, 18565, 749, 18565, 0, 12550, 6015, 0, 0, 0, 69, 6170, 310, 1092, 1458, 133, 5171, 4192, 39, 152, 124, 28, 0, 2883, 2308, 575, 0, 0, 377, 0, 0, 0, 0, 4445, 3917, 528, 0, 8245, 0, 8245, 0, 5084, 3161, 0, 0, 0, 0, 569, 146, 564, 15, 64, 2693, 4192, 2, 150, 123, 27, 0, 2658, 2130, 528, 0, 0, 409, 103, 0, 0, 13, 4201, 4154, 47, 0, 10320, 749, 10320, 0, 7466, 2854, 0, 0, 0, 69, 5601, 164, 528, 1443, 69, 2478, 0, 37, 2, 1, 1, 0, 225, 178, 47, 0, 0),
(20, 7, '2022_9', 1392, 214, 31, 26, 32, 12979, 11900, 1079, 0, 31055, 2414, 29001, 2054, 26441, 4065, 549, 0, 32, 115, 5186, 3288, 6041, 4555, 2391, 3703, 5456, 435, 153, 134, 19, 0, 2903, 2375, 528, 0, 0, 742, 0, 0, 0, 0, 5672, 4718, 954, 0, 17441, 0, 15387, 2054, 15212, 1697, 532, 0, 0, 0, 2567, 1930, 2328, 2299, 921, 1513, 5456, 427, 119, 107, 12, 0, 2237, 1834, 403, 0, 0, 650, 214, 31, 26, 32, 7307, 7182, 125, 0, 13614, 2414, 13614, 0, 11229, 2368, 17, 0, 32, 115, 2619, 1358, 3713, 2256, 1470, 2190, 0, 8, 34, 27, 7, 0, 666, 541, 125, 8, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `key_indicators_arkhive`
--

CREATE TABLE `key_indicators_arkhive` (
  `id_arhive` int(11) NOT NULL,
  `date_arhive` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `key_indicators_arkhive`
--

INSERT INTO `key_indicators_arkhive` (`id_arhive`, `date_arhive`, `file`) VALUES
(1, '02-09-2022 9:19', 'osnovnii_pokazatels_2022_8.xls'),
(2, '02-09-2022 9:21', 'osnovnii_pokazatels_2022_8.xls'),
(3, '13-09-2022 11:24', 'osnovnii_pokazatels_2022_8.xls'),
(4, '14-09-2022 14:44', 'osnovnii_pokazatels_2022_8.xls');

-- --------------------------------------------------------

--
-- Структура таблицы `key_indicators_log_edit`
--

CREATE TABLE `key_indicators_log_edit` (
  `id_edit` int(20) NOT NULL,
  `id_otchet` int(11) NOT NULL,
  `id_author_edit` int(11) NOT NULL,
  `date_edit` text NOT NULL,
  `method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `key_indicators_log_edit`
--

INSERT INTO `key_indicators_log_edit` (`id_edit`, `id_otchet`, `id_author_edit`, `date_edit`, `method`) VALUES
(1, 1, 8, '01-09-2022 11:25', 'Send'),
(2, 2, 4, '01-09-2022 11:37', 'Send'),
(3, 3, 14, '01-09-2022 11:59', 'Send'),
(4, 4, 7, '01-09-2022 13:39', 'Send'),
(5, 5, 9, '01-09-2022 15:14', 'Send'),
(6, 6, 16, '02-09-2022 10:57', 'Send'),
(7, 7, 10, '02-09-2022 11:05', 'Send'),
(8, 8, 13, '02-09-2022 11:43', 'Send'),
(9, 9, 11, '02-09-2022 13:24', 'Send'),
(10, 10, 6, '04-09-2022 15:10', 'Send'),
(11, 11, 5, '04-09-2022 16:13', 'Send'),
(12, 12, 12, '04-09-2022 16:41', 'Send'),
(21, 12, 1, '14-09-2022 12:52', 'update'),
(22, 13, 5, '02-10-2022 14:38', 'Send'),
(23, 14, 13, '03-10-2022 9:13', 'Send'),
(24, 15, 11, '03-10-2022 11:15', 'Send'),
(25, 16, 14, '03-10-2022 11:36', 'Send'),
(26, 17, 12, '03-10-2022 13:52', 'Send'),
(27, 18, 8, '03-10-2022 15:48', 'Send'),
(28, 19, 6, '03-10-2022 16:38', 'Send'),
(29, 20, 7, '04-10-2022 15:51', 'Send');

-- --------------------------------------------------------

--
-- Структура таблицы `logs_auth`
--

CREATE TABLE `logs_auth` (
  `login` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `logs_auth`
--

INSERT INTO `logs_auth` (`login`, `date`) VALUES
('admin', '2022-04-25 11:02:57'),
('kna', '2022-04-25 11:22:00'),
('admin', '2022-04-25 11:54:21'),
('kna', '2022-04-25 11:59:57'),
('admin', '2022-04-25 12:00:42'),
('admin', '2022-04-25 16:37:09'),
('admin', '2022-04-25 19:26:26'),
('admin', '2022-04-27 09:22:25'),
('rmb', '2022-05-01 13:00:08'),
('admin', '2022-05-01 16:17:06'),
('dns', '2022-05-02 11:05:38'),
('seu', '2022-05-02 11:08:21'),
('pts', '2022-05-02 12:36:33'),
('ikf', '2022-05-02 13:13:01'),
('admin', '2022-05-02 13:48:59'),
('admin', '2022-05-02 13:50:50'),
('admin', '2022-05-02 13:51:37'),
('admin', '2022-05-02 13:56:43'),
('admin', '2022-05-02 13:57:25'),
('kos', '2022-05-02 15:14:48'),
('dus', '2022-05-02 15:34:36'),
('dus', '2022-05-03 18:26:51'),
('pts', '2022-05-04 08:52:32'),
('admin', '2022-05-04 09:07:04'),
('kev', '2022-05-04 11:14:40'),
('mgg', '2022-05-04 11:25:43'),
('goa', '2022-05-04 11:30:07'),
('admin', '2022-05-04 11:31:37'),
('admin', '2022-05-04 11:33:33'),
('admin', '2022-05-04 19:45:34'),
('admin', '2022-05-05 09:36:05'),
('admin', '2022-05-05 18:43:06'),
('admin', '2022-05-09 15:38:23'),
('admin', '2022-05-11 09:09:56'),
('via', '2022-05-12 12:50:40'),
('via', '2022-05-12 12:54:08'),
('admin', '2022-05-25 21:59:38'),
('admin', '2022-05-27 09:30:44'),
('rmb', '2022-05-30 15:39:42'),
('dus', '2022-05-31 14:02:11'),
('pts', '2022-06-02 12:13:20'),
('via', '2022-06-02 12:22:46'),
('admin', '2022-06-09 15:06:39'),
('admin', '2022-06-09 15:15:16'),
('uni', '2022-06-10 09:22:34'),
('rmb', '2022-07-04 18:22:42'),
('mgg', '2022-07-04 18:23:17'),
('via', '2022-07-04 18:26:38'),
('seu', '2022-07-04 22:34:44'),
('pts', '2022-07-05 10:19:58'),
('admin', '2022-07-07 10:18:05'),
('admin', '2022-07-07 11:07:29'),
('dns', '2022-08-01 12:01:10'),
('mgg', '2022-08-01 14:07:03'),
('rmb', '2022-08-01 15:53:52'),
('ikf', '2022-08-02 10:25:06'),
('dus', '2022-08-02 11:11:10'),
('kos', '2022-08-02 11:22:18'),
('seu', '2022-08-03 17:47:28'),
('admin', '2022-08-04 14:37:32'),
('admin', '2022-08-05 15:11:57'),
('kev', '2022-08-05 15:14:42'),
('kev', '2022-08-05 15:19:30'),
('goa', '2022-08-05 15:23:34'),
('kna', '2022-08-05 15:29:11'),
('uni', '2022-08-29 17:20:44'),
('KNA', '2022-08-29 18:01:14'),
('KNA', '2022-08-29 18:02:29'),
('KNA', '2022-08-29 18:03:22'),
('xnv', '2022-08-30 09:11:30'),
('XNV', '2022-08-30 09:12:58'),
('xnv', '2022-08-30 09:13:16'),
('kna', '2022-08-30 09:13:45'),
('dns', '2022-08-30 11:21:03'),
('rmb', '2022-08-30 15:08:43'),
('dus', '2022-08-30 15:33:15'),
('goa', '2022-08-30 15:56:33'),
('mgg', '2022-08-30 16:00:23'),
('goa', '2022-08-30 16:14:51'),
('via', '2022-08-30 16:16:02'),
('shev', '2022-08-31 16:10:56'),
('admin', '2022-08-31 16:19:51'),
('goa', '2022-09-01 08:31:31'),
('kev', '2022-09-01 16:52:16'),
('goa', '2022-09-01 17:04:13'),
('admin', '2022-09-02 09:13:54'),
('admin', '2022-09-02 09:20:47'),
('shev', '2022-09-02 09:21:16'),
('admin', '2022-09-02 09:35:49'),
('shev', '2022-09-13 14:45:27'),
('admin', '2022-09-13 14:54:56'),
('admin', '2022-09-14 11:15:58'),
('admin', '2022-09-14 11:58:58'),
('admin', '2022-09-14 14:29:17'),
('admin', '2022-09-14 14:52:52'),
('admin', '2022-09-20 17:02:37'),
('admin', '2022-09-22 09:21:37'),
('Admin', '2022-09-23 10:49:33'),
('admin', '2022-09-24 14:25:09'),
('admin', '2022-09-29 19:04:31'),
('via', '2022-09-30 12:48:47'),
('rmb', '2022-10-02 12:23:54'),
('rmb', '2022-10-02 12:23:58'),
('rmb', '2022-10-02 12:24:38'),
('mgg', '2022-10-04 11:57:42'),
('KNA', '2022-10-06 13:10:49'),
('kna', '2022-10-06 13:11:02'),
('goa', '2022-10-06 13:11:17'),
('kna', '2022-10-06 13:23:01'),
('pts', '2022-10-06 13:29:04'),
('kna', '2022-10-06 13:33:38'),
('admin', '2022-10-17 09:11:48'),
('admin', '2022-10-17 12:15:53'),
('admin', '2022-10-17 15:45:42'),
('admin', '2022-10-17 16:46:14'),
('admin', '2022-10-19 11:27:57'),
('admin', '2022-10-19 12:23:55'),
('admin', '2022-10-19 12:25:32');

-- --------------------------------------------------------

--
-- Структура таблицы `otchet_cod`
--

CREATE TABLE `otchet_cod` (
  `id_otchet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_otch` text NOT NULL,
  `number_users` int(11) NOT NULL DEFAULT 0,
  `number_users_kd` int(11) NOT NULL DEFAULT 0,
  `number_visits` int(11) NOT NULL DEFAULT 0,
  `number_visits_kd` int(11) NOT NULL DEFAULT 0,
  `number_book_publishing` int(11) NOT NULL DEFAULT 0,
  `number_book_publishing_kd` int(11) NOT NULL DEFAULT 0,
  `work_komp` int(11) NOT NULL DEFAULT 0,
  `work_komp_kd` int(11) NOT NULL DEFAULT 0,
  `garant` int(11) NOT NULL DEFAULT 0,
  `garant_kd` int(11) NOT NULL DEFAULT 0,
  `konsultant` int(11) NOT NULL DEFAULT 0,
  `konsultant_kd` int(11) NOT NULL DEFAULT 0,
  `ethernet` int(11) NOT NULL DEFAULT 0,
  `ethernet_kd` int(11) NOT NULL DEFAULT 0,
  `electronic_catalog` int(11) NOT NULL DEFAULT 0,
  `electronic_catalog_kd` int(11) NOT NULL DEFAULT 0,
  `activities_carried` int(11) NOT NULL DEFAULT 0,
  `activities_carried_kd` int(11) NOT NULL DEFAULT 0,
  `number_event_visits` int(11) NOT NULL DEFAULT 0,
  `number_event_visits_kd` int(11) NOT NULL DEFAULT 0,
  `computer_school` int(11) NOT NULL DEFAULT 0,
  `computer_school_kd` int(11) NOT NULL DEFAULT 0,
  `number_students` int(11) NOT NULL DEFAULT 0,
  `number_students_kd` int(11) NOT NULL DEFAULT 0,
  `number_classes` int(11) NOT NULL DEFAULT 0,
  `number_classes_kd` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `otchet_cod`
--

INSERT INTO `otchet_cod` (`id_otchet`, `id_user`, `date_otch`, `number_users`, `number_users_kd`, `number_visits`, `number_visits_kd`, `number_book_publishing`, `number_book_publishing_kd`, `work_komp`, `work_komp_kd`, `garant`, `garant_kd`, `konsultant`, `konsultant_kd`, `ethernet`, `ethernet_kd`, `electronic_catalog`, `electronic_catalog_kd`, `activities_carried`, `activities_carried_kd`, `number_event_visits`, `number_event_visits_kd`, `computer_school`, `computer_school_kd`, `number_students`, `number_students_kd`, `number_classes`, `number_classes_kd`) VALUES
(1, 9, '2021_4', 43, 0, 153, 0, 388, 0, 23, 0, 0, 0, 0, 0, 16, 0, 9, 0, 0, 0, 0, 0, 1, 0, 5, 0, 16, 0),
(2, 9, '2022_4', 30, 0, 119, 0, 378, 0, 26, 0, 0, 0, 0, 0, 12, 0, 31, 0, 1, 1, 22, 18, 1, 0, 5, 0, 5, 0),
(3, 14, '2021_4', 37, 19, 62, 37, 2, 0, 55, 31, 0, 0, 0, 0, 17, 0, 19, 16, 1, 1, 7, 7, 0, 0, 0, 0, 0, 0),
(4, 14, '2022_4', 17, 4, 30, 8, 38, 1, 28, 8, 0, 0, 0, 0, 3, 0, 11, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 12, '2021_4', 9, 4, 41, 7, 72, 6, 41, 7, 0, 0, 0, 0, 41, 7, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 12, '2022_4', 25, 4, 75, 4, 3, 0, 39, 4, 0, 0, 0, 0, 39, 4, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 11, '2021_4', 7, 0, 13, 0, 4, 0, 13, 0, 0, 0, 0, 0, 13, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 11, '2022_4', 19, 0, 70, 0, 0, 0, 33, 0, 0, 0, 0, 0, 31, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 13, '2021_4', 13, 0, 38, 0, 28, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 17, 0, 0, 0, 0, 0, 0, 0),
(10, 13, '2022_4', 0, 0, 14, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 12, 5, 0, 0, 0, 0, 0, 0),
(11, 3, '2021_4', 476, 0, 1225, 0, 2117, 0, 545, 0, 0, 0, 18, 0, 534, 0, 96, 0, 26, 0, 517, 0, 4, 0, 16, 0, 55, 0),
(12, 3, '2022_4', 497, 0, 1356, 0, 4119, 0, 725, 0, 0, 0, 20, 0, 538, 0, 101, 0, 17, 0, 453, 0, 8, 0, 26, 0, 66, 0),
(13, 7, '2021_4', 164, 44, 199, 50, 10, 0, 175, 48, 0, 0, 0, 0, 155, 48, 47, 15, 0, 0, 0, 0, 1, 0, 5, 0, 3, 0),
(14, 7, '2022_4', 166, 52, 200, 66, 49, 0, 176, 61, 0, 0, 0, 0, 163, 48, 61, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 5, '2021_4', 32, 12, 139, 44, 198, 89, 0, 0, 0, 0, 0, 0, 112, 50, 28, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 5, '2022_4', 37, 14, 173, 97, 267, 139, 0, 0, 0, 0, 0, 0, 132, 81, 12, 7, 6, 3, 67, 39, 0, 0, 0, 0, 0, 0),
(17, 10, '2021_4', 15, 1, 49, 1, 70, 2, 43, 1, 0, 0, 0, 0, 43, 1, 12, 0, 1, 1, 18, 18, 2, 0, 2, 0, 13, 0),
(18, 10, '2022_4', 17, 0, 83, 30, 39, 0, 39, 0, 0, 0, 0, 0, 39, 0, 7, 0, 2, 2, 44, 44, 1, 0, 1, 0, 5, 0),
(19, 4, '2021_4', 423, 419, 1172, 1143, 1233, 1233, 40, 40, 0, 0, 0, 0, 1, 1, 5, 5, 12, 12, 288, 288, 3, 3, 6, 6, 24, 24),
(20, 4, '2022_4', 411, 407, 1166, 1166, 1229, 1229, 37, 37, 0, 0, 0, 0, 0, 0, 3, 3, 12, 12, 342, 342, 3, 3, 6, 6, 24, 24),
(21, 6, '2021_4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 6, '2022_4', 11, 0, 19, 0, 19, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 8, '2021_4', 83, 3, 227, 4, 277, 3, 25, 19, 0, 0, 0, 0, 23, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 8, '2022_4', 69, 2, 154, 2, 144, 2, 25, 0, 0, 0, 0, 0, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 4, '2021_5', 423, 419, 1206, 1175, 1241, 1241, 57, 57, 0, 0, 0, 0, 1, 1, 5, 5, 12, 12, 288, 288, 5, 5, 9, 9, 40, 40),
(26, 4, '2022_5', 424, 420, 1207, 1207, 1255, 1255, 46, 46, 0, 0, 0, 0, 0, 0, 3, 5, 12, 12, 342, 342, 5, 5, 9, 9, 40, 40),
(27, 9, '2021_5', 43, 0, 172, 0, 433, 0, 25, 0, 0, 0, 0, 0, 21, 0, 13, 0, 0, 0, 0, 0, 1, 0, 5, 0, 23, 0),
(28, 9, '2022_5', 38, 0, 152, 0, 453, 0, 37, 0, 0, 0, 0, 0, 12, 0, 31, 0, 1, 1, 22, 18, 1, 0, 5, 0, 25, 0),
(29, 13, '2021_5', 13, 0, 38, 0, 28, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 13, '2022_5', 0, 0, 2, 0, 11, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 8, '2021_5', 91, 3, 277, 4, 308, 4, 41, 20, 0, 0, 0, 0, 35, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 8, '2022_5', 70, 2, 174, 2, 174, 2, 25, 0, 0, 0, 0, 0, 25, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 12, '2021_5', 11, 5, 49, 8, 76, 7, 49, 8, 0, 0, 0, 0, 49, 8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 12, '2022_5', 31, 4, 89, 4, 6, 0, 45, 4, 0, 0, 0, 0, 45, 4, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 10, '2021_5', 24, 5, 69, 6, 82, 2, 58, 6, 0, 0, 0, 0, 58, 6, 20, 4, 1, 1, 18, 18, 2, 0, 2, 0, 13, 0),
(36, 10, '2022_5', 21, 1, 89, 31, 47, 0, 45, 1, 0, 0, 0, 0, 45, 1, 10, 1, 2, 2, 44, 44, 1, 0, 1, 0, 5, 0),
(37, 3, '2021_5', 511, 0, 1418, 0, 2460, 0, 575, 0, 0, 0, 18, 0, 559, 0, 106, 0, 27, 0, 542, 0, 4, 0, 20, 0, 60, 0),
(38, 3, '2022_5', 575, 0, 1595, 0, 6820, 0, 859, 0, 0, 0, 20, 0, 672, 0, 120, 0, 19, 0, 479, 0, 9, 0, 33, 0, 67, 0),
(39, 11, '2021_5', 8, 0, 19, 0, 6, 0, 19, 0, 0, 0, 0, 0, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 11, '2022_5', 25, 0, 124, 0, 0, 0, 50, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 6, '2021_5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 6, '2022_5', 11, 0, 26, 0, 39, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 7, '2021_5', 180, 49, 344, 58, 10, 0, 319, 56, 0, 0, 0, 0, 211, 56, 54, 18, 0, 0, 0, 0, 1, 0, 5, 0, 27, 0),
(44, 7, '2022_5', 193, 64, 248, 84, 63, 0, 224, 79, 0, 0, 0, 0, 203, 65, 69, 23, 0, 0, 0, 0, 1, 0, 5, 0, 4, 0),
(45, 5, '2021_5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 5, '2022_5', 37, 14, 234, 117, 311, 207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 67, 39, 0, 0, 0, 0, 0, 0),
(47, 14, '2021_5', 38, 20, 73, 48, 7, 5, 66, 42, 0, 0, 0, 0, 17, 0, 19, 5, 3, 3, 17, 17, 0, 0, 0, 0, 0, 0),
(48, 14, '2022_5', 17, 4, 33, 8, 0, 0, 29, 8, 0, 0, 0, 0, 3, 0, 12, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 3, '2021_6', 531, 0, 1612, 0, 2961, 0, 636, 0, 0, 0, 30, 0, 617, 0, 118, 0, 28, 0, 546, 0, 6, 0, 32, 0, 120, 0),
(50, 3, '2022_6', 633, 0, 1770, 0, 7369, 0, 932, 0, 0, 0, 32, 0, 742, 0, 139, 0, 21, 0, 505, 0, 10, 0, 39, 0, 71, 0),
(51, 4, '2021_6', 444, 440, 1362, 1331, 1267, 1267, 57, 57, 0, 0, 0, 0, 1, 1, 5, 5, 16, 16, 418, 418, 5, 5, 9, 9, 40, 40),
(52, 4, '2022_6', 448, 448, 1369, 1369, 1283, 1283, 46, 46, 0, 0, 0, 0, 0, 3, 3, 3, 14, 14, 371, 371, 5, 5, 9, 9, 40, 40),
(53, 5, '2021_6', 39, 18, 303, 74, 403, 105, 270, 73, 0, 0, 0, 0, 0, 0, 45, 41, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 5, '2022_6', 41, 18, 307, 129, 409, 222, 281, 124, 0, 0, 0, 0, 182, 0, 16, 9, 8, 4, 97, 48, 0, 0, 0, 0, 0, 0),
(55, 12, '2021_6', 15, 5, 75, 5, 67, 6, 58, 5, 0, 0, 0, 0, 58, 5, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 12, '2022_6', 33, 6, 97, 6, 8, 0, 48, 6, 0, 0, 0, 0, 48, 6, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 11, '2021_6', 10, 0, 26, 0, 9, 0, 26, 0, 0, 0, 0, 0, 26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 11, '2022_6', 27, 0, 211, 0, 0, 0, 119, 0, 0, 0, 0, 0, 57, 0, 0, 0, 6, 0, 60, 0, 0, 0, 0, 0, 0, 0),
(59, 9, '2021_6', 44, 0, 184, 0, 453, 0, 30, 0, 0, 0, 0, 0, 26, 0, 19, 0, 0, 0, 0, 0, 1, 0, 5, 0, 25, 0),
(60, 9, '2022_6', 43, 0, 182, 0, 540, 0, 37, 0, 0, 0, 0, 0, 14, 0, 55, 0, 1, 1, 22, 18, 1, 0, 5, 0, 38, 0),
(61, 7, '2021_6', 191, 50, 388, 60, 21, 0, 362, 58, 0, 0, 0, 0, 254, 58, 58, 18, 1, 1, 6, 6, 1, 0, 5, 0, 34, 0),
(62, 7, '2022_6', 209, 70, 393, 113, 78, 0, 368, 107, 0, 0, 0, 0, 304, 79, 78, 28, 1, 0, 5, 0, 1, 0, 5, 0, 30, 0),
(63, 8, '2021_6', 96, 3, 307, 5, 339, 4, 44, 21, 0, 0, 0, 0, 36, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 8, '2022_6', 85, 2, 260, 7, 238, 2, 76, 7, 0, 0, 0, 0, 76, 7, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 14, '2021_6', 38, 20, 73, 48, 7, 5, 66, 42, 0, 0, 0, 0, 17, 0, 19, 17, 3, 3, 17, 17, 0, 0, 0, 0, 0, 0),
(66, 14, '2022_6', 18, 4, 36, 8, 0, 0, 31, 8, 0, 0, 0, 0, 4, 0, 14, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 13, '2021_6', 13, 0, 38, 0, 28, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 13, '2022_6', 0, 0, 16, 0, 11, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 12, 0, 0, 0, 0, 0, 0, 0),
(69, 10, '2021_6', 28, 9, 89, 10, 99, 2, 78, 10, 0, 0, 0, 0, 78, 10, 25, 9, 1, 1, 18, 18, 2, 0, 2, 0, 13, 0),
(70, 10, '2022_6', 30, 7, 101, 63, 55, 0, 59, 7, 0, 0, 0, 0, 59, 7, 18, 7, 3, 3, 56, 56, 1, 0, 1, 0, 5, 0),
(71, 6, '2021_6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 6, '2022_6', 13, 0, 33, 0, 55, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 8, '2021_7', 96, 3, 307, 5, 339, 4, 44, 21, 0, 21, 0, 0, 36, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 8, '2022_7', 108, 3, 431, 10, 286, 2, 212, 10, 0, 0, 0, 0, 160, 10, 10, 0, 0, 0, 0, 0, 1, 0, 6, 0, 34, 0),
(75, 14, '2021_7', 38, 20, 73, 48, 7, 5, 66, 42, 0, 0, 0, 0, 17, 0, 19, 17, 3, 3, 17, 17, 0, 0, 0, 0, 0, 0),
(76, 14, '2022_7', 18, 4, 38, 8, 0, 0, 31, 8, 0, 0, 0, 0, 3, 0, 14, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 13, '2021_7', 15, 0, 48, 0, 46, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 13, '2022_7', 0, 0, 25, 0, 29, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 10, '2021_7', 28, 9, 89, 10, 99, 2, 78, 10, 0, 0, 0, 0, 78, 10, 25, 9, 1, 1, 18, 18, 2, 0, 2, 0, 13, 0),
(80, 10, '2022_7', 32, 7, 116, 70, 62, 0, 67, 7, 0, 0, 0, 0, 67, 7, 19, 7, 4, 4, 63, 63, 1, 0, 1, 0, 5, 0),
(81, 9, '2021_7', 51, 0, 218, 0, 577, 0, 35, 0, 0, 0, 0, 0, 29, 0, 27, 0, 0, 0, 0, 0, 1, 0, 5, 0, 25, 0),
(82, 9, '2022_7', 51, 0, 215, 0, 674, 0, 42, 0, 0, 0, 0, 0, 18, 0, 73, 0, 1, 1, 22, 18, 1, 0, 5, 0, 38, 0),
(83, 7, '2021_7', 204, 51, 410, 61, 22, 0, 383, 59, 0, 0, 0, 0, 272, 59, 62, 18, 1, 1, 6, 6, 1, 0, 5, 0, 34, 0),
(84, 7, '2022_7', 223, 79, 434, 122, 88, 0, 406, 116, 0, 0, 0, 0, 337, 87, 81, 28, 1, 0, 5, 0, 1, 0, 5, 0, 30, 0),
(85, 11, '2021_7', 11, 0, 32, 0, 11, 0, 32, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 11, '2022_7', 32, 0, 344, 0, 0, 0, 193, 0, 0, 0, 0, 0, 71, 0, 0, 0, 15, 0, 150, 0, 0, 0, 0, 0, 0, 0),
(87, 12, '2021_7', 21, 7, 75, 10, 81, 11, 75, 11, 0, 0, 0, 0, 75, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 12, '2022_7', 36, 6, 108, 6, 8, 0, 51, 6, 0, 0, 0, 0, 51, 6, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 6, '2021_7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 6, '2022_7', 13, 0, 36, 0, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 3, '2021_7', 675, 0, 1987, 0, 3331, 0, 778, 0, 1, 0, 32, 0, 759, 0, 133, 0, 31, 0, 580, 0, 6, 0, 32, 0, 120, 0),
(92, 3, '2022_7', 716, 0, 1996, 0, 7600, 0, 1025, 0, 0, 0, 32, 0, 835, 0, 167, 0, 21, 0, 505, 0, 11, 0, 43, 0, 75, 0),
(93, 5, '2021_7', 32, 12, 315, 87, 417, 89, 0, 0, 0, 0, 0, 0, 282, 86, 28, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 5, '2022_7', 41, 18, 324, 141, 472, 271, 0, 0, 0, 0, 0, 0, 324, 161, 12, 7, 2, 4, 111, 62, 0, 0, 0, 0, 0, 0),
(95, 4, '2021_7', 458, 454, 1380, 1349, 1285, 1285, 57, 57, 0, 0, 0, 0, 0, 0, 5, 5, 16, 16, 418, 418, 5, 5, 9, 9, 40, 40),
(96, 4, '2022_7', 459, 459, 1380, 1380, 1294, 1294, 46, 46, 0, 0, 0, 0, 3, 3, 3, 3, 14, 14, 371, 371, 5, 5, 9, 9, 40, 40),
(97, 13, '2021_8', 15, 0, 51, 0, 51, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(98, 13, '2022_8', 0, 0, 28, 0, 33, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(99, 3, '2021_8', 754, 0, 2313, 0, 3893, 0, 927, 0, 1, 0, 35, 0, 895, 0, 156, 0, 39, 0, 652, 0, 6, 0, 33, 0, 124, 0),
(100, 3, '2022_8', 776, 0, 2318, 0, 8026, 0, 1110, 0, 0, 0, 37, 0, 914, 0, 187, 0, 21, 0, 505, 0, 11, 0, 43, 0, 82, 0),
(101, 8, '2021_8', 116, 3, 526, 8, 488, 7, 119, 22, 0, 0, 0, 0, 111, 20, 8, 1, 0, 0, 0, 0, 1, 0, 6, 0, 10, 0),
(102, 8, '2022_8', 111, 3, 524, 11, 393, 2, 240, 11, 0, 0, 0, 0, 188, 11, 10, 0, 0, 0, 0, 0, 1, 0, 6, 0, 34, 0),
(103, 14, '2021_8', 38, 20, 73, 48, 7, 5, 66, 42, 0, 0, 0, 0, 17, 0, 19, 17, 3, 3, 17, 17, 0, 0, 0, 0, 0, 0),
(104, 14, '2022_8', 18, 4, 38, 8, 0, 0, 31, 8, 0, 0, 0, 0, 3, 0, 14, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(105, 11, '2021_8', 13, 0, 37, 0, 11, 0, 37, 0, 0, 0, 0, 0, 37, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(106, 11, '2022_8', 46, 0, 489, 0, 0, 0, 294, 0, 0, 0, 0, 0, 90, 0, 0, 0, 23, 0, 231, 0, 0, 0, 0, 0, 0, 0),
(107, 9, '2021_8', 54, 0, 266, 0, 704, 0, 38, 0, 0, 0, 0, 0, 29, 0, 28, 0, 0, 0, 0, 0, 1, 0, 5, 0, 25, 0),
(108, 9, '2022_8', 54, 0, 259, 0, 806, 0, 51, 0, 0, 0, 0, 0, 43, 0, 93, 0, 1, 0, 22, 18, 1, 0, 5, 0, 38, 0),
(109, 7, '2021_8', 225, 54, 449, 65, 22, 0, 419, 62, 0, 0, 0, 0, 306, 62, 72, 20, 1, 1, 6, 6, 1, 0, 5, 0, 34, 0),
(110, 7, '2022_8', 262, 80, 486, 131, 103, 0, 455, 124, 0, 0, 0, 0, 381, 94, 90, 31, 1, 0, 5, 0, 1, 0, 5, 0, 30, 0),
(111, 4, '2021_8', 488, 484, 1410, 1376, 1315, 1315, 57, 57, 0, 0, 0, 0, 0, 0, 8, 8, 16, 16, 418, 418, 5, 5, 9, 9, 10, 10),
(112, 4, '2022_8', 488, 488, 1409, 1409, 1323, 1323, 46, 46, 0, 0, 0, 0, 0, 0, 3, 3, 16, 16, 395, 395, 5, 5, 9, 9, 10, 10),
(113, 10, '2021_8', 31, 9, 108, 13, 144, 2, 97, 13, 0, 0, 0, 0, 97, 13, 29, 12, 1, 1, 18, 18, 3, 0, 3, 0, 18, 0),
(114, 10, '2022_8', 32, 7, 116, 70, 62, 0, 67, 7, 0, 0, 0, 0, 67, 7, 19, 7, 4, 4, 63, 63, 1, 0, 3, 0, 5, 0),
(115, 6, '2021_8', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(116, 6, '2022_8', 13, 0, 37, 0, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(117, 12, '2021_8', 25, 7, 88, 10, 85, 11, 87, 10, 0, 0, 0, 0, 85, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(118, 12, '2022_8', 39, 6, 117, 9, 8, 0, 55, 9, 0, 0, 0, 0, 53, 6, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(119, 5, '2021_8', 37, 33, 51, 30, 67, 37, 0, 0, 0, 0, 0, 0, 37, 37, 17, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(120, 5, '2022_8', 41, 18, 324, 141, 472, 271, 0, 0, 0, 0, 0, 0, 324, 161, 12, 7, 6, 4, 111, 62, 0, 0, 0, 0, 0, 0),
(121, 9, '2021_9', 55, 0, 298, 0, 815, 0, 41, 0, 0, 0, 0, 0, 30, 0, 33, 0, 0, 0, 0, 0, 1, 0, 5, 0, 25, 0),
(122, 9, '2022_9', 61, 0, 277, 0, 840, 0, 55, 0, 0, 0, 0, 0, 43, 0, 101, 0, 1, 0, 22, 0, 1, 0, 5, 0, 38, 0),
(123, 5, '2021_9', 39, 18, 344, 98, 446, 132, 0, 0, 0, 0, 0, 0, 294, 98, 72, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(124, 5, '2022_9', 41, 18, 366, 164, 647, 277, 0, 0, 0, 0, 0, 0, 334, 216, 12, 7, 9, 4, 141, 62, 0, 0, 0, 0, 0, 0),
(125, 11, '2021_9', 20, 0, 49, 0, 11, 0, 49, 0, 0, 0, 0, 0, 52, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(126, 11, '2022_9', 48, 0, 612, 0, 0, 0, 395, 0, 0, 0, 0, 0, 97, 0, 0, 0, 32, 0, 321, 0, 0, 0, 0, 0, 0, 0),
(127, 14, '2021_9', 38, 20, 73, 48, 7, 5, 66, 42, 0, 0, 0, 0, 17, 0, 19, 17, 3, 3, 17, 17, 0, 0, 0, 0, 0, 0),
(128, 14, '2022_9', 18, 4, 38, 8, 0, 0, 31, 8, 0, 0, 0, 0, 3, 0, 14, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(129, 8, '2021_9', 116, 3, 557, 8, 521, 7, 126, 22, 0, 0, 0, 0, 115, 20, 8, 1, 4, 0, 12, 0, 1, 0, 6, 0, 10, 0),
(130, 8, '2022_9', 115, 3, 635, 15, 523, 7, 257, 11, 0, 0, 0, 0, 205, 11, 10, 0, 0, 0, 0, 0, 1, 0, 6, 0, 38, 0),
(131, 12, '2021_9', 26, 7, 98, 10, 85, 11, 91, 10, 0, 0, 0, 0, 89, 10, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(132, 12, '2022_9', 44, 8, 127, 12, 8, 0, 60, 12, 0, 0, 0, 0, 58, 8, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(133, 6, '2021_9', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(134, 6, '2022_9', 13, 0, 41, 0, 69, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(135, 7, '2021_9', 242, 56, 492, 74, 36, 0, 449, 65, 0, 0, 0, 0, 336, 65, 79, 21, 2, 1, 11, 6, 1, 0, 5, 0, 34, 0),
(136, 7, '2022_9', 292, 92, 533, 147, 103, 0, 498, 140, 0, 0, 0, 0, 415, 105, 99, 36, 1, 0, 5, 0, 1, 0, 5, 0, 30, 0),
(137, 10, '2021_9', 32, 9, 137, 33, 144, 2, 97, 13, 0, 0, 0, 0, 97, 13, 29, 12, 3, 1, 38, 38, 3, 0, 3, 0, 18, 0),
(138, 10, '2022_9', 35, 7, 131, 70, 98, 0, 69, 7, 0, 0, 0, 0, 69, 7, 19, 7, 4, 4, 63, 63, 1, 0, 1, 0, 5, 0),
(139, 3, '2021_9', 851, 0, 2572, 0, 4381, 0, 1058, 0, 1, 0, 36, 0, 1024, 0, 183, 0, 42, 0, 669, 0, 8, 0, 39, 0, 132, 0),
(140, 3, '2022_9', 854, 0, 2620, 0, 8475, 0, 1222, 0, 0, 0, 39, 0, 1025, 0, 204, 0, 25, 0, 657, 0, 11, 0, 43, 0, 82, 0),
(141, 4, '2021_9', 549, 545, 1563, 1532, 1407, 1407, 79, 13, 0, 0, 0, 0, 0, 0, 10, 14, 19, 16, 413, 413, 6, 6, 12, 12, 48, 48),
(142, 4, '2022_9', 551, 547, 1561, 1561, 1407, 1407, 87, 87, 0, 0, 0, 0, 0, 0, 3, 3, 18, 18, 453, 453, 6, 6, 12, 12, 48, 48),
(143, 13, '2021_9', 15, 0, 51, 0, 51, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(144, 13, '2022_9', 0, 0, 28, 0, 33, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 12, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `otchet_cod_all`
--

CREATE TABLE `otchet_cod_all` (
  `id_otchets` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_otch` text NOT NULL,
  `number_users` int(11) NOT NULL DEFAULT 0,
  `number_users_kd` int(11) NOT NULL DEFAULT 0,
  `number_visits` int(11) NOT NULL DEFAULT 0,
  `number_visits_kd` int(11) NOT NULL DEFAULT 0,
  `number_book_publishing` int(11) NOT NULL DEFAULT 0,
  `number_book_publishing_kd` int(11) NOT NULL DEFAULT 0,
  `work_komp` int(11) NOT NULL DEFAULT 0,
  `work_komp_kd` int(11) NOT NULL DEFAULT 0,
  `garant` int(11) NOT NULL DEFAULT 0,
  `garant_kd` int(11) NOT NULL DEFAULT 0,
  `konsultant` int(11) NOT NULL DEFAULT 0,
  `konsultant_kd` int(11) NOT NULL DEFAULT 0,
  `ethernet` int(11) NOT NULL DEFAULT 0,
  `ethernet_kd` int(11) NOT NULL DEFAULT 0,
  `electronic_catalog` int(11) NOT NULL DEFAULT 0,
  `electronic_catalog_kd` int(11) NOT NULL DEFAULT 0,
  `activities_carried` int(11) NOT NULL DEFAULT 0,
  `activities_carried_kd` int(11) NOT NULL DEFAULT 0,
  `number_event_visits` int(11) NOT NULL DEFAULT 0,
  `number_event_visits_kd` int(11) NOT NULL DEFAULT 0,
  `computer_school` int(11) NOT NULL DEFAULT 0,
  `computer_school_kd` int(11) NOT NULL DEFAULT 0,
  `number_students` int(11) NOT NULL DEFAULT 0,
  `number_students_kd` int(11) NOT NULL DEFAULT 0,
  `number_classes` int(11) NOT NULL DEFAULT 0,
  `number_classes_kd` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `otchet_cod_all`
--

INSERT INTO `otchet_cod_all` (`id_otchets`, `id_user`, `date_otch`, `number_users`, `number_users_kd`, `number_visits`, `number_visits_kd`, `number_book_publishing`, `number_book_publishing_kd`, `work_komp`, `work_komp_kd`, `garant`, `garant_kd`, `konsultant`, `konsultant_kd`, `ethernet`, `ethernet_kd`, `electronic_catalog`, `electronic_catalog_kd`, `activities_carried`, `activities_carried_kd`, `number_event_visits`, `number_event_visits_kd`, `computer_school`, `computer_school_kd`, `number_students`, `number_students_kd`, `number_classes`, `number_classes_kd`) VALUES
(1, 3, '2021_4', 1302, 502, 3318, 1286, 4399, 1333, 962, 146, 0, 0, 18, 0, 955, 125, 219, 57, 42, 14, 847, 313, 11, 3, 34, 6, 111, 24),
(2, 3, '2022_4', 1299, 483, 3459, 1373, 6285, 1371, 1133, 110, 0, 0, 23, 0, 982, 133, 228, 32, 39, 19, 940, 448, 13, 3, 38, 6, 100, 24),
(3, 3, '2021_5', 1342, 501, 3665, 1299, 4651, 1259, 1211, 189, 0, 0, 18, 0, 970, 90, 218, 32, 43, 16, 865, 323, 13, 5, 41, 9, 163, 40),
(4, 3, '2022_5', 1442, 509, 3973, 1453, 9179, 1464, 1362, 138, 0, 0, 20, 0, 1053, 70, 250, 34, 40, 18, 954, 443, 17, 5, 53, 9, 141, 40),
(5, 3, '2021_6', 1449, 545, 4457, 1533, 5654, 1389, 1629, 266, 0, 0, 30, 0, 1113, 93, 290, 90, 49, 21, 1005, 459, 15, 5, 53, 9, 232, 40),
(6, 3, '2022_6', 1580, 555, 4773, 1695, 10046, 1507, 2002, 305, 0, 0, 32, 0, 1306, 102, 332, 52, 54, 22, 1116, 493, 18, 5, 59, 9, 184, 40),
(7, 3, '2021_6', 1449, 545, 4457, 1533, 5654, 1389, 1629, 266, 0, 0, 30, 0, 1113, 93, 290, 90, 49, 21, 1005, 459, 15, 5, 53, 9, 232, 40),
(8, 3, '2022_6', 1580, 555, 4773, 1695, 10046, 1507, 2002, 305, 0, 0, 32, 0, 1489, 102, 332, 52, 56, 22, 1128, 493, 18, 5, 59, 9, 184, 40),
(9, 3, '2021_6', 1449, 545, 4457, 1533, 5654, 1389, 1629, 266, 0, 0, 30, 0, 1113, 93, 290, 90, 49, 21, 1005, 459, 15, 5, 53, 9, 232, 40),
(10, 3, '2022_6', 1580, 555, 4775, 1695, 10046, 1507, 2002, 305, 0, 0, 32, 0, 1489, 102, 332, 52, 56, 22, 1128, 493, 18, 5, 59, 9, 184, 40),
(11, 3, '2021_6', 1449, 545, 4457, 1533, 5654, 1389, 1629, 266, 0, 0, 30, 0, 1113, 93, 290, 90, 49, 21, 1005, 459, 15, 5, 53, 9, 232, 40),
(12, 3, '2022_6', 1580, 555, 4775, 1695, 10046, 1507, 2002, 305, 0, 0, 32, 0, 1486, 102, 332, 52, 56, 22, 1128, 493, 18, 5, 59, 9, 184, 40),
(13, 3, '2021_7', 1629, 556, 4934, 1570, 6215, 1396, 1550, 200, 1, 21, 32, 0, 1580, 184, 301, 70, 52, 21, 1039, 459, 15, 5, 53, 9, 232, 40),
(14, 3, '2022_7', 1729, 576, 5447, 1737, 10575, 1567, 2075, 193, 0, 0, 32, 0, 1871, 274, 384, 50, 58, 23, 1227, 514, 20, 5, 69, 9, 222, 40),
(15, 3, '2021_8', 1796, 610, 5372, 1550, 6787, 1377, 1849, 206, 1, 0, 35, 0, 1614, 142, 339, 71, 60, 21, 1111, 459, 17, 5, 61, 9, 221, 10),
(16, 3, '2022_8', 1880, 606, 6145, 1779, 11290, 1596, 2359, 205, 0, 0, 37, 0, 2063, 279, 433, 53, 72, 24, 1332, 538, 20, 5, 71, 9, 199, 10),
(17, 3, '2021_9', 1419, 113, 4620, 271, 6446, 157, 1977, 152, 1, 0, 36, 0, 2054, 206, 425, 116, 54, 5, 747, 61, 14, 0, 58, 0, 219, 0),
(18, 3, '2022_9', 1520, 132, 5380, 416, 10763, 284, 2587, 178, 0, 0, 39, 0, 2249, 347, 464, 55, 68, 8, 1209, 125, 15, 0, 60, 0, 193, 0),
(19, 3, '2021_9', 1419, 113, 4620, 271, 6446, 157, 1977, 152, 1, 0, 36, 0, 2054, 206, 425, 116, 54, 5, 747, 61, 14, 0, 58, 0, 219, 0),
(20, 3, '2022_9', 1520, 132, 5380, 416, 10763, 284, 2587, 178, 0, 0, 39, 0, 2249, 347, 464, 55, 68, 8, 1209, 125, 15, 0, 60, 0, 193, 0),
(21, 3, '2021_9', 1968, 658, 6183, 1803, 7853, 1564, 2056, 165, 1, 0, 36, 0, 2054, 206, 435, 130, 73, 21, 1160, 474, 20, 6, 70, 12, 267, 48),
(22, 3, '2022_9', 2071, 679, 6941, 1977, 12170, 1691, 2674, 265, 0, 0, 39, 0, 2249, 347, 467, 58, 86, 26, 1662, 578, 21, 6, 72, 12, 241, 48),
(23, 3, '2021_9', 1983, 658, 6234, 1803, 7904, 1564, 2058, 165, 1, 0, 36, 0, 2054, 206, 435, 130, 73, 21, 1160, 474, 20, 6, 70, 12, 267, 48),
(24, 3, '2022_9', 2071, 679, 6969, 1977, 12203, 1691, 2684, 265, 0, 0, 39, 0, 2249, 347, 467, 58, 88, 26, 1662, 578, 21, 6, 72, 12, 241, 48),
(25, 3, '2021_9', 1983, 658, 6234, 1803, 7904, 1564, 2058, 165, 1, 0, 36, 0, 2054, 206, 435, 130, 73, 21, 1160, 474, 20, 6, 70, 12, 267, 48),
(26, 3, '2022_9', 2071, 679, 6969, 1977, 12203, 1691, 2684, 265, 0, 0, 39, 0, 2249, 347, 467, 58, 88, 26, 1662, 578, 21, 6, 72, 12, 241, 48),
(27, 3, '2021_9', 1983, 658, 6234, 1803, 7904, 1564, 2058, 165, 1, 0, 36, 0, 2054, 206, 435, 130, 73, 21, 1160, 474, 20, 6, 70, 12, 267, 48),
(28, 3, '2022_9', 2071, 679, 6969, 1977, 12203, 1691, 2684, 265, 0, 0, 39, 0, 2249, 347, 467, 58, 88, 26, 1662, 578, 21, 6, 72, 12, 241, 48),
(29, 3, '2021_9', 1983, 658, 6234, 1803, 7904, 1564, 2058, 165, 1, 0, 36, 0, 2054, 206, 435, 130, 73, 21, 1160, 474, 20, 6, 70, 12, 267, 48),
(30, 3, '2022_9', 2072, 679, 6969, 1977, 12203, 1691, 2684, 265, 0, 0, 39, 0, 2249, 347, 467, 58, 88, 26, 1662, 578, 21, 6, 72, 12, 241, 48),
(31, 3, '2021_9', 1983, 658, 6234, 1803, 7904, 1564, 2058, 165, 1, 0, 36, 0, 2054, 206, 435, 130, 73, 21, 1160, 474, 20, 6, 70, 12, 267, 48),
(32, 3, '2022_9', 2072, 679, 6969, 1977, 12203, 1691, 2684, 265, 0, 0, 39, 0, 2249, 347, 467, 58, 92, 26, 1662, 578, 21, 6, 72, 12, 241, 48),
(33, 3, '2021_9', 1983, 658, 6234, 1803, 7904, 1564, 2058, 165, 1, 0, 36, 0, 2054, 206, 435, 130, 73, 21, 1160, 474, 20, 6, 70, 12, 267, 48),
(34, 3, '2022_9', 2072, 679, 6969, 1977, 12203, 1691, 2684, 265, 0, 0, 39, 0, 2249, 347, 467, 58, 92, 26, 1674, 578, 21, 6, 72, 12, 241, 48);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `administatrors_user`
--
ALTER TABLE `administatrors_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cultural_events`
--
ALTER TABLE `cultural_events`
  ADD PRIMARY KEY (`id_otchets`),
  ADD KEY `id_usersss` (`id_user`);

--
-- Индексы таблицы `cultural_events_arkhive`
--
ALTER TABLE `cultural_events_arkhive`
  ADD PRIMARY KEY (`id_arhive`);

--
-- Индексы таблицы `cultural_events_log_edit`
--
ALTER TABLE `cultural_events_log_edit`
  ADD PRIMARY KEY (`id_edit`),
  ADD KEY `id_authors` (`id_author_edit`),
  ADD KEY `id_otchets` (`id_otchet`);

--
-- Индексы таблицы `key_indicators`
--
ALTER TABLE `key_indicators`
  ADD PRIMARY KEY (`id_otchet`);

--
-- Индексы таблицы `key_indicators_arkhive`
--
ALTER TABLE `key_indicators_arkhive`
  ADD PRIMARY KEY (`id_arhive`);

--
-- Индексы таблицы `key_indicators_log_edit`
--
ALTER TABLE `key_indicators_log_edit`
  ADD PRIMARY KEY (`id_edit`),
  ADD KEY `Idotchets` (`id_otchet`),
  ADD KEY `idUsers` (`id_author_edit`);

--
-- Индексы таблицы `otchet_cod`
--
ALTER TABLE `otchet_cod`
  ADD PRIMARY KEY (`id_otchet`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `otchet_cod_all`
--
ALTER TABLE `otchet_cod_all`
  ADD PRIMARY KEY (`id_otchets`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `administatrors_user`
--
ALTER TABLE `administatrors_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `cultural_events`
--
ALTER TABLE `cultural_events`
  MODIFY `id_otchets` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `cultural_events_arkhive`
--
ALTER TABLE `cultural_events_arkhive`
  MODIFY `id_arhive` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `cultural_events_log_edit`
--
ALTER TABLE `cultural_events_log_edit`
  MODIFY `id_edit` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `key_indicators`
--
ALTER TABLE `key_indicators`
  MODIFY `id_otchet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `key_indicators_arkhive`
--
ALTER TABLE `key_indicators_arkhive`
  MODIFY `id_arhive` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `key_indicators_log_edit`
--
ALTER TABLE `key_indicators_log_edit`
  MODIFY `id_edit` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `otchet_cod`
--
ALTER TABLE `otchet_cod`
  MODIFY `id_otchet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT для таблицы `otchet_cod_all`
--
ALTER TABLE `otchet_cod_all`
  MODIFY `id_otchets` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cultural_events`
--
ALTER TABLE `cultural_events`
  ADD CONSTRAINT `id_usersss` FOREIGN KEY (`id_user`) REFERENCES `administatrors_user` (`id`);

--
-- Ограничения внешнего ключа таблицы `cultural_events_log_edit`
--
ALTER TABLE `cultural_events_log_edit`
  ADD CONSTRAINT `id_authors` FOREIGN KEY (`id_author_edit`) REFERENCES `administatrors_user` (`id`),
  ADD CONSTRAINT `id_otchets` FOREIGN KEY (`id_otchet`) REFERENCES `cultural_events` (`id_otchets`);

--
-- Ограничения внешнего ключа таблицы `key_indicators_log_edit`
--
ALTER TABLE `key_indicators_log_edit`
  ADD CONSTRAINT `Idotchets` FOREIGN KEY (`id_otchet`) REFERENCES `key_indicators` (`id_otchet`),
  ADD CONSTRAINT `idUsers` FOREIGN KEY (`id_author_edit`) REFERENCES `administatrors_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
