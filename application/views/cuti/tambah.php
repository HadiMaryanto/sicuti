<div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4>Ajukan Cuti</h4>
        </div>
        <form class="needs-validation" action="<?php echo base_url('cuti/tambah') ?>" method="post" novalidate="">
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
            <label>Jenis Cuti</label>
            <select class="form-control" name="jeniscuti" tabindex="3">
              <option selected disabled>pilih</option>
              <option value="Cuti Tahunan">Cuti Tahunan</option>
              <option value="Cuti Besar">Cuti Besar</option>
              <option value="Cuti Sakit">Cuti Sakit</option>
              <option value="Cuti Melahirkan">Cuti Melahirkan</option>
              <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
              <option value="Cuti di Luar Tanggungan Negara">Cuti di Luar Tanggungan Negara</option>
            </select>
            <div class="invalid-feedback">
              jenis cuti tidak boleh kosong
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal Mulai - Tanggal Selesai</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-calendar"></i>
                </div>
              </div>
              <input type="text" class="form-control daterange-cus" name="tgl">
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
            <label>Alasan Cuti</label>
            <textarea class="form-control" name="alasancuti" tabindex="6" required></textarea>
            <div class="invalid-feedback">
              Alasan Cuti tidak boleh kosong
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
