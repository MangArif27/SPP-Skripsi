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
                                            $Persentase =  $SudahLunas * 100;
                                        } else {
                                            $Persentase =  $SudahLunas / $JumlahAll * 100;
                                        }
                                        if ($Persentase == 0) {
                                            $PersentaseLunas = 0;
                                        } elseif ($Persentase <= 6) {
                                            $PersentaseLunas = 5;
                                        } elseif ($Persentase <= 11) {
                                            $PersentaseLunas = 10;
                                        } elseif ($Persentase <= 16) {
                                            $PersentaseLunas = 15;
                                        } elseif ($Persentase <= 21) {
                                            $PersentaseLunas = 20;
                                        } elseif ($Persentase <= 26) {
                                            $PersentaseLunas = 25;
                                        } elseif ($Persentase <= 31) {
                                            $PersentaseLunas = 30;
                                        } elseif ($Persentase <= 36) {
                                            $PersentaseLunas = 35;
                                        } elseif ($Persentase <= 41) {
                                            $PersentaseLunas = 40;
                                        } elseif ($Persentase <= 46) {
                                            $PersentaseLunas = 45;
                                        } elseif ($Persentase <= 51) {
                                            $PersentaseLunas = 50;
                                        } elseif ($Persentase <= 56) {
                                            $PersentaseLunas = 55;
                                        } elseif ($Persentase <= 61) {
                                            $PersentaseLunas = 60;
                                        } elseif ($Persentase <= 66) {
                                            $PersentaseLunas = 65;
                                        } elseif ($Persentase <= 71) {
                                            $PersentaseLunas = 70;
                                        } elseif ($Persentase <= 76) {
                                            $PersentaseLunas = 75;
                                        } elseif ($Persentase <= 81) {
                                            $PersentaseLunas = 80;
                                        } elseif ($Persentase <= 86) {
                                            $PersentaseLunas = 85;
                                        } elseif ($Persentase <= 94) {
                                            $PersentaseLunas = 90;
                                        } elseif ($Persentase < 100) {
                                            $PersentaseLunas = 95;
                                        } elseif ($Persentase = 100) {
                                            $PersentaseLunas = 100;
                                        }
                                        if ($BelumLunas == 0) {
                                            $PersentaseX = $BelumLunas * 100;
                                        } else {
                                            $PersentaseX = $BelumLunas / $JumlahAll * 100;
                                        }
                                        if ($PersentaseX == 0) {
                                            $PersentaseBelum = 0;
                                        } elseif ($PersentaseX <= 6) {
                                            $PersentaseBelum = 5;
                                        } elseif ($PersentaseX <= 11) {
                                            $PersentaseBelum = 10;
                                        } elseif ($PersentaseX <= 16) {
                                            $PersentaseBelum = 15;
                                        } elseif ($PersentaseX <= 21) {
                                            $PersentaseBelum = 20;
                                        } elseif ($PersentaseX <= 26) {
                                            $PersentaseBelum = 25;
                                        } elseif ($PersentaseX <= 31) {
                                            $PersentaseBelum = 30;
                                        } elseif ($PersentaseX <= 36) {
                                            $PersentaseBelum = 30;
                                        } elseif ($PersentaseX <= 41) {
                                            $PersentaseBelum = 35;
                                        } elseif ($PersentaseX <= 46) {
                                            $PersentaseBelum = 40;
                                        } elseif ($PersentaseX <= 51) {
                                            $PersentaseBelum = 45;
                                        } elseif ($PersentaseX <= 56) {
                                            $PersentaseBelum = 55;
                                        } elseif ($PersentaseX <= 61) {
                                            $PersentaseBelum = 55;
                                        } elseif ($PersentaseX <= 66) {
                                            $PersentaseBelum = 60;
                                        } elseif ($PersentaseX <= 71) {
                                            $PersentaseBelum = 65;
                                        } elseif ($PersentaseX <= 76) {
                                            $PersentaseBelum = 70;
                                        } elseif ($PersentaseX <= 81) {
                                            $PersentaseBelum = 75;
                                        } elseif ($PersentaseX <= 86) {
                                            $PersentaseBelum = 80;
                                        } elseif ($PersentaseX <= 91) {
                                            $PersentaseBelum = 85;
                                        } elseif ($PersentaseX <= 96) {
                                            $PersentaseBelum = 90;
                                        } elseif ($PersentaseX < 100) {
                                            $PersentaseBelum = 95;
                                        } elseif ($PersentaseX == 100) {
                                            $PersentaseBelum = 100;
                                        }
                                        ?>
                                        <div class="col-6">
                                            <div data-label="{{round($Persentase)}}%" class="radial-bar radial-bar-{{$PersentaseLunas}} radial-bar-lg radial-bar-success"></div>
                                            <h6 class="text-muted">Selesai</h6>
                                            <p class="text-muted">{{$SudahLunas}} Siswa</p>
                                            <button class="btn btn-success btn-round btn-sm">Sudah Lunas</button>
                                        </div>
                                        <div class="col-6">
                                            <div data-label="{{round($PersentaseX)}}%"" class=" radial-bar radial-bar-{{round($PersentaseBelum)}} radial-bar-lg radial-bar-danger"></div>
                                            <h6 class="text-muted">Proses</h6>
                                            <p class="text-muted">{{$BelumLunas}} Siswa</p>
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
            text: 'Sistem Informasi Pembayaran SPP SMK Madani Depok',
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