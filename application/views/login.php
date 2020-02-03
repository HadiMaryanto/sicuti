<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from radixtouch.in/templates/admin/aegis/source/light/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Aug 2019 04:35:19 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/app.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url() ?>assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <?php if ($this->session->flashdata('alert') == 'gagalLogin') { ?>
                  <div class="alert alert-danger animated fadeInDown" role="alert">
                    <button type="button" class="close" data-dismiss="alert" name="button"></button>
                    Username / Password salah. Periksa Kembali
                  </div>
                <?php } ?>
                <form method="POST" action="<?php echo base_url('login'); ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      username tidak boleh kosong
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      password tidak boleh kosong
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="login" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url()?>assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?php echo base_url()?>assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url()?>assets/js/custom.js"></script>
</body>


<!-- Mirrored from radixtouch.in/templates/admin/aegis/source/light/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Aug 2019 04:35:19 GMT -->
</html>
