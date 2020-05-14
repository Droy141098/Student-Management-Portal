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
          $class=$data['class'];
          $img=$data['image'];
          $section=$data['section'];
         $lastlogin=$data['last_login'];
     }

      else
      {
        header("location:../index.php");
      }

 
 ?>
<?php 
	 
   include('../user_dbconnection.php');
	//$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5000;
	//$page = isset($_GET['page']) ? $_GET['page'] : 1;
	//$start = ($page - 1) * $limit;
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}


$limit=3; 
 
$start=($page-1)*$limit;


$query ="SELECT * FROM `newuser` where `userid`!='$uid'  limit $start , $limit;";
$result=mysqli_query($conn,$query);
$query1="select count(id) as id from `newuser`;";
 
 $result1=mysqli_query($conn,$query1);
 $count = mysqli_fetch_all($result1,MYSQLI_ASSOC);
 
 $total=$count[0]['id'];
 $pages=ceil($total/$limit);
  
   
	$Previous = $page - 1;
	$Next = $page + 1; 
   
  // $id=$customers['fid'];
   //$fname=$customers['firstname'];
   //$pn=$customers['phonenumber'];
   //$email=$customers['email'];
   //$add=$customers['address'];
	 
	//$result1 = $conn->query("SELECT count(id) AS id FROM customers");
	//$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	//$total = $custCount[0]['id'];
	//$pages = ceil( $total / $limit );

	//$Previous = $page - 1;
	//$Next = $page + 1;

 ?>
 
<html>
<head>
<link href="../CSS/try.css" rel="stylesheet" type=text/css>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark shadow">
        <div >
            <a class="navbar-brand text-primary font-weight-bold" href="#top">
                STUDENT MANAGEMENT
            </a>
        </div>
        <a href="logout.php" style="margin-left:70%"><button class="btn btn-warning">Logout</button></a> 
    </nav>
<div class="container-fluid shadow">
       <div class="row">
            <div class="col-6"> 
                 
                  <div class="row1">
                     <b><label for="lastlogin">  Last Login: </label></b>
                     <b><?php echo " ".$lastlogin  ?></b>
                   </div >
            
                  <div class="row1">
                     <b><label for="Name">  NAME: </label></b>
                     <b><?php echo " " . $fullname ?></b>
                  </div>

                  <div class="row1">
                     <b><label for="Class">  CLASS: </label></b>
                     <b><?php echo " " . $class ?></b>
                  </div>

                 <div class="row1">
                      <b><label for="Section">  SECTION: </label></b>
                      <b><?php echo " " . $section ?></b>
                 </div>

            </div>

             <div class="col-6">
                 <div class="profilebtn offset-8 ">
                     <input type="submit" type="submit" class="btn btn-primary"  value="View Profile" name='profile' id="profile" onclick="return myprofile();"/>
                 </div>
                 <div class="edit offset-8 ">
                     <input type="submit" type="submit" class="btn btn-success"  value="Edit   Profile" name='edit' id="edit" onclick="return editprofile();"/>
                 </div>
            </div> 

           
            
      </div>
     
  </div>
	<div class="container well">
		 
			<h1 class="text-center">Registered Students</h1>
		 
	 
		<div style="height: 200px; overflow-y: auto;">
			<table id="" class="table table-striped table-bordered">
	        	<thead>
	                <tr>
                      <th>id</th>
	                    <th>Firstname</th>
	                    <th>Last Name</th>
	                    <th>Email</th>
	                    <th>Phone Number</th>
                      <th>Address</th>
	                    <th>Class</th>
                      <th>Section</th>
                      <th></th>
	              	</tr>
	          	</thead>
				
	        	<tbody>
        <?php $i = 1;
        while($customers = mysqli_fetch_array($result,MYSQLI_ASSOC)):
           ?>
	        		
		        		<tr>
	
							<?php $fname=$customers['fname'];?>
							<?php $lname=$customers['lname'];?>
              <?php $fullname=$fname . " " . $lname; ?>

							<?php $email=$customers['email'];?>
							<?php $phnNo=$customers['phnNo'];?>
              <?php $uid=$customers['userid'];?>
							<?php $address=$customers['address'];?>
							<?php $class=$customers['class'];?>
              <?php $img=$customers['image'];?>
							<?php $section=$customers['section'];?>
              
              <td><?php echo $i; ?></td>
							<td><?php echo $fname ;?></td>
		        			<td><?php echo  $lname; ?></td>
		        			<td><?php echo  $email; ?></td>
		        			<td><?php echo $phnNo; ?></td>
		        			<td><?php echo $address; ?></td>
                  <td><?php echo $class; ?></td>
                  <td><?php echo $section; ?></td>
                  <td><button type="button" class="btn btn-success" data-target="#myModal<?php echo $customers['phnNo'] ?>" href="#aboutModal" data-toggle="modal" >View Profile</button></td>
                  <div class="modal fade" id="myModal<?php echo $customers['phnNo'] ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    
                    </div>
                <div class="modal-body">
                    <center>
                    <img src="../STD_IMG/<?php echo $img;?>" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                    <h3 class="media-heading"><?php echo $fullname ?><small></small></h3>
                   
                    </center>
                    <hr>
                    <center>
                    <h3 class="text-left"><strong>Bio: </strong><br></h3>
                     <h4>Class:<?php echo " ".$class ?></h4>
                     <h4>Section:<?php echo " ".$section ?></h4>
                     <h4>UID:<?php echo " ".$uid ?></h4>
                     <h4>Contact:<?php echo " ".$phnNo ?></h4>
                     <h4>Email:<?php echo " ".$email ?></h4>
                       
                    <br>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close Profile</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
                </tr>
                
          <?php $i++;
         endwhile; ?>
	        	</tbody>
      		</table>

      		
		</div>
		<div class="row">
			<div class="col-md-10">
				<nav aria-label="Page navigation">
					<ul class="pagination">
				    <li class="page-item">
				      <a class="page=link" href="dashboard.php?page=<?= $Previous; ?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo; Previous</span>
				      </a>
				    </li>
				    <?php for($i = 1; $i<= $pages; $i++) : ?>
				    	<li class="page-item"><a class="page-link" href="dashboard.php?page=<?= $i; ?>"><?= $i; ?></a></li>
				    <?php endfor; ?>
				    <li class="page-item">
				      <a class="page-link" href="dashboard.php?page=<?= $Next; ?>" aria-label="Next">
				        <span aria-hidden="true">Next &raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>
			  
					 
		</div>	
</div>		


<script src="../js/dashboard.js"></script>
<script src="../js/edit.js"></script>

</body>
</html>

