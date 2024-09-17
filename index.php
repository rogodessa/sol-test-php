<?php

const TEST_PHP_PATH = __DIR__;
const TEST_PHP_VIEWS = TEST_PHP_PATH . '/views';

require_once TEST_PHP_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(TEST_PHP_PATH);
$dotenv->load();

$dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASS']);

if(!empty($_REQUEST['ajax'])) {
    new \Solo\TestPhp\Ajax();
}

(new \Solo\TestPhp\View())->home();