<div class="page-inner">
  <div class="page-header">
    <h3 class="fw-bold mb-3">Buat Tempahan</h3>
    <ul class="breadcrumbs mb-3">
      <li class="nav-home">
        <a href="#">
          <i class="icon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="icon-arrow-right"></i>
      </li>
      <li class="nav-item">
        <a href="#">Utama</a>
      </li>
      <li class="separator">
        <i class="icon-arrow-right"></i>
      </li>
      <li class="nav-item">
        <a href="#">Buat Tempahan</a>
      </li>
    </ul>
  </div>
  <div class="row">
  
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
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
                />
              </div>
              <div class="form-group">
                <label for="comment">Agenda</label>
                <textarea class="form-control" id="comment" rows="5"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1"
                  >Bilik Mesyuarat</label
                >
                <select
                  class="form-select"
                  id="bilik-mesyuarat"
                >
                <option value="">Sila Pilih</option>
                <?php foreach ($bilik_mesyuarat as $bilik): ?>
                  <option value="<?php echo $bilik['id'] ?>"><?php echo $bilik['name'] ?></option>
                <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="tarikh_mula">Tarikh & Masa (Mula)</label>
                <input
                  type="datetime-local"
                  class="form-control"
                  id="tarikh_mula"
                />
              </div>
              <div class="form-group">
                <label for="tarikh_mula">Tarikh & Masa (Tamat)</label>
                <input
                  type="datetime-local"
                  class="form-control"
                  id="tarikh_tamat"
                />
              </div>
              <div class="form-group">
                <label for="comment">Catatan</label>
                <textarea class="form-control" id="comment" rows="5"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="card-action">
          <button class="btn btn-success">Tempah</button>
          <button class="btn btn-danger">Batal</button>
        </div>
      </div>
    </div>

    <div class="col-md-7">
      <div id='calendar'></div>
    </div>

  </div>
</div>