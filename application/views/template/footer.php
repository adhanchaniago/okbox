
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Development By &copy; 2020 <a href="https://hosterweb.co.id">HOSTERWEB INDONESIA</a>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 
<script src="<?php //echo base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts
<script src="<?php //echo base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php //echo base_url() ?>assets/bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline
<script src="<?php //echo base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
<!-- jvectormap 
<script src="<?php //echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php //echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- jQuery Knob Chart 
<script src="<?php //echo base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>-->

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

<script src="<?php echo base_url() ?>assets/dist/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/terbilang.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->
<!-- FLOT CHARTS -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.categories.js"></script>
<!-- Page script -->
<script>
  $(document).ready(function(){ 
    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
     $('.tanggalan').daterangepicker({
        timePicker: false,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'DD.MM.YYYY'
        }
      });
     $('.datepicker').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy"
      })
    //Date range picker with time picker
  })
</script>
<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#prov").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_Setting/get_kota"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_provinsi : $("#prov").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kota").html(response.list_kota).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>

<script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
 
    function cek_resi(){
        $("#pesan_resi").hide();
 
        var noresi = $("#noresi").val();
 
        if(noresi != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_Transaksi/cek_resi'; ?>", //arahkan pada proses_tambah di controller member
                data: 'noresi='+noresi,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesan_resi").css("color","#fc5d32");
                        $("#noresi").css("border-color","#fc5d32");
                        $("#pesan_resi").html("Maaf No Resi sudah dipakai.");
 
                        error = 1;
                    }else{
                        $("#pesan_resi").css("color","#59c113");
                        $("#noresi").css("border-color","#59c113");
                        $("#pesan_resi").html("No Resi anda valid");
                        error = 0;
                    }
 
                    $("#pesan_resi").fadeIn(1000);
                }
            });
        }       
         
    }
     
</script>
<script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
 
    function cek_username(){
        $("#pesan").hide();
 
        var username = $("#username").val();
 
        if(username != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_User/cek_user'; ?>", //arahkan pada proses_tambah di controller member
                data: 'user='+username,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesan").css("color","#fc5d32");
                        $("#username").css("border-color","#fc5d32");
                        $("#pesan").html("Username sudah digunakan !");
 
                        error = 1;
                    }else{
                        $("#pesan").css("color","#59c113");
                        $("#username").css("border-color","#59c113");
                        $("#pesan").html("");
                        error = 0;
                    }
 
                    $("#pesan").fadeIn(1000);
                }
            });
        }       
         
    }
     
</script>
<script type='text/javascript'>

  function Angkasaja(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
  }
</script>
<script type="text/javascript">
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>
<script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
 
    function cek_username(){
        $("#pesan").hide();
 
        var jenismuatan = $("#jenismuatan").val();
 
        if(jenismuatan != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_Muatan/cek_jenismuatan'; ?>", //arahkan pada proses_tambah di controller member
                data: 'user='+jenismuatan,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesan").css("color","#fc5d32");
                        $("#jenismuatan").css("border-color","#fc5d32");
                        $("#pesan").html("Jenis Muatan sudah digunakan !");
 
                        error = 1;
                    }else{
                        $("#pesan").css("color","#59c113");
                        $("#jenismuatan").css("border-color","#59c113");
                        $("#pesan").html("");
                        error = 0;
                    }
 
                    $("#pesan").fadeIn(1000);
                }
            });
        }       
         
    }
     
