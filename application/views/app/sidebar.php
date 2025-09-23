<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="<?php echo base_url('app');?>" class="logo">
        <img
          src="<?php echo base_url(); ?>/assets/img/kaiadmin/logo_light.svg"
          alt="navbar brand"
          class="navbar-brand"
          height="20"
        />
      </a>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
    <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item <?php echo ($this->uri->segment(1) == 'app' && $this->uri->segment(2) == '') ? 'active' : '' ?>">
          <a
            href="<?php echo base_url('app');?>"
          >
            <i class="fas fa-home"></i>
            <p>Utama</p>
          </a>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Menu</h4>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#base">
            <i class="fas fa-table"></i>
            <p>Tempahan</p>
            <span class="caret"></span>
          </a>
          <div class="collapse show" id="base">
            <ul class="nav nav-collapse">
              <li class="<?php echo ($this->uri->segment(2) == 'tempahan') ? 'active' : '' ?>">
                <a href="<?php echo base_url('app/tempahan');?>">
                  <span class="sub-item">Buat Tempahan</span>
                </a>
              </li>
              <li>
                <a href="components/buttons.html">
                  <span class="sub-item">Tempahan Saya</span>
                </a>
              </li>
              <li>
                <a href="components/gridsystem.html">
                  <span class="sub-item">Senarai Semua Tempahan</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>