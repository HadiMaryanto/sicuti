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
    <b> SURAT KETERANGAN / PEMBERITAHUAN / IZIN </b> <br>
    <span style="font:17px"> Nomor :B-    /Kw.04.1/KP.01.1/11/<?php echo date('Y') ?> </span>
</p>


<p style="margin-left:80px;margin-top:30px">Yang bertanda tangan di bawah ini :</p>
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
<p style="margin-left:80px;margin-top:15px">dengan ini mohon izin / memberitahukan bahwa pada :</p>
<table style="margin-left: 60px">
    <tr>
        <td width="50px"> Hari</td>
        <td width="10px">:</td>
        <td><?php
          $tgl = $row['izin_tgl_pengajuan'];
          $hari = date('D', strtotime($tgl));
          $daylist = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
          );
          echo $daylist[$hari];
          ?></td>
    </tr>
    <tr>
        <td> Tanggal </td>
        <td>:</td>
        <td><?php
            $pecah = explode("-", $row['izin_tgl_pengajuan']);
            // var_dump($pecah);die;
            $bulan = $pecah[1];
            $sekarang = date('F');
            // var_dump($tgll);die;
            // $bulan = date('m', strtotime($tgll));
            // var_dump($bulan);die;
            $bulanlist = array(
              '01' => 'Januari',
              '02' => 'Februari',
              '03' => 'Maret',
              '04' => 'April',
              '05' => 'Mei',
              '06' => 'Juni',
              '07' => 'Juli',
              '08' => 'Agustus',
              '09' => 'September',
              '10' => 'Oktober',
              '11' => 'November',
              '12' => 'Desember'
            );
            // var_dump($bulanlist[$bulan]);die;
            echo $pecah[2] . " " . $bulanlist[$bulan] . " " . $pecah[0];
            ?></td>
    </tr>
    <tr>
        <td> Jenis</td>
        <td>:</td>
        <td><?php echo $row['izin_jenis'] ?>.</td>
    </tr>
</table>
<?php
  $jm = new DateTime($row['izin_jam_mulai']);
  $js = new DateTime($row['izin_jam_selesai']);
  $am = $jm->format('H:i');
  $bs = $js->format('H:i');
 ?>
<p style="margin-left:80px;margin-top:15px">untuk keperluan <?php echo $row['izin_perihal'] ?> dari pukul <?php echo $am ?> sampai pukul <?php echo $bs ?> WIB.</p>


