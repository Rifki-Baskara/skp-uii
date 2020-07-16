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
                            <li><a href="/superadmin/masterA">Master Aktivitas</a></li>
                            <li class="active">Ubah</li>
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
                        <h4 class="box-title">Ubah Aktivitas Kemahasiswaan </h4>
                        <hr color="yellow">
                        @if (session('status'))
							<div class="alert alert-success alert-dismissible fade show">
								{{ session('status') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
                        @endif

                        <form action="/superadmin/masterA/updateP/{{ $domain->id}}" method="POST">
							@csrf
							<div class="form-group">
                                <label for="domain_profil_lulusan_nama" class="form-control-label">Domain Profil Lulusan</label>
                                <select class="form-control @error('domain_profil_lulusan_nama') is-invalid @enderror" name="domain_profil_lulusan_nama">
                                    <option value="" disabled>- Pilih -</option>
                                    <option value="{{$domain->domain_profil_lulusan_nama}}">{{$domain->domain_profil_lulusan_nama}}</option>
                                    @foreach($domains as $domainP)
                                        <option value="{{$domainP->nama}}" @if($domainP->nama == $domain->domain_profil_lulusan_nama) hidden @endif>{{$domainP->nama}}</option>
                                    @endforeach         
                                </select>
                                @error('domain_profil_lulusan_nama')
                                <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
							</div>
                            <div class="form-group">
                                <label for="aktivitas_kemahasiswaan" class="form-control-label">Aktivitas Kemahasiswaan</label>
                                <input type="text" id="aktivitas_kemahasiswaan" value="{{ $domain->aktivitas_kemahasiswaan }}" placeholder="" class="form-control @error('aktivitas_kemahasiswaan') is-invalid @enderror" name="aktivitas_kemahasiswaan">
                                @error('aktivitas_kemahasiswaan')
                                <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="bukti_kegiatan" class="form-control-label">Bukti Kegiatan</label>
                                <input type="text" id="bukti_kegiatan" value="{{ $domain->bukti_kegiatan }}" placeholder="" class="form-control @error('bukti_kegiatan') is-invalid @enderror" name="bukti_kegiatan">
                                @error('bukti_kegiatan')
                                <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="poin_skp" class="form-control-label">Poin SKP</label>
                                <input type="text" id="poin_skp" value="{{ $domain->poin_skp }}" placeholder="" class="form-control @error('poin_skp') is-invalid @enderror" name="poin_skp">
                                @error('poin_skp')
                                <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>

                            <label for="jenjang_pendidikan" class="form-control-label">Jenjang Pendidikan</label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">Diploma</label>
                                    <input class="form-check-input" type="checkbox" name="jenjang_pendidikan[]" value="Diploma"
                                    {{in_array("Diploma",$jenjang_pendidikan)?"checked":""}}>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">Sarjana</label>
                                    <input class="form-check-input" type="checkbox" name="jenjang_pendidikan[]" value="Sarjana"
                                    {{in_array("Sarjana",$jenjang_pendidikan)?"checked":""}}>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">Profesi</label>
                                    <input class="form-check-input" type="checkbox" name="jenjang_pendidikan[]" value="Profesi"
                                    {{in_array("Profesi",$jenjang_pendidikan)?"checked":""}}>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">Magister</label>
                                    <input class="form-check-input" type="checkbox" name="jenjang_pendidikan[]" value="Magister"
                                    {{in_array("Magister",$jenjang_pendidikan)?"checked":""}}>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">Doktor</label>
                                    <input class="form-check-input" type="checkbox" name="jenjang_pendidikan[]" value="Doktor"
                                    {{in_array("Doktor",$jenjang_pendidikan)?"checked":""}}>
                                </div>
                                <div>
                                    <a href="../" class="btn btn-secondary" >Cancel</a>
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </div>
                            </div>
						</form>
                    </div>
                </div>
            </div><!-- /# column -->
        </div>
	</div>

@endsection