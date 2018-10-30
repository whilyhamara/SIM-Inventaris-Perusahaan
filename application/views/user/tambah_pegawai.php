<?php $this->load->view('global/01_header'); ?>
<?php $this->load->view('global/02_navbar'); ?>
<?php $this->load->view('global/03_sidebar'); ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>/user/daftar_pegawai">Daftar Pegawai</a></li>
              <li class="breadcrumb-item active">Tambah Admin</li>
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
                      <input required="required" value="<?php echo set_value('nama_user') ?>" id="nama_user" name="nama_user" type="text" class="form-control" placeholder="Isi Nama">
                    </div>
                    <div class="col-5">
                      <label>Alamat Email</label> <span id="iEmail_result"></span>
                      <input required="required" value="<?php echo set_value('email') ?>" id="iEmail" name="email" type="email" class="form-control" placeholder="Isi alamat email">
                    </div>
                    <div class="col-3">
                        <label>Nomor HP</label> <span id="iHP_result"></span>
                      <input required="required" value="<?php echo set_value('hp') ?>" name="hp" id="iHP" type="number"  value="" class="form-control">
                    </div>
                  </div>

                  <div class="row">
                  	<div class="col-4">
                  		<label>Username</label> <span id="iUsername_result"></span>
                  		<input required="required" value="<?php echo set_value('username') ?>" id="iUsername" name="username" type="text" class="form-control" placeholder="Isi Username">
                  	</div>
                    <div class="col-4">
                  		<label>Password</label>
                  		<input required="required" value="<?php echo set_value('password') ?>" id="password" name="password" type="Password" class="form-control" placeholder="Isi Password">
                  	</div>
                  	<div class="col-4">
                  		<label>Status</label>
                  		<select required name="status" class="form-control" id="optional2" data-placeholder="Pilih Status">
                        <option disabled selected style='display:none; color:lightgray;'>Pilih Status</option>
                  			<option value="admin">Admin</option>
                  			<option value="user">Pegawai</option>
                  		</select>
                  	</div>
                    <div class="col-12">
                      <label for="exampleInputFile">Upload Foto</label>
                      <div class="input-group">
                        <div>
                          <input type="file" class="" name="userfile" id="files">
                        </div>
                      </div>
                  	</div>


                  </div>
                </div>



                <!-- /.card-body -->

                <div class="card-footer">
                  <?php $email = '<span id="iEmail_result"></span>';
                        $username = '<span id="iUsername_result"></span>';
                        $hp = '<span id="iHP_result"></span>';

                        $sip = '<label class="text-success"><span class="fa fa-check-circle"></span></label>';

                        if ($email == $sip || $username == $sip || $hp == $sip) { ?>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        <?php } ?>
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