<div>
  <!-- <p style="text-align:left;margin-top:10px;margin-left:65px;font-size:15px;"> ketua</p> -->
    <p style="text-align:right;margin-top:10px;margin-right:85px;font-size:15px;">Pekanbaru,
      <?php
      $sekarang = date('F');
      $bulaning = array(
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
      );
      echo date('d') . " " . $bulaning[$sekarang] . " " . date('Y');
       ?></p>
       <?php if (strpos($row['user_level'],'pegawai sub perencanaan') !== false): ?>
         <p style="text-align:left;margin-left:80px;">
           <?php
           if ($sub_pimpinan['unit_kerja'] == 'Sub Bagian Perencanaan dan Keuangan') {
             echo "Sub Bagian Perencanaan" . "<br>" . "dan Keuangan";
           }
           ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai sub organisasi') !== false): ?>
         <p style="text-align:left;margin-left:80px;">
           <?php
              if ($sub_pimpinan['unit_kerja'] == 'Sub Bagian Organisasi, Tata Laksana, dan Kepegawaian') {
                echo "Sub Bagian Organisasi" . "<br>" . "Tata Laksana dan Kepegawaian";
              }

           ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai sub informasi') !== false): ?>
         <p style="text-align:left;margin-left:80px;">
           <?php
           if ($sub_pimpinan['unit_kerja'] == 'Sub Bagian Informasi dan Hubungan Masyarakat') {
             echo "Sub Bagian Informasi". "<br>". "dan Hubungan Masyarakat";
           }
           ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai sub hukum') !== false): ?>
         <p style="text-align:left;margin-left:80px;">
           <?php
           if ($sub_pimpinan['unit_kerja'] == 'Sub Bagian Hukum dan Kerukunan Umat Beragama') {
             echo "Sub Bagian Hukum dan" . "<br>" . "Kerukunan Umat Beragama";
           }
           ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai sub umum') !== false): ?>
         <p style="text-align:left;margin-left:80px;">
           <?php
           if ($sub_pimpinan['unit_kerja'] == 'Sub Bagian Umum') {
             echo "Sub Bagian Umum";
           }
           ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai pendidikan madrasah') !== false): ?>
         <p style="text-align:left;margin-left:80px;">
          <?php
          if ($sub_pimpinan['unit_kerja'] == 'Bidang Pendidikan Madrasah') {
            echo "Bidang Pendidikan Madrasah";
          }
          ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai pendidikan keagamaan') !== false): ?>
         <p style="text-align:left;margin-left:80px;">
           <?php
           if ($sub_pimpinan['unit_kerja'] == 'Bidang Pendidikan Agama dan Keagamaan Islam') {
             echo "Bidang Pendidikan Agama" . "<br>" . "dan Keagamaan Islam";
           }
           ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai haji dan umrah') !== false): ?>
         <p style="text-align:left;margin-left:80px;">
           <?php
           if ($sub_pimpinan['unit_kerja'] == 'Bidang Penyelenggaraan Haji dan Umrah') {
             echo "Bidang Penyelenggaraan" . "<br>" . "Haji dan Umrah";
           }
           ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai urusan agama') !== false): ?>
         <p style="text-align:left;margin-left:80px;">
           <?php
           if ($sub_pimpinan['unit_kerja'] == 'Bidang Urusan Agama Islam dan Pembinaan Syariah') {
             echo "Bidang Urusan Agama Islam" . "<br>" . "dan Pembinaan Syariah";
           }

           ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai penerangan agama') !== false): ?>
         <p style="text-align:left;margin-left:80px;">
           <?php
           if ($sub_pimpinan['unit_kerja'] == 'Bidang Penerangan Agama Islam, Zakat dan Wakaf') {
             echo "Bidang Penerangan Agama Islam,". "<br>" . "Zakat dan Wakaf";
           }
           ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai masyarakat kristen') !== false): ?>
         <p style="text-align:left;margin-left:80px;"> <?php echo strtoupper($sub_pimpinan['unit_kerja']) ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai masyarakat hindu') !== false): ?>
         <p style="text-align:left;margin-left:80px;"> <?php echo strtoupper($sub_pimpinan['unit_kerja']) ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai masyarakat katolik') !== false): ?>
         <p style="text-align:left;margin-left:80px;"> <?php echo strtoupper($sub_pimpinan['unit_kerja']) ?> </p>
       <?php elseif (strpos($row['user_level'],'pegawai masyarakat budha') !== false): ?>
         <p style="text-align:left;margin-left:80px;"> <?php echo strtoupper($sub_pimpinan['unit_kerja']) ?> </p>
       <?php endif; ?>

    <p style="text-align:right;margin-right:80px;margin-top:-600px;"> <?php echo $row['jabatan_nama'] ?> </p> <br><br>
    <table align="right">
        <tr>
            <td>
                <p style="margin-right:80px;"> <b> <?php echo $row['pegawai_nama'] ?> </b> <br> NIP
                    <?php echo $row['pegawai_nip'] ?> </p>
            </td>
        </tr>
    </table>
      <table align="left">
          <tr>
              <td>
                  <p style="margin-left:80px;"> <b> <?php echo $sub_pimpinan['pegawai_nama'] ?> </b> <br> NIP
                      <?php echo $sub_pimpinan['pegawai_nip'] ?> </p>
              </td>
          </tr>
      </table>

</div>

<p style="text-align:center;margin-top:100px;margin-right:40px;">Mengetahui : </p>
<p style="text-align:center;margin-right:50px;"><b> <?php echo strtoupper($kepala['unit_kerja']) ?> </b></p> <br><br>
<table align="center">
    <tr>
        <td>
            <p style="margin-left:30px;"> <b> <?php echo $kepala['pegawai_nama'] ?> </b> <br> NIP
                <?php echo $kepala['pegawai_nip'] ?> </p>
        </td>
    </tr>
</table>

<!-- <div style="margin-top:60px;">
    <p style="margin-left:84px;font-size:12px;"> <b><u>Tembusan : </u></b> </p>
    <p style="margin-left:84px;font-size:12px;">1. Kepala Bagian Tata Usaha Kanwil Kemenag Provinsi Riau </p>
    <p style="margin-left:84px;font-size:12px;">2. Kasubag Hukum dan KUB Kanwil Kemenag Provinsi Riau </p>
    <p style="margin-left:84px;font-size:12px;">3. Kasubag Ortala dan Kepegawaian Kanwil Kemenag Provinsi Riau</p>
</div> -->
