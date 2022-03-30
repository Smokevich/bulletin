<?php 
    require_once 'config.php'; 

    $pageName = 'Находите все что угодно по всей России';
    $pageDesc = 'На GoodPrice вы сможете найти буквально все что нужно, а так же продать ненужные вам вещи быстро и без нервов!';

    $sql = "SELECT * FROM product";
    $productsdb = mysqli_query($dbConnect, $sql) or die(mysqli_error($dbConnect));
    
    require_once 'template/header.php';
?>
    <div class="container create">
        <div class="row">
            <div class="col-xl-8">
            <h2>Список последних объявлений</h2>
                <div class="row">

                <?php foreach($productsdb as $product) {
                    $productName = mb_strimwidth($product['name'], 0, 22, '...');
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
                
                
                ?>

                    
                </div>
            </div>
            <div class="col-xl-4">
                <?php require_once 'template/sidebar.php' ?>
            </div>
        </div>
    </div> 
<?php require_once 'template/footer.php' ?>