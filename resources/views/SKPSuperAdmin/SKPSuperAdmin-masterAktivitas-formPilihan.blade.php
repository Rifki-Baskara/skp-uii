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
                        <h4 class="box-title">Tambah Aktivitas </h4>
                        <hr color="yellow">
                        @if (session('status'))
							<div class="alert alert-success alert-dismissible fade show">
								{{ session('status') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
                        @endif

                        <form action="/superadmin/masterA/storeP" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="domain_profil_lulusan_nama" class="form-control-label">Domain Profil Lulusan</label>
                                <select class="form-control @error('domain_profil_lulusan_nama') is-invalid @enderror" name="domain_profil_lulusan_nama">
                                    <option value=""@if(old('domain_profil_lulusan_nama') == '') selected @endif  disabled>- Pilih -</option>
                                    @foreach($domain as $domainP)
                                        <option value="{{$domainP->nama}}" @if(old('domain_profil_lulusan_nama') == '{{$domainP->nama}}') selected @endif>{{$domainP->nama}}</option>
                                    @endforeach         
                                </select>
                                @error('domain_profil_lulusan_nama')
                                <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="aktivitas_kemahasiswaan" class="form-control-label">Aktivitas Kemahasiswaan</label>
                                <input type="text" id="aktivitas_kemahasiswaan" value="{{ old ('aktivitas_kemahasiswaan')}}" placeholder="" class="form-control @error('aktivitas_kemahasiswaan') is-invalid @enderror" name="aktivitas_kemahasiswaan">
                                @error('aktivitas_kemahasiswaan')
                                <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="bukti_kegiatan" class="form-control-label">Bukti Kegiatan</label>
                                <input type="text" id="bukti_kegiatan" value="{{ old ('bukti_kegiatan')}}" placeholder="" class="form-control @error('bukti_kegiatan') is-invalid @enderror" name="bukti_kegiatan">
                                @error('bukti_kegiatan')
                                <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="poin_skp" class="form-control-label">Poin SKP</label>
                                <input type="text" id="poin_skp" value="{{ old ('poin_skp')}}" placeholder="" class="form-control @error('poin_skp') is-invalid @enderror" name="poin_skp">
                                @error('poin_skp')
                                <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>

                            <label for="jenjang_pendidikan" class="form-control-label">Jenjang Pendidikan</label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="jenjang_pendidikan[]" value="Diploma">
                                    <label class="form-check-label" for="inlineCheckbox1">Diploma</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="jenjang_pendidikan[]" value="Sarjana">
                                    <label class="form-check-label" for="inlineCheckbox2">Sarjana</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="jenjang_pendidikan[]" value="Profesi">
                                    <label class="form-check-label" for="inlineCheckbox3">Profesi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="jenjang_pendidikan[]" value="Magister">
                                    <label class="form-check-label" for="inlineCheckbox3">Magister</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="jenjang_pendidikan[]" value="Doktor">
                                    <label class="form-check-label" for="inlineCheckbox3">Doktor</label>
                                </div>
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