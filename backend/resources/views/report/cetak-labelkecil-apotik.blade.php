<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Label</title>
    @if(stripos(\Request::url(), 'localhost') !== FALSE)
        <link rel="stylesheet" href="{{ asset('css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/tabel.css') }}">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <!-- angular -->
        <script src="{{ asset('js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('js/angular/angular-material.js') }}" type="text/javascript"></script>
    @else
        <link rel="stylesheet" href="{{ asset('service/css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('service/css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('service/css/report/tabel.css') }}">
        <script src="{{ asset('service/js/jquery.min.js') }}"></script>
        <script src="{{ asset('service/js/jquery.qr-code.js') }}"></script>
        <link href="{{ asset('service/css/style.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <!-- angular -->
        <script src="{{ asset('service/js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('service/js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('service/js/angular/angular-material.js') }}" type="text/javascript"></script>
    @endif
    <style>
        /* @page {
        size: 7in 9.25in;
        margin-left: 2mm;
        } */
        table {
          font-family: arial, sans-serif;
          width: 100%;
        }
        
        td, th {
          text-align: left;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        div.upage{
            padding-top: 5pt;
            padding-bottom: 7pt;
        }
        div.upageany{
            padding-top: 10pt;
            padding-bottom: 3pt;
        }
        </style>
</head>
<body>
    @php
        $no = 0;
    @endphp
    @foreach ($res['d'] as $item)
    @php
        $no = $no + 1;
    @endphp
    <div class="<?php print ($no == 1 or $no == 4 or $no == 7 or $no == 10) ? 'upage' : 'upageany';?>">
        <table>
            <tr>
                <td colspan="2" style="text-align: center; font-size:6pt;" ><b>{{ $res['profile']->namaexternal }}</b></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; font-size:5pt;"><b>APOTEKER : {{ $item->apoteker }}</b></td>
            </tr>
            <tr>
              <td style="font-size:6pt;">&nbsp;&nbsp;&nbsp;&nbsp;{{ $item->nocm }}</td>
              <td style="font-size:6pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl : {{ $item->tglresep }}</td>
            </tr>
            <tr>
              <td style="font-size:6pt;">&nbsp;&nbsp;&nbsp;&nbsp;{{ $item->namapasien }}</td>
              <td></td>
            </tr>
            <tr>
                <td colspan="2" style="font-size:6pt;">&nbsp;&nbsp;&nbsp;&nbsp;<b>{{ $item->namaproduk }}</b></td>
            </tr>
            <tr>
                <td colspan="2" style="font-size:6pt;">&nbsp;&nbsp;&nbsp;&nbsp;<b>{{ $item->aturanpakai }} {{ $item->keteranganpakai }}</b></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; font-size:6pt;">.</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; font-size:6pt;"><b>OBAT LUAR</b></td>
            </tr>
        </table>
    </div>
    @endforeach 
    <script>
        $(document).ready(function () {
            window.print();
        });
    </script>
</body>
</html>
