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
    <h4>Tabel Jabatan</h4>
  </div>
  <div class="card-body">
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</a><hr>
    <div class="table-responsive">
      <table class="table table-bordered" id="table-1">
        <thead>
          <tr>
           <th>No</th>
           <th>Jabatan</th>
           <th>aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($jabatan as $key => $value): ?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php echo $value['jabatan_nama'] ?></td>
              <td>
                <a href="<?php echo base_url("jabatan/edit/".$value['jabatan_id']); ?>" class="btn btn-success">Edit</a>
                                <a href="<?php echo base_url('jabatan/delete/'.$value['jabatan_id']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          <?php
          $no++;
         endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

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
        <form class="needs-validation" novalidate="" action="<?php echo base_url('jabatan/tambah') ?>" method="post">
          <div class="form-group">
            <label>Jabatan</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-user"></i>
                </div>
              </div>
              <select class="form-control" name="jabatan">
                <option disabled selected>- Pilih -</option>
                <option value="kepala">kepala</option>
                <option value="Kepala Kantor Kementerian Agama Kabupaten Bengkalis">Kepala Kantor Kementerian Agama Kabupaten Bengkalis</option>
                <option value="Kepala Kantor Kementerian Agama Kabupaten Indragiri Hilir">Kepala Kantor Kementerian Agama Kabupaten Indragiri Hilir</option>
                <option value="Kepala Kantor Kementerian Agama Kabupaten Indragiri Hulu">Kepala Kantor Kementerian Agama Kabupaten Indragiri Hulu</option>
                <option value="Kepala Sub Bagian Perencanaan dan Keuangan">Kepala Sub Bagian Perencanaan dan Keuangan</option>
                <option value="Analis Laporan Realisasi Anggaran">Analis Laporan Realisasi Anggaran</option>
                <option value="Kepala Sub Bagian Organisasi, Tata Laksana, dan Kepegawaian">Kepala Sub Bagian Organisasi, Tata Laksana, dan Kepegawaian</option>
                <option value="Analis Kepegawaian Madya">Analis Kepegawaian Madya</option>
                <option value="Kepala Sub Bagian Informasi dan Hubungan Masyarakat">Kepala Sub Bagian Informasi dan Hubungan Masyarakat</option>
                <option value="Pranata Humas Muda">Pranata Humas Muda</option>
                <option value="Kepala Sub Bagian Umum">Kepala Sub Bagian Umum</option>
                <option value="Pengembang Sarana dan Prasarana">Pengembang Sarana dan Prasarana</option>
                <option value="Kepala Bidang Pendidikan Madrasah">Kepala Bidang Pendidikan Madrasah</option>
                <option value="Perencana Pertama">Perencana Pertama</option>
                <option value="Kepala Bidang Pendidikan Agama dan Keagamaan Islam">Kepala Bidang Pendidikan Agama dan Keagamaan Islam</option>
                <option value="Analis Data Dan Informasi Pendidik Dan Tenaga Kependidikan">Analis Data Dan Informasi Pendidik Dan Tenaga Kependidikan</option>
                <option value="Kepala Bidang Penyelenggaraan Haji dan Umrah">Kepala Bidang Penyelenggaraan Haji dan Umrah</option>
                <option value="Pranata Komputer Muda">Pranata Komputer Muda</option>
                <option value="Kepala Bidang Urusan Agama Islam dan Pembinaan Syariah">Kepala Bidang Urusan Agama Islam dan Pembinaan Syariah</option>
                <option value="Penyusun Bahan Hisab Rukyat">Penyusun Bahan Hisab Rukyat</option>
                <option value="Kepala Bidang Penerangan Agama Islam, Zakat dan Wakaf">Kepala Bidang Penerangan Agama Islam, Zakat dan Wakaf</option>
                <option value="Pranata Komputer Muda">Pranata Komputer Muda</option>
                <option value="Pembimbing Masyarakat Kristen">Pembimbing Masyarakat Kristen</option>
                <option value="Pengevaluasi Tenaga Kependidikan">Pengevaluasi Tenaga Kependidikan</option>
              </select>
              <div class="invalid-feedback">
                Field tidak boleh kosong
              </div>
            </div>
          </div>
          <input type="hidden" name="tipe">
          <button type="submit" class="btn btn-primary mr-1" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
