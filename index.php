<?php
/**
 * Created by PhpStorm.
 * User: Vladislav
 * Date: 24.12.2014
 * Time: 14:24
 */
require 'boot.php';

$route = $_GET['r'];
$routeParts = explode('/', $route);

$controllerClassName = ucfirst($routeParts[0]).'Controller';

$controller = new $controllerClassName;
$controller->action($routeParts[1]);

/*
$controller = new NewsController();
$controller->action('all');
*/