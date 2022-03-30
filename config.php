<?php
    session_start();
    require_once 'db.php';
    $getUrl = $_SERVER["REQUEST_URI"];

    $nameWebApplication = 'GoodPrice'; 
    

    function Debug(array $arr) {
        echo '<pre>';
        var_dump($arr);
        echo '</pre>';
    }

?>