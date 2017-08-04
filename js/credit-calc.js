;(function () {
    var body = $('body'),
        errorEmpty = 'Объязательное поле!',
        errorFormat = 'Неверное значение!';

    //проверка обязательных полей на пустоту
    function checkNotEmpty(elem) {
        if (elem.val() == '') {
            elem
                .parent().addClass('has-error')
                .end().siblings('.text-help').text(errorEmpty);
        } else {
            elem
                .parent().removeClass('has-error')
                .end().siblings('.text-help').text('');
        }
    }

    //проверка полей на правильность ввода
    function checkFormat(elem2) {
        if (isNaN(elem2.val())) {
            elem2
                .parent().addClass('has-error')
                .end().siblings('.text-help').text(errorFormat);
        } else {
            elem2
                .parent().removeClass('has-error')
                .end().siblings('.text-help').text('');
        }
    }

    body.on('blur', '.required', function() {
        var elem = $(this);
        checkNotEmpty(elem);
    });

    body.on('blur', '.form-control', function() {
        var elem2 = $(this);
        checkFormat(elem2);
    });

    $('#calc-credit').on('click', function() {
        $('.required').each(function() {
            var elem = $(this);
            checkNotEmpty(elem);
        });

        if ($('.has-error').length > 0) {
            return false;
        }

        var needSum = $('#need-sum').val(),
            period = $('#period').val(),
            porcent = ($('#porcent').val() / 36000) * 30,
            komiss = (needSum * ($('#komiss').val() / 100)).toFixed(2)*1,
            inshur = (needSum * ($('#inshur').val() / 100)).toFixed(2)*1,
            teloCredita = needSum / period,
            resultTable = '',
            areaTabl = [],
            allSumProc = 0,
            allSumPoCred = 0,
            itogo = 0;

        //наполняю переменную (массив) объектами areaTabl расчетами по месяцам
        for (var i = 0; i < period; i++) {
            areaTabl.push(
                {
                    _id: i,
                    month: i + 1,
                    dolg: (needSum - i * teloCredita).toFixed(2)*1,
                    sumCred: ((needSum - i * teloCredita) * porcent).toFixed(2)*1,
                    allSum: (teloCredita + ((needSum - i * teloCredita) * porcent + komiss + inshur)).toFixed(2)*1
                }
            );
        };

        //подсчитую ссуму % период и сумму выплат за весь
        for (var i = 0; i < areaTabl.length; i++) {
            allSumProc += areaTabl[i].sumCred;
            allSumPoCred += areaTabl[i].allSum;
        };

        //запуск цикла с построением таблицы результатов
        for (var i = 0; i < period; i++) {
            resultTable += '<tr>' +
                '<td>' + areaTabl[i].month + '</td>' +
                '<td>' + areaTabl[i].dolg + '</td>' +
                '<td>' + teloCredita.toFixed(2)*1 + '</td>' +
                '<td>' + komiss + '</td>' +
                '<td>' + inshur + '</td>' +
                '<td>' + areaTabl[i].sumCred + '</td>' +
                '<td>' + areaTabl[i].allSum + '</td>' +
                '</tr>';
        };

        itogo = '<tr><th colspan="2">Итоговые значения:</th>' +
            '<th>'+ (teloCredita * period).toFixed(2)*1 +'</th>' +
            '<th>'+ (komiss * period).toFixed(2)*1 +'</th>' +
            '<th>'+ (inshur * period).toFixed(2)*1 +'</th>' +
            '<th>'+ allSumProc.toFixed(2)*1 +'</th>' +
            '<th>'+ allSumPoCred.toFixed(2)*1 +'</th></tr>';

        $('#result').html(resultTable);
        $('#tfoot').html(itogo);
        $('#table-result').parent().removeClass('hidden');

        var scrollTo = $('#table-result').offset().top;
        $('html, body').animate({
            scrollTop: scrollTo
        }, 500);

    });
})();