-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 23 2023 г., 14:58
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ozon2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bank_card`
--

CREATE TABLE `bank_card` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `bank_card`
--

INSERT INTO `bank_card` (`id`, `id_user`, `name`) VALUES
(1, 2, '222'),
(2, 3, 'lola home');

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `id_user`, `id_product`) VALUES
(1, 2, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `id_parent` int DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `id_parent`, `name`) VALUES
(1, NULL, 'Для женщин'),
(2, 1, 'Одежда'),
(3, NULL, 'Для мужчин\r\n'),
(4, 3, 'Одежда\r\n'),
(5, 3, 'брюки'),
(6, NULL, 'none'),
(7, 6, 'Для детей');

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Москва'),
(2, 'Омск'),
(3, 'Санкт-Петербург'),
(4, 'Орел');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `text`, `rating`, `created_at`, `updated_at`, `id_product`) VALUES
(1, 3, 'good nice', 5, '2023-01-01', '2023-01-23', 1),
(2, 2, 'nu tkoe', 2, '2023-01-23', '2023-01-23', 1),
(3, 2, 'miceee', 2, '2023-01-23', '2023-01-23', 1),
(4, 2, 'x v v', 2, '2023-01-23', '2023-01-23', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE `company` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `name` varchar(120) NOT NULL,
  `inn` int NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id`, `id_user`, `name`, `inn`, `avatar`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 2, 'MaskaProduction', 123, '234', '2023-01-05', '2023-01-31', 3),
(2, 2, 'secondChance', 54546, '45', '2023-01-23', '2023-01-23', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '"работа", "дом"',
  `id_city` int NOT NULL,
  `street` varchar(100) NOT NULL,
  `house_number` varchar(10) NOT NULL COMMENT 'может быть литера или корпус',
  `flat_number` int NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `id_user`, `name`, `id_city`, `street`, `house_number`, `flat_number`, `comment`) VALUES
(1, 2, 'house liza', 1, 'Good', '34', 23, 'be loud');

-- --------------------------------------------------------

--
-- Структура таблицы `img_product`
--

CREATE TABLE `img_product` (
  `id` int NOT NULL,
  `path` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `img_product`
--

INSERT INTO `img_product` (`id`, `path`, `name`, `id_product`) VALUES
(1, 'vvv/dd/mod', 'photo', 1),
(2, 'path/path', 'silerKitchen', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `like`
--

CREATE TABLE `like` (
  `id` int NOT NULL,
  `id_product` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `like`
--

INSERT INTO `like` (`id`, `id_product`, `id_user`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `sale_price` varchar(100) NOT NULL,
  `sale_flag` tinyint(1) NOT NULL COMMENT 'флаг - является ли товар акционным',
  `description` text NOT NULL,
  `characteristic` text NOT NULL,
  `id_company` int NOT NULL,
  `rating` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int NOT NULL,
  `price` varchar(50) NOT NULL,
  `id_category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `sale_price`, `sale_flag`, `description`, `characteristic`, `id_company`, `rating`, `created_at`, `updated_at`, `created_by`, `price`, `id_category`) VALUES
(1, 'spoon', '234 rub', 0, 'nice spoon. eat soup', 'silver', 1, 2, '2023-01-05', '2023-01-31', 3, '234 rub', 1),
(2, 'knife', '345', 1, 'silver', 'silver', 2, 2, '2023-01-23', '2023-01-23', 2, '234', 3),
(5, 'knifees', '33', 1, 'sc', 'dxc', 1, 65, '2023-01-23', '2023-01-23', 2, 'w3', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `purchase`
--

CREATE TABLE `purchase` (
  `id` int NOT NULL,
  `delivery_method` enum('Самовывоз','Доставка курьером') NOT NULL,
  `full_price` varchar(10) NOT NULL,
  `id_delivery` int NOT NULL,
  `id_card` int NOT NULL,
  `created_at` date NOT NULL,
  `full_sale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `purchase`
--

INSERT INTO `purchase` (`id`, `delivery_method`, `full_price`, `id_delivery`, `id_card`, `created_at`, `full_sale`) VALUES
(1, 'Самовывоз', '234', 1, 2, '2023-01-05', '0'),
(2, 'Самовывоз', '66', 1, 1, '2023-01-23', '0'),
(3, 'Самовывоз', '33', 1, 1, '2023-01-23', '-'),
(4, 'Доставка курьером', '3', 1, 1, '2023-01-23', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `fio` varchar(255) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_city` int NOT NULL COMMENT 'потому что самое длинное название города в мире - 168 символов',
  `date_of_birth` date NOT NULL,
  `sex` enum('муж','жен','не укажу') NOT NULL,
  `avatar` varchar(300) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `currency` set('rub','euro','usd') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '' COMMENT 'валюта',
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `fio`, `email`, `phone`, `login`, `password`, `id_city`, `date_of_birth`, `sex`, `avatar`, `currency`, `role`) VALUES
(2, 'Елизавета Коротина Евгеньевна', 'crottop@mail.ru', '79119921426', 'crottop', '123', 1, '2003-01-17', 'жен', 'avatarLiza', 'rub', 'admin'),
(3, 'Савенкова Мария Михайловна', 'lola@mail.ru', '89110885623', '12345', '2345', 3, '2023-01-04', 'жен', 'fffff', 'rub', 'admin'),
(4, 'Аль Хай Там', 'aliaha@mail.ru', '123', '123', '123', 1, '2012-12-12', 'жен', '12', 'rub', '1'),
(5, 'Аль Хай Тамww', '123', '+7 (323) 333 33 __', '333', '333', 1, '2023-01-22', 'жен', '222', 'euro', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `zakaz_items`
--

CREATE TABLE `zakaz_items` (
  `id` int NOT NULL,
  `id_purchase` int NOT NULL,
  `id_product` int NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `zakaz_items`
--

INSERT INTO `zakaz_items` (`id`, `id_purchase`, `id_product`, `price`, `count`) VALUES
(1, 4, 1, '444', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bank_card`
--
ALTER TABLE `bank_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `img_product`
--
ALTER TABLE `img_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_company` (`id_company`),
  ADD KEY `created_by` (`created_by`);

--
-- Индексы таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_card` (`id_card`),
  ADD KEY `id_delivery` (`id_delivery`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_city` (`id_city`);

--
-- Индексы таблицы `zakaz_items`
--
ALTER TABLE `zakaz_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_purchase` (`id_purchase`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bank_card`
--
ALTER TABLE `bank_card`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `company`
--
ALTER TABLE `company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `img_product`
--
ALTER TABLE `img_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `like`
--
ALTER TABLE `like`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `zakaz_items`
--
ALTER TABLE `zakaz_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bank_card`
--
ALTER TABLE `bank_card`
  ADD CONSTRAINT `bank_card_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `company_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD CONSTRAINT `delivery_address_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `img_product`
--
ALTER TABLE `img_product`
  ADD CONSTRAINT `img_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_company`) REFERENCES `company` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`id_card`) REFERENCES `bank_card` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `purchase_ibfk_4` FOREIGN KEY (`id_delivery`) REFERENCES `delivery_address` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `city` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `zakaz_items`
--
ALTER TABLE `zakaz_items`
  ADD CONSTRAINT `zakaz_items_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `zakaz_items_ibfk_2` FOREIGN KEY (`id_purchase`) REFERENCES `purchase` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
