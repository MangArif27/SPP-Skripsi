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
                                    <span>Sistem Informasi Pembayaran SPP SMK Madani Depok</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <button class="btn btn-out-dashed btn-md btn-success btn-square" data-toggle="modal" data-target="#Tambah"><i class="feather icon-plus"></i> Tambah Siswa</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="Tambah" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Data Siswa</h4>
                            </div>
                            <div class="modal-body">
                                <div class="card-block">
                                    <form action="{{ route('Insert.Data.Siswa') }}" enctype="multipart/form-data" id="TambahSiswa" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">File Excel</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" name="File" placeholder="File Excel Siswa" required="" oninvalid="this.setCustomValidity('File Wajib Diisi')" oninput="setCustomValidity('')">
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
                                                <tr id="index_{{$Siswa->nis}}">
                                                    <td>{{$Siswa->nama}}</td>
                                                    <td>{{$Siswa->nis}}</td>
                                                    <td>{{$Siswa->tingkat}}-{{$Siswa->kelas}}</label>
                                                    </td>
                                                    <td><button type="button" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="modal" data-target="#LihatId{{$Siswa->nis}}"><i class="icofont icofont-eye-alt"></i> Lihat</button>
                                                        <button type="button" class="btn btn-warning btn-mini waves-effect waves-light" data-toggle="modal" data-target="#EditId{{$Siswa->nis}}"><i class="icofont icofont-pencil"></i> Edit</button>
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

