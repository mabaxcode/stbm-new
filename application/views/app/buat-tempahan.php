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
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <div class="col-md-5">
      <?php $this->load->view('app/component/borang-tempahan'); ?>
    </div>

    <div class="col-md-7">
      <div id='calendar'></div>
    </div>

  </div>
</div>