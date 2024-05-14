<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Menu SIPBS</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu active pcoded-trigger">
                <a href="/">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Data Induk</span>
                </a>
                <ul class="pcoded-submenu">
                    @if(Session::get('level_user')=="Admin")
                    <li>
                        <a href="Data-Pengguna">
                            <span class="pcoded-mtext">Data Pengguna</span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="Data-Siswa">
                            <span class="pcoded-mtext">Data Siswa</span>
                        </a>
                    </li>
                </ul>
            </li>
            @if(Session::get('level_user')=="Operator")
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                    <span class="pcoded-mtext">Pembayaran</span>
                </a>
                <ul class="pcoded-submenu">
                    <li>
                        <a href="Data-Pembayaran">
                            <span class="pcoded-mtext">Data Pembayaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="Data-Tunggakan">
                            <span class="pcoded-mtext">Data Tunggakan</span>
                        </a>
                    </li>
                    <li>
                        <a href="Kwitansi">
                            <span class="pcoded-mtext">Cetak Kwitansi</span>
                        </a>
                    </li>
                    <li>
                        <a href="Data-Tagihan">
                            <span class="pcoded-mtext">Data Tagihan</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            <!--<li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                    <span class="pcoded-mtext">Laporan</span>
                </a>
            </li>-->
            @if(Session::get('level_user')=="Admin")
            <li class="pcoded-hasmenu">
                <a href="Pengaturan">
                    <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                    <span class="pcoded-mtext">Pengaturan</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>