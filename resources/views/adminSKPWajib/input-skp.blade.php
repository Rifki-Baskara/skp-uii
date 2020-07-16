@extends('layouts.LYadminSkpWajib')

@section('content')

	<!--  Breadcrumb  -->
	<div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
							<li><a href="#"><i class="menu-icon fa fa-home"></i> </a></li>
							<li><a href="/adminskpwajib">SKPUII</a></li>
                            <li class="active">Input</li>
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
                        <h4 class="box-title">SKP Wajib Mahasiswa </h4>
						<hr color="yellow">
						<!-- TABEL -->
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
											<a href="/adminskpwajib/input/show/{{ $skpW->id }}"><i class="fa fa-pencil" style="color:#093697"></i> </a>
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