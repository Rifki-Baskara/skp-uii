@extends('layouts.LySKPProdiNew')

@section('content')

	<!--  Breadcrumb  -->
	<div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
							<li><a href="/prodi"><i class="menu-icon fa fa-home"></i> </a></li>
                            <li class="active">Pengajuan SKP Mahasiswa</li>
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
                        <h4 class="box-title">Pengajuan SKP Pilihan Mahasiswa </h4>
                        <hr color="yellow">
                        
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label">Fakultas</label>
                                    <input id="cc-exp" name="cc-exp" type="tel" class="form-control" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label">Program Studi</label>
                                    <input id="cc-exp" name="cc-exp" type="tel" class="form-control" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label">Dosen Pembimbing Akademik</label>
                                    <input id="cc-exp" name="cc-exp" type="tel" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <a class="btn btn-primary" href="#" role="button">Reset</a>
                                <br>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a class="btn btn-primary" href="/prodi/pengajuan/create" role="button">Tambah Pengajuan</a>
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
										<th>Jenjang Pendidikan</th>
										<th>Poin SKP</th>
										<th>Aksi</th>				
									</tr>
								</thead>
								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td>
											<a href=""><i class="fa fa-pencil" style="color:#093697"></i> </a>
										</td>
									</tr>
							</table>
						</div>
                    </div>
                </div>
            </div><!-- /# column -->
        </div>
	</div>
@endsection