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
            <h4 class="modal-title">Daftar Kategori</h4>
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          </div>
          <div class="modal-body">
            <?php echo form_open('kategori/tambah_kategori'); ?>
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger"><strong><?php echo validation_errors(); ?></strong></div>
            <?php endif ?>
              <table class="table table-bordered table-striped">
                  <tbody id="show_data_supplier">
                  <tr>
                    <td><div class="input-group">
                      <span class="input-group-addon"></span>
                      <input autofocus name="nama_kategori" id="nama_kategori" type="text" class="form-control" placeholder="Nama Kategori" re1required="required">
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
            <h1>Daftar Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo  site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar Kategori</li>
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
                  Tambah Kategori
              </i>
              </a>
                <?php if ($this->session->flashdata('kategori_add')): ?>
                    <a class="btn btn-default bg-info"><?php echo $this->session->flashdata('kategori_add'); ?></a>
                <?php endif ?>
                <?php if ($this->session->flashdata('kategori_gagal')): ?>
                    <a class="btn btn-default bg-danger"><?php echo $this->session->flashdata('kategori_gagal'); ?></a>
                <?php endif ?>
                <?php if ($this->session->flashdata('fail')): ?>
                    <a class="btn btn-default bg-danger"><?php echo $this->session->flashdata('fail'); ?></a>
                <?php endif ?>
                <?php if ($this->session->flashdata('kategori_terhapus')): ?>
                    <a class="btn btn-default bg-info"><?php echo $this->session->flashdata('kategori_terhapus'); ?></a>
                <?php endif ?>

            </div>
            <!-- /.card-header -->



            <div class="card-body table-responsive">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>Nama Kategori</th>
                  <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody id="show_data_supplier">

                <?php foreach ($kategori_list as $key) { ?>
                <tr class='clickable-row' data-href='<?php echo site_url('kategori/detail_kategori/').$key->nama_kategori ?>'>
                  <td align="center"><?php echo $key->nama_kategori; ?></td>
                  <td class="text-center">
                    <a class="btn btn-warning" href="<?php echo site_url('kategori/edit_kategori/').$key->id_kategori ?>">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger supplier_delete" href="<?php echo site_url('kategori/hapus_kategori/').$key->id_kategori ?>" onClick="return confirm('Are you sure to delete this data?')">
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
