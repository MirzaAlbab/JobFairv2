<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  @yield('title')
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/DPKKA-logo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  
  <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/admin/style.css') }}" rel="stylesheet">

 
 
  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.sidebar')
  <!-- End Sidebar-->

  @yield('main')
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.footer')
  <!-- End Footer -->

  
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <!-- Vendor JS Files -->
  
  
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      let maintenanceSwitch = document.getElementById("maintenanceSwitch");
      fetch('{{ route('maintenance-status') }}')
        .then((response) => response.json())
        .then((data) => {
          
          if (data.status == true) {
            maintenanceSwitch.checked = true;
            maintenanceSwitch.removeAttribute("disabled");
          } else {
            maintenanceSwitch.checked = false;
            maintenanceSwitch.removeAttribute("disabled");
          }
        });

      
      maintenanceSwitch.addEventListener("change", function() {
       
        if (this.checked) {
          if(confirm("Are you sure you want to turn on maintenance mode?")){
            fetch('{{ route('maintenance',"17ed288276383b342914f440596fea0567d5ae85") }}')
            .then((response) => response.json())
            .then((data) => {
              maintenanceSwitch.checked = true;
            });
          }
          else{
            maintenanceSwitch.checked = false;
          }
        } else {
          if(confirm("Are you sure you want to turn off maintenance mode?")){
            maintenanceSwitch.checked = false;
            fetch('{{ route('live') }}')
            .then((response) => response.json())
            .then((data) => {
              maintenanceSwitch.checked = false;
            });
          }
          else{
            maintenanceSwitch.checked = true;
          }
        }
      });
    });
  </script>
  <script>
    $(document).ready(function (e) {
      $(document).on("click", "#delete-modal", function (e) {
      var delete_id = $(this).attr('data-value');
      
      $('#id').val(delete_id);
      });
    });
  </script>
   <script>
    $(".export ul li").click(function() {
    let i = $(this).index() + 1
    let table = $('#tabel').DataTable();
    console.log(table);
    if (i == 1) {
        table.button('.buttons-csv').trigger();
        console.log(i);
    } else if (i == 2) {
        table.button('.buttons-excel').trigger();
    } else if (i == 3) {
        table.button('.buttons-pdf').trigger();
    }
  });
  </script>
  <script>
    $(document).ready(function() {
      $('#tabel').DataTable( {
          
          dom: 'Bfrtip',
          buttons: [
            'csv', 'excel', 'pdf'
          ],
          "searching": false
      } );
    
    } );
  </script>
  <script>
    $(document).ready(function() {
      $('.search-select').select2({
        placeholder: 'Pilih salah satu',
        theme: 'bootstrap-5',
      });
    });
  </script>
  
  <script>
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
     $('#start_date').datepicker({
         uiLibrary: 'bootstrap5',
         minDate: today,
         format: 'yyyy-mm-dd',
         header:true,
         modal:true,
         footer:true,
        
         
     });
     
     $('#end_date').datepicker({
       uiLibrary: 'bootstrap5',
         minDate: today,
         format: 'yyyy-mm-dd',
         header:true,
         modal:true,
         footer:true,
     });
 
 </script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/admin/main.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>

  <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>

  <script>
    function previewImage(){
      const image = document.querySelector('#image');
      const imgprev = document.querySelector('.img-preview');

      imgprev.style.display = 'block';

      const OFReader = new FileReader();
      OFReader.readAsDataURL(image.files[0]);

      OFReader.onload = (OFReaderEvent) => {
        imgprev.src = OFReaderEvent.target.result;
      }
      
    }
  </script>
  <script>
   function yesnoCheck(that) {
    const role = document.querySelector(".assign");
    if (that.value == "company") {
      role.classList.toggle("invisible");   
    } else {
      role.classList.add("invisible");     
    }
  }
  </script>
  
  
 
 
</body>
</html> 