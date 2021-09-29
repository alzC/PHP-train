<?php

session_start();
unset($_SESSION['role']);

$title = "Page d'acceuil";


require 'elements/header.php'; ?>
<div class="contain">
  <div class="d-flex justify-content-center align-self-center Title ">
    <h2 class="display-3 p-3 text-center">Welcome to my little<br> <span> Creative Studio</span> </h2>
  </div>
  <div class=" C">
    <span><canvas id=c></canvas></span>
  </div>
</div>




<?php require 'elements/footer.php'; ?>