$(document).ready(function () {
    const loadForm = $('#load-form');               //форма загрузки файлов
    const loadFilesBtn = $('#load-files-btn');      //кнопка отправки формы загрузки файлов
    const loadFormInput = $('#js-load-form__input'); //поле input

    const deleteForm = $('#js-images-delete-form'); //форма удаления изображений
    const deleteImagesBtn = $('#js-images-delete-btn'); //кнопка удалить изображения по выделенным чекбоксами

    const checkboxElem = $('.js-images__checkbox');

    // ajax
    loadFilesBtn.on('click', function (event) {
        event.preventDefault();

        const file_data = Array.from(loadFormInput.prop('files'));

        console.log(file_data);
        const form_data = new FormData();

        file_data.forEach(item => {
            form_data.append('images[]', item);
        });

        // console.log(form_data.getAll('images[]'));

        //отправка формы Ajax без перезагрузки страницы
        function sendAjaxForm(url) {
            $.ajax({
                url: url, //url страницы (index.php)
                data: form_data,
                processData: false,
                contentType: false,
                type: "POST", //метод отправки
                success: function(response) { //Данные отправлены успешно
                    console.log('response от сервера :', response);
                },
                error: function(response) { // Данные не отправлены
                    alert('данные не отправлены');
                }
            });
        }

        sendAjaxForm("./load-files.php");

        loadForm[0].reset();
    });

    // удаление фото
    deleteImagesBtn.on('click', function (event) {
        event.preventDefault();

        let images = [];
        const data = new FormData();

        for (const item of checkboxElem){
            if (item.checked) {
                const parent = item.closest('.images__item');
                let imgName = parent.querySelector('.images__photo').src.split('/');

                console.log(imgName[imgName.length - 1]);
                images.push(imgName[imgName.length - 1]);
            }
        }

        data.append('img', images);

        console.log(data.getAll('img'));

        //отправка формы Ajax без перезагрузки страницы
        function sendAjaxForm(url) {
            $.ajax({
                url: url, //url страницы (index.php)
                data: data,
                processData: false,
                contentType: false,
                type: "POST", //метод отправки
                success: function(response) { //Данные отправлены успешно
                    console.log('response от сервера :', response);
                },
                error: function(response) { // Данные не отправлены
                    alert('данные не отправлены');
                }
            });
        }

        const url = '../../delete-files.php';

        sendAjaxForm(url);

        deleteForm[0].reset();

        location.reload();
    })
});
