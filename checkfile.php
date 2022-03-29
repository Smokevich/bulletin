<?php
$path = '/upload/'; // Куда загружать картинки

if(isset($_FILES['picture'])) {
    $image = $_FILES['picture'];
    // Получаем нужные элементы массива "image"
    $fileTmpName = $_FILES['picture']['tmp_name'];
    $errorCode = $_FILES['picture']['error'];
    // Проверим на ошибки
    if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($fileTmpName)) {
    // Массив с названиями ошибок
    $errorMessages = [
        UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
        UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
        UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
        UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
        UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
        UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
        UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
    ];
    // Зададим неизвестную ошибку
    $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
    // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
    $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
    // Выведем название ошибки
    die($outputMessage);
    } else {

        // Сгенерируем новое имя файла на основе MD5-хеша
        $name = $_FILES['picture']['name'];
        // Меняем на JPG если требуется
        $name = str_replace('jpeg', 'jpg', $name); 
        // Находим название и расширение
        preg_match('/([a-z-0-9_]+)(\.[a-z]+)/i', $name, $match);
        
        // Генерируем новое название
        $newName = $match[1].rand(100,999).$match[2]; 
    
        // Если запись не прошла, выводим ошибку
        if (!move_uploaded_file($fileTmpName, __DIR__ . $path . $newName)) { 
            die('При записи изображения на диск произошла ошибка.');
        }

        // Получаем полный путь для отправки в БД
        $linkPicture = $path.$newName;
    }

} else{
    // Заглушка на всякий случай
    $_SESSION['msg-status'] = 'danger';
    $_SESSION['msg'] = 'Ошибка загрузки файла!';
}

?>