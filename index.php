<?php
    include("user_dbconnection.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $myusername = mysqli_real_escape_string($conn,$_POST['username']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
        $encpassword=md5($mypassword);
       
        $sql = "SELECT * FROM `newuser` WHERE userid='$myusername' and Password='$encpassword'";
        
        $result = mysqli_query($conn,$sql);
        
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
     
      $count = mysqli_num_rows($result);
      
       echo $count;
      // If result matched $myusername and $mypassword, table row must be 1 row
	
      if($count == 1) {
          
         $_SESSION['login_user'] = $myusername;
         $uid=$_SESSION['login_user'];
      $sql1="UPDATE newuser set last_login=CURRENT_TIMESTAMP WHERE userid='$uid' ";
      $result1 = mysqli_query($conn,$sql1);
         echo '<script>alert("Welcome")</script>'; 
         header("location:STUDENT/dashboard.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         
        echo '<script>alert("Your Login Name or Password is invalid")</script>'; 
         
      }
   }
?>


<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark shadow">
        <div >
            <a class="navbar-brand text-primary font-weight-bold" href="#top">
                STUDENT MANAGEMENT
            </a>
        </div>
</nav>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title"><img src="logo.jpg" ></h2>
                       
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="username" placeholder="Your UserID"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            
                        </div>
                        
                        
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Login"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Dont have an account ? <a href="STUDENT/create_account.php" >Sign Up</a>
                    </p>
                </div>
            </div>
        </section>

    </div>
<script src="js/index.js"></script>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.4.1.slim.min.js " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous "></script>
    <!-- JS -->
   
   
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>