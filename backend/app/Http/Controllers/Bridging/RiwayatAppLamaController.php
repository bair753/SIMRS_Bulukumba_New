<?php
/**
 * Created by ea.
 * User: ea@epic
 * Date: 18/10/2022
 * Time: 09.44
 */

namespace App\Http\Controllers\Bridging;

use App\Http\Controllers\ApiController;
use App\Master\DiagnosaKeperawatan;
use App\Master\KelompokTransaksi;
use App\Transaksi\InformasiTanggungan;
use App\Transaksi\PasienDaftar;
use App\Transaksi\AntrianPasienDiperiksa;
use App\Transaksi\KelengkapanDokumen;
use App\Transaksi\PelayananPasien;
use App\Transaksi\HasilGrouping;
use App\Transaksi\PemakaianAsuransi;
use App\Transaksi\StrukPelayanan;
use App\Transaksi\StrukPelayananPenjamin;
use DB;
use Illuminate\Http\Request;
use App\Traits\Valet;
use phpDocumentor\Reflection\Types\Null_;
use Webpatser\Uuid\Uuid;


class RiwayatAppLamaController   extends ApiController {
    use Valet;

    public function __construct() {
        parent::__construct($skip_authentication=false);
    }

    public function getDaftarRiwayatRegistrasiLama( Request $request) {

        $paramsNorm = $request['norm'];       
        $data = collect( DB::connection('mysql')
               ->select("
                    SELECT SUBSTRING(pm.no_rkm_medis,1,6) AS nocm,pd.no_rawat AS noregistrasi,pm.nm_pasien AS namapasien,
                           concat(pd.tgl_registrasi,' ',pd.jam_reg) AS tglregistrasi,
                           ru.nm_poli AS namaruangan,pg.nm_dokter AS namadokter,kp.png_jawab AS kelompokpasien,
                           'APP LAMA' AS keterangan
                    FROM reg_periksa AS pd
                    INNER JOIN pasien AS pm ON pm.no_rkm_medis = pd.no_rkm_medis
                    LEFT JOIN poliklinik AS ru ON ru.kd_poli = pd.kd_poli
                    LEFT JOIN dokter AS pg ON pg.kd_dokter = pd.kd_dokter
                    LEFT JOIN penjab AS kp ON kp.kd_pj = pd.kd_pj
                    WHERE SUBSTRING(pm.no_rkm_medis,1,6) = '$paramsNorm'                   
                "));

        return $this->respond($data);
    }


    public function getDaftarRiwayatPemeriksaan( Request $request) {

        $paramsNorm = "";
        if(isset($request['norm']) && $request['norm']!="" && $request['norm']!="undefined") {
            $paramsNorm = " AND rm.nomor_rm LIKE '%". $request['norm'] ."%'";            
        };

        $paramsNamapasien = "";
        if(isset($request['namaPasien']) && $request['namaPasien']!="" && $request['namaPasien']!="undefined") {
            $paramsNamapasien = " AND pm.nama LIKE '%". $request['namaPasien'] ."%'";
        };

        $paramNoreg = "";
        if(isset($request['noReg']) && $request['noReg']!="" && $request['noReg']!="undefined"){
            $paramNoreg = " AND pd.no_pendaftaran LIKE '%". $request['noReg'] ."%'";
        };

        $paramNamaRuangan = "";
        if(isset($request['namaRuangan']) && $request['namaRuangan']!="" && $request['namaRuangan']!="undefined"){
            $paramNamaRuangan = " AND ru.nama_unit_kerja LIKE '%". $request['namaRuangan'] ."%'";
        };

        $noregis = $request['noReg'];
        $pendaftaran = collect(DB::connection('mysql')
                        ->select("SELECT * FROM pendaftaran WHERE no_pendaftaran = '$noregis' "))->first();

        $data = collect( DB::connection('mysql')
                ->select("
                    SELECT  rm.nomor_rm AS nocm,pm.nama AS namapasien,pd.tgl_pendaftaran AS tglregistrasi,
                            pd.no_pendaftaran AS noregistrasi,ru.nama_unit_kerja AS namaruangan,
                            pg.nama AS namadokter,pd.tgl_keluar AS tglpulang,cb.cara_bayar AS kelompokpasien,'APP LAMA' AS keterangan,
                            pp.date_insert AS tglpelayanan,pp.nama_tagihan AS pemeriksaan,pp.satuan,pp.qty AS jumlah,pp.jml_tagihan AS hargasatuan,pp.qty * pp.jml_tagihan AS total
                    FROM pendaftaran AS pd
                    LEFT JOIN bill_tagihan AS pp ON pp.pendaftaran_id = pd.pendaftaran_id
                    INNER JOIN pasien AS pm ON pm.pasien_id = pd.pasien_id
                    INNER JOIN rekam_medik AS rm ON rm.pasien_id = pd.pasien_id
                    LEFT JOIN unit_kerja AS ru ON ru.unit_kerja_id = pd.unit_kerja_id
                    LEFT JOIN pegawai AS pg ON pg.pegawai_id = pd.pegawai_id
                    LEFT JOIN cara_bayar AS cb ON cb.cara_bayar_id = pd.cara_bayar_id
                    WHERE pp.pendaftaran_id = $pendaftaran->pendaftaran_id
                "));

        return $this->respond($data);
    }

    public function getDaftarRiwayatCatatanMedis( Request $request) {
        $paramNoreg = $request['noregistrasi'];
        
        $data = collect( DB::connection('mysql')->select("
            SELECT concat(pr.tgl_perawatan,' ',pr.jam_rawat) AS tglrawat,pr.*
            FROM pemeriksaan_ralan AS pr
            INNER JOIN reg_periksa AS pd ON pd.no_rawat = pr.no_rawat
            WHERE pr.no_rawat = '$paramNoreg';
            
        "));
        
        return $this->respond($data);
    }

    public function getDaftarRiwayatCPPT( Request $request) {

        $paramsNorm = "";
        if(isset($request['nocm']) && $request['nocm']!="" && $request['nocm']!="undefined") {
            $paramsNorm = " AND pm.FS_MR LIKE '%". $request['nocm'] ."%'";            
        };

        $paramsNamapasien = "";
        if(isset($request['namaPasien']) && $request['namaPasien']!="" && $request['namaPasien']!="undefined") {
            $paramsNamapasien = " AND pm.FS_NM_PASIEN LIKE '%". $request['namaPasien'] ."%'";
        };

        $paramNoreg = "";
        // if(isset($request['noReg']) && $request['noReg']!="" && $request['noReg']!="undefined"){
        //     $paramNoreg = " AND pd.no_pendaftaran LIKE '%". $request['noReg'] ."%'";
        // };

        $paramNamaRuangan = "";
        if(isset($request['namaRuangan']) && $request['namaRuangan']!="" && $request['namaRuangan']!="undefined"){
            $paramNamaRuangan = " AND ru.FS_NM_LAYANAN LIKE '%". $request['namaRuangan'] ."%'";
        };

        $data = collect( DB::connection('sqlsrv')->select("
                    SELECT TOP 10 x.* 
                    FROM(
                            SELECT pd.fd_tgl_jam_masuk AS tglregistrasi,pd.FS_KD_REG AS noregistrasi,
                                   ru.FS_NM_LAYANAN AS namaruangan,emr.FD_TGL_TRS AS tglemr,
                                   pd.FS_KD_REG AS noemr,'SOAP APP LAMA' AS caption,
                                   pd.FS_KD_REG AS noregistrasifk
                            FROM TA_REGISTRASI AS pd
                            LEFT JOIN TC_MR AS pm ON pm.FS_MR = pd.FS_MR
                            LEFT JOIN TA_LAYANAN AS ru ON ru.FS_KD_LAYANAN = pd.FS_KD_LAYANAN
                            LEFT JOIN TA_KELAS AS kls ON kls.FS_KD_KELAS = pd.FS_KD_KELAS
                            LEFT JOIN TA_TIPE_JAMINAN AS rkn ON rkn.FS_KD_TIPE_JAMINAN = pd.FS_KD_TIPE_JAMINAN
                            INNER JOIN Tc_emr_medis_catatan AS emr ON emr.FS_KD_REG = pd.FS_KD_REG
                            WHERE pd.FS_KD_REG IS NOT NULL
                            $paramsNorm
                            $paramsNamapasien
                            $paramNoreg
                            $paramNamaRuangan
                    ) AS x
                    ORDER BY x.tglregistrasi DESC                    
                "));

        return $this->respond($data);
    }
}