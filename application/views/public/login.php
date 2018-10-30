<body class="hold-transition login-page">

<?php echo form_open('login/cekLogin'); ?>

<div class="login-box">
  <div class="login-logo">
    <img class="img-fluid" src="<?php echo base_url('assets/'); ?>img/login_pelindo.png" alt="login_pelindo"  />
  </div>

  <?php if (validation_errors()) {
    ?><div class="alert alert-danger" align="center">
          <strong><?php echo validation_errors(); ?></div></strong><?php
        }else if ($this->session->flashdata('login_lagi')) {
          ?><div class="alert alert-danger" align="center">
          <strong><?php echo $this->session->flashdata('login_lagi'); ?></strong></div><?php
        } else if ($this->session->flashdata('email_sent')) {
          ?><div class="alert alert-success" align="center">
          <strong><?php echo $this->session->flashdata('email_sent'); ?></strong></div><?php
        } else if ($this->session->flashdata('sukses')) {
          ?><div class="alert alert-warning" align="center">
          <strong><?php echo $this->session->flashdata('sukses'); ?></strong></div><?php
        } else if ($this->session->flashdata('fail')) {
          ?><div class="alert alert-default" align="center">
          <strong><?php echo $this->session->flashdata('fail'); ?></strong></div><?php
        }?>

  <div class="card" >

    <div class="card-body login-card-body">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="required">
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" value="" name="password" id="password" placeholder="Password" required="required">
        </div>
        <div class="row">
          <div class="col-4">
            <input type="submit" name="login" value="Login" class="btn btn-primary btn-block "/>
          </div>
        </div>
    </div>
    <div class="card-footer bg-primary text-right">
      <a href="<?php echo site_url(); ?>/lupa_password" class="">
        Lupa Password?
      </a>
    </div>
  </div>
</div>

<?php echo form_close(); ?>

<script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%'
    })
  })
</script>
</body>
</html>
