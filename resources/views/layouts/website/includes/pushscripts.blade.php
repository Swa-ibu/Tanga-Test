@prepend('styles')
{{-- Fontawesome v6 --}}
<script src="https://kit.fontawesome.com/c99e7cdcbd.js" crossorigin="anonymous"></script>
<!-- Toastr -->
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endprepend

@push('scripts')
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
@endpush
