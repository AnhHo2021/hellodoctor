<!-- Modal success -->
<div class="modal fade" z-index=1000 id="modal-success" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-ligh-blue">
                <h5 class="modal-title">Lưu thành công</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal error -->
<div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-alert">
                <h5 class="modal-title color-white" id="err-message"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal alert -->
<div class="modal fade" z-index=1000 id="modal-alert" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-alert">
                <h5 class="modal-title" style="color: white">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 modal-alert-content">

                    </div>
                </div>
                <div class="row margin_b10 margin-top10">
                    <div class="col-6 lab-status-btn" style="display: none"><button class="btn btn-danger form-control" id="lab-confirm-change">Xác nhận</button></div>
                    <div class="col-6 pres-status-btn" style="display: none"><button class="btn btn-danger form-control" id="pres-confirm-change">Xác nhận</button></div>
                    <div class="col-6 apt-status-btn" style="display: none"><button class="btn btn-danger form-control" id="apt-confirm-change">Xác nhận</button></div>
                    <div class="col-6"><button class="btn btn-default form-control" data-dismiss="modal">Đóng</button></div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal center alert-->
<div class="modal fade" id="modal-alert-appointment" tabindex="-1" role="dialog" aria-hidden="true" z-index=2>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="height:346px;width:613px">
            <div class="modal-header" style="background-color: #797979;height:54px">
                <h4 class="modal-title">
                    <img src="<?= ASSETS_URL ?>/img1/white-large-logo.png" style="position: absolute;top:5px;height:45px;width:229px">
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 margin-T5B5L20R20" style="font-weight: bold">Bạn nên đến ngay bệnh viện gần nhất để được chăm sóc khẩn cấp.</div>
                    <div class="col-12 " style="font-weight: bold;margin-left: 20px;margin-right: 20px;
                    font-size: 22px;color: red;">XinChaoBacSi.vn không thể hỗ trợ bạn.</div>
                    <div class="col-12 margin-T5B5L20R20" style="margin-top: 20px; font-weight: bold;";
                    margin-bottom: 20px">Nếu bạn cần xe cứu thương, xin vui lòng quay số dưới đây..</div>
                    <div class="col-12 color-gray51 text-center"
                        style="font-size: 18px;font-weight: bold;margin-top: 10px"><u>Gọi khẩn cấp</u>
                    </div>
                    <div class="col-12 text-center"
                         style="font-size: 22px;font-weight: bold;color: red"><u>115</u>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
    <!--------------------------->
<div class="modal fade"  id="modal-change-email" tabindex="-1" role="dialog" aria-hidden="true" z-index=1000>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class=" margin_b10 margin-top20 col-12">
                <div class="col-12 margin_b10 ">
                    Email phải được thay đổi bởi quản trị viên hệ thống. Điều này sẽ ảnh hưởng đến thông tin đăng nhập của bạn và chúng tôi sẽ gửi cho bạn thông tin đăng nhập mới để đăng nhập trong tương lai.
                </div>
                <div class="col-12 padding_l15">
                    Vui lòng nhập thay đổi địa chỉ dưới đây.
                </div>
            </div>
            <div class=" margin_b10 col-12">
                <div class="col-12 "> Email</div>
                <div class="col-12 ">
                    <input class="form-control" id="change-by-email">
                </div>
            </div>
            <div class="row m_b15 margin-top20 margin_l15">
                <div class="col-6"><button class="btn btn-secondary w100" data-dismiss="modal">Đóng</button></div>
                <div class="col-6 "><button class="btn btn-danger" id ="send-email-changed">Đồng ý </button></div>
            </div>
        </div>
    </div>
</div>

<!--------------------------->
<div class="modal fade"  id="modal-change-pass" tabindex="-1" role="dialog" aria-hidden="true" z-index=1000>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Đổi mật khẩu</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class=" margin_b10 margin-top20 row">
                    <div class="col-12 margin_b10 ">
                        Nhập địa chỉ email liên kết với tải khoản của bạn, chúng tôi sẽ gửi đường link qua mail để khôi phục mật khẩu
                    </div>
                </div>
                <div class=" margin_b10 row">
                    <div class="col-12 "> Email</div>
                    <div class="col-12 ">
                        <input type="text" class="form-control" id="email-require">
                    </div>
                </div>
                <div class="row m_b15 margin-top20 ">
                    <div class="col-6"><button class="btn btn-secondary w100" data-dismiss="modal">Đóng</button></div>
                    <div class="col-6 "><button class="btn btn-danger" id ="password-require">Reset Email</button></div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Modal leave page -->
<div class="modal fade" z-index=1000 id="modal-leave-page" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-ligh-blue">
                <h5 class="modal-title">Bạn có muốn lưu thay đổi không?</h5>
            </div>
            <div class="modal-body">
                <div class="row m_b15 margin-top20 ">
                    <input type="hidden" value="" id="open-id">
                    <input type="hidden" value="" id="what-page">
                    <div class="col-6 "><button class="btn btn-secondary form-control" id ="leave-page">Không</button></div>
                    <div class="col-6 "><button class="btn btn-danger form-control" id ="save-before-leave">Có</button></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal signature -->
<div class="modal fade" z-index=1000 id="modal-pin-page" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-ligh-blue">
                <h5 class="modal-title"><strong class="fa fa-warning">Pin and Signature</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
               <div class="row d-flex flex-column align-items-center">
                   <div class="col-5 m_b5">
                       <label>Pin</label>
                       <input class="form-control" type="text" id="pin">
                   </div>
               </div>
                <div class="row m_b15 d-flex flex-column align-items-center justify-content-center">
                   <div class="image-upload">
                        <label for="signature">
                            <img id="signature-img" style="width: 180px; height: 180px;" alt="signature" class="shadow-2 img-thumbnail fs-xl" />
                        </label>

                        <input id="signature" accept="image/*" type="file" onchange="login.prototype.preview_file(event);" style="display: none;" />
                    </div>

                </div>
                <div class="row w100">
                    <div class="col-3"></div>
                    <div class="col-3 "><button class="btn btn-secondary form-control" id ="no-save-siganture">No</button></div>
                    <div class="col-3 "><button class="btn btn-danger form-control" id ="save-siganture">Save</button></div>
                    <div class="col-3"></div>
                </div>
            </div>

        </div>
    </div>
</div>