
<?php 
//error_reporting(0); 
include('database.php'); 
$mobile_no = $_REQUEST['mobile_no'];
$id=$_REQUEST['id'];
$query  = "select * from tbl_user_regestration where mobile_no='$mobile_no' and id !='$id'";
$run    = mysqli_query($link,$query);

if(mysqli_num_rows($run)>0)
{
	echo 1;
}
else
{
	echo 0;
}

?>