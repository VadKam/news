<?php
abstract class AbstractModel
    extends DbConnection
{
    static protected $table;
    static function getTableName()
    {
        return static::$table;
    }

    static function findAll()
    {
        $sql = 'SELECT * FROM ' . static::$table;
        $db = static::getConnection();
        $sth = $db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }






    static function findByPk($id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = static::getConnection();
        $sth = $db->prepare($sql);
        $sth->execute([':id' => $id]);
        return $sth->fetch();
    }




    static protected $columns = [];
    public function  save()
    {
        $tokens = [];
        $values = [];
        foreach (static::$columns as $column){
            $tokens[] = ':' . $column; // :title :text
            $values[':' . $column] = $this->$column; // Конкретные значения - Новая новость
        }
            // Для добавления статьи
        if(!isset($this->id)){
            $sql = 'INSERT INTO ' . static::$table .
                // Перечислить через запятую список полей дочерней модели
                '(' . implode(',', static::$columns). ')
                VALUES
                (' . implode(',', $tokens). ')';
            //echo $sql;
            $db = static::getConnection();
            $sth = $db->prepare($sql);
            $sth->execute($values);
            $this->id = $db->lastInsertId();
            // Для изменения статьи
        }else{
            $columns = [];
            foreach (static::$columns as $column){
                $columns[] = $column . '=:' . $column;
            }
            $sql = 'UPDATE ' . static::$table . '
                SET ' . implode(',', $columns) . '
                WHERE id=:id
                ';
            $db = static::getConnection();
            $sth = $db->prepare($sql);
            $sth->execute([':id'=>$this->id] + $values);
        }
    }
}
