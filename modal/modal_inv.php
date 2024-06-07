<!-- Modal center Large -->
<div class="modal fade" id="invoice-modal"  tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-ligh-blue">
                <h5 class="modal-title"><strong>Thanh toán</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="modal-invoice-id">
                <input type="hidden" id="modal-invoice-patient-id">
                <input type="hidden" id="modal-invoice-appt-id">
                <!---->
                <form>
                    <div class="row margin_b10">
                        <div class="col-2">Hóa đơn:</div>
                        <div class="col-4"><strong id="modal-inv-text"></strong></div>
                        <div class="col-6">Số dư cần thanh toán</div>
                    </div>
                    <div class="row margin_b10">
                        <div class="col-6"></div>
                        <div class="col-6" ><strong class="color-alert" id="modal-balance-text"></strong></div>
                    </div>
                    <div class="row margin_b10">
                        <div class="col-12">Số tiền</div>
                        <div class="col-6 m-t5"><input type="text" class="form-control"  id="modal-inv-balance"></div>
                        <?php
                            if($_SESSION['user_type_option_user_type']=='Admin'){
                         ?>
                                <div class="col-6 m-t5">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="inv-refund">
                                        <label class="custom-control-label" for="inv-refund">Hoàn tiền</label>
                                    </div>
                                </div>
                        <?php   }
                        ?>

                    </div>

                    <div class="row margin_b10">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">Hình thức Thanh toán</div>
                                <div class="col-12">
                                    <select class="form-control" id="inv-payment-type">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6" id="type-pay-append"></div>
                    </div>

                    <div class="row margin_b10" id="packetcode-info">

                    </div>

                    <div class="row margin_b10" id="transfer-info" style="display: none">
                        <div class="col-12">Thông tin chuyển khoản</div>
                        <div class="col-12 m-t5" id="transfer-information">

                        </div>
                    </div>

                    <div class="row margin_b10">
                        <div class="col-12">Ghi chú</div>
                        <div class="col-12 m-t5">
                            <textarea class="form-control" rows="3" id="modal-inv-notes">

                            </textarea>
                        </div>
                    </div>

                </form>

                <div class="row margin_b10 margin-top20">
                    <div class="col-4"><button class="btn btn-succ w100" id="save-payment">Hoàn thành</button></div>

                    <div class="col-4"><button class="btn btn-succ w100" data-dismiss="modal">Đóng</button></div>
                </div>
                <!---->
            </div>

        </div>
    </div>
</div>


