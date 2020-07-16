@extends('layouts.LySKPSuperAdminNew')

@section('content')

    <!--  Breadcrumb  -->
	<div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                            <li><a href="/superadmin"><i class="menu-icon fa fa-home"></i> </a></li>
                            <li class="active">Peserta Kegiatan SKP</li>
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
                                                
                                                <!-- TABEL SKP Wajib -->
                                                <div class="table-responsive">
                                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Aktivitas</th>
                                                                <th>Nama Kegiatan</th>
                                                                <th>Jenjang Pendidikan</th>
                                                                <th>Poin SKP</th>
                                                                <th>Aksi</th>				
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($skpwajib as $skpW)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $skpW->nama_aktivitas }}</td>
                                                                <td>{{ $skpW->nama_kegiatan }}</td>
                                                                <td>{{ $skpW->jenjang_pendidikan }}</td>
                                                                <td>{{ $skpW->poin_skp }}</td>
                                                                <td>
                                                                    <a href="/superadmin/peserta/show/{{ $skpW->id }}"><i class="fa fa-user-plus" style="color:#093697"></i> </a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="skpPilihan">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a class="btn btn-primary" href="/superadmin/peserta/createP" role="button">Tambah Mahasiswa</a>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- TABEL SKP Pilihan -->
                                                <div class="table-responsive">
                                                    <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Mahasiswa</th>
                                                                <th>Nama Kegiatan</th>
                                                                <th>Nama Aktivitas</th>
                                                                <th>Poin SKP</th>			
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($mhsPilihan as $mhsP)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $mhsP->nama_mhs }}</td>
                                                                <td>{{ $mhsP->nama_kegiatan }}</td>
                                                                <td>{{ $mhsP->aktivitas_kemahasiswaan }}</td>
                                                                <td>{{ $mhsP->poin }}</td>
                                                            </tr>
                                                            @endforeach
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
            </div><!-- /# column -->
        </div>
    </div>

@endsection