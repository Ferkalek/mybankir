<div class="modal modal-history">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="scroll-wrap">
                <table class="table table-hover deposits" data-table="deposits">
                    <tr>
                        <th>ПП</th>
                        <th>Дата пополнения</th>
                        <th>Сумма пополнения</th>
                        <th></th>
                    </tr>
                </table>
            </div>
            <form class="form-horizontal" id="history-form" action="" method="post" autocomplete="off">
                <div class="hidden" id="start-hide">
                    <div class="row form-group">
                        <label for="sum" class="col-xs-4 control-label">Сумма платежа</label>
                        <div class="col-xs-4">
                            <input type="text" name="sum_fp" class="required form-control" id="sum">
                            <p class="text-help text-danger"></p>
                        </div>
                    </div>
                    <div class="row form-group has-disabled-elem">
                        <label class="col-xs-4 control-label">Дата платежа</label>
                        <div class="col-xs-4">
                            <input type="text" name="data_fp" class="required form-control" id="reg_date" maxlength="10" placeholder="гггг-мм-дд">
                            <p class="text-help text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="text" name="user" id="user" hidden>
                    <input type="text" name="table" id="data-table" hidden>
                    <input type="text" name="id_fp" id="id_fp" hidden>
                    <input type="text" name="id_hi" id="id_hi" hidden>
                    <input type="text" name="old_sum_hi" id="old_sum_hi" hidden>
                    <button type="button" id="cancel" class="btn btn-default pull-left" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-primary btn-show-inp">Добавить платеж</button>
                    <button type="button" class="btn btn-primary add-history hidden">Добавить</button>
                    <button type="button" class="btn btn-primary save-history hidden">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>