<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'LoginController@index')->middleware('guest');
Route::post('/login/kirimdata', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

//SKP Prodi
    //LandingPg
Route::get('/prodi', 'SKPProdiLandingPgController@index')->middleware('auth:fakultas,prodi');
    //Peserta Kegiatan SKP
Route::get('/prodi/peserta', 'SKPProdiPesertaController@index')->middleware('auth:fakultas,prodi');
Route::get('/prodi/peserta/show/{skpwajib}', 'SKPProdiPesertaController@show')->middleware('auth:fakultas,prodi');
Route::get('/prodi/peserta/show/{skpwajib}/createW', 'SKPProdiPesertaController@createW')->middleware('auth:fakultas,prodi');
Route::post('/prodi/peserta/show/{skpwajib}/storeW', 'SKPProdiPesertaController@storeW')->middleware('auth:fakultas,prodi');
Route::get('/prodi/peserta/createP', 'SKPProdiPesertaController@createP')->middleware('auth:fakultas,prodi');
Route::post('/prodi/peserta/storeP', 'SKPProdiPesertaController@storeP')->middleware('auth:fakultas,prodi');
    //Pengajuan SKP Mahasiswa
Route::get('/prodi/pengajuan', 'SKPProdiPengajuanController@index')->middleware('auth:fakultas,prodi');
Route::get('/prodi/pengajuan/create', 'SKPProdiPengajuanController@create')->middleware('auth:fakultas,prodi');
    //Rekapitulasi
Route::get('/prodi/rekapitulasi', 'SKPProdiRekapitulasiController@index')->middleware('auth:fakultas,prodi');

//SKP Non Prodi
    //Landing Pg
Route::get('/nonprodi', 'SKPNonProdiLandingPgController@index')->middleware('auth:dppai');
    //Master Aktivitas
Route::get('/nonprodi/master', 'SKPNonProdiMasterController@index')->middleware('auth:dppai');
Route::get('/nonprodi/master/create', 'SKPNonProdiMasterController@create')->middleware('auth:dppai');
Route::post('/nonprodi/master/store', 'SKPNonProdiMasterController@store')->middleware('auth:dppai');
Route::get('/nonprodi/master/edit/{id}', 'SKPNonProdiMasterController@edit')->middleware('auth:dppai');
Route::post('/nonprodi/master/update/{id}', 'SKPNonProdiMasterController@update')->middleware('auth:dppai');
Route::get('/nonprodi/master/delete/{id}', 'SKPNonProdiMasterController@delete')->middleware('auth:dppai');
    //Peserta Kegiatan
Route::get('/nonprodi/peserta', 'SKPNonProdiPesertaController@index')->middleware('auth:dppai');
Route::get('/nonprodi/peserta/show/{skpwajib}', 'SKPNonProdiPesertaController@show')->middleware('auth:dppai');
Route::get('/nonprodi/peserta/show/{skpwajib}/create', 'SKPNonProdiPesertaController@create')->middleware('auth:dppai');
Route::post('/nonprodi/peserta/show/{skpwajib}/store', 'SKPNonProdiPesertaController@store')->middleware('auth:dppai');
//Route::get('/nonprodi/peserta/tambah', 'SKPNonProdiPesertaController@tambah');

//SKP Super Admin
    //Landing Page
Route::get('/superadmin', 'SKPSuperAdminLandingPgController@index')->middleware('auth:superadmin');
    //Master Domain
Route::get('/superadmin/masterD', 'SKPSuperAdminMasterDomainController@index')->middleware('auth:superadmin');
Route::get('/superadmin/masterD/create', 'SKPSuperAdminMasterDomainController@create')->middleware('auth:superadmin');
Route::post('/superadmin/masterD/store', 'SKPSuperAdminMasterDomainController@store')->middleware('auth:superadmin');
Route::get('/superadmin/masterD/edit/{id}', 'SKPSuperAdminMasterDomainController@edit')->middleware('auth:superadmin');
Route::post('/superadmin/masterD/update/{id}', 'SKPSuperAdminMasterDomainController@update')->middleware('auth:superadmin');
Route::get('/superadmin/masterD/delete/{id}', 'SKPSuperAdminMasterDomainController@delete')->middleware('auth:superadmin');
    //Master Aktivitas
Route::get('/superadmin/masterA', 'SKPSuperAdminMasterAktivitasController@index')->middleware('auth:superadmin');
Route::get('/superadmin/masterA/createW', 'SKPSuperAdminMasterAktivitasController@createW')->middleware('auth:superadmin');
Route::post('/superadmin/masterA/storeW', 'SKPSuperAdminMasterAktivitasController@storeW')->middleware('auth:superadmin');
Route::get('/superadmin/masterA/editW/{id}', 'SKPSuperAdminMasterAktivitasController@editW')->middleware('auth:superadmin');
Route::post('/superadmin/masterA/updateW/{id}', 'SKPSuperAdminMasterAktivitasController@updateW')->middleware('auth:superadmin');
Route::get('/superadmin/masterA/deleteW/{id}', 'SKPSuperAdminMasterAktivitasController@deleteW')->middleware('auth:superadmin');
Route::get('/superadmin/masterA/createP', 'SKPSuperAdminMasterAktivitasController@createP')->middleware('auth:superadmin');
Route::post('/superadmin/masterA/storeP', 'SKPSuperAdminMasterAktivitasController@storeP')->middleware('auth:superadmin');
Route::get('/superadmin/masterA/editP/{id}', 'SKPSuperAdminMasterAktivitasController@editP')->middleware('auth:superadmin');
Route::post('/superadmin/masterA/updateP/{id}', 'SKPSuperAdminMasterAktivitasController@updateP')->middleware('auth:superadmin');
Route::get('/superadmin/masterA/deleteP/{id}', 'SKPSuperAdminMasterAktivitasController@deleteP')->middleware('auth:superadmin');
    //Peserta Kegiatan
Route::get('/superadmin/peserta', 'SKPSuperAdminPesertaController@index')->middleware('auth:superadmin');
Route::get('/superadmin/peserta/show/{skpwajib}', 'SKPSuperAdminPesertaController@show')->middleware('auth:superadmin');
Route::get('/superadmin/peserta/show/{skpwajib}/createW', 'SKPSuperAdminPesertaController@createW')->middleware('auth:superadmin');
Route::post('/superadmin/peserta/show/{skpwajib}/storeW', 'SKPSuperAdminPesertaController@storeW')->middleware('auth:superadmin');
Route::get('/superadmin/peserta/createP','SKPSuperAdminPesertaController@createP')->middleware('auth:superadmin');
Route::post('/superadmin/peserta/storeP','SKPSuperAdminPesertaController@storeP')->middleware('auth:superadmin');
    //Rekap
Route::get('/superadmin/rekap', 'SKPSuperAdminRekapitulasiController@index');




//ADMIN SKP WAJIB
Route::get('/adminskpwajib', 'AdminSKPWajibController@landingPg');
Route::get('/adminskpwajib/infoskpwajib/', 'AdminSKPWajibController@infoSKPWajib');
Route::get('/adminskpwajib/infoskpwajib/create', 'AdminSKPWajibController@create');
Route::post('/adminskpwajib/infoskpwajib/store', 'AdminSKPWajibController@store');
Route::get('/adminskpwajib/infoskpwajib/delete/{id}', 'AdminSKPWajibController@delete');
Route::get('/adminskpwajib/infoskpwajib/edit/{id}', 'AdminSKPWajibController@edit');
Route::post('/adminskpwajib/infoskpwajib/update/{id}', 'AdminSKPWajibController@update');
    //HAL. Input
Route::get('/adminskpwajib/input', 'InputAdminWajibController@inputSKP');
Route::get('/adminskpwajib/input/show/{skpwajib}', 'InputAdminWajibController@show');
Route::get('/adminskpwajib/input/show/{skpwajib}/tambah', 'InputAdminWajibController@create');
Route::post('/adminskpwajib/input/show/{skpwajib}/store', 'InputAdminWajibController@store');

//ADMIN SKP PILIHAN
Route::get('/adminskppilihan', 'DomainProfilLulusanController@landingPg');
    //Domain profil
Route::get('/adminskppilihan/domainprofil', 'DomainProfilLulusanController@domainProfil');
Route::get('/adminskppilihan/domainprofil/create', 'DomainProfilLulusanController@create');
Route::post('/adminskppilihan/domainprofil/store', 'DomainProfilLulusanController@store');
Route::get('/adminskppilihan/domainprofil/edit/{id}', 'DomainProfilLulusanController@edit');
Route::post('/adminskppilihan/domainprofil/update/{id}', 'DomainProfilLulusanController@update');
Route::get('/adminskppilihan/domainprofil/delete/{id}', 'DomainProfilLulusanController@delete');
    //Aktivitas Kemahasiswaan
Route::get('/adminskppilihan/aktivitas-kemahasiswaan', 'AktivitasKemahasiswaanController@aktivitasKemahasiswaan');
Route::get('/adminskppilihan/aktivitas-kemahasiswaan/create', 'AktivitasKemahasiswaanController@create');
Route::post('/adminskppilihan/aktivitas-kemahasiswaan/store', 'AktivitasKemahasiswaanController@store');
Route::get('/adminskppilihan/aktivitas-kemahasiswaan/edit/{id}', 'AktivitasKemahasiswaanController@edit');
Route::post('/adminskppilihan/aktivitas-kemahasiswaan/update/{id}', 'AktivitasKemahasiswaanController@update');
Route::get('/adminskppilihan/aktivitas-kemahasiswaan/delete/{id}', 'AktivitasKemahasiswaanController@delete');

//DPA
Route::get('/dpa', 'DPALaporanController@landingPg');
Route::get('/dpa/laporan', 'DPALaporanController@skpmasuk');
Route::get('/dpa/daftar', 'DPALaporanController@tampil');
Route::get('/dpa/daftar/show/{id}', 'DPALaporanController@tampilmhs');
Route::get('/dpa/laporan/show/{id}', 'DPALaporanController@show');
Route::post('/dpa/laporan/update/{id}', 'DPALaporanController@update');
//laporan skp pilihan

//MAHASISWA
Route::get('/mahasiswa', 'MahasiswaController@dashboardSKPMahasiswa')->middleware('auth:mahasiswa');
Route::get('/mahasiswa/laporan', 'PengajuanSkpPilihanController@laporan')->middleware('auth:mahasiswa');
Route::post('/mahasiswa/laporan/store', 'PengajuanSkpPilihanController@store')->middleware('auth:mahasiswa');
Route::get('/mahasiswa/laporan/create', 'PengajuanSkpPilihanController@create')->middleware('auth:mahasiswa');
Route::get('/mahasiswa/laporan/edit/{id}', 'PengajuanSkpPilihanController@edit')->middleware('auth:mahasiswa');
Route::post('/mahasiswa/laporan/update/{id}', 'PengajuanSkpPilihanController@update')->middleware('auth:mahasiswa');
Route::get('/mahasiswa/laporan/show/{id}', 'PengajuanSkpPilihanController@show')->middleware('auth:mahasiswa');
//Route::get('/mahasiswa/laporan-skp-mahasiswa/delete/{id}', 'PengajuanSkpPilihanController@delete')->middleware('auth:mahasiswa');
Route::get('/mahasiswa/infoskp', 'InfoSkpPilihanController@infoskp')->middleware('auth:mahasiswa');


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
