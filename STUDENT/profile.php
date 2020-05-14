<?php 
            include('../user_dbconnection.php');
            session_start();
            if($_SESSION['login_user'])
                  {
                      $uid=$_SESSION['login_user'];
                      $sql="SELECT * FROM `newuser` WHERE userid='$uid' ";
                      $result1 = mysqli_query($conn,$sql);
                      $data=mysqli_fetch_assoc($result1);
                      $fname=$data['fname'];
                      $lname=$data['lname'];
                        $fullname=$fname . " " . $lname;
                      $email=$data['email'];
                      $phnNo=$data['phnNo'];
                      $address=$data['address'];
                      $class=$data['class'];
                      $section=$data['section'];
                      $password=$data['Password'];
                      $image=$data['image'];

                      
                     
         
     }

      else
      {
        header("location:../index.php");
      }

 
 ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>STUDENT MANAGEMENT SYSTEM</title>
   <link href="../CSS/profile.css" rel="stylesheet" type=text/css>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark shadow">
        <div >
            <a class="navbar-brand text-primary font-weight-bold" href="#top">
                STUDENT MANAGEMENT
            </a>
        </div>
        <button type="button" style="margin-left:70%" class="btn btn-success" id="goBack" onclick="go()">Go Back</button>
    </nav>
         
        
	<div class="container">
		<div class="row">
			<div class="col1">
				<img src="../STD_IMG/<?php echo $image;?>" class="img-circle" alt="templatemo easy profile" width="300" height="300" border="0">
				
			</div>
        </div>
        <hr>
        <div class="col-offset-2"> 
                 
               
                 <div >
                    <b><h2>  NAME: </b>
                    <b><?php echo " " . $fullname ?></b></h2>
                 </div>

                 <div >
                    <b><h2>  CLASS: </b>
                    <b><?php echo " " . $class ?></b><h2>
                 </div>

                <div >
                <b><h2>  SECTION: </b>
                    <b><?php echo " " . $section ?></b><h2>
                </div>
                <div>
                <b><h2>  UID: </b>
                    <b><?php echo " " . $uid ?></b><h2>
                </div>
                <div>
                <b><h2>  PHONE NUMBER: </b>
                    <b><?php echo " " . $phnNo ?></b><h2>
                </div>
                <div>
                <b><h2>  EMAIL: </b>
                    <b><?php echo " " . $email ?></b><h2>
                </div>
                <div>
                <b><h2>  ADDRESS: </b>
                    <b><?php echo " " . $address ?></b><h2>
                </div>
           </div>
				
	</div>


    


 <script src="../js/update.js"></script>
</body>
</html>