<?php
//initializing all our settings of my project

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . 'myTask');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'includes');
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT . DS . 'core');

// Load config file first
require_once INCLUDES_PATH . DS . 'config.php';
// Core classes
require_once CORE_PATH . DS . 'repository.php';
