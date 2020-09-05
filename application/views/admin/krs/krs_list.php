  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kartu Rencana Studi</h1>
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
                <h3 class="card-title">Kartu Rencana Studi <strong><?= $nama_lengkap; ?></strong></h3>
              </div>
              <div class="card-body">
                <table>
                  <tr>
                    <th>NIM</th>
                    <td><?= $nim; ?></td>
                  </tr>
                  <tr>
                    <th>Nama Lengkap</th>
                    <td><?= $nama_lengkap; ?></td>
                  </tr>
                  <tr>
                    <th>Program Studi</th>
                    <td><?= $prodi; ?></td>
                  </tr>
                  <tr>
                    <th>Tahun Akedemik (Semester)</th>
                    <td><?= $tahun_aka . '/' . $semester; ?></td>
                  </tr>
                </table>
                <!-- Table -->
                <div class="row">
                  <div class="col-md-6">
                    <a href="<?= base_url('admin/krs/tambah/') . $nim . '/' . $id_tahun_aka; ?>" class="btn btn-info mb-2"><i class="fa fa-plus"></i> Tambah Data KRS</a>
                    <a href="<?= base_url('admin/krs/print/'); ?>" class="btn btn-outline-secondary mt-2 mb-3"><i class="fa fa-print"></i></a>
                  </div>
                </div>
                <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>No</th>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>SKS</th>
                    <th><i class="fa fa-cogs"></i></th>
                  </tr>
                  <?php $jumlahSks = 0; $no = 1; foreach($krs_data as $krs) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $krs->kode_matkul; ?></td>
                      <td><?= $krs->nama_matkul; ?></td>
                      <td>
                        <?= 
                        $krs->sks;
                        $jumlahSks += $krs->sks;
                        ?>
                      </td>
                      <td>
                        <a href="<?= base_url('admin/krs/update/') . $krs->id_krs; ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <a href="<?= base_url('admin/krs/hapus/') . $krs->id_krs; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                    <tr>
                      <td colspan="3">Jumlah SKS</td>
                      <td colspan="3"><?= $jumlahSks; ?></td>
                    </tr>
                </table>
                <?php if(empty($krs_data)) : ?>
                  <div class="alert alert-danger" role="alert"><strong><?= $nama_lengkap; ?></strong> Belum Menambahkan/Memilih Data Mata Kuliah (KRS).</div>
                <?php endif; ?>
                </div>
                <!-- /Table -->
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


