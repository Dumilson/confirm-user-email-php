<?php

use App\Classes\Upload;
use App\Controllers\UserController;

use function Composer\Autoload\includeFile;

require_once 'vendor/autoload.php'; ?>
<!doctype html>
<html lang="pt-br">
<head>
    <?php includes('home,meta'); ?>
    <title>Welcome</title>
  </head>
  <body class="text-center">
  <?php includes('home,navbar'); ?>
      <main role="main" class="inner cover">
        <h1 class="cover-heading">Bem vindo ao Min-Code</h1>
        <p class="lead">Min-code é um conjunto de funções e classes que podem ajudar em minis projectos e também para estudos </p>
        <p class="lead">
          <a href="#" class="btn btn-lg btn-secondary">Documentação</a>
        </p>
      </main>
      <?php UserController::store([]); ?>
      <form action="" method="post" enctype="multipart/form-data">
          <input type="file" name="file" id="">
          <button type="submit">Go</button>
      </form>
   <?php includes('home,footer')?>
 </body>
</html>
