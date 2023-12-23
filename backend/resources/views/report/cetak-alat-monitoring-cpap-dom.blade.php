<!DOCTYPE html>
<html lang="en" ng-app="angularApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alat Monitoring CPAP</title>

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
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d1'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d1'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d1'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
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
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d2'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d2'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d2'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
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
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d3'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d3'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d3'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
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
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d4'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d4'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d4'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
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
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d5'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d5'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d5'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d6']))
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
                    : {!!$res['d6'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d6'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d6'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d6'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d6'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d6'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d6'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d6'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d7']))
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
                    : {!!$res['d7'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d7'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d7'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d7'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d7'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d7'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d7'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d7'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d8']))
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
                    : {!!$res['d8'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d8'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d8'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d8'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d8'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d8'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d8'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d8'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d9']))
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
                    : {!!$res['d9'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d9'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d9'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d9'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d9'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d9'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d9'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d9'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d10']))
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
                    : {!!$res['d10'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d10'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d10'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d10'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d10'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d10'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d10'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d10'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d11']))
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
                    : {!!$res['d11'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d11'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d11'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d11'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d11'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d11'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d11'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d11'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d12']))
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
                    : {!!$res['d12'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d12'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d12'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d12'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d12'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d12'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d12'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d12'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d13']))
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
                    : {!!$res['d13'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d13'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d13'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d13'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d13'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d13'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d13'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d13'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d14']))
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
                    : {!!$res['d14'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d14'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d14'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d14'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d14'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d14'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d14'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d14'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d15']))
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
                    : {!!$res['d15'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d15'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d15'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d15'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d15'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d15'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d15'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d15'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d16']))
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
                    : {!!$res['d16'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d16'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d16'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d16'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d16'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d16'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d16'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d16'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d17']))
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
                    : {!!$res['d17'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d17'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d17'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d17'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d17'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d17'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d17'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d17'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d18']))
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
                    : {!!$res['d18'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d18'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d18'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d18'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d18'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d18'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d18'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d18'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d19']))
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
                    : {!!$res['d19'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d19'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d19'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d19'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d19'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d19'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d19'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d19'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d20']))
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
                    : {!!$res['d20'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d20'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d20'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d20'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d20'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d20'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d20'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d20'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d21']))
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
                    : {!!$res['d21'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d21'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d21'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d21'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d21'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d21'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d21'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d21'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d22']))
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
                    : {!!$res['d22'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d22'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d22'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d22'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d22'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d22'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d22'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d22'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d22'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d23']))
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
                    : {!!$res['d23'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d23'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d23'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d23'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d23'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d23'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d23'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d23'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d23'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d24']))
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
                    : {!!$res['d24'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d24'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d24'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d24'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d24'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d24'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d24'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d24'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d24'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

@if (!empty($res['d25']))
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
                    : {!!$res['d25'][0]->nocm !!}
                </td>
                <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                </td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!! $res['d25'][0]->namapasien !!}
                </td>
                <td colspan="2" class="noborder">{!! $res['d25'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                    : {!! date('d-m-Y',strtotime($res['d25'][0]->tgllahir )) !!}
                </td>
                <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
            </tr>
            <tr class="noborder">
                <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                    : {!!$res['d25'][0]->noidentitas !!}
                </td>
            </tr>
            <tr class="bordered bg-dark">
                <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
            </tr>
            <tr>
                <td colspan="9" class="noborder">Tanggal : @foreach($res['d25'] as $item) @if($item->emrdfk == 32103929) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau
                    memberi tanda “X” bila sudah dilakukan</td>
            </tr>
            <tr>
                <td colspan="13" class="text-right">Waktu&nbsp;</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103930) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103931) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103932) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103933) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103934) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103935) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103936) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3" style="text-align: center"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103937) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12" style="text-align: center">Catatan</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103938) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103939) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103940) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103941) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103942) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103943) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103944) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103945) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103946) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103947) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103948) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103949) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103950) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103951) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103952) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103953) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103954) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103955) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103956) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103957) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103958) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103959) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103960) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103961) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103962) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103963) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103964) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103965) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103966) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103967) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103968) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103969) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103970) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103971) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103972) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103973) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103974) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103975) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103976) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103977) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103978) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103979) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103980) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103981) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103982) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103983) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103984) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103985) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103986) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103987) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103988) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103989) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103990) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103991) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103992) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103993) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103994) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103995) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103996) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103997) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103998) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32103999) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104000) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada  @foreach($res['d25'] as $item) @if($item->emrdfk == 32104001) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104002) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104003) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104004) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104005) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104006) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104007) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104008) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104009) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104010) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104011) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104012) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104013) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104014) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104015) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104016) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104017) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104018) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104019) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104020) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104021) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104022) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104023) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104024) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104025) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104026) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104027) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104028) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104029) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104030) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104031) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104032) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104033) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104034) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104035) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104036) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="12"> @foreach($res['d25'] as $item) @if($item->emrdfk == 32104037) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="49" style="text-align: left">&nbsp;&nbsp; @foreach($res['d25'] as $item) @if($item->emrdfk == 32104038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
            </tr>
        </table>
    </div>
</body>
@endif

</html>