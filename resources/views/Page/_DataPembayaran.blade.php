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
                                    <h4>Data Pembayaran</h4>
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
                                                    <th>Tingkat/Kelas</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($PembayaranSPP as $Pembayaran)
                                                @foreach(DB::table('siswa')->where('nis',$Pembayaran->nis)->get() as $Siswa)
                                                <tr id="index_{{$Pembayaran->id}}">
                                                    <td>{{$Siswa->nama}}</td>
                                                    <td>{{$Pembayaran->nis}}</td>
                                                    <td>{{$Siswa->kelas}}</td>
                                                    @if($Pembayaran->keterangan=="Belum Lunas")
                                                    <td><label class="btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label></td>
                                                    @else
                                                    <td><label class="btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Sudah Lunas</label></td>
                                                    @endif
                                                    <td><button type="button" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="modal" data-target="#PembayaranId{{$Pembayaran->id}}"><i class="icofont icofont-bill-alt"></i> Pembayaran</button>
                                                        <button type="button" class="btn btn-warning btn-mini waves-effect waves-light" data-toggle="modal" data-target="#CetakBuktiId{{$Pembayaran->id}}"><i class="icofont icofont-print"></i> Cetak Struk</button>
                                                        <!--<button type="button" class="btn btn-danger btn-mini waves-effect waves-light alert-confirm-id" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'alert-confirm-id']);"><i class="icofont icofont-trash"></i> Hapus</button>-->
                                                </tr>
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
<!-- Alert Konfirmasi Hapus -->
<script type="text/javascript">
    'use strict';
    $(document).ready(function() {
        document.querySelector('.alert-confirm-id').onclick = function() {
            swal({
                    title: "Apakah Kamu Yakin ?",
                    text: "Akan Menghapus Data Atas Nama : ",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya",
                    closeOnConfirm: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '/Delete-Pembayaran/',
                            success: function(response) {

                                //show success message
                                swal("Suksess!", "Kamu Telah Berhasil Hapus Data",
                                    "success");
                                //remove post on table
                                $(`#index_`).remove();
                                location.reload();
                            }
                        });
                    } else {
                        swal("Cancel", "Kamu Tidak Jadi Hapus Data :)", "error");
                    }
                });
        };
    });
</script>
<!-- Modal LihatPengguna -->
@foreach(DB::table('pembayaran_spp')->get() as $PembayaranSPP)
@foreach(DB::table('siswa')->where('nis',$PembayaranSPP->nis)->where('tahun_ajaran',$PembayaranSPP->tahun_ajaran)->where('semester',$PembayaranSPP->semester)->get() as $Siswa)
@foreach(DB::table('jenis_tagihan')->where('tahun_ajaran',$PembayaranSPP->tahun_ajaran)->where('semester',$PembayaranSPP->semester)->where('tingkat',$PembayaranSPP->tingkat)->get() as $JenisTagihan)
<div id="PembayaranId{{$PembayaranSPP->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pembayaran SPP</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form action="{{ route('Update.Data.Pembayaran') }}" enctype="multipart/form-data" id="FormPembayaran-Id{{$PembayaranSPP->id}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="TahunAjaran" value="{{$PembayaranSPP->tahun_ajaran}}" readonly>
                            </div>
                            <label class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="Semester" value="{{$PembayaranSPP->semester}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NamaSiswa" value="{{$Siswa->nama}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="Nis" value="{{$PembayaranSPP->nis}}" readonly>
                            </div>
                            <label class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="Kelas" value="{{$Siswa->kelas}}" readonly>
                            </div>
                        </div>
                        <hr style="border: 1px dashed;">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bulan</label>
                            <div class="col-sm-4">
                                <label class="col-form-label">Jumlah SPP</label>
                            </div>
                            <label class="col-sm-4 col-form-label">Jumlah Bayar</label>
                            <div class="col-sm-2">
                                <label class="col-form-label">Status</label>
                            </div>
                        </div>
                        <hr style="border: 1px dashed;">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Januari)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_a==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar1{{$PembayaranSPP->id}}" name="SPPBayar1" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar1{{$PembayaranSPP->id}}" name="SPPBayar1" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Februari)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_b==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar2{{$PembayaranSPP->id}}" name="SPPBayar2" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar2{{$PembayaranSPP->id}}" name="SPPBayar2" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Maret)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_c==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar3{{$PembayaranSPP->id}}" name="SPPBayar3" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar3{{$PembayaranSPP->id}}" name="SPPBayar3" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(April)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_d==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar4{{$PembayaranSPP->id}}" name="SPPBayar4" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar4{{$PembayaranSPP->id}}" name="SPPBayar4" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Mei)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_e==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar5{{$PembayaranSPP->id}}" name="SPPBayar5" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar5{{$PembayaranSPP->id}}" name="SPPBayar5" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Juni)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_f==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar6{{$PembayaranSPP->id}}" name="SPPBayar6" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar6{{$PembayaranSPP->id}}" name="SPPBayar6" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                    <button type="submit" form="FormPembayaran-Id{{$PembayaranSPP->id}}" class="btn btn-primary waves-effect waves-light"><i class="icofont icofont-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const <?php echo "InputNumber1" . $PembayaranSPP->id ?> = document.getElementById("SPPBayar1{{$PembayaranSPP->id}}");
    const <?php echo "InputNumber2" . $PembayaranSPP->id ?> = document.getElementById("SPPBayar2{{$PembayaranSPP->id}}");
    const <?php echo "InputNumber3" . $PembayaranSPP->id ?> = document.getElementById("SPPBayar3{{$PembayaranSPP->id}}");
    const <?php echo "InputNumber4" . $PembayaranSPP->id ?> = document.getElementById("SPPBayar4{{$PembayaranSPP->id}}");
    const <?php echo "InputNumber5" . $PembayaranSPP->id ?> = document.getElementById("SPPBayar5{{$PembayaranSPP->id}}");
    const <?php echo "InputNumber6" . $PembayaranSPP->id ?> = document.getElementById("SPPBayar6{{$PembayaranSPP->id}}");
    <?php echo "InputNumber1" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber1" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber1" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber2" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber2" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber2" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber3" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber3" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber3" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber4" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber4" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber4" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber5" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber5" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber5" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber6" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber6" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber6" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber2" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber2" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber2" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
