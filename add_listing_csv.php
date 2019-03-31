<?php include("database.php");?>
<!DOCTYPE html>
<html>
<head>
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript" href="jquery/jquery.min.js"></script>
  <script type="text/javascript" href="jquery/jquery-1.9.1.min.js"></script>
</head>
<body>

  <div>
    <a href="download_csv.php?ExportType=csv" id="export-to-csv">Export to csv</a>
  </div>
  <?php $statusArr =array('2'=>'Approved','1'=>'Rejected');?>
<table align="center" border="1">
	<tr><td align="center" colspan="10"><h2>User List</h2></td></tr>
  
	<tr>
     <td align="center"><strong>Name</strong></td>
     <td align="center"><strong>Email</strong></td>
     <td align="center"><strong>Mobile</strong></td>
     <td align="center"><strong>Gender</strong></td>
     <td align="center"><strong>State</strong></td>
     <td align="center"><strong>Education</strong></td>
     <td align="center"><strong>Address</strong></td>
     <td align="center"><strong>Image</strong></td>
     <td align="center"><strong>Status</strong></td>
     <td align="center"><strong>Action</strong></td>
	</tr>

  <?php 
   $sec=mysqli_query($db,"select * from tbl_add");
   while($res=mysqli_fetch_array($sec)){
  ?>
  <tr>
  	<td align="center"><?php echo $res['name'];?></td>
  	<td align="center"><?php echo $res['email'];?></td>
  	<td align="center"><?php echo $res['mobile'];?></td>
  	<td align="center"><?php echo $res['gender'];?></td>
  	<td align="center"><?php echo $res['state'];?></td>
  	<td align="center"><?php echo $res['education'];?></td>
  	<td align="center"><?php echo $res['address'];?></td>
  	<td align="center"><img src='uploads/'<?php echo $res['image'];?></td>
    <td align="center"><select name="status" 
      onchange="update_status(<?php echo $res['id'];?>,this.value)">
      <?php 
      foreach($statusArr as $keys=>$Resstatus){
      ?>
      <option value ="<?php echo $keys;?>"<?php if($res['status']==$keys){echo 'selected';}?>><?php echo $Resstatus;?></option>
      <?php }?>
    </select></td>
  	<td align="center">
      <a href="add_listing.php?id=<?php echo $res['id'];?>"/>Approved/</a>
      <a href="add_listing.php?id=<?php echo $res['id'];?>"/>X</a>
    </td>

  </tr>
  <?php }?>
</table>
<script type="text/javascript">
function update_status(id,status){
  if(confirm('Are you sure you want to change?')){
    console.log(id,'===========',status);
    $.ajax({
      type:'post',
      url:'ajax.php',
      data:{
        'action':'updateStatus',
        'id':id,
        'status':status,
      },
      success:function(res){
        alert(res);
      }
    });
  }
}
</script>

</body>
</html>