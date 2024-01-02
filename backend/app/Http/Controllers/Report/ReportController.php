<?php


namespace App\Http\Controllers\Report;

use App\Datatrans\PasienDaftar;
use App\Http\Controllers\ApiController;
use App\Master\KelompokTransaksi;
use App\Master\Ruangan;
use App\Traits\Valet;
use App\Transaksi\HasilLaboratorium;
use App\Web\Profile;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

use Barryvdh\DomPDF\Facade as PDF;
use JasperPHP\JasperPHP;
use PHPJasper\PHPJasper;
use Webpatser\Uuid\Uuid;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class ReportController extends ApiController{

    use Valet;

    public function __construct(){
        parent::__construct($skip_authentication = true);
    }

    public function getDataHasilLabCetak(Request $request){
//        $kdProfile = (int) $this->getDataKdProfile($request);
        $umur = $request['umur'];
        $Tgl = self::getDateIndo( date('Y-m-d H:i:s'));
        $idKelapaLab = (int) $this->settingDataFixed('PenanggungJawabLabRSKI', 17);
//         $data =  DB::table('pelayananpasien_t as pp')
//                 ->join('produk_m as prd','prd.id','=','pp.produkfk')
//                 ->join('detailjenisproduk_m as djp','djp.id','=','prd.objectdetailjenisprodukfk')
//                 ->leftJOIN('produkdetaillaboratorium_m as pdl','pdl.produkfk','=','prd.id')
//                 ->leftjoin('produkdetaillaboratoriumnilainormal_m as pdlm', function ($join)use ($request)  {
//                      $join->on('pdlm.objectprodukdetaillabfk','=','pdl.id')
//                         ->where('pdlm.objectjeniskelaminfk','=',$request['objectjeniskelaminfk'] );
//                 })
//                 ->leftJoin('hasillaboratorium_t as hh', function ($join) {
//                     $join->on('pp.noregistrasifk', '=', 'hh.noregistrasifk')
//                         ->on('pp.norec','=','hh.pelayananpasienfk')
//                         ->on('hh.produkdetaillabfk','=','pdl.id');
//                 })
//                 ->leftJOIN('satuanstandar_m as ss','ss.id','=','pdl.objectsatuanstandarfk')
//                 ->select(DB::raw("pp.noregistrasifk as norec_apd,djp.detailjenisproduk,pp.produkfk,prd.namaproduk ,
//                     pdl.detailpemeriksaan,
//                     hh.hasil,pdlm.rangemin as nilaimin,pdlm.rangemax as nilaimax,pdlm.refrange as nilaitext,
//                     ss.satuanstandar as satuan,pdl.id as iddetailproduk,
//                     hh.metode,pp.norec as norec_pp,
//                     hh.norec as norec_hasil"))
// //                ->where('pp.kdprofile', $kdProfile)
//                 ->where('pp.noregistrasifk', $request['norec_apd'])
//                 ->orderBy('prd.namaproduk', 'asc')
//                 ->get();

//                  $data = $data->groupBy('detailjenisproduk');
        $data =collect(DB::select("SELECT pp.noregistrasifk as norec_apd,djp.detailjenisproduk,pp.produkfk,prd.namaproduk ,
                    pdl.detailpemeriksaan,
                    hh.hasil,pdlm.rangemin as nilaimin,pdlm.rangemax as nilaimax,pdlm.refrange as nilaitext,
                    ss.satuanstandar as satuan,pdl.id as iddetailproduk,
                    hh.metode,pp.norec as norec_pp,
                    hh.norec as norec_hasil
                    FROM pelayananpasien_t as pp
                    inner join produk_m as prd on prd.id = pp.produkfk
                    inner join detailjenisproduk_m as djp on djp.id = prd.objectdetailjenisprodukfk
                    left JOIN produkdetaillaboratorium_m pdl on pdl.produkfk = prd.id 
                    left join produkdetaillaboratoriumnilainormal_m as pdlm on pdlm.objectprodukdetaillabfk = pdl.id
                    and pdlm.objectjeniskelaminfk=$request[objectjeniskelaminfk] 
                    left join hasillaboratorium_t as hh on hh.produkfk = prd.id
                    and pp.noregistrasifk=hh.noregistrasifk
                    and pp.norec=hh.pelayananpasienfk
                    and hh.produkdetaillabfk =pdl.id

                    left join satuanstandar_m as ss on ss.id = pdl.objectsatuanstandarfk
                    where pp.noregistrasifk='$request[norec_apd]'
                    and pp.kdprofile=17 
                    order by prd.namaproduk asc"));
        // $data =$data->groupBy('namaproduk');
        // dd($data);
        $diagnosa = \DB::table('pasiendaftar_t AS pd')
            ->join('antrianpasiendiperiksa_t AS apd','apd.noregistrasifk','=','pd.norec')
            ->join('detaildiagnosapasien_t as ddg','ddg.noregistrasifk','=','apd.norec')
            ->join('diagnosa_m AS dm','dm.id','=','ddg.objectdiagnosafk')
            ->select(DB::raw("CASE WHEN apd.norec IS NULL THEN ' , ' ELSE dm.kddiagnosa || ', ' || dm.namadiagnosa END AS diagnosa"))
//            ->where('pd.kdprofile', $kdProfile)
            ->where('ddg.objectjenisdiagnosafk', 1)
            ->where('apd.norec',  $request['norec_apd'])
            ->first();
        $namaDiagnosa='';
        if ($diagnosa != null){
            $namaDiagnosa = $diagnosa->diagnosa;
        }
        $getNorePd = \DB::table('pasiendaftar_t AS pd')
            ->join('antrianpasiendiperiksa_t AS apd','apd.noregistrasifk','=','pd.norec')
            ->leftJoin('strukorder_t AS so','so.noregistrasifk','=','pd.norec')
            ->join('pasien_m AS pm','pm.id','=','pd.nocmfk')
            ->join('jeniskelamin_m AS jk','jk.id','=','pm.objectjeniskelaminfk')
            ->join('ruangan_m AS ru','ru.id','=','pd.objectruanganlastfk')
            ->join('departemen_m AS dept','dept.id','=','ru.objectdepartemenfk')
            ->leftJoin('pegawai_m AS pg','pg.id','=','so.objectpegawaiorderfk')
            ->join('kelas_m AS kls','kls.id','=','pd.objectkelasfk')
            ->select(DB::raw(  "'B/287/VIII/' || to_char(now(),'YYYY') AS nomor,pm.nocm,pm.namapasien,pm.tempatlahir,
                                                to_char(pm.tgllahir,'DD-MM-YYYY') AS tgllahir,jk.jeniskelamin,kls.namakelas,
			                                    dept.namadepartemen,ru.namaruangan,so.tglorder,pg.namalengkap,apd.tglmasuk,
			                                    CASE WHEN pm.notelepon IS NULL THEN '' ELSE pm.notelepon END AS notelepon"))
            ->where('apd.norec', $request['norec_apd'])
//                    ->where('apd.kdprofile', $kdProfile)
            ->first();
        $KepalaLab = \DB::table('pegawai_m AS pg')
            ->leftJoin('pangkat_m AS pt','pt.id','=','pg.objectpangkatfk')
            ->leftJoin('jabatan_m AS jb','jb.id','=','pg.objectjabataninternalfk')
            ->select(DB::raw("pg.namalengkap,pg.nippns,CASE WHEN pg.objectpangkatfk IS NULL THEN '' ELSE pt.namapangkat END AS pangkat,
			                                 CASE WHEN pg.nippns IS NULL THEN '' ELSE pg.nippns END AS nippns,CASE WHEN pg.objectjabataninternalfk IS NULL THEN '' ELSE jb.namajabatan END AS jabatan"))
//                     ->where('pg.kdprofile', $kdProfile)
            ->where('pg.id',$idKelapaLab)
            ->first();
        if(count($data) == 0){
            return 'Data tidak ada';
            die;
        }
        $head = array(
            "nomor" => $getNorePd->nomor,
            "nocm" => $getNorePd->nocm,
            "namapasien" => $getNorePd->namapasien,
            "tgllahir" => $getNorePd->tgllahir,
            "jeniskelamin" => $getNorePd->jeniskelamin,
            "namakelas" => $getNorePd->namakelas,
            "namadepartemen" => $getNorePd->namadepartemen,
            "namaruangan" => $getNorePd->namaruangan,
            "tglorder" => $getNorePd->tglorder,
            "namalengkap" => $getNorePd->namalengkap,
            "tglmasuk" => $getNorePd->tglmasuk,
            "notelepon" => $getNorePd->notelepon,
            "diagnosa" => $namaDiagnosa,
            "tgl" => $Tgl,
            "namakepala" => $KepalaLab->namalengkap,
            "pangkat" => $KepalaLab->pangkat . " NRP " . $KepalaLab->nippns
        );
        if(count($data) == 0){
            return 'Data tidak ada';
            die;
        }
        $dataReport = array(
            'head' => $head,
            'data' => $data,
        );
//        return $this->respond($dataReport);
        return view('design.cetak-hasil-laboratorium',compact('dataReport'));
    }

    public function getDataSuratKeteranganPulangCetak(Request $request){
        $user = $request['strIdPegawai'];
        $kdProfile = (int) $request['kdProfile'];
        $Tgl = self::getDateIndo( date('Y-m-d H:i:s'));
        $idKepalaRs = (int) $this->settingDataFixed('KdKepalaRumahSakit', $kdProfile);
        $bulanromawi =  $this->KonDecRomawi($this->getDateTime()->format('m'));
        $DataProfile = DB::table('profile_m')
            ->where('id', $kdProfile)
            ->first();
        $dataSurat = [];
        if ($DataProfile->id == 17){
            $dataSurat = DB::table('suratketerangan_t as sk')
                ->join('pasiendaftar_t as pd','pd.norec','=', 'sk.pasiendaftarfk')
                ->join('pasien_m as pm','pm.id','=','pd.nocmfk')
                ->leftJoin('alamat_m as alm','alm.nocmfk','=','pm.id')
                ->join('pegawai_m as pg','pg.id','=','sk.dokterfk')
                ->join('jeniskelamin_m as jk','jk.id','=','pm.objectjeniskelaminfk')
                ->leftJoin('pekerjaan_m as pk','pk.id','=','pm.objectpekerjaanfk')
                ->leftJoin('pangkat_m AS pt','pt.id','=','pg.objectpangkatfk')
                ->leftJoin('jabatan_m AS jb','jb.id','=','pg.objectjabataninternalfk')
                ->select(DB::raw("'/VIII/' || to_char(now(),'YYYY') AS nomor,sk.nosurat,sk.norec,pm.nocm,pd.noregistrasi,pm.namapasien,pm.tempatlahir,  
                                            to_char(pm.tgllahir, 'DD-MM-YYYY') AS tgllahir,jk.jeniskelamin,alm.alamatlengkap,  
                                            sk.keterangan,pg.namalengkap,'NIP. ' || CASE WHEN pg.nippns IS NULL THEN '' ELSE pg.nippns END AS nip,  
                                            CASE WHEN pk.pekerjaan IS NULL THEN '' ELSE pk.pekerjaan END AS pekerjaan,  
                                            pd.tglregistrasi,CASE WHEN pg.objectpangkatfk IS NULL THEN '' ELSE pt.namapangkat END AS pangkat,  
                                            CASE WHEN pg.nippns IS NULL THEN '' ELSE pg.nippns END AS nippns,  
                                            CASE WHEN pg.objectjabataninternalfk IS NULL THEN '' ELSE jb.namajabatan END AS jabatan,  
                                            CASE WHEN pd.tglpulang IS NOT NULL THEN pd.tglpulang ELSE NOW() END AS tglpulang"))
                ->where('sk.kdprofile', $kdProfile)
                ->where('sk.norec', $request['norec'])
//                ->where('sk.statusenabled', true)
                ->get();
        }elseif ($DataProfile->id == 18){
            $dataSurat = DB::table('pasiendaftar_t as pd')
                ->leftJoin('suratketerangan_t as sk',function($join){
                    $join->on('sk.pasiendaftarfk','=', 'pd.norec');
                    $join->where('sk.statusenabled','=',true);
                    $join->where('sk.jenissuratfk','=',12);

                })
                ->leftJoin('pasien_m as pm','pm.id','=','pd.nocmfk')
                ->leftJoin('alamat_m as alm','alm.nocmfk','=','pm.id')
                ->leftJoin('pegawai_m as pg','pg.id','=','sk.dokterfk')
                ->leftJoin('jeniskelamin_m as jk','jk.id','=','pm.objectjeniskelaminfk')
                ->leftJoin('pekerjaan_m as pk','pk.id','=','pm.objectpekerjaanfk')
                ->leftJoin('pangkat_m AS pt','pt.id','=','pg.objectpangkatfk')
                ->leftJoin('jabatan_m AS jb','jb.id','=','pg.objectjabataninternalfk')
                ->leftJoin('desakelurahan_m as dk','dk.id','=','alm.objectdesakelurahanfk')
                ->leftJoin('kecamatan_m AS kc','kc.id', '=','alm.objectkecamatanfk')
                ->leftJoin('kotakabupaten_m AS kb','kb.id','=', 'alm.objectkotakabupatenfk')
                ->leftJoin('propinsi_m as prop','prop.id','=','alm.objectpropinsifk')
                ->leftjoin('ruangan_m AS ru','ru.id','=','pd.objectruanganlastfk')
                ->leftjoin('departemen_m AS dep','dep.id','=','ru.objectdepartemenfk')
                ->LEFTjoin('strukorder_t as so',function($joins){
                    $joins->on('so.noregistrasifk','=','pd.norec');
                    $joins->where('so.statusenabled','=',true);
                    $joins->where('so.objectkelompoktransaksifk','=',153);
                })
                ->select(DB::raw("'SKSI/'||case when sk.nosurat is null then '' else SUBSTRING(sk.nosurat,5,10) end || '/$bulanromawi/' || to_char(now(),'YYYY') || '/RSDCWA' AS nomor,sk.nosurat,sk.norec,pm.nocm,pd.noregistrasi,pm.namapasien,pm.tempatlahir,  
                                            to_char(pm.tgllahir, 'DD-MM-YYYY') AS tgllahir,jk.jeniskelamin,alm.alamatlengkap,  
                                            sk.keterangan,pg.namalengkap,'NIP. ' || CASE WHEN pg.nippns IS NULL THEN '' ELSE pg.nippns END AS nip,  
                                            CASE WHEN pk.pekerjaan IS NULL THEN '' ELSE pk.pekerjaan END AS pekerjaan,  
                                            pd.tglregistrasi,CASE WHEN pg.objectpangkatfk IS NULL THEN '' ELSE pt.namapangkat END AS pangkat,  
                                            CASE WHEN pg.nippns IS NULL THEN '' ELSE pg.nippns END AS nippns,  
                                            CASE WHEN pg.objectjabataninternalfk IS NULL THEN '' ELSE jb.namajabatan END AS jabatan,  
                                            CASE WHEN pd.tglpulang IS NOT NULL THEN pd.tglpulang 
                                            WHEN so.tglrencana IS NOT NULL THEN so.tglrencana ELSE NOW() END AS tglpulang,
                                            dk.namadesakelurahan,kc.namakecamatan,kb.namakotakabupaten,prop.namapropinsi,alm.kodepos,
                                            CASE WHEN pd.tglpulang IS NOT NULL THEN EXTRACT(day from age(to_date(to_char(pd.tglpulang,'YYYY-MM-DD'),'YYYY-MM-DD'), to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Hari'
                                            WHEN so.tglrencana IS NOT NULL THEN EXTRACT(day from age(to_date(to_char(so.tglrencana,'YYYY-MM-DD'),'YYYY-MM-DD'), to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Hari'
                                            ELSE EXTRACT(day from age(current_date, to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Hari' END AS lamarawat,dep.namadepartemen || ', '|| ru.namaruangan as rawat

                "))
                ->where('pd.kdprofile', $kdProfile)
                ->where('pd.norec', $request['norec'])
                ->get();
        }

        if(count($dataSurat) == 0){
            return 'Data tidak ada';
            die;
        }
        $KepalaRs = \DB::table('pegawai_m AS pg')
            ->leftJoin('pangkat_m AS pt','pt.id','=','pg.objectpangkatfk')
            ->leftJoin('jabatan_m AS jb','jb.id','=','pg.objectjabataninternalfk')
            ->select(DB::raw("pg.namalengkap,pg.nippns,CASE WHEN pg.objectpangkatfk IS NULL THEN '' ELSE pt.namapangkat END AS pangkat,
			                         CASE WHEN pg.nippns IS NULL THEN '' ELSE pg.nippns END AS nippns,CASE WHEN pg.objectjabataninternalfk IS NULL THEN '' ELSE jb.namajabatan END AS jabatan"))
            ->where('pg.kdprofile', $kdProfile)
            ->where('pg.id',$idKepalaRs)
            ->first();



        $tglRegis= '';//self::getDateIndo($dataSurat['tglregistrasi']);
        $tglPulang='';
        $nrp ='';
        foreach ($dataSurat as $item){
            $tglRegis = self::getDateIndo($item->tglregistrasi) ;
            $tglPulang = self::getDateIndo($item->tglpulang);
            $nrp = $item->pangkat . ' NRP ' . $item->nippns;
        }

        $dataReport = array(
            'data' => $dataSurat,
            'kepalaRs' => $KepalaRs,
            'tanggal' => $Tgl,
            'tanggalrawat' => $tglRegis . ' s.d ' . $tglPulang,
            'nrp'=> $nrp,
            'namaprofile' => $DataProfile->namalengkap,
            'namaexternal' => $DataProfile->namaexternal,
            'namakota' => $DataProfile->namakota,
            'profileId' => $DataProfile->id,
        );

        if ($DataProfile->id == 17){
            //   return $this->respond($dataReport->namalengkap);
            return view('design.cetak-surat-keterangan-pulang',compact('dataReport'));
        }elseif ($DataProfile->id == 18){
//               return $this->respond($dataReport);
            return view('design.cetak-surat-keterangan-pulang-wsa',compact('dataReport'));
        }
    }

    public function getDataRekapLabel(Request $request){
        $user = $request['strIdPegawai'];
        $kdProfile = (int) $request['kdProfile'];
        $Tgl = self::getDateIndo( date('Y-m-d H:i:s'));
        $noreSR = $request['norec'];
        $DataProfile = DB::table('profile_m')
            ->where('id', $kdProfile)
            ->first();//DB::select(DB::raw("select * from profile_m where id = '$kdProfile' limit 1"));
        $data = DB::select(DB::raw("
            						SELECT distinct ps.nocm, ps.namapasien,to_char(ps.tgllahir, 'DD/MM/YYYY') as tgllahir,CASE WHEN aa.noantri IS NULL THEN sr.noresep ELSE aa.jenis || '-' || aa.noantri END AS noresep,to_char(sr.tglresep, 'DD-MM-YYYY') as tglresep,pr.namaproduk || ' (' || CAST(pp.jumlah AS VARCHAR) || ')' AS namaproduk,pp.aturanpakai,pp.rke,  
                                    CASE WHEN alm.alamatlengkap is null then '-' else alm.alamatlengkap end as alamat,ps.notelepon,ss.satuanstandar,pp.jumlah,  
                                    CASE WHEN pp.issiang = 't' THEN 'Siang' ELSE '-' END AS siang, CASE WHEN pp.ispagi = 't' THEN 'Pagi' ELSE '-' END AS pagi,  
                                    CASE WHEN pp.ismalam = 't' THEN 'Malam' ELSE '-' END as malam, CASE WHEN pp.issore = 't' THEN 'Sore' ELSE '-' END as sore,  
                                    CASE WHEN pp.keteranganpakai  = '' OR pp.keteranganpakai IS NULL THEN '-' else pp.keteranganpakai END AS keteranganpakai,
                                    ru.namaruangan,dep.namadepartemen 
                                    from pelayananpasien_t as pp inner join strukresep_t as sr on sr.norec= pp.strukresepfk  
                                    LEFT join produk_m as pr on pr.id = pp.produkfk  
                                    LEFT join antrianpasiendiperiksa_t as apd on apd.norec = pp.noregistrasifk  
                                    LEFT join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk  
                                    LEFT join pasien_m as ps on ps.id = pd.nocmfk  
                                    left join alamat_m as alm on alm.nocmfk = ps.id  
                                    LEFT JOIN satuanstandar_m as ss on ss.id = pp.satuanviewfk  
                                    LEFT JOIN antrianapotik_t as aa on aa.noresep = sr.noresep  
                                    LEFT JOIN ruangan_m as ru on ru.id = apd.objectruanganfk 
                                    LEFT JOIN departemen_m as dep on dep.id = ru.objectdepartemenfk 
                                    where pp.kdprofile = $kdProfile and pp.jeniskemasanfk = 2 and sr.norec ='$noreSR'        
            
                                    union all 
        
                                    select distinct ps.nocm,ps.namapasien,to_char(ps.tgllahir, 'DD/MM/YYYY') as tgllahir,CASE WHEN aa.noantri IS NULL THEN sr.noresep ELSE aa.jenis || '-' || aa.noantri END AS noresep,to_char(sr.tglresep, 'DD-MM-YYYY') as tglresep,  
                                    ' Racikan' || ' (' || CAST(((CAST(pp.qtydetailresep as INTEGER)/CAST(pp.dosis as INTEGER))*CAST(pro.kekuatan as INTEGER)) AS VARCHAR) || ')' AS namaproduk,pp.aturanpakai,pp.rke,  
                                    case when alm.alamatlengkap is null then '-' else alm.alamatlengkap end as alamat,ps.notelepon,CASE when jr.jenisracikan IS NULL THEN '' ELSE jr.jenisracikan END AS satuanstandar,  
                                    ((CAST(pp.qtydetailresep as INTEGER)/CAST(pp.dosis as INTEGER))*CAST(pro.kekuatan as INTEGER)) as jumlah,  
                                    CASE WHEN pp.issiang = 't' THEN 'Siang' ELSE '-' END AS siang, CASE WHEN pp.ispagi = 't' THEN 'Pagi' ELSE '-' END AS pagi,  
                                    CASE WHEN pp.ismalam = 't' THEN 'Malam' ELSE '-' END as malam, CASE WHEN pp.issore = 't' THEN 'Sore' ELSE '-' END as sore,  
                                    CASE WHEN pp.keteranganpakai  = '' OR pp.keteranganpakai IS NULL THEN '-' else pp.keteranganpakai END AS keteranganpakai,
                                    ru.namaruangan,dep.namadepartemen 
                                    from strukresep_t as sr   
                                    LEFT join pelayananpasien_t as pp on sr.norec= pp.strukresepfk  
                                    LEFT join antrianpasiendiperiksa_t as apd on apd.norec = sr.pasienfk  
                                    LEFT join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk  
                                    LEFT join pasien_m as ps on ps.id = pd.nocmfk  
                                    left join alamat_m as alm on alm.nocmfk = ps.id  
                                    LEFT JOIN produk_m as pro on pro.id = pp.produkfk  
                                    LEFT JOIN satuanstandar_m as ss on ss.id = pp.satuanviewfk  
                                    LEFT JOIN jenisracikan_m as jr on jr.id = pp.jenisobatfk  
                                    LEFT JOIN antrianapotik_t as aa on aa.noresep = sr.noresep
                                    LEFT JOIN ruangan_m as ru on ru.id = apd.objectruanganfk
                                    LEFT JOIN departemen_m as dep on dep.id = ru.objectdepartemenfk 
                                    where pp.kdprofile = $kdProfile and pp.jeniskemasanfk = 1 and sr.norec ='$noreSR' "));
        if(count($data) == 0){
            return 'Data tidak ada';
            die;
        }
        $tglRegis= '';
        $tglPulang='';
        $nrp ='';

//        $tglRegis = '';
//        foreach ($data as $item){
//            $tglRegis = self::getDateIndo($item->tglregistrasi);
//        }

        $dataReport = array(
            'data' => $data,
            'namaprofile' => $DataProfile->namalengkap,
            'namaexternal' => $DataProfile->namaexternal,
            'namakota' => $DataProfile->namakota,
            'alamatlengkap' => $DataProfile->alamatlengkap,
            'profileId' => $DataProfile->id,
        );

//          return $this->respond($dataReport);
        return view('design.cetak-label-rekap',compact('dataReport'));
    }

    public function getDataBuktiPendaftaraan(Request $request){
        $user = $request['strIdPegawai'];
        $kdProfile = (int) $request['kdProfile'];
        $Tgl = self::getDateIndo( date('Y-m-d H:i:s'));
        $noregistrasi = $request['noRegistrasi'];
        $DataProfile = DB::table('profile_m')
            ->where('id', $kdProfile)
            ->first();
        $data = DB::select(DB::raw("SELECT pd.noregistrasi,ps.nocm,ps.tgllahir,ps.namapasien,pd.tglregistrasi,jk.reportdisplay AS jk,
                                                 ap.alamatlengkap,ap.mobilephone2,ru.namaruangan AS ruanganPeriksa,pp.namalengkap AS namadokter,
                                                 kp.kelompokpasien,apdp.noantrian,pd.statuspasien,apr.noreservasi,apr.tanggalreservasi,
                                                 kmr.namakamar,tt.nomorbed,ru.namaruangan || ' No Kamar : ' || kmr.namakamar || ' No Bed : ' || tt.nomorbed AS kamar,
                                                 dept.namadepartemen
                                    FROM pasiendaftar_t pd
                                    INNER JOIN registrasipelayananpasien_t AS rpp ON rpp.noregistrasifk = pd.norec
                                    INNER JOIN pasien_m ps ON pd.nocmfk = ps.id
                                    LEFT JOIN alamat_m ap ON ap.nocmfk = ps.id
                                    INNER JOIN jeniskelamin_m jk ON ps.objectjeniskelaminfk = jk.id
                                    INNER JOIN ruangan_m ru ON pd.objectruanganlastfk = ru.id
                                    LEFT JOIN departemen_m AS dept ON dept.id = ru.objectdepartemenfk
                                    LEFT JOIN pegawai_m pp ON pd.objectpegawaifk = pp.id
                                    INNER JOIN kelompokpasien_m kp ON pd.objectkelompokpasienlastfk = kp.id
                                    INNER JOIN antrianpasiendiperiksa_t apdp ON apdp.noregistrasifk = pd.norec
                                    LEFT JOIN antrianpasienregistrasi_t as apr on apr.noreservasi=pd.statusschedule
                                    LEFT JOIN kamar_m AS kmr ON kmr.id = apdp.objectkamarfk
                                    LEFT JOIN tempattidur_m AS tt ON tt.id = apdp.nobed
                                    WHERE pd.kdprofile = $kdProfile and pd.noregistrasi = '$noregistrasi'"));

        if(count($data) == 0){
            return 'Data tidak ada';
            die;
        }

        $tglRegis = '';
        foreach ($data as $item){
            $tglRegis = self::getDateIndo($item->tglregistrasi);
        }

        $dataReport = array(
            'data' => $data,
            'namaprofile' => $DataProfile->namalengkap,
            'namaexternal' => $DataProfile->namaexternal,
            'namakota' => $DataProfile->namakota,
            'alamatlengkap' => $DataProfile->alamatlengkap,
            'profileId' => $DataProfile->id,
            'tglregis' => $tglRegis,
        );
//        return $this->respond($dataReport);
        return view('design.cetak-bukti-pendaftaraan',compact('dataReport'));
    }

    public function getDataSuratPersetujuanUmumCetak(Request $request){
        $user = $request['strIdPegawai'];
        $kdProfile = (int) $request['kdProfile'];
        $Tgl = self::getDateIndo( date('Y-m-d H:i:s'));
        $idKepalaRs = (int) $this->settingDataFixed('KdKepalaRumahSakit', $kdProfile);
        $DataProfile = DB::table('profile_m')
            ->where('id', $kdProfile)
            ->first();
        $dataSurat = DB::table('suratketerangan_t as sk')
            ->join('pasiendaftar_t as pd','pd.norec','=', 'sk.pasiendaftarfk')
            ->join('pasien_m as pm','pm.id','=','pd.nocmfk')
            ->leftJoin('alamat_m as alm','alm.nocmfk','=','pm.id')
            ->join('pegawai_m as pg','pg.id','=','sk.dokterfk')
            ->join('jeniskelamin_m as jk','jk.id','=','pm.objectjeniskelaminfk')
            ->leftJoin('pekerjaan_m as pk','pk.id','=','pm.objectpekerjaanfk')
            ->leftJoin('pangkat_m AS pt','pt.id','=','pg.objectpangkatfk')
            ->leftJoin('jabatan_m AS jb','jb.id','=','pg.objectjabataninternalfk')
            ->join('antrianpasiendiperiksa_t as apd',function($join){
                $join->on('apd.noregistrasifk','=','pd.norec');
                $join->on('apd.objectruanganfk','=','pd.objectruanganlastfk');
            })
            ->join('ruangan_m AS ru','ru.id','=','pd.objectruanganlastfk')
            ->join('departemen_m AS dep','dep.id','=','ru.objectdepartemenfk')
            ->leftJoin('kamar_m AS kmr','kmr.id','=','apd.objectkamarfk')
            ->leftJoin('tempattidur_m AS tt','tt.id','=','apd.nobed')
            ->leftJoin('desakelurahan_m as dk','dk.id','=','alm.objectdesakelurahanfk')
            ->leftJoin('kecamatan_m AS kc','kc.id', '=','alm.objectkecamatanfk')
            ->leftJoin('kotakabupaten_m AS kb','kb.id','=', 'alm.objectkotakabupatenfk')
            ->leftJoin('propinsi_m as prop','prop.id','=','alm.objectpropinsifk')
            ->select(DB::raw("'/VIII/' || to_char(now(),'YYYY') AS nomor,sk.nosurat,sk.norec,pm.nocm,pd.noregistrasi,pm.namapasien,pm.tempatlahir,  
                                    to_char(pm.tgllahir, 'DD-MM-YYYY') AS tgllahir,jk.jeniskelamin,alm.alamatlengkap,  
                                    sk.keterangan,pg.namalengkap,'NIP. ' || CASE WHEN pg.nippns IS NULL THEN '' ELSE pg.nippns END AS nip,  
                                    CASE WHEN pk.pekerjaan IS NULL THEN '' ELSE pk.pekerjaan END AS pekerjaan,  
                                    pd.tglregistrasi,CASE WHEN pg.objectpangkatfk IS NULL THEN '' ELSE pt.namapangkat END AS pangkat,  
                                    CASE WHEN pg.nippns IS NULL THEN '' ELSE pg.nippns END AS nippns,  
                                    CASE WHEN pg.objectjabataninternalfk IS NULL THEN '' ELSE jb.namajabatan END AS jabatan,  
                                    CASE WHEN pd.tglpulang IS NOT NULL THEN pd.tglpulang ELSE NOW() END AS tglpulang,
			                        ru.namaruangan	|| ' / ' || kmr.namakamar || ' ( ' || tt.nomorbed || ' )' as kamar,
			                        CASE WHEN pm.penanggungjawab IS NOT NULL THEN pm.penanggungjawab ELSE pm.namapasien END AS penanggungjawab,
			                        CASE WHEN pm.notelepon IS NULL AND pm.nohp IS NULL THEN '' 
			                        WHEN pm.notelepon IS NOT NULL AND pm.nohp IS NOT NULL THEN pm.notelepon || ' / ' || pm.nohp
			                        WHEN pm.notelepon IS NOT NULL AND pm.nohp IS NULL THEN pm.notelepon
			                        WHEN pm.nohp IS NOT NULL AND pm.notelepon IS NULL THEN pm.nohp END AS notelepon,
			                        dk.namadesakelurahan,kc.namakecamatan,kb.namakotakabupaten,prop.namapropinsi,alm.kodepos,dep.namadepartemen"))
            ->where('sk.kdprofile', $kdProfile)
            ->where('sk.norec', $request['norec'])
            ->get();
        if(count($dataSurat) == 0){
            return 'Data tidak ada';
            die;
        }
        $KepalaRs = \DB::table('pegawai_m AS pg')
            ->leftJoin('pangkat_m AS pt','pt.id','=','pg.objectpangkatfk')
            ->leftJoin('jabatan_m AS jb','jb.id','=','pg.objectjabataninternalfk')
            ->select(DB::raw("pg.namalengkap,pg.nippns,CASE WHEN pg.objectpangkatfk IS NULL THEN '' ELSE pt.namapangkat END AS pangkat,
			                         CASE WHEN pg.nippns IS NULL THEN '' ELSE pg.nippns END AS nippns,CASE WHEN pg.objectjabataninternalfk IS NULL THEN '' ELSE jb.namajabatan END AS jabatan"))
            ->where('pg.kdprofile', $kdProfile)
            ->where('pg.id',$idKepalaRs)
            ->first();

        $tglRegis= '';
        $tglPulang='';
        $nrp ='';
        foreach ($dataSurat as $item){
            $tglRegis = self::getDateIndo($item->tglregistrasi) ;
            $tglPulang = self::getDateIndo($item->tglpulang);
            $nrp = $item->pangkat . ' NRP ' . $item->nippns;
        }

        $dataReport = array(
            'data' => $dataSurat,
            'kepalaRs' => $KepalaRs,
            'tanggal' => $Tgl,
            'tanggalrawat' => $tglRegis . ' s.d ' . $tglPulang,
            'nrp'=> $nrp,
            'namaprofile' => $DataProfile->namalengkap,
            'namaexternal' => $DataProfile->namaexternal,
            'namakota' => $DataProfile->namakota,
            'profileId' => $DataProfile->id,
        );

//        return $this->respond($dataSurat);
        return view('design.cetak-surat-persetujuan-umum',compact('dataReport'));
    }
    public function cetakHasilLIS(Request $r) {
        $kdProfile = (int)$r['kdprofile'];
        $raw = collect(DB::select("SELECT
                so.tglorder,
                ps.nocm,
                so.noorder AS noorder,
                ps.namapasien,
                ps.tgllahir,
                jk.jeniskelamin,
            pg2.namalengkap as dokter,
            pg3.namalengkap as dokterverif,
                CASE
            WHEN alm.alamatlengkap IS NULL THEN
                '-'
            ELSE
                alm.alamatlengkap
            END AS alamatlengkap,
             ru.namaruangan,
             pd.noregistrasi,
             pg.namalengkap as djp,
             date_part('year', age(ps.tgllahir)) usia,
             kp.kelompokpasien AS cara_bayar,
             ru2.namaruangan AS ruangantujuan,
             pd.norec as norec_pd,kps.kelompokpasien
            FROM
                strukorder_t AS so
            INNER JOIN pasien_m AS ps ON ps. ID = so.nocmfk
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = so.noregistrasifk
            INNER JOIN kelompokpasien_m AS kp ON kp. ID = pd.objectkelompokpasienlastfk
            INNER JOIN ruangan_m AS ru ON ru. ID = pd.objectruanganlastfk
            INNER JOIN ruangan_m AS ru2 ON ru2. ID = so.objectruangantujuanfk
            LEFT JOIN jeniskelamin_m AS jk ON jk. ID = ps.objectjeniskelaminfk
            LEFT JOIN kelompokpasien_m AS kps ON kps. ID = pd.objectkelompokpasienlastfk
            LEFT JOIN alamat_m AS alm ON alm.nocmfk = ps. ID
            LEFT JOIN pegawai_m AS pg ON pg. ID = so.objectpegawaiorderfk
            LEFT JOIN pegawai_m AS pg2 ON pg2. ID = pd.objectpegawaifk
            LEFT JOIN order_lab AS ol ON ol. no_lab = so.noorder
            LEFT JOIN pegawai_m AS pg3 ON pg3. ID =  ol.kode_dok_kirim::integer
            WHERE
                so.noorder = '$r[noorder]'
            AND so.kdprofile = $kdProfile
            AND so.statusenabled = TRUE;"))->first();
    $order_lab = collect(DB::select("SELECT
              *
            FROM
                order_lab AS so
             WHERE
                so.no_lab = '$r[noorder]'"))->first();
        if(!empty($raw)){
            $raw->umur = $this->getAge($raw->tgllahir ,date('Y-m-d'));
            $pdnorec = $raw->norec_pd;
            $diag =  DB::select(DB::raw("select DISTINCT dg.kddiagnosa , dg.namadiagnosa,pd.noregistrasi
                from pasiendaftar_t as pd 
                join antrianpasiendiperiksa_t as apd on apd.noregistrasifk =pd.norec
                join detaildiagnosapasien_t  as ddp on ddp.noregistrasifk=apd.norec
                join diagnosa_m  as dg on dg.id=ddp.objectdiagnosafk
                where pd.kdprofile=$kdProfile
                and pd.statusenabled =true
                and pd.norec ='$pdnorec'"));
            $raw->diagnosa = '';
            $arr ='';
            if(count($diag) > 0){
                foreach ($diag as $d){
                    $arr = $d->kddiagnosa .'-' .$d->namadiagnosa .  ' ,' .$arr;
                }
                $raw->diagnosa = $arr;
            }
        }

//        dd($raw);
//         $ip =$this->settingDataFixed('urlHasilLIS',$kdProfile);
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => $ip.'lab_result/api/examination_result/result/'.$r['noorder'],//$data->result_id,
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => "",
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 30,
//             CURLOPT_SSL_VERIFYHOST => 0,
//             CURLOPT_SSL_VERIFYPEER => 0,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => "GET",
// //            CURLOPT_POSTFIELDS => $post,
//             CURLOPT_HTTPHEADER => array(
//                 "Content-Type: application/json;",
//             ),
//         ));

//         $response = curl_exec($curl);
//         $err = curl_error($curl);

//         curl_close($curl);

//         if ($err) {

           $pageWidth = 950;
           $footer =true;
           $result= collect( DB::connection('sqlsrv')
               ->select("select 
                REG_DATE as reg_date ,
                NOLAB_RS AS visit_trans_id,  PARAMETER_ID AS examination_id,
                PARAMETER_NAME AS examination_name, HASIL AS result_value,  SATUAN AS unit,
                NILAI_RUJUKAN AS normal_value,  METODE_PERIKSA AS metode,   KEL_PEMERIKSAAN AS treatment_name,
                URUT_BOUND AS urut, NORM AS rm_number,  MODIFIED_DATE AS visit_date,    KODE_TARIF AS tarif_id,
                TARIF_NAME AS tarif_name,   FLAG_HL AS flag  
                from HasilLIS
                where NOLAB_RS= '$r[noorder]'"));
           if(count($result) == 0){
            echo 'Data Tidak Ada';
            return;
           }
           $footer =true;
           $data = array(
             'res' => $result,
             'jenis' => 'bridging'
           );
           // dd($data);
           return view('report.lab.hasil-lis',
            compact('data','raw', 'pageWidth','r','footer','order_lab'));
            // $result = "cURL Error #:" . $err;
//         } else {
//             $result = json_decode($response);
//         }
        
//         $data['jenis'] = 'bridging';
// //        dd($result);
//         if($result->status ==200){
//             $data['res'] = $result->data;
//         }else{
//             echo 'Data Tidak Ada';
//             return;
//         }

//         if($result == null){

//            $result= collect( DB::connection('sqlsrv')
//                ->select("select * from HasilLIS
//            where NOLAB_RS= '$r[noorder]'"));
// //           dd($result);

//             $data['jenis'] = 'non';
//             $data['res'] = $result;
//         }
//        dd($data);
        // return view('report.lab.hasil-lis',
        //     compact('data','raw', 'pageWidth','r','footer','order_lab'));

    }
    public function cetakEkspertiseCtscan(Request $r) {
        $kdProfile = (int)$r['kdprofile'];
        $raw = collect(DB::select("
            SELECT
                so.nofoto,ps.nocm, ps.namapasien,ps.tgllahir,kp.kelompokpasien,ps.noidentitas,so.klinis,so.statusradctscan,
            ru.namaruangan, so.tanggal,jk.jeniskelamin,  
            CASE WHEN alm.alamatlengkap IS NULL THEN
                '-' ELSE (
                alm.alamatlengkap || ' ' || ds.namadesakelurahan || ' '|| kc.namakecamatan
                || ' ' || kk.namakotakabupaten || ' '  || pro.namapropinsi )
            END AS alamatlengkap,
            pg.namalengkap as perujuk,pg2.namalengkap as dokterrad,p3.dokterluar as dokterluar,
            pr.namaproduk,replace(so.keterangan, '~', '<br>') as keterangan,pd.noregistrasi,pg2.nippns,pg3.namalengkap as dokterpengirim,
            pg2.id as pgid
            FROM
                hasilradiologi_t AS so
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = so.noregistrasifk
            INNER JOIN pasien_m AS ps ON ps. ID = pd.nocmfk
            INNER JOIN kelompokpasien_m AS kp ON kp. ID = pd.objectkelompokpasienlastfk
            INNER JOIN ruangan_m AS ru ON ru. ID = pd.objectruanganlastfk
            INNER JOIN pelayananpasien_t AS pp ON pp.norec = so.pelayananpasienfk
            LEFT JOIN pelayananpasienpetugas_t AS p3 ON pp.norec = p3.pelayananpasien
            INNER JOIN produk_m AS pr ON pr.id = pp.produkfk
            LEFT JOIN jeniskelamin_m AS jk ON jk. ID = ps.objectjeniskelaminfk
            LEFT JOIN kelompokpasien_m AS kps ON kps. ID = pd.objectkelompokpasienlastfk
            LEFT JOIN alamat_m AS alm ON alm.nocmfk = ps. ID
            left join desakelurahan_m as ds on ds.id=alm.objectdesakelurahanfk
            left join kotakabupaten_m as kk on kk.id=alm.objectkotakabupatenfk
            left join kecamatan_m as kc on kc.id=alm.objectkecamatanfk
            left join propinsi_m as pro on pro.id=alm.objectpropinsifk
            LEFT JOIN pegawai_m AS pg ON pg. ID = pd.objectpegawaifk
            LEFT JOIN pegawai_m AS pg2 ON pg2. ID = so.pegawaifk
            LEFT JOIN strukorder_t as sot on sot.norec = pp.strukorderfk
            LEFT JOIN pegawai_m as pg3 on pg3.id = sot.objectpegawaiorderfk
            WHERE
                so.norec = '$r[norec]'
            AND so.kdprofile = $kdProfile
            AND so.statusenabled = TRUE
        "))->first();
//        dd($raw);
        if(!empty($raw)){
            $raw->umur = $this->getAge($raw->tgllahir ,date('Y-m-d'));
        }else{
            echo 'Data Tidak ada ';
            return;
        }
    //    dd($raw);
        $pageWidth = 950;

        return view('report.rad.expertise',
            compact('raw', 'pageWidth','r'));

    }

    public function cetakEkspertiseCtscanAll(Request $r) {
        $kdProfile = (int)$r['kdprofile'];
        $nocm = $r['nocm'];
        $raw = collect(DB::select("
            SELECT
                so.nofoto,ps.nocm, ps.namapasien,ps.tgllahir,kp.kelompokpasien,ps.noidentitas,so.klinis,so.statusradctscan,
            ru.namaruangan, so.tanggal,jk.jeniskelamin,  
            CASE WHEN alm.alamatlengkap IS NULL THEN
                '-' ELSE (
                alm.alamatlengkap || ' ' || ds.namadesakelurahan || ' '|| kc.namakecamatan
                || ' ' || kk.namakotakabupaten || ' '  || pro.namapropinsi )
            END AS alamatlengkap,
            pg.namalengkap as perujuk,pg2.namalengkap as dokterrad,
            pr.namaproduk,replace(so.keterangan, '~', '<br>') as keterangan,pd.noregistrasi,pg2.nippns,pg3.namalengkap as dokterpengirim,
            pg2.id as pgid
            FROM
                hasilradiologi_t AS so
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = so.noregistrasifk
            INNER JOIN pasien_m AS ps ON ps. ID = pd.nocmfk
            INNER JOIN kelompokpasien_m AS kp ON kp. ID = pd.objectkelompokpasienlastfk
            INNER JOIN ruangan_m AS ru ON ru. ID = pd.objectruanganlastfk
            INNER JOIN pelayananpasien_t AS pp ON pp.norec = so.pelayananpasienfk
            INNER JOIN produk_m AS pr ON pr.id = pp.produkfk
            LEFT JOIN jeniskelamin_m AS jk ON jk. ID = ps.objectjeniskelaminfk
            LEFT JOIN kelompokpasien_m AS kps ON kps. ID = pd.objectkelompokpasienlastfk
            LEFT JOIN alamat_m AS alm ON alm.nocmfk = ps. ID
            left join desakelurahan_m as ds on ds.id=alm.objectdesakelurahanfk
            left join kotakabupaten_m as kk on kk.id=alm.objectkotakabupatenfk
            left join kecamatan_m as kc on kc.id=alm.objectkecamatanfk
            left join propinsi_m as pro on pro.id=alm.objectpropinsifk
            LEFT JOIN pegawai_m AS pg ON pg. ID = pd.objectpegawaifk
            LEFT JOIN pegawai_m AS pg2 ON pg2. ID = so.pegawaifk
            LEFT JOIN strukorder_t as sot on sot.norec = pp.strukorderfk
            LEFT JOIN pegawai_m as pg3 on pg3.id = sot.objectpegawaiorderfk
            WHERE
                --so.norec = '$r[norec]'
                ps.nocm = '$nocm'
            AND so.kdprofile = $kdProfile
            AND so.statusenabled = TRUE
        "));
        if(empty($raw)){
            echo 'Data Tidak ada ';
            return;
        }
        $pageWidth = 950;

        return view('report.rad.expertiseall',
            compact('raw', 'pageWidth','r'));

    }

    public function cetakEkspertiseUsg(Request $r) {
        $norec = $r['norec'];
        $kdProfile = (int)$r['kdprofile'];
        // dd($r->all);
        $raw = collect(DB::select("
            SELECT
                so.nofoto,ps.nocm, ps.namapasien,ps.tgllahir,kp.kelompokpasien,ps.noidentitas,so.klinis,so.statusrad,
            ru.namaruangan, so.tanggal,jk.jeniskelamin,  
            CASE WHEN alm.alamatlengkap IS NULL THEN
                '-' ELSE (
                alm.alamatlengkap || ' ' || ds.namadesakelurahan || ' '|| kc.namakecamatan
                || ' ' || kk.namakotakabupaten || ' '  || pro.namapropinsi )
            END AS alamatlengkap,
            pg.namalengkap as perujuk,pg2.namalengkap as dokterrad, p3.dokterluar as dokterluar,
            pr.namaproduk,replace(so.keterangan, '~', '<br>') as keterangan,pd.noregistrasi,pg2.nippns,pg3.namalengkap as dokterpengirim,
            pg2.id as pgid
            FROM
                hasilradiologi_t AS so
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = so.noregistrasifk
            INNER JOIN pasien_m AS ps ON ps. ID = pd.nocmfk
            INNER JOIN kelompokpasien_m AS kp ON kp. ID = pd.objectkelompokpasienlastfk
            INNER JOIN ruangan_m AS ru ON ru. ID = pd.objectruanganlastfk
            INNER JOIN pelayananpasien_t AS pp ON pp.norec = so.pelayananpasienfk
            INNER JOIN produk_m AS pr ON pr.id = pp.produkfk
            LEFT JOIN pelayananpasienpetugas_t AS p3 ON pp.norec = p3.pelayananpasien
            LEFT JOIN jeniskelamin_m AS jk ON jk. ID = ps.objectjeniskelaminfk
            LEFT JOIN kelompokpasien_m AS kps ON kps. ID = pd.objectkelompokpasienlastfk
            LEFT JOIN alamat_m AS alm ON alm.nocmfk = ps. ID
            left join desakelurahan_m as ds on ds.id=alm.objectdesakelurahanfk
            left join kotakabupaten_m as kk on kk.id=alm.objectkotakabupatenfk
            left join kecamatan_m as kc on kc.id=alm.objectkecamatanfk
            left join propinsi_m as pro on pro.id=alm.objectpropinsifk
            LEFT JOIN pegawai_m AS pg ON pg. ID = pd.objectpegawaifk
            LEFT JOIN pegawai_m AS pg2 ON pg2. ID = so.pegawaifk
            LEFT JOIN strukorder_t as sot on sot.norec = pp.strukorderfk
            LEFT JOIN pegawai_m as pg3 on pg3.id = sot.objectpegawaiorderfk
            WHERE
                so.norec = '$norec'
            AND so.kdprofile = $kdProfile
            AND so.statusenabled = TRUE
            AND p3.objectjenispetugaspefk = 4
        "))->first();
        if(!empty($raw)){
            $raw->umur = $this->getAge($raw->tgllahir ,date('Y-m-d'));
        }else{
            echo 'Data Tidak ada ';
            return;
        }
    //    dd($raw);
        $pageWidth = 950;

        return view('report.rad.expertiseusg',
            compact('raw', 'pageWidth','r'));

    }

    public function cetakEkspertiseUsgAll(Request $r) {
        $norec = $r['norec'];
        $nocm = $r['nocm'];
        $noregistrasi = $r['noregistrasi'];
        $kdProfile = (int)$r['kdprofile'];
        $raw = collect(DB::select("
            SELECT
                so.nofoto,ps.nocm, ps.namapasien,ps.tgllahir, age(ps.tgllahir) as umur,kp.kelompokpasien,ps.noidentitas,so.klinis,so.statusrad,
            ru.namaruangan, so.tanggal,jk.jeniskelamin,  
            CASE WHEN alm.alamatlengkap IS NULL THEN
                '-' ELSE (
                alm.alamatlengkap || ' ' || ds.namadesakelurahan || ' '|| kc.namakecamatan
                || ' ' || kk.namakotakabupaten || ' '  || pro.namapropinsi )
            END AS alamatlengkap,
            pg.namalengkap as perujuk,pg2.namalengkap as dokterrad, p3.dokterluar as dokterluar, pg2.qrcode,
            pr.namaproduk,replace(so.keterangan, '~', '<br>') as keterangan,pd.noregistrasi,pg2.nippns,pg3.namalengkap as dokterpengirim,
            pg2.id as pgid
            FROM
                hasilradiologi_t AS so
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = so.noregistrasifk
            INNER JOIN pasien_m AS ps ON ps. ID = pd.nocmfk
            INNER JOIN kelompokpasien_m AS kp ON kp. ID = pd.objectkelompokpasienlastfk
            INNER JOIN ruangan_m AS ru ON ru. ID = pd.objectruanganlastfk
            INNER JOIN pelayananpasien_t AS pp ON pp.norec = so.pelayananpasienfk
            INNER JOIN produk_m AS pr ON pr.id = pp.produkfk
            LEFT JOIN pelayananpasienpetugas_t AS p3 ON pp.norec = p3.pelayananpasien
            LEFT JOIN jeniskelamin_m AS jk ON jk. ID = ps.objectjeniskelaminfk
            LEFT JOIN kelompokpasien_m AS kps ON kps. ID = pd.objectkelompokpasienlastfk
            LEFT JOIN alamat_m AS alm ON alm.nocmfk = ps. ID
            left join desakelurahan_m as ds on ds.id=alm.objectdesakelurahanfk
            left join kotakabupaten_m as kk on kk.id=alm.objectkotakabupatenfk
            left join kecamatan_m as kc on kc.id=alm.objectkecamatanfk
            left join propinsi_m as pro on pro.id=alm.objectpropinsifk
            LEFT JOIN pegawai_m AS pg ON pg. ID = pd.objectpegawaifk
            LEFT JOIN pegawai_m AS pg2 ON pg2. ID = so.pegawaifk
            LEFT JOIN strukorder_t as sot on sot.norec = pp.strukorderfk
            LEFT JOIN pegawai_m as pg3 on pg3.id = sot.objectpegawaiorderfk
            WHERE
                -- so.norec = '$norec'
                -- ps.nocm = '$nocm'
                pd.noregistrasi = '$noregistrasi'
            AND so.kdprofile = $kdProfile
            AND so.statusenabled = TRUE
        "));
        foreach ($raw as $z) {
            if ($z->qrcode == null) {
                $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->dokterrad));
            }
        }
        if(empty($raw)){
            echo 'Data Tidak ada ';
            return;
        }
;
        $pageWidth = 950;
        if(isset($r["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.rad.expertiseusgall-dom', array(
                'pageWidth' => $pageWidth,
                'raw' => $raw,
                'r' => $r,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $r);
            return;
        }else{
            return view('report.rad.expertiseusgall',compact('raw', 'pageWidth','r'));
        }

    }

    public function getKegiatanRanap(Request $r){
        $kdProfile = (int)$r['kdprofile'];
        $deptRanap = explode (',',$this->settingDataFixed('kdDepartemenRanapFix',  $kdProfile ));
        $kdDepartemenRawatInap = [];
        foreach ($deptRanap as $itemRanap){
            $kdDepartemenRawatInap []=  (int)$itemRanap;
        }
        $ruangan = Ruangan::where('kdprofile',$kdProfile)
            ->where('statusenabled',true)
            ->whereIn('objectdepartemenfk',$kdDepartemenRawatInap)
            ->select('id','namaruangan')
            ->get();

//        dd($ruangan);
//        $borlos = $this->getBorlostoi($r);
//        dd($borlos);
        $pasienPulang = $this->getPasienPulang($r);
//        dd($borlos);
        $pageWidth = 950;

        return view('report.rekammedis.kegiatan-ranap',
                compact('ruangan',
                    'pageWidth','r'));


    }
    function  getPasienPulang($request){
        $dat = DB::select(DB::raw("
            select case when x.skid =1 and x.spid in (1,2,6) then 'Biasa'
            when x.spid=12 then 'Paksa'
            when x.spid=3 then 'Kabur'
            when x.spid in (4,5,10,11) then 'Rujuk'
            when x.spid in (7) then 'Pindah'
            when x.kpid in (5) then '< 24 jam'
            when x.kpid in (6) then '> 24 jam'
            end as uraian,x.namaruangan
            from (
            select pd.noregistrasi, pd.tglregistrasi,pd.tglpulang, ru.namaruangan,
            ru.id,pd.objectstatuskeluarfk as skid,sk.statuskeluar,
            pd.objectstatuspulangfk as spid,
            sp.statuspulang,apd.israwatgabung,
            pd.objectkondisipasienfk as kpid,kp.kondisipasien,
            row_number() over (partition by pd.noregistrasi order by apd.tglmasuk asc) as rownum 
            from pasiendaftar_t as pd 
            join antrianpasiendiperiksa_t as apd on apd.noregistrasifk=pd.norec
            and apd.objectruanganfk=pd.objectruanganlastfk
            left join ruangan_m as ru on ru.id = pd.objectruanganlastfk 
            left join statuskeluar_m as sk on sk.id = pd.objectstatuskeluarfk
            left join statuspulang_m as sp on sp.id = pd.objectstatuspulangfk
            left join kondisipasien_m as kp on kp.id = pd.objectkondisipasienfk
            where pd.kdprofile = 21 
            and ru.objectdepartemenfk =16
            and pd.statusenabled = true 
            and to_char(pd.tglpulang,'yyyy-MM') ='2020-10'
            )
            as x where x.rownum=1
            "));
    }
        public function getBorlostoi( $request)
        {
            $kdProfile = (int)$request['kdprofile'];
            $bulan = $request['bulan'];
            $dateStart = Carbon::now();
            $dayInMonth = array();
            $type = CAL_GREGORIAN;
            $month = Carbon::parse($bulan)->format('m'); // Month ID, 1 through to 12.

            $year = Carbon::parse($bulan)->format('Y'); //date('Y'); // Year in 4 digit 2009 format.
            $day_count = cal_days_in_month($type, $month, $year); // Get the amount of days\

            for ($i = 1; $i <= $day_count; $i++) {
                $date = $year.'/'.$month.'/'.$i; //format date
                $get_name = date('l', strtotime($date)); //get week day
                $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars

                //if not a weekend add day to array
//            if($day_name != 'Sun' && $day_name != 'Sat'){
                $strLength= strlen($i);
                if($strLength  == 1){
                    $i = '0'.$i;
                }
//            return $this->respond($countDay);
                $dayInMonth[] = Carbon::parse($bulan)->format('Y').'-'.$month.'-'.$i;// date ('Y-'.$month.'-'.$i);
//            }
            }

            $kamar =  DB::select(DB::raw("select count(x.idkelas) as tt,x.namakelas ,x.idkelas,
            0 as ld,0 as hp,0 as jmlpasienkeluar,0 as bor,0 as los ,0 as toi, 0 as bto, 0 as ndr,0 as gdr
          from (
            SELECT
                ru.id AS idruangan,  ru.namaruangan,
                km.id AS idkamar,
                km.namakamar,
                kl.id AS idkelas,
                kl.namakelas
            FROM
                tempattidur_m AS tt
            LEFT JOIN kamar_m AS km ON km.id = tt.objectkamarfk
            LEFT JOIN ruangan_m AS ru ON ru.id = km.objectruanganfk
            LEFT JOIN kelas_m AS kl ON kl.id = km.objectkelasfk
            WHERE 	ru.objectdepartemenfk IN (16, 35)
            AND ru.statusenabled = 1
            AND km.statusenabled = 1
            AND tt.statusenabled = 1
            ) as x
            group by x.namakelas,x.idkelas"));

            $firstDay = $bulan.'-01';
            $lastDay = $bulan.'-'. $day_count;
//        return $this->respond($firstDay);
            $pasien = DB::select(DB::raw(" SELECT
                pd.noregistrasi,
                pd.tglregistrasi,
                pd.tglpulang,
                 pd.objectkelasfk,
                    DATEDIFF(DAY, pd.tglregistrasi, pd.tglpulang) as hari 
                FROM
                    pasiendaftar_t AS pd
                INNER JOIN ruangan_m AS ru ON ru.ID = pd.objectruanganlastfk
                WHERE
                    ru.objectdepartemenfk = 16
               -- AND pd.tglpulang BETWEEN '$firstDay' and '$lastDay'
                order by pd.tglpulang asc
                "));
            $LD = DB::select(DB::raw(" SELECT
                pd.noregistrasi,
                pd.tglregistrasi,
                pd.tglpulang,
                 pd.objectkelasfk,
                    DATEDIFF(DAY, pd.tglregistrasi, pd.tglpulang) as hari 
                FROM
                    pasiendaftar_t AS pd
                INNER JOIN ruangan_m AS ru ON ru.ID = pd.objectruanganlastfk
                WHERE
                    ru.objectdepartemenfk = 16
              AND pd.tglregistrasi BETWEEN '$firstDay' and '$lastDay'
                order by pd.tglpulang asc
                "));

            $dataMeninggal = DB::select(DB::raw("select count(x.noregistrasi) as jumlahmeninggal, x.bulanregis,  
                count(case when x.objectkondisipasienfk = '6' then 1 end ) AS jumlahlebih48 FROM
                (
                select noregistrasi,Format(tglregistrasi , 'mm')  as bulanregis ,statuskeluar,kondisipasien,objectkondisipasienfk
                from pasiendaftar_t 
                join statuskeluar_m on statuskeluar_m.id =pasiendaftar_t.objectstatuskeluarfk
                left join kondisipasien_m on kondisipasien_m.id =pasiendaftar_t.objectkondisipasienfk
                where objectstatuskeluarfk =5
                and  tglregistrasi BETWEEN '$firstDay' and '$lastDay'
                ) as x
                GROUP BY x.bulanregis;"));
//        $dayInMonth = [ '2019-12-30'];
            $jmlHP = 0 ;
            $i = 0;
            $data = [];
            foreach ($dayInMonth as $day){
                foreach ($pasien as $item){
                    foreach ($kamar as $kamarss){
                        if($item->tglpulang != null){
                            if(Carbon::parse($item->tglregistrasi)->format('Y-m-d') <= date($dayInMonth[$i])
                                && date($dayInMonth[$i]) <= Carbon::parse($item->tglpulang)->format('Y-m-d')
                                && (int)  $kamarss->idkelas == (int) $item->objectkelasfk ){
                                $kamarss->hp =(int)  $kamarss->hp + 1;
                            }
                        }else{
                            if(Carbon::parse($item->tglregistrasi)->format('Y-m-d') <= date($dayInMonth[$i])
                                && (int)  $kamarss->idkelas == (int) $item->objectkelasfk ){
                                $kamarss->hp =(int)  $kamarss->hp + 1;
                            }
                        }

                    }
                }
                $i = $i+1;
            }
            foreach ($kamar as $kamarss) {
                foreach ($LD as $item) {
                    if( (int) $item->objectkelasfk == (int) $kamarss->idkelas){
                        $kamarss->ld = (int)$kamarss->ld  + (int)$item->hari;
                        $kamarss->jmlpasienkeluar = (int) $kamarss->jmlpasienkeluar  +1;
                    }
                }
            }
            foreach ($kamar as $item) {
                /** @var  $bor = (Jumlah hari perawatn RS dibagi ( jumlah TT x Jumlah hari dalam satu periode ) ) x 100 % */
                $item->bor = ((int)$item->hp / ((float)$item->tt * (float)$day_count)) * 100;//$numday['jumlahhari']));

                /** @var  $alos = (Jumlah Lama Dirawat dibagi Jumlah pasien Keluar (Hidup dan Mati) */
                if ((int)$item->jmlpasienkeluar > 0){
                    $item->los = (int)$item->ld / (int)$item->jmlpasienkeluar;
                }

                /** @var  $toi = (Jumlah TT X Periode) - Hari Perawatn DIBAGI Jumlah pasien Keluar (Hidup dan Mati)*/
                if ( (int)$item->jmlpasienkeluar > 0){
                    $item->toi =  (( (float)$item->tt  *  (float)$day_count) - (int)$item->hp)  /(int)$item->jmlpasienkeluar ;
                }

                /** @var  $bto = Jumlah pasien Keluar (Hidup dan Mati) DIBAGI Jumlah tempat tidur */
                $item->bto = (int)$item->jmlpasienkeluar / (float)$item->tt;

                if(count($dataMeninggal)> 0 ) {
                    foreach ($dataMeninggal as $itemDead) {
                        /** @var  $gdr = (Jumlah Mati dibagi Jumlah pasien Keluar (Hidup dan Mati) */
                        $item->gdr = (int)$itemDead->jumlahmeninggal * 1000 / (int)$item->jmlpasienkeluar;

                        /** @var  $NDR = (Jumlah Mati > 48 Jam dibagi Jumlah pasien Keluar (Hidup dan Mati) */
                        $item->ndr = (int)$itemDead->jumlahlebih48 * 1000 / (int)$item->jmlpasienkeluar;
                    }
                }
            }
            foreach ($kamar as $key => $row) {
                $count[$key] = $row->namakelas;
            }
            array_multisort($count, SORT_ASC, $kamar);
            $result = array(
                'data' => $kamar,
                'by' => 'er@epic'
            );

            return $this->respond($result);
        }

    public static  function getPasienAwal($ruid,$bulan,$kdprofile){
        $data = collect(DB::select("select pd.noregistrasi, pd.tglregistrasi,pd.tglpulang, ru.namaruangan,
            ru.id
            from pasiendaftar_t as pd 
            left join ruangan_m as ru on ru.id = pd.objectruanganlastfk 
            where pd.kdprofile = $kdprofile 
            and pd.statusenabled = true 
            and ru.id = $ruid
            and pd.tglpulang is null and to_char(pd.tglregistrasi,'yyyy-MM') <'$bulan'"))
        ->count();
//        dd($data);
        return $data;
    }
    public function cetakHispatologi(Request $r) {
        $kdProfile = (int)$r['kdprofile'];
        $profile = collect(DB::select("
        SELECT * FROM profile_m WHERE id = $kdProfile"))->first();
        $raw = collect(DB::select("
            SELECT
                pd.noregistrasi, pm.nocm, pm.namapasien, hpl.dokterluar, dokterpengirim.namalengkap as namadokterpengirim,
                jk.jeniskelamin, EXTRACT ( YEAR
                    FROM AGE(  pd.tglregistrasi,pm.tgllahir )
                ) || ' Thn ' || EXTRACT (MONTH  FROM AGE(  pd.tglregistrasi, pm.tgllahir )
                ) || ' Bln ' || EXTRACT ( DAY  FROM  AGE( pd.tglregistrasi, pm.tgllahir )  ) || ' Hr' || '(' || to_char(pm.tgllahir, 'DD-MM-YYYY') || ')' AS umur,
                to_char(  so.tglorder, 'DD-MM-YYYY HH24:MI:SS') AS tglorder,
                to_char( hpl.tanggal, 'DD-MM-YYYY HH24:MI:SS'  ) AS tgljawab,
                to_char( so.tglorder,'DD-MM-YYYY HH24:MI:SS' ) AS tglterima,
                to_char(  sbm.tglsbm,'DD-MM-YYYY HH24:MI:SS' ) AS tglbayar, pg.namalengkap,
             CASE WHEN hpl.jaringanasal IS NULL THEN  ''  ELSE  jaringanasal  END AS jaringanasal,
             CASE WHEN hpl.getjaringan IS NULL THEN  ''  ELSE  getjaringan  END AS getjaringan,
             CASE WHEN hpl.diagnosaklinik IS NULL THEN  ''  ELSE  diagnosaklinik  END AS diagnosaklinik,
             CASE WHEN hpl.keteranganklinik IS NULL THEN ''   ELSE hpl.keteranganklinik  END AS keteranganklinik,
             CASE WHEN hpl.makroskopik IS NULL THEN   '' ELSE  hpl.makroskopik END AS makroskopik, 
             CASE WHEN hpl.mikroskopik IS NULL THEN ''   ELSE  hpl.mikroskopik END AS mikroskopik, 
             CASE WHEN hpl.kesimpulan IS NULL THEN '' ELSE hpl.kesimpulan END AS kesimpulan,
             CASE WHEN hpl.anjuran IS NULL THEN  '' ELSE  hpl.anjuran END AS anjuran,
             CASE WHEN hpl.topografi IS NULL THEN   '' ELSE hpl.topografi  END AS topografi, 
             CASE WHEN hpl.morfologi IS NULL THEN  '' ELSE hpl.morfologi END AS morfologi,
             CASE WHEN hpl.diagnosapb IS NULL THEN  '' ELSE  hpl.diagnosapb  END AS diagnosapb,
             CASE WHEN hpl.keteranganpb IS NULL THEN ''  ELSE hpl.keteranganpb END AS keteranganpb,
             CASE WHEN pg1.namalengkap IS NULL THEN '' ELSE  pg1.namalengkap   END AS namapenanggungjawab,
             CASE WHEN dm.kddiagnosa IS NULL THEN '' ELSE  dm.namadiagnosa   END AS diagnosa,
             CASE WHEN pg1.nippns IS NULL THEN ''ELSE  pg1.nippns END AS nippns,hpl.nomorpa,
             ru.namaruangan as asal,pg1.nosip, hpl.jenis,
              CASE
                    WHEN alm.alamatlengkap IS NULL THEN
                        '-'
                    ELSE
                        (
                            alm.alamatlengkap || ' ' || (
                                CASE
                                WHEN ds.namadesakelurahan IS NOT NULL THEN
                                   'Kel. ' ||  ds.namadesakelurahan
                                ELSE
                                    ''
                                END
                            ) || ' ' || (
                                CASE
                                WHEN kc.namakecamatan IS NOT NULL THEN
                                   'Kec. ' || kc.namakecamatan
                                ELSE
                                    ''
                                END
                            ) || ' ' || (
                                CASE
                                WHEN kk.namakotakabupaten IS NOT NULL THEN
                                  kk.namakotakabupaten
                                ELSE
                                    ''
                                END
                            ) || ' ' || (
                                CASE
                                WHEN prop.namapropinsi IS NOT NULL THEN
                                 'Prov. ' ||   prop.namapropinsi
                                ELSE
                                    ''
                                END
                            )
                        )
                    END AS alamatlengkap,
                    kps.kelompokpasien,pd.norec as norec_pd,pd.objectruanganlastfk
            FROM
                hasilpemeriksaanlab_t AS hpl
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = hpl.noregistrasifk
            INNER JOIN pelayananpasien_t AS pp ON pp.norec = hpl.pelayananpasienfk
            LEFT JOIN strukorder_t AS so ON so.norec = pp.strukorderfk
            LEFT JOIN strukpelayanan_t AS sp ON sp.norec = pp.strukfk
            LEFT JOIN strukbuktipenerimaan_t AS sbm ON sbm.nostrukfk = pp.norec
            INNER JOIN produk_m AS pro ON pro. ID = pp.produkfk
            INNER JOIN pasien_m AS pm ON pm. ID = pd.nocmfk
            LEFT JOIN jeniskelamin_m AS jk ON jk. ID = pm.objectjeniskelaminfk
            LEFT JOIN pegawai_m AS pg ON pg. ID = so.objectpegawaiorderfk
            LEFT JOIN pegawai_m AS pg1 ON pg1. ID = hpl.pegawaifk
            LEFT JOIN diagnosa_m AS dm ON dm.ID = hpl.icd0
            LEFT JOIN pegawai_m AS dokterpengirim ON dokterpengirim. ID = hpl.dokterpengirimfk
             LEFT JOIN ruangan_m AS ru ON ru. ID = pd.objectruanganlastfk
            left join alamat_m as alm on alm.nocmfk=pm.id
            left join desakelurahan_m as ds on ds.id=alm.objectdesakelurahanfk
            left join kotakabupaten_m as kk on kk.id=alm.objectkotakabupatenfk
            left join kecamatan_m as kc on kc.id=alm.objectkecamatanfk
            left join propinsi_m as prop on prop.id=alm.objectpropinsifk
              left join kelompokpasien_m as kps on kps.id=pd.objectkelompokpasienlastfk
            WHERE
                pp.norec = '$r[norec]'
                and hpl.statusenabled=true
        "))->first();
        if(!empty($raw)){
            $norec_pd = $raw->norec_pd;
            $objectruanganlastfk = $raw->objectruanganlastfk;
            $asalRujukan = collect(DB::select("select
                    asalrujukan from antrianpasiendiperiksa_t as apd 
                join asalrujukan_m as asl on asl.id=apd.objectasalrujukanfk
                where apd.noregistrasifk='$norec_pd'
                and apd.objectruanganfk=$objectruanganlastfk
                and apd.kdprofile=$kdProfile
                "))->first();
            $raw->asalrujukan ='';
            if(!empty( $asalRujukan )){
              $raw->asalrujukan=  $asalRujukan->asalrujukan;
            }

//            $raw->umur = $this->getAge($raw->tgllahir ,date('Y-m-d'));
        }else{
            echo 'Data Tidak ada ';
            return;
        }
        // dd($raw);
        if($raw->jenis == 'pa'){
            return view('report.lab.histopatologi', compact('raw','r', 'profile'));
        }

        return view('report.lab.sitologi', compact('raw','r', 'profile'));

    }

    public function cetakEDT(Request $r) {
        $kdProfile = (int)$r['kdprofile'];
        $profile = collect(DB::select("
        SELECT * FROM profile_m WHERE id = $kdProfile"))->first();
        $raw = collect(DB::select("
            SELECT
                pd.noregistrasi, pm.nocm, pm.namapasien,pm.tgllahir, hpl.dokterluar, dokterpengirim.namalengkap as namadokterpengirim, pg1.namalengkap as namapenanggungjawab,
                pg2.namalengkap as namadokterpemeriksa,
                jk.jeniskelamin, EXTRACT ( YEAR
                    FROM AGE(  pd.tglregistrasi,pm.tgllahir )
                ) || ' Thn ' || EXTRACT (MONTH  FROM AGE(  pd.tglregistrasi, pm.tgllahir )
                ) || ' Bln ' || EXTRACT ( DAY  FROM  AGE( pd.tglregistrasi, pm.tgllahir )  ) || ' Hr' || '(' || to_char(pm.tgllahir, 'DD-MM-YYYY') || ')' AS umur,
                to_char(  so.tglorder, 'DD-MM-YYYY HH24:MI:SS') AS tglorder,
                to_char( hpl.tanggal, 'DD-MM-YYYY HH24:MI:SS'  ) AS tgljawab,
                to_char( so.tglorder,'DD-MM-YYYY HH24:MI:SS' ) AS tglterima,
                to_char(  sbm.tglsbm,'DD-MM-YYYY HH24:MI:SS' ) AS tglbayar, pg.namalengkap,
             CASE WHEN hpl.haemoglobin IS NULL THEN  '-'  ELSE  haemoglobin  END AS haemoglobin,
             CASE WHEN hpl.leukosit IS NULL THEN  '-'  ELSE  leukosit  END AS leukosit,
             CASE WHEN hpl.eritrosit IS NULL THEN  '-'  ELSE  eritrosit  END AS eritrosit,
             CASE WHEN hpl.trombosit IS NULL THEN '-'   ELSE hpl.trombosit  END AS trombosit,
             CASE WHEN hpl.keteritrosit IS NULL THEN '-'   ELSE hpl.keteritrosit  END AS keteritrosit,
             CASE WHEN hpl.ketleukosit IS NULL THEN '-'   ELSE hpl.ketleukosit  END AS ketleukosit,
             CASE WHEN hpl.kettrombosit IS NULL THEN '-'   ELSE hpl.kettrombosit  END AS kettrombosit,
             CASE WHEN hpl.kesimpulan IS NULL THEN '-'   ELSE hpl.kesimpulan  END AS kesimpulan,
             CASE WHEN hpl.rasio IS NULL THEN '-'   ELSE hpl.rasio  END AS rasio,
             ru.namaruangan as asal,pg1.nosip,
              CASE
                    WHEN alm.alamatlengkap IS NULL THEN
                        '-'
                    ELSE
                        (
                            alm.alamatlengkap || ' ' || (
                                CASE
                                WHEN ds.namadesakelurahan IS NOT NULL THEN
                                   'Kel. ' ||  ds.namadesakelurahan
                                ELSE
                                    ''
                                END
                            ) || ' ' || (
                                CASE
                                WHEN kc.namakecamatan IS NOT NULL THEN
                                   'Kec. ' || kc.namakecamatan
                                ELSE
                                    ''
                                END
                            ) || ' ' || (
                                CASE
                                WHEN kk.namakotakabupaten IS NOT NULL THEN
                                  kk.namakotakabupaten
                                ELSE
                                    ''
                                END
                            ) || ' ' || (
                                CASE
                                WHEN prop.namapropinsi IS NOT NULL THEN
                                 'Prov. ' ||   prop.namapropinsi
                                ELSE
                                    ''
                                END
                            )
                        )
                    END AS alamatlengkap,
                    kps.kelompokpasien,pd.norec as norec_pd,pd.objectruanganlastfk
            FROM
                hasilpemeriksaanlabedt_t AS hpl
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = hpl.noregistrasifk
            INNER JOIN pelayananpasien_t AS pp ON pp.norec = hpl.pelayananpasienfk
            LEFT JOIN strukorder_t AS so ON so.norec = pp.strukorderfk
            LEFT JOIN strukpelayanan_t AS sp ON sp.norec = pp.strukfk
            LEFT JOIN strukbuktipenerimaan_t AS sbm ON sbm.nostrukfk = pp.norec
            INNER JOIN produk_m AS pro ON pro. ID = pp.produkfk
            INNER JOIN pasien_m AS pm ON pm. ID = pd.nocmfk
            LEFT JOIN jeniskelamin_m AS jk ON jk. ID = pm.objectjeniskelaminfk
            LEFT JOIN pegawai_m AS pg ON pg. ID = so.objectpegawaiorderfk
            LEFT JOIN pegawai_m AS pg1 ON pg1. ID = hpl.penanggungjawab
            LEFT JOIN pegawai_m AS pg2 ON pg2. ID = hpl.dokterpemeriksa
            LEFT JOIN pegawai_m AS dokterpengirim ON dokterpengirim. ID = hpl.dokterpengirimfk
             LEFT JOIN ruangan_m AS ru ON ru. ID = pd.objectruanganlastfk
            left join alamat_m as alm on alm.nocmfk=pm.id
            left join desakelurahan_m as ds on ds.id=alm.objectdesakelurahanfk
            left join kotakabupaten_m as kk on kk.id=alm.objectkotakabupatenfk
            left join kecamatan_m as kc on kc.id=alm.objectkecamatanfk
            left join propinsi_m as prop on prop.id=alm.objectpropinsifk
              left join kelompokpasien_m as kps on kps.id=pd.objectkelompokpasienlastfk
            WHERE
                pp.norec = '$r[norec]'
                and hpl.statusenabled=true
        "))->first();
        if(!empty($raw)){
            $norec_pd = $raw->norec_pd;
            $objectruanganlastfk = $raw->objectruanganlastfk;
            $asalRujukan = collect(DB::select("select
                    asalrujukan from antrianpasiendiperiksa_t as apd 
                join asalrujukan_m as asl on asl.id=apd.objectasalrujukanfk
                where apd.noregistrasifk='$norec_pd'
                and apd.objectruanganfk=$objectruanganlastfk
                and apd.kdprofile=$kdProfile
                "))->first();
            $raw->asalrujukan ='';
            if(!empty( $asalRujukan )){
              $raw->asalrujukan=  $asalRujukan->asalrujukan;
            }

//            $raw->umur = $this->getAge($raw->tgllahir ,date('Y-m-d'));
        }else{
            echo 'Data Tidak ada ';
            return;
        }
        // dd($raw);
        $pageWidth = 950;

        return view('report.lab.edt', compact('raw', 'pageWidth','r', 'profile'));

    }

    public function cetakEDTAll(Request $r) {
        $kdProfile = (int)$r['kdprofile'];
        $norec = explode(',', $r->norec);
        $profile = collect(DB::select("
        SELECT * FROM profile_m WHERE id = $kdProfile"))->first();
        $raw = DB::table('hasilpemeriksaanlabedt_t AS hpl')
        ->join('pasiendaftar_t AS pd', 'pd.norec', '=', 'hpl.noregistrasifk')
        ->leftjoin('pelayananpasien_t AS pp', 'pp.norec', '=', 'hpl.pelayananpasienfk')
        ->leftjoin('strukorder_t AS so', 'so.norec', '=', 'pp.strukorderfk')
        ->leftjoin('strukpelayanan_t AS sp', 'sp.norec', '=', 'pp.strukfk')
        ->join('pasien_m AS pm', 'pm.id', '=', 'pd.nocmfk')
        ->leftjoin('ruangan_m as ru', 'ru.id', '=', 'pd.objectruanganlastfk')
        ->leftjoin('kelompokpasien_m AS kps', 'kps.id', '=', 'pd.objectkelompokpasienlastfk')
        ->leftjoin('jeniskelamin_m AS jk', 'jk.id', '=', 'pm.objectjeniskelaminfk')
        ->leftjoin('pegawai_m AS pg', 'pg.id', '=', 'hpl.dokterpemeriksa')
        ->leftjoin('pegawai_m AS pg1', 'pg1.id', '=', 'hpl.penanggungjawab')
        ->leftjoin('pegawai_m AS pg2', 'pg2.id', '=', 'hpl.dokterpemeriksa')
        ->leftjoin('pegawai_m AS dokterpengirim', 'dokterpengirim.id', '=', 'hpl.dokterpengirimfk')
        ->leftjoin('alamat_m as alm', 'alm.nocmfk', '=', 'pm.id')
        // ->wherein('pp.norec', $norec)
        ->where('hpl.statusenabled', true)
        ->where('pd.noregistrasi', $r->noregistrasi)
        ->select('pd.noregistrasi', 'pm.nocm', 'pm.namapasien', 'pm.tgllahir', 'hpl.dokterluar', 'dokterpengirim.namalengkap as namadokterpengirim', 'pg1.namalengkap as namapenanggungjawab',
    'pg2.namalengkap as namadokterpemeriksa', 'pg2.qrcode as qrcodedokterpemeriksa', 'jk.jeniskelamin', 'pm.tgllahir', 'hpl.haemoglobin', 'hpl.leukosit', 'hpl.eritrosit', 'hpl.trombosit', 'hpl.rasio', 'hpl.tanggal as tgljawab', 'hpl.dokterpemeriksa',
'hpl.keteritrosit', 'hpl.ketleukosit', 'hpl.kettrombosit', 'hpl.kesimpulan', 'ru.namaruangan as asal', 'pg1.nosip' ,'kps.kelompokpasien', 'pd.norec as norec_pd', 'pd.objectruanganlastfk', 'alm.alamatlengkap')
        ->get();
        foreach ($raw as $z) {
            if ($z->qrcodedokterpemeriksa == null) {
                $z->qrcodedokterpemeriksa =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate("Tanda Tangan Digital Oleh " . $z->qrcodedokterpemeriksa));
            }
        }
        if(empty($raw)){
            echo '
            <script language="javascript">
                window.alert("Hasil tidak ditemukan");
                window.close()
            </script>
        ';
        die;
        }
        if(isset($r["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.lab.edt-all-dom', array(
                'profile' => $profile,
                'raw' => $raw,
                'r' => $r,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $r);
            return;
        }else{
            return view('report.lab.edt-all',compact('raw', 'profile','r'));
        }
    }

    public function cetakPAAll(Request $r) {
        
        
        $kdProfile = (int)$r['kdprofile'];
        $norec = explode(',', $r->norec);
        $profile = collect(DB::select("
        SELECT * FROM profile_m WHERE id = $kdProfile"))->first();
        $raw = DB::table('hasilpemeriksaanlab_t AS hpl')
        ->join('pasiendaftar_t AS pd', 'pd.norec', '=', 'hpl.noregistrasifk')
        ->leftjoin('diagnosa_m AS dm', 'dm.id', '=', 'hpl.icd0')
        ->leftjoin('pelayananpasien_t AS pp', 'pp.norec', '=', 'hpl.pelayananpasienfk')
        ->leftjoin('strukorder_t AS so', 'so.norec', '=', 'pp.strukorderfk')
        ->leftjoin('strukpelayanan_t AS sp', 'sp.norec', '=', 'pp.strukfk')
        ->join('pasien_m AS pm', 'pm.id', '=', 'pd.nocmfk')
        ->leftjoin('ruangan_m as ru', 'ru.id', '=', 'pd.objectruanganlastfk')
        ->leftjoin('kelompokpasien_m AS kps', 'kps.id', '=', 'pd.objectkelompokpasienlastfk')
        ->leftjoin('jeniskelamin_m AS jk', 'jk.id', '=', 'pm.objectjeniskelaminfk')
        ->leftjoin('pegawai_m AS dokterpengirim', 'dokterpengirim.id', '=', 'hpl.dokterpengirimfk')
        ->leftjoin('pegawai_m AS pg1', 'pg1.id', '=', 'hpl.pegawaifk')
        ->leftjoin('alamat_m as alm', 'alm.nocmfk', '=', 'pm.id')
        // ->wherein('pp.norec', $norec)
        ->where('hpl.statusenabled', true)
        ->where('pd.noregistrasi', $r->noregistrasi)
        ->select('pd.noregistrasi', 'pm.nocm', 'pm.namapasien', 'pm.tgllahir', 'hpl.dokterluar', 'dokterpengirim.namalengkap as namadokterpengirim', 'hpl.nomorpa', 'so.tglorder as tglterima', 'pg1.namalengkap as namapenanggungjawab', 'pg1.nippns',
    'jk.jeniskelamin', 'pm.tgllahir', 'hpl.jaringanasal', 'hpl.getjaringan', 'hpl.diagnosaklinik', 'hpl.keteranganklinik', 'hpl.tanggal as tgljawab', 'hpl.makroskopik','hpl.mikroskopik',
'hpl.kesimpulan', 'hpl.anjuran', 'hpl.topografi', 'hpl.morfologi', 'hpl.diagnosapb','hpl.keteranganpb','ru.namaruangan as asal', 'pg1.nosip','kps.kelompokpasien', 'pd.norec as norec_pd', 'pd.objectruanganlastfk', 'alm.alamatlengkap', 'dm.kddiagnosa', 'hpl.jenis', 'dm.namadiagnosa as diagnosa')
        ->first();
        $raw->umur = $this->getAge($raw->tgllahir ,date('Y-m-d'));
        if(empty($raw)){
            echo '
            <script language="javascript">
                window.alert("Hasil tidak ditemukan");
                window.close()
            </script>
        ';
        die;
        }else{
            if($raw->jenis == 'pa'){
                return view('report.lab.histopatologi', compact('raw','r', 'profile'));
            }
    
            return view('report.lab.sitologi', compact('raw','r', 'profile'));
        }
    }


    function getDataLaporanPenerimaanSemuaKasirPDF(Request $request) {
        $kdProfile = $request['kdProfile'];
        $tglAwal = $request['tglAwal'];
        $tglAkhir = $request['tglAkhir'];

        $idKasir = '';
        $idRuangan = '';
        if (isset($request['idKasir']) && $request['idKasir'] != "" && $request['idKasir'] != "undefined") {
            $idKasir = 'AND p.id ='.$request['idKasir'];
        }
        if (isset($request['idRuangan']) && $request['idRuangan'] != "" && $request['idRuangan'] != "undefined") {
            $idRuangan = 'AND p.id ='.$request['idRuangan'];
        }

        $data = \DB::select(DB::raw("
                    SELECT
                        p.namalengkap AS namapenerima,
                        sum(cast(sbm.totaldibayar AS float)) AS totalpenerimaan,
                        '' AS keterangan
                    FROM strukbuktipenerimaan_t AS sbm
                    INNER JOIN strukpelayanan_t AS sp ON sbm.nostrukfk = sp.norec
                    LEFT JOIN pasiendaftar_t AS pd ON sp.noregistrasifk = pd.norec
                    LEFT JOIN ruangan_m as ru ON ru.id=pd.objectruanganlastfk
                    LEFT JOIN loginuser_s AS lu ON lu.id = sbm.objectpegawaipenerimafk
                    LEFT JOIN pegawai_m AS p ON p.id = lu.objectpegawaifk
                    WHERE
                        sbm.kdprofile = $kdProfile
                        AND sbm.tglsbm >= '$tglAwal' 
                        AND sbm.tglsbm <= '$tglAkhir' 
                        $idKasir
                        $idRuangan
                    GROUP BY p.namalengkap"
                ));

            $totalsaldo = 0;
            foreach ($data as $d) {
                $totalsaldo += $d->totalpenerimaan;
            }
            $terbilang = $this->terbilang($totalsaldo);

            $pdf = PDF::loadView('report.pdf.LaporanPenerimaanSemuaKasir', array(
                        'data' => $data,
                        'terbilang' => $terbilang,
                        'tglAwal' => $tglAwal,
                        'tglAkhir' => $tglAkhir)
                    );

            return $pdf->download('LaporanPenerimaanSemuaKasir.pdf');
            // return view('report.pdf.LaporanPenerimaanSemuaKasir', compact('data','terbilang','tglAwal','tglAkhir'));
    }

    public function cetakResepDokter(Request $r) {
        $kdProfile = (int)$r['kodeprofile'];
        $noorder = $r['noorder'];
        $noemr = $r['noemr'];
        $alamatpasien = $r['alamatpasien'];
        $norec = $r['norec'];
        $nocm = $r['nocm'];
        $qtybagi = 1;
        if ($r['qtybagi'] == "1/2"){
            $qtybagi = 0.5;
        }else{
            $qtybagi = (int)$r['qtybagi'];
        }
        $profile = \DB::select(DB::raw("
                select * from profile_m where id = $kdProfile limit 1
            "));
        $raw = collect(DB::select("
            select pm2.nocm ,to_char(pm2.tgllahir,'dd-mm-yyyy') as tgllahir,age(pm2.tgllahir) as umur ,jm.jeniskelamin ,pm2.namapasien ,pm3.namalengkap, rm.namaruangan,alm.alamatlengkap, 
            to_char(st.tglorder,'dd-mm-yyyy MM:ss') as tglorder,pm3.nosip, kp.kelompokpasien from strukorder_t st
            inner join pasien_m pm2 on pm2.id = st.nocmfk
            left join alamat_m as alm ON alm.nocmfk = pm2.id
            inner join jeniskelamin_m jm on jm.id = pm2.objectjeniskelaminfk
            inner join pegawai_m pm3 on pm3.id = st.objectpegawaiorderfk
            inner join ruangan_m rm on rm.id = st.objectruanganfk 
            inner join pasiendaftar_t AS pd ON pd.norec = st.noregistrasifk
            left join kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk
            where st.noorder = '$noorder'
        "))->first();
        // return $raw->alamatlengkap;
        $detailpasien = \DB::table('emrpasiend_t as emrdp')
        ->where('emrdp.statusenabled', true)
            ->where('emrdp.kdprofile', $kdProfile)
            ->where('emrdp.emrpasienfk', 'MR2303/00003828')->get();
        $tinggibadan = $r['tinggibadan'];
        $beratbadan = $r['beratbadan'];
        $apoteker = 101232;

        $detel = [];
        $details = DB::select(DB::raw("
        SELECT distinct ps.nocm, pr.kekuatan, ps.namapasien,to_char(ps.tgllahir, 'DD/MM/YYYY') as tgllahir,CASE WHEN aa.noantri IS NULL THEN sr.noresep ELSE aa.jenis || '-' || aa.noantri END AS noresep,to_char(sr.tglresep, 'DD-MM-YYYY') as tglresep,pr.namaproduk || ' (' || CAST(pp.jumlah AS VARCHAR) || ')' AS namaproduk,pp.aturanpakai,pp.rke,  
        CASE WHEN alm.alamatlengkap is null then '-' else alm.alamatlengkap end as alamat,ps.notelepon,ss.satuanstandar,pp.jumlah*$qtybagi as jumlah,  
        CASE WHEN pp.issiang = 't' THEN 'Siang' ELSE '-' END AS siang, CASE WHEN pp.ispagi = 't' THEN 'Pagi' ELSE '-' END AS pagi,  
        CASE WHEN pp.ismalam = 't' THEN 'Malam' ELSE '-' END as malam, CASE WHEN pp.issore = 't' THEN 'Sore' ELSE '-' END as sore,  
        CASE WHEN pp.keteranganpakai  = '' OR pp.keteranganpakai IS NULL THEN '-' else pp.keteranganpakai END AS keteranganpakai,
        ru.namaruangan,dep.namadepartemen,pg.namalengkap as apoteker
        from pelayananpasien_t as pp inner join strukresep_t as sr on sr.norec= pp.strukresepfk  
        LEFT join produk_m as pr on pr.id = pp.produkfk  
        LEFT join antrianpasiendiperiksa_t as apd on apd.norec = pp.noregistrasifk  
        left JOIN pegawai_m AS pg ON pg.id = $apoteker
        LEFT join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk  
        LEFT join pasien_m as ps on ps.id = pd.nocmfk  
        left join alamat_m as alm on alm.nocmfk = ps.id  
        LEFT JOIN satuanstandar_m as ss on ss.id = pp.satuanviewfk  
        LEFT JOIN antrianapotik_t as aa on aa.noresep = sr.noresep  
        LEFT JOIN ruangan_m as ru on ru.id = apd.objectruanganfk 
        LEFT JOIN departemen_m as dep on dep.id = ru.objectdepartemenfk 
        where pp.kdprofile = $kdProfile 
        -- and pp.jeniskemasanfk = 2 
        and sr.norec ='$norec'        

        -- union all 
        
                                    -- select distinct ps.nocm,ps.namapasien,to_char(ps.tgllahir, 'DD/MM/YYYY') as tgllahir,CASE WHEN aa.noantri IS NULL THEN sr.noresep ELSE aa.jenis || '-' || aa.noantri END AS noresep,to_char(sr.tglresep, 'DD-MM-YYYY') as tglresep,  
                                    -- ' Racikan' || ' (' || CAST(((CAST(pp.qtydetailresep as INTEGER)/CAST(pp.dosis as INTEGER))*CAST(pro.kekuatan as INTEGER)) AS VARCHAR) || ')' AS namaproduk,pp.aturanpakai,pp.rke,  
                                    -- case when alm.alamatlengkap is null then '-' else alm.alamatlengkap end as alamat,ps.notelepon,CASE when jr.jenisracikan IS NULL THEN '' ELSE jr.jenisracikan END AS satuanstandar,  
                                    -- ((CAST(pp.qtydetailresep as INTEGER)/CAST(pp.dosis as INTEGER))*CAST(pro.kekuatan as INTEGER)) as jumlah,  
                                    -- CASE WHEN pp.issiang = 't' THEN 'Siang' ELSE '-' END AS siang, CASE WHEN pp.ispagi = 't' THEN 'Pagi' ELSE '-' END AS pagi,  
                                    -- CASE WHEN pp.ismalam = 't' THEN 'Malam' ELSE '-' END as malam, CASE WHEN pp.issore = 't' THEN 'Sore' ELSE '-' END as sore,  
                                    -- CASE WHEN pp.keteranganpakai  = '' OR pp.keteranganpakai IS NULL THEN '-' else pp.keteranganpakai END AS keteranganpakai,
                                    -- ru.namaruangan,dep.namadepartemen,pg.namalengkap as namadokter
                                    -- from strukresep_t as sr   
                                    -- LEFT join pelayananpasien_t as pp on sr.norec= pp.strukresepfk 
                                    -- LEFT join antrianpasiendiperiksa_t as apd on apd.norec = sr.pasienfk  
                                    -- left JOIN pegawai_m AS pg ON pg.id = apd.objectpegawaifk 
                                    -- LEFT join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk  
                                    -- LEFT join pasien_m as ps on ps.id = pd.nocmfk  
                                    -- left join alamat_m as alm on alm.nocmfk = ps.id  
                                    -- LEFT JOIN produk_m as pro on pro.id = pp.produkfk  
                                    -- LEFT JOIN satuanstandar_m as ss on ss.id = pp.satuanviewfk  
                                    -- LEFT JOIN jenisracikan_m as jr on jr.id = pp.jenisobatfk  
                                    -- LEFT JOIN antrianapotik_t as aa on aa.noresep = sr.noresep
                                    -- LEFT JOIN ruangan_m as ru on ru.id = apd.objectruanganfk
                                    -- LEFT JOIN departemen_m as dep on dep.id = ru.objectdepartemenfk 
                                    -- where pp.kdprofile = $kdProfile and pp.jeniskemasanfk = 1 and sr.norec ='$norec' "
    ));
    if(empty($details)) {
        echo '
            <script language="javascript">
                window.alert("Order belum diverifikasi");
                window.close()
            </script>
        ';
        die;
    }
        if(!empty($raw)){
            // $raw->umur = $this->getAge($raw->tgllahir ,date('Y-m-d'));
        }else if (empty($raw)){
            $raw = collect(DB::select("
                select pm2.nocm ,to_char(pm2.tgllahir,'dd-mm-yyyy') as tgllahir,age(pm2.tgllahir) as umur ,jm.jeniskelamin ,pm2.namapasien,alm.alamatlengkap, pm3.namalengkap, rm.namaruangan, to_char(s.tglresep ,'dd-mm-yyyy MM:ss') as tglorder,pm3.nosip, kp.kelompokpasien
                from strukresep_t s
                inner join antrianpasiendiperiksa_t at2 on at2.norec = s.pasienfk 
                inner join pasiendaftar_t pt on pt.norec = at2.noregistrasifk 
                inner join pasien_m pm2 on pm2.id = pt.nocmfk
                left join alamat_m as alm ON alm.nocmfk = pm2.id
                inner join jeniskelamin_m jm on jm.id = pm2.objectjeniskelaminfk
                inner join pegawai_m pm3 on pm3.id = s.penulisresepfk 
                inner join ruangan_m rm on rm.id = s.ruanganfk 
                left join kelompokpasien_m AS kp ON kp.id = pt.objectkelompokpasienlastfk
                where s.norec = '$norec'
            "))->first();

            // $details = \DB::select(DB::raw("
            //         select pt.rke,pt.dosis, pt.jumlah , pt.aturanpakai , pm.namaproduk, pm.kekuatan from pelayananpasien_t pt 
            //         inner join produk_m pm on pm.id = pt.produkfk 
            //         where strukresepfk = '$norec'
            //     "));
        }else{
            echo 'Data Tidak ada ';
            return;
        }
        
        $isi = collect(DB::select("
        SELECT rd.riwayatalergi,rd.jampengkajian,rd.jampenyiapanobat,rd.jamdispening,rd.jamserah,
            pg1.namalengkap as petugaspengkajian,
            pg2.namalengkap as penyiapanobat,
            pg3.namalengkap as dispening,
            pg4.namalengkap as serahinformasi,
            rd.penulisanresep,
            rd.obat,
            rd.dosis,
            rd.waktufrekuensi,
            rd.rute,
            rd.pasien,
            rd.duplikasiterapi,
            rd.interaksiobat,
            pg5.namalengkap as farmasi
        FROM
            resepdokter_t as rd
            LEFT JOIN pegawai_m as pg1 on pg1.id = rd.petugaspengkajian
            LEFT JOIN pegawai_m as pg2 on pg2.id = rd.penyiapanobat
            LEFT JOIN pegawai_m as pg3 on pg3.id = rd.dispening
            LEFT JOIN pegawai_m as pg4 on pg4.id = rd.serahinformasi
            LEFT JOIN pegawai_m as pg5 on pg5.id = rd.farmasi
        WHERE nopesanan = '$noorder'
        "))->first();
        $pageWidth = 550;

        if(empty($isi)) {
            echo '
                <script language="javascript">
                    window.alert("Informasi order belum diisi");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.apotik.resepdokter',
            compact('raw', 'pageWidth','r','details','profile', 'alamatpasien', 'tinggibadan', 'beratbadan', 'isi'));
    }

    public function cetakResepDokterDom(Request $r) {
        $cekdata = \DB::table('strukorder_t as so')->JOIN('pasiendaftar_t as pd', 'pd.norec', '=', 'so.noregistrasifk')
        ->where('so.noorder', $r['noorder'])->first();
        $idProfile = (int) $r->kodeprofile;
        $apoteker = 101232;
        $profile = \DB::select(DB::raw("
                select * from profile_m where id = 39 limit 1
            "));
        $data = \DB::table('strukorder_t as so')
            ->JOIN('pasien_m as ps', 'ps.id', '=', 'so.nocmfk')
            ->JOIN('jeniskelamin_m as jk', 'jk.id', '=', 'ps.objectjeniskelaminfk')
            ->JOIN('ruangan_m as ru', 'ru.id', '=', 'so.objectruanganfk')
            ->JOIN('ruangan_m as ru2', 'ru2.id', '=', 'so.objectruangantujuanfk')
            ->leftJOIN('pegawai_m as pg', 'pg.id', '=', 'so.objectpegawaiorderfk')
            ->JOIN('pasiendaftar_t as pd', 'pd.norec', '=', 'so.noregistrasifk')
            ->JOIN('kelas_m as kl', 'kl.id', '=', 'pd.objectkelasfk')
            ->leftJOIN('alamat_m as alm', 'alm.nocmfk', '=', 'ps.id')
            ->leftJOIN('antrianpasiendiperiksa_t as apd', function ($join) {
                $join->on('apd.noregistrasifk', '=', 'pd.norec')
                    ->on('apd.objectruanganfk', '=', 'so.objectruanganfk');
            })
            ->leftJOIN('kelompokpasien_m as kp', 'kp.id', '=', 'pd.objectkelompokpasienlastfk')
            ->select('so.noorder', 'ps.nocm', 'ps.namapasien', 'jk.jeniskelamin', 'ru.namaruangan as namaruanganrawat',
                'so.tglorder', 'pg.namalengkap', 'ru2.namaruangan',
                'so.statusorder', 'so.namapengambilorder', 'so.noregistrasifk', 'alm.alamatlengkap',
                'pd.noregistrasi', 'kp.kelompokpasien',
                'apd.norec as norec_apd',
                'pd.tglregistrasi', 'ps.tgllahir','pg.nosip', 'kl.namakelas', 'kl.id as klid', 'so.tglambilorder', 'so.norec as norec_order','so.isreseppulang','so.isambilobat','so.iskurir')
            ->where('so.kdprofile', 39)
            ->where('pd.noregistrasi', $cekdata->noregistrasi);
        $data = $data->where('so.keteranganorder', 'ilike', '%' . 'Order Farmasi' . '%');
        $data = $data->where('so.objectkelompoktransaksifk', 4);
        $data = $data->where('so.statusenabled', true);
        $data = $data->get();
        $status = '';

        $resulttt = [];
        foreach ($data as $item) {
            $details = DB::select(DB::raw("
                    SELECT so.noorder,op.rke, jk.jeniskemasan, pr.namaproduk, ss.satuanstandar, op.aturanpakai, op.jumlah, op.hargasatuan,op.keteranganpakai as keterangan,
                           op.satuanresepfk,sn.satuanresep,op.tglkadaluarsa
                    from strukorder_t as so 
                    left join orderpelayanan_t as op on op.strukorderfk = so.norec
                    left join produk_m as pr on pr.id=op.objectprodukfk
                    left join jeniskemasan_m as jk on jk.id=op.jeniskemasanfk
                    left join satuanstandar_m as ss on ss.id=op.objectsatuanstandarfk
                    left join satuanresep_m as sn on sn.id=op.satuanresepfk
                    where so.kdprofile = 39 and so.statusenabled = true and noorder=:noorder and so.statusorder is not null and so.statusorder != 1"),
                array(
                    'noorder' => $item->noorder,
                )
            );
            $isi = collect(DB::select("
                SELECT rd.riwayatalergi,rd.jampengkajian,rd.jampenyiapanobat,rd.jamdispening,rd.jamserah,
                    pg1.namalengkap as petugaspengkajian,
                    pg2.namalengkap as penyiapanobat,
                    pg3.namalengkap as dispening,
                    pg4.namalengkap as serahinformasi,
                    rd.penulisanresep,
                    rd.obat,
                    rd.dosis,
                    rd.waktufrekuensi,
                    rd.rute,
                    rd.pasien,
                    rd.duplikasiterapi,
                    rd.interaksiobat,
                    pg5.namalengkap as farmasi
                FROM
                    resepdokter_t as rd
                    LEFT JOIN pegawai_m as pg1 on pg1.id = rd.petugaspengkajian
                    LEFT JOIN pegawai_m as pg2 on pg2.id = rd.penyiapanobat
                    LEFT JOIN pegawai_m as pg3 on pg3.id = rd.dispening
                    LEFT JOIN pegawai_m as pg4 on pg4.id = rd.serahinformasi
                    LEFT JOIN pegawai_m as pg5 on pg5.id = rd.farmasi
                WHERE nopesanan = '$item->noorder'
                "))->first();
            
            $resulttt[] = array(
                'noregistrasi' => $item->noregistrasi,
                'alamatlengkap' => $item->alamatlengkap,
                'noorder' => $item->noorder,
                'nocm' => $item->nocm,
                'namapasien' => $item->namapasien,
                'jeniskelamin' => $item->jeniskelamin,
                'tglorder' => $item->tglorder,
                'nosip' => $item->nosip,
                'namalengkap' => $item->namalengkap,
                'kelompokpasien' => $item->kelompokpasien,
                'namaruangan' => $item->namaruangan,
                'tgllahir' => $item->tgllahir,
                'details' => $details,
                'isi' => $isi
            );
        }
        $resulttt = array_filter($resulttt, function($value) {
            return $value['details'] != null;
        });

        $resulttt = array_filter($resulttt, function($value) {
            return $value['isi'] != null;
        });

        $rinci = [];

        $raw = collect(DB::select("
            select pm2.nocm, st.noorder,pd.noregistrasi,to_char(pm2.tgllahir,'dd-mm-yyyy') as tgllahir,age(pm2.tgllahir) as umur ,jm.jeniskelamin ,pm2.namapasien ,pm3.namalengkap, rm.namaruangan,alm.alamatlengkap, 
            to_char(st.tglorder,'dd-mm-yyyy MM:ss') as tglorder,pm3.nosip, kp.kelompokpasien from strukorder_t st
            inner join pasien_m pm2 on pm2.id = st.nocmfk
            left join alamat_m as alm ON alm.nocmfk = pm2.id
            inner join jeniskelamin_m jm on jm.id = pm2.objectjeniskelaminfk
            inner join pegawai_m pm3 on pm3.id = st.objectpegawaiorderfk
            inner join ruangan_m rm on rm.id = st.objectruanganfk 
            inner join pasiendaftar_t AS pd ON pd.norec = st.noregistrasifk
            left join kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk
            where pd.noregistrasi = '$cekdata->noregistrasi'
            and st.statusenabled = true
            and st.kdprofile = 39
        "));

        if($raw->isempty()){
            $raw = \DB::table('strukresep_t as s')
            ->JOIN('antrianpasiendiperiksa_t as at2', 'at2.norec', '=', 's.pasienfk')
            ->JOIN('pasiendaftar_t as pt', 'pt.norec', '=', 'at2.noregistrasifk')
            ->JOIN('pasien_m as pm2', 'pm2.id', '=', 'pt.nocmfk')
            ->leftJOIN('alamat_m as alm', 'alm.nocmfk', '=', 'pm2.id')
            ->JOIN('jeniskelamin_m as jm', 'jm.id', '=', 'pm2.objectjeniskelaminfk')
            ->JOIN('pegawai_m as pm3', 'pm3.id', '=', 's.penulisresepfk')
            ->JOIN('ruangan_m as rm', 'rm.id', '=', 's.ruanganfk')
            ->leftJOIN('kelompokpasien_m as kp', 'kp.id', '=', 'pt.objectkelompokpasienlastfk')
            ->select('pm2.nocm','pt.noregistrasi','s.noresep as noorder','pm2.tgllahir as tgllahir', 'pm2.tgllahir as umur' ,'jm.jeniskelamin' ,'pm2.namapasien','alm.alamatlengkap', 'pm3.namalengkap', 'rm.namaruangan', 's.tglresep as tglorder','pm3.nosip', 'kp.kelompokpasien')
            ->where('pt.noregistrasi', $r->noregistrasi)->get();
        }

        foreach ($raw as $jj) {
            $dt = DB::select(DB::raw("
                SELECT distinct ps.nocm, pr.kekuatan, ps.namapasien,to_char(ps.tgllahir, 'DD/MM/YYYY') as tgllahir,CASE WHEN aa.noantri IS NULL THEN sr.noresep ELSE aa.jenis || '-' || aa.noantri END AS noresep,to_char(sr.tglresep, 'DD-MM-YYYY') as tglresep,pr.namaproduk || ' (' || CAST(pp.jumlah AS VARCHAR) || ')' AS namaproduk,pp.aturanpakai,pp.rke,  
                CASE WHEN alm.alamatlengkap is null then '-' else alm.alamatlengkap end as alamat,ps.notelepon,ss.satuanstandar,pp.jumlah*1 as jumlah,  
                CASE WHEN pp.issiang = 't' THEN 'Siang' ELSE '-' END AS siang, CASE WHEN pp.ispagi = 't' THEN 'Pagi' ELSE '-' END AS pagi,  
                CASE WHEN pp.ismalam = 't' THEN 'Malam' ELSE '-' END as malam, CASE WHEN pp.issore = 't' THEN 'Sore' ELSE '-' END as sore,  
                CASE WHEN pp.keteranganpakai  = '' OR pp.keteranganpakai IS NULL THEN '-' else pp.keteranganpakai END AS keteranganpakai,
                ru.namaruangan,dep.namadepartemen,pg.namalengkap as apoteker
                from pelayananpasien_t as pp inner join strukresep_t as sr on sr.norec= pp.strukresepfk  
                LEFT join produk_m as pr on pr.id = pp.produkfk  
                LEFT join antrianpasiendiperiksa_t as apd on apd.norec = pp.noregistrasifk  
                LEFT join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk  
                left JOIN pegawai_m AS pg ON pg.id = $apoteker
                LEFT join pasien_m as ps on ps.id = pd.nocmfk  
                left join alamat_m as alm on alm.nocmfk = ps.id  
                LEFT JOIN satuanstandar_m as ss on ss.id = pp.satuanviewfk  
                LEFT JOIN antrianapotik_t as aa on aa.noresep = sr.noresep  
                LEFT JOIN ruangan_m as ru on ru.id = apd.objectruanganfk 
                LEFT JOIN departemen_m as dep on dep.id = ru.objectdepartemenfk 
                where pp.kdprofile = 39 
                and pd.noregistrasi = '$cekdata->noregistrasi'"
            ));

            $isi = collect(DB::select("
                SELECT rd.riwayatalergi,rd.jampengkajian,rd.jampenyiapanobat,rd.jamdispening,rd.jamserah,
                    pg1.namalengkap as petugaspengkajian,
                    pg2.namalengkap as penyiapanobat,
                    pg3.namalengkap as dispening,
                    pg4.namalengkap as serahinformasi,
                    rd.penulisanresep,
                    rd.obat,
                    rd.dosis,
                    rd.waktufrekuensi,
                    rd.rute,
                    rd.pasien,
                    rd.duplikasiterapi,
                    rd.interaksiobat,
                    pg5.namalengkap as farmasi
                FROM
                    resepdokter_t as rd
                    LEFT JOIN pegawai_m as pg1 on pg1.id = rd.petugaspengkajian
                    LEFT JOIN pegawai_m as pg2 on pg2.id = rd.penyiapanobat
                    LEFT JOIN pegawai_m as pg3 on pg3.id = rd.dispening
                    LEFT JOIN pegawai_m as pg4 on pg4.id = rd.serahinformasi
                    LEFT JOIN pegawai_m as pg5 on pg5.id = rd.farmasi
                    WHERE nopesanan = '$jj->noorder'
                "))->first();
            
            $rinci[] = array(
                'noregistrasi' => $jj->noregistrasi,
                'alamatlengkap' => $jj->alamatlengkap,
                'noorder' => $jj->noorder,
                'nocm' => $jj->nocm,
                'namapasien' => $jj->namapasien,
                'jeniskelamin' => $jj->jeniskelamin,
                'tglorder' => $jj->tglorder,
                'nosip' => $jj->nosip,
                'namalengkap' => $jj->namalengkap,
                'kelompokpasien' => $jj->kelompokpasien,
                'namaruangan' => $jj->namaruangan,
                'tgllahir' => $jj->tgllahir,
                'details' => $dt,
                'isi' => $isi
            );
        }
        $rinci = array_filter($rinci, function($value) {
            return $value['details'] != null;
        });

        $rinci = array_filter($rinci, function($value) {
            return $value['isi'] != null;
        });

        $data = [
            'dokter' => $resulttt,
            'depo' => $rinci
        ];

        if(empty($data['dokter']) and empty($data['depo'])) {
            echo '
                <script language="javascript">
                    window.alert("Data tidak ditemukan, silahkan mengisi informasi resep pasien terlebih dahulu");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($r["issimpanberkas"])) {
            $pdf = PDF::loadView('report.apotik.resepdokterall-dom', array(
                'data' => $data,
                'profile' => $profile,
                'image' => $image,
                'centang' => $centang,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $r);
            return;
        }else{
            return view('report.apotik.resepdokterall',compact('data','profile'));
        }

        
    }

    public function cetakResepDokterAll(Request $r) {
        $idProfile = (int) $r->kodeprofile;
        $apoteker = 101232;
        $profile = \DB::select(DB::raw("
                select * from profile_m where id = $idProfile limit 1
            "));
        $data = \DB::table('strukorder_t as so')
            ->JOIN('pasien_m as ps', 'ps.id', '=', 'so.nocmfk')
            ->JOIN('jeniskelamin_m as jk', 'jk.id', '=', 'ps.objectjeniskelaminfk')
            ->JOIN('ruangan_m as ru', 'ru.id', '=', 'so.objectruanganfk')
            ->JOIN('ruangan_m as ru2', 'ru2.id', '=', 'so.objectruangantujuanfk')
            ->leftJOIN('pegawai_m as pg', 'pg.id', '=', 'so.objectpegawaiorderfk')
            ->JOIN('pasiendaftar_t as pd', 'pd.norec', '=', 'so.noregistrasifk')
            ->JOIN('kelas_m as kl', 'kl.id', '=', 'pd.objectkelasfk')
            ->leftJOIN('alamat_m as alm', 'alm.nocmfk', '=', 'ps.id')
            ->leftJOIN('antrianpasiendiperiksa_t as apd', function ($join) {
                $join->on('apd.noregistrasifk', '=', 'pd.norec')
                    ->on('apd.objectruanganfk', '=', 'so.objectruanganfk');
            })
            ->leftJOIN('kelompokpasien_m as kp', 'kp.id', '=', 'pd.objectkelompokpasienlastfk')
            ->select('so.noorder', 'ps.nocm', 'ps.namapasien', 'jk.jeniskelamin', 'ru.namaruangan as namaruanganrawat',
                'so.tglorder', 'pg.namalengkap', 'ru2.namaruangan',
                'so.statusorder', 'so.namapengambilorder', 'so.noregistrasifk', 'alm.alamatlengkap',
                'pd.noregistrasi', 'kp.kelompokpasien',
                'apd.norec as norec_apd',
                'pd.tglregistrasi', 'ps.tgllahir','pg.nosip', 'kl.namakelas', 'kl.id as klid', 'so.tglambilorder', 'so.norec as norec_order','so.isreseppulang','so.isambilobat','so.iskurir')
            ->where('so.kdprofile', $idProfile)
            ->where('pd.noregistrasi', $r->noregistrasi);
        $data = $data->where('so.keteranganorder', 'ilike', '%' . 'Order Farmasi' . '%');
        $data = $data->where('so.objectkelompoktransaksifk', 4);
        $data = $data->where('so.statusenabled', true);
        $data = $data->get();
        $status = '';

        $resulttt = [];
        foreach ($data as $item) {
            $details = DB::select(DB::raw("
                    SELECT so.noorder,op.rke, jk.jeniskemasan, pr.namaproduk, ss.satuanstandar, op.aturanpakai, op.jumlah, op.hargasatuan,op.keteranganpakai as keterangan,
                           op.satuanresepfk,sn.satuanresep,op.tglkadaluarsa
                    from strukorder_t as so 
                    left join orderpelayanan_t as op on op.strukorderfk = so.norec
                    left join produk_m as pr on pr.id=op.objectprodukfk
                    left join jeniskemasan_m as jk on jk.id=op.jeniskemasanfk
                    left join satuanstandar_m as ss on ss.id=op.objectsatuanstandarfk
                    left join satuanresep_m as sn on sn.id=op.satuanresepfk
                    where so.kdprofile = $idProfile and so.statusenabled = true and noorder=:noorder and so.statusorder is not null and so.statusorder != 1"),
                array(
                    'noorder' => $item->noorder,
                )
            );
            $isi = collect(DB::select("
                SELECT rd.riwayatalergi,rd.jampengkajian,rd.jampenyiapanobat,rd.jamdispening,rd.jamserah,
                    pg1.namalengkap as petugaspengkajian,
                    pg2.namalengkap as penyiapanobat,
                    pg3.namalengkap as dispening,
                    pg4.namalengkap as serahinformasi,
                    rd.penulisanresep,
                    rd.obat,
                    rd.dosis,
                    rd.waktufrekuensi,
                    rd.rute,
                    rd.pasien,
                    rd.duplikasiterapi,
                    rd.interaksiobat,
                    pg5.namalengkap as farmasi
                FROM
                    resepdokter_t as rd
                    LEFT JOIN pegawai_m as pg1 on pg1.id = rd.petugaspengkajian
                    LEFT JOIN pegawai_m as pg2 on pg2.id = rd.penyiapanobat
                    LEFT JOIN pegawai_m as pg3 on pg3.id = rd.dispening
                    LEFT JOIN pegawai_m as pg4 on pg4.id = rd.serahinformasi
                    LEFT JOIN pegawai_m as pg5 on pg5.id = rd.farmasi
                WHERE nopesanan = '$item->noorder'
                "))->first();
            
            $resulttt[] = array(
                'noregistrasi' => $item->noregistrasi,
                'alamatlengkap' => $item->alamatlengkap,
                'noorder' => $item->noorder,
                'nocm' => $item->nocm,
                'namapasien' => $item->namapasien,
                'jeniskelamin' => $item->jeniskelamin,
                'tglorder' => $item->tglorder,
                'nosip' => $item->nosip,
                'namalengkap' => $item->namalengkap,
                'kelompokpasien' => $item->kelompokpasien,
                'namaruangan' => $item->namaruangan,
                'tgllahir' => $item->tgllahir,
                'details' => $details,
                'isi' => $isi
            );
        }
        $resulttt = array_filter($resulttt, function($value) {
            return $value['details'] != null;
        });

        $resulttt = array_filter($resulttt, function($value) {
            return $value['isi'] != null;
        });

        $rinci = [];

        $raw = collect(DB::select("
            select pm2.nocm, st.noorder,pd.noregistrasi,to_char(pm2.tgllahir,'dd-mm-yyyy') as tgllahir,age(pm2.tgllahir) as umur ,jm.jeniskelamin ,pm2.namapasien ,pm3.namalengkap, rm.namaruangan,alm.alamatlengkap, 
            to_char(st.tglorder,'dd-mm-yyyy MM:ss') as tglorder,pm3.nosip, kp.kelompokpasien from strukorder_t st
            inner join pasien_m pm2 on pm2.id = st.nocmfk
            left join alamat_m as alm ON alm.nocmfk = pm2.id
            inner join jeniskelamin_m jm on jm.id = pm2.objectjeniskelaminfk
            inner join pegawai_m pm3 on pm3.id = st.objectpegawaiorderfk
            inner join ruangan_m rm on rm.id = st.objectruanganfk 
            inner join pasiendaftar_t AS pd ON pd.norec = st.noregistrasifk
            left join kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk
            where pd.noregistrasi = '$r->noregistrasi'
            and st.statusenabled = true
            and st.kdprofile = 39
        "));

        if($raw->isempty()){
            $raw = \DB::table('strukresep_t as s')
            ->JOIN('antrianpasiendiperiksa_t as at2', 'at2.norec', '=', 's.pasienfk')
            ->JOIN('pasiendaftar_t as pt', 'pt.norec', '=', 'at2.noregistrasifk')
            ->JOIN('pasien_m as pm2', 'pm2.id', '=', 'pt.nocmfk')
            ->leftJOIN('alamat_m as alm', 'alm.nocmfk', '=', 'pm2.id')
            ->JOIN('jeniskelamin_m as jm', 'jm.id', '=', 'pm2.objectjeniskelaminfk')
            ->JOIN('pegawai_m as pm3', 'pm3.id', '=', 's.penulisresepfk')
            ->JOIN('ruangan_m as rm', 'rm.id', '=', 's.ruanganfk')
            ->leftJOIN('kelompokpasien_m as kp', 'kp.id', '=', 'pt.objectkelompokpasienlastfk')
            ->select('pm2.nocm','pt.noregistrasi','s.noresep as noorder','pm2.tgllahir as tgllahir', 'pm2.tgllahir as umur' ,'jm.jeniskelamin' ,'pm2.namapasien','alm.alamatlengkap', 'pm3.namalengkap', 'rm.namaruangan', 's.tglresep as tglorder','pm3.nosip', 'kp.kelompokpasien')
            ->where('pt.noregistrasi', $r->noregistrasi)->get();
        }

        foreach ($raw as $jj) {
            $dt = DB::select(DB::raw("
                SELECT distinct ps.nocm, pr.kekuatan, ps.namapasien,to_char(ps.tgllahir, 'DD/MM/YYYY') as tgllahir,CASE WHEN aa.noantri IS NULL THEN sr.noresep ELSE aa.jenis || '-' || aa.noantri END AS noresep,to_char(sr.tglresep, 'DD-MM-YYYY') as tglresep,pr.namaproduk || ' (' || CAST(pp.jumlah AS VARCHAR) || ')' AS namaproduk,pp.aturanpakai,pp.rke,  
                CASE WHEN alm.alamatlengkap is null then '-' else alm.alamatlengkap end as alamat,ps.notelepon,ss.satuanstandar,pp.jumlah*1 as jumlah,  
                CASE WHEN pp.issiang = 't' THEN 'Siang' ELSE '-' END AS siang, CASE WHEN pp.ispagi = 't' THEN 'Pagi' ELSE '-' END AS pagi,  
                CASE WHEN pp.ismalam = 't' THEN 'Malam' ELSE '-' END as malam, CASE WHEN pp.issore = 't' THEN 'Sore' ELSE '-' END as sore,  
                CASE WHEN pp.keteranganpakai  = '' OR pp.keteranganpakai IS NULL THEN '-' else pp.keteranganpakai END AS keteranganpakai,
                ru.namaruangan,dep.namadepartemen,pg.namalengkap as apoteker
                from pelayananpasien_t as pp inner join strukresep_t as sr on sr.norec= pp.strukresepfk  
                LEFT join produk_m as pr on pr.id = pp.produkfk  
                LEFT join antrianpasiendiperiksa_t as apd on apd.norec = pp.noregistrasifk  
                LEFT join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk  
                left JOIN pegawai_m AS pg ON pg.id = $apoteker
                LEFT join pasien_m as ps on ps.id = pd.nocmfk  
                left join alamat_m as alm on alm.nocmfk = ps.id  
                LEFT JOIN satuanstandar_m as ss on ss.id = pp.satuanviewfk  
                LEFT JOIN antrianapotik_t as aa on aa.noresep = sr.noresep  
                LEFT JOIN ruangan_m as ru on ru.id = apd.objectruanganfk 
                LEFT JOIN departemen_m as dep on dep.id = ru.objectdepartemenfk 
                where pp.kdprofile = $idProfile 
                and pd.noregistrasi = '$r->noregistrasi'"
            ));

            $isi = collect(DB::select("
                SELECT rd.riwayatalergi,rd.jampengkajian,rd.jampenyiapanobat,rd.jamdispening,rd.jamserah,
                    pg1.namalengkap as petugaspengkajian,
                    pg2.namalengkap as penyiapanobat,
                    pg3.namalengkap as dispening,
                    pg4.namalengkap as serahinformasi,
                    rd.penulisanresep,
                    rd.obat,
                    rd.dosis,
                    rd.waktufrekuensi,
                    rd.rute,
                    rd.pasien,
                    rd.duplikasiterapi,
                    rd.interaksiobat,
                    pg5.namalengkap as farmasi
                FROM
                    resepdokter_t as rd
                    LEFT JOIN pegawai_m as pg1 on pg1.id = rd.petugaspengkajian
                    LEFT JOIN pegawai_m as pg2 on pg2.id = rd.penyiapanobat
                    LEFT JOIN pegawai_m as pg3 on pg3.id = rd.dispening
                    LEFT JOIN pegawai_m as pg4 on pg4.id = rd.serahinformasi
                    LEFT JOIN pegawai_m as pg5 on pg5.id = rd.farmasi
                    WHERE nopesanan = '$jj->noorder'
                "))->first();
            
            $rinci[] = array(
                'noregistrasi' => $jj->noregistrasi,
                'alamatlengkap' => $jj->alamatlengkap,
                'noorder' => $jj->noorder,
                'nocm' => $jj->nocm,
                'namapasien' => $jj->namapasien,
                'jeniskelamin' => $jj->jeniskelamin,
                'tglorder' => $jj->tglorder,
                'nosip' => $jj->nosip,
                'namalengkap' => $jj->namalengkap,
                'kelompokpasien' => $jj->kelompokpasien,
                'namaruangan' => $jj->namaruangan,
                'tgllahir' => $jj->tgllahir,
                'details' => $dt,
                'isi' => $isi
            );
        }
        $rinci = array_filter($rinci, function($value) {
            return $value['details'] != null;
        });

        $rinci = array_filter($rinci, function($value) {
            return $value['isi'] != null;
        });

        $data = [
            'dokter' => $resulttt,
            'depo' => $rinci
        ];

        if(count($data['dokter']) <= 0 and count($data['depo']) <= 0) {
            echo '
                <script language="javascript">
                    window.alert("Data tidak ditemukan, silahkan mengisi informasi resep pasien terlebih dahulu");
                    window.close()
                </script>
            ';
            die;
        }
        return view('report.apotik.resepdokterall',compact('data','profile'));
    }

    public function cetakAntrianKiosk(Request $request) {
        $kdProfile = (int)$request['kdprofile'];
        $norec = $request['norec'];
        $TglAwal =  date('Y-m-d '). '00:00';
        $TglAkhir = date('Y-m-d '). '23:59';
        $tglAyeuna = date('Y-m-d H:i:s');
        $profile = collect(DB::select
            ("
                select * from profile_m where id = $kdProfile limit 1
            "))->first();

        $antrian = DB::table('antrianpasienregistrasi_t AS apr')
                    ->leftJoin('ruangan_m AS ru','ru.id','=','apr.objectruanganfk')
                    ->select(DB::raw("apr.*,CASE WHEN ru.namaruangan IS NULL 
                                        THEN '' ELSE ru.namaruangan END AS namaruangan"))
                    ->where('apr.norec','=',$norec)
                    ->first();

        $str = $antrian->jenis;
        $jmlAntrian = DB::table('antrianpasienregistrasi_t')
            ->select(DB::raw("count(noantrian) as jmlantri"))
            ->where('statuspanggil','=',0)
            ->whereBetween('tanggalreservasi',[$TglAwal, $TglAkhir])
            ->where('jenis','=',$str)
            ->first();

        $noAntrian = $antrian->noantrian;
        $strJenis = $antrian->jenis;
        $jenis = "";
        if ($strJenis == "A"){
            $jenis = "UMUM";
        }elseif ($strJenis == "B"){
            $jenis = "BPJS";
        }
        if (strlen($antrian->noantrian) == 1){
            $noAntrian = "00" . $antrian->noantrian;
        }else{
            $noAntrian = "0" . $antrian->noantrian;
        }
        $pageWidth = 250;
        $dataReport = array(
            'namaprofile' => $profile->namalengkap,
            'alamat' => $profile->alamatlengkap,
            'jenis' => $jenis,
            'noantrian' => $strJenis . "-" . $noAntrian,
            'jmlantrian' => $jmlAntrian->jmlantri,
            'pageWidth'  => 365,
            'tanggal'  => $tglAyeuna,
        );

//        $pdf = PDF::loadView('report.pendaftaran.antrian', array(
//                'dataReport' => $dataReport,
//        ));
//        return $pdf->stream();

        return view('report.pendaftaran.antrian',
            compact('dataReport', 'pageWidth','profile'));
//        return view('','$result');
    }

    public function cetakBuktiPendaftaran(Request $request) {
        $kdProfile = (int)$request['kdprofile'];
        $profile = collect(DB::select
        ("
                select * from profile_m where id = 39 limit 1
            "))->first();

        $registrasi = DB::table('pasiendaftar_t AS pd')
            ->Join('antrianpasiendiperiksa_t as apdp','apdp.noregistrasifk','=','pd.norec')
            ->Join('pasien_m as ps','pd.nocmfk','=','ps.id')
            ->leftJoin('alamat_m as ap','ap.nocmfk','=','ps.id')
            ->leftJoin('jeniskelamin_m as jk','ps.objectjeniskelaminfk','=','jk.id')
            ->leftJoin('ruangan_m as ru','pd.objectruanganlastfk','=','ru.id')
            ->leftJoin('pegawai_m as pp','pd.objectpegawaifk','=','pp.id')
            ->leftJoin('kelompokpasien_m as kp','pd.objectkelompokpasienlastfk','=','kp.id')
            ->leftJoin('antrianpasienregistrasi_t as apr','apr.noreservasi','=','pd.statusschedule')
            ->select(DB::raw("pd.noregistrasi,ps.nocm,ps.tgllahir,ps.namapasien,to_char(pd.tglregistrasi, 'DD-MM-YYYY HH:mm') AS tglregistrasi,jk.reportdisplay AS jk, 
                     ap.alamatlengkap,ap.mobilephone2,ru.namaruangan AS ruanganperiksa,pp.namalengkap AS namadokter, 
                     kp.kelompokpasien,apr.noantrian,ru.prefixnoantrian,pd.statuspasien,apr.noreservasi,CASE WHEN apr.tanggalreservasi IS NULL THEN '' 
                     ELSE to_char(apr.tanggalreservasi, 'DD-MM-YYYY HH:mm') END AS tanggalreservasi"))
            ->where('pd.noregistrasi', $request['noregistrasi'])
            ->first();

            $huruf = 'Z';
            if ($registrasi->prefixnoantrian != null) {
                $huruf = $registrasi->prefixnoantrian;
            }
            $nomorAntrian = $huruf . '-' . str_pad($registrasi->noantrian, 4, "0", STR_PAD_LEFT);
            $registrasi->noantrian = $nomorAntrian;

        $statusonline = "";
        $status = "";
        if ($registrasi->tanggalreservasi != ''){
            $statusonline = "PASIEN ONLINE";
            $status = "Kartu ini adalah bukti anda mendaftar hari ini";
        }else{
            $statusonline = "Kartu ini adalah bukti anda mendaftar hari ini";
        }
        $pageWidth = 365;
        $dataReport = array(
            'namaprofile' => $profile->namalengkap,
            'alamat' => $profile->alamatlengkap,
            'tglregistrasi' => $registrasi->tglregistrasi,
            'noregistrasi' => $registrasi->noregistrasi,
            'norm' => $registrasi->nocm,
            'tgllahir' => $registrasi->tgllahir,
            'namapasien' => $registrasi->namapasien,
            'jeniskelamin' => $registrasi->jk,
            'alamatlengkap' => $registrasi->alamatlengkap,
            'mobilephone2' => $registrasi->mobilephone2,
            'ruangan' => $registrasi->ruanganperiksa,
            'namadokter' => $registrasi->namadokter,
            'kelompokpasien' => $registrasi->kelompokpasien,
            'noantrian' => $registrasi->noantrian,
            'statuspasien' => $registrasi->statuspasien,
            'noreservasi' => $registrasi->noreservasi,
            'tanggalreservasi' => $registrasi->tanggalreservasi,
            'statusonline' => $statusonline,
            'status' => $status,
        );

        return view('report.pendaftaran.buktipendaftaran',
            compact('dataReport', 'pageWidth','profile'));
//        return view('','$result');
    }

    public function cetakSEP(Request $request)
    {
        $kdProfile = (int)$request['kdprofile'];
        $Noregistrasi = $request['noregistrasi'];
        $tglAyeuna = date('Y-m-d H:i:s');

        $profile = collect(DB::select
        ("
                select * from profile_m where id = 39 limit 1
            "))->first();

        $registrasi = collect(DB::select("
             SELECT pa.nosep,to_char(pa.tanggalsep, 'DD-MM-YYYY HH:mm') AS tanggalsep,pa.nokepesertaan,pi.nocm,pd.noregistrasi,
                    pa.norujukan,ap.namapeserta,to_char(pi.tgllahir, 'DD-MM-YYYY') AS tgllahir,jk.jeniskelamin, 
                    rp.namaruangan,rp.kodeexternal as namapoli,pa.ppkrujukan,  
                    (CASE WHEN rp.objectdepartemenfk=16 then 'Rawat Inap' else 'Rawat Jalan' END) as jenisrawat, 
                    dg.kddiagnosa, (case when dg.namadiagnosa is null then '-' else dg.namadiagnosa end) as namadiagnosa ,  
                    ap.jenispeserta,ap.kdprovider,ap.nmprovider,kls.namakelas,pa.catatan
             FROM pemakaianasuransi_t pa  
             LEFT JOIN asuransipasien_m ap on pa.objectasuransipasienfk= ap.id  
             LEFT JOIN pasiendaftar_t pd on pd.norec=pa.noregistrasifk  
             LEFT JOIN pasien_m pi on pi.id=pd.nocmfk  
             LEFT JOIN jeniskelamin_m jk on jk.id=pi.objectjeniskelaminfk  
             LEFT JOIN ruangan_m rp on rp.id=pd.objectruanganlastfk  
             LEFT JOIN diagnosa_m dg on pa.diagnosisfk=dg.id 
             LEFT JOIN kelas_m kls on kls.id=ap.objectkelasdijaminfk  
             where pd.noregistrasi ='$Noregistrasi' 
        "))->first();
        if(empty($registrasi->nosep)){
            echo '
                <script language="javascript">
                    window.alert("No SEP belum dimasukkan!!");
                    window.close()
                </script>
            ';
            die;
        }

        $pageWidth = 719;
        $dataReport = array(
            'namaprofile' => $profile->namalengkap,
            'alamat' => $profile->alamatlengkap,
            'nosep' => $registrasi->nosep,
            'tanggalsep' => $registrasi->tanggalsep,
            'nokepesertaan' => $registrasi->nokepesertaan,
            'norm' => $registrasi->nocm,
            'noregistrasi' => $registrasi->noregistrasi,
            'jenispeserta' => $registrasi->jenispeserta,
            'namapeserta' => $registrasi->namapeserta,
            'cob' => "",
            'tgllahir' => $registrasi->tgllahir,
            'jeniskelamin' => $registrasi->jeniskelamin,
            'norujukan' => $registrasi->norujukan,
            'namaruangan' => $registrasi->namaruangan,
            'namapoli' => $registrasi->namapoli,
            'ppkrujukan' => $registrasi->ppkrujukan,
            'jenisrawat' => $registrasi->jenisrawat,
            'kddiagnosa' => $registrasi->kddiagnosa,
            'namadiagnosa' => $registrasi->namadiagnosa,
            'kdprovider' => $registrasi->kdprovider,
            'nmprovider' => $registrasi->nmprovider,
            'namakelas' => $registrasi->namakelas,
            'catatan' => $registrasi->catatan,
            'tanggal' => $tglAyeuna,
        );

        $imagePath = public_path("img/logo_bpjs.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        if(isset($request["issimpanberkas"])) {
            // PDF::setOptions(['isPhpEnabled' => true, 'isJavascriptEnabled', true, 'isRemoteEnabled', true]);
            $pdf = PDF::setOptions(['isPhpEnabled' => true, 'isJavascriptEnabled' => true, 'isRemoteEnabled' => true]);
            $pdf->loadView('report.pendaftaran.sep', array(
                'profile' => $profile,
                'pageWidth' => $pageWidth,
                'dataReport' => $dataReport,
                'image' => $image,
            
            ))->setPaper('a4', 'portrait');
            
            $this->saveDokumenKlaim($pdf, $request);
            
        }else{
            
            return view('report.pendaftaran.sep',
            compact('dataReport', 'pageWidth','profile', 'image'));
        }
        
    }

    public function cetakSEPV2(Request $request) {
        $kdProfile = (int)$request['kdprofile'];
        $noregistrasi = $request['noregistrasi'];
        $tglAyeuna = date('Y-m-d H:i:s');

        $profile = collect(DB::select("
            select * from profile_m where id = 39 limit 1
        "))->first();
        $datas = collect(DB::select("
            SELECT pd.norec AS norec_pd
            ,pa.nosep
            ,pa.tanggalsep
            ,pa.tglcreate
            ,pa.nokepesertaan || ' ( MR : ' || pi.nocm || ' )' as nokepesertaan
            ,pa.nokepesertaan as nobpjs
            ,pi.nocm
            ,pd.noregistrasi
            ,apdp.noantrian
            ,pa.norujukan
            ,ap.namapeserta
            ,ap.tgllahir
            ,jk.jeniskelamin
            ,pa.ppkrujukan
            ,rp.kdinternal AS namapolibpjs
            ,ap.jenispeserta
            ,ap.kdprovider
            ,ap.nmprovider
            ,pa.catatan
            ,kls.namakelas AS haknamakelas
	        ,ap.notelpmobile
	        ,pa.penjaminlaka
            ,pa.prolanisprb
            ,pa.namadjpjpmelayanni
            ,rp.objectdepartemenfk
            ,CASE WHEN rp.objectdepartemenfk = 18 THEN
            CASE WHEN pa.polirujukankode IS NULL THEN rp.namaruangan ELSE pa.polirujukannama END
            ELSE '-' END AS namaruangan
            ,CASE WHEN rp.objectdepartemenfk = 16 THEN 'R. Inap' ELSE'R. Jalan' END AS jenisrawat
            ,CASE WHEN pa.statuskunjungan = 1 THEN 'Konsultasi dokter (pertama)'
            WHEN pa.statuskunjungan = 2 THEN  'Kunjungan rujukan internal'
            WHEN pa.statuskunjungan = 3 THEN 'Kunjungan Kontrol (ulangan)'
            ELSE '' END AS kunjungan
            ,CASE WHEN pa.flagprocedure = '0' THEN 'Prosedur tidak berkelanjutan'
            WHEN pa.flagprocedure = '1' THEN 'Prosedur dan terapi berkelanjutan'
            END AS procedures
            ,CASE WHEN dg.kddiagnosa IS NULL THEN '-' ELSE dg.kddiagnosa END || '-' || ( CASE WHEN dg.namadiagnosa IS NULL THEN '-' ELSE dg.namadiagnosa END ) AS namadiagnosa
            ,CASE WHEN pa.cob = TRUE THEN 'Ya' ELSE '' END AS cob
            ,CASE WHEN rp.objectdepartemenfk = 16 THEN true ELSE false END AS isSPRI
            ,CASE WHEN rp.objectdepartemenfk = 16 THEN kls.namakelas ELSE '-' END AS namakelas
            ,CASE WHEN pa.penjaminlaka = '1' THEN 'Jasa Raharja PT' 
            WHEN pa.penjaminlaka = '2' THEN 'BPJS Ketenagakerjaan'
            WHEN pa.penjaminlaka = '3' THEN 'TASPEN PT'
            WHEN pa.penjaminlaka = '4' THEN 'ASABRI PT'
            ELSE '-' END AS penjaminlakalantas,
            CASE WHEN rp.objectdepartemenfk = 18 THEN pa.polirujukannama ELSE '-' END AS polirujukannama
            FROM pemakaianasuransi_t AS pa
            LEFT JOIN asuransipasien_m AS ap ON pa.objectasuransipasienfk = ap.id
            LEFT JOIN pasiendaftar_t AS pd ON pd.norec = pa.noregistrasifk
            LEFT JOIN antrianpasiendiperiksa_t AS apdp ON apdp.noregistrasifk = pd.norec
            LEFT JOIN pasien_m AS pi ON pi.id = pd.nocmfk
            LEFT JOIN jeniskelamin_m AS jk ON jk.id = pi.objectjeniskelaminfk
            LEFT JOIN ruangan_m AS rp ON rp.id = pd.objectruanganlastfk
            LEFT JOIN diagnosa_m AS dg ON pa.diagnosisfk = dg.id
            LEFT JOIN kelas_m AS kls ON kls.id = ap.objectkelasdijaminfk
            WHERE pd.noregistrasi = '". $noregistrasi ."'
            AND pa.nosep IS NOT NULL
        "))->first();
        if(empty($datas)) {
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        $suratJaminan = collect(DB::select("
            SELECT
            CASE WHEN ru.objectdepartemenfk = 18 THEN 'RAWAT JALAN'
            WHEN ru.objectdepartemenfk = 24 THEN 'GAWAT DARURAT'
            WHEN ru.objectdepartemenfk = 16 THEN 'RAWAT INAP' 
            ELSE dp.namadepartemen END AS instalasi
            ,pm.nocm
            ,pd.noregistrasi
            ,ru.namaruangan
            ,pm.namapasien
            ,pm.nobpjs || ' ( MR : ' || pm.nocm || ' )' as nobpjs
            ,pg.namalengkap AS dokter
            ,to_char(pd.tglregistrasi, 'DD/MM/YYYY' ) AS tglmasuk 
            FROM pasiendaftar_t AS pd
            LEFT JOIN ruangan_m AS ru ON ru.id = pd.objectruanganlastfk
            LEFT JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
		    INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk
            LEFT JOIN alamat_m AS alm ON alm.nocmfk = pm.id
            LEFT JOIN departemen_m AS dp ON dp.id = ru.objectdepartemenfk
            LEFT JOIN kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk
		    LEFT JOIN rekanan_m AS rkn ON rkn.id = pd.objectrekananfk
            WHERE pd.noregistrasi = '". $noregistrasi ."'
        "))->first();
        $spri = collect(DB::select("
            SELECT to_char(tglrencanakontrol, 'dd Month yyyy') as tglrencana
            ,to_char(tglterbitkontrol, 'dd Month yyyy') as tglterbit
            ,* 
            FROM bpjsrencanakontrol_t 
            WHERE statusenabled = true and norec_pd = '". $datas->norec_pd ."'
        "))->first();

        // isi tanda tangan
        $tulisanheader = "Dikeluarkan di RSUD H.A SULTHAN DG. RADJA, Kabupaten/Kota Bulukumba /r";
        $tulisanheader .= "Ditandatangani secara elektronik oleh /r";
        $tulisanfooter = "ID ". $datas->nobpjs ."/r";
        $tulisanfooter .= date_format(date_create($datas->tglcreate), 'Y-m-d');

        $ttdpasien = $tulisanheader . $datas->namapeserta . "/r" . $tulisanfooter;
        $ttddokter = $tulisanheader . $suratJaminan->dokter . "/r" . $tulisanfooter;
        $ttdrumahsakit = $tulisanheader . "RSUD H.A SULTHAN DG. RADJA /r" . $tulisanfooter;
        $pageWidth = 819;
        $dataReport = array(
            'namaprofile' => $profile->namalengkap,
            'alamat' => $profile->alamatlengkap,
            'tglAyeuna' => $tglAyeuna,
            'data' => $datas,
            'suratJaminan' => $suratJaminan,
            'spri' => $spri,
            'ttdpasien' => $ttdpasien,
            'ttddokter' => $ttddokter,
            'ttdrumahsakit' => $ttdrumahsakit,
        );

        return view('report.pendaftaran.sepV2',
            compact('dataReport', 'pageWidth','profile'));
    }

    public function ttdDigital($noregistrasi, $type)
    {
        $data = collect(DB::select("
            SELECT pd.norec as norec_pd
            ,pm.namapasien
            ,pm.nobpjs
            ,pg.namalengkap AS dokter
            ,to_char(pd.tglregistrasi, 'YYYY-MM-DD') AS tglmasuk
            FROM pasiendaftar_t AS pd
            LEFT JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
		    INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk
            WHERE pd.noregistrasi = '". $noregistrasi ."'
        "))->first();
        $spri = collect(DB::select("SELECT * FROM bpjsrencanakontrol_t 
        WHERE statusenabled = true and norec_pd = '". $data->norec_pd ."'"))->first();

        $tulisanheader = "Dikeluarkan di RSUD H.A SULTHAN DG. RADJA, Kabupaten/Kota Bulukumba <br/>";
        $tulisanheader .= "Ditandatangani secara elektronik oleh <br/>";
        $tulisanfooter = "ID ". $data->nobpjs ."<br/>". $data->tglmasuk;
        $ttddigital = "";
        switch ($type) {
            case 'pasien':
                $ttddigital = $tulisanheader . $data->namapasien . "<br/>" . $tulisanfooter;
                break;
            case 'dokter':
                $ttddigital = $tulisanheader . $data->dokter . "<br/>" . $tulisanfooter;
                break;
            case 'rs':
                $ttddigital = $tulisanheader . "RSUD H.A SULTHAN DG. RADJA <br/>" . $tulisanfooter;
                break;
            case 'spri':
                $ttddigital = $tulisanheader . $spri->namadokter . "<br/>" . $tulisanfooter;
                break;
        }
        return $ttddigital;
    }

    public function cetakCPPT(Request $request)
    {
        $kdProfile = (int)$request['kdprofile'];
        $norec_apd = $request['norec_apd'];
        $norec_emr = $request['norec_emr'];
        $nocm = $request['nocm'];
        $pageWidth = 793;
        $profile = collect(DB::select
        ("
                select * from profile_m where id = $kdProfile limit 1
            "))->first();

        $pasien = collect(DB::select("
            select ps.nocm, ps.namapasien, to_char(ps.tgllahir,'dd-MM-yyyy') as tgllahir,
			       CASE WHEN ps.objectjeniskelaminfk=1 then 'L' else 'P' END as jk,
                   to_char(pd.tglregistrasi,'dd-MM-yyyy hh24:mi:ss') as tglregistrasi,rm.namaruangan,
                   al.alamatlengkap,al.kecamatan,al.kotakabupaten
            from antrianpasiendiperiksa_t apd
            inner join pasiendaftar_t pd on pd.norec = apd.noregistrasifk
            inner join pasien_m ps on ps.id = pd.nocmfk
            inner join alamat_m as al on al.nocmfk=ps.id
            inner join ruangan_m as rm on rm.id = apd.objectruanganfk
            where apd.norec = '$norec_apd'
            and ps.statusenabled = true and ps.nocm = '$nocm'
        "))->first();

        $data = collect(DB::select("
            SELECT emrp.nocm, to_char(emrp.tglemr,'dd-MM-yyyy hh24:mi:ss') as tglemr, jp.jenispegawai,
                   emrdp.emrpasienfk ,emrdp.value ,emrdp.emrdfk,emrd.caption,emrd.type, emrd.nourut,
                   emrd.reportdisplay,  emrd.kodeexternal AS kodeex,pg.namalengkap, emrd.satuan,
                   emr.caption as namaform 
            From emrpasiend_t As emrdp
            INNER JOIN emrpasien_t AS emrp ON emrp.noemr = emrdp.emrpasienfk
            INNER JOIN emrd_t AS emrd ON emrd.id = emrdp.emrdfk
            INNER JOIN emr_t AS emr ON emr.id = emrdp.emrfk
            INNER JOIN pegawai_m AS pg ON pg.id = emrp.pegawaifk
            INNER JOIN jenispegawai_m jp ON jp.id = pg.objectjenispegawaifk
            Where emrdp.statusenabled = true
            AND emrp.nocm = '$nocm' and emrp.norec = '$norec_emr'
            AND emr.id in (94) Order by emrdp.emrdfk ASC
        "));

        $diti=array();
        $fieldsatu = "";
        $fielddua = "";
        foreach ($data as $item){
            $dokter=$item->namalengkap;
            $tglemr=$item->tglemr;
            $txt = "";
            $txt2 = "";
            if ($item->value != null || $item->value != ''){
                if ($item->emrdfk == 4248){
                    $txt =  $item->value;
                    $fieldsatu = $fieldsatu . " " .$txt;
//                    break;
                }
                if ($item->emrdfk == 4249){
                    $txt =  $item->value;
                    $fieldsatu = $fieldsatu . " " .$txt;
//                    break;
                }
                if ($item->emrdfk == 4250){
                    $txt =  $item->value;
                    $fieldsatu = $fieldsatu . " " .$txt;
//                    break;
                }
                if ($item->emrdfk == 4251){
                    $txt =  $item->value;
                    $fieldsatu = $fieldsatu . " " .$txt;
//                    break;
                }
                if ($item->emrdfk == 5236){
                    $txt2 =  $item->value;
                    $fielddua = $fielddua . " " . $txt2;
//                    break;
                }
            }
        }


        $dataReport = array(
            'namaprofile' => $profile->namalengkap,
            'alamat' => $profile->alamatlengkap,
            'judul' => 'CATATAN KLINIK',
            'nocm' => $pasien->nocm,
            'namapasien' => $pasien->namapasien,
            'tgllahir' => $pasien->tgllahir,
            'jk' => $pasien->jk,
            'tglregistrasi' => $pasien->tglregistrasi,
            'namaruangan' => $pasien->namaruangan,
            'alamatlengkap' => $pasien->alamatlengkap,
            'tglemr' => $data[0]->tglemr,
            'dokter' => $data[0]->namalengkap,
             'fieldsatu' => $fieldsatu,
             'fielddua' => $fielddua,
        );
        return view('report.EMR.cppt',
            compact('dataReport', 'pageWidth','diti','profile'));
    }
    public function cetakResume(Request $r)
    {
        $res['profile'] = Profile::where('id',$r['kdprofile'])->first();
        $data = \DB::table('resumemedis_t as rm')
            ->select('pd.tglregistrasi','pd.tglpulang','rm.norec', 'rm.tglresume', 'ru.namaruangan', 'pg.namalengkap as namadokter',
                'rm.ringkasanriwayatpenyakit', 'rm.pemeriksaanfisik', 'rm.pemeriksaanpenunjang',
                'rm.hasilkonsultasi', 'rm.terapi', 'rm.diagnosisawal', 'rm.diagnosissekunder', 'rm.tindakanprosedur',
                // 'rm.diagnosismasuk', 'rm.diagnosistambahan', 'rm.alasandirawat',
                'rm.kddiagnosisawal', 'rm.diagnosismasuk', 'rm.kddiagnosismasuk', 'rm.diagnosistambahan', 'rm.kddiagnosistambahan', 'rm.kddiagnosistambahan2', 'rm.kddiagnosistambahan3', 'rm.kddiagnosistambahan4', 'rm.alasandirawat',
                'dg1.kddiagnosa as kddiagnosa1', 'dg1.namadiagnosa as namadiagnosa1',
                'dg2.kddiagnosa as kddiagnosa2', 'dg2.namadiagnosa as namadiagnosa2',
                'dg3.kddiagnosa as kddiagnosa3', 'dg3.namadiagnosa as namadiagnosa3',
                'dg4.kddiagnosa as kddiagnosa4', 'dg4.namadiagnosa as namadiagnosa4',
                'dg5.kddiagnosa as kddiagnosa5', 'dg5.namadiagnosa as namadiagnosa5',
                'dg6.kddiagnosa as kddiagnosa6', 'dg6.namadiagnosa as namadiagnosa6',
                'rm.tglkontrolpoli', 'rm.rumahsakittujuan',
                'rm.alergi', 'rm.diet', 'rm.instruksianjuran', 'rm.hasillab',
                'rm.kondisiwaktukeluar', 'rm.pengobatandilanjutkan', 'rm.koderesume',
                'rm.pegawaifk',
                'pd.noregistrasi', 'pd.tglregistrasi', 'ps.nocm', 'rm.noregistrasifk',
                'ps.namapasien','kp.kelompokpasien','ru.namaruangan','jk.jeniskelamin','ps.tgllahir')
            ->Join('antrianpasiendiperiksa_t as apd', 'apd.norec', '=', 'rm.noregistrasifk')
            ->Join('pasiendaftar_t as pd', 'pd.norec', '=', 'apd.noregistrasifk')
            ->Join('kelompokpasien_m as kp', 'kp.id', '=', 'pd.objectkelompokpasienlastfk')
            ->Join('pasien_m as ps', 'ps.id', '=', 'pd.nocmfk')
            ->Join('jeniskelamin_m as jk', 'jk.id', '=', 'ps.objectjeniskelaminfk')
            ->leftJoin('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
            ->leftJoin('pegawai_m as pg', 'pg.id', '=', 'pd.objectpegawaifk')
            ->leftJoin('diagnosa_m as dg1', 'dg1.id', '=', 'rm.kddiagnosismasuk')
            ->leftJoin('diagnosa_m as dg2', 'dg2.id', '=', 'rm.kddiagnosisawal')
            ->leftJoin('diagnosa_m as dg3', 'dg3.id', '=', 'rm.kddiagnosistambahan')
            ->leftJoin('diagnosa_m as dg4', 'dg4.id', '=', 'rm.kddiagnosistambahan2')
            ->leftJoin('diagnosa_m as dg5', 'dg5.id', '=', 'rm.kddiagnosistambahan3')
            ->leftJoin('diagnosa_m as dg6', 'dg6.id', '=', 'rm.kddiagnosistambahan4')
            ->where('rm.kdprofile', $r['kdprofile'])
            ->where('rm.statusenabled', true)
            ->where('rm.norec',  $r['norec'])
            ->where('rm.keteranganlainnya', 'RawatInap');
//            ->whereIn('ru.objectdepartemenfk',$iddept);

        $data = $data->first();
        $item = $data;
//        $result = [];
//        foreach ($data as $item) {
            $details = DB::select(DB::raw("
                   select * from resumemedisdetail_t
                   where resumefk=:norec"),
                array(
                    'norec' => $item->norec,
                )
            );
            $diagnosistambahanarray = array($item->kddiagnosa3, $item->kddiagnosa4, $item->kddiagnosa5, $item->kddiagnosa6);
            $diagnosistambahan = [];
            $no = 0;
            foreach ($diagnosistambahanarray as $tambahan){
                if($tambahan != "") {
                    $diagnosistambahan[$no] = $tambahan;
                    $no++;
                }
            }
            $result= array(
                'norec' => $item->norec,
                'tglregistrasi' => $item->tglregistrasi,
                'tglpulang' => $item->tglpulang,
                'kelompokpasien' => $item->kelompokpasien,
                'tglresume' => $item->tglresume,
                'namaruangan' => $item->namaruangan,
                'namadokter' => $item->namadokter,
                'ringkasanriwayatpenyakit' => $item->ringkasanriwayatpenyakit,
                'pemeriksaanfisik' => $item->pemeriksaanfisik,
                'pemeriksaanpenunjang' => $item->pemeriksaanpenunjang,
                'hasilkonsultasi' => $item->hasilkonsultasi,
                'terapi' => $item->terapi,
                'diagnosismasuk' => $item->diagnosismasuk,
                'kddiagnosismasuk' => array($item->kddiagnosismasuk  != null ? $item->kddiagnosismasuk : '-', $item->kddiagnosa1, $item->namadiagnosa1!= null ? $item->namadiagnosa1 : '-'),
                'diagnosisawal' => $item->diagnosisawal,
                'kddiagnosisawal' => array($item->kddiagnosisawal, $item->kddiagnosa2,  $item->namadiagnosa2),
                'diagnosistambahan' => $item->diagnosistambahan,
                'kddiagnosistambahan' => array($item->kddiagnosistambahan, $item->kddiagnosa3,  $item->namadiagnosa3),
                'kddiagnosistambahan2' => array($item->kddiagnosistambahan2, $item->kddiagnosa4,  $item->namadiagnosa4),
                'kddiagnosistambahan3' => array($item->kddiagnosistambahan3, $item->kddiagnosa5,  $item->namadiagnosa5),
                'kddiagnosistambahan4' => array($item->kddiagnosistambahan4, $item->kddiagnosa6,  $item->namadiagnosa6),
                'kddiagnosistambahanall' => implode(", ", $diagnosistambahan),
                'diagnosissekunder' => $item->diagnosissekunder,
                'tglkontrolpoli' => $item->tglkontrolpoli,
                'rumahsakittujuan' => $item->rumahsakittujuan,
                'tindakanprosedur' => $item->tindakanprosedur,
                'alasandirawat' => $item->alasandirawat,
                'alergi' => $item->alergi,
                'diet' => $item->diet,
                'instruksianjuran' => $item->instruksianjuran,
                'hasillab' => $item->hasillab,
                'kondisiwaktukeluar' => $item->kondisiwaktukeluar,
                'pengobatandilanjutkan' => $item->pengobatandilanjutkan,
                'koderesume' => $item->koderesume,
                'pegawaifk' => $item->pegawaifk,
                'noregistrasi' => $item->noregistrasi,
                'nocm' => $item->nocm,
                'namapasien' => $item->namapasien,
                'noregistrasifk' => $item->noregistrasifk,
                'jeniskelamin'=> $item->jeniskelamin,
                'tgllahir'=> $item->tgllahir,
                'details' => $details,
            );
//        }
//        dd($result);
        $res['terapi'][] = array('tera' => 'asas');
        $res['d'] =$result;
        $username ='asa';
        return view('report.resume-medis',compact('res','username'));

//        $jasper = new JasperPHP();
//
//        // Compile a JRXML to Jasper
//        $jasper->compile( public_path('jasper/report/rincianbilling.jrxml'))->execute();
//        $param =[];
//        foreach (array_values($request['paramKey']) as $k => $t){
//                $param[$t] = array_values($request['paramValue'])[$k] ;
//        }
//        // Process a Jasper file to PDF and RTF (you can use directly the .jrxml)
//        $jasper->process(
//            public_path('jasper/report/rincianbilling.jasper'),
//            public_path('jasper/output/2'),
//            array("pdf", "rtf"),
//            $param
//        )->execute();
//
//        // List the parameters from a Jasper file.
//        $array = $jasper->list_parameters(
//            public_path('jasper/report/rincianbilling.jasper')
////            $param,
////            array('noregistrasi','121212121')
//        )->execute();
//
//        return view('report.resume-medis');
//        $kdProfile = (int)$request['kdprofile'];
////        $input2 = public_path('jasper/report/rincianbilling.jrxml');
////        $jasper = new PHPJasper;
////        $jasper->compile($input2)->execute();
//
//        $input = public_path('jasper/report/rincianbilling.jasper');
//        $output =  public_path('jasper/output');
//        $jdbc_dir = public_path('jasper/jdbc');
//        $param =[];
//        foreach (array_values($request['paramKey']) as $k => $t){
//                $param[$t] = array_values($request['paramValue'])[$k] ;
//        }
////        dd($param);
//        $options = [
//            'format' => ['pdf'],
//            'locale' => 'en',
//            'params' => $param,
//            'db_connection' => [
//                'driver' => 'postgres', //mysql, ....
//                'username' => 'postgres',
//                'password' => 'Tr4nsm3dic',
//                'host' => 'transmedic.co.id',
//                'database' => 'transmedic_standar',
//                'port' => '5432'
////                'driver' => 'postgres',
////                'host' => 'transmedic.co.id',
////                'port' => '5432',
////                'database' => 'transmedic_standar',
////                'username' => 'postgres',
////                'password' => 'Tr4nsm3dic',
////                'jdbc_driver' => 'org.postgresql.Driver',
////                'jdbc_url' => 'jdbc:postgresql://transmedic.co.id:5432/transmedic_standar',
////                'jdbc_dir' => $jdbc_dir
//            ]
//        ];
//
//        $jasper = new PHPJasper();
//
//        $jasper->process(
//            $input,
//            $output,
//            $options
//        )->execute();


//        return view('report.resume-medis');
//        return view('','$result');
    }
    public function cetakDokter(Request $r) {
        $kdProfile = (int)$r['kdprofile'];
        $raw = collect(DB::select("
            SELECT pg.nip, pg.nosip,pg.namalengkap, jk.jeniskelamin, pg.tgllahir, ps.namapasien, ps.nocm, to_char( rm.tglresume, 'dd-MM-yyyy') AS tglresume
            FROM pasiendaftar_t AS pd
            LEFT  JOIN antrianpasiendiperiksa_t AS apd ON apd.noregistrasifk=pd.norec
            LEFT JOIN resumemedis_t AS rm ON rm.noregistrasifk=apd.norec
            LEFT JOIN pegawai_m AS pg ON pg.id=pd.objectpegawaifk 
            LEFT  JOIN jeniskelamin_m AS jk ON jk.id=pg.objectjeniskelaminfk 
            LEFT  JOIN pasien_m AS ps ON ps.id=pd.nocmfk

            WHERE
                pd.noregistrasi = '$r[reg]'
        "))->first();
        if(!empty($raw)){
            $raw->umur = $this->getAge($raw->tgllahir ,date('Y-m-d'));
        }else{
            echo 'Data Tidak ada ';
            return;
        }

        $pageWidth = 950;
        $now =  $this->getDateTime();

        return view('report.pdf.infodokter',
            compact('raw', 'pageWidth','r','now'));

    }

    public function dataDokter(Request $r) {
        $kdProfile = (int)$r['kdprofile'];
        $raw = collect(DB::select("
        SELECT
            pg.nip,
            pg.nosip,
            pg.namalengkap,
            jk.jeniskelamin,
            pg.tgllahir,
            '' as tglresume
        FROM
            pegawai_m AS pg
            LEFT JOIN jeniskelamin_m AS jk ON jk.ID = pg.objectjeniskelaminfk
        WHERE
            pg.id = '$r[reg]'
        "))->first();

        $pageWidth = 950;
        $now =  $this->getDateTime();

        return view('report.pdf.infodokter',
            compact('raw', 'pageWidth','r','now'));

    }

    public function cetakAdmin(Request $r) {
        $kdProfile = (int)$r['kdprofile'];
        $raw = collect(DB::select("
            SELECT pd.tglregistrasi
            FROM pasiendaftar_t AS pd
            WHERE
                pd.noregistrasi = '$r[reg]'
        "))->first();
        // if(!empty($raw)){
        //     $raw->umur = $this->getAge($raw->tgllahir ,date('Y-m-d'));
        // }else{
        //     echo 'Data Tidak ada ';
        //     return;
        // }

        $pageWidth = 950;
        $now =  $this->getDateTime();

        return view('report.pdf.infoadmin',
            compact('raw', 'pageWidth','r','now'));

    }

    public function cetakPasien(Request $r) {
        $kdProfile = (int)$r['kdprofile'];
        $raw = collect(DB::select("
       select ps.nocm, ps.namapasien, ps.tgllahir, kp.kelompokpasien, ru.namaruangan, jk.jeniskelamin, pd.noregistrasi, pd.namalengkapambilpasien, 
       to_char( rm.tglresume, 'dd-MM-yyyy') as tglresume, CASE WHEN alm.alamatlengkap IS NULL 
       THEN '-' ELSE (alm.alamatlengkap || ' ' || ds.namadesakelurahan || ' '|| kc.namakecamatan || ' '|| kk.namakotakabupaten 
      || ' ' || pro.namapropinsi) END AS alamatlengkap, pd.noregistrasi, pemakaianasuransi_t.nokepesertaan, 
       pemakaianasuransi_t.nosep, ps.noidentitas
        FROM  

       pasiendaftar_t AS pd 
       INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.noregistrasifk=pd.norec 
       left JOIN resumemedis_t AS rm ON rm.noregistrasifk=apd.norec 
       left JOIN  pasien_m AS ps ON ps.id = pd.nocmfk 
      left JOIN  kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk 
       left JOIN  ruangan_m AS ru ON ru.id = pd.objectruanganlastfk 
      left JOIN   pemakaianasuransi_t ON pd.norec = pemakaianasuransi_t.noregistrasifk 
      left JOIN  kelompokpasien_m AS kps ON kps.id = pd.objectkelompokpasienlastfk
       left JOIN  alamat_m AS alm ON alm.nocmfk = ps.id 
      left JOIN   desakelurahan_m AS ds ON ds.id = alm.objectdesakelurahanfk 
      left JOIN   kotakabupaten_m AS kk ON kk.id = alm.objectkotakabupatenfk
      left JOIN   kecamatan_m AS kc ON kc.id = alm.objectkecamatanfk
      left JOIN  propinsi_m AS pro ON pro.id = alm.objectpropinsifk
       left  JOIN   jeniskelamin_m AS jk  on jk.id=ps.objectjeniskelaminfk
           WHERE
               pd.noregistrasi = '$r[reg]'
       "))->first();
        if(!empty($raw)){
            $raw->umur = $this->getAge($raw->tgllahir ,date('Y-m-d'));
        }else{
            echo 'Data Tidak ada ';
            return;
        }




        $pageWidth = 950;
        $now =  $this->getDateTime();

        return view('report.pdf.infopasien',
            compact('raw', 'pageWidth','r','now'));

    }

    public static function getProfile(){
        $res['namaprofile'] = 'RSUD H.A SULTHAN DG. RADJA';
        $res['alamat'] ='Jl. Srikaya No. 17, Bulukumba, Sulawesi Selatan';
        return $res;
    }

    public function cetakCPPTRanap(Request $request){
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];
        $data = DB::select(DB::raw("
                   SELECT
                        epd.emrdfk,
                        ep.noemr,
                        ed.TYPE,
                        pa.namapasien,
                        pa.tgllahir,
                        pa.nohp,
                        pa.nocm,
                        ep.jeniskelamin,
                        ep.umur,
                        al.alamatlengkap,
                        ep.noregistrasifk as noregistrasi ,
                        epd.value,ep.namaruangan,pg.namalengkap as namadokter
                        --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                    FROM
                        emrpasien_t AS ep
                        INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                        INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                         INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                        left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                        left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                        left JOIN alamat_m as al on pa.id = al.nocmfk
                    WHERE
                        ep.norec = '$norec'
                         AND ep.kdprofile = '$kdProfile' 
                        AND epd.statusenabled = TRUE 
                        and epd.emrfk = $request[emrfk]
                        ORDER BY
                        ed.nourut
                     "
        ));
        foreach ($data as $z){
            if ($z->type=="datetime"){
                $z->value=date('Y-m-d H:i:s',strtotime($z->value));
            }
//            $z->value = nl2br( $z->value);
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id',$request['kdprofile'])->first();
        $res['d'] = $data;
//        dd( $res['d'] );

        return view('report.cppt-ranap',compact('res','pageWidth'));
    }

    public function cetakCatatanKlinik(Request $request){
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];
        $data = DB::select(DB::raw("
                   SELECT
                        epd.emrdfk,
                        ep.noemr,
                        ed.TYPE,
                        pa.namapasien,
                        pa.tgllahir,
                        pa.nohp,
                        pa.nocm,
                        ep.jeniskelamin,
                        ep.umur,
                        al.alamatlengkap,
                        ep.noregistrasifk as noregistrasi ,
                        epd.value,ep.namaruangan,pg.namalengkap as namadokter,
                        to_char(ep.tglemr,'dd-MM-yyyy hh24:mi:ss') as tglemr
                        --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                    FROM
                        emrpasien_t AS ep
                        INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                        INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                         INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                        left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                        left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                        left JOIN alamat_m as al on pa.id = al.nocmfk
                    WHERE
                        ep.norec = '$norec'
                         AND ep.kdprofile = '$kdProfile' 
                        AND epd.statusenabled = TRUE 
                        and epd.emrfk = $request[emrfk]
                        ORDER BY
                        ed.nourut
                     "
        ));

//        dd($data);

        foreach ($data as $z){
            if ($z->type=="datetime"){
                $z->value=date('Y-m-d H:i:s',strtotime($z->value));
            }
//            $z->value = nl2br( $z->value);
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id',$request['kdprofile'])->first();
        $res['d'] = $data;
//        dd( $res['d'] );

        return view('report.catatanklinik',compact('res','pageWidth'));
    }
    public function cetakResume2(Request $r)
    {
        $res['profile'] = Profile::where('id',$r['kdprofile'])->first();
        $data = \DB::table('resumemedis_t as rm')
            ->select('pd.tglregistrasi','pd.tglpulang','rm.norec', 'rm.tglresume', 'ru.namaruangan', 'pg.namalengkap as namadokter',
                'rm.ringkasanriwayatpenyakit', 'rm.pemeriksaanfisik', 'rm.pemeriksaanpenunjang',
                'rm.hasilkonsultasi', 'rm.terapi', 'rm.diagnosisawal', 'rm.diagnosissekunder', 'rm.tindakanprosedur',
                // 'rm.diagnosismasuk', 'rm.diagnosistambahan', 'rm.alasandirawat',
                'rm.kddiagnosisawal', 'rm.diagnosismasuk', 'rm.kddiagnosismasuk', 'rm.diagnosistambahan', 'rm.kddiagnosistambahan', 'rm.kddiagnosistambahan2', 'rm.kddiagnosistambahan3', 'rm.kddiagnosistambahan4', 'rm.alasandirawat',
                'dg1.kddiagnosa as kddiagnosa1', 'dg1.namadiagnosa as namadiagnosa1',
                'dg2.kddiagnosa as kddiagnosa2', 'dg2.namadiagnosa as namadiagnosa2',
                'dg3.kddiagnosa as kddiagnosa3', 'dg3.namadiagnosa as namadiagnosa3',
                'dg4.kddiagnosa as kddiagnosa4', 'dg4.namadiagnosa as namadiagnosa4',
                'dg5.kddiagnosa as kddiagnosa5', 'dg5.namadiagnosa as namadiagnosa5',
                'dg6.kddiagnosa as kddiagnosa6', 'dg6.namadiagnosa as namadiagnosa6',
                'rm.tglkontrolpoli', 'rm.rumahsakittujuan',
                'rm.alergi', 'rm.diet', 'rm.instruksianjuran', 'rm.hasillab',
                'rm.kondisiwaktukeluar', 'rm.pengobatandilanjutkan', 'rm.koderesume',
                'rm.pegawaifk',
                'pd.noregistrasi', 'pd.tglregistrasi', 'ps.nocm', 'rm.noregistrasifk',
                'ps.namapasien','kp.kelompokpasien','ru.namaruangan','jk.jeniskelamin','ps.tgllahir')
            ->Join('antrianpasiendiperiksa_t as apd', 'apd.norec', '=', 'rm.noregistrasifk')
            ->Join('pasiendaftar_t as pd', 'pd.norec', '=', 'apd.noregistrasifk')
            ->Join('kelompokpasien_m as kp', 'kp.id', '=', 'pd.objectkelompokpasienlastfk')
            ->Join('pasien_m as ps', 'ps.id', '=', 'pd.nocmfk')
            ->Join('jeniskelamin_m as jk', 'jk.id', '=', 'ps.objectjeniskelaminfk')
            ->leftJoin('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
            ->leftJoin('pegawai_m as pg', 'pg.id', '=', 'pd.objectpegawaifk')
            ->leftJoin('diagnosa_m as dg1', 'dg1.id', '=', 'rm.kddiagnosismasuk')
            ->leftJoin('diagnosa_m as dg2', 'dg2.id', '=', 'rm.kddiagnosisawal')
            ->leftJoin('diagnosa_m as dg3', 'dg3.id', '=', 'rm.kddiagnosistambahan')
            ->leftJoin('diagnosa_m as dg4', 'dg4.id', '=', 'rm.kddiagnosistambahan2')
            ->leftJoin('diagnosa_m as dg5', 'dg5.id', '=', 'rm.kddiagnosistambahan3')
            ->leftJoin('diagnosa_m as dg6', 'dg6.id', '=', 'rm.kddiagnosistambahan4')
            ->where('rm.kdprofile', $r['kdprofile'])
            ->where('rm.statusenabled', true)
            ->where('rm.norec',  $r['norec'])
            ->where('rm.keteranganlainnya', 'RawatInap');
//            ->whereIn('ru.objectdepartemenfk',$iddept);

        $data = $data->first();
        $item = $data;
//        $result = [];
//        foreach ($data as $item) {
            $details = DB::select(DB::raw("
                   select * from resumemedisdetail_t
                   where resumefk=:norec"),
                array(
                    'norec' => $item->norec,
                )
            );
            $diagnosistambahanarray = array($item->kddiagnosa3, $item->kddiagnosa4, $item->kddiagnosa5, $item->kddiagnosa6);
            $diagnosistambahan = [];
            $no = 0;
            foreach ($diagnosistambahanarray as $tambahan){
                if($tambahan != "") {
                    $diagnosistambahan[$no] = $tambahan;
                    $no++;
                }
            }
            $result= array(
                'norec' => $item->norec,
                'tglregistrasi' => $item->tglregistrasi,
                'tglpulang' => $item->tglpulang,
                'kelompokpasien' => $item->kelompokpasien,
                'tglresume' => $item->tglresume,
                'namaruangan' => $item->namaruangan,
                'namadokter' => $item->namadokter,
                'ringkasanriwayatpenyakit' => $item->ringkasanriwayatpenyakit,
                'pemeriksaanfisik' => $item->pemeriksaanfisik,
                'pemeriksaanpenunjang' => $item->pemeriksaanpenunjang,
                'hasilkonsultasi' => $item->hasilkonsultasi,
                'terapi' => $item->terapi,
                'diagnosismasuk' => $item->diagnosismasuk,
                'kddiagnosismasuk' => array($item->kddiagnosismasuk  != null ? $item->kddiagnosismasuk : '-', $item->kddiagnosa1, $item->namadiagnosa1!= null ? $item->namadiagnosa1 : '-'),
                'diagnosisawal' => $item->diagnosisawal,
                'kddiagnosisawal' => array($item->kddiagnosisawal, $item->kddiagnosa2,  $item->namadiagnosa2),
                'diagnosistambahan' => $item->diagnosistambahan,
                'kddiagnosistambahan' => array($item->kddiagnosistambahan, $item->kddiagnosa3,  $item->namadiagnosa3),
                'kddiagnosistambahan2' => array($item->kddiagnosistambahan2, $item->kddiagnosa4,  $item->namadiagnosa4),
                'kddiagnosistambahan3' => array($item->kddiagnosistambahan3, $item->kddiagnosa5,  $item->namadiagnosa5),
                'kddiagnosistambahan4' => array($item->kddiagnosistambahan4, $item->kddiagnosa6,  $item->namadiagnosa6),
                'kddiagnosistambahanall' => implode(", ", $diagnosistambahan),
                'diagnosissekunder' => $item->diagnosissekunder,
                'tglkontrolpoli' => $item->tglkontrolpoli,
                'rumahsakittujuan' => $item->rumahsakittujuan,
                'tindakanprosedur' => $item->tindakanprosedur,
                'alasandirawat' => $item->alasandirawat,
                'alergi' => $item->alergi,
                'diet' => $item->diet,
                'instruksianjuran' => $item->instruksianjuran,
                'hasillab' => $item->hasillab,
                'kondisiwaktukeluar' => $item->kondisiwaktukeluar,
                'pengobatandilanjutkan' => $item->pengobatandilanjutkan,
                'koderesume' => $item->koderesume,
                'pegawaifk' => $item->pegawaifk,
                'noregistrasi' => $item->noregistrasi,
                'nocm' => $item->nocm,
                'namapasien' => $item->namapasien,
                'noregistrasifk' => $item->noregistrasifk,
                'jeniskelamin'=> $item->jeniskelamin,
                'tgllahir'=> $item->tgllahir,
                'details' => $details,
            );
//        }
//        dd($result);
        $res['terapi'][] = array('tera' => 'asas');
        $res['d'] =$result;
        $username ='asa';
        return response()
            ->view('report.resume-medis2',[
                'res' => $res,
                'data' => [],
                'periode' => '',
                'tglcetak' => '',
                'footerreport' => '',
                'ttdnama'=> '',
                'ttdnip' => '',
                'pageorientation' => 'portrait',
                'fontsize'=> '11px'
            ])
            ->header('Content-Type','application/pdf');
        // return view('report.resume-medis',compact('res','username'));
        }

        public function getPegawaiByQR(Request $r){
            $kdProfile = $r['kdprofile'];
            $data = DB::table('pegawai_m as pg')
                ->leftjoin('jabatan_m as jb','jb.id','=','pg.objectjabatanfungsionalfk')
                ->select('pg.id','pg.namalengkap','pg.nosip','pg.noidentitas','jb.namajabatan')
                ->where('pg.statusenabled',true)
                ->where('pg.id',$r['id'])
                ->where('pg.kdprofile',$r['kdprofile'])
                ->first();
            return view('report.qr-pegawai',compact('data'));
        }
        public function cekCaptcha(Request $r)
    {
         $captchaResponse = $r->input('captchaResponse');
         $secret = '6LeyqNAZAAAAAKO8uCFObSxNO1YWo2vzpP44ydfS';
         $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".
            $secret."&response=".$captchaResponse.
            "&remoteip=".$_SERVER['REMOTE_ADDR']), true);
         return $response;
    
    }

    public function cetakRbaAnggaran_2021(Request $request){
        $kdProfile = $request['profile'];
        $dataLogin = $request->all();
        $Pengendali =  '';
        $tahun =  $request['tahun'];
        $namaMataAnggaran =  ' ';
        $revisiDiva =  ' ';

//        if (isset($request['tahun']) && $request['tahun'] != "" && $request['tahun'] != "undefined") {
//            $tahun =  " WHERE x.tahun = '".$request['tahun']."'";
//        }
//        if (isset($request['namaMataAnggaran']) && $request['namaMataAnggaran'] != "" && $request['namaMataAnggaran'] != "undefined") {
//            $namaMataAnggaran =  ' and x.desk '. 'ILIKE '  . "'%" . $request['namaMataAnggaran'] .  "%'";
//        }
//
//        if (isset($request['revisike']) && $request['revisike'] != "" && $request['revisike'] != "undefined") {
//            $revisiDiva =  ' and revisidivake =  ' . $request['revisike'];
//        }
//
//        if (isset($request['Pengendali']) && $request['Pengendali'] != "" && $request['Pengendali'] != "undefined") {
//            $Pengendali =  ' and objectpengendalifk =  ' . $request['Pengendali'];
//        }

        $data = \DB::table('perencanaananggaran_m as pa')
            ->select(\DB::raw("
                pa.*,ss.reportdisplay AS satuanstandar,
                CASE WHEN pa.hargasatuan = 0 AND pa.saldoawalblu = 0 THEN 0
                WHEN pa.hargasatuan = 0 AND pa.saldoawalblu <> 0 THEN pa.saldoawalblu
                WHEN pa.hargasatuan <> 0 AND pa.saldoawalblu = 0 THEN 
                CASE WHEN pa.volume IS NULL THEN 1 ELSE CAST(pa.volume AS FLOAT) END * pa.hargasatuan  
                END AS jumlah
            "))
            ->leftJOIN('satuananggaran_m AS ss','ss.id','=','pa.satuan')
            ->where('pa.kdprofile',$kdProfile)
            ->where('pa.statusenabled',true)
            ->where('pa.tahun', '=', $tahun )
            ->where('pa.isaktif', true )
            ->orderBy('pa.kdrekening');
        $data = $data->get();
        foreach ($data as $key => $row) {
            $count[$key] = $row->kdrekening;
        }

        $dataPimpinanBLUD =  DB::table('pegawai_m')->select('namalengkap', 'nip_pns')->where('id', '=', $request['pimpinanblud'])->first();
        $dataPejabatKeuangan =  DB::table('pegawai_m')->select('namalengkap', 'nip_pns')->where('id', '=', $request['pejabatkeuangan'])->first();
        $dataPejabatLayanan =  DB::table('pegawai_m')->select('namalengkap', 'nip_pns')->where('id', '=', $request['pejabatpelayanan'])->first();
        $dataPejabatPenunjang =  DB::table('pegawai_m')->select('namalengkap', 'nip_pns')->where('id', '=', $request['pejabatpenunjang'])->first();

        setlocale(LC_ALL, 'IND');
        $dateNow =  strftime("%d %B %Y");
        $versiNow = Carbon::now();
        array_multisort($count, SORT_ASC, $data);
        $results = array(
            'data' => $data,
            'datenow' => $dateNow,
            'versiNow' => $versiNow,
            'pimpinanblud' => $dataPimpinanBLUD,
            'pejabatkeuangan' => $dataPejabatKeuangan,
            'pejabatpelayanan' => $dataPejabatLayanan,
            'pejabatpenunjang' => $dataPejabatPenunjang,
            'message' => 'Sinchan',
        );
        // dd($results);

        return view('report.rba-print_new',compact('results'));
    }
    
    public function cetakNeraca(Request $request){
        $idProfile = 21;
        $dataLogin = $request->all();
        $Pengendali =  '';
        $tahun =  $request['tahun'];
        $tglAwal = $request['tglAwal'];
        $tglAkhir = $request['tglAkhir'];
        $tglAyeuna = date('d/m/Y');
        $tgltgl = $request['tgltgl'];
        $namaLaporan = $request['namalaporan'];
        $profile = collect(DB::select("
            select * from profile_m where id = $idProfile limit 1
        "))->first();

        //saldo mutasi
        $sql1 = "select mp.noaccount,mp.namaaccount,mp.namaexternal,  x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(coa.noaccount,1) as noaccount, 
                sum(pjd.hargasatuand) as debet,sum(pjd.hargasatuank) as kredit  
                from chartofaccount_m as coa 
                INNER JOIN postingjurnald_t as pjd ON pjd.objectaccountfk= coa.id
                INNER JOIN postingjurnal_t as pj on pj.norec=pjd.norecrelated
                where coa.kdprofile = $idProfile and pj.tglbuktitransaksi between '$tglAwal' and '$tglAkhir'
                --and coa.reportdisplay='$namaLaporan'  
                group by left(coa.noaccount,1)
                )as x  on x.noaccount = left(mp.noaccount,1)
                where mp.kodeexternal='1' 
                and sk.statusenabled=true  --and mp.reportdisplay='$namaLaporan'
                and left(mp.noaccount,1) in ($namaLaporan) and mp.statusenabled=true";
        $sql2 = "select mp.noaccount,'---' || mp.namaaccount,mp.namaexternal,  x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(coa.noaccount,3) as noaccount, 
                sum(pjd.hargasatuand) as debet,sum(pjd.hargasatuank) as kredit  
                from chartofaccount_m as coa 
                INNER JOIN postingjurnald_t as pjd ON pjd.objectaccountfk= coa.id
                INNER JOIN postingjurnal_t as pj on pj.norec=pjd.norecrelated
                where coa.kdprofile = $idProfile and pj.tglbuktitransaksi between '$tglAwal' and '$tglAkhir'
                --and coa.reportdisplay='$namaLaporan'  
                group by left(coa.noaccount,3)
                )as x  on x.noaccount = left(mp.noaccount,3)
                where mp.kodeexternal='2' 
                and sk.statusenabled=true  --and mp.reportdisplay='$namaLaporan'
                and left(mp.noaccount,1) in ($namaLaporan) and mp.statusenabled=true
                ";
        $sql3 = "select mp.noaccount,'------' || mp.namaaccount, mp.namaexternal, x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(coa.noaccount,6) as noaccount, 
                sum(pjd.hargasatuand) as debet,sum(pjd.hargasatuank) as kredit  
                from chartofaccount_m as coa 
                INNER JOIN postingjurnald_t as pjd ON pjd.objectaccountfk= coa.id
                INNER JOIN postingjurnal_t as pj on pj.norec=pjd.norecrelated
                where coa.kdprofile = $idProfile and pj.tglbuktitransaksi between '$tglAwal' and '$tglAkhir'
                 --and coa.reportdisplay='$namaLaporan' 
                group by left(coa.noaccount,6)
                )as x  on x.noaccount = left(mp.noaccount,6)
                where mp.kodeexternal='3' 
                and sk.statusenabled=true  --and mp.reportdisplay='$namaLaporan'
                and left(mp.noaccount,1) in ($namaLaporan) and mp.statusenabled=true";

        $sql4 = "select mp.noaccount,'---------' || mp.namaaccount, mp.namaexternal, x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(coa.noaccount,9) as noaccount, 
                sum(pjd.hargasatuand) as debet,sum(pjd.hargasatuank) as kredit  
                from chartofaccount_m as coa 
                INNER JOIN postingjurnald_t as pjd ON pjd.objectaccountfk= coa.id
                INNER JOIN postingjurnal_t as pj on pj.norec=pjd.norecrelated
                where coa.kdprofile = $idProfile and pj.tglbuktitransaksi between '$tglAwal' and '$tglAkhir'
                 --and coa.reportdisplay='$namaLaporan' 
                group by left(coa.noaccount,9)
                )as x  on x.noaccount = left(mp.noaccount,9)
                where mp.kodeexternal ='4'
                and sk.statusenabled=true  --and mp.reportdisplay='$namaLaporan'
                and left(mp.noaccount,1) in ($namaLaporan) and mp.statusenabled=true";

        $sql = $sql1 . " union all " . $sql2 . " union all " . $sql3. " union all " . $sql4 ;

        $sqlFinal = "select * from ($sql) as z  ORDER BY z.noaccount";
        $data = DB::select(DB::raw($sqlFinal));

        //saldo Awal
        $sql11 = "select mp.noaccount,mp.namaaccount,x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(mp.noaccount,1) as kdmap, 
                sum(pj.hargasatuand) as debet,sum(pj.hargasatuank) as kredit  
                from chartofaccount_m as mp
                INNER JOIN postingsaldoawal_t as pj ON pj.objectaccountfk= mp.id
                where mp.kdprofile = $idProfile and pj.ym='$tgltgl'
                group by left(mp.noaccount,1)
                )as x  on x.kdmap = left(mp.noaccount,1)
                where mp.kodeexternal='1' 
                and left(mp.noaccount,1) in ($namaLaporan) 
                and sk.statusenabled=true and mp.statusenabled=true";
        $sql22 = "select mp.noaccount,'---'  || mp.namaaccount,x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(mp.noaccount,3) as kdmap, 
                sum(pj.hargasatuand) as debet,sum(pj.hargasatuank) as kredit  
                from chartofaccount_m as mp
                INNER JOIN postingsaldoawal_t as pj ON pj.objectaccountfk= mp.id
                where mp.kdprofile = $idProfile and pj.ym='$tgltgl'
                group by left(mp.noaccount,3)
                )as x  on x.kdmap = left(mp.noaccount,3)
                where mp.kodeexternal='2' 
                and left(mp.noaccount,1) in ($namaLaporan)
                and sk.statusenabled=true and mp.statusenabled=true ";
        $sql33 = "select mp.noaccount,'------'  || mp.namaaccount,x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(mp.noaccount,6) as kdmap, 
                sum(pj.hargasatuand) as debet,sum(pj.hargasatuank) as kredit  
                from chartofaccount_m as mp
                INNER JOIN postingsaldoawal_t as pj ON pj.objectaccountfk= mp.id
                where mp.kdprofile = $idProfile and pj.ym='$tgltgl'
                group by left(mp.noaccount,6)
                )as x  on x.kdmap = left(mp.noaccount,6)
                where mp.kodeexternal='3' 
                and left(mp.noaccount,1) in ($namaLaporan)
                and sk.statusenabled=true and mp.statusenabled=true";
        $sql44 = "select mp.noaccount,'--------'  || mp.namaaccount,x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(mp.noaccount,9) as kdmap, 
                sum(pj.hargasatuand) as debet,sum(pj.hargasatuank) as kredit  
                from chartofaccount_m as mp
                INNER JOIN postingsaldoawal_t as pj ON pj.objectaccountfk= mp.id
                where mp.kdprofile = $idProfile and pj.ym='$tgltgl'
                group by left(mp.noaccount,9)
                )as x  on x.kdmap = left(mp.noaccount,9)
                where mp.kodeexternal is null
                and left(mp.noaccount,1) in ($namaLaporan)
                and sk.statusenabled=true and mp.statusenabled=true";

        $sql2 = $sql11 . " union all " . $sql22 . " union all " . $sql33 . " union all " . $sql44 ;

        $sqlFinal2= "select * from ($sql2) as z  ORDER BY z.noaccount";
        $data2 = DB::select(DB::raw($sqlFinal2));

        $result =[];
        $total=0;
        $total2=0;
        foreach ($data as $item){
            $total=0;
            $total2=0;
            foreach ($data2 as $itm){
                if ($item->noaccount == $itm->noaccount){
                    $total2 = $itm->total;
                    if ((float)$itm->total < 0){
                        $total2 = $total2 * (-1);
                    }
                }
            }
            $total = $item->total;
            if ((float)$item->total < 0){
                $total = $total * (-1);
            }
            $result[] = array(
                'kdmap' => $item->noaccount,
                'nomap' => $item->namaexternal,
                'namamap' => $item->namaaccount,
                'total' => $total2,
                'total2' => $total,
                'total3' => $total2 + $total ,
            );
        }

        $pageWidth = 950;                     
        $dataReport = array (
            'namaprofile' => $profile->namalengkap,
            'alamat' => $profile->alamatlengkap,
            'user' => $request['user'],
            'datas' => $result,
            'periode' => $tglAkhir,
            'tanggal' => $tglAyeuna,            
        );

        // $datau = substr($result[0]['kdmap'],0);
        // dd(
        //     $datau
        // );
        return view('report.keuangan.neraca',
            compact('dataReport', 'pageWidth','profile'));
    }

    public function cetakLabaRugi(Request $request){
        $idProfile = 21;
        $dataLogin = $request->all();
        $Pengendali =  '';
        $tahun =  $request['tahun'];
        $tglAwal = $request['tglAwal'];
        $tglAkhir = $request['tglAkhir'];
        $tglAyeuna = date('d/m/Y');
        $tgltgl = $request['tgltgl'];
        $namaLaporan = $request['namalaporan'];
        $profile = collect(DB::select("
            select * from profile_m where id = $idProfile limit 1
        "))->first();

        //saldo mutasi
        $sql1 = "select mp.noaccount,mp.namaaccount,mp.namaexternal,  x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(coa.noaccount,1) as noaccount, 
                sum(pjd.hargasatuand) as debet,sum(pjd.hargasatuank) as kredit  
                from chartofaccount_m as coa 
                INNER JOIN postingjurnald_t as pjd ON pjd.objectaccountfk= coa.id
                INNER JOIN postingjurnal_t as pj on pj.norec=pjd.norecrelated
                where coa.kdprofile = $idProfile and pj.tglbuktitransaksi between '$tglAwal' and '$tglAkhir'
                --and coa.reportdisplay='$namaLaporan'  
                group by left(coa.noaccount,1)
                )as x  on x.noaccount = left(mp.noaccount,1)
                where mp.kodeexternal='1' 
                and sk.statusenabled=true  --and mp.reportdisplay='$namaLaporan'
                and left(mp.noaccount,1) in ($namaLaporan) and mp.statusenabled=true";
        $sql2 = "select mp.noaccount,'---' || mp.namaaccount,mp.namaexternal,  x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(coa.noaccount,3) as noaccount, 
                sum(pjd.hargasatuand) as debet,sum(pjd.hargasatuank) as kredit  
                from chartofaccount_m as coa 
                INNER JOIN postingjurnald_t as pjd ON pjd.objectaccountfk= coa.id
                INNER JOIN postingjurnal_t as pj on pj.norec=pjd.norecrelated
                where coa.kdprofile = $idProfile and pj.tglbuktitransaksi between '$tglAwal' and '$tglAkhir'
                --and coa.reportdisplay='$namaLaporan'  
                group by left(coa.noaccount,3)
                )as x  on x.noaccount = left(mp.noaccount,3)
                where mp.kodeexternal='2' 
                and sk.statusenabled=true  --and mp.reportdisplay='$namaLaporan'
                and left(mp.noaccount,1) in ($namaLaporan) and mp.statusenabled=true
                ";
        $sql3 = "select mp.noaccount,'------' || mp.namaaccount, mp.namaexternal, x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(coa.noaccount,6) as noaccount, 
                sum(pjd.hargasatuand) as debet,sum(pjd.hargasatuank) as kredit  
                from chartofaccount_m as coa 
                INNER JOIN postingjurnald_t as pjd ON pjd.objectaccountfk= coa.id
                INNER JOIN postingjurnal_t as pj on pj.norec=pjd.norecrelated
                where coa.kdprofile = $idProfile and pj.tglbuktitransaksi between '$tglAwal' and '$tglAkhir'
                 --and coa.reportdisplay='$namaLaporan' 
                group by left(coa.noaccount,6)
                )as x  on x.noaccount = left(mp.noaccount,6)
                where mp.kodeexternal='3' 
                and sk.statusenabled=true  --and mp.reportdisplay='$namaLaporan'
                and left(mp.noaccount,1) in ($namaLaporan) and mp.statusenabled=true";

        $sql4 = "select mp.noaccount,'---------' || mp.namaaccount, mp.namaexternal, x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(coa.noaccount,9) as noaccount, 
                sum(pjd.hargasatuand) as debet,sum(pjd.hargasatuank) as kredit  
                from chartofaccount_m as coa 
                INNER JOIN postingjurnald_t as pjd ON pjd.objectaccountfk= coa.id
                INNER JOIN postingjurnal_t as pj on pj.norec=pjd.norecrelated
                where coa.kdprofile = $idProfile and pj.tglbuktitransaksi between '$tglAwal' and '$tglAkhir'
                 --and coa.reportdisplay='$namaLaporan' 
                group by left(coa.noaccount,9)
                )as x  on x.noaccount = left(mp.noaccount,9)
                where mp.kodeexternal ='4'
                and sk.statusenabled=true  --and mp.reportdisplay='$namaLaporan'
                and left(mp.noaccount,1) in ($namaLaporan) and mp.statusenabled=true";

        $sql = $sql1 . " union all " . $sql2 . " union all " . $sql3. " union all " . $sql4 ;

        $sqlFinal = "select * from ($sql) as z  ORDER BY z.noaccount";
        $data = DB::select(DB::raw($sqlFinal));

        //saldo Awal
        $sql11 = "select mp.noaccount,mp.namaaccount,x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(mp.noaccount,1) as kdmap, 
                sum(pj.hargasatuand) as debet,sum(pj.hargasatuank) as kredit  
                from chartofaccount_m as mp
                INNER JOIN postingsaldoawal_t as pj ON pj.objectaccountfk= mp.id
                where mp.kdprofile = $idProfile and pj.ym='$tgltgl'
                group by left(mp.noaccount,1)
                )as x  on x.kdmap = left(mp.noaccount,1)
                where mp.kodeexternal='1' 
                and left(mp.noaccount,1) in ($namaLaporan) 
                and sk.statusenabled=true and mp.statusenabled=true";
        $sql22 = "select mp.noaccount,'---'  || mp.namaaccount,x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(mp.noaccount,3) as kdmap, 
                sum(pj.hargasatuand) as debet,sum(pj.hargasatuank) as kredit  
                from chartofaccount_m as mp
                INNER JOIN postingsaldoawal_t as pj ON pj.objectaccountfk= mp.id
                where mp.kdprofile = $idProfile and pj.ym='$tgltgl'
                group by left(mp.noaccount,3)
                )as x  on x.kdmap = left(mp.noaccount,3)
                where mp.kodeexternal='2' 
                and left(mp.noaccount,1) in ($namaLaporan)
                and sk.statusenabled=true and mp.statusenabled=true ";
        $sql33 = "select mp.noaccount,'------'  || mp.namaaccount,x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(mp.noaccount,6) as kdmap, 
                sum(pj.hargasatuand) as debet,sum(pj.hargasatuank) as kredit  
                from chartofaccount_m as mp
                INNER JOIN postingsaldoawal_t as pj ON pj.objectaccountfk= mp.id
                where mp.kdprofile = $idProfile and pj.ym='$tgltgl'
                group by left(mp.noaccount,6)
                )as x  on x.kdmap = left(mp.noaccount,6)
                where mp.kodeexternal='3' 
                and left(mp.noaccount,1) in ($namaLaporan)
                and sk.statusenabled=true and mp.statusenabled=true";
        $sql44 = "select mp.noaccount,'--------'  || mp.namaaccount,x.debet-x.kredit  as total
                from chartofaccount_m as mp
                INNER JOIN suratkeputusan_m as sk on sk.id=mp.suratkeputusanfk
                left join
                (select left(mp.noaccount,9) as kdmap, 
                sum(pj.hargasatuand) as debet,sum(pj.hargasatuank) as kredit  
                from chartofaccount_m as mp
                INNER JOIN postingsaldoawal_t as pj ON pj.objectaccountfk= mp.id
                where mp.kdprofile = $idProfile and pj.ym='$tgltgl'
                group by left(mp.noaccount,9)
                )as x  on x.kdmap = left(mp.noaccount,9)
                where mp.kodeexternal is null
                and left(mp.noaccount,1) in ($namaLaporan)
                and sk.statusenabled=true and mp.statusenabled=true";

        $sql2 = $sql11 . " union all " . $sql22 . " union all " . $sql33 . " union all " . $sql44 ;

        $sqlFinal2= "select * from ($sql2) as z  ORDER BY z.noaccount";
        $data2 = DB::select(DB::raw($sqlFinal2));

        $result =[];
        $total=0;
        $total2=0;
        foreach ($data as $item){
            $total=0;
            $total2=0;
            foreach ($data2 as $itm){
                if ($item->noaccount == $itm->noaccount){
                    $total2 = $itm->total;
                    if ((float)$itm->total < 0){
                        $total2 = $total2 * (-1);
                    }
                }
            }
            $total = $item->total;
            if ((float)$item->total < 0){
                $total = $total * (-1);
            }
            $result[] = array(
                'kdmap' => $item->noaccount,
                'nomap' => $item->namaexternal,
                'namamap' => $item->namaaccount,
                'total' => $total2,
                'total2' => $total,
                'total3' => $total2 + $total ,
            );
        }

        $pageWidth = 950;                     
        $dataReport = array (
            'namaprofile' => $profile->namalengkap,
            'alamat' => $profile->alamatlengkap,
            'user' => $request['user'],
            'datas' => $result,
            'periode' => $tglAkhir,
            'tanggal' => $tglAyeuna,            
        );

        // $datau = substr($result[0]['kdmap'],0);
        // dd(
        //     $datau
        // );
        return view('report.keuangan.labarugi',
            compact('dataReport', 'pageWidth','profile'));
    }

    public function cetakSuratJaminanPelayanan(Request $r){
        $kdProfile = (int) $this->settingDataFixed('KdProfileAktif', 39);
        $profile = collect(DB::select("
            select * from profile_m where statusenabled = true
        "))->first();
        $pageWidth = 950;
        $noregistrasi = $r['noregistrasi'];
        $datas = collect(DB::select("
            SELECT  pd.tglregistrasi,to_char(pd.tglregistrasi, 'YYYY/MM/DD') || '/' || pd.noregistrasi AS nomor,pm.nocm,
                    pd.noregistrasi,pm.namapasien,alm.alamatlengkap,pg.namalengkap AS dokter,kp.kelompokpasien,rkn.namarekanan,
                    kp.namaexternal AS jenis,CASE WHEN ru.objectdepartemenfk = 18 THEN 'RAWAT JALAN' 
                    WHEN ru.objectdepartemenfk = 24 THEN 'GAWAT DARURAT'
                    WHEN ru.objectdepartemenfk = 16 THEN 'RAWAT INAP'
                    ELSE dp.namadepartemen END AS instalasi,ru.namaruangan,pd.objectpegawaifk
            FROM pasiendaftar_t AS pd
            LEFT JOIN ruangan_m AS ru ON ru.id = pd.objectruanganlastfk
            LEFT JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
            INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk
            LEFT JOIN alamat_m AS alm ON alm.nocmfk = pm.id
            LEFT JOIN jeniskelamin_m AS jk ON jk.id = pm.objectjeniskelaminfk
            LEFT JOIN departemen_m AS dp ON dp.id = ru.objectdepartemenfk
            LEFT JOIN kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk
            LEFT JOIN rekanan_m AS rkn ON rkn.id = pd.objectrekananfk
            WHERE pd.statusenabled = true AND pd.kdprofile = $kdProfile AND pd.noregistrasi = '$noregistrasi'
        "))->first();

        if (empty($datas)) {
            echo 'Data Tidak ada';
            die;
        }

        return view(
            'report.pendaftaran.suratjaminanpelayanan',
            compact('datas', 'pageWidth', 'r', 'profile')
        );
    }

    public function cetakPegawai(Request $r) {
        $kdProfile = (int)$r['kdprofile'];
        $raw = collect(DB::select("
            SELECT pg.nip, pg.nosip,pg.namalengkap,jk.jeniskelamin,pg.tgllahir
            FROM pegawai_m AS pg                        
            LEFT  JOIN jeniskelamin_m AS jk ON jk.id=pg.objectjeniskelaminfk 
            WHERE pg.id = '$r[reg]'
        "))->first();
        if(!empty($raw)){
            $raw->umur = $this->getAge($raw->tgllahir ,date('Y-m-d'));
        }else{
            echo 'Data Tidak ada ';
            return;
        }

        $pageWidth = 950;
        $now =  $this->getDateTime();

        return view('report.pdf.infopegawai',
            compact('raw', 'pageWidth','r','now'));

    }

    public function cetakHasilLabManual(Request $r)
    {
        $kdProfile = (int) $this->settingDataFixed('KdProfileAktif', 35);
        $profile = collect(DB::select("
            select * from profile_m where statusenabled = true
        "))->first();
        $pageWidth = 950;
        $datas = collect(DB::select("
        SELECT
        * 
        FROM (
            SELECT DISTINCT
            pp.tglpelayanan,
            maps.nourutjenispemeriksaan,
            maps.nourutdetail,
            pg3.namalengkap AS DokterPelayanan,
            rj.namaruangan AS ruanganperejuk,
            case when rj2.namaruangan is null then rj.namaruangan else rj2.namaruangan end AS ruanganasal,
            pm.nocm,
            pm.noidentitas,
            pm.paspor,
            pm.nohp,
            ng.namanegara,
            pd.noregistrasi,
            so.noorder,
            pm.namapasien,
            alm.alamatlengkap,
            kp.kelompokpasien,
            rkn.namarekanan,
            pd.tglregistrasi,
            to_char( pd.tglregistrasi, 'DD-MM-YYYY' ) AS tglRegiss,
            pp.tglpelayanan AS tglawal,
            pg.namalengkap AS pengorder,
            pg6.namalengkap AS dokterperiksa,
            pg2.namalengkap AS dpjp,
            pm.tgllahir,
            to_char( pm.tgllahir, 'DD-MM-YYYY' ) AS tgllahirs,
            pp.noregistrasifk AS norec_apd,
            djp.detailjenisproduk,
            pp.produkfk,
            prd.namaproduk,
            maps.detailpemeriksaan,
            case when maps.memohasil is null then '' else maps.memohasil end memohasil,
            maps.nourutdetail,
            maps.satuanstandarfk,
            ss.satuanstandar,
            nn.nilaitext,
            nn.nilaimin,
            nn.nilaimax,
            CASE 
                WHEN hh.hasil IS NULL THEN '' 
                WHEN hh.FLAG = 'Y' THEN '*   ' || hh.hasil 
                ELSE hh.hasil 
		    END AS hasil,
            hh.keterangan as keterangan_lab,
            CASE WHEN hh.FLAG = 'Y' THEN '*' ELSE '' END AS stathasil,
            hh.hasil as hasilawal,
            maps.ID AS map_id,
            hh.norec AS norec_hasil,
            jk.jeniskelamin,
            apd.tglmasuk AS tglverif,
            hh.tglhasil AS tglakhir,
            ( 'Tgl Selesai  :  ' || hh.tglhasil || '          (-)         Tgl. Mulai :  ' || pp.tglpelayanan || '    (=)    Durasi :  ' || ( hh.tglhasil - pp.tglpelayanan ) ) AS tat,
            hh.flag,pg5.namalengkap as dokterpenanggungjawab,
            CASE WHEN rj.objectdepartemenfk = 18 THEN 'RAWAT JALAN' WHEN rj.objectdepartemenfk = 16 THEN 'RAWAT INAP' WHEN rj.objectdepartemenfk = 24 THEN 'GAWAT DARURAT' ELSE 'PENUNJANG' END AS jeniskunjungan,
            CASE WHEN kmr.namakamar IS NULL THEN '-' ELSE kmr.namakamar END AS namakamar,CASE WHEN ttr.nomorbed IS NULL THEN '-' ELSE CAST(ttr.nomorbed AS VARCHAR) END AS nomorbed,
            CASE WHEN so.tglorder IS NULL THEN apd.tglmasuk ELSE so.tglorder END AS tglorder,
            EXTRACT(YEAR FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Thn ' ||
            EXTRACT(MONTH FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Bln ' ||
            EXTRACT(DAY FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Hr' AS umur,pg4.namalengkap AS dokter
            FROM pelayananpasien_t AS pp
            INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk
            INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk
            LEFT JOIN strukorder_t AS so ON so.norec = pp.strukorderfk
            LEFT JOIN ruangan_m AS rj ON pd.objectruanganlastfk = rj.id 
            LEFT JOIN ruangan_m AS rj2 ON rj2.id = so.objectruanganfk
            INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk
            LEFT JOIN jeniskelamin_m AS jk ON jk.id = pm.objectjeniskelaminfk
            LEFT JOIN alamat_m AS alm ON alm.nocmfk = pm.id 
            LEFT JOIN kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk
            LEFT JOIN rekanan_m AS rkn ON rkn.id = pd.objectrekananfk
            LEFT JOIN pegawai_m AS pg ON pg.id = so.objectpegawaiorderfk
            LEFT JOIN pegawai_m AS pg1 ON pg1.id = apd.objectpegawaifk
            LEFT JOIN pegawai_m AS pg2 ON pg2.id = pd.objectpegawaifk
            LEFT JOIN negara_m AS ng ON ng.id = pm.objectnegarafk
            INNER JOIN produk_m AS prd ON prd.id = pp.produkfk
            LEFT JOIN pelayananpasienpetugas_t AS p3 ON pp.norec = p3.pelayananpasien
            INNER JOIN detailjenisproduk_m AS djp ON djp.id = prd.objectdetailjenisprodukfk
            INNER JOIN maphasillab_m AS maps ON maps.produkfk = prd.id 
            INNER JOIN maphasillabdetail_m AS maps2 ON maps2.maphasilfk = maps.id 
            AND maps2.jeniskelaminfk = '$r[objectjeniskelaminfk]' 
            AND maps2.kelompokumurfk IN ( SELECT ID FROM kelompokumur_m kuu WHERE $r[umur] BETWEEN kuu.umurmin AND kuu.umurmax )
            LEFT JOIN pegawai_m AS pg3 ON pg3.id = p3.objectpegawaifk AND p3.objectpegawaifk = '4'
            INNER JOIN nilainormal_m AS nn ON nn.id = maps2.nilainormalfk
            LEFT JOIN satuanstandar_m AS ss ON ss.id = maps.satuanstandarfk
            LEFT JOIN hasillaboratorium_t AS hh ON hh.norecpelayanan = pp.norec 
            AND pp.noregistrasifk = hh.noregistrasifk 
            AND maps.detailpemeriksaan = hh.detailpemeriksaan
            LEFT JOIN kamar_m AS kmr ON kmr.id = apd.objectkamarfk
            LEFT JOIN tempattidur_m AS ttr ON ttr.id = apd.nobed
            left join pegawai_m  as pg4 on pg4.id = hh.pegawaifk
            left join pegawai_m  as pg5 on pg5.id = hh.objectdokterfk
            left join pegawai_m  as pg6 on pg6.id = hh.objectpemeriksafk
            WHERE
                pp.noregistrasifk = '$r[norec]' 
                AND hh.hasil IS NOT NULL 
                AND pp.norec IN ($r[strNorecPP]) 
        ) AS DATA 
        ORDER BY
            DATA.nourutjenispemeriksaan ASC
        "));
        if (count($datas) == 0) {
            echo '
                <script language="javascript">
                    window.alert("Hasil belum ada / hasil tidak ditemukan");
                    window.close()
                </script>
            ';
            die;
        }
        // dd(substr($datas[0]->hasil,0,1));
        foreach ($datas as $data) {
            if ($data->flag == 'Y') {
                $lenghiji = strlen($data->hasilawal);
                $lengdua = strlen($data->nilaitext);
                if ($lenghiji > $lengdua) {
                    if(!empty($data->nilaitext)) {
                        if (strpos($data->hasilawal, $data->nilaitext) !== FALSE) {
                            $data->hasil = $data->hasilawal;
                        }
                    }
                    
                } else {
                    if(!empty($data->hasilawal)) {
                        if (strpos($data->nilaitext, $data->hasilawal) !== FALSE) {
                            $data->hasil = $data->hasilawal;
                        }
                    }
                }
            }
        }
        $header = $datas->groupBy('detailjenisproduk');
        $dataReport = array(
            'namaprofile' => $profile->namalengkap,
            'alamat' => $profile->alamatlengkap,
            // 'user' => $user,
            'datas' => $data,
        );
        
        return view(
            'report.lab.hasil-lab-manual',
            compact('datas', 'header', 'pageWidth', 'r', 'profile')
        );
    }

    function saveDokumenKlaim($pdf, $request) {
        ini_set('max_execution_time', 2000);
        $profile = collect(DB::select("select * from profile_m where statusenabled = true"))->first();
        $content = $pdf->download()->getOriginalContent();

        $path = 'dokumen_klaim/'.$request['isberkasnoreg'];
        DB::beginTransaction();
        try {
            $savePath = public_path($path);
            \File::makeDirectory($savePath, 0755, true, true);
            $namafile = $request['namafile'].'_'.$request['isberkasnoreg'].'.pdf';
            $public_path = $savePath."/".$namafile;
            $pdf->save($public_path);
            // $pdf->render();
            // $pdf->stream($public_path);
            
            $dataRegistrasi = \DB::table('pasiendaftar_t')->where('noregistrasi', $request['isberkasnoreg'])->first();
            $dataInsert = array(
                "norec" => substr(Uuid::generate(), 0, 32),
                "kdprofile" => $profile->id,
                "statusenabled" => true,
                "filename" => $namafile,
                "filepath" => $path.'/'.$namafile,
                "nocmfk" => $dataRegistrasi->nocmfk,
                "noregistrasifk" => $dataRegistrasi->norec,
                "documentklaimfk" => $request['iddok'],
                "tglupload" => date('Y-m-d H:i:s'),
            );
            DB::table('dokklaim_t')->updateOrInsert(["filename" => $namafile], $dataInsert);

            // echo '
            // <script language="javascript">
            //     window.close()
            // </script>';
            // die;
            $transStatus = true;
        } catch (\Exception $e) {
            // echo '
            // <script language="javascript">
            //     window.alert("Gagal.");
            //     window.close()
            // </script>';
            // die;
            $transStatus = false;
            $transMessage = $e->getMessage();
        }
        if ($transStatus) {
            $transMessage = 'Simpan Berhasil';
            DB::commit();
            $result = array(
                "status" => 201,
                "message" => $transMessage,
                "as" => 'mr_adhyy@epic',
            );
        } else {
            
            DB::rollBack();
            $result = array(
                "status" => 400,
                "message" => $transMessage,
                "as" => 'mr_adhyy@epic',
            );
        }
        return $this->setStatusCode($result['status'])->respond($result, $transMessage);
    }

    public function cetakHasilLabAll(Request $r)
    {
        $arr_norec = explode (",",$r->strnorecpp);
        $kdProfile = (int) $this->settingDataFixed('KdProfileAktif', 39);
        $profile = collect(DB::select("
            select * from profile_m where statusenabled = true
        "))->first();
        $pageWidth = 950;
        $head = array();

        for ($i=0; $i < count($arr_norec); $i++) { 
            $res = collect(DB::select("
                SELECT
                * 
                FROM (
                    SELECT DISTINCT
                    pp.tglpelayanan,
                    maps.nourutjenispemeriksaan,
                    maps.nourutdetail,
                    pg3.namalengkap AS DokterPelayanan,
                    rj.namaruangan AS ruanganperejuk,
                    case when rj2.namaruangan is null then rj.namaruangan else rj2.namaruangan end AS ruanganasal,
                    pm.nocm,
                    pm.noidentitas,
                    pm.paspor,
                    pm.nohp,
                    ng.namanegara,
                    pd.noregistrasi,
                    so.noorder,
                    pm.namapasien,
                    alm.alamatlengkap,
                    kp.kelompokpasien,
                    rkn.namarekanan,
                    pd.tglregistrasi,
                    to_char( pd.tglregistrasi, 'DD-MM-YYYY' ) AS tglRegiss,
                    pp.tglpelayanan AS tglawal,
                    pg.namalengkap AS pengorder,
                    pg6.namalengkap AS dokterperiksa,
                    pg6.qrcode as qrcodedokterperiksa,
                    pg2.namalengkap AS dpjp,
                    pm.tgllahir,
                    to_char( pm.tgllahir, 'DD-MM-YYYY' ) AS tgllahirs,
                    pp.noregistrasifk AS norec_apd,
                    djp.detailjenisproduk,
                    pp.produkfk,
                    prd.namaproduk,
                    maps.detailpemeriksaan,
                    case when maps.memohasil is null then '' else maps.memohasil end memohasil,
                    maps.nourutdetail,
                    maps.satuanstandarfk,
                    ss.satuanstandar,
                    nn.nilaitext,
                    nn.nilaimin,
                    nn.nilaimax,
                    CASE 
                        WHEN hh.hasil IS NULL THEN '' 
                        WHEN hh.FLAG = 'Y' THEN '*   ' || hh.hasil 
                        ELSE hh.hasil 
                    END AS hasil,
                    hh.keterangan as keterangan_lab,
                    CASE WHEN hh.FLAG = 'Y' THEN '*' ELSE '' END AS stathasil,
                    hh.hasil as hasilawal,
                    maps.ID AS map_id,
                    hh.norec AS norec_hasil,
                    jk.jeniskelamin,
                    apd.tglmasuk AS tglverif,
                    hh.tglhasil AS tglakhir,
                    ( 'Tgl Selesai  :  ' || hh.tglhasil || '          (-)         Tgl. Mulai :  ' || pp.tglpelayanan || '    (=)    Durasi :  ' || ( hh.tglhasil - pp.tglpelayanan ) ) AS tat,
                    hh.flag,pg5.namalengkap as dokterpenanggungjawab,pg5.qrcode as qrcodedokterpenanggungjawab,
                    CASE WHEN rj.objectdepartemenfk = 18 THEN 'RAWAT JALAN' WHEN rj.objectdepartemenfk = 16 THEN 'RAWAT INAP' WHEN rj.objectdepartemenfk = 24 THEN 'GAWAT DARURAT' ELSE 'PENUNJANG' END AS jeniskunjungan,
                    CASE WHEN kmr.namakamar IS NULL THEN '-' ELSE kmr.namakamar END AS namakamar,CASE WHEN ttr.nomorbed IS NULL THEN '-' ELSE CAST(ttr.nomorbed AS VARCHAR) END AS nomorbed,
                    CASE WHEN so.tglorder IS NULL THEN apd.tglmasuk ELSE so.tglorder END AS tglorder,
                    EXTRACT(YEAR FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Thn ' ||
                    EXTRACT(MONTH FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Bln ' ||
                    EXTRACT(DAY FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Hr' AS umur,pg4.namalengkap AS dokter, hh.catatan
                    FROM pelayananpasien_t AS pp
                    INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk
                    INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk
                    LEFT JOIN strukorder_t AS so ON so.norec = pp.strukorderfk
                    LEFT JOIN ruangan_m AS rj ON pd.objectruanganlastfk = rj.id 
                    LEFT JOIN ruangan_m AS rj2 ON rj2.id = so.objectruanganfk
                    INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk
                    LEFT JOIN jeniskelamin_m AS jk ON jk.id = pm.objectjeniskelaminfk
                    LEFT JOIN alamat_m AS alm ON alm.nocmfk = pm.id 
                    LEFT JOIN kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk
                    LEFT JOIN rekanan_m AS rkn ON rkn.id = pd.objectrekananfk
                    LEFT JOIN pegawai_m AS pg ON pg.id = so.objectpegawaiorderfk
                    LEFT JOIN pegawai_m AS pg1 ON pg1.id = apd.objectpegawaifk
                    LEFT JOIN pegawai_m AS pg2 ON pg2.id = pd.objectpegawaifk
                    LEFT JOIN negara_m AS ng ON ng.id = pm.objectnegarafk
                    INNER JOIN produk_m AS prd ON prd.id = pp.produkfk
                    LEFT JOIN pelayananpasienpetugas_t AS p3 ON pp.norec = p3.pelayananpasien
                    INNER JOIN detailjenisproduk_m AS djp ON djp.id = prd.objectdetailjenisprodukfk
                    INNER JOIN maphasillab_m AS maps ON maps.produkfk = prd.id 
                    INNER JOIN maphasillabdetail_m AS maps2 ON maps2.maphasilfk = maps.id 
                    AND maps2.kelompokumurfk IN ( SELECT ID FROM kelompokumur_m kuu WHERE 3406 BETWEEN kuu.umurmin AND kuu.umurmax )
                    LEFT JOIN pegawai_m AS pg3 ON pg3.id = p3.objectpegawaifk AND p3.objectpegawaifk = '4'
                    INNER JOIN nilainormal_m AS nn ON nn.id = maps2.nilainormalfk
                    LEFT JOIN satuanstandar_m AS ss ON ss.id = maps.satuanstandarfk
                    LEFT JOIN hasillaboratorium_t AS hh ON hh.norecpelayanan = pp.norec 
                    AND pp.noregistrasifk = hh.noregistrasifk 
                    AND maps.detailpemeriksaan = hh.detailpemeriksaan
                    LEFT JOIN kamar_m AS kmr ON kmr.id = apd.objectkamarfk
                    LEFT JOIN tempattidur_m AS ttr ON ttr.id = apd.nobed
                    left join pegawai_m  as pg4 on pg4.id = hh.pegawaifk
                    left join pegawai_m  as pg5 on pg5.id = hh.objectdokterfk
                    left join pegawai_m  as pg6 on pg6.id = hh.objectpemeriksafk
                    WHERE
                        hh.hasil IS NOT NULL 
                        AND pp.norec IS NOT NULL
                        AND pp.norec = '$arr_norec[$i]'
                ) AS DATA 
                ORDER BY
                    DATA.nourutjenispemeriksaan ASC
                    "));
                    foreach ($res as $data) {
                        if ($data->flag == 'Y') {
                            $lenghiji = strlen($data->hasilawal);
                            $lengdua = strlen($data->nilaitext);
                            if ($lenghiji > $lengdua) {
                                if(!empty($data->nilaitext)) {
                                    if (strpos($data->hasilawal, $data->nilaitext) !== FALSE) {
                                        $data->hasil = $data->hasilawal;
                                    }
                                }
                                
                            } else {
                                if(!empty($data->hasilawal)) {
                                    if (strpos($data->nilaitext, $data->hasilawal) !== FALSE) {
                                        $data->hasil = $data->hasilawal;
                                    }
                                }
                            }
                        }
                    }
                    $head[$i] = $res->groupBy('detailjenisproduk');
                    $headi[$i] = $res->groupBy('detailjenisproduk');
        }
        if (count($res) == 0) {
            echo '
                <script language="javascript">
                    window.alert("Ada hasil yang belum lengkap");
                    window.close()
                </script>
            ';
            die;
        }
        
         $cek = $res[0];
         if ($cek->qrcodedokterperiksa == null) {
            $cek->qrcodedokterperiksa =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($cek->dokterperiksa));
        }
        if ($cek->qrcodedokterpenanggungjawab == null) {
            $cek->qrcodedokterpenanggungjawab =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($cek->dokterpenanggungjawab));
        }
        
         $head = collect($head)->filter( function ( $item ) { 
            return strlen( $item ) > 100; 
        }); 
          
        $dataReport = array(
            'namaprofile' => $profile,
            'alamat' => $profile->alamatlengkap,
            'res' => $res,
            'head' => $head,
            'cek' => $cek,
        );
        // dd($dataReport);

        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        if(isset($r["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.lab.hasil-lab-all-dom', array(
                'res' => $res,
                'head' => $head,
                'cek' => $cek,
                'headi' => $headi,
                'pageWidth' => $pageWidth,
                'r' => $r,
                'profile' => $profile,
                'image' => $image,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $r);
            return;
        }else{
            return view('report.lab.hasil-lab-all', compact('res', 'head', 'cek', 'headi', 'pageWidth', 'r', 'profile', 'image'));
        }
    }

    public function cetakHasilLabAllDOM(Request $r)
    {
        $arr_norec = explode (",",$r->strnorecpp);
        $kdProfile = (int) $this->settingDataFixed('KdProfileAktif', 39);
        $profile = collect(DB::select("
            select * from profile_m where statusenabled = true
        "))->first();
        $pageWidth = 950;
        $noregistrasi = $r->noregistrasi;
        $head = array();

        for($a = 1; $a <= 30; $a++){
            $res['d'.$a] = collect(DB::select("
                SELECT
                * 
                FROM (
                    SELECT DISTINCT
                    pp.tglpelayanan,
                    maps.nourutjenispemeriksaan,
                    maps.nourutdetail,
                    pg3.namalengkap AS DokterPelayanan,
                    rj.namaruangan AS ruanganperejuk,
                    case when rj2.namaruangan is null then rj.namaruangan else rj2.namaruangan end AS ruanganasal,
                    pm.nocm,
                    pm.noidentitas,
                    pm.paspor,
                    pm.nohp,
                    ng.namanegara,
                    pd.noregistrasi,
                    so.noorder,
                    pm.namapasien,
                    alm.alamatlengkap,
                    kp.kelompokpasien,
                    rkn.namarekanan,
                    pd.tglregistrasi,
                    to_char( pd.tglregistrasi, 'DD-MM-YYYY' ) AS tglRegiss,
                    pp.tglpelayanan AS tglawal,
                    pg.namalengkap AS pengorder,
                    pg6.namalengkap AS dokterperiksa,
                    pg6.qrcode as qrcodedokterperiksa,
                    pg2.namalengkap AS dpjp,
                    pm.tgllahir,
                    to_char( pm.tgllahir, 'DD-MM-YYYY' ) AS tgllahirs,
                    pp.noregistrasifk AS norec_apd,
                    djp.detailjenisproduk,
                    pp.produkfk,
                    prd.namaproduk,
                    maps.detailpemeriksaan,
                    case when maps.memohasil is null then '' else maps.memohasil end memohasil,
                    maps.nourutdetail,
                    maps.satuanstandarfk,
                    ss.satuanstandar,
                    nn.nilaitext,
                    nn.nilaimin,
                    nn.nilaimax,
                    CASE 
                        WHEN hh.hasil IS NULL THEN '' 
                        WHEN hh.FLAG = 'Y' THEN '*   ' || hh.hasil 
                        ELSE hh.hasil 
                    END AS hasil,
                    hh.keterangan as keterangan_lab,
                    CASE WHEN hh.FLAG = 'Y' THEN '*' ELSE '' END AS stathasil,
                    hh.hasil as hasilawal,
                    maps.ID AS map_id,
                    hh.norec AS norec_hasil,
                    jk.jeniskelamin,
                    apd.tglmasuk AS tglverif,
                    hh.tglhasil AS tglakhir,
                    ( 'Tgl Selesai  :  ' || hh.tglhasil || '          (-)         Tgl. Mulai :  ' || pp.tglpelayanan || '    (=)    Durasi :  ' || ( hh.tglhasil - pp.tglpelayanan ) ) AS tat,
                    hh.flag,pg5.namalengkap as dokterpenanggungjawab,pg5.qrcode as qrcodedokterpenanggungjawab,
                    CASE WHEN rj.objectdepartemenfk = 18 THEN 'RAWAT JALAN' WHEN rj.objectdepartemenfk = 16 THEN 'RAWAT INAP' WHEN rj.objectdepartemenfk = 24 THEN 'GAWAT DARURAT' ELSE 'PENUNJANG' END AS jeniskunjungan,
                    CASE WHEN kmr.namakamar IS NULL THEN '-' ELSE kmr.namakamar END AS namakamar,CASE WHEN ttr.nomorbed IS NULL THEN '-' ELSE CAST(ttr.nomorbed AS VARCHAR) END AS nomorbed,
                    CASE WHEN so.tglorder IS NULL THEN apd.tglmasuk ELSE so.tglorder END AS tglorder,
                    EXTRACT(YEAR FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Thn ' ||
                    EXTRACT(MONTH FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Bln ' ||
                    EXTRACT(DAY FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Hr' AS umur,pg4.namalengkap AS dokter, hh.catatan
                    FROM pelayananpasien_t AS pp
                    INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk
                    INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk
                    LEFT JOIN strukorder_t AS so ON so.norec = pp.strukorderfk
                    LEFT JOIN ruangan_m AS rj3 ON rj3.id = apd.objectruanganfk
                    LEFT JOIN ruangan_m AS rj ON pd.objectruanganlastfk = rj.id 
                    LEFT JOIN ruangan_m AS rj2 ON rj2.id = so.objectruanganfk
                    INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk
                    LEFT JOIN jeniskelamin_m AS jk ON jk.id = pm.objectjeniskelaminfk
                    LEFT JOIN alamat_m AS alm ON alm.nocmfk = pm.id 
                    LEFT JOIN kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk
                    LEFT JOIN rekanan_m AS rkn ON rkn.id = pd.objectrekananfk
                    LEFT JOIN pegawai_m AS pg ON pg.id = so.objectpegawaiorderfk
                    LEFT JOIN pegawai_m AS pg1 ON pg1.id = apd.objectpegawaifk
                    LEFT JOIN pegawai_m AS pg2 ON pg2.id = pd.objectpegawaifk
                    LEFT JOIN negara_m AS ng ON ng.id = pm.objectnegarafk
                    INNER JOIN produk_m AS prd ON prd.id = pp.produkfk
                    LEFT JOIN pelayananpasienpetugas_t AS p3 ON pp.norec = p3.pelayananpasien
                    INNER JOIN detailjenisproduk_m AS djp ON djp.id = prd.objectdetailjenisprodukfk
                    INNER JOIN maphasillab_m AS maps ON maps.produkfk = prd.id 
                    INNER JOIN maphasillabdetail_m AS maps2 ON maps2.maphasilfk = maps.id 
                    AND maps2.kelompokumurfk IN ( SELECT ID FROM kelompokumur_m kuu WHERE 3406 BETWEEN kuu.umurmin AND kuu.umurmax )
                    LEFT JOIN pegawai_m AS pg3 ON pg3.id = p3.objectpegawaifk AND p3.objectpegawaifk = '4'
                    INNER JOIN nilainormal_m AS nn ON nn.id = maps2.nilainormalfk
                    LEFT JOIN satuanstandar_m AS ss ON ss.id = maps.satuanstandarfk
                    LEFT JOIN hasillaboratorium_t AS hh ON hh.norecpelayanan = pp.norec 
                    AND pp.noregistrasifk = hh.noregistrasifk 
                    AND maps.detailpemeriksaan = hh.detailpemeriksaan
                    LEFT JOIN kamar_m AS kmr ON kmr.id = apd.objectkamarfk
                    LEFT JOIN tempattidur_m AS ttr ON ttr.id = apd.nobed
                    left join pegawai_m  as pg4 on pg4.id = hh.pegawaifk
                    left join pegawai_m  as pg5 on pg5.id = hh.objectdokterfk
                    left join pegawai_m  as pg6 on pg6.id = hh.objectpemeriksafk
                    WHERE
                        hh.hasil IS NOT NULL 
                        AND pp.norec IS NOT NULL
                        AND pd.noregistrasi = '$noregistrasi'
                        AND rj3.id = 575
                ) AS DATA 
                ORDER BY
                    DATA.nourutjenispemeriksaan ASC
                    "));
                    foreach ($res['d'.$a] as $data) {
                        if ($data->flag == 'Y') {
                            $lenghiji = strlen($data->hasilawal);
                            $lengdua = strlen($data->nilaitext);
                            if ($lenghiji > $lengdua) {
                                if(!empty($data->nilaitext)) {
                                    if (strpos($data->hasilawal, $data->nilaitext) !== FALSE) {
                                        $data->hasil = $data->hasilawal;
                                    }
                                }
                                
                            } else {
                                if(!empty($data->hasilawal)) {
                                    if (strpos($data->nilaitext, $data->hasilawal) !== FALSE) {
                                        $data->hasil = $data->hasilawal;
                                    }
                                }
                            }
                        }
                    }
                    $head = $res['d'.$a]->groupBy('detailjenisproduk');
                    $headi= $res['d'.$a]->groupBy('detailjenisproduk');
        }
        if (count($res) == 0) {
            echo '
                <script language="javascript">
                    window.alert("Ada hasil yang belum lengkap");
                    window.close()
                </script>
            ';
            die;
        }
        
        
         $cek = $res['d1'][0];
         if ($cek->qrcodedokterperiksa == null) {
            $cek->qrcodedokterperiksa =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($cek->dokterperiksa));
        }
        if ($cek->qrcodedokterpenanggungjawab == null) {
            $cek->qrcodedokterpenanggungjawab =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($cek->dokterpenanggungjawab));
        }
        
         $head = collect($head)->filter( function ( $item ) { 
            return strlen( $item ) > 100; 
        });

          
        $dataReport = array(
            'namaprofile' => $profile,
            'alamat' => $profile->alamatlengkap,
            'res' => $res,
            'head' => $head,
            'cek' => $cek,
        );
        // dd($dataReport);

        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        if(isset($r["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.lab.hasil-lab-all-dom', array(
                'res' => $res,
                'head' => $head,
                'cek' => $cek,
                'headi' => $headi,
                'pageWidth' => $pageWidth,
                'r' => $r,
                'profile' => $profile,
                'image' => $image,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $r);
            return;
        }else{
            return view('report.lab.hasil-lab-all-dom', compact('res', 'head', 'cek', 'headi', 'pageWidth', 'r', 'profile', 'image'));
        }
    }

    public function cetakSuratBayar(Request $request)
    {
        $kdProfile = $request['kdprofile'];
        $nostruk = $request['nostruk'];
        $nama = $request['nama'];
        $profile = collect(DB::select("
            select * from profile_m where id = $kdProfile limit 1
        "))->first();

        $pageWidth = 950;
        $data = collect(DB::select("
            SELECT pd.noregistrasi
            ,ps.namapasien
            ,ep.amount
            ,ep.fee
            ,(ep.amount + ep.fee) as jumlahbayar
            ,ps.namapasien || '/' || ps.nocm AS pasien
            ,ru.namaruangan
            ,pg.namalengkap
            ,sp.noregistrasifk
            ,ps.nocm
            ,pd.tglregistrasi
            ,pd.tglpulang
            ,to_char(sp.tglstruk, 'DD-MM-YYYY') AS tanggal
            ,sp.nostruk 
            ,ep.va_number
            ,ep.qr_code
            ,ep.qr_link
            ,ep.espayproduct_name
            ,ep.type
            ,pg.namalengkap as pegawaipenerima
            ,CASE WHEN ep.expired IS NULL THEN '-' ELSE to_char(ep.expired, 'DD-MM-YYYY HH24:MI:SS') END AS tanggalexpired
            FROM strukpelayanan_t AS sp
            INNER JOIN espaypayment_t AS ep ON ep.order_id = sp.nostruk
            LEFT JOIN pasiendaftar_t AS pd ON pd.norec = sp.noregistrasifk
            LEFT JOIN pasien_m AS ps ON ps.id = pd.nocmfk
            LEFT JOIN ruangan_m AS ru ON ru.id = pd.objectruanganlastfk
            LEFT JOIN pegawai_m as pg ON pg.id = sp.objectpegawaipenerimafk
            WHERE sp.nostruk = '$nostruk'
            AND sp.kdprofile = $kdProfile
            AND sp.statusenabled = true
        "))->first();

        if(empty($data)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $dataReport = array(
            'namaprofile' => $profile->namalengkap,
            'alamat' => $profile->alamatlengkap,
            'user' => $nama,
            'datas' => $data,
        );
        return view(
            'report.kasir.suratperintahbayar',
            compact('dataReport', 'pageWidth', 'profile')
        );
    }

    public static function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = static::penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = static::penyebut($nilai / 10) . " puluh" . static::penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . static::penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = static::penyebut($nilai / 100) . " ratus" . static::penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . static::penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = static::penyebut($nilai / 1000) . " ribu" . static::penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = static::penyebut($nilai / 1000000) . " juta" . static::penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = static::penyebut($nilai / 1000000000) . " milyar" . static::penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = static::penyebut($nilai / 1000000000000) . " trilyun" . static::penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    public static function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim(static::penyebut($nilai));
        } else {
            $hasil = trim(static::penyebut($nilai));
        }
        return $hasil . " Rupiah";
    }

    public static function getUmurna($tgllahir, $tglregis) {
        $data = DB::select(DB::raw("
            SELECT
            EXTRACT (YEAR FROM AGE('$tglregis', '$tgllahir' )) || ' Tahun ' as thnumur,
            EXTRACT (MONTH  FROM AGE('$tglregis', '$tgllahir' )) || ' Bulan ' as blnumur, 
            EXTRACT (DAY  FROM  AGE('$tglregis', '$tgllahir' )) || ' Hari' as hrumur
        "));
        $res['umurtahun'] = $data[0]->thnumur;
        $res['umurbulan'] = $data[0]->blnumur;
        $res['umurhari'] = $data[0]->hrumur;
        return $res;
    }

    public function cetakBillingDetail(Request $r) {
        $kdProfile = (int)$r['kdProfile'];
        $noreg = $r['noregistrasi'];
        $pageWidth = 950;
        $QueryTemp = "
        SELECT
        *   
        FROM
            temp_billing_t 
        WHERE
	        noregistrasi = '$noreg' 
            AND tglpelayanan IS NOT NULL 
            AND namaproduk NOT IN ( 'Biaya Administrasi', 'Biaya Materai' ) 
        ORDER BY
            tglpelayanan,
            namaproduk
        ";
        $QueryIdentitas = "
        SELECT DISTINCT
            *
        FROM (
            SELECT
                ps.tgllahir,
                pg.namalengkap AS dokterpj,
                alm.alamatlengkap 
            FROM
                pasiendaftar_t AS pd
                INNER JOIN pasien_m AS ps ON ps.ID = pd.nocmfk
                LEFT JOIN pegawai_m AS pg ON pg.ID = pd.objectpegawaifk
                LEFT JOIN alamat_m AS alm ON alm.ID = ps.ID 
            WHERE
                pd.noregistrasi = '$noreg' 
            GROUP BY
            ps.tgllahir,
            pg.namalengkap,
            alm.alamatlengkap

        UNION ALL

            SELECT
                ps.tgllahir,
                pg.namalengkap AS dokterpj,
                alm.alamatlengkap 
            FROM
                pasiendaftar_t AS pd
                INNER JOIN pasien_m AS ps ON ps.ID = pd.nocmfk
                LEFT JOIN antrianpasiendiperiksa_t AS apd ON apd.noregistrasifk = pd.norec
                LEFT JOIN pegawai_m AS pg ON pg.ID = apd.objectpegawaifk
                LEFT JOIN alamat_m AS alm ON alm.ID = ps.ID 
            WHERE
                pd.noregistrasi = '$noreg' 
            GROUP BY
            ps.tgllahir,
            pg.namalengkap,
            alm.alamatlengkap
        ) AS x  
        ";
        $QueryInstalasi = "
        SELECT DISTINCT
            dp.namadepartemen
        FROM
            pasiendaftar_t as pd
            INNER JOIN antrianpasiendiperiksa_t as apd on apd.noregistrasifk = pd.norec
            INNER JOIN ruangan_m as rg on rg.id = apd.objectruanganfk
            INNER JOIN departemen_m as dp on dp.id = objectdepartemenfk
        WHERE
            noregistrasi = '$noreg' 
        ";
        $QueryPelayanan = "
        SELECT
            pr.namaproduk,
            pp.hargasatuan,
            sum(pp.jumlah) AS jumlah,
            pp.jasa,
            sum((pp.hargasatuan * pp.jumlah) + case when pp.jasa is not null then pp.jasa else 0 end) as total,
            jb.id as id_jb,
            jb.jenisbilling
        FROM
            pasiendaftar_t AS pd
            INNER JOIN antrianpasiendiperiksa_t as apd on apd.noregistrasifk = pd.norec
            INNER JOIN pelayananpasien_t as pp on pp.noregistrasifk = apd.norec
            INNER JOIN produk_m as pr on pr.id = pp.produkfk
            LEFT JOIN jenisbilling_m as jb on jb.id = pr.objectjenisbillfk
        WHERE 
            pd.noregistrasi = '$noreg'
        GROUP BY
            pr.namaproduk,
            pp.hargasatuan,
            pp.jasa,
            jb.jenisbilling,
            jb.id
        ORDER BY
            jb.jenisbilling DESC
        ";
        $billing = collect(DB::select($QueryTemp));
        $identitas = collect(DB::select($QueryIdentitas));
        $instalasi = collect(DB::select($QueryInstalasi));
        $pelayanan = collect(DB::select($QueryPelayanan));
        // return $billing;
        return view('report.kasir.cetakbillingdetail',
            compact('identitas', 'billing', 'instalasi', 'pelayanan', 'pageWidth','r'));
    }

    public static function getTotal($registrasi, $idbilling){
        $data = collect(DB::select("
        SELECT
            SUM(X.total) as total
        FROM
            (
            SELECT
                pr.namaproduk,
                pp.hargasatuan,
                SUM ( pp.jumlah ),
                pp.jasa,
                SUM (( pp.hargasatuan * pp.jumlah ) + CASE WHEN pp.jasa IS NOT NULL THEN pp.jasa ELSE 0 END ) AS total,
                jb.jenisbilling 
            FROM
                pasiendaftar_t AS pd
                INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.noregistrasifk = pd.norec
                INNER JOIN pelayananpasien_t AS pp ON pp.noregistrasifk = apd.norec
                INNER JOIN produk_m AS pr ON pr.ID = pp.produkfk
                LEFT JOIN jenisbilling_m AS jb ON jb.ID = pr.objectjenisbillfk 
            WHERE
                pd.noregistrasi = '$registrasi'
                AND jb.ID = '$idbilling' 
            GROUP BY
                pr.namaproduk,
                pp.hargasatuan,
                pp.jasa,
                jb.jenisbilling 
            ORDER BY
            jb.jenisbilling ASC 
            ) AS X 
        "));
        $data['total'] = $data[0]->total;
        return $data;
    }

    public static function getTotalTagihan($registrasi){
        $data = collect(DB::select("
        SELECT
            SUM(X.total) as total
        FROM
            (
            SELECT
                pr.namaproduk,
                pp.hargasatuan,
                SUM ( pp.jumlah ),
                pp.jasa,
                SUM (( pp.hargasatuan * pp.jumlah ) + CASE WHEN pp.jasa IS NOT NULL THEN pp.jasa ELSE 0 END ) AS total,
                jb.jenisbilling 
            FROM
                pasiendaftar_t AS pd
                INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.noregistrasifk = pd.norec
                INNER JOIN pelayananpasien_t AS pp ON pp.noregistrasifk = apd.norec
                INNER JOIN produk_m AS pr ON pr.ID = pp.produkfk
                LEFT JOIN jenisbilling_m AS jb ON jb.ID = pr.objectjenisbillfk 
            WHERE
                pd.noregistrasi = '$registrasi'
            GROUP BY
                pr.namaproduk,
                pp.hargasatuan,
                pp.jasa,
                jb.jenisbilling 
            ORDER BY
            jb.jenisbilling ASC 
            ) AS X 
        "));
        $data['total'] = $data[0]->total;
        return $data;
    }

    public function ringkasanPulang(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode as qrcode,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
            if ($z->value != null) {
                $z->value = substr($z->value, strpos($z->value, '~'));
            }
            if($z->emrdfk == 423817){
                $z->value1 =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
            if($z->emrdfk == 423818){
                $z->value2 =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
            if($z->emrdfk == 423819){
                $z->value3 =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
            
            // if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
            //     $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            // }
            
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));


        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-ringkasan-pulang-ranap-dom', array(
                'res' => $res,
                'image' => $image,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-ringkasan-pulang-ranap', compact('res', 'pageWidth'));
        }
    }

    public function uploadringkasanPulang(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        // dd($data);
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $pdf = PDF::loadView('report.cetak-ringkasan-pulang-ranap', compact('res', 'pageWidth'));
        try {
            $pdf->save('relative_path/file.pdf');

            echo '
            <script language="javascript">
                window.alert("Success");
                window.close()
            </script>
        ';
        die;
        } catch (\Throwable $th) {
            echo '
            <script language="javascript">
                window.alert("Gagal");
                window.close()
            </script>
        ';
        die;
        }


        return $pdf->download('RingkasanPulang.pdf');

        // return view('report.cetak-ringkasan-pulang-ranap', compact('res', 'pageWidth'));
    }

    public function asesmenAwalMedisRanap(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        // dd($data);
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }




        // $dataimg = DB::table('emrfoto_t as emrp')
        // ->select('emrp.*')
        //     ->where('emrp.statusenabled', true)
        //     ->where('emrp.kdprofile', $kdProfile)
        //     ->where('emrp.noemrpasienfk', $noemrpasien)
        //     ->where('emrp.emrfk', $request['emrfk'])
        //     ->where('emrp.index', $request['index'])
        //     ->get();
        // dd($dataimg);
        return view('report.cetak-asesmen-awal-medis-ranap', compact('res', 'pageWidth'));
    }
    public function labelRekapApotik(Request $request)
    {
        $nocm = $request['nocm'];
        $norec = $request['norec'];
        $kdProfile = (int) $request['kdprofile'];
        $apoteker = 101232;
        $data = DB::select(DB::raw("
            						SELECT distinct ps.nocm, ps.namapasien,to_char(ps.tgllahir, 'DD/MM/YYYY') as tgllahir,CASE WHEN aa.noantri IS NULL THEN sr.noresep ELSE aa.jenis || '-' || aa.noantri END AS noresep,to_char(sr.tglresep, 'DD-MM-YYYY') as tglresep,pr.namaproduk || ' (' || CAST(pp.jumlah AS VARCHAR) || ')' AS namaproduk,pp.aturanpakai,pp.rke,  
                                    CASE WHEN alm.alamatlengkap is null then '-' else alm.alamatlengkap end as alamat,ps.notelepon,ss.satuanstandar,pp.jumlah,  
                                    CASE WHEN pp.issiang = 't' THEN 'Siang' ELSE '-' END AS siang, CASE WHEN pp.ispagi = 't' THEN 'Pagi' ELSE '-' END AS pagi,  
                                    CASE WHEN pp.ismalam = 't' THEN 'Malam' ELSE '-' END as malam, CASE WHEN pp.issore = 't' THEN 'Sore' ELSE '-' END as sore,  
                                    CASE WHEN pp.keteranganpakai  = '' OR pp.keteranganpakai IS NULL THEN '-' else pp.keteranganpakai END AS keteranganpakai,
                                    ru.namaruangan,dep.namadepartemen,pg.namalengkap as apoteker
                                    from pelayananpasien_t as pp inner join strukresep_t as sr on sr.norec= pp.strukresepfk  
                                    LEFT join produk_m as pr on pr.id = pp.produkfk  
                                    LEFT join antrianpasiendiperiksa_t as apd on apd.norec = pp.noregistrasifk  
                                    left JOIN pegawai_m AS pg ON pg.id = $apoteker
                                    LEFT join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk  
                                    LEFT join pasien_m as ps on ps.id = pd.nocmfk  
                                    left join alamat_m as alm on alm.nocmfk = ps.id  
                                    LEFT JOIN satuanstandar_m as ss on ss.id = pp.satuanviewfk  
                                    LEFT JOIN antrianapotik_t as aa on aa.noresep = sr.noresep  
                                    LEFT JOIN ruangan_m as ru on ru.id = apd.objectruanganfk 
                                    LEFT JOIN departemen_m as dep on dep.id = ru.objectdepartemenfk 
                                    where pp.kdprofile = $kdProfile 
                                    -- and pp.jeniskemasanfk = 2 
                                    and sr.norec ='$norec'        
            "));

        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        // dd($res['d']);
        // dd(isset($res['d'][0]));
        return view('report.cetak-labelrekap-apotik', compact('res'));
    }

    public function labelLabelKecilApotik(Request $request)
    {
        $nocm = $request['nocm'];
        $norec = $request['norec'];
        $apoteker = 101232;
        $kdProfile = (int) $request['kdprofile'];
        $data = DB::select(DB::raw("
            						SELECT distinct ps.nocm, ps.namapasien,to_char(ps.tgllahir, 'DD/MM/YYYY') as tgllahir,CASE WHEN aa.noantri IS NULL THEN sr.noresep ELSE aa.jenis || '-' || aa.noantri END AS noresep,to_char(sr.tglresep, 'DD-MM-YYYY') as tglresep,pr.namaproduk || ' (' || CAST(pp.jumlah AS VARCHAR) || ')' AS namaproduk,pp.aturanpakai,pp.rke,  
                                    CASE WHEN alm.alamatlengkap is null then '-' else alm.alamatlengkap end as alamat,ps.notelepon,ss.satuanstandar,pp.jumlah,  
                                    CASE WHEN pp.issiang = 't' THEN 'Siang' ELSE '-' END AS siang, CASE WHEN pp.ispagi = 't' THEN 'Pagi' ELSE '-' END AS pagi,  
                                    CASE WHEN pp.ismalam = 't' THEN 'Malam' ELSE '-' END as malam, CASE WHEN pp.issore = 't' THEN 'Sore' ELSE '-' END as sore,  
                                    CASE WHEN pp.keteranganpakai  = '' OR pp.keteranganpakai IS NULL THEN '-' else pp.keteranganpakai END AS keteranganpakai,
                                    ru.namaruangan,dep.namadepartemen,pg.namalengkap as apoteker
                                    from pelayananpasien_t as pp inner join strukresep_t as sr on sr.norec= pp.strukresepfk  
                                    LEFT join produk_m as pr on pr.id = pp.produkfk  
                                    LEFT join antrianpasiendiperiksa_t as apd on apd.norec = pp.noregistrasifk  
                                    left JOIN pegawai_m AS pg ON pg.id = $apoteker
                                    LEFT join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk  
                                    LEFT join pasien_m as ps on ps.id = pd.nocmfk  
                                    left join alamat_m as alm on alm.nocmfk = ps.id  
                                    LEFT JOIN satuanstandar_m as ss on ss.id = pp.satuanviewfk  
                                    LEFT JOIN antrianapotik_t as aa on aa.noresep = sr.noresep  
                                    LEFT JOIN ruangan_m as ru on ru.id = apd.objectruanganfk 
                                    LEFT JOIN departemen_m as dep on dep.id = ru.objectdepartemenfk 
                                    where pp.kdprofile = $kdProfile 
                                    -- and pp.jeniskemasanfk = 2 
                                    and sr.norec ='$norec'        
            
                                    -- union all 
        
                                    -- select distinct ps.nocm,ps.namapasien,to_char(ps.tgllahir, 'DD/MM/YYYY') as tgllahir,CASE WHEN aa.noantri IS NULL THEN sr.noresep ELSE aa.jenis || '-' || aa.noantri END AS noresep,to_char(sr.tglresep, 'DD-MM-YYYY') as tglresep,  
                                    -- ' Racikan' || ' (' || CAST(((CAST(pp.qtydetailresep as INTEGER)/CAST(pp.dosis as INTEGER))*CAST(pro.kekuatan as INTEGER)) AS VARCHAR) || ')' AS namaproduk,pp.aturanpakai,pp.rke,  
                                    -- case when alm.alamatlengkap is null then '-' else alm.alamatlengkap end as alamat,ps.notelepon,CASE when jr.jenisracikan IS NULL THEN '' ELSE jr.jenisracikan END AS satuanstandar,  
                                    -- ((CAST(pp.qtydetailresep as INTEGER)/CAST(pp.dosis as INTEGER))*CAST(pro.kekuatan as INTEGER)) as jumlah,  
                                    -- CASE WHEN pp.issiang = 't' THEN 'Siang' ELSE '-' END AS siang, CASE WHEN pp.ispagi = 't' THEN 'Pagi' ELSE '-' END AS pagi,  
                                    -- CASE WHEN pp.ismalam = 't' THEN 'Malam' ELSE '-' END as malam, CASE WHEN pp.issore = 't' THEN 'Sore' ELSE '-' END as sore,  
                                    -- CASE WHEN pp.keteranganpakai  = '' OR pp.keteranganpakai IS NULL THEN '-' else pp.keteranganpakai END AS keteranganpakai,
                                    -- ru.namaruangan,dep.namadepartemen,pg.namalengkap as namadokter
                                    -- from strukresep_t as sr   
                                    -- LEFT join pelayananpasien_t as pp on sr.norec= pp.strukresepfk 
                                    -- LEFT join antrianpasiendiperiksa_t as apd on apd.norec = sr.pasienfk  
                                    -- left JOIN pegawai_m AS pg ON pg.id = apd.objectpegawaifk 
                                    -- LEFT join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk  
                                    -- LEFT join pasien_m as ps on ps.id = pd.nocmfk  
                                    -- left join alamat_m as alm on alm.nocmfk = ps.id  
                                    -- LEFT JOIN produk_m as pro on pro.id = pp.produkfk  
                                    -- LEFT JOIN satuanstandar_m as ss on ss.id = pp.satuanviewfk  
                                    -- LEFT JOIN jenisracikan_m as jr on jr.id = pp.jenisobatfk  
                                    -- LEFT JOIN antrianapotik_t as aa on aa.noresep = sr.noresep
                                    -- LEFT JOIN ruangan_m as ru on ru.id = apd.objectruanganfk
                                    -- LEFT JOIN departemen_m as dep on dep.id = ru.objectdepartemenfk 
                                    -- where pp.kdprofile = $kdProfile and pp.jeniskemasanfk = 1 and sr.norec ='$norec' "
                                ));

        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        return view('report.cetak-labelkecil-apotik', compact('res'));
    }

    public function nomorAntrianApotik(Request $request)
    {
        $nocm = $request['nocm'];
        $norec = $request['norec'];
        $apoteker = 101232;
        $kdProfile = (int) $request['kdprofile'];
        dd($kdProfile);
        $data = DB::select(DB::raw("
            						SELECT distinct ps.nocm, ps.namapasien,to_char(ps.tgllahir, 'DD/MM/YYYY') as tgllahir,CASE WHEN aa.noantri IS NULL THEN sr.noresep ELSE aa.jenis || '-' || aa.noantri END AS noresep,to_char(sr.tglresep, 'DD-MM-YYYY') as tglresep,pr.namaproduk || ' (' || CAST(pp.jumlah AS VARCHAR) || ')' AS namaproduk,pp.aturanpakai,pp.rke,  
                                    CASE WHEN alm.alamatlengkap is null then '-' else alm.alamatlengkap end as alamat,ps.notelepon,ss.satuanstandar,pp.jumlah,  
                                    CASE WHEN pp.issiang = 't' THEN 'Siang' ELSE '-' END AS siang, CASE WHEN pp.ispagi = 't' THEN 'Pagi' ELSE '-' END AS pagi,  
                                    CASE WHEN pp.ismalam = 't' THEN 'Malam' ELSE '-' END as malam, CASE WHEN pp.issore = 't' THEN 'Sore' ELSE '-' END as sore,  
                                    CASE WHEN pp.keteranganpakai  = '' OR pp.keteranganpakai IS NULL THEN '-' else pp.keteranganpakai END AS keteranganpakai,
                                    ru.namaruangan,dep.namadepartemen,pg.namalengkap as apoteker
                                    from pelayananpasien_t as pp inner join strukresep_t as sr on sr.norec= pp.strukresepfk  
                                    LEFT join produk_m as pr on pr.id = pp.produkfk  
                                    LEFT join antrianpasiendiperiksa_t as apd on apd.norec = pp.noregistrasifk  
                                    left JOIN pegawai_m AS pg ON pg.id = $apoteker
                                    LEFT join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk  
                                    LEFT join pasien_m as ps on ps.id = pd.nocmfk  
                                    left join alamat_m as alm on alm.nocmfk = ps.id  
                                    LEFT JOIN satuanstandar_m as ss on ss.id = pp.satuanviewfk  
                                    LEFT JOIN antrianapotik_t as aa on aa.noresep = sr.noresep  
                                    LEFT JOIN ruangan_m as ru on ru.id = apd.objectruanganfk 
                                    LEFT JOIN departemen_m as dep on dep.id = ru.objectdepartemenfk 
                                    where pp.kdprofile = $kdProfile and pp.jeniskemasanfk = 2 and sr.norec ='$norec'        
            
                                    union all 
        
                                    select distinct ps.nocm,ps.namapasien,to_char(ps.tgllahir, 'DD/MM/YYYY') as tgllahir,CASE WHEN aa.noantri IS NULL THEN sr.noresep ELSE aa.jenis || '-' || aa.noantri END AS noresep,to_char(sr.tglresep, 'DD-MM-YYYY') as tglresep,  
                                    ' Racikan' || ' (' || CAST(((CAST(pp.qtydetailresep as INTEGER)/CAST(pp.dosis as INTEGER))*CAST(pro.kekuatan as INTEGER)) AS VARCHAR) || ')' AS namaproduk,pp.aturanpakai,pp.rke,  
                                    case when alm.alamatlengkap is null then '-' else alm.alamatlengkap end as alamat,ps.notelepon,CASE when jr.jenisracikan IS NULL THEN '' ELSE jr.jenisracikan END AS satuanstandar,  
                                    ((CAST(pp.qtydetailresep as INTEGER)/CAST(pp.dosis as INTEGER))*CAST(pro.kekuatan as INTEGER)) as jumlah,  
                                    CASE WHEN pp.issiang = 't' THEN 'Siang' ELSE '-' END AS siang, CASE WHEN pp.ispagi = 't' THEN 'Pagi' ELSE '-' END AS pagi,  
                                    CASE WHEN pp.ismalam = 't' THEN 'Malam' ELSE '-' END as malam, CASE WHEN pp.issore = 't' THEN 'Sore' ELSE '-' END as sore,  
                                    CASE WHEN pp.keteranganpakai  = '' OR pp.keteranganpakai IS NULL THEN '-' else pp.keteranganpakai END AS keteranganpakai,
                                    ru.namaruangan,dep.namadepartemen,pg.namalengkap as namadokter
                                    from strukresep_t as sr   
                                    LEFT join pelayananpasien_t as pp on sr.norec= pp.strukresepfk 
                                    LEFT join antrianpasiendiperiksa_t as apd on apd.norec = sr.pasienfk  
                                    left JOIN pegawai_m AS pg ON pg.id = apd.objectpegawaifk 
                                    LEFT join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk  
                                    LEFT join pasien_m as ps on ps.id = pd.nocmfk  
                                    left join alamat_m as alm on alm.nocmfk = ps.id  
                                    LEFT JOIN produk_m as pro on pro.id = pp.produkfk  
                                    LEFT JOIN satuanstandar_m as ss on ss.id = pp.satuanviewfk  
                                    LEFT JOIN jenisracikan_m as jr on jr.id = pp.jenisobatfk  
                                    LEFT JOIN antrianapotik_t as aa on aa.noresep = sr.noresep
                                    LEFT JOIN ruangan_m as ru on ru.id = apd.objectruanganfk
                                    LEFT JOIN departemen_m as dep on dep.id = ru.objectdepartemenfk 
                                    where pp.kdprofile = $kdProfile and pp.jeniskemasanfk = 1 and sr.norec ='$norec' "));

        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;

        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        return view('report.cetak-labelkecil-apotik', compact('res'));
    }

    public function ringkasanPasienMasukKeluar(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode as qrcode,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        // dd($data);
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
            if ($z->value != null) {
                $z->value = substr($z->value, strpos($z->value, '~'));
            }
            if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-ringkasan-pasien-masuk-keluar-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-ringkasan-pasien-masuk-keluar',compact('res', 'pageWidth'));
        }
    }

    public function konsulDokter(Request $request)
    {
        $norec = $request['emr'];
        $kdProfile = $request['kdprofile'];

        $kelTrans = KelompokTransaksi::where('kelompoktransaksi', 'KONSULTASI DOKTER')->first();
        $data = \DB::table('strukorder_t as so')
            ->Join('pasiendaftar_t as pd', 'pd.norec', '=', 'so.noregistrasifk')
            ->Join('pasien_m as ps', 'ps.id', '=', 'pd.nocmfk')
            ->leftJoin('ruangan_m as ru', 'ru.id', '=', 'so.objectruanganfk')
            ->leftJoin('ruangan_m as rutuju', 'rutuju.id', '=', 'so.objectruangantujuanfk')
            ->leftJoin('pegawai_m as pg', 'pg.id', '=', 'so.objectpegawaiorderfk')
            ->leftJoin('pegawai_m as pet', 'pet.id', '=', 'so.objectpetugasfk')
            ->leftJoin('antrianpasiendiperiksa_t as apd', 'apd.objectstrukorderfk', '=', 'so.norec')
            ->select('so.norec', 'so.noorder', 'so.tglorder', 'ru.namaruangan as ruanganasal', 'pg.namalengkap', 
                'rutuju.namaruangan as ruangantujuan', 'pet.namalengkap as pengonsul',
                'pd.noregistrasi', 'pd.tglregistrasi', 'ps.nocm', 'so.keteranganorder', 'pd.norec as norec_pd',
                'ps.namapasien', 'ps.tgllahir', 'ps.noidentitas', 'pg.id as pegawaifk', 'so.objectruangantujuanfk', 'so.objectruanganfk', 'apd.norec as norec_apd',
                'so.keteranganlainnya')
            ->where('so.kdprofile',$kdProfile)
            ->where('so.norec',$norec)
            ->where('so.statusenabled', true)
            ->where('so.objectkelompoktransaksifk', $kelTrans->id)
            ->orderBy('so.tglorder', 'desc')->first();

        $res['profile'] = Profile::where('id', $kdProfile)->first();
        $res['data'] = $data;
        if(empty($res['data'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-konsul-dokter', compact('res'));
    }

    public function konsulDokterAll(Request $request)
    {
        $kdProfile = $request['kdprofile'];
        $noregistrasi = $request['noregistrasi'];
        $nocm = $request['nocm'];

        $kelTrans = KelompokTransaksi::where('kelompoktransaksi', 'KONSULTASI DOKTER')->first();
        $data = \DB::table('strukorder_t as so')
            ->Join('pasiendaftar_t as pd', 'pd.norec', '=', 'so.noregistrasifk')
            ->Join('pasien_m as ps', 'ps.id', '=', 'pd.nocmfk')
            ->leftJoin('ruangan_m as ru', 'ru.id', '=', 'so.objectruanganfk')
            ->leftJoin('ruangan_m as rutuju', 'rutuju.id', '=', 'so.objectruangantujuanfk')
            ->leftJoin('pegawai_m as pg', 'pg.id', '=', 'so.objectpegawaiorderfk')
            ->leftJoin('pegawai_m as pet', 'pet.id', '=', 'so.objectpetugasfk')
            ->leftJoin('antrianpasiendiperiksa_t as apd', 'apd.objectstrukorderfk', '=', 'so.norec')
            ->select('so.norec', 'so.noorder', 'so.tglorder', 'ru.namaruangan as ruanganasal', 'pg.namalengkap', 'pg.qrcode as qrcodenamalengkap',
                'rutuju.namaruangan as ruangantujuan', 'pet.namalengkap as pengonsul', 'pet.qrcode as qrcodepengonsul', 
                'pd.noregistrasi', 'pd.tglregistrasi', 'ps.nocm', 'so.keteranganorder', 'pd.norec as norec_pd',
                'ps.namapasien', 'ps.tgllahir', 'ps.noidentitas', 'pg.id as pegawaifk', 'so.objectruangantujuanfk', 'so.objectruanganfk', 'apd.norec as norec_apd',
                'so.keteranganlainnya')
            ->where('so.kdprofile',$kdProfile)
            ->where('so.statusenabled', true)
            ->where('so.objectkelompoktransaksifk', $kelTrans->id)
            ->whereNotNull('so.keteranganlainnya')
            ->orderBy('so.tglorder', 'desc');
            
            if (isset($request['noregistrasi']) && $request['noregistrasi'] != "" && $request['noregistrasi'] != "undefined") {
                $data = $data->where('pd.noregistrasi',$noregistrasi);
            }
            if (isset($request['nocm']) && $request['nocm'] != "" && $request['nocm'] != "undefined") {
                $data = $data->where('ps.nocm',$nocm);
            }
            $data = $data->get();
            foreach ($data as $z) {
                if ($z->qrcodepengonsul == null) {
                    $z->qrcodepengonsul =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate("Tanda Tangan Digital Oleh ".$z->pengonsul));
                }
                if ($z->qrcodenamalengkap == null) {
                    $z->qrcodenamalengkap =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate("Tanda Tangan Digital Oleh ".$z->namalengkap));
                }
            }

        $res['profile'] = Profile::where('id', $kdProfile)->first();
        $res['data'] = $data;
        if(empty($res['data'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada / Jawaban konsul belum ada");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-konsul-dokter-all-dom', array(
                'res' => $res,
                'image' => $image,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-konsul-dokter-all',compact('res'));
        }
    }

    public function catatanPemberiandanPemantauanObatPasien(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 20; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
                if ($z->value != null) {
                    $z->value = substr($z->value, strpos($z->value, '~'));
                }
            }
        }
        // $res = collect($res)->filter()->all();
      
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        // dd($res);
        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-catatan-pemberian-dan-pemantuan-obat-pasien-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-catatan-pemberian-dan-pemantuan-obat-pasien',compact('res'));
        }
       
    }

    public function asesmenAwalKeperawatanIGD(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        // dd($data);
        foreach ($data as $z) {
            if ($z->type == "time") {
                $z->value = date('H:i', strtotime($z->value));
            }
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
            if ($z->value != null) {
                $z->value = substr($z->value, strpos($z->value, '~'));
            }
            if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-asesmen-awal-keperawatan-igd-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-asesmen-awal-keperawatan-igd',compact('res', 'pageWidth'));
        }
    }

    public function asesmenAwalMedisIGD(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        // dd($data);
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-asesmen-awal-medis-igd', compact('res', 'pageWidth'));
    }

    public function laporanOperasi(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $index = $request['index'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 7; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('H:i d-m-Y', strtotime($z->value));
                }
                if ($z->type == "time") {
                    $z->value = date('H:i', strtotime($z->value));
                }
                if ($z->value != null) {
                    $z->value = substr($z->value, strpos($z->value, '~'));
                }
                if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                    $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
                }
            }
        }
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-laporan-operasi-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-laporan-operasi',compact('res'));
        }
    }

    public function transfusiDarah(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 20; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
                if ($z->type == "time") {
                    $z->value = date('H:i', strtotime($z->value));
                }
                if ($z->value != null) {
                    $z->value = substr($z->value, strpos($z->value, '~'));
                }
                if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                    $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
                }
            }
        }
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-transfusi-darah-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-transfusi-darah',compact('res', 'image', 'centang'));
        }
    }

    public function suketKematian(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        // dd($data);
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
            if ($z->value != null) {
                $z->value = substr($z->value, strpos($z->value, '~'));
            }
            if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-suket-kematian-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-suket-kematian',compact('res', 'pageWidth'));
        }
    }

    public function persetujuanTesSkrining(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        // dd($data);
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
            if ($z->type == "date") {
                $z->value = date('d-m-Y', strtotime($z->value));
            }
            if ($z->value != null) {
                $z->value = substr($z->value, strpos($z->value, '~'));
            }
            if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-persetujuan-tes-skrining-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-persetujuan-tes-skrining',compact('res', 'image', 'centang'));
        }
    }

    public function penolakanTesSkrining(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        // dd($data);
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
            if ($z->type == "date") {
                $z->value = date('d-m-Y', strtotime($z->value));
            }
            if ($z->value != null) {
                $z->value = substr($z->value, strpos($z->value, '~'));
            }
            if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-penolakan-tes-skrining-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-penolakan-tes-skrining',compact('res', 'image', 'centang'));
        }
    }

    public function suketSementaraBerobat(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        // dd($data);
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-suket-sementara-berobat', compact('res', 'pageWidth'));
    }

    public function suketKelahiran(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        // dd($data);
        foreach ($data as $z) {
            if ($z->type == "time") {
                $z->value = date('H:i', strtotime($z->value));
            }
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
            if ($z->value != null) {
                $z->value = substr($z->value, strpos($z->value, '~'));
            }
            if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-suket-kelahiran-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-suket-kelahiran',compact('res', 'image', 'centang', 'pageWidth'));
        }
    }

    public function printcppt(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 32; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('H:i d-m-Y', strtotime($z->value));
                }
                if ($z->type == "time") {
                    $z->value = date('H:i', strtotime($z->value));
                }
                if ($z->value != null) {
                    $z->value = substr($z->value, strpos($z->value, '~'));
                }
                if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                    $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
                }
            }
        }
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-cppt-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-cppt',compact('res', 'image'));
        }
    }

    public function printcpptrajal(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,epd.qrcode,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "time") {
                $z->value = date('H:i', strtotime($z->value));
            }
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
            if ($z->value != null) {
                $z->value = substr($z->value, strpos($z->value, '~'));
            }
            if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));
        
        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-cppt-rajal-dom', array(
                'res' => $res,
                'pageWidth' => $pageWidth,
                'image' => $image,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-cppt-rajal',compact('res','pageWidth'));
        }
    }

    public function persetujuanTindakanHemodialisa(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-persetujuan-tindakan-hemodialisa', compact('res', 'pageWidth'));
    }

    public function pengkajianHarianHemodialisa(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,epd.qrcode,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('H:i d-m-Y', strtotime($z->value));
            }
            if ($z->type == "time") {
                $z->value = date('H:i', strtotime($z->value));
            }
            if ($z->value != null) {
                $z->value = substr($z->value, strpos($z->value, '~'));
            }
            if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-pengkajian-harian-hemodialisa-dom', array(
                'res' => $res,
                'pageWidth' => $pageWidth,
                'image' => $image,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-pengkajian-harian-hemodialisa',compact('res','pageWidth'));
        }
    }

    public function lembarTriaseAnak(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-lembar-triase-anak', compact('res', 'pageWidth'));
    }

    public function lembarTriaseDewasa(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-lembar-triase-dewasa', compact('res', 'pageWidth'));
    }

    public function implementasiAsuhanKeperawatanIGD(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $index = $request['index'];
        $kdProfile = (int) $request['kdprofile'];

        if (isset($request['index']) && $request['index'] == 'null') {
            $index = 'is null';
        }else{
            $index = '='.$index;
        }

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and epd.index $index
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-implementasi-asuhan-keperawatan-igd', compact('res', 'pageWidth'));
    }

    public function implementasiAsuhanKeperawatanRanap(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $index = $request['index'];
        $kdProfile = (int) $request['kdprofile'];

        if (isset($request['index']) && $request['index'] == 'null') {
            $index = 'is null';
        }else{
            $index = '='.$index;
        }

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and epd.index $index
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-implementasi-asuhan-keperawatan-ranap', compact('res', 'pageWidth'));
    }

    public function laporanPersalinan(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 7; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('H:i d-m-Y', strtotime($z->value));
                }
                if ($z->type == "time") {
                    $z->value = date('H:i', strtotime($z->value));
                }
                if ($z->value != null) {
                    $z->value = substr($z->value, strpos($z->value, '~'));
                }
                if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                    $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
                }
            }
        }
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-laporan-persalinan-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-laporan-persalinan',compact('res', 'image', 'centang'));
        }
    }

    public function partograf(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $index = $request['index'];
        $kdProfile = (int) $request['kdprofile'];

        if (isset($request['index']) && $request['index'] == 'null') {
            $index = 'is null';
        }else{
            $index = '='.$index;
        }

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and epd.index $index
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-partograf', compact('res', 'pageWidth'));
    }

    public function ekg(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 7; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ef.image,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    INNER JOIN emrfoto_t AS ef ON ef.noemrpasienfk = ep.noemr
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and ef.index = $a
                    and pa.statusenabled = TRUE
                    and ef.statusenabled = '1'
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
                if ($z->value != null) {
                    $z->value = substr($z->value, strpos($z->value, '~'));
                }
            }
        }
        // $res = collect($res)->filter()->all();
    //   dd($res);
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        // dd($res);
        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-ekg-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-ekg',compact('res', 'image', 'centang'));
        };
    }

    public function skriningPasienDewasa(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 7; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
                if ($z->type == "time") {
                    $z->value = date('H:i', strtotime($z->value));
                }
                if ($z->value != null) {
                    $z->value = substr($z->value, strpos($z->value, '~'));
                }
                if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                    $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
                }
            }
        }
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-skrining-pasien-dewasa-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-skrining-pasien-dewasa',compact('res', 'image', 'centang'));
        }
    }

    public function skriningPasienAnak(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 7; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
                if ($z->type == "time") {
                    $z->value = date('H:i', strtotime($z->value));
                }
                if ($z->value != null) {
                    $z->value = substr($z->value, strpos($z->value, '~'));
                }
                if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                    $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
                }
            }
        }
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-skrining-gizi-pasien-anak-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-skrining-gizi-pasien-anak',compact('res', 'image', 'centang'));
        }
    }

    public function audiometri(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));

        $res['img'] = \DB::table('emrfoto_t as emrp')

            ->select('emrp.*')
            ->where('emrp.statusenabled', true)
            ->where('emrp.kdprofile', $kdProfile)
            ->where('emrp.noemrpasienfk', $data[0]->noemr)
            ->where('emrp.emrfk', $request->emrfk)
            ->first();

        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-audiometri-dom', array(
                'pageWidth' => $pageWidth,
                'res' => $res,
                'image' => $image,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-audiometri', compact('res', 'pageWidth', 'image', 'imageHusada'));
        }

        return view('report.cetak-audiometri', compact('res'));
    }

    public function tympanometri(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));

        $res['img'] = \DB::table('emrfoto_t as emrp')

            ->select('emrp.*')
            ->where('emrp.statusenabled', true)
            ->where('emrp.kdprofile', $kdProfile)
            ->where('emrp.noemrpasienfk', $data[0]->noemr)
            ->where('emrp.emrfk', $request->emrfk)
            ->first();

        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-tympanometri-dom', array(
                'pageWidth' => $pageWidth,
                'res' => $res,
                'image' => $image,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-tympanometri', compact('res', 'pageWidth', 'image', 'imageHusada'));
        }

        return view('report.cetak-tympanometri', compact('res'));
    }

    public function electroencephalogram(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));

        $res['img'] = \DB::table('emrfoto_t as emrp')

            ->select('emrp.*')
            ->where('emrp.statusenabled', true)
            ->where('emrp.kdprofile', $kdProfile)
            ->where('emrp.noemrpasienfk', $data[0]->noemr)
            ->where('emrp.emrfk', $request->emrfk)
            ->first();

        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-electroencephalogram-dom', array(
                'pageWidth' => $pageWidth,
                'res' => $res,
                'image' => $image,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-electroencephalogram', compact('res', 'pageWidth', 'image', 'imageHusada'));
        }

        return view('report.cetak-electroencephalogram', compact('res'));
    }

    public function treadmill(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));

        $res['img'] = \DB::table('emrfoto_t as emrp')

            ->select('emrp.*')
            ->where('emrp.statusenabled', true)
            ->where('emrp.kdprofile', $kdProfile)
            ->where('emrp.noemrpasienfk', $data[0]->noemr)
            ->where('emrp.emrfk', $request->emrfk)
            ->first();

        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-treadmill-dom', array(
                'pageWidth' => $pageWidth,
                'res' => $res,
                'image' => $image,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-treadmill', compact('res', 'pageWidth'));
        }

        // return view('report.cetak-treadmill', compact('res'));
    }

    public function holterMonitor(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));

        $res['img'] = \DB::table('emrfoto_t as emrp')

            ->select('emrp.*')
            ->where('emrp.statusenabled', true)
            ->where('emrp.kdprofile', $kdProfile)
            ->where('emrp.noemrpasienfk', $data[0]->noemr)
            ->where('emrp.emrfk', $request->emrfk)
            ->first();

        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-holter-monitor-dom', array(
                'pageWidth' => $pageWidth,
                'res' => $res,
                'image' => $image
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-holter-monitor', compact('res', 'pageWidth'));
        }

        return view('report.cetak-holter-monitor', compact('res'));
    }

    public function echocardiografi(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $index = $request['index'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));

        foreach ($data as $z) {
            
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
            if ($z->value != null) {
                $z->value = substr($z->value, strpos($z->value, '~'));
            }
            if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
            
        }
        // dd($data);
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }

        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-echocardiografi-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-echocardiografi', compact('res', 'pageWidth', 'image', 'centang'));
        }
    }

    public function lembarKerjaNeonatus(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));

        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-lembar-kerja-neonatus-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-lembar-kerja-neonatus', compact('res', 'image', 'centang'));
        }
    }

    public function bayiSepsis(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));

        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-bayi-sepsis-dom', array(
                'pageWidth' => $pageWidth,
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-bayi-sepsis', compact('res', 'pageWidth'));
        }
    }

    public function alatMonitoringCPAP(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 32; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
            }
        }
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-alat-monitoring-cpap-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ));
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-alat-monitoring-cpap', compact('res', 'image', 'centang'));
        }

    }

    public function pemantauanCPAP(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 7; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        $cpapPath = public_path("img/CPAP.jpg");
        $cpap = "data:image/png;base64,".base64_encode(file_get_contents($cpapPath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-pemantauan-cpap-dom', array(
                'pageWidth' => $pageWidth,
                'res' => $res,
                'image' => $image,
                'centang' => $centang,
                'cpap' => $cpap
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-pemantauan-cpap', compact('res', 'pageWidth', 'image', 'centang', 'cpap'));
        }
    }

    public function pemberianEdukasiPasien(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $index = $request['index'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 20; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
            }
        }
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-pemberian-edukasi-pasien', compact('res'));
    }

    public function hiperbilirubin(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));

        $res['img'] = \DB::table('emrfoto_t as emrp')

            ->select('emrp.*')
            ->where('emrp.statusenabled', true)
            ->where('emrp.kdprofile', $kdProfile)
            ->where('emrp.noemrpasienfk', $data[0]->noemr)
            ->where('emrp.emrfk', $request->emrfk)
            ->first();

        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-hiperbilirubin', compact('res', 'pageWidth'));
    }

    public function profilRingkas(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,epd.qrcode,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));

        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('H:i d-m-Y', strtotime($z->value));
            }
            if ($z->type == "time") {
                $z->value = date('H:i', strtotime($z->value));
            }
            if ($z->value != null) {
                $z->value = substr($z->value, strpos($z->value, '~'));
            }
            if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-profil-ringkas-dom', array(
                'pageWidth' => $pageWidth,
                'res' => $res,
                'image' => $image
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-profil-ringkas', compact('res', 'pageWidth'));
        }
    }

    public function buktiPelayananTidakan(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-bukti-pelayanan-tindakan', compact('res', 'pageWidth'));
    }

    public function lembarFormulirRajal(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-lembar-formulir-rajal', compact('res', 'pageWidth'));
    }

    public function tindakanFisioterapi(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-tindakan-fisioterapi', compact('res', 'pageWidth'));
    }

    public function formulirPermintaanDarah(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 20; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('H:i d-m-Y', strtotime($z->value));
                }
                if ($z->type == "time") {
                    $z->value = date('H:i', strtotime($z->value));
                }
                if ($z->value != null) {
                    $z->value = substr($z->value, strpos($z->value, '~'));
                }
                if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                    $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
                }
            }
        }
        // $res = collect($res)->filter()->all();
      
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-formulir-permintaan-darah-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-formulir-permintaan-darah', compact('res'));
        }
    }

    public function pemberianMakanAwal1000(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 32; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
                if ($z->type == "date") {
                    $z->value = date('d-m-Y', strtotime($z->value));
                }
            }
        }
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        $keteranganPath = public_path("img/pemberianmakanawal.png");
        $keterangan = "data:image/png;base64,".base64_encode(file_get_contents($keteranganPath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-pemberian-makan-awal-1000-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang,
                'keterangan' => $keterangan,
            ));
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-pemberian-makan-awal-1000', compact('res', 'image', 'centang', 'keterangan'));
        }
    }

    public function pemberianMakanAwal1500(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 32; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
                if ($z->type == "date") {
                    $z->value = date('d-m-Y', strtotime($z->value));
                }
            }
        }
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));
        
        $keteranganPath = public_path("img/pemberianmakanawal.png");
        $keterangan = "data:image/png;base64,".base64_encode(file_get_contents($keteranganPath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-pemberian-makan-awal-1500-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang,
                'keterangan' => $keterangan,

            ));
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-pemberian-makan-awal-1500', compact('res', 'image', 'centang', 'keterangan'));
        }
    }

    public function pemberianMakanAwal2000(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 32; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
                if ($z->type == "date") {
                    $z->value = date('d-m-Y', strtotime($z->value));
                }
            }
        }
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));
        
        $keteranganPath = public_path("img/pemberianmakanawal.png");
        $keterangan = "data:image/png;base64,".base64_encode(file_get_contents($keteranganPath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-pemberian-makan-awal-2000-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang,
                'keterangan' => $keterangan,

            ));
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-pemberian-makan-awal-2000', compact('res', 'image', 'centang', 'keterangan'));
        }
    }

    public function pemberianMakanAwal2500(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 32; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
                if ($z->type == "date") {
                    $z->value = date('d-m-Y', strtotime($z->value));
                }
            }
        }
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));
        
        $keteranganPath = public_path("img/pemberianmakanawal.png");
        $keterangan = "data:image/png;base64,".base64_encode(file_get_contents($keteranganPath));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-pemberian-makan-awal-2500-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang,
                'keterangan' => $keterangan,

            ));
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-pemberian-makan-awal-2500', compact('res', 'image', 'centang', 'keterangan'));
        }
    }

    public function lembarPenggunaanVentilator(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 7; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl, epd.qrcode,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('H:i d-m-Y', strtotime($z->value));
                }
                if ($z->type == "time") {
                    $z->value = date('H:i', strtotime($z->value));
                }
                if ($z->value != null) {
                    $z->value = substr($z->value, strpos($z->value, '~'));
                }
                if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                    $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
                }
            }
        }

        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $noemrpasien = '';
        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        $imagePath = public_path("img/logo_only.png");
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $centangPath = public_path("img/true.png");
        $centang = "data:image/png;base64,".base64_encode(file_get_contents($centangPath));

        if(isset($request["issimpanberkas"])) {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => '600', 'defaultMediaType' => 'print']);
            $pdf = PDF::loadView('report.cetak-lembar-penggunaan-ventilator-dom', array(
                'res' => $res,
                'image' => $image,
                'centang' => $centang
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-lembar-penggunaan-ventilator',compact('res', 'pageWidth'));
        }
    }

    public function jadwalTindakanHemodialisa(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                pa.nobpjs,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-jadwal-tindakan-hemodialisa', compact('res', 'pageWidth'));
    }

    public function jaminanPenunjangDiagnostik(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                pa.nobpjs,
                ep.jeniskelamin,
                pk.pekerjaan,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        return view('report.cetak-jaminan-penunjang-diagnostik', compact('res', 'pageWidth'));
    }

    public function cetakRincBilling(Request $r)
    {
        $kdProfile = (int) $r['kdprofile'];
        $print = false;
        $pageWidth = 950;
        $res['user'] = $r['strIdPegawai'];
        $res['noregistrasi'] = $r['noregistrasi'];
        $res['identitas'] =  DB::table('pasiendaftar_t as pd')
            ->join('pasien_m as ps','ps.id', '=', 'pd.nocmfk')
            ->join('ruangan_m as ru', 'ru.id', '=', 'pd.objectruanganlastfk')
            ->join('kelas_m as kl', 'kl.id', '=', 'pd.objectkelasfk')
            ->join('departemen_m as dp', 'dp.id', '=', 'ru.objectdepartemenfk')
            ->join('kelompokpasien_m as kp','kp.id', '=', 'pd.objectkelompokpasienlastfk')
            ->leftjoin('jeniskelamin_m as jk', 'jk.id', '=', 'ps.objectjeniskelaminfk')
            ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'pd.objectpegawaifk')
            ->leftjoin('rekanan_m as rk', 'rk.id', '=', 'pd.objectrekananfk')
            ->leftjoin('pemakaianasuransi_t as pa', 'pa.noregistrasifk', '=', 'pd.norec')
            ->select(
                'pd.noregistrasi',
                'pd.tglregistrasi',
                'pd.tglpulang',
                'ps.namapasien',
                'ps.nocm',
                'ru.namaruangan',
                'kl.namakelas',
                'kp.kelompokpasien',
                'dp.namadepartemen',
                'jk.jeniskelamin',
                'pg.namalengkap',
                'rk.namarekanan',
                'pa.nosep'
            )
            ->where('pd.statusenabled', true)
            ->where('pd.kdprofile', $kdProfile)
            ->where('pd.noregistrasi', $r['noregistrasi'])
            ->first();

        $data =  DB::table('pelayananpasien_t as pp')
            ->join('antrianpasiendiperiksa_t as apd','apd.norec', '=', 'pp.noregistrasifk')
            ->join('pasiendaftar_t as pd', 'pd.norec', '=', 'apd.noregistrasifk')
            ->join('kelas_m as kls', 'kls.id', '=', 'apd.objectkelasfk')
            ->join('produk_m as prd', 'prd.id', '=', 'pp.produkfk')
            ->join('ruangan_m as ru', 'ru.id', '=', 'apd.objectruanganfk')
            ->join('departemen_m as dp', 'dp.id', '=', 'ru.objectdepartemenfk')
            ->leftJOIN('strukresep_t as sr', 'sr.norec', '=', 'pp.strukresepfk')
            ->leftJOIN('ruangan_m as ru2', 'ru2.id', '=', 'sr.ruanganfk')
            ->leftJOIN('departemen_m as dp2', 'dp2.id', '=', 'ru2.objectdepartemenfk')
            ->leftJOIN('pegawai_m as pg', 'pg.id', '=', 'sr.penulisresepfk')
            ->leftJOIN('detailjenisproduk_m as djp','djp.id', '=', 'prd.objectdetailjenisprodukfk')
            ->leftJOIN('jenisproduk_m as jp','jp.id', '=', 'djp.objectjenisprodukfk')
            ->select(
                'pp.norec',
                'prd.namaproduk',
                'kls.namakelas',
                'pp.tglpelayanan',
                'ru.namaruangan',
                'ru2.namaruangan as ruanganfarmasi',
                'pp.strukresepfk',
                'pp.jumlah',
                'pp.hargasatuan',
                'pg.namalengkap as penulisresep',
                'jp.jenisproduk',
                'dp.namadepartemen',
                'dp2.namadepartemen as deparemenfarmasi',
                DB::raw("
            case when pp.jasa is not null then pp.jasa else 0 end jasa,
            COALESCE (pp.hargadiscount, 0)  as diskon,
            case when pp.hargadiscount is not null then pp.hargadiscount else 0 end hargadiscount,
            (
                (pp.hargasatuan  - case when pp.hargadiscount is null then 0 else pp.hargadiscount end)
                 * pp.jumlah) 
            + (case when pp.jasa is not null then pp.jasa else 0 end)
             as total,
            to_char(pp.tglpelayanan,'yyyy-MM-dd')  as tglpelayanan_group ,
            case when pp.strukresepfk is null then 'Layanan' else 'Resep' end as jenis,
            case when pp.strukresepfk is null then ru.namaruangan else ru2.namaruangan end as ruang_group ,
            case when pp.strukresepfk is null then dp.namadepartemen else dp2.namadepartemen end as departemen_group 
           ")
            )
            ->where('pp.statusenabled', true)
            ->where('pp.kdprofile', $kdProfile)
            ->where('pd.noregistrasi', $r['noregistrasi'])
            ->orderBy('pp.tglpelayanan','asc')
            ->get();

        $sDokterPemeriksa = $this->settingDataFixed('jenisPetugasDokterPemeriksa', $kdProfile);
        $pelayananpetugas = \DB::table('pasiendaftar_t as pd')
            ->join('antrianpasiendiperiksa_t as apd','apd.noregistrasifk', '=', 'pd.norec')
            ->join('pelayananpasienpetugas_t as ptu', 'ptu.nomasukfk', '=', 'apd.norec')
            ->leftjoin('pegawai_m as pg', 'pg.id', '=', 'ptu.objectpegawaifk')
            ->select('ptu.pelayananpasien', 'pg.namalengkap')
            ->where('ptu.objectjenispetugaspefk', 4)
            ->where('pd.kdprofile',$kdProfile)
            ->where('pd.noregistrasi', $r['noregistrasi'])
            ->get();
        $res['total'] = 0.0;
        foreach ($data as $item) {
            $item->dokter = $item->strukresepfk != null ? $item->penulisresep : '-';
            $res['total']  = $res['total']  + (float) $item->total;
            foreach ($pelayananpetugas as $itemd) {
                if ($itemd->pelayananpasien == $item->norec) {
                    $item->dokter = $itemd->namalengkap;
                }
            }
        }

        $dataTotalDiskon = DB::select(DB::raw("
                select CAST(SUM(x.totaldiscount) AS FLOAT) AS total FROM 
                (select sp.totaldiscount
                from pasiendaftar_t as pd
                INNER JOIN antrianpasiendiperiksa_t as apd on apd.noregistrasifk=pd.norec
                INNER JOIN pelayananpasien_t as pp on pp.noregistrasifk=apd.norec
                INNER JOIN strukpelayanan_t as sp on sp.norec=pp.strukfk
                where pd.kdprofile = $kdProfile 
                and pd.noregistrasi=:noregistrasi               
                and pp.produkfk not in (402611)
                GROUP BY sp.totaldiscount) AS x
            "),
            array(
                'noregistrasi' => $r['noregistrasi'] ,
            )
        );
        $totalDiskon = 0;
        if(!empty($dataTotalDiskon)){
            $totalDiskon = $dataTotalDiskon[0]->total;
        }
        $deposit = 0;
        $produkIdDeposit = 402611;
        $pasienDaftar  = DB::table('pasiendaftar_t as pd')->where('pd.noregistrasi', $r['noregistrasi'])->first();
        if($pasienDaftar){
            $depositList = DB::table('pelayananpasien_t as pp')
            ->join('antrianpasiendiperiksa_t as apd','apd.norec', '=', 'pp.noregistrasifk')
            ->join('pasiendaftar_t as pd', 'pd.norec', '=', 'apd.noregistrasifk')
            ->where('pd.noregistrasi', $r['noregistrasi'])->get();
            foreach ($depositList as $item){
                if($item->produkfk==$produkIdDeposit){
                    $deposit = $deposit + $item->hargasatuan;
                }
            }
        }
        $res['profile'] = Profile::where('id', $kdProfile)->first();
        $res['billing'] =  collect($data)->groupBy('jenisproduk');
        $res['ismultipenjamin']  = false;
        // $res['klaim']  = $this->getTotalKlaim($r['noregistrasi'], $kdProfile);
        $res['deposit'] = $deposit;
        
        $res['dibayar'] = $this->getTotolBayar($r['noregistrasi'], $kdProfile);
        $res['diskon'] =   $totalDiskon;
        $res['sisa'] =   $res['total']  -  $res['dibayar'] - $res['deposit'] - $res['diskon'] ;
        $res['pdf']  = false;
        $blade = 'report.kasir.billing';
        $pageWidth = 500;
        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));


        if(isset($r['rekap']) && $r['rekap'] == true ){
            $res['billing'] =   collect($data)->groupBy('departemen_group');
            $blade = 'report.kasir.rekap-billing';
        }

        if(isset($r["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.kasir.billing-dom', array(
                'print' => $print,
                'pageWidth' => $pageWidth,
                'r' => $r,
                'res' => $res,
                'image' => $image,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $r);
            return;
        }else{
            return view(
                $blade,
                compact('print', 'res','r', 'pageWidth', 'image')
            );
        }
   
    }

    public function suratKeteranganKontrol(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                epd.index,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                pa.nobpjs,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value, epd.qrcode, ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('H:i d-m-Y', strtotime($z->value));
            }
            if ($z->type == "time") {
                $z->value = date('H:i', strtotime($z->value));
            }
            if ($z->value != null) {
                $z->value = substr($z->value, strpos($z->value, '~'));
            }
            if ($z->qrcode == null && substr($z->value, strpos($z->value, '~'))) {
                $z->qrcode =base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->generate($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        $imagePath = public_path('img/logo_only.png');
        $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));

        $imagePathHusada = public_path('img/bakti-husada.png');
        $imageHusada = "data:image/png;base64,".base64_encode(file_get_contents($imagePathHusada));

        if(isset($request["issimpanberkas"])) {
            
            $pdf = PDF::loadView('report.cetak-surat-keterangan-kontrol-dom', array(
                'pageWidth' => $pageWidth,
                'res' => $res,
                'image' => $image,
                'imageHusada' => $imageHusada,
            ))->setPaper('a4', 'portrait');
            $this->saveDokumenKlaim($pdf, $request);
            return;
        }else{
            return view('report.cetak-surat-keterangan-kontrol', compact('res', 'pageWidth', 'image', 'imageHusada'));
        }

        
    }

    public function asesmenAwalMedisRajal(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        $data = DB::select(DB::raw(
            "
            SELECT
                epd.emrdfk,
                ep.noemr,
                ed.TYPE,
                pa.namapasien,
                TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                pa.nohp,
                pa.nocm,
                ep.jeniskelamin,
                ep.umur,
                pa.noidentitas,
                al.alamatlengkap,
                ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                --ap.noasuransi,ap.namapeserta,
                pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
            FROM
                emrpasien_t AS ep
                INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                left JOIN alamat_m as al on pa.id = al.nocmfk
                left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                left JOIN agama_m as ag on pa.objectagamafk = ag.id
                left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
            WHERE
                ep.norec = '$norec'
                    AND ep.kdprofile = '$kdProfile' 
                AND epd.statusenabled = TRUE 
                and epd.emrfk = $request[emrfk]
                and pa.statusenabled = TRUE
                
                ORDER BY
                ed.nourut
                "
        ));
        // dd($data);
        foreach ($data as $z) {
            if ($z->type == "datetime") {
                $z->value = date('d-m-Y H:i', strtotime($z->value));
            }
        }
        $pageWidth = 500;
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        $res['d'] = $data;
        $noemrpasien = '';
        if (count($data) == 0) {
            $noemrpasien = $request['emr'];
        } else {
            $noemrpasien = $data[0]->noemr;
        }
        if(empty($res['d'])){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        return view('report.cetak-asesmen-awal-medis-rajal', compact('res', 'pageWidth'));
    }

    public function flowsheet(Request $request) {
        ini_set('max_execution_time', 2000);
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 20; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
            }
        }
        // $res = collect($res)->filter()->all();
      
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }
        // dd($res);

        return view('report.cetak-flowsheet', compact('res'));
    }

    public function gelangPasien(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = 39;
        $profile = DB::table('profile_m')
            ->where('id', $kdProfile)
            ->first();

        $data =  DB::table('pasiendaftar_t as pd')
            ->join('pasien_m as ps','ps.id', '=', 'pd.nocmfk')
            ->select(
                'ps.namapasien',
                'ps.nocm',
                'ps.noidentitas',
                'ps.tgllahir',
            )
            // ->where('pd.statusenabled', true)
            ->where('pd.kdprofile', $kdProfile)
            ->where('pd.noregistrasi', $request['noregistrasi'])
            ->first();
        
        $gelang = $request['idcetakangelang'];
        if($request['idcetakangelang'] == 1 or $request['idcetakangelang'] == 2){
            return view('report.cetak-gelang-pasien-dewasa', compact('data', 'gelang', 'profile'));
        }else{
            return view('report.cetak-gelang-pasien', compact('data', 'gelang', 'profile'));
        }

    }

    public function emrAllPage(Request $request) {
        $nocm = $request['nocm'];
        $norec = $request['emr'];
        $kdProfile = (int) $request['kdprofile'];

        for($a = 1; $a <= 20; $a++){
            $res['d'.$a] = DB::select(DB::raw(
                "
                SELECT
                    epd.emrdfk,
                    epd.index,
                    ep.noemr,
                    ed.TYPE,
                    pa.namapasien,
                    TO_CHAR(pa.tgllahir, 'DD-MM-YYYY') as tgllahir,
                    pa.nohp,
                    pa.nocm,
                    ep.jeniskelamin,
                    ep.umur,
                    pa.noidentitas,
                    al.alamatlengkap,
                    ep.noregistrasifk as noregistrasi , TO_CHAR(pr.tglregistrasi, 'DD-MM-YYYY HH24:MM:SS') as tglregistrasi,
                    epd.value,ep.namaruangan,pg.namalengkap as namadokter, epd.tgl,
                    --ap.noasuransi,ap.namapeserta,
                    pdd.pendidikan,pk.pekerjaan,ag.agama,sp.statusperkawinan
                    --case when ed.TYPE = 'datetime' then TO_CHAR(TO_TIMESTAMP(epd.value, 'YYYY-MM-DD HH24:MI:SS'),'YYYY-MM-DD HH24:MI:SS') else epd.value end as value
                FROM
                    emrpasien_t AS ep
                    INNER JOIN emrpasiend_t AS epd ON ep.noemr = epd.emrpasienfk
                    INNER JOIN emrd_t AS ed ON epd.emrdfk = ed.ID
                    INNER JOIN antrianpasiendiperiksa_t AS pd ON pd.norec = ep.norec_apd
                    INNER JOIN pasiendaftar_t AS pr ON pr.norec = pd.noregistrasifk
                    left JOIN pegawai_m AS pg ON pg.id = pd.objectpegawaifk
                    left JOIN pasien_m as pa on ep.nocm =  pa.nocm
                    left JOIN alamat_m as al on pa.id = al.nocmfk
                    left JOIN pendidikan_m as pdd on pa.objectpendidikanfk = pdd.id
                    left JOIN pekerjaan_m as pk on pa.objectpekerjaanfk = pk.id
                    left JOIN agama_m as ag on pa.objectagamafk = ag.id
                    left JOIN statusperkawinan_m as sp on pa.objectstatusperkawinanfk = sp.id
                    -- left JOIN asuransipasien_m AS ap ON ap.nocmfk = pr.nocmfk
                WHERE
                    ep.norec = '$norec'
                        AND ep.kdprofile = '$kdProfile' 
                    AND epd.statusenabled = TRUE 
                    and epd.emrfk = $request[emrfk]
                    and epd.index = $a
                    and pa.statusenabled = TRUE
                    
                    ORDER BY
                    ed.nourut
                    "
            ));
            foreach ($res['d'.$a] as $z) {
                if ($z->type == "datetime") {
                    $z->value = date('d-m-Y H:i', strtotime($z->value));
                }
            }
        }
        // $res = collect($res)->filter()->all();
      
        $res['profile'] = Profile::where('id', $request['kdprofile'])->first();

        if(empty($res)){
            echo '
                <script language="javascript">
                    window.alert("Data tidak ada.");
                    window.close()
                </script>
            ';
            die;
        }

        if($request['emrname'] == 126){
            return view('report.cetak-formulir-permintaan-darah', compact('res'));
        }
        if($request['emrname'] == 27){
            return view('report.cetak-catatan-pemberian-dan-pemantuan-obat-pasien', compact('res'));
        }
        if($request['emrname'] == 86){
            return view('report.cetak-transfusi-darah', compact('res'));
        }

    }
}