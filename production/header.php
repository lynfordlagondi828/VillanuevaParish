
<head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="DataTables/css/dataTables.bootstrap.min.css">  
    </head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Villanueva Parish</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a class="glyphicon glyphicon-home" href="index.php">Home</a></li>
      <li><a href="baptismal.php">Baptismal Certificate</a></li>
      <li><a href="confirmation.php">Confirmation Certificate</a></li>
      <li><a href="death.php">Death Certificate</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="">Welcome <?php echo $_SESSION["email"]; ?></a></li>
      
      <li><a href="../logout.php" onclick="return confirm('logout?');"><span class="glyphicon glyphicon-user"></span> logout</a></li>
      
    </ul>
  </div>
</nav>