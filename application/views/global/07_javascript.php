
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- <script src="<?php echo base_url('assets/');?>plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/');?>dist/js/adminlte.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/');?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets/');?>plugins/datatables/dataTables.bootstrap4.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url('assets/');?>dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="<?php echo base_url('assets/');?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="<?php echo base_url('assets/');?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/');?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url('assets/');?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/');?>plugins/fastclick/fastclick.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="<?php echo base_url('assets/');?>plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url('assets/');?>dist/js/pages/dashboard2.js"></script>

<script src="<?php echo base_url('assets/');?>plugins/select2/select2.full.min.js"></script>

<script>
$('#status').on('change', function(){
if($(this).val()==='Peminjaman'){
    document.getElementById("id_kategori").disabled=false;
    document.getElementById("id_ruangan").disabled=false;
} else if($(this).val()==='Perawatan'){
    document.getElementById("id_ruangan").disabled=true;
    document.getElementById("id_kategori").disabled=false;
} else{
    document.getElementById("id_ruangan").disabled=false;
    document.getElementById("id_kategori").disabled=false;
}
});
</script>
<script>
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('<button type="submit" class="btn btn-primary"> Submit </button>').css('color', 'green');
  } else
    $('#message').html('<label class="text-danger">Password tidak cocok dengan konfirmasi password</label>').css('color', 'red');
});
</script>

<script>
  $(document).ready(function() {
      var required = $("#required").kendoMultiSelect().data("kendoMultiSelect");
      var optional = $("#optional").kendoMultiSelect({
          autoClose: true,
          maxSelectedItems: 1,
      }).data("kendoMultiSelect");
      var optional2 = $("#optional2").kendoMultiSelect({
          autoClose: true,
          maxSelectedItems: 1,
      }).data("kendoMultiSelect");
      var optional3 = $("#optional3").kendoMultiSelect({
          autoClose: true,
          maxSelectedItems: 1,
      }).data("kendoMultiSelect");

      $("#get").click(function() {
          alert("Attendees:\n\nRequired: " + required.value() + "\nOptional: " + optional.value());
      });
  });
</script>
<script>
   $(document).ready(function() {
       $("#files").kendoUpload();
      });
</script>

<script type="text/javascript">
     $(document).ready(function(){

          $('#pdf').click(function(){
               printDiv();
               function printDiv() {
                    var printContents = $(".right_content").html();
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
               }
          });
      });
</script>

<script>
    function showImage(src,target) {
    var fr=new FileReader();
    fr.onload = function(e) { target.src = this.result; };
    src.addEventListener("change",function() {
      fr.readAsDataURL(src.files[0]);
    });
    }

    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
</script>

<script>
 $(document).ready(function(){
      $('#email').change(function(){
           var email = $('#email').val();
           if(email != '')
           {
                $.ajax({
                     url:"<?php echo site_url(); ?>/user/cekKetersediaanEmail",
                     method:"POST",
                     data:{email:email},
                     success:function(data){
                          $('#email_result').html(data);
                     }
                });
           }
      });
 });
 </script>

 <script>
  $(document).ready(function(){
       $('#imel').change(function(){
            var imel = $('#imel').val();
            if(imel != '')
            {
                 $.ajax({
                      url:"<?php echo site_url(); ?>/lupa_password/cekEmail",
                      method:"POST",
                      data:{imel:imel},
                      success:function(data){
                           $('#imel_result').html(data);
                      }
                 });
            }
       });
  });
  </script>

  <script>
   $(document).ready(function(){
        $('#nama_ruangan').change(function(){
             var nama_ruangan = $('#nama_ruangan').val();
             if(nama_ruangan != '')
             {
                  $.ajax({
                       url:"<?php echo site_url(); ?>/ruangan/cekRuangan",
                       method:"POST",
                       data:{nama_ruangan:nama_ruangan},
                       success:function(data){
                            $('#ruangan_result').html(data);
                       }
                  });
             }
        });
   });
   </script>

<script>
 $(document).ready(function(){
      $('#kd_kontrak').change(function(){
           var kd_kontrak = $('#kd_kontrak').val();
           if(kd_kontrak != '')
           {
                $.ajax({
                     url:"<?php echo site_url(); ?>/inventaris/cekKetersediaanKontrak",
                     method:"POST",
                     data:{kd_kontrak:kd_kontrak},
                     success:function(data){
                          $('#kontrak_result').html(data);
                     }
                });
           }
      });
 });
 </script>

<script>
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });
</script>