<!-- Modal Lihat Data -->
@foreach($LihatSiswa as $Siswa)
<div id="LihatId{{$Siswa->nis}}" class="modal fade" role="dialog">
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
                            <label class="col-sm-2 col-form-label">Status</label>
                            <input type="text" class="form-control col-sm-4" name="Status" value="{{$Siswa->status}}" readonly>
                            <label class="col-sm-2 col-form-label">NIS </label>
                            <input type="text" class="form-control col-sm-4" name="NIS" value="{{$Siswa->nis}}" readonly>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Siswa </label>
                            <input type="text" class="form-control col-sm-4" name="Nama" value="{{$Siswa->nama}}" readonly>
                            <label class="col-sm-2 col-form-label">Jenis Kelamin </label>
                            <input type="text" class="form-control col-sm-4" name="Jenis_Kelamin" value="{{$Siswa->jenis_kelamin}}" readonly>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat </label>
                            <textarea class="form-control col-sm-10" name="Alamat" readonly>{{$Siswa->alamat}}</textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tingkat/Kelas</label>
                            <input type="text" class="form-control col-sm-4" name="Tingkat" value="{{$Siswa->tingkat}}-{{$Siswa->kelas}}" readonly>
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <input type="text" class="form-control col-sm-4" name="TahunAjaran" value="{{$Siswa->tahun_ajaran}}" readonly>
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
<!-- Modal Edit Data -->
@foreach($LihatSiswa as $Siswa)
<div id="EditId{{$Siswa->nis}}" class="modal fade" role="dialog">
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
                    <form action="{{ route('Update.Siswa') }}" enctype="multipart/form-data" id="EditData{{$Siswa->nis}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status </label>
                            <select name="Status" id="Status" class="form-control col-sm-4" required>
                                <option disabled> Status </option>
                                @if($Siswa->status=="Aktif")
                                <option value="Aktif" selected> Aktif </option>
                                <option value="Keluar"> Keluar </option>
                                @else
                                <option value="Aktif"> Aktif </option>
                                <option value="Keluar" selected> Keluar </option>
                                @endif
                            </select>
                            <label class="col-sm-2 col-form-label">NIS </label>
                            <input type="text" class="form-control col-sm-4" name="NIS" value="{{$Siswa->nis}}" readonly>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Siswa </label>
                            <input type="text" class="form-control col-sm-4" name="Nama" value="{{$Siswa->nama}}">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin </label>
                            <select name="Jenis_Kelamin" id="Jenis_Kelamin" class="form-control col-sm-4" required>
                                <option disabled> Jenis Kelamin </option>
                                @if($Siswa->jenis_kelamin=="Laki-Laki")
                                <option value="Laki-Laki" selected> Laki-Laki </option>
                                <option value="Perempuan"> Perempuan </option>
                                @else
                                <option value="Laki-Laki"> Laki-Laki </option>
                                <option value="Perempuan" selected> Perempuan </option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat </label>
                            <textarea class="form-control col-sm-10" name="Alamat" required="" oninvalid="this.setCustomValidity('Alamat Wajib Diisi')" oninput="setCustomValidity('')">{{$Siswa->alamat}}</textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tingkat</label>
                            <select name="Tingkat" id="Tingkat" class="form-control col-sm-2" required>
                                <option disabled> Tingkat </option>
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
                            <select name="Kelas" id="Kelas" class="form-control col-sm-2" required>
                                <option disabled> Kelas </option>
                                @if($Siswa->kelas=="TKR 1")
                                <option value="TKR 1" selected>TKR 1 </option>
                                <option value="TKR 2">TKR 2 </option>
                                <option value="TKR 3">TKR 3 </option>
                                <option value="TKJ 1">TKJ 1 </option>
                                <option value="TKJ 2">TKJ 2</option>
                                <option value="TKJ 3">TKJ 3</option>
                                @elseif($Siswa->kelas=="TKR 2")
                                <option value="TKR 1">TKR 1 </option>
                                <option value="TKR 2" selected>TKR 2 </option>
                                <option value="TKR 3">TKR 3 </option>
                                <option value="TKJ 1">TKJ 1 </option>
                                <option value="TKJ 2">TKJ 2</option>
                                <option value="TKJ 3">TKJ 3</option>
                                @elseif($Siswa->kelas=="TKR 3")
                                <option value="TKR 1">TKR 1 </option>
                                <option value="TKR 2">TKR 2 </option>
                                <option value="TKR 3" selected>TKR 3 </option>
                                <option value="TKJ 1">TKJ 1 </option>
                                <option value="TKJ 2">TKJ 2</option>
                                <option value="TKJ 3">TKJ 3</option>
                                @elseif($Siswa->kelas=="TKJ 1")
                                <option value="TKR 1">TKR 1 </option>
                                <option value="TKR 2">TKR 2 </option>
                                <option value="TKR 3">TKR 3 </option>
                                <option value="TKJ 1" selected>TKJ 1 </option>
                                <option value="TKJ 2">TKJ 2</option>
                                <option value="TKJ 3">TKJ 3</option>
                                @elseif($Siswa->kelas=="TKJ 2")
                                <option value="TKR 1">TKR 1 </option>
                                <option value="TKR 2">TKR 2 </option>
                                <option value="TKR 3">TKR 3 </option>
                                <option value="TKJ 1">TKJ 1 </option>
                                <option value="TKJ 2" selected>TKJ 2</option>
                                <option value="TKJ 3">TKJ 3</option>
                                @elseif($Siswa->kelas=="TKJ 3")
                                <option value="TKR 1">TKR 1 </option>
                                <option value="TKR 2">TKR 2 </option>
                                <option value="TKR 3">TKR 3 </option>
                                <option value="TKJ 1">TKJ 1 </option>
                                <option value="TKJ 2">TKJ 2</option>
                                <option value="TKJ 3" selected>TKJ 3</option>
                                @else
                                <option value="TKR 1">TKR 1 </option>
                                <option value="TKR 2">TKR 2 </option>
                                <option value="TKR 3">TKR 3 </option>
                                <option value="TKJ 1">TKJ 1 </option>
                                <option value="TKJ 2">TKJ 2</option>
                                <option value="TKJ 3">TKJ 3</option>
                                @endif
                            </select>
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <select name="Tahun_Ajaran" id="Tahun_Ajaran" class="form-control col-sm-4" required>
                                <option readonly> Tahun Ajaran </option>
                                @foreach(DB::table('tahun_ajaran')->get() as $Tahun)
                                @if($Tahun->tahun_ajaran==$Siswa->tahun_ajaran)
                                <option value="{{$Tahun->tahun_ajaran}}" selected> {{$Tahun->tahun_ajaran}} </option>
                                @endif
                                @if($Tahun->tahun_ajaran==$Siswa->tahun_ajaran)
                                <option value="{{$Tahun->tahun_ajaran}}" hidden> {{$Tahun->tahun_ajaran}} </option>
                                @else
                                <option value="{{$Tahun->tahun_ajaran}}"> {{$Tahun->tahun_ajaran}} </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                    <button type="submit" form="EditData{{$Siswa->nis}}" class="btn btn-primary waves-effect "><i class="icofont icofont-ui-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection