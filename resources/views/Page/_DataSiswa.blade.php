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
                                                    <th>Tingkat/Kelas</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($Siswa as $Siswa)
                                                <tr id="index_{{$Siswa->id}}">
                                                    <td>{{$Siswa->nama}}</td>
                                                    <td>{{$Siswa->nis}}</td>
                                                    <td>{{$Siswa->tingkat}}-{{$Siswa->kelas}}</label>
                                                    </td>
                                                    <td><button type="button" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="modal" data-target="#LihatId{{$Siswa->id}}"><i class="icofont icofont-eye-alt"></i> Lihat</button>
                                                        <button type="button" class="btn btn-warning btn-mini waves-effect waves-light" data-toggle="modal" data-target="#EditSiswaId{{$Siswa->id}}"><i class="icofont icofont-pencil"></i> Edit</button>
                                                        <button type="button" class="btn btn-danger btn-mini waves-effect waves-light alert-confirm-id{{$Siswa->id}}" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'alert-confirm-id']);"><i class="icofont icofont-trash"></i> Hapus</button>
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
@foreach(DB::table('siswa')->get() as $Siswa)
<script type="text/javascript">
    'use strict';
    $(document).ready(function() {
        document.querySelector('.alert-confirm-id{{$Siswa->id}}').onclick = function() {
            swal({
                    title: "Apakah Kamu Yakin ?",
                    text: "Akan Menghapus Data Atas Nama : {{$Siswa->nama}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya",
                    closeOnConfirm: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '/Delete-Siswa/{{$Siswa->id}}',
                            success: function(response) {

                                //show success message
                                swal("Suksess!", "Kamu Telah Berhasil Hapus Data",
                                    "success");
                                //remove post on table
                                $(`#index_{{$Siswa->id}}`).remove();
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
@foreach(DB::table('siswa')->get() as $Siswa)
<div id="LihatId{{$Siswa->id}}" class="modal fade" role="dialog">
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
                            <input type="text" class="form-control col-sm-4" name="Nama" value="{{$Siswa->nama}}" readonly>
                            <label class="col-sm-2 col-form-label">NIS </label>
                            <input type="number" class="form-control col-sm-4" name="NIS" value="{{$Siswa->nis}}" readonly>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin </label>
                            <select name="Jenis_Kelamin" id="Jenis_Kelamin" class="form-control col-sm-4" required>
                                <option readonly> Jenis Kelamin </option>
                                @if($Siswa->jenis_kelamin=="Laki-Laki")
                                <option value="Laki-Laki" selected> Laki-Laki </option>
                                <option value="Perempuan"> Perempuan </option>
                                @else
                                <option value="Laki-Laki"> Laki-Laki </option>
                                <option value="Perempuan" selected> Perempuan </option>
                                @endif
                            </select>
                            <label class="col-sm-2 col-form-label">Agama </label>
                            <select name="Agama" id="Agama" class="form-control col-sm-4" required>
                                <option readonly> Jenis Kelamin </option>
                                @if($Siswa->agama=="Islam")
                                <option value="Islam" selected> Islam </option>
                                <option value="Katholik"> Katholik </option>
                                <option value="Protestan"> Protestan </option>
                                <option value="Hindu"> Hindu </option>
                                <option value="Budha"> Budha </option>
                                <option value="Khonghucu"> Khonghucu </option>
                                @elseif($Siswa->agama=="Katholik")
                                <option value="Islam"> Islam </option>
                                <option value="Katholik" selected> Katholik </option>
                                <option value="Protestan"> Protestan </option>
                                <option value="Hindu"> Hindu </option>
                                <option value="Budha"> Budha </option>
                                <option value="Khonghucu"> Khonghucu </option>
                                @elseif($Siswa->agama=="Protestan")
                                <option value="Islam"> Islam </option>
                                <option value="Katholik"> Katholik </option>
                                <option value="Protestan" selected> Protestan </option>
                                <option value="Hindu"> Hindu </option>
                                <option value="Budha"> Budha </option>
                                <option value="Khonghucu"> Khonghucu </option>
                                @elseif($Siswa->agama=="Hindu")
                                <option value="Islam"> Islam </option>
                                <option value="Katholik"> Katholik </option>
                                <option value="Protestan"> Protestan </option>
                                <option value="Hindu" selected> Hindu </option>
                                <option value="Budha"> Budha </option>
                                <option value="Khonghucu"> Khonghucu </option>
                                @elseif($Siswa->agama=="Budha")
                                <option value="Islam"> Islam </option>
                                <option value="Katholik"> Katholik </option>
                                <option value="Protestan"> Protestan </option>
                                <option value="Hindu"> Hindu </option>
                                <option value="Budha" selected> Budha </option>
                                <option value="Khonghucu"> Khonghucu </option>
                                @else
                                <option value="Islam"> Islam </option>
                                <option value="Katholik"> Katholik </option>
                                <option value="Protestan"> Protestan </option>
                                <option value="Hindu"> Hindu </option>
                                <option value="Budha"> Budha </option>
                                <option value="Khonghucu" selected> Khonghucu </option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat </label>
                            <textarea class="form-control col-sm-10" name="Alamat">{{$Siswa->alamat}}</textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tingkat</label>
                            <select name="Tingkat" id="Tingkat" class="form-control col-sm-4" required>
                                <option readonly> Tingkat </option>
                                @if($Siswa->tingkat=="X")
                                <option value="X" selected> X </option>
                                <option value="XI"> XI </option>
                                <option value="XII"> XII </option>
                                @elseif($Siswa->tingkat=="XI")
                                <option value="X"> X </option>
                                <option value="XI" selected> XI </option>
                                <option value="XII"> XII </option>
                                @else
                                <option value="X"> X </option>
                                <option value="XI"> XI </option>
                                <option value="XII" selected> XII </option>
                                @endif
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
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <select name="Tahun_Ajaran" id="Tahun_Ajaran" class="form-control col-sm-4" required>
                                <option readonly> Tahun Ajaran </option>
                                @foreach(DB::table('tahun_ajaran')->get() as $Tahun)
                                @if($Tahun->tahun_ajaran==$Siswa->tahun_ajaran)
                                <option value="{{$Tahun->tahun_ajaran}}" selected> {{$Tahun->tahun_ajaran}} </option>
                                @else
                                <option value="{{$Tahun->tahun_ajaran}}" selected> {{$Tahun->tahun_ajaran}} </option>
                                @endif
                                @endforeach
                            </select>
                            <label class="col-sm-2 col-form-label">Semester</label>
                            <select name="Semester" id="Semester" class="form-control col-sm-4" required>
                                <option readonly> Semester </option>
                                @if($Siswa->semester=="Semester Ganjil")
                                <option value="Semester Ganjil" selected> Semester Ganjil </option>
                                <option value="Semester Genap"> Semester Genap </option>
                                @else
                                <option value="Semester Ganjil"> Semester Ganjil </option>
                                <option value="Semester Genap" selected> Semester Genap </option>
                                @endif
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
@endforeach
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