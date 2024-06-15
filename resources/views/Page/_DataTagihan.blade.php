@extends('Index')
@section('konten')
<!-- animation nifty modal window effects css -->
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
                                    <h4>Data Jenis Tagihan</h4>
                                    <span>Sistem Informasi Pembayaran Sekolah SMK Madani Depok</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <button class="btn btn-out-dashed btn-md btn-success btn-square" data-toggle="modal" data-target="#TambahTagihan"><i class="feather icon-plus"></i> Input Tagihan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="TambahTagihan" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Data Tagihan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-block">
                                    <form action="{{ route('Insert.Data.Tagihan') }}" enctype="multipart/form-data" id="TambahTagihan" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                                            <div class="col-sm-4">
                                                <select name="Tahun_Ajaran" id="Tahun_Ajaran" class="form-control" required>
                                                    <option readonly> Tahun Ajaran </option>
                                                    @foreach(DB::table('tahun_ajaran')->get() as $Tahun)
                                                    @foreach(DB::table('pengaturan')->get() as $Pengaturan)
                                                    @if($Tahun->tahun_ajaran==$Pengaturan->tahun_ajaran)
                                                    <option value="{{$Tahun->tahun_ajaran}}" selected> {{$Tahun->tahun_ajaran}} </option>
                                                    @else
                                                    <option value="{{$Tahun->tahun_ajaran}}"> {{$Tahun->tahun_ajaran}} </option>
                                                    @endif
                                                    @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Semester</label>
                                            <div class="col-sm-4">
                                                <select name="Semester" id="Semester" class="form-control" required>
                                                    <option readonly> Semester </option>
                                                    @foreach(DB::table('pengaturan')->get() as $Pengaturan)
                                                    @if($Pengaturan->semester=="Semester Ganjil")
                                                    <option value="Semester Ganjil" selected> Semester Ganjil </option>
                                                    <option value="Semester Genap"> Semester Genap </option>
                                                    @else
                                                    <option value="Semester Ganjil"> Semester Ganjil </option>
                                                    <option value="Semester Genap" selected> Semester Genap </option>
                                                    @endif
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tingkat</label>
                                            <div class="col-sm-4">
                                                <select name="Tingkat" id="Tingkat" class="form-control" required>
                                                    <option readonly> Tingkat </option>
                                                    <option value="X"> X </option>
                                                    <option value="XI"> XI </option>
                                                    <option value="XII"> XII </option>
                                                </select>
                                            </div>
                                            <label class="col-sm-2 col-form-label">SPP Semester <sup>(PerBulan)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" name="SPP" placeholder="SPP Semester (Hitungan Perbulan)" required>
                                            </div>
                                        </div>
                                        <!--<hr style="border: 1px dashed;">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">SPP Semester <sup>(PerBulan)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="SPP" placeholder="SPP Semester (Hitungan Perbulan)" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Kartu Pelajar</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Kartu_Pelajar" placeholder="Kartu Pelajar" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">MAP Rapor <sup>(Bagi Tingkat X)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="MAP_Rapor" placeholder="MAP Rapor" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Ekstrakurikuler</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Ekstrakurikuler" placeholder="Ekstrakurikuler" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">SarPras Kejuruan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Sarpras" placeholder="SarPras Kejuruan" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">PAS/PAT/UKK</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="PAS" placeholder="PAS/PAT/UKK" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pentas Seni</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Pentas_Seni" placeholder="Pentas Seni" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Buku LKS <sup>(PerSemester)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Buku_LKS" placeholder="Buku_LKS" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Prakerin</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Prakerin" placeholder="Praktik Kerja Industri" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Latihan Dasar Kepemimpinan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="LDK" placeholder="Latihan Dasar Kepemimpinan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kunjungan Mushaf Alquran <sup>(Bagi Muslim)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Kunjungan" placeholder="Kunjungan Mushaf Alquran" required>
                                            </div>
                                        </div>-->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="icofont icofont-save"></i> Save</button>
                                    </form>
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
                                                    <th>Tahun Ajaran</th>
                                                    <th>Semester</th>
                                                    <th>Tingkat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($JenisTagihan as $JenisTagihan)
                                                <tr id="index_{{$JenisTagihan->id}}">
                                                    <td>{{$JenisTagihan->tahun_ajaran}}</td>
                                                    <td>{{$JenisTagihan->semester}}</td>
                                                    <td>{{$JenisTagihan->tingkat}}</td>
                                                    <td><button type="button" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="modal" data-target="#LihatTagihanId{{$JenisTagihan->id}}"><i class="icofont icofont-eye-alt"></i> Lihat</button>
                                                        <button type="button" class="btn btn-warning btn-mini waves-effect waves-light" data-toggle="modal" data-target="#EditTagihanId{{$JenisTagihan->id}}"><i class="icofont icofont-pencil"></i> Edit</button>
                                                        <button type="button" class="btn btn-danger btn-mini waves-effect waves-light alert-confirm-id{{$JenisTagihan->id}}" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'alert-confirm-id']);"><i class="icofont icofont-trash"></i> Hapus</button>
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
@foreach(DB::table('jenis_tagihan')->get() as $JT)
<script type="text/javascript">
    'use strict';
    $(document).ready(function() {
        document.querySelector('.alert-confirm-id{{$JT->id}}').onclick = function() {
            swal({
                    title: "Apakah Kamu Yakin ?",
                    text: "Akan Menghapus Data Tagihan : {{$JT->semester}}/{{$JT->tahun_ajaran}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya",
                    closeOnConfirm: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '/Delete-Data-Tagihan/{{$JT->id}}',
                            success: function(response) {

                                //show success message
                                swal("Suksess!", "Kamu Telah Berhasil Hapus Data",
                                    "success");
                                //remove post on table
                                $(`#index_{{$JT->id}}`).remove();
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
@endforeach
<!-- Modal LihatPengguna -->
@foreach(DB::table('jenis_tagihan')->get() as $JT)
<div class="modal fade" id="LihatTagihanId{{$JT->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Tagihan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form enctype="multipart/form-data" id="TambahTagihan" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-4">
                                <select name="Tahun_Ajaran" id="Tahun_Ajaran" class="form-control" readonly>
                                    <option readonly> Tahun Ajaran </option>
                                    @foreach(DB::table('tahun_ajaran')->get() as $Tahun)
                                    @if($Tahun->tahun_ajaran==$JT->tahun_ajaran)
                                    <option value="{{$Tahun->tahun_ajaran}}" selected> {{$Tahun->tahun_ajaran}} </option>
                                    @else
                                    <option value="{{$Tahun->tahun_ajaran}}"> {{$Tahun->tahun_ajaran}} </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-4">
                                <select name="Semester" id="Semester" class="form-control" readonly>
                                    <option readonly> Semester </option>
                                    @if($JT->semester=="Semester Ganjil")
                                    <option value="Semester Ganjil" selected> Semester Ganjil </option>
                                    <option value="Semester Genap"> Semester Genap </option>
                                    @else
                                    <option value="Semester Ganjil"> Semester Ganjil </option>
                                    <option value="Semester Genap" selected> Semester Genap </option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tingkat</label>
                            <div class="col-sm-4">
                                <select name="Tingkat" id="Tingkat" class="form-control" readonly>
                                    <option readonly> Tingkat </option>
                                    @if($JT->tingkat=="X")
                                    <option value="X" selected> X </option>
                                    <option value="XI"> XI </option>
                                    <option value="XII"> XII </option>
                                    @elseif($JT->tingkat=="XI")
                                    <option value="X"> X </option>
                                    <option value="XI" selected> XI </option>
                                    <option value="XII"> XII </option>
                                    @else
                                    <option value="X"> X </option>
                                    <option value="XI"> XI </option>
                                    <option value="XII" selected> XII </option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">SPP Semester <sup>(PerBulan)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="SPP" value="{{$JT->spp}}" readonly>
                            </div>
                        </div>
                        <!--
                            <hr style="border: 1px dashed;">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">SPP Semester <sup>(PerBulan)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="SPP" placeholder="SPP Semester (Hitungan Perbulan)" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Kartu Pelajar</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Kartu_Pelajar" placeholder="Kartu Pelajar" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">MAP Rapor <sup>(Bagi Tingkat X)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="MAP_Rapor" placeholder="MAP Rapor" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Ekstrakurikuler</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Ekstrakurikuler" placeholder="Ekstrakurikuler" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">SarPras Kejuruan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Sarpras" placeholder="SarPras Kejuruan" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">PAS/PAT/UKK</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="PAS" placeholder="PAS/PAT/UKK" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pentas Seni</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Pentas_Seni" placeholder="Pentas Seni" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Buku LKS <sup>(PerSemester)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Buku_LKS" placeholder="Buku_LKS" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Prakerin</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Prakerin" placeholder="Praktik Kerja Industri" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Latihan Dasar Kepemimpinan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="LDK" placeholder="Latihan Dasar Kepemimpinan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kunjungan Mushaf Alquran <sup>(Bagi Muslim)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Kunjungan" placeholder="Kunjungan Mushaf Alquran" required>
                                            </div>
                                        </div>-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Modal EditPengguna -->
@foreach(DB::table('jenis_tagihan')->get() as $JT)
<div class="modal fade" id="EditTagihanId{{$JT->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Tagihan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form action="{{ route('Update.Data.Tagihan') }}" enctype="multipart/form-data" id="UpdateTagihanId{{$JT->id}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-4">
                                <select name="Tahun_Ajaran" id="Tahun_Ajaran" class="form-control" readonly>
                                    <option readonly> Tahun Ajaran </option>
                                    @foreach(DB::table('tahun_ajaran')->get() as $Tahun)
                                    @if($Tahun->tahun_ajaran==$JT->tahun_ajaran)
                                    <option value="{{$Tahun->tahun_ajaran}}" selected> {{$Tahun->tahun_ajaran}} </option>
                                    @else
                                    <option value="{{$Tahun->tahun_ajaran}}"> {{$Tahun->tahun_ajaran}} </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-4">
                                <select name="Semester" id="Semester" class="form-control" readonly>
                                    <option readonly> Semester </option>
                                    @if($JT->semester=="Semester Ganjil")
                                    <option value="Semester Ganjil" selected> Semester Ganjil </option>
                                    <option value="Semester Genap"> Semester Genap </option>
                                    @else
                                    <option value="Semester Ganjil"> Semester Ganjil </option>
                                    <option value="Semester Genap" selected> Semester Genap </option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tingkat</label>
                            <div class="col-sm-4">
                                <select name="Tingkat" id="Tingkat" class="form-control" readonly>
                                    <option readonly> Tingkat </option>
                                    @if($JT->tingkat=="X")
                                    <option value="X" selected> X </option>
                                    <option value="XI"> XI </option>
                                    <option value="XII"> XII </option>
                                    @elseif($JT->tingkat=="XI")
                                    <option value="X"> X </option>
                                    <option value="XI" selected> XI </option>
                                    <option value="XII"> XII </option>
                                    @else
                                    <option value="X"> X </option>
                                    <option value="XI"> XI </option>
                                    <option value="XII" selected> XII </option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">SPP Semester <sup>(PerBulan)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="SPP" value="{{$JT->spp}}">
                            </div>
                        </div>
                        <!--
                            <hr style="border: 1px dashed;">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">SPP Semester <sup>(PerBulan)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="SPP" placeholder="SPP Semester (Hitungan Perbulan)" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Kartu Pelajar</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Kartu_Pelajar" placeholder="Kartu Pelajar" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">MAP Rapor <sup>(Bagi Tingkat X)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="MAP_Rapor" placeholder="MAP Rapor" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Ekstrakurikuler</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Ekstrakurikuler" placeholder="Ekstrakurikuler" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">SarPras Kejuruan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Sarpras" placeholder="SarPras Kejuruan" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">PAS/PAT/UKK</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="PAS" placeholder="PAS/PAT/UKK" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pentas Seni</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Pentas_Seni" placeholder="Pentas Seni" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Buku LKS <sup>(PerSemester)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Buku_LKS" placeholder="Buku_LKS" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Prakerin</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Prakerin" placeholder="Praktik Kerja Industri" required>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Latihan Dasar Kepemimpinan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="LDK" placeholder="Latihan Dasar Kepemimpinan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kunjungan Mushaf Alquran <sup>(Bagi Muslim)</sup></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="Kunjungan" placeholder="Kunjungan Mushaf Alquran" required>
                                            </div>
                                        </div>-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" form="UpdateTagihanId{{$JT->id}}"><i class=" icofont icofont-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection