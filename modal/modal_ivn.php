<!-- Modal center Large -->
<div class="modal fade" id="invoice-modal"  tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Thanh toán</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="invoice-id">
                <input type="hidden" id="invoice-patient-id">
                <input type="hidden" id="invoice-appt-id">
                <!---->
                <form>
                    <div class="row margin_b10">
                        <div class="col-2">Hóa đơn:</div>
                        <div class="col-4"><strong id="inv-text"></strong></div>
                        <div class="col-6">Số dư cần thanh toán</div>
                    </div>
                    <div class="row margin_b10">
                        <div class="col-6"></div>
                        <div class="col-6" id="inv-balance"></div>
                    </div>

                </form>




                <div class="row margin_b10 margin-top20">
                    <div class="col-3"><button class="btn btn-succ w100">In yêu cầu</button></div>
                    <div class="col-3"><button class="btn btn-succ w100">Lưu</button></div>
                    <div class="col-3"><button class="btn btn-succ w100" data-dismiss="modal">Đóng</button></div>
                </div>
                <!---->
            </div>

        </div>
    </div>
</div>


