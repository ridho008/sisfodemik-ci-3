<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <?php foreach($identitas as $i) : ?>
    <title><?=  $i['nama_web'] . " | " . $judul; ?></title>
    <?php endforeach; ?>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="<?= base_url('assets/css/mystyle.css'); ?>">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/assets_theme/plugins/fontawesome-free/css/all.min.css">
  </head>
  <body>

  <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
    <div class="container">
  <?php foreach($identitas as $i) : ?>
  <a class="navbar-brand" href="#"><?= $i['nama_web']; ?></a>
  <?php endforeach; ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Informasi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Fasilitas</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="#">Tentang Kampus</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Kontak</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Geleri</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  </div>
</nav>