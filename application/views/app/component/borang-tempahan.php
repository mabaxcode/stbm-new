<?php /*<form action="<?php echo base_url('app/tempah'); ?>" method="post"> */?>
<!-- <form id="tempahanForm"> -->
<form id="tempahanForm" method="post" action="<?= base_url('app/tempah') ?>">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Borang Tempahan</div>
            <p class="card-category"><i class="fas fa-info-circle"></i> Sila lengkapkan semua butiran untuk membuat tempahan</p>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="form-group">
                    <label for="password">Tajuk</label>
                    <input
                        type="text"
                        class="form-control"
                        id="tajuk"
                        name="tajuk"
                    />
                    <small class="error" id="tajuk-error"></small>
                    <?//php echo form_error('tajuk', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="comment">Agenda</label>
                    <textarea class="form-control" id="agenda" rows="5" name="agenda"></textarea>
                    <small class="error" id="agenda-error"></small>
                </div>
                <div class="form-group">
                    <label 
                    for="exampleFormControlSelect1"
                    >Bilik Mesyuarat</label>
                    <select
                        class="form-select"
                        id="bilik"
                        name="bilik"
                    >
                    <option value="">Sila Pilih</option>
                    <?php foreach ($bilik_mesyuarat as $bilik): ?>
                        <option value="<?php echo $bilik['id'] ?>"><?php echo $bilik['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                    <small class="error" id="bilik-error"></small>
                </div>
                <div class="form-group">
                <label for="tarikh_mula">Tarikh & Masa (Mula)</label>
                <input
                    type="datetime-local"
                    class="form-control"
                    id="tarikh_mula"
                    name="tarikh_mula"
                />
                <small class="error" id="tarikh_mula-error"></small>
                </div>
                <div class="form-group">
                <label for="tarikh_mula">Tarikh & Masa (Tamat)</label>
                <input
                    type="datetime-local"
                    class="form-control"
                    id="tarikh_tamat"
                    name="tarikh_tamat"
                />
                <small class="error" id="tarikh_tamat-error"></small>
                </div>
                <div class="form-group">
                <label for="comment">Catatan</label>
                <textarea class="form-control" id="catatan" rows="5" name="catatan"></textarea>
                </div>
            </div>
            </div>
        </div>
        <div class="card-action">
            <button class="btn btn-success" type="submit" id="submitBtn" style="width: 150px;">Tempah</button>
            <a class="btn btn-danger" href="<?php echo base_url('app/tempahan') ?>">Batal</a>
        </div>
    </div>
</form>

