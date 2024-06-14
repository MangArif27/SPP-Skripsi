@extends('Index')
@section('konten')
<!-- animation nifty modal window effects css -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
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
                                    <h4>Laporan Pembayaran</h4>
                                    <span>Sistem Informasi Pembayaran Sekolah SMK Madani Depok</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <button type="button" class="btn btn-out-dashed btn-md btn-success btn-square" data-toggle="modal" data-target="#ExportData"><i class="feather icon-download"></i> Download Laporan</button>
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
                                        <table id="example" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Nis</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th>Semester</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script src="{{asset('/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/files/assets/pages/data-table/js/jszip.min.js')}}"></script>
<script src="{{asset('/files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
<script src="{{asset('/files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/files/assets/pages/data-table/js/data-table-custom.js')}}"></script>
<!-- modalEffects js nifty modal window effects -->
<script type="text/javascript" src="{{asset('/files/assets/js/sweetalert.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/assets/js/modal.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/assets/js/modalEffects.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/assets/js/classie.js')}}"></script>
<script>
    $(function() {
        $('#example').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            paging: true,
            ajax: `{{ url()->current() }}`,
            pageLength: "10",
            columns: [{
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'nis',
                    name: 'nis'
                },
                {
                    data: 'tahun_ajaran',
                    name: 'tahun_ajaran'
                },
                {
                    data: 'semester',
                    name: 'semester'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
    });
</script>
<div class="modal fade" id="ExportData" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Export Data Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form action="{{ route('ExportLaporanPembayaran') }}" enctype="multipart/form-data" id="ExportLaporan" method="post" target="_blank">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis File</label>
                            <div class="col-sm-9">
                                <select name="JenisFile" class="form-control" required>
                                    <option selected disabled>Pilih Jenis File</option>
                                    <option value="Pdf">PDF</option>
                                    <option value="Excel">Excel</option>
                                </select>
                            </div>
                        </div>
                        <div id="Tahunan">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-3">
                                    <select name="TahunAjaran" class="form-control" required>
                                        <option selected disabled>Tahun Ajaran</option>
                                        @foreach(DB::table('tahun_ajaran')->get() as $TahunAjaran)
                                        <option value="{{$TahunAjaran->tahun_ajaran}}">{{$TahunAjaran->tahun_ajaran}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="Tingkat" class="form-control" required>
                                        <option selected disabled>Tingkat</option>
                                        <option value="X">Tingkat X</option>
                                        <option value="XI">Tingkat XI</option>
                                        <option value="XII">Tingkat XII</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="Kelas" class="form-control" required>
                                        <option selected disabled>Kelas</option>
                                        <option value="TKR">Teknik Kendaraan Ringan</option>
                                        <option value="TKJ 1">Teknik Komputer & Jaringan 1</option>
                                        <option value="TKJ 2">Teknik Komputer & Jaringan 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Close</button>
                    <button type="submit" target="_blank" form="ExportLaporan" class="btn btn-primary waves-effect waves-light"><i class="icofont icofont-file-document"></i> Export</button>
                </div>
            </div>
        </div>
    </div>
</div>
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
            @if($PembayaranSPP->semester=="Semester Ganjil")
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
                            <label class="col-sm-2 col-form-label">SPP <sup>(Juli)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_a==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar1{{$PembayaranSPP->id}}" name="SPPBayar1" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" readonly>
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
                            <label class="col-sm-2 col-form-label">SPP <sup>(Agustus)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_b==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar2{{$PembayaranSPP->id}}" name="SPPBayar2" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" readonly>
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
                            <label class="col-sm-2 col-form-label">SPP <sup>(September)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_c==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar3{{$PembayaranSPP->id}}" name="SPPBayar3" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" readonly>
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
                            <label class="col-sm-2 col-form-label">SPP <sup>(Oktober)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_d==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar4{{$PembayaranSPP->id}}" name="SPPBayar4" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" readonly>
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
                            <label class="col-sm-2 col-form-label">SPP <sup>(November)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_e==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar5{{$PembayaranSPP->id}}" name="SPPBayar5" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" readonly>
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
                            <label class="col-sm-2 col-form-label">SPP <sup>(Desember)</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="Rp. {{number_format($JenisTagihan->spp)}}" readonly>
                            </div>
                            @if($PembayaranSPP->spp_f==NULL)
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="SPPBayar6{{$PembayaranSPP->id}}" name="SPPBayar6" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" readonly>
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
                </div>
            </div>
            @else
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
                                <input type="number" class="form-control" id="SPPBayar1{{$PembayaranSPP->id}}" name="SPPBayar1" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" readonly>
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
                                <input type="number" class="form-control" id="SPPBayar2{{$PembayaranSPP->id}}" name="SPPBayar2" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" readonly>
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
                                <input type="number" class="form-control" id="SPPBayar3{{$PembayaranSPP->id}}" name="SPPBayar3" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" readonly>
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
                                <input type="number" class="form-control" id="SPPBayar4{{$PembayaranSPP->id}}" name="SPPBayar4" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" readonly>
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
                                <input type="number" class="form-control" id="SPPBayar5{{$PembayaranSPP->id}}" name="SPPBayar5" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" readonly>
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
                                <input type="number" class="form-control" id="SPPBayar6{{$PembayaranSPP->id}}" name="SPPBayar6" min="{{$JenisTagihan->spp}}" max="{{$JenisTagihan->spp}}" readonly>
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
                </div>
            </div>
            @endif
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