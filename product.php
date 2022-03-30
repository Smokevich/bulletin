<?php 
    require_once 'config.php'; 

    if(isset($match[1])) {
        $productId = $match[1];
        $sql = "SELECT * FROM product WHERE id = '$productId'";
        $query = mysqli_query($dbConnect, $sql) or die(mysqli_error($dbConnect));
        $product = mysqli_fetch_assoc($query);
        if(is_array($product)) {
            //Debug($product);
        }
    }

    $pageName = 'Купить NAME';
    $pageDesc = 'Купить NAME дешево и с доставкой по всей России';

    require_once 'template/header.php';
?>
    <div class="container create">
        <div class="row">
            <div class="col-xl-8">
            <h2>Купить <?=$product['name']?></h2>
                <div class="row">
                    <div class="col-xl-4">
                        <img src="<?=$product['image']?>" class="img-thumbnail" alt="Купить <?=$product['name']?>">
                        <button class="btn btn-primary col-xl-12 mt-3" type="button">Купить за <?=$product['price']?> ₽</button>
                    </div>
                    <div class="col-xl-8">
                        <p>Было добавлено: <?=$product['timeAdd'] ?></p>
                        <p><?=nl2br($product['text'])?></p>
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-4">
                <?php require_once 'template/sidebar.php' ?>
            </div>
        </div>
    </div> 
<?php require_once 'template/footer.php' ?>