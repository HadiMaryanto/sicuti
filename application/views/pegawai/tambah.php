<div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Pegawai</h4>
                  </div>
                  <form class="needs-validation" action="<?php echo base_url('pegawai/tambah') ?>" method="post" novalidate="">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nip">NIP</label>
                      <input id="nip" type="text" class="form-control" name="nip" required tabindex="1">
                      <div class="invalid-feedback">
                        NIP tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Pegawai</label>
                      <input type="text" class="form-control" name="namapegawai" tabindex="2" required>
                      <div class="invalid-feedback">
                        Nama Pegawai tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <select class="form-control" name="jabatan" tabindex="3">
                        <option selected disabled>pilih</option>
                        <?php foreach ($jabatan as $key => $value): ?>
                          <option value="<?php echo $value['jabatan_id']; ?>"><?php echo $value['jabatan_nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback">
                        jabatan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Unit Kerja</label>
                      <select class="form-control" name="unit" tabindex="3">
                        <option selected disabled>pilih</option>
                        <?php foreach ($unit as $key => $value): ?>
                          <option value="<?php echo $value['unit_id']; ?>"><?php echo $value['unit_kerja']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback">
                        unit kerja tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Golongan</label>
                      <select class="form-control" name="golongan" required>
                        <option disabled selected>pilih</option>
                        <option value="IV/e"> IV/e</option>
                        <option value="IV/d"> IV/d</option>
                        <option value="IV/c"> IV/c</option>
                        <option value="IV/b"> IV/b</option>
                        <option value="IV/a"> IV/a</option>
                        <option value="III/e"> III/e</option>
                        <option value="III/d"> III/d</option>
                        <option value="III/c"> III/c</option>
                        <option value="III/b"> III/b</option>
                        <option value="III/a"> III/a</option>
                        <option value="II/e">II/e</option>
                        <option value="II/d">II/d</option>
                        <option value="II/c">II/c</option>
                        <option value="II/b">II/b</option>
                        <option value="II/a">II/a</option>
                        <option value="I/e">I/e</option>
                        <option value="I/d">I/d</option>
                        <option value="I/c">I/c</option>
                        <option value="I/b">I/b</option>
                        <option value="I/a">I/a</option>
                      </select>
                      <div class="invalid-feedback">
                        Golongan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>No HP</label>
                      <input type="text" class="form-control" name="nohp" required tabindex="5">
                      <div class="invalid-feedback">
                         No HP tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>TMT</label>
                      <input type="date" class="form-control" name="tmt" required tabindex="5">
                      <div class="invalid-feedback">
                         TMT tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat" tabindex="6" required></textarea>
                      <div class="invalid-feedback">
                        alamat tidak boleh kosong
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
