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
                            <li><a href="/nonprodi/peserta">Peserta Kegiatan SKP</a></li>
                            <li class="active">Daftar mahasiswa {{ $skpwajib->nama_kegiatan}} </li>
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
                        <h4 class="box-title">Daftar Mahasiswa {{ $skpwajib->nama_kegiatan}}</h4>
                        <hr color="yellow">

                        <div class="row">
                            <div class="col-2">
                                <a class="btn btn-primary" href="/nonprodi/peserta/show/{{ $skpwajib->id }}/create">Tambah Mahasiswa</a>
                            </div>
                            <div class="col-5">
                                <h2 class="font-weight-bold">Jumlah Mahasiswa {{ $skpwajib->nama_kegiatan}} : {{$dataMhs->count()}}</h2>
                            </div>
                        </div>
                        <br>

						<!-- TABEL -->
						<div class="table-responsive">
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Mahasiswa</th>
										<th>NIM</th>			
									</tr>
								</thead>
								<tbody>
                                    @foreach ($dataMhs as $dM)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dM->mahasiswa_nama }}</td>
										<td>{{ $dM->mahasiswa_username }}</td>
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