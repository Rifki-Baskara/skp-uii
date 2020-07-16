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
                        <h4 class="box-title">Detail Pengajuan SKP Pilihan</h4>
                        <hr color="yellow">
                        <form action="{{ url ('/dpa/laporan/update',$detail->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                    <div class="row">
                        <div class="col-6">
                            <div class="card bg-light">
                                <h5 class="card-header bg-primary text-white">Deskripsi</h5>
                                <div class="card-body">
                                    <table>
										<tr>
    										<td>Nama</td>
                                            <td>: {{$detail->nama_mhs}}</td>
										</tr>
										<tr>
											<td>NIM</td>
											<td> : {{$detail->nim}}</td>
										</tr>
										<tr>
											<td>Nama Kegiatan</td>
											<td> : {{$detail->nama_kegiatan}}</td>
										</tr>
										<tr>
											<td>Lokasi Kegiatan</td>
											<td> : {{$detail->lokasi}}</td>
                                        </tr>
                                        <tr>
											<td>Penyelenggara</td>
											<td> : {{$detail->penyelenggara}}</td>
                                        </tr>
                                        <tr>
											<td>Prestasi Yang Diraih</td>
											<td> : {{$detail->prestasi}}</td>
                                        </tr>
                                        <tr>
											<td>Waktu Pelaksanaan</td>
											<td> : {{$detail->tanggal_mulai}} sampai {{$detail->tanggal_selesai}}</td>
                                        </tr>
                                        <tr>
											<td>Deskripsi Kegiatan</td>
											<td> : {{$detail->deskripsi}}</td>
                                        </tr>
                                        <tr>
                                            <td>Bukti Kegiatan</td>
                                            @foreach ($detail -> berkas_kegiatan as $berkas)
                                            <td> : <a href="{{url('berkas_pengajuan/'.$berkas)}}"> {{$berkas}} </a></td>
                                            @endforeach
                                        </tr>
									</table>
                                </div>

                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="card bg-light">
                                <h5 class="card-header bg-primary text-white">Verifikasi</h5>
                                <div class="card-body">
                                    <table>
                                        <div class="form-group">
                                            <label for="poin" class="form-control-label">Poin</label>
                                            <select class="form-control" name="poin">
                                                <option value="" selected="selected">- Pilih -</option>
                                                <option value="1">1</option>  
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="form-control-label">Verifikasi</label>
                                            <select class="form-control @error('status') is-invalid @enderror" name="status" id="verifikasiSelector">
                                                <option value="" disabled>- Pilih -</option>
                                                <option value="Disetujui">Disetujui</option>  
                                                <option value="Disetujui dan layak masuk SKPI">Disetujui dan layak masuk SKPI</option>
                                                <option value="Revisi">Revisi</option>
                                                <option value="Ditolak">Ditolak</option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="display: none;" id="kategori">
                                            <label for="kategori" class="form-control-label">Kategori Informasi Tambahan</label>
                                            <select class="form-control" name="kategori">
                                                <option value="" selected="selected">- Pilih -</option>
                                                <option value="Keterampilan">Keterampilan</option>  
                                                <option value="Pengalaman">Pengalaman</option>
                                                <option value="Prestasi/Penghargaan">Prestasi/Penghargaan</option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="display: none;" id="komentar">
                                            <label for="komentar" class="form-control-label">Komentar</label>
                                            <textarea id="komentar" value="{{$detail->komentar}}" class="form-control" placeholder="" name="komentar"></textarea>
                                        </div>
                                        <hr color="yellow">
                                        <div class="form-button text-center ">
                                            <a class="btn btn-secondary btn-lg mx-2" href="/dpa/laporan" role="button">Kembali</a>
                                            <button class="btn btn-success btn-lg mx-2" type="submit">Update</button>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
	</div>
@endsection

@push('script')
    
    <script type="text/javascript">
        $(function() {
            $('#verifikasiSelector').change(function() {
                // $('.komentar').hide();
                console.log(this.value);
                if(this.value=="Revisi")
                {
                    $('#komentar').show();
                    $('#kategori').hide();
                }
                else if(this.value=="Ditolak")
                {
                    $('#komentar').show();
                    $('#kategori').hide();
                }
                else if (this.value=="Disetujui dan layak masuk SKPI")
                {
                    $('#kategori').show(); 
                    $('#komentar').hide();
                }
                else if (this.value=="Disetujui")
                {
                    $('#komentar').hide();
                    $('#kategori').hide();
                }
                else{$('#komentar' & '#kategori').hide()
                }
            });
        });
    </script>
@endpush