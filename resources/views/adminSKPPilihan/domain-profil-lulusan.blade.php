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
                            <li class="active">Domain Profil Lulusan</li>
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
                        <h4 class="box-title">Domain Profil Lulusan </h4>
						<hr color="yellow">
						@if (session('status'))
							<div class="alert alert-success alert-dismissible fade show">
								{{ session('status') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
						<a class="btn btn-primary" href="/adminskppilihan/domainprofil/create">Tambah Domain Profil Lulusan</a>
						<br>
						<br>
						<!-- TABEL -->
						<div class="table-responsive">
							<table id="bootstrap-data-table" class="table table-striped table-bordered" style="width: 100%">
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
											<a class="btn btn-link" href="/adminskppilihan/domainprofil/edit/{{ $domainP->id }}"><i class="fa fa-pencil" style="color:#093697"></i></a>
											<a class="btn btn-link" href="/adminskppilihan/domainprofil/delete/{{ $domainP->id }}"><i class="fa fa-trash" style="color:#093697"></i></a>
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

		<!-- Modal
		<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="mediumModalLabel">Konfirmasi Delete</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h4>
							Apakah yakin untuk menghapus data?
						</h4>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<a href="#" type="button" class="btn btn-primary">Confirm</a>
					</div>
				</div>
			</div>
		</div> -->
	</div>
@endsection