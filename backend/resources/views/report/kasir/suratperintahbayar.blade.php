<html>
<head>
    <title>
        Report
    </title>
@if(stripos(\Request::url(), 'localhost') !== FALSE)
    <link rel="stylesheet" href="{{ asset('css/paper.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/table-v2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabel.css') }}">
    <link  rel="stylesheet" href="{{ asset('css/style.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('service/css/paper.css') }} ">
    <link rel="stylesheet" href="{{ asset('service/css/table-v2.css') }}">
    <link rel="stylesheet" href="{{ asset('service/css/tabel.css') }}">
    <link  rel="stylesheet" href="{{ asset('service/css/style.css') }}">
@endif
</head>
<style type="text/css" media="print">
    @media print
    {
        @page
        {
            size: auto;
            margin: 0;
            /* size: portrait; */
        }
        footer {
            display: none
        }
        header {
            display: none
        }
        body {
            -webkit-print-color-adjust: exact !important;
        }
    }
</style>
<style>
    tr td {
        padding:2px 4px 2px 4px;
    }
    .borderss{
        border-bottom: 1px solid black;
    }
    .baris1 {
       border: 2px solid #000000;
    }
    .baris2 {
       border: 1px solid #000000;
    }
    .garishalus{
       border:0.01em solid #9a9a9a;
    }
    .garishalus tr td {
       border:0.01em solid #9a9a9a;
       /* border: thin solid #9a9a9a; */
    }
    body{
        font-family: Tahoma, Geneva, sans-serif;
    }
 @page { size: A4 } .garis6 td{padding:3px !important;}
</style>
<body style="background-color: #CCCCCC;margin: 0" onLoad="window.print()">
<div align="center">
    <table class="bayangprint" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}" style="padding:25px">
        <tbody>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td rowspan="5">
                                <p align="right">
                                    @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                    @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                    @endif
                                </p>
                            </td>
                            <td align="center">
                                <font style="font-size: 14pt;font-weight: 600;letter-spacing: 4px;" color="#000000" >
                                    {!! strtoupper($profile->namapemerintahan) !!}
                                </font>
                            </td>
                            <td rowspan="5">
                                <div style="width: 80px;">
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <font style="font-size: 14pt;font-weight: 600" color="#000000" >BADAN LAYANAN UMUM DAERAH</font>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <font style="font-size: 16pt;font-weight: 600;letter-spacing: 2px;" color="#000000" >
                                     {!! strtoupper($profile->namalengkap) !!} 
                                    
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <font style="font-size: 12pt;" color="#000000" >
                                    {!! $profile->alamatlengkap  !!} 
                                    
                                    {{ $profile->fixedphone . "/" . $profile->faksimile }}
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <font style="font-size: 12pt;" color="#000000" >
                                    Email : <a href="#"> {!! $profile->alamatemail !!} </a> 
                                    Website : <a href="#"> {!! $profile->website !!} </a> 
                                </font>
                            </td>
                        </tr>
                    </table>
                    <hr class="baris1">
                    <hr class="baris2">
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="center">
                                <font style="font-size: 14pt;font-weight: bold" color="#000000" >SURAT PERINTAH BAYAR</font>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td colspan="4" style="padding-bottom: 20px;">
                                <font style="font-size: 10pt;" color="#000000" >
                                    Print by {{ $dataReport['user'] }} &nbsp;&nbsp;&nbsp;
                                    {{ date ('d/m/Y H:i') }}
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%"><font style="font-size: 11pt;" color="#000000">No. Registrasi</font></td>
                            <td width="30%"><font style="font-size: 11pt;" color="#000000">: {{ $dataReport['datas']->noregistrasi }}</font></td>
                            <td width="15%"><font style="font-size: 11pt;" color="#000000">No. Kwitansi</font></td>
                            <td width="35%"><font style="font-size: 11pt;" color="#000000">: {{ $dataReport['datas']->nostruk }}</font></td>
                        </tr>
                         <tr>
                            <td width="20%"><font style="font-size: 11pt;" color="#000000">NAMA/MR</font></td>
                            <td width="80%" colspan="3"><font style="font-size: 11pt;" color="#000000">: {{ $dataReport['datas']->pasien }}</font></td>
                        </tr>
                        @if($dataReport['datas']->type == "VA")
                        <tr>
                            <td width="20%"><font style="font-size: 11pt;" color="#000000">No. Virtual Account</font></td>
                            <td width="80%" colspan="3"><font style="font-size: 11pt;" color="#000000">: {{ $dataReport['datas']->va_number }}</font></td>
                        </tr>
                        <tr>
                            <td width="20%"><font style="font-size: 11pt;" color="#000000">Batas Waktu Pembayaran</font></td>
                            <td width="80%" colspan="3"><font style="font-size: 11pt;" color="#000000">: {{ $dataReport['datas']->tanggalexpired }}</font></td>
                        </tr>
                        @endif
                        <tr>
                            <td width="20%"><font style="font-size: 11pt;" color="#000000">Pembayaran</font></td>
                            <td width="80%" colspan="3"><font style="font-size: 11pt;" color="#000000">: {{ $dataReport['datas']->espayproduct_name }}</font></td>
                        </tr>
                        <tr>
                            <td width="20%"><font style="font-size: 11pt;" color="#000000">Banyaknya uang</font></td>
                            <td width="80%" colspan="3"><font style="font-size: 11pt;">:</font><font style="font-size: 11pt;font-weight: bold;font-style:italic;" color="#000000"> Rp. {{ number_format($dataReport['datas']->amount,2, '.', ',') }}</font></td>
                        </tr>
                        <tr>
                            <td width="20%"><font style="font-size: 11pt;" color="#000000">Terbilang</font></td>
                            <td width="80%" colspan="3"><font style="font-size: 11pt;" color="#000000">: {{ strtoupper(App\Http\Controllers\Report\ReportController::terbilang($dataReport['datas']->amount)) }}</font></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-top:20px">
                    <table width="100%" cellspacing="0" cellpadding="0">
                    @if($dataReport['datas']->type == "VA")
                        <tr>
                            <td width="50%" align="center"><font style="font-size: 11pt;" color="#000000"; align="center"></font></td>
                            <td width="50%" align="center"><font style="font-size: 11pt;" color="#000000">{!! $profile->namakota !!}, &nbsp;&nbsp;{{ $dataReport['datas']->tanggal }}</font></td>
                        </tr>
                        <tr>
                            <td width="50%" align="center"></td>
                            <td width="50%" align="center"></td>
                        </tr>
                        <tr>
                            <td height="80" valign="bottom" height="100" width="25%" align="center">
                            </td>
                            <td height="80" valign="bottom" height="100"width="25%" align="center">
                                <font style="font-size: 11pt;" color="#000000" >{{ $dataReport['datas']->pegawaipenerima }}</font>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td width="50%" align="left" rowspan="2">
                                <font style="font-size: 11pt;" color="#000000"; align="center">Silahkan Scan untuk melakukan pembayaran !</font>
                                <img src="{{ $dataReport['datas']->qr_code }}" alt="QR Payment" />
                            </td>
                            <td width="50%" align="center"><font style="font-size: 11pt;" color="#000000">{!! $profile->namakota !!}, &nbsp;&nbsp;{{ $dataReport['datas']->tanggal }}</font></td>
                        </tr>
                        <tr>
                            <td height="80" valign="bottom" height="100"width="25%" align="center">
                                <font style="font-size: 11pt;" color="#000000" >{{ $dataReport['datas']->pegawaipenerima }}</font>
                            </td>
                        </tr>
                    @endif
                        
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</body>