<!-- Modal center Large -->
<div class="modal fade" id="prescription-modal"  tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>THÔNG TIN TOA THUỐC</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="prescription-id">
                <input type="hidden" id="prescription-patient-id">
                <input type="hidden" id="prescription-doctor-id">
                <input type="hidden" id="prescription-appt-id">
                <!---->
                <div class="row margin_b10">
                    <div class="col-6"><strong id="prescription-appt-text"></strong></div>
                    <div class="col-6 text-right"><strong id="prescription-date-time"></strong></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2">Tên Bệnh nhân:</div>
                    <div class="col-10" id="prescription-patient-name"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2">Địa chỉ:</div>
                    <div class="col-10" id="prescription-patient-address"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2">Bác sĩ chỉ định:</div>
                    <div class="col-10" id="prescription-doctor-assigned-name"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2">Chẩn đoán:</div>
                    <div class="col-5">
                        <select id="prescription-diagnostic-code" class="form-control class-disabled"></select>
                    </div>
                </div>
                <div class="row margin_b10" id="prescription-diagnostic-selected">

                </div>
                <div class="row margin_b10">
                    <div class="col-6">
                        <div class="col-12 padding_rl">Nơi chỉ định</div>
                        <div class="col-12 padding_rl">
                            <select class="form-control class-disabled" id="prescription-location"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-12 padding_rl">Loại</div>
                        <div class="col-12 padding_rl">
                            <select class="form-control class-disabled" id="modal-prescription-order-request-type"></select>
                        </div>
                    </div>
                </div>
                <!--
                <div class="row margin_b10">
                    <div class="col-12 padding_rl">
                        <div class="col-12 ">Hướng dẫn </div>
                        <div class="col-12">
                            <textarea class="form-control read-only" id="prescription-instructions" rows="5"></textarea>
                        </div>
                    </div>

                </div> -->

                <div class="row margin_b10">
                    <div class="col-12 padding_rl">
                        <div class="col-12 "><strong>Thuốc điều trị</strong></div>
                        <div class="col-12 m_b10" id="prescription-medication-list">
                            <!---->

                            <!---->
                        </div>
                    </div>
                    <!--
                    <div class="col-3 margin-top20">
                        <button class="btn btn-danger w100 class-disabled" id="add-prescription-line">Thêm thuốc</button>
                    </div>
                    -->

                </div>

                <div class="row margin_b10">
                    <div class="col-6">
                        <div class="col-12 padding_rl">Trạng Thái</div>
                        <div class="col-12 padding_rl">
                            <select class="form-control class-disabled" id="modal-prescription-general-status"></select>
                        </div>
                    </div>
                    <div class="col-6 padding_rl">
                        <div class="col-12 ">Ghi chú </div>
                        <div class="col-12">
                            <textarea class="form-control read-only" id="prescription-Notes" rows="5"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row margin_b10">
                    <div class="col-6 padding_rl">
                        <div class="col-12">Hoàn thành bởi</div>
                        <div class="col-12">
                            <select class="form-control class-disabled" id="prescription-completed-by"></select>
                        </div>
                    </div>
                    <div class="col-6 padding_rl">
                        <div class="col-12">Ngày hoàn thành</div>
                        <div class="row col-12">
                            <div class="col-7">
                                <input class="form-control read-only" id="modal-prescription-date-completed" type="date" name="date" value="2023-07-23">
                            </div>
                            <div class="col-5 padding_l">
                                <input class="form-control class-disabled" id="modal-prescription-time-completed" type="time" name="time" value="03:30">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-6 padding_rl">
                        <div class="col-12">Người giao thuốc</div>
                        <div class="col-12">
                            <select class="form-control class-disabled" id="prescription-delivered-by"></select>
                        </div>
                    </div>
                    <div class="col-6 padding_rl">
                        <div class="col-12">Ngày giao</div>
                        <div class="row col-12">
                            <div class="col-7">
                                <input class="form-control read-only" id="modal-prescription-delivered-date" type="date" name="date" value="2023-07-23">
                            </div>
                            <div class="col-5 padding_l">
                                <input class="form-control read-only" id="modal-prescription-delivered-time" type="time" name="time" value="03:30">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row margin_b10 margin-top20">
                    <div class="col-3 display-sig-area" style="display:none">
                        <label  class="col-12 padding_rl">Signature</label>
                        <img id="display-sig" style="width: 180px; height: 180px;" alt="signature" class="shadow-2 img-thumbnail fs-xl " />
                    </div>
                    <div class="col-3"><button class="btn btn-succ w100" id="prescription-validation">Xác thực yêu cầu</button></div>
                    <div class="col-3 color-green-2 f-size18" id="prescription-validated-succ" style="display: none">Xác Thực</div>
                </div>

                <div class="row margin_b10 margin-top20">
                    <div class="col-3"><button class="btn btn-secondary w100" data-dismiss="modal">Đóng</button></div>
                    <div class="col-3" id="pres-pdf-hide" style="display: none"><button class="btn btn-succ w100" id="pres_pdf">Xuất file pdf</button></div>
                    <div class="col-3" id="pres-print-hide" style="display: none"><button class="btn btn-succ w100" id="pres_print_pdf">In yêu cầu</button></div>
                    <div class="col-3" id="div-save-prescription"></div>
                </div>
                <!---->
            </div>

        </div>
    </div>
</div>



