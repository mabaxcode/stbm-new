
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tetapan Akaun</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-5 col-md-2">
                    <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab-icons" data-bs-toggle="pill" href="#v-pills-home-icons" role="tab" aria-controls="v-pills-home-icons" aria-selected="true">
                            <i class="far fa-user"></i>
                            Profile
                        </a>
                        <a class="nav-link" id="v-pills-profile-tab-icons" data-bs-toggle="pill" href="#v-pills-profile-icons" role="tab" aria-controls="v-pills-profile-icons" aria-selected="false">
                            <i class="fa fa-key"></i>
                            Tukar Kata Laluan
                        </a>
                    </div>
                </div>
                <div class="col-7 col-md-10">
                    <div class="tab-content" id="v-pills-with-icon-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home-icons" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                            <div class="card">
                  <div class="card-header">
                    <div class="card-title">Maklumat Profile</div>
                  </div>
                  <form id="updateProfileForm">
                  <div class="card-body">
                    <div class="row">
                      
                      
                      <div class="col-md-6 col-lg-8">
                        <div class="form-floating form-floating-custom mb-3">
                          <input
                            type="text"
                            class="form-control"
                            id="nama"
                            name="name"
                            value="<?php echo $user['name']; ?>"
                          />
                          <label for="floatingInput">Nama</label>
                           <small id="nama-error" style="color:red;"></small>
                        </div>
                       
                      </div>

                      <div class="col-md-6 col-lg-8">
                        <div class="form-floating form-floating-custom mb-3">
                          <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="name@example.com"
                            value="<?php echo $user['email']; ?>"
                          />
                          <label for="floatingInput">Email</label>
                          <small id="email-error" style="color:red;"></small>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-8">
                        <div class="form-floating form-floating-custom mb-3">
                          <input
                            type="text"
                            class="form-control"
                            id="phone_no"
                            name="phone_no"
                            placeholder="name@example.com"
                            value="<?php echo $user_info['phone_no']; ?>"
                          />
                          <label for="floatingInput">No. Telefon</label>
                          <small id="phone_no-error" style="color:red;"></small>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-8">
                        <div class="form-floating form-floating-custom mb-3">
                          <input
                            type="text"
                            class="form-control"
                            id="designation"
                            name="designation"
                            placeholder="name@example.com"
                            value="<?php echo $user_info['designation']; ?>"
                          />
                          <label for="floatingInput">Jawatan</label>
                          <small id="designation-error" style="color:red;"></small>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-8">
                        <div class="form-floating form-floating-custom mb-3">
                          <input
                            type="text"
                            class="form-control"
                            id="department_name"
                            name="department_name"
                            placeholder="name@example.com"
                            value="<?php echo $user_info['department_name']; ?>"
                          />
                          <label for="floatingInput">Jabatan</label>
                          <small id="department_name-error" style="color:red;"></small>
                        </div>
                      </div>


                    </div>
                  </div>
                  <div class="card-action">
                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <a class="btn btn-success btn-update-profile">Kemaskini</a>
                  </div>
                </form>
                </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile-icons" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">
                            
                            <div class="card">
                  <div class="card-header">
                    <div class="card-title">Tetapan Kata Laluan</div>
                  </div>
                  <form id="updatePasswordForm">
                  <div class="card-body">
                    <div class="row">
                      
                      
                      <div class="col-md-6 col-lg-8">
                        <div class="form-floating form-floating-custom mb-3">
                          <input
                            type="password"
                            class="form-control"
                            id="current_password"
                            name="current_password"
                          />
                          <label for="floatingInput">Kata Laluan Sekarang</label>
                           <small id="current_password-error" style="color:red;"></small>
                        </div>
                       
                      </div>

                      <div class="col-md-6 col-lg-8">
                        <div class="form-floating form-floating-custom mb-3">
                          <input
                            type="password"
                            class="form-control"
                            id="new_password"
                            name="new_password"
                          />
                          <label for="floatingInput">Kata Laluan Baru</label>
                          <small id="new_password-error" style="color:red;"></small>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-8">
                        <div class="form-floating form-floating-custom mb-3">
                          <input
                            type="password"
                            class="form-control"
                            id="c_new_password"
                            name="c_new_password"
                          />
                          <label for="floatingInput">Sahkan Kata Laluan Baru</label>
                          <small id="c_new_password-error" style="color:red;"></small>
                        </div>
                      </div>
                      
                      


                    </div>
                  </div>
                  <div class="card-action">
                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <a class="btn btn-success btn-update-password">Tukar Kata Laluan</a>
                  </div>
                </form>
                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
						