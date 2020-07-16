@extends('layouts.LYadminSkpPilihan')

@section('content')

	<!--  Breadcrumb  -->
	<div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
							<li><a href="#"><i class="menu-icon fa fa-home"></i> </a></li>
							<li><a href="/adminskppilihan">SKPUII</a></li>
                            <li class="active">Aktivitas Kemahasiswaan</li>
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
                        <h4 class="box-title">Aktivitas Kemahasiswaan </h4>
						<hr color="yellow">
						<a class="btn btn-primary" href="/adminskppilihan/aktivitas-kemahasiswaan/create">Tambah Aktivitas Kemahasiswaan</a>
						<br>
						<br>
						@if (session('status'))
							<div class="alert alert-success alert-dismissible fade show">
								{{ session('status') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
						<!-- TABEL -->
						<div class="table-responsive">
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>No</th>
                                        <th>Domain Profil Lulusan</th>
                                        <th>Aktivitas Kemahasiswaan</th>
                                        <th>Bukti Kegiatan</th>
                                        <th>Jenjang Pendidikan</th>
                                        <th>poin SKP</th>
										<th>Aksi</th>				
									</tr>
								</thead>
								<tbody>
									@foreach($skpPilihan as $skpP)
									<tr>
										<td>{{ $loop->iteration }}</td>
                                        <td>{{ $skpP->domain_profil_lulusan_nama }}</td>
                                        <td>{{ $skpP->aktivitas_kemahasiswaan }}</td>
                                        <td>{{ $skpP->bukti_kegiatan }}</td>
                                        <td>{{ $skpP->jenjang_pendidikan }}</td>
                                        <td>{{ $skpP->poin_skp }}</td>
										<td>
											<a class="btn btn-link" href="/adminskppilihan/aktivitas-kemahasiswaan/edit/{{ $skpP->id }}"><i class="fa fa-pencil" style="color:#093697"></i></a>
											<a class="btn btn-link" href="/adminskppilihan/aktivitas-kemahasiswaan/delete/{{ $skpP->id }}"><i class="fa fa-trash" style="color:#093697"></i></a>
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