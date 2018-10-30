<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <img class="img-fluid" src="<?php echo base_url('assets/'); ?>img/login_pelindo.png" alt="login_pelindo"  />
  </div>

  <div class="card card-primary">
              <div class="card-header" align="center">
                Selamat datang <?php echo $nama ?>
              </div>
              <?php echo form_open('lupa_password/reset_password/token/'.$token); ?>
              <?php if (validation_errors()): ?>
                  <div class="alert alert-danger"><strong><?php echo validation_errors(); ?></strong></div>
              <?php endif ?>
              <?php if ($this->session->flashdata('sukses')): ?>
                  <a class="btn btn-default bg-danger"><?php echo $this->session->flashdata('sukses'); ?></a>
              <?php endif ?>

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Masukkan Password Baru</label>
                    <input name="password" type="Password" class="form-control" id="password" placeholder="Masukkan password" required="required">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Konfirmasi Password Baru</label>
                    <input name="passconf" type="Password" class="form-control" id="confirm_password" placeholder="Masukkan konfirmasi password" required="required">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer" align="center">
                  <label>
                      <span id='message'></span>
                  </label>
                </div>

                <?php echo form_close(); ?>
            </div>
</div>


<?php $this->load->view('global/07_javascript'); ?>
