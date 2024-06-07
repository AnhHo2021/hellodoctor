<form id=history-f>
    <input type="hidden" id="history-id">
    <div class="row ">
        <div class="col-6">
            <h3 class="margin-top10"><strong>Bệnh sử</strong></h3>
        </div>
        <div class="col-6 text-right">
            <button style="font-size: 16px;" type="button" id="btn-history" class="btn btn-succ">Tiểu sử chi tiết</button>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="Smoker1">
                <label class="custom-control-label" for="Smoker1">Bạn có hút thuốc không?</label>
            </div>
            <div class="pt-3">
                <textarea class="form-control" id="SmokerNotes" rows="5" cols="1" placeholder="Vui lòng mô tả thói quen hút thuốc"></textarea>
            </div>

        </div>
        <div class="col-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="Surgeries1">
                <label class="custom-control-label" for="Surgeries1">Bạn đã từng Phẫu thuật?</label>
            </div>
            <div class="pt-3 ">
                <textarea class="form-control" id="SurgeryNotes" rows="5" cols="1" placeholder="Vui lòng mô tả phẫu thuật trước đây"></textarea>
            </div>

        </div>
        <div class="col-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="StomachProblems1">
                <label class="custom-control-label" for="StomachProblems1">Bạn có vấn đề về dạ dày?</label>
            </div>
            <div class="pt-3">
                <textarea class="form-control" id="StomachProblemNotes" rows="5" cols="1" placeholder="Vui lòng mô tả vấn đề dạ dày"></textarea>
            </div>

        </div>
    </div>
    <div class="row pt-3">
        <div class="col-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="HeartDisease1">
                <label class="custom-control-label" for="HeartDisease1">Bạn có vấn đề về Tim?</label>
            </div>
            <div class="pt-3">
                <textarea class="form-control" id="HeartDiseaseNotes" rows="5" cols="1" placeholder="Vui lòng mô tả vấn đề tim"></textarea>
            </div>
        </div>
        <div class="col-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="Diabetes1">
                <label class="custom-control-label" for="Diabetes1">Bạn có Bệnh tiểu đường?</label>
            </div>
            <div class="pt-3">
                <textarea class="form-control" id="DiabetesNotes" rows="5" cols="1" placeholder="Vui lòng mô tả bệnh tiểu đường"></textarea>
            </div>
        </div>
        <div class="col-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="ConsumeAlcohol1">
                <label class="custom-control-label" for="ConsumeAlcohol1">Bạn có uống Rượu?</label>
            </div>
            <div class="pt-3">
                <textarea class="form-control" id="AlcoholConsumptionNotes" rows="5" cols="1" placeholder="Vui lòng mô tả thói quen uống rượu bia"></textarea>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="EyeProblems1">
                <label class="custom-control-label" for="EyeProblems1">Bạn có vấn đề về Mắt?</label>
            </div>
            <div class="pt-3">
                <textarea class="form-control" id="EyeProblemNotes" rows="5" cols="1" placeholder="Vui lòng mô tả vấn đề mắt"></textarea>
            </div>
        </div>
        <div class="col-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="LiverorKidneyProblems1">
                <label class="custom-control-label" for="LiverorKidneyProblems1">Bạn có vấn đề về Thận?</label>
            </div>
            <div class="pt-3">
                <textarea class="form-control" id="LiverorKidneyProblemNotes" rows="5" cols="1" placeholder="Vui lòng mô tả vấn đề thận"></textarea>
            </div>
        </div>
        <div class="col-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="LungDisease1">
                <label class="custom-control-label" for="LungDisease1">Bạn có vấn đề về Phổi?</label>
            </div>
            <div class="pt-3">
                <textarea class="form-control" id="LungDiseaseNotes" rows="5" cols="1" placeholder="Vui lòng mô tả vấn đề phổi"></textarea>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-4">
            Những vấn đề khác hoặc lưu ý
            <div class="pt-3">
                <textarea class="form-control" id="OtherNotes" rows="5" placeholder="Bạn có lưu ý nào khác không?"></textarea>
            </div>
        </div>
    </div>

    <div class="row m-t20">
        <div class="col-2">
            <button type="button" class="btn btn-succ padding-1rem form-control" id="btn-history-save">Lưu</button>
        </div>
    </div>

</form>



