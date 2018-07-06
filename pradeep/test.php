<html>
<style>
.error {color:red;}
</style>
<script src="validtion.js"></script>
<script type="text/javascript">
	function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        
    }    

function isString(evt)
{
	var iKeyCode = (evt.which) ? evt.which : evt.keyCode
	if ((iKeyCode < 65 || iKeyCode > 96) && (iKeyCode < 97 || iKeyCode > 123)&&
	iKeyCode != 32 && iKeyCode !=8  ) {
		 return false;
	}
}
    
    
   
  
      

	function validate()
	{
		var name = document.forms["myform"]["name"].value;
		var lname = document.forms["myform"]["lname"].value;
		var gender = document.forms["myform"]["gender"].value;
		var email = document.forms["myform"]["email"].value;
		var add = document.forms["myform"]["add"].value;
		
		if(name == "")
		{
			alert("name must be filled");
			return false;
		}
		 if ( lname == "") {
		 	alert(" last name must be filled");
			return false;
		 }
		 if( gender == "")
		 {
		 	alert(" Gender must be selected");
			return false;
		 }
		 if(email == "")
		 {
		 	alert("email must be filled");
		 	return false;
		 }
		 if(add == "")
		 {
		 	alert("address must be filled");
		 	return false;
		 }
	
		 return true;
		}

	


	
</script>

<body>
	<?php
	 $nameErr=$lnameErr=$emailErr=$mobErr=$genderErr=$addErr="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

  if(empty($_POST["lname"])){
  	$lnameErr ="Last name required";
  }
  else
  {
  	$lname = test_input($_POST["lname"]);
  }

  if(empty($_POST["email"])){
  	$emailErr = "Email is required";
  }
  else
  {
  	$email = test_input($_POST["email"]);
  }

  if(empty($_POST["mob"]))
  {
  	$mobErr = "mob no is required";
  }
  else
  {
  	$mob = test_input($_POST["mob"]);
  }

  if(empty($_POST["gender"]))
  {
  	$genderErr = " select the gender";
  }
  else
  {
  	$gender = test_input($_POST["gender"]);
  }

  if(empty ($_POST["add"]))
  {
  	$addErr = "address must be filled";
  }
  else
  {
  	$add = test_input($_POST["add"]);
  }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

	?>
	
	<form method="post" action="db.php" name="myform" onsubmit="return validate()">
	
		
		First Name : -<input type="text" name="name" id="name" onkeypress="javascript:return isString(event)">
  <span class="error">* <?php echo $nameErr;?></span><br><br>
  		Last Name : -<input type="text" name="lname" onkeypress="javascript:return isString(event)">
		 <span class="error">* <?php echo $lnameErr;?></span>	<br><br>
		 DOB : - <input type="date" name="date"  min="1990-01-01" max="2000-12-31"><br><br>
		 Gender : -<input type="radio" name="gender" value="male"> male
		 			<input type="radio" name="gender" value="female"> female 
		 			<span class="error">* <?php echo $genderErr;?></span><br><br>
		 Email : -<input type="email" name="email">
		  <span class="error">* <?php echo $emailErr;?></span><br><br>
		  Mob No : -<input type="text" name="mob" minlength="10" maxlength="12"  onkeypress="javascript:return isNumber(event)" >
		<span class="error">* <?php echo $mobErr;?></span><br><br>
		Address : -<input type="text" name="add" >
  <span class="error">* <?php echo $addErr;?></span><br><br>
		<input type="submit" name="submit" value="submit"  >
		<input type="submit" name="update" value="update">

</form>

<?php

?>
</body>
</html>