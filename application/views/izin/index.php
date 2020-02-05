<div class="col-12">
<?php if ($this->session->flashdata('alert') == 'berhasil_tambah') { ?>
      <div class="alert alert-primary alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
          <span>&times;</span>
          </button>
          Berhasil Mengajukan Izin
        </div>
      </div>
    <?php }elseif ($this->session->flashdata('alert') == 'berhasil_setuju') { ?>
      <div class="alert alert-primary alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
          <span>&times;</span>
          </button>
          Berhasil Menyetujui
        </div>
      </div>
    <?php }elseif ($this->session->flashdata('alert') == 'tolak') {?>
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
          <span>&times;</span>
          </button>
          Berhasil Tidak Disetujui
        </div>
      </div>
    <?php }elseif ($this->session->flashdata('alert') == 'gagall_tambah') { ?>
      <div class="alert alert-warning alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
          <span>&times;</span>
          </button>
          Masih Belum Bisa Mengajukan Cuti
        </div>
      </div>
    <?php } ?>
    <div class="card">
      <div class="card-header">
        <h4>Data Pengajuan Izin</h4>
      </div>
      <div class="card-body">
        <?php if (strpos($this->session->userdata('user_level'),'pegawai') === false): ?>

        <?php else: ?>
          <a href="<?php echo base_url('izin/tambah')  ?>" class="btn btn-primary">Tambah</a><hr>
        <?php endif; ?>

        <div class="table-responsive">
          <table class="table table-striped table-responsive" id="table-1">
            <thead>
              <tr>
                <!-- <th class="text-center">
                  No
                </th> -->
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Jenis Izin</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <!-- <th>Selama</th> -->
                <th>Perihal</th>
                <th>Tanggal Pengajuan</th>
                <th>Status Pimpinan</th>
                <th>Status Kepala Bidang</th>
                <th>Action</th>
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
                <?php if (strpos($this->session->userdata('user_level'),'pegawai') !== false): ?>
                  <?php if ($value['pegawai_id'] == $this->session->userdata('user_pegawai_id')): ?>
                    <tr>
                      <!-- <td><?php echo $no ?></td> -->
                      <td><?php echo $value['pegawai_nip'] ?></td>
                      <td><?php echo $value['pegawai_nama'] ?></td>
                      <td><?php echo $value['jabatan_nama'] ?></td>
                      <td><?php echo $value['izin_jenis'] ?></td>
                      <td><?php echo $a ?></td>
                      <td><?php echo $b ?></td>
                      <td><?php echo $value['izin_perihal'] ?></td>
                      <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                      <td><?php echo $value['izin_status_pimpinan'] ?></td>
                      <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                      <td>
                        <?php if ($value['izin_status_pimpinan'] == "disetujui" && $value['izin_status_kepala_bidang'] == "disetujui"): ?>
                            <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/lihat/".$value['izin_id'])?>">Lihat</a><br>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endif; ?>
                <?php else: ?>
                  <?php if (strpos($this->session->userdata('user_level'),'perencanaan') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Perencanaan') !== false): ?>
                    <tr>
                      <!-- <td><?php echo $no ?></td> -->
                      <td><?php echo $value['pegawai_nip'] ?></td>
                      <td><?php echo $value['pegawai_nama'] ?></td>
                      <td><?php echo $value['jabatan_nama'] ?></td>
                      <td><?php echo $value['izin_jenis'] ?></td>
                      <td><?php echo $a ?></td>
                      <td><?php echo $b ?></td>
                      <td><?php echo $value['izin_perihal'] ?></td>
                      <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                      <td><?php echo $value['izin_status_pimpinan'] ?></td>
                      <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                      <td>
                        <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                          <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                            <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                            <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                            <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                            <?php endif; ?>

                          <?php else: ?>
                            <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                              <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                              <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'organisasi') !== false): ?>
                    <?php
                    if (strpos($value['unit_kerja'],'Organisasi') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'hukum') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Hukum') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'informasi') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Informasi') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                                <?php endif; ?>
                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'umum') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Umum') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'pendidikan madrasah') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Pendidikan madrasah') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'pendidikan keagamaan') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Pendidikan Keagamaan') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'haji dan umrah') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Haji dan Umrah') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'urusan agama') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Urusan Agama') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'penerangan agama') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Penerangan Agama') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'masyarakat kristen') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Masyarakat Kristen') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'masyarakat katolik') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Masyarakat Katolik') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'masyarakat hindu') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Masyarakat Hindu') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif (strpos($this->session->userdata('user_level'),'masyarakat budha') !== false): ?>
                    <?php if (strpos($value['unit_kerja'],'Masyarakat Budha') !== false): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_alasan'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                  <?php elseif ($this->session->userdata('user_level') == 'pimpinan'): ?>
                        <tr>
                          <!-- <td><?php echo $no ?></td> -->
                          <td><?php echo $value['pegawai_nip'] ?></td>
                          <td><?php echo $value['pegawai_nama'] ?></td>
                          <td><?php echo $value['jabatan_nama'] ?></td>
                          <td><?php echo $value['izin_jenis'] ?></td>
                          <td><?php echo $a ?></td>
                          <td><?php echo $b ?></td>
                          <td><?php echo $value['izin_perihal'] ?></td>
                          <td><?php echo $value['izin_tgl_pengajuan'] ?></td>
                          <td><?php echo $value['izin_status_pimpinan'] ?></td>
                          <td><?php echo $value['izin_status_kepala_bidang'] ?></td>
                          <td>
                            <?php if (strpos($this->session->userdata('user_level'),'pegawai') == false): ?>
                              <?php if ($this->session->userdata('user_level') == "pimpinan"): ?>
                                <?php if ($value['izin_status_pimpinan'] != "disetujui" && $value['izin_status_pimpinan'] != "tidak disetujui"): ?>
                                <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuipim/".$value['pegawai_id'])?>">Setujui</a><br>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakpim/".$value['pegawai_id'])?>">Tolak</a>

                                <?php endif; ?>

                              <?php else: ?>
                                <?php if ($value['izin_status_kepala_bidang'] != "disetujui" && $value['izin_status_kepala_bidang'] != "tidak disetujui"): ?>
                                  <a type="button" class="btn btn-primary" href="<?php echo base_url("izin/setujuikep/".$value['pegawai_id'])?>">Setujui</a><br>
                                  <a type="button" class="btn btn-danger" href="<?php echo base_url("izin/tolakkep/".$value['pegawai_id'])?>">Tolak</a>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                  <?php endif; ?>
              <?php endif; ?>
              <?php
              $no++;
            endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
