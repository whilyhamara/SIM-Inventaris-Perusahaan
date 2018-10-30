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
            <h1>Tambah Peminjaman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo  site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/peminjaman'); ?>/daftar_peminjaman">Daftar Peminjaman</a></li>
              <li class="breadcrumb-item active">Tambah Peminjaman</li>
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



            <?php echo form_open('peminjaman/tambah_peminjaman'); ?>
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger"><strong><?php echo validation_errors(); ?></strong></div>
            <?php endif ?>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body p-0">

                    <br>
                    <table class="table border-transparent table-responsive" id="item_table1">
                          <!-- <label>Barang</label> -->
                          <tr>
                            <th width="20%"><p class="text-center">Kode Barang</p></th>
                            <th width="15%"><p class="text-center">Lokasi</p></th>
                            <th width="20%"><p class="text-center">NIP</p></th>
                            <th width="30%"><p class="text-center">Nama Peminjam</p></th>
                            <th width="5%" class="text-center"><button type="button" name="tambah1" class="btn btn-sm btn-success tambah1">Tambah</button></th>
                          </tr>
                        </table>
                </div>



                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button class="btn btn-primary">Submit</button>
                </div>

            </div>
            <?php echo form_close(); ?>
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
