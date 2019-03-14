<?php 
include('database.php');
$id=$_GET['id'];

?>
 <?php
  $sec=mysqli_query($link,"select * from tbl_user_regestration where id='$id'");
  $res=mysqli_fetch_array($sec);
?>

   <div class="col-md-12">
	     <div class="col-lg-12"> <label>First Name</label></div>
       <div class="col-lg-12"> 
        <label class="form-control" readonly><?php echo $res['first_name'];?>
          <?php echo $res['last_name'];?></label></div>
   </div>


   <div class="col-md-12">
       <div class="col-lg-12"> <label>Email</label></div>
       <div class="col-lg-12"> 
        <label class="form-control" readonly><?php echo $res['email'];?></label></div>
   </div>

   <div class="col-md-12">
       <div class="col-lg-12"> <label>Mobile No.</label></div>
       <div class="col-lg-12"> 
        <label class="form-control" readonly><?php echo $res['mobile_no'];?></label></div>
   </div>

   <div class="col-md-12">
       <div class="col-lg-12"><label>Confirm Password</label></div>
       <div class="col-lg-12"> 
        <label class="form-control" readonly><?php echo $res['confirm_password'];?></label></div>
   </div>

   <div class="col-md-12">
       <div class="col-lg-12"> <label>Profile</label></div>
       <div class="col-lg-12"> 
        <label class="form-control" readonly><?php echo $res['profile'];?></label></div>
   </div>

   


