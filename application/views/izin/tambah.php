<?php
date_default_timezone_set('Asia/Jakarta');
$jam = date('H:i');
 // var_dump($jam);die;
 ?>
<div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4>Ajukan Izin</h4>
        </div>
        <form class="needs-validation" action="<?php echo base_url('izin/tambah') ?>" method="post" novalidate="">
        <div class="card-body">
          <!-- <?php var_dump($this->session->userdata('user_pegawai_id')) ?> -->
          <div class="form-group">
            <label>Nama Pegawai</label>
            <select class="form-control" name="pegawai">
              <option value="<?php echo $this->session->userdata('user_pegawai_id') ?>"><?php echo $this->session->userdata('pegawai_nama') ?></option>
            </select>
            <div class="invalid-feedback">
              Nama Pegawai tidak boleh kosong
            </div>
          </div>
          <div class="form-group">
            <label>Jenis Izin</label>
            <select class="form-control" name="jenisizin" tabindex="3">
              <option selected disabled>pilih</option>
              <option value="Tidak Hadir">Tidak Hadir</option>
              <option value="Terlambat Masuk Kerja">Terlambat Masuk Kerja</option>
              <option value="Pulang Sebelum Waktunya">Pulang Sebelum Waktunya</option>
              <option value="Tidak Berada di Tempat Tugas">Tidak Berada di Tempat Tugas</option>
              <option value="Tidak Mengisi Daftar Hadir Masuk">Tidak Mengisi Daftar Hadir Masuk</option>
              <option value="Tidak Mengisi Daftar Hadir Pulang">Tidak Mengisi Daftar Hadir Pulang</option>
            </select>
            <div class="invalid-feedback">
              jenis izin tidak boleh kosong
            </div>
          </div>
          <div class="form-group">
            <label>Jam Mulai</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-calendar"></i>
                </div>
              </div>
              <input type="time" class="form-control" name="jamMulai" value="<?php echo $jam; ?>">
            </div>
          </div>
          <div class="form-group">
            <label>Jam Selesai</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-calendar"></i>
                </div>
              </div>
              <input type="time" class="form-control" name="jamSelesai">
            </div>
          </div>
          <!-- <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" class="form-control" name="tglmulai" required tabindex="5">
            <div class="invalid-feedback">
               Tanggal Mulai tidak boleh kosong
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" class="form-control" name="tglselesai" required tabindex="5">
            <div class="invalid-feedback">
               Tanggal Selesai tidak boleh kosong
            </div>
          </div> -->
          <div class="form-group">
            <label>Perihal</label>
            <textarea class="form-control" name="perihal" tabindex="6" required></textarea>
            <div class="invalid-feedback">
              Alasan Izin tidak boleh kosong
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary mr-1" type="submit" name="simpan">Submit</button>
          <button class="btn btn-secondary" type="reset">Reset</button>
        </div>
        </form>
      </div>
    </div>
