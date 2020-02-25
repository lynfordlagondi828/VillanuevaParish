<?php
session_start();
    if(!isset($_SESSION["isloggedIN"])){
        header('location:../login.php');
        exit();
    }
   require_once 'header.php';
?>
<html>
  <head>
<body>
  <!-- page content -->
  <div class="container">
    <div align="center">
      <div>
        <img src="dists/logo.jpg" width="100" height="100">
        <h3> Sto. Tomas de Villanueva Parish, Bayawan City</h3>
        
      </div>
        <a class="btn btn-success btn-lg" href="baptismal.php">Baptismal Certificate</a>
        <a class="btn btn-primary btn-lg" href="confirmation.php">Confirmation Certificate</a>
        <a class="btn btn-danger btn-lg" href="death.php">Death Certificate</a>
    </div>
  </div>
</body>
</html>