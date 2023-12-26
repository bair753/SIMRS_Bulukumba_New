<!DOCTYPE html>
<html lang="en" ng-app="angularApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil EKG</title>

    <style>
        @page {
          
          size: A4 Landscape;
        
         
           
      }
        * {
            padding: 0;
            margin: 10;
            box-sizing: border-box;
        }

        html,body {
            font-family: Arial, Helvetica, sans-serif;
			
        }

        

        table {
            border: 1px solid #000;
            /* table-layout: fixed; */
            border-collapse: collapse;

            width: 100%;
        }

        /* tr {
            page-break-inside: avoid;
            page-break-after: auto;
        } */

       

        tr td {
            border: 1px solid #000;
            border-collapse: collapse;
            /* padding:.1rem; */
        }

    

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .bordered {
            border: 1px solid #000;
        }

        .noborder {
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

        table tr td {
            font-size: 9pt;
            text-align: center;
        }

        table tr {
            height: 20pt;
        }

        .bg-dark {
            background: #000;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: x-large;
            padding: .5rem;
            height: 20pt !important;
        }

        .bg-dark-small {
            background: #000;
            color: #fff;
        }

        /* .rotate {
            vertical-align: bottom;
            text-align: center;
        }

        #rotate {
            -ms-writing-mode: tb-rl;
            -webkit-writing-mode: vertical-rl;
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            white-space: nowrap;
        } */

        .p3 {
            padding: 0.3rem;
        }

        .p2 {
            padding: 0.2rem;
        }
    </style>
</head>

@if (!empty($res['d1']))
<body>
    <div class="format">
        <table width='100%'>
            <tr height=20 class="noborder">
                <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                    <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                </td>
                <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                    <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap
                    !!}<br>TELP : (0413) 81292
                </td>
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d1'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d1'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">20</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d1'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">HASIL PEMERIKSAAN EKG</th>
            </tr>
            <tr>
                <td colspan="19" class="noborder">Tanggal dan Jam Perekaman : @foreach($res['d1'] as $item) @if($item->emrdfk == 31101096) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="30" class="noborder text-center">Pelaksana : @foreach($res['d1'] as $item) @if($item->emrdfk == 31101097) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: center">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101096) <img src="{!! $item->image !!}" style="width:600px;"> @endif @endforeach</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d2']))
<body>
    <div class="format">
        <table width='100%'>
            <tr height=20 class="noborder">
                <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                    <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                </td>
                <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                    <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap
                    !!}<br>TELP : (0413) 81292
                </td>
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d2'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d2'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d2'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d2'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">20</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d2'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">HASIL PEMERIKSAAN EKG</th>
            </tr>
            <tr>
                <td colspan="19" class="noborder">Tanggal dan Jam Perekaman : @foreach($res['d2'] as $item) @if($item->emrdfk == 31101096) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="30" class="noborder text-center">Pelaksana : @foreach($res['d2'] as $item) @if($item->emrdfk == 31101097) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: center">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101096) <img src="{!! $item->image !!}" style="width:600px;"> @endif @endforeach</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d3']))
<body>
    <div class="format">
        <table width='100%'>
            <tr height=20 class="noborder">
                <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                    <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                </td>
                <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                    <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap
                    !!}<br>TELP : (0413) 81292
                </td>
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d3'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d3'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d3'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d3'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">20</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d3'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">HASIL PEMERIKSAAN EKG</th>
            </tr>
            <tr>
                <td colspan="19" class="noborder">Tanggal dan Jam Perekaman : @foreach($res['d3'] as $item) @if($item->emrdfk == 31101096) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="30" class="noborder text-center">Pelaksana : @foreach($res['d3'] as $item) @if($item->emrdfk == 31101097) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: center">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101096) <img src="{!! $item->image !!}" style="width:600px;"> @endif @endforeach</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d4']))
<body>
    <div class="format">
        <table width='100%'>
            <tr height=20 class="noborder">
                <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                    <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                </td>
                <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                    <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap
                    !!}<br>TELP : (0413) 81292
                </td>
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d4'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d4'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d4'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d4'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">20</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d4'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">HASIL PEMERIKSAAN EKG</th>
            </tr>
            <tr>
                <td colspan="19" class="noborder">Tanggal dan Jam Perekaman : @foreach($res['d4'] as $item) @if($item->emrdfk == 31101096) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="30" class="noborder text-center">Pelaksana : @foreach($res['d4'] as $item) @if($item->emrdfk == 31101097) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: center">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101096) <img src="{!! $item->image !!}" style="width:600px;"> @endif @endforeach</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d5']))
<body>
    <div class="format">
        <table width='100%'>
            <tr height=20 class="noborder">
                <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                    <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                </td>
                <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                    <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap
                    !!}<br>TELP : (0413) 81292
                </td>
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d5'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d5'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d5'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d5'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">20</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d5'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">HASIL PEMERIKSAAN EKG</th>
            </tr>
            <tr>
                <td colspan="19" class="noborder">Tanggal dan Jam Perekaman : @foreach($res['d5'] as $item) @if($item->emrdfk == 31101096) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="30" class="noborder text-center">Pelaksana : @foreach($res['d5'] as $item) @if($item->emrdfk == 31101097) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: center">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101096) <img src="{!! $item->image !!}" style="width:600px;"> @endif @endforeach</td>
            </tr>
        </table>
    </div>
</body>
@endif


</html>