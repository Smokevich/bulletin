<?php 
    $sql = "SELECT * FROM categories";
    $query = mysqli_query($dbConnect, $sql) or die(mysqli_error($dbConnect));
?>

                <ul class="nav flex-column">
                    <?php 
                        foreach($query as $category) {
                            echo "
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"category.php?id={$category['id']}\">{$category['name']}</a>
                            </li>".PHP_EOL;
                        }
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Категория 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Отключенная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Текущая</a>
                    </li>
                </ul>