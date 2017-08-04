<div class="modal add-records">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Modal Default</h4>
            </div>
            <form class="form-horizontal" id="modal-form" action="" method="post" autocomplete="off">
                <input type="text" name="user" id="user" hidden>
                <input type="text" name="table" id="data-table" hidden>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_bank" class="col-xs-4 control-label">Название банка</label>
                        <div class="col-xs-8">
                            <input type="text" name="name_bank" class="required form-control" id="name_bank">
                            <p class="text-help text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sum" class="col-xs-4 control-label">Сумма</label>
                        <div class="col-xs-8 has-tultip" data-tultip='Укажите сумму буз учета валюты'>
                            <input type="text" name="sum" class="required form-control" id="sum">
                            <p class="text-help text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="period" class="col-xs-4 control-label">Срок</label>
                        <div class="col-xs-8 has-tultip" data-tultip='Укажите срок в месяцах'>
                            <input type="text" name="period" class="required form-control" id="period">
                            <p class="text-help text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="percent" class="col-xs-4 control-label">Годовой %</label>
                        <div class="col-xs-8 has-tultip" data-tultip='Укажите целое или дробное число (пример 17.5)'>
                            <input type="text" name="percent" class="required form-control" id="percent">
                            <p class="text-help text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg_date" class="col-xs-4 control-label">Дата оформления</label>
                        <div class="col-xs-8 has-tultip" data-tultip='Укажите дату в формате гггг-мм-дд'>
                            <input type="text" name="reg_date" class="required form-control" id="reg_date" maxlength="10" placeholder="гггг-мм-дд">
                            <p class="text-help text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cancel" class="btn btn-default pull-left" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>