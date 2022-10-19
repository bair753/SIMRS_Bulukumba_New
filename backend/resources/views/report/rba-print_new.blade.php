<!--
 * @Author: Agung Martono
 * @Date: 2021-02-13 20:11:19
 * @LastEditTime: 2021-02-28 11:48:20
 * @FilePath: \backend\resources\views\report\rba-print.blade.html
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon" />
    <title>Rencana Bisnis dan Anggaran</title>
    <meta name="author" content="agungmartonosyn.github.com">

    <!-- Web Fonts ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet ======================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-rba4.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all-rba4.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet-rba4.css') }}" />
</head>
{{-- <style>
table#mapTable tr td{
  padding: .15rem;
}
</style>  --}}
<body onLoad="window.print()">
    <!-- Container -->
    <div class="container-fluid invoice-container">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="6" style="text-align: center">RS TRANSMEDIC <br>
                        RENCANA BISNIS ANGGARAN <br>
                        Tahun Anggaran 2021
                    </th>
                </tr>
                <tr>
                    <td colspan="6">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4"> <strong>Bagian</strong></div>
                                <div class="col-sm-4"> <strong>: RS TRANSMEDIC</strong></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4"> <strong>Program</strong></div>
                                <div class="col-sm-2"> <strong>: 1.02.01.1</strong></div>
                                <div class="col-sm-6">
                                    <font>PENUNJANG URUSAN PEMERINTAH DAERAH PROVINSI</font>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4"> <strong>Kegiatan</strong></div>
                                <div class="col-sm-2"> <strong>: 1.02.01.1.10</strong></div>
                                <div class="col-sm-6">
                                    <font>PROGRAM PENUNJANG URUSAN PEMERINTAH DAERAH PROVINSI</font>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4"> <strong>Sub Kegiatan</strong></div>
                                <div class="col-sm-2"> <strong>: 1.02.01.1.10.01</strong></div>
                                <div class="col-sm-6">
                                    <font>Pelayanan dan Penunjang Pelayanan BLUD</font>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th style="text-align: center">Jenis Indikator</th>
                    <th style="text-align: center">Tolak Ukur Kinerja</th>
                    <th style="text-align: center;">Target Kinerja</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="col-sm-12">
                            <div class="row">
                                <div><strong>Masukan</strong></div>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <div class="row">
                                <div><strong>Keluaran</strong></div>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <div class="row">
                                <div><strong>Hasil</strong></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-12">
                            <div style="margin-left: -15px;">Dana/Anggaran</div>
                            <div style="margin-left: -15px;">Terselenggaranaya Belanja Modal BLUD RS TRANSMEDIC</div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div>Terselenggaranaya Belanja Modal BLUD RS TRANSMEDIC dengan baik</div>
                                <div>Terselenggaranaya Barang dan jasa BLUD RS TRANSMEDIC</div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div>Persentase sarana prasarana perkantoran yang mendukung kelancaran tugas dan fungsi
                                    administrasi</div>
                                <div>Perangkat daerah</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-12">
                            <div style="margin-left: -15px;">Rp.65.000.000.000,-</div>
                            <div style="margin-left: -15px;">1 Kegiatan</div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div>1 Kegiatan</div>
                                <div>1 Kegiatan</div>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <div class="row">
                                <div>75%</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered" id="mapTable">
            <thead>
                <tr>
                    <th rowspan="2">Kode Rekening</th>
                    <th rowspan="2">Uraian</th>
                    <th colspan="4" class="text-center">Waktu</th>

                <tr>
                    <th>Volume</th>
                    <th>Satuan</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6 = (3x5)</td>
                </tr>
                @foreach ($results['data'] as $key => $result)
                <tr>
                    <td class="font-weight-bold">{{ $result->kode }}</td>
                    @if ($result->turunan <= 6)
                        <td class="font-weight-bold">{{ $result->mataanggaran }}</td>
                    @else
                        <td>{{ $result->mataanggaran }}</td>
                    @endif
                    <td class="text-center">{{ $result->volume }}</td>
                    <td class="text-center font-weight-bold">{{ $result->satuanstandar }}</td>
                    @if ($result->hargasatuan == 0)
                        <td class="text-right">{{ $result->hargasatuan }}</td>
                    @else
                        <td class="text-right">{{ number_format($result->hargasatuan ,0,",",".") }}</td>
                    @endif
                    <td class="text-right font-weight-bold">{{ number_format($result->jumlah ,0,",",".") }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="8" class="text-right">
                        <font>Jumlah</font>
                    </th>
                    <th colspan="1" class="text-right">
                        <font>65.000.000.000,00</font>
                    </th>
                </tr>
                <tr>
                    <th colspan="9" class="text-right">Bandung, {{ $results['datenow'] }}</th>
                </tr>
                <tr>
                    <th colspan="3" class="text-center">
                        <font>Pejabat Teknis Bidang Umum dan Keuangan</font>
                        <br>
                        <font>UPT. RS TRANSMEDIC</font>
                        <br>
                        <br>
                        <br>
                        <br>
                        <font><u>{{ $results['pejabatkeuangan']->namalengkap }}</u></font>
                        <br>
                        <font style="margin-top: 20px">NIP: {{ $results['pejabatkeuangan']->nip_pns }}</font>
                    </th>
                    <th colspan="3" class="text-center">
                        <font>Pejabat Teknis Bidang Pelayanan</font>
                        <br>
                        <font>UPT. RS TRANSMEDIC</font>
                        <br>
                        <br>
                        <br>
                        <br>
                        <font><u>{{ $results['pejabatpelayanan']->namalengkap }}</u></font>
                        <br>
                        <font>NIP: {{ $results['pejabatpelayanan']->nip_pns }}</font>
                    </th>
                    <th colspan="3" class="text-center">
                        <font>Pejabat Teknis Bidang Penunjang</font>
                        <br>
                        <font>UPT. RS TRANSMEDIC</font>
                        <br>
                        <br>
                        <br>
                        <br>
                        <font><u>{{ $results['pejabatpenunjang']->namalengkap }}</u></font>
                        <br>
                        <font>NIP: {{ $results['pejabatpenunjang']->nip_pns }}</font>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" class="text-center"></th>
                    <th colspan="3" class="text-center">
                        <font>Pemimping BLUD</font>
                        <br>
                        <font>UPT. RS TRANSMEDIC</font>
                        <br>
                        <br>
                        <br>
                        <br>
                        <font><u>{{ $results['pimpinanblud']->namalengkap }}</u></font>
                        <br>
                        <font>NIP: {{ $results['pimpinanblud']->nip_pns }}</font>
                    </th>
                    <th colspan="3" class="text-center"></th>
                </tr>
            </thead>
        </table>
        {{-- <footer class="text-center">
            <hr>
            <p><strong>Kce .</strong><br>
                4th Floor, Plot No.22, Above Public Park, 145 Murphy Canyon Rd,<br>
                Suite 2028. </p>
            <hr>
            <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical
                signature.</p>
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                    class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> <a
                    href="" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i>
                    Download</a> </div>
        </footer> --}}
    </div>
</body>

</html>