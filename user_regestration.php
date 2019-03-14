<?php include('database.php');?>

<?php 
error_reporting(0);
$id= ($_GET['id'])?$_GET['id']:0;
if(isset($_REQUEST['submit']))
{
  $first_name=htmlentities($_POST['first_name'],ENT_QUOTES);
  $last_name=htmlentities($_POST['last_name'],ENT_QUOTES);
  $email=$_POST['email'];
  $mobile_no=$_POST['mobile_no'];
  $password=md5($_POST['password']);
  $confirm_password=$_POST['confirm_password'];
  $profile=$_POST['profile'];
if($id>0)
{
   $update=mysqli_query($link,"update tbl_user_regestration set
                                                   first_name='$first_name',
                                                   last_name='$last_name',
                                                   email='$email',
                                                   mobile_no='$mobile_no',
                                                   password='$password',
                                                   confirm_password ='$confirm_password',
                                                   profile='$profile'
                                                   where id='$id'");

      if($update)
      {
      $msg='Record Updated Successfuly';
      header("location:user_regestration_list.php?msg=$msg");
      }
  
}
else
{
  
  $in=mysqli_query($link,"insert into tbl_user_regestration set
                                                   first_name='$first_name',
                                                   last_name='$last_name',
                                                   email='$email',
                                                   mobile_no='$mobile_no',
                                                   password='$password',
                                                   confirm_password ='$confirm_password',
                                                   profile='$profile'");

      if($in)
      {
      $msg='Record Inserted Successfuly';
      header("location:user_regestration_list.php?msg=$msg");
      }
      else
      {
        $msg='Record Not inserted';
        header("location:user_regestration_list.php?msg=$msg");
      }
      
  
    }
    echo $msg;
}
$select=mysqli_query($link,"select * from tbl_user_regestration where id='$id'");
$res=mysqli_fetch_array($select);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <script type="text/javascript" src="jquery/jquery.min.js"></script>
</head>
<script type="text/javascript">
function mobile_duplicate(mobile_no)
  {
    var output = 0;
     //alert('mobile_check.php?mobile_no='+mobile_no);
       $.ajax({
           type: "GET",
           url:'mobile_check.php?mobile_no='+mobile_no+'&id='+<?php echo $id; ?>,
           async: false,
           success:function(result)
              {
                if(result == 1){ output =1; }
              }
          }); 

       return output;
  }

            function email_duplicate(email)
            {
              var output=0;
              //alert('email_check.php?email='+email);
              $.ajax({
                type:"GET",
                url:'email_check.php?email='+email+'&id='+<?php echo $id; ?>,
                async:false,
                success: function(result)
                    {
                     if(result==1){ output=1;} 
                    }
              });

               return output;

            }

    function error_remove(field_id){
     $('#'+field_id).html('');
    }
 ////for cancel button/////////
function cancel_data(){
  window.location.href="user_regestration_list.php";
}

 /////////////////
function save_data()
{
  //alert('pppppp');
  var first_name =$("#userRegForm #first_name").val();
  var last_name  =$("#userRegForm #last_name").val();
  var email =$("#userRegForm #email").val();
  var mobile_no =$("#userRegForm #mobile_no").val();
  var password=$("#userRegForm #password").val();
  var confirm_password=$("#userRegForm #confirm_password").val();
  var profile =$("#userRegFor #profile").val();
//alert(confirm_password);
//alert(password);
    counter=1;
  if(first_name==''){counter=0;$("#error_first").html('Please Fill First Name');}

  if(last_name==''){counter=0;$("#error_last").html('Please Fill Last Name');}
  
  if(email =='') { counter=0;$("#error_email").html("Please fill Email ID");}
  else
  {

    var emailRegex = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
    if(!emailRegex.test(email)) 
    { 
      counter=0;
      $("#error_email").html('Please provide a valid email address');
      
    }
    else
    {
      var emailExit = email_duplicate(email);
      if(emailExit=='1') { counter=0; $("#error_email").html('This Email Allready Exit'); }
     }
  }

 if(mobile_no==''){counter=0;$("#error_mobile").html("Please fill Mobile No");}
  else
  {
    if (isNaN(mobile_no)){counter=0;$("#error_mobile").html("Please enter digit only");}
                
         else if(mobile_no.length != 10)          
         {   
            counter=0;
            $("#error_mobile").html("Please Enter 10 digit Mobile");   
          }
                else
                 {
                  //alert(mobile);
                   var mobExist = mobile_duplicate(mobile_no);
                     if(mobExist == '1')
                     {
                        counter=0;
                        $("#error_mobile").html("This mobile no Already Exits");       
                      }
                  }
  }  
                
                
                      
    if(password==''){counter=0;$("#error_password").html('Please Fill Password');}

    if(confirm_password==''){counter=0;$("#error_confirm_password").html('Please Fill Confirm Password');} 

    if(password!=confirm_password)
      {
        counter=0; 
        $("#error_confirm_password").html('Password and  Confirm Password Not Match');
      } 

      if(counter==1){return true;}else{return false;}
}

 </script>
<style>
form{
	align:center;
	margin-left:170px;
}
.required{
color:red;
margin:10px;
}
input[type="radio"]{
  margin: 0 7px 0 10px;
}
</style>
<div class="container">
 <form action="" method="post" name="userRegForm" id="userRegForm" onsubmit="return save_data()" class="form-horizontal" >
 	<div class="form-group"> 
        <div class="col-lg-offset-3 col-lg-9">
           <h2>Jeeb1 User Regestration</h2>
       </div>
     </div>

    <div class="form-group">
      <label class="col-lg-2">First Name<span class="required">*</span></label>
   	   <div class="col-lg-6">
   	     <input type="text" <?php echo $first_name;?> value="<?php echo $res['first_name'];?>" name="first_name" id="first_name" onclick="error_remove('error_first');"  class="form-control">
           <div id="error_first" style="color:red"></div>
   	   </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2">Last Name<span class="required">*</span></label>
   	   <div class="col-lg-6">
   	     <input type="text" <?php echo $last_name;?>  name="last_name" value="<?php echo $res['last_name'];?>"id="last_name" onclick="error_remove('error_last');"  class="form-control">
         <div id="error_last" style="color:red"></div>
   	   </div>
    </div>

    
     
     <div class="form-group">
      <label class="col-lg-2">Email<span class="required">*</span></label>
   	   <div class="col-lg-6">
   	     <input type="text" <?php echo $email;?> value="<?php echo $res['email'];?>" name="email" onchange="email_duplicate(this.value)" id="email" onclick="error_remove('error_email');"  class="form-control">
         <div id="error_email" style="color:red"></div>
   	   </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2">Mobile No.<span class="required">*</span></label>
   	   <div class="col-lg-6">
   	     <input type="text" <?php echo $mobile_no;?> value="<?php echo $res['mobile_no'];?>"  name="mobile_no" onchange="mobile_duplicate(this.value)" id="mobile_no" onclick="error_remove('error_mobile');" class="form-control">
         <div id="error_mobile" style="color:red"></div>
   	   </div>
    </div>

      <div class="form-group">
      <label class="col-lg-2">Password<span class="required">*</span></label>
       <div class="col-lg-6">
         <input type="password"  id="password"  name="password" value="password"  onclick="error_remove('error_password');" class="form-control">
         <div id="error_password" style="color:red"></div>
       </div>
    </div>

     <div class="form-group">
      <label class="col-lg-2">Confirm Password<span class="required">*</span></label>
       <div class="col-lg-6">
         <input type="password"  id="confirm_password" value="password" name="confirm_password"  onclick="error_remove('error_confirm_password');" class="form-control">
         <div id="error_confirm_password" style="color:red"></div>
       </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2"><span>Profile</span></label>
   	   <div class="col-lg-6">
   	    <?php 
              $profile=array('Reporter','Reply By');
              echo '<ul style="list-style-type:none;">';
               foreach($profile as $val)
               {
                    $profile = $res['profile'];
                    if(!isset($profile) && $profile =='' && $val == 'Reporter') { 
                      $selected = "checked='checked'"; 
                    }
                    else if ($profile == $val) { $selected = "checked='checked'"; }
                    else{ $selected = '';}

                echo '<li style="display: inline;"><lable> 
                <input type="radio" name="profile"  value="'.$val.'" '.$selected.'    
                    id="'.$val.'">'.$val.'</lable></li>';
               }
               echo '</ul>';
          ?>
             
           </div>
        </div>

    <div class="form-group"> 
        <div class="col-lg-offset-4 col-lg-8">
           <button type="submit" name="submit" class="btn btn-default">Submit</button>
           <button type="button" name="cancel" onclick="cancel_data()" class="btn btn-default">Cancel</button>
       </div>
     </div>
</form>
</div>
</body>
</html>