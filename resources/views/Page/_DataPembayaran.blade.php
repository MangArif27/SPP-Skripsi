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
                                    <h4>Data Pembayaran</h4>
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
                                    <form action="#" enctype="multipart/form-data" id="TambahTagihan" method="post">
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
                                                    <th>Nama</th>
                                                    <th>No Induk Siswa</th>
                                                    <th>Kejuruan</th>
                                                    <th>Tingkat/Kelas</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr id="index_">
                                                    <td>Khoirul Fadilah</td>
                                                    <td>987654</td>
                                                    <td>Teknik Komputer Jaringan</td>
                                                    <td>XI-TKJ-1</td>
                                                    <td>Belum Lunas</td>
                                                    </td>
                                                    <td><button type="button" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="modal" data-target="#PembayaranId"><i class="icofont icofont-eye-alt"></i> Pembayaran</button>
                                                        <button type="button" class="btn btn-warning btn-mini waves-effect waves-light" data-toggle="modal" data-target="#CetakBuktiId"><i class="icofont icofont-pencil"></i> Cetak Struk</button>
                                                        <button type="button" class="btn btn-danger btn-mini waves-effect waves-light alert-confirm-id" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'alert-confirm-id']);"><i class="icofont icofont-trash"></i> Hapus</button>
                                                </tr>
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
<div id="PembayaranId" class="modal fade" role="dialog">
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
</div>
<!-- Modal EditPengguna -->
<div class="modal fade" id="CetakBuktiId" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Diri Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-block">
                <form action="#" enctype="multipart/form-data" id="CetakPembayaran-Id" method="post">
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
@endsection