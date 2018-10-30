<?php
    $this->load->view('global/01_header');
    $this->load->view('global/02_navbar');
    $this->load->view('global/03_sidebar');

    ?>


  <!-- Modal Start -->
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Daftar Kontrak</h4>
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>
        <div class="modal-body">
          <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>Kode Kontrak</th>
                  <th>Nama Kontrak</th>
                </tr>
                </thead>
                <tbody id="show_data_supplier">
                <?php foreach ($kontrak_list as $key) { ?>
                <tr class='clickable-row' data-href='<?php echo site_url('kontrak/detail_kontrak/').$key->kd_kontrak ?>'>
                  <td><?php echo $key->kd_kontrak ?></td>
                  <td><?php echo $key->nama_kontrak ?></td>
                </tr>
              <?php } ?>
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default bg-danger" data-dismiss="modal">Close</button>
        </div>
      </div>

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
            <h1>Daftar Inventaris
              <a class="btn btn-default" href="<?php echo site_url('inventaris/cetakpdf') ?>" role="button"><img width="30px" height="30px" src="<?php echo base_url() ?>assets/img/pdf-.png"> Cetak PDF</a>
              <a class="btn btn-default" href="<?php echo site_url('inventaris/cetakxls') ?>" role="button"><img width="30px" height="30px" src="<?php echo base_url() ?>assets/img/excel.png"> Cetak Excel</a>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('inventaris/list_inventaris') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar Inventaris</li>
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
              <a href="tambah_inventaris" class="btn btn-default bg-success">
              <i class="fa fa-plus">
                  Tambah Inventaris
              </i>
              </a>

              <a href="add" class="btn btn-default bg-info" data-toggle="modal" data-target="#myModal">

                  Daftar Kontrak

              </a>

              <?php if ($this->session->flashdata('fail')): ?>
                  <a class="btn btn-default bg-danger"><?php echo $this->session->flashdata('fail'); ?></a>
              <?php endif ?>
              <?php if ($this->session->flashdata('inventaris_terhapus')): ?>
                  <a class="btn btn-default bg-warning"><?php echo $this->session->flashdata('inventaris_terhapus'); ?></a>
              <?php endif ?>

            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive">

              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>

                <tr class="text-center">
                  <th>QR Code</th>
                  <th>Kode Barang</th>
                  <th>Nomor/Nama Kontrak</th>
                  <th>Lokasi</th>
                  <th>Waktu</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="show_data_supplier">
                <?php foreach ($inventaris_list as $key ) { ?>
                  <!-- <?php //echo "<pre>";    print_r($key);     exit();
                  ?> -->
                <tr class='clickable-row' data-href='<?php echo site_url('inventaris/detail_inventaris/').$key->kd_barang.'/active/fade/fade'?>'>
                  <td align="center"><img width="50px" height="50px" src="<?php echo base_url('assets/img/qrcode/').$key->qrcode ?>"></td>
                  <td align="center"><?php echo $key->kd_barang; ?></td>
                  <td align="center"><?php echo $key->kd_kontrak."/".$key->nama_kontrak; ?></td>
                  <td align="center"><?php echo $key->nama_ruangan; ?></td>
                  <td align="center"><?php echo $key->tanggal."/".$key->waktu; ?></td>
                  <td align="center"><?php $status =  $key->kondisi;
                  if ($status == "0") {
                    echo "<label class='btn-sm btn-warning disabled'>Dipinjam</label>";
                  } else if($status == "1"){
                    echo "<label class='btn-sm btn-success disabled'>Tersedia</label>";
                  } else {
                    echo "<label class='btn-sm btn-info disabled'>Dirawat</label>";
                  }
                   ?></td>
                  <td class="text-center">
                    <a class="btn btn-default" href="<?php echo site_url('inventaris/detail_inventaris/').$key->kd_barang.'/fade/active/fade'?>">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger supplier_delete" href="<?php echo site_url('inventaris/hapus_inventaris/').$key->kd_barang."/".$key->kd_kontrak ?>" onClick="return confirm('Yakin ingin menghapus inventaris ini??')">
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
