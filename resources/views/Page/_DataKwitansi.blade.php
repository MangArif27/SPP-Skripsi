@extends('Index')
@section('konten')
<!-- animation nifty modal window effects css -->
<script src="/scripts/snippet-javascript-console.min.js?v=1"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/files/assets/css/component.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/files/assets/css/sweetalert.css')}}">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Cetak Kuitansi </h4>
                                    <span>Sistem Informasi Pembayaran Sekolah SMK Madani Depok</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- notifikasi sukses --}}
                @if ($sukses = Session::get('sukses'))
                <div class="alert alert-success background-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled text-white"></i>
                    </button>
                    <strong>{{$sukses}}</strong>
                </div>
                @endif
                <!-- Page-header end -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Zero config.table start -->
                            <div class="card">
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>No Induk Siswa</th>
                                                    <th>Tahun Ajaran/Semester</th>
                                                    <th>Jumlah Tunggakan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($Tunggakan as $key => $value )
                                                @foreach($value as $Pembayaran)
                                                @foreach(DB::table('siswa')->where('nis',$key)->select('nama')->groupBy('nama')->get() as $Siswa)
                                                <tr>
                                                    <td>{{$Siswa->nama}}</td>
                                                    <td>{{$key}}</td>
                                                    <td>{{$Pembayaran->tahun_ajaran}} / {{$Pembayaran->semester}}</td>
                                                    @foreach(DB::table('jenis_tagihan')->where('id_tagihan',$Pembayaran->id_tagihan)->get() as $JenisTagihan)
                                                    <?php
                                                    if ($Pembayaran->spp_a == NULL) {
                                                        $Bulan1 = $JenisTagihan->spp;
                                                    } else {
                                                        $Bulan1 = 0;
                                                    }
                                                    if ($Pembayaran->spp_b == NULL) {
                                                        $Bulan2 = $JenisTagihan->spp;
                                                    } else {
                                                        $Bulan2 = 0;
                                                    }
                                                    if ($Pembayaran->spp_c == NULL) {
                                                        $Bulan3 = $JenisTagihan->spp;
                                                    } else {
                                                        $Bulan3 = 0;
                                                    }
                                                    if ($Pembayaran->spp_d == NULL) {
                                                        $Bulan4 = $JenisTagihan->spp;
                                                    } else {
                                                        $Bulan4 = 0;
                                                    }
                                                    if ($Pembayaran->spp_e == NULL) {
                                                        $Bulan5 = $JenisTagihan->spp;
                                                    } else {
                                                        $Bulan5 = 0;
                                                    }
                                                    if ($Pembayaran->spp_f == NULL) {
                                                        $Bulan6 = $JenisTagihan->spp;
                                                    } else {
                                                        $Bulan6 = 0;
                                                    }
                                                    $Jumlah = $Bulan1 + $Bulan2 + $Bulan3 + $Bulan4 + $Bulan5 + $Bulan6; ?>
                                                    @endforeach
                                                    <td style="background-color:#FF0000;">
                                                        <span style="color: white;">Rp. {{number_format($Jumlah)}}</span>
                                                    </td>
                                                    <td><a href="/Cetak-Kwitansi/{{$Pembayaran->id_pembayaran}}" target="_blank" class="btn btn-warning btn-mini waves-effect waves-light"><i class="icofont icofont-print"></i> Cetak Kuitansi</a></td>
                                                </tr>
                                                @endforeach
                                                @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-body end -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<!-- data-table js -->
<script src="{{asset('/files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/files/assets/pages/data-table/js/jszip.min.js')}}"></script>
<script src="{{asset('/files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
<script src="{{asset('/files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/files/assets/pages/data-table/js/data-table-custom.js')}}"></script>
<!-- modalEffects js nifty modal window effects -->
<script type="text/javascript" src="{{asset('/files/assets/js/sweetalert.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/assets/js/modal.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/assets/js/modalEffects.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/assets/js/classie.js')}}"></script>
<!-- Modal EditPengguna -->
@endsection