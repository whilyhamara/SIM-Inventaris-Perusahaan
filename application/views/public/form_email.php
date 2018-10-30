<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
      <img class="img-fluid" src="<?php echo base_url('assets/'); ?>img/login_pelindo.png" alt="login_pelindo"  />
    </div>
        <?php echo form_open('lupa_password'); ?>
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger"><strong><?php echo validation_errors(); ?></strong></div>
        <?php endif ?>
        <?php if ($this->session->flashdata('sukses')): ?>
            <div class="alert alert-danger"><strong><?php echo $this->session->flashdata('sukses'); ?></strong></div>
        <?php endif ?>


        <div class="card card-warning">
              <div class="card-header" align="center">
                  <label>Lupa Password</label>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" id="imel" placeholder="Masukkan email" required="required">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer" align="center">
                  <span id="imel_result"></span>
                </div>
        </div>
        <?php echo form_close(); ?>
  </div>

<?php $this->load->view('global/07_javascript'); ?>
