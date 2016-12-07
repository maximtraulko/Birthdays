<?php

use yii\db\Migration;

class m161124_072611_structure extends Migration
{
    public function up()
    {
		$hash = '$2y$13$gv/iAX8OuqZWVpasH6rB.eLE28wX.4ToIB3RKNHT/.0L/a4zViLpO';
		
		$this->execute("
-- Структура таблицы `depatment`
--

CREATE TABLE IF NOT EXISTS `depatment` (
  `department_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `depatment`
--

INSERT INTO `depatment` (`department_id`, `name`) VALUES
(1, 'Отдел кадров'),
(2, 'Отдел материально-технического снабжения'),
(3, 'Отдел производства'),
(4, 'Отдел маркетинга и продаж'),
(5, 'Отдел финансов и бухгалтерского учёта'),
(7, 'Дирекция');

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `department_id` int(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hobby` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `patronymic`, `date_of_birth`, `status`, `department_id`, `mobile_number`, `email`, `hobby`) VALUES
(1, 'Юлия', 'Алипова ', 'Владимировна', '1982-12-06', 1, 1, '79231265447', 'tkaf@mail.ru', 'Пение, караоке, фотографии, декоративные поделки.'),
(2, 'Екатерина', 'Фадеева ', 'Андреевна', '1985-12-08', 1, 1, '79054675410', 'uytf@mail.ru', 'Горный туризм, сноуборд, дартс'),
(3, 'Анна', 'Томчик ', 'Александровна', '1973-12-13', 1, 2, '79050976132', 'anna@mail.ru', 'Дайвинг, макраме, роспись по стеклу и ткани'),
(4, 'Анастасия', 'Иванова ', 'Николаевна', '1976-12-23', 1, 2, '79132454322', 'ianna@bk.ru', 'Компьютерная графика, цветоводство, кулинария'),
(5, 'Зоя ', 'Тепликова', 'Ильинична', '1972-02-16', 1, 2, '79231765430', 'zoyti@mail.ru', 'Киноиндустрия, азартные игры, аэробика'),
(6, 'Наталья', 'Гошко ', 'Николаевна', '1978-11-24', 1, 3, '79056745102', 'nataly@mail.ru', 'Создание и запись аудио на компьютере, синтезаторе; пение, караоке'),
(7, 'Людмила ', 'Костина ', 'Михайловна', '1977-11-05', 1, 4, '79234531290', 'mihlyd@mail.ru', 'Дайвинг, парашютный спорт, написание стихов'),
(8, 'Рима ', 'Орехова ', 'Яудатовна', '1985-11-28', 1, 4, '79231297660', 'rima_o@mail.ru', 'Верховая езда, пейнтбол, чтение художественной литературы'),
(9, 'Татьяна', 'Кордюкова ', 'Константиновна', '1988-12-17', 1, 4, '79054326150', 'tanya@bk.ru', 'Велосипед, коньки, лыжи'),
(10, 'Ольга ', 'Паршукова ', 'Александровна', '1992-12-18', 1, 5, '79055445105', 'olga@mail.ru', 'Походы на природу с палатками, туризм, классическая музыка '),
(11, 'Ирина', 'Яскевич ', 'Владимировна', '1994-01-05', 1, 3, '79232455565', 'irina@mail.ru', 'Путешествия по разным странам, поп-музыка, лыжи, плавание'),
(12, 'Варвара ', 'Лебедева ', 'Николаевна', '1992-12-16', 1, 3, '79050988141', 'varvara@mail.ru', 'Теннис настольный и большой, конный спорт, кулинария'),
(13, 'Павел ', 'Гоккоев ', 'Игоревич', '1991-12-24', 1, 5, '79133431533', 'pavel@mail.ru', 'Стрельба (лук, арбалет, пневматическое и огнестрельное оружие всех мастей), охота, сноуборд'),
(22, 'Максим', 'Максименко', 'Владимирович', '1991-11-14', 1, 5, '79231254333', 'maxim_t@mail.ru', 'Катание на квадроцикле, дайвинг, гольф '),
(23, 'Игорь', 'Желдак', 'Андреевич ', '1996-10-08', 1, 1, '79235455566', 'igor_g@bk.ru', 'Горный туризм, охота, фотография, видеомонтаж '),
(24, 'Андрей', 'Зубков', 'Борисович', '1990-09-06', 1, 1, '79131254469', 'andry@mail.ru', 'Прыжки на батуте, страйкбол, лыжи'),
(25, 'Даниил', 'Полянок', 'Валерьевич ', '1992-07-12', 1, 1, '79231296543', 'dan_pol@bk.ru', 'Боевые искусства, стрельба из арбалета, караоке  '),
(26, 'Игорь', 'Каленов', 'Викторович', '1991-03-16', 1, 1, '79245433315', 'igor_k@mail.ru', 'Шахматы, бильярд, керлинг, пейнтбол'),
(27, 'Константин', 'Пологов', 'Борисович', '1983-01-03', 1, 1, '79239883410', 'pologov_k@mail.ru', 'Боулинг, кино, создание видеороликов');

-- --------------------------------------------------------
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'vQtyCjnLpIxl4YjWMYKbQgNo1A-r5dvT', '$hash', NULL, 'admin@admin.ru', 10, 1479972323, 1479972323);


--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `depatment`
--
ALTER TABLE `depatment`
  ADD PRIMARY KEY (`department_id`);

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department id` (`department_id`);



--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `depatment`
--
ALTER TABLE `depatment`
  MODIFY `department_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `depatment` (`department_id`);");
	}

	public function down()
	{
		echo "m161124_072611_structure cannot be reverted.\n";

		return false;
	}

	/*
	// Use safeUp/safeDown to run migration code within a transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}