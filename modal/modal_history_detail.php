<!-- Modal center Large -->
<div class="modal fade" id="history-detail-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">THÔNG TIN TIỀN SỬ VÀ CÁC YẾU TỐ LIÊN QUAN SỨC KHỎE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <!---->
                <div class="row margin_b10">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label color-alert"><u>1. Tình trạng lúc sinh</u></label>
                            <div class="row col-12">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="ConditionNormalBirth">
                                    <label class="custom-control-label" for="ConditionNormalBirth">Sinh thường</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="ConditionSurgery">
                                    <label class="custom-control-label" for="ConditionSurgery">Đẻ mổ</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="ConditionPrematureBirth">
                                    <label class="custom-control-label" for="ConditionPrematureBirth">Đẻ thiếu tháng</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="ConditionSuffocationatbirth">
                                    <label class="custom-control-label" for="ConditionSuffocationatbirth">Bị ngạt lúc đẻ</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3">Cân nặng (gr):</div>
                    <div class="col-3"><input type="text" id="ConditionWeight" class="custom-input w100"></div>
                    <div class="col-2">Chiều dài (cm):</div>
                    <div class="col-4"><input type="text" id="ConditionLength" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3 padding_r">Dị tật bẩm sinh (ghi rõ nếu có):</div>
                    <div class="col-9"><input type="text" id="ConditionBirthDefects" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3">Khác (ghi rõ nếu có):</div>
                    <div class="col-9"><input type="text" id="ConditionOthers" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 form-label color-alert"><u>2. Yếu tố nguy cơ đối với sức khỏe cá nhân</u></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-4">Hút thuốc lá, lào</div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="no1">
                            <label class="custom-control-label" for="no1">Không</label>
                        </div>
                    </div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="yes1" >
                            <label class="custom-control-label" for="yes1">Có</label>
                        </div>
                    </div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="regular1" >
                            <label class="custom-control-label" for="regular1">Thường xuyên</label>
                        </div>
                    </div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="gaveup1" >
                            <label class="custom-control-label" for="gaveup1">Đã bỏ</label>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-4">Uống rượu bia thường xuyên</div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="no2" >
                            <label class="custom-control-label" for="no2">Không</label>
                        </div>
                    </div>
                    <div class="col-1 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="yes2" >
                            <label class="custom-control-label" for="yes2">Có</label>
                        </div>
                    </div>
                    <div class="col-2 padding_rl">Số ly cốc uống/ngày</div>
                    <div class="col-1 padding_rl">
                        <input type="text" id="Numberofcupsperday" class="custom-input w100">
                    </div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="gaveup2" >
                            <label class="custom-control-label" for="gaveup2">Đã bỏ</label>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-4">Sử dụng ma túy</div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="no3" >
                            <label class="custom-control-label" for="no3">Không</label>
                        </div>
                    </div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="yes3" >
                            <label class="custom-control-label" for="yes3">Có</label>
                        </div>
                    </div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="regular3" >
                            <label class="custom-control-label" for="regular3">Thường xuyên</label>
                        </div>
                    </div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="gaveup3" >
                            <label class="custom-control-label" for="gaveup3">Đã bỏ</label>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-4">Hoạt động thể lực</div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="no4" >
                            <label class="custom-control-label" for="no4">Không</label>
                        </div>
                    </div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="yes4" >
                            <label class="custom-control-label" for="yes4">Có</label>
                        </div>
                    </div>
                    <div class="col-2 padding_rl">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="regular4" >
                            <label class="custom-control-label" for="regular4">Thường xuyên</label>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label  for="RiskOccupationalExposure">Yếu tố tiếp xúc nghề nghiệp/Môi trường sống(Hóa chất, bụi, ồn, virút) ghi rõ yếu tố tiếp xúc</label>
                            <textarea class="form-control" id="RiskOccupationalExposure" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-7 ">Loại hố xí của gia đình(xả nước/ hai ngăn/hố xí thùng/ không có hố xí):</div>
                    <div class="col-5 "><input type="text" id="RiskToiletType" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label  for="RiskOthers">Nguy cơ khác (ghi rõ):</label>
                            <textarea class="form-control" id="RiskOthers" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12">
                        <label class="form-label color-alert"><u>3. Tiền sử bệnh tật, dị ứng</u></label>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 form-label">3.1. Dị ứng:</div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2 ">Thuốc</div>
                    <div class="col-10 "><input type="text" id="HistoryAllergiesMedicine" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2 padding_r">Hóa chất/ mỹ phẩm</div>
                    <div class="col-10 "><input type="text" id="HistoryAllergiesChemicals" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2 ">Thực phẩm</div>
                    <div class="col-10 "><input type="text" id="HistoryAllergiesFood" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2 ">Khác</div>
                    <div class="col-10 "><input type="text" id="HistoryAllergiesOthers" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 form-label">3.2. Bệnh tật:</div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="HistoryDiseasesHeart">
                            <label class="custom-control-label" for="HistoryDiseasesHeart">Bệnh tim mạch</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="HistoryDiseasesHypertension">
                            <label class="custom-control-label" for="HistoryDiseasesHypertension">Tăng huyết áp</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="HistoryDiseasesDiabetes">
                            <label class="custom-control-label" for="HistoryDiseasesDiabetes">Đái tháo đường</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="HistoryDiseasesStomachache">
                            <label class="custom-control-label" for="HistoryDiseasesStomachache">Bệnh dạ dày</label>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="HistoryDiseasesChronicLung">
                            <label class="custom-control-label" for="HistoryDiseasesChronicLung">Bệnh phổi mản tính</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="HistoryDiseasesAsthma">
                            <label class="custom-control-label" for="HistoryDiseasesAsthma">Hen suyễn</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="HistoryDiseasesGoitre">
                            <label class="custom-control-label" for="HistoryDiseasesGoitre">Bệnh bướu cổ</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="HistoryDiseasesHepatitis">
                            <label class="custom-control-label" for="HistoryDiseasesHepatitis">Viêm gan</label>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="HistoryDiseasesCongenitalHeart">
                            <label class="custom-control-label" for="HistoryDiseasesCongenitalHeart">Tim bẩm sinh</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="HistoryDiseasesMental">
                            <label class="custom-control-label" for="HistoryDiseasesMental">Tâm thần</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="HistoryDiseasesAutism">
                            <label class="custom-control-label" for="HistoryDiseasesAutism">Tự kỷ</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="HistoryDiseasesEpileptic">
                            <label class="custom-control-label" for="HistoryDiseasesEpileptic">Động kinh</label>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3 padding_r">Ung thư (ghi rõ loại ung thư):</div>
                    <div class="col-9 "><input type="text" id="HistoryDiseasesCancer" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3 ">Lao (ghi rõ loại lao):</div>
                    <div class="col-9 "><input type="text" id="HistoryDiseasesTuberculosis" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3 ">Khác:</div>
                    <div class="col-9 "><input type="text" id="HistoryDiseasesOthers" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12">
                        <label class="form-label color-alert"><u>4. Khuyết tật</u></label>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3">Thính lực</div>
                    <div class="col-9 "><input type="text" id="DefectsHearing" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3">Thị lực</div>
                    <div class="col-9 "><input type="text" id="DefectsEyeSight" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3">Tay</div>
                    <div class="col-9 "><input type="text" id="DefectsHand" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3">Chân</div>
                    <div class="col-9 "><input type="text" id="DefectsFoot" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3">Cong vẹo cột sống</div>
                    <div class="col-9 "><input type="text" id="DefectsScoliosisCurvature" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3">Khe hở môi, vòm miệng</div>
                    <div class="col-9 "><input type="text" id="DefectsLipcleftPalate" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-3">Khác</div>
                    <div class="col-9 "><input type="text" id="DefectsOthers" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label  for="SurgeryNotes" <label class="form-label color-alert"><u>5. Tiền sử phẫu thuật (ghi rõ bộ phận cơ thể đã phẫu thuật và năm phẫu thuật)</u></label>
                            <textarea class="form-control" id="SurgeryNotes" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="form-group"> <label class="form-label color-alert" ><u>6. Tiền sử gia đình</u></label></div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-7">
                        <label class="form-label">6.1. Dị ứng:</label>
                    </div>
                    <div class="col-5">
                        <strong>Bệnh nhân </strong>(ghi rõ quan hệ huyết thống: ông, bà, bố, mẹ, anh, chị...)
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2">Thuốc</div>
                    <div class="col-5"><input type="text" id="FamilyAllergiesMedicine" class="custom-input w100"></div>
                    <div class="col-5"><input type="text" id="FamilyAllergiesMedicinePatient" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2 padding_r">Hóa chất/ mỹ phẩm</div>
                    <div class="col-5"><input type="text" id="FamilyAllergiesChemicals" class="custom-input w100"></div>
                    <div class="col-5"><input type="text" id="FamilyAllergiesChemicalsPatient" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2">Thực phẩm</div>
                    <div class="col-5"><input type="text" id="FamilyAllergiesFood" class="custom-input w100"></div>
                    <div class="col-5"><input type="text" id="FamilyAllergiesFoodPatient" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2">Khác</div>
                    <div class="col-5"><input type="text" id="FamilyAllergiesOthers" class="custom-input w100"></div>
                    <div class="col-5"><input type="text" id="FamilyAllergiesOthersPatient" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12"><strong>6.2. Bệnh tật:</strong></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2"><strong>Tên bệnh</strong> </div>
                    <div class="col-4"><strong>Bệnh nhân</strong>(ghi rõ quan hệ huyết thống: ông, bà, bố, mẹ, anh, chị...)</div>
                    <div class="col-2"><strong>Tên bệnh</strong> </div>
                    <div class="col-4"><strong>Bệnh nhân </strong>(ghi rõ quan hệ huyết thống: ông, bà, bố, mẹ, anh, chị...)</div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2 padding_r">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="FamilyDiseasesHeart">
                            <label class="custom-control-label" for="FamilyDiseasesHeart">Bệnh tim mạch</label>
                        </div>
                    </div>
                    <div class="col-4"><input type="text" id="FamilyDiseasesHeartNotes" class="custom-input w100"> </div>
                    <div class="col-2 padding_r">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="FamilyDiseasesAsthma">
                            <label class="custom-control-label" for="FamilyDiseasesAsthma">Hen suyễn</label>
                        </div>
                    </div>
                    <div class="col-4"><input type="text" id="FamilyDiseasesAsthmaNotes" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2 padding_r">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="FamilyDiseasesHypertension">
                            <label class="custom-control-label" for="FamilyDiseasesHypertension">Tăng huyết áp</label>
                        </div>
                    </div>
                    <div class="col-4"><input type="text" id="FamilyDiseasesHypertensionNotes" class="custom-input w100"> </div>
                    <div class="col-2 padding_r">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="FamilyDiseasesDiabetes">
                            <label class="custom-control-label" for="FamilyDiseasesDiabetes">Đái tháo đường</label>
                        </div>
                    </div>
                    <div class="col-4"><input type="text" id="FamilyDiseasesDiabetesNotes" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2 padding_r">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="FamilyDiseasesMental">
                            <label class="custom-control-label" for="FamilyDiseasesMental">Tâm thần</label>
                        </div>
                    </div>
                    <div class="col-4"><input type="text" id="FamilyDiseasesMentalNotes" class="custom-input w100"> </div>
                    <div class="col-2 padding_r">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="FamilyDiseasesEpileptic">
                            <label class="custom-control-label" for="FamilyDiseasesEpileptic">Động kinh</label>
                        </div>
                    </div>
                    <div class="col-4"><input type="text" id="FamilyDiseasesEpilepticNotes" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="form-group"> <label class="form-label color-alert"><u>7. Sức khỏe sinh sản và kế hoạch hóa gia đình</u></label></div>
                    </div>
                </div>
                <div class="row margin_b10">
                    <div class="col-4 ">Biện pháp tránh thai đang dùng:</div>
                    <div class="col-8"><input type="text" id="ReproductiveContraceptivemethods" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-4">Kỳ có thai cuối cùng:</div>
                    <div class="col-8"><input type="text" id="ReproductiveLastPregnancy" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2 padding_r">Số lần có thai:</div>
                    <div class="col-2"><input type="number" id="ReproductiveNumberofPregnancies" class="custom-input w100"></div>
                    <div class="col-2 padding_r">Số lần sảy thai:</div>
                    <div class="col-2"><input type="number" id="ReproductiveNumberofMiscarriages" class="custom-input w100"></div>
                    <div class="col-2 padding_r">Số lần phá thai:</div>
                    <div class="col-2"><input type="number" id="ReproductiveNumberofAbortions" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2 padding_r">Số lần sinh con:</div>
                    <div class="col-2"><input type="number" id="ReproductiveNumberofbirths" class="custom-input w100"></div>
                    <div class="col-2 padding_r">Sinh thường:</div>
                    <div class="col-2"><input type="number" id="ReproductiveNormalBirth" class="custom-input w100"></div>
                    <div class="col-2 padding_r">Đẻ mổ:</div>
                    <div class="col-2"><input type="number" id="ReproductiveSurgery" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2 padding_r">Đẻ khó:</div>
                    <div class="col-2"><input type="number" id="ReproductiveBreechBirth" class="custom-input w100"></div>
                    <div class="col-2 padding_r">Đẻ đủ tháng:</div>
                    <div class="col-2"><input type="number" id="ReproductiveTermbirths" class="custom-input w100"></div>
                    <div class="col-2 padding_r">Sinh non:</div>
                    <div class="col-2"><input type="number" id="ReproductivePretermbirths" class="custom-input w100"></div>
                </div>
                <div class="row margin_b10">
                    <div class="col-2 padding_r">Số con hiện sống:</div>
                    <div class="col-2"><input type="number" id="ReproductiveLivingChildren" class="custom-input w100"></div>
                    <div class="col-2 padding_r">Bệnh phụ khoa:</div>
                    <div class="col-6"><input type="text" id="ReproductiveGynaecologicalDisease" class="custom-input w100"></div>

                </div>
                <div class="row margin_b10">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label class="form-label color-alert"  for="OtherNotes"><u>8. Khác:</u></label>
                            <textarea class="form-control" id="OtherNotes" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row margin_b10 margin-top20">
                    <div class="col-2"><button class="btn btn-succ w100" id="btn-history-detail-save">Lưu</button></div>
                    <div class="col-2"><button class="btn btn-succ w100" data-dismiss="modal">Đóng</button></div>
                </div>
                <!---->
            </div>

        </div>
    </div>
</div>


