<?php

function jsonize($d){
    header("Content-type:application/json");
    echo json_encode($d);
}

function escape($data){
    // trim and escape
    return mysql_real_escape_string(trim($data));
}
?>
