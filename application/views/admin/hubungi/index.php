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
                <?php if(validation_errors()) : ?>
                  <div class="alert alert-danger" role="alert"><i class="fa fa-info-circle"></i> <?= validation_errors(); ?></div>
                <?php endif; ?>
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
            <h5 class="text-muted">Total <?= $total_rows; ?> Pesan</h5>
            <?php if($this->input->post('submit')) : ?>
            <h6 class="text-center text-muted">Yang Anda Cari <strong><?= set_value('keyword'); ?></strong></h6>
            <?php endif; ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pesan Dari Pengguna</h3>
                <div class="card-tools">
                  <form action="<?= base_url('admin/identitas'); ?>" method="post">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="keyword" class="form-control float-right" placeholder="Cari" autofocus="on" autocomplete="off">

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
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Pesan</th>
                      <th><i class="fa fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($hubungi as $i) : ?>
                      <tr>
                        <td><?= ++$start; ?></td>
                        <td><?= $i['nama']; ?></td>
                        <td><?= $i['email']; ?></td>
                        <td><?= $i['pesan']; ?></td>
                        <td>
                          <button type="button" class="btn btn-info tombolUbahIdentitas" data-toggle="modal" data-target="#formIdentitasModal" data-id="<?= $i['id_hubungi']; ?>"><i class="fa fa-edit"></i></button>
                          <a href="<?= base_url('admin/hubungi/hapus/') . $i['id_hubungi']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?php if(empty($hubungi)) : ?>
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
<div class="modal fade" id="formIdentitasModal" tabindex="-1" aria-labelledby="formIdentitasModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formIdentitasModalLabel">Ubah Data Identias Web</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input type="hidden" name="id_identitas" id="id_identitas">
          <div class="form-group">
            <label for="nama">Judul Website</label>
            <input type="text" name="nama" id="nama" class="form-control">
            <small class="muted text-danger"><?= form_error('nama'); ?></small>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control"></textarea>
            <small class="muted text-danger"><?= form_error('alamat'); ?></small>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
            <small class="muted text-danger"><?= form_error('email'); ?></small>
          </div>
          <div class="form-group">
            <label for="telepon">telepon</label>
            <input type="number" name="telepon" id="telepon" class="form-control">
            <small class="muted text-danger"><?= form_error('telepon'); ?></small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

