<?php
namespace functions;

//отобразить заголовок
function getTitle(array $menu){
    //выводим заголовок на нужной странице
    foreach ($menu as $val) {
        $url = $val["path"];

        if ($url === parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)){
            return $val["title"];
        }
    }

    return false;
}


//загрузить файлы в upload
function loadFiles () {
    if (!empty($_FILES)) {

        $errorMessages = [
            UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
            UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
            UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
            UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
            UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
            UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
            UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
        ];

        $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';

        foreach ($_FILES["images"]["error"] as $key => $error) {
            //проверка на ошибки
            if ($error == UPLOAD_ERR_OK) {
                //проверка на тип файлов
                $tmp_name = $_FILES["images"]["tmp_name"][$key];

                if (\functions\checkLoadFileType($tmp_name)){
                    //загрузка файлов в папку
                    $name = basename($_FILES["images"]["name"][$key]);
                    move_uploaded_file($tmp_name, "upload/$name");
                }
            }
            else {
                $outputMessage = isset($errorMessages[$error]) ? $errorMessages[$error] : $unknownMessage;

                // Выводим название ошибки
                die($outputMessage);
            }
        }
    }
}

function checkLoadFileType($itemTmpPath) {
    $correctFilesTypes = ['image/png', 'image/jpeg', 'image/jpg'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $fileType = finfo_file($finfo, $itemTmpPath);

    if (in_array($fileType, $correctFilesTypes)) {
        return true;
    }
    else return false;
}

//отрезать расширение файла
function cutFileExtension ($fileName) {
    return substr($fileName, 0, strripos($fileName, '.'));
}

// показать размер файла
function getFileSize($filePath) {
    $fileSize = filesize($filePath);

    switch ($fileSize) {
        case $fileSize < 10240: return $fileSize . ' b';
        case (($fileSize >= 10240) && ($fileSize < 10240 * 1024)) : return round($fileSize/1024, 1) . 'Kb';
    }

    return round($fileSize/1024/1024, 1) . 'Mb';
}
