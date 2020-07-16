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
                            <li><a href="/nonprodi/master">Master Aktivitas</a></li>
                            <li class="active">Tambah</li>
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
                        <h4 class="box-title">Tambah Kegiatan </h4>
                        <hr color="yellow">
                        <form action="/adminskpwajib/infoskpwajib/store" method="POST">
							@csrf
							<div class="form-group">
                                <label for="nama_kegiatan" class="form-control-label">Nama Kegiatan</label>
                                <input type="text" id="nama_kegiatan" value="{{ old ('nama_kegiatan')}}" placeholder="" class="form-control @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan">
                                @error('nama_kegiatan')
                                <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
							</div>
							<div class="form-group">
                                <label for="periode" class="form-control-label">Periode</label>
                                <input type="text" id="periode" value="{{ old ('periode')}}" placeholder="" class="form-control @error('periode') is-invalid @enderror" name="periode">
                                @error('periode')
                                <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>
							<div>
								<a href="./" class="btn btn-secondary" >Cancel</a>
								<button type="submit" class="btn btn-primary">Confirm</button>
							</div>
						</form>
                    </div>
                </div>
            </div><!-- /# column -->
        </div>
	</div>

@endsection