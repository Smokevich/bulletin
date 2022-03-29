<?php
require_once 'header.php';
    if(isset($_POST['name']) && isset($_POST['text'])) {
        if (isset($_FILES['picture'])) {
            // Делаем магию с файлом
            include_once 'checkfile.php';

            $name = validation($_POST['name']);
            $text = validation($_POST['text']);
            $photo = validation($linkPicture);        
            
            $sql = "INSERT product SET 
                    name       = '$name',
                    image      = '$photo',
                    text       = '$text',
                    categoryID = 1,
                    timeAdd    = NOW()";

            $query = mysqli_query($dbConnect, $sql) or die(mysqli_error($dbConnect));
            
            if($query) {
                $_SESSION['msg-status'] = 'success';
                $_SESSION['msg'] = 'Объявление успешно создано!';
            }

        }

    }

    function validation(string $str) {
        return htmlspecialchars(strip_tags(stripslashes(trim($str))));
    }

?>
    <div class="container create">
        <div class="row">
            <div class="col-xl-8">

                <?php 
                    if(isset($_SESSION['msg']) && isset($_SESSION['msg-status'])) {
                        echo '<div class="alert alert-'.$_SESSION['msg-status'].'" role="alert">'.$_SESSION['msg'].'</div>';
                        //unset($_SESSION['msg']);
                    }     
                ?>
                <h2>Создать объявление</h2>
                <form enctype="multipart/form-data" action="" method="POST" class="row g-3 needs-validation">
                    <div class="col-xl-12">
                        <label for="exampleFormControlInput1" class="form-label">Название</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required>
                    </div>
                    <div class="col-xl-12">
                        <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                        <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="col-xl-12">
                        <label for="exampleFormControlInput2" class="form-label">Цена</label>
                        <input type="number" name="price" class="form-control" id="exampleFormControlInput2" required>
                    </div>
                    <div class="col-xl-12">
                        <label for="formFile" class="form-label">Фотография</label>
                        <input class="form-control form-control-sm" name="picture" id="formFileSm" type="file" required>
                    </div>
                    <div class="col-xl-12">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Согласен с условиями
                        </label>
                        <div class="invalid-feedback">
                            Вы должны согласиться перед отправкой.
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <button class="btn btn-primary" type="submit">Создать объявление</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-4">
                <?php require_once 'sidebar.php' ?>
            </div>
        </div>
    </div> 
</body>
</html>