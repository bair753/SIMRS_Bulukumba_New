<!DOCTYPE html>
<html lang="en" ng-app="angularApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Konsul Dokter</title>

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
            /* border:none solid #000; */
            border-collapse: collapse;
            font-size:10pt;
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
@php
    $no = 1;
@endphp
@foreach ($res['data'] as $item)
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  30px 30px 30px 30px; text-align: center;">
                <tr>
                    <td width="10%" style="padding: 15px">
                        <img src="{{ $image }}" alt="" style="height:81px; width:70px; text-align: center;">
                    </td>
                    <td width="35%" style="text-align: center;">
                        <span style="font-size: 14px"><b>{!! $res['profile']->namalengkap !!}</b></span>
                        <br>
                        <span style="font-size: 12px;">{!! $res['profile']->alamatlengkap !!}</span>
                    </td>
                    <td width="20%">
                        <div style="text-align: left">
                            <table style="padding: 3px;border:none">
                                <tr>
                                    <td class="f-s-15 bold  text-top" style="width: 100px">No. RM</td>
                                    <td class="f-s-15 bold  text-top">:</td>
                                    <td class="f-s-15 bold text-top"><b>{{ $item->nocm }}</b></td>
                                </tr>
                                <tr>
                                    <td class="f-s-15 bold  text-top">Nama</td>
                                    <td class="f-s-15 bold  text-top">:</td>
                                    <td class="f-s-15 bold  text-top"><b>{{ $item->namapasien }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="f-s-15 bold  text-top">Tgl Lahir</td>
                                    <td class="f-s-15 bold  text-top">:</td>
                                    <td class="f-s-15 bold  text-top">
                                        <b>{!! date('d-m-Y', strtotime($item->tgllahir)) !!}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="f-s-15 bold  text-top">NIK</td>
                                    <td class="f-s-15 bold  text-top">:</td>
                                    <td class="f-s-15 bold  text-top"><b>{{ $item->noidentitas }}</b>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>
                        <div style="padding: 20px;font-size: 18px;">
                            <b>RM</b>
                        </div>
                        <div style="padding: 20px;font-size: 18px;">
                            <b>&nbsp;32</b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center;font-size: 16px;padding: 5px;background-color:black">
                        <b style="color:white">SURAT KONSUL DOKTER</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                            <table style="border: none;">
                                <tr>
                                    <td style="padding-left: 5px;padding-top:30px;">
                                        <span class="f-s-15">Dari Dokter </span><span> :
                                        </span><span>{{ $item->pengonsul }}</span>
                                    </td>
                                    <td style="padding-left: 250px;padding-top:30px;">
                                        <span class="f-s-15">Ahli </span><span> : </span><span>Belum Diset</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                            <table style="border: none;">
                                <tr>
                                    <td style="padding-left: 5px;padding-top:10px;">
                                        <span class="f-s-15">Untuk Dokter </span><span> :
                                        </span><span>{{ $item->namalengkap }}</span>
                                    </td>
                                    <td style="padding-left: 250px;padding-top:10px;">
                                        <span class="f-s-15">Ahli </span><span> : </span><span>Belum Diset</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <div>
                            <table style="border: none; text-align:left">
                                <tr>
                                    <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                        <span class="f-s-15">Jam/Tanggal </span><span> :
                                        </span><span>{!! date('H:i d-m-Y', strtotime($item->tglorder)) !!}</span>
                                    </td>
                                    <td style="padding-left: 300px;padding-top:10px;padding-bottom:10px;">
                                        
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2" style="padding-left: 5px;padding-bottom:30px;text-align:justify">
                                        <span class="f-s-15">{{ $item->keteranganorder }}</span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="padding-left: 5px;padding-top:10px;">
                                        
                                    </td>
                                    <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                        <center><span class="f-s-15">Bulukumba, <?php echo date("d-m-Y"); ?></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 5px;padding-top:5px;">
                                        
                                    </td>
                                    <td style="padding-left: 5px;padding-bottom:10px;">
                                        <center><span class="f-s-15">Tanda tangan</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 5px;padding-top:10px;">
                                        
                                    </td>
                                    <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                        <center><img src="data:image/png;base64, {!! $item->qrcodepengonsul !!} " style="height: 70px; width:70px"></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 5px;padding-top:10px;">
                                        
                                    </td>
                                    <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                        <center><span class="f-s-15">({{ $item->pengonsul }})</center>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center;font-size: 16px;padding: 5px;background-color:black">
                        <b style="color:white">JAWABAN KONSUL</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <div>
                            <table style="border: none;text-align: left;">
                                <tr>
                                    <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                        <span class="f-s-15">Jam/Tanggal </span><span> :
                                        </span><span><?php echo date("H:i d-m-Y"); ?></span>
                                    </td>
                                    <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-left: 5px;padding-bottom:30px;padding-right: 5px;">
                                        <span class="f-s-15">{{ $item->keteranganlainnya }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 5px;padding-top:10px;">
                                        
                                    </td>
                                    <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                        <center><span class="f-s-15">Bulukumba, <?php echo date("d-m-Y"); ?></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 5px;padding-top:5px;">
                                        
                                    </td>
                                    <td style="padding-left: 5px;padding-bottom:10px;">
                                        <center><span class="f-s-15">Tanda tangan</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 5px;padding-top:10px;">
                                        
                                    </td>
                                    <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                        <center><img src="data:image/png;base64, {!! $item->qrcodenamalengkap !!} " style="height: 70px; width:70px"></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 5px;padding-top:10px;">
                                        
                                    </td>
                                    <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                        <center><span class="f-s-15">({{ $item->namalengkap }})</center>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </td>
                </tr>

            </table>
        </section>
    </body>
@php
    $no++;
@endphp
@endforeach
</html>
