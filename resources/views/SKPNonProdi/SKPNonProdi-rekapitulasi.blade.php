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
                                                <div class="table-responsive">
                                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Mahasiswa</th>
                                                                <th>NIM</th>
                                                                <th>Aktivitas Kemahasiswaan</th>
                                                                <th>Kegiatan</th>
                                                                <th>Jenjang Pendidikan</th>				
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($mhsSkpWajib as $skpW)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $skpW->mahasiswa_nama }}</td>
                                                                <td>{{ $skpW->mahasiswa_username}}</td>
                                                                <td>{{ $skpW->aktivitas_kemahasiswaan }}</td>
                                                                <td>{{ $skpW->skp_wajib_nama_kegiatan }}</td>
                                                                <td>{{ $skpW->jenjang_pendidikan }}</td>
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
        text: 'Rekap Mahasiswa Berdasarkan Aktivitas Kemahasiswaan'
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
            name: 'Pendalaman Nilai Dasar Islam',
            y: {{$pndi}},
            sliced: true,
            selected: true
        }, {
            name: 'Pengembangan Diri Qurani',
            y: {{$pdq}}
        }, {
            name: 'Pelatihan Pengembangan Diri',
            y: {{$ppd}}
        }, {
            name: 'Pelatihan Kepemimpinan dan Dakwah',
            y: {{$pkd}}
        },
        ]
    }]
});
</script>
@endpush