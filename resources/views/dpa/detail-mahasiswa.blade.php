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
                        <h4 class="box-title">Detail Aktivitas Mahasiswa</h4>
                        <hr color="yellow">
                        <!-- TABEL -->
                        <div class="card bg-light">
							<h5 class="card-header bg-primary text-white">SKP Wajib</h5>
								<div class="card-body">
									<div class="table-responsive">
										<table>
											
                                        @foreach ($detailmhswajib as $datamhswajib)
                                        <tr>
                                            <td>Nama Kegiatan : {{$datamhswajib->aktivitas_kemahasiswaan}}</td>
                                            <td> : {{$datamhswajib->poin_skp}} Poin </td>
                                        </tr>
                                        @endforeach

										</table>
									</div>
								</div>
						</div>
						<div class="card bg-light">
							<h5 class="card-header bg-primary text-white">SKP Wajib</h5>
								<div class="card-body">
									<div class="table-responsive">
										<table>
											
                                        @foreach ($detailmhspilihan as $datamhspilihan)
                                        <tr>
                                            <td>Nama Kegiatan : {{$datamhspilihan->nama_kegiatan}}</td>
                                            <td> : {{$datamhspilihan->poin}} Poin </td>
                                        </tr>
                                        @endforeach
										</table>
									</div>
								</div>
						</div>
                                <div class="form-button text-center ">
                                    <a class="btn btn-secondary btn-lg mx-2" href="/dpa/daftar" role="button">Kembali</a>
                                    <!-- <button class="btn btn-success btn-lg mx-2" type="submit" >Simpan</button> -->
                                </div>
						</div>
                    </div>
                </div>
            </div><!-- /# column -->
        </div>
	</div>
@endsection