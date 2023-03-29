export class Configuration {
  static get() {
    if (window.location.hostname.indexOf('10.20.30') > -1) {
      return {
        apiBackend: 'http://10.20.30.40/service/',
        headerToken: 'X-AUTH-TOKEN',
      }
    }
    else if (window.location.hostname.indexOf('localhost') > -1) {
      return {
        apiBackend: 'http://localhost:8005/service/',
        headerToken: 'X-AUTH-TOKEN',
      }
    } else {
      return {
        apiBackend: '/service/',
        headerToken: 'X-AUTH-TOKEN',
      }
    }
  }
  static profile() {
     
      return {
        nama:'RSUD H. A. Daeng Radja Kabupaten Bulukumba',
        namaPPK:"RSUD H. A. SULTHAN DG. RADJA",
        alamat: 'Jl. Serikaya No.17, Caile, Kec. Ujung Bulu, Kabupaten Bulukumba, Sulawesi Selatan 92517',
        link: 'https://drive.google.com/file/d/1GCx6WDTTykrGWSFIa6S6guVGRqZR9uQ1/view?usp=sharing',
        kdRekananBPJS:2552,
        kdKelompokBPJS:2,
      }
  }
}
