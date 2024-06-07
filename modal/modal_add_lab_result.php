<!-- Modal center Large -->
<div class="modal fade" id="add-lab-result-modal"  tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-ligh-blue">
                <h5 class="modal-title"><strong>Kết quả xét nghiệm</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="m-lab-id">
                <!---->
                <div class="row col-12 margin_b10">

                        <div class="col-5 padding_r">Ngày tạo</div>
                        <div class="col-7 padding_r"><strong id="m-lab-date-time"></strong></div>

                </div>
                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="col-12">Hoàn thành bởi</div>
                        <div class="col-12">
                            <select class="form-control" id="m-lab-completed-by" autocapitalize="off" autocomplete="off" autocorrect="off" autofocus="" role="combobox" spellcheck="false"></select>
                        </div>
                    </div>
                </div>

                <div class="row margin_b10">
                    <div class="col-12">
                        <div class="col-12">Ngày hoàn thành</div>
                        <div class="row col-12 padding_r">
                            <div class="col-7">
                                <input class="form-control padding_r" id="m-modal-lab-date-completed" type="date" name="date" value="2023-07-23">
                            </div>
                            <div class="col-5 padding_rl">
                                <input class="form-control padding_r" id="m-modal-lab-time-completed" type="time" name="time" value="03:30">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="col-12">Kết quả</div>
                        <div class="col-12">
                            <textarea class="form-control" id="m-lab-result" rows="5"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row margin_b10">
                    <div class="col-12">
                        <div class="col-12">Trạng Thái</div>
                        <div class="col-12">
                            <select class="form-control" id="m-modal-lab-general-status"></select>
                        </div>
                    </div>
                </div>
                <!---->
                <div class="row col-12">
                    <div class="col-4"><button class="btn btn-succ " data-dismiss="modal">Đóng</button></div>
                    <div class="col-4"><button class="btn btn-succ btn-modal-add-lab-result">Lưu</button></div>
                </div>

            </div>

        </div>
    </div>
</div>


