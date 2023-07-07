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
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/admin/style.css') }}" rel="stylesheet">
  <style>
    .dataTable-search{
      display: none;
    }
  </style>
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
  @include('user.sidebar')
  <!-- End Sidebar-->
  
  @yield('main')
  <!-- End #main -->
  
  <!-- ======= Footer ======= -->
  @include('admin.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    $(document).ready(function (e) {
      $(document).on("click", "#delete-modal", function (e) {
      var delete_id = $(this).attr('data-value');
      console.log(delete_id);
      $('#id').val(delete_id);
      });
    });
  </script>
  
  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  
 
  
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/admin/main.js') }}"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(function(){
      $("#upload_image").on('click', function(e){
          e.preventDefault();
          $("#image").trigger('click');
      });
    });
  </script>
  <script>
    $(function(){
      $("#delete_profile").on('click', function(e){
          e.preventDefault();
          const imgprev = document.querySelector('.img-preview');
          
          imgprev.style.display = 'block';
          imgprev.src = "{{ asset('assets/img/profile-img.jpg') }}";
          
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.search-select').select2({
        placeholder: 'Pilih salah satu',
        theme: 'bootstrap-5',
        dropdownParent: $('#addWorkModal')
      });
      $('.search-select2').select2({
        placeholder: 'Pilih salah satu',
        theme: 'bootstrap-5',
        dropdownParent: $('#addOrgModal')
      });

     
    });
  </script>

  <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
  
  <script>
    function previewImage(){
      const image = document.querySelector('#image');
      const imgprev = document.querySelector('.img-preview');
      
      
      imgprev.style.display = 'block';

      const OFReader = new FileReader();
      OFReader.readAsDataURL(image.files[0]);

      OFReader.onload = (OFReaderEvent) => {
        imgprev.src = OFReaderEvent.target.result;
        image.val = OFReaderEvent.target.result
      }
      
    }
  </script>
  


</body>
</html> 