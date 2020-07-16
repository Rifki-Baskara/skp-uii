@extends('layouts.LYmahasiswa')

@section('content')

    <!--  Breadcrumb  -->
	<div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                            <li><a href="#"><i class="menu-icon fa fa-home"></i> </a></li>
                            <li><a href="/mahasiswa">Dashboard</a></li>
                            <li><a href="/mahasiswa/laporan">Laporan</a></li>
                            <li class="active">Pengajuan SKP Pilihan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
		<!--  SKP Wajib Mahsiswa  -->
		<div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Detail Pengajuan SKP Pilihan </h4>
                        <hr color="yellow">
                        <div class="col-6">
                            <div class="card bg-light">
                                <h5 class="card-header bg-primary text-white">Deskripsi</h5>
                                <div class="card-body">
                                    <table>
										<tr>
    										<td>Nama Kegiatan</td>
                                            <td>: {{$show->nama_kegiatan}}</td>
										</tr>
										<tr>
											<td>Domain Profil Lulusan</td>
											<td> : {{$show->domain_profil}}</td>
										</tr>
										<tr>
											<td>Aktivitas Kemahasiswaan</td>
											<td> : {{$show->aktivitas_kemahasiswaan}}</td>
										</tr>
										<tr>
											<td>Lokasi Kegiatan</td>
											<td> : {{$show->lokasi}}</td>
                                        </tr>
                                        <tr>
											<td>Penyelenggara</td>
											<td> : {{$show->penyelenggara}}</td>
                                        </tr>
                                        <tr>
											<td>Prestasi Yang Diraih</td>
											<td> : {{$show->prestasi}}</td>
                                        </tr>
                                        <tr>
											<td>Waktu Pelaksanaan</td>
											<td> : {{$show->tanggal_mulai}} sampai {{$show->tanggal_selesai}}</td>
                                        </tr>
                                        <tr>
											<td>Deskripsi Kegiatan</td>
											<td> : {{$show->deskripsi}}</td>
                                        </tr>
                                        <tr>
                                            <td>Bukti Kegiatan</td>
                                            @foreach ($show -> berkas_kegiatan as $berkas)
                                            <td> : <a href="{{url('berkas_pengajuan/'.$berkas)}}"> {{$berkas}} </a></td>
                                            @endforeach
                                        </tr>
                                        
                                    </table>
                                    <div class="form-button text-center ">
                                        <a class="btn btn-secondary btn-lg mx-2" href="/mahasiswa/laporan" role="button">Kembali</a>
                                        <!-- <button class="btn btn-success btn-lg mx-2" type="submit" >Simpan</button> -->
                                    </div>
                                </div>

                            </div>
                        </div>
						
                    </div>
                </div>
            </div><!-- /# column -->
        </div>
	</div>

@endsection