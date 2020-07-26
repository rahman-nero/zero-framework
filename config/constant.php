<?php 
// Режим разработки - выводить все ошибки - 1
define('DEBUG', 1);
// Корень проекта
define('ROOT', dirname(__DIR__));
// Папка public
define('WWW', ROOT . '/public');
// В папку app
define('APP', ROOT . '/app');
// К ядру фрейма
define('CORE', ROOT . '/vendor/zero/core');
// К библиотекам фрейма
define('LIBS', ROOT . '/vendor/zero/core/libs');
// Путь к кэшу
define('CACHE', ROOT . '/tmp/cache');
// Путь к конфиг файлам
define('CONF', ROOT . '/config');
// Шаблон поумолчанию
define('LAYOUT', 'default');

// Вычесляем путь сайта
$url = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '') . '://';
$url = $url . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

define('PATH', $url);

