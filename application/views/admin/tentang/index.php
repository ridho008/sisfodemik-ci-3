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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tentang Kampus</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Sejarah</th>
                      <th>Visi</th>
                      <th>Misi</th>
                      <th><i class="fa fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($tentang as $t) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= substr($t['sejarah'], 0,50); ?>...</td>
                        <td><?= $t['visi']; ?></td>
                        <td><?= $t['misi']; ?></td>
                        <td>
                          <button type="button" class="btn btn-info tombolUbahTentang" data-toggle="modal" data-target="#formTentangModal" data-id="<?= $t['id_tentang']; ?>"><i class="fa fa-edit"></i></button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?php if(empty($tentang)) : ?>
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
<div class="modal fade" id="formTentangModal" tabindex="-1" aria-labelledby="formTentangModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formTentangModalLabel">Ubah Data Tentang Kampus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input type="text" name="id_tentang" id="id_tentang">
          <div class="form-group">
            <label for="sejarah">Sejarah</label>
            <textarea class="form-control" name="sejarah" id="sejarah"></textarea>
            <small class="muted text-danger"><?= form_error('sejarah'); ?></small>
          </div>
          <div class="form-group">
            <label for="visi">Visi</label>
            <textarea class="form-control" name="visi" id="visi"></textarea>
            <small class="muted text-danger"><?= form_error('visi'); ?></small>
          </div>
          <div class="form-group">
            <label for="misi">Misi</label>
            <textarea class="form-control" name="misi" id="misi"></textarea>
            <small class="muted text-danger"><?= form_error('misi'); ?></small>
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

