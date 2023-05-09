<?php

namespace app\models;

class Payment extends AppModel
{

  // поля таблицы для заполнения
  public $attributes = [
    'year' => '',
    'month' => '',
    'service' => '',
    'name' => '',
    'id_partner' => 0,
    'summa' => 0,
    'commission' => 0,
    'date_pay' => '',
  ];

  /**
   * возвращает массив оплат если они были
   * @param $year integer Год
   * @param $month int Месяц
   * @return array
   */
  public function get_payment(int $year, int $month): array
  {
    $pay_arrays = \R::getAssocRow('SELECT * FROM payment WHERE year = ? AND month = ?', [$year, $month]);
    if ($pay_arrays)
    {
      return $pay_arrays;
    }
    else return array();
  }

}