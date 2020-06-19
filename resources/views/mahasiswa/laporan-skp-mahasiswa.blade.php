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
                            <li class="active">Laporan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
		<div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fullwidth">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab" role="tabpanel">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-justified " role="tablist">
                                            <li role="presentation" class="nav-item active">
                                                <a class="nav-link active" href="#skpWajib" role="tab" data-toggle="tab">SKP Wajib</a>
                                            </li>
                                            <li role="presentation" class="nav-item">
                                                <a class="nav-link" href="#skpPilihan" role="tab" data-toggle="tab">SKP Pilihan</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade show active" id="skpWajib">

                                                <h2 class="font-weight-bold">Jumlah SKP {{Auth::user()->nama}} 20/50</h2>
                                                <br>

                                                <!-- TABEL SKP Wajib -->
                                                <div class="table-responsive">
                                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Aktivitas</th>
                                                                <th>Nama Kegiatan</th>
                                                                <th>Poin SKP</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($tampilSkpWajib as $datawajib)
                                                            
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$datawajib->aktivitas_kemahasiswaan}}</td>
                                                                <td>{{$datawajib->skp_wajib_nama_kegiatan}}</td>
                                                                <td>{{$datawajib->poin_skp}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="skpPilihan">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <h2 class="font-weight-bold">Jumlah SKP Pilihan 09/10</h2>
                                                        <br>
                                                    </div>
                                                    <div class="col-sm-4 text-right">
                                                        <a class="btn btn-primary" href="/mahasiswa/laporan/create" role="button">Pengajuan SKP Pilihan</a>
                                                    </div>
                                                </div>

                                                <!-- TABEL SKP Pilihan -->
                                                <div class="table-responsive">
                                                    <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Kegiatan</th>
                                                                <th>Waktu Pelaksanaan</th>
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($pengajuanPilihan as $data)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$data->nama_kegiatan}}</td>
                                                                <td>{{$data->tanggal_mulai}}</td>
                                                                <td>{{$data->status}}</td>
                                                                <td>
                                                                    @if ($data->status !== 'Disetujui' && $data->status !== 'Disetujui dan layak masuk SKPI')
                                                                    <a class="btn btn-link" href="/mahasiswa/laporan/edit/{{ $data->id }}"><i class="fa fa-pencil" style="color:#093697"></i></a>
                                                                    @endif
											                        <a class="btn btn-link" href="/mahasiswa/laporan/show/{{ $data->id }}"><i class="fa fa-eye" style="color:#093697"></i></a>
										                        </td>
                                                            @endforeach   
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection