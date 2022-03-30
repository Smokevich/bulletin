<?php 
    $sql = "SELECT * FROM categories";
    $query = mysqli_query($dbConnect, $sql) or die(mysqli_error($dbConnect));
?>

                <ul class="nav flex-column">
                    <?php 
                        foreach($query as $category) {
                            if($getUrl == '/category.php?id='.$category['id']){
                                $activeSidebar = 'active';
                            } else{
                                $activeSidebar = '';
                            }
                            echo "
                            <li class=\"nav-item\">
                                <a class=\"nav-link $activeSidebar\" href=\"category.php?id={$category['id']}\">{$category['name']}</a>
                            </li>".PHP_EOL;
                        }
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Категория 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Отключенная</a>
                    </li>
                </ul>