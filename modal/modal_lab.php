<!-- Modal center Large -->
<div class="modal fade" id="lab-modal"  tabindex="-1" role="dialog"  aria-hidden="true">
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
                <input type="hidden" id="lab-appt-id">
                <!---->
                <div class="row margin_b10">
                    <div class="col-6"><strong id="lab-appt-text"></strong></div>
                    <div class="col-6 text-right"><strong id="lab-date-time"></strong></div>
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
                    <div class="col-5">
                        <select id="lab-diagnostic-code" class="form-control class-disabled"></select>
                    </div>
                </div>
                <div class="row margin_b10" id="lab-diagnostic-selected">

                </div>
                <div class="row margin_b10">
                    <div class="col-6">
                        <div class="col-12 padding_rl">Nơi chỉ định</div>
                        <div class="col-12 padding_rl">
                            <select class="form-control class-disabled" id="lab-location"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-12 padding_rl">Trạng Thái</div>
                        <div class="col-12 padding_rl">
                            <select class="form-control class-disabled" id="modal-lab-general-status"></select>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-6">
                        <div class="col-12 padding_rl">Tên Xét nghiệm</div>
                        <div class="col-12 padding_rl">
                            <select class="form-control class-disabled" id="lab-name"></select>
                        </div>
                    </div>
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
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-6 padding_rl">
                        <div class="col-12 ">Hướng dẫn Xét nghiệm</div>
                        <div class="col-12">
                            <textarea class="form-control read-only" id="lab-instructions" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-6 padding_rl">
                        <div class="col-12">Kết quả</div>
                        <div class="col-12">
                            <textarea class="form-control read-only" id="lab-result" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-6 padding_rl">
                        <div class="col-12">Hoàn thành bởi</div>
                        <div class="col-12">
                            <select class="form-control class-disabled" id="lab-completed-by"></select>
                        </div>
                    </div>
                    <div class="col-6 padding_rl">
                        <div class="col-12">Ngày hoàn thành</div>
                        <div class="row col-12">
                            <div class="col-7">
                                <input class="form-control read-only" id="modal-lab-date-completed" type="date" name="date" value="2023-07-23">
                            </div>
                            <div class="col-5 padding_l">
                                <input class="form-control read-only" id="modal-lab-time-completed" type="time" name="time" value="03:30">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-6" >
                        <div style="display:none" class="display-sig-area">
                            <label  class="col-12 padding_rl">Signature</label>
                            <img id="display-sig" style="width: 180px; height: 180px;" alt="signature" class="shadow-2 img-thumbnail fs-xl" />
                        </div>
                    </div>
                    <div class="col-6">
                        <label  class="col-12">File đính kèm</label>

                        <div class="col-12 b-gray51" style="min-height: 130px">
                            <div class="row" id="lab-attachement"></div>
                            <div class="row" id="lab-files-area">

                            </div>
                            <div class="col-12 file_upload">
                                <label for="lab-file-select">
                                    <a class="btn btn-primary text-light" role="button" aria-disabled="false">Click here to upload file</a>
                                </label>
                                <input type="file" name="file[]" accept=".pdf,image/*" id="lab-file-select" style="visibility: hidden; position: absolute;" multiple/>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row margin_b10 margin-top20">
                    <div class="col-3"><button class="btn btn-succ w100" id="lab-validation">Xác thực yêu cầu</button></div>
                    <div class="col-3 color-green-2 f-size18" id="validated-succ" style="display: none">Xác Thực</div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3"><button class="btn btn-secondary w100" data-dismiss="modal">Đóng</button></div>
                    <div class="col-3" id="lab-pdf-hide" style="display: none"><button class="btn btn-succ w100" id="lab-pdf">Xuất file pdf</button></div>
                    <div class="col-3" id="lab-print-hide" style="display: none"><button class="btn btn-succ w100" id="lab-print-pdf">In yêu cầu</button></div>
                    <div class="col-3" id="save-lab-div"></div>
                </div>
                <!---->
            </div>

        </div>
    </div>
</div>


