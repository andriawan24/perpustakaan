@if ($message = Session::get('success'))
    <script>
        Swal.fire({
            type: 'success',
            title: '{{ $message }}'
        })
    </script>
@endif
@if ($message = Session::get('warning'))
    <script>
        Swal.fire({
            type: 'warning',
            title: "{{ $message }}"
        });
    </script>
@endif