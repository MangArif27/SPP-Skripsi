@extends('Index')
@section('konten')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- task, page, download counter  start -->
                        @include('Page._HeadPage')
                        <!-- task, page, download counter  end -->

                        <!--  sale analytics start -->
                        <div class="col-xl-8 col-md-12">
                            <div class="card">
                                <div class="card-block-big">
                                    <div id="Grafik" style="height:305px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="card per-task-card">
                                <div class="card-header">
                                    <h5>Progres Capaian Litmas</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row per-task-block text-center">
                                        <div class="col-6">
                                            <div data-label="80%" class="radial-bar radial-bar-80 radial-bar-lg radial-bar-success"></div>
                                            <h6 class="text-muted">Selesai</h6>
                                            <p class="text-muted">80 Berkas</p>
                                            <button class="btn btn-success btn-round btn-sm">Litmas Selesai</button>
                                        </div>
                                        <div class="col-6">
                                            <div data-label="80%" class="radial-bar radial-bar-80 radial-bar-lg radial-bar-danger"></div>
                                            <h6 class="text-muted">Proses</h6>
                                            <p class="text-muted">80 Berkas</p>
                                            <button class="btn btn-danger btn-round btn-sm">Proses</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer')
<script>
    Highcharts.chart('Grafik', {

        title: {
            text: 'Grafik Pembayaran',
            align: 'left'
        },

        subtitle: {
            text: 'Sistem Informasi Pembayaran Sekolah SMK Madani Depok',
            align: 'left'
        },

        yAxis: {
            title: {
                text: 'Persentase'
            }
        },
        xAxis: {
            categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
        },
        series: [{
            name: 'Permintaan Litmas',
            data: [100, 200, 100, 28, 50, 500]
        }, {
            name: 'Litmas Selesai',
            data: [60, 100, 90, 78, 90, 300]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
</script>
<script type="text/javascript" src="{{asset('/files/assets/pages/dashboard/crm-dashboard.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/chart.js/js/Chart.js')}}"></script>
<!-- gauge js -->
<script src="{{asset('/files/assets/pages/widget/amchart/amcharts.js')}}"></script>
<script src="{{asset('/files/assets/pages/widget/amchart/serial.js')}}"></script>
<script src="{{asset('/files/assets/pages/widget/amchart/light.js')}}"></script>
@endsection