<?php
    $this->load->view('global/02_navbar');
    $this->load->view('global/03_sidebar');

    ?>

    <!-- Modal Start -->

    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h4 class="modal-title">Daftar Ruangan</h4>
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          </div>
          <div class="modal-body">
            <?php echo form_open('ruangan/tambah_ruangan'); ?>
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger"><strong><?php echo validation_errors(); ?></strong></div>
            <?php endif ?>
              <table class="table table-bordered table-striped">
                  <tbody id="show_data_supplier">
                  <tr>
                    <td><div class="input-group">
                      <span class="input-group-addon"></span>
                      <input autofocus name="kd_ruangan" id="kd_ruangan" type="text" class="form-control" placeholder="Kode Ruangan" re1required="required">
                    </div></td>
                    <td><div class="input-group">
                      <span class="input-group-addon"></span>
                      <input name="nama_ruangan" id="nama_ruangan" type="text" class="form-control" placeholder="Nama Ruangan" re1required="required">
                    </div></td>
                  </tr>
                  <tr >
                    <td colspan="2"><div class="input-group">
                      <span class="input-group-addon"></span>
                      <input name="nama_gedung" id="nama_gedung" type="text" class="form-control" placeholder="Nama Gedung" re1required="required">
                    </div></td>
                  </tr>
                  </tbody>
                </table>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-default bg-success">Simpan</button>
            <button type="button" class="btn btn-default bg-danger" data-dismiss="modal">Tutup</button>
          </div>
        </div> <?php echo form_close(); ?>

      </div>
    </div>
    <!-- Modal End -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Ruangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo  site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar Ruangan</li>
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
            <div class="card-header">
              <a href="add" class="btn btn-default bg-success" data-toggle="modal" data-target="#myModal">
              <i class="fa fa-plus">
                  Tambah Ruangan
              </i>
              </a>
                <?php if ($this->session->flashdata('ruangan_add')): ?>
                    <a class="btn btn-default bg-info"><?php echo $this->session->flashdata('ruangan_add'); ?></a>
                <?php endif ?>
                <?php if ($this->session->flashdata('ruangan_gagal')): ?>
                    <a class="btn btn-default bg-danger"><?php echo $this->session->flashdata('ruangan_gagal'); ?></a>
                <?php endif ?>
                <?php if ($this->session->flashdata('fail')): ?>
                    <a class="btn btn-default bg-danger"><?php echo $this->session->flashdata('fail'); ?></a>
                <?php endif ?>
                <?php if ($this->session->flashdata('ruangan_terhapus')): ?>
                    <a class="btn btn-default bg-info"><?php echo $this->session->flashdata('ruangan_terhapus'); ?></a>
                <?php endif ?>

            </div>
            <!-- /.card-header -->



            <div class="card-body table-responsive">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>Kode Ruangan</th>
                  <th>Nama Ruangan</th>
                  <th>Nama Nama Gedung</th>
                  <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody id="show_data_supplier">

                <?php foreach ($ruangan_list as $key) { ?>
                <tr>
                  <td align="center"><?php echo $key->kd_ruangan; ?></td>
                  <td align="center"><?php echo $key->nama_ruangan; ?></td>
                  <td align="center"><?php echo $key->nama_gedung; ?></td>
                  <td class="text-center">
                    <a class="btn btn-warning" href="<?php echo site_url('ruangan/edit_ruangan/').$key->id_ruangan ?>">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger supplier_delete" href="<?php echo site_url('ruangan/hapus_ruangan/').$key->id_ruangan ?>" onClick="return confirm('Are you sure to delete this data?')">
                      <i class="fa fa-trash">
                      </i>
                    </a>
                 </td>
                </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
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

<!-- modal Hapus -->


<?php $this->load->view('global/05_controlbar');
    $this->load->view('global/07_javascript');
    $this->load->view('global/06_footer'); ?>
