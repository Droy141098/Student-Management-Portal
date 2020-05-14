<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>STUDENT MANAGEMENT SYSTEM</title>
   <link href="../CSS/create_account.css" rel="stylesheet" type=text/css>
</head>

<body>
         <div class="logo"> 
            <h1 align="center">STUDENT MANAGEMENT SYSTEM</h1>
         </div>

         <form name="myForm" action="create_account.php"  method="post" id="myForm">
            <div class="container" >
        
            <div class="row">
                <div class="col-12 offset-3">
                    <h1>CREATE ACCOUNT</h1>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" id="firstName" name="firstName"  placeholder="Enter First Name" required="true">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name"  required="true"><br>
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address" required="true">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="phoneNo" name="phnNo" placeholder="Enter Phone No."  required="true"><br>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Your Address"  required="true"><br>
                </div>
            </div>

            <div class="row">
                <div class="col">
                   
                       <select id="selectClass">
                               <option style="display:none">Class</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                               <option value="6">6</option>
                               <option value="7">7</option>
                               <option value="8">8</option>
                               <option value="9">9</option>
                               <option value="10">10</option>
                               <option value="11">11</option>
                               <option value="12">12</option>
                       </select>
                       
                        <select id="section">
                               <option style="display:none">Section</option>
                               <option value="1">1</option>
                        </select>
                    
               </div>
            </div>
            <br>
            <div class="row">
                <div class="col">

                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter Password" required="true" >
                </div>
                <div class="col">
                    <input type="password" class="form-control" id="confirmPwd" name="confirmPwd" placeholder="Confirm Password"  required="true" ><br>
                </div>
            </div>
             
            <div class="btns">
              
              <input type="submit" onclick="return register();" value="Submit" name='submit' id="submit"/>
              <button type="button" class="btn btn-success"  onclick="goBack()">Go Back</button>
            </div>

            
               

           </div> 
         </form>
          
         <script src="../js/create_account.js"></script>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.4.1.slim.min.js " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous "></script>

</body>

</html>

<?php
   
   if(isset($_POST['submit']))
     {
      $fname=$_POST['firstName'];
      $lname=$_POST['lastName'];
      $email=$_POST['email'];
      $phnNo=$_POST['phnNo'];
      $address=$_POST['address'];
      $pwd=md5($_POST['pwd']);
      $confirmPwd=md5($_POST['confirmPwd']);
     include('../user_dbconnection.php');
     
     if(preg_match("/^[A-Za-z]+$/",$_POST['firstName']))
     {
        if(preg_match("/^[A-Za-z]+$/",$_POST['lastName']))
          {
             if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$_POST['email']))
               {
                if(preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$_POST['phnNo']))   
                   {
                    if(preg_match("/.+$/",$_POST['address']))
                        {
                          if(preg_match("/^(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/",$_POST['pwd']))
                            {
                                if($_POST['confirmPwd']==$_POST['pwd'])
                               { 
                                $id="STU" . $phnNo;
                                $sql="INSERT INTO `newuser`(`id`,`fname`, `lname`,`email`,`phnNo`,`address`,`Password`) 
                                VALUES ('$id','$fname','$lname','$email','$phnNo','$address','$pwd')";
                                $result1 = mysqli_query($conn,$sql);
                                }
                            }
                        }
                   }
               }
          }
     }
     }
?>