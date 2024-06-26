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
                                    <span>Sistem Informasi Pembayaran SPP SMK Madani Depok</span>
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
                @if ($salah = Session::get('salah'))
                <div class="alert alert-danger background-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled text-white"></i>
                    </button>
                    <strong>{{$salah}}</strong>
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
                                                <tr id="index_{{$Pembayaran->id_pembayaran}}">
                                                    <td>{{$Siswa->nama}}</td>
                                                    <td>{{$Pembayaran->nis}}</td>
                                                    <td>{{$Siswa->tingkat}}-{{$Siswa->kelas}}</td>
                                                    @if($Pembayaran->keterangan=="Belum Lunas")
                                                    <td><label class="btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label></td>
                                                    @else
                                                    <td><label class="btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Sudah Lunas</label></td>
                                                    @endif
                                                    <td><button type="button" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="modal" data-target="#PembayaranId{{$Pembayaran->id_pembayaran}}"><i class="icofont icofont-bill-alt"></i> Pembayaran</button>
                                                        <a href="/Cetak-Kwitansi/{{$Pembayaran->id_pembayaran}}" target="_blank" class="btn btn-warning btn-mini waves-effect waves-light"><i class="icofont icofont-print"></i> Cetak Kuitansi</button>
                                                    </td>
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
@foreach($GetPembayaran as $Pembayaran)
@foreach(DB::table('siswa')->where('nis',$Pembayaran->nis)->where('tahun_ajaran',$Pembayaran->tahun_ajaran)->get() as $Siswa)
@foreach(DB::table('jenis_tagihan')->where('id_tagihan',$Pembayaran->id_tagihan)->get() as $JenisTagihan)
<div id="PembayaranId{{$Pembayaran->id_pembayaran}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pembayaran SPP</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if($Pembayaran->semester=="Semester Ganjil")
            <div class="modal-body">
                <div class="card-block">
                    <form action="{{ route('Update.Data.Pembayaran') }}" enctype="multipart/form-data" id="FormPembayaran-Id{{$Pembayaran->id_pembayaran}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="TahunAjaran" value="{{$Pembayaran->tahun_ajaran}}" readonly>
                            </div>
                            <label class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="Semester" value="{{$Pembayaran->semester}}" readonly>
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
                                <input type="text" class="form-control" name="Nis" value="{{$Pembayaran->nis}}" readonly>
                            </div>
                            <label class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="Kelas" value="{{$Siswa->tingkat}}-{{$Siswa->kelas}}" readonly>
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
                            <label class="col-sm-2 col-form-label">SPP <sup>(Juli)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($Pembayaran->spp_a==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar1{{$Pembayaran->id_pembayaran}}" name="SPPBayar1" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar1{{$Pembayaran->id_pembayaran}}" name="SPPBayar1" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Agustus)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($Pembayaran->spp_b==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar2{{$Pembayaran->id_pembayaran}}" name="SPPBayar2" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar2{{$Pembayaran->id_pembayaran}}" name="SPPBayar2" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(September)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($Pembayaran->spp_c==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar3{{$Pembayaran->id_pembayaran}}" name="SPPBayar3" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar3{{$Pembayaran->id_pembayaran}}" name="SPPBayar3" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Oktober)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($Pembayaran->spp_d==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar4{{$Pembayaran->id_pembayaran}}" name="SPPBayar4" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar4{{$Pembayaran->id_pembayaran}}" name="SPPBayar4" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(November)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($Pembayaran->spp_e==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar5{{$Pembayaran->id_pembayaran}}" name="SPPBayar5" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar5{{$Pembayaran->id_pembayaran}}" name="SPPBayar5" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Desember)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($Pembayaran->spp_f==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar6{{$Pembayaran->id_pembayaran}}" name="SPPBayar6" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar6{{$Pembayaran->id_pembayaran}}" name="SPPBayar6" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                    <button type="submit" form="FormPembayaran-Id{{$Pembayaran->id_pembayaran}}" class="btn btn-primary waves-effect waves-light"><i class="icofont icofont-save"></i> Save</button>
                </div>
            </div>
            @else
            <div class="modal-body">
                <div class="card-block">
                    <form action="{{ route('Update.Data.Pembayaran') }}" enctype="multipart/form-data" id="FormPembayaran-Id{{$Pembayaran->id_pembayaran}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="TahunAjaran" value="{{$Pembayaran->tahun_ajaran}}" readonly>
                            </div>
                            <label class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="Semester" value="{{$Pembayaran->semester}}" readonly>
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
                                <input type="text" class="form-control" name="Nis" value="{{$Pembayaran->nis}}" readonly>
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
                            @if($Pembayaran->spp_a==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar1{{$Pembayaran->id_pembayaran}}" name="SPPBayar1" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar1{{$Pembayaran->id_pembayaran}}" name="SPPBayar1" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Februari)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($Pembayaran->spp_b==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar2{{$Pembayaran->id_pembayaran}}" name="SPPBayar2" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar2{{$Pembayaran->id_pembayaran}}" name="SPPBayar2" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Maret)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($Pembayaran->spp_c==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar3{{$Pembayaran->id_pembayaran}}" name="SPPBayar3" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar3{{$Pembayaran->id_pembayaran}}" name="SPPBayar3" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(April)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($Pembayaran->spp_d==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar4{{$Pembayaran->id_pembayaran}}" name="SPPBayar4" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar4{{$Pembayaran->id_pembayaran}}" name="SPPBayar4" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Mei)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($Pembayaran->spp_e==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar5{{$Pembayaran->id_pembayaran}}" name="SPPBayar5" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar5{{$Pembayaran->id_pembayaran}}" name="SPPBayar5" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SPP <sup>(Juni)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($Pembayaran->spp_f==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar6{{$Pembayaran->id_pembayaran}}" name="SPPBayar6" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}">
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-danger btn-sm"><i class="icofont icofont-ui-close"></i> Belum Lunas</label>
                            @else
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="SPPBayar6{{$Pembayaran->id_pembayaran}}" name="SPPBayar6" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            <label class="col-sm-2 btn btn-out-dashed btn-success btn-sm"><i class="icofont icofont-ui-check"></i> Lunas</label>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                    <button type="submit" form="FormPembayaran-Id{{$Pembayaran->id_pembayaran}}" class="btn btn-primary waves-effect waves-light"><i class="icofont icofont-save"></i> Save</button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<script type="text/javascript">
    const <?php echo "InputNumber1" . $Pembayaran->id_pembayaran ?> = document.getElementById("SPPBayar1{{$Pembayaran->id_pembayaran}}");
    const <?php echo "InputNumber2" . $Pembayaran->id_pembayaran ?> = document.getElementById("SPPBayar2{{$Pembayaran->id_pembayaran}}");
    const <?php echo "InputNumber3" . $Pembayaran->id_pembayaran ?> = document.getElementById("SPPBayar3{{$Pembayaran->id_pembayaran}}");
    const <?php echo "InputNumber4" . $Pembayaran->id_pembayaran ?> = document.getElementById("SPPBayar4{{$Pembayaran->id_pembayaran}}");
    const <?php echo "InputNumber5" . $Pembayaran->id_pembayaran ?> = document.getElementById("SPPBayar5{{$Pembayaran->id_pembayaran}}");
    const <?php echo "InputNumber6" . $Pembayaran->id_pembayaran ?> = document.getElementById("SPPBayar6{{$Pembayaran->id_pembayaran}}");
    <?php echo "InputNumber1" . $Pembayaran->id_pembayaran ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber1" . $Pembayaran->id_pembayaran ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber1" . $Pembayaran->id_pembayaran ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber2" . $Pembayaran->id_pembayaran ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber2" . $Pembayaran->id_pembayaran ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber2" . $Pembayaran->id_pembayaran ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber3" . $Pembayaran->id_pembayaran ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber3" . $Pembayaran->id_pembayaran ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber3" . $Pembayaran->id_pembayaran ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber4" . $Pembayaran->id_pembayaran ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber4" . $Pembayaran->id_pembayaran ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber4" . $Pembayaran->id_pembayaran ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber5" . $Pembayaran->id_pembayaran ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber5" . $Pembayaran->id_pembayaran ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber5" . $Pembayaran->id_pembayaran ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber6" . $Pembayaran->id_pembayaran ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber6" . $Pembayaran->id_pembayaran ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber6" . $Pembayaran->id_pembayaran ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
    <?php echo "InputNumber2" . $Pembayaran->id_pembayaran ?>.addEventListener("change", function() {
        if (<?php echo "InputNumber2" . $Pembayaran->id_pembayaran ?>.value > '{{$JenisTagihan->spp}}' || <?php echo "InputNumber2" . $Pembayaran->id_pembayaran ?>.value < '{{$JenisTagihan->spp}}') {
            alert("Input Jumlah Bayar SPP Sejumlah : Rp. {{$JenisTagihan->spp}}!")
        }
    });
</script>
@endforeach
@endforeach
@endforeach
@endsection