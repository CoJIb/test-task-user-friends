# Тестовое задание:

_Входные артефакты_ :

Дамп базы данных mysql c таблицами:
- Users - пользователи
- user_friends - связаная таблица (pivot table) для связи отношеий пользователей к пользоателю (друзья)

### Задача

Необходимо из полученого data-set сгененерировать список рекомендуемых друзей для каждого пользователя. Для просчета веса использовать имеющихся друзей у пользователя. Алгоритм и проставление весов продумать самому. Разработку вести на базе любого популярного фреймворка (laravel, symfony (не ниже второго), yii2). Желательно чтобы было консольное приложение которое на выходе бы заполнила таблицу рекомендаций (user_id - ид пользователя, recommend_id - ид рекомендуемого пользователя, rate - вес рекомендации). 


### В каком виде отдавать результат:
Сделать fork теккущего репозитория, все изменения фиксировать в git (чем подробнее будет история тем легче нам будет понять компетенцию владения систмами контроля версий). Описать каким образом нам разворчивать среду, чтобы мы могли оценить работоспособность результата

