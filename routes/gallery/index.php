<!-- подключаем хедер -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/templates/header.php'; ?>

<section class="images">
    <div class="container">
        <div class="images__intro">
            <h2 class="images__header">Загруженные изображения</h2>

            <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/templates/gallery-images.php'; ?>
        </div>
    </div>
</section>
</body>
</html>