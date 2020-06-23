<?php
    //дирректория загрузки файлов
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/upload';

    //если есть загруженные файлы
    if (!empty(glob($dir . '/*'))) :
        //файлы + сортировка
        $images = scandir($dir, SCANDIR_SORT_DESCENDING);
    ?>
        <form class="images__delete-form" id="js-images-delete-form" method="post">
        <ul class="images__list">
        <?php
        //отображаем фото
            foreach ($images as $img) {
                $imgDir = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $img;
                if ($img != '.' && $img != '..') :?>
                     <li class="images__item">
                         <img class="images__photo" src="/upload/<?= $img ?>" alt=<?= \functions\cutFileExtension($img) ?>>

                         <p class="images__name">Название изображения : <?= $img ?></p>

                         <time class="images__load-time">Дата публикации : <?= date("F d Y H:i:s.", filectime($imgDir)) ?></time>

                         <span class="images__size">Размер изображения : <?= \functions\getFileSize($imgDir) ?></span>

                         <label class="images__label">
                             <input class="images__checkbox js-images__checkbox" type="checkbox" name="checkbox[]">Удалить изображение
                         </label>
                     </li>
                <?php endif; }?>
        </ul>

        <button class="images__delete-btn" id="js-images-delete-btn" type="submit">Удалить выбранные фотографии</button>
        </form>

        <?php
        // если их нет
        else: ?>
            <div class="images__empty">Нет загруженных изображений</div>
    <?php endif; ?>
