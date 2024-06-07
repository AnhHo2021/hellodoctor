
<div class="modal fade" id="signup-modal"  tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-ligh-blue">
                <h5 class="modal-title"><strong class="fa fa-warning">Tạo tài khoản</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
              <form id="form-patient">
                <!---->
                <div class="row margin_b10">
                    <div class="col-12">
                        <input type="text" id="first_name" name="first_name"  class="form-control" placeholder="Tên">
                    </div>
                    <div class="col-12 color-alert" style="display: none" id="first_name-error">Tên là bắt buộc</div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12">
                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Họ">
                    </div>
                    <div class="col-12 color-alert" style="display: none" id="last_name-error">Họ là bắt buộc</div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12">
                        <input class="form-control" id="birthday" type="date" name="date" placeholder="Ngày sinh">
                    </div>
                    <div class="col-12 color-alert" style="display: none" id="birthday-error">Ngày sinh là bắt buộc</div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12">
                        <input type="text" id="identification" name="identification" class="form-control" placeholder="Chứng minh thư">
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-12 color-alert" id="email-error" style="display: none">Email là bắt buộc</div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12">
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Điện thoại">
                    </div>
                </div>
              </form>
                <div class="row margin_b10 margin-top20">
                    <div class="col-6"><button class="btn btn btn-secondary w100" data-dismiss="modal">Đóng</button></div>
                    <div class="col-6"><button class="btn btn-succ w100" id="modal-patient-save">Lưu</button></div>

                </div>
                <!---->
            </div>

        </div>
    </div>
</div>


