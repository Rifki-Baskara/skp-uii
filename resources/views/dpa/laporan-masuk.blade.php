@extends('layouts.LYdpaNew')

@section('content')

	<!--  Breadcrumb  -->
	<div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                            <li><a href="#"><i class="menu-icon fa fa-home"></i> </a></li>
                            <li><a href="/dpa">SKPUII</a></li>
                            <li class="active">Laporan SKP Masuk</li>
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
                        <h4 class="box-title">Daftar Pengajuan SKP</h4>
                        <hr color="yellow">
                        
						<!-- TABEL -->
						<div class="table-responsive">
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
								<thead>
									<tr>
                                        <th>No</th>
                                        <th>Jenjang</th>
										<th>Nama Mahasiswa</th>
                                        <th>NIM</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Waktu Pelaksanaan</th>
                                        <th>Waktu Pengajuan</th>
                                        <th>Aksi</th>			
									</tr>
								</thead>
								<tbody>
                                    @foreach ($skpmasuk as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->jenjang}}</td>
                                        <td>{{$data->nama_mhs}}</td>
                                        <td>{{$data->nim}}</td>
                                        <td>{{$data->nama_kegiatan}}</td>
                                        <td>{{$data->tanggal_mulai}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <a class="btn btn-link" href="/dpa/laporan/show/{{ $data->id }}"><i class="fa fa-pencil" style="color:#093697"></i></a>
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