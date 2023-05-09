<?php

namespace app\models;

class Partner extends AppModel
{

  /**
   * поля таблицы для заполнения
   * @var array
   */
  public $attributes = [
    'name' => '',
    'web' => '',
    'inn' => '',
    'login' => 0,
    'pass' => 0,
    'personal_account' => 0,
    'active' => '',
    'service' => '',
  ];

  /**
   * возвращает данные о поставщике услуг
   * @param string $service оказываемая услуга
   * @return array
   */
  public function get_service(string $service, string $place): array
  {
    $service_array = \R::getAssocRow("SELECT * FROM partner WHERE active = '1' AND service = ? AND place = ?", [$service, $place]);
    if ($service_array)
    {
      return $service_array[0];
    }
    else return array();
  }

}