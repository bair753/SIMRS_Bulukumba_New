import { HttpClient } from '@angular/common/http';
import { Component, OnInit, ViewChild, ViewEncapsulation } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { ToastrService } from 'ngx-toastr';
import { CacheService } from '../cache.service';
import { HttpService } from '../httpService';
import { ColumnMode, DatatableComponent, SelectionType } from '@swimlane/ngx-datatable';
import { Subject } from 'rxjs';
import moment from 'moment';
@Component({
  selector: 'app-informasi-kamar',
  templateUrl: './informasi-kamar.component.html',
  styleUrls: ['./informasi-kamar.component.scss'],
  encapsulation: ViewEncapsulation.None,
})
export class InformasiKamarComponent implements OnInit {

  displayDialog: boolean
  title: any
  public rows: any;
  public ColumnMode = ColumnMode;
  isLoad: boolean
  item: any = {
    deskripsi: ''
  }
  loading: boolean = false
  options: any
  contentHeader: any
  showTarif: boolean
  private _unsubscribeAll: Subject<any>
  listRuangan: any[]//SelectItem[]
  listJenisPel: any[]//SelectItem[]
  listKelas: any[]//SelectItem[]

  dataKamar: any;
  jumlahTempatTidur: any = 0;
  JumlahIsi: any = 0;
  JumlahKosong: any = 0;
  totalKamar: any = 0
  isShowKamar: boolean
  apiTimer: any;
  counter = 10;
  showPoli: boolean
  ruangans: any
  @ViewChild(DatatableComponent) table: DatatableComponent;
  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private httpService: HttpService,
    private cacheHelper: CacheService,
    private http: HttpClient,
    private alertService: ToastrService,
    private modalService: NgbModal,

  ) { this.options = this.alertService.toastrConfig; }

  ngOnInit(): void {
    this.apiTimer = setInterval(() => {
      this.getData()
    }, (this.counter * 18000)); //60 detik
    this.getData()
    this.contentHeader = {
      headerTitle: 'Informasi Kamar',
      actionButton: true,
      breadcrumb: {
        type: '',
        links: [
          {
            name: 'Menu Utama',
            isLink: true,
            link: '/touchscreen'
          },

        ]
      }
    };
  }
getData() {
    this.isShowKamar = true;

    // 1. Ambil Ringkasan Total Bed
    this.httpService.get('medifirst2000/kiosk/get-view-bed-tea').subscribe((e: any) => {
      if (e && e[0]) {
        this.jumlahTempatTidur = e[0].kamartotal;
        this.JumlahIsi = e[0].kamarisi;
        this.JumlahKosong = e[0].kamarkosong;
      }
    });

    // 2. Ambil Detail Bed Per Ruangan
    this.httpService.get('medifirst2000/kiosk/get-view-bed').subscribe((data: any) => {
      if (!Array.isArray(data)) return;

      const mapRuangan = new Map<number, any>();

      // Agregasi Data Berdasarkan ID Ruangan secara Akurat
      data.forEach((bed: any) => {
        const idRuang = bed.idruangan;
        const isTerisi = bed.idstatusbed === 1;

        if (!mapRuangan.has(idRuang)) {
          mapRuangan.set(idRuang, {
            idruangan: idRuang,
            namaruangan: bed.namaruangan,
            qtyBed: 0,
            isi: 0,
            kosong: 0,
            bg: '',
            warna: ''
          });
        }

        const ruang = mapRuangan.get(idRuang);
        ruang.qtyBed += 1;
        if (isTerisi) {
          ruang.isi += 1;
        } else {
          ruang.kosong += 1;
        }
      });

      // Ubah Map menjadi Array
      const arrRuang = Array.from(mapRuangan.values());

      // Tentukan Warna & Skema Background
      const warnaList = ['sales', 'views', 'users', 'checkin', 'warna1', 'warna2', 'warna3', 'warna4'];
      
      arrRuang.forEach((ruang, index) => {
        ruang.warna = warnaList[index % warnaList.length];
        ruang.bg = ruang.qtyBed === ruang.isi ? 'bg-maroon-gradient' : 'bg-aqua-gradient';

        // Fix ID Ruangan langsung sesuai objeknya (mencegah data tertukar & angka minus)
        this.httpService.get("medifirst2000/rawatinap/get-daftar-pasien-masih-dirawat?ruanganId=" + ruang.idruangan)
          .subscribe((res: any) => {
            const listPasien = res?.data || (Array.isArray(res) ? res : []);
            ruang.isi = listPasien.length;
            
            // Proteksi Math.max agar TIDAK PERNAH MINUS
            ruang.kosong = Math.max(0, ruang.qtyBed - ruang.isi);
          });
      });

      this.dataKamar = arrRuang;
      this.totalKamar = arrRuang.length;
      this.isShowKamar = false;
    });
  }
  lookDetail(idRU, namaruangan,modalSuccess) {
    this.httpService.get("medifirst2000/rawatinap/get-daftar-pasien-masih-dirawat?ruanganId=" + idRU).subscribe(e => {
      if (e.data.length == 0)
        return
      else {
        this.displayDialog = true
        this.ruangans = namaruangan
        for (let i = 0; i < e.data.length; i++) {
          const element = e.data[i];
          element.tglregistrasi = moment(new Date(element.tglregistrasi)).format('DD-MM-YYY HH:mm')
        }
        this.rows =e.data;
        this.modalService.open(modalSuccess, {
          centered: true,
          windowClass: 'modal modal-success',
          size: 'xl'
        });
        // this.dataSource.paginator = this.paginator;
        // this.dataSource.sort = this.sort;
      }

    })
  }

}
