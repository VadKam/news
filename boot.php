<?php
/**
 * Created by PhpStorm.
 * User: Vladislav
 * Date: 24.12.2014
 * Time: 14:31
 */
function __autoload($class)
{
    require 'classes/' . $class . '.php';
}