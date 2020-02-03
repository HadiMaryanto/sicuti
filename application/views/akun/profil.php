  <div class="col-12 col-md-12 col-lg-6">
    <?php if ($this->session->flashdata('alert') == 'success_ganti') { ?>
          <div class="alert alert-primary alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
              <span>&times;</span>
              </button>
              Berhasil Mengganti Password
            </div>
          </div>
        <?php } ?>
          <div class="card author-box">
            <div class="card-body">
              <div class="author-box-center">
                <img alt="image" src="<?php echo base_url()?>assets/img/user_man-512.png" class="rounded-circle author-box-picture">
                <div class="clearfix"></div>
                <div class="author-box-name">
                  <a href="#"><?php echo $this->session->userdata['pegawai_nama'] ?></a>
                </div>
                <div class="author-box-job"><?php echo $this->session->userdata['jabatan_nama'] ?></div>
              </div>
              <form class="needs-validation" action="<?php echo base_url('profil/ganti/'.$this->session->userdata('user_id')) ?>" method="post" novalidate="">
              <div class="card-body">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" value="<?php echo $this->session->userdata('user_username') ?>" class="form-control">
                  <div class="invalid-feedback">
                    username tidak boleh kosong
                  </div>
                </div>

                <div class="form-group">
                  <label>Ganti Password</label>
                  <input type="password" name="password" class="form-control">
                  <div class="invalid-feedback">
                    password tidak boleh kosong
                  </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary mr-1" type="submit" name="rubah">Ganti</button>
              </div>
              </form>
            </div>
          </div>
