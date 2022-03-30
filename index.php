<?php 
    require_once 'config.php'; 
    //Статус ошибки
    $statusRoute = 404;

    $sql = "SELECT * FROM pages";
    $urls = mysqli_query($dbConnect, $sql) or die(mysqli_error($dbConnect));

    foreach($urls as $url){
        if($getUrl == '/'.$url['url']){
            $statusRoute = 200;
            require $url['file'];
        }
    }

    if(preg_match('#product/([\d]+)#', $getUrl, $match)) {
        $statusRoute = 200;
        require 'product.php';
    } 

    if(preg_match('#category/([\d]+)#', $getUrl, $match)) {
        $statusRoute = 200;
        require 'category.php';
    } 

    if($statusRoute == 404)  {
        require '404.php';
        header('HTTP/1.0 404 Not Found');
    }    

?>
