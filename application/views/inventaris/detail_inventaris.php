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
            <h1>Detail Inventaris</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo  site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Detail Inventaris</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card p-0">
            <div class="card-header">
            	<ul class="nav nav-tabs">
                <li class="active">
                  <a class="btn btn-default" data-toggle="tab" href="#menu1">
                    <i class="fa fa-search">
                      Detail Inventaris
                    </i>
                  </a>
                </li>
                <li>
                  <a class="btn btn-default" data-toggle="tab" href="#menu2">
                    <i class="fa fa-edit">
                      Edit Inventaris
                    </i>
                  </a>
                </li>
                <li>
                  <a class="btn btn-default" data-toggle="tab" href="#menu3">
                    <i class="fa fa-history">
                      Histori Inventaris
                    </i>
                  </a>
                </li>
              	</ul>
              	<div class="tab-content">
              	<div class="tab-pane <?php echo $satu ?>" id="menu1">
                  <br>
                	<div class="card-body p-0">
                		<table class="table table-condensed table-striped">
                        <?php foreach ($inventaris_detail as $key) { ?>
	                            <tbody class="col-12">
	                            	<tr>
		                              <td style="text-align:left; ">
		                              	<b>
		                              		Kode Barang
		                              	</b>
		                              </td>
		                              <td style="width:80%">
		                              	  <?php echo $key->kd_barang ?>
		                              </td>
		                            </tr>
		                            <tr>
		                              <td style="text-align:left;">
		                              	<b>
		                              		Kode Kontrak
		                              	</b>
		                              </td>
		                              <td>
		                              	<?php echo $key->kd_kontrak ?>
		                              </td>
		                            </tr>
		                            <tr>
		                              <td style="text-align:left;">
		                              	<b>
		                              		Nama Kontrak
		                              	</b>
		                              </td>
		                              <td>
		                              	   <?php echo $key->nama_kontrak ?>
		                              </td>
		                            </tr>
		                            <tr>
		                              <td style="text-align:left;">
		                              	<b>
		                              		Nama Kategori
		                              	</b>
		                              </td>
		                              <td>
  		                              	<?php echo $key->nama_kategori ?>
		                              </td>
		                            </tr>
		                            <tr>
		                              <td style="text-align:left;">
		                              	<b>
		                              		Nama Ruang
		                              	</b>
		                              </td>
		                              <td>
  		                              	<?php echo $key->nama_ruangan ?>
		                              </td>
		                            </tr>
		                            <tr>
		                              <td style="text-align:left;">
		                              	<b>
		                              		Nama Gedung
		                              	</b>
		                              </td>
		                              <td>
  		                              	<?php echo $key->nama_gedung ?>
		                              </td>
		                            </tr>
                                <tr>
		                              <td style="text-align:left;">
		                              	<b>
		                              		Pengguna
		                              	</b>
		                              </td>
		                              <td>
  		                              	<?php echo $key->pengguna ?>
		                              </td>
		                            <tr>
		                              <td style="text-align:left;">
		                              	<b>
		                              		Spesifikasi
		                              	</b>
		                              </td>
		                              <td>
  		                              	<?php echo $key->spesifikasi ?>
		                              </td>
		                            </tr>
		                            <tr>
		                              <td style="text-align:left;">
		                              	<b>
		                              		Tanggal
		                              	</b>
		                              </td>
		                              <td>
  		                              	<?php echo $key->tanggal ?>
		                              </td>
		                            </tr>
		                            <tr>
		                              <td style="text-align:left;">
		                              	<b>
		                              		Waktu
		                              	</b>
		                              </td>
		                              <td>
		                              	   <?php echo $key->waktu ?>
		                              </td>
		                            </tr>
                                <tr>
		                              <td style="text-align:left;">
		                              	<b>
		                              		Status
		                              	</b>
		                              </td>
		                              <td>
		                              	   <?php $status =  $key->kondisi;
                                        if ($status == "0") {
                                          echo "<label class='btn-sm btn-warning disabled disabled'>Dipinjam</label>";
                                        } else if($status == "1"){
                                          echo "<label class='btn-sm btn-success disabled'>Tersedia</label>";
                                        } else {
                                          echo "<label class='btn-sm btn-info disabled'>Dirawat</label>";
                                        }
                                        ?>
		                              </td>
		                            </tr>
                                <tr>
		                              <td style="text-align:left;">
		                              	<b>
		                              		QR Code
		                              	</b>
		                              </td>
		                              <td>
                                     <div class="right_content">
                                        <a target="_blank" href="<?php echo base_url('assets/img/qrcode/').$key->qrcode ?>"><img width="100px" height="100px" src="<?php echo base_url('assets/img/qrcode/').$key->qrcode ?>"></a>
                                    </div>
                                    <hr>
                                    <input type='submit' class='btn-sm btn-info' value='Print QR Code' id="pdf">
                                  </td>
		                            </tr>
	                          </tbody>
                          <?php } ?>
	              		</table>
                	</div>

              	</div>
              <br>
             	<div class="tab-pane <?php echo $dua ?>" id="menu2">

                        <?php echo form_open_multipart('inventaris/edit_inventaris/'.$this->uri->segment(3)); ?>
                        <?php foreach ($inventaris_detail as $key) { ?>
                        <div class="card-body p-0">
                            <div class="form-group row">
	                            <div class="col-3">
	                              	<label for="example">Kode Kontrak</label>
	                                <input type="text" name="no_inv" disabled="" class="form-control" id="inputError" value="<?php echo $key->kd_kontrak ?>">
	                            </div>
                             	<div class="col-3">
                                 	<label for="example">Kode Barang</label>
                                 	<input type="text" name="no_inv" disabled="" class="form-control" id="inputError" value="<?php echo $key->kd_barang ?>">
                            	</div>
	                            <div class="col-3">
	                            	<label for="example">Tanggal</label>
	                            	<div class="input-group">
					                    <div class="input-group-prepend">
					                    	<span class="input-group-text"><i class="fa fa-calendar"></i></span>
					                    </div>
					                    <input type="date" disabled value="<?php echo date('Y-m-d') ?>" class="form-control"  data-mask>
					                </div>
	                            </div>
	                            <div class="col-3">
	                            	<label for="example">Waktu</label>
	                            	<div class="input-group">
					                    <div class="input-group-prepend">
					                      	<span class="input-group-text"><i class="fa fa-clock-o"></i></span>
					                    </div>
					                    <input type="times" disabled value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('H:i:s') ?>" class="form-control float-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
					                </div>
	                            </div>

	                            <div class="col-6">
	                              	<label for="example">Nama Kontrak</label>
	                                <input disabled type="text" name="no_inv" class="form-control" id="inputError" value="<?php echo $key->nama_kontrak ?>">
                                  <input hidden type="text" name="status" class="form-control" id="inputError" value="<?php echo $key->kondisi ?>">
	                            </div>
                            <?php } ?>
	                            <div class="col-2">
	                              	<label for="example">Nama Kategori</label>
                                  <select disabled name="id_kategori" class="form-control item_unit">
                                    <option disabled selected style="display:none; color:lightgray;">Pilih Kategori</option>
                                    <?php
                                      foreach ($inventaris_detail as $key) {
                                        echo "<option selected style='display:none' value='".$key->id_kategori."'>".$key->nama_kategori."</option>";
                                      }
                                      foreach ($kategori_list as $key) { ?>
                                      <option value="<?php echo $key->id_kategori; ?>"><?php echo $key->nama_kategori; ?></option>
                                    <?php } ?>
                                    <?php foreach ($inventaris_detail as $key) { ?>
                                  </select>
	                            </div>
	                            <div class="col-4">
	                              	<label for="example">Nama Pengguna</label>
                                  <input hidden type="text" name="pengguna" class="form-control" id="inputError" placeholder="Nama Pengguna" value="<?php echo $key->pengguna?>">
	                                <input disabled type="text" name="" class="form-control" id="inputError" placeholder="Nama Pengguna" value="<?php $pengguna = $key->pengguna;
                                  if ($pengguna == "Belum diinput") {
                                    echo "";
                                  } else {
                                    echo $key->pengguna;
                                  }
                                   ?>">
	                            </div>
	                            <div class="col-6">
		                        	<label for="example">Spesifikasi</label>
		                            <textarea required rows="4" type="text" name="spesifikasi" class="form-control" id="inputError"><?php echo $key->spesifikasi ?></textarea>
	                           	</div>
                             	<div class="col-6">
                                 	<label for="example">Ruangan</label>
                                  <select name="id_ruangan" class="form-control item_unit" id="optional">
                                    <option disabled selected style="display:none; color:lightgray;">Pilih Ruangan</option>
                                  <?php }
                                      foreach ($inventaris_detail as $key) {
                                      echo "<option selected style='display:none' value='".$key->id_ruangan."'>".$key->nama_ruangan."</option>";
                                           }
                                      foreach ($ruangan_list as $key) { ?>

                                      <option value="<?php echo $key->id_ruangan; ?>"><?php echo $key->nama_ruangan; ?></option>
                                    <?php } ?>
                                    <?php foreach ($inventaris_detail as $key) { ?>
                                  </select>
                            	</div>

                            </div>

                            <div class="form-group row">
                            </div>

                            </div><!-- /.box-body -->

                            <div class="card-footer text-center">
                                <button type="submit" name="submit" class="btn btn-primary"><i class=""></i>Simpan</button>
                            </div>
                            <?php echo form_close(); ?>
                      <?php } ?>
                        </div>

                      <div class="tab-pane <?php echo $tiga ?> table-responsive" id="menu3">
                            	<div class="card-body p-0">
                            		<table id="example3" class="table table-condensed table-striped">
                            		<thead>
                            			<tr class="text-center">
      			                      <th>Tanggal</th>
                                  <th>Ruangan</th>
      			                      <th>Pengguna</th>
      			                      <th>Status</th>
      			                    </tr>
                            		</thead>
                            		<tbody>
                                  <?php foreach ($riwayat as $key) { ?>
                                  <tr>
      			                      <td align="center"><?php echo $key->tanggal."/".$key->waktu ?></td>
                                  <td align="center"><?php echo $key->nama_ruangan ?></td>
      			                      <td align="center"><?php echo $key->pengguna ?></td>
      			                      <td align="center"><?php $status =  $key->status_riwayat;
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
               	</div>


            </div>
            <!-- /.card-header -->



            <!-- <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>Nama Kategori</th>
                  <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody id="show_data_supplier">

                <?php foreach ($kategori_list as $key) { ?>
                <tr>
                  <td align="center"><?php echo $key->nama_kategori; ?></td>
                  <td class="text-center">
                    <a class="btn btn-warning" data-toggle="modal" data-target="#myModal" href="<?php echo site_url('kategori/edit_kategori/').$key->id_kategori ?>">
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
            </div> -->
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
<!-- CONTENT END -->
<?php
$this->load->view('global/05_controlbar');
$this->load->view('global/05_controlbar');
$this->load->view('global/07_javascript');
$this->load->view('global/06_footer');
?>
