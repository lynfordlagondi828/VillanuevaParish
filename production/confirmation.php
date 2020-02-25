<?php
session_start();
    if(!isset($_SESSION["isloggedIN"])){
        header('location:../login.php');
        exit();
    }
  require_once 'header.php';
?>
<html>
    

<body>
  <!-- page content -->
  <div class="container">
  
      <h3>Confirmation Certificate</h3>
        <a href="add-confirmation-form.php" class="btn btn-success btn-sm">
          <span class="glyphicon glyphicon-plus"></span> Add
        </a>
        <hr>

        <table id="table" class="table table-responsive table-bordered">
            <thead>    
                <tr>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Name of Father</th>
                    <th>Name of Mother</th>
                    <th>Action</th>
                </tr>
            <thead>    
            <tbody>
            </tbody>
        </table>
       
  </div>
  <br>
  

</body>
</html>

    <script type="text/javascript" src="jquery/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="DataTables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!--JavaScript-->
<script type="text/javascript">
    $(document).ready(function(){
      fetchConfirmationCertificate(0,10);
    });

    //fetch
   function fetchConfirmationCertificate(start,limit){

      $.ajax({
        url:'confirmation-ajax-api.php',
        method:'POST',
        dataType:'text',
        data:{
          key:'list_of_confirmation_certificates',
          start:start,
          limit:limit
        },success:function(response){

            if(response != "reachedMax")
            {

                $('tbody').append(response);

                start += limit;
                fetchConfirmationCertificate(start,limit);

            } else {

                $(".table").DataTable();
            }
        }
      });
    }

</script>