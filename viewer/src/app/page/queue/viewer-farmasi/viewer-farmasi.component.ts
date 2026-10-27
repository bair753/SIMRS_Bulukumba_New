import { DOCUMENT } from '@angular/common';
import { Component, Inject, NgZone, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import * as moment from 'moment';
import { Table } from 'primeng/table';
import { Config } from 'src/app/guard';
import { ApiService, AuthService } from 'src/app/service';
import { AlertService } from 'src/app/service/component/alert/alert.service';
import { SocketService } from 'src/app/service/socket.service';
@Component({
  selector: 'app-viewer-farmasi',
  templateUrl: './viewer-farmasi.component.html',
  styleUrls: ['./viewer-farmasi.component.scss']
})
export class ViewerFarmasiComponent implements OnInit {


  item: any = {}
  apiTimer: any;
  dataSource: any[] = []
  color = ['white', 'blue', 'gray', 'darkgray', 'orange']
  listKelas = []
  dipanggil: boolean = false;
  value = 10
  antriTerakhir: any
  namaPasien: any = '-'
  count_defaultTable: any = 15
  countTable: any = this.count_defaultTable
  totalPage: any = 3
  page_otomatis: any = 1
  page_default: any = 1
  infoPage: any
  timerTables: any
  start_otomatis: any = 0
  limit_otomatis: any = 10
  count_defaultPanel: any = 60
  countPanel = this.count_defaultPanel
  timerPanels: any
  isFullscreen: boolean
  numberss = Array(5).map((x, i) => i);
  isActive = false;
  elem: any;
  namaProfile = Config.getProfile().namaProfile
  listRuanganAktif: any = []
  listRuangan: any = []
  paramRuang: any
  constructor(
    private apiService: ApiService,
    private alertService: AlertService,
    private socket: SocketService,
    private route: ActivatedRoute,
    private ngZone: NgZone,
    @Inject(DOCUMENT) private document: any
  ) {
    this.apiService.get('viewer/get-data-viewer-far').subscribe(e => {
      this.listRuangan = e.farmasi
      this.paramRuang = ''
      this.listRuanganAktif = []
      this.route.params.subscribe(params => {
        let ru = params['ruanganid'];

        this.paramRuang = ru
        this.listRuanganAktif = []
        let arr = ru.split(',')
        for (let i = 0; i < this.listRuangan.length; i++) {
          const element = this.listRuangan[i];
          for (let x = 0; x < arr.length; x++) {
            const element2 = arr[x];
            if (element.id == element2) {
              this.listRuanganAktif.push({
                'namaruangan': element.namaruangan,
                'nocounter': element.nocounter != null ? element.nocounter : 12,
                'noantri': '-'
              })
            }
          }
        }

        if (this.paramRuang == undefined) return

      });
      if (e.data.length > 0) {
        const element = e.data[e.data.length - 1];
        this.item.antriTerakhir = element.jenis + '-' + element.noantrian
      }
    })
    this.socket.on('tampilkan-antrian-farmasi', (data: any) => {
      // Callback socket.io berjalan di luar Angular Zone, jadi seluruh
      // logika di sini dibungkus ngZone.run() supaya tampilan ikut refresh.
      this.ngZone.run(() => {

        let result = JSON.parse(data)
        let status = false
        if (result.status == 'load') {
          this.load()
        } else {
          var no = result.noantri
          status = false

          for (let x = 0; x < this.listRuanganAktif.length; x++) {
            const element2 = this.listRuanganAktif[x];
            if (element2.namaruangan == result.namaruangan) {
              status = true
              this.item.antriTerakhir = result.noregistrasi.substring(4)
              this.item.jenis = result.jenis
              this.item.ruangan = result.namaruangan
              this.item.namaPasien = result.namapasien
              no = this.item.antriTerakhir
              break
            }
          }
        }
        if (status == true) {
          this.dipanggil = true
          this.antriTerakhir = this.item.antriTerakhir
          this.namaPasien = this.item.namaPasien != undefined && this.item.namaPasien != '' ? this.item.namaPasien : '-'
          this.playAudio(this.namaPasien);
        }

      });

    });

  }

  ngOnInit(): void {
    this.elem = document.documentElement;
    this.load()
  }
  playBell(): Promise<void> {
    return new Promise((resolve) => {
      try {
        const AudioContextClass = (window as any).AudioContext || (window as any).webkitAudioContext;
        const ctx = new AudioContextClass();
        const notes = [1046.5, 1318.5]; // dua nada lonceng, terdengar seperti "ding-dong"
        const noteDuration = 0.45;

        notes.forEach((freq, i) => {
          const startTime = ctx.currentTime + i * noteDuration;
          const osc = ctx.createOscillator();
          const gain = ctx.createGain();
          osc.type = 'sine';
          osc.frequency.setValueAtTime(freq, startTime);
          gain.gain.setValueAtTime(0.0001, startTime);
          gain.gain.exponentialRampToValueAtTime(0.5, startTime + 0.02);
          gain.gain.exponentialRampToValueAtTime(0.0001, startTime + noteDuration);
          osc.connect(gain);
          gain.connect(ctx.destination);
          osc.start(startTime);
          osc.stop(startTime + noteDuration);
        });

        setTimeout(() => {
          ctx.close();
          resolve();
        }, notes.length * noteDuration * 1000 + 150);
      } catch (e) {
        resolve();
      }
    });
  }
  playAudio(namaPasien) {

    this.playBell().then(() => {
      var synthesis = window.speechSynthesis;
      var voice = synthesis.getVoices().filter(function (voice) {
        return voice.lang === 'id-ID';
      })[0];
      var teks = (namaPasien && namaPasien != '-' ? namaPasien : 'Pasien')
        + ', silahkan ke Farmasi untuk mengambil obat.';
      var utterance = new SpeechSynthesisUtterance(teks);
      utterance.voice = voice;
      utterance.lang = 'id-ID';
      utterance.pitch = 1;
      utterance.rate = 0.8;
      utterance.volume = 1;
      synthesis.speak(utterance);
    });

    setTimeout(() => {
      this.ngZone.run(() => {
        this.dipanggil = false
      });
    }, (5000));

  }
  load() {
    this.dataSource = []
    this.apiService.get('viewer/get-list-antrian-farmasi').subscribe(e => {

      this.dataSource = e
    })

  }
  openFullscreen() {
    if (this.elem.requestFullscreen) {
      this.elem.requestFullscreen();
    } else if (this.elem.mozRequestFullScreen) {
      this.elem.mozRequestFullScreen();
    } else if (this.elem.webkitRequestFullscreen) {
      this.elem.webkitRequestFullscreen();
    } else if (this.elem.msRequestFullscreen) {
      this.elem.msRequestFullscreen();
    }
    this.isFullscreen = true
  }
  closeFullscreen() {
    if (this.document.exitFullscreen) {
      this.document.exitFullscreen();
    } else if (this.document.mozCancelFullScreen) {
      this.document.mozCancelFullScreen();
    } else if (this.document.webkitExitFullscreen) {
      this.document.webkitExitFullscreen();
    } else if (this.document.msExitFullscreen) {
      this.document.msExitFullscreen();
    }
    this.isFullscreen = false
  }
}