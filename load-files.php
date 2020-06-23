<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/include/functions.php';

//var_dump($_FILES);

//$path = $_FILES["images"]["tmp_name"][0];
//var_dump($path);
//$finfo = finfo_open(FILEINFO_MIME_TYPE);
//$fileType = finfo_file($finfo, $path);

//echo $fileType;
\functions\loadFiles();

echo 'Файлы загружены';

