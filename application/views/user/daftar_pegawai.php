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
            <h1>Daftar Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/Inventaris-Pelindo3/index.php/superadmin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Daftar Pegawai</li>
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
              <a href="<?php echo site_url('user/tambah_pegawai') ?>" class="btn btn-success">
              <i class="fa fa-plus">
              </i>
              <b>
                Tambah Pegawai
              </b>
              </a>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>

                <tr class="text-center">
                  <th>Foto</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Nama User</th>
                  <th>Email</th>
                  <th>No.HP</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="show_data_supplier">
                <?php  foreach ($user_list as $key ) { ?>
                  <!-- <?php //echo "<pre>";    print_r($key);     exit();
                  ?> -->
                <tr class='' data-href='<?php // echo site_url('inventaris/detail_inventaris/').$key->kd_barang.'/active/fade/fade'?>'>
                  <td align="center"><img width="75px" height="75px" src="<?php if($key->foto == null){
                    echo base_url('assets/img/logo-pelindo.png');
                  } else {
                    echo base_url('assets/img/profil/').$key->foto; } ?>"></td>
                  <td align="center"><?php echo $key->username; ?></td>
                  <td align="center"><?php if ($key->status=="admin") {
                    echo "Admin";
                  } else {
                    echo "Pegawai";
                  }
                   ?></td>
                  <td align="center"><?php echo $key->nama_user; ?></td>
                  <td align="center"><?php echo $key->email; ?></td>
                  <td align="center"><?php echo $key->hp; ?></td>
                  <td class="text-center" width="3%">
                    <a class="btn btn-danger supplier_delete" href="#" onClick="return confirm('Are you sure to delete this data?')">
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

<?php $this->load->view('global/05_controlbar');

    $this->load->view('global/07_javascript');
    $this->load->view('global/06_footer'); ?>
