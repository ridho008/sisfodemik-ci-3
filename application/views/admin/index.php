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
            <div class="jumbotron">
              <h1 class="display-4">Selamat Datang <?= $user['username']; ?>!</h1>
              <p class="lead">Aplikasi website <strong>Sistem Informasi Akademik</strong>.</p>
              <hr class="my-4">
              <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-cogs" aria-hidden="true"></i> Control Panel</button>
            </div>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-cogs" aria-hidden="true"></i> Control Panel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="row text-center">
            <div class="col-lg-3">
              <a href="<?= base_url(); ?>"><i class="fa fa-4x fa-user-graduate"></i> Mahasiswa</a>
            </div>
            <div class="col-lg-3">
              <a href="<?= base_url(); ?>"><i class="fa fa-4x fa-calendar-alt"></i> Tahun Akademik</a>
            </div>
            <div class="col-lg-3">
              <a href="<?= base_url(); ?>"><i class="fa fa-4x fa-edit"></i> KRS</a>
            </div>
            <div class="col-lg-3">
              <a href="<?= base_url(); ?>"><i class="fa fa-4x fa-file-alt"></i> KHS</a>
            </div>
          </div>
          <hr>
          <div class="row text-center mt-4 mb-2">
            <div class="col-lg-3">
              <a href="<?= base_url(); ?>"><i class="fa fa-4x fa-sort-numeric-down"></i> Input Nilai</a>
            </div>
            <div class="col-lg-3">
              <a href="<?= base_url(); ?>"><i class="fa fa-4x fa-print"></i> Cetak Transkrip</a>
            </div>
            <div class="col-lg-3">
              <a href="<?= base_url(); ?>"><i class="fa fa-4x fa-list-ul"></i> Kategori</a>
            </div>
            <div class="col-lg-3">
              <a href="<?= base_url(); ?>"><i class="fa fa-4x fa-bullhorn"></i> Info Kampus</a>
            </div>
          </div>
          <hr>
          <div class="row text-center mt-4 mb-2">
            <div class="col-lg-3">
              <a href="<?= base_url(); ?>"><i class="fa fa-4x fa-id-card-alt"></i> Identitas</a>
            </div>
            <div class="col-lg-3">
              <a href="<?= base_url(); ?>"><i class="fa fa-4x fa-info-circle"></i> Tentang Kampus</a>
            </div>
            <div class="col-lg-3">
              <a href="<?= base_url(); ?>"><i class="fa fa-4x fa-laptop"></i> Fasilitas</a>
            </div>
            <div class="col-lg-3">
              <a href="<?= base_url(); ?>"><i class="fa fa-4x fa-images"></i> Gallery</a>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


      
