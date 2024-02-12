  <script src="{{ asset('admin/assets/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/feather.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/script.js') }}"></script>
  <script src="https://kit.fontawesome.com/c99e7cdcbd.js" crossorigin="anonymous"></script>

  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  <script>
      @if($errors->any())
        @foreach($errors->all() as $error)
          toastr.error('{{ $error }}', 'Error', {
            closeButton:true,
            progressBar:true,
          });
        @endforeach
      @endif
  </script>

  <!-- Tinymce -->
  <script src="{{ asset('admin/assets/js/tinymce.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/tinyplugins.min.js') }}"></script>
  <script>
    tinymce.init({
      selector: 'textarea#desc',
      min_height: 500,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>


{{-- Select 2 --}}
<script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>
<script>
    // Multiple select2
    $(document).ready(function() {
        $('.select2-multiple').select2();
    });

    // Single select
    $(document).ready(function() {
        $('.select2-single').select2();
    });
</script>
