<?php

namespace home;

/**
 * Класс работы с сервером БД
 */
class Db
{

    use TSingletone;

    /**
     * Конструктор класса
     * @throws \Exception
     */
    private function __construct()
    {
        // получаем данные для подключения к БД
        $db = require_once CONF . '/config_db.php';
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        // проверяем получилось ли установить соединение с БД
        if (!\R::testConnection())
        {
            // если нет соединения - ошибка
            throw new \Exception("Нет соединения с БД", 500);
        }
        // Запрещаем изменять таблицы и БД на лету
        \R::freeze(true);
        if (DEBUG)
        {
            \R::debug(true, 1);
        }
    }

}