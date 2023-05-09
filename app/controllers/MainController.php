<?php

namespace app\controllers;

use app\models\Partner;
use app\models\Payment;
use app\models\Receipt;
use RedBeanPHP\R;

/**
 * Главный контроллер приложения
 */
class MainController extends AppController
{

  public function indexAction()
  {
    $payment_obj = New Payment(); // Оплаты
    // получаем месяц за который проводится оплата
    /*if (!isset($_SESSION['date_active']))
    {*/
      $filter_date = $_GET['filter'] ?? date('Y-m-d');
      $year = (int)mb_substr($filter_date, 0, 4);  // выделяем год
      $month = (int)mb_substr($filter_date, 5, 2); // выделяем месяц
      if (!isset($_GET['filter'])) {
        if ($month == 1)
        {
          $month = 12; $year -= 1;
        } else
        {
          $month -= 1;
        }
      }
      $_SESSION['date_active']['year'] = $year;
      $_SESSION['date_active']['month'] = $month;
    /*}
    else
    {
      $year = (int)$_SESSION['date_active']['year'];
      $month = (int)$_SESSION['date_active']['month'];
    }*/
    // получаем оплаты текущего месяца
    $payments = $payment_obj->get_payment($year, $month);
    $this->setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');
    $this->set(compact('year', 'month', 'payments'));
  }

  public function paymentAction()
  {
    $partner_obj = New Partner(); // Поставщики услуг
    $payment_obj = New Payment(); // Оплаты
    // получаем месяц за который проводится оплата
    $data['year'] = $_SESSION['date_active']['year'];
    $data['month'] = $_SESSION['date_active']['month'];
    $data['name'] = $_GET['name'];
    $data['service'] = $_GET['type'];

    $partner = $partner_obj->get_service($data['service'], $data['name']);
    $data['id_partner'] = $partner['id'];
    $pay = $_GET['payment'];
    $data['summa'] = $_GET[$pay];
    $data['date_pay'] = date("Y-m-d");

    // записываем исправленные данные в БД
    $payment_obj->load($data);
    $payment_obj->save('payment');
    redirect();
    //die;
  }

}