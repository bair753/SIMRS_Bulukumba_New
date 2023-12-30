<!DOCTYPE html>
<html lang="en" ng-app="angularApp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ringkasan Pulang</title>

  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      /* font-family: DejaVu Sans, Verdana, Arial, sans-serif; */
      font-family: Arial, Helvetica, sans-serif;
    }

    body,
    html {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 7pt;
      margin: 10px 20px;
    }

    table {
      border: 1px solid #000;
      border-collapse: collapse;
    }

    table tr td {
      border: 1px solid #000;
      border-collapse: collapse;
      padding: .3rem;
    }

    .table-noborder,
    tr,
    td {
      border: 0;
      border-collapse: collapse;
      padding: .3rem;


    }
    .border-doang {
      border-collapse: collapse;
      border: thin solid #000;
      border-top: none;
    }

    .border-doang td {
      padding: 5px;
    }

    .judulLabel {
      font-weight: bold;
    }

    .background-gray {
      background-color: #aaa7a7;
    }
  </style>
</head>

<body>

  <table width="100%" style="table-layout:fixed;text-align:center;">
    <tr>
      <td style="width:15%;margin:0 auto;" rowspan="2">
        <figure style="width:60px;margin:0 auto;">
          <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
        </figure>
      </td>
      <td style="width:35%;margin:0 auto;" rowspan="2">
        <table width="100%" style="border:none;table-layout:fixed;text-align:center;">
          <tr style="border:none;text-align:center;">
            <td style="text-align:center;border:none;">
              <strong style="font-size: 11pt">{!! $res['profile']->namalengkap !!}</strong> <br>
              JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
              TELP : {!! $res['profile']->fixedphone !!}
            </td>
          </tr>
        </table>

      </td>

      <td style="width:25%;margin:0;" rowspan="2">
        <table width="100%" style="border:none;table-layout:fixed;text-align:left;">
          <tr>
            <td colspan="4" style="border:none;font-size:7pt;">No. RM</td>
            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d'][0]->nocm !!} </td>

          </tr>
          <tr>
            <td colspan="4" style="border:none;font-size:7pt;">Nama</td>
            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d'][0]->namapasien !!} ({!!
              $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

          </tr>
          <tr>
            <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
            <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
              $res['d'][0]->tgllahir
              )) !!}</td>
          </tr>
          <tr>
            <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d'][0]->noidentitas !!}</td>

          </tr>
        </table>

      </td>
      <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
        RM</td>

    </tr>
    <tr>
      <td style="text-align:center;font-size:36px">122</td>
    </tr>
  </table>

  <table width="100%" class="table-border">
    <tr>
      <td colspan="3" style="text-align: center;font-size: 16px;padding: 5px" class="background-gray">
        <b>RINGKASAN PULANG</b>
      </td>
    </tr>
    <tr>

      <td style="border-right: 1px solid #000;padding-left: 5px">
        <span class="f-s-15">Ruang/bagian </span><span> : </span><span> @foreach($res['d'] as $item) @if($item->emrdfk == 423800) {!! $item->value !!} @endif @endforeach</span>
      </td>
      <td style="border-right: 1px solid #000;padding-left: 5px">
        <span class="f-s-15">Tanggal Masuk </span><span> : </span><span> @foreach($res['d'] as $item) @if($item->emrdfk == 423801) {!! $item->value !!} @endif @endforeach</span>
      </td>
      <td style="padding-left: 5px">
        <span class="f-s-15">Tanggal Keluar </span><span> : </span><span> @foreach($res['d'] as $item) @if($item->emrdfk == 423802) {!! $item->value !!} @endif @endforeach</span>
      </td>

    </tr>
  </table>
  <section>
    <div class="border-doang" style="overflow: auto; min-height: 60px">
      <span class="f-s-15 background-gray"><b>Riwayat Kesehatan</b> </span><span class="background-gray"> <b>:</b>
      </span><span> @foreach($res['d'] as $item) @if($item->emrdfk == 423803) {!! $item->value !!} @endif @endforeach</span>
    </div>
    <div class="border-doang" style="overflow: auto; min-height: 60px">
      <span class="f-s-15 background-gray"><b>Indikasi Dirawat</b> </span><span class="background-gray"> <b>:</b>
      </span><span> @foreach($res['d'] as $item) @if($item->emrdfk == 423804) {!! $item->value !!} @endif @endforeach</span>
    </div>
    <div class="border-doang" style="overflow: auto; min-height: 60px">
      <div style="width: 70%;float: left;">
        <span class="f-s-15 background-gray"><b>Diagnosis</b> </span><span class="background-gray"> <b>:</b>
        </span><span> @foreach($res['d'] as $item) @if($item->emrdfk == 423805) {!! $item->value !!} @endif @endforeach</span>
      </div>
      <div style="width: 30%; float: right;border-left: 1px solid #000;box-sizing: border-box;overflow: auto; min-height: 60px;">
        <div style="text-align: center;" class="background-gray">
          <b>ICD 10</b>
        </div>
        <span style="padding: 3px;box-sizing: border-box;">
          @foreach($res['d'] as $item) @if($item->emrdfk == 423806) {!! $item->value !!} @endif @endforeach
        </span>
      </div>
    </div>
    <div class="border-doang" style="overflow: auto; min-height: 60px">
      <div style="width: 70%;float: left;">
        <span class="f-s-15 background-gray"><b>Komorbiditas Lain</b> </span><span class="background-gray"> <b>:</b>
        </span><span>@foreach($res['d'] as $item) @if($item->emrdfk == 423807) {!! $item->value !!} @endif @endforeach</span>
      </div>
      <div style="width: 30%; float: right;border-left: 1px solid #000;box-sizing: border-box;overflow: auto; min-height: 60px;">
        <div style="text-align: center;" class="background-gray">
          <b>ICD 10</b>
        </div>
        <span style="padding: 3px;box-sizing: border-box;">
          @foreach($res['d'] as $item) @if($item->emrdfk == 31101417) {!! $item->value !!} @endif @endforeach <br>
          &nbsp;@foreach($res['d'] as $item) @if($item->emrdfk == 31101418) {!! $item->value !!} @endif @endforeach <br>
          &nbsp;@foreach($res['d'] as $item) @if($item->emrdfk == 31101419) {!! $item->value !!} @endif @endforeach <br>
          &nbsp;@foreach($res['d'] as $item) @if($item->emrdfk == 31101420) {!! $item->value !!} @endif @endforeach <br>
          &nbsp;@foreach($res['d'] as $item) @if($item->emrdfk == 31101421) {!! $item->value !!} @endif @endforeach
        </span>
      </div>
    </div>
    <div class="border-doang" style="overflow: auto; min-height: 60px">
      <span class="f-s-15 background-gray"><b>Pemeriksaan Fisik</b> </span><span class="background-gray"> <b>:</b>
      </span><span> @foreach($res['d'] as $item) @if($item->emrdfk == 423809) {!! $item->value !!} @endif @endforeach</span>
    </div>
    <div class="border-doang" style="overflow: auto; min-height: 60px">
      <span class="f-s-15 background-gray"><b>Pemeriksaan Diagnostik</b> </span><span class="background-gray"> <b>:</b>
      </span><span> @foreach($res['d'] as $item) @if($item->emrdfk == 423810) {!! $item->value !!} @endif @endforeach</span>
    </div>
    <div class="border-doang" style="overflow: auto; min-height: 60px">
      <div style="width: 70%;float: left;">
        <span class="f-s-15 background-gray"><b>Tindakan yang Telah Dikerjakan</b> </span><span class="background-gray">
          <b>:</b> </span><span> @foreach($res['d'] as $item) @if($item->emrdfk == 423811) {!! $item->value !!} @endif @endforeach</span>
      </div>
      <div style="width: 30%; float: right;border-left: 1px solid #000;box-sizing: border-box;overflow: auto; min-height: 60px;">
        <div style="text-align: center;" class="background-gray">
          <b>ICD 9-CM</b>
        </div>
        <span style="padding: 3px;box-sizing: border-box;">
          @foreach($res['d'] as $item) @if($item->emrdfk == 423812) {!! $item->value !!} @endif @endforeach <br>
          &nbsp;@foreach($res['d'] as $item) @if($item->emrdfk == 32116614) {!! $item->value !!} @endif @endforeach <br>
          &nbsp;@foreach($res['d'] as $item) @if($item->emrdfk == 32116615) {!! $item->value !!} @endif @endforeach <br>
          &nbsp;@foreach($res['d'] as $item) @if($item->emrdfk == 32116616) {!! $item->value !!} @endif @endforeach <br>
          &nbsp;@foreach($res['d'] as $item) @if($item->emrdfk == 32116617) {!! $item->value !!} @endif @endforeach
        </span>
      </div>
    </div>
    <div class="border-doang" style="overflow: auto; min-height: 60px">
      <span class="f-s-15 background-gray"><b>Obat yang Diberikan</b> </span><span class="background-gray"> <b>:</b>
      </span><span> @foreach($res['d'] as $item) @if($item->emrdfk == 423813) {!! $item->value !!} @endif @endforeach</span>
    </div>
    <div class="border-doang" style="overflow: auto; min-height: 30px">
      <span class="f-s-15 background-gray"><b>Kondisi Pasien</b> </span><span class="background-gray"> <b>:</b>
      </span><span> @foreach($res['d'] as $item) @if($item->emrdfk == 423814) {!! $item->value !!} @endif @endforeach</span>
    </div>
    <div class="border-doang" style="overflow: auto; min-height: 30px">
      <span class="f-s-15 background-gray"><b>Tindak Lanjut</b> </span><span class="background-gray"> <b>:</b>
      </span><span> @foreach($res['d'] as $item) @if($item->emrdfk == 423815) {!! $item->value !!} @endif @endforeach</span>
    </div>
    <div class="border-doang" style="overflow: auto; min-height: 200px">
    <br>
    <br>
    <div style="float: right; width: 40%; text-align: end; padding-right: 5px">
        <span>Bulukumba, </span>
        <span>@foreach($res['d'] as $item) @if($item->emrdfk == 423816) {!! $item->value !!} @endif @endforeach WITA</span>
    </div>
    <br>
    <br>

    <div style="text-align: adjustment-center">
    <div style="width: 33%; float: left; box-sizing: border-box;">
        <div style="text-align: center">
            <span>Pasien</span>
        </div>
        <br>
        <center>@foreach($res['d'] as $item) @if($item->emrdfk == 423817) <img src="data:image/png;base64, {!! $item->value1 !!} " style="height: 70px; width:70px;"> @endif @endforeach</center>
        <br>
        <div style="text-align: center">
            <span>( @foreach($res['d'] as $item) @if($item->emrdfk == 423817) {!! $item->value !!} @endif @endforeach )</span>
        </div>
    </div>
    <div style="float: left; box-sizing: border-box;">
        <div style="text-align: center">
            <span>Keluarga Pasien</span>
        </div>
        <br>
        <center>@foreach($res['d'] as $item) @if($item->emrdfk == 423818) <img src="data:image/png;base64, {!! $item->value2 !!} " style="height: 70px; width:70px;"> @endif @endforeach</center>
        <br>
        <div style="text-align: center">
            <span>( @foreach($res['d'] as $item) @if($item->emrdfk == 423818) {!! $item->value !!} @endif @endforeach )</span>
        </div>
    </div>
    <div style="width: 33%; float: left; box-sizing: border-box;">
        <div style="text-align: center">
            <span>DPJP</span>
        </div>
        <br>
        <center>@foreach($res['d'] as $item) @if($item->emrdfk == 423819) <img src="data:image/png;base64, {!! $item->value3 !!} " style="height: 70px; width:70px;"> @endif @endforeach</center>
        <br>
        <div style="text-align: center">
            <span>( @foreach($res['d'] as $item) @if($item->emrdfk == 423819) {!! $item->value !!} @endif @endforeach )</span>
        </div>
    </div>
    </div>
</div>
    <div class="border-doang" style="padding: 10px;box-sizing: border-box;overflow: auto;min-height: 30px">
      <div style="float: left;width: 50%">
        <div class="f-s-15"><i>Lembar 1 : Berkas Rekam Medis</i></div>
        <div class="f-s-15"><i>Lembar 3 : Pasien</i></div>
      </div>
      <div style="float: right;width: 50%">
        <div class="f-s-15"><i>Lembar 2 : FASKES yang Memberikan Tindak Lanjut Asuhan</i></div>
        <div class="f-s-15"><i>Lembar 4 : Penjamin/Asuransi</i></div>
      </div>
    </div>
  </section>
</body>

</html>