<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php
                // echo "<pre>"; print_r($reservation); echo "</pre>";
                // echo "<pre>"; print_r($user); echo "</pre>";
                ?>
                <div class="card-header" style="background-color:#fff4e4;">
                    <h4 class="card-title">Borang Permohonan Tempahan</h4>
                    <label><b><i>Permohonan oleh : <?php echo ucfirst($reservation['user_name']); ?></i></b></label>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="line-home-tab" data-bs-toggle="pill" href="#line-home" role="tab" aria-controls="pills-home" aria-selected="true">Maklumat Tempahan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-profile-tab" data-bs-toggle="pill" href="#line-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Maklumat Pemohon</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-contact-tab" data-bs-toggle="pill" href="#line-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Maklumat Jabatan</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3 mb-3" id="line-tabContent">
                        <div class="tab-pane fade show active" id="line-home" role="tabpanel" aria-labelledby="line-home-tab">
                            <form id="process-form-data">
                                <div class="row" style="padding-top:20px;">
                                    <div class="col-lg-2" style="font-weight: bold;">
                                        <lable>Bilik Mesyuarat</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <lable>: <?php echo ucfirst($reservation['room_name']); ?></label>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:10px;">
                                    <div class="col-lg-2" style="font-weight: bold;">
                                        <lable>Tajuk</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <lable>: <?php echo ucfirst($reservation['title']); ?></label>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:10px;">
                                    <div class="col-lg-2" style="font-weight: bold;">
                                        <lable>Agenda</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <lable>: <?php echo ucfirst($reservation['purpose']); ?></label>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:30px;">
                                    <div class="col-lg-12" style="font-weight: bold;">
                                        <lable>Tarikh & Masa</label>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:10px;">
                                    <div class="col-lg-2" style="font-weight: bold;">
                                        <lable>Mula</label>
                                    </div>
                                    <div class="col-lg-10" style="font-weight: bold;">
                                        : <span class="badge badge-primary"><?php echo convert_date($reservation['start_time']); ?></span>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:10px;">
                                    <div class="col-lg-2" style="font-weight: bold;">
                                        <lable>Tamat</label>
                                    </div>
                                    <div class="col-lg-10" style="font-weight: bold;">
                                        : <span class="badge badge-primary"><?php echo convert_date($reservation['end_time']); ?></span>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:10px;">
                                    <div class="col-lg-2" style="font-weight: bold;">
                                        <lable>Catatan</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <lable>: <?php echo !empty($reservation['remark']) ? $reservation['remark'] : "<small><i>Tiada Catatan</i></small>"; ?> </label>
                                    </div>
                                </div>
                                <div class="pt-3 border-top border-top-dashed mt-4">
                                    <div class="row gy-3">
                                        <div class="col-lg-4 col-sm-6">
                                            <div>
                                                <p class="mb-2 text-uppercase text-muted" style="font-size:12px; font-weight: bold;">Permohonan dibuat pada</p>
                                                <h6 class="fs-15 mb-0"><?php echo dmy($reservation['created_at']); ?></h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div>
                                                <p class="mb-2 text-uppercase text-muted" style="font-size:12px; font-weight: bold;">Permohonan dibuat oleh</p>
                                                <h6 class="fs-15 mb-0"><?php echo ucfirst($reservation['user_name']); ?></h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div>
                                                <p class="mb-2 text-uppercase text-muted" style="font-size:12px; font-weight: bold;">Status</p>
                                                <!-- <h6 class="fs-15 mb-0"></h6> -->
                                                <?php echo status_span_class($reservation['status']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if($proses == 'true'): ?>
                                    <div class="pt-3 border-top border-top-dashed mt-4">
                                        <div class="row mb-3">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label"><b>Keputusan</b></label>
                                            <div class="col-sm-10">
                                                <select name="keputusan_permohonan" id="keputusan_permohonan" class="form-control">
                                                    <option value="">Sila Pilih Keputusan</option>
                                                    <option value="Lulus">LULUS</option>
                                                    <option value="Batal">BATAL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <input type="hidden" id="process_id" name="process_id" value="<?php echo $reservation['id'] ?>">
                                <div class="pt-4" align="right">
                                    <?php if($proses == 'true'): ?>
                                        <a class="btn btn-success btn-process-booking">Proses</a>
                                    <?php endif; ?>
                                    <a class="btn btn-danger" href="<?php echo base_url($back_url); ?>">Kembali</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="line-profile" role="tabpanel" aria-labelledby="line-profile-tab">
                            <div class="row" style="padding-top:20px;">
                                <div class="col-lg-2" style="font-weight: bold;">
                                    <lable>Nama Penuh</label>
                                </div>
                                <div class="col-lg-10">
                                    <lable>: <?php echo ucfirst($user['name']); ?></label>
                                </div>
                            </div>
                            <div class="row" style="padding-top:10px;">
                                <div class="col-lg-2" style="font-weight: bold;">
                                    <lable>Email</label>
                                </div>
                                <div class="col-lg-10">
                                    <lable>: <?php echo $user['email']; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="line-contact" role="tabpanel" aria-labelledby="line-contact-tab">
                            <div class="row" style="padding-top:20px;">
                                <div class="col-lg-2" style="font-weight: bold;">
                                    <lable>Jabatan</label>
                                </div>
                                <div class="col-lg-10">
                                    <lable>: <?php echo ucfirst($department['department_name']); ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
