<?php $this->load->view('global/01_header'); ?>
<?php $this->load->view('global/02_navbar'); ?>
<?php $this->load->view('global/03_sidebar'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('inventaris/list_inventaris') ?>">Home</a></li>
              <li class="breadcrumb-item active">Update Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">


            <!-- /.card-header -->
              <!-- form start -->
              <?php echo form_open('user/edit_profil/'.$this->uri->segment(3)); ?>
              <?php echo validation_errors(); ?>
                <div class="card-body">
                    <div class="row">
                    <div class="col-lg-6">

                    <img id="target" class="img-circle elevation-2" style="margin-top: 0px; margin-left: 50px" src="<?=base_url('assets/img/bg_login.png')?>" width="400px" height="325px" >

                    <div style="margin-top: 0px" class="form-group"></div>
                    <div class="form-group" style="margin-top: 0px; margin-left: 0px; margin-right: 0px">
                                <label style="">Edit Foto</label>
                                <input style="width:500px" class="form-control" type="file" name="userfile" id="src" value="<?php ?>">
                                <label style="">*** Maksimal File 1 MB ***</label>
                            </div>

                          </div>

                        <div class="col-lg-6" style="margin-top: 0px">

                            <div style="margin-top: 0px" class="form-group">
                                <label>Nama Lengkap</label>
                                <input required="required" class="form-control" id="nama_user" type="text" name="nama_user" value="<?php
                                echo $this->session->userdata('logged_in_admin')['nama_user'];
                                ?>" placeholder="Nama Lengkap">
                            </div>

                            <div style="margin-top: 0px" class="form-group">
                                <label>Username</label>
                                <input class="form-control" id="username" type="text" name="username" value="<?php
                                echo $this->session->userdata('logged_in_admin')['username'];
                                ?>" placeholder="Username">
                            </div>

                            <div style="margin-top: 0px" class="form-group">
                                <label>Email</label>
                                <input class="form-control" id="email" type="text" name="email" value="<?php
                                echo $this->session->userdata('logged_in_admin')['email'];
                                ?>" placeholder="Email">
                            </div>

                            <div style="margin-top: 0px" class="form-group">
                                <label>Nomor Hp</label>
                                <input class="form-control" id="hp" type="text" name="hp" value="<?php
                                echo $this->session->userdata('logged_in_admin')['hp'];
                                ?>" placeholder="Nomor HP">
                            </div>

                            <div style="margin-top: 0px" class="form-group">
                                <label>Status</label>
                                <input disabled value="<?php
                                echo $this->session->userdata('logged_in_admin')['status'];
                                ?>" style="text-transform: capitalize;" class="form-control" id="disabledInput" type="text"  placeholder="Status">
                            </div>

                            <div class="form-group">
                                <span id="email_result"></span>
                            </div>

                <?php echo form_close(); ?>
              </div>
              </div>
              </div>
            </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<?php $this->load->view('global/05_controlbar'); ?>


<?php $this->load->view('global/06_footer'); ?>
<?php $this->load->view('global/07_javascript'); ?>
