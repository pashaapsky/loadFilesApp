<!-- подключаем хедер -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/templates/header.php'; ?>
    <main class="main">
        <div class="container">
            <div class="load-block">
                <form class="load-form" id="load-form" method="post" enctype="multipart/form-data">
                    <fieldset class="load-form__fieldset">
                        <legend class="load-form__legend">Выберите загружаемые файлы</legend>

                        <label class="load-form__label">
                            <input class="load-form__input" id="js-load-form__input" name="images[]" type="file" multiple="multiple" required >
                        </label>

                        <button class="load-form__input" id="load-files-btn" type="submit">Отправить файлы</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
