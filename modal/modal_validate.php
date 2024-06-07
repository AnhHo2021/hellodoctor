<!-- lab validate -->
<div class="modal fade" id="modal-lab-validate" z-index="1000" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-ligh-blue">
                <h5 class="modal-title">Vui lòng nhập mã PIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div style="display: none">
                    <input class="form-control" id="lab-pin-code-after-validate" type="password">
                </div>
                <div class="col-12">
                    <input class="form-control" id="lab-modal-signature_image" type="hidden">
                    <input class="form-control" id="lab-modal-signature_url_text" type="hidden">
                    <input class="form-control" id="lab-pin-code" type="password">

                    <input class="form-control" id="modal_type_login" type="hidden">
                </div>
                <div class="col-12 color-alert" id="pin-code-incorrect" style="display: none">Mã PIN cũ của bạn không chính xác</div>
                <div class="row margin_b10 margin-top20">
                    <div class="col-3"></div>
                    <div class="col-6"><button class="btn btn-succ w100" id="btn-lab-validation">Ok</button></div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Prescription validate -->
<div class="modal fade" id="modal-pres-validate" z-index="1000" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-ligh-blue">
                <h5 class="modal-title">Vui lòng nhập mã PIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div style="display: none">
                    <input class="form-control" id="pres-modal-pin-code-after-validate" type="password">
                </div>
                <div class="col-12">
                    <input class="form-control" id="pres-modal-signature_image" type="hidden">
                    <input class="form-control" id="pres-modal-signature_url_text" type="hidden">

                    <input class="form-control" id="pres-pin-code" type="password">
                    <input class="form-control" id="pres-modal_type_login" type="hidden">
                </div>
                <div class="col-12 color-alert" id="pres-pin-code-incorrect" style="display: none">Mã PIN cũ của bạn không chính xác</div>
                <div class="row margin_b10 margin-top20">
                    <div class="col-3"></div>
                    <div class="col-6"><button class="btn btn-succ w100" id="btn-pres-validation">Ok</button></div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>




