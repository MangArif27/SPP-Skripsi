@extends('Index')
@section('konten')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("#Tahun_Ajaran").change(function() {
            if ($(this).val() == "InputBaru") {
                $("#TahunAjaranBaru").show();
            } else {
                $("#TahunAjaranBaru").hide();
            }
        });
    });
</script>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <!--profile cover start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cover-profile">
                                <div class="profile-bg-img">
                                    <img class="profile-bg-img img-fluid" src="..\files\assets\images\user-profile\bg-img1.jpg" alt="bg-img">
                                    <div class="card-block user-info">
                                        <div class="col-md-12">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class=" user-img img-radius" src="{{asset('logo.png')}}" width="150" alt="user-img">
                                                </a>
                                            </div>
                                            <div class="media-body row">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <h2 class="text-white">SMK Madani Depok</h2>
                                                        <span class="text-white">Sistem Informasi Pembayaran SPP</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="pull-right cover-btn">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditSekolah"><i class="icofont icofont-edit"></i> Edit Profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--profile cover end-->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- tab header start -->
                            <div class="tab-header card">
                                <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Tentang Sekolah</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>
                            </div>
                            <!-- tab header end -->
                            <!-- tab content start -->
                            <div class="tab-content">
                                <!-- tab panel personal start -->
                                <div class="tab-pane active" id="personal" role="tabpanel">
                                    <!-- personal card start -->
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="view-info">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="general-info">
                                                            <div class="row">
                                                                @foreach($Sekolah as $Sekolah)
                                                                <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table m-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">Nama Sekolah</th>
                                                                                    <td>{{$Sekolah->sekolah}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Telp/Fax</th>
                                                                                    <td>{{$Sekolah->telpon}} / {{$Sekolah->faximile}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Alamat</th>
                                                                                    <td>{{$Sekolah->alamat}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Email</th>
                                                                                    <td>{{$Sekolah->email}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Website</th>
                                                                                    <td><a href="#!">{{$Sekolah->website}}</a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Tahun Ajaran</th>
                                                                                    <td>{{$Sekolah->tahun_ajaran}}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- end of table col-lg-6 -->
                                                                <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">Nama Kepsek</th>
                                                                                    <td>{{$Sekolah->nama_kepsek}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Nama Bendahara</th>
                                                                                    <td>{{$Sekolah->nama_bendahara}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Jumlah Kejuruan</th>
                                                                                    <td>{{$Sekolah->jumlah_kejuruan}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Jumlah GTK</th>
                                                                                    <td>{{$Sekolah->jumlah_gtk }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Jumlah Kelas</th>
                                                                                    <td>{{$Sekolah->jumlah_kelas}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Semester</th>
                                                                                    <td>{{$Sekolah->semester}}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                <!-- end of table col-lg-6 -->
                                                            </div>
                                                            <!-- end of row -->
                                                        </div>
                                                        <!-- end of general info -->
                                                    </div>
                                                    <!-- end of col-lg-12 -->
                                                </div>
                                                <!-- end of row -->
                                            </div>
                                            <!-- end of view-info -->
                                            <!-- end of edit-info -->
                                        </div>
                                        <!-- end of card-block -->
                                    </div>
                                    <!-- personal card end-->
                                </div>
                                <!-- tab pane personal end -->
                            </div>
                            <!-- tab content end -->
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
@foreach(DB::table('pengaturan')->get() as $Sekolah_Read)
<div id="EditSekolah" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Sekolah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form action="{{ route('Insert.Data.Sekolah') }}" enctype="multipart/form-data" id="EditSekolah" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Nama_Sekolah" value="{{$Sekolah_Read->sekolah}}" required="" oninvalid="this.setCustomValidity('Nama Sekolah Wajib Diisi')" oninput="setCustomValidity('')">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="NPSN" value="{{$Sekolah_Read->id_pengaturan}}" hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-4">
                                <input type="tel" class="form-control" name="Telp" value="{{$Sekolah_Read->telpon}}" required="" oninvalid="this.setCustomValidity('Nomor telephone wajib diisi')" oninput="setCustomValidity('')">
                            </div>
                            <label class="col-sm-2 col-form-label">Faximile.</label>
                            <div class="col-sm-4">
                                <input type="tel" class="form-control" name="Fax" value="{{$Sekolah_Read->faximile}}" required="" oninvalid="this.setCustomValidity('Faximile wajib diisi')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-4">
                                <input type="url" class="form-control" name="Website" value="{{$Sekolah_Read->website}}" required="" oninvalid="this.setCustomValidity('Website wajib diisi')" oninput="setCustomValidity('')">
                            </div>
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" name="Email" value="{{$Sekolah_Read->email}}" required="" oninvalid="this.setCustomValidity('Email wajib diisi')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="Alamat" placeholder="Alamat" required="" oninvalid="this.setCustomValidity('Alamat sekolah wajib diisi')" oninput="setCustomValidity('')">{{$Sekolah_Read->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-4">
                                <select id="Tahun_Ajaran" name="Tahun_Ajaran" class="form-control form-control-primary" required="" oninvalid="this.setCustomValidity('Tahun ajaran wajib dipilih')" oninput="setCustomValidity('')">
                                    <option> Pilih Tahun Ajaran</option>
                                    <option value="InputBaru">Input Baru</option>
                                    @foreach($Tahun as $Tahun)
                                    @if($Tahun->tahun_ajaran == $Sekolah_Read->tahun_ajaran)
                                    <option value="{{$Tahun->tahun_ajaran}}" selected>{{$Tahun->tahun_ajaran}}</option>
                                    @else
                                    <option value="{{$Tahun->tahun_ajaran}}">{{$Tahun->tahun_ajaran}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-4">
                                <select name="Semester" class="form-control form-control-primary" required="" oninvalid="this.setCustomValidity('Semester wajib dipilih')" oninput="setCustomValidity('')">
                                    @if($Sekolah->semester == "Semester Ganjil")
                                    <option value="Semester Ganjil" selected> Semester Ganjil</option>
                                    <option value="Semester Genap"> Semester Genap</option>
                                    @else
                                    <option value="Semester Ganjil"> Semester Ganjil</option>
                                    <option value="Semester Genap" selected> Semester Genap</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="TahunAjaranBaru" style="display: none;">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="TahunAjaranBaru" placeholder="Tahun Ajaran Baru">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kepala Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Nama_Kepsek" value="{{$Sekolah_Read->nama_kepsek}}" required="" oninvalid="this.setCustomValidity('Nama kepala sekolah wajib diisi')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bendahara</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Nama_Bendahara" value="{{$Sekolah_Read->nama_bendahara}}" required="" oninvalid="this.setCustomValidity('Nama bendahara wajib diisi')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah Kejuruan</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="Jumlah_Kejuruan" value="{{$Sekolah_Read->jumlah_kejuruan}}" required="" oninvalid="this.setCustomValidity('Jumlah kejuruan wajib diisi')" oninput="setCustomValidity('')">
                            </div>
                            <label class="col-sm-2 col-form-label">Jumlah Kelas</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="Jumlah_Kelas" value="{{$Sekolah_Read->jumlah_kelas}}" required="" oninvalid="this.setCustomValidity('Jumlah kelas wajib diisi')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah GTK</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="Jumlah_GTK" value="{{$Sekolah_Read->jumlah_gtk}}" required="" oninvalid="this.setCustomValidity('Jumlah Guru dan Tenaga Kependidikan wajib diisi')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal"><i class="icofont icofont-ui-close"></i> Tutup</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="icofont icofont-save"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection