  <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="10000">
      <img src="<?= base_url('assets/img/slide/photo1.png'); ?>" class="d-block w-100">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="<?= base_url('assets/img/slide/photo2.png'); ?>" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('assets/img/slide/photo4.jpg'); ?>" class="d-block w-100">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Tentang Kampus -->
<div class="container">
  <div class="row mt-4">
    <div class="col-md-6">
      <h3 class="text-center">Tentang Kampus</h3>
      <p class="text-muted lead shadow-sm p-3 bg-white rounded"><?= substr($tentang['sejarah'], 0, 295); ?></p>
      <button type="button" class="btn btn-primary mb-2 float-right" data-toggle="modal" data-target="#formTentangModal">Selengkapnya</button>
    </div>
    <div class="col-md-6">
      <img src="<?= base_url('assets/info/stmik.jpg'); ?>" class="img-thumbnail img-fluid shadow bg-white rounded" alt="STMIK AMIK RIAU">
    </div>
  </div>
</div>
<!-- /Tentang Kampus -->

<!-- Modal Tentang Kampus -->
<div class="modal fade" id="formTentangModal" tabindex="-1" aria-labelledby="formTentangModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formTentangModalLabel">Tentang Kampus STMIK AMIK RIAU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Sejarah -->
        <div class="row">
          <div class="col-md">
            <p class="lead text-muted"><?= $tentang['sejarah']; ?></p>
          </div>
        </div>
        <!-- /Sejarah -->
        <div class="row">
          <div class="col-md-6">
            <!-- Visi -->
            <div class="card">
              <div class="card-header bg-primary text-light">
                <h5>Visi</h5>
              </div>
              <div class="card-body">
                <p class="card-text"><?= $tentang['visi']; ?></p>
              </div>
            </div>
            <!-- /Visi -->
          </div>
          <div class="col-md-6">
            <!-- Misi -->
            <div class="card">
              <div class="card-header bg-primary text-light">
                <h5>Misi</h5>
              </div>
              <div class="card-body">
                <p class="card-text"><?= $tentang['misi']; ?></p>
              </div>
            </div>
            <!-- /Misi -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal Tentang Kampus -->


<!-- Informasi Kampus -->
<div class="container">
  <div class="row mt-4">
    <?php foreach($informasi as $i) : ?>
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <span class="display-2 text-center"><i class="<?= $i['icon']; ?>"></i></span>
        <div class="card-body">
          <h5 class="card-title"><?= $i['judul_info']; ?></h5>
          <p class="card-text"><?= $i['isi_info']; ?></p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- /Informasi Kampus -->