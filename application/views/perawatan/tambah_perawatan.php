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
            <h1>Tambah Perawatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/perawatan'); ?>/daftar_perawatan">Daftar Perawatan</a></li>
              <li class="breadcrumb-item active">Tambah Perawatan</li>
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

            <?php echo form_open('perawatan/tambah_perawatan'); ?>
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger"><strong><?php echo validation_errors(); ?></strong></div>
            <?php endif ?>

                <div class="card-body">
                   <div class="row">
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6">
                          <label>Kode Barang</label>
                          <select required name="kd_barang" class="form-control" id="optional" data-placeholder="Pilih Barang">
                            <?php foreach ($inventaris_list as $key) { ?>
                              <option disabled selected style='display:none; color:lightgray;'>Pilih Barang</option>
                              <option value="<?php echo $key->kd_barang; ?>"><?php echo $key->kd_barang; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-6">
                          <label>Tipe Perawatan</label>
                          <select required name="tipe" class="form-control" id="optional2" data-placeholder="Pilih Tipe Perawatan">
                            <option disabled selected style='display:none; color:lightgray;'>Pilih Tipe</option>
                            <option value="Perangkat Keras">Perangkat Keras</option>
                            <option value="Perangkat Lunak">Perangkat Lunak</option>
                            <option value="Jaringan">Jaringan</option>
                            <option value="Perangkat Keras & Perangkat Lunak">Perangkat Keras & Lunak</option>
                            <option value="Lain-lain">Lain-lain</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                      <label>Tanggal</label>
                      <input name="tanggal" type="date"  value="<?php echo date('Y-m-d') ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" disabled data-mask/>
                    </div>
                    <div class="col-3">
                      <label>Waktu</label>
                      <input name="waktu" type="times"  value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('H:i:s') ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" disabled data-mask>
                    </div>
                </div>

                <div class="row">
                  <div class="col-7">
                    <label>Keterangan</label>
                    <textarea name="keterangan" required="required" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="col-5">
                    <div class="col-12">
                      <label>Rekanan</label>
                      <input name="rekanan" required="required" class="form-control" type="text"/>
                    </div>
                    <div class="col-12">
                      <label>Biaya</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Rp.</span>
                        </div>
                        <input required="required" name="biaya" type="number" class="form-control">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>



                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button class="btn btn-primary">Submit</button>
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
<?php $this->load->view('global/06_footer'); ?>
<?php $this->load->view('global/07_javascript'); ?>
