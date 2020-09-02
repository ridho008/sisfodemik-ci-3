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
                <button type="button" class="btn btn-info mb-2 tombolTambahMatkul" data-toggle="modal" data-target="#formMatkulModal"><i class="fa fa-plus"></i> Tambah Data Matkul</button>
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
            <h5 class="text-muted">Total <?= $total_rows; ?> Mata Kuliah</h5>
            <?php if($this->input->post('submit')) : ?>
            <h6 class="text-center text-muted">Yang Anda Cari <strong><?= set_value('keyword'); ?></strong></h6>
            <?php endif; ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Mata Kuliah</h3>
                <div class="card-tools">
                  <form action="<?= base_url('admin/matkul'); ?>" method="post">
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
                      <th>Kode Matkul</th>
                      <th>Nama Matkul</th>
                      <th>Program Studi</th>
                      <th><i class="fa fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($matkul as $m) : ?>
                      <tr>
                        <td><?= ++$start; ?></td>
                        <td><?= $m['kode_matkul']; ?></td>
                        <td><?= $m['nama_matkul']; ?></td>
                        <td><?= $m['nama_prodi']; ?></td>
                        <td>
                          <button type="button" class="btn btn-primary tombolDetailMatkul" data-toggle="modal" data-target="#formMatkulDetailModal" data-id="<?= $m['kode_matkul']; ?>"><i class="fa fa-eye"></i></button>
                          <button type="button" class="btn btn-info tombolUbahMatkul" data-toggle="modal" data-target="#formMatkulModal" data-id="<?= $m['kode_matkul']; ?>"><i class="fa fa-edit"></i></button>
                          <a href="<?= base_url('admin/matkul/hapus/') . $m['kode_matkul']; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?php if(empty($matkul)) : ?>
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
<div class="modal fade" id="formMatkulModal" tabindex="-1" aria-labelledby="formMatkulModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formMatkulModalLabel">Tambah Data Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="kode_matkul">Kode Matkul</label>
            <input type="text" name="kode_matkul" value="MKK<?= sprintf("%02s", $kode); ?>" id="kode_matkul" class="form-control" readonly>
            <small class="muted text-danger"><?= form_error('kode_matkul'); ?></small>
          </div>
          <div class="form-group">
            <label for="nama_matkul">Nama Matkul</label>
            <input type="text" name="nama_matkul" id="nama_matkul" class="form-control">
            <small class="muted text-danger"><?= form_error('nama_matkul'); ?></small>
          </div>
          <div class="form-group">
            <label for="sks">SKS</label>
            <select name="sks" id="sks" class="form-control">
              <option value="">-- Pilih SKS --</option>
              <?php for($i = 1; $i <= 6; $i++) : ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
              <?php endfor; ?>
            </select>
            <small class="muted text-danger"><?= form_error('sks'); ?></small>
          </div>
          <div class="form-group">
            <label for="semester">Semester</label>
            <select name="semester" id="semester" class="form-control">
              <option value="">-- Pilih Semester --</option>
              <?php for($i = 1; $i <= 8; $i++) : ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
              <?php endfor; ?>
            </select>
            <small class="muted text-danger"><?= form_error('semester'); ?></small>
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
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="formMatkulDetailModal" tabindex="-1" aria-labelledby="formMatkulDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formMatkulDetailModalLabel">Detail Data Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <tr id="kode_matkul">
              <th>Kode Mata Kuliah</th>
              <td></td>
            </tr>
            <tr id="nama_matkul">
              <th>Kode Mata Kuliah</th>
              <td></td>
            </tr>
            <tr id="sks">
              <th>SKS</th>
              <td></td>
            </tr>
            <tr id="semester">
              <th>Kode Mata Kuliah</th>
              <td></td>
            </tr>
            <tr id="nama_prodi">
              <th>Nama Program Studi</th>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

