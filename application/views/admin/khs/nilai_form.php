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
                <h3 class="card-title">Formulir Nilai AKhir</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md">
                    <table>
                      <tr>
                        <th>Kode Mata Kuliah</th>
                        <td><?= $kode_matkul; ?></td>
                      </tr>
                      <tr>
                        <th>Nama Mata Kuliah</th>
                        <td><?= $matkul['nama_matkul']; ?></td>
                      </tr>
                      <tr>
                        <th>SKS</th>
                        <td><?= $matkul['sks']; ?></td>
                      </tr>
                      <tr>
                        <th>Tahun Akademik</th>
                        <td><?= $tahun_aka->tahun_aka; ?></td>
                      </tr>
                    </table>

                    <form action="<?= base_url('admin/khs/simpan_nilai/') . $kode_matkul; ?>" method="post">
                      <div class="table-responsive">
                        <table class="table table-hover mt-4">
                          <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nilai</th>
                          </tr>
                          <?php $no = 1; foreach($list_nilai as $row) : ?>
                          <tr>
                            <td width="25"><?= $no++; ?></td>
                            <td><?= $row->nim ?></td>
                            <td><?= $row->nama_lengkap ?></td>
                            <input type="hidden" name="id_krs[]" value="<?= $row->id_krs; ?>">
                            <td width="25">
                              <input type="text" name="nilai[]" value="<?= $row->nilai; ?>" class="form-control">
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </table>
                        <?php if(empty($list_nilai)) : ?>
                          <div class="alert alert-danger" role="alert">Data kode <strong><?= set_value('kode_matkul'); ?></strong> tidak ditemukan.</div>
                        <?php endif; ?>
                      </div>
                        <div class="row">
                          <div class="col-md-6">
                            <?php if(empty($list_nilai)) : ?>
                              <p>Lakukan Tambah Data KRS NIM Mahasiswa Pada Tahun Akademik <strong><?= $tahun_aka->tahun_aka . "/" . $tahun_aka->semester; ?></strong></p>
                              <a href="<?= base_url('admin/khs/input_nilai'); ?>" class="btn btn-outline-dark">Kembali</a>
                              <?php else : ?>
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                              <a href="<?= base_url('admin/khs/input_nilai'); ?>" class="btn btn-outline-dark">Kembali</a>
                            </div>
                            <?php endif; ?>
                          </div>
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

