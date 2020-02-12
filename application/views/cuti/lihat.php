<div class="card">
<div class="row">
  <div class="col-12 col-md-8 col-lg-8">

  </div>
  <div class="col-12 col-md-4 col-lg-4">
    <p style='font-size:9px;'>ANAK LAMPIRAN 1.b <br>
    PERATURAN BADAN KEPEGAWAIAN NEGARA REPUBLIK INDONESIA <br>
    NOMOR 24 TAHUN 2017 <br>
    TENTANG TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL</p>

    <p style="font-size:14px;">Pekanbaru,
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
      Kepada Yth: <br>
      Kepala Kantor Wilayah Kementrian Agama <br>
      Provinsi Riau <br>
      di <br>
      Pekanbaru
    </p>

  </div>
</div>

  <h6 align="center">Formulir Permintaan dan Pemberian Cuti</h4>
  <table border="1" align="center" style="width:90%;height:100%;margin-bottom:100px;">
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">I. DATA PEGAWAI </strong></td>
      </tr>
      <tr>
          <td>
              <strong style="margin-left:5px;">Nama<b>
          </td>
          <td colspan="2">
              <strong style="margin-left:10px;"><?php echo $row['pegawai_nama'] ?></strong>
          </td>
          <td>
              <strong style="margin-left:5px;">NIP<b>
          </td>
          <td colspan="2"><strong style="margin-left:10px;"> <?php echo $row['pegawai_nip'] ?></strong></td>
      </tr>
      <tr>
          <td>
              <strong style="margin-left:5px;">Jabatan<b>
          </td>
          <td colspan="2">
              <strong style="margin-left:10px;"><?php echo $row['jabatan_nama'] ?> </strong>
          </td>
          <td>
            <?php $awal = new DateTime($row['pegawai_TMT']);
              $akhir = new DateTime();
              $diff = $awal->diff($akhir);
             ?>
              <strong style="margin-left:5px;">Masa Kerja <b>
          </td>
          <td colspan="2"><strong style="margin-left:10px;">
            <?php echo $diff->y . ' tahun, '; echo $diff->m . ' bulan, '; echo $diff->d .' hari '; ?>
              </strong></td>
      </tr>

      <tr>
          <td colspan="6"><strong style="margin-left:10px;">II. JENIS CUTI YANG DIAMBIL </strong></td>
      </tr>

      <tr>
          <td colspan="6"><strong style="margin-left:10px;"> <?php echo $row['cuti_jenis'] ?> </strong></td>
      </tr>
      <tr>

      <tr>
          <td colspan="6"><strong style="margin-left:10px;">III. ALASAN CUTI </strong></td>
      </tr>

      <tr>
          <td colspan="6"><strong style="margin-left:10px;"> <?php echo $row['cuti_alasan'] ?></strong></td>
      </tr>

      <tr>
          <td colspan="6"><strong style="margin-left:10px;">IV. LAMANYA CUTI </strong></td>
      </tr>

      <tr>
        <?php
        $pecah1 = explode("-", $row['cuti_tgl_mulai']);
        $bulan1 = $pecah1[1];        
        $pecah2 = explode("-", $row['cuti_tgl_selesai']);
        $bulan2 = $pecah2[1];
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
        // echo date('d') . " " . $bulaning[$sekarang] . " " . date('Y');
         ?></p>

          <td><strong style="margin-left:10px;"> Selama </strong></td>
          <td><strong style="margin-left:10px;"> <?php echo $row['cuti_selama'] ?> (hari) Kerja </strong></td>
          <td><strong style="margin-left:10px;"> Mulai Tanggal </strong></td>
          <td><strong style="margin-left:10px;"> <?php echo $pecah1[2] . " " . $bulanlist[$bulan1] . " " . $pecah1[0]; ?> </strong></td>
          <td><strong style="margin-left:10px;"> s/d </strong></td>
          <td><strong style="margin-left:10px;"> <?php echo $pecah2[2] . " " . $bulanlist[$bulan2] . " " . $pecah2[0]; ?> </strong></td>
      </tr>

      <tr>
          <td colspan="6"><strong style="margin-left:10px;">V. ALAMAT SELAMA CUTI </strong></td>
      </tr>

      <tr>
          <td colspan="4"><strong style="margin-left:10px;"></strong></td>
          <td colspan="1"><strong style="margin-left:10px;">TELP</strong></td>
          <td><strong style="margin-left:10px;"></strong><?php echo $row['pegawai_nohp'] ?></td>
      </tr>

      <tr>
          <td colspan="4"><strong style="margin-left:10px;"><?php echo $row['pegawai_alamat'] ?> </strong></td>
          <td colspan="2">
              <p style="text-align:center;"> Hormat Saya </p> <br><br>
              <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $row['pegawai_nama'] ?> </p>
              <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $row['pegawai_nip'] ?> </p>
          </td>
      </tr>

      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_pimpinan'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <?php if ($kepala['unit_kerja'] == 'kepala'): ?>
            <p style="text-align:center;"> <?php echo "<b>" . 'KEPALA' ."</b>" ?> </p> <br><br>
            <?php endif; ?>

            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $kepala['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $kepala['pegawai_nip'] ?> </p>
          </td>
      </tr>
      <?php if (strpos($row['user_level'],'pegawai sub perencanaan') !== false): ?>
        <tr>
            <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
        </tr>

        <tr>
            <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
            <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
            <td colspan="2"><strong style="margin-left:10px;"></strong></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td colspan="2">
              <p style="text-align:center;"> <?php echo $userA['unit_kerja'] ?> </p> <br><br>
              <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userA['pegawai_nama'] ?> </p>
              <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userA['pegawai_nip'] ?> </p>
            </td>
        </tr>

    <?php elseif (strpos($row['user_level'],'pegawai sub organisasi') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userB['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userB['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userB['pegawai_nip'] ?> </p>
          </td>
      </tr>

    <?php elseif (strpos($row['user_level'],'pegawai sub informasi') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userC['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userC['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userC['pegawai_nip'] ?> </p>
          </td>
      </tr>

    <?php elseif (strpos($row['user_level'],'pegawai sub hukum') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userD['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userD['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userD['pegawai_nip'] ?> </p>
          </td>
      </tr>

    <?php elseif (strpos($row['user_level'],'pegawai sub umum') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userE['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userE['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userE['pegawai_nip'] ?> </p>
          </td>
      </tr>

    <?php elseif (strpos($row['user_level'],'pegawai pendidikan madrasah') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userF['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userF['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userF['pegawai_nip'] ?> </p>
          </td>
      </tr>

    <?php elseif (strpos($row['user_level'],'pegawai pendidikan keagamaan') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userG['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userG['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userG['pegawai_nip'] ?> </p>
          </td>
      </tr>

    <?php elseif (strpos($row['user_level'],'pegawai haji dan umrah') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userH['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userH['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userH['pegawai_nip'] ?> </p>
          </td>
      </tr>

    <?php elseif (strpos($row['user_level'],'pegawai urusan agama') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userI['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userI['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userI['pegawai_nip'] ?> </p>
          </td>
      </tr>

    <?php elseif (strpos($row['user_level'],'pegawai penerangan agama') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userJ['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userJ['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userJ['pegawai_nip'] ?> </p>
          </td>
      </tr>

    <?php elseif (strpos($row['user_level'],'pegawai masyarakat kristen') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userK['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userK['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userK['pegawai_nip'] ?> </p>
          </td>
      </tr>

    <?php elseif (strpos($row['user_level'],'pegawai masyarakat hindu') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userL['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userL['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userL['pegawai_nip'] ?> </p>
          </td>
      </tr>

    <?php elseif (strpos($row['user_level'],'pegawai masyarakat katolik') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userM['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userM['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userM['pegawai_nip'] ?> </p>
          </td>
      </tr>

    <?php elseif (strpos($row['user_level'],'pegawai masyarakat budha') !== false): ?>
      <tr>
          <td colspan="6"><strong style="margin-left:10px;">VI. PERTIMBANGAN ATASAN LANGSUNG </strong></td>
      </tr>

      <tr>
          <td colspan="2" style="text-align:center;"><strong>STATUS</strong></td>
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['cuti_status_kepala_bidang'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <p style="text-align:center;"> <?php echo $userN['unit_kerja'] ?> </p> <br><br>
            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $userN['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $userN['pegawai_nip'] ?> </p>
          </td>
      </tr>
    <?php endif; ?>

  </table>
</div>
