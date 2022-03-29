<?php
    require_once 'header.php';
    if(isset($_GET['id'])) {
        $categoryId = $_GET['id'];

        $sql = "SELECT *, categories.name as category FROM product 
                LEFT JOIN categories ON categoryID = categories.id
                WHERE categoryID = '$categoryId'";

        $query = mysqli_query($dbConnect, $sql) or die(mysqli_error($dbConnect));
        $product = mysqli_fetch_assoc($query);
        echo '<pre>';
        var_dump($product);
        echo '</pre>';
        $category = $product['category'];

    } else {
        
    }

?>
    <div class="container create">
        <div class="row">
            <div class="col-xl-8">
            <h2>Список последний объявлений</h2>
                <div class="row">
                    <?php if(isset($query)) {
                        foreach($query as $product) {
                            $text = mb_strimwidth($product['text'], 0, 70, '...');
                            echo "
                            <div class=\"col-xl-4 cardproduct\">
                                <div class=\"card\" style=\"width: 18rem;\">
                                    <img src=\"{$product['image']}\" class=\"card-img-top\" alt=\"...\">
                                    <div class=\"card-body\">
                                        <h5 class=\"card-title\">{$product['name']}</h5>
                                        <p class=\"card-text\">{$text}</p>
                                        <h6 class=\"price\">{$product['price']} ₽</h6>
                                        <a href=\"#\" class=\"btn btn-primary\">Перейти к товару</a>
                                    </div>
                                </div>
                             </div>
                            ";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-xl-4">
                <?php require_once 'sidebar.php' ?>
            </div>
        </div>
    </div> 
</body>
</html>