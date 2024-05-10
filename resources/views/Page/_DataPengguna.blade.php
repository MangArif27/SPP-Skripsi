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
                                    <h4>Data Pengguna</h4>
                                    <span>Sistem Informasi Pembayaran Sekolah SMK Madani Depok</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <button class="btn btn-out-dashed btn-md btn-success btn-square" data-toggle="modal" data-target="#TambahPengguna"><i class="feather icon-plus"></i> Pengguna</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="TambahPengguna" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Data Diri Pengguna</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-block">
                                    <form action="{{ route('Insert.Pengguna') }}" enctype="multipart/form-data" id="TambahPengguna" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nama Pengguna</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="Nama" placeholder="Nama Pengguna" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">No Induk Pegawai</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="NIP" placeholder="No Induk Pegawai" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Jabatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="Jabatan" placeholder="Jabatan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pangkat</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="Pangkat" placeholder="Pangkat" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Level User</label>
                                            <div class="col-sm-8">
                                                <select name="LevelUser" class="form-control" required>
                                                    <option disabled>Pilih Level User</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Operator">Operator</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" name="Password" placeholder="Password" required>
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
                @elseif($gagal = Session::get('gagal'))
                <div class="alert alert-danger background-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled text-white"></i>
                    </button>
                    <strong>{{$gagal}}</strong>
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
                                                    <th>No Induk Pegawai</th>
                                                    <th>Jabatan</th>
                                                    <th>Level User</th>
                                                    <th>Aktif Terakhir</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($Pengguna as $Pengguna)
                                                <tr id="index_{{$Pengguna->id}}">
                                                    <td>{{$Pengguna->name}}</td>
                                                    <td>{{$Pengguna->nip}}</td>
                                                    <td>{{$Pengguna->jabatan}}</td>
                                                    <td>
                                                        @if($Pengguna->level_user=="Admin")
                                                        <label class="label label-success">Admin</label>
                                                        @else
                                                        <label class="label label-primary">Operator</label>
                                                        @endif
                                                    </td>
                                                    <td>{{$Pengguna->updated_at}}</td>
                                                    <td><button type="button" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="modal" data-target="#LihatPenggunaId{{$Pengguna->id}}"><i class="icofont icofont-eye-alt"></i> Lihat</button>
                                                        <button type="button" class="btn btn-warning btn-mini waves-effect waves-light" data-toggle="modal" data-target="#EditPenggunaId{{$Pengguna->id}}"><i class="icofont icofont-pencil"></i> Edit</button>
                                                        <button type="button" class="btn btn-danger btn-mini waves-effect waves-light alert-confirm-id{{$Pengguna->id}}" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'alert-confirm-id']);"><i class="icofont icofont-trash"></i> Hapus</button>
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
@foreach($GetPengguna as $Pengguna)
<script type="text/javascript">
    'use strict';
    $(document).ready(function() {
        document.querySelector('.alert-confirm-id{{$Pengguna->id}}').onclick = function() {
            swal({
                    title: "Apakah Kamu Yakin ?",
                    text: "Akan Menghapus Data Atas Nama : {{$Pengguna->name}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya",
                    closeOnConfirm: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '/Delete-Data-Pengguna/{{$Pengguna->nip}}',
                            success: function(response) {
                                //show success message
                                swal("Suksess!", "Kamu Telah Berhasil Hapus Data",
                                    "success");
                                //remove post on table
                                $(`#index_{{$Pengguna->id}}`).remove();
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
<!-- Modal Lihat Pengguna -->
@foreach($GetPengguna as $Pengguna)
<div id="LihatPenggunaId{{$Pengguna->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Diri Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Pengguna</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Nama" value="{{$Pengguna->name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">No Induk Pegawai</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="NIP" value="{{$Pengguna->nip}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jabatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Jabatan" value="{{$Pengguna->jabatan}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Pangkat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Pangkat" value="{{$Pengguna->pangkat}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Level User</label>
                            <div class="col-sm-8">
                                <select name="LevelUser" class="form-control" readonly>
                                    <option disabled>Pilih Level User</option>
                                    @if($Pengguna->level_user=="Admin")
                                    <option value="Admin" selected>Admin</option>
                                    <option value="Operator">Operator</option>
                                    @else
                                    <option value="Admin">Admin</option>
                                    <option value="Operator" selected>Operator</option>
                                    @endif
                                </select>
                            </div>
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
@endforeach
<!-- Modal Edit Pengguna -->
@foreach($GetPengguna as $Pengguna)
<div id="EditPenggunaId{{$Pengguna->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Diri Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form action="{{ route('Update.Pengguna') }}" enctype="multipart/form-data" id="EditPengguna{{$Pengguna->id}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Pengguna</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Nama" value="{{$Pengguna->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">No Induk Pegawai</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="NIP" value="{{$Pengguna->nip}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jabatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Jabatan" value="{{$Pengguna->jabatan}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Pangkat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Pangkat" value="{{$Pengguna->pangkat}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Level User</label>
                            <div class="col-sm-8">
                                <select name="LevelUser" class="form-control">
                                    <option disabled>Pilih Level User</option>
                                    @if($Pengguna->level_user=="Admin")
                                    <option value="Admin" selected>Admin</option>
                                    <option value="Operator">Operator</option>
                                    @else
                                    <option value="Admin">Admin</option>
                                    <option value="Operator" selected>Operator</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary waves-effect " form="EditPengguna{{$Pengguna->id}}"><i class="icofont icofont-ui-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection