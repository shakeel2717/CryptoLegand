<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            swal("oops!", "{{ $error }}", "error");
        </script>
    @endforeach
@endif
@if (session('message') || session('status') || session('success'))
    <script>
        swal("Success!", "{{ session('message') }}", "success");
    </script>
@endif
