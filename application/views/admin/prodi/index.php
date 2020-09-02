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
                <button type="button" class="btn btn-info mb-2 tombolTambahProdi" data-toggle="modal" data-target="#formProdiModal"><i class="fa fa-plus"></i> Tambah Data Prodi</button>
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Program Studi</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Prodi</th>
                      <th>Nama Prodi</th>
                      <th>Nama Jurusan</th>
                      <th><i class="fa fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($prodi as $p) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $p['kode_prodi']; ?></td>
                        <td><?= $p['nama_prodi']; ?></td>
                        <td><?= $p['nama_jurusan']; ?></td>
                        <td>
                          <button type="button" class="btn btn-info tombolUbahProdi" data-toggle="modal" data-target="#formProdiModal" data-id="<?= $p['id_prodi']; ?>"><i class="fa fa-edit"></i></button>
                          <a href="<?= base_url('admin/prodi/hapus/') . $p['id_prodi']; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

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
<div class="modal fade" id="formProdiModal" tabindex="-1" aria-labelledby="formProdiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formProdiModalLabel">Tambah Data Prodi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input type="text" name="id_prodi" id="id_prodi">
          <div class="form-group">
            <label for="kode_prodi">Kode Prodi</label>
            <input type="text" name="kode_prodi" id="kode_prodi" class="form-control">
            <small class="muted text-danger"><?= form_error('kode_prodi'); ?></small>
          </div>
          <div class="form-group">
            <label for="nama_prodi">Nama Prodi</label>
            <input type="text" name="nama_prodi" id="nama_prodi" class="form-control">
            <small class="muted text-danger"><?= form_error('nama_prodi'); ?></small>
          </div>
          <div class="form-group">
            <label for="nama_jurusan">Nama Jurusan</label>
            <select name="nama_jurusan" id="nama_jurusan" class="form-control">
              <option value="">-- Pilih Prodi --</option>
              <?php foreach($jurusan as $j) : ?>
                <option value="<?= $j['id_jurusan']; ?>"><?= $j['nama_jurusan']; ?></option>
              <?php endforeach; ?>
            </select>
            <small class="muted text-danger"><?= form_error('nama_jurusan'); ?></small>
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

