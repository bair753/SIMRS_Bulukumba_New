export class Configuration {
  static get() {
    if (window.location.hostname.indexOf('transmedic') > -1) {
      return {
        apiBackend: 'http://apps.transmedic.co.id:8880/service/',
        headerToken: 'X-AUTH-TOKEN',
        authLogin: ':8400',
      }
    } else if (window.location.hostname.indexOf('localhost') > -1) {
      return {
        apiBackend: 'http://localhost:8881/service/',
        headerToken: 'X-AUTH-TOKEN',
        authLogin: ':8881',
      }
    } else {
      return {
        apiBackend: '/service/',
        headerToken: 'X-AUTH-TOKEN',
        authLogin: ':8400',
      }
    }
  }
}