</script>
@endforeach
@endforeach
@endforeach
<!--<div id="PembayaranId" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Diri Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form action="#" enctype="multipart/form-data" id="FormPembayaran-Id" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="TahunAjaran" placeholder="Tahun Ajaran" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Semester</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Semester" placeholder="Semester" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tingkat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Tingkat" placeholder="Tingkat" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">SPP Semester <sup>(PerBulan)</sup></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SPP" placeholder="SPP Semester (Hitungan Perbulan)" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Kartu Pelajar</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Kartu_Pelajar" placeholder="Kartu Pelajar" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">MAP Rapor</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MAP_Rapor" placeholder="MAP Rapor" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ekstrakurikuler</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Ekstrakurikuler" placeholder="Ekstrakurikuler" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">SarPras Kejuruan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Sarpras" placeholder="SarPras Kejuruan" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PAS/PAT/UKK</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAS" placeholder="PAS/PAT/UKK" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Pentas Seni</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Pentas_Seni" placeholder="Pentas Seni" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Buku LKS <sup>(PerSemester)</sup></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Buku_LKS" placeholder="Buku_LKS" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Prakerin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Prakerin" placeholder="Praktik Kerja Industri" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Latihan Dasar Kepemimpinan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LDK" placeholder="Latihan Dasar Kepemimpinan" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Kunjungan Mushaf Alquran <sup>(Bagi Muslim)</sup></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Kunjungan" placeholder="Kunjungan Mushaf Alquran" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                    <button type="submit" form="FormPembayaran-Id" class="btn btn-primary waves-effect waves-light"><i class="icofont icofont-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- Modal EditPengguna -->
@foreach(DB::table('pembayaran_spp')->get() as $PembayaranSPP)
@foreach(DB::table('siswa')->where('nis',$PembayaranSPP->nis)->where('tahun_ajaran',$PembayaranSPP->tahun_ajaran)->where('semester',$PembayaranSPP->semester)->get() as $Siswa)
@foreach(DB::table('jenis_tagihan')->where('tahun_ajaran',$PembayaranSPP->tahun_ajaran)->where('semester',$PembayaranSPP->semester)->where('tingkat',$PembayaranSPP->tingkat)->get() as $JenisTagihan)
<div id="CetakBuktiId{{$PembayaranSPP->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak Kwitansi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form action="{{ route('Cetak.Kwitansi') }}" enctype="multipart/form-data" id="Kwitansi-Id{{$PembayaranSPP->id}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="TahunAjaran" value="{{$PembayaranSPP->tahun_ajaran}}" readonly>
                            </div>
                            <label class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="Semester" value="{{$PembayaranSPP->semester}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NamaSiswa" value="{{$Siswa->nama}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="Nis" value="{{$PembayaranSPP->nis}}" readonly>
                            </div>
                            <label class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="Kelas" value="{{$Siswa->kelas}}" readonly>
                            </div>
                        </div>
                        <hr style="border: 1px dashed;">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bulan</label>
                            <div class="col-sm-4">
                                <label class="col-form-label">Jumlah SPP</label>
                            </div>
                            <label class="col-sm-4 col-form-label">Jumlah Bayar</label>
                            <div class="col-sm-2">
                                <label class="col-form-label">Status</label>
                            </div>
                        </div>
                        <hr style="border: 1px dashed;">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Januari)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_a==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar1{{$PembayaranSPP->id}}" name="SPPBayar1" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar1{{$PembayaranSPP->id}}" name="SPPBayar1" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Februari)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_b==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar2{{$PembayaranSPP->id}}" name="SPPBayar2" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar2{{$PembayaranSPP->id}}" name="SPPBayar2" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Maret)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_c==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar3{{$PembayaranSPP->id}}" name="SPPBayar3" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar3{{$PembayaranSPP->id}}" name="SPPBayar3" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(April)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_d==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar4{{$PembayaranSPP->id}}" name="SPPBayar4" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar4{{$PembayaranSPP->id}}" name="SPPBayar4" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Mei)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_e==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar5{{$PembayaranSPP->id}}" name="SPPBayar5" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar5{{$PembayaranSPP->id}}" name="SPPBayar5" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Juni)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_f==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar6{{$PembayaranSPP->id}}" name="SPPBayar6" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar6{{$PembayaranSPP->id}}" name="SPPBayar6" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                    <button type="submit" form="Kwitansi-Id{{$PembayaranSPP->id}}" class="btn btn-primary waves-effect waves-light"><i class="icofont icofont-print"></i> Cetak</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const <?php echo "InputNumber1" . $PembayaranSPP->id ?> = document.getElementById("SPPBayar1{{$PembayaranSPP->id}}");
    const <?php echo "InputNumber2" . $PembayaranSPP->id ?> = document.getElementById("SPPBayar2{{$PembayaranSPP->id}}");
    const <?php echo "InputNumber3" . $PembayaranSPP->id ?> = document.getElementById("SPPBayar3{{$PembayaranSPP->id}}");
    const <?php echo "InputNumber4" . $PembayaranSPP->id ?> = document.getElementById("SPPBayar4{{$PembayaranSPP->id}}");
    const <?php echo "InputNumber5" . $PembayaranSPP->id ?> = document.getElementById("SPPBayar5{{$PembayaranSPP->id}}");
    const <?php echo "InputNumber6" . $PembayaranSPP->id ?> = document.getElementById("SPPBayar6{{$PembayaranSPP->id}}");
    <?php echo "InputNumber1" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber1" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber1" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber2" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber2" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber2" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber3" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber3" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber3" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber4" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber4" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber4" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber5" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber5" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber5" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber6" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber6" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber6" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber2" . $PembayaranSPP->id ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber2" . $PembayaranSPP->id ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber2" . $PembayaranSPP->id ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
</script>
@endforeach
@endforeach
@endforeach
@endsection