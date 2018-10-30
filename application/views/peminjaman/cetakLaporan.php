<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
    <style>
    table{
        border-collapse: collapse;
        width: 100%;
        margin: 0 auto;
    }
    table th{
        border:0px solid #000;
        padding: 3px;
        font-weight: bold;
        text-align: center;
    }
    table td{
        border:1px solid #000;
        padding: 3px;
        vertical-align: top;
    }
    </style>
</head>
<body>
  <table width="100%">
    <tr>
      <th colspan="2" valign="middle" align="center"><img src="assets/img/logo-pelindo.png" width="125px" height="125px"></td>
      <th colspan="1" align="center"><p style="font-family: arial; font-size: 16pt; font-weight: bold;">PT. PELABUHAN INDONESIA III (PERSERO)<br>CABANG TANJUNG PERAK<br><small style="font-weight: all;">Jl. Perak Timur No. 620 Surabaya, 60165<br>Telp. (031) 3291992 s/d 96, Fax. 031-3293994</small></p></td>
      <th valign="middle" align="center">LAPORAN <br>PEMINJAMAN<br><?php $kembali = date('d/m/Y'); echo $kembali ?></td>
    </tr>
  </table>
  <table width="100%">
  <tr><th><hr style="border:0px"></th></tr>
  <tr><th><hr style="border:0px"></th></tr>
  <tr><th><hr style="border:0px"></th></tr>
  <tr><th><hr style="border:0px"></th></tr>
  <tr><th><hr style="border:0px"></th></tr>
  <tr><th><hr style="border:0px"></th></tr>
  <tr><th colspan="5"><hr></th></tr>
  <tr><th><hr style="border:0px"></th></tr>
  <tr>
      <td valign="middle" align="center">Kode Barang</td>
      <td valign="middle" align="center">Lokasi</td>
      <td valign="middle" align="center">Tanggal/Waktu</td>
      <td valign="middle" align="center">NIP Pengguna</td>
      <td valign="middle" align="center">Nama Pengguna</td>
  </tr>
  <?php foreach ($peminjaman_list as $key) { ?>
  <tr>
      <td valign="middle" align="center"><?php echo $key->kd_barang; ?></td>
      <td valign="middle" align="center"><?php echo $key->nama_ruangan."/".$key->nama_gedung; ?></td>
      <td valign="middle" align="center"><?php echo $key->tanggal."/".$key->waktu; ?></td>
      <td valign="middle" align="center"><?php echo $key->nip; ?></td>
      <td valign="middle" align="center"><?php echo $key->nama_peminjam; ?></td>
  </tr>
<?php } ?>
  </table>
<div class="row">
    <br>
    <br>
    <br>
    <br>
</div>
<table>

</table>
</body>
</html>
