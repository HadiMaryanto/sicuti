<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Data Permohonan Izin</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-responsive" id="table-1">
            <thead>
              <tr>
                <th class="text-center">
                  No
                </th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Jenis Izin</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Selama</th>
                <th>Perihal</th>
                <th>Tanggal Pengajuan</th>
                <th>Status Pimpinan</th>
                <th>Status Kepala Bidang</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // var_dump($this->session->userdata('user_pegawai_id'));
              // var_dump($this->session->userdata('user_level'));
              $no = 1;
              foreach ($izin as $key => $value): ?>
              <?php
                $mulai = new DateTime($value['izin_jam_mulai']);
                $selesai = new DateTime($value['izin_jam_selesai']);
                $a = $mulai->format('H:i');
                $b = $selesai->format('H:i');
               ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $value['pegawai_nip'] ?></td>
                    <td><?php echo $value['pegawai_nama'] ?></td>
                    <td><?php echo $value['jabatan_nama'] ?></td>
                    <td><?php echo $value['izin_jenis'] ?></td>
                    <td><?php echo $a ?></td>
                    <td><?php echo $b ?></td>
                    <td><?php echo $value['izin_selama'] ?></td>
                    <td><?php echo $value['izin_perihal'] ?></td>
                    <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                    <td><?php echo $value['izin_status_pimpinan'] ?></td>
                    <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                  </tr>
              <?php
              $no++;
            endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