</script>
<script type="text/javascript">
    
    var rupiah = document.getElementById('harga');
    rupiah.addEventListener('keyup', function(e){
      rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    // var asuransi = document.getElementById('asuransi');
    // if(asuransi){
    //   asuransi.addEventListener('keyup', function(e){
    //   //   // tambahkan 'Rp.' pada saat form di ketik
    //   //   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    //     asuransi.value = formatRupiah(this.value, 'Rp. ');
    //   });
    // }

    // var biayapacking = document.getElementById('biayapacking');
    // if(biayapacking){
    //   biayapacking.addEventListener('keyup', function(e){
    //   //   // tambahkan 'Rp.' pada saat form di ketik
    //   //   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    //     biayapacking.value = formatRupiah(this.value, 'Rp. ');
    //   });
    // }
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script>
    <script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#tujuan").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_Transaksi/cek_harga"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_harga : $("#tujuan").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          // $("#nama_suplier").html("aaaa");

          $('#min').val(response.min);
          $('#hargakg').val(response.harga);
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>

<script type="text/javascript">

  function Calculate(){
      var a = document.getElementById('panjang').value;
      var b = document.getElementById('lebar').value;
      var c = document.getElementById('tinggi').value;

      var bilangan = a*b*c;

      document.getElementById('volume').value = bilangan ;   
  };

  function startCalculatetotal(){

    var intervala=setInterval("Calculate_total()",10);
  }; 

function Calculate_total(){
      var e = document.getElementById('min').value;
      var f = (document.getElementById('berat').value==''?0:parseInt(document.getElementById('berat').value));
      var d = (document.getElementById('hargakg').value.replace(/[^0-9]/g,'')==''?0:parseInt(document.getElementById('hargakg').value.replace(/[^0-9]/g,'')));
      if (e > f){
        var total = d;
      } else {
        var total = ((d/e)*f);
      }
      var lihatbiayakirim = Math.ceil(total);

      var numbertotal = lihatbiayakirim.toString(),
        sisa  = numbertotal.length % 3,
        rupiah  = numbertotal.substr(0, sisa),
        ribuan  = numbertotal.substr(sisa).match(/\d{3}/g);
          
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      document.getElementById('biayakirim').value ='Rp. '+formatRupiah(rupiah); 
      // document.getElementById('ppn').value = 'Rp. '+formatRupiah(rupiah) ;   
  };

  function stopCalctotal(){
    clearInterval(intervala);
  };

  function starttotal(){

    var intervaltotal=setInterval("Calculatetot()",10);

  }; 
  function Calculatetot(){

    var asuransi = document.getElementById('asuransi');
    if(asuransi){
      asuransi.addEventListener('keyup', function(e){
      //   // tambahkan 'Rp.' pada saat form di ketik
      //   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        asuransi.value = formatRupiah(this.value, 'Rp. ');
      });
    }

    var biayapacking = document.getElementById('biayapacking');
    if(biayapacking){
      biayapacking.addEventListener('keyup', function(e){
      //   // tambahkan 'Rp.' pada saat form di ketik
      //   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        biayapacking.value = formatRupiah(this.value, 'Rp. ');
      });
    }
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

      var g = (document.getElementById('biayakirim').value.replace(/[^0-9]/g,'')==''?0:parseInt(document.getElementById('biayakirim').value.replace(/[^0-9]/g,'')));
      var h = (document.getElementById('biayapacking').value.replace(/[^0-9]/g,'')==''?0:parseInt(document.getElementById('biayapacking').value.replace(/[^0-9]/g,'')));
      var i = (document.getElementById('asuransi').value.replace(/[^0-9]/g,'')==''?0:parseInt(document.getElementById('asuransi').value.replace(/[^0-9]/g,'')));
      // var j = (document.getElementById('asuransi').value.replace(/[^0-9]/g,'')==''?0:parseInt(document.getElementById('asuransi').value.replace(/[^0-9]/g,'')));
      if ($('#cekppn').is(':checked')){
          var l = g/100;

          var lihatppn = Math.ceil(l);
          var ppn = lihatppn.toString(),
          sisa  = ppn.length % 3,
          rupiah  = ppn.substr(0, sisa),
          ribuan  = ppn.substr(sisa).match(/\d{3}/g);
            
          if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
          }
          
          document.getElementById('ppn').value = 'Rp. '+formatRupiah(rupiah) ;   
        };

        if (document.getElementById('cekppn').checked === false){          
          document.getElementById('ppn').value = 'Rp. 0' ;   
        };

      var o = (document.getElementById('ppn').value.replace(/[^0-9]/g,'')==''?0:parseInt(document.getElementById('ppn').value.replace(/[^0-9]/g,'')));
      var tot = (g*1)+(h*1)+(i*1)+(o*1);

      var numbertotal = tot.toString(),
        sisa  = numbertotal.length % 3,
        rupiah  = numbertotal.substr(0, sisa),
        ribuan  = numbertotal.substr(sisa).match(/\d{3}/g);
          
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      document.getElementById('total').value = 'Rp. '+formatRupiah(rupiah) ;  
  };

  function stoptotal(){
    clearInterval(intervaltotal);
  };

  


</script>