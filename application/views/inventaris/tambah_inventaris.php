<?php $this->load->view('global/01_header'); ?>
<?php $this->load->view('global/02_navbar'); ?>
<?php $this->load->view('global/03_sidebar'); ?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Inventaris</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('inventaris/daftar_inventaris'); ?>">Daftar Inventaris</a></li>
              <li class="breadcrumb-item active">Tambah Inventaris</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card card-primary">

            <?php echo form_open('inventaris/tambah_inventaris'); ?>
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger"><strong><?php echo validation_errors(); ?></strong></div>
            <?php endif ?>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <label>No SPB</label>
                      <input required="required" id="kd_kontrak" name="kd_kontrak" type="text" class="form-control" placeholder="Isi Nomor SPB" value="<?php echo set_value('kd_kontrak') ?>">
                    </div>
                    <div class="col-6">
                      <label>Nama Kontrak</label>
                      <input required="required" name="nama_kontrak" type="text" class="form-control" placeholder="Isi Nama Kontrak" value="<?php echo set_value('nama_kontrak') ?>">
                    </div>
                    <div class="col-3">
                        <label>Tanggal</label>
                      <input name="tanggal" type="date"  value="<?php echo date('Y-m-d') ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div>
                  </div>


                    <br>
                    <table class="table table-bordered table-responsive" id="item_table">
                          <label>Barang</label>
                          <tr>
                            <th><p>Kategori</p></th>
                            <th><p>Lokasi</p></th>
                            <th><p>Spesifikasi</p></th>
                            <th width="10%"><p>Jumlah</p></th>
                            <th width="5%"><button type="button" name="tambah" class="btn btn-success tambah">Tambah</button></th>
                          </tr>
                          <!-- <td>
                            <select required="required" name="id_kategori[]" class="form-control" id="optional" data-placeholder="Pilih Barang"
                            >
                            <option disabled selected style='display:none; color:lightgray;'>Pilih Tipe</option>
                            <?php foreach ($kategori_list as $key) { ?>
                              <option value="<?php echo $key->id_kategori; ?>"><?php echo $key->nama_kategori; ?></option><?php } ?>
                            </select></td> -->
                        </table>
                </div>



                <!-- /.card-body -->

                <div class="card-footer">
                  <span id="kontrak_result"></span>
                </div>
              <?php echo form_close(); ?>
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
<?php $this->load->view('global/06_footer'); ?>
<?php $this->load->view('global/07_javascript'); ?>
