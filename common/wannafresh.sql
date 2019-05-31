-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Май 31 2019 г., 17:41
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wannafresh`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ordering` int(11) DEFAULT '100',
  `img` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `ordering`, `img`) VALUES
(1, 'мясо', 1, 'meat-ico.svg'),
(7, 'рыба', 2, 'fish-ico.svg'),
(8, 'молоко, сыр', 5, 'cheese-ico.svg'),
(9, 'овощи, зелень', 3, 'cabbage-ico.svg'),
(10, 'фрукты', 4, 'apple-ico.svg'),
(11, 'мёд, соки', 6, 'honey-ico.svg'),
(12, 'птица, яйца', 7, 'turkey-ico.svg'),
(13, 'соленья, маринады', 8, 'marinad.png'),
(14, 'хлеб, выпечка', 9, 'bread-ico.svg'),
(15, 'ягоды, варенье', 10, 'berry-ico.svg'),
(16, 'орехи, сухофрукты', 11, 'nuts-ico.svg'),
(17, 'колбасы, копчености', 12, 'sausage-ico.svg');

-- --------------------------------------------------------

--
-- Структура таблицы `farmer`
--

CREATE TABLE `farmer` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `farmer`
--

INSERT INTO `farmer` (`id`, `name`, `description`) VALUES
(1, 'Соймик', 'Соевые и растительные продукты набирают всё большую популярность, и мы прикладываем немало усилий для того, что бы этот процесс происходил ещё быстрее.\r\nОзнакомьтесь с продуктами, которые мы производим с любовью и верой в то, что они войдут в рацион каждого человека. Уже более трёх лет мы работаем над\r\nсовершенствованием соевых и других растительных продуктов, делая их вкусными, разнообразными и полезными.'),
(5, 'ферма-сыроварня \"Деревня\"', 'Ферма-сыроварня «Деревня» - это небольшое молодое фермерское хозяйство в 35-ти км от Петербурга (деревня Матокса), основной работой которого, является производство сыров и других молочных продуктов, которые можно приобрести в нашей «Деревне».  \r\nДля тех, кто не может приехать к нам, «Деревня» с радостью привезет свою частичку к Вам домой.'),
(6, 'FinnFish', 'FinnFish - Производим и продаем вкусную, полезную рыбу без консервантов, произведенную по традиционной скандинавской технологии. Доставка по Москве и Санкт-Петербургу.');

-- --------------------------------------------------------

--
-- Структура таблицы `farmer_img`
--

