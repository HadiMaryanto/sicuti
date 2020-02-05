<link rel="stylesheet" href="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
.line-title {
    border: 0;
    border-style: inset;
    border-top: 1px solid #000;
}
</style>
</head>

<img src="assets/img/logoriau.jpg" style="position: absolute; margin-left:5px; width: 85px; height: auto;">
<table style="width: 100%;">
    <tr>
        <td align="center">
            <span style="line-height: 1;font-size:18px;font-weight:bold;">
                KEMENTERIAN AGAMA REPUBLIK INDONESIA
            </span> <br>
            <span style="line-height: 1;font-size:15px;">
                KANTOR WILAYAH KEMENTERIAN AGAMA
            </span> <br>
            <span style="line-height: 1;font-size:15px;">
                PROVINSI RIAU
            </span> <br>
            <span style="line-height: 1;font-size:14px;">
                Jalan Jendral Sudirman Nomor 235 Kotak Pos 1131 Pekanbaru 28111
            </span> <br>
            <span style="line-height: 1;font-size:14px;">
                Telepon (0761) 21360; Faksimili (0761)26053
            </span> <br>
            <span style="line-height: 1;font-size:14px;">
                Website : www.riau.kemenag.go.id
            </span> <br>
        </td>
    </tr>
</table>

<hr class="line-title">

<p align="center" style="font:17px;margin-top:20px;">
    <b> SURAT IZIN <?php echo strtoupper($row['cuti_jenis']) ?></b> <br>
    <span style="font:17px"> Nomor :B-    /Kw.04.1/KP.08.2/11/<?php echo date('Y') ?> </span>
</p>


<p style="margin-left:66px;margin-top:50px">1. Diberikan Izin untuk melaksanakan <?php echo $row['cuti_jenis'] ?> Kepada Pegawai Negeri Sipil :</p>
<table style="margin-left: 60px">
    <tr>
        <td width="50px"> Nama </td>
        <td width="10px">:</td>
        <td><?php echo $row['pegawai_nama'] ?></td>
    </tr>
    <tr>
        <td> NIP </td>
        <td>:</td>
        <td><?php echo $row['pegawai_nip'] ?></td>
    </tr>
    <tr>
        <td width="100px">Pangkat/Gol.Ruang </td>
        <td>:</td>
        <td><?php echo $row['pegawai_golongan'] ?></td>
    </tr>
    <tr>
        <td> Jabatan</td>
        <td>:</td>
        <td><?php echo $row['jabatan_nama'] ?></td>
    </tr>

    <tr>
        <td> Unit Kerja</td>
        <td>:</td>
        <td><?php echo $row['unit_kerja'] ?></td>
    </tr>
</table>
<p style="margin-left:84px;margin-top:25px">Selama <?php echo $row['cuti_selama'] ?> hari, terhitung mulai tanggal <?php echo date('d F Y', strtotime($row['cuti_tgl_mulai'])); ?>
    s/d <?php echo date('d F Y', strtotime($row['cuti_tgl_selesai'])); ?>, dengan
<br> ketentuan sebagai berikut :</p>
<p style="margin-left:84px;">a. Sebelum menjalankan cuti <?php echo $row['cuti_jenis'] ?>, wajib menyerahkan pekerjaannya kepada atasan langsungnya</p>
<p style="margin-left:84px;">b. Setelah selesai menjalankan cuti <?php echo $row['cuti_jenis'] ?>, wajib melaporkan diri kepada atasan langsungnya dan bekerja kembali sebagaimana mestinya</p>
<p style="margin-left:66px;margin-top:40px">2. Demikian Izin melaksanakan <?php echo $row['cuti_jenis'] ?> ini dibuat untuk dapat digunakan sebagaimana mestinya</p>



<div>
    <p style="text-align:right;margin-top:10px;margin-right:45px;font-size:15px;">Pekanbaru, <?php echo date('d F Y'); ?></p>
    <p style="text-align:right;margin-right:120px;"> <?php echo strtoupper($kepala['user_level']) ?> </p> <br><br>
    <table align="right">
        <tr>
            <td>
                <p style="margin-right:70px;"> <b> <?php echo $kepala['pegawai_nama'] ?> </b> <br> NIP
                    <?php echo $kepala['pegawai_nip'] ?> </p>
            </td>
        </tr>
    </table>
</div>

<div style="margin-top:80px;">
    <p style="margin-left:84px;font-size:12px;"> <b><u>Tembusan : </u></b> </p>
    <p style="margin-left:84px;font-size:12px;">1. Kepala Bagian Tata Usaha Kanwil Kemenag Provinsi Riau </p>
    <p style="margin-left:84px;font-size:12px;">2. Kasubag Hukum dan KUB Kanwil Kemenag Provinsi Riau </p>
    <p style="margin-left:84px;font-size:12px;">3. Kasubag Ortala dan Kepegawaian Kanwil Kemenag Provinsi Riau</p>
</div>
