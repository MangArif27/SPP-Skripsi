<div class="col-xl-4 col-md-6">
    <div class="card">
        <div class="card-block">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="text-c-yellow f-w-600">{{$Pengaturan->jumlah_gtk}} Orang</h4>
                    <h6 class="text-muted m-b-0">GTK SMK Madani</h6>
                </div>
                <div class="col-3 text-right">
                    <i class="feather icon-file-text f-28"></i>
                </div>
            </div>
        </div>
        <div class="card-footer bg-c-yellow">
            <div class="row align-items-center">
                <div class="col-9">
                    <p class="text-white m-b-0">SIPBS</p>
                </div>
                <div class="col-3 text-right">
                    <i class="feather icon-trending-up text-white f-16"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $CountSiswa = DB::table('siswa')->where('tahun_ajaran', $Pengaturan->tahun_ajaran)->count() ?>
<div class="col-xl-4 col-md-6">
    <div class="card">
        <div class="card-block">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="text-c-yellow f-w-600">{{$CountSiswa}} Siswa</h4>
                    <h6 class="text-muted m-b-0">SMK Madani</h6>
                </div>
                <div class="col-3 text-right">
                    <i class="feather icon-user f-28"></i>
                </div>
            </div>
        </div>
        <div class="card-footer bg-c-green">
            <div class="row align-items-center">
                <div class="col-9">
                    <p class="text-white m-b-0">SIPBS</p>
                </div>
                <div class="col-3 text-right">
                    <i class="feather icon-trending-up text-white f-16"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-md-6">
    <div class="card">
        <div class="card-block">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="text-c-yellow f-w-600">{{$Pengaturan->jumlah_kelas}} Kelas</h4>
                    <h6 class="text-muted m-b-0">SMK Madani</h6>
                </div>
                <div class="col-3 text-right">
                    <i class="feather icon-calendar f-28"></i>
                </div>
            </div>
        </div>
        <div class="card-footer bg-c-pink">
            <div class="row align-items-center">
                <div class="col-9">
                    <p class="text-white m-b-0">SIPBS</p>
                </div>
                <div class="col-3 text-right">
                    <i class="feather icon-trending-up text-white f-16"></i>
                </div>
            </div>
        </div>
    </div>
</div>