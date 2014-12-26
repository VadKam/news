<?php
/**
 * Created by PhpStorm.
 * User: Vladislav
 * Date: 24.12.2014
 * Time: 18:15
 */
class ClassNews
    extends AbstractModel
{
    static protected $table = 'news';

    static protected $columns = ['title', 'text'];
}