<div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Pegawai</h4>
                  </div>
                  <form class="needs-validation" action="<?php echo base_url('pegawai/edit/'.$row['pegawai_id']) ?>" method="post" novalidate="">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nip">NIP</label>
                      <input id="nip" type="text" class="form-control" name="nip" required tabindex="1" value="<?php echo $row['pegawai_nip'] ?>">
                      <div class="invalid-feedback">
                        NIP tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Pegawai</label>
                      <input type="text" class="form-control" name="namapegawai" tabindex="2" required value="<?php echo $row['pegawai_nama'] ?>">
                      <div class="invalid-feedback">
                        Nama Pegawai tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                        <input type="text" name="jabatan" value="<?php echo $row['jabatan_nama'] ?>" disabled class="form-control">
                      <div class="invalid-feedback">
                        jabatan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Unit Kerja</label>
                        <input type="text" name="unit" value="<?php echo $row['unit_kerja'] ?>" disabled class="form-control">
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
                      <input type="text" class="form-control" name="nohp" required tabindex="5" value="<?php echo $row['pegawai_nohp'] ?>" >
                      <div class="invalid-feedback">
                         No HP tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>TMT</label>
                      <input type="date" class="form-control" name="tmt" required tabindex="5" value="<?php echo $row['pegawai_TMT'] ?>" >
                      <div class="invalid-feedback">
                         TMT tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" name="alamat" required tabindex="6" value="<?php echo $row['pegawai_alamat'] ?>" >
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
