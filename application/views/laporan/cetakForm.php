<?php
    $this->load->view('global/01_header');
    $this->load->view('global/02_navbar');
    $this->load->view('global/03_sidebar');

    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cetak Laporan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('inventaris/list_inventaris') ?>">Home</a></li>
              <li class="breadcrumb-item active">Cetak Laporan</li>
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
            <div class="card-header bg-info">


            </div>

            <!-- /.card-header -->
            <?php echo form_open('laporan/cetak'); ?>
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-4">
                    <label>Kategori</label>
                    <select name="id_kategori" class="form-control" id="id_kategori" data-placeholder="Semua Kategori">
                        <option selected>Semua Kategori</option>
                        <?php foreach ($kategori_list as $key) { ?>
                        <option value="<?php echo $key->id_kategori; ?>"><?php echo $key->nama_kategori; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-4">
                    <label>Ruangan</label>
                    <select name="id_ruangan" class="form-control" id="id_ruangan" data-placeholder="Semua Ruangan">
                        <option selected>Semua Ruangan</option>
                        <?php foreach ($ruangan_list as $key) { ?>
                        <option value="<?php echo $key->id_ruangan; ?>"><?php echo $key->nama_ruangan; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-4">
                    <label>Status</label>
                    <select name="status" class="form-control" id="status" data-placeholder="Semua Barang">
                      <option selected>Semua Barang</option>
                      <option value="Peminjaman">Peminjaman</option>
                      <option value="Perawatan">Perawatan</option>
                    </select>
                  </div>

                </div>

              </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer text-center">

                  <div class="">
                    <input type="submit" name="action" value="Cetak PDF" class="btn btn-lg btn-danger text-center">
                    <input type="submit" name="action" value="Cetak XLS"  class="btn btn-lg btn-success text-center"/>
                    <!-- <button name="action" type="submit" class="btn btn-lg btn-info text-center"><i class="far fa-file-pdf"></i>Cetak PDF</button>
                    <button name="action" type="submit" class="btn btn-lg btn-success text-center"><i class="far fa-file-excel"></i>Cetak XLS</button> -->
                </div>
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

<!-- modal Hapus -->


<?php $this->load->view('global/05_controlbar');

    $this->load->view('global/07_javascript');
    $this->load->view('global/06_footer'); ?>
