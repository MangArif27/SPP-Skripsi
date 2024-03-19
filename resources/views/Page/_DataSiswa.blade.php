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
                                    <h4>Data Siswa</h4>
                                    <span>Sistem Informasi Pembayaran Sekolah SMK Madani Depok</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <button class="btn btn-out-dashed btn-md btn-success btn-square" data-toggle="modal" data-target="#Tambah"><i class="feather icon-plus"></i> Pengguna</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="Tambah" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Data Diri Siswa</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-block">
                                    <form action="{{ route('Insert.Data.Siswa') }}" enctype="multipart/form-data" id="TambahSiswa" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">File Excel</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" name="File" placeholder="File Excel Siswa" required>
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
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr id="index_">
                                                    <td>Khoirul Fadilah</td>
                                                    <td>987654</td>
                                                    <td>Teknik Komputer Jaringan</td>
                                                    <td>XI-TKJ-1</label>
                                                    </td>
                                                    <td><button type="button" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="modal" data-target="#LihatId"><i class="icofont icofont-eye-alt"></i> Lihat</button>
                                                        <button type="button" class="btn btn-warning btn-mini waves-effect waves-light" data-toggle="modal" data-target="#EditSiswaId"><i class="icofont icofont-pencil"></i> Edit</button>
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
                            url: '/Delete-Siswa/',
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
<div id="LihatId" class="modal fade" role="dialog">
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
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Siswa </label>
                            <input type="text" class="form-control col-sm-4" name="Nama" value="" readonly>
                            <label class="col-sm-2 col-form-label">NIS </label>
                            <input type="number" class="form-control col-sm-4" name="NIS" value="" readonly>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin </label>
                            <select name="Jenis_Kelamin" id="Jenis_Kelamin" class="form-control col-sm-4" required>
                                <option readonly> Jenis Kelamin </option>
                                <option value="Laki-Laki"> Laki-Laki </option>
                                <option value="Perempuan"> Perempuan </option>
                            </select>
                            <label class="col-sm-2 col-form-label">Agama </label>
                            <select name="Agama" id="Agama" class="form-control col-sm-4" required>
                                <option readonly> Jenis Kelamin </option>
                                <option value="Islam"> Islam </option>
                                <option value="Katholik"> Katholik </option>
                                <option value="Kristen"> Kristen </option>
                                <option value="Hindu"> Hindu </option>
                                <option value="Budha"> Budha </option>
                                <option value="Khonghucu"> Khonghucu </option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat </label>
                            <textarea class="form-control col-sm-10" name="Alamat"></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tingkat</label>
                            <select name="Tingkat" id="Tingkat" class="form-control col-sm-4" required>
                                <option readonly> Tingkat </option>
                                <option value="X"> X </option>
                                <option value="XI"> XI </option>
                                <option value="XII">XII</option>
                            </select>
                            <label class="col-sm-2 col-form-label">Kelas</label>
                            <select name="Kelas" id="Kelas" class="form-control col-sm-4" required>
                                <option readonly> Kelas </option>
                                <option value="X TRO 1"> X TRO 1 </option>
                                <option value="XI TKJ 1"> XI TKJ 1 </option>
                                <option value="XII TKJ 2">XII TKJ 2</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kejuruan</label>
                            <select name="Kejuruan" id="Kejuruan" class="form-control col-sm-10" required>
                                <option readonly> Kejuruan </option>
                                <option value="Teknik Kendaraan Ringan Otomotif"> Teknik Kendaraan Ringan Otomotif </option>
                                <option value="Teknik Komputer dan Jaringan"> Teknik Komputer dan Jaringan </option>
                                <option value="Teknik Pendingin dan Tata Udara"> Teknik Pendingin dan Tata Udara </option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <select name="Tahun_Ajaran" id="Tahun_Ajaran" class="form-control col-sm-4" required>
                                <option readonly> Tahun Ajaran </option>
                                <option value="2022/2023"> 2022/2023 </option>
                                <option value="2023/2024"> 2023/2024 </option>
                            </select>
                            <label class="col-sm-2 col-form-label">Semester</label>
                            <select name="Semester" id="Semester" class="form-control col-sm-4" required>
                                <option readonly> Semester </option>
                                <option value="Semester Ganjil"> Semester Ganjil </option>
                                <option value="Semester Genap"> Semester Genap </option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal EditPengguna -->
<div class="modal fade" id="EditSiswaId" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Diri Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-block">
                <form action="#" id="EditSiswa" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Siswa</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="Nama" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">No Induk siswa</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="NIS" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tingkat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="Tingkat" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Kelas</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="Kelas" value="" readonly>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                <button type="submit" form="EditPengguna" class="btn btn-primary waves-effect waves-light "><i class="icofont icofont-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
@endsection