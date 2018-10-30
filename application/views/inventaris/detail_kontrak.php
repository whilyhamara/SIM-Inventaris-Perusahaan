<?php
$this->load->view('global/01_header');
$this->load->view('global/02_navbar');
$this->load->view('global/03_sidebar');
?>
<!-- CONTENT START -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php foreach ($detail_kontrak as $key) { ?>
            <h1>Detail Kontrak <?php echo $key->kd_kontrak."/".$key->nama_kontrak ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo  site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar Inventaris</li>
              <li class="breadcrumb-item active">Detail Kontrak</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">



            <div class="card card-default">

              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <!-- The body of the card -->
                <div class="row">
                	<div class="col-3">
                	<label>Kode Kontrak</label>
                	<input value="<?php echo $key->kd_kontrak ?>" class="form-control" type="text" placeholder="Kode Kontrak" disabled="" />
                	</div>
                	<div class="col-9">
                	<label>Nama Kontrak</label>
                	<input value="<?php echo $key->nama_kontrak ?>" class="form-control" type="text" placeholder="Kode Kontrak" disabled="" />
                	</div>
                <?php } ?>
                </div><br/>
                <div class="col-12">
                	<table id="example1" class="table table-transparent table-striped table-hover">
                		<thead class="">
                			<tr class="text-center">
                				<th width="20%">
                					Kode Barang
                				</th>
                				<th width="15%">
                					Kategori
                				</th>
                				<th width="50%">
                					Ruangan
                				</th>
                				<th width="15%">
                					Status
                				</th>
                			</tr>
                		</thead>
                		<tbody id="show_data">
                        <?php foreach ($detail_barang as $key) { ?>
                        <tr class='clickable-row' data-href='<?php echo site_url('inventaris/detail_inventaris/').$key->kd_barang.'/active/fade/fade'?>'>
                          <td align="center"><?php echo $key->kd_barang ?></td>
                          <td align="center"><?php echo $key->nama_kategori ?></td>
                          <td align="center"><?php echo $key->nama_ruangan ?></td>
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
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card-header -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- CONTENT END -->
<?php
$this->load->view('global/05_controlbar');
$this->load->view('global/05_controlbar');
$this->load->view('global/07_javascript');
$this->load->view('global/06_footer');
?>
