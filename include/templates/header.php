<?php
//+ функции
include_once $_SERVER["DOCUMENT_ROOT"] . '/include/functions.php';

//+ меню навигации
include_once $_SERVER["DOCUMENT_ROOT"] . '/routes/route-menu.php';

//+ загружаем файлы через форму POST
?>

<!doctype html>
<html lang=ru>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- css  -->
    <link rel="stylesheet" href="/css/styles.css" type="text/css">

    <!-- jquery   -->
<!--    <script defer src="/js/jquery.js"></script>-->
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script defer src="/js/index.js"></script>

    <title><?= \functions\getTitle($routeMenu) ?></title>
</head>

<body>
    <header class="header">
            <div class="container">
                <h1 class="header__title"><?= \functions\getTitle($routeMenu) ?></h1>

                <!--  навигационное меню  -->
                <div class='header__menu'>
                    <?php
                    foreach ($routeMenu as $val) :?>
                        <a class="header__link" href=<?=$val["path"] ?>><?= $val["title"] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
    </header>