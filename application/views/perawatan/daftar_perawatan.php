<?php
     $this->load->view('global/01_header');
    $this->load->view('global/02_navbar');
    $this->load->view('global/03_sidebar');

    ?>

<body>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Perawatan
              <a class="btn btn-default" href="<?php echo site_url('perawatan/cetakpdf') ?>" role="button"><img width="30px" height="30px" src="<?php echo base_url() ?>assets/img/pdf-.png"> Cetak PDF</a>
              <a class="btn btn-default" href="<?php echo site_url('perawatan/cetakxls') ?>" role="button"><img width="30px" height="30px" src="<?php echo base_url() ?>assets/img/excel.png"> Cetak Excel</a>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=<a href="<?php echo  site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar Perawatan</li>
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
              <a href="tambah_perawatan" class="btn btn-default bg-success">
              <i class="fa fa-plus">
                  Tambah Perawatan
              </i>
              </a>


            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive">

              <table id="example3" class="table border-transparent">
                <thead>

                <tr class="text-center">
                  <th>Kode Barang</th>
                  <th>Tipe Perawatan</th>
                  <th>Rekanan</th>
                  <th>Biaya</th>
                  <th>Tanggal/Waktu</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="show_data">
                  <?php foreach ($perawatan_list as $key) { ?>
                    <!-- <?php //echo "<pre>";    print_r($key);     exit();
                    ?> -->
                  <tr class='clickable-row' data-href='<?php echo site_url('inventaris/detail_inventaris/').$key->kd_barang.'/active/fade/fade'?>'>
                    <td align="center"><?php echo $key->kd_barang ?></td>
                    <td align="center"><?php echo $key->tipe ?></td>
                    <td align="center"><?php echo $key->rekanan ?></td>
                    <td align="center"><?php echo $key->biaya ?></td>
                    <td align="center"><?php echo $key->tanggal."/".$key->waktu ?></td>
                    <td class="text-center">
                      <a class="btn btn-info" href="<?php echo site_url('perawatan/kembali/').$key->id_perawatan."/".$key->kd_barang ?>" onClick="return confirm('Perawatan barang sudah selesai?')">
                        <i class="fa fa-frog"> Selesai
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

<?php //$this->load->view('global/05_controlbar'); ?>

<!-- modal Hapus -->
<script src="<?php echo base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js'></script>
</body>
<?php
    $this->load->view('global/05_controlbar');
    $this->load->view('global/07_javascript');
    $this->load->view('global/06_footer'); ?>
