<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Echocardiografi</title>
    <style>
        @page {
            size: auto;
            size: A4 portrait;
        }

        html,
        body {
            /* font-family: DejaVu Sans, Arial, Helvetica, sans-serif; */
            font-size: 9pt;

        }

        table {
            page-break-inside: auto;
            table-layout: fixed;
            border-collapse: collapse;
            border: 1px solid #000;
            width: 100%;
        }

        tr,
        td {
            padding: .3rem;
            page-break-inside: avoid;
            page-break-after: auto;
            border: 1px solid #000;
        }


        .noborder {
            padding: .3rem;
            page-break-inside: avoid;
            page-break-after: auto;
            border: none;
        }

        .blf {
            border-left: 1px solid #000;
        }

        .btp {
            border-top: 1px solid #000;
        }

        .btm {
            border-bottom: 1px solid #000;
        }

        .br {
            border-right: 1px solid #000;
        }

        .border-lr {
            border: 1px solid #000;
            border-top: none;
            border-bottom: none;
        }

        .border-tb {
            border: 1px solid #000;
            border-left: none;
            border-right: none;
        }

        .bg-dark {
            background: #000;
            color: #fff;
            /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
            font-size: x-large;
            padding: .5rem;
            height: 20pt !important;
        }
    </style>
</head>
<body ng-controller="cetakCardiografi">
      <section>
        <table width="100%" id="content" style="table-layout:fixed">
            <tr style="border:none;border-top:1px solid #000">
                <td rowspan="4" style="border:none;border-right:1px solid #000">
                    <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                </td>
                <td rowspan="4" colspan="3" style="text-align:center;font-size:larger;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                <td style="border:none;border-left:1px solid #000">No. RM </td>
                <td colspan="3" style="border:none">: {!! $res['d'][0]->nocm  !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                <td colspan="3" style="border:none">: {!!  $res['d'][0]->namapasien  !!} {!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;">163</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">NIK</td>
                <td colspan="3" style="border:none">: {!! $res['d'][0]->noidentitas  !!}</td>
            </tr>
            <tr>
                <td colspan="9" class="bg-dark" style="font-size:x-large;text-align:center">
                    HASIL ECHOCARDIOGRAFI
                </td>
            </tr>
            <tr style="border:none">
                <td style="border-top:1px;" colspan="9"><b>Tanggal diperiksa : @foreach($res['d'] as $item) @if($item->emrdfk == 32110651) {!! $item->value !!} @endif @endforeach </b></td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="9">Discription - Dimentional & Real Time Echocardiogram</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="9">Discription of Wall Motion, Masses, Valves, Pericardioum</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="9"></td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="9">All Chambers</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 32116513) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach LA/ 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32116514) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach LV</td> 
                <td style="border:none;" colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32110652) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach N / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110653) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dilatasi / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110654) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Mengecil</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 32116515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach RA/ 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32116516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach RV</td> 
                <td style="border:none;" colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32110655) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach N / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110656) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dilatasi / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110657) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Mengecil</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">Others</td> 
                <td style="border:none;" colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32110658) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombus / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110659) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pusaran / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110660) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pusaran Darah / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110661) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tumor / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110662) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110663) {!! $item->value !!} @endif @endforeach </td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">LVH</td> 
                <td style="border:none;" colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32110664) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Konsentrik /  
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110665) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Eksentrik /  
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110666) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Ada</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">RWMA</td> 
                <td style="border:none;" colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32110667) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hipo / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110668) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110669) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Normo Kinetik di Ant. Basal / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110670) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lateral / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110671) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Eksentrik / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110672) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Inferior / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110673) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Middle / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110674) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110675) {!! $item->value !!} @endif @endforeach </td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9"></td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9">Valves</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">AO</td> 
                <td style="border:none;" colspan="7">: 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110676) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach N / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110677) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AS / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110678) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Al - Mild / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110679) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Moderate / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110680) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Severe</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">P</td> 
                <td style="border:none;" colspan="7">: 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110681) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach N / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110682) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PS / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110683) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PI - Mild / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110684) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Moderate / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110685) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Severe</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">T</td> 
                <td style="border:none;" colspan="7">: 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110686) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach N / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110687) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TS / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110688) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TI - Mild / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110689) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Moderate / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110690) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Severe</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">M</td> 
                <td style="border:none;" colspan="7">: 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110691) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach N / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110692) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach MS / 
                    Wilkin Score : @foreach($res['d'] as $item) @if($item->emrdfk == 32116517) {!! $item->value !!} @endif @endforeach /
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110693) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ml - Mild / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110694) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Moderate / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110695) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Severe - Distance - WS</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">EF (Estimated)</td> 
                <td style="border:none;" colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32110696) {!! $item->value !!} @endif @endforeach %, 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110697) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach E/
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110698) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A < 1 / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110699) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach > , TAPSE : 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110700) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach < 16 / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110701) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach > 16</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">eRAP</td> 
                <td style="border:none;" colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116518) {!! $item->value !!} @endif @endforeach </td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">Others</td> 
                <td style="border:none;" colspan="7">: 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110702) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Venticle Gap / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110703) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Atrial’ 
                    GAP : @foreach($res['d'] as $item) @if($item->emrdfk == 32110704) {!! $item->value !!} @endif @endforeach </td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">Results</td> 
                <td style="border:none;" colspan="7">: 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110705) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach HFpEF ec, 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110706) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach HHD , 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110707) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CAD, 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110708) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Others ( Mention ) 
                    : @foreach($res['d'] as $item) @if($item->emrdfk == 32110709) {!! $item->value !!} @endif @endforeach</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2"></td> 
                <td style="border:none;" colspan="7">: 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110710) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach HFpEF ec, 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110711) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach HHD , 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110712) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CAD, 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110713) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Others ( Mention ) 
                    : @foreach($res['d'] as $item) @if($item->emrdfk == 32110714) {!! $item->value !!} @endif @endforeach</td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9"></td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9"> Tanggal dilakukan Echoyang sebelumnya ( bila ada ) : @foreach($res['d'] as $item) @if($item->emrdfk == 32110715) {!! $item->value !!} @endif @endforeach</td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9"> Impression ( Compare To Previous ) : 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110716) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Stabil / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110717) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Better / 
                    @foreach($res['d'] as $item) @if($item->emrdfk == 32110718) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Not Good : </td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9"></td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9"></td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="6"></td> 
                <td style="border:none;" colspan="3">Bulukumba, @foreach($res['d'] as $item) @if($item->emrdfk == 32110719) {!! $item->value !!} @endif @endforeach</td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="6"></td> 
                <td style="border:none;" colspan="3">Dokter Yang Memeriksa</td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="6"></td> 
                <td style="border:none;" colspan="3"><div style="text-align: left"> @foreach($res['d'] as $item) @if($item->emrdfk == 32110720) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div></td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="6"></td> 
                <td style="border:none;" colspan="3">(@foreach($res['d'] as $item) @if($item->emrdfk == 32110720) {!! $item->value !!} @endif @endforeach)</td> 
            </tr>

        </table>
    </section>
<!-- 
	
	: 
	: 

	



-->

</body>
</html>