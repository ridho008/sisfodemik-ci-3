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
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Nilai Mahasiswa</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md">
                    <table>
                      <tr>
                        <th>Kode Mata Kuliah</th>
                        <td><?= $krs->kode_matkul; ?></td>
                      </tr>
                      <tr>
                        <th>Nama Mata Kuliah</th>
                        <td><?= $krs->nama_matkul; ?></td>
                      </tr>
                      <tr>
                        <th>SKS</th>
                        <td><?= $krs->sks; ?></td>
                      </tr>
                      <tr>
                        <th>Tahun Akademik</th>
                        <td><?= $krs->tahun_aka . " / " . $krs->semester; ?></td>
                      </tr>
                    </table>

                    <div class="table-responsive">
                        <table class="table table-hover mt-4">
                          <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nilai</th>
                          </tr>
                          <?php $no = 1; foreach($krsall as $k) : ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $k->nim; ?></td>
                              <td><?= $k->nama_lengkap; ?></td>
                              <td><?= $k->nilai; ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>
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

