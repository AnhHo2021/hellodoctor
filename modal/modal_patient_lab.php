<!-- Modal center Large -->
<div class="modal fade" id="lab-patient-modal"  tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>YÊU CẦU XÉT NGHIỆM</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="lab-id">
                <input type="hidden" id="lab-patient-id">
                <input type="hidden" id="lab-doctor-id">
                <input type="hidden" id="lab-local">
                <input type="hidden" id="lab-appt-id">
                <input type="hidden" id="lab-diagnostic">
                <!---->
                <div class="row margin_b10">
                    <div class="col-6"><strong id="lab-appt-text"></strong></div>
                    <div class="col-6 text-right f-size18"><strong id="lab-date-time" ></strong></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2">Tên Bệnh nhân:</div>
                    <div class="col-10" id="lab-display-patient-name"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2">Địa chỉ:</div>
                    <div class="col-10" id="lab-patient-address"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2">Bác sĩ chỉ định:</div>
                    <div class="col-10" id="lab-doctor-assigned-name"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2">Chẩn đoán:</div>
                    <div class="col-10" id="lab-diagnostic-selected"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12">Danh sách chỉ định</div>
                    <div class="table-responsive-lg col-12">
                        <table class="table table-bordered m-0 t-normal" id="tbl-product-assigned-list">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Danh sách xét nghiệm</th>
                                <th>Đơn giá</th>
                                <th>SKU</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <div class="row margin_b10">
                    <div class="col-6">
                        <div class="col-12 padding_rl">Nơi chỉ định</div>
                        <div class="col-12 padding_rl">
                            <select class="form-control" id="lab-location" disabled="true"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-12 padding_rl">Trạng Thái</div>
                        <div class="col-12 padding_rl">
                            <select class="form-control" id="modal-lab-general-status" disabled="true"></select>
                        </div>
                    </div>
                </div>

                <div class="row margin_b10">
                    <div class="col-6 padding_rl">
                        <div class="col-12 ">Hướng dẫn Xét nghiệm</div>
                        <div class="col-12">
                            <textarea class="form-control" id="lab-instructions" rows="5" disabled="true"></textarea>
                        </div>
                    </div>
                    <div class="col-6 padding_rl">
                        <div class="col-12">Kết quả</div>
                        <div class="col-12">
                            <textarea class="form-control" id="lab-result" rows="5" readonly="true"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-6 padding_rl">
                        <div class="col-12">Hoàn thành bởi</div>
                        <div class="col-12">
                            <select class="form-control" id="lab-completed-by" disabled="true"></select>
                        </div>
                    </div>
                    <div class="col-6 padding_rl">
                        <div class="col-12">Ngày hoàn thành</div>
                        <div class="row col-12">
                            <div class="col-7">
                                <input class="form-control" id="modal-lab-date-completed" type="date" name="date" value="" readonly="true">
                            </div>
                            <div class="col-5 padding_l">
                                <input class="form-control" id="modal-lab-time-completed" type="time" name="time" value="" readonly="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-6">
                        <div class="col-12">File đính kèm</div>
                        <div class="col-12 b-gray51" style="min-height: 100px"></div>
                    </div>
                </div>
                <div class="row margin_b10 margin-top20">
                    <div class="col-3"><button class="btn btn-succ w100">In yêu cầu</button></div>

                    <div class="col-3"><button class="btn btn-succ w100" data-dismiss="modal">Đóng</button></div>
                </div>
                <!---->
            </div>

        </div>
    </div>
</div>


