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
                  <div class="col-lg">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <tr>
                          <th>NIM</th>
                          <!-- <td><?= var_dump($krsnim); ?></td> -->
                          <td><?= $mhs->nim; ?></td>
                        </tr>
                        <tr>
                          <th>Nama</th>
                          <!-- <?php var_dump($mhs); ?> -->
                          <td><?= $mhs->nama_lengkap; ?></td>
                        </tr>
                        <tr>
                          <th>Program Studi</th>
                          <td><?= $mhs->nama_prodi; ?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <tr>
                          <th>No</th>
                          <th>Kode Mata Kuliah</th>
                          <th>Nama Mata Kuliah</th>
                          <th>SKS</th>
                          <th>Nilai</th>
                          <th>Skor</th>
                        </tr>
                        <?php $no = 1; $jmlSks = 0; $jmlSkor = 0; foreach($transkrip as $t) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $t->kode_matkul; ?></td>
                          <td><?= $t->nama_matkul; ?></td>
                          <td><?= $t->sks; ?></td>
                          <td><?= $t->nilai; ?></td>
                          <td><?= skorNilai($t->nilai, $t->sks); ?></td>
                          <?php 
                          $jmlSks += $t->sks;
                          $jmlSkor += skorNilai($t->nilai, $t->sks)
                          ?>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                          <td colspan="3">Jumlah</td>
                          <td><?= $jmlSks; ?></td>
                          <td><?= $jmlSkor; ?></td>
                        </tr>
                      </table>
                      <?php if(!empty($transkrip)) : ?>
                      <p>Index Prestasi Kumulatif : <?= number_format($jmlSkor / $jmlSks, 2); ?></p>
                      <?php else : ?>
                        <div class="alert alert-danger" role="alert">Anda belum menginputankan krs untuk mahasiswa <strong><?= $mhs->nama_lengkap; ?></strong></div>
                      <?php endif; ?>
                    </div>
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


