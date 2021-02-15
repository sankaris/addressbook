<html>
<head>
<title>Address Book</title>
</head>
<body>
<form id="addForm" action="" method="POST">
<h4> Insert Form </h4>
FirstName : 
<input type="text" name="fname" id="fname" maxlength="30" value="" required /><br/>
LastName :
<input type="text" name="lname" id="lname" maxlength="30" value="" required /><br/>
DateOfBirth : 
<input type="date" name="dob"  id="dob" value="" required /><br/>
Please select your gender : 
<input type="radio" id="male" name="gender" value="male"> Male</input>
<input type="radio" id="female" name="gender" value="female"> Female </input>
<br/>
Mobile No: 
<input type="tel" name="mobileno" id="mobileno" minlength="10" maxlength="16" value="" pattern="[0-9]" required/><br/>
Phone No:
<input type="tel" name="phoneno" id="phoneno" minlength="10" maxlength="16" value="" pattern="[0-9]" /><br/>
Email:
<input type="email" name="email" id="email" maxlength="120" value="" required/><br/>
Street : 
<input type="street" name="street" id="street" maxlength="120" value=""/><br/>
City :
<input type="city" name="city" id="city" maxlength="120" value=""/><br/>
Hobbies :
<textarea  name="hobbies" id="hobbies" maxlength="120" rows="5" cols="" value=""></textarea><br/>
<input type="submit" name="save" value="SUBMIT" />
</form>
</body>
</html>