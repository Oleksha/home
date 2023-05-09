/* Фильтр начало */
$('body').on('change', '.filters select', function () {
    let date_y = $('#select_year option:checked'), // получаем все отмеченные чекбоксы
        date_m = $('#select_month option:checked'), // получаем все отмеченные чекбоксы
        data = '';
    date_y.each(function () {
        // пройдем в цикле по всем отмеченным чекбоксам
        data += this.value + '-'; // добавлем в переменную значения года
    });
    date_m.each(function () {
        // пройдем в цикле по всем отмеченным чекбоксам
        data += this.value + '-01'; // добавлем в переменную значения года
    });
    if (data) {
        // если включен какой либо фильтр
        // формируем AJAX запрос
        $.ajax({
            url: location.href,
            data: {filter: data},
            type: 'GET',
            beforeSend: function () {
                // перед отправкой мы должны включить прелоадер
                $('.preloader').fadeIn(100, function() {
                    // обратимся к классу показывающему продукты
                    // и скроем все отображаемые на экране продукты
                    $('#my_pay').hide();
                });
            },
            success: function (res) {
                // постепенно скроем прелоадер и
                $('.preloader').delay(100).fadeOut('show', function () {
                    // в класс показывающий продукты подгружаем
                    // полученный ответ с сервера и показываем его
                    $('#my_pay').html(res).fadeIn();
                    let url = location.search.replace(/filter(.+?)(&|$)/g, ''); //$2
                    let newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
                    newURL = newURL.replace('&&', '&');
                    newURL = newURL.replace('?&', '?');
                    history.pushState({}, '', newURL);
                    location.reload();
                });
            },
            error: function (res) {
                alert('Errors');
            }
        });
    }
    //alert(data);
});
/* Фильтр конец */