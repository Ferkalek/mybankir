<?php
$title = "Кредитный калькулятор";
require_once 'templates/header.php';
?>
    <header class="main-header">
        <nav class="navbar navbar-static-top" role="navigation">
            <ul class="calc">
                <li><i class="fa fa-calculator" aria-hidden="true"></i></li>
                <li><a  href="deposit-calc.php">Депозитный</a></li>
                <li><span>Кредитный</span></li>
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
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Кредитный калькулятор</h3>
                    </div>
                    <form role="form" autocomplete="off">
                        <div class="box-body">

                            <div class="row form-group">
                                <label for="need-sum" class="col-sm-4 control-label text-right">Сумма кредита</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="need-sum">
                                    <p class="text-help text-danger"></p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="period" class="col-sm-4 control-label text-right">Срок кредита</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="period">
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
                                <label class="col-sm-4 control-label text-right">Комиссия (в мес.)</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="komiss">
                                    <p class="text-help text-danger"></p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4 control-label text-right">Страховка (в мес.)</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inshur">
                                    <p class="text-help text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <span id="calc-credit" class="btn btn-danger pull-right">Расчитать</span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="box box-danger hidden">
                    <table id="table-result" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Месяц</th>
                            <th>Сумма задолженности</th>
                            <th>Тело кредита</th>
                            <th>Сумма комиссии</th>
                            <th>Сумма страховки</th>
                            <th>Сумма % по кредиту</th>
                            <th>Ежемесячный платеж</th>
                        </tr>
                        </thead>
                        <tbody id="result"></tbody>
                        <tfoot id="tfoot"></tfoot>
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
                 data-title="Кредитный калькулятор - My Bankir"
                 data-description="Простой и удобный сервис для расчета платежей по кредиту"
                 data-url="http://mybankir.esy.es/credit-calc.php">
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/credit-calc.js"></script>
</body>
</html>