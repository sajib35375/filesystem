<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>

@if(Session::has('success'))
<script>
    "use-strict"
    iziToast.success({
    message: "{{ session('success') }}",
    position: 'topRight'
    });
</script>
@endif

@if(Session::has('error'))
<script>
"use-strict"
iziToast.error({
message: "{{ session('error') }}",
position: 'topRight'
});
</script>
@endif

@if(@$errors->any())
<script>
"use strict";
@foreach ($errors->all() as $error)
    iziToast.error({
    message: '@lang($error)',
    position: "topRight"
    });
@endforeach
</script>
@endif

@if (session()->has('notify'))
@foreach (session('notify') as $msg)
    <script>
        "use strict";
        iziToast.{{ $msg[0] }}({
            message: "{{ __($msg[1]) }}",
            position: "topRight"
        });
    </script>
@endforeach
@endif

<script>
    "use strict";
    function notify(status,message) {
        iziToast[status]({
            message: message,
            position: "topRight"
        });
    }

    $(document).ready(function() {
        $('.summernote').summernote({
            height: 250,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'cerulean'
            }
        });
    });
</script>




