<script type="text/javascript" src="jquery/jquery-1.6.js"></script>
<script type="text/javascript">
function save_data(){
	var error=false;
var name=$("#name").val();
var email=$("#email").val();
var state=$("#state").val();
var address=$("#address").val();
var password=$("#password").val();
  

if(name==''){

	$("#error_name").html('Please fill name');
	error=false;
}else{
$("#error_name").html('');	
}
/////email validation proper///////
var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    $("#error_email").html('Please provide a valid email address');
    //email.focus;
    error=false;
 }else{
	$("#error_email").html('');	
	}
   //////////////end validation////////
   //////////////first method for gender///////
    var gender = document.getElementsByName('gender');
        var genValue = false;

        for(var i=0; i<gender.length;i++){
            if(gender[i].checked == true){
                genValue = true;    
            }
        }
        if(!genValue){
            $("#error_gender").html('Please choose your Gender: Male or Female');
            error=false;
        }else{
        $("#error_gender").html('');
            }

//second method for gender/////////////

/*var gend=$("#gender").attr('checked');
var gend1=$("#gender1").attr('checked');
if(!gend && !gend1)
{
error=true;
$("#error_gender").html('Please select Gender');
return false;
}
else{
$("#error_gender").html('');	
     }*/

///////first method//multiple checkbox check atleast 1///////
var chks = document.getElementsByName('clas[]');
var checkCount = 0;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
checkCount++;
}
}
if (checkCount < 1)
{
$("#class_error").html("Please select at least One.");
error=false;
}else{
$("#class_error").html("");	

     }
///////////////end ////////////////////////
/////////or second method//multiple checkbox for one by one check ////////
 /*var test = document.getElementsByName("clas[]");

  if(test[0].checked==false && test[1].checked==false && test[2].checked==false)
            {
    $("#class_error").html("Please Check Class");
        return false;
            }
            else{
           $("#class_error").html('');	
                 } 
	//////////////////////end////////////
*/

if(state==''){
	
$("#state_error").html('Please Select State');
error=false;	
}else{
$("#state_error").html('');
    }


	if(address=='')
	{
		
	$("#address_error").html('Please Fill Address');
	error=false;	
	}else{
	$("#address_error").html('');
	     }

if(password=='')
{
	
	//$("#password").focus();
	$("#error_pass").html('Please Fill Password');
	error=false;
}else{
$("#error_pass").html('');
     }

	return error=false;

}


</script>

<!doctype html>
<body>
<form action="" method="post" onsubmit="return save_data()">
<table align="center" border="1">
<tr><td colspan="2"><h2>Regestration Form<h2></td>
</tr>

<tr>
<td>Name</td>
<td><input type="text" name="name" id="name">
<div id="error_name" style="color:red"></div></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" name="email" id="email">
<div id="error_email" style="color:red"></div></td>
</tr>

<tr>
	<td>Gender</td>
<td><input type="radio" name="gender" id="gender1" value="male" >Male
<input type="radio" name="gender" id="gender2" value="female" >Female
<div id="error_gender" style="color:red"></div></td>
</tr>
<tr>
	<td>Class</td>
<td>
<input type="checkbox" name="clas[]"  value="bca" >BCA
<input type="checkbox" name="clas[]"  value="mca" >MCA
<input type="checkbox" name="clas[]"  value="ma" >MA
<div id="class_error" style="color:red"><div></td>
</tr>

<tr>
<td>State</td>
<td><select name="state" id="state">
	<option value="">Select</option>
	<option value="up" >UP</option>
	<option value="harayana" >Harayana</option>
	<option value="delhi">Delhi</option>
	<option value="vihar">Vihar</option>
	<option value="rajistan" >Rajistan</option>
</select>
<div id="state_error" style="color:red"></div></td>
</tr>
<tr><td>Address</td>
<td><textarea name="address" id="address"></textarea>
<div id="address_error" style="color:red"></div></td></tr>
<tr>
	<td>Password</td>
	<td><input type="password" name="password" value="password" id="password">
		<div id="error_pass" style="color:red"></div></td>
</tr>

<tr><td align="center" colspan="8"><input type="submit" name="submit" value="Submit"></td></tr>

</table>
</form>
<body>
</html>