<?php
$url = "/Data-Pembayaran";
header("Refresh:5; $url");
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://penilaian-smk.madanidepok.sch.id/vendor/img/icon/logo1.png" type="image/ico" />
    <title>SIPBS-SMK Madani Depok</title>
    <style type="text/css">
        body {
            font: 11px Arial, Helvetica, sans-serif;
            background: white;
        }

        table tr td {
            font-size: 10px !important;
            vertical-align: top;
        }

        table tr td.label {
            width: 120px;
        }

        table.header tr td b {
            font-size: 12px;
            font-weight: bold;
        }

        .kunjunganCetak {
            width: 148;
            height: 210;


        }

        #header-surat-izin {
            text-align: right;
            width: 330px;
            margin-left: auto;
            margin-right: 0px;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 13px;
            float: left;
        }

        #perkaraKunjungan img {
            width: 150px;
        }

        #perkaraKunjungan td {
            vertical-align: top;
        }

        #perkaraKunjungan td.label {
            width: 100px;
        }

        table.barang {
            border-top: 1px solid #000;
            border-left: 1px solid #000;
            width: 100%;
        }

        table.barang tr td {
            border-bottom: 1px solid #000;
            border-right: 1px solid #000;
            padding: 2px;
        }

        table.jumlah {
            border-top: 1px solid #000;
            border-left: 1px solid #000;
            width: 100%;
        }

        table.jumlah tr td {
            border-bottom: 1px solid #000;
            border-right: 1px solid #000;
            padding: 2px;
        }

        .no_antrian {
            min-width: 100px;
            height: 18px;
            float: right;
            padding: 2px 5px 5px 5px;
            border: solid 1px blue;
            text-align: center;
            font-size: 13px;
            color: blue;
        }

        .no_antrian span {
            font-size: 18px !important;
            font-weight: bold;
        }

        .antrian_con {
            width: 120px;
            height: 18px;
            float: left;
            text-align: center;
            font-size: 13px;
            font-weight: bold;
        }

        .antrian_aja {
            float: left;
            padding: 7px 3px 3px 3px;
        }

        .no_aja {
            border: solid 1px black;
            padding: 7px 3px 3px 3px;
            float: left;
        }
    </style>
    <style type="text/css" media="print">
        #cetak {
            display: none;
        }
    </style>
    <script language="Javascript1.2">
        /*
        function printpage() {

            window.print();}*/
    </script>
</head>

