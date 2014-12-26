<?php
class DbConnection
{
    // Подключение к файлу
    private function config()
    {
        return include __DIR__ . '/../config.php';
    }

    static  function getConnection()
    {
        try{
            $config = static::config();
            $dsn = 'mysql:dbname='.$config['db']['dbname'] . ';host='.$config['db']['host'];
            $dbh = new PDO($dsn, $config['db']['user'], $config['db']['password']);
            return $dbh;
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}











