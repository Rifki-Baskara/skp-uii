@extends('layouts.LySKPSuperAdminNew')

@section('content')

    <!--  Breadcrumb  -->
	<div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                            <li><a href="/prodi"><i class="menu-icon fa fa-home"></i> </a></li>
                            <li class="active">Master Aktivitas Kemahasiswaan</li>
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

						@if (session('status'))
							<div class="alert alert-success alert-dismissible fade show">
								{{ session('status') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
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
												<div class="row">
													<div class="col-sm-12 text-right">
														<a class="btn btn-primary" href="/superadmin/masterA/createW" role="button">Tambah Aktivitas SKP Wajib</a>
													</div>
												</div>
												<hr>
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
																	<a class="btn btn-link" href="/superadmin/masterA/editW/{{ $skpW->id }}"><i class="fa fa-pencil" style="color:#093697"></i></a>
																	<a class="btn btn-link" href="/superadmin/masterA/deleteW/{{ $skpW->id }}"><i class="fa fa-trash" style="color:#093697"></i></a>
																</td>
															</tr>
															@endforeach
														</tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="skpPilihan">
                                                
												<!-- TABEL SKP Pilihan -->
												<div class="row">
													<div class="col-sm-12 text-right">
														<a class="btn btn-primary" href="/superadmin/masterA/createP" role="button">Tambah Aktivitas SKP Pilihan</a>
													</div>
												</div>
												<hr>
                                                <div class="table-responsive">
                                                    <table id="bootstrap-data-table2" class="table table-striped table-bordered">
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
																	<a class="btn btn-link" href="/superadmin/masterA/editP/{{ $skpP->id }}"><i class="fa fa-pencil" style="color:#093697"></i></a>
																	<a class="btn btn-link" href="/superadmin/masterA/deleteP/{{ $skpP->id }}"><i class="fa fa-trash" style="color:#093697"></i></a>
																</td>
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