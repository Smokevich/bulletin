<?php
    require_once 'config.php';
    if(isset($match[1])) {
        $categoryId = $match[1];

        $sql = "SELECT * FROM product 
                WHERE categoryID = '$categoryId'";

        $productsdb = mysqli_query($dbConnect, $sql) or die(mysqli_error($dbConnect));
        $product = mysqli_fetch_assoc($productsdb);

        // if(is_array($product)) {
        //     echo '<pre>';
        //     var_dump($product);
        //     echo '</pre>';
        //     $category = $product['category'];
        //     $description = $product['description'];
        // }

        $sql = "SELECT * FROM categories WHERE id = '$categoryId'";
        $query = mysqli_query($dbConnect, $sql) or die(mysqli_error($dbConnect));
        $category = mysqli_fetch_assoc($query);

        if(is_array($category)) {
            $_SESSION['category'] = $category;
            $pageName = 'Объявления в категории '.$category['name'];
            $pageDesc = $category['description'];
        }

    } else {
        
    }

    require_once 'template/header.php';
?>
    <div class="container create">
        <div class="row">
            <div class="col-xl-8">
            <h2 class="col-xl-12">Список последний объявлений</h2>
                <div class="row">
                    <?php if(isset($productsdb)) {
                        foreach($productsdb as $product) {
                            $productName = mb_strimwidth($product['name'], 0, 23, '...');
                            $productText = mb_strimwidth($product['text'], 0, 70, '...');
                            echo "
                            <div class=\"col-xl-4 cardproduct\">
                                <div class=\"card\" style=\"width: 18rem\">
                                    <img src=\"{$product['image']}\" class=\"card-img-top\" alt=\"Купить {$product['name']}\">
                                    <div class=\"card-body\">
                                        <h5 class=\"card-title\">{$productName}</h5>
                                        <p class=\"card-text\">{$productText}</p>
                                        <h6 class=\"price\">{$product['price']} ₽</h6>
                                        <div class=\"d-grid mt-3\">
                                            <a href=\"/product/{$product['id']}\" class=\"btn btn-primary\">Перейти к объявлению</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    }
                    ?>
                    <div class="col-xl-12 mt-3 d-grid">
                        <a href ="/create" class="btn btn-primary" type="button">Создать новое объявление в категории <?=$category['name']?></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <?php require_once 'template/sidebar.php' ?>
            </div>
        </div>
    </div> 
<?php require_once 'template/footer.php' ?>