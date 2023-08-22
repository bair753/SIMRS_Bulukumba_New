<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @if (stripos(\Request::url(), 'localhost') !== false)
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/qrcode.js') }}"></script>
        {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
        <!-- angular -->
        <script src="{{ asset('js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('js/angular/angular-material.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ asset('service/js/jquery.min.js') }}"></script>
        <script src="{{ asset('service/js/jquery.qr-code.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/qrcode.js') }}"></script>
        {{-- <link href="{{ asset('service/css/style.css') }}" rel="stylesheet"> --}}
        <!-- angular -->
        <script src="{{ asset('service/js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('service/js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('service/js/angular/angular-material.js') }}" type="text/javascript"></script>
    @endif
    <style>
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
        @page{
            size:A4;
            margin-left:1rem;
            margin-top:1rem;
            margin-bottom:1rem;
            margin-right:1rem;
            transform:scale(72%);
        }
        body{
            /* width:210mm;
            height:279mm; */
            margin:0 auto;
            /* border:.1rem solid rgba(0,0,0,0.35); */
			border-bottom:none;
        }
		tr{
			font-size: 50px;
		}
        
		table{
			writing-mode: vertical-lr;
			display: inline;
			color: #000000;
			padding: 15px;
			margin-left: 0;
			word-spacing: 2px;
			letter-spacing: 1.2px;
			transform: rotate(180deg);
			border-radius: 25px;
			text-align: left;
		}
    </style>
</head>
<body>
	<table>
		
		<tr>
			<th colspan="3">{{ $profile->namaexternal }}</th>
		</tr>
		<tr>
			<th>NIK</th>
			<th>:</th>
			<th>{{ $data->noidentitas }}</th>
		</tr>
		<tr>
			<th>TGL LAHIR</th>
			<th>:</th>
			<th>{{ date('d-m-Y', strtotime($data->tgllahir)) }}</th>
		</tr>
		<tr>
			<th>NAMA</th>
			<th>:</th>
			<th>{{ $data->namapasien }}</th>
		</tr>
		<tr>
			<th>RM</th>
			<th>:</th>
			<th>{{ $data->nocm }}</th>
		</tr>

	</table>
</body>
<script type="text/javascript">
        $(document).ready(function () {
        window.print();
    });
</script>
</html>