<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Ringkas Medis Rawat Jalan</title>
    <style>
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
        @page{
            size:A4;
            width:210mm;
            height:279mm;
            margin-left:3rem;
            margin-top:1rem;
            margin-bottom:1rem;
            margin-right:1rem;
            transform:scale(72%);
        }
        body{
            /* font-family:Arial, Helvetica, sans-serif; */
        }
        table{ 
            page-break-inside:auto;
            border:1px solid #000;
        }
        tr{ 
            page-break-inside:avoid; 
            page-break-after:auto 
        }
        header{
            border:1px solid #000; 
        }
        section{
            width:210mm
        }
        .noborder{
            border:none;
        }
        .rotate{
            transform: rotate(-90deg);
        }
        .text-center{
            text-align: center;
        }
        .p05{
            padding:.2rem;
        }
        body{
            width:210mm;
            height:279mm;
            margin:0 auto;
            /* border:.1rem solid rgba(0,0,0,0.35); */
            border-bottom:none;
        }
        header{
            width:100%;
            display:flex;
            justify-content:flex-start;
            /* border:1px solid #000; */
        }
        .logo{
            width:100px;
            height:auto;
            border-right:1px solid #000;
            padding:.3rem;
        }
        img{
            width:100%;
            height:100%;
            object-fit:cover;
        }
        .kop{
            padding:.3rem;
            align-self:center;
        }
        .kop-text{
            justify-content:center;
            align-items:center;
            align-content:center;
            text-align:center;
            font-size:smaller;
        }
        .info{
            border-left:1px solid #000;
            border-right:1px solid #000;
            border-collapse:collapse;
            flex-grow:1;
            padding:.3rem;
        }
        .code{
            display:flex;
            flex-direction:column;
            font-size:34px;
            flex-basis:15%;
            padding:0;
        }
        .code div:first-child{
            width:100%;
            background:#000;
            color:#fff;
            text-align:center;
            padding:.5rem;
        }
        .code div:last-child{
            text-align:center;
            width:100%;
            padding:.5rem;
        }
        .title{
            font-size:16pt;
            font-weight:bold;
        }
        .bg-dark{
            background:#000;
            color:#fff;
            padding:.5rem;
            text-align:center;
        }
        .bordered{
            border:1px solid black;
            border-collapse:collapse;
            padding:.2rem;
            box-sizing: border-box;
        }
        .border-top{
            border-top:.1rem solid rgba(0,0,0,0.45);
            border-collapse:collapse;
            box-sizing: border-box;
        }
        .border-bottom{
            border-bottom:.1rem solid rgba(0,0,0,0.45);
            border-collapse:collapse;
            box-sizing: border-box;
        }
        .border-left{
            border-left:.1rem solid rgba(0,0,0,0.45);
            border-collapse:collapse;
            box-sizing: border-box;
        }
        .border-right{
            border-right:.1rem solid rgba(0,0,0,0.45);
            border-collapse:collapse;
            box-sizing: border-box;
        }
        .flex{
            display:flex;
        }
        .flex .basis50{
            flex-basis:50%;
        }
        .col-2{
            display:flex;
            flex-basis:50%;
        }
        ul li:not(nth-child(1)){
            padding:.3rem;
        }
        ul li{
        list-style:none;
        }
        .basis50 ul li:first-child{
            border-bottom:1px solid #000;
            padding:.3rem;
        }
        table {
            border:1px solid #000;
            border-collapse: collapse;
            /* font-size: x-small; */
        }
        tr td{
            border:1px solid #000;
            border-collapse: collapse;
            font-size: 8pt;
        }
        #content > tr td{
            width:20px;
        }
        .info table > tr td{
            width:20px;
        }
        td{
            padding:.3rem
        }
    </style>
