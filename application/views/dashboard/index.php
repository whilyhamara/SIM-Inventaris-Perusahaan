  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $hitungKontrak ?></h3>

                <p>Jumlah Kontrak</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard-check"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fa fa"></i></a>
            </div>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $hitungInventaris ?><h3>

                <p>Jumlah Inventaris</p>
              </div>
              <div class="icon">
                <i class="fas fa-boxes"></i>
              </div>
              <a href="<?php echo site_url('inventaris/list_inventaris'); ?>" class="small-box-footer">Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $hitungPeminjaman ?></h3>

                <p>Jumlah Peminjaman</p>
              </div>
              <div class="icon">
                <i class="fas fa-dolly"></i>
              </div>
              <a href="<?php echo site_url('peminjaman/daftar_peminjaman'); ?>" class="small-box-footer">Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>

          </div>
          <div class="col-9">
            <div class="">
              <div class="card">
                <div class="card-header bg-info">
                  <label style="color: white;" class="card-title"><i class="fa fa-history"></i> Inventaris Terkini</label>
                  <!-- <h5 class="card-title"></h5> -->

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse">
                      <i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="row">
                    <div class="col-md-12">
                      <table id="" class="table table-condensed table-striped border-transparent">
                        <thead>

                          <tr class="text-center">
                            <th width="20%">Kode Barang</th>
                            <th width="30%">No/Nama Kontrak</th>
                            <th width="20%">Lokasi</th>
                            <th width="30%">waktu</th>
                          </tr>
                          </thead>
                          <tbody id="show_data_supplier">
                          <?php foreach ($inventaris_list as $key ) { ?>
                            <!-- <?php //echo "<pre>";    print_r($key);     exit();
                            ?> -->
                          <tr class='clickable-row' data-href='<?php echo site_url('inventaris/detail_inventaris/').$key->kd_barang.'/active/fade/fade'?>'>
                            <td align="center"><?php echo $key->kd_barang; ?></td>
                            <td align="center"><?php echo $key->kd_kontrak."/".$key->nama_kontrak; ?></td>
                            <td align="center"><?php echo $key->nama_ruangan; ?></td>
                            <td align="center"><?php echo $key->tanggal."/".$key->waktu; ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- ./card-body -->
              </div>
              <!-- /.card -->
            </div>


          </div>

        </div>


          <div class="">
            <div class="card p-0">
              <div class="card-header bg-info">
                <label style="color: white;" class="card-title"><i class="fa fa-history"></i> Kontrak Terkini</label>
                <!-- <h5 class="card-title"></h5> -->

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-condensed table-striped border-transparent">
                  <thead>

                    <tr class="text-center">
                      <th>Kode Kontrak</th>
                      <th>Nama Kontrak</th>
                    </tr>
                  </thead>
                  <tbody id="show_data_supplier">
                  <?php foreach ($kontrak_list as $key ) { ?>
                    <!-- <?php //echo "<pre>";    print_r($key);     exit();
                    ?> -->
                  <tr class='clickable-row' data-href='<?php echo site_url('kontrak/detail_kontrak/').$key->kd_kontrak ?>'>
                    <td align="center"><?php echo $key->kd_kontrak; ?></td>
                    <td align="center"><?php echo $key->nama_kontrak; ?></td>

                  </tr>
                <?php } ?>
                  </tbody>
                </table>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->

                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->

            </div>
            <!-- /.card -->
          </div>

        </div>

      </div>
        <!-- /.row -->

        <div class="row">
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
