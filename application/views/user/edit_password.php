<?php $this->load->view('global/01_header'); ?>
<?php $this->load->view('global/02_navbar'); ?>
<?php $this->load->view('global/03_sidebar'); ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Menu Admin</a></li>
              <li class="breadcrumb-item active">Edit Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card card-primary">

            <?php echo form_open('user/tambah_pegawai'); ?>
            <?php if (validation_errors()): ?>
                <div class="alert alert-">
                	<strong>
                		<?php echo validation_errors(); ?>
                	</strong>
                </div>
            <?php endif ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-">
                	<strong>
                		<?php echo $this->session->flashdata('error'); ?>
                	</strong>
                </div>
            <?php endif ?>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <label>Nama User</label>
                      <input disabled="disabled" value="<?php echo set_value('nama_user') ?>" id="nama_user" name="nama_user" type="text" class="form-control" placeholder="Isi Nama">
                    </div>
                    <div class="col-5">
                      <label>Alamat Email</label> <span id="iEmail_result"></span>
                      <input disabled="disabled" value="<?php echo set_value('email') ?>" id="iEmail" name="email" type="email" class="form-control" placeholder="Isi alamat email">
                    </div>
                    <div class="col-3">
                      <label>Username</label> <span id="iUsername_result"></span>
                      <input disabled="disabled" value="<?php echo set_value('username') ?>" id="iUsername" name="username" type="text" class="form-control" placeholder="Isi Username">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-4">
                  		<label>Password Lama</label>
                  		<input required="required" value="<?php echo set_value('password') ?>" id="password" name="password" type="Password" class="form-control" placeholder="Isi Password">
                  	</div>
                    <div class="col-4">
                      <label>Password </label>&nbsp<label class="text-primary">Baru</label>
                      <input required="required" value="<?php echo set_value('password') ?>" id="password" name="password" type="Password" class="form-control" placeholder="Isi Password">
                    </div>
                    <div class="col-4">
                      <label>Konfirmasi Password</label>&nbsp<label class="text-primary">Baru</label>
                      <input required="required" value="<?php echo set_value('password') ?>" id="password" name="password" type="Password" class="form-control" placeholder="Isi Password">
                    </div>
                  	


                  </div>
                </div>



                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button type="button" class="btn btn-info">Submit</button>
                </div>
              <?php echo form_close(); ?>
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
