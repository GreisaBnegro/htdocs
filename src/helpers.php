<?php
function dd($value)
{
    die(var_dump($value));
}

function establish_connection()
{
    $db = mysqli_connect('localhost', 'root', '', 'scandiwebproject')
        or die('Error connecting to MySQL server.');
    return $db;
}

class MysqlDB
{
    private mysqli $_db;

    public function establish_connection(): void
    {
        $this->_db = mysqli_connect('localhost', 'root', '', 'scandiwebproject')
            or die('Error connecting to MySQL server.');
    }

    public function queryTheDb(string $query): mysqli_result
    {
        return mysqli_query($this->_db, $query);
    }
}