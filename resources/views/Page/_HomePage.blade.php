@extends('Index')
@foreach(DB::table('pengaturan')->get() as $Pengaturan)
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
                {{-- notifikasi sukses --}}
                @if ($sukses = Session::get('sukses'))
                <div class="alert alert-success background-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled text-white"></i>
                    </button>
                    <strong>{{$sukses}}</strong>
                </div>
                @elseif($gagal = Session::get('gagal'))
                <div class="alert alert-danger background-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled text-white"></i>
                    </button>
                    <strong>{{$gagal}}</strong>
                </div>
                @endif
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
                                    <h5>Progres Capaian Pembayaran</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row per-task-block text-center">
                                        <?php
                                        $JumlahAll = DB::table('pembayaran_spp')->where('tahun_ajaran', $Pengaturan->tahun_ajaran)->where('semester', $Pengaturan->semester)->count();
                                        $SudahLunas = DB::table('pembayaran_spp')->where('tahun_ajaran', $Pengaturan->tahun_ajaran)->where('semester', $Pengaturan->semester)->where('keterangan', 'Sudah Lunas')->count();
                                        $BelumLunas = DB::table('pembayaran_spp')->where('tahun_ajaran', $Pengaturan->tahun_ajaran)->where('semester', $Pengaturan->semester)->where('keterangan', 'Belum Lunas')->count();
                                        if ($SudahLunas == 0) {
                                            $PersentaseLunas =  $SudahLunas * 100;
                                        } else {
                                            $PersentaseLunas =  $SudahLunas / $JumlahAll * 100;
                                        }
                                        if ($BelumLunas == 0) {
                                            $PersentaseBelum = $BelumLunas * 100;
                                        } else {
                                            $PersentaseBelum = $BelumLunas / $JumlahAll * 100;
                                        }
                                        ?>
                                        <div class="col-6">
                                            <div data-label="{{round($PersentaseLunas)}}%" class="radial-bar radial-bar-{{round($PersentaseLunas)}} radial-bar-lg radial-bar-success"></div>
                                            <h6 class="text-muted">Selesai</h6>
                                            <p class="text-muted">{{$SudahLunas}} Berkas</p>
                                            <button class="btn btn-success btn-round btn-sm">Sudah Lunas</button>
                                        </div>
                                        <div class="col-6">
                                            <div data-label="{{round($PersentaseBelum)}}%"" class=" radial-bar radial-bar-{{round($PersentaseBelum)}} radial-bar-lg radial-bar-danger"></div>
                                            <h6 class="text-muted">Proses</h6>
                                            <p class="text-muted">{{$BelumLunas}} Berkas</p>
                                            <button class="btn btn-danger btn-round btn-sm">Belum Lunas</button>
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
            text: 'Grafik Pembayaran <?php $Now = date('Y');
                                        echo $Now; ?>',
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
            categories: <?php echo json_encode($BulanSemester) ?>
        },
        series: [{
            name: 'Sudah Bayar',
            data: <?php echo json_encode($DataSemester) ?>
        }, {
            name: 'Sudah Lunas',
            data: <?php echo json_encode($DataLunas) ?>
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
@endforeach