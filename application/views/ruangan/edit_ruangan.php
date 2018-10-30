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
            <h1>Update Ruangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="">Ruangan List</a></li>
              <li class="breadcrumb-item active">Update Ruangan</li>
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
            <?php foreach ($get_ruangan as $key) { ?>
              <!-- /.card-header -->
              <!-- form start -->
              <?php echo form_open('Ruangan/edit_ruangan/'.$this->uri->segment(3)); ?>
              <?php echo validation_errors(); ?>

                <div class="card-body">
                  <div class="form-group">
                    <label for="">KD Ruangan</label>
                    <input required type="text" class="form-control" id="kd_ruangan" name="kd_ruangan" type="text" placeholder="Masukkan Kode" value="<?php echo $key->kd_ruangan; ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Nama Ruangan</label>
                    <input required type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" type="text" placeholder="Masukkan Nama Ruangan" value="<?php echo $key->nama_ruangan; ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Nama Gedung</label>
                    <input required type="text" class="form-control" id="nama_gedung" name="nama_gedung" type="text" placeholder="Masukkan Nama Gedung" value="<?php echo $key->nama_gedung; ?>">
                  </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button> -->

                  <div class="form-group">
                  <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>  Edit</button>



                </div><?php } ?>
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
