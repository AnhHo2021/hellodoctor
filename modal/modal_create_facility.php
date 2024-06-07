<!-- Modal center Large -->
<div class="modal fade" id="create-facility-modal"  tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-ligh-blue">
                <h5 class="modal-title"><strong>Thêm địa điểm</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body" >
                <!---->
                <div id="modal-content" style="min-height: 200px">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 b-gray51 middle" style="min-height: 130px;">
                                    <div class="image-upload">
                                        <label for="photo-input">
                                            <img id="photo-img"  style="width: 100px; height: 100px; display: block; margin: 0px; border-radius: 0px;" alt="Image" class="rounded-circle shadow-2 img-thumbnail fs-xl" />
                                        </label>

                                        <input id="photo-input" accept="image/*" type="file" onchange="modal_create_facility.prototype.previewFile(event);" style="display: none;" />
                                    </div>

                                </div>
                            </div>
                            <div class="row m-t5">
                                <div class="col-12 padding_rl">Địa chỉ</div>
                                <div class="col-12 padding_rl">
                                    <input class="form-control" type="text" id="l-addr">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" id="map" style="width:100%;min-height:200px; max-height: 300px;margin-top: 20px">

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">Tên</div>
                                <div class="col-12"><input class="form-control" type="text" id="l-name"></div>
                            </div>
                            <div class="row m-t10">
                                <div class="col-12">Số điện thoại</div>
                                <div class="col-12"><input class="form-control" type="text" id="l-phone"></div>
                            </div>
                            <div class="row m-t10">
                                <div class="col-12">Email</div>
                                <div class="col-12"><input class="form-control" type="text" id="l-email"></div>
                            </div>
                            <div class="row m-t10">
                                <div class="col-12">Fax</div>
                                <div class="col-12"><input class="form-control" type="text" id="l-fax"></div>
                            </div>
                            <div class="row m-t10">
                                <div class="col-12">Phân loại</div>
                                <div class="col-12"><select class="form-control" id="l-type">
                                        <option value=""></option>
                                </select></div>
                                <div class="col-12" id="list-type"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row margin_b10 margin-top20 border-t">
                    <div class="col-12 m_b10"></div>
                    <div class="col-6"></div>
                    <div class="col-3"><button class="btn btn-succ w100" data-dismiss="modal">Đóng</button></div>
                    <div class="col-3"><button class="btn btn-succ w100" id="save-facility">Lưu</button></div>
                </div>
                <!---->
            </div>



        </div>
    </div>
</div>