<script>
$(document).ready(function(){

 $(document).on('click', '.tambah', function(){
  var html = '';
  html += '<tr>';
  html += '<td><select required="required" name="id_kategori[]" class="form-control item_unit"><?php foreach ($kategori_list as $key) { ?><option value="<?php echo $key->id_kategori; ?>"><?php echo $key->nama_kategori; ?></option><?php } ?></select></td>';
  html += '<td><select required="required" name="id_ruangan[]" class="form-control item_unit"><?php foreach ($ruangan_list as $key) { ?><option value="<?php echo $key->id_ruangan; ?>"><?php echo $key->nama_ruangan; ?></option><?php } ?></select></td>';
  html += '<td><input required="required" type="text" name="spesifikasi[]" class="form-control item_name" /></td>';
  html += '<td><input required="required" type="number" name="jumlah[]" class="form-control item_quantity" /></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger remove">Hapus</button></td></tr>';
  $('#item_table').append(html);
 });

 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });

 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';

  $('.item_unit').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });

});
</script>


<script>
$(document).ready(function(){

 $(document).on('click', '.tambah1', function(){
  var html = '';
  html += '<tr>';
  html += '<td><select required name="kd_barang[]" class="form-control item_unit" style="width: 100%;"><option value="" style="display:none">Pilih Barang</option><?php foreach ($inventaris_list as $key) { ?><option value="<?php echo $key->kd_barang; ?>"><?php echo $key->kd_barang; ?></option><?php } ?></select></td>';
  html += '<td><select required name="id_ruangan[]" class="form-control item_unit"><option value="" style="display:none">Pilih Ruangan</option><?php foreach ($ruangan_list as $key) { ?><option value="<?php echo $key->id_ruangan; ?>"><?php echo $key->nama_ruangan; ?></option><?php } ?></select></td>';
  html += '<td><input required="required" name="nip[]" type="number" class="form-control item_name" placeholder="NIP" /></td>';
  html += '<td><input required="required" name="nama_peminjam[]" type="text" class="form-control item_name" placeholder="Nama Peminjam" /></td>';
  html += '<td class="text-center"><button type="button" name="remove1" class="btn btn-danger btn-sm remove">Hapus</button></td></tr>';
  $('#item_table1').append(html);
 });

 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });

 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';

  $('.item_unit').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert1.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table1').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });

});
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker         : true,
      timePickerIncrement: 30,
      format             : 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<!-- page view datatable user_list.php script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example3").DataTable({
      "ordering": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<!-- modal script delete -->
<script>
  $('#show_data').on('click','.user_hapus',function(){
      var id = $(this).attr('data-id');
      $('#modalHapus').modal('show');
      $('[name="id"]').val(id);
    });
</script>

<!-- modal script update -->

<script>
  $('#show_data').on('click','.user_update',function(){
      var id = $(this).attr('data-id');
      var username = $('[name="username"]').val(id);
      var password = $('[name="password"]').val(id);
      var level = $('[name="level"]').val(id);
      var nm_user = $('[name="nm_user"]').val(id);
      $('#modalUpdate').modal('show');
      $('[name="id"]').val(id);
      $('[name="username"]').val(username);
    });
</script>

<script>
 $(document).ready(function(){
      $('#iUsername').change(function(){
           var iUsername = $('#iUsername').val();
           if(iUsername != '')
           {
                $.ajax({
                     url:"<?php echo site_url(); ?>/user/cekUsername",
                     method:"POST",
                     data:{iUsername:iUsername},
                     success:function(data){
                          $('#iUsername_result').html(data);
                     }
                });
           }
      });
 });
 </script>

 <script>
  $(document).ready(function(){
       $('#iEmail').change(function(){
            var iEmail = $('#iEmail').val();
            if(iEmail != '')
            {
                 $.ajax({
                      url:"<?php echo site_url(); ?>/user/cekEmail",
                      method:"POST",
                      data:{iEmail:iEmail},
                      success:function(data){
                           $('#iEmail_result').html(data);
                      }
                 });
            }
       });
  });
  </script>

  <script>
   $(document).ready(function(){
        $('#iHP').change(function(){
             var iHP = $('#iHP').val();
             if(iHP != '')
             {
                  $.ajax({
                       url:"<?php echo site_url(); ?>/user/cekHP",
                       method:"POST",
                       data:{iHP:iHP},
                       success:function(data){
                            $('#iHP_result').html(data);
                       }
                  });
             }
        });
   });
   </script>
<!-- <script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/iCheck/icheck.min.js"></script> -->


</body>
</html>
