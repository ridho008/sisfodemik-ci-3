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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Transkrip Nilai</h3><br>
                <div class="row">
                  <div class="col-lg-6">
                    <form method="post" action="<?= base_url('admin/transkrip_nilai/transkrip_aksi'); ?>">
                      <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukan nim mahasiswa">
                        <small class="muted text-danger"><?= form_error('nim'); ?></small>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Proses</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              
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


