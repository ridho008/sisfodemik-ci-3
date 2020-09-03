  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg">
            <div class="row">
              <div class="col-md-6">
                <button type="button" class="btn btn-info mb-2 tombolTambahMahasiswa" data-toggle="modal" data-target="#formMahasiswaModal"><i class="fa fa-plus"></i> Tambah Data Mahasiswa</button>
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
            <h5 class="text-muted">Total <?= $total_rows; ?> Mahasiswa</h5>
            <?php if($this->input->post('submit')) : ?>
            <h6 class="text-center text-muted">Yang Anda Cari <strong><?= set_value('keyword'); ?></strong></h6>
            <?php endif; ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Mahasiswa</h3>
                <div class="card-tools">
                  <form action="<?= base_url('admin/mahasiswa'); ?>" method="post">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="keyword" class="form-control float-right" placeholder="Cari">

                    <div class="input-group-append">
                      <input type="submit" name="submit" class="btn btn-default" value="Cari">
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Foto</th>
                      <th>Nama Mahasiswa</th>
                      <th>Email</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Telepon</th>
                      <th>Kelamin</th>
                      <th>Alamat</th>
                      <th>Nama Prodi</th>
                      <th><i class="fa fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($mahasiswa as $m) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $m['nim']; ?></td>
                        <td>
                          <img src="<?= base_url('assets/img/foto_mahasiswa/') . $m['foto']; ?>" alt="<?= $m['nama_lengkap']; ?>" width="100">
                        </td>
                        <td><?= $m['nama_lengkap']; ?></td>
                        <td><?= $m['email']; ?></td>
                        <td><?= $m['tmp_lahir']; ?></td>
                        <td><?= date('d-m-Y', strtotime($m['tgl_lahir'])); ?></td>
                        <td><?= $m['telepon']; ?></td>
                        <td><?= $m['kelamin'] == 'L' ? 'Pria' : 'Perempuan'; ?></td>
                        <td><?= $m['alamat']; ?></td>
                        <td><?= $m['nama_prodi']; ?></td>
                        <td>
                          <button type="button" class="btn btn-info tombolUbahMahasiswa" data-toggle="modal" data-target="#formMahasiswaModal" data-id="<?= $m['id_mahasiswa']; ?>"><i class="fa fa-edit"></i></button>
                          <a href="<?= base_url('admin/mahasiswa/hapus/') . $m['id_mahasiswa']; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?php if(empty($mahasiswa)) : ?>
                  <div class="alert alert-danger" role="alert">Data tidak ditemukan.</div>
                <?php endif; ?>
              </div>
              <!-- /.card-body -->
            </div>
              <!-- Pagination -->
              <div class="row">
                <div class="col-md-4 offset-md-10">
                  <?= $this->pagination->create_links(); ?>
                </div>
              </div>
              <!-- /Pagination -->

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->





<!-- Modal -->
<div class="modal fade" id="formMahasiswaModal" tabindex="-1" aria-labelledby="formMahasiswaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formMahasiswaModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_mahasiswa" id="id_mahasiswa">
          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="number" name="nim" id="nim" class="form-control">
            <small class="muted text-danger"><?= form_error('nim'); ?></small>
          </div>
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control">
            <small class="muted text-danger"><?= form_error('nama'); ?></small>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
            <small class="muted text-danger"><?= form_error('email'); ?></small>
          </div>
          <div class="form-group">
            <label for="tmp_lahir">Tempat Lahir</label>
            <textarea name="tmp_lahir" id="tmp_lahir" class="form-control"></textarea>
            <small class="muted text-danger"><?= form_error('tmp_lahir'); ?></small>
          </div>
          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
            <small class="muted text-danger"><?= form_error('tgl_lahir'); ?></small>
          </div>
          <div class="form-group">
            <label for="kelamin">Jenis Kelamin</label>
            <select name="kelamin" id="kelamin" class="form-control">
              <option value="">-- Pilih Jenis Kelamin --</option>
              <option value="L">Pria</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="number" name="telepon" id="telepon" class="form-control">
            <small class="muted text-danger"><?= form_error('telepon'); ?></small>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control"></textarea>
            <small class="muted text-danger"><?= form_error('alamat'); ?></small>
          </div>
          <div class="form-group">
            <label for="nama_prodi">Nama Prodi</label>
            <select name="nama_prodi" id="nama_prodi" class="form-control">
              <option value="">-- Pilih Prodi --</option>
              <?php foreach($prodi as $p) : ?>
                <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
              <?php endforeach; ?>
            </select>
            <small class="muted text-danger"><?= form_error('nama_prodi'); ?></small>
          </div>
          <div class="form-group">
            <label for="foto">Foto</label><br>
            <img src="" width="80" id="tampilFoto">
            <input type="file" name="foto" id="foto" class="form-control-file">
            <input type="hidden" name="fotoLama" id="fotoLama">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

