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
            <h1>Daftar Peminjaman
              <a class="btn btn-default" href="<?php echo site_url('peminjaman/cetakpdf') ?>" role="button"><img width="30px" height="30px" src="<?php echo base_url() ?>assets/img/pdf-.png"> Cetak PDF</a>
              <a class="btn btn-default" href="<?php echo site_url('peminjaman/cetakxls') ?>" role="button"><img width="30px" height="30px" src="<?php echo base_url() ?>assets/img/excel.png"> Cetak Excel</a>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=<a href="<?php echo  site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar Peminjaman</li>
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
              <a href="<?php echo site_url('peminjaman/tambah_peminjaman') ?>" class="btn btn-default bg-success">
              <i class="fa fa-plus">
                  Tambah Pinjam
              </i>
              </a>


            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive">

              <table id="example3" class="table border-transparent">
                <thead>

                <tr class="text-center">
                  <th>Kode Barang</th>
                  <th>Lokasi</th>
                  <th width="30%">NIP/Peminjam</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="show_data_supplier">

                <?php foreach ($peminjaman_list as $key) { ?>
                  <!-- <?php //echo "<pre>";    print_r($key);     exit();
                  ?> -->
                <tr class='clickable-row' data-href='<?php echo site_url('inventaris/detail_inventaris/').$key->kd_barang.'/active/fade/fade'?>'>
                  <td align="center"><?php echo $key->kd_barang ?></td>
                  <td align="center"><?php echo $key->nama_ruangan ?></td>
                  <td align="center"><?php echo $key->nip."/".$key->nama_peminjam ?></td>
                  <td align="center"><?php echo $key->tanggal."/".$key->waktu ?></td>
                  <td class="text-center">
                    <a class="btn btn-warning" href="<?php echo site_url('peminjaman/kembali/').$key->id_peminjaman."/".$key->kd_barang."/".$key->id_ruangan ?>" onClick="return confirm('Ingin mengembalikan inventaris yang dipinjam?')">
                      <i class="fa fa-frog"> Kembalikan
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


<?php $this->load->view('global/05_controlbar');
      $this->load->view('global/07_javascript');
      $this->load->view('global/06_footer'); ?>
