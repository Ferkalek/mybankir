;(function () {
    var errorEmpty = 'Объязательное поле!',
        errorFormat = 'Неверное значение!';

    //проверка обязательных полей на пустоту
    function checkNotEmpty(elem) {
        if (elem.val() == '') {
            elem
                .parent().addClass('has-error')
                .end().siblings('.text-help').text(errorEmpty);
        } else if (isNaN(elem.val())) {
            elem
                .parent().addClass('has-error')
                .end().siblings('.text-help').text(errorFormat);
        } else {
            elem
                .parent().removeClass('has-error')
                .end().siblings('.text-help').text('');
        }
    }

    $('body').on('blur', '.required', function() {
        var elem = $(this);
        checkNotEmpty(elem);
    });

    //если нужно указываем свой размер налога
    $('input[name="tax-option"], input[name="option"]').change(function(){
        var elemVal = $(this).val(),
            needElem = $(this).closest('.has-disabled-elem').find('.disabled-elem');
        if (elemVal == 'enabled') {
            needElem.prop('disabled', false).addClass('required');
        } else {
            needElem.prop('disabled', true).val('').removeClass('required');
        }
    });

    $('#calc').on('click', function () {
        $('.required').each(function() {
            var elem = $(this);
            checkNotEmpty(elem);
        });

        if ($('.has-error').length > 0) {
            return false;
        }

        var tax = $('input[name="tax-option"]:checked').val(),
            taxV;

        if (tax == 'default') {
            taxV = 0.195;
        } else if (tax == 'no') {
            taxV = 0;
        } else {
            taxV = $('#tax-custom-val').val() / 100;
        }

        var sumDep = $('#sum-dep').val(),
            pct = $('#porcent').val(),
            term = $('#period').val(),
            typeDep = $('input[name="option"]:checked').val(),
            pctOneMonth = (pct / 12 / 100) * (1 - taxV),
            sumProcPerMonth, allSum, resultTable,
            arrayCalc = [[0,0,0,sumDep]];

        //определяем способ возврата депозита
        if (typeDep == 'norekap') {
            sumProcPerMonth = (sumDep * pctOneMonth).toFixed(2);
            allSum = (sumDep * (1 + pctOneMonth * term)).toFixed(2);
            for (var i = 1; i <= term; i++) {
                resultTable += '<tr><td>'+i+'</td><td>'+sumDep+'</td><td>'+sumProcPerMonth+'</td></tr>';
            }
        } else if (typeDep == 'rekap') {
            allSum = (sumDep * Math.pow((1 + pctOneMonth), term)).toFixed(2);
            for (var i = 1; i <= term; i++) {
                resultTable += '<tr><td>'+i+'</td>' +
                    '<td>'+(sumDep * Math.pow((1 + pctOneMonth), (i-1))).toFixed(2)+'</td>' +
                    '<td>'+(sumDep * Math.pow((1 + pctOneMonth), (i-1)) * pctOneMonth).toFixed(2)+'</td></tr>';
            }
        } else {
            var sumAddMonth = $('#add-more-val').val();
            for (var i = 1; i <= term; i++) {
                var arrayCalcItem = [],
                    nachSumD = 1*arrayCalc[i-1][3],
                    nachPct = nachSumD * pctOneMonth,
                    itogo = nachSumD * (1 + pctOneMonth) + 1 * sumAddMonth;

                arrayCalcItem.push(nachSumD);
                arrayCalcItem.push(nachPct);
                arrayCalcItem.push(sumAddMonth);
                arrayCalcItem.push(itogo);
                arrayCalc.push(arrayCalcItem);

                resultTable += '<tr><td>'+i+'</td>' +
                    '<td>'+(nachSumD).toFixed(2)+'</td>' +
                    '<td>'+(nachPct).toFixed(2)+'</td></tr>';

                allSum = (itogo - sumAddMonth).toFixed(2);
            }
        }
        $('#result').html(resultTable);
        $('#all-sum').html('<tr><th colspan="2">Сумма накопленных средств за весь период</th><th>'+allSum+'</th></tr>');
        $('#deposit-table').parent().removeClass('hidden');

        var scrollTo = $('#deposit-table').offset().top;
        $('html, body').animate({
                scrollTop: scrollTo
            }, 500);
    });
})();