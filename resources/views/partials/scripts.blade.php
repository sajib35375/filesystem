<script type='text/javascript' src={{ asset('assets/js/vendor/jquery/jquery.min.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/vendor/jquery/jquery-migrate.min.js') }}></script>
<script type='text/javascript' src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type='text/javascript' src={{ asset('assets/js/custom/jquery.cookie.min.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/vendor/ui/core.min.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/vendor/ui/widget.min.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/vendor/ui/tabs.min.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/vendor/ui/effect.min.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/vendor/ui/effect-fade.min.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/custom/template.custom.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/custom/trx_utils.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/vendor/superfish/superfish.min.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/custom/template.utils.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/custom/template.init.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/custom/theme.init.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/custom/template.shortcodes.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/vendor/js_comp/js_comp.min.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/vendor/eventon/eventon_script.min.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/vendor/eventon/eventon_gen_maps.min.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/vendor/cform/jquery.form.min.js') }}></script>
<script type='text/javascript' src={{ asset('assets/js/vendor/cform/scripts.min.js') }}></script>
<script type='text/javascript' src={{ asset('bootstrap/bootstrap.bundle.min.js') }}></script>
<script type='text/javascript' src={{ asset('admin/js/custom.js')}}></script>
<script type='text/javascript' src={{ asset('js/function.js')}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script>
    @if( Session::has('message') )
    var type = "{{ Session::get('alert_type','info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}")
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}")
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}")
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}")
            break;
    }

    @endif
</script>
