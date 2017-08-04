<?php
$title = "Депозитный калькулятор";
require_once 'templates/header.php';
?>
    <header class="main-header">
        <nav class="navbar navbar-static-top" role="navigation">
            <ul class="calc">
                <li><i class="fa fa-calculator" aria-hidden="true"></i></li>
                <li><span>Депозитный</span></li>
                <li><a href="credit-calc.php">Кредитный</a></li>
            </ul>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li><a href="/">Мой кабинет</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container calc-page">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Депозитный калькулятор</h3>
                    </div>
                    <form role="form" autocomplete="off">
                        <div class="box-body">
                            <div class="row form-group">
                                <label for="sum-dep" class="col-sm-4 control-label text-right">Сумма вклада</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="sum-dep">
                                    <p class="text-help text-danger"></p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="porcent" class="col-sm-4 control-label text-right">Годовой %</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="porcent">
                                    <p class="text-help text-danger"></p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="period" class="col-sm-4 control-label text-right">Срок депозита</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="period">
                                    <p class="text-help text-danger"></p>
                                </div>
                            </div>
                            <div class="row form-group end-proc has-disabled-elem">
                                <p class="col-sm-12 control-label">Способ начисления процентов:</p>
                                <div class="col-sm-offset-4 col-sm-8">
                                    <div class="checkbox">
                                        <label data-typedep="Проценты начисляються на сумму депозита и их можно снимать ежемесячно или по завершению депозита.">
                                            <input type="radio" name="option" value="norekap" checked>
                                            Без капитализации
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label data-typedep="Проценты за текущий период прибавляются к сумме депозита и за следующий месяц проценты насчитыватся на увеличенную сумму.">
                                            <input type="radio" name="option" value="rekap">
                                            С капитализацией
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label class="not-help">
                                            <input type="radio" name="option" value="enabled">
                                            С капитализацией и ежемесячным пополнением
                                        </label>
                                        <label  class="not-help">
                                            <input type="text" class="disabled-elem" id="add-more-val" disabled>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group has-disabled-elem" id="tax-bl">
                                <p class="col-sm-12 control-label">Учитывать налог на начисленные проценты?</p>
                                <div class="col-sm-offset-4 col-sm-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="tax-option" value="default" checked>
                                            Учитывать (19,5%)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="tax-option" value="no">
                                            Не учитывать
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="tax-option" id="tax-custom" value="enabled">
                                            Указать свое значение налога
                                        </label>
                                        <label for="">
                                            <input type="text" class="disabled-elem" id="tax-custom-val" disabled>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" id="calc" class="btn btn-success pull-right">Расчитать</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-offset-3 col-sm-6">
                <div class="box box-success hidden">
                    <table id="deposit-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Месяц</th>
                            <th>Сумма вклада</th>
                            <th>Начисленные %</th>
                        </tr>
                        </thead>
                        <tbody id="result"></tbody>
                        <tfoot id="all-sum"></tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="shar-wrap">
            <script type="text/javascript">
                (function() {
                    if (window.pluso)if (typeof window.pluso.start == "function") return;
                    if (window.ifpluso==undefined) { window.ifpluso = 1;
                        var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                        s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                        s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                        var h=d[g]('body')[0];
                        h.appendChild(s);
                    }})();
            </script>
            <div class="pluso" data-background="#ebebeb"
                 data-options="medium,square,line,vertical,nocounter,theme=04"
                 data-services="vkontakte,odnoklassniki,facebook,twitter,google,linkedin,moimir,email"
                 data-title="Депозитный калькулятор - My Bankir"
                 data-description="Простой и удобный сервис прогнозирование ваших доходов по депозитам"
                 data-url="http://mybankir.esy.es/deposit-calc.php">
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/deposit-calc.js"></script>
</body>
</html>