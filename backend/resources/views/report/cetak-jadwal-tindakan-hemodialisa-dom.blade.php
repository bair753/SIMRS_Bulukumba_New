
<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Tindakan Hemodialisa</title>
    
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
            page-break-inside:auto 
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
            border:none solid #000;
            border-collapse: collapse;
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
<body ng-controller="cetakJadwalTindakanHemo"   cellspacing="0">
    <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: center; border:none">
        <tr style="text-align:center;border:none">
            <td colspan="1" style="border:none" rowspan="4">
                <img src="{{ $image }}" alt="" style="height: 70px; width:60px; text-align: center;">
            </td>
            <td colspan="7" style="border:none;text-align:center;"><h2>PEMERINTAH KABUPATEN BULUKUMBA</h2></td>
            <td colspan="1" style="border:none" rowspan="4">
                {{-- @if(stripos(\Request::url(), 'localhost') !== FALSE)
                <img src="{{ asset('img/bakti-husada.png') }}" alt="" style="width: 60px;">
                @else
                <img src="{{ asset('img/bakti-husada.png') }}" alt="" style="width: 60px;">
                @endif --}}
            </td>
        </tr>

        <tr style="text-align:center;border:none">
            <td colspan="7" style="border:none"><h2>RUMAH SAKIT UMUM DAERAH</h2></td>
        </tr>
        <tr style="text-align:center;border:none">
            <td colspan="7" style="border:none"><h2>H. ANDI SULTHAN DAENG RADJA</h2></td>
        </tr>
        <tr style="text-align:center;border:none">
            <td colspan="7" style="border:none">Jalan Serikaya No. 17 Bulukumba 92512 Telpon (0413) 81290, 81292 FAX. 85030 </td>
        </tr>
        <tr style="text-align:center">
            <td colspan="9"  style="border:none;"><hr style="border:2px solid #000"></td>
        </tr>
    </table>
    <table  width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; border:none; font-size:13px;">
        <tr>
            <td>Kepada Yth.</td>
        </tr>
        <tr>
            <td><b>Kepala BPJS Kesehatan Cabang Bulukumba</b></td>
        </tr>
        <tr>
            <td>Di -</td>
        </tr>
        <tr>
            <td>Bulukumba</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>Dengan hormat,</td>
        </tr>
        <tr>
            <td>Bersama ini kami mohon fasilitas Hemodialisis @foreach($res['d'] as $item) @if($item->emrdfk == 32116153) {!! $item->value !!} @endif @endforeach *) kali seminggu terhadap :</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {!!  $res['d'][0]->namapasien  !!}</td>
        </tr>
        <tr>
            <td>Tgl. Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
        </tr>
        <tr>
            <td>No. RM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {!! $res['d'][0]->nocm  !!}</td>
        </tr>
        <tr>
            <td>No. BPJS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {!! $res['d'][0]->nobpjs  !!}</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>Yang sementara / diusulkan *) menjalani Hemodialisis @foreach($res['d'] as $item) @if($item->emrdfk == 32116153) {!! $item->value !!} @endif @endforeach *) kali seminggu, Segera setelah keadaan penderita membaik, kami akan turunkan frekuensinya. Klinis/alasan menaikkan frekuensi ialah :</td>
        </tr>
        <tr>
            <td>@foreach($res['d'] as $item) @if($item->emrdfk == 32116160) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>Lab&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Ureum : @foreach($res['d'] as $item) @if($item->emrdfk == 32116161) {!! $item->value !!} @endif @endforeach mg%, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kreatin : @foreach($res['d'] as $item) @if($item->emrdfk == 32116162) {!! $item->value !!} @endif @endforeach mg%, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TKK : @foreach($res['d'] as $item) @if($item->emrdfk == 32116163) {!! $item->value !!} @endif @endforeach ml/menit</td>
        </tr>
        <tr>
            <td>Diagnosis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: @foreach($res['d'] as $item) @if($item->emrdfk == 32116154) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>Jadwal Tindakan : </td>
        </tr>
        <tr>
            <td>1. @foreach($res['d'] as $item) @if($item->emrdfk == 32116164) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td>2. @foreach($res['d'] as $item) @if($item->emrdfk == 32116165) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td>3. @foreach($res['d'] as $item) @if($item->emrdfk == 32116166) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td>4. @foreach($res['d'] as $item) @if($item->emrdfk == 31104748) {!! $item->value !!} @endif @endforeach</td>
        </tr>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; border:none; font-size:13px;">
        <tr><td style="height:20px;" colspan="14"></td></tr>
        <tr style="text-align: center;">
            <td colspan="14" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" style="border:none">Bulukumba,
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116167)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
        </tr>
        
        <tr style="text-align: center;">
            <td colspan="14" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" style="border:none">Dokter Yang Menerima <br> Dari Bagian Hemodialisa</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="14" valign="bottom" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" valign="bottom" style="border:none">
                    @foreach($res['d'] as $item)
                        @if($item->emrdfk == 32116168)
                        <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px">
                        @endif
                    @endforeach    
            </td>
                
        </tr>
        <tr style="text-align: center;">
            <td colspan="14" valign="bottom" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" valign="bottom" style="border:none">
                <span>
                    @foreach($res['d'] as $item)
                        @if($item->emrdfk == 32116168)
                            <span style="font-size:9pt; color:#000000;">{{ substr($item->value, strpos($item->value, '~') + 1) }}</span>
                        @endif
                    @endforeach    
                </span>
            </td>
        </tr>
    </table>

</body>

</html>