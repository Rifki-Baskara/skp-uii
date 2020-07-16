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
                            <li class="active">Master Domain Profil Lulusan</li>
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
                        <h4 class="box-title">Master Domain Profil Lulusan </h4>
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
                                <a class="btn btn-primary" href="/superadmin/masterD/create" role="button">Tambah Domain Profil Lulusan</a>
                            </div>
                        </div>
                        <hr>
						<!-- TABEL -->
						<div class="table-responsive">
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
								<colgroup>
									<col span="1" style="width: 10%">
									<col span="1" style="width: 80%">
									<col span="1" style="width: 10%">
								</colgroup>
								<thead>
									<tr>
										<th>No</th>
										<th>Domain Profil Lulusan</th>
										<th >Aksi</th>				
									</tr>
								</thead>
								<tbody>
									@foreach($domain as $domainP)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $domainP->nama }}</td>
										<td>
											<a class="btn btn-link" href="/superadmin/masterD/edit/{{ $domainP->id }}"><i class="fa fa-pencil" style="color:#093697"></i></a>
											<a class="btn btn-link" href="/superadmin/masterD/delete/{{ $domainP->id }}"><i class="fa fa-trash" style="color:#093697"></i></a>
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