<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'menu_function.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'auth.php';
?>
<!Doctype html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>
    <?php if (isset($title)) : ?>
      <?php echo $title; ?>
    <?php else : ?>
      Mon Site
    <?php endif ?>
  </title>
  <link rel="icon" type="image/png" sizes="16x16" href="image site/CD.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark mb-4 colors">
    <a class="navbar-brand Title" href="#">C-Design</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <?php
        $class = 'nav-link';
        require 'elements/menu.php'; ?>
      </ul>
      <ul class="navbar-nav">
        <?php if (est_connecte()) : ?>
          <li class="nav-item"><a href="/logout.php" class="nav-link">Se déconnecter</a></li>
        <?php endif ?>
      </ul>

    </div>
  </nav>

  <main role="main">