CREATE TABLE `farmer_img` (
  `farmer_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `is_main` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `farmer_img`
--

INSERT INTO `farmer_img` (`farmer_id`, `img_id`, `is_main`) VALUES
(1, 1, NULL),
(1, 2, 0),
(1, 6, 1),
(5, 7, 1),
(6, 8, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `farmer_user`
--

CREATE TABLE `farmer_user` (
  `farmer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `farmer_user`
--

INSERT INTO `farmer_user` (`farmer_id`, `user_id`) VALUES
(1, 3),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `good`
--

CREATE TABLE `good` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `brief` varchar(100) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `good`
--

INSERT INTO `good` (`id`, `name`, `farmer_id`, `category_id`, `price`, `quantity`, `measure_id`, `brief`, `description`) VALUES
(1, 'Тофу Классический 300 г', 1, 8, '200.00', 300, 3, 'Тофу классический, соевый сыр без добавок.', 'Классический тофу изготавливается из свежего соевого молока по классической технологии с последующим прессованием. Тофу относится к легкой пище, при этом является высокобелковым продуктом, сравнимым по своему аминокислотному составу и биологической ценности с белком мяса. Низкое содержание жира и углеводов делают его незаменимым компонентом диетического питания для спортсменов и людей, следящих за своим весом и здоровьем.\r\n\r\nСостав: соевые бобы, вода, свертывающее вещество (хлористый кальций), соль. Пищевая и энергетическая ценность на 100 г продукта: белки – 8,7 г; жиры – 3,7 г; углеводы – 1,7 г; калорийность - 72,9 Ккал Срок годности 45 суток при температуре 4 ±2 °С, после вскрытия хранить в воде, ежедневно меняя воду, не более 7 суток.\r\n'),
(2, 'Тофу Классический 500 г', 1, 8, '300.00', 500, 3, 'Тофу классический, соевый сыр без добавок.', 'Этот \"нежный\" сыр изготавливается из свежего соевого молока по классической технологии с последующим прессованием. Тофу относится к легкой пище, при этом является высокобелковым продуктом, сравнимым по своему аминокислотному составу и биологической ценности с белком мяса. Низкое содержание жира и углеводов делают его незаменимым компонентом диетического питания для спортсменов и людей, следящих за своим весом и здоровьем.\r\n\r\nСостав: соевые бобы, вода, свертывающее вещество (хлористый кальций), соль. Пищевая и энергетическая ценность на 100 г продукта: белки – 8,7 г; жиры – 3,7 г; углеводы – 1,7 г; калорийность - 72,9 Ккал Срок годности 45 суток при температуре 4 ±2 °С, после вскрытия хранить в воде, ежедневно меняя воду, не более 7 суток.'),
(3, 'Тофу Итальянский 300 г', 1, 8, '250.00', 300, 7, '', 'Состав: соевые бобы, вода, свертывающее вещество (хлористый кальций), соль, начинка овощная (томаты сушеные, травы, специи, чеснок). Пищевая и энергетическая ценность на 100 г продукта: белки – 8,7 г; жиры – 3,7 г; углеводы – 2,3 г; 79 Ккал. Хранить при температуре 4 ±2 °С, после вскрытия хранить в герметичной упаковке не более 7 суток. Срок годности 45 суток.'),
(4, 'Тофу Барбекю 300 г', 1, 8, '350.00', 300, 7, 'Соевый сыр без добавок.', 'Состав: Соевые бобы, вода, свертывающее вещество (хлористый кальций), соль, овощи сушеные: (паприка, перец чили, чеснок, сельдерей), специи. Пищевая и энергетическая ценность на 100 г продукта: белки – 9 г; жиры – 2,5 г; углеводы – 1,9 г; 66 Ккал. Хранить при температуре 4±2°С. Срок годности 45 суток, после вскрытия хранить в воде, не более 5 суток.'),
(5, 'Тофу с укропом и чесноком 300 г', 1, 8, '350.00', 300, 7, '', 'Состав: Соевые бобы, вода, свертывающее вещество (хлористый кальций), соль, укроп, чеснок, специи. Пищевая и энергетическая ценность на 100 г продукта: белки – 9 г; жиры – 2,5 г; углеводы – 1,9 г; 66 Ккал. Хранить при температуре 4±2°С. Срок годности 45 суток, после вскрытия хранить в воде, не более 5 суток.'),
(6, 'Тофу Копчёный 300 г', 1, 8, '350.00', 300, 7, '', 'Состав: соевые бобы, вода, свертывающее вещество (хлористый кальций), соль, соевый соус, специи. Хранить при температуре 4±2°С. Срок годности 45 суток, после вскрытия хранить в воде, не более 5 суток. Пищевая и энергетическая ценность на 100 г продукта: белки – 9 г; жиры – 2,5 г; углеводы – 1,7 г; 65 Ккал.'),
(7, 'Мясо соевое 200 г', 1, 1, '200.00', 200, 7, '', 'Состав: мука соевая текстурированная обезжиренная. Пищевая ценность в 100гр: белки - 48г, жиры - 1гр, углеводы - 30гр. Энергетическая ценность: 321 Ккал. Срок годности 12 месяцев при температуре не выше 20°C и влажности воздуха не более 75%.'),
(8, ' Фарш соевый 300 г', 1, 1, '200.00', 300, 7, '', 'Состав: мука соевая текстурированная обезжиренная. Пищевая ценность в 100гр: белки - 48г, жиры - 1гр, углеводы - 30гр. Энергетическая ценность: 321 Ккал. Срок годности 12 месяцев при температуре не выше 20°C и влажности воздуха не более 75%.'),
(9, 'Шницель соевый 200 г', 1, 1, '250.00', 200, 7, '', 'Состав: мука соевая текстурированная обезжиренная. Пищевая ценность в 100гр: белки - 48г, жиры - 1гр, углеводы - 30гр. Энергетическая ценность: 321 Ккал. Срок годности 12 месяцев при температуре не выше 20°C и влажности воздуха не более 75%.'),
(10, 'Икра горбуши', 6, 7, '1225.00', 250, 7, 'Икра горбуши слабой соли', 'Для сохранения вкусовых качеств продукция ФиннФиш не содержит консервантов, кроме морской соли в минимальных количествах. Мы убедительно просим Вас соблюдать температурный 0°C - +4°C режим хранения нашей продукции! Нарушение температурного режима приведет к порче товара.'),
(11, 'Икра горбуши 500г', 6, 7, '2450.00', 500, 7, 'Икра горбуши слабой соли', 'Для сохранения вкусовых качеств продукция ФиннФиш не содержит консервантов, кроме морской соли в минимальных количествах. Мы убедительно просим Вас соблюдать температурный 0°C - +4°C режим хранения нашей продукции! Нарушение температурного режима приведет к порче товара.'),
(12, 'Икра горбуши 1кг', 6, 7, '4900.00', 1, 3, 'Икра горбуши слабой соли', 'Для сохранения вкусовых качеств продукция ФиннФиш не содержит консервантов, кроме морской соли в минимальных количествах. Мы убедительно просим Вас соблюдать температурный 0°C - +4°C режим хранения нашей продукции! Нарушение температурного режима приведет к порче товара.'),
(13, 'Икра черная осетровая \"Золото Каспия\". Серия \"Астрахань\" 30г', 6, 7, '2750.00', 30, 7, '', 'Забойная. Непастеризованная. Приготовлена по старинному астраханскому рецепту. Икра осетра возраста 7-8 лет'),
(14, 'Икра черная осетровая \"Золото Каспия\". Серия \"Астрахань\" 50г', 6, 7, '3750.00', 50, 7, 'Икра осетра возраста 7-8 лет', 'Забойная. Непастеризованная. Приготовлена по старинному астраханскому рецепту. '),
(15, 'Икра черная осетровая \"Золото Каспия\". Серия \"Астрахань\" 100г', 6, 7, '7500.00', 100, 7, 'Икра осетра возраста 7-8 лет', 'Забойная. Непастеризованная. Приготовлена по старинному астраханскому рецепту.'),
(16, 'Икра черная осетровая \"Золото Каспия\". Серия \"Астрахань Премиум\" 50г', 6, 7, '4500.00', 50, 7, 'Икра осетра от 15 лет', 'Забойная. Непастеризованная. Приготовлена по старинному астраханскому рецепту. '),
(17, 'Икра черная осетровая \"Золото Каспия\". Серия \"Астрахань Премиум\" 100г', 6, 7, '9000.00', 100, 7, 'Икра осетра от 15 лет', 'Забойная. Непастеризованная. Приготовлена по старинному астраханскому рецепту. '),
(18, 'Икра черная осетровая \"Золото Каспия\". Серия \"Астрахань Премиум\" 250г', 6, 7, '22500.00', 250, 7, 'Икра осетра от 15 лет', 'Забойная. Непастеризованная. Приготовлена по старинному астраханскому рецепту. '),
(19, 'Семга охлажденная, тушка', 6, 7, '1500.00', 1, 3, 'Охлажденный атлантический лосось, Фарерские острова. Размерный ряд 4-5 либо 5-6 кг.', 'Рыба продается целиком в виде филе, либо цельной тушки поштучно, с головой или без. Упаковка: филе - в вакуумной упаковке, тушка, филе на коже - в пенопластовом коробе, либо картонной коробке. Укажите в комментарии к заказу желаемый вид упаковки.\r\nДля сохранения вкусовых качеств продукция ФиннФиш не содержит консервантов, кроме морской соли в минимальных количествах. Мы убедительно просим Вас соблюдать температурный 0°C - +4°C режим хранения нашей продукции! Нарушение температурного режима приведет к порче товара.'),
(20, 'Семга охлажденная, филе', 6, 7, '1800.00', 1, 3, 'Охлажденный атлантический лосось, Фарерские острова. Вес филе 1,2-2 кг.', 'Рыба продается целиком в виде филе, либо цельной тушки поштучно, с головой или без. Упаковка: филе - в вакуумной упаковке, тушка, филе на коже - в пенопластовом коробе, либо картонной коробке. Укажите в комментарии к заказу желаемый вид упаковки.\r\nДля сохранения вкусовых качеств продукция ФиннФиш не содержит консервантов, кроме морской соли в минимальных количествах. Мы убедительно просим Вас соблюдать температурный 0°C - +4°C режим хранения нашей продукции! Нарушение температурного режима приведет к порче товара.'),
(21, 'Семга охлажденная, стейк', 6, 7, '1650.00', 1, 3, 'Охлажденный атлантический лосось в виде стейка.​', 'Рыба продается целиком в виде филе, либо цельной тушки поштучно, с головой или без. Упаковка: филе - в вакуумной упаковке, тушка, филе на коже - в пенопластовом коробе, либо картонной коробке. Укажите в комментарии к заказу желаемый вид упаковки.\r\nДля сохранения вкусовых качеств продукция ФиннФиш не содержит консервантов, кроме морской соли в минимальных количествах. Мы убедительно просим Вас соблюдать температурный 0°C - +4°C режим хранения нашей продукции! Нарушение температурного режима приведет к порче товара.'),
(22, 'Семга охлажденная, стейк-бабочка', 6, 7, '1750.00', 1, 3, 'Охлажденный атлантический лосось в виде​ стейка-бабочки.', 'Рыба продается целиком в виде филе, либо цельной тушки поштучно, с головой или без. Упаковка: филе - в вакуумной упаковке, тушка, филе на коже - в пенопластовом коробе, либо картонной коробке. Укажите в комментарии к заказу желаемый вид упаковки.\r\nДля сохранения вкусовых качеств продукция ФиннФиш не содержит консервантов, кроме морской соли в минимальных количествах. Мы убедительно просим Вас соблюдать температурный 0°C - +4°C режим хранения нашей продукции! Нарушение температурного режима приведет к порче товара.'),
(23, 'Помидоры отборные Азербайджан', 5, 9, '96.00', 400, 7, 'Вкусные мясистые отборные помидоры из Азербайджана для Вашего салата', 'Возьмите к ним наш Песто и Буррату или Страчателлу, добавьте оливковое масло, соль и бальзамический уксус - ароматный, очень вкусный и полезный салат на всю семью готов ;)'),
(24, 'Сальсичча 150 грамм', 5, 17, '249.00', 150, 7, '', 'Мы приготовили для Вас очень вкусную сырокопчёную Колбасу из свежей рубленой свинины. \r\nНежная, с «сочным» насыщенным вкусом и идеальным балансом соли и специй, чтобы они не «забивали» бесподобный вкус мяса. \r\nЭта Колбаса - гордость нашего мясного производства. Она идеальна и на праздничный стол, и просто на хлеб. \r\nПредлагаем Вам её в нарезке по 150 грамм.'),
(25, 'Нежное филе грудки индейки сырокопчёное', 5, 17, '220.00', 200, 7, '', 'Мы приготовили для Вас нежнейшее, слегка подкопчённое филе грудки индейки. Без химии, из свежего мяса. Идеально как закуска и на бутерброд для детей и взрослых.'),
(26, 'Свежая сочная морковь', 5, 9, '74.00', 1, 3, '', 'Предлагаем Вам свежую, плотную и сочную морковь, выращенную в Ленинградской и Псковской областях. Морковь немытая, для лучшего её сохранения до следующего лета. Идеальна для всех блюд, для приготовления которых не обойтись без моркови.'),
(27, 'Лук ялтинский салатный', 5, 9, '70.00', 1, 3, '', 'Ценится за вкусовые качества. Настоящий ялтинский лук выращивается только территории Большой Ялты, где выполняются особые климатические условия, поэтому не дешев. Луковицы можно запекать или жарить на гриле. Чаще всего используется в сыром виде в салатах и в качестве украшения блюд.');

-- --------------------------------------------------------

--
-- Структура таблицы `good_img`
--

CREATE TABLE `good_img` (
  `good_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `is_main` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `good_img`
--

INSERT INTO `good_img` (`good_id`, `img_id`, `is_main`) VALUES
(1, 11, 1),
(2, 11, NULL),
(2, 12, 1),
(3, 10, 1),
(4, 9, 1),
(5, 14, 1),
(6, 13, 1),
(7, 15, 1),
(8, 16, 1),
(9, 17, 1),
(10, 22, 1),
(11, 22, 1),
(12, 22, 1),
(13, 20, 1),
(14, 20, 1),
(15, 20, 1),
(16, 21, 1),
(17, 21, 1),
(18, 21, 1),
(19, 18, 1),
(20, 19, 1),
(21, 23, 1),
(22, 24, 1),
(23, 27, 1),
(24, 26, 1),
(25, 25, 1),
(26, 28, 1),
(27, 29, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ImageManager`
--

CREATE TABLE `ImageManager` (
  `id` int(10) UNSIGNED NOT NULL,
  `fileName` varchar(128) NOT NULL,
  `fileHash` varchar(32) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `createdBy` int(10) UNSIGNED DEFAULT NULL,
  `modifiedBy` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ImageManager`
--

INSERT INTO `ImageManager` (`id`, `fileName`, `fileHash`, `created`, `modified`, `createdBy`, `modifiedBy`) VALUES
(1, 'farmer-icon.jpg', 'j_MrMk92TJzgR6WUctVIAs6PP_dv4snp', '2019-05-24 12:59:26', '2019-05-24 12:59:26', NULL, NULL),
(2, 'good-icon.jpg', '0kArNpmQwewGfiUJTryYVsfIk3cTG1CL', '2019-05-24 12:59:27', '2019-05-24 12:59:27', NULL, NULL),
(3, 'meat.png', 'xrQJdD9K0VDIgsd6D8FUFYdfhlI4Tnwv', '2019-05-24 12:59:27', '2019-05-24 12:59:27', NULL, NULL),
(4, 'meat-2.png', '8Fq43nQtItVc4iKotH0a695ijdOfPBkv', '2019-05-24 12:59:27', '2019-05-24 12:59:27', NULL, NULL),
(5, 'vegets.png', 'Ta0t7S_IGiqZyFpVK82VeRVAu4H26BIS', '2019-05-24 12:59:27', '2019-05-24 12:59:27', NULL, NULL),
(6, 'logo-soymik.png', 'JUAiSlhp8tQPjqKWvc-xQUkIWLZN-cqj', '2019-05-27 12:49:54', '2019-05-27 12:49:54', NULL, NULL),
(7, 'derevnya.png', '3aO6VIVvoNHc-NJPe4tz7OIQSxTL022V', '2019-05-27 13:06:30', '2019-05-27 13:06:30', NULL, NULL),
(8, 'finn-fish.png', 'MTTTEdY3k7Wgi5fyQ5aYWzU5m-uS3w8U', '2019-05-27 14:39:29', '2019-05-27 14:39:29', NULL, NULL),
(9, 'large-2-ББК.jpg', 'z3M8ziK9aUyru5ht8BjzSPUdy2C7Pruo', '2019-05-28 08:43:40', '2019-05-28 08:43:40', NULL, NULL),
(10, 'large-2-Итальянский.jpg', 'qDZyRoUr_vlHWv09fjx9Io9ls33jLBbT', '2019-05-28 08:43:40', '2019-05-28 08:43:40', NULL, NULL),
(11, 'large-2-Классический-300.jpg', 'XGQ1vAtPafaMT0wjqUmH7bx-2B5W5ov7', '2019-05-28 08:43:41', '2019-05-28 08:43:41', NULL, NULL),
(12, 'large-2-Классический-500.jpg', 'JPv-bf7NoS_j4ljiBM7Tluxg-V8SDM8Z', '2019-05-28 08:43:41', '2019-05-28 08:43:41', NULL, NULL),
(13, 'large-2-Копченый.jpg', 'esHLcm3sylc0q_Yjfk0iSHezmbCJrXv0', '2019-05-28 08:43:41', '2019-05-28 08:43:41', NULL, NULL),
(14, 'large-2-Укроп-чеснок.jpg', 'Vxa0ytsOcpRg1rDKuxGi0rDIWlr-SbcH', '2019-05-28 08:43:41', '2019-05-28 08:43:41', NULL, NULL),
(15, 'large-8-мясо.jpg', 'xZTuYXdyWybQgwa07gUMaF2er4tLCNp3', '2019-05-28 10:40:05', '2019-05-28 10:40:05', NULL, NULL),
(16, 'large-8-фарш.jpg', 'pmZ2jf5LLEKm7K0kwh7MgonWo2L4CPBc', '2019-05-28 10:40:05', '2019-05-28 10:40:05', NULL, NULL),
(17, 'large-8-шницель.jpg', 'NAduoSL_4KuX-bUjN--feUjgFB7-U3kl', '2019-05-28 10:40:05', '2019-05-28 10:40:05', NULL, NULL),
(18, 'forel.jpg', '5ByMScyeAGZw_2Qxg_MhkQJjRPcA0vkN', '2019-05-29 15:35:00', '2019-05-29 15:35:00', NULL, NULL),
(19, 'forel2.jpg', '8FN7sdKiVQyWACDPBgp5WhvwQhZrhEFG', '2019-05-29 15:35:00', '2019-05-29 15:35:00', NULL, NULL),
(20, 'ikra-ch.png', 'iabORN2Hk6vfWX52CzcEUHkW-S5e4Cul', '2019-05-29 15:35:00', '2019-05-29 15:35:00', NULL, NULL),
(21, 'ikra-ch2.png', 'cgPoo2Zvz22gQpAVeqWRaQgu-JV7CKaz', '2019-05-29 15:35:00', '2019-05-29 15:35:00', NULL, NULL),
(22, 'ikra-kra.jpg', 'OR1Kv_Gt3RMGet261stLTT-u8-HHyoEV', '2019-05-29 15:35:00', '2019-05-29 15:35:00', NULL, NULL),
(23, 'semga.jpg', 'PoTipl1aE8CcJ0PhNeF6euybLhHoif41', '2019-05-29 15:35:00', '2019-05-29 15:35:00', NULL, NULL),
(24, 'semga2.jpg', 'b6yTY5CmpzhElSOwr8NBxe6KNKET94eM', '2019-05-29 15:35:00', '2019-05-29 15:35:00', NULL, NULL),
(25, 'file.jpg', '09ljzAh1CvLeG-rVZwUlhYf3cGnnwER9', '2019-05-30 08:48:26', '2019-05-30 08:48:26', NULL, NULL),
(26, 'ssss.jpeg', 'w5M-VcGaiftjrkv42xfv8ry8AUBGgNYx', '2019-05-30 08:48:26', '2019-05-30 08:48:26', NULL, NULL),
(27, 'tomat.jpg', 'Dab0NsiO6QSEK1eOoHO3M0wUzJD4Cf9c', '2019-05-30 08:48:26', '2019-05-30 08:48:26', NULL, NULL),
(28, 'carrot.jpg', '-q0QdWHhSwUSYFkg77nlm7J14Lp1targ', '2019-05-30 08:52:47', '2019-05-30 08:52:47', NULL, NULL),
(29, 'onion.jpg', 'bRvhjBJUZgySflhYU2klz6c_pCwaGBao', '2019-05-30 08:55:19', '2019-05-30 08:55:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `measure`
--

CREATE TABLE `measure` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `ordering` int(11) DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `measure`
--

INSERT INTO `measure` (`id`, `name`, `ordering`) VALUES
(3, 'кг', 1),
(4, 'л', 2),
(5, 'шт.', 3),
(6, 'ведро', 4),
(7, 'г', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `no` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order_good`
--

CREATE TABLE `order_good` (
  `order_id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'r_admin'),
(2, 'r_manager');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'A_Ie0PWPAEvncqbTEoYNo4kLh2857A9x', '$2y$13$1DIraBN/KLHfQUXnYQHFHuNcMRoDEk0/DjMoxFBt27Rd6ZRNcUa9y', NULL, 'admin@qwe.rty', 10, 1558015656, 1558015656),
(2, 'manager', 'CIsa8amzkQVa5ZqWFdoX749r8utSG-iA', '$2y$13$74hT0pcKoAaDAKzZIxEtw.YxXd7n9/M3NaBIcWztOPs7W6A6tlP8i', NULL, 'manager@qwe.rty', 10, 1558015787, 1558015787),
(3, 'soimik', 'oysJk3ByFEIJmRVDjjphnb7NBbI_lzqK', '$2y$13$g5vGujw2N0008UGiyKFUf.GKLMScriKFI9Isg2nQBEJpW6dF0YNyK', NULL, 'soimik@qwe.rty', 10, 1558015835, 1558015835),
(4, 'meatnik', 'o13kKzsf5MsKLsN8Wn0oJr-pTXSlFQ7A', '$2y$13$CaczxjL3TptnjxE.p6QCJOdhtXcPotssMHjYawYxUNnZcxnVzzb26', NULL, 'meatnik@qwe.rty', 10, 1558015881, 1558015881),
(5, 'derevnya', 'ZN9PQ3XVHRYihfjgMrF31yNnjnTUQAbg', '$2y$13$LGkzA/ckLBFIvfxMaKFDYujQHvA1vOvdfssFk1u7bs1GpZ4cUvrfy', NULL, 'derevnya@qwe.rty', 10, 1558951801, 1558951801),
(6, 'finnfish', 'AMPyDyRXM2zfy47OTMQM1n56cpfb8SK8', '$2y$13$e52IQ75NDDcdOdszXK7kcew3Tgw9hANqmno5Sn0WzabZImhda172a', NULL, 'finnfish@qwe.rty', 10, 1558957308, 1558957308);

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Индексы таблицы `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Индексы таблицы `farmer_img`
--
ALTER TABLE `farmer_img`
  ADD PRIMARY KEY (`farmer_id`,`img_id`);

--
-- Индексы таблицы `farmer_user`
--
ALTER TABLE `farmer_user`
  ADD PRIMARY KEY (`farmer_id`,`user_id`),
  ADD UNIQUE KEY `farmer_id_UNIQUE` (`farmer_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`);

--
-- Индексы таблицы `good`
--
ALTER TABLE `good`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `cate_idx` (`category_id`),
  ADD KEY `farm_idx` (`farmer_id`),
  ADD KEY `meas_idx` (`measure_id`);

--
-- Индексы таблицы `good_img`
--
ALTER TABLE `good_img`
  ADD PRIMARY KEY (`good_id`,`img_id`);

--
-- Индексы таблицы `ImageManager`
--
ALTER TABLE `ImageManager`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `measure`
--
ALTER TABLE `measure`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_good`
--
ALTER TABLE `order_good`
  ADD PRIMARY KEY (`order_id`,`good_id`),
  ADD UNIQUE KEY `order_id_UNIQUE` (`order_id`),
  ADD UNIQUE KEY `good_id_UNIQUE` (`good_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `r_idx` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `good`
--
ALTER TABLE `good`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `ImageManager`
--
ALTER TABLE `ImageManager`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `measure`
--
ALTER TABLE `measure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `farmer_img`
--
ALTER TABLE `farmer_img`
  ADD CONSTRAINT `f` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `farmer_user`
--
ALTER TABLE `farmer_user`
  ADD CONSTRAINT `far` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `use` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `good`
--
ALTER TABLE `good`
  ADD CONSTRAINT `cate` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `farm` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `meas` FOREIGN KEY (`measure_id`) REFERENCES `measure` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `good_img`
--
ALTER TABLE `good_img`
  ADD CONSTRAINT `goo` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `order_good`
--
ALTER TABLE `order_good`
  ADD CONSTRAINT `go` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `or` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `r` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `u` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
