<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$pageName.' | '.$nameWebApplication?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/style/style.css">
  <meta name="description" content="<?=$pageDesc?>">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-xl">
            <a class="navbar-brand" href="/">GoodPrice</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?=$getUrl == '/' ? 'active' : NULL?>" aria-current="page" href="/">На главную</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Обновления</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Услуги</a>
                    </li>
                    <li class="nav-item">
                        <?php 
                            if($getUrl == '/create') {
                                $linkCreateProduct = '<a class="nav-link active" href="/create">Создать объявление</a>';
                            } else{
                                $linkCreateProduct = '<a class="nav-link" href="/create">Создать объявление</a>';
                            }
                        ?>
                        <?=isset($_SESSION['category']) ? $linkCreateProduct : '<a class="nav-link disabled">Создать объявление</a>'?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>