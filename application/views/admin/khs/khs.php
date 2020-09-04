  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kartu Hasil Studi (KHS)</h1>
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
                <h3 class="card-title">Kartu Hasil Studi</h3>
              </div>
              <div class="card-body">
                <table>
                  <tr>
                    <th>NIM</th>
                    <td><?= $mhs_nim; ?></td>
                  </tr>
                  <tr>
                    <th>Nama Lengkap</th>
                    <td><?= $mhs_nama; ?></td>
                  </tr>
                  <tr>
                    <th>Program Studi</th>
                    <td><?= $mhs_prodi; ?></td>
                  </tr>
                  <tr>
                    <th>Tahun Akedemik (Semester)</th>
                    <td><?= $thn_akad; ?></td>
                  </tr>
                </table>
                <!-- Table -->
                <div class="row">
                  <div class="col-md-6">
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
                    <th>Nilai</th>
                    <th>Skor</th>
                  </tr>
                  <?php $jmlNilai = 0; $jumlahSks = 0; $no = 1; foreach($mhs_data as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row->kode_matkul; ?></td>
                      <td><?= $row->nama_matkul; ?></td>
                      <td><?= $row->sks; ?></td>
                      <td><?= $row->nilai; ?></td>
                      <td><?= skorNilai($row->nilai, $row->sks); ?></td>
                      <?php 
                      $jumlahSks += $row->sks;
                      $jmlNilai += skorNilai($row->nilai, $row->sks);
                      ?>
                    </tr>
                  <?php endforeach; ?>
                    <tr>
                      <td colspan="3">Jumlah</td>
                      <td><?= $jumlahSks; ?></td>
                      <td><?= $jmlNilai; ?></td>
                    </tr>
                </table>
                Index Prestasi : <?= number_format($jmlNilai / $jumlahSks, 2); ?>
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


