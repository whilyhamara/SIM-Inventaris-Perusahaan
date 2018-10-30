<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo site_url('dashboard') ?>" class="brand-link">
    <img src="<?php echo base_url('assets/'); ?>img/inventaris_pelindo.png" alt="Pelindo Logo" class="img-thumbnail"
              style="opacity: .8"><br/>
    <span class="brand-text font-weight-light">

    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php if ($this->session->userdata('logged_in_admin')) {
          $foto = $this->session->userdata('logged_in_admin')['foto'];
        } else {
          $foto = $this->session->userdata('logged_in_user')['foto'];
        }

        if ($foto == null){ ?>
          <img src="<?php echo base_url('assets/');?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> <?php
        } else { ?>
          <img src="<?php echo base_url('assets/');?>img/profil/<?php echo $foto; ?>" class="img-circle elevation-2" alt="User Image">'; <?php
        } ?>


      </div>
      <div class="info">
        <a href="<?php echo site_url('user/edit_profil/').$this->session->userdata('logged_in_admin')['id_user']?>" class="d-block">
          <?php
          echo $this->session->userdata('logged_in_admin')['nama_user'];
          echo $this->session->userdata('logged_in_user')['nama_user'];
          ?>
        </a>
        
      </div>
    </div>




    <!-- Sidebar Menu -->
    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php if($this->session->userdata('logged_in_admin')['status'] == "admin") { ?>
          <li class="nav-item">
            <a href="<?php echo base_url('index.php/user/edit_password '); ?>" class="nav-link">
              <i class="fas fa-unlock-alt fa-lg"></i>
              <p>
                Edit Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('index.php/user/daftar_pegawai '); ?>" class="nav-link">
              <i class="fas fa-user fa-lg"></i>
              <p>
                Admin/Pegawai
              </p>
            </a>
          </li>
        <?php } ?>
        <li class="nav-header">TRANSAKSI</li>
        <li class="nav-item has-treeview">
          <a href="<?php echo base_url('index.php/inventaris/list_inventaris'); ?>" class="nav-link">
            <i class="fas fa-lg fa-dolly-flatbed text-danger"></i>
            <p>
              Inventaris
            </p>
          </a>

        </li>
        <li class="nav-item has-treeview">
          <a href="<?php echo base_url('index.php/peminjaman/daftar_peminjaman'); ?>" class="nav-link">
            <i class="fas fa-lg fa-book-open text-info"></i>
            <p>
              Peminjaman
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?php echo base_url('index.php/perawatan/daftar_perawatan'); ?>" class="nav-link">
            <i class="fas fa-lg fa-wrench text-default"></i>
            <p>
              Perawatan
            </p>
          </a>

        </li>


        <li class="nav-header"></li>

<!-- ----------------------------------------------------------------------------- -->

        <!-- <li class="nav-header">GENERAL</li>  -->



        <li class="nav-item has-treeview">
          <a href="<?php echo base_url('index.php/kategori/daftar_kategori'); ?>" class="nav-link">
            <i class="fa-lg fas fa-warehouse text-warning"></i>
            <p>
              Kategori Barang
            </p>
          </a>

        </li>
        <li class="nav-item has-treeview">
          <a href="<?php echo base_url('index.php/ruangan/daftar_ruangan'); ?>" class="nav-link">
            <i class="fas fa-lg fa-building text-success"></i>
            <p>
              Ruangan
            </p>
          </a>

        </li>

<!-- ---------------------------------------------------------------------------- -->

        <li class="nav-header"></li>
        <li class="nav-item">
          <a href="<?php echo base_url('index.php/login/logout'); ?>" class="nav-link">
            <i class="fas fa-lg fa-sign-out-alt"></i>
            <p>Log Out</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
