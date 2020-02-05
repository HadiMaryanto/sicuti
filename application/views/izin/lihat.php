<div class="card">
<div class="row">
  <div class="col-12 col-md-8 col-lg-8">

  </div>
  <div class="col-12 col-md-4 col-lg-4">
    <p style="font-size:14px;">Pekanbaru, <?php echo date('d M Y'); ?>
      Kepada Yth: <br>
      Kepala Kantor Wilayah Kementrian Agama <br>
      Provinsi Riau <br>
      di <br>
      Pekanbaru
    </p>

  </div>
</div>

  <h6 align="center">Formulir Permohonan Izin</h4>
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
          <td colspan="6"><strong style="margin-left:10px;">II. JENIS IZIN YANG DIAMBIL </strong></td>
      </tr>

      <tr>
          <td colspan="6"><strong style="margin-left:10px;"> <?php echo $row['izin_jenis'] ?> </strong></td>
      </tr>
      <tr>

      <tr>
          <td colspan="6"><strong style="margin-left:10px;">III. PERIHAL IZIN </strong></td>
      </tr>

      <tr>
          <td colspan="6"><strong style="margin-left:10px;"> <?php echo $row['izin_perihal'] ?></strong></td>
      </tr>

      <tr>
          <td colspan="6"><strong style="margin-left:10px;">IV. LAMANYA IZIN </strong></td>
      </tr>

      <tr>
        <?php
        $mulai = new DateTime($row['izin_jam_mulai']);
        $selesai = new DateTime($row['izin_jam_selesai']);
        $a = $mulai->format('H:i');
        $b = $selesai->format('H:i');

         ?>
          <td><strong style="margin-left:10px;"> Selama </strong></td>
          <td><strong style="margin-left:10px;"> <?php echo $row['izin_selama']; ?> (Jam) Kerja </strong></td>
          <td><strong style="margin-left:10px;"> Mulai Jam </strong></td>
          <td><strong style="margin-left:10px;"> <?php echo $a; ?> </strong></td>
          <td><strong style="margin-left:10px;"> s/d </strong></td>
          <td><strong style="margin-left:10px;"> <?php echo $b; ?> </strong></td>
      </tr>

      <tr>
          <td colspan="6"><strong style="margin-left:10px;">V. ALAMAT SELAMA IZIN </strong></td>
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
          <td colspan="2" style="text-align:center;"><strong><?php echo $row['izin_status_pimpinan'] ?></strong> </td>
          <td colspan="2"><strong style="margin-left:10px;"></strong></td>
      </tr>
      <tr>
          <td colspan="4"></td>
          <td colspan="2">
            <?php if ($kepala['user_level'] == 'pimpinan'): ?>
            <p style="text-align:center;"> <?php echo 'Pimpinan' ?> </p> <br><br>
            <?php endif; ?>

            <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?php echo $kepala['pegawai_nama'] ?> </p>
            <p style="text-align:center;margin-top:10px;"> NIP . <?php echo $kepala['pegawai_nip'] ?> </p>
          </td>
      </tr>
  </table>
</div>
