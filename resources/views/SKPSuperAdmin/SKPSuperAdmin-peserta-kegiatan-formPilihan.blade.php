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
                            <li><a href="/superadmin/peserta">Peserta Kegiatan SKP</a></li>
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
                        <h4 class="box-title">Tambah Kegiatan SKP </h4>
                        <hr color="yellow">

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
                            </div>
                        @endif

                        @if (session('status'))
							<div class="alert alert-success alert-dismissible fade show">
								{{ session('status') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
                        @endif

                        <form action="/superadmin/peserta/storeP" method="POST" id="formInput">
                            @csrf
                            <!--  Aktivitas Kemahasiswaan & Domain Profil  -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="domain_profil" class="form-control-label">Domain Profil Lulusan</label>
                                                <select class="form-control @error('domain_profil') is-invalid @enderror" name="domain_profil">
                                                    <option value=""@if(old('domain_profil') == '') selected @endif  disabled>- Pilih -</option>
                                                    @foreach($domain as $domainP)
                                                        <option value="{{$domainP->nama}}" @if(old('domain_profil') == '{{$domainP->nama}}') selected @endif>{{$domainP->nama}}</option>
                                                    @endforeach         
                                                </select>
                                                @error('domain_profil')
                                                <div class="invalid-feedback"> {{$message}} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="aktivitas_kemahasiswaan" class="form-control-label">Aktivitas Kemahasiswaan</label>
                                                <select class="form-control @error('aktivitas_kemahasiswaan') is-invalid @enderror" name="aktivitas_kemahasiswaan">
                                                    <option value=""@if(old('aktivitas_kemahasiswaan') == '') selected @endif  disabled>- Pilih -</option>
                                                    @foreach($aktivitas as $ak)
                                                        <option value="{{$ak->aktivitas_kemahasiswaan}}" @if(old('aktivitas_kemahasiswaan') == '{{$ak->aktivitas_kemahasiswaan}}') selected @endif>{{$ak->aktivitas_kemahasiswaan}}</option>
                                                    @endforeach         
                                                </select>
                                                @error('aktivitas_kemahasiswaan')
                                                <div class="invalid-feedback"> {{$message}} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--  Nama Kegiatan & Penyelenggara  -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="nama_kegiatan" class="form-control-label">Nama Kegiatan</label>
                                                <input type="text" id="nama_kegiatan" value="{{ old ('nama_kegiatan')}}" placeholder="" class="form-control @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan">
                                                @error('nama_kegiatan')
                                                <div class="invalid-feedback"> {{$message}} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="penyelenggara" class="form-control-label">Penyelenggara Kegiatan</label>
                                                <input type="text" id="penyelenggara" value="Universitas" class="form-control" name="penyelenggara" readonly>
                                                @error('penyelenggara')
                                                <div class="invalid-feedback"> {{$message}} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--  Jenjang Pendidikan & Bobot SKP  -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="jenjang" class="form-control-label">Jenjang Pendidikan</label>
                                                <select class="form-control @error('jenjang') is-invalid @enderror" name="jenjang">
                                                    <option value=""@if(old('jenjang') == '') selected @endif  disabled>- Pilih -</option>
                                                    <option value="Diploma" @if(old('jenjang') == 'Diploma') selected @endif>Diploma</option>
                                                    <option value="Sarjana" @if(old('jenjang') == 'Sarjana') selected @endif>Sarjana</option>
                                                    <option value="Profesi" @if(old('jenjang') == 'Profesi') selected @endif>Profesi</option>  
                                                    <option value="Magister" @if(old('jenjang') == 'Magister') selected @endif>Magister</option>
                                                    <option value="Doktor" @if(old('jenjang') == 'Doktor') selected @endif>Doktor</option>                
                                                </select>
                                                @error('jenjang')
                                                <div class="invalid-feedback"> {{$message}} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="poin" class="form-control-label">Bobot SKP</label>
                                                <input type="text" id="poin" value="{{ old ('poin')}}" placeholder="" class="form-control @error('poin') is-invalid @enderror" name="poin">
                                                @error('poin')
                                                <div class="invalid-feedback"> {{$message}} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--  Waktu  -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="tanggal_mulai" class="form-control-label">Waktu Pelaksanaan</label>
                                                <input type="date" id="tanggal_mulai" value="{{ old ('tanggal_mulai')}}" placeholder="" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai">
                                                @error('tanggal_mulai')
                                                <div class="invalid-feedback"> {{$message}} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="tanggal_selesai" class="form-control-label">Waktu Selesai</label>
                                                <input type="date" id="tanggal_selesai" value="{{ old ('tanggal_selesai')}}" placeholder="" class="form-control @error('tanggal_selesai') is-invalid @enderror" name="tanggal_selesai">
                                                @error('tanggal_selesai')
                                                <div class="invalid-feedback"> {{$message}} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--  Level  -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="level_kegiatan" class="form-control-label">Level Kegiatan</label>
                                                <select class="form-control @error('level_kegiatan') is-invalid @enderror" name="level_kegiatan">
                                                    <option value=""@if(old('level_kegiatan') == '') selected @endif  disabled>- Pilih -</option>
                                                    <option value="Universitas" @if(old('level_kegiatan') == 'Universitas') selected @endif>Universitas</option>
                                                    <option value="Nasional" @if(old('level_kegiatan') == 'Nasional') selected @endif>Nasional</option>
                                                    <option value="Internasional" @if(old('level_kegiatan') == 'Internasional') selected @endif>Internasional</option>  
                                                </select>
                                                @error('level_kegiatan')
                                                <div class="invalid-feedback"> {{$message}} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="prestasi" class="form-control-label">Prestasi</label>
                                                <input type="text" id="prestasi" value="{{ old ('prestasi')}}" placeholder="" class="form-control @error('prestasi') is-invalid @enderror" name="prestasi">
                                                @error('prestasi')
                                                <div class="invalid-feedback"> {{$message}} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--  Bukti & Lokasi  -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="lokasi" class="form-control-label">Lokasi</label>
                                                <input type="text" id="lokasi" value="{{ old ('lokasi')}}" placeholder="" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi">
                                                @error('lokasi')
                                                <div class="invalid-feedback"> {{$message}} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="berkas_kegiatan" class="form-control-label">Bukti Kegiatan</label>
                                                <div class="well well-none padding-bottom-5">
                                                    <input type="file" name="berkas_kegiatan[]" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  Deskripsi  -->
                                    <div class="form-group">
                                        <label for="deskripsi" class="form-control-label">Deskipsi Kegiatan</label>
                                        <textarea id="deskripsi" class="form-control" placeholder="" name="deskripsi"></textarea>
                                        @error('deskripsi')
                                        <div class="invalid-feedback"> {{$message}} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <input type="hidden" name="data" id="data">
                                    <div id="spreadsheet"></div>
                                    <div class="ui divider hidden"></div>
                                </div>
                            </div>

                            <hr color="yellow">
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

@push('script')

    // step 2: include aset-aset jExcel
    <script src="https://bossanova.uk/jexcel/v3/jexcel.js"></script>
    <link rel="stylesheet" href="https://bossanova.uk/jexcel/v3/jexcel.css" type="text/css"/>
    <script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>
    <link rel="stylesheet" href="https://bossanova.uk/jsuites/v2/jsuites.css" type="text/css"/>

    <script>
        $(function () {
            $('#formInput').submit(function (event) {
                var data = $('#spreadsheet').jexcel('getData');
                $('#data').val(JSON.stringify(data));
            });
        });
    
        $('#spreadsheet').jexcel({
            data: [
                ['', '']
            ],
            
            columns: [
                {type: 'text', title: 'Nama', width: 350},
                {type: 'numeric', title: 'NIM', width: 250},
                
            ],
        
        });
        $('#spreadsheet').jexcel('insertRow', 1, 0);
    </script>
@endpush