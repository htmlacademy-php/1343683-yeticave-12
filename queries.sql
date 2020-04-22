-- 1. Вставить данные в таблицу с категориями
INSERT INTO categories (id, cat_name, char_code)
VALUES
    (1, 'Доски и лыжи', 'boards'),
    (2, 'Крепления', 'attachment'),
    (3, 'Ботинки', 'boots'),
    (4, 'Одежда', 'clothing'),
    (5, 'Инструменты', 'tools'),
    (6, 'Разное', 'other');

-- 2. Вставить данные в таблицу с пользователями
INSERT INTO users (id, join_date, email, user_name, password, contact)
VALUES
    (1, '2016-04-05 15:34:28', 'dodon@yandex.ru', 'Иван Скуратов', 'ass123', 'тел. 8-929-100-50-14'),
    (2, '2017-06-04 16:34:18', 'blue_sky@gmail.com', 'Дарья Смирнова', 'blue014', 'тел. 8-909-100-50-14'),
    (3, '2018-04-22 05:00:11', 'cornelius@sky.com', 'Корней Жук', 'BEEmy100', 'тел. 8-919-100-50-14'),
    (4, '2019-04-04 14:21:47', 'maks1515@gmail.com', 'Максим Иванов', 'pass1234', 'тел. 8-919-100-50-14'),
    (5, '2020-01-31 09:44:15', 'shinysun@mail.ru', 'Алена Петрова', 'qweqwe123', 'тел. 8-950-804-22-76');

-- 3. Вставить данные в таблицу с объявлениями
INSERT INTO lots (id, cat_id, user_id, pub_date, title, description, image, price_init, date_exp, step)
VALUES
    (1, 1, 1, '2020-03-20 08:15:44', '2014 Rossignol District Snowboard', 'Стильная доска известного бренда. Откатал один сезон.',
     'img/lot-1.jpg', 10199, '2020-04-20', 300),
    (2, 1, 1, '2020-03-20 17:25:45', 'DC Ply Mens 2016/2017 Snowboard', 'Крутая доска для фрирайда.',
     'img/lot-2.jpg', 159999, '2020-04-20', 500),
    (3, 2, 2, '2020-03-22 10:19:34', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Надежные крепления с механизмом "двойной паук".',
     'img/lot-3.jpg', 8000, '2020-04-24', 200),
    (4, 3, 2, '2020-03-30 22:44:22', 'Ботинки для сноуборда DC Mutiny Charocal', 'Боты не ношены. В отличном состоянии.',
     'img/lot-4.jpg', 10999, '2020-04-30', 300),
    (5, 4, 3, '2020-03-30 11:35:01', 'Куртка для сноуборда DC Mutiny Charocal', 'Куртка с высокой паропроницаемостью 10000/5000.',
     'img/lot-5.jpg', 7500, '2020-04-30', 200),
    (6, 6, 3, '2020-03-30 19:05:57', 'Маска Oakley Canopy', 'Стекло хамелеон с покрытием anti-fog.',
     'img/lot-6.jpg', 5400, '2020-04-30', 100);

-- 4. Вставить данные в таблицу со ставками
INSERT INTO bets (id, user_id, lot_id, call_date, call_price)
VALUES
    (1, 4, 3, '2020-04-12 17:46:15', 8200),
    (2, 5, 6, '2020-04-14 09:34:56', 5500);

-- 5. Получить все категории
SELECT cat_name FROM categories;

-- 6. Показать лот по его id. Получить название категории, к которой принадлежит лот
SELECT l.*, c.cat_name
FROM lots as l
JOIN categories as c ON c.id = l.cat_id
WHERE l.id = 3

-- 7. Обновить название лота по его идентификатору
UPDATE lots SET title = 'Маска Oakley Canopy 2019' WHERE id = 6;

-- 8. Получить список ставок для лота по его идентификатору с сортировкой по дате
SELECT b.*
FROM bets as b
JOIN lots as l ON b.lot_id = l.id
WHERE l.id = 6
ORDER BY b.call_date;


/* 9. Получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену,
ссылку на изображение, текущую цену, название категории */

SELECT l.title, l.price_init, l.image, b.call_price, c.cat_name
FROM lots as l
JOIN categories as c ON c.id = l.cat_id
LEFT JOIN bets as b ON b.lot_id = l.id
WHERE l.date_exp > NOW()
ORDER BY l.pub_date DESC;



