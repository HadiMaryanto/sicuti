<div class="col-12">
<?php if ($this->session->flashdata('alert') == 'berhasil_aktif') { ?>
      <div class="alert alert-primary alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
          <span>&times;</span>
          </button>
          Berhasil Mengaktifkan akun
        </div>
      </div>
    <?php }elseif ($this->session->flashdata('alert') == 'berhasil_edit') { ?>
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
          <span>&times;</span>
          </button>
          Berhasil Mengubah Data
        </div>
      </div>
    <?php }elseif ($this->session->flashdata('alert') == 'berhasil_hapus') {?>
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
          <span>&times;</span>
          </button>
          Berhasil Menghapus Data
        </div>
      </div>
    <?php } ?>
    <div class="card">
      <div class="card-header">
        <h4>Data Akun</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="table-1">
            <thead>
              <tr>
                <th class="text-center">
                  No
                </th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Gol</th>
                <th>Unit Kerja</th>
                <th>Level</th>
                <th>No Hp</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($pegawai as $key => $value): ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $value['pegawai_nip'] ?></td>
                  <td><?php echo $value['pegawai_nama'] ?></td>
                  <td><?php echo $value['jabatan_nama'] ?></td>
                  <td><?php echo $value['pegawai_golongan'] ?></td>
                  <td><?php echo $value['unit_kerja'] ?></td>
                  <td>
                    <?php if ($cek[$key]['user_id'] == null): ?>

                    <?php else: ?>
                    <?php echo $cek[$key]['user_level'] ?>
                    <?php endif; ?>
                  </td>
                  <td><?php echo $value['pegawai_nohp'] ?></td>
                  <td><?php echo $value['pegawai_alamat'] ?></td>
                  <td>
                    <!-- key adalah indexnya -->
                    <?php if ($cek[$key]['user_id'] == null): ?>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Aktifkan</button>
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="formModal">Jabatan </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <form class="needs-validation" novalidate="" action="<?php echo base_url('akun/aktif/'.$value['pegawai_id'])?>" method="post">
                                  <div class="form-group">
                                    <label>Aktifkan sebagai  <i class="fa fa-help"></i></label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <i class="fas fa-user"></i>
                                        </div>
                                      </div>
                                      <select class="form-control" name="level">
                                        <option disabled selected>- Pilih -</option>
                                        <option value="pimpinan">pimpinan</option>
                                        <option value="kankemenag kab/kota">kankemenag kab/kota</option>
                                        <option value="perencanaan">sub perencanaan</option>
                                        <option value="organisasi">sub organisasi</option>
                                        <option value="hukum">sub hukum</option>
                                        <option value="informasi">sub informasi</option>
                                        <option value="umum">sub umum</option>
                                        <option value="pendidikan madrasah">pendidikan madrasah</option>
                                        <option value="pendidikan keagamaan">pendidikan keagamaan</option>
                                        <option value="haji dan umrah">haji dan umrah</option>
                                        <option value="urusan agama">urusan agama</option>
                                        <option value="penerangan agama">penerangan agama</option>
                                        <option value="masyarakat kriten">masyarakat kriten</option>
                                        <option value="masyarakat hindu">masyarakat hindu</option>
                                        <option value="masyarakat katolik">masyarakat katolik</option>
                                        <option value="masyarakat budha">masyarakat budha</option>
                                        <option value="pegawai kankemenag kab/kota">pegawai kankemenag kab/kota</option>
                                        <option value="pegawai sub perencanaan">pegawai sub perencanaan</option>
                                        <option value="pegawai sub organisasi">pegawai sub organisasi</option>
                                        <option value="pegawai sub hukum">pegawai sub hukum</option>
                                        <option value="pegawai sub informasi">pegawai sub informasi</option>
                                        <option value="pegawai sub umum">pegawai sub umum</option>
                                        <option value="pegawai pendidikan madrasah">pegawai pendidikan madrasah</option>
                                        <option value="pegawai pendidikan keagamaan">pegawai pendidikan keagamaan</option>
                                        <option value="pegawai haji dan umrah">pegawai haji dan umrah</option>
                                        <option value="pegawai urusan agama">pegawai urusan agama</option>
                                        <option value="pegawai penerangan agama">pegawai penerangan agama</option>
                                        <option value="pegawai masyarakat kriten">pegawai masyarakat kriten</option>
                                        <option value="pegawai masyarakat hindu">pegawai masyarakat hindu</option>
                                        <option value="pegawai masyarakat katolik">pegawai masyarakat katolik</option>
                                        <option value="pegawai masyarakat budha">pegawai masyarakat budha</option>
                                      </select>

                                      <div class="invalid-feedback">
                                        Field tidak boleh kosong
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Level Hubungan
                                      <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hanya Untuk Hak Akses Pegawai Tidak Untuk Pimpinan atau Sub Pimpinan">Arahkan Cursor
                    </button><i style="color:red;"> *tidak wajib di isi </i></label>
                                    <select class="form-control" name="level_hubungan">
                                      <option value="">- Pilih -</option>
                                      <option value="perencanaan">Pegawai Sub Perencanaan</option>
                                      <option value="organisasi">Pegawai Sub Organisasi</option>
                                      <option value="hukum">Pegawai Sub hukum</option>
                                      <option value="informasi">Pegawai Sub Informasi</option>
                                      <option value="umum">Pegawai Sub Umum</option>
                                      <option value="pendidikan madrasah">Pegawai Pendidikan Madrasah</option>
                                      <option value="pendidikan keagamaan">Pegawai Pendidikan Keagamaan</option>
                                      <option value="haji dan umrah">Pegawai Haji dan Umrah</option>
                                      <option value="urusan agama">Pegawai Urusan Agama</option>
                                      <option value="penerangan agama">Pegawai Penerangan Agama</option>
                                      <option value="masyarakat kriten">Pegawai Masyarakat Kriten</option>
                                      <option value="masyarakat hindu">Pegawai Masyarakat Hindu</option>
                                      <option value="masyarakat katolik">Pegawai Masyarakat Katolik</option>
                                      <option value="masyarakat budha">Pegawai Masyarakat Budha</option>
                                    </select>
                                  </div>
                                  <input type="hidden" name="tipe">
                                  <button type="submit" class="btn btn-primary mr-1" name="submit">Submit</button>
                                </form>
                              </div>
                            </div>
                          </div>
                  <?php else: ?>
                        akun sudah aktif
                    <?php endif; ?>
                </td>
                </tr>
              <?php
              $no++;
             endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
