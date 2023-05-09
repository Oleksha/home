<?php

namespace home\base;

use home\Db;

/**
 * Класс отвечающий за работу с данными
 */
abstract class Model
{

    /**
     * Массив свойств модели (идентичен полям базы данных)
     * @var array
     */
    public $attributes = [];

    /**
     * Массив возникших ошибок
     * @var array
     */
    public $errors = [];

    /**
     * Массив правил проверки данных
     * @var array
     */
    public $rules = [];

    /**
     * Конструктор класса
     */
    public function __construct()
    {
        // подключение к базе данных
        Db::instance();
    }

  /**
   * Автоматическая загрузка данных из форм ввода
   * @param $data array полученный набор данных
   */
  public function load($data) {
    // проходим по всем атрибутам
    foreach ($this->attributes as $name => $value) {
      // если в переданных данных data есть имя ключа атрибута
      if (isset($data[$name])) {
        // запоминаем в атрибуте соответсвующее значение
        $this->attributes[$name] = $data[$name];
      }
    }
  }

  /**
   * Сохраняет данные в БД
   * @param $table string Имя таблицы в которой будут сохранены данные
   * @return int 0 если произошла ошибка, и ID новой записи если все хорошо
   */
  public function save(string $table) {
    $tbl = \R::dispense($table); // подключаем источник данных table
    foreach ($this->attributes as $name => $value) {
      // проходим по всем атрибутам содержащим данные для добавления
      $tbl->$name = $value;
    }
    return \R::store($tbl);
  }

  /**
   * Редактирует запись БД
   * @param $table string Имя таблицы БД
   * @param $id int Идентификатор записи для редактирования
   * @return int 0 если произошла ошибка, и ID новой записи если все хорошо
   */
  public function edit($table, $id) {
    $tbl = \R::load($table, $id); // подключаем источник данных table
    foreach ($this->attributes as $name => $value) {
      // проходим по всем атрибутам содержащим данные для добавления
      $tbl->$name = $value;
    }
    return \R::store($tbl);
  }

}