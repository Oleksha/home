<?php

namespace home;

/**
 * Класс обработки ошибок
 */
class ErrorHandler
{

    /**
     * Конструктор класса
     */
    public function __construct()
    {
        if (DEBUG)
        {   // если установлен режим разработки показываем все ошибки
            error_reporting(-1);
        }
        else
        {   // если разработка завершена скрываем все ошибки
            error_reporting(0);
        }
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    /**
     * Пользовательский обработчик ошибок
     */
    public function errorHandler($errno, $errstr, $errfile, $errline): bool
    {
        $this->logErrors($errstr, $errfile, $errline);
        $this->displayError((string)$errno, $errstr, $errfile, $errline);
        return true;
    }

    /**
     * Функция получения фатальной ошибки
     */
    public function fatalErrorHandler()
    {   // выполняется после завершения работы скрипта
        $error = error_get_last(); // данные о последней фатальной ошибке
        if (!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR))
        {   // Если такая ошибка есть
            $this->logErrors($error['message'], $error['file'], $error['line']);
            ob_end_clean(); // Получаем содержимое буфера и удаляем его
            $this->displayError((string)$error['type'], $error['message'], $error['file'], $error['line']);
        }
        else
        {   // Если ошибки нет
            ob_end_flush(); // Сбросываем буфер и отключаем буферизацию вывода
        }
    }

    /**
     * Метод обрабатывающий перехваченные исключения
     */
    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    /**
     * метод показывающий ошибку на экране
     * @param $errno string номер исключения или ошибки
     * @param $errstr string описание исключения или ошибки
     * @param $errfile string файл, в котором возникло исключение
     * @param $errline string строка, в которой возникло исключение
     * @param $responce integer код ошибки отправляемый заголовку браузера, по умолчанию 404
     */
    public function displayError($errno, $errstr, $errfile, $errline, $response = 500)
    {
        http_response_code($response); // отправляем код ответа браузера
        if (DEBUG)
        {   // Если режим разработчика подключаем соответствующий шаблон
            require WWW . '/errors/dev.php';
        }
        else
        {   // Если режим пользователя подключаем соответствующий шаблон
            require WWW . '/errors/prod.php';
        }
        die;
    }

    /**
     * Метод для записи ошибок в log-файл ошибок
     * @param $message string описание исключения
     * @param $file string файл, в котором возникло исключение
     * @param $line string строка, в которой возникло исключение
     */
    protected function logErrors($message = '', $file = '', $line = '')
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line}\n--------------------\n", 3, ROOT . '/tmp/errors.log');
    }

}