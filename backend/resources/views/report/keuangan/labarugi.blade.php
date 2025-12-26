<html>
<head>
    <title>
        Laba Rugi
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
                        </tr>                      
                        <tr>
                            <td align="left">
                                <font style="font-size: 16pt;font-weight: 600;letter-spacing: 2px;" color="#000000" >
                                    {!! strtoupper($profile->namalengkap) !!}                                    
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td align="left">
                                <font style="font-size: 12pt;" color="#000000" >
                                    {!! $profile->alamatlengkap !!},<br />
                                    Tlp.{!! $profile->fixedphone  !!},Fax.{!! $profile->faksimile !!}
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td align="left">
                                <font style="font-size: 12pt;" color="#000000" >
                                    Email : <a href="#"> {!! $profile->alamatemail !!} </a> 
                                    Website : <a href="#"> {!! $profile->website !!} </a> 
                                </font>
                            </td>
                        </tr>
                    </table>                    
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="center" height="80px">
                                <font style="font-size: 14pt;" color="#000000" >
                                    <b>LAPORAN OPERASIONAL / LABA - RUGI</b>
                                    <br />
                                    <span style="font-size:12pt;">
                                        Untuk Periode yang Berakhir {!! strtoupper($dataReport['periode']) !!}
                                    </span>
                                </font>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-top:20px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="1" align="center" bgcolor="#FFFFFF">
                        <tr class="garisatasbawah">
                            <th align="center"><font style="font-size: 11pt;" color="#000000" >Kode Akun</font></th>
                            <th align="center"><font style="font-size: 11pt;" color="#000000" >Nama Akun</font></th>
                            <th align="center"><font style="font-size: 11pt;" color="#000000" >Saldo</font></th>
                            <th align="center"><font style="font-size: 11pt;" color="#000000" >Jumlah Saldo</font></th>
                        </tr>
                        @php
                            $nomor = 1;                          
                            $total = 0;
                            $totalAll = 0;

                            $totalKe = 0;
                            $totalKeAll = 0;
                            $kdmap = "";
                        @endphp
                        @foreach($dataReport['datas'] as $item)                           
                            @if( $item['kdmap'][0] == "8" )
                                <tr>
                                    <td align="left">
                                        @if( strlen($item['kdmap']) == 1 || strlen($item['kdmap']) == 4)
                                            <font style="font-size: 11pt;" color="#000000" >
                                                <b>{{ $item['kdmap'] }}</b>
                                            </font>
                                        @else
                                            <font style="font-size: 11pt;" color="#000000" >
                                                {{ $item['kdmap'] }}
                                            </font>
                                        @endif
                                    </td>
                                    <td align="left">
                                        @if( strlen($item['kdmap']) == 1 || strlen($item['kdmap']) == 4)
                                            <font style="font-size: 11pt;" color="#000000" >
                                                <b>{{ $item['namamap'] }}</b>
                                            </font>
                                        @else
                                            <font style="font-size: 11pt;" color="#000000" >
                                                {{ $item['namamap'] }}
                                            </font>
                                        @endif                                        
                                    </td>                                    
                                    <td align="right">
                                        <font style="font-size: 11pt;" color="#000000" >
                                            {{ number_format($item['total2'], 2, '.', ',') }}
                                        </font>
                                    </td>
                                    <td align="right">
                                        <font style="font-size: 11pt;" color="#000000" >
                                            {{ number_format($item['total'], 2, '.', ',') }}
                                        </font>
                                    </td>
                                </tr>
                                @php
                                    $total = $total + $item['total2'];
                                    $totalAll = $totalAll + $item['total'];                                
                                @endphp                                                                                   
                            @endif                            
                         @endforeach                                                                                                            
                         @foreach($dataReport['datas'] as $item)                           
                            @if( $item['kdmap'][0] == "9" )
                                <tr>
                                    <td align="left">
                                        @if( strlen($item['kdmap']) == 1 || strlen($item['kdmap']) == 4)
                                            <font style="font-size: 11pt;" color="#000000" >
                                                <b>{{ $item['kdmap'] }}</b>
                                            </font>
                                        @else
                                            <font style="font-size: 11pt;" color="#000000" >
                                                {{ $item['kdmap'] }}
                                            </font>
                                        @endif
                                    </td>
                                    <td align="left">
                                        @if( strlen($item['kdmap']) == 1 || strlen($item['kdmap']) == 4)
                                            <font style="font-size: 11pt;" color="#000000" >
                                                <b>{{ $item['namamap'] }}</b>
                                            </font>
                                        @else
                                            <font style="font-size: 11pt;" color="#000000" >
                                                {{ $item['namamap'] }}
                                            </font>
                                        @endif                                        
                                    </td>                                    
                                    <td align="right">
                                        <font style="font-size: 11pt;" color="#000000" >
                                            {{ number_format($item['total2'], 2, '.', ',') }}
                                        </font>
                                    </td>
                                    <td align="right">
                                        <font style="font-size: 11pt;" color="#000000" >
                                            {{ number_format($item['total'], 2, '.', ',') }}
                                        </font>
                                    </td>
                                </tr>
                                @php
                                    $totalKe = $totalKe + $item['total2'];
                                    $totalKeAll = $totalKeAll + $item['total'];                                
                                @endphp                                                                                   
                            @endif                            
                      @endforeach                                                                                                                                            
                    </table>
                </td>
            </tr>             
        </tbody>
    </table>
</div>
</body>