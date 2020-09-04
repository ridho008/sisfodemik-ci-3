  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Kartu Rencana Studi</h1>
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
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Update Kartu Rencana Studi</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <form method="post" action="<?= base_url('admin/krs/update_aksi_krs'); ?>">
                      <div class="form-group">
                        <label>Tahun Akademik</label>
                        <input type="text" name="id_tahun_aka" class="form-control" value="<?= $id_tahun_aka; ?>">
                        <small class="muted text-danger"><?= form_error('id_tahun_aka'); ?></small>
                        <input type="text" name="id_krs" class="form-control" value="<?= $id_krs; ?>">

                        <input type="text" name="thn_akad_smt" class="form-control" value="<?= $thn_akad_smt . '/' . $semester ; ?>" readonly>
                        <small class="muted text-danger"><?= form_error('thn_akad_smt'); ?></small>
                      </div>
                      <div class="form-group">
                        <label>NIM Mahasiswa</label>
                        <input type="text" name="nim" class="form-control" value="<?= $nim; ?>" readonly>
                        <small class="muted text-danger"><?= form_error('nim'); ?></small>
                      </div>
                      <div class="form-group">
                        <label>Mata Kuliah</label>
                        <?php 
                        foreach($matakuliah as $dropdown) {
                          $dropDownList[$dropdown->kode_matkul] = $dropdown->nama_matkul;
                        }
                        echo form_dropdown('kode_matkul', $dropDownList, $kode_matkul, 'class="form-control" id="kode_matkul"');
                        ?>
                        <small class="muted text-danger"><?= form_error('kode_matkul'); ?></small>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('admin/krs'); ?>" class="btn btn-danger">Batal</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

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


