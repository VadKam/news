<?php
/**
 * Created by PhpStorm.
 * User: Vladislav
 * Date: 26.12.2014
 * Time: 19:53
 */

abstract class AbstractController
{
    public function action($name)
    {
        $actionName = 'action'.ucfirst($name);
        if (method_exists($this, $actionName)){
            $this->$actionName();
        }
    }
}