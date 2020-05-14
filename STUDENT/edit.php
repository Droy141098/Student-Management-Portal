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
                      $email=$data['email'];
                      $phnNo=$data['phnNo'];
                      $address=$data['address'];
                      $class=$data['class'];
                      $section=$data['section'];
                      $password=$data['Password'];
                      $image=$data['image'];
                        $userid=$data['userid'];
                      $acntid=$data['id'];
                     
         
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

    <title>STUDENT MANAGEMENT SYSTEM</title>
   <link href="../CSS/create_account.css" rel="stylesheet" type=text/css>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark shadow">
        <div >
            <a class="navbar-brand text-primary font-weight-bold" href="#top">
                STUDENT MANAGEMENT
            </a>
        </div>
        <button type="button" style="margin-left:70%" class="btn btn-success" id="goBack" onclick="go()">Go Back</button>            </div>
    </nav>
   
         <form name="myForm" action="edit.php"  method="post" id="myForm" enctype="multipart/form-data">
            <div class="container" >
            <div class="col-6 offset-3 bg-white shadow">
            <div class="row">
                <div class="col-12 offset-3">
                    <h1>EDIT PROFILE</h1>
                </div>
            </div>
            
            <div >
                        <label for="fname">First name:</label>
                        <input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo $fname?>" placeholder="Please provide a first name." >
                        
            </div>
            <div >
                        <label for="lname">Last name:</label>
                        <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Please provide a last name." value="<?php echo $lname?>" >

            </div>
            <div >
                        <label for="email">email:</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Please provide email." value="<?php echo $email?>" >

            </div>
            <div >
                        <label for="phnNo">Phone Number:</label>
                        <input type="text" name="phnNo" id="phnNo" class="form-control" placeholder="Please provide phone number." value="<?php echo $phnNo?>" >

            </div>
         
            
            <div >
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?php echo $address?>" placeholder="Please provide address." >

            </div>

            

            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="class">Select Class:</label>
                     <select class="form-control" id="sclass" name="sclass" required="true" >
                         <option value="" hidden>Select the Class</option>
                         <option value="1">One</option>
                         <option value="2">Two</option>
                         <option value="3">Three</option>
                         <option value="4">Four</option>
                         <option value="5">Five</option>
						   <option value="6">Six</option>
                         <option value="7">Seven</option>
                         <option value="8">Eight</option>
                         <option value="9">Nine</option>
                         <option value="10">Ten</option>
						 <option value="11">Eleven</option>
                         <option value="12">Twelve</option>
                    </select>
                </div>
                
                <div class="form-group col-md-6">
                <label for="section">Select Section:</label>
                    <select class="form-control" id="ssection" name="ssection"  disabled>
                                    <option selected>Select the Section</option>

                    </select>
                </div>
            </div>

            

            <div >
                        <label for="pwd">Enter Password:</label>
                        <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Please provide a password." >

            </div>
            
            <div >
                        <label for="confirmPwd">Confirm Password:</label>
                        <input type="password" name="confirmPwd" id="confirmPwd" class="form-control" placeholder="Please provide a password." >

            </div>
            <div >
            <label for="img">Upload image:</label><br>
            <input type="file"  id="img" name="img" required="true" value="<?php echo $image?>"><br>
            </div>
             
        <div class="row">
            <div class="col-10 offset-4">
              <input type="submit" class="btn btn-primary" onclick="return fregister();" value="Update" name='submit' id="submit"/>
              
        </div>

            
</div>

           </div> 
         </form>
          
         
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <!--<script src=" https://code.jquery.com/jquery-3.4.1.slim.min.js " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous "></script>-->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script src="../js/update.js"></script>
    <script src="custom.js"></script>
</body>

</html>

<?php
 
   if($_SERVER["REQUEST_METHOD"]=="POST")
   {  
      
      $fname=$_POST['firstName'];
      $lname=$_POST['lastName'];
      $email=$_POST['email'];
      $phnNo=$_POST['phnNo'];
      $address=$_POST['address'];
      $pwd=md5($_POST['pwd']);
      $confirmPwd=md5($_POST['confirmPwd']);
      $class=$_POST['sclass'];
      $section=$_POST['ssection'];
      $imagename=$_FILES['img']['name'];
      $tempname=$_FILES['img']['tmp_name'];
      $file=explode(".",$imagename);
      $fileSize= $_FILES['img']['size'] ;
      if( $fileSize!=0)
      {   
         
          $filename=$file[0];
          $extension=$file[1];
      }
      
      $allowedExtensions=array("gif","png","bmp","jpeg","jpg");
      
      include('../user_dbconnection.php');
     
      $sql1="SELECT * FROM `newuser` WHERE email='$email' and phnNo='$phnNo' ";
      $result1=mysqli_query($conn,$sql1);
      $run1=mysqli_num_rows( $result1);
      $sql2="SELECT * FROM `newuser` WHERE email='$email' ";
      $result2=mysqli_query($conn,$sql2);
      $run2=mysqli_num_rows( $result2);
      $sql3="SELECT * FROM `newuser` WHERE  phnNo='$phnNo' ";
      $result3=mysqli_query($conn,$sql3);
      $run3=mysqli_num_rows( $result3);
      $flag=0;
    if(preg_match("/^[A-Za-z]+$/",$_POST['firstName']))
      {
        $flag=1;
      
        if(preg_match("/^[A-Za-z]+$/",$_POST['lastName']))
           {
               $flag=1;
           
              if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$_POST['email']))
                {
                    $flag=1;
                
                 if(preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$_POST['phnNo']))   
                    {
                        $flag=1;
                    
                     if(preg_match("/.+$/",$_POST['address']))
                         {
                             $flag=1;
                         
                          if($_POST['sclass']!="")
                          {
                              $flag=1;
                          
                           if($_POST['ssection']!="select")
                            {
                                $flag=1;
                            
                                if(preg_match("/^(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/",$_POST['pwd']))
                                {
                                    $flag=1;
                                
                                if($_POST['confirmPwd']==$_POST['pwd'])
                                { 
                                    $flag=1;
                                
                                  if(in_array($extension,$allowedExtensions))
                                    {  
                                        $flag=1;
                                    
                                        
                                        
                                        move_uploaded_file($tempname,"../STD_IMG/$imagename");
                                        $sql1="UPDATE NEWUSER SET fname='$fname',lname='$lname',email='$email',phnNo='$phnNo',address='$address'
                                        ,class='$class',section='$section',Password='$pwd',image='$imagename'
                                         where userid='$userid'";
                                        
                                         $result = mysqli_query($conn,$sql1);
                                        ?>
                                        <script>
                                           alert("Successfully Updated");
                                           window.location.href="../STUDENT/dashboard.php";
                                        </script>
                                        <?php
                                    }
                                 }
                            }}}}}}}}}
  
 ?>