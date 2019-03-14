<! doctype html>
<head>
	<script src="jquery/bootstrap.min.js" ></script>
<script>
function submitform()
{
document.getElementById("myForm").submit();
alert("your form data submited");
}
</script>
</head>
<body>
<form method="post" action="" id="myForm">
<input type="text" name="n" placeholder="enter your name"/><br/>
<input type="text" name="e" placeholder="enter your email"/><br/>
<input type="text" name="m" placeholder="enter your mobile"/><br/>
<textarea name="reply" placeholder="enter your address"></textarea>
</form>
<div onclick="submitform()" style="color:blue;">Submit the form by clicking this</div>
</body>
</html>