<?php
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
            <h1>Detail <?php echo $namafix ?>
              <a class="btn btn-default" href="<?php echo site_url('kategori/cetakpdf/').$namafix ?>" role="button"><img width="30px" height="30px" src="<?php echo base_url() ?>assets/img/pdf-.png"> Cetak PDF</a>
              <a class="btn btn-default" href="<?php echo site_url('kategori/cetakxls/').$namafix ?>" role="button"><img width="30px" height="30px" src="<?php echo base_url() ?>assets/img/excel.png"> Cetak Excel</a>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo  site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo  site_url('kategori/daftar_kategori') ?>">Daftar Kategori</a></li>
              <li class="breadcrumb-item">Detail Kategori</li>
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

              <a href="add" class="btn btn-default" data-toggle="modal">
              <i class="fa fa-box">
                  Detail Kategori
              </i>
              </a>
              <?php if ($namafix=='PC'){ ?>
              <i class="fas fa-angle-right"></i>
              <a class="btn btn-default bg-info" disabled>
              <i class="fas fa-desktop">
                  PC
              </i>
              </a>
              <?php } else if ($namafix=='RAM'){ ?>
              <i class="fas fa-angle-right"></i>
              <a class="btn btn-default bg-info" disabled>
                <i class="fas fa-memory">
                    RAM
                </i>
              </a>
              <?php } else if ($namafix=='Harddisk'){ ?>
              <i class="fas fa-angle-right"></i>
              <a class="btn btn-default bg-info">
                <i class="fas fa-hdd">
                  HDD
                </i>
              </a>
            <?php } else if ($namafix=='Printer'){ ?>
              <i class="fas fa-angle-right"></i>
              <a class="btn btn-default bg-info">
                <i class="fas fa-print">
                  Printer
                </i>
              </a>
            <?php } else{ ?>
              <i class="fas fa-angle-right"></i>
              <a class="btn btn-default bg-info">
                <i class="fas fa-box">
                  Lain-lain
                </i>
              </a>
            <?php } ?>
            </div>
            <!-- /.card-header -->



            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th width="15%">Kode Barang</th>
                  <th width="20%">No/Nama Kontrak</th>
                  <th width="50%">Spesifikasi</th>
                  <th width="15%">Status</th>
                </tr>
                </thead>
                <tbody id="show_data_supplier">

                <?php foreach ($detail_kategori as $key) { ?>
                <tr class='clickable-row' data-href='<?php echo site_url('inventaris/detail_inventaris/').$key->kd_barang.'/active/fade/fade'?>'>
                  <td align="center"><?php echo $key->kd_barang; ?></td>
                  <td align="center"><?php echo $key->kd_kontrak."/".$key->nama_kontrak ?></td>
                  <td align="center"><?php echo $key->spesifikasi; ?></td>
                  <td align="center"><?php $status =  $key->kondisi;
                   if ($status == "0") {
                     echo "<label class='btn-sm btn-warning disabled'>Dipinjam</label>";
                   } else if($status == "1"){
                     echo "<label class='btn-sm btn-success disabled'>Tersedia</label>";
                   } else {
                     echo "<label class='btn-sm btn-info disabled'>Dirawat</label>";
                   }
                   ?></td>

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

<?php $this->load->view('global/05_controlbar');
    $this->load->view('global/07_javascript');
    $this->load->view('global/06_footer'); ?>