</head>
<body ng-controller="cetakProfilRingkas">
    <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
        <tr height=20 class="noborder" >
            <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                <img src="{{ $image }}" alt="" style="height: 70px; width:60px; text-align: center;">
            </td>
            <td colspan="17" rowspan="4" class="noborder-tb text-center" >
                <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
            </td>
            <td colspan="6" class="noborder" style="border-bottom:none">No. RM </td>
            <td colspan="13" class="noborder">
                : {!! $res['d'][0]->nocm  !!}
            </td>
            <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">Nama Lengkap</td>
            <td colspan="11" class="noborder">
                : {!!  $res['d'][0]->namapasien  !!}
            </td>
            <td colspan="2" class="noborder">({!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L'  !!})</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">Tanggal Lahir</td>
            <td colspan="13" class="noborder">
                : {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}
            </td>
            <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">05</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">NIK</td>
            <td colspan="11" class="noborder">
                : {!! $res['d'][0]->noidentitas  !!}
            </td>
        </tr>
        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">PROFIL RINGKAS MEDIS RAWAT JALAN</th>
        </tr>
		<tr>
			<td colspan="16">1. DPJP : @foreach($res['d'] as $item)
                @if($item->emrdfk == 421400)
                {{ substr($item->value, strpos($item->value, '~') + 1) }}
                @endif
            @endforeach </td>
			<td colspan="16" style="text-align: center">DIAGNOSIS</td>
			<td colspan="17" style="text-align: center">TERAPI</td>
		</tr>
		<tr>
			<td colspan="16" rowspan="4">Tanggal : 
                @foreach($res['d'] as $item)
                    @if($item->emrdfk == 421401)
                    {!! $item->value !!}
                    @endif
                @endforeach
            </td>
			<td colspan="16">1. 
                @foreach($res['d'] as $item)
                    @if($item->emrdfk == 421402)
                    {!! $item->value !!}
                    @endif
                @endforeach
        </td>
			<td colspan="17">1. 
                @foreach($res['d'] as $item)
                @if($item->emrdfk == 421406)
                {!! $item->value !!}
                @endif
            @endforeach
            </td>
		</tr>
        <tr>
			<td colspan="16">2. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421403)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">2.@foreach($res['d'] as $item)
                @if($item->emrdfk == 421407)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">3. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421404)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">3. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421408)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">4. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421405)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">4. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421409)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
		<tr>
			<td colspan="16">2. DPJP : @foreach($res['d'] as $item)
                @if($item->emrdfk == 421410)
                {{ substr($item->value, strpos($item->value, '~') + 1) }}
                @endif
            @endforeach</td>
			<td colspan="16" style="text-align: center">DIAGNOSIS</td>
			<td colspan="17" style="text-align: center">TERAPI</td>
		</tr>
        <tr>
			<td colspan="16" rowspan="4">Tanggal : @foreach($res['d'] as $item)
                @if($item->emrdfk == 421411)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="16">1. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421412)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">1. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421416)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">2. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421413)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">2. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421417)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">3. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421414)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">3. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421418)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">4. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421415)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">4. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421419)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">3. DPJP : @foreach($res['d'] as $item)
                @if($item->emrdfk == 421420)
                {{ substr($item->value, strpos($item->value, '~') + 1) }}
                @endif
            @endforeach</td>
			<td colspan="16" style="text-align: center">DIAGNOSIS</td>
			<td colspan="17" style="text-align: center">TERAPI</td>
		</tr>
        <tr>
			<td colspan="16" rowspan="4">Tanggal : @foreach($res['d'] as $item)
                @if($item->emrdfk == 421421)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="16">1. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421422)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">1. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421426)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">2. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421423)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">2. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421427)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">3. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421424)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">3. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421428)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">4. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421425)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">4. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421429)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">4. DPJP :  @foreach($res['d'] as $item)
                @if($item->emrdfk == 421430)
                {{ substr($item->value, strpos($item->value, '~') + 1) }}
                @endif
            @endforeach</td>
			<td colspan="16" style="text-align: center">DIAGNOSIS</td>
			<td colspan="17" style="text-align: center">TERAPI</td>
		</tr>
        <tr>
			<td colspan="16" rowspan="4">Tanggal : @foreach($res['d'] as $item)
                @if($item->emrdfk == 421431)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="16">1. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421432)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">1. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421436)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">2. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421433)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">2. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421437)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">3. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421434)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">3. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421438)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">4. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421435)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">4. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421439)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">5. DPJP : @foreach($res['d'] as $item)
                @if($item->emrdfk == 421440)
                {{ substr($item->value, strpos($item->value, '~') + 1) }}
                @endif
            @endforeach</td>
			<td colspan="16" style="text-align: center">DIAGNOSIS</td>
			<td colspan="17" style="text-align: center">TERAPI</td>
		</tr>
        <tr>
			<td colspan="16" rowspan="4">Tanggal : @foreach($res['d'] as $item)
                @if($item->emrdfk == 421441)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="16">1. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421442)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">1. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421446)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">2. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421443)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">2. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421447)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">3. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421444)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">3. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421448)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="16">4. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421445)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="17">4. @foreach($res['d'] as $item)
                @if($item->emrdfk == 421449)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
    </table>
    <br>
    <table width="100%" cellspacing="0" cellpadding="0" style="padding:  10px 10px 10px 40px; text-align: center;">
        <tr class="bordered bg-dark">
			<td colspan="1">NO</td>
			<td colspan="21" style="text-align: center">TANGGAL</td>
			<td colspan="27" style="text-align: center">CATATAN</td>
		</tr>
        <tr>
			<td colspan="2">1</td>
			<td colspan="20" style="text-align: center">@foreach($res['d'] as $item)
                @if($item->emrdfk == 421450)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="27" style="text-align: center">@foreach($res['d'] as $item)
                @if($item->emrdfk == 421451)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="2">2</td>
			<td colspan="20" style="text-align: center">@foreach($res['d'] as $item)
                @if($item->emrdfk == 421452)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="27" style="text-align: center">@foreach($res['d'] as $item)
                @if($item->emrdfk == 421453)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="2">3</td>
			<td colspan="20" style="text-align: center">@foreach($res['d'] as $item)
                @if($item->emrdfk == 421454)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="27" style="text-align: center">@foreach($res['d'] as $item)
                @if($item->emrdfk == 421455)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="2">4</td>
			<td colspan="20" style="text-align: center">@foreach($res['d'] as $item)
                @if($item->emrdfk == 421456)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="27" style="text-align: center">@foreach($res['d'] as $item)
                @if($item->emrdfk == 421457)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
        <tr>
			<td colspan="2">5</td>
			<td colspan="20" style="text-align: center">@foreach($res['d'] as $item)
                @if($item->emrdfk == 421458)
                {!! $item->value !!}
                @endif
            @endforeach</td>
			<td colspan="27" style="text-align: center">@foreach($res['d'] as $item)
                @if($item->emrdfk == 421459)
                {!! $item->value !!}
                @endif
            @endforeach</td>
		</tr>
    </table>
</body>
</html>