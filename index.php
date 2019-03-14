<!doctype html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery/jquery.min.js"></script>
    <script src="jquery/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

</head>
<script>
function remove_error(field_id){
$("#" +field_id).html('');
}

function login_data()
{
  
var mobile_no=$("#mobile_no").val();
var password=$("#password").val();
  var counter=1;
   
  if(mobile_no==''){counter=0; $("#error_mobile").html('Please Fill Mobile No.');}
  if(password==''){counter=0; $("#error_password").html('Please Fill Password');}

     if(counter==1){return true;}else{return false;}

}
</script>
<body>
<?php 
error_reporting(0);
include('database.php');

session_start();
$id=(!empty($_SESSION['sid']))?$_SESSION['sid']:'';
if(!$id==''){
  header('location:user_query_list.php') || header('location:user_reply_list.php');
}


if(isset($_REQUEST['submit']))
{
  $mobile_no=trim($_POST['mobile_no']);
  $password=md5(trim($_POST['password']));

$query="select * from tbl_user_regestration where mobile_no='$mobile_no' and password='$password'";
    $select=mysqli_query($link,$query);
     if(mysqli_num_rows($select)>0)
     {
      $fetch_res=mysqli_fetch_array($select);

         session_start();
         $_SESSION['mobile_no']=$fetch_res['mobile_no'];
         $_SESSION['first_name']=$fetch_res['first_name'];
         $_SESSION['last_name']=$fetch_res['last_name'];
         $_SESSION['sid']=$fetch_res['id'];
          if($fetch_res['profile']=='Reporter')
           {
           header("location:user_query_list.php");
          }
           else 
            
           {
            header("location:user_reply_list.php");
            }
      } else
            {
             $msg='Mobile No and Password Not match'; 
            }
}
?>
<div class="jumbotron">
<h1 class="text-center">Admin Panel</h1>
</div>
  <div class="container">
<div class="row">
   <div class="col-sm-4"></div>
       <div class="col-sm-4">
 <form method="post" onsubmit="return login_data()">
  <div class="form-group">
    <label class="btn-danger">
      <?php echo $msg;?></label></div>


 <div class="form-group">
   <label>Mobile No.</label>
    <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $mobile_no;?>" onclick="remove_error('error_mobile');" class="form-control">
       <div id="error_mobile" style="color:red"></div>
  </div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" value"<?php echo $password;?>" id="password" onclick="remove_error('error_password');" class="form-control">
  <div id="error_password" style="color:red"></div>
</div>

   <div class="form-group">
     <input type="checkbox" name="check"><label>Remember me</label>
    </div>
  <div class="form-group">
  	<input type="submit" name="submit" class="btn btn-success" value="Submit"/>
    </div>

 </form>
  </div><div></div>
</body>
</html>