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
                            <li class="active">Rekapitulasi SKP</li>
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

                        <div id="chartSKPWajib"></div>

                        <div class="container-fullwidth">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab" role="tabpanel">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-justified " role="tablist">
                                            <li role="presentation" class="nav-item active">
                                                <a class="nav-link active" href="#skpWajib" role="tab" data-toggle="tab">Rekapitulasi Mahasiswa SKP Wajib</a>
                                            </li>
                                            <li role="presentation" class="nav-item">
                                                <a class="nav-link" href="#skpPilihan" role="tab" data-toggle="tab">Rekapitulasi Mahasiswa SKP Pilihan</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade show active" id="skpWajib">
                                                <!-- TABEL SKP Wajib -->
                                                <div class="table-responsive">
                                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Mahasiswa</th>
                                                                <th>NIM</th>
                                                                <th>Kegiatan</th>
                                                                <th>Jenjang Pendidikan</th>
                                                                <th>Poin SKP</th>				
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($mhsSkpWajib as $skpW)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $skpW->mahasiswa_nama }}</td>
                                                                <td>{{ $skpW->mahasiswa_username}}</td>
                                                                <td>{{ $skpW->skp_wajib_nama_kegiatan }}</td>
                                                                <td>{{ $skpW->jenjang_pendidikan }}</td>
                                                                <td>{{ $skpW->poin_skp }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="skpPilihan">
                                                <!-- TABEL SKP Pilihan -->
                                                <div class="table-responsive">
                                                    <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Mahasiswa</th>
                                                                <th>NIM</th>
                                                                <th>Kegiatan</th>
                                                                <th>Jenjang Pendidikan</th>
                                                                <th>Poin SKP</th>				
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($mhsSkpPilihan as $skpP)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $skpP->nama_mhs }}</td>
                                                                <td>{{ $skpP->nim}}</td>
                                                                <td>{{ $skpP->nama_kegiatan }}</td>
                                                                <td>{{ $skpP->jenjang }}</td>
                                                                <td>{{ $skpP->poin }}</td>
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

@push('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartSKPWajib', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Minat Mahasiswa Berdasarkan Domain Profil Lulusan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Persentase',
        colorByPoint: true,
        data: [{
            name: 'Kepribadian Islami',
            y: {{$kepribadianIslami}},
            sliced: true,
            selected: true
        }, {
            name: 'Keterampilan Transformatif',
            y: {{$keterampilanTransformatif}}
        }, {
            name: 'Kepemimpinan Profetik',
            y: {{$kepemimpinanProfetik}}
        }, {
            name: 'Pengetahuan Integratif',
            y: {{$pengetahuanIntegratif}}
        },
        ]
    }]
});
</script>
@endpush