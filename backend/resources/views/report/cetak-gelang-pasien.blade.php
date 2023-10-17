<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @if (stripos(\Request::url(), 'localhost') !== false)
        <script src="{{ asset('js/jquery.min.js') }}"></script>
    @else
        <script src="{{ asset('service/js/jquery.min.js') }}"></script>
    @endif
    <style>
		table{
			writing-mode: vertical-lr;
			display: inline;
			margin-right: 3px;
			color: #000000;
			/* Yang lama */
			/* margin-top: 620px; */
			/* Yang baru */
			margin-top: 820px;
			transform: rotate(180deg);
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