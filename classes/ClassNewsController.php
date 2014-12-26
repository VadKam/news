<?php
/**
 * Created by PhpStorm.
 * User: Vladislav
 * Date: 26.12.2014
 * Time: 19:55
 */

class ClassNewsController
    extends AbstractController
{
    protected function actionAll()
    {
        $AllNews = ClassNews::findAll();
        include __DIR__ . '/../views/allnews.php';
    }


    protected function actionEdit()
    {
        $editnews_id  = (int)$_GET['editnews'];
        // Помещаем в $get_page функцию, которая получает полученную id страницу
        $article = ClassNews::findByPk($editnews_id);
        include ('../controllers/ContrEditNews.php');
        $article->save();
    }
} 