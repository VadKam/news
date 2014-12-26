<html>
<head>
    <title>Новости</title>
    <meta charset="utf-8">
</head>
<body>
<div id="maket">
    <div id="pagesnews">

        <?php foreach($AllNews as $key => $value): ?>
        <article>
            <h1><?=$AllNews[$key]->title;?></h1>
            <div><?=$AllNews[$key]->text;?><a href=news.php?pagenews=<?=$AllNews[$key]->id;?> target="_blank">Читать далее...</a></div>
            <div style="float: right; font-size: 12px; margin: 5px">Дата публикации <?=$AllNews[$key]->datanews;?></div>
            <div><a target="_blank" href="admin/admin.php?editnews=<?=$AllNews[$key]->id;?>">Редактировать Новость<?=$AllNews[$key]->id;?></a></div>
        </article>

        <?php endforeach;?>


    </div>
    <div id="knopkanews">
        <a target="_blank" href="views/addnews.php">Добавить Новость</a>
    </div>
</div>
</body>
</html>






