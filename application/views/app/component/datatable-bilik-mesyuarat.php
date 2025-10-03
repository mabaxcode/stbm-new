<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Bilik Mesyuarat Yang Tersedia</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10">
                    <!-- <div class="form-group">
                        <div class="input-icon">
                        <input
                            type="text"
                            class="form-control"
                            id="carian_bilik_val"
                            placeholder="Masukkan nama bilik..."
                        />
                        <span class="input-icon-addon">
                            <i class="fa fa-search"></i>
                        </span>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <select
                        class="form-select form-control"
                        id="carian_bilik_val"
                        >
                        <option value="">Sila Pilih Nama Bilik</option>
                        <?php foreach ($bilik_mesyuarat as $key) { ?>
                        <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
                        <? } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <a class="btn btn-primary w-100 carian-bilik">Lihat Butiran</a>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <div id="result"></div>
                </div>
            </div>
        </div>
    </div>
</div>

    