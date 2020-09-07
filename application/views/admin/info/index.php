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
                <button type="button" class="btn btn-info mb-2 tombolTambahInfo" data-toggle="modal" data-target="#formInfoModal"><i class="fa fa-plus"></i> Tambah Data Informasi</button>
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
            <h5 class="text-muted">Total <?= $total_rows; ?> Informasi Kampus</h5>
            <?php if($this->input->post('submit')) : ?>
            <h6 class="text-center text-muted">Yang Anda Cari <strong><?= set_value('keyword'); ?></strong></h6>
            <?php endif; ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Informasi Kampus STMIK</h3>
                <div class="card-tools">
                  <form action="<?= base_url('admin/dosen'); ?>" method="post">
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
                      <th>Icon</th>
                      <th>Judul Info</th>
                      <th>Isi</th>
                      <th><i class="fa fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($informasi as $i) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td>
                          <i class="<?= $i['icon']; ?>"></i> 
                          <?= $i['icon']; ?></td>
                        <td><?= $i['judul_info']; ?></td>
                        <td><?= $i['isi_info']; ?></td>
                        <td>
                          <button type="button" class="btn btn-info tombolUbahInfo" data-toggle="modal" data-target="#formInfoModal" data-id="<?= $i['id_info']; ?>"><i class="fa fa-edit"></i></button>
                          <a href="<?= base_url('admin/informasi/hapus/') . $i['id_info']; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?php if(empty($informasi)) : ?>
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
<div class="modal fade" id="formInfoModal" tabindex="-1" aria-labelledby="formInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formInfoModalLabel">Tambah Data Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input type="text" name="id_info" id="id_info">
          <div class="alert alert-info" role="alert"><i class="fa fa-info-circle"></i> Mencari Icon Lainnya <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Fontawesome</a></div>
          <div class="form-group">
            <label for="icon">Icon</label>
            <input type="text" name="icon" id="icon" class="form-control">
            <small class="muted text-danger"><?= form_error('icon'); ?></small>
          </div>
          <div class="form-group">
            <label for="judul">Judul Informasi</label>
            <input type="text" name="judul" id="judul" class="form-control">
            <small class="muted text-danger"><?= form_error('judul'); ?></small>
          </div>
          <div class="form-group">
            <label for="isi">Isi</label>
            <textarea name="isi" id="isi" class="form-control"></textarea>
            <small class="muted text-danger"><?= form_error('isi'); ?></small>
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

