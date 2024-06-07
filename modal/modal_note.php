<!-- Modal center Large -->
<div class="modal fade" id="note-modal"  tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-ligh-blue">
                <h5 class="modal-title"><strong>Note</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="notes-id">
                <!---->
                <div class="row margin_b10">
                    <div class="col-3 padding_r" id="note_date"></div>
                    <div class="col-9">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="only_doctor">
                            <label class="custom-control-label" for="only_doctor">Chỉ Bác sĩ</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="only_administrative">
                            <label class="custom-control-label" for="only_administrative">Chỉ văn phòng</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="only_print">
                            <label class="custom-control-label" for="only_print">Bản in</label>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-6">
                        <select class="form-control" id="note_type"></select>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id='note_created_name' value="<?= $_SESSION['family_name_text']." ".$_SESSION['middle_name_text'] ." ".$_SESSION['first_name_text']; ?>" disabled="true">
                        <input type="hidden" value="<?=$_SESSION['_id']?> " id='note_created_by'>
                    </div>
                </div>

                <div class="row margin_b10">
                    <div class="col-12">
                        <input type="text" class="form-control" id="note_description" >
                    </div>
                </div>

                <div class="row margin_b10">
                    <div class="col-12">
                       <textarea class="form-control" id="note_note" rows="4"></textarea>
                    </div>
                </div>

                <div class="row margin_b10 margin-top20">
                    <div class="col-3"><button class="btn btn-secondary w100" data-dismiss="modal">Đóng</button></div>
                    <div class="col-3 padding_rl"><button class="btn btn-succ" id ="note-pdf">Xuất file PDF</button></div>
                    <div class="col-3"><button class="btn btn-succ w100" id ="note-print">In</button></div>
                    <div class="col-3" id="save-notes-btn"><button class="btn btn-danger w100" id="save-notes">Lưu</button></div>
                    <div class="col-3" id="update-notes-btn"><button class="btn btn-danger w100" id="update-notes">Lưu</button></div>
                </div>
                <!---->
            </div>

        </div>
    </div>
</div>


