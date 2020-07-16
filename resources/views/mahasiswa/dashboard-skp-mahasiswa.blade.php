@extends('layouts.LYmahasiswa')

@section('content')

    <!--  Breadcrumb  -->
	<div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                            <li><a href="#"><i class="menu-icon fa fa-home"></i> </a></li>
                            <li class="active">Dashboard</li>
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
						<h1 class="font-weight-bold">Selamat Datang Di UIISKP</h1>
						<p>Satuan Kredit Partisipasi</p>

						<!--  CARD WAJIB  -->
						<div class="card bg-light">
							<h5 class="card-header bg-primary text-white">Nilai SKP Wajib Anda</h5>
								<div class="card-body">
									<div class="table-responsive">
										<table>
											@if(Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Sarjana')
													<tr>
														<td>Pendalaman Nilai Dasar Islam (PNDI)</td>
														<td> : {{$jumlahpndi}}/20</td>
													</tr>
													<tr>
														<td>Pengembangan Diri Qurani (PDQ)</td>
														<td> : {{$pdq !== null ? $pdq->poin_skp : '0'}}/20</td>
													</tr>
													<tr>
														<td>Pelatihan Pengembangan Diri (PPD) </td>
														<td> : {{$ppd !== null ? $ppd->poin_skp : '0'}}/5</td>
													</tr>
													<tr>
														<td>Pelatihan Kepemimpinan dan Dakwah (PKD)</td>
														<td> : {{$jumlahpkd}}/5</td>
													</tr>
													<tr>
														<td>Perolehan SKP Wajib</td>
														<td> : {{$wajibs}}/50</td>
													</tr>
											@endif
											@if(Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Diploma')
											<tr>
												<td>Pendalaman Nilai Dasar Islam (PNDI)</td>
												<td> : {{$pndidiploma !== null ? $pndidiploma->poin_skp : '0'}}/10</td>
											</tr>
											<tr>
												<td>Pengembangan DIri Qurani (PDQ)</td>
												<td> : {{$$pdqdiploma !== null ? $pdqdiploma->poin_skp : '0'}}/10</td>
											</tr>
											<tr>
												<td>Pelatihan Pengembangan Diri (PPD) </td>
												<td> : {{$$ppddiploma !== null ? $ppddiploma->poin_skp : '0'}}/5</td>
											</tr>
											<tr>
												<td>Pelatihan Kepemimpinan dan Dakwah (PKD)</td>
												<td> : {{$pkddiploma !== null ? $pkddiploma->poin_skp : '0'}}/5</td>
											</tr>
											@endif
											@if(Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Magister'||Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Doktor')
											<tr>
												<td>Studi Intensif Al-Quran</td>
												<td> : {{$studi !== null ? $studi->poin_skp : '0'}}/5</td>
											</tr>
											<tr>
												<td>Islam Rahmatan lil 'Alamin</td>
												<td> : {{$islam !== null ? $islam->poin_skp : '0'}}/3</td>
											</tr>
											<tr>
												<td>Pengabdian kepada Masyarakat</td>
												<td> : {{$pengabdian !== null ? $pengabdian->poin_skp : '0'}}/2</td>
											</tr>
											@endif
											@if(Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Profesi')
											<tr>
												<td>Studi Intensif Al-Quran</td>
												<td> : {{$studi !== null ? $studi->poin_skp : '0'}}/2</td>
											</tr>
											<tr>
												<td>Islam Rahmatan lil 'Alamin</td>
												<td> : {{$islam !== null ? $islam->poin_skp : '0'}}/2</td>
											</tr>
											<tr>
												<td>Pengabdian kepada Masyarakat</td>
												<td> : {{$pengabdian !== null ? $pengabdian->poin_skp : '0'}}/2</td>
											</tr>
											@endif


										</table>
									</div>
								</div>
						</div>
						<!--  CARD PILIHAN  -->
						<div class="card bg-light">
							<h5 class="card-header bg-primary text-white">Nilai SKP Pilihan Anda</h5>
								<div class="card-body">
									<div class="table-responsive">
										<table>
										@if(Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Sarjana')
											<tr>
												<td>Perolehan SKP Pilihan</td>
												<td> : {{$jumlahsarjana}}/10</td>
											</tr>
										@endif
										@if(Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Diploma')
											<tr>
												<td>Perolehan SKP Pilihan</td>
												<td> : {{$jumlahdiploma}}/10</td>
											</tr>
										@endif
										@if(Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Magister'||Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Doktor')
											<tr>
												<td>Perolehan SKP Pilihan</td>
												<td> : {{$jumlah3}}/5</td>
											</tr>
										@endif
										@if(Auth::guard('mahasiswa')->user()->jenjang_pendidikan == 'Profesi')
											<tr>
												<td>Perolehan SKP Pilihan</td>
												<td> : {{$jumlah4}}/5</td>
											</tr>
										@endif
										</table>
									</div>
								</div>
						</div>
                    </div>
                </div>
            </div><!-- /# column -->
        </div>
	</div>



@endsection