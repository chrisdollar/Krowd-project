<!-- Bootstrap core CSS -->
<link href="{{ asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />

<!-- Custom styles for this template -->
<link href="{{ asset('css/main.css') }}" rel="stylesheet">

<!-- FONT Awesome CSS -->
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

<!-- IcoMoon CSS -->
<link href="{{ asset('css/icomoon.css') }}" rel="stylesheet">

<!-- Ionicons -->
<link href="{{ asset('fonts/ionicons/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="{{ asset('js/ie-emulation-modes-warning.js') }}"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css' />

<!-- Sweet Alert -->
<link href="{{ asset('plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />

<!-- Search Bar -->
<link href="{{ asset('css/search-bar.css')}}" rel="stylesheet" type="text/css" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<![endif]-->

<script type="text/javascript">

// URL BASE
var URL_BASE = "{{ url('/') }}";
// ReadMore
var ReadMore = "{{ trans('misc.view_more') }}";
var ReadLess = "{{ trans('misc.view_less') }}";

</script>