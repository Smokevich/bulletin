-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 30 2022 г., 14:24
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bulletin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Транспорт', 'Здесь будет очень подробное описание для траспорта чтобы поисковики повышали ресурс в выдаче'),
(2, 'Недвижимость', 'Здесь будет очень подробное описание для недвижимости чтобы поисковики повышали ресурс в выдаче'),
(3, 'Услуги', 'Здесь будет очень подробное описание для услуг чтобы поисковики повышали ресурс в выдаче'),
(4, 'Личные вещи', 'Здесь будет очень подробное описание для личных вещей чтобы поисковики повышали ресурс в выдаче'),
(5, 'Для дома', 'Здесь будет очень подробное описание для товаров для дома чтобы поисковики повышали ресурс в выдаче'),
(6, 'Запчасти', 'Здесь будет очень подробное описание для запчастей чтобы поисковики повышали ресурс в выдаче'),
(7, 'Электроника', 'Здесь будет очень подробное описание для электроники чтобы поисковики повышали ресурс в выдаче'),
(8, 'Хобби', 'Здесь будет очень подробное описание для любимого хобби чтобы поисковики повышали ресурс в выдаче'),
(9, 'Животные', 'Здесь будет очень подробное описание для животных чтобы поисковики повышали ресурс в выдаче');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `image` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `categoryID` int(11) NOT NULL,
  `timeAdd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `email`, `price`, `image`, `text`, `categoryID`, `timeAdd`) VALUES
(1, 'Валакас', 'test@valakas.ru', '499.99', '/upload/unnamed-768x768817.jpg', 'Милый дедушка 65 лет нуждается в людях. У него 25 личностей которые мешают ему жить и при этом он еще стримит на Twitch. Пожалуйста помогите!', 1, '2022-03-29 20:00:19'),
(2, '10 Рублей', 'clown@ya.ru', '999.00', '/upload/ruble218.jpg', 'Продам 10 рублей 95 года, монета отполирована и блестит как новая!', 1, '2022-03-29 20:16:17'),
(4, 'Легендарный бейсбольный мяч', 'collector@mail.ru', '25000.00', '/upload/_12744.jpg', 'Продам бейсбольный мяч с турнира 94 года, на котором подпись легендарного игрока из Львов, Этот мяч оценят многие коллекционеры очень высоко. Так как у меня проблемы с финансами я решил пойти на тяжелый для себя шаг и продать эту реликвию практически за бесценок.', 8, '2022-03-30 13:45:36'),
(5, 'Яндекс Телефон', 'dev@yandex.ru', '14999.00', '/upload/30041492b601.jpg', 'Экран - 5.65&quot;/2160x1080 Пикс\r\nПроцессор - Qualcomm Snapdragon 630 2.2 ГГц\r\nОперативная память (RAM) - 4 ГБ\r\nВстроенная память (ROM) - 64 ГБ\r\nОсновная камера МПикс - 16/5\r\nФронтальная камера МПикс - 5\r\nТехнология NFC - Да\r\nПоддержка стандартов - 2G/3G/4G LTE', 7, '2022-03-30 14:17:49'),
(6, 'Черепашка ручной работы', 'babushka@mail.ru', '1000.00', '/upload/b095d947797121d5f1ba0599ec1fe9c0c7549b09689.webp', 'Продаем игрушки ручной работы с уникальным дизайном от наших мастеров! Все игрушки сделаны качественно и поэтому имеют гарантию 5 лет от защиты окружающей среды.\r\nЕсли вас заинтересовало, то вот номер для связи +77777777777', 5, '2022-03-30 16:46:46');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
