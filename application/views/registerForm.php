<?php

    $this->load->view('header');    
?>
<div class="container">
<form id="registration" name="registration">
<label> Name :  </label>
<input type="text" name="sname" id="sname" maxlength="50" required />
<br/>
<label> Email :  </label>
<input type="email" name="semail" id="semail"  required />
<br/>
<label> Course :  </label>
<select name="course" id="course">
<option value="0" selected> Select Course </option>
<option value="Java">Java </option>
<option value="PHP">PHP</option>
<option value=".Net">DotNET</option>
</select>
<br/>
<button type="submit" value="Register" name="register" />
</form>
</div>
<?php 
    $this->load->view('footer');

