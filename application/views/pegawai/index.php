<div class="col-12">
<?php if ($this->session->flashdata('alert') == 'berhasil_tambah') { ?>
      <div class="alert alert-primary alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
          <span>&times;</span>
          </button>
          Berhasil Menambah Data
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
        <h4>Data Pegawai</h4>
      </div>
      <div class="card-body">
        <a href="<?php echo base_url('pegawai/tambah')  ?>" class="btn btn-primary">Tambah</a><hr>
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
                <th>Gol</th>
                <th>Unit Kerja</th>
                <th>TMT</th>
                <th>Masa kerja</th>
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
                  <td><?php echo $value['pegawai_TMT'] ?></td>
                  <?php $awal = new DateTime($value['pegawai_TMT']);
                    $akhir = new DateTime();
                    $diff = $awal->diff($akhir);
                   ?>
                   <td><?php echo $diff->y . ' tahun, '; echo $diff->m . ' bulan, '; echo $diff->d .' hari '; ?></td>
                  <td><?php echo $value['pegawai_nohp'] ?></td>
                  <td><?php echo $value['pegawai_alamat'] ?></td>
                  <td>
                  <a href="<?php echo base_url("pegawai/edit/".$value['pegawai_id']); ?>" class="btn btn-success">Edit</a>
                  <a href="<?php echo base_url('pegawai/delete/'.$value['pegawai_id']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                </td>
                </tr>
              <?php
              $no++;
             endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
