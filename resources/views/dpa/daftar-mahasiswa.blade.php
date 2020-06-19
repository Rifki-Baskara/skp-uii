@extends('layouts.LYdpa')

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
                            <li class="active">Daftar Mahasiswa</li>
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
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>		
									</tr>
								</thead>
								<tbody>
                                @foreach($daftarmhs as $datamhs)                        
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$datamhs->jenjang_pendidikan}}</td>
                                        <td>{{$datamhs->username}}</td>
                                        <td>{{$datamhs->nama}}</td>
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