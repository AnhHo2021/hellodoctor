<!-- Modal center Large -->
<div class="modal fade" id="vitalsign-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sinh hiệu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="vitals-id" value="">
                <!---->
                <div class="row margin_b15">
                    <div class="col-3">
                        <div class="row">
                            <label class=" col-12 padding_rl" for="BloodPressure">Huyết áp</label>
                            <div class="col-6 padding_l">
                                <input type="text" class="form-control" id="BloodPressureDiastolic">
                            </div>
                            <div class="col-6 padding_l">
                                <input type="text" class="form-control" id="BloodPressureSystolic">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <label class=" col-12 padding_rl" for="HeartRate">Nhịp tim (BPM)</label>
                            <div class="col-12 padding_l">
                                <input type="text" class="form-control" id="HeartRate">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <label class=" col-12 padding_rl" for="BreathingRate">Nhịp thở</label>
                            <div class="col-12 padding_l">
                                <input type="text" class="form-control" id="RespiratoryRate">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <label class=" col-12 padding_rl" for="O2Staturation">Độ bão hòa oxi</label>
                            <div class="col-12 padding_l">
                                <input type="text" class="form-control" id="O2Staturation">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row margin_b15">
                    <div class="col-3">
                        <div class="row">
                            <label class=" col-12 padding_rl" for="Temperature">Nhiệt độ</label>
                            <div class="col-12 padding_l">
                                <input type="text" class="form-control" id='Temperature'>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <label class=" col-12 padding_rl" for="Weight">Cân nặng</label>
                            <div class="col-12 padding_l">
                                <input type="text" class="form-control" id='Weight'>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <label class=" col-12 padding_rl" for="Height">Chiều cao</label>
                            <div class="col-12 padding_l">
                                <input type="text" class="form-control" id='Height'>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <label class=" col-12 padding_rl" for="Glucose">Đường huyết</label>
                            <div class="col-12 padding_l">
                                <input type="text" class="form-control" id='Glucose'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row margin_b15">
                    <div class="col-3">
                        <div class="row">
                            <label class=" col-12 padding_rl" for="PainLevel">Mức độ đau đớn</label>
                            <div class="col-12 padding_l margin_b15">
                                <input type="text" class="form-control" id="PainLevel">
                            </div>
                            <div class="col-12 padding_l">
                                <button class="btn bg-success waves-effect waves-themed width100 color-white margin-right15" id="vital-save">Lưu</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <label class=" col-12 padding_rl" for="BMI">BMI (Chỉ số khối cơ thể)</label>
                            <div class="col-12 padding_l">
                                <input type="text" class="form-control" id='BMI'>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label class=" col-12 padding_rl" for="Notes">Ghi chú</label>
                            <div class="col-12 padding_l">
                                <textarea class="form-control" rows="3" id="Notes"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->
            </div>

        </div>
    </div>
</div>


