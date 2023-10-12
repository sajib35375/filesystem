<head>
    <title>Micro Office</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link property="stylesheet" rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i%7CMontserrat:300,300i,400,400i,500,500i,600,600i,700,700i%7COpen+Sans:300,300i,400,400i%7COswald:300,400,500&amp;subset=latin-ext' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/js/vendor/wise-chat/wise_chat.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/js/vendor/wise-chat/plugin.wisechat.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href='{{ asset('assets/js/vendor/bbpress/bbpress.css') }}' type='text/css' media='screen' />
    <link property="stylesheet" rel='stylesheet' href='{{ asset('aseets/js/vendor/bbpress/plugin.buddypress.css') }}' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/js/vendor/res-poll/public.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/js/vendor/res-poll/plugin.responsive-poll.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/js/vendor/eventon/eventon_styles.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/js/vendor/eventon/font-awesome.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/js/vendor/eventon/fc_styles.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/js/vendor/eventon/plugin.eventon.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/css/fonts/stylesheet.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/css/fontello/css/fontello.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/css/style.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/css/template.animation.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/css/template.shortcodes.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/css/template.colors.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/js/vendor/js_comp/js_comp.min.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/css/custom.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/css/plugins.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/css/template.messages.css') }} type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/css/responsive.css') }} type='text/css' media='all' />
    <link rel="icon" href="{{ asset('assets/images/cropped-512x512-32x32.png') }}" sizes="32x32" />
    <link rel="icon" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" sizes="32x32" />
    <link rel="icon" href="{{ asset('bootstrap/bootstrap.min.css') }}" sizes="32x32" />
    <link property="stylesheet" rel='stylesheet' href={{ asset('assets/js/vendor/cform/styles.css') }} type='text/css' media='all' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <style>
        .admin_message img {
	height: 50px;
	width: 50px;
	border-radius: 50%;
	position: fixed;
	bottom: 29px;
	right: 30px;
	z-index: 9999;
	box-shadow: 3px 3px 4px #4444;
    cursor: pointer;
}
    </style>

</head>
