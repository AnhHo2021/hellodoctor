<!-- Modal center Large -->
<div class="modal fade" id="login-modal"  tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-ligh-blue">
                <h5 class="modal-title"><strong>Login</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <!---->
                <div class="row margin_b10">
                    <form id="js-login" style="width: 100%" novalidate="" action="<?= APP_URL ?>/home.php">
                        <div class="form-group">
                            <label class="form-label" for="username">Email</label>
                            <input type="email" id="username" class="form-control form-control-lg" placeholder="your id or email" value="drlantern@gotbootstrap.com" required>
                            <div class="invalid-feedback">Hãy nhập Email</div>
                            <div class="help-block">Email bạn đã đăng kí với chúng tôi</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Mật khẩu</label>
                            <input type="password" id="password" class="form-control form-control-lg" placeholder="password" value="password123" required>
                            <div class="invalid-feedback">Hãy nhập mật khẩu</div>
                            <div class="help-block">Mật khẩu của bạn</div>
                        </div>
                        <div class="form-group text-left">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rememberme">
                                <label class="custom-control-label" for="rememberme"> Ghi nhớ mật khẩu của bạn</label>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="row margin_b10 margin-top20">

                    <div class="col-4"><button class="btn btn-succ w100" data-dismiss="modal">Đóng</button></div>
                    <div class="col-8"> <button id="js-login-btn" type="button" class="btn btn-danger btn-block">Đăng nhập</button></div>

                </div>
                <!---->
            </div>

        </div>
    </div>
</div>


