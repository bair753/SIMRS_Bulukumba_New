# SIMRS RSUD H. Andi Sulthan Daeng Radja Kabupaten Bulukumba

WebApps Sistem Informasi Manajemen Rumah Sakit 

# Instalasi 

1. Clone repository `rsud_bulukumba`.
```sh
git clone https://github.com/agussustian2017/rsud_bulukumba.git
```
2. Pindah ke *directory* `rsud_bulukumba`.
```sh
cd rsud_bulukumba/backend
```
3. Jalankan `composer`.
```sh
composer install
```
4. Copy file `.env.example` menjadi `.env`.
5. Set konfigurasi aplikasi di `.env`.
6. Jalankan migrasi database.
```sh

php artisan migrate
```
7. Install node js
```sh
https://nodejs.org/en/
```
8. Pindah ke *directory* `frontend`.
```sh
cd frontend
```
9. Download dependency, kemudian extract
```sh
https://drive.google.com/file/d/1dSwZmIxpBIa6uJQFe6q0c11FCiS3kKlL/view?usp=sharing
```
10. Set konfigurasi API di `frontend/app/javascripts/Setting.js`.
