<?php

//db.php
//  db class use phplib db_mysql.inc
//  let's dance with smarty and phplib db_mysql.

define('DB_LIB_PATH', 'DB/db_mysql.inc');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'turtlerock');
define('DB_USER', 'root');
define('DB_PASS', '123');

require_once(DB_LIB_PATH);

class DB extends DB_Sql{
    function __construct(){
        $this->DB_Sql();
        $this->Host = DB_HOST;
        $this->Database = DB_NAME;
        $this->User = DB_USER;
        $this->Password = DB_PASS;
    }
}
