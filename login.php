<?php
session_start();

    if(isset($_SESSION["isloggedIN"])){
        header('Location: ./production/index.php');
        exit();
    }
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    
    <title>Sto. Tomas de Villanueva Parish, Bayawan City</title>
      <!-- add icon link -->
    <link rel="icon" href="production/dists/logo.jpg" type="image/jpg"> 
     
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
      <!-- jQuery Library -->
      <script src="jquery.js"></script>

    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="./vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST">
            <h1>Login Form</h1>
              <p id="response">

              </p>
              <div>
                <input type="text" id="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" id="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                 <input class="btn btn-success" type="button" value="Login" id="login">
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               
                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="production/dists/logo.jpg" width="100" height="100">
                  <h3> Sto. Tomas de Villanueva Parish, Bayawan City</h3>
                  <p>©2020 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>

    
    <script type="text/javascript">
        $(document).ready(function() {

            $("#login").on('click', function(){

                var email = $("#email").val();
                var password = $("#password").val();

                if(email == "" || password == ""){

                    alert("PLEASE CHECK YOUR INPUTS");

                } else {
                    $.ajax({
                        
                        url:'ajax.php',
                        method:'post',
                        dataType:'text',
                        data:{
                            key:'login',
                            email:email,
                            password:password
                        },success:function(response){

                            $("#response").html(response);

                            if(response.indexOf('success')>=0){
                                window.location = './production/index.php';
                            }
                        }
                    });
                }
            });
        });

       
    </script>
</body>
</html>