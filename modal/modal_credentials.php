<!-- Modal center Large -->
<div class="modal fade" id="crendential-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header color_blue">
                <h5 class="modal-title">Chứng chỉ, Bằng cấp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="credentials-id" value="">
                <input type="hidden" id="user-doctor-id" value="">
                <!---->
                <div class="row margin_b15">
                    <div class="col-12" id="cred-doctor-name"></div>
                </div>
                <div class="row margin_b15">
                    <div class="col-6 column-left">
                        <div class="row">
                            <div class="col-12">Nơi đang công tác</div>
                            <div class="col-12">
                                <select class="form-control" id="cred-Affiliate"></select>
                            </div>
                        </div>

                        <div class="row m-t10">
                            <div class="col-8">
                                <div class="col-12 padding_rl">Tên trường đại học</div>
                                <div class="col-12  padding_rl">
                                    <input type="text" class="form-control" id="cred-University">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-12 padding_rl">Bằng cấp</div>
                                <div class="col-12  padding_rl">
                                    <input type="text" class="form-control" id="cred-Degree">
                                </div>
                            </div>
                        </div>

                        <div class="row m-t10">
                            <div class="col-12">Địa chỉ trường đại học</div>
                            <div class="col-12">
                                <input type="text" class="form-control" id="cred-University-Address">
                            </div>
                        </div>

                        <div class="row m-t10">
                            <div class="col-6">
                                <div class="col-12 padding_rl">Bằng cấp y tế</div>
                                <div class="col-12  padding_rl">
                                    <input type="text" class="form-control" id="cred-Medical-License-Number">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 padding_rl">Giấy phép RX</div>
                                <div class="col-12  padding_rl">
                                    <input type="text" class="form-control" id="cred-Rx-Number">
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--end column left---------->
                    <div class="col-6 column-right">
                        <div class="row">
                            <div class="col-6">
                                <div class="col-12 padding_rl">Ngôn ngữ</div>
                                <div class="col-12  padding_rl">
                                    <select class="form-control" id="cred-language">
                                        <option value=""></option>
                                        <option value="Vietnamese">Tiếng Việt</option>
                                        <option value="English">Tiếng Anh</option>
                                    </select>
                                </div>
                                <div class="col-12  padding_rl" id="list-languages">

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 padding_rl">Chuyên khoa</div>
                                <div class="col-12  padding_rl">
                                    <select class="form-control" id="cred-speciality">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-12  padding_rl" id="list-specialities">

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end column right-->
                </div>

                <div class="row m-t10">
                    <div class="col-4">
                        <div class="col-12 padding_rl">Tài liệu</div>
                        <div class="col-12 b-gray51" style="min-height: 100px">
                            <div class="row" id="cre-Documents"></div>
                            <div class="row" id="files-area">

                            </div>
                            <div class="col-12 credentail_upload">
                                <label for="credential-document">
                                    <a class="btn btn-primary text-light" role="button" aria-disabled="false">Click here to upload file</a>
                                </label>
                                <input type="file" name="file[]" accept=".pdf,image/*" id="credential-document" style="visibility: hidden; position: absolute;" multiple/>
                            </div>

                        </div>

                    </div>
                    <div class="col-5">
                        <div class="col-12 padding_rl">Sơ yếu lí lịch</div>
                        <div class="col-12  padding_rl b-gray51" style="min-height: 100px;">
                            <textarea class="form-control" id="cre-Description" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="col-12 padding_rl">Ghi chú của Admin</div>
                        <div class="col-12  padding_rl b-gray51" id="admin-list-notes" style="min-height: 100px;">

                        </div>
                    </div>
                </div>
                <?php
                  if($_SESSION['user_type_option_user_type']=='Admin'){?>
                      <div class="row m-t10 col-12">
                          <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="approved-to-practice">
                              <label class="custom-control-label" for="approved-to-practice">Bác sĩ</label>
                          </div>
                      </div>
                <?php
                  }
                ?>

                <div class="row margin_b10 margin-top20 text-right">
                    <div class="col-3"><button class="btn btn-succ w100" data-dismiss="modal">Đóng</button></div>
                    <div class="col-3"><button class="btn btn-succ w100" id="save-cre-div">Lưu</button></div>
                </div>
                <!---->
            </div>

        </div>
    </div>
</div>


