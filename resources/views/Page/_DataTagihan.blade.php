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
                                    <h4>Data Tagihan</h4>
                                    <span>Sistem Informasi Pembayaran SPP SMK Madani Depok</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <button class="btn btn-out-dashed btn-md btn-success btn-square" data-toggle="modal" data-target="#TambahTagihan"><i class="feather icon-plus"></i> Tambah Tagihan</button>
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
                                    <form action="{{ route('Insert.Data.Tagihan') }}" enctype="multipart/form-data" id="FormTambahTagihan" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                                            @foreach(DB::table('pengaturan')->get() as $Pengaturan)
                                            <input type="text" class="form-control col-sm-3" name="Tahun_Ajaran" value="{{$Pengaturan->tahun_ajaran}}" readonly>
                                            <label class="col-sm-3 col-form-label">Semester</label>
                                            <input type="text" class="form-control col-sm-4" name="Semester" value="{{$Pengaturan->semester}}" readonly>
                                            @endforeach
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tingkat</label>
                                            <select name="Tingkat" id="Tingkat" class="form-control col-sm-3" required="" oninvalid="this.setCustomValidity('Tingkat Wajib Diisi')" oninput="setCustomValidity('')">
                                                <option value=""> Tingkat </option>
                                                <option value="X"> X </option>
                                                <option value="XI"> XI </option>
                                                <option value="XII"> XII </option>
                                            </select>
                                            <label class="col-sm-3 col-form-label">SPP Semester <sup>(PerBulan)</sup></label>
                                            <input type="number" class="form-control col-sm-4" name="SPP" placeholder="SPP Semester (Hitungan Perbulan)" required="" oninvalid="this.setCustomValidity('Jumlah Tagihan Wajib Diisi')" oninput="setCustomValidity('')">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                                    <button type="submit" form="FormTambahTagihan" class="btn btn-primary waves-effect waves-light"><i class="icofont icofont-save"></i> Save</button>
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
                @if ($sukses = Session::get('gagal'))
                <div class="alert alert-danger background-danger">
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
                                                <tr id="index_{{$JenisTagihan->id_tagihan}}">
                                                    <td>{{$JenisTagihan->tahun_ajaran}}</td>
                                                    <td>{{$JenisTagihan->semester}}</td>
                                                    <td>{{$JenisTagihan->tingkat}}</td>
                                                    <td><button type="button" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="modal" data-target="#LihatTagihanId{{$JenisTagihan->id_tagihan}}"><i class="icofont icofont-eye-alt"></i> Lihat</button>
                                                        <button type="button" class="btn btn-warning btn-mini waves-effect waves-light" data-toggle="modal" data-target="#EditTagihanId{{$JenisTagihan->id_tagihan}}"><i class="icofont icofont-pencil"></i> Edit</button>
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
<!-- Modal LihatPengguna -->
@foreach(DB::table('jenis_tagihan')->get() as $JT)
<div class="modal fade" id="LihatTagihanId{{$JT->id_tagihan}}" tabindex="-1" role="dialog">
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
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                        <input type="text" class="form-control col-sm-3" name="Tahun_Ajaran" value="{{$JT->tahun_ajaran}}" readonly>
                        <label class="col-sm-3 col-form-label">Semester</label>
                        <input type="text" class="form-control col-sm-4" name="Semester" value="{{$JT->semester}}" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tingkat</label>
                        <input type="text" class="form-control col-sm-3" name="Tingkat" value="{{$JT->tingkat}}" readonly>
                        <label class="col-sm-3 col-form-label">SPP Semester <sup>(PerBulan)</sup></label>
                        <input type="text" class="form-control col-sm-4" name="SPP" value="{{$JT->spp}}" readonly>
                    </div>
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
<div class="modal fade" id="EditTagihanId{{$JT->id_tagihan}}" tabindex="-1" role="dialog">
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
                    <form action="{{ route('Update.Data.Tagihan') }}" enctype="multipart/form-data" id="UpdateTagihanId{{$JT->id_tagihan}}" method="post">
                        {{ csrf_field() }}
                        <div class=" form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <input type="text" class="form-control col-sm-3" name="Tahun_Ajaran" value="{{$JT->tahun_ajaran}}" readonly>
                            <label class="col-sm-3 col-form-label">Semester</label>
                            <input type="text" class="form-control col-sm-4" name="Semester" value="{{$JT->semester}}" readonly>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tingkat</label>
                            <input type="text" class="form-control col-sm-3" name="Tingkat" value="{{$JT->tingkat}}" readonly>
                            <label class="col-sm-3 col-form-label">SPP Semester <sup>(PerBulan)</sup></label>
                            <input type="text" class="form-control col-sm-4" name="SPP" value="{{$JT->spp}}">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" form="UpdateTagihanId{{$JT->id_tagihan}}"><i class=" icofont icofont-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection