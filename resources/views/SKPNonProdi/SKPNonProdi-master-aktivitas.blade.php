@extends('layouts.LySKPNonProdiNew')

@section('content')

	<!--  Breadcrumb  -->
	<div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
							<li><a href="/nonprodi"><i class="menu-icon fa fa-home"></i> </a></li>
                            <li class="active">Master Aktivitas</li>
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
                        <h4 class="box-title">Master Aktivitas Kemahasiswaan </h4>
						<hr color="yellow">
						@if (session('status'))
							<div class="alert alert-success alert-dismissible fade show">
								{{ session('status') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a class="btn btn-primary" href="/nonprodi/master/create" role="button">Tambah Aktivitas</a>
                            </div>
                        </div>
                        <hr>
						<!-- TABEL -->
						<div class="table-responsive">
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Aktivitas</th>
										<th>Nama Kegiatan</th>
										<th>Bahan Kajian</th>
										<th>Jenjang Pendidikan</th>
										<th>Poin SKP</th>
										<th>Penyelenggara</th>	
										<th>Aksi</th>			
									</tr>
								</thead>
								<tbody>
									@foreach ($skpWajib as $skpW)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $skpW->nama_aktivitas }}</td>
										<td>{{ $skpW->nama_kegiatan }}</td>
										<td>{{ $skpW->bahan_kajian }}</td>
										<td>{{ $skpW->jenjang_pendidikan }}</td>
										<td>{{ $skpW->poin_skp }}</td>
										<td>{{ $skpW->penyelenggara }}</td>
										<td>
											<a class="btn btn-link" href="/nonprodi/master/edit/{{ $skpW->id }}"><i class="fa fa-pencil" style="color:#093697"></i></a>
											<a class="btn btn-link" href="/nonprodi/master/delete/{{ $skpW->id }}"><i class="fa fa-trash" style="color:#093697"></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
                    </div>
                </div>
            </div><!-- /# column -->
        </div>
	</div>
@endsection