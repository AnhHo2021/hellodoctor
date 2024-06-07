<!-- Modal center Large -->
<div class="modal fade" id="clinical-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">KHÁM LÂM SÀNG VÀ CẬN LÂM SÀN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <!---->
                <input type="hidden" id="vital_id">
                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="form-label color-alert" for="HistoryDescription"><u>1. Tiền sử:</u></label>
                            <textarea class="form-control" id="HistoryDescription" rows="3" ></textarea>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="form-label color-alert" for=""><u>2. Thăm khám lâm sàng</u></label>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label " for="">2.1. Dấu hiệu sinh tồn, chỉ số nhân trắc học</label>
                                </div>
                            </div>
                            <div class="table-responsive-lg">
                                <table class="table table-bordered m-0 t-normal">
                                    <thead>
                                    <tr>
                                        <th>Mạch</th>
                                        <th>Nhiệt độ</th>
                                        <th colspan="2">Huyết áp</th>
                                        <th>Nhịp thở</th>
                                        <th>Cân nặng</th>
                                        <th>Chiều cao</th>
                                        <th>BMI</th>
                                        <th>Vòng bụng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="text" id="Pulse" class="custom-input w49"></td>
                                        <td><input type="number" id="Temperature" class="custom-input w49"></td>
                                        <td><input type="number" id="BloodPressure-Systolic" class="custom-input w49"></td>
                                        <td><input type="number" id="BloodPressure-Diastolic" class="custom-input w49"></td>
                                        <td><input type="number" id="RespiratoryRate" class="custom-input w49"></td>
                                        <td><input type="number" id="Weight" class="custom-input w49"></td>
                                        <td><input type="number" id="Height" class="custom-input w49"></td>
                                        <td><input type="number" id="IBM" class="custom-input w49"></td>
                                        <td><input type="text" id="WaistCircumference" class="custom-input w49"></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 margin_b10">
                        <label class="form-label">2.2. Thị lực:</label>
                        <div class="row margin_b10">
                            <div class="col-2 form-label"><u>Không kính:</u></div>
                            <div class="col-1 padding_rl">Mắt phải</div>
                            <div class="col-3 "><input type="text" id="Righteye-Notglasses" class="custom-input"></div>
                            <div class="col-1 padding_rl">Mắt trái:</div>
                            <div class="col-3 "><input type="text" id="Lefteye-Notglasses" class="custom-input"></div>
                        </div>
                        <div class="row">
                            <div class="col-2 form-label"><u>Có kính:</u></div>
                            <div class="col-1 padding_rl">Mắt phải</div>
                            <div class="col-3 "><input type="text" id="Righteye-Glasses" class="custom-input"></div>
                            <div class="col-1 padding_rl">Mắt trái:</div>
                            <div class="col-3 "><input type="text" id="Lefteye-Glasses" class="custom-input"></div>
                        </div>
                    </div>

                </div>
                <div class="row margin_b10">
                    <div class="col-12 form-label margin_b10">2.3. Thăm khám lâm sàng</div>
                    <div class="col-12 form-label margin_b10">2.3.1. Toàn thân</div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Da, niêm mạc:</div>
                        <div class="col-10"><input type="text" id="Fullbody-SkinMucosa" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Khác:</div>
                        <div class="col-10"><input type="text" id="Fullbody-Others" class="custom-input w100"></div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 form-label margin_b10">2.3.2. Nội tạng</div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Tim mạch:</div>
                        <div class="col-10"><input type="text" id="Organs-Cardiology" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Hô hấp:</div>
                        <div class="col-10"><input type="text" id="Organs-Respiratorysystem" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Tiêu hóa:</div>
                        <div class="col-10"><input type="text" id="Organs-Digestivesystem" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Tiết niệu:</div>
                        <div class="col-10"><input type="text" id="Organs-Urinarytract" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Cơ xương khớp:</div>
                        <div class="col-10"><input type="text" id="Organs-Musculoskeletalsystem" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Nội tiết:</div>
                        <div class="col-10"><input type="text" id="Organs-Endocrinesystem" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Thần kinh:</div>
                        <div class="col-10"><input type="text" id="Organs-Nervoussystem" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Tâm thần:</div>
                        <div class="col-10"><input type="text" id="Organs-Mental" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Ngoại khoa:</div>
                        <div class="col-10"><input type="text" id="Organs-Surgicalsystem" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Sản phụ khoa:</div>
                        <div class="col-10"><input type="text" id="Organs-ObstetriciansandGynecologists" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Tai mũi họng:</div>
                        <div class="col-10"><input type="text" id="Organs-Earsnosethroat" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Mắt:</div>
                        <div class="col-10"><input type="text" id="Organs-Eyes" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Da liễu:</div>
                        <div class="col-10"><input type="text" id="Organs-Dermatology" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Dinh dưỡng:</div>
                        <div class="col-10"><input type="text" id="Organs-Nutrition" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Vận động:</div>
                        <div class="col-10"><input type="text" id="Organs-Physicalsystem" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-2">- Khác:</div>
                        <div class="col-10"><input type="text" id="Organs-Others" class="custom-input w100"></div>
                    </div>
                    <div class="row col-12 margin_b10">
                        <div class="col-6">- Đánh giá phát triển thể chất, tinh thần, vận động:</div>
                        <div class="col-6"><input type="text" id="Organs-Evaluationofphysical" class="custom-input w100"></div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="form-label color-alert" for="HistoryDescription"><u>3. Kết quả cận lâm sàng</u></label>
                            <div class="row">
                                <div class="table-responsive-lg col-12">
                                    <table class="table table-bordered m-0 t-normal">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Xét nghiệm</th>
                                            <th style="width:550px">Kết quả</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Huyết học</td>
                                            <td><input type="text" id="HematolofyResult" class="custom-input w100"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Sinh hóa máu</td>
                                            <td><input type="text" id="SerumBiochemistryResult" class="custom-input w100"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Sinh hóa nước tiểu</td>
                                            <td><input type="text" id="UrineBiochemistryResult" class="custom-input w100"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Siêu âm vùng bụng</td>
                                            <td><input type="text" id="AbdominalUltrasoundResult" class="custom-input w100"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="form-label color-alert" for="HistoryDescription"><u>4. Chẩn đoán/ Kết luận:</u></label>
                            <div class="row">
                                <div class="col-6">
                                    <select id="diagnostic-code" class="form-control"></select>
                                </div>
                                <!--<div class="col-6">
                                    <select id="diagnostic-name" class="form-control"></select>
                                </div>-->
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row margin_b10" id="clinical-diagnostic-selected">

                </div>
                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="form-label color-alert" for="HistoryDescription"><u>5. Tư vấn:</u></label>
                            <textarea class="form-control" id="Notes" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2"><button class="btn btn-succ w100" data-dismiss="modal">Đóng</button></div>
                    <div class="col-2"><button class="btn btn-succ w100"  id="clinical-pdf">Xuất file</button></div>
                    <div class="col-2"><button class="btn btn-succ w100"  id="clinical-print">Print</button></div>
                    <div class="col-2"><button class="btn btn-succ w100" id="modal-clinical-save">Lưu</button></div>
                </div>
                            <!---->
            </div>

        </div>
    </div>
</div>