<body onLoad="">
    <div class="kunjunganCetak">
        <table class="header">
            <tr>
                <td>
                    <img src="https://penilaian-smk.madanidepok.sch.id/vendor/img/icon/logo1.png" width="100px">
                </td>
                <td>
                    <b style="font-size: 18px; padding-left: 20px;">YAYASAN PENDIDIKAN BINA MADANI</b><br>
                    <b style="font-size: 25px; padding-left: 20px;">SMK MADANI DEPOK</b><br>
                    <b style="font-size: 15px; padding-left: 20px;">TERAKREDITASI "A"</b><br>
                    <b style="font-size: 10px; padding-left: 20px;">
                        Jl. Mandor Samin Rt. 002 Rw. 006 Kel. Kalibaru Kec. Cilodong Kota Depok 16414</b>
                    </br><b style="font-size:10px; padding-left: 20px;">Telp. 021-77841453 Website : www.smk.madani.sch.id Email : smk.madanidepok@gmail.com
                    </b>
                </td>
            </tr>
        </table>
        <hr style="border: 1px solid;">
        <div style="font-size: medium; text-align: center;">
            <b>BUKTI PEMBAYARAN SISWA</b>
        </div>
        <hr style="border: 1px solid;">
        @foreach($Pembayaran as $PembayaranSPP)
        @foreach(DB::table('siswa')->where('nis',$PembayaranSPP->nis)->where('tahun_ajaran',$PembayaranSPP->tahun_ajaran)->where('semester',$PembayaranSPP->semester)->get() as $Siswa)
        @foreach(DB::table('jenis_tagihan')->where('tahun_ajaran',$PembayaranSPP->tahun_ajaran)->where('semester',$PembayaranSPP->semester)->where('tingkat',$PembayaranSPP->tingkat)->get() as $JenisTagihan)
        <table id="perkaraKunjungan" style="font-style: Segoe UI;">
            <tr>
                <td class="label" style="font-weight: bold;">No Induk Siswa</td>
                <td width="5">: </td>
                <td width="200">{{$PembayaranSPP->nis}}</td>
                <td class="label" style="font-weight: bold;">Tahun Pendidikan</td>
                <td width="5">:</td>
                <td width="200">{{$PembayaranSPP->tahun_ajaran}}</td>
            </tr>
            <tr>
                <td class="label" style="font-weight: bold;">Nama Siswa</td>
                <td width="5">:</td>
                <td width="200">{{$Siswa->nama}}</td>
                <td class="label" style="font-weight: bold;">Semester</td>
                <td width="5">:</td>
                <td width="200">{{$PembayaranSPP->semester}}</td>
            </tr>
            <tr>
                <td class="label" style="font-weight: bold;">Kelas</td>
                <td width="5">:</td>
                <td>{{$Siswa->kelas}}</td>
            </tr>
        </table>
        @if($PembayaranSPP->semester=="Semester Genap")
        <?php $tanggal = date('Y-m-d');
        $Tahun = substr($PembayaranSPP->tahun_ajaran, -4);
        if ($PembayaranSPP->spp_a == NULL) {
            $Bulan1 = 0;
        } else {
            $Bulan1 = $JenisTagihan->spp;
        }
        if ($PembayaranSPP->spp_b == NULL) {
            $Bulan2 = 0;
        } else {
            $Bulan2 = $JenisTagihan->spp;
        }
        if ($PembayaranSPP->spp_c == NULL) {
            $Bulan3 = 0;
        } else {
            $Bulan3 = $JenisTagihan->spp;
        }
        if ($PembayaranSPP->spp_d == NULL) {
            $Bulan4 = 0;
        } else {
            $Bulan4 = $JenisTagihan->spp;
        }
        if ($PembayaranSPP->spp_e == NULL) {
            $Bulan5 = 0;
        } else {
            $Bulan5 = $JenisTagihan->spp;
        }
        if ($PembayaranSPP->spp_f == NULL) {
            $Bulan6 = 0;
        } else {
            $Bulan6 = $JenisTagihan->spp;
        }
        $Jumlah = $Bulan1 + $Bulan2 + $Bulan3 + $Bulan4 + $Bulan5 + $Bulan6; ?>
        <table class="barang" cellpadding="0" cellspacing="0">
            <tr style="font-weight: bold;">
                <td>No</td>
                <td>Keterangan Pembayaran</td>
                <td>Jumlah (Rp.)</td>
                <td>Tanggal Pembayaran </td>
                <td>Status </td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Pembayaran SPP - Januari {{$Tahun}}</td>
                @if($PembayaranSPP->spp_a == NULL)
                <td> - </td>
                <td> - </td>
                <td> Belum Lunas</td>
                @else
                <td> Rp. 250.000</td>
                <td> {{date('d F Y', strtotime($PembayaranSPP->spp_a))}}</td>
                <td> Lunas</td>
                @endif
            </tr>
            <tr>
                <td>2.</td>
                <td>Pembayaran SPP - Februari {{$Tahun}}</td>
                @if($PembayaranSPP->spp_b == NULL)
                <td> - </td>
                <td> - </td>
                <td> Belum Lunas</td>
                @else
                <td> Rp. 250.000</td>
                <td> {{date('d F Y', strtotime($PembayaranSPP->spp_b))}}</td>
                <td> Lunas</td>
                @endif
            </tr>
            <tr>
                <td>3.</td>
                <td>Pembayaran SPP - Maret {{$Tahun}}</td>
                @if($PembayaranSPP->spp_c == NULL)
                <td> - </td>
                <td> - </td>
                <td> Belum Lunas</td>
                @else
                <td> Rp. 250.000</td>
                <td> {{date('d F Y', strtotime($PembayaranSPP->spp_c))}}</td>
                <td> Lunas</td>
                @endif
            </tr>
            <tr>
                <td>4.</td>
                <td>Pembayaran SPP - April {{$Tahun}}</td>
                @if($PembayaranSPP->spp_d == NULL)
                <td> - </td>
                <td> - </td>
                <td> Belum Lunas</td>
                @else
                <td> Rp. 250.000</td>
                <td> {{date('d F Y', strtotime($PembayaranSPP->spp_d))}}</td>
                <td> Lunas</td>
                @endif
            </tr>
            <tr>
                <td>5.</td>
                <td>Pembayaran SPP - Mei {{$Tahun}}</td>
                @if($PembayaranSPP->spp_e == NULL)
                <td> - </td>
                <td> - </td>
                <td> Belum Lunas</td>
                @else
                <td> Rp. 250.000</td>
                <td> {{date('d F Y', strtotime($PembayaranSPP->spp_e))}}</td>
                <td> Lunas</td>
                @endif
            </tr>
            <tr>
                <td>6.</td>
                <td>Pembayaran SPP - Juni {{$Tahun}}</td>
                @if($PembayaranSPP->spp_f == NULL)
                <td> - </td>
                <td> - </td>
                <td> Belum Lunas</td>
                @else
                <td> Rp. 250.000</td>
                <td> {{date('d F Y', strtotime($PembayaranSPP->spp_f))}}</td>
                <td> Lunas</td>
                @endif
            </tr>
            <tr>
                <td colspan="2" style="font-weight: bold;">Total </td>
                <td colspan="3" style="font-weight: bold;"> Rp. {{number_format($Jumlah)}}</td>
            </tr>
        </table>
        @else
        <?php $tanggal = date('Y-m-d');
        $Tahun = substr($PembayaranSPP->tahun_ajaran, 0, 4);
        if ($PembayaranSPP->spp_a == NULL) {
            $Bulan1 = 0;
        } else {
            $Bulan1 = $JenisTagihan->spp;
        }
        if ($PembayaranSPP->spp_b == NULL) {
            $Bulan2 = 0;
        } else {
            $Bulan2 = $JenisTagihan->spp;
        }
        if ($PembayaranSPP->spp_c == NULL) {
            $Bulan3 = 0;
        } else {
            $Bulan3 = $JenisTagihan->spp;
        }
        if ($PembayaranSPP->spp_d == NULL) {
            $Bulan4 = 0;
        } else {
            $Bulan4 = $JenisTagihan->spp;
        }
        if ($PembayaranSPP->spp_e == NULL) {
            $Bulan5 = 0;
        } else {
            $Bulan5 = $JenisTagihan->spp;
        }
        if ($PembayaranSPP->spp_f == NULL) {
            $Bulan6 = 0;
        } else {
            $Bulan6 = $JenisTagihan->spp;
        }
        $Jumlah = $Bulan1 + $Bulan2 + $Bulan3 + $Bulan4 + $Bulan5 + $Bulan6;
        ?>
        <table class="barang" cellpadding="0" cellspacing="0">
            <tr style="font-weight: bold;">
                <td>No</td>
                <td>Keterangan Pembayaran</td>
                <td>Jumlah (Rp.)</td>
                <td>Status </td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Pembayaran SPP - Juli {{$Tahun}}</td>
                @if($PembayaranSPP->spp_a == NULL)
                <td> - </td>
                <td> - </td>
                <td> Belum Lunas</td>
                @else
                <td> Rp. 250.000</td>
                <td> {{date('d F Y', strtotime($PembayaranSPP->spp_a))}}</td>
                <td> Lunas</td>
                @endif
            </tr>
            <tr>
                <td>2.</td>
                <td>Pembayaran SPP - Agustus {{$Tahun}}</td>
                @if($PembayaranSPP->spp_b == NULL)
                <td> - </td>
                <td> - </td>
                <td> Belum Lunas</td>
                @else
                <td> Rp. 250.000</td>
                <td> {{date('d F Y', strtotime($PembayaranSPP->spp_b))}}</td>
                <td> Lunas</td>
                @endif
            </tr>
            <tr>
                <td>3.</td>
                <td>Pembayaran SPP - September {{$Tahun}}</td>
                @if($PembayaranSPP->spp_c == NULL)
                <td> - </td>
                <td> - </td>
                <td> Belum Lunas</td>
                @else
                <td> Rp. 250.000</td>
                <td> {{date('d F Y', strtotime($PembayaranSPP->spp_c))}}</td>
                <td> Lunas</td>
                @endif
            </tr>
            <tr>
                <td>4.</td>
                <td>Pembayaran SPP - Oktober {{$Tahun}}</td>
                @if($PembayaranSPP->spp_d == NULL)
                <td> - </td>
                <td> - </td>
                <td> Belum Lunas</td>
                @else
                <td> Rp. 250.000</td>
                <td> {{date('d F Y', strtotime($PembayaranSPP->spp_d))}}</td>
                <td> Lunas</td>
                @endif
            </tr>
            <tr>
                <td>5.</td>
                <td>Pembayaran SPP - November {{$Tahun}}</td>
                @if($PembayaranSPP->spp_e == NULL)
                <td> - </td>
                <td> - </td>
                <td> Belum Lunas</td>
                @else
                <td> Rp. 250.000</td>
                <td> {{date('d F Y', strtotime($PembayaranSPP->spp_e))}}</td>
                <td> Lunas</td>
                @endif
            </tr>
            <tr>
                <td>6.</td>
                <td>Pembayaran SPP - Desember {{$Tahun}}</td>
                @if($PembayaranSPP->spp_f == NULL)
                <td> - </td>
                <td> - </td>
                <td> Belum Lunas</td>
                @else
                <td> Rp. 250.000</td>
                <td> {{date('d F Y', strtotime($PembayaranSPP->spp_f))}}</td>
                <td> Lunas</td>
                @endif
            </tr>
            <tr>
                <td colspan="2" style="font-weight: bold;">Total </td>
                <td colspan="2" style="font-weight: bold;"> Rp. {{number_format($Jumlah)}}</td>
            </tr>
        </table>
        @endif
        <table>
            <tr>
                <td width="900px"></td>
                <td width="200px">Depok, {{date('d F Y')}}</td>
            </tr>
            <tr>
                <td width="900px"></td>
                <td width="200px">Bendahara</td>
            </tr>
            <tr>
                <td><br>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td width="900px"></td>
                <td width="200px" style="font-weight: bold;">Diki Setiawan, S.Kom<br></td>
            </tr>
        </table>
        @endforeach
        @endforeach
        @endforeach
        <p style="color:#FF0000;"><i>Catatan : </i></p>
        <ul style="color:#FF0000; font-size: 9px;">
            <li>Disimpan sebagai bukti pembayaran yang SAH</li>
            <li>Uang yang sudah dibayarkan tidak dapat dikembalikan</li>
        </ul>
    </div>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>

</body>


</html>