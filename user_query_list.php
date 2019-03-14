<?php 
error_reporting(0);
include('database.php');
session_start();
$user_name=ucfirst($_SESSION['first_name']);

$sid=$_SESSION['sid'];
if($sid==''){
  header('location:index.php');
} 

/*if(!isset($_SESSION['sid'])) { 
   header("Location: index.php");
   exit;
} */
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
        url: "view_user.php?id="+id,
        title:'Jeeb1 Query Detail',
        size: eModal.size.lg,
        buttons: [
            {text: 'Close', style: 'info',   close: true }
            

        ],
        
    };

eModal.ajax(options);

}

//////for user query all detail//////
function ajax_detail_model(id){
var options = {
        url: "view_all_detail_query.php?id="+id,
        title:'Jeeb1 user Query All Detail',
        size: eModal.size.lg,
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
    .success_logout{
      color:green;
    text-align: right;
    padding-right: 10px;

    }
</style>
<body>
  <div class="mainContainer">
	<div class="col-lg-12"><h3>Jeeb1 User Query List</h3></div>
  <div class="col-lg-12">
      <a href="user_query.php">
        <button class="btn btn-primary">Add New Query</button>
      </a>
      <h5 class="text-success"><?php echo $msg=$_GET['msg'];?></h5>
  </div>
  <div class="success_logout">Welcome:<?php echo $user_name; ?> <a href="logout.php">Logout</a></div>
<div class="user_list">
	<table class="table table-bordered" wight="50" height="55">
       <thead>
        <tr>
            <th>Sr.No</th>
            <th>Question Title</th>
            <th>Description</th>
            <th>Priority</th>
            <th>Added Date</th>
            <th>Status</th>
            <th>Reply BY</th>
            <th>Action</th>

        </tr>
       </thead>

     <?php
     
     $no=1;
      $sec=mysqli_query($link,"select * from jeeb1_user order by id desc");
     while($res=mysqli_fetch_array($sec)){
     
     	?>
     	<tr>
            <td><?php echo $no; $no++;?></td>
            <td><?php echo $res['title'];?></td>
            <td><button onclick="ajax_model(<?php echo $res['id'];?>)">View </button></td>
            <td><?php echo $res['priority'];?></td>
            <td><?php echo $res['date_added']; ?></td>
            <td><?php echo $res['status'];?></td>
            <td><?php echo ucfirst($res['reply_by']);?></td>
            <?php
            if($res['status']=='close')
            {
            ?>
            <td><button onclick="ajax_detail_model(<?php echo $res['id'];?>)">View</button></td>
            <?php
          }
          else
          {
            ?>
            <td><a href="user_query.php?id=<?php echo $res['id']?>">Edit</a></td>

            <?php } ?>
        </tr>
       
     	<?php }?>
    </table>
</div>
</div>
</body>
</html>