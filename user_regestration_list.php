<?php 
error_reporting(0);
include('database.php');
$msg=$_GET['msg'];

?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="jquery/jquery.min.js"></script>
    <script src="jquery/bootstrap.min.js"></script>
    <script src="jquery/eModal.min.js"></script>
</head>
<script>
function ajax_model(id){
var options = {
        url: "view_regestration.php?id="+id,
        title:'User Regestration Detail',
        size: eModal.size.md,
        buttons: [
            {text: 'Close', style: 'info',   close: true }
            

        ],
        
    };

eModal.ajax(options);

}
</script>
<style>
    .user_list{
    	margin: 5px;
    }

    .mainContainer{
      width: 70%;
    margin-left: 15%;

    }
    .msg{
      color:green;
    text-align: center;

    }

    
    </style>

<body>
<div class="mainContainer">  
<div class="col-lg-12"><h3>User Regestration List</h3></div>

<div class="col-lg-12"><a href="user_regestration.php">
  <button class="btn btn-primary">Add New Regestration</button>
<h5 class="msg"><?php echo $msg;?></h5></a>
</div>

<div class="user_list">
   <table class="table table-bordered">
       <thead>
        <tr>
          <th>Sr.No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile No.</th>
            <th>Profile</th>
            <th>Action</th>
        </tr>
       </thead>
       <?php
       $no=1;
      $sec=mysqli_query($link,"select * from tbl_user_regestration order by id desc");
     while($res=mysqli_fetch_array($sec)){
      $no<=$res;
      ?>
     <tr>
        <th><?php echo $no; $no++;?></th>
        <th><?php echo trim(ucfirst($res['first_name']));?></th>
        <th><?php echo trim(ucfirst($res['last_name']));?></th>
        <th><?php echo trim($res['email']);?></th>
        <th><?php echo trim($res['mobile_no']);?></th>
        <th><?php echo $res['profile'];?></th>
        <th><button onclick="ajax_model(<?php echo $res['id'];?>)">View </button>
        <a href="user_regestration.php?id=<?php echo $res['id']?>">Edit</a></th>
        </tr>
      <?php }?>
  </table>
</div>
</div>
</body>
</html